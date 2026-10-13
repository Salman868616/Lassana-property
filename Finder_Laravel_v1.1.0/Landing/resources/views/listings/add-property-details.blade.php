@extends('layouts.app')

@section('title', 'Finder | Add Property - Details')

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
                                <a class="nav-link d-inline-flex position-relative px-0 px-lg-3 active" href="add-property-location">
                                    <i class="fi-check-circle fs-lg me-2"></i>
                                    <span class="hover-effect-underline stretched-link">Location</span>
                                </a>
                            </li>
                            <li class="nat-item">
                                <a class="nav-link d-inline-flex position-relative px-0 px-lg-3 active" href="add-property-photos">
                                    <i class="fi-check-circle fs-lg me-2"></i>
                                    <span class="hover-effect-underline stretched-link">Photos and videos</span>
                                </a>
                            </li>
                            <li class="nat-item">
                                <a class="nav-link d-inline-flex px-0 px-lg-3 pe-none" aria-current="page">
                                    <i class="fi-arrow-right-circle d-none d-lg-inline-flex fs-lg me-2"></i>
                                    <i class="fi-arrow-down-circle d-lg-none fs-lg me-2"></i>
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


                <!-- Property photos and videos inputs -->
                <div class="col-lg-9 col-xl-8">
                    <h1 class="h2 pb-2 pb-lg-3">Property details</h1>
                    <div class="nav nav-pills row row-cols-2 gap-0 g-3 g-sm-4 pb-3 pb-sm-4 mb-xl-2">
                        <div class="col">
                            <input type="radio" class="btn-check" id="secondary-estate" name="ownership" checked>
                            <label class="nav-link flex-column w-100 h-100 align-items-start rounded" for="secondary-estate">
                                <span class="h6 pt-1 mb-1">Secondary real estate</span>
                                <span class="fw-normal text-body pb-1">Ownership is already registered</span>
                            </label>
                        </div>
                        <div class="col">
                            <input type="radio" class="btn-check" id="primary-estate" name="ownership">
                            <label class="nav-link flex-column w-100 h-100 align-items-start rounded" for="primary-estate">
                                <span class="h6 pt-1 mb-1">Primary real estate</span>
                                <span class="fw-normal text-body pb-1">Ownership has not yet been formalized</span>
                            </label>
                        </div>
                    </div>
                    <div class="row row-cols-1 row-cols-sm-2 g-3 g-sm-4 pb-3 pb-sm-4 mb-xl-2">
                        <div class="col">
                            <label for="floors-total" class="form-label">Total floors *</label>
                            <input type="number" class="form-control form-control-lg" id="floors-total" min="1" placeholder="Number" required>
                        </div>
                        <div class="col">
                            <label for="floor" class="form-label">Floor *</label>
                            <input type="number" class="form-control form-control-lg" id="floor" min="1" placeholder="Number" required>
                        </div>
                    </div>
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 g-sm-4 pb-3 pb-sm-4 mb-xl-2">
                        <div class="col">
                            <label for="total-area" class="form-label">Total area *</label>
                            <input type="number" class="form-control form-control-lg" id="total-area" min="1" placeholder="sq.m." required>
                        </div>
                        <div class="col">
                            <label for="living-area" class="form-label">Living area *</label>
                            <input type="number" class="form-control form-control-lg" id="living-area" min="1" placeholder="sq.m." required>
                        </div>
                        <div class="col">
                            <label for="kitchen-area" class="form-label">Kitchen area *</label>
                            <input type="number" class="form-control form-control-lg" id="kitchen-area" min="1" placeholder="sq.m." required>
                        </div>
                    </div>

                    <!-- Bedrooms -->
                    <div class="d-flex justify-content-between pb-3 pb-sm-4 mb-xl-2">
                        <label class="form-label text-nowrap mt-2 mb-0 me-3">Bedrooms *</label>
                        <div class="nav nav-pills flex-wrap justify-content-end gap-2">
                            <div>
                                <input type="radio" class="btn-check" id="bedrooms-any" name="bedrooms" checked>
                                <label class="nav-link" for="bedrooms-any">Any</label>
                            </div>
                            <div>
                                <input type="radio" class="btn-check" id="bedrooms-1" name="bedrooms">
                                <label class="nav-link" for="bedrooms-1">
                                    <i class="fi-bed-single fs-base me-1"></i>
                                    1
                                </label>
                            </div>
                            <div>
                                <input type="radio" class="btn-check" id="bedrooms-2" name="bedrooms">
                                <label class="nav-link" for="bedrooms-2">
                                    <i class="fi-bed-single fs-base me-1"></i>
                                    2
                                </label>
                            </div>
                            <div>
                                <input type="radio" class="btn-check" id="bedrooms-3" name="bedrooms">
                                <label class="nav-link" for="bedrooms-3">
                                    <i class="fi-bed-single fs-base me-1"></i>
                                    3
                                </label>
                            </div>
                            <div>
                                <input type="radio" class="btn-check" id="bedrooms-4" name="bedrooms">
                                <label class="nav-link" for="bedrooms-4">
                                    <i class="fi-bed-single fs-base me-1"></i>
                                    4
                                </label>
                            </div>
                            <div>
                                <input type="radio" class="btn-check" id="bedrooms-5" name="bedrooms">
                                <label class="nav-link" for="bedrooms-5">
                                    <i class="fi-bed-single fs-base me-1"></i>
                                    5
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- Bathrooms -->
                    <div class="d-flex justify-content-between pb-3 pb-sm-4 mb-xl-2">
                        <label class="form-label text-nowrap mt-2 mb-0 me-3">Bathrooms *</label>
                        <div class="nav nav-pills flex-wrap justify-content-end gap-2">
                            <div>
                                <input type="radio" class="btn-check" id="bathrooms-any" name="bathrooms" checked>
                                <label class="nav-link" for="bathrooms-any">Any</label>
                            </div>
                            <div>
                                <input type="radio" class="btn-check" id="bathrooms-1" name="bathrooms">
                                <label class="nav-link" for="bathrooms-1">
                                    <i class="fi-shower fs-base me-1"></i>
                                    1
                                </label>
                            </div>
                            <div>
                                <input type="radio" class="btn-check" id="bathrooms-2" name="bathrooms">
                                <label class="nav-link" for="bathrooms-2">
                                    <i class="fi-shower fs-base me-1"></i>
                                    2
                                </label>
                            </div>
                            <div>
                                <input type="radio" class="btn-check" id="bathrooms-3" name="bathrooms">
                                <label class="nav-link" for="bathrooms-3">
                                    <i class="fi-shower fs-base me-1"></i>
                                    3
                                </label>
                            </div>
                            <div>
                                <input type="radio" class="btn-check" id="bathrooms-4" name="bathrooms">
                                <label class="nav-link" for="bathrooms-4">
                                    <i class="fi-shower fs-base me-1"></i>
                                    4
                                </label>
                            </div>
                            <div>
                                <input type="radio" class="btn-check" id="bathrooms-5" name="bathrooms">
                                <label class="nav-link" for="bathrooms-5">
                                    <i class="fi-shower fs-base me-1"></i>
                                    5
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- Parking -->
                    <div class="d-flex justify-content-between pb-3 pb-sm-4 mb-xl-2">
                        <label class="form-label text-nowrap mt-2 mb-0 me-3">Parking spots *</label>
                        <div class="nav nav-pills flex-wrap justify-content-end gap-2">
                            <div>
                                <input type="radio" class="btn-check" id="parking-any" name="parking" checked>
                                <label class="nav-link" for="parking-any">Any</label>
                            </div>
                            <div>
                                <input type="radio" class="btn-check" id="parking-1" name="parking">
                                <label class="nav-link" for="parking-1">
                                    <i class="fi-car-garage fs-base me-1"></i>
                                    1
                                </label>
                            </div>
                            <div>
                                <input type="radio" class="btn-check" id="parking-2" name="parking">
                                <label class="nav-link" for="parking-2">
                                    <i class="fi-car-garage fs-base me-1"></i>
                                    2
                                </label>
                            </div>
                            <div>
                                <input type="radio" class="btn-check" id="parking-3" name="parking">
                                <label class="nav-link" for="parking-3">
                                    <i class="fi-car-garage fs-base me-1"></i>
                                    3
                                </label>
                            </div>
                            <div>
                                <input type="radio" class="btn-check" id="parking-4" name="parking">
                                <label class="nav-link" for="parking-4">
                                    <i class="fi-car-garage fs-base me-1"></i>
                                    4
                                </label>
                            </div>
                            <div>
                                <input type="radio" class="btn-check" id="parking-5" name="parking">
                                <label class="nav-link" for="parking-5">
                                    <i class="fi-car-garage fs-base me-1"></i>
                                    5
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- Amenities -->
                    <h2 class="h6">Amenities</h2>
                    <div class="row row-cols-2 row-cols-md-3 gy-3 gx-4">
                        <div class="col">
                            <div class="form-check mb-0">
                                <input type="checkbox" class="form-check-input" id="tv">
                                <label for="tv" class="form-check-label">TV set</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-check mb-0">
                                <input type="checkbox" class="form-check-input" id="washing">
                                <label for="washing" class="form-check-label">Washing machine</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-check mb-0">
                                <input type="checkbox" class="form-check-input" id="kitchen">
                                <label for="kitchen" class="form-check-label">Kitchen</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-check mb-0">
                                <input type="checkbox" class="form-check-input" id="ac">
                                <label for="ac" class="form-check-label">Air conditioning</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-check mb-0">
                                <input type="checkbox" class="form-check-input" id="workspace">
                                <label for="workspace" class="form-check-label">Separate workplace</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-check mb-0">
                                <input type="checkbox" class="form-check-input" id="fridge">
                                <label for="fridge" class="form-check-label">Refrigerator</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-check mb-0">
                                <input type="checkbox" class="form-check-input" id="drying">
                                <label for="drying" class="form-check-label">Drying machine</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-check mb-0">
                                <input type="checkbox" class="form-check-input" id="closet">
                                <label for="closet" class="form-check-label">Closet</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-check mb-0">
                                <input type="checkbox" class="form-check-input" id="patio">
                                <label for="patio" class="form-check-label">Patio</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-check mb-0">
                                <input type="checkbox" class="form-check-input" id="fireplace">
                                <label for="fireplace" class="form-check-label">Fireplace</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-check mb-0">
                                <input type="checkbox" class="form-check-input" id="shower">
                                <label for="shower" class="form-check-label">Shower cabin</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-check mb-0">
                                <input type="checkbox" class="form-check-input" id="whirlpool">
                                <label for="whirlpool" class="form-check-label">Whirlpool</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-check mb-0">
                                <input type="checkbox" class="form-check-input" id="cctv">
                                <label for="cctv" class="form-check-label">Security cameras</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-check mb-0">
                                <input type="checkbox" class="form-check-input" id="balcony">
                                <label for="balcony" class="form-check-label">Balcony</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-check mb-0">
                                <input type="checkbox" class="form-check-input" id="bar">
                                <label for="bar" class="form-check-label">Bar</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>


    <!-- Prev / Next navigation (Footer) -->
    <footer class="sticky-bottom bg-body pb-3">
        <div class="progress rounded-0" role="progressbar" aria-label="Dark example" aria-valuenow="57.14" aria-valuemin="0" aria-valuemax="100" style="height: 4px">
            <div class="progress-bar bg-dark d-none-dark" style="width: 57.14%"></div>
            <div class="progress-bar bg-light d-none d-block-dark" style="width: 57.14%"></div>
        </div>
        <div class="container d-flex gap-3 pt-3">
            <a class="btn btn-outline-dark animate-slide-start" href="add-property-photos">
                <i class="fi-arrow-left animate-target fs-base ms-n1 me-2"></i>
                Back
            </a>
            <a class="btn btn-dark animate-slide-end ms-auto" href="add-property-price">
                Next
                <i class="fi-arrow-right animate-target fs-base ms-2 me-n1"></i>
            </a>
        </div>
    </footer>

@endsection

@push('scripts')
    @vite(['resources/js/app.js'])
@endpush