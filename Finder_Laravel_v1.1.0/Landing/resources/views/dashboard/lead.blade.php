@extends('layouts.dashboard')
@section('content')
@if($needsViewingFollowUp)
<div class="alert alert-warning" role="alert">
    <strong>Update this lead after the cancelled viewing.</strong>
    There are no upcoming scheduled viewings, but this lead still says Viewing Scheduled.
    <a href="#record-follow-up">Record a follow-up</a> to choose the current lead status and next contact date,
    or <a href="#schedule-viewing">schedule a replacement viewing</a> once agreed with the buyer.
    The cancelled visit remains in the history.
</div>
@endif
<a class="d-inline-block mb-3" href="{{ route('dashboard.role',$role) }}">Back to dashboard</a>
<div class="row g-4">
<div class="col-lg-7">
    <section class="card p-4 mb-4">
        <h2 class="h5">{{ $lead->property?->title ?? ($lead->property_request_id ? 'Property request #'.$lead->property_request_id : ($lead->buyer_service_request_id ? 'Service request #'.$lead->buyer_service_request_id : 'Property unavailable')) }}</h2>
        <p>{{ $lead->property?->property_code }} · {{ \App\Services\LeadStages::label($lead->status) }}</p>
        @if($lead->buyerServiceRequest)
            @php($serviceRequest = $lead->buyerServiceRequest)
            <h3 class="h6">{{ \App\Models\BuyerServiceRequest::TYPES[$serviceRequest->type] }} #{{ $serviceRequest->id }}</h3>
            <p>{{ $serviceRequest->customer?->name }}<br>{{ $serviceRequest->customer?->email }}<br>{{ $serviceRequest->phone }}</p>
            @if($serviceRequest->location)<p>Area / address: {{ $serviceRequest->location }}</p>@endif
            <p>Preferred date: {{ $serviceRequest->preferred_date?->format('d M Y') ?? 'Not specified' }} (not confirmed)</p>
            <p style="white-space:pre-wrap;overflow-wrap:anywhere">{{ $serviceRequest->message }}</p>
        @elseif($lead->enquiry)
            <h3 class="h6">Customer enquiry</h3>
            <p>{{ $lead->enquiry->name }}<br>{{ $lead->enquiry->email }}<br>{{ $lead->enquiry->phone }}</p>
            <p style="white-space:pre-line">{{ $lead->enquiry->message }}</p>
        @else
            @if($lead->propertyRequest)
                <h3 class="h6">Buyer property request</h3>
                <p>{{ $lead->propertyRequest->customer?->name }}<br>{{ $lead->propertyRequest->customer?->email }}<br>{{ $lead->propertyRequest->phone }}</p>
                @include('dashboard.requests.details',['item'=>$lead->propertyRequest])
            @else <p class="text-secondary">No linked enquiry.</p> @endif
        @endif
        <p>Source: {{ \App\Services\LeadStages::SOURCES[$lead->source] ?? $lead->source }}<br>Outcome: {{ \App\Services\LeadStages::OUTCOMES[$lead->outcome] ?? $lead->outcome ?? 'Not recorded' }}</p>
        <p class="mb-0">Assigned employee: <strong>{{ $lead->assignee?->name ?? 'Unassigned' }}</strong></p>
        <p class="mt-2 mb-0">Next follow-up: {{ $lead->follow_up_at?->copy()->timezone('Asia/Colombo')->format('d M Y h:i A') ?? 'Not scheduled' }}</p>
    </section>
    @if($matches !== null) @include('dashboard.requests.matches') @endif
    <section class="card p-4 mb-4">
        <h2 class="h5">Follow-up history</h2>
        @forelse($activities as $activity)
            <div class="border-bottom py-3">
                <strong>{{ ucfirst(str_replace('_',' ',$activity->activity_type)) }} · {{ \App\Services\LeadStages::label($activity->status) }}</strong>
                <small class="d-block text-secondary">{{ $activity->performer?->name ?? 'System / guest' }} · {{ ($activity->activity_at ?? $activity->created_at)?->copy()->timezone('Asia/Colombo')->format('d M Y h:i A') }}</small>
                <p class="mb-0" style="white-space:pre-line">{{ $activity->notes }}</p>
            </div>
        @empty <p>No follow-ups recorded yet.</p> @endforelse
        {{ $activities->withQueryString()->links('pagination::bootstrap-5') }}
    </section>
    <section class="card p-4 mb-4">
        <h2 class="h5">Viewings</h2>
        @forelse($viewings as $viewing)
            <div class="border-bottom py-3">
                <strong>{{ $viewing->scheduled_at->copy()->timezone('Asia/Colombo')->format('d M Y h:i A') }}</strong>
                <p>{{ ucfirst(str_replace('_',' ',$viewing->status)) }} · {{ $viewing->assignee?->name ?? 'Unassigned' }}</p>
                <p style="white-space:pre-line">{{ $viewing->notes }}</p>
                @if($viewing->outcome)<p style="white-space:pre-line">Outcome: {{ $viewing->outcome }}</p>@endif
                @if($viewing->status === 'scheduled')
                    <form method="POST" action="{{ route('leads.viewing-outcome',['role'=>$role,'lead'=>$lead->id,'viewing'=>$viewing->id]) }}">
                        @csrf
                        <label class="form-label" for="outcome-status-{{ $viewing->id }}">Viewing result</label>
                        <select class="form-select mb-2" name="status" id="outcome-status-{{ $viewing->id }}">
                            @if(!$viewing->scheduled_at->isFuture())<option value="completed">Completed</option><option value="no_show">No show</option>@endif
                            <option value="cancelled">Cancelled</option>
                        </select>
                        <label class="form-label" for="outcome-{{ $viewing->id }}">Outcome notes</label>
                        <textarea class="form-control mb-2" id="outcome-{{ $viewing->id }}" name="outcome" maxlength="5000" required></textarea>
                        <button class="btn btn-outline-secondary" type="submit">Record outcome</button>
                    </form>
                @endif
            </div>
        @empty <p>No viewings scheduled.</p> @endforelse
        {{ $viewings->withQueryString()->links('pagination::bootstrap-5') }}
    </section>
</div>
<div class="col-lg-5">
    <section class="card p-4 mb-4">
        <h2 class="h5" id="record-follow-up">Record follow-up</h2>
        <form method="POST" action="{{ route('leads.update',['role'=>$role,'lead'=>$lead->id]) }}">
            @csrf
            <label class="form-label" for="lead-status">Lead status</label>
            <select class="form-select mb-3" id="lead-status" name="status">
                @foreach(\App\Services\LeadStages::LABELS as $status=>$label)<option value="{{ $status }}" @selected(old('status',$lead->status) === $status)>{{ $label }}</option>@endforeach
            </select>
            <label class="form-label" for="source">Lead source</label>
            <select class="form-select mb-3" name="source" id="source">@foreach(\App\Services\LeadStages::SOURCES as $key=>$label)<option value="{{ $key }}" @selected(old('source',$lead->source) === $key)>{{ $label }}</option>@endforeach</select>
            <label class="form-label" for="lead-outcome">Closing outcome</label>
            <select class="form-select mb-3" name="outcome" id="lead-outcome"><option value="">Choose when closing</option>@foreach(\App\Services\LeadStages::OUTCOMES as $key=>$label)<option value="{{ $key }}" @selected(old('outcome',$lead->outcome) === $key)>{{ $label }}</option>@endforeach</select>
            <label class="form-label" for="activity-type">Contact method</label>
            <select class="form-select mb-3" id="activity-type" name="activity_type">
                @foreach(['note','call','email','meeting'] as $type)<option value="{{ $type }}">{{ ucfirst($type) }}</option>@endforeach
            </select>
            <label class="form-label" for="follow-up-notes">Notes</label>
            <textarea class="form-control mb-3" id="follow-up-notes" name="notes" maxlength="5000" required>{{ old('notes') }}</textarea>
            <label class="form-label" for="follow-up-at">Next follow-up</label>
            <input class="form-control mb-3" id="follow-up-at" type="datetime-local" name="follow_up_at" value="{{ old('follow_up_at',$lead->follow_up_at?->copy()->timezone('Asia/Colombo')->format('Y-m-d\TH:i')) }}">
            <button class="btn btn-lp" type="submit">Save follow-up</button>
        </form>
    </section>
    @if(in_array($role,['admin','sales'],true))
        <section class="card p-4 mb-4">
            <h2 class="h5">Assign employee</h2>
            <form method="POST" action="{{ route('leads.assign',['role'=>$role,'lead'=>$lead->id]) }}">
                @csrf
                <label for="assigned-to" class="form-label">Employee</label>
                <select class="form-select mb-3" id="assigned-to" name="assigned_to">
                    <option value="">Unassigned</option>
                    @foreach($agents as $agent)<option value="{{ $agent->id }}" @selected((int)$lead->assigned_to === $agent->id)>{{ $agent->name }}</option>@endforeach
                </select>
                @if($agents->isEmpty())<p class="text-secondary">No active Agent or Sales team accounts are available for assignment.</p>@endif
                <button class="btn btn-lp" type="submit">Save assignment</button>
            </form>
        </section>
    @endif
    <section class="card p-4">
        <h2 class="h5" id="schedule-viewing">Schedule viewing</h2>
        <form method="POST" action="{{ route('leads.schedule',['role'=>$role,'lead'=>$lead->id]) }}">
            @csrf
            <label class="form-label" for="scheduled-at">Date and time</label>
            <input class="form-control mb-3" id="scheduled-at" name="scheduled_at" type="datetime-local" value="{{ old('scheduled_at') }}" required>
            <label class="form-label" for="viewing-notes">Meeting details</label>
            <textarea class="form-control mb-3" name="notes" id="viewing-notes" maxlength="5000"></textarea>
            <p class="small text-secondary">Assigned to the lead’s employee. Confirm with the customer separately; no notification is sent.</p>
            <button class="btn btn-lp" type="submit">Schedule viewing</button>
        </form>
    </section>
</div>
</div>
@endsection
