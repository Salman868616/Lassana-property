<p class="text-secondary">Management overview · {{ $managementOverview['date'] }}</p>
<div class="row g-3 mb-4">
@foreach([
    ['Total listings',$managementOverview['listings'],'All retained listings, including sold and archived; deleted records excluded.'],
    ["Today's new listings",$managementOverview['newListings'],'Created today, regardless of publication status.'],
    ['Published listings',$managementOverview['published'],'Currently visible on the public website.'],
    ['Verified listings',$managementOverview['verified'],'Basic, Silver or Gold; under review, approved or published.'],
    ['Pending approvals',$managementOverview['pendingApprovals'],'Submitted and under-review listings.'],
    ['Ready to publish',$managementOverview['readyToPublish'],'Approved listings awaiting publication.'],
    ['Total viewings',$managementOverview['viewings'],'All recorded viewings, including cancelled and completed.'],
    ['Upcoming viewings',$managementOverview['upcomingViewings'],'Scheduled appointments from now onwards.'],
] as [$label,$value,$description])
    <div class="col-sm-6 col-xl-3"><section class="card h-100 p-3"><h2 class="h6">{{ $label }}</h2><strong class="fs-2">{{ $value }}</strong></section></div>
@endforeach
</div>
@include('dashboard.management-charts')
@include('dashboard.sales-overview')
<section class="card p-4 mt-4">
    <h2 class="h5">Company revenue</h2>
    <div class="row g-3">
    @foreach(['listing'=>'Listing revenue','verification'=>'Verification revenue','total'=>'Total revenue'] as $key=>$label)
        <div class="col-md-4"><h3 class="h6">{{ $label }}</h3><p class="mb-0">LKR {{ number_format($managementOverview['revenue'][$key], 2) }}</p></div>
    @endforeach
    </div>
    <p class="small text-secondary mt-3">Recorded payments · All time · Voided entries excluded</p>
    <a href="{{ route('admin.revenue.index') }}">Manage revenue</a>
    <p class="small text-secondary mt-3 mb-0">Subscription revenue: Not available yet</p>
</section>

<section class="card p-4 mt-4"><h2 class="h5">Complaints</h2><div class="row g-3">
<div class="col-sm-3"><h3 class="h6">Total complaints</h3><strong class="fs-3">{{ $managementOverview['complaints']->sum() }}</strong></div>
@foreach(\App\Models\Complaint::STATUSES as $key=>$label)<div class="col-sm-3"><h3 class="h6">{{ $label }}</h3><strong class="fs-3">{{ $managementOverview['complaints'][$key] ?? 0 }}</strong></div>@endforeach
</div><a class="mt-3" href="{{ route('admin.complaints.index') }}">Manage complaints</a></section>

<section class="card p-4 mt-4"><h2 class="h5 mb-3">Visitors and campaigns</h2>
@include('dashboard.marketing.metrics',['metrics'=>$managementOverview['marketing']])
<a class="mt-3" href="{{ route('admin.marketing.index') }}">Manage campaigns</a></section>
