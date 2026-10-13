<section class="container" aria-labelledby="home-building-title">
<h2 class="h1" id="home-building-title">{{ __('From finding land to planning your home') }}</h2>
<p class="lp-conversion-intro">{{ __('Lassana Property connects your property search with LGC professional services. Share your site, ideas and requirements so the team can discuss the next step.') }}</p>
<div class="lp-conversion-grid">@foreach([
['house-plans','House plans','Discuss the rooms, spaces and layout you want for your future home.','fi-home'],
['architectural-design','Architectural design','Prepare a design brief around your site and the way you want to live.','fi-edit'],
['boq','BOQ services','Ask about a bill of quantities for your planned building work.','fi-file']
] as [$slug,$heading,$body,$icon])<article class="lp-conversion-card"><span class="lp-conversion-number"><i class="{{ $icon }}" aria-hidden="true"></i></span><h3>{{ __($heading) }}</h3><p>{{ __($body) }}</p><a href="{{ route('services.show',['page'=>$slug]) }}">{{ __('Explore this service') }}<span class="visually-hidden">: {{ __($heading) }}</span></a></article>@endforeach</div>
<div class="lp-conversion-links"><a class="btn btn-primary" href="{{ !auth()->check() || auth()->user()->hasRole('buyer') ? route('buyer.services.create',['type'=>'lgc_service']) : route('contact-us') }}">{{ __('Discuss your building project') }}</a><a href="{{ route('services.show',['page'=>'build-your-home']) }}">{{ __('How LGC services work') }}</a></div>
</section>
<section class="container" aria-labelledby="home-overseas-title"><div class="lp-conversion-banner">
<div><h2 class="h1" id="home-overseas-title">{{ __('Exploring Sri Lankan property from overseas?') }}</h2><p>{{ __('Browse listings, share the property references that interest you and arrange a conversation with our team from wherever you are.') }}</p>
<div class="lp-conversion-links"><a class="btn btn-primary" href="{{ route('services.show',['page'=>'overseas-property']) }}">{{ __('Explore overseas buyer support') }}</a><a href="mailto:{{ config('company.email') }}?subject={{ rawurlencode('Overseas property enquiry') }}">{{ __('Email the team') }}</a></div></div>
<ol class="lp-conversion-steps"><li>{{ __('Shortlist the properties you would like to discuss.') }}</li><li>{{ __('Share your country, time zone and preferred contact time.') }}</li><li>{{ __('Ask the team about available viewing or inspection arrangements.') }}</li></ol>
</div></section>
