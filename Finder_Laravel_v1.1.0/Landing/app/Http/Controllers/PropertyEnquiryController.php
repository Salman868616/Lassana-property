<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\PropertyEnquiry;
use Illuminate\Http\Request;

class PropertyEnquiryController extends Controller
{
    public function store(Request $request, Property $property)
    {
        abort_unless($property->status === 'published', 404);

        $data = $request->validate([
            'name' => ['required', 'string', 'max:150'],
            'email' => ['required', 'email', 'max:254'],
            'phone' => ['nullable', 'string', 'max:30'],
            'message' => ['required', 'string', 'max:5000'],
        ]);

        \Illuminate\Support\Facades\DB::transaction(function () use ($property, $request, $data) {
            $listing = Property::lockForUpdate()->findOrFail($property->id);
            abort_unless($listing->status === 'published', 404);
            $enquiry = $listing->enquiries()->make($data);
            // Link only the authenticated buyer; never infer account ownership from an email address.
            $enquiry->customer_id = $request->user()?->hasRole('buyer') ? $request->user()->id : null;
            $enquiry->save();
            $lead = $enquiry->crmLead()->create(['property_id'=>$listing->id,'status'=>'new','source'=>'website']);
            app(\App\Services\CampaignAttribution::class)->attach($lead,$request);
            $lead->activities()->create(['performed_by'=>$request->user()?->id,'activity_type'=>'created',
                'status'=>'new','activity_at'=>now(),'notes'=>'Lead created from property enquiry.']);
        });

        return back()->with('enquiry_success', 'Your enquiry was sent successfully.');
    }
}