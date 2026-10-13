<?php

namespace App\Http\Controllers;

use App\Models\{BuyerServiceRequest, Property};
use App\Services\DashboardAccess;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\{Rule, ValidationException};

class BuyerServiceRequestController extends Controller
{
    private function context(Request $request, string $title): array
    {
        return ['role' => 'buyer', 'roles' => app(DashboardAccess::class)->roles($request->user()), 'title' => $title];
    }

    public function index(Request $request)
    {
        $items = BuyerServiceRequest::where('customer_id', $request->user()->id)
            ->with(['crmLead', 'property' => fn ($q) => $q->where('status', 'published')])
            ->latest('id')->paginate(10);
        return view('dashboard.services.index', $this->context($request, 'My service requests') + compact('items'));
    }

    public function create(Request $request)
    {
        $data = $request->validate([
            'type' => ['nullable', Rule::in(array_keys(BuyerServiceRequest::TYPES))],
            'property_code' => ['nullable', 'string', 'max:100'],
            'service' => ['nullable', Rule::in(array_keys(BuyerServiceRequest::SERVICES))],
        ]);
        $type = $data['type'] ?? 'inspection';
        $property = !empty($data['property_code'])
            ? Property::where('status', 'published')->where('property_code', $data['property_code'])->firstOrFail() : null;
        $service = $type === 'lgc_service' ? ($data['service'] ?? 'general') : null;
        return view('dashboard.services.create', $this->context($request, BuyerServiceRequest::TYPES[$type]) + compact('type', 'property', 'service'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'type' => ['required', Rule::in(array_keys(BuyerServiceRequest::TYPES))],
            'property_code' => ['nullable', 'required_if:type,inspection', 'string', 'max:100'],
            'phone' => ['required', 'string', 'max:30'],
            'service' => ['exclude_unless:type,lgc_service', 'nullable', Rule::in(array_keys(BuyerServiceRequest::SERVICES))],
            'location' => ['nullable', 'required_without:property_code', 'string', 'max:255'],
            'preferred_date' => ['nullable', 'date_format:Y-m-d', 'after_or_equal:'.now('Asia/Colombo')->toDateString()],
            'message' => ['required', 'string', 'max:5000'],
        ]);
        if (!empty($data['service'])) $data['message'] = 'Requested service: '.BuyerServiceRequest::SERVICES[$data['service']]."\n\n".$data['message'];
        unset($data['service']);
        $item = DB::transaction(function () use ($request, $data) {
            $property = null;
            if (!empty($data['property_code'])) {
                $property = Property::where('status', 'published')->where('property_code', $data['property_code'])->lockForUpdate()->first();
                if (!$property) throw ValidationException::withMessages(['property_code' => 'Choose a currently published property.']);
            }
            $item = new BuyerServiceRequest(collect($data)->except('property_code')->all());
            $item->customer_id = $request->user()->id;
            $item->property_id = $property?->id;
            $item->save();
            $lead = $item->crmLead()->create(['property_id' => $property?->id, 'status' => 'new', 'source' => $item->type]);
            app(\App\Services\CampaignAttribution::class)->attach($lead,$request);
            $lead->activities()->create(['performed_by' => $request->user()->id, 'activity_type' => 'created',
                'status' => 'new', 'activity_at' => now(), 'notes' => BuyerServiceRequest::TYPES[$item->type].' #'.$item->id.' submitted by buyer.']);
            return $item;
        });
        return redirect()->route('buyer.services.show', $item)->with('success', 'Your request has been sent to our team for follow-up. An appointment is not confirmed yet.');
    }

    public function show(Request $request, int $serviceRequest)
    {
        $item = BuyerServiceRequest::where('customer_id', $request->user()->id)
            ->with(['crmLead', 'property' => fn ($q) => $q->where('status', 'published')])->findOrFail($serviceRequest);
        return view('dashboard.services.show', $this->context($request, BuyerServiceRequest::TYPES[$item->type].' #'.$item->id) + compact('item'));
    }
}
