<section class="container" aria-labelledby="home-verification-title">
<h2 class="h1" id="home-verification-title">{{ __('How Lassana Verified works') }}</h2>
<p class="lp-conversion-intro">{{ __('Understand the checks behind a listing before deciding your next step.') }}</p>
<div class="lp-conversion-grid">@foreach([
['1','Listing review','The team reviews the submitted property information and records its verification level.'],
['2','Document review','Silver verification adds a review of the required property documents.'],
['3','Check the scope','Read the current badge and ranking details. Ask the team about any further checks you need.']
] as [$number,$heading,$body])<article class="lp-conversion-card"><span class="lp-conversion-number" aria-hidden="true">{{ $number }}</span><h3>{{ __($heading) }}</h3><p>{{ __($body) }}</p></article>@endforeach</div>
<div class="lp-conversion-links"><a class="btn btn-outline-primary" href="{{ route('verification-ranks') }}">{{ __('Understand verification levels') }}</a><a href="{{ route('services.show',['page'=>'property-inspection']) }}">{{ __('Explore property inspections') }}</a></div>
</section>
