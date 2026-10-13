@php $type = 'real-estate'; @endphp
@extends('layouts.app')
@section('title', 'About us | Lassana Property')
@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/company-pages.css') }}">
@endpush
@section('content')
    @include('layouts.partials.header.real-estate-header')
    <main class="content-wrapper lp-company">
        {{-- Adapted from Finder About v.1: hero, values, feature rows and call to action. --}}
        <section class="container py-5">
            <nav aria-label="{{ __('Breadcrumb') }}"><ol class="breadcrumb mb-4"><li class="breadcrumb-item"><a href="{{ route('index') }}">{{ __('Home') }}</a></li><li class="breadcrumb-item active" aria-current="page">{{ __('About us') }}</li></ol></nav>
            <div class="row align-items-center g-4 g-lg-5">
                <div class="col-lg-6">
                    <span class="lp-eyebrow">{{ __('ABOUT LASSANA PROPERTY') }}</span>
                    <h1 class="display-4 mt-3 mb-4">{{ __('Your next chapter') }}<br>{{ __('starts with a place.') }}</h1>
                    <p class="fs-lg text-body-secondary mb-4">{{ __('Find land, houses and apartments in Sri Lanka. Explore properties, connect with our team and take the next step towards a place of your own.') }}</p>
                    <div class="d-flex flex-wrap gap-3"><a class="btn btn-primary btn-lg" href="{{ route('properties.index') }}">{{ __('Explore properties') }} <i class="fi-arrow-right ms-2" aria-hidden="true"></i></a><a class="btn btn-outline-primary btn-lg" href="{{ route('contact-us') }}">{{ __('Talk to us') }}</a></div>
                    <p class="lp-tagline mt-4 mb-0">{{ __('Find. Verify. Build. Own.') }}</p>
                </div>
                <div class="col-lg-6"><img class="w-100 rounded-4 lp-about-image" src="{{ asset('assets/img/about/v1/video-poster.jpg') }}" alt="Residential architecture" fetchpriority="high"></div>
            </div>
        </section>
        <section class="lp-soft-section py-5">
            <div class="container"><div class="row g-4 g-lg-5">
                <div class="col-lg-4"><span class="lp-eyebrow">{{ __('OUR BACKGROUND') }}</span><h2 class="h1 mt-3">{{ __('A foundation in') }}<br>{{ __('creating spaces.') }}</h2></div>
                <div class="col-lg-8">
                    <h3 class="h4">{{ __('Who we are') }}</h3>
                    <p>{{ __('Lassana Gedara Enterprises works in construction and design across Sri Lanka, serving residential, commercial and industrial projects. Its approach brings together architecture, engineering and sustainable building practices, with an emphasis on understanding each customer’s needs.') }}</p>
                    <p class="mb-0">{{ __('Lassana Property brings the property search experience into focus: discover available listings, save the places you like and send your requirements to our team.') }}</p>
                </div>
            </div></div>
        </section>
        <section class="container py-5">
            <div class="row g-4">
                <div class="col-md-6"><article class="card h-100 rounded-4 p-3 p-lg-4"><div class="card-body"><span class="lp-number">01</span><h2 class="h3 mt-4">{{ __('Our mission') }}</h2><p class="mb-0">{{ __('The company’s mission centres on lasting value: thoughtful design, dependable construction and trusted customer relationships. Modern methods, suitable materials and skilled workmanship support its commitment to quality and clear communication.') }}</p></div></article></div>
                <div class="col-md-6"><article class="card h-100 rounded-4 p-3 p-lg-4"><div class="card-body"><span class="lp-number">02</span><h2 class="h3 mt-4">{{ __('Our history & reach') }}</h2><p class="mb-0">{{ __('From small beginnings, Lassana Gedara has developed its design and construction work through customer relationships. Its reach extends across Sri Lanka, from urban developments to homes in rural communities.') }}</p></div></article></div>
            </div>
        </section>
        <section class="container pb-5">
            <div class="text-center mx-auto mb-4" style="max-width:680px"><span class="lp-eyebrow">{{ __('YOUR PROPERTY JOURNEY') }}</span><h2 class="h1 mt-3">{{ __('A simpler way to get started') }}</h2></div>
            <div class="row g-4">
                @foreach([
                    ['fi-search', 'Find your location', 'Browse by district, city and property category to find listings that suit your plans.'],
                    ['fi-heart', 'Keep your favourites', 'Save properties to your buyer account so you can return to them while deciding.'],
                    ['fi-chat', 'Speak with our team', 'Ask about a listing or share your property requirements for help with your search.']
                ] as [$icon, $heading, $description])
                <div class="col-md-4"><div class="border rounded-4 p-4 h-100"><i class="{{ $icon }} lp-feature-icon" aria-hidden="true"></i><h3 class="h5 mt-3">{{ __($heading) }}</h3><p class="mb-0 text-body-secondary">{{ __($description) }}</p></div></div>
                @endforeach
            </div>
        </section>
        <section class="container pb-5"><div class="lp-company-cta rounded-4 p-4 p-lg-5 d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-4"><div><h2 class="h2 text-white">{{ __('Let’s talk about your next move.') }}</h2><p class="mb-0">{{ __('Our team can help you take the next step.') }}</p></div><a class="btn btn-light btn-lg flex-shrink-0" href="{{ route('contact-us') }}">{{ __('Contact us') }}</a></div></section>
    </main>
    @include('layouts.partials.footer.real-estate-footer')
@endsection
@push('scripts')
    @vite(['resources/js/app.js'])
@endpush
