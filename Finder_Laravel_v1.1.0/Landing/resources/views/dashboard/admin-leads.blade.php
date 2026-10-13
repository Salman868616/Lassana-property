@if($dashboardTab === 'requests') @include('dashboard.requests.list') @endif
@if($dashboardTab === 'enquiries' && $enquiries !== null)
<section class="card mb-4">
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
    <form method="GET" class="card-body row g-2 align-items-end"><input type="hidden" name="section" value="leads">
        <div class="col-md-4"><label class="form-label" for="lead-status-filter">Stage</label><select class="form-select" name="lead_status" id="lead-status-filter"><option value="">All stages</option>@foreach(\App\Services\LeadStages::LABELS as $key=>$label)<option value="{{ $key }}" @selected(($leadFilters['lead_status'] ?? '') === $key)>{{ $label }}</option>@endforeach</select></div>
        <div class="col-md-4"><label class="form-label" for="lead-queue">Work queue</label><select class="form-select" name="lead_queue" id="lead-queue"><option value="">All leads</option>@foreach(['due'=>'Due now','today'=>'Due today','hot'=>'Hot leads','unassigned'=>'Unassigned'] as $key=>$label)<option value="{{ $key }}" @selected(($leadFilters['lead_queue'] ?? '') === $key)>{{ $label }}</option>@endforeach</select></div>
        <div class="col-md-4"><button class="btn btn-lp" type="submit">Filter leads</button> <a href="{{ route('dashboard.role',['role'=>$role,'section'=>'leads']).'#lead-list' }}">Clear</a></div>
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
<section class="card mb-4" id="admin-viewings">
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
