@php $type = 'real-estate'; @endphp
@extends('layouts.app')

@section('title', \App\Services\PageSeo::forRequest(request())['title'])

@push('styles')
    <link rel="stylesheet"
          href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}">
    <style>
        .lp-page-dot { display:inline-flex; width:32px; height:32px; align-items:center; justify-content:center; border-radius:50%; }
        .lp-page-dot::before { content:''; width:11px; height:11px; border-radius:50%; background:#B8ADA3; }
        .lp-page-dot[aria-current="page"]::before { background:#8B1E24; width:14px; height:14px; }
        .lp-page-dot:focus-visible { outline:2px solid #8B1E24; outline-offset:2px; }

        .lassana-navbar .lassana-nav-logo {width:84px;height:84px}
        .lp-property-heading {flex-wrap:wrap;display:flex;justify-content:space-between;align-items:center;gap:12px;margin-bottom:18px}
        .lp-filter-bar {position:relative;display:grid;grid-template-columns:minmax(140px,1fr) minmax(280px,2fr) minmax(170px,1fr) auto auto;gap:12px;align-items:start;margin-bottom:24px;z-index:5}
        .lp-filter-bar > * {min-width:0}
        .lp-filter-bar .form-select,.lp-filter-bar > .btn,.lp-more-filters > summary {min-height:46px}
        .property-search-locations > .row {display:grid;grid-template-columns:1fr 1fr;gap:12px;margin:0!important}
        .property-search-locations > .row > div {width:auto;padding:0;margin:0;min-width:0}
        .property-search-locations label {position:absolute;width:1px;height:1px;padding:0;margin:-1px;overflow:hidden;clip:rect(0,0,0,0);white-space:nowrap;border:0}
        .lp-more-filters > summary {list-style:none;display:flex;align-items:center;justify-content:center;gap:8px;background:#8B1E24;color:white;border:1px solid #8B1E24;border-radius:8px;padding:10px 16px;cursor:pointer;white-space:nowrap}
        .lp-more-filters > summary::-webkit-details-marker {display:none}
        .lp-more-filters > summary:hover,.lp-more-filters[open] > summary {background:#5A1015}
        .lp-more-filters > summary:focus-visible {outline:3px solid #C89B3C;outline-offset:3px}
        .lp-filter-panel {position:absolute;top:calc(100% + 10px);left:0;right:0;background:white;border:1px solid #e1e4e9;border-radius:12px;padding:24px;box-shadow:0 16px 40px #17284426;max-height:65vh;overflow:auto}
        .lp-filter-panel [hidden] {display:none!important}
        .lp-filter-bar > .btn.lp-search-submit {color:#8B1E24;border-color:#8B1E24}
        .lp-filter-bar > .btn.lp-search-submit:hover {background:#fff1f2;color:#8B1E24}
        .lp-property-results .card {border-radius:12px;overflow:hidden}
        .lp-property-results .card-body {overflow-wrap:anywhere}
        .lp-property-results .h5 {color:#8B1E24}
        @media(max-width:1199.98px) {
            .lp-filter-bar {grid-template-columns:1fr 1fr auto auto;gap:10px}
            .lp-filter-type {grid-column:1 / 3}
            .property-search-locations {grid-column:3 / 5}
            .lp-filter-sort {grid-column:1 / 3}
            .lp-more-filters {grid-column:3}
            .lp-filter-bar > .lp-search-submit {grid-column:4}
        }
        @media(max-width:575.98px) {
            .lp-property-heading {align-items:baseline}.lp-property-heading .fs-sm {text-align:right;font-size:12px!important}
            .lp-filter-bar {grid-template-columns:1fr 1fr}
            .lp-filter-type {grid-column:1 / 3}
            .property-search-locations {grid-column:1 / 3}
            .lp-filter-sort {grid-column:1 / 3}
            .lp-more-filters {grid-column:1}
            .lp-filter-bar > .lp-search-submit {grid-column:2}
            .lp-filter-panel {padding:18px;max-height:60vh}
        }
    </style>
@endpush

@section('content')
    @include('layouts.partials.header.real-estate-header')

    <main class="content-wrapper">
        <div class="container py-4 py-lg-5">
            <div class="lp-property-heading">
                <h1 class="h2 mb-0">{{ __($pageHeading ?? ($rentalPage ? 'Properties for rent' : 'Properties')) }}</h1>
                <div class="fs-sm text-body-secondary">{{ __('Showing :shown of :total properties', ['shown'=>$properties->count(),'total'=>$properties->total()]) }}</div>
            </div>
            @if($verifiedPage ?? false)
                <p class="text-body-secondary">{{ __('Published listings with completed Basic or Silver checks.') }} <a href="{{ route('verification-ranks') }}">{{ __('See what each verification level covers') }}</a></p>
            @endif
            @if($errors->any())
                <div class="alert alert-danger" role="alert">
                    <p class="mb-1">{{ __('Please check your search filters.') }}</p>
                    <ul class="mb-0">@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
                </div>
            @endif
           <form method="GET"
      action="{{ route($listingRoute) }}"
      class="lp-filter-bar" id="property-search">

    <div class="lp-filter-type">
        <label for="category" class="visually-hidden">{{ __('Property type') }}</label>
        <select id="category" name="category" class="form-select">
            <option value="">{{ __('Property type') }}</option>
            @foreach(['land'=>'Land','house'=>'House','apartments-villas'=>'Apartments & villas','apartment'=>'Apartment','villa'=>'Villa','commercial'=>'Commercial'] as $value=>$label)
                <option value="{{ $value }}" @selected($category === $value)>{{ __($label) }}</option>
            @endforeach
        </select>
    </div>
    <div class="property-search-locations">
        <x-location-fields :district="request('district', '')" :city="request('city', '')" />
    </div>
    <div class="lp-filter-sort">
        <label for="sort" class="visually-hidden">{{ __('Sort by') }}</label>

        <select id="sort" name="sort" class="form-select">
            <option value="newest" @selected($sort === 'newest')>
                {{ __('Newest first') }}
            </option>
            <option value="price_asc" @selected($sort === 'price_asc')>
                {{ __('Price: low to high') }}
            </option>
            <option value="price_desc" @selected($sort === 'price_desc')>
                {{ __('Price: high to low') }}
            </option>
        </select>
    </div>
    <details class="lp-more-filters" id="more-property-filters" @if($errors->any()) open @endif>
        <summary><i class="fi-sliders" aria-hidden="true"></i> {{ __('More filters') }}<span class="lp-filter-count"></span></summary>
        <div class="lp-filter-panel">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h2 class="h5 mb-0">{{ __('Refine your search') }}</h2>
                <button class="btn-close" type="button" aria-label="{{ __('Close filters') }}" id="close-property-filters" hidden></button>
            </div>
            <div class="row g-3">
    <div class="col-12">
        <label for="location" class="form-label">{{ __('Area') }}</label>
        <input id="location" name="location" class="form-control" maxlength="100" value="{{ old('location', $location) }}" placeholder="{{ __('Enter an area or locality') }}">
    </div>
    @foreach(['min_price'=>($rentalPage ? 'Minimum monthly rent (LKR)' : 'Minimum price (LKR)'), 'max_price'=>($rentalPage ? 'Maximum monthly rent (LKR)' : 'Maximum price (LKR)')] as $field=>$label)
        <div class="col-md-6">
            <label for="{{ $field }}" class="form-label">{{ __($label) }}</label>
            <input type="number" min="0" step="0.01" id="{{ $field }}" name="{{ $field }}" class="form-control" value="{{ old($field, request($field)) }}" placeholder="{{ __('Any') }}">
        </div>
    @endforeach
                <div class="col-md-6 col-lg-4" data-search-categories="house apartment villa apartments-villas" @if(in_array($category, ['land', 'commercial'])) hidden @endif>
                    <label for="bedrooms" class="form-label">{{ __('Bedrooms (exact; 0 for studio)') }}</label>
                    <input type="number" min="0" max="100" step="1" id="bedrooms" name="bedrooms" @disabled(in_array($category, ['land', 'commercial'])) class="form-control" value="{{ old('bedrooms', request('bedrooms')) }}" placeholder="{{ __('Any') }}">
                </div>
                @foreach(['min_land_size'=>'Minimum land size (perches)', 'max_land_size'=>'Maximum land size (perches)', 'min_floor_area'=>'Minimum floor area (sq ft)', 'max_floor_area'=>'Maximum floor area (sq ft)'] as $field=>$label)
                    @php
                        $allowedCategories = str_contains($field, 'land_size') ? ['land', 'house', 'villa'] : ['house', 'apartment', 'villa', 'apartments-villas', 'commercial'];
                        $filterHidden = $category !== '' && !in_array($category, $allowedCategories);
                    @endphp
                    <div class="col-md-6 col-lg-4" data-search-categories="{{ implode(' ', $allowedCategories) }}" @if($filterHidden) hidden @endif>
                        <label for="{{ $field }}" class="form-label">{{ __($label) }}</label>
                        <input type="number" min="0" step="0.01" id="{{ $field }}" name="{{ $field }}" @disabled($filterHidden) class="form-control" value="{{ old($field, request($field)) }}" placeholder="{{ __('Any') }}">
                    </div>
                @endforeach
            </div>
            <div class="d-flex flex-wrap gap-2 align-items-center mt-4">
                <button type="submit" class="btn btn-primary" style="background:#8B1E24;border-color:#8B1E24">{{ __('Apply filters') }}</button>
                <a href="{{ route($listingRoute) }}" class="btn btn-outline-secondary">{{ __('Clear') }}</a>
            </div>
        </div>
    </details>
    <button type="submit" class="btn lp-search-submit">{{ __('Search') }}</button>



</form>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-xl-3 g-4 lp-property-results" id="property-results" data-next-page="{{ $properties->nextPageUrl() }}" data-prev-page="{{ $properties->previousPageUrl() }}">
                @forelse ($properties as $property)
                    <div class="col">
                        <article class="card hover-effect-opacity h-100">
                            <div class="card-img-top position-relative bg-body-tertiary overflow-hidden">
                                @include('properties.category-badge')
                                @include('properties.saved-badge')
                                @include('properties.negotiable-label')
                                @if ($property->images->isNotEmpty())
                                    <div class="swiper z-2"
                                         data-swiper='{
                                             "pagination": {
                                                 "el": ".swiper-pagination",
                                                 "clickable": true
                                             },
                                             "navigation": {
                                                 "prevEl": ".btn-prev",
                                                 "nextEl": ".btn-next"
                                             }
                                         }'>
                                        <div class="swiper-wrapper">
                                            @foreach ($property->images as $photo)
                                                <div class="swiper-slide">
                                                    <a href="{{ route('properties.show', $property->property_code) }}"
                                                       class="ratio d-block"
                                                       style="--fn-aspect-ratio: calc(248 / 362 * 100%)">
                                                        <img
                                                            src="{{ asset('storage/'.$photo->path) }}"
                                                            alt="Photo {{ $loop->iteration }} of {{ $property->title }}"
                                                            class="object-fit-cover"
                                                            loading="lazy">
                                                    </a>
                                                </div>
                                            @endforeach
                                        </div>

                                        @if ($property->images->count() > 1)
                                            <div class="position-absolute top-50 start-0 z-1 translate-middle-y ms-3">
                                                <button type="button"
                                                        class="btn btn-sm btn-prev btn-icon btn-light rounded-circle"
                                                        aria-label="{{ __('Previous photo') }}">
                                                    <i class="fi-chevron-left"></i>
                                                </button>
                                            </div>

                                            <div class="position-absolute top-50 end-0 z-1 translate-middle-y me-3">
                                                <button type="button"
                                                        class="btn btn-sm btn-next btn-icon btn-light rounded-circle"
                                                        aria-label="{{ __('Next photo') }}">
                                                    <i class="fi-chevron-right"></i>
                                                </button>
                                            </div>

                                            <div class="swiper-pagination bottom-0 mb-2"
                                                 data-bs-theme="light"></div>
                                        @endif
                                    </div>
                                @else
                                    <div class="ratio"
                                         style="--fn-aspect-ratio: calc(248 / 362 * 100%)">
                                        <div class="d-flex align-items-center justify-content-center">
                                            {{ __('No photo available') }}
                                        </div>
                                    </div>
                                @endif
                            </div>

                            <div class="card-body p-3">
                                <div class="h5 mb-2">{{ $property->priceLabel() }}</div>

                                <h2 class="h6 mb-2">
                                    <a class="stretched-link text-body"
                                       href="{{ route('properties.show', $property->property_code) }}">
                                        {{ $property->title }}
                                    </a>
                                </h2>

                                <p class="fs-sm text-body-secondary mb-2">
                                    <i class="fi-map-pin me-1" aria-hidden="true"></i>
                                    {{ collect([$property->city, $property->district])->filter()->implode(', ') }}
                                </p>

                                @include('properties.card-highlights')

                            </div>

                            <div class="card-footer border-0 bg-transparent pt-0 pb-3 px-3">
                                <span class="fs-sm text-primary">
                                    {{ __('View details') }}
                                    <i class="fi-chevron-right ms-1" aria-hidden="true"></i>
                                </span>
                            </div>
                        </article>
                    </div>
                @empty
                    <div class="col w-100">
                        <div class="alert alert-info">
                            {{ $rentalPage ? 'No rental properties are available for this search. Try another location or check back for new listings.' : 'No properties match your search. Try another location or clear the filters.' }}
                        </div>
                    </div>
                @endforelse
            </div>

            <div class="mt-4">
                {{ $properties->onEachSide(2)->links('properties.pagination-dots') }}
            </div>
        </div>
    </main>
    @include('layouts.partials.footer.real-estate-footer')
@endsection

@push('scripts')
    <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script>
        (() => {
            const results = document.getElementById('property-results');
            let swipeStart = null;
            results.addEventListener('touchstart', event => {
                swipeStart = event.touches.length === 1 && !event.target.closest('.swiper, button, input, select')
                    ? {x:event.touches[0].clientX, y:event.touches[0].clientY} : null;
            }, {passive:true});
            results.addEventListener('touchend', event => {
                if (!swipeStart || !event.changedTouches.length) return;
                const dx = event.changedTouches[0].clientX - swipeStart.x;
                const dy = event.changedTouches[0].clientY - swipeStart.y;
                swipeStart = null;
                if (Math.abs(dx) < 80 || Math.abs(dx) < Math.abs(dy) * 2) return;
                const destination = dx < 0 ? results.dataset.nextPage : results.dataset.prevPage;
                if (destination) window.location.assign(destination + '#property-results');
            }, {passive:true});
            results.addEventListener('touchcancel', () => { swipeStart = null; }, {passive:true});
            const category = document.getElementById('category');
            const groups = category.form.querySelectorAll('[data-search-categories]');
            const locations = category.form.querySelector('[data-location-fields]');
            locations.dataset.cityPlaceholder = @json(__('City'));
            locations.dataset.cityEmptyPlaceholder = @json(__('City'));
            locations.querySelector('[name="district"]').options[0].text = @json(__('District'));
            locations.querySelector('[name="city"]').options[0].text = @json(__('City'));
            const details = document.getElementById('more-property-filters');
            const summary = details.querySelector('summary');
            const close = document.getElementById('close-property-filters');
            close.hidden = false;
            const closeFilters = () => { details.open = false; summary.focus(); };
            close.addEventListener('click', closeFilters);
            details.addEventListener('keydown', event => {
                if (event.key === 'Escape') { event.preventDefault(); closeFilters(); }
            });
            document.addEventListener('click', event => {
                if (details.open && !category.form.contains(event.target)) details.open = false;
            });
            category.form.addEventListener('invalid', () => { details.open = true; }, true);
            const countFilters = () => {
                const count = [...details.querySelectorAll('input')].filter(input => !input.disabled && input.value !== '').length;
                details.querySelector('.lp-filter-count').textContent = count ? ` (${count})` : '';
            };
            details.addEventListener('input', countFilters);

            const updateFilters = () => {
                groups.forEach(group => {
                    const visible = !category.value || group.dataset.searchCategories.split(' ').includes(category.value);
                    group.hidden = !visible;
                    group.querySelectorAll('input').forEach(input => {
                        input.disabled = !visible;
                        if (!visible) input.value = '';
                    });
                });
            };
            category.addEventListener('change', () => { updateFilters(); countFilters(); });
            window.addEventListener('pageshow', updateFilters);
            updateFilters();
            countFilters();
        })();
    </script>
    @vite(['resources/js/app.js'])

@endpush