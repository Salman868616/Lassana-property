@php $type = 'real-estate' @endphp
@extends('layouts.app')

@section('title', 'Finder | Real Estate - Map/Listings Split View')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/vendor/leaflet/dist/leaflet.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/choices.js/public/assets/styles/choices.min.css') }}">
@endpush

@section('content')

    @include('layouts.partials.header.real-estate-header')

    <!-- Filters offcanvas -->
    <div class="offcanvas offcanvas-end" id="filters" tabindex="-1" style="width: 820px">

        <!-- Header -->
        <div class="offcanvas-header px-sm-5">
            <h4 class="h5 offcanvas-title">All filters</h4>
            <button class="btn-close" type="button" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>

        <!-- Body (Filter inputs) -->
        <div class="offcanvas-body pt-2 pb-3 px-sm-5">
            <div class="row row-cols-1 row-cols-md-2 g-4 pb-3 mb-3">
                <div class="col">
                    <h6>Choose your location</h6>
                    <div class="position-relative w-100">
                        <i class="fi-map-pin position-absolute top-50 start-0 translate-middle-y z-1 ms-3"></i>
                        <input type="search" class="form-control form-icon-start" value="" placeholder="Search Sri Lanka: city or district">
                    </div>
                </div>
                <div class="col">
                    <h6>Home type</h6>
                    <div class="row g-3">
                        <div class="col-5">
                            <select class="form-select" data-select='{"removeItemButton": false}' aria-label="Rent or sale select">
                                <option value="For rent">For rent</option>
                                <option value="For sale">For sale</option>
                            </select>
                        </div>
                        <div class="col-7">
                            <div class="dropdown w-100">
                                <button type="button" class="btn btn-outline-secondary dropdown-toggle justify-content-between w-100 text-body fw-normal px-3" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false">
                                    <i class="fi-home fs-base me-2"></i>
                                    Home type <span class="ms-1 me-auto" id="typeCountOffcanvas"></span>
                                </button>
                                <div class="dropdown-menu w-100 p-3" style="--fn-dropdown-min-width: 0">
                                    <div class="d-flex flex-column gap-2">
                                        <div class="form-check m-0">
                                            <input type="checkbox" class="form-check-input fs-base" id="apartments-offcanvas" checked onclick="updateFilterCount('typeCountOffcanvas')" data-count-id="typeCountOffcanvas">
                                            <label for="apartments-offcanvas" class="form-check-label d-flex align-items-end">
                                                Apartments
                                                <span class="fs-xs text-body-secondary ps-2 ms-auto">621</span>
                                            </label>
                                        </div>
                                        <div class="form-check m-0">
                                            <input type="checkbox" class="form-check-input fs-base" id="houses-offcanvas" onclick="updateFilterCount('typeCountOffcanvas')" data-count-id="typeCountOffcanvas">
                                            <label for="houses-offcanvas" class="form-check-label d-flex align-items-end">
                                                Houses
                                                <span class="fs-xs text-body-secondary ps-2 ms-auto">157</span>
                                            </label>
                                        </div>
                                        <div class="form-check m-0">
                                            <input type="checkbox" class="form-check-input fs-base" id="condos-offcanvas" onclick="updateFilterCount('typeCountOffcanvas')" data-count-id="typeCountOffcanvas">
                                            <label for="condos-offcanvas" class="form-check-label d-flex align-items-end">
                                                Condos
                                                <span class="fs-xs text-body-secondary ps-2 ms-auto">283</span>
                                            </label>
                                        </div>
                                        <div class="form-check m-0">
                                            <input type="checkbox" class="form-check-input fs-base" id="townhomes-offcanvas" onclick="updateFilterCount('typeCountOffcanvas')" data-count-id="typeCountOffcanvas">
                                            <label for="townhomes-offcanvas" class="form-check-label d-flex align-items-end">
                                                Townhomes
                                                <span class="fs-xs text-body-secondary ps-2 ms-auto">346</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-md-2 g-4 pb-3 mb-3">
                <div class="col">
                    <h6>Price per month, $</h6>
                    <div class="d-flex align-items-center">
                        <input type="number" class="form-control w-50" min="0" step="50" placeholder="Min">
                        <i class="fi-minus mx-2"></i>
                        <input type="number" class="form-control w-50" step="50" placeholder="Max">
                    </div>
                </div>
                <div class="col">
                    <h6>Square metres</h6>
                    <div class="d-flex align-items-center">
                        <input type="number" class="form-control w-50" min="0" step="10" placeholder="Min">
                        <i class="fi-minus mx-2"></i>
                        <input type="number" class="form-control w-50" step="10" placeholder="Max">
                    </div>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-md-2 g-4 pb-3 mb-3">
                <div class="col">
                    <h6>Bedrooms</h6>
                    <div class="nav nav-pills gap-2">
                        <div>
                            <input type="radio" class="btn-check" id="bedrooms-any" name="bedrooms" checked>
                            <label class="nav-link rounded" for="bedrooms-any">Any</label>
                        </div>
                        <div>
                            <input type="radio" class="btn-check" id="bedrooms-1" name="bedrooms">
                            <label class="nav-link rounded" for="bedrooms-1">1</label>
                        </div>
                        <div>
                            <input type="radio" class="btn-check" id="bedrooms-2" name="bedrooms">
                            <label class="nav-link rounded" for="bedrooms-2">2</label>
                        </div>
                        <div>
                            <input type="radio" class="btn-check" id="bedrooms-3" name="bedrooms">
                            <label class="nav-link rounded" for="bedrooms-3">3</label>
                        </div>
                        <div>
                            <input type="radio" class="btn-check" id="bedrooms-4" name="bedrooms">
                            <label class="nav-link rounded" for="bedrooms-4">4+</label>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <h6>Bathrooms</h6>
                    <div class="nav nav-pills gap-2">
                        <div>
                            <input type="radio" class="btn-check" id="bathrooms-any" name="bathrooms" checked>
                            <label class="nav-link rounded" for="bathrooms-any">Any</label>
                        </div>
                        <div>
                            <input type="radio" class="btn-check" id="bathrooms-1" name="bathrooms">
                            <label class="nav-link rounded" for="bathrooms-1">1</label>
                        </div>
                        <div>
                            <input type="radio" class="btn-check" id="bathrooms-2" name="bathrooms">
                            <label class="nav-link rounded" for="bathrooms-2">2</label>
                        </div>
                        <div>
                            <input type="radio" class="btn-check" id="bathrooms-3" name="bathrooms">
                            <label class="nav-link rounded" for="bathrooms-3">3</label>
                        </div>
                        <div>
                            <input type="radio" class="btn-check" id="bathrooms-4" name="bathrooms">
                            <label class="nav-link rounded" for="bathrooms-4">4+</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-md-2 g-4 pb-3 mb-3">
                <div class="col">
                    <h6>Year built</h6>
                    <div class="d-flex align-items-center">
                        <div class="w-50">
                            <select class="form-select" data-select aria-label="Min year built select">
                                <option value="">Min</option>
                                <option value="2024">2024</option>
                                <option value="2023">2023</option>
                                <option value="2022">2022</option>
                                <option value="2021">2021</option>
                                <option value="2020">2020</option>
                                <option value="2019">2019</option>
                                <option value="2018">2018</option>
                                <option value="2017">2017</option>
                                <option value="2016">2016</option>
                                <option value="2015">2015</option>
                                <option value="2014">2014</option>
                                <option value="2013">2013</option>
                                <option value="2012">2012</option>
                                <option value="2011">2011</option>
                                <option value="2010">2010</option>
                            </select>
                        </div>
                        <i class="fi-minus mx-2"></i>
                        <div class="w-50">
                            <select class="form-select" data-select aria-label="Max year built select">
                                <option value="">Max</option>
                                <option value="2024">2024</option>
                                <option value="2023">2023</option>
                                <option value="2022">2022</option>
                                <option value="2021">2021</option>
                                <option value="2020">2020</option>
                                <option value="2019">2019</option>
                                <option value="2018">2018</option>
                                <option value="2017">2017</option>
                                <option value="2016">2016</option>
                                <option value="2015">2015</option>
                                <option value="2014">2014</option>
                                <option value="2013">2013</option>
                                <option value="2012">2012</option>
                                <option value="2011">2011</option>
                                <option value="2010">2010</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <h6>Amenities</h6>
            <div class="row row-cols-2 gy-2 gx-4 pb-3 mb-3">
                <div class="col vstack gap-2">
                    <div class="form-check m-0">
                        <input type="checkbox" class="form-check-input" id="ac" checked>
                        <label for="ac" class="form-check-label">Air conditioning</label>
                    </div>
                    <div class="form-check m-0">
                        <input type="checkbox" class="form-check-input" id="balcony">
                        <label for="balcony" class="form-check-label">Balcony</label>
                    </div>
                    <div class="form-check m-0">
                        <input type="checkbox" class="form-check-input" id="garage">
                        <label for="garage" class="form-check-label">Garage</label>
                    </div>
                    <div class="form-check m-0">
                        <input type="checkbox" class="form-check-input" id="gym">
                        <label for="gym" class="form-check-label">Gym</label>
                    </div>
                    <div class="form-check m-0">
                        <input type="checkbox" class="form-check-input" id="parking" checked>
                        <label for="parking" class="form-check-label">Parking</label>
                    </div>
                </div>
                <div class="col vstack gap-2">
                    <div class="form-check m-0">
                        <input type="checkbox" class="form-check-input" id="pool">
                        <label for="pool" class="form-check-label">Pool</label>
                    </div>
                    <div class="form-check m-0">
                        <input type="checkbox" class="form-check-input" id="cctv">
                        <label for="cctv" class="form-check-label">Security cameras</label>
                    </div>
                    <div class="form-check m-0">
                        <input type="checkbox" class="form-check-input" id="wifi" checked>
                        <label for="wifi" class="form-check-label">WiFi</label>
                    </div>
                    <div class="form-check m-0">
                        <input type="checkbox" class="form-check-input" id="laundry">
                        <label for="laundry" class="form-check-label">Laundry</label>
                    </div>
                    <div class="form-check m-0">
                        <input type="checkbox" class="form-check-input" id="dishwasher">
                        <label for="dishwasher" class="form-check-label">Dishwasher</label>
                    </div>
                </div>
            </div>
            <div class="row row-cols-2 g-4">
                <div class="col">
                    <h6>Pets</h6>
                    <div class="vstack gap-2">
                        <div class="form-check m-0">
                            <input type="checkbox" class="form-check-input" id="cats" checked>
                            <label for="cats" class="form-check-label">Cats allowed</label>
                        </div>
                        <div class="form-check m-0">
                            <input type="checkbox" class="form-check-input" id="dogs">
                            <label for="dogs" class="form-check-label">Dogs allowed</label>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <h6>Additional options</h6>
                    <div class="vstack gap-2">
                        <div class="form-check m-0">
                            <input type="checkbox" class="form-check-input" id="verified">
                            <label for="verified" class="form-check-label">Verified</label>
                        </div>
                        <div class="form-check m-0">
                            <input type="checkbox" class="form-check-input" id="featured">
                            <label for="featured" class="form-check-label">Featured</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer: Action buttons -->
        <div class="d-flex justify-content-between align-items-center p-4 px-sm-5">
            <div class="nav">
                <a class="nav-link fs-xs text-decoration-underline text-nowrap p-0" href="#!">Clear all</a>
            </div>
            <button type="button" class="btn btn-primary" data-bs-dismiss="offcanvas">See 156 properties</button>
        </div>
    </div>

    <!-- Page content -->
    <main class="content-wrapper d-lg-flex">
        <div class="d-lg-flex flex-grow-1">

            <!-- Interactive map that turns into offcanvas on screens < 992px wide (lg breakpoint) -->
            <div class="map-section">
                <div class="offcanvas-lg offcanvas-start d-flex flex-column w-100 h-100" id="map">
                    <div class="offcanvas-body position-relative h-100 p-0">
                        <button type="button" class="btn btn-icon btn-outline-secondary bg-body shadow position-absolute top-0 z-5 mt-2 d-lg-none" style="right: 0; margin-right: 8px; z-index: 500" data-bs-dismiss="offcanvas" data-bs-target="#map" aria-label="Close">
                            <i class="fi-close fs-lg"></i>
                        </button>

                        <div id="property-listing-map" class="position-absolute top-0 start-0 w-100 h-100 bg-body-tertiary" data-markers-url="{{ route('properties.map') }}" aria-label="Property locations in Sri Lanka"></div>
                        <div id="property-map-status" class="position-absolute bottom-0 start-0 m-3 p-2 rounded bg-body shadow-sm small" style="z-index: 500" role="status">Loading property locations...</div>
                    </div>
                </div>
            </div>


            <!-- Listings with filters -->
            <div class="listings-section px-3 px-lg-4 pe-xxl-5">

                <!-- Sticky filters -->
                <div class="sticky-top bg-body mb-2 mb-sm-1">
                    <div class="d-md-none" style="height: 64px;  margin-top: -64px"></div>
                    <div class="d-none d-md-block d-lg-none" style="height: 72px;  margin-top: -72px"></div>
                    <div class="d-none d-lg-block" style="height: 76px; margin-top: -76px"></div>
                    <div class="d-flex gap-2 gap-sm-3 py-2 py-sm-3">
                        <div class="position-relative w-100">
                            <i class="fi-map-pin position-absolute top-50 start-0 translate-middle-y z-1 ms-3"></i>
                            <input type="search" class="form-control form-icon-start" value="" placeholder="Search Sri Lanka: city or district">
                        </div>
                        <div class="flex-shrink-0 d-none d-md-block" style="width: 140px">
                            <select class="form-select" data-select='{"removeItemButton": false}' aria-label="Rent or sale select">
                                <option value="For rent">For rent</option>
                                <option value="For sale">For sale</option>
                            </select>
                        </div>
                        <div class="dropdown flex-shrink-0 d-none d-xxl-block" style="width: 180px">
                            <button type="button" class="btn btn-outline-secondary dropdown-toggle justify-content-between w-100 text-body fw-normal px-3" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false">
                                <i class="fi-home fs-base me-2"></i>
                                Home type <span class="ms-1 me-auto" id="typeCount"></span>
                            </button>
                            <div class="dropdown-menu w-100 p-3" style="--fn-dropdown-min-width: 0">
                                <div class="d-flex flex-column gap-2">
                                    <div class="form-check m-0">
                                        <input type="checkbox" class="form-check-input fs-base" id="apartments" checked onclick="updateFilterCount('typeCount')" data-count-id="typeCount">
                                        <label for="apartments" class="form-check-label d-flex align-items-end">
                                            Apartments
                                            <span class="fs-xs text-body-secondary ps-2 ms-auto">621</span>
                                        </label>
                                    </div>
                                    <div class="form-check m-0">
                                        <input type="checkbox" class="form-check-input fs-base" id="houses" onclick="updateFilterCount('typeCount')" data-count-id="typeCount">
                                        <label for="houses" class="form-check-label d-flex align-items-end">
                                            Houses
                                            <span class="fs-xs text-body-secondary ps-2 ms-auto">157</span>
                                        </label>
                                    </div>
                                    <div class="form-check m-0">
                                        <input type="checkbox" class="form-check-input fs-base" id="condos" onclick="updateFilterCount('typeCount')" data-count-id="typeCount">
                                        <label for="condos" class="form-check-label d-flex align-items-end">
                                            Condos
                                            <span class="fs-xs text-body-secondary ps-2 ms-auto">283</span>
                                        </label>
                                    </div>
                                    <div class="form-check m-0">
                                        <input type="checkbox" class="form-check-input fs-base" id="townhomes" onclick="updateFilterCount('typeCount')" data-count-id="typeCount">
                                        <label for="townhomes" class="form-check-label d-flex align-items-end">
                                            Townhomes
                                            <span class="fs-xs text-body-secondary ps-2 ms-auto">346</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Map offcanvas toggle button visible on screens < 992px wide (lg breakpoint) -->
                        <button type="button" class="btn btn-outline-dark pe-3 d-lg-none" data-bs-toggle="offcanvas" data-bs-target="#map" aria-controls="map">
                            <i class="fi-map fs-base me-2 ms-n1"></i>
                            <span class="d-none d-sm-inline">Show on map</span>
                            <span class="d-sm-none">Map</span>
                        </button>

                        <!-- Filters offcanvas toggle button -->
                        <div class="position-relative">
                            <span class="badge text-bg-primary rounded-pill position-absolute top-0 start-100 translate-middle mt-1 ms-n1">3</span>
                            <button type="button" class="btn btn-icon btn-dark" data-bs-toggle="offcanvas" data-bs-target="#filters" aria-controls="filters" aria-label="Toogle filters">
                                <i class="fi-sliders fs-base"></i>
                            </button>
                        </div>
                    </div>
                </div>


                <!-- Sort selector -->
                <div class="d-flex align-items-center gap-2 gap-sm-3 mb-3">
                    Showing {{ $properties->total() }} result{{ $properties->total() === 1 ? '' : 's' }}
                    <div class="position-relative ms-auto" style="width: 150px">
                        <i class="fi-sort position-absolute top-50 start-0 translate-middle-y z-2"></i>
                        <select class="form-select border-0 rounded-0 ps-4 pe-1" data-select='{
                                                        "removeItemButton": false,
                                                        "classNames": {
                                                          "containerInner": ["form-select", "border-0", "rounded-0", "ps-4", "pe-1"]
                                                        }
                                                      }'>
                            <option value="Price Asc">Price Asc</option>
                            <option value="Price Desc">Price Desc</option>
                            <option value="Updated">Updated</option>
                            <option value="Video">Video</option>
                            <option value="3D Tour">3D Tour</option>
                        </select>
                    </div>
                </div>


                <!-- Listings grid -->
                <div class="row row-cols-1 row-cols-sm-2 g-4">
    @forelse ($properties as $property)
        <div class="col">
            <article class="card hover-effect-opacity h-100">
                <div class="card-img-top position-relative bg-body-tertiary overflow-hidden">
                                @include('properties.category-badge')
                                @include('properties.saved-badge')
                    @if ($property->images->isNotEmpty())
                        <a href="{{ route('properties.show', $property->property_code) }}"
                           class="ratio d-block"
                           style="--fn-aspect-ratio: calc(248 / 362 * 100%)">
                            <img src="{{ asset('storage/'.$property->images->first()->path) }}"
                                 alt="{{ $property->title }}"
                                 class="object-fit-cover"
                                 loading="lazy">
                        </a>
                    @else
                        <div class="ratio"
                             style="--fn-aspect-ratio: calc(248 / 362 * 100%)">
                            <div class="d-flex align-items-center justify-content-center">
                                No photo available
                            </div>
                        </div>
                    @endif

                    
                </div>

                <div class="card-body p-3">
                    <div class="h5 mb-2">
                        @if ($property->total_price !== null)
                            {{ $property->currency }}
                            {{ number_format($property->total_price, 2) }}
                        @else
                            Price on request
                        @endif
                    </div>

                    <h3 class="fs-sm fw-normal text-body mb-2">
                        <a class="stretched-link text-body"
                           href="{{ route('properties.show', $property->property_code) }}">
                            {{ $property->title }}
                        </a>
                    </h3>

                    <p class="fs-sm text-body-secondary mb-2">
                        <i class="fi-map-pin me-1" aria-hidden="true"></i>
                        {{ collect([$property->city, $property->district])->filter()->implode(', ') }}
                    </p>

                    @include('properties.card-highlights')

                </div>
            </article>
        </div>
    @empty
        <div class="col-12">
            <div class="alert alert-info">
                No published properties are available yet.
            </div>
        </div>
    @endforelse
</div>


                <!-- Pagination -->
                @if ($properties->hasPages())
    <div class="pt-3 mt-3">
        {{ $properties->links('pagination::bootstrap-5') }}
    </div>
@endif

                <!-- Footer -->
                <footer class="text-center pt-4 pt-md-5">
                    <hr class="pb-4">
                    <a class="d-inline-flex align-items-center text-dark-emphasis text-decoration-none mb-4" href="home-real-estate">
                        <span class="flex-shrink-0 text-primary rtl-flip me-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="34">
                                <path d="M34.5 16.894v10.731c0 3.506-2.869 6.375-6.375 6.375H17.5h-.85C7.725 33.575.5 26.138.5 17c0-9.35 7.65-17 17-17s17 7.544 17 16.894z" fill="currentColor"></path>
                                <g fill-rule="evenodd">
                                    <path d="M17.5 13.258c-3.101 0-5.655 2.554-5.655 5.655s2.554 5.655 5.655 5.655 5.655-2.554 5.655-5.655-2.554-5.655-5.655-5.655zm-9.433 5.655c0-5.187 4.246-9.433 9.433-9.433s9.433 4.246 9.433 9.433a9.36 9.36 0 0 1-1.569 5.192l2.397 2.397a1.89 1.89 0 0 1 0 2.671 1.89 1.89 0 0 1-2.671 0l-2.397-2.397a9.36 9.36 0 0 1-5.192 1.569c-5.187 0-9.433-4.246-9.433-9.433z" fill="#000" fill-opacity=".05"></path>
                                    <g fill="#fff">
                                        <path d="M17.394 10.153c-3.723 0-6.741 3.018-6.741 6.741s3.018 6.741 6.741 6.741 6.741-3.018 6.741-6.741-3.018-6.741-6.741-6.741zM7.347 16.894A10.05 10.05 0 0 1 17.394 6.847 10.05 10.05 0 0 1 27.44 16.894 10.05 10.05 0 0 1 17.394 26.94 10.05 10.05 0 0 1 7.347 16.894z"></path>
                                        <path d="M23.025 22.525c.645-.645 1.692-.645 2.337 0l3.188 3.188c.645.645.645 1.692 0 2.337s-1.692.645-2.337 0l-3.187-3.187c-.645-.646-.645-1.692 0-2.337z"></path>
                                    </g>
                                </g>
                                <path d="M23.662 14.663c2.112 0 3.825-1.713 3.825-3.825s-1.713-3.825-3.825-3.825-3.825 1.713-3.825 3.825 1.713 3.825 3.825 3.825z" fill="#fff"></path>
                                <path fill-rule="evenodd" d="M23.663 8.429a2.41 2.41 0 0 0-2.408 2.408 2.41 2.41 0 0 0 2.408 2.408 2.41 2.41 0 0 0 2.408-2.408 2.41 2.41 0 0 0-2.408-2.408zm-5.242 2.408c0-2.895 2.347-5.242 5.242-5.242s5.242 2.347 5.242 5.242-2.347 5.242-5.242 5.242-5.242-2.347-5.242-5.242z" fill="currentColor"></path>
                            </svg>
                        </span>
                        <span class="fs-4 fw-semibold">Finder</span>
                    </a>
                    <ul class="list-inline justify-content-center gap-2">
                        <li class="me-3">
                            <div class="position-relative d-flex align-items-center">
                                <i class="fi-mail fs-lg text-body me-2"></i>
                                <a class="text-dark-emphasis text-decoration-none hover-effect-underline stretched-link" href="mailto:contact@example.com">contact@example.com</a>
                            </div>
                        </li>
                        <li>
                            <div class="position-relative d-flex align-items-center">
                                <i class="fi-phone-call fs-lg text-body me-2"></i>
                                <a class="text-dark-emphasis text-decoration-none hover-effect-underline stretched-link" href="tel:+15053753082">+1&nbsp;50&nbsp;537&nbsp;53&nbsp;082</a>
                            </div>
                        </li>
                    </ul>
                    <div class="d-flex justify-content-center pt-2 mt-3">
                        <a class="btn btn-icon fs-base btn-outline-secondary border-0" href="#!" data-bs-toggle="tooltip" data-bs-template='<div class="tooltip fs-xs mb-n2" role="tooltip"><div class="tooltip-inner bg-transparent text-body opacity-75 p-0"></div></div>' title="Instagram" aria-label="Follow us on Instagram">
                            <i class="fi-instagram"></i>
                        </a>
                        <a class="btn btn-icon fs-base btn-outline-secondary border-0" href="#!" data-bs-toggle="tooltip" data-bs-template='<div class="tooltip fs-xs mb-n2" role="tooltip"><div class="tooltip-inner bg-transparent text-body opacity-75 p-0"></div></div>' title="Facebook" aria-label="Follow us on Facebook">
                            <i class="fi-facebook"></i>
                        </a>
                        <a class="btn btn-icon fs-base btn-outline-secondary border-0" href="#!" data-bs-toggle="tooltip" data-bs-template='<div class="tooltip fs-xs mb-n2" role="tooltip"><div class="tooltip-inner bg-transparent text-body opacity-75 p-0"></div></div>' title="X (Twitter)" aria-label="Follow us on X (Twitter)">
                            <i class="fi-x"></i>
                        </a>
                    </div>
                    <div class="py-4">
                        <p class="text-body-secondary fs-sm mb-0 mb-sm-2">&copy; All rights reserved. Made by <a class="text-body fw-medium text-decoration-none hover-effect-underline" href="https://createx.studio/" target="_blank" rel="noreferrer">Createx Studio</a></p>
                    </div>
                </footer>
            </div>
        </div>
    </main>

@endsection

@push('scripts')
    <script src="{{ asset('assets/vendor/leaflet/dist/leaflet.js') }}"></script>
    <script src="{{ asset('assets/js/property-listing-map.js') }}?v=1"></script>
    <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/choices.js/public/assets/scripts/choices.min.js') }}"></script>

    @vite(['resources/js/app.js'])

    <!-- Page specific scripts -->
    <script>

        // Dynamically update count number of selected items inside filter dropdown
        window.onload = () => {
            updateFilterCount('typeCount')
            updateFilterCount('typeCountOffcanvas')
        }

        const updateFilterCount = (countId) => {
            const checkedCheckboxes = document.querySelectorAll(`[data-count-id="${countId}"]:checked`)
            const countElement = document.getElementById(countId)
            if (checkedCheckboxes.length > 0) {
                countElement.textContent = '(' + checkedCheckboxes.length + ')'
            } else {
                countElement.textContent = ''
            }
        }
    </script>
@endpush