<section id="sales-overview" class="card p-4 mb-4">
    <h2 class="h5">{{ $role === 'agent' ? 'My sales overview' : 'Sales overview' }} · {{ $salesOverview['date'] }}</h2>
    <p class="small text-secondary">Sri Lanka time · Hot leads: Interested or Negotiation · Follow-ups: open leads only.</p>
    <div class="row g-3">
        @foreach(['newEnquiries'=>"Today's property enquiries",'newRequests'=>"Today's property requests",'due'=>'Follow-ups due now','today'=>"Today's follow-ups",'hot'=>'Hot leads','unassigned'=>'Unassigned open leads'] as $key=>$label)
        <div class="col-sm-6 col-xl"><div class="border rounded p-3 h-100"><span>{{ $label }}</span><strong class="d-block fs-3">{{ $salesOverview[$key] }}</strong></div></div>
        @endforeach
    </div>
    <h3 class="h6 mt-4">Lead pipeline</h3><div class="d-flex flex-wrap gap-2">
    @foreach(\App\Services\LeadStages::LABELS as $key=>$label)
        <a class="btn btn-outline-secondary btn-sm" href="{{ route('dashboard.role',['role'=>$role,'lead_status'=>$key]).'#lead-list' }}">{{ $label }}: {{ $salesOverview['stages'][$key] ?? 0 }}</a>
    @endforeach
    </div>
    <div class="row g-3 mt-2"><div class="col-md-6"><strong>Conversion rate: {{ $salesOverview['conversionRate'] === null ? 'Not available' : $salesOverview['conversionRate'].'%' }}</strong><p class="small mb-0">{{ $salesOverview['converted'] }} converted leads / {{ $salesOverview['total'] }} total leads · All time, including closed conversions.</p></div>
    <div class="col-md-6"><strong>Average first response: {{ $salesOverview['responseMinutes'] === null ? 'Not recorded yet' : $salesOverview['responseMinutes'].' minutes' }}</strong><p class="small mb-0">Based on the first logged call, email or meeting for {{ $salesOverview['responseCount'] }} leads.</p></div></div>
    @if($role !== 'agent')
        <h3 class="h6 mt-4">Leads by assigned employee · all time</h3>
        <div class="table-responsive"><table class="table"><thead><tr><th>Employee</th><th>Leads</th><th>Converted</th><th>Conversion rate</th></tr></thead><tbody>
        @forelse($salesOverview['employees'] as $employee)
        <tr><td>{{ $employee->assignee?->name ?? 'Unassigned' }}</td><td>{{ $employee->total }}</td><td>{{ $employee->converted }}</td><td>{{ round(100*$employee->converted/$employee->total,1) }}%</td></tr>
        @empty <tr><td colspan="4">No leads recorded yet.</td></tr> @endforelse
        </tbody></table></div>
        
    @endif
</section>
