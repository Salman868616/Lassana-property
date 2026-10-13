@extends('layouts.dashboard')
@section('content')
<div class="d-flex flex-wrap gap-2 mb-4">
<a class="btn btn-lp" href="{{ route('buyer.services.create', ['type'=>'inspection']) }}">Request inspection</a>
<a class="btn btn-outline-secondary" href="{{ route('buyer.services.create', ['type'=>'lgc_service']) }}">Request LGC service</a>
</div>
<section class="card"><div class="table-responsive"><table class="table mb-0">
<thead><tr><th>Request</th><th>Property</th><th>Submitted</th><th>Status</th><th>Action</th></tr></thead><tbody>
@forelse($items as $item)
<tr><td>{{ \App\Models\BuyerServiceRequest::TYPES[$item->type] }} #{{ $item->id }}</td><td>{{ $item->property?->title ?? ($item->property_id ? 'Property unavailable' : 'General service request') }}</td><td>{{ $item->created_at->copy()->timezone('Asia/Colombo')->format('d M Y') }}</td><td>{{ \App\Services\LeadStages::label($item->crmLead?->status) }}</td><td><a href="{{ route('buyer.services.show', $item) }}">View request</a></td></tr>
@empty <tr><td colspan="5">No service requests yet.</td></tr> @endforelse
</tbody></table></div><div class="card-body">{{ $items->links('pagination::bootstrap-5') }}</div></section>
@endsection
