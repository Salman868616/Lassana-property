@extends('layouts.app')

@section('title', 'Finder | Add Property - Location')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/vendor/leaflet/dist/leaflet.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/choices.js/public/assets/styles/choices.min.css') }}">
@endpush

@section('content')

    @include('layouts.partials.header.page-header')

    <!-- Page content -->
    <main class="content-wrapper">
        <div class="container pt-3 pt-sm-4 pt-md-5 pb-5">
            <div class="row pt-lg-2 pt-xl-3 pb-1 pb-sm-2 pb-md-3 pb-lg-4 pb-xl-5">

                <!-- Sidebar navigation -->
                <aside class="col-lg-3 col-xl-4 mb-3" style="margin-top: -100px">
                    <div class="sticky-top overflow-y-auto" style="padding-top: 100px">
                        <ul class="nav flex-lg-column flex-nowrap gap-4 gap-lg-0 text-nowrap pb-2 pb-lg-0">
                            <li class="nat-item">
                                <a class="nav-link d-inline-flex position-relative px-0 px-lg-3 active" href="add-property-type">
                                    <i class="fi-check-circle fs-lg me-2"></i>
                                    <span class="hover-effect-underline stretched-link">Property type</span>
                                </a>
                            </li>
                            <li class="nat-item">
                                <a class="nav-link d-inline-flex px-0 px-lg-3 pe-none" aria-current="page">
                                    <i class="fi-arrow-right-circle d-none d-lg-inline-flex fs-lg me-2"></i>
                                    <i class="fi-arrow-down-circle d-lg-none fs-lg me-2"></i>
                                    Location
                                </a>
                            </li>
                            <li class="nat-item">
                                <a class="nav-link d-inline-flex px-0 px-lg-3 disabled">
                                    <i class="fi-circle fs-lg me-2"></i>
                                    Photos and videos
                                </a>
                            </li>
                            <li class="nat-item">
                                <a class="nav-link d-inline-flex px-0 px-lg-3 disabled">
                                    <i class="fi-circle fs-lg me-2"></i>
                                    Property details
                                </a>
                            </li>
                            <li class="nat-item">
                                <a class="nav-link d-inline-flex px-0 px-lg-3 disabled">
                                    <i class="fi-circle fs-lg me-2"></i>
                                    Price
                                </a>
                            </li>
                            <li class="nat-item">
                                <a class="nav-link d-inline-flex px-0 px-lg-3 disabled">
                                    <i class="fi-circle fs-lg me-2"></i>
                                    Contact info
                                </a>
                            </li>
                            <li class="nat-item">
                                <a class="nav-link d-inline-flex px-0 px-lg-3 disabled">
                                    <i class="fi-circle fs-lg me-2"></i>
                                    Ad promotion
                                </a>
                            </li>
                        </ul>
                    </div>
                </aside>


                <!-- Property location inputs -->
 <!-- Property location inputs -->
<div class="col-lg-9 col-xl-8">
    <form id="location-form" method="POST" action="{{ route('add-property-location.store') }}">
        @csrf
    <form id="location-form" method="POST" action="{{ route('add-property-location.store') }}">
        @csrf
                    <h1 class="h2 pb-1 pb-lg-2">Location</h1>
                    <div class="row row-cols-1 row-cols-sm-2 g-3 g-sm-4 pb-3 pb-sm-4 mb-xl-2">
                        <div class="col">
                            <label class="form-label">Country *</label>
                            <select class="form-select form-select-lg" data-select='{
                                                      "classNames": {
                                                        "containerInner": ["form-select", "form-select-lg"]
                                                      },
                                                      "searchEnabled": true
                                                    }' aria-label="Country select" required>
                                <option value="">Select country</option>
                                <optgroup label="Africa">
                                    <option value="Nigeria">Nigeria</option>
                                    <option value="South Africa">South Africa</option>
                                    <option value="Kenya">Kenya</option>
                                    <option value="Egypt">Egypt</option>
                                    <option value="Ethiopia">Ethiopia</option>
                                </optgroup>
                                <optgroup label="Asia">
                                    <option value="China">China</option>
                                    <option value="India">India</option>
                                    <option value="Japan">Japan</option>
                                    <option value="South Korea">South Korea</option>
                                    <option value="Saudi Arabia">Saudi Arabia</option>
                                </optgroup>
                                <optgroup label="Europe">
                                    <option value="Germany">Germany</option>
                                    <option value="France">France</option>
                                    <option value="United Kingdom">United Kingdom</option>
                                    <option value="Italy">Italy</option>
                                    <option value="Spain">Spain</option>
                                </optgroup>
                                <optgroup label="North America">
                                    <option value="United States" selected>United States</option>
                                    <option value="Canada">Canada</option>
                                    <option value="Mexico">Mexico</option>
                                    <option value="Jamaica">Jamaica</option>
                                    <option value="Costa Rica">Costa Rica</option>
                                </optgroup>
                                <optgroup label="South America">
                                    <option value="Brazil">Brazil</option>
                                    <option value="Argentina">Argentina</option>
                                    <option value="Colombia">Colombia</option>
                                    <option value="Chile">Chile</option>
                                    <option value="Peru">Peru</option>
                                </optgroup>
                                <optgroup label="Oceania">
                                    <option value="Australia">Australia</option>
                                    <option value="New Zealand">New Zealand</option>
                                    <option value="Papua New Guinea">Papua New Guinea</option>
                                    <option value="Fiji">Fiji</option>
                                    <option value="Solomon Islands">Solomon Islands</option>
                                </optgroup>
                            </select>
                        </div>
                        <div class="col">
                            <label class="form-label">City *</label>
                            <select name="city" class="form-select form-select-lg" data-select='{
                                                      "classNames": {
                                                        "containerInner": ["form-select", "form-select-lg"]
                                                      },
                                                      "searchEnabled": true
                                                    }' aria-label="City select" required>
                                <option value="">Select city</option>
                                <option value="New York" selected>New York</option>
                                <option value="Los Angeles">Los Angeles</option>
                                <option value="Chicago">Chicago</option>
                                <option value="Houston">Houston</option>
                                <option value="Phoenix">Phoenix</option>
                                <option value="Philadelphia">Philadelphia</option>
                                <option value="San Antonio">San Antonio</option>
                                <option value="San Diego">San Diego</option>
                                <option value="Dallas">Dallas</option>
                                <option value="San Jose">San Jose</option>
                                <option value="Austin">Austin</option>
                                <option value="Jacksonville">Jacksonville</option>
                            </select>
                        </div>
                    </div>
                    <div class="row row-cols-1 row-cols-sm-2 g-3 g-sm-4 pb-3 pb-sm-4 mb-xl-2">
                        <div class="col">
                            <label class="form-label">District *</label>
                            <select name="district" class="form-select form-select-lg" data-select='{
                                                      "classNames": {
                                                        "containerInner": ["form-select", "form-select-lg"]
                                                      }
                                                    }' aria-label="District select" required>
                                <option value="">Select district</option>
                                <option value="Manhattan">Manhattan</option>
                                <option value="Brooklyn" selected>Brooklyn</option>
                                <option value="The Bronx">The Bronx</option>
                                <option value="Staten Island">Staten Island</option>
                            </select>
                        </div>
                        <div class="col">
                            <label for="zip" class="form-label">Zip code *</label>
                            <input type="text" class="form-control form-control-lg" id="zip" value="11237" placeholder="Enter zip code" required>
                        </div>
                    </div>
                    <div class="pb-4 mb-2">
                        <label for="address" class="form-label">Street address *</label>
                        <input type="text" class="form-control form-control-lg" id="address" name="location" value="929 Hart Street" placeholder="Enter address" required>
                    </div>

                    <!-- Map -->
                    <input type="hidden" name="latitude" id="latitude" value="">
<input type="hidden" name="longitude" id="longitude" value="">
                    <h2 class="h6 mb-2">Display on the map</h2>
                    <p class="fs-sm">You can change the position of the mark on the map.</p>

                    <!-- In order to make the map look like in the demo site add following property "tileLayer": "https://api.maptiler.com/maps/pastel/{z}/{x}/{y}.png?key=YOUR_MAPTILER_API_KEY", "tileSize": 512 and "zoomOffset": -1 to [data-map] attribute -->
                    <div class="ratio ratio-21x9 bg-body-tertiary border rounded overflow-hidden" data-map='{
                                                    "zoom": 14,
                                                    "templates": {
                                                      "marker": "<div class=\"map-marker\"><i class=\"fi-map-pin-filled text-primary fs-4\"></i></div>",
                                                      "popup": "<div class=\"p-3\" data-bs-theme=\"light\"><h6 class=\"pb-1 mb-2\">Property location</h6><p class=\"fs-sm text-body m-0\">929 Hart Street, Brooklyn, NY, 11237</p></div>"
                                                    }
                                                  }' data-map-markers='[{"coordinates": {"lat": 40.719, "lng": -73.994 }}]'></div>
                </div>
            </form>
            </div>
            
        </div>
    </main>

    <!-- Prev / Next navigation (Footer) -->
    <footer class="sticky-bottom bg-body pb-3">
        <div class="progress rounded-0" role="progressbar" aria-label="Dark example" aria-valuenow="28.57" aria-valuemin="0" aria-valuemax="100" style="height: 4px">
            <div class="progress-bar bg-dark d-none-dark" style="width: 28.57%"></div>
            <div class="progress-bar bg-light d-none d-block-dark" style="width: 28.57%"></div>
        </div>
        <div class="container d-flex gap-3 pt-3">
            <a class="btn btn-outline-dark animate-slide-start" href="add-property-type">
                <i class="fi-arrow-left animate-target fs-base ms-n1 me-2"></i>
                Back
            </a>
            <button type="submit" form="location-form" class="btn btn-dark animate-slide-end ms-auto">
    Next
    <i class="fi-arrow-right animate-target fs-base ms-2 me-n1"></i>
</button>
        </div>
    </footer>

@endsection

@push('scripts')
    <script src="{{ asset('assets/vendor/leaflet/dist/leaflet.js') }}"></script>
    <script src="{{ asset('assets/vendor/choices.js/public/assets/scripts/choices.min.js') }}"></script>

    @vite(['resources/js/app.js'])
@endpush


