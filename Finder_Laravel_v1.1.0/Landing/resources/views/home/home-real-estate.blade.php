@php $type = 'real-estate' @endphp
@extends('layouts.app')

@section('title', __('Land, homes and property services in Sri Lanka').' | Lassana Property')
@section('meta-description', __('Find properties for sale and rent in Sri Lanka, explore verified listings and enquire about LGC home-building services.'))
@section('theme-styles', 'resources/scss/home.scss')

@push('styles')
    @include('home.conversion-styles')
    <style>
        .lp-agent-carousel { --swiper-pagination-color:#8B1E24; --swiper-pagination-bullet-inactive-color:#B8ADA3; padding:4px; }
        .lp-agent-carousel .swiper-slide { height:auto; }
        .lp-agent-carousel .swiper-pagination-bullet { width:12px; height:12px; }
        .lp-agent-carousel .swiper-pagination-bullet:focus-visible { outline:2px solid #8B1E24; outline-offset:4px; }
    </style>
    <style>
        .lp-city-carousel { --swiper-pagination-color:#8B1E24; --swiper-pagination-bullet-inactive-color:#B8ADA3; padding:4px; }
        .lp-city-carousel .swiper-slide { height:auto; }
        .lp-city-carousel .swiper-pagination-bullet { width:12px; height:12px; }
        .lp-city-carousel .swiper-pagination-bullet:focus-visible { outline:2px solid #8B1E24; outline-offset:4px; }
    </style>
    <link rel="stylesheet" href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/nouislider/dist/nouislider.min.css') }}">
    <style>
        .lp-home-hero {padding-top:24px;padding-bottom:8px}
        .lp-home-hero-intro {display:grid;grid-template-columns:1.1fr 1fr;align-items:center;gap:48px;margin-bottom:24px}
        .lp-home-hero h1 {font-size:clamp(30px,3.4vw,48px);line-height:1.15;letter-spacing:-.025em;margin-bottom:18px;max-width:620px}
        .lp-home-hero-photo {display:block;width:100%;height:250px;object-fit:cover;border-radius:20px}
        .lp-home-search {box-shadow:0 8px 24px #1728440a}
        .lp-home-search .btn-primary {background:#8B1E24;border-color:#8B1E24}
        .lp-home-search .btn-primary:hover {background:#5A1015;border-color:#5A1015}
        @media(max-width:767.98px) {
            .lp-home-hero {padding-top:16px}
            .lp-home-hero-intro {grid-template-columns:1fr;gap:20px;margin-bottom:20px}
            .lp-home-hero h1 {margin-bottom:12px}
            .lp-home-hero-picture {display:none}
        }

        .lp-city-card {display:flex;align-items:center;gap:20px;padding:24px;border:1px solid var(--fn-border-color,#dee2e6);border-radius:14px;background:#fff;color:inherit}
        .lp-city-icon {display:flex;align-items:center;justify-content:center;flex:0 0 68px;width:68px;height:68px;border-radius:50%;background:#f6e9eb;color:#8B1E24;font-size:30px}
        .lp-city-details {flex:1;min-width:0;overflow-wrap:anywhere}
        .lp-city-count {display:inline-block;padding:4px 12px;border-radius:24px;background:#f6e9eb;color:#8B1E24;font-size:13px;font-weight:600}
        .lp-city-arrow {display:flex;align-items:center;justify-content:center;flex:0 0 36px;width:36px;height:36px;border-radius:50%;background:#f6e9eb;color:#8B1E24;font-size:23px}
        .lp-city-card:hover {border-color:#8B1E24;background:#fffbfb;box-shadow:0 4px 14px #8b1e240d}
        .lp-city-card:focus-visible {outline:3px solid #C89B3C;outline-offset:3px}
        @media(max-width:575.98px) {
            .lp-city-card {padding:18px;gap:14px}
            .lp-city-icon {flex-basis:50px;width:50px;height:50px;font-size:24px}
            .lp-city-arrow {flex-basis:30px;width:30px;height:30px}
        }

        #property-actions {scroll-margin-top:160px}
        .lp-action-grid {display:grid;grid-template-columns:repeat(3,minmax(0,1fr));gap:24px}
        .lp-action-card {display:flex;flex-direction:column;gap:20px;padding:24px;border:1px solid #eadcde;border-radius:14px;background:#fffbfb}
        .lp-action-body {display:flex;flex-direction:column;align-items:center;gap:12px;text-align:center}
        .lp-action-illustration {display:block;width:160px;height:104px;max-width:100%}
        .lp-action-body h3 {color:#8B1E24}
        .lp-action-footer {margin-top:auto}
        .lp-action-footer .lp-action-button {width:100%;white-space:normal;background:#8B1E24;border:1px solid #8B1E24;color:white}
        .lp-action-footer .lp-action-button:hover {background:#5A1015;border-color:#5A1015;color:white}
        .lp-action-button:focus-visible {outline:3px solid #C89B3C;outline-offset:3px}
        @media(max-width:767.98px) {.lp-action-grid {grid-template-columns:1fr;gap:14px}.lp-action-card {padding:20px;gap:16px}}

        .lp-home-content > section:not(.lp-home-hero) {padding-top:36px!important;padding-bottom:36px!important;margin-top:0!important;margin-bottom:0!important}
        .lp-home-content h2.h1 {font-size:clamp(26px,2.6vw,36px)}
        @media(max-width:767.98px) {
            .lp-home-content > section:not(.lp-home-hero) {padding-top:24px!important;padding-bottom:24px!important}
        }

        .lp-home-content > section.lp-home-categories-section {padding-top:16px!important;padding-bottom:16px!important}
        .lp-home-categories {display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:12px}
        .lp-home-category {display:flex;flex-direction:column;align-items:center;gap:10px;min-width:0;padding:16px 12px;border:1px solid var(--fn-border-color,#dee2e6);border-radius:14px;background:#fff;text-align:center}
        .lp-home-category .lp-home-category-art {flex-shrink:0;width:64px;height:45px;margin:0}
        .lp-home-category-copy {min-width:0;overflow-wrap:anywhere}
        .lp-home-category-copy h3 {line-height:1.5}
        .lp-home-category-copy p {color:var(--fn-secondary-color,#6c727f)}
        .lp-home-category:hover {border-color:#8B1E24;background:#fffbfb}
        .lp-home-category:focus-within {outline:3px solid #C89B3C;outline-offset:3px}
        @media(min-width:992px) {
            .lp-home-categories {grid-template-columns:repeat(4,minmax(0,1fr));gap:16px}
        }
        @media(min-width:1200px) {
            .lp-home-category {flex-direction:row;gap:14px;padding:18px 16px;text-align:left}
        }

    </style>
@endpush

@section('content')
@if(session('success'))
<div class="container pt-3"><div class="alert alert-success" role="status">{{ session('success') }}</div></div>
@endif

    @include('layouts.partials.header.real-estate-header')

    <!-- Page content -->
    <main class="content-wrapper lp-home-content">

        <!-- Compact hero and search -->
        <section class="container lp-home-hero" aria-labelledby="home-hero-title">
            <div class="lp-home-hero-intro">
                <div>
                    <h1 id="home-hero-title">{{ __('Find your land or home in Sri Lanka') }}</h1>
                    <p class="fs-lg mb-0">{{ __('Find a property, understand its verification and plan your next step with LGC services.') }}</p>
                </div>
                <picture class="lp-home-hero-picture">
                    <source media="(min-width: 768px)" srcset="{{ asset('assets/img/home/real-estate/hero/01.jpg') }}">
                    <img class="lp-home-hero-photo" src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg'/%3E" alt="A home surrounded by greenery" fetchpriority="high">
                </picture>
            </div>
                        <form action="{{ route('properties.index') }}" method="GET" class="lp-home-search bg-body border rounded-4 p-2">
                            <div class="row g-0 p-1">
                                <div class="col-lg-7">
                                    @php $heroLocations = \App\Services\LocationCatalog::options(); @endphp
                                    <div class="row g-0" data-location-fields data-city-placeholder="{{ __('City') }}" data-city-empty-placeholder="{{ __('City') }}">
                                        <div class="col-md-4 d-flex">
                                            <select name="category" class="form-select form-select-lg border-0 ps-3" aria-label="{{ __('Property type') }}">
                                                <option value="">{{ __('Property type') }}</option>
                                                <option value="land">{{ __('Land') }}</option>
                                                <option value="house">{{ __('Houses') }}</option>
                                                <option value="apartments-villas">{{ __('Apartments & villas') }}</option>
                                                <option value="commercial">{{ __('Commercial properties') }}</option>
                                            </select>
                                            <hr class="vr d-none d-md-block m-0">
                                        </div>
                                        <div class="col-md-4 d-flex">
                                            <select name="district" class="form-select form-select-lg border-0" aria-label="{{ __('District') }}">
                                                <option value="">{{ __('District') }}</option>
                                                @foreach($heroLocations as $districtName => $cities)
                                                    <option value="{{ $districtName }}">{{ $districtName }}</option>
                                                @endforeach
                                            </select>
                                            <hr class="vr d-none d-md-block m-0">
                                        </div>
                                        <div class="col-md-4 d-flex">
                                            <select name="city" class="form-select form-select-lg border-0" aria-label="{{ __('City') }}">
                                                <option value="">{{ __('City') }}</option>
                                            </select>
                                            <hr class="vr d-none d-lg-block m-0">
                                        </div>
                                        <script type="application/json" data-location-options>{!! json_encode($heroLocations, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_THROW_ON_ERROR) !!}</script>
                                    </div>
                                </div>
                                @once
                                    <script src="{{ asset('assets/js/location-fields.js?v=4') }}" defer></script>
                                @endonce
                                <hr class="d-lg-none mt-2 mb-0">
                                <div class="col-lg-5 d-flex flex-column flex-sm-row align-items-sm-center gap-2 gap-sm-3 pt-3 pt-lg-0 ps-lg-3">
                                    <div class="d-flex align-items-center w-100 gap-2 ps-2 ps-lg-0">
                                        {{ __('Price') }}
                                     <div class="range-slider w-100" data-range-slider='{"startMin": 1500000, "min": 500000, "max": 10000000, "step": 250000, "tooltipPrefix": "LKR "}'>
                                            <div class="range-slider-ui my-4"></div>
                                           <input type="hidden" name="min_price" class="form-control" data-range-slider-min>
                                          
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-lg btn-primary">
                                        {{ __('Search') }}
                                        <i class="fi-search fs-lg ms-2 me-n1"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
        </section>

        <!-- Property category shortcuts below search -->
        <section class="container lp-home-categories-section" aria-labelledby="home-categories-title">
            <h2 id="home-categories-title" class="h6 mb-3">{{ __('Browse property categories') }}</h2>
            <div class="lp-home-categories">
                @foreach(['land' => ['Land', 'Browse land'], 'house' => ['Houses', 'Browse houses'], 'apartments-villas' => ['Apartment & villas', 'Browse apartments & villas'], 'commercial' => ['Commercials', 'Browse commercial properties']] as $categorySlug => $categoryLabels)
                    <div class="lp-home-category position-relative">
                        @include('home.category-illustration')
                        <div class="lp-home-category-copy">
                            <h3 class="fs-base mb-1">
                                <a class="hover-effect-underline stretched-link" href="{{ route(match($categorySlug) {'land'=>'properties.land','house'=>'properties.houses','apartments-villas'=>'properties.apartments-villas',default=>'properties.commercial'}) }}">{{ __($categoryLabels[0]) }}</a>
                            </h3>
                            <p class="fs-sm mb-0">{{ __($categoryLabels[1]) }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

        @include('home.featured-properties')
        @include('home.latest-properties')
        @include('home.verified-properties')
        @include('home.verification-explainer')

        <!-- Compact action cards -->
        <section class="container py-4" id="property-actions" aria-label="{{ __('Buy, sell or rent a property') }}">
            <div class="lp-action-grid">
<article class="lp-action-card">
                            <div class="lp-action-body">
                                <svg class="lp-action-illustration" viewBox="0 0 160 104" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><ellipse cx="80" cy="91" rx="64" ry="8" fill="#F4EBDC"/><circle cx="78" cy="49" r="44" fill="#FAF1E7"/><g stroke="#8B1E24" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M30 49 66 20 101 49" fill="#EBC9C8"/><path d="M38 44v43h56V44L66 22Z" fill="#FFFDFC"/><path d="M57 87V64h18v23" fill="#EBC9C8"/><path d="M49 46h12v12H49zm24 0h12v12H73z" fill="#F4EBDC"/></g><g stroke="#8B1E24" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" fill="#FFFDFC"><circle cx="110" cy="60" r="12"/><path d="m102 69-17 17v7h8v-6h6v-6l9-9"/><circle cx="113" cy="57" r="2" fill="#8B1E24"/></g></svg>
                                <h3 class="h5 mb-0">{{ __('Buy a property') }}</h3>
                            </div>
                            <div class="lp-action-footer">
                                <a class="btn lp-action-button" href="{{ route('properties.index') }}">{{ __('Browse properties') }}</a>
                                
                            </div>
                        </article>
<article class="lp-action-card">
                            <div class="lp-action-body">
                                <svg class="lp-action-illustration" viewBox="0 0 160 104" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><ellipse cx="80" cy="91" rx="64" ry="8" fill="#F4EBDC"/><circle cx="78" cy="49" r="44" fill="#FAF1E7"/><g stroke="#8B1E24" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M30 49 66 20 101 49" fill="#EBC9C8"/><path d="M38 44v43h56V44L66 22Z" fill="#FFFDFC"/><path d="M57 87V64h18v23" fill="#EBC9C8"/><path d="M49 46h12v12H49zm24 0h12v12H73z" fill="#F4EBDC"/></g><g stroke="#8B1E24" stroke-width="3" stroke-linejoin="round"><path d="M112 30v62M100 34h40" fill="none"/><rect x="102" y="40" width="42" height="31" rx="3" fill="#8B1E24"/></g><text x="123" y="53" text-anchor="middle" fill="white" font-family="Arial,sans-serif" font-size="8" font-weight="700">FOR</text><text x="123" y="64" text-anchor="middle" fill="white" font-family="Arial,sans-serif" font-size="10" font-weight="700">SALE</text></svg>
                                <h3 class="h5 mb-0">{{ __('Sell a property') }}</h3>
                            </div>
                            <div class="lp-action-footer">
                                @if(auth()->check() && !auth()->user()->hasRole('seller') && !auth()->user()->hasRole('agent') && !auth()->user()->hasRole('admin'))
                                    <button type="button" class="btn lp-action-button" data-bs-toggle="modal" data-bs-target="#seller-account-required">{{ __('List your property') }}</button>
                                @else
                                    <a class="btn lp-action-button" href="{{ (auth()->check() && auth()->user()->hasRole('admin') ? route('admin.properties.create') : (auth()->check() && auth()->user()->hasRole('agent') ? route('agent.properties.create') : route('seller.properties.create'))) }}">{{ __('List your property') }}</a>
                                @endif
                                
                            </div>
                        </article>
<article class="lp-action-card">
                            <div class="lp-action-body">
                                <svg class="lp-action-illustration" viewBox="0 0 160 104" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><ellipse cx="80" cy="91" rx="64" ry="8" fill="#F4EBDC"/><circle cx="78" cy="49" r="44" fill="#FAF1E7"/><g stroke="#8B1E24" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M30 49 66 20 101 49" fill="#EBC9C8"/><path d="M38 44v43h56V44L66 22Z" fill="#FFFDFC"/><path d="M57 87V64h18v23" fill="#EBC9C8"/><path d="M49 46h12v12H49zm24 0h12v12H73z" fill="#F4EBDC"/></g><g stroke="#8B1E24" stroke-width="3" stroke-linejoin="round"><path d="M112 30v62M100 34h40" fill="none"/><rect x="102" y="40" width="42" height="31" rx="3" fill="#8B1E24"/></g><text x="123" y="53" text-anchor="middle" fill="white" font-family="Arial,sans-serif" font-size="8" font-weight="700">FOR</text><text x="123" y="64" text-anchor="middle" fill="white" font-family="Arial,sans-serif" font-size="10" font-weight="700">RENT</text></svg>
                                <h3 class="h5 mb-0">{{ __('Rent a property') }}</h3>
                            </div>
                            <div class="lp-action-footer">
                                <a class="btn lp-action-button" href="{{ route('properties.rent') }}">{{ __('Browse rentals') }}</a>
                            </div>
                        </article>
            </div>
        </section>







        @include('home.service-promotions')

        <section class="container py-5" aria-labelledby="property-cities-title">
            <h2 id="property-cities-title" class="h1 mb-4">{{ __('Search by city') }}</h2>
            @if($propertyCities->isNotEmpty())
            <div class="swiper lp-city-carousel" aria-label="{{ __('Browse cities') }}" data-swiper='{"slidesPerView":1,"slidesPerGroup":1,"spaceBetween":16,"watchOverflow":true,"pagination":{"el":".swiper-pagination","clickable":true,"bulletElement":"button"},"keyboard":{"enabled":true,"onlyInViewport":true},"breakpoints":{"992":{"slidesPerView":2,"slidesPerGroup":2}}}'>
            <div class="swiper-wrapper">
                @foreach($propertyCities as $propertyCity)
                    <div class="swiper-slide">
                        <a class="lp-city-card h-100 text-decoration-none" href="{{ route('properties.index', ['district' => $propertyCity->district, 'city' => $propertyCity->city]) }}">
                            <span class="lp-city-icon" aria-hidden="true"><i class="fi-map-pin"></i></span>
                            <div class="lp-city-details">
                            <h3 class="h5 mb-1">{{ $propertyCity->city }}</h3>
                            <p class="text-body-secondary mb-2">{{ $propertyCity->district }}</p>
                            <span class="lp-city-count">{{ $propertyCity->property_count }} {{ __($propertyCity->property_count == 1 ? 'property' : 'properties') }}</span>
                            </div>
                            <span class="lp-city-arrow" aria-hidden="true">&#8594;</span>
                        </a>
                    </div>
                @endforeach
            </div>
            <div class="swiper-pagination position-static mt-4"></div>
            </div>
            @else
                <p class="text-body-secondary">{{ __('City listings will appear when properties are published.') }}</p>
            @endif
        </section>

        <section class="container lp-home-agents" aria-labelledby="home-agents-title">
            <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
                <h2 class="h1 mb-0" id="home-agents-title">{{ __('Meet our agents') }}</h2>
                <a href="{{ route('agents.index') }}" class="btn btn-outline-primary">{{ __('View all agents') }}</a>
            </div>
            @include('agents.cards', ['carousel' => true])
        </section>

        @include('home.registration-prompts')
        @include('home.guides')
        @include('home.testimonials')
        @include('home.contact-options')
    </main>


    @include('layouts.partials.footer.real-estate-footer')

@endsection

@push('scripts')

    @vite(['resources/js/home.js'])
@endpush
