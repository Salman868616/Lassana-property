@extends('layouts.dashboard')
@section('content')
@if($role === 'admin')
@include('dashboard.admin-overview')
@else

@if($salesOverview && in_array($dashboardTab,['overview','performance'],true)) @include('dashboard.sales-overview') @endif
@if($dashboardTab === 'overview')
@if($role === 'seller')
    <p class="text-secondary mb-4">Buyer enquiries are managed by the Lassana Property team. The team will contact you with updates.</p>
@endif
<div class="d-flex flex-wrap gap-2 mb-4">
    @if(in_array($role, ['seller','agent'], true))
        <a class="btn btn-lp" href="{{ route($role.'.properties.create') }}">Add property</a>
    @endif
    @if($role === 'admin')
        <a class="btn btn-outline-secondary" href="{{ route('admin.users.index') }}">Manage users</a>
        <a class="btn btn-lp" href="{{ route('admin.properties.index') }}">Manage properties</a>
        <a class="btn btn-outline-secondary" href="{{ route('admin.properties.create') }}">Add property</a>
    @endif
    @if($role === 'buyer')
        <a class="btn btn-lp" href="{{ route('properties.index') }}">Browse properties</a>
        <a class="btn btn-outline-secondary" href="{{ route('buyer.requests.create') }}">Request a property</a>
    @endif
</div>
<div class="row g-3 mb-4">
    @if($role !== 'buyer')
        <div class="col-sm-6 col-lg-3"><div class="card p-3"><span>Properties</span><strong class="fs-2">{{ $propertyCount }}</strong></div></div>
    @endif
    @if(in_array($role, ['admin','sales','agent'], true) && $enquiries !== null)
        <div class="col-sm-6 col-lg-3"><div class="card p-3"><span>Enquiries</span><strong class="fs-2">{{ $enquiryCount }}</strong></div></div>
    @endif
    @if($leads !== null)
        <div class="col-sm-6 col-lg-3"><div class="card p-3"><span>Leads</span><strong class="fs-2">{{ $leadCount }}</strong></div></div>
    @endif
    @if($viewings !== null)
        <div class="col-sm-6 col-lg-3"><div class="card p-3"><span>Viewings</span><strong class="fs-2">{{ $viewingCount }}</strong></div></div>
    @endif
</div>
@endif

@if($dashboardTab === 'saved' && $savedProperties !== null) @include('dashboard.saved-properties') @endif
@if($dashboardTab === 'requests' && $propertyRequests !== null) @include('dashboard.requests.list') @endif
@if($dashboardTab === 'properties' && $role !== 'buyer')
<section class="card mb-4" id="properties-list">
    <div class="card-header"><h2 class="h5 mb-0">{{ match($role) { 'seller' => 'My properties', 'agent' => 'My properties', 'verification' => 'Properties for verification', default => 'Properties' } }}</h2></div>
    <div class="table-responsive"><table class="table mb-0"><thead><tr><th>Property</th><th>Location</th><th>Status</th><th>Action</th></tr></thead><tbody>
        @forelse($properties as $property)
        <tr><td>{{ $property->title }}<small class="d-block text-secondary">{{ $property->property_code }}</small></td><td>{{ $property->city }}, {{ $property->district }}</td><td><span class="lp-status {{ $property->status }}">{{ ucfirst(str_replace('_', ' ', $property->status)) }}</span></td><td><a href="{{ route('dashboard.property', ['role' => $role, 'property' => $property->id]) }}">View property</a></td></tr>
        @empty
        <tr><td colspan="4" class="text-secondary">No properties to show yet.</td></tr>
        @endforelse
    </tbody></table></div>
    <div class="card-body">{{ $properties->withQueryString()->links('pagination::bootstrap-5') }}</div>
</section>
@endif
@if(in_array($role, ['admin','sales','agent'], true) && $dashboardTab === 'enquiries' && $enquiries !== null)
<section class="card mb-4" id="enquiries-list">
    <div class="card-header"><h2 class="h5 mb-0">Enquiries</h2></div>
    <div class="table-responsive"><table class="table mb-0"><thead><tr><th>Customer</th><th>Contact</th><th>Message</th><th>Status</th></tr></thead><tbody>
    @forelse($enquiries as $enquiry)
        <tr><td>{{ $enquiry->name }}</td><td>{{ $enquiry->email }}<br>{{ $enquiry->phone }}</td><td>{{ $enquiry->message }}</td><td>{{ \App\Services\LeadStages::label($enquiry->crmLead?->status ?? $enquiry->status) }}
@if(in_array($role,['admin','sales','agent'],true) && $enquiry->crmLead)
    <a class="d-block" href="{{ route('leads.show',['role'=>$role,'lead'=>$enquiry->crmLead->id]) }}">Open lead</a>
@elseif(in_array($role,['admin','sales'],true))
    <form method="POST" action="{{ route('leads.convert',['role'=>$role,'enquiry'=>$enquiry->id]) }}">@csrf<button class="btn btn-sm btn-outline-secondary" type="submit">Create lead</button></form>
@endif
</td></tr>
    @empty
        <tr><td colspan="4" class="text-secondary">No enquiries yet.</td></tr>
    @endforelse
    </tbody></table></div>
    <div class="card-body">{{ $enquiries->withQueryString()->links('pagination::bootstrap-5') }}</div>
</section>
@endif
@if($dashboardTab === 'leads' && $leads !== null)
<section class="card mb-4" id="lead-list">
    <div class="card-header"><h2 class="h5 mb-0">{{ $role === 'agent' ? 'Assigned leads' : 'Leads' }}</h2></div>
    <form method="GET" class="card-body row g-2 align-items-end"><input type="hidden" name="tab" value="leads">
        <div class="col-md-4"><label class="form-label" for="lead-status-filter">Stage</label><select class="form-select" name="lead_status" id="lead-status-filter"><option value="">All stages</option>@foreach(\App\Services\LeadStages::LABELS as $key=>$label)<option value="{{ $key }}" @selected(($leadFilters['lead_status'] ?? '') === $key)>{{ $label }}</option>@endforeach</select></div>
        <div class="col-md-4"><label class="form-label" for="lead-queue">Work queue</label><select class="form-select" name="lead_queue" id="lead-queue"><option value="">All leads</option>@foreach(['due'=>'Due now','today'=>'Due today','hot'=>'Hot leads','unassigned'=>'Unassigned'] as $key=>$label)<option value="{{ $key }}" @selected(($leadFilters['lead_queue'] ?? '') === $key)>{{ $label }}</option>@endforeach</select></div>
        <div class="col-md-4"><button class="btn btn-lp" type="submit">Filter leads</button> <a href="{{ route('dashboard.role',['role'=>$role,'tab'=>'leads']) }}">Clear</a></div>
    </form>
    <div class="table-responsive"><table class="table mb-0"><thead><tr><th>Lead</th><th>Status</th><th>Follow-up</th><th>Notes</th></tr></thead><tbody>
    @forelse($leads as $lead)
        <tr><td><a href="{{ route('leads.show', ['role'=>$role,'lead'=>$lead->id]) }}">Open lead #{{ $lead->id }}</a><small class="d-block">{{ $lead->property?->title ?? ($lead->property_request_id ? 'Property request #'.$lead->property_request_id : ($lead->buyer_service_request_id ? 'Service request #'.$lead->buyer_service_request_id : 'Property unavailable')) }}</small><small class="d-block">{{ $lead->enquiry?->name ?? $lead->propertyRequest?->customer?->name ?? $lead->buyerServiceRequest?->customer?->name }} · {{ $lead->assignee?->name ?? 'Unassigned' }}</small>@if($lead->buyerServiceRequest)<small class="d-block">{{ \App\Models\BuyerServiceRequest::TYPES[$lead->buyerServiceRequest->type] }}</small>@endif</td><td>{{ \App\Services\LeadStages::label($lead->status) }}</td><td>{{ $lead->follow_up_at?->copy()->timezone('Asia/Colombo')->format('d M Y h:i A') ?? 'Not scheduled' }}</td><td>{{ $lead->notes }}</td></tr>
    @empty
        <tr><td colspan="4" class="text-secondary">No leads to show yet.</td></tr>
    @endforelse
    </tbody></table></div>
    <div class="card-body">{{ $leads->withQueryString()->links('pagination::bootstrap-5') }}</div>
</section>
@endif
@if($dashboardTab === 'viewings' && $viewings !== null)
<section class="card mb-4" id="viewings-list">
    <div class="card-header"><h2 class="h5 mb-0">{{ $role === 'buyer' ? 'My viewings' : 'Viewings' }}</h2></div>
    <div class="table-responsive"><table class="table mb-0"><thead><tr><th>Property reference</th><th>Scheduled time</th>@if(in_array($role, ['admin', 'sales'], true))<th>Assigned employee</th>@endif<th>Status</th></tr></thead><tbody>
    @forelse($viewings as $viewing)
        <tr><td>#{{ $viewing->property_id }}</td><td>{{ $viewing->scheduled_at?->copy()->timezone('Asia/Colombo')->format('d M Y h:i A') }}</td>@if(in_array($role, ['admin', 'sales'], true))<td>{{ $viewing->assignee?->name ?? 'Unassigned' }}</td>@endif<td>{{ $viewing->status }}</td></tr>
    @empty
        <tr><td colspan="{{ in_array($role, ['admin', 'sales'], true) ? 4 : 3 }}" class="text-secondary">No viewings scheduled yet.</td></tr>
    @endforelse
    </tbody></table></div>
    <div class="card-body">{{ $viewings->withQueryString()->links('pagination::bootstrap-5') }}</div>
</section>
@endif

@endif
@endsection
