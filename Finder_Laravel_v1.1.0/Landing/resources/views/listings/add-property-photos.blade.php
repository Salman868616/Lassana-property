@extends('layouts.app')

@section('title', 'Finder | Add Property - Photos and Videos')

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
                                <a class="nav-link d-inline-flex px-0 px-lg-3 pe-none" aria-current="page">
                                    <i class="fi-arrow-right-circle d-none d-lg-inline-flex fs-lg me-2"></i>
                                    <i class="fi-arrow-down-circle d-lg-none fs-lg me-2"></i>
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


                <!-- Property photos and videos inputs -->
                <div class="col-lg-9 col-xl-8">
                    <h1 class="h2 pb-1 pb-lg-2">Photos and videos</h1>
                    <p class="fs-sm mb-0">The maximum photo size is 8 MB. Formats: jpeg, jpg, png. Put the main picture first.</p>
                    <p class="fs-sm">The maximum video size is 10 MB. Formats: mp4, mov.</p>
                    <div class="border rounded p-3">
                        <div class="row row-cols-2 row-cols-sm-3 g-2">

                            <!-- Item -->
                            <div class="col">
                                <div class="hover-effect-opacity position-relative overflow-hidden rounded">
                                    <span class="badge text-bg-light position-absolute top-0 start-0 z-3 mt-2 ms-2">Cover</span>
                                    <div class="ratio" style="--fn-aspect-ratio: calc(180 / 268 * 100%)">
                                        <img src="{{ asset('assets/img/add-item/property/01.jpg') }}" alt="Image">
                                    </div>
                                    <div class="hover-effect-target position-absolute top-0 start-0 d-flex align-items-center justify-content-center w-100 h-100 opacity-0">
                                        <button type="button" class="btn btn-icon btn-sm btn-light position-relative z-2" aria-label="Remove">
                                            <i class="fi-trash fs-base"></i>
                                        </button>
                                        <span class="position-absolute top-0 start-0 w-100 h-100 bg-black bg-opacity-25 z-1"></span>
                                    </div>
                                </div>
                            </div>

                            <!-- Item -->
                            <div class="col">
                                <div class="hover-effect-opacity position-relative overflow-hidden rounded">
                                    <div class="ratio" style="--fn-aspect-ratio: calc(180 / 268 * 100%)">
                                        <img src="{{ asset('assets/img/add-item/property/02.jpg') }}" alt="Image">
                                    </div>
                                    <div class="hover-effect-target position-absolute top-0 start-0 d-flex align-items-center justify-content-center w-100 h-100 opacity-0">
                                        <button type="button" class="btn btn-icon btn-sm btn-light position-relative z-2" aria-label="Remove">
                                            <i class="fi-trash fs-base"></i>
                                        </button>
                                        <span class="position-absolute top-0 start-0 w-100 h-100 bg-black bg-opacity-25 z-1"></span>
                                    </div>
                                </div>
                            </div>

                            <!-- Item -->
                            <div class="col">
                                <div class="hover-effect-opacity position-relative overflow-hidden rounded">
                                    <div class="ratio" style="--fn-aspect-ratio: calc(180 / 268 * 100%)">
                                        <img src="{{ asset('assets/img/add-item/property/03.jpg') }}" alt="Image">
                                    </div>
                                    <div class="hover-effect-target position-absolute top-0 start-0 d-flex align-items-center justify-content-center w-100 h-100 opacity-0">
                                        <button type="button" class="btn btn-icon btn-sm btn-light position-relative z-2" aria-label="Remove">
                                            <i class="fi-trash fs-base"></i>
                                        </button>
                                        <span class="position-absolute top-0 start-0 w-100 h-100 bg-black bg-opacity-25 z-1"></span>
                                    </div>
                                </div>
                            </div>

                            <!-- Item -->
                            <div class="col">
                                <div class="hover-effect-opacity position-relative overflow-hidden rounded">
                                    <div class="ratio" style="--fn-aspect-ratio: calc(180 / 268 * 100%)">
                                        <img src="{{ asset('assets/img/add-item/property/04.jpg') }}" alt="Image">
                                    </div>
                                    <div class="hover-effect-target position-absolute top-0 start-0 d-flex align-items-center justify-content-center w-100 h-100 opacity-0">
                                        <button type="button" class="btn btn-icon btn-sm btn-light position-relative z-2" aria-label="Remove">
                                            <i class="fi-trash fs-base"></i>
                                        </button>
                                        <span class="position-absolute top-0 start-0 w-100 h-100 bg-black bg-opacity-25 z-1"></span>
                                    </div>
                                </div>
                            </div>

                            <!-- Upload button -->
                            <div class="col">
                                <div class="d-flex align-items-center justify-content-center position-relative h-100 cursor-pointer bg-body-tertiary border border-2 border-dotted rounded p-3">
                                    <div class="text-center">
                                        <i class="fi-plus-circle fs-4 text-secondary-emphasis mb-2"></i>
                                        <div class="hover-effect-underline stretched-link fs-sm fw-medium">Upload photos / videos</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pt-3 mt-3">
                        <label for="link" class="form-label">Link to the video tour</label>
                        <div class="position-relative">
                            <i class="fi-link position-absolute top-50 start-0 translate-middle-y fs-lg ms-3"></i>
                            <input type="url" class="form-control form-control-lg form-icon-start" id="link" placeholder="www.youtube.com/...">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>


    <!-- Prev / Next navigation (Footer) -->
    <footer class="sticky-bottom bg-body pb-3">
        <div class="progress rounded-0" role="progressbar" aria-label="Dark example" aria-valuenow="42.86" aria-valuemin="0" aria-valuemax="100" style="height: 4px">
            <div class="progress-bar bg-dark d-none-dark" style="width: 42.86%"></div>
            <div class="progress-bar bg-light d-none d-block-dark" style="width: 42.86%"></div>
        </div>
        <div class="container d-flex gap-3 pt-3">
            <a class="btn btn-outline-dark animate-slide-start" href="add-property-location">
                <i class="fi-arrow-left animate-target fs-base ms-n1 me-2"></i>
                Back
            </a>
            <a class="btn btn-dark animate-slide-end ms-auto" href="add-property-details">
                Next
                <i class="fi-arrow-right animate-target fs-base ms-2 me-n1"></i>
            </a>
        </div>
    </footer>

@endsection

@push('scripts')
    @vite(['resources/js/app.js'])
@endpush