@extends('layouts.app')

@section('title', 'Finder | Add Property - Contact Info')

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
                                <a class="nav-link d-inline-flex position-relative px-0 px-lg-3 active" href="add-property-details">
                                    <i class="fi-check-circle fs-lg me-2"></i>
                                    <span class="hover-effect-underline stretched-link">Property details</span>
                                </a>
                            </li>
                            <li class="nat-item">
                                <a class="nav-link d-inline-flex position-relative px-0 px-lg-3 active" href="add-property-price">
                                    <i class="fi-check-circle fs-lg me-2"></i>
                                    <span class="hover-effect-underline stretched-link">Price</span>
                                </a>
                            </li>
                            <li class="nat-item">
                                <a class="nav-link d-inline-flex px-0 px-lg-3 pe-none" aria-current="page">
                                    <i class="fi-arrow-right-circle d-none d-lg-inline-flex fs-lg me-2"></i>
                                    <i class="fi-arrow-down-circle d-lg-none fs-lg me-2"></i>
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
                    <h1 class="h2 pb-2 pb-lg-3">Contact info</h1>
                    <div class="row row-cols-1 row-cols-sm-2 g-3 g-sm-4 pb-3 pb-sm-4 mb-xl-2">
                        <div class="col">
                            <label for="fn" class="form-label">First name *</label>
                            <input type="text" class="form-control form-control-lg" id="fn" required>
                        </div>
                        <div class="col">
                            <label for="ln" class="form-label">Last name *</label>
                            <input type="text" class="form-control form-control-lg" id="ln" required>
                        </div>
                    </div>
                    <div class="row row-cols-1 row-cols-sm-2 g-3 g-sm-4 pb-3 pb-sm-4 mb-xl-2">
                        <div class="col">
                            <label for="email" class="form-label">Email *</label>
                            <input type="email" class="form-control form-control-lg" id="email" required>
                        </div>
                        <div class="col">
                            <label for="phone" class="form-label">Phone number *</label>
                            <input type="tel" class="form-control form-control-lg" id="phone" data-input-format='{"numericOnly": true, "delimiters": ["(", ")", " ", "-", " "], "blocks": [0, 3, 0, 3, 4]}' placeholder="(___) ___-____" required>
                        </div>
                    </div>
                    <div class="form-check form-switch mb-0">
                        <input type="checkbox" class="form-check-input" role="switch" id="tour">
                        <label for="tour" class="form-check-label fw-medium">Open for schedule for a tour</label>
                    </div>
                </div>
            </div>
        </div>
    </main>


    <!-- Prev / Next navigation (Footer) -->
    <footer class="sticky-bottom bg-body pb-3">
        <div class="progress rounded-0" role="progressbar" aria-label="Dark example" aria-valuenow="85.71" aria-valuemin="0" aria-valuemax="100" style="height: 4px">
            <div class="progress-bar bg-dark d-none-dark" style="width: 85.71%"></div>
            <div class="progress-bar bg-light d-none d-block-dark" style="width: 85.71%"></div>
        </div>
        <div class="container d-flex gap-3 pt-3">
            <a class="btn btn-outline-dark animate-slide-start" href="add-property-price">
                <i class="fi-arrow-left animate-target fs-base ms-n1 me-2"></i>
                Back
            </a>
            <a class="btn btn-dark animate-slide-end ms-auto" href="add-property-promotion">
                Next
                <i class="fi-arrow-right animate-target fs-base ms-2 me-n1"></i>
            </a>
        </div>
    </footer>

@endsection

@push('scripts')
    <script src="{{ asset('assets/vendor/cleave.js/dist/cleave.min.js') }}"></script>
    @vite(['resources/js/app.js'])
@endpush