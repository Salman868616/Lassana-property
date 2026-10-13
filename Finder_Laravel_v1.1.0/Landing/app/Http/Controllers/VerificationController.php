<?php

namespace App\Http\Controllers;

use App\Services\PropertyReviewWorkflow;
use Illuminate\Http\Request;

class VerificationController extends Controller
{
    public function approve(Request $request, int $property, PropertyReviewWorkflow $workflow)
    {
        $data = $request->validate([
            'identity_checked'=>['accepted'],
            'information_checked'=>['accepted'],
            'photos_checked'=>['accepted'],
            'remarks'=>['required','string','max:5000'],
        ]);
        $workflow->verify($property, $request->user(), $data['remarks']);
        $role = $request->user()->hasRole('admin') ? 'admin' : 'verification';
        return redirect()->route('dashboard.property', ['role'=>$role,'property'=>$property])
            ->with('success', 'Basic verification recorded. Admin approval is the next step.');
    }


    public function silver(Request $request, int $property, PropertyReviewWorkflow $workflow)
    {
        $data = $request->validate([
            'survey_checked'=>['accepted'], 'documents_checked'=>['accepted'],
            'survey_document_id'=>['required','integer'], 'ownership_document_id'=>['required','integer'],
            'remarks'=>['required','string','max:5000'],
        ]);
        $workflow->silver($property, $request->user(), $data);
        $role = $request->user()->hasRole('admin') ? 'admin' : 'verification';
        return redirect()->route('dashboard.property', ['role'=>$role,'property'=>$property])
            ->with('success', 'Silver verification recorded. The listing status has not changed.');
    }

    public function reject(Request $request, int $property, PropertyReviewWorkflow $workflow)
    {
        $data = $request->validate(['remarks'=>['required','string','max:5000']]);
        $workflow->returnForCorrections($property, $request->user(), $data['remarks'], false);
        $role = $request->user()->hasRole('admin') ? 'admin' : 'verification';
        return redirect()->route('dashboard.role', $role)
            ->with('success', 'Property returned to the seller as a draft with your feedback.');
    }
}
