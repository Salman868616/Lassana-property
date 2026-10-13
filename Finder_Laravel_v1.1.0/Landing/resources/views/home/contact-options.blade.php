<section class="container" aria-labelledby="home-contact-title"><div class="lp-conversion-banner">
<div><h2 class="h1" id="home-contact-title">{{ __('Let’s talk about your next step') }}</h2><p class="mb-0">{{ __('Ask about a property, listing your own property or getting help with a building project.') }}</p></div>
<div class="lp-conversion-links">
@if(config('company.whatsapp'))<a class="btn btn-outline-primary" href="https://wa.me/{{ preg_replace('/\D/','',config('company.whatsapp')) }}?text={{ rawurlencode('Hello, I would like to make an enquiry about Lassana Property.') }}" target="_blank" rel="noopener noreferrer"><i class="fi-whatsapp me-2" aria-hidden="true"></i>WhatsApp</a>@endif
<a class="btn btn-outline-primary" href="tel:{{ config('company.phone_uri') }}">{{ __('Call our team') }}</a><a class="btn btn-primary" href="{{ route('contact-us') }}">{{ __('Make an enquiry') }}</a>
</div></div></section>
