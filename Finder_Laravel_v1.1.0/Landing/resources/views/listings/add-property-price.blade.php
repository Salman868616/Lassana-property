@extends('layouts.app')

@section('title', 'Finder | Add Property - Price')

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
                                <a class="nav-link d-inline-flex px-0 px-lg-3 pe-none" aria-current="page">
                                    <i class="fi-arrow-right-circle d-none d-lg-inline-flex fs-lg me-2"></i>
                                    <i class="fi-arrow-down-circle d-lg-none fs-lg me-2"></i>
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
                    <h1 class="h2 pb-2 pb-lg-3">Price</h1>
                    <label for="price" class="form-label">Price *</label>
                    <div class="position-relative mb-3" style="max-width: 390px">
                        <i class="fi-dollar-sign fs-lg position-absolute top-50 start-0 translate-middle-y ms-3"></i>
                        <input type="number" class="form-control form-control-lg form-icon-start" id="price" min="20" placeholder="Set a fair price" required>
                    </div>
                    <div class="form-check form-switch">
                        <input type="checkbox" class="form-check-input" role="switch" id="negotiated">
                        <label for="negotiated" class="form-check-label fw-medium">Negotiated price</label>
                    </div>
                    <div class="pt-3 mt-3">
                        <label class="form-label pb-1 mb-2">Type of offer *</label>
                        <div class="nav nav-pills flex-wrap gap-3">
                            <div>
                                <input type="radio" class="btn-check" id="private" name="type" checked>
                                <label class="nav-link" for="private">
                                    <i class="fi-user fs-base ms-n1 me-2"></i>
                                    Private person
                                </label>
                            </div>
                            <div>
                                <input type="radio" class="btn-check" id="agent" name="type">
                                <label class="nav-link" for="agent">
                                    <i class="fi-briefcase fs-base ms-n1 me-2"></i>
                                    Real estate agent
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="pt-3 mt-3">
                        <div class="d-flex flex-column gap-3">
                            <div class="form-check mb-0">
                                <input type="checkbox" class="form-check-input" id="no-credit">
                                <label for="no-credit" class="form-check-label">Not available for sale on credit</label>
                            </div>
                            <div class="form-check mb-0">
                                <input type="checkbox" class="form-check-input" id="ready-agents">
                                <label for="ready-agents" class="form-check-label">Ready to cooperate with real estate agents</label>
                            </div>
                            <div class="form-check mb-0">
                                <input type="checkbox" class="form-check-input" id="exchange">
                                <label for="exchange" class="form-check-label">The possibility of exchange</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>


    <!-- Prev / Next navigation (Footer) -->
    <footer class="sticky-bottom bg-body pb-3">
        <div class="progress rounded-0" role="progressbar" aria-label="Dark example" aria-valuenow="71.43" aria-valuemin="0" aria-valuemax="100" style="height: 4px">
            <div class="progress-bar bg-dark d-none-dark" style="width: 71.43%"></div>
            <div class="progress-bar bg-light d-none d-block-dark" style="width: 71.43%"></div>
        </div>
        <div class="container d-flex gap-3 pt-3">
            <a class="btn btn-outline-dark animate-slide-start" href="add-property-details">
                <i class="fi-arrow-left animate-target fs-base ms-n1 me-2"></i>
                Back
            </a>
            <a class="btn btn-dark animate-slide-end ms-auto" href="add-property-contact-info">
                Next
                <i class="fi-arrow-right animate-target fs-base ms-2 me-n1"></i>
            </a>
        </div>
    </footer>

@endsection

@push('scripts')
    @vite(['resources/js/app.js'])
@endpush