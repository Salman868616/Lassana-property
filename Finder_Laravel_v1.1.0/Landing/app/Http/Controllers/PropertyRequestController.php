<?php

namespace App\Http\Controllers;

use App\Models\PropertyCategory;
use App\Models\PropertyRequest;
use App\Services\DashboardAccess;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class PropertyRequestController extends Controller
{
    public function create(Request $request)
    {
        return view('dashboard.requests.create',[
            'categories'=>PropertyCategory::where('is_active',true)->whereIn('slug',['land','house','apartment','villa','commercial'])->orderBy('sort_order')->get(),
            'roles'=>app(DashboardAccess::class)->roles($request->user()),'role'=>'buyer','title'=>'Request a property',
        ]);
    }

    public function store(Request $request)
    {
        $data=$request->validate([
            'category'=>['required',Rule::in(['land','house','apartment','villa','commercial']),Rule::exists('property_categories','slug')->where('is_active',true)],
            'district'=>['required','string','max:100'],'city'=>['nullable','string','max:100'],
            'budget_min'=>['nullable','numeric','decimal:0,2','min:0','max:999999999999.99'],
            'budget_max'=>['required','numeric','decimal:0,2','min:1','max:999999999999.99'],
            'bedrooms'=>['nullable','integer','min:0','max:50'],
            'phone'=>['nullable','string','max:30'],'requirements'=>['required','string','max:5000'],
        ]);
        $data = \App\Services\LocationCatalog::validate($data);
        if (($data['budget_min'] ?? 0)>$data['budget_max']) {
            throw ValidationException::withMessages(['budget_max'=>'Maximum budget must be at least the minimum budget.']);
        }
        if (!in_array($data['category'],['house','apartment','villa'],true)) $data['bedrooms']=null;
        $propertyRequest=DB::transaction(function () use ($request,$data) {
            $item=new PropertyRequest($data);
            $item->customer_id=$request->user()->id;
            $item->save();
            $lead=$item->crmLead()->create(['status'=>'new','source'=>'property_request']);
            app(\App\Services\CampaignAttribution::class)->attach($lead,$request);
            $lead->activities()->create(['performed_by'=>$request->user()->id,'activity_type'=>'created',
                'status'=>'new','activity_at'=>now(),'notes'=>'Buyer submitted property request #'.$item->id.'.']);
            return $item;
        });
        return redirect()->route('buyer.requests.show',$propertyRequest)->with('success','Your property request has been submitted to the sales team.');
    }

    public function show(Request $request, int $propertyRequest)
    {
        $item=PropertyRequest::where('customer_id',$request->user()->id)->with('crmLead.property')->findOrFail($propertyRequest);
        return view('dashboard.requests.show',['item'=>$item,'roles'=>app(DashboardAccess::class)->roles($request->user()),
            'role'=>'buyer','title'=>'Property request #'.$item->id]);
    }
}
