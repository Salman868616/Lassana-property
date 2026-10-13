<section class="card p-4 mb-4">
<h2 class="h5">Find a property for this request</h2>
<p class="small text-secondary">Matching available properties. Confirm suitability with the customer before selecting.</p>
@if($lead->viewings_exists)<p>A viewing has been recorded for this lead, so its selected property is locked.</p>@endif
@forelse($matches as $match)
<div class="border-bottom py-3"><a href="{{ route('properties.show',$match->property_code) }}" target="_blank" rel="noopener">{{ $match->title }}</a><p>{{ $match->city }}, {{ $match->district }} · LKR {{ number_format($match->total_price,2) }}</p>
@if($lead->property_id === $match->id)<span class="badge text-bg-success">Selected</span>
@elseif(!$lead->viewings_exists && in_array($lead->status,\App\Services\LeadStages::OPEN,true))
<form method="POST" action="{{ route('leads.match-property',['role'=>$role,'lead'=>$lead->id]) }}">@csrf<input type="hidden" name="property_id" value="{{ $match->id }}"><button class="btn btn-outline-secondary btn-sm" type="submit">Select this property</button></form>
@endif
</div>
@empty <p>No published properties match these requirements yet. Record a follow-up to discuss alternatives with the customer.</p> @endforelse
{{ $matches->withQueryString()->links('pagination::bootstrap-5') }}
</section>
