@php $type = 'real-estate'; @endphp
@extends('layouts.app')
@section('title', 'Contact us | Lassana Property')
@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/company-pages.css') }}">
@endpush
@section('content')
    @include('layouts.partials.header.real-estate-header')
    <main class="content-wrapper lp-company">
        {{-- Finder Contact v.1: hero with contact cards and office section. --}}
        <section class="container py-5">
            <nav aria-label="{{ __('Breadcrumb') }}"><ol class="breadcrumb mb-4"><li class="breadcrumb-item"><a href="{{ route('index') }}">{{ __('Home') }}</a></li><li class="breadcrumb-item active" aria-current="page">{{ __('Contact us') }}</li></ol></nav>
            <div class="row align-items-center g-4 g-lg-5">
                <div class="col-lg-6"><span class="lp-eyebrow">{{ __('CONTACT US') }}</span><h1 class="display-4 mt-3 mb-4">{{ __('Let’s find your') }}<br>{{ __('next place.') }}</h1><p class="fs-lg text-body-secondary">{{ __('Have a question about a property, listing your land or getting started? Get in touch with the Lassana Gedara team.') }}</p></div>
                <div class="col-lg-6"><img class="w-100 rounded-4 lp-contact-image" src="{{ asset('assets/img/contact/v1/hero.jpg') }}" alt="House exterior with a landscaped garden" fetchpriority="high"></div>
            </div>
            <div class="row g-4 mt-4">
                <div class="col-md-6"><article class="card h-100 rounded-4 p-2 p-lg-3"><div class="card-body"><i class="fi-phone-call lp-feature-icon" aria-hidden="true"></i><h2 class="h4 mt-3">{{ __('Call our team') }}</h2><a class="btn btn-primary" href="tel:{{ config('company.phone_uri') }}">{{ config('company.phone') }}</a></div></article></div>
                <div class="col-md-6"><article class="card h-100 rounded-4 p-2 p-lg-3"><div class="card-body"><i class="fi-mail lp-feature-icon" aria-hidden="true"></i><h2 class="h4 mt-3">{{ __('Email us') }}</h2><p class="text-body-secondary">{{ __('Include the property ID if your question is about a listing.') }}</p><a class="btn btn-outline-primary text-break" href="mailto:{{ config('company.email') }}">{{ config('company.email') }}</a></div></article></div>
            </div>
        </section>
        <section class="lp-soft-section py-5"><div class="container"><div class="row g-4 g-lg-5 align-items-center">
            <div class="col-lg-5"><span class="lp-eyebrow">{{ __('FIND US IN GAMPAHA') }}</span><h2 class="h1 mt-3">{{ __('Visit our office') }}</h2><p class="text-body-secondary">{{ __('Contact us before visiting to arrange a convenient time.') }}</p><address class="fs-lg mb-4">{{ config('company.address') }}</address><a class="btn btn-primary" href="{{ config('company.map_url') }}" target="_blank" rel="noopener noreferrer">{{ __('Open in Google Maps') }} <i class="fi-arrow-up-right ms-2" aria-hidden="true"></i></a></div>
            <div class="col-lg-7"><div class="card rounded-4 p-4 p-lg-5"><span class="lp-eyebrow">{{ __('HOW CAN WE HELP?') }}</span><h3 class="h3 mt-3">{{ __('Make your enquiry more useful') }}</h3><ul class="mb-4"><li class="mb-2">{{ __('For a listed property, tell us its property ID.') }}</li><li class="mb-2">{{ __('For your search, include your preferred district, city and budget.') }}</li><li>{{ __('For a visit, share your preferred dates and a contact number.') }}</li></ul><div class="d-flex flex-wrap gap-3"><a class="btn btn-outline-primary" href="{{ route('properties.index') }}">{{ __('Browse properties') }}</a>@if(auth()->check() && !auth()->user()->hasRole('buyer'))
<button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#buyer-account-required">{{ __('Request a property') }}</button>
@else
<a class="btn btn-outline-primary" href="{{ route('buyer.requests.create') }}">{{ __('Request a property') }}</a>
@endif</div></div></div>
        </div></div></section>
    </main>
    @include('layouts.partials.footer.real-estate-footer')
@endsection
@push('scripts')
    @vite(['resources/js/app.js'])
@endpush
