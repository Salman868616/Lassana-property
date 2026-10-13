<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Services\DashboardAccess;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class PropertyDocumentController extends Controller
{
    public function store(Request $request, int $property)
    {
        $role = $request->routeIs('agent.documents.store') ? 'agent' : 'seller';
        $listing = app(DashboardAccess::class)->properties($request->user(), $role)->findOrFail($property);
        abort_unless($listing->status === 'draft', 403, 'Return the listing to draft before uploading documents.');
        $data = $request->validate([
            'document_type'=>['required','in:ownership,survey,identity,other'],
            'document'=>['required','file','mimes:pdf,jpg,jpeg,png','max:10240'],
        ]);
        $path = null;
        try {
            DB::transaction(function () use ($request, $property, $data, &$path, $role) {
                $listing = app(DashboardAccess::class)->properties($request->user(), $role)->lockForUpdate()->findOrFail($property);
                abort_unless($listing->status === 'draft', 403, 'Only draft listings can accept documents.');
                if ($listing->documents()->count() >= 10) {
                    throw ValidationException::withMessages(['document'=>'A property can have up to 10 documents.']);
                }
                $path = $request->file('document')->store('properties/'.$listing->id, 'property_documents');
                if (! $path) throw new \RuntimeException('The document could not be saved.');
                $listing->documents()->create([
                    'uploaded_by'=>$request->user()->id,
                    'document_type'=>$data['document_type'],
                    'path'=>$path, 'status'=>'pending', 'verified_at'=>null,
                ]);
            });
        } catch (\Throwable $error) {
            if ($path) Storage::disk('property_documents')->delete($path);
            throw $error;
        }
        return redirect()->route('dashboard.property', ['role'=>$role,'property'=>$property])
            ->with('success', 'Private document uploaded. It is pending review.');
    }

    public function review(Request $request, string $role, int $property, int $document)
    {
        abort_unless(in_array($role, ['admin','verification'], true), 403);
        app(DashboardAccess::class)->authorize($request->user(), $role);
        $listing = app(DashboardAccess::class)->properties($request->user(), $role)->findOrFail($property);
        $listing->documents()->findOrFail($document);
        $data = $request->validate([
            'decision'=>['required','in:approved,rejected'],
            'remarks'=>['required','string','max:5000'],
            'evidence_checked'=>['accepted'],
        ]);
        DB::transaction(function () use ($request, $property, $document, $data) {
            $listing = Property::lockForUpdate()->findOrFail($property);
            abort_unless($listing->status === 'under_review', 403, 'Documents can only be reviewed while the listing is under review.');
            $file = $listing->documents()->lockForUpdate()->findOrFail($document);
            if ($file->status !== 'pending' || $file->review()->exists()) {
                throw ValidationException::withMessages(['decision'=>'This document already has a review. Refresh the page.']);
            }
            if ($data['decision'] === 'approved') {
                abort_unless(preg_match('#^properties/'.$listing->id.'/[A-Za-z0-9]+\.(pdf|jpg|jpeg|png)$#', $file->path), 404);
                abort_unless(Storage::disk('property_documents')->exists($file->path), 404, 'Document file is unavailable.');
            }
            $file->review()->create([
                'reviewer_id'=>$request->user()->id,
                'decision'=>$data['decision'], 'remarks'=>$data['remarks'],
            ]);
            $file->status = $data['decision'];
            $file->verified_at = $data['decision'] === 'approved' ? now() : null;
            $file->save();
        });
        return redirect()->route('dashboard.property', ['role'=>$role,'property'=>$property])
            ->with('success', 'Document review saved. Property approval is a separate action.');
    }


    public function download(Request $request, string $role, int $property, int $document)
    {
        abort_unless(in_array($role, ['seller','agent','admin','verification'], true), 403);
        $listing = app(DashboardAccess::class)->properties($request->user(), $role)->findOrFail($property);
        $file = $listing->documents()->findOrFail($document);
        // Only files created in this property's private directory can be downloaded.
        abort_unless(preg_match('#^properties/'.$listing->id.'/[A-Za-z0-9]+\.(pdf|jpg|jpeg|png)$#', $file->path), 404);
        $disk = Storage::disk('property_documents');
        abort_unless($disk->exists($file->path), 404, 'Document file is unavailable.');
        $name = 'property-'.$listing->id.'-document-'.$file->id.'.'.pathinfo($file->path, PATHINFO_EXTENSION);
        return $disk->download($file->path, $name, [
            'Cache-Control'=>'private, no-store, max-age=0',
            'X-Content-Type-Options'=>'nosniff',
        ]);
    }
}
