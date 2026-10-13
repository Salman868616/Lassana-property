<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Services\DashboardAccess;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PropertyVideoController extends Controller
{
    public function update(Request $request, string $role, int $property)
    {
        abort_unless(in_array($role, ['admin','seller','agent'], true), 403);
        $listing = app(DashboardAccess::class)->properties($request->user(), $role)->findOrFail($property);
        abort_unless($listing->status === 'draft', 403, 'Return the property to draft before changing videos.');
        $upload = new \App\Services\PropertyVideoUpload();
        $data = $upload->validate($request);
        try {
            DB::transaction(function () use ($request, $role, $property, $data, $upload) {
                $listing = app(DashboardAccess::class)->properties($request->user(), $role)->lockForUpdate()->findOrFail($property);
                abort_unless($listing->status === 'draft', 403);
                $upload->save($request, $listing, $data);
            });
        } catch (\Throwable $error) {
            $upload->rollback();
            throw $error;
        }
        $upload->committed();
        return redirect()->route('dashboard.property', ['role'=>$role,'property'=>$property])
            ->with('success', 'Property videos saved.');
    }

    public function show(Request $request, int $property)
    {
        $listing = Property::findOrFail($property);
        if ($listing->status !== 'published') {
            $allowed = false;
            if ($user = $request->user()) {
                $access = app(DashboardAccess::class);
                foreach (array_keys($access->roles($user)) as $role) {
                    if ($access->properties($user, $role)->whereKey($property)->exists()) {
                        $allowed = true;
                        break;
                    }
                }
            }
            abort_unless($allowed, 404);
        }
        abort_unless($listing->video_path && preg_match('#^property-videos/'.$listing->id.'/[A-Za-z0-9]+\.(mp4|webm)$#', $listing->video_path), 404);
        $disk = Storage::disk('local');
        abort_unless($disk->exists($listing->video_path), 404);
        return response()->file($disk->path($listing->video_path), [
            'Content-Type'=>str_ends_with($listing->video_path, '.webm') ? 'video/webm' : 'video/mp4',
            'Cache-Control'=>'private, no-store, max-age=0',
            'X-Content-Type-Options'=>'nosniff',
        ]);
    }
}
