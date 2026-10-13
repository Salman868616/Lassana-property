<section class="lp-contact-card mb-4" aria-labelledby="listing-contact-title">
    <div class="lp-contact-brand">LASSANA PROPERTY</div>
    <h3 class="h5" id="listing-contact-title">{{ __('Contact our sales team') }}</h3>
    <div class="lp-contact-details mb-3">
        @if($contact['phone'])
            <a class="lp-contact-phone" href="tel:{{ $contact['phone'] }}">{{ $contact['phone'] }}</a>
        @endif
        @if($contact['email'])
            <a class="lp-contact-email" href="mailto:{{ $contact['email'] }}">{{ $contact['email'] }}</a>
        @endif
    </div>
    <div class="lp-contact-actions">
        @if($contact['phone'])<a class="btn btn-primary" href="tel:{{ $contact['phone'] }}"><i class="fi-phone" aria-hidden="true"></i>{{ __('Call') }}</a>@endif
        @if($contact['whatsapp'])<a class="btn btn-outline-primary" href="{{ $contact['whatsapp'] }}" target="_blank" rel="noopener noreferrer"><i class="fi-whatsapp" aria-hidden="true"></i>WhatsApp<span class="visually-hidden"> (opens a new tab)</span></a>@endif
    </div>
                @if(!auth()->check() || auth()->user()->hasRole('buyer'))
                <div class="lp-contact-actions lp-contact-services">
                    <a class="btn btn-outline-primary" href="{{ route('buyer.services.create', ['type'=>'inspection', 'property_code'=>$property->property_code]) }}">{{ __('Request inspection') }}</a>
                    <a class="btn btn-outline-secondary" href="{{ route('buyer.services.create', ['type'=>'lgc_service', 'property_code'=>$property->property_code]) }}">{{ __('Request LGC service') }}</a>
                </div>
                @endif
</section>
