@if($adminData['section']==='management')
@include('dashboard.management-overview')
@elseif($adminData['section']==='leads')
@include('dashboard.admin-leads')
@elseif($adminData['section']==='revenue')
<section class="card p-4"><h2 class="h4">Revenue tracking</h2><a href="{{ route('admin.revenue.index') }}">Open revenue ledger</a></section>
@elseif($adminData['section']==='reports')
<section class="card mb-4"><div class="card-body"><h2 class="h5">Sales performance summary</h2><p class="text-secondary mb-0">Report downloads and date filters are not available yet.</p></div></section>
@include('dashboard.sales-overview')
@else
<div class="d-flex flex-wrap gap-2 mb-4"><a class="btn btn-lp" href="{{ route('admin.properties.create') }}">+ Add property</a><a class="btn btn-outline-secondary" href="{{ route('admin.properties.index') }}">Manage properties</a><a class="btn btn-outline-secondary" href="{{ route('admin.users.index') }}">Manage users</a></div>
<div class="row g-3 mb-4">
@foreach([
['Properties',$propertyCount,'fi-home',route('admin.properties.index')],
["Today's enquiries",$salesOverview['newEnquiries'],'fi-chat',route('dashboard.role',['role'=>'admin','section'=>'leads','tab'=>'enquiries'])],
['Follow-ups due',$salesOverview['due'],'fi-clock',route('dashboard.role',['role'=>'admin','section'=>'leads','lead_queue'=>'due']).'#lead-list'],
['Upcoming viewings',$adminData['upcomingCount'],'fi-calendar',route('dashboard.role',['role'=>'admin','section'=>'leads','tab'=>'viewings'])],
] as $metric)
<div class="col-sm-6 col-xl-3"><a class="card lp-metric" href="{{ $metric[3] }}"><div class="lp-metric-icon"><i class="{{ $metric[2] }}" aria-hidden="true"></i></div><div><span>{{ $metric[0] }}</span><strong>{{ $metric[1] }}</strong></div></a></div>
@endforeach
</div>
<div class="row g-4 mb-4">
<div class="col-xl-8"><section class="card h-100"><div class="card-header d-flex justify-content-between align-items-center gap-2"><h2 class="h5 mb-0">Properties awaiting review</h2><span class="lp-status under_review">{{ $adminData['pendingCount'] }} pending</span></div>
<div class="table-responsive"><table class="table mb-0"><thead><tr><th>Property</th><th>Location</th><th>Status</th><th>Action</th></tr></thead><tbody>
@forelse($adminData['reviews'] as $property)
<tr><td>{{ $property->title }}<small class="d-block text-secondary">{{ $property->property_code }}</small></td><td>{{ $property->city }}, {{ $property->district }}</td><td><span class="lp-status {{ $property->status }}">{{ ucfirst(str_replace('_',' ',$property->status)) }}</span></td><td><a href="{{ route('dashboard.property',['role'=>'admin','property'=>$property->id]) }}">Review</a></td></tr>
@empty <tr><td colspan="4" class="lp-empty">No properties are waiting for review.</td></tr> @endforelse
</tbody></table></div><div class="card-body mt-auto"><a href="{{ route('admin.properties.index', ['queue'=>'review']) }}">Open review queue &rarr;</a></div></section></div>
<div class="col-xl-4"><section class="card h-100"><div class="card-header"><h2 class="h5 mb-0">Upcoming viewings</h2></div>
@forelse($adminData['upcoming'] as $viewing)
<div class="lp-viewing"><div class="lp-date"><strong>{{ $viewing->scheduled_at->copy()->timezone('Asia/Colombo')->format('d') }}</strong><small>{{ $viewing->scheduled_at->copy()->timezone('Asia/Colombo')->format('M') }}</small></div><div><strong class="small">{{ $viewing->property?->title ?? 'Property unavailable' }}</strong><div class="lp-muted">{{ $viewing->scheduled_at->copy()->timezone('Asia/Colombo')->format('h:i A') }} · {{ $viewing->assignee?->name ?? 'Unassigned' }}</div>@if($viewing->lead_id)<a class="small" href="{{ route('leads.show',['role'=>'admin','lead'=>$viewing->lead_id]) }}">Open lead</a>@endif</div></div>
@empty <div class="lp-empty">No upcoming viewings scheduled.</div> @endforelse
</section></div></div>
<section class="card"><div class="card-header d-flex justify-content-between align-items-center"><h2 class="h5 mb-0">Latest properties</h2><a class="small" href="{{ route('admin.properties.index') }}">Manage properties &rarr;</a></div><div class="table-responsive"><table class="table mb-0"><thead><tr><th>Property</th><th>Location</th><th>Status</th><th>Action</th></tr></thead><tbody>
@forelse($properties as $property)
<tr><td>{{ $property->title }}<small class="d-block text-secondary">{{ $property->property_code }}</small></td><td>{{ $property->city }}, {{ $property->district }}</td><td><span class="lp-status {{ $property->status }}">{{ ucfirst(str_replace('_',' ',$property->status)) }}</span></td><td><a href="{{ route('dashboard.property',['role'=>'admin','property'=>$property->id]) }}">View property</a></td></tr>
@empty <tr><td colspan="4" class="lp-empty">No properties to show yet.</td></tr> @endforelse
</tbody></table></div><div class="card-body">{{ $properties->withQueryString()->links('pagination::bootstrap-5') }}</div></section>
@endif
