<div class="row g-3">
@foreach([['Visitors today',$metrics['visitorsToday']],['Visitors · last 30 days',$metrics['visitors30']],['Page views · last 30 days',$metrics['pageViews30']]] as [$label,$value])
<div class="col-md-4"><h3 class="h6">{{ $label }}</h3><strong class="fs-3">{{ number_format($value) }}</strong></div>
@endforeach
</div><p class="small text-secondary mt-3">Visitors are anonymous browser sessions, not individual people. Staff and known bots are excluded. @if(!$metrics['tracking'])Tracking is disabled.@endif @if(!app()->environment('production'))Development-site traffic.@endif</p>
<div class="row g-3 mt-1">
<div class="col-md-4"><h3 class="h6">Campaign spending · all time</h3><strong>{{ $metrics['hasSpend'] ? 'LKR '.number_format($metrics['spend'],2) : 'Not recorded yet' }}</strong></div>
<div class="col-md-4"><h3 class="h6">Leads from campaigns with spending</h3><strong>{{ $metrics['paidLeads'] }}</strong></div>
<div class="col-md-4"><h3 class="h6">Cost per lead · all time</h3><strong>{{ $metrics['cpl'] !== null ? 'LKR '.number_format($metrics['cpl'],2) : 'Not available yet' }}</strong></div>
</div>
