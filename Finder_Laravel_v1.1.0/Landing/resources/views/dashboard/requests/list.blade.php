<section class="card mb-4" id="property-requests">
<div class="card-header"><h2 class="h5 mb-0">{{ $role === 'buyer' ? 'My property requests' : 'Property requests' }}</h2></div>
<div class="table-responsive"><table class="table mb-0"><thead><tr><th>Request</th><th>Location</th><th>Maximum budget</th><th>Status</th><th>Action</th></tr></thead><tbody>
@forelse($propertyRequests as $item)
<tr><td>#{{ $item->id }} · {{ ucfirst($item->category) }}@if($role !== 'buyer')<small class="d-block">{{ $item->customer?->name }}</small>@endif</td><td>{{ $item->city ? $item->city.', ' : '' }}{{ $item->district }}</td><td>LKR {{ number_format($item->budget_max,2) }}</td><td>{{ \App\Services\LeadStages::label($item->crmLead?->status ?? 'new') }}</td><td>
@if($role === 'buyer')<a href="{{ route('buyer.requests.show',$item) }}">View request</a>
@elseif($item->crmLead)<a href="{{ route('leads.show',['role'=>$role,'lead'=>$item->crmLead->id]) }}">Open lead</a>@endif
</td></tr>
@empty <tr><td colspan="5">No property requests yet.</td></tr> @endforelse
</tbody></table></div><div class="card-body">{{ $propertyRequests->withQueryString()->links('pagination::bootstrap-5') }}</div>
</section>
