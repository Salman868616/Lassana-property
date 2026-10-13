@php $type = 'real-estate'; @endphp
@extends('layouts.app')
@section('title', $property->title . ' | Lassana Property')
@section('social-meta')
    <meta name="description" content="{{ $share['description'] }}">
    <link rel="canonical" href="{{ $share['url'] }}">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Lassana Property">
    <meta property="og:title" content="{{ $share['title'] }}">
    <meta property="og:description" content="{{ $share['description'] }}">
    <meta property="og:url" content="{{ $share['url'] }}">
    <meta property="og:image" content="{{ $share['image'] }}">
    <meta property="og:image:alt" content="{{ $property->title }}">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $share['title'] }}">
    <meta name="twitter:description" content="{{ $share['description'] }}">
    <meta name="twitter:image" content="{{ $share['image'] }}">
    <meta name="twitter:image:alt" content="{{ $property->title }}">
@endsection
@push('styles')
<link rel="stylesheet" href="{{ asset('assets/vendor/glightbox/dist/css/glightbox.min.css') }}">
<style>
    .lp-property {overflow-wrap:anywhere}
    .lp-property .btn-primary {background:#8b1e24; border-color:#8b1e24}
    .lp-property .btn-primary:hover {background:#5a1015; border-color:#5a1015}
    .lp-facts {display:flex; flex-wrap:wrap; gap:14px 24px}
    .lp-facts span {display:inline-flex; align-items:center; gap:8px}
    .lp-detail-grid {display:grid; grid-template-columns:repeat(2,minmax(0,1fr)); gap:0 32px}
    .lp-detail-grid > div {display:flex; flex-wrap:wrap; justify-content:space-between; gap:8px; padding:14px 0; border-bottom:1px solid var(--fn-border-color,#e0e5eb)}
    .lp-detail-grid dt {font-weight:400; color:var(--fn-secondary-color,#64748b)}
    .lp-detail-grid dd {margin:0; font-weight:600}
    .lp-listed-by {display:flex; align-items:center; gap:14px; padding:16px 0 20px; margin-bottom:20px; border-bottom:1px solid var(--fn-border-color,#e7ded6)}
    .lp-listed-icon {font-size:22px; color:#8b1e24; flex-shrink:0}
    .lp-listed-person {min-width:0; flex:1}
    .lp-listed-person h3 {font-size:12px; font-weight:400; color:var(--fn-secondary-color,#657082); margin:0 0 3px}
    .lp-listed-person p {font-size:18px; font-weight:600; margin:0; overflow-wrap:anywhere}
    .lp-listed-role {margin-left:auto; padding:5px 9px; border-radius:20px; background:#f8eee4; color:#8b1e24; font-size:12px; flex-shrink:0; max-width:45%; text-align:center}
    .lp-contact-card {padding:24px; border:1px solid var(--fn-border-color,#e7ded6); border-radius:14px; background:var(--fn-body-bg,#fff)}
    .lp-contact-brand {font-size:11px; font-weight:600; letter-spacing:1.5px; color:#8b1e24; margin-bottom:7px}
    .lp-contact-card h3 {font-size:21px; margin-bottom:22px}
    .lp-contact-card .lp-contact-actions {gap:10px}
    .lp-contact-card .lp-contact-actions > .btn {flex:1 1 0; font-size:14px; border-radius:8px}
    .lp-contact-card .lp-contact-services {margin-top:22px; padding-top:18px; border-top:1px solid var(--fn-border-color,#e7ded6)}
    .lp-contact-card .lp-contact-services > .btn {font-size:12px}
    @media(max-width:380px) {.lp-contact-card {padding:16px}}
    .lp-contact-details {display:flex; flex-wrap:nowrap; align-items:baseline; justify-content:space-between; gap:12px; font-size:14px}
    .lp-contact-phone {flex-shrink:0; white-space:nowrap}
    .lp-contact-email {min-width:0; margin-left:auto; text-align:right; overflow-wrap:anywhere}
    .lp-contact-actions {display:flex; flex-wrap:nowrap; gap:6px}
    .lp-contact-actions > .btn {display:inline-flex; align-items:center; justify-content:center; gap:5px; flex:1 1 auto; min-width:0; min-height:44px; padding:8px 6px; font-size:13px; white-space:nowrap}
    #property-enquiry, #property-enquiry-form {scroll-margin-top:160px}
    @media(max-width:767px) {.lp-detail-grid {grid-template-columns:1fr}}
    .lp-share-actions {display:flex;flex-wrap:wrap;align-items:center;gap:10px}
    .lp-share-label {font-size:14px;margin-right:4px;color:var(--fn-secondary-color,#64748b)}
    .lp-share-icon {display:inline-flex;align-items:center;justify-content:center;flex-shrink:0;width:44px;height:44px;padding:0;border:1px solid #8b1e24;border-radius:50%;background:#fff;color:#8b1e24;font-size:20px;text-decoration:none;transition:background .15s,color .15s}
    .lp-share-icon:hover {background:#8b1e24;color:#fff}
    .lp-share-whatsapp {background:#167d3f;border-color:#167d3f;color:#fff}
    .lp-share-whatsapp:hover {background:#116532;border-color:#116532}
    @media(max-width:575.98px) {.lp-share-label {flex-basis:100%;margin:0}}
    @media(prefers-reduced-motion:reduce) {.lp-share-icon {transition:none}}
    .lp-share-icon:focus-visible {outline:3px solid #c89b3c;outline-offset:3px}
    .lp-share-icon[hidden] {display:none}
    .lp-share-status:empty {display:none}
</style>
@endpush
@section('content')
@include('layouts.partials.header.real-estate-header')
<main id="top" class="content-wrapper lp-property">
<div class="container py-4 py-lg-5">
    <nav aria-label="{{ __('breadcrumb') }}"><ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('index') }}">{{ __('Home') }}</a></li>
        <li class="breadcrumb-item"><a href="{{ route($property->isForRent() ? 'properties.rent' : 'properties.index', ['category'=>$property->category]) }}">{{ __(ucfirst($property->category)) }} properties{{ $property->isForRent() ? ' for rent' : '' }}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ $property->title }}</li>
    </ol></nav>
    <h1 class="h2 mb-3">{{ $property->title }}</h1>
    @include('properties.save-button')

    @include('properties.gallery')

    @include('properties.share-buttons')
    @include('properties.videos')
    <div class="row g-4 g-xl-5 pt-4 pt-lg-5">
        <div class="col-lg-8">
            <div class="d-flex flex-wrap gap-2 mb-4">
                <span class="badge bg-body-secondary text-body">{{ __(ucfirst($property->category)) }}</span>
                <span class="badge bg-body-secondary text-body">{{ __($property->isForRent() ? 'For rent' : 'For sale') }}</span>
                @if(in_array($property->verification_level, ['basic','silver','gold'], true))
                    @if($property->verification_level === 'silver')
                        <span class="badge d-inline-flex align-items-center gap-1" style="background:#e5e7eb;color:#374151;border:1px solid #9ca3af">
                            <i class="fi-check-shield" aria-hidden="true"></i> {{ __('Silver Verified') }}
                        </span>
                    @else
                        <span class="badge" style="background:#3d7b80">{{ ucfirst($property->verification_level) }} verification</span>
                    @endif
                @endif
            </div>
            @if($property->developer?->is_published)
                <p>{{ __('Developer:') }} <a href="{{ route('developers.show',$property->developer) }}">{{ $property->developer->name }}</a></p>
            @endif
            <p class="h2 mb-3">{{ $property->priceLabel() }}</p>
            <p class="text-body-secondary mb-3"><i class="fi-map-pin me-1" aria-hidden="true"></i>{{ $property->location ?: collect([$property->city,$property->district])->filter()->implode(', ') }}</p>
            <div class="lp-facts mb-3">
                @if($property->category !== 'land' && $property->details)
                    @foreach(['bedrooms'=>['fi-bed-single','bedrooms'],'bathrooms'=>['fi-shower','bathrooms'],'parking_spaces'=>['fi-car-garage','parking spaces']] as $field=>[$icon,$label])
                        @if(in_array($field, \App\Services\PropertyCategoryFields::FIELDS[$property->category] ?? [], true) && $property->details->{$field} !== null && $property->details->{$field} !== [])
                            <span><i class="{{ $icon }}" aria-hidden="true"></i>{{ $field === 'amenities' ? implode(', ', $property->details->{$field} ?? []) : $property->details->{$field} }} {{ __($label) }}</span>
                        @endif
                    @endforeach
                    @if($property->details->floor_area !== null)<span>{{ $property->details->floor_area }} {{ __('sq ft') }}</span>@endif
                @elseif($property->land_size_perches !== null)
                    <span>{{ number_format($property->land_size_perches, 2) }} {{ __('perches') }}</span>
                @endif
            </div>
            <p class="small text-body-secondary mb-4">{{ __('Reference:') }} {{ $property->property_code }}</p>
            <hr class="mb-4">
            <section class="mb-5">
                <h2 class="h4 mb-3">{{ __('About this property') }}</h2>
                <p style="white-space:pre-line">{{ $property->description ?: __('No description provided.') }}</p>
            </section>
            @include('properties.site-concerns')
            <section class="mb-5">
                <h2 class="h4 mb-3">{{ __('Property details') }}</h2>
                <dl class="lp-detail-grid">
                    <div><dt>{{ __('Category') }}</dt><dd>{{ __(ucfirst($property->category)) }}</dd></div>
                    @if($property->category !== 'land' && $property->details)
                        @foreach(\App\Services\PropertyCategoryFields::FIELDS[$property->category] ?? [] as $field)
                            @if($property->details->{$field} !== null && $property->details->{$field} !== [])
                                <div><dt>{{ __($field === 'amenities' ? 'Facilities' : ($field === 'property_age' ? 'Property age (years)' : ucfirst(str_replace('_',' ',$field)))) }}</dt><dd>{{ $field === 'amenities' ? implode(', ', $property->details->{$field} ?? []) : $property->details->{$field} }}{{ $field === 'floor_area' ? ' '.__('sq ft') : '' }}</dd></div>
                            @endif
                        @endforeach
                    @endif
                    @if(in_array($property->category,['land','house','villa'],true) && $property->land_size_perches !== null)
                        <div><dt>{{ __('Land size') }}</dt><dd>{{ number_format($property->land_size_perches, 2) }} {{ __('perches') }}</dd></div>
                    @endif
                    @if(!$property->isForRent() && $property->category === 'land' && $property->price_per_perch !== null)
                        <div><dt>{{ __('Price per perch') }}</dt><dd>{{ $property->currency }} {{ number_format($property->price_per_perch, 2) }}</dd></div>
                    @endif
                    @foreach(['road_access'=>'Road access','facing_direction'=>'Facing direction'] as $field=>$label)
                        @if($property->{$field})<div><dt>{{ __($label) }}</dt><dd>{{ ucfirst($property->{$field}) }}</dd></div>@endif
                    @endforeach
                    @if($property->category === 'land' && $property->land_shape)<div><dt>{{ __('Land shape') }}</dt><dd>{{ $property->land_shape }}</dd></div>@endif
                    @foreach(['electricity_available'=>'Electricity','water_available'=>'Water','survey_available'=>'Survey available'] as $field=>$label)
                        @if($property->{$field} !== null && ($field !== 'survey_available' || $property->category === 'land'))
                            <div><dt>{{ __($label) }}</dt><dd>{{ __($property->{$field} ? 'Yes' : 'No') }}</dd></div>
                        @endif
                    @endforeach
                </dl>
            </section>
            <section class="mb-4">
                <h2 class="h4">{{ __('Location') }}</h2>
                <p>{{ collect([$property->location,$property->city,$property->district])->filter()->unique()->implode(', ') }}</p>
                @if($property->latitude !== null && $property->longitude !== null)
                    <a class="btn btn-outline-secondary" href="https://www.google.com/maps?q={{ $property->latitude }},{{ $property->longitude }}" target="_blank" rel="noopener noreferrer">{{ __('View on Google Maps') }} <i class="fi-map-pin ms-2" aria-hidden="true"></i></a>
                @else
                    <p class="small text-body-secondary">{{ __('Map location is not available for this property yet.') }}</p>
                @endif
            </section>
        </div>
        <aside class="col-lg-4" aria-label="{{ __('Property enquiries') }}">
            <div class="bg-body-tertiary rounded p-4 p-xl-4" id="property-enquiry">
                <div class="d-flex align-items-center gap-3 mb-4">
                    <img src="{{ asset('assets/img/lassana-property-logo.png') }}" width="72" height="72" style="object-fit:contain" alt="Lassana Property">
                    <div><h2 class="h5 mb-1">Lassana Property</h2><p class="small text-body-secondary mb-0">{{ __('Property enquiries') }}</p></div>
                </div>
                @php($listingContact = $property->agent ?? $property->owner)
                <section class="lp-listed-by" aria-labelledby="listed-by-title">
                    <i class="fi-user lp-listed-icon" aria-hidden="true"></i>
                    <div class="lp-listed-person">
                        <h3 id="listed-by-title">{{ __('Listed by') }}</h3>
                        <p>{{ $listingContact?->name ?? 'Lassana Property' }}</p>
                        @if($property->agent && $property->agent->is_active && $property->agent->hasRole('agent'))
                            <a class="small" href="{{ route('agents.show', $property->agent) }}">{{ __('View agent profile') }}</a>
                        @endif
                    </div>
                    <span class="lp-listed-role">{{ __($property->agent ? 'Assigned agent' : ($property->owner ? 'Seller / owner' : 'Property enquiries')) }}</span>
                </section>
                @include('properties.contact-card')
                <h3 class="h5">{{ __('Interested in this property?') }}</h3>
                

@if (session('enquiry_success'))
    <div class="alert alert-success">
        {{ session('enquiry_success') }}
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        {{ __('Please correct the highlighted information and try again.') }}
    </div>
@endif

<form id="property-enquiry-form" method="POST"
      action="{{ route('properties.enquiries.store', $property) }}">
    @csrf

    <div class="mb-3">
        <label for="enquiry-name" class="form-label">{{ __('Your name') }}</label>
        <input id="enquiry-name"
               name="name"
               type="text"
               class="form-control @error('name') is-invalid @enderror"
               @error('name') aria-invalid="true" aria-describedby="enquiry-name-error" @enderror
               value="{{ old('name') }}"
               maxlength="150"
               required>
        @error('name')<div id="enquiry-name-error" class="invalid-feedback">{{ $message }}</div>@enderror
    </div>

    <div class="mb-3">
        <label for="enquiry-email" class="form-label">{{ __('Email address') }}</label>
        <input id="enquiry-email"
               name="email"
               type="email"
               class="form-control @error('email') is-invalid @enderror"
               @error('email') aria-invalid="true" aria-describedby="enquiry-email-error" @enderror
               value="{{ old('email') }}"
               maxlength="254"
               required>
        @error('email')<div id="enquiry-email-error" class="invalid-feedback">{{ $message }}</div>@enderror
    </div>

    <div class="mb-3">
        <label for="enquiry-phone" class="form-label">{{ __('Phone number') }}</label>
        <input id="enquiry-phone"
               name="phone"
               type="tel"
               class="form-control @error('phone') is-invalid @enderror"
               @error('phone') aria-invalid="true" aria-describedby="enquiry-phone-error" @enderror
               value="{{ old('phone') }}"
               maxlength="30">
        @error('phone')<div id="enquiry-phone-error" class="invalid-feedback">{{ $message }}</div>@enderror
    </div>

    <div class="mb-3">
        <label for="enquiry-message" class="form-label">{{ __('Message') }}</label>
        <textarea id="enquiry-message"
                  name="message"
                  class="form-control @error('message') is-invalid @enderror"
               @error('message') aria-invalid="true" aria-describedby="enquiry-message-error" @enderror
                  rows="4"
                  maxlength="5000"
                  required>{{ old('message') }}</textarea>
        @error('message')<div id="enquiry-message-error" class="invalid-feedback">{{ $message }}</div>@enderror
    </div>

    <button type="submit" class="btn btn-primary w-100">
        {{ __('Send enquiry') }}
    </button>
</form>
            </div>
        </aside>
    </div>
</div>
</main>
    @include('layouts.partials.footer.real-estate-footer')
@endsection
@push('scripts')
    <script src="{{ asset('assets/js/property-sharing.js') }}" defer></script>
    <script src="{{ asset('assets/vendor/glightbox/dist/js/glightbox.min.js') }}"></script>
    @vite(['resources/js/app.js'])
@endpush