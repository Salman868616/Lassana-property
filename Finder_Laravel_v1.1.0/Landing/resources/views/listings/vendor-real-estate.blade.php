@php $type = 'real-estate' @endphp
@extends('layouts.app')

@section('title', 'Finder | Real Estate - Vendor Page')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/glightbox/dist/css/glightbox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/choices.js/public/assets/styles/choices.min.css') }}">
@endpush

@section('content')

    @include('layouts.partials.header.real-estate-header')

    <!-- Review form modal -->
    <div class="modal fade" id="reviewForm" data-bs-backdrop="static" tabindex="-1" aria-labelledby="reviewFormLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <form class="modal-content needs-validation" novalidate>
                <div class="modal-header border-0">
                    <h5 class="modal-title" id="reviewFormLabel">Leave a review</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body pb-3 pt-0">
                    <div class="mb-3">
                        <label for="review-name" class="form-label">Your name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="review-name" required>
                        <div class="invalid-feedback">Please enter your name!</div>
                        <small class="form-text">Will be displayed on the comment.</small>
                    </div>
                    <div class="mb-3">
                        <label for="review-email" class="form-label">Your email <span class="text-danger">*</span></label>
                        <input type="email" class="form-control" id="review-email" required>
                        <div class="invalid-feedback">Please provide valid email address!</div>
                        <small class="form-text">Authentication only - we won't spam you.</small>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Rating <span class="text-danger">*</span></label>
                        <select class="form-select" data-select='{
                                            "placeholderValue": "Select rating",
                                            "choices": [
                                              {
                                                "value": "",
                                                "label": "Select rating",
                                                "placeholder": true
                                              },
                                              {
                                                "value": "1",
                                                "label": "<span class=\"visually-hidden\">1 star</span>",
                                                "customProperties": {
                                                  "icon": "<span class=\"d-flex gap-1 py-1\"><i class=\"fi-star-filled text-warning\"></i></span>",
                                                  "selected": "1 star"
                                                }
                                              },
                                              {
                                                "value": "2",
                                                "label": "<span class=\"visually-hidden\">2 stars</span>",
                                                "customProperties": {
                                                  "icon": "<span class=\"d-flex gap-1 py-1\"><i class=\"fi-star-filled text-warning\"></i><i class=\"fi-star-filled text-warning\"></i></span>",
                                                  "selected": "2 stars"
                                                }
                                              },
                                              {
                                                "value": "3",
                                                "label": "<span class=\"visually-hidden\">3 stars</span>",
                                                "customProperties": {
                                                  "icon": "<span class=\"d-flex gap-1 py-1\"><i class=\"fi-star-filled text-warning\"></i><i class=\"fi-star-filled text-warning\"></i><i class=\"fi-star-filled text-warning\"></i></span>",
                                                  "selected": "3 stars"
                                                }
                                              },
                                              {
                                                "value": "4",
                                                "label": "<span class=\"visually-hidden\">4 stars</span>",
                                                "customProperties": {
                                                  "icon": "<span class=\"d-flex gap-1 py-1\"><i class=\"fi-star-filled text-warning\"></i><i class=\"fi-star-filled text-warning\"></i><i class=\"fi-star-filled text-warning\"></i><i class=\"ci-star-filled text-warning\"></i></span>",
                                                  "selected": "4 stars"
                                                }
                                              },
                                              {
                                                "value": "5",
                                                "label": "<span class=\"visually-hidden\">5 stars</span>",
                                                "customProperties": {
                                                  "icon": "<span class=\"d-flex gap-1 py-1\"><i class=\"fi-star-filled text-warning\"></i><i class=\"fi-star-filled text-warning\"></i><i class=\"fi-star-filled text-warning\"></i><i class=\"fi-star-filled text-warning\"></i><i class=\"ci-star-filled text-warning\"></i></span>",
                                                  "selected": "5 stars"
                                                }
                                              }
                                            ]
                                          }' data-select-template="true" aria-label="Rating select" required></select>
                        <div class="invalid-feedback">Please select your rating!</div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Property <span class="text-danger">*</span></label>
                        <select class="form-select" data-select aria-label="Property select" required>
                            <option value="">Select property</option>
                            <option value="929 Hart St, Brooklyn, NY 11237">929 Hart St, Brooklyn, NY 11237</option>
                            <option value="3811 Ditmars Blvd Astoria, NY 11105">3811 Ditmars Blvd Astoria, NY 11105</option>
                            <option value="444 Park Ave, Brooklyn, NY 11205">444 Park Ave, Brooklyn, NY 11205</option>
                            <option value="517 82nd St, Brooklyn, NY 11209">517 82nd St, Brooklyn, NY 11209</option>
                            <option value="40 S 9th St, Brooklyn, NY 11249">40 S 9th St, Brooklyn, NY 11249</option>
                        </select>
                        <div class="invalid-feedback">Please select a property!</div>
                    </div>
                    <div>
                        <label class="form-label" for="review-text">Review <span class="text-danger">*</span></label>
                        <textarea class="form-control" rows="4" id="review-text" required></textarea>
                        <div class="invalid-feedback">Please write a review!</div>
                        <small class="form-text">Your review must be at least 50 characters.</small>
                    </div>
                </div>
                <div class="modal-footer flex-nowrap gap-3 border-0 px-4">
                    <button type="reset" class="btn btn-secondary w-100 m-0" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary w-100 m-0">Submit review</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Page content -->
    <main class="content-wrapper">

        <!-- Cover image -->
        <section class="position-relative bg-body-tertiary">
            <img src="{{ asset('assets/img/listings/real-estate/vendor-cover.jpg') }}" class="position-absolute top-0 start-0 w-100 h-100 object-fit-cover" alt="Cover image">
            <div class="d-md-none" style="height: 200px"></div>
            <div class="d-none d-md-block d-lg-none" style="height: 260px"></div>
            <div class="d-none d-lg-block d-xl-none" style="height: 300px"></div>
            <div class="d-none d-xl-block" style="height: 340px"></div>
        </section>


        <!-- Vendor details -->
        <section class="container position-relative z-1">
            <div style="margin-top: -128px"></div>
            <div class="bg-body border rounded p-4 px-lg-5">
                <div class="d-flex flex-column gap-4 py-sm-2 py-lg-3">
                    <div class="d-md-flex justify-content-between pb-lg-1 mb-md-2">
                        <div class="d-flex align-items-start align-items-md-center mb-3 mb-md-0">
                            <div class="ratio ratio-1x1 bg-body-tertiary border rounded-circle overflow-hidden" style="width: 124px">
                                <img src="{{ asset('assets/img/account/avatar-lg.jpg') }}" alt="Avatar">
                            </div>
                            <div class="ps-3 ps-md-4 ms-lg-2">
                                <span class="badge text-bg-info d-inline-flex align-items-center mb-2">
                                    Verified
                                    <i class="fi-shield ms-1"></i>
                                </span>
                                <h1 class="h4 py-sm-1 mb-2">Michael Williams</h1>
                                <ul class="nav flex-wrap align-items-center gap-2 fs-sm">
                                    <li class="text-body-secondary me-2">New York, Brooklyn</li>
                                    <li class="na-item">
                                        <a class="nav-link position-relative p-0" href="#!">
                                            <i class="fi-link fs-base me-1"></i>
                                            <span class="hover-effect-underline stretched-link">Imperial Property Agency</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="ps-md-3 ps-lg-4">
                            <div class="d-flex flex-column flex-sm-row gap-2 mb-md-3">
                                <a class="btn btn-dark" href="tel:2125557890">
                                    <i class="fi-phone fs-base ms-n1 me-2"></i>
                                    (212)&nbsp;555&#8209;7890
                                </a>
                                <a class="btn btn-outline-secondary" href="mailto:m.williams@example.com">
                                    <i class="fi-mail fs-base ms-n1 me-2"></i>
                                    Send email
                                </a>
                            </div>
                            <div class="d-none d-md-block fs-xs text-body-secondary text-end">Last visited 2 hours ago</div>
                        </div>
                    </div>
                    <p class="mb-0 mb-md-2 mb-lg-3">Extensive experience in rentals and a vast database means I can quickly find the options that are right for you. Looking for a seamless and exciting rental experience? Contact me today - I promise it won't be boring! Your perfect home is just a call away.</p>
                    <div class="row row-cols-2 row-cols-sm-4 g-4">
                        <div class="col">
                            <h5 class="mb-2">3 years</h5>
                            <p class="fs-sm mb-0">Works with Finder</p>
                        </div>
                        <div class="col">
                            <h5 class="mb-2">26</h5>
                            <p class="fs-sm mb-0">Properties published</p>
                        </div>
                        <div class="col">
                            <h5 class="mb-2">12</h5>
                            <p class="fs-sm mb-0">Properties sold</p>
                        </div>
                        <div class="col">
                            <h5 class="d-flex align-items-center lh-base mb-2"><i class="fi-star-filled text-warning me-2"></i>4.9</h5>
                            <p class="fs-sm mb-0">Finder overall rating</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <!-- Property listings -->
        <section class="container pt-5 mt-2 mt-md-3 mt-lg-4">
            <h2 class="pb-2 pb-lg-3">Properties</h2>

            <!-- Nav pills -->
            <div class="nav overflow-x-auto mb-3">
                <ul class="nav nav-pills flex-nowrap gap-2 pb-2 mb-1" role="tablist">
                    <li class="nav-item me-1" role="presentation">
                        <button type="button" class="nav-link text-nowrap active" role="tab">
                            For rent (8)
                        </button>
                    </li>
                    <li class="nav-item me-1" role="presentation">
                        <button type="button" class="nav-link text-nowrap" role="tab">
                            For sale (13)
                        </button>
                    </li>
                </ul>
            </div>

            <!-- Properties grid -->
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4 g-md-3 g-lg-4">

                <!-- Listing -->
                <div class="col">
                    <article class="card hover-effect-opacity h-100">
                        <div class="card-img-top position-relative bg-body-tertiary overflow-hidden">
                            <div class="swiper z-2" data-swiper='{
                                          "pagination": {
                                            "el": ".swiper-pagination"
                                          },
                                          "navigation": {
                                            "prevEl": ".btn-prev",
                                            "nextEl": ".btn-next"
                                          },
                                          "breakpoints": {
                                            "991": {
                                              "allowTouchMove": false
                                            }
                                          }
                                        }'>
                                <a class="swiper-wrapper" href="single-entry-real-estate">
                                    <div class="swiper-slide">
                                        <div class="ratio d-block" style="--fn-aspect-ratio: calc(248 / 362 * 100%)">
                                            <img src="{{ asset('assets/img/listings/real-estate/06.jpg') }}" alt="Image">
                                            <span class="position-absolute top-0 start-0 w-100 h-100 z-1" style="background: linear-gradient(180deg, rgba(0,0,0, 0) 0%, rgba(0,0,0, .11) 100%)"></span>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="ratio d-block" style="--fn-aspect-ratio: calc(248 / 362 * 100%)">
                                            <img src="{{ asset('assets/img/listings/real-estate/06.jpg') }}" alt="Image">
                                            <span class="position-absolute top-0 start-0 w-100 h-100 z-1" style="background: linear-gradient(180deg, rgba(0,0,0, 0) 0%, rgba(0,0,0, .11) 100%)"></span>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="ratio d-block" style="--fn-aspect-ratio: calc(248 / 362 * 100%)">
                                            <img src="{{ asset('assets/img/listings/real-estate/06.jpg') }}" alt="Image">
                                            <span class="position-absolute top-0 start-0 w-100 h-100 z-1" style="background: linear-gradient(180deg, rgba(0,0,0, 0) 0%, rgba(0,0,0, .11) 100%)"></span>
                                        </div>
                                    </div>
                                </a>
                                <div class="d-flex flex-column gap-2 align-items-start position-absolute top-0 start-0 z-1 pt-1 pt-sm-0 ps-1 ps-sm-0 mt-2 mt-sm-3 ms-2 ms-sm-3">
                                    <span class="badge text-bg-primary">New</span>
                                </div>
                                <div class="position-absolute top-0 end-0 z-1 hover-effect-target opacity-0 pt-1 pt-sm-0 pe-1 pe-sm-0 mt-2 mt-sm-3 me-2 me-sm-3">
                                    <button type="button" class="btn btn-sm btn-icon btn-light bg-light border-0 rounded-circle animate-pulse" aria-label="Add to wishlist">
                                        <i class="fi-heart animate-target fs-sm"></i>
                                    </button>
                                </div>
                                <div class="position-absolute top-50 start-0 z-1 translate-middle-y d-none d-lg-block hover-effect-target opacity-0 ms-3">
                                    <button type="button" class="btn btn-sm btn-prev btn-icon btn-light bg-light rounded-circle animate-slide-start" aria-label="Prev">
                                        <i class="fi-chevron-left fs-lg animate-target"></i>
                                    </button>
                                </div>
                                <div class="position-absolute top-50 end-0 z-1 translate-middle-y d-none d-lg-block hover-effect-target opacity-0 me-3">
                                    <button type="button" class="btn btn-sm btn-next btn-icon btn-light bg-light rounded-circle animate-slide-end" aria-label="Next">
                                        <i class="fi-chevron-right fs-lg animate-target"></i>
                                    </button>
                                </div>
                                <div class="swiper-pagination bottom-0 mb-2" data-bs-theme="light"></div>
                            </div>
                        </div>
                        <div class="card-body p-3">
                            <div class="pb-1 mb-2">
                                <span class="badge text-body-emphasis bg-body-secondary">For rent</span>
                            </div>
                            <div class="h5 mb-2">$2,750</div>
                            <h3 class="fs-sm fw-normal text-body mb-2">
                                <a class="stretched-link text-body" href="single-entry-real-estate">929 Hart St, Brooklyn, NY 11237</a>
                            </h3>
                            <div class="h6 fs-sm mb-0">108 sq.m</div>
                        </div>
                        <div class="card-footer d-flex gap-2 border-0 bg-transparent pt-0 pb-3 px-3 mt-n1">
                            <div class="d-flex align-items-center fs-sm gap-1 me-1">
                                3<i class="fi-bed-single fs-base text-secondary-emphasis"></i>
                            </div>
                            <div class="d-flex align-items-center fs-sm gap-1 me-1">
                                2<i class="fi-shower fs-base text-secondary-emphasis"></i>
                            </div>
                            <div class="d-flex align-items-center fs-sm gap-1 me-1">
                                1<i class="fi-car-garage fs-base text-secondary-emphasis"></i>
                            </div>
                        </div>
                    </article>
                </div>

                <!-- Listing -->
                <div class="col">
                    <article class="card hover-effect-opacity h-100">
                        <div class="card-img-top position-relative bg-body-tertiary overflow-hidden">
                            <div class="swiper z-2" data-swiper='{
                                          "pagination": {
                                            "el": ".swiper-pagination"
                                          },
                                          "navigation": {
                                            "prevEl": ".btn-prev",
                                            "nextEl": ".btn-next"
                                          },
                                          "breakpoints": {
                                            "991": {
                                              "allowTouchMove": false
                                            }
                                          }
                                        }'>
                                <a class="swiper-wrapper" href="single-entry-real-estate">
                                    <div class="swiper-slide">
                                        <div class="ratio d-block" style="--fn-aspect-ratio: calc(248 / 362 * 100%)">
                                            <img src="{{ asset('assets/img/listings/real-estate/03.jpg') }}" alt="Image">
                                            <span class="position-absolute top-0 start-0 w-100 h-100 z-1" style="background: linear-gradient(180deg, rgba(0,0,0, 0) 0%, rgba(0,0,0, .11) 100%)"></span>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="ratio d-block" style="--fn-aspect-ratio: calc(248 / 362 * 100%)">
                                            <img src="{{ asset('assets/img/listings/real-estate/03.jpg') }}" alt="Image">
                                            <span class="position-absolute top-0 start-0 w-100 h-100 z-1" style="background: linear-gradient(180deg, rgba(0,0,0, 0) 0%, rgba(0,0,0, .11) 100%)"></span>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="ratio d-block" style="--fn-aspect-ratio: calc(248 / 362 * 100%)">
                                            <img src="{{ asset('assets/img/listings/real-estate/03.jpg') }}" alt="Image">
                                            <span class="position-absolute top-0 start-0 w-100 h-100 z-1" style="background: linear-gradient(180deg, rgba(0,0,0, 0) 0%, rgba(0,0,0, .11) 100%)"></span>
                                        </div>
                                    </div>
                                </a>
                                <div class="d-flex flex-column gap-2 align-items-start position-absolute top-0 start-0 z-1 pt-1 pt-sm-0 ps-1 ps-sm-0 mt-2 mt-sm-3 ms-2 ms-sm-3">
                                    <span class="badge text-bg-info">Featured</span>
                                    <span class="badge text-bg-primary">New</span>
                                </div>
                                <div class="position-absolute top-0 end-0 z-1 hover-effect-target opacity-0 pt-1 pt-sm-0 pe-1 pe-sm-0 mt-2 mt-sm-3 me-2 me-sm-3">
                                    <button type="button" class="btn btn-sm btn-icon btn-light bg-light border-0 rounded-circle animate-pulse" aria-label="Add to wishlist">
                                        <i class="fi-heart animate-target fs-sm"></i>
                                    </button>
                                </div>
                                <div class="position-absolute top-50 start-0 z-1 translate-middle-y d-none d-lg-block hover-effect-target opacity-0 ms-3">
                                    <button type="button" class="btn btn-sm btn-prev btn-icon btn-light bg-light rounded-circle animate-slide-start" aria-label="Prev">
                                        <i class="fi-chevron-left fs-lg animate-target"></i>
                                    </button>
                                </div>
                                <div class="position-absolute top-50 end-0 z-1 translate-middle-y d-none d-lg-block hover-effect-target opacity-0 me-3">
                                    <button type="button" class="btn btn-sm btn-next btn-icon btn-light bg-light rounded-circle animate-slide-end" aria-label="Next">
                                        <i class="fi-chevron-right fs-lg animate-target"></i>
                                    </button>
                                </div>
                                <div class="swiper-pagination bottom-0 mb-2" data-bs-theme="light"></div>
                            </div>
                        </div>
                        <div class="card-body p-3">
                            <div class="pb-1 mb-2">
                                <span class="badge text-body-emphasis bg-body-secondary">For rent</span>
                            </div>
                            <div class="h5 mb-2">$1,890</div>
                            <h3 class="fs-sm fw-normal text-body mb-2">
                                <a class="stretched-link text-body" href="single-entry-real-estate">3811 Ditmars Blvd Astoria, NY 11105</a>
                            </h3>
                            <div class="h6 fs-sm mb-0">75 sq.m</div>
                        </div>
                        <div class="card-footer d-flex gap-2 border-0 bg-transparent pt-0 pb-3 px-3 mt-n1">
                            <div class="d-flex align-items-center fs-sm gap-1 me-1">
                                2<i class="fi-bed-single fs-base text-secondary-emphasis"></i>
                            </div>
                            <div class="d-flex align-items-center fs-sm gap-1 me-1">
                                1<i class="fi-shower fs-base text-secondary-emphasis"></i>
                            </div>
                            <div class="d-flex align-items-center fs-sm gap-1 me-1">
                                1<i class="fi-car-garage fs-base text-secondary-emphasis"></i>
                            </div>
                        </div>
                    </article>
                </div>

                <!-- Listing -->
                <div class="col">
                    <article class="card hover-effect-opacity h-100">
                        <div class="card-img-top position-relative bg-body-tertiary overflow-hidden">
                            <div class="swiper z-2" data-swiper='{
                                          "pagination": {
                                            "el": ".swiper-pagination"
                                          },
                                          "navigation": {
                                            "prevEl": ".btn-prev",
                                            "nextEl": ".btn-next"
                                          },
                                          "breakpoints": {
                                            "991": {
                                              "allowTouchMove": false
                                            }
                                          }
                                        }'>
                                <a class="swiper-wrapper" href="single-entry-real-estate">
                                    <div class="swiper-slide">
                                        <div class="ratio d-block" style="--fn-aspect-ratio: calc(248 / 362 * 100%)">
                                            <img src="{{ asset('assets/img/listings/real-estate/05.jpg') }}" alt="Image">
                                            <span class="position-absolute top-0 start-0 w-100 h-100 z-1" style="background: linear-gradient(180deg, rgba(0,0,0, 0) 0%, rgba(0,0,0, .11) 100%)"></span>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="ratio d-block" style="--fn-aspect-ratio: calc(248 / 362 * 100%)">
                                            <img src="{{ asset('assets/img/listings/real-estate/05.jpg') }}" alt="Image">
                                            <span class="position-absolute top-0 start-0 w-100 h-100 z-1" style="background: linear-gradient(180deg, rgba(0,0,0, 0) 0%, rgba(0,0,0, .11) 100%)"></span>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="ratio d-block" style="--fn-aspect-ratio: calc(248 / 362 * 100%)">
                                            <img src="{{ asset('assets/img/listings/real-estate/05.jpg') }}" alt="Image">
                                            <span class="position-absolute top-0 start-0 w-100 h-100 z-1" style="background: linear-gradient(180deg, rgba(0,0,0, 0) 0%, rgba(0,0,0, .11) 100%)"></span>
                                        </div>
                                    </div>
                                </a>
                                <div class="d-flex flex-column gap-2 align-items-start position-absolute top-0 start-0 z-1 pt-1 pt-sm-0 ps-1 ps-sm-0 mt-2 mt-sm-3 ms-2 ms-sm-3">
                                    <span class="badge text-bg-info d-inline-flex align-items-center">
                                        Verified
                                        <i class="fi-shield ms-1"></i>
                                    </span>
                                </div>
                                <div class="position-absolute top-0 end-0 z-1 hover-effect-target opacity-0 pt-1 pt-sm-0 pe-1 pe-sm-0 mt-2 mt-sm-3 me-2 me-sm-3">
                                    <button type="button" class="btn btn-sm btn-icon btn-light bg-light border-0 rounded-circle animate-pulse" aria-label="Add to wishlist">
                                        <i class="fi-heart animate-target fs-sm"></i>
                                    </button>
                                </div>
                                <div class="position-absolute top-50 start-0 z-1 translate-middle-y d-none d-lg-block hover-effect-target opacity-0 ms-3">
                                    <button type="button" class="btn btn-sm btn-prev btn-icon btn-light bg-light rounded-circle animate-slide-start" aria-label="Prev">
                                        <i class="fi-chevron-left fs-lg animate-target"></i>
                                    </button>
                                </div>
                                <div class="position-absolute top-50 end-0 z-1 translate-middle-y d-none d-lg-block hover-effect-target opacity-0 me-3">
                                    <button type="button" class="btn btn-sm btn-next btn-icon btn-light bg-light rounded-circle animate-slide-end" aria-label="Next">
                                        <i class="fi-chevron-right fs-lg animate-target"></i>
                                    </button>
                                </div>
                                <div class="swiper-pagination bottom-0 mb-2" data-bs-theme="light"></div>
                            </div>
                        </div>
                        <div class="card-body p-3">
                            <div class="pb-1 mb-2">
                                <span class="badge text-body-emphasis bg-body-secondary">For rent</span>
                            </div>
                            <div class="h5 mb-2">$1,250</div>
                            <h3 class="fs-sm fw-normal text-body mb-2">
                                <a class="stretched-link text-body" href="single-entry-real-estate">444 Park Ave, Brooklyn, NY 11205</a>
                            </h3>
                            <div class="h6 fs-sm mb-0">54 sq.m</div>
                        </div>
                        <div class="card-footer d-flex gap-2 border-0 bg-transparent pt-0 pb-3 px-3 mt-n1">
                            <div class="d-flex align-items-center fs-sm gap-1 me-1">
                                1<i class="fi-bed-single fs-base text-secondary-emphasis"></i>
                            </div>
                            <div class="d-flex align-items-center fs-sm gap-1 me-1">
                                1<i class="fi-shower fs-base text-secondary-emphasis"></i>
                            </div>
                            <div class="d-flex align-items-center fs-sm gap-1 me-1">
                                0<i class="fi-car-garage fs-base text-secondary-emphasis"></i>
                            </div>
                        </div>
                    </article>
                </div>

                <!-- Listing -->
                <div class="col">
                    <article class="card hover-effect-opacity h-100">
                        <div class="card-img-top position-relative bg-body-tertiary overflow-hidden">
                            <div class="swiper z-2" data-swiper='{
                                          "pagination": {
                                            "el": ".swiper-pagination"
                                          },
                                          "navigation": {
                                            "prevEl": ".btn-prev",
                                            "nextEl": ".btn-next"
                                          },
                                          "breakpoints": {
                                            "991": {
                                              "allowTouchMove": false
                                            }
                                          }
                                        }'>
                                <a class="swiper-wrapper" href="single-entry-real-estate">
                                    <div class="swiper-slide">
                                        <div class="ratio d-block" style="--fn-aspect-ratio: calc(248 / 362 * 100%)">
                                            <img src="{{ asset('assets/img/listings/real-estate/01.jpg') }}" alt="Image">
                                            <span class="position-absolute top-0 start-0 w-100 h-100 z-1" style="background: linear-gradient(180deg, rgba(0,0,0, 0) 0%, rgba(0,0,0, .11) 100%)"></span>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="ratio d-block" style="--fn-aspect-ratio: calc(248 / 362 * 100%)">
                                            <img src="{{ asset('assets/img/listings/real-estate/01.jpg') }}" alt="Image">
                                            <span class="position-absolute top-0 start-0 w-100 h-100 z-1" style="background: linear-gradient(180deg, rgba(0,0,0, 0) 0%, rgba(0,0,0, .11) 100%)"></span>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="ratio d-block" style="--fn-aspect-ratio: calc(248 / 362 * 100%)">
                                            <img src="{{ asset('assets/img/listings/real-estate/01.jpg') }}" alt="Image">
                                            <span class="position-absolute top-0 start-0 w-100 h-100 z-1" style="background: linear-gradient(180deg, rgba(0,0,0, 0) 0%, rgba(0,0,0, .11) 100%)"></span>
                                        </div>
                                    </div>
                                </a>
                                <div class="position-absolute top-0 end-0 z-1 hover-effect-target opacity-0 pt-1 pt-sm-0 pe-1 pe-sm-0 mt-2 mt-sm-3 me-2 me-sm-3">
                                    <button type="button" class="btn btn-sm btn-icon btn-light bg-light border-0 rounded-circle animate-pulse" aria-label="Add to wishlist">
                                        <i class="fi-heart animate-target fs-sm"></i>
                                    </button>
                                </div>
                                <div class="position-absolute top-50 start-0 z-1 translate-middle-y d-none d-lg-block hover-effect-target opacity-0 ms-3">
                                    <button type="button" class="btn btn-sm btn-prev btn-icon btn-light bg-light rounded-circle animate-slide-start" aria-label="Prev">
                                        <i class="fi-chevron-left fs-lg animate-target"></i>
                                    </button>
                                </div>
                                <div class="position-absolute top-50 end-0 z-1 translate-middle-y d-none d-lg-block hover-effect-target opacity-0 me-3">
                                    <button type="button" class="btn btn-sm btn-next btn-icon btn-light bg-light rounded-circle animate-slide-end" aria-label="Next">
                                        <i class="fi-chevron-right fs-lg animate-target"></i>
                                    </button>
                                </div>
                                <div class="swiper-pagination bottom-0 mb-2" data-bs-theme="light"></div>
                            </div>
                        </div>
                        <div class="card-body p-3">
                            <div class="pb-1 mb-2">
                                <span class="badge text-body-emphasis bg-body-secondary">For rent</span>
                            </div>
                            <div class="h5 mb-2">$1,620</div>
                            <h3 class="fs-sm fw-normal text-body mb-2">
                                <a class="stretched-link text-body" href="single-entry-real-estate">40 S 9th St, Brooklyn, NY 11249</a>
                            </h3>
                            <div class="h6 fs-sm mb-0">65 sq.m</div>
                        </div>
                        <div class="card-footer d-flex gap-2 border-0 bg-transparent pt-0 pb-3 px-3 mt-n1">
                            <div class="d-flex align-items-center fs-sm gap-1 me-1">
                                2<i class="fi-bed-single fs-base text-secondary-emphasis"></i>
                            </div>
                            <div class="d-flex align-items-center fs-sm gap-1 me-1">
                                1<i class="fi-shower fs-base text-secondary-emphasis"></i>
                            </div>
                            <div class="d-flex align-items-center fs-sm gap-1 me-1">
                                1<i class="fi-car-garage fs-base text-secondary-emphasis"></i>
                            </div>
                        </div>
                    </article>
                </div>

                <!-- Listing -->
                <div class="col">
                    <article class="card hover-effect-opacity h-100">
                        <div class="card-img-top position-relative bg-body-tertiary overflow-hidden">
                            <div class="swiper z-2" data-swiper='{
                                          "pagination": {
                                            "el": ".swiper-pagination"
                                          },
                                          "navigation": {
                                            "prevEl": ".btn-prev",
                                            "nextEl": ".btn-next"
                                          },
                                          "breakpoints": {
                                            "991": {
                                              "allowTouchMove": false
                                            }
                                          }
                                        }'>
                                <a class="swiper-wrapper" href="single-entry-real-estate">
                                    <div class="swiper-slide">
                                        <div class="ratio d-block" style="--fn-aspect-ratio: calc(248 / 362 * 100%)">
                                            <img src="{{ asset('assets/img/listings/real-estate/04.jpg') }}" alt="Image">
                                            <span class="position-absolute top-0 start-0 w-100 h-100 z-1" style="background: linear-gradient(180deg, rgba(0,0,0, 0) 0%, rgba(0,0,0, .11) 100%)"></span>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="ratio d-block" style="--fn-aspect-ratio: calc(248 / 362 * 100%)">
                                            <img src="{{ asset('assets/img/listings/real-estate/04.jpg') }}" alt="Image">
                                            <span class="position-absolute top-0 start-0 w-100 h-100 z-1" style="background: linear-gradient(180deg, rgba(0,0,0, 0) 0%, rgba(0,0,0, .11) 100%)"></span>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="ratio d-block" style="--fn-aspect-ratio: calc(248 / 362 * 100%)">
                                            <img src="{{ asset('assets/img/listings/real-estate/04.jpg') }}" alt="Image">
                                            <span class="position-absolute top-0 start-0 w-100 h-100 z-1" style="background: linear-gradient(180deg, rgba(0,0,0, 0) 0%, rgba(0,0,0, .11) 100%)"></span>
                                        </div>
                                    </div>
                                </a>
                                <div class="position-absolute top-0 end-0 z-1 hover-effect-target opacity-0 pt-1 pt-sm-0 pe-1 pe-sm-0 mt-2 mt-sm-3 me-2 me-sm-3">
                                    <button type="button" class="btn btn-sm btn-icon btn-light bg-light border-0 rounded-circle animate-pulse" aria-label="Add to wishlist">
                                        <i class="fi-heart animate-target fs-sm"></i>
                                    </button>
                                </div>
                                <div class="position-absolute top-50 start-0 z-1 translate-middle-y d-none d-lg-block hover-effect-target opacity-0 ms-3">
                                    <button type="button" class="btn btn-sm btn-prev btn-icon btn-light bg-light rounded-circle animate-slide-start" aria-label="Prev">
                                        <i class="fi-chevron-left fs-lg animate-target"></i>
                                    </button>
                                </div>
                                <div class="position-absolute top-50 end-0 z-1 translate-middle-y d-none d-lg-block hover-effect-target opacity-0 me-3">
                                    <button type="button" class="btn btn-sm btn-next btn-icon btn-light bg-light rounded-circle animate-slide-end" aria-label="Next">
                                        <i class="fi-chevron-right fs-lg animate-target"></i>
                                    </button>
                                </div>
                                <div class="swiper-pagination bottom-0 mb-2" data-bs-theme="light"></div>
                            </div>
                        </div>
                        <div class="card-body p-3">
                            <div class="pb-1 mb-2">
                                <span class="badge text-body-emphasis bg-body-secondary">For rent</span>
                            </div>
                            <div class="h5 mb-2">$1,170</div>
                            <h3 class="fs-sm fw-normal text-body mb-2">
                                <a class="stretched-link text-body" href="single-entry-real-estate">67-04 Myrtle Ave Glendale, NY 11385</a>
                            </h3>
                            <div class="h6 fs-sm mb-0">42 sq.m</div>
                        </div>
                        <div class="card-footer d-flex gap-2 border-0 bg-transparent pt-0 pb-3 px-3 mt-n1">
                            <div class="d-flex align-items-center fs-sm gap-1 me-1">
                                1<i class="fi-bed-single fs-base text-secondary-emphasis"></i>
                            </div>
                            <div class="d-flex align-items-center fs-sm gap-1 me-1">
                                1<i class="fi-shower fs-base text-secondary-emphasis"></i>
                            </div>
                            <div class="d-flex align-items-center fs-sm gap-1 me-1">
                                0<i class="fi-car-garage fs-base text-secondary-emphasis"></i>
                            </div>
                        </div>
                    </article>
                </div>

                <!-- Listing -->
                <div class="col">
                    <article class="card hover-effect-opacity h-100">
                        <div class="card-img-top position-relative bg-body-tertiary overflow-hidden">
                            <div class="swiper z-2" data-swiper='{
                                          "pagination": {
                                            "el": ".swiper-pagination"
                                          },
                                          "navigation": {
                                            "prevEl": ".btn-prev",
                                            "nextEl": ".btn-next"
                                          },
                                          "breakpoints": {
                                            "991": {
                                              "allowTouchMove": false
                                            }
                                          }
                                        }'>
                                <a class="swiper-wrapper" href="single-entry-real-estate">
                                    <div class="swiper-slide">
                                        <div class="ratio d-block" style="--fn-aspect-ratio: calc(248 / 362 * 100%)">
                                            <img src="{{ asset('assets/img/listings/real-estate/02.jpg') }}" alt="Image">
                                            <span class="position-absolute top-0 start-0 w-100 h-100 z-1" style="background: linear-gradient(180deg, rgba(0,0,0, 0) 0%, rgba(0,0,0, .11) 100%)"></span>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="ratio d-block" style="--fn-aspect-ratio: calc(248 / 362 * 100%)">
                                            <img src="{{ asset('assets/img/listings/real-estate/02.jpg') }}" alt="Image">
                                            <span class="position-absolute top-0 start-0 w-100 h-100 z-1" style="background: linear-gradient(180deg, rgba(0,0,0, 0) 0%, rgba(0,0,0, .11) 100%)"></span>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="ratio d-block" style="--fn-aspect-ratio: calc(248 / 362 * 100%)">
                                            <img src="{{ asset('assets/img/listings/real-estate/02.jpg') }}" alt="Image">
                                            <span class="position-absolute top-0 start-0 w-100 h-100 z-1" style="background: linear-gradient(180deg, rgba(0,0,0, 0) 0%, rgba(0,0,0, .11) 100%)"></span>
                                        </div>
                                    </div>
                                </a>
                                <div class="position-absolute top-0 end-0 z-1 hover-effect-target opacity-0 pt-1 pt-sm-0 pe-1 pe-sm-0 mt-2 mt-sm-3 me-2 me-sm-3">
                                    <button type="button" class="btn btn-sm btn-icon btn-light bg-light border-0 rounded-circle animate-pulse" aria-label="Add to wishlist">
                                        <i class="fi-heart animate-target fs-sm"></i>
                                    </button>
                                </div>
                                <div class="position-absolute top-50 start-0 z-1 translate-middle-y d-none d-lg-block hover-effect-target opacity-0 ms-3">
                                    <button type="button" class="btn btn-sm btn-prev btn-icon btn-light bg-light rounded-circle animate-slide-start" aria-label="Prev">
                                        <i class="fi-chevron-left fs-lg animate-target"></i>
                                    </button>
                                </div>
                                <div class="position-absolute top-50 end-0 z-1 translate-middle-y d-none d-lg-block hover-effect-target opacity-0 me-3">
                                    <button type="button" class="btn btn-sm btn-next btn-icon btn-light bg-light rounded-circle animate-slide-end" aria-label="Next">
                                        <i class="fi-chevron-right fs-lg animate-target"></i>
                                    </button>
                                </div>
                                <div class="swiper-pagination bottom-0 mb-2" data-bs-theme="light"></div>
                            </div>
                        </div>
                        <div class="card-body p-3">
                            <div class="pb-1 mb-2">
                                <span class="badge text-body-emphasis bg-body-secondary">For rent</span>
                            </div>
                            <div class="h5 mb-2">$1,320</div>
                            <h3 class="fs-sm fw-normal text-body mb-2">
                                <a class="stretched-link text-body" href="single-entry-real-estate">517 82nd St, Brooklyn, NY 11209</a>
                            </h3>
                            <div class="h6 fs-sm mb-0">45 sq.m</div>
                        </div>
                        <div class="card-footer d-flex gap-2 border-0 bg-transparent pt-0 pb-3 px-3 mt-n1">
                            <div class="d-flex align-items-center fs-sm gap-1 me-1">
                                1<i class="fi-bed-single fs-base text-secondary-emphasis"></i>
                            </div>
                            <div class="d-flex align-items-center fs-sm gap-1 me-1">
                                1<i class="fi-shower fs-base text-secondary-emphasis"></i>
                            </div>
                            <div class="d-flex align-items-center fs-sm gap-1 me-1">
                                0<i class="fi-car-garage fs-base text-secondary-emphasis"></i>
                            </div>
                        </div>
                    </article>
                </div>

                <!-- Listing -->
                <div class="col">
                    <article class="card hover-effect-opacity h-100">
                        <div class="card-img-top position-relative bg-body-tertiary overflow-hidden">
                            <div class="swiper z-2" data-swiper='{
                                          "pagination": {
                                            "el": ".swiper-pagination"
                                          },
                                          "navigation": {
                                            "prevEl": ".btn-prev",
                                            "nextEl": ".btn-next"
                                          },
                                          "breakpoints": {
                                            "991": {
                                              "allowTouchMove": false
                                            }
                                          }
                                        }'>
                                <a class="swiper-wrapper" href="single-entry-real-estate">
                                    <div class="swiper-slide">
                                        <div class="ratio d-block" style="--fn-aspect-ratio: calc(248 / 362 * 100%)">
                                            <img src="{{ asset('assets/img/listings/real-estate/07.jpg') }}" alt="Image">
                                            <span class="position-absolute top-0 start-0 w-100 h-100 z-1" style="background: linear-gradient(180deg, rgba(0,0,0, 0) 0%, rgba(0,0,0, .11) 100%)"></span>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="ratio d-block" style="--fn-aspect-ratio: calc(248 / 362 * 100%)">
                                            <img src="{{ asset('assets/img/listings/real-estate/07.jpg') }}" alt="Image">
                                            <span class="position-absolute top-0 start-0 w-100 h-100 z-1" style="background: linear-gradient(180deg, rgba(0,0,0, 0) 0%, rgba(0,0,0, .11) 100%)"></span>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="ratio d-block" style="--fn-aspect-ratio: calc(248 / 362 * 100%)">
                                            <img src="{{ asset('assets/img/listings/real-estate/07.jpg') }}" alt="Image">
                                            <span class="position-absolute top-0 start-0 w-100 h-100 z-1" style="background: linear-gradient(180deg, rgba(0,0,0, 0) 0%, rgba(0,0,0, .11) 100%)"></span>
                                        </div>
                                    </div>
                                </a>
                                <div class="position-absolute top-0 end-0 z-1 hover-effect-target opacity-0 pt-1 pt-sm-0 pe-1 pe-sm-0 mt-2 mt-sm-3 me-2 me-sm-3">
                                    <button type="button" class="btn btn-sm btn-icon btn-light bg-light border-0 rounded-circle animate-pulse" aria-label="Add to wishlist">
                                        <i class="fi-heart animate-target fs-sm"></i>
                                    </button>
                                </div>
                                <div class="position-absolute top-50 start-0 z-1 translate-middle-y d-none d-lg-block hover-effect-target opacity-0 ms-3">
                                    <button type="button" class="btn btn-sm btn-prev btn-icon btn-light bg-light rounded-circle animate-slide-start" aria-label="Prev">
                                        <i class="fi-chevron-left fs-lg animate-target"></i>
                                    </button>
                                </div>
                                <div class="position-absolute top-50 end-0 z-1 translate-middle-y d-none d-lg-block hover-effect-target opacity-0 me-3">
                                    <button type="button" class="btn btn-sm btn-next btn-icon btn-light bg-light rounded-circle animate-slide-end" aria-label="Next">
                                        <i class="fi-chevron-right fs-lg animate-target"></i>
                                    </button>
                                </div>
                                <div class="swiper-pagination bottom-0 mb-2" data-bs-theme="light"></div>
                            </div>
                        </div>
                        <div class="card-body p-3">
                            <div class="pb-1 mb-2">
                                <span class="badge text-body-emphasis bg-body-secondary">For rent</span>
                            </div>
                            <div class="h5 mb-2">$1,490</div>
                            <h3 class="fs-sm fw-normal text-body mb-2">
                                <a class="stretched-link text-body" href="single-entry-real-estate">123 Bedford Avenue, Brooklyn, NY 11211</a>
                            </h3>
                            <div class="h6 fs-sm mb-0">80 sq.m</div>
                        </div>
                        <div class="card-footer d-flex gap-2 border-0 bg-transparent pt-0 pb-3 px-3 mt-n1">
                            <div class="d-flex align-items-center fs-sm gap-1 me-1">
                                2<i class="fi-bed-single fs-base text-secondary-emphasis"></i>
                            </div>
                            <div class="d-flex align-items-center fs-sm gap-1 me-1">
                                1<i class="fi-shower fs-base text-secondary-emphasis"></i>
                            </div>
                            <div class="d-flex align-items-center fs-sm gap-1 me-1">
                                1<i class="fi-car-garage fs-base text-secondary-emphasis"></i>
                            </div>
                        </div>
                    </article>
                </div>

                <!-- Listing -->
                <div class="col">
                    <article class="card hover-effect-opacity h-100">
                        <div class="card-img-top position-relative bg-body-tertiary overflow-hidden">
                            <div class="swiper z-2" data-swiper='{
                                          "pagination": {
                                            "el": ".swiper-pagination"
                                          },
                                          "navigation": {
                                            "prevEl": ".btn-prev",
                                            "nextEl": ".btn-next"
                                          },
                                          "breakpoints": {
                                            "991": {
                                              "allowTouchMove": false
                                            }
                                          }
                                        }'>
                                <a class="swiper-wrapper" href="single-entry-real-estate">
                                    <div class="swiper-slide">
                                        <div class="ratio d-block" style="--fn-aspect-ratio: calc(248 / 362 * 100%)">
                                            <img src="{{ asset('assets/img/listings/real-estate/09.jpg') }}" alt="Image">
                                            <span class="position-absolute top-0 start-0 w-100 h-100 z-1" style="background: linear-gradient(180deg, rgba(0,0,0, 0) 0%, rgba(0,0,0, .11) 100%)"></span>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="ratio d-block" style="--fn-aspect-ratio: calc(248 / 362 * 100%)">
                                            <img src="{{ asset('assets/img/listings/real-estate/09.jpg') }}" alt="Image">
                                            <span class="position-absolute top-0 start-0 w-100 h-100 z-1" style="background: linear-gradient(180deg, rgba(0,0,0, 0) 0%, rgba(0,0,0, .11) 100%)"></span>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="ratio d-block" style="--fn-aspect-ratio: calc(248 / 362 * 100%)">
                                            <img src="{{ asset('assets/img/listings/real-estate/09.jpg') }}" alt="Image">
                                            <span class="position-absolute top-0 start-0 w-100 h-100 z-1" style="background: linear-gradient(180deg, rgba(0,0,0, 0) 0%, rgba(0,0,0, .11) 100%)"></span>
                                        </div>
                                    </div>
                                </a>
                                <div class="position-absolute top-0 end-0 z-1 hover-effect-target opacity-0 pt-1 pt-sm-0 pe-1 pe-sm-0 mt-2 mt-sm-3 me-2 me-sm-3">
                                    <button type="button" class="btn btn-sm btn-icon btn-light bg-light border-0 rounded-circle animate-pulse" aria-label="Add to wishlist">
                                        <i class="fi-heart animate-target fs-sm"></i>
                                    </button>
                                </div>
                                <div class="position-absolute top-50 start-0 z-1 translate-middle-y d-none d-lg-block hover-effect-target opacity-0 ms-3">
                                    <button type="button" class="btn btn-sm btn-prev btn-icon btn-light bg-light rounded-circle animate-slide-start" aria-label="Prev">
                                        <i class="fi-chevron-left fs-lg animate-target"></i>
                                    </button>
                                </div>
                                <div class="position-absolute top-50 end-0 z-1 translate-middle-y d-none d-lg-block hover-effect-target opacity-0 me-3">
                                    <button type="button" class="btn btn-sm btn-next btn-icon btn-light bg-light rounded-circle animate-slide-end" aria-label="Next">
                                        <i class="fi-chevron-right fs-lg animate-target"></i>
                                    </button>
                                </div>
                                <div class="swiper-pagination bottom-0 mb-2" data-bs-theme="light"></div>
                            </div>
                        </div>
                        <div class="card-body p-3">
                            <div class="pb-1 mb-2">
                                <span class="badge text-body-emphasis bg-body-secondary">For rent</span>
                            </div>
                            <div class="h5 mb-2">$3,860</div>
                            <h3 class="fs-sm fw-normal text-body mb-2">
                                <a class="stretched-link text-body" href="single-entry-real-estate">456 Court Street, Brooklyn, NY 11231</a>
                            </h3>
                            <div class="h6 fs-sm mb-0">130 sq.m</div>
                        </div>
                        <div class="card-footer d-flex gap-2 border-0 bg-transparent pt-0 pb-3 px-3 mt-n1">
                            <div class="d-flex align-items-center fs-sm gap-1 me-1">
                                3<i class="fi-bed-single fs-base text-secondary-emphasis"></i>
                            </div>
                            <div class="d-flex align-items-center fs-sm gap-1 me-1">
                                2<i class="fi-shower fs-base text-secondary-emphasis"></i>
                            </div>
                            <div class="d-flex align-items-center fs-sm gap-1 me-1">
                                2<i class="fi-car-garage fs-base text-secondary-emphasis"></i>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </section>


        <!-- Reviews -->
        <section class="container py-5 mt-2 mt-md-3 mt-lg-4">
            <div class="row pb-2 pb-sm-3 pb-md-4 pb-lg-5 mb-xxl-3">
                <div class="col-lg-10 col-xl-9">

                    <!-- Title + Overall rating -->
                    <div class="d-flex align-items-center justify-content-between pb-2 pb-lg-3 mb-3">
                        <h2 class="mb-0">Reviews</h2>
                        <div class="h5 d-flex align-items-center lh-base mb-0">
                            <i class="fi-star-filled text-warning me-2"></i>
                            4.9
                            <span class="fs-sm fw-normal text-body-secondary ms-1">(32)</span>
                        </div>
                    </div>

                    <!-- Nav pills + Add review button -->
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="nav overflow-x-auto w-100 mb-3 me-3">
                            <ul class="nav nav-pills flex-nowrap gap-2 pb-2 mb-1" role="tablist">
                                <li class="nav-item me-1" role="presentation">
                                    <button type="button" class="nav-link text-nowrap active" role="tab">
                                        All
                                    </button>
                                </li>
                                <li class="nav-item me-1" role="presentation">
                                    <button type="button" class="nav-link text-nowrap" role="tab">
                                        Only positive (30)
                                    </button>
                                </li>
                                <li class="nav-item me-1" role="presentation">
                                    <button type="button" class="nav-link text-nowrap" role="tab">
                                        Only negative (2)
                                    </button>
                                </li>
                            </ul>
                        </div>
                        <div class="pb-3 mb-3">
                            <button type="button" class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#reviewForm">
                                <i class="fi-edit-3 fs-base ms-n1 me-2"></i>
                                Add review
                            </button>
                        </div>
                    </div>

                    <!-- Review -->
                    <div class="border-bottom pb-4">
                        <div class="d-sm-flex align-items-center mb-3">
                            <div class="d-flex align-items-center pe-3">
                                <div class="ratio ratio-1x1 flex-shrink-0 bg-body-secondary rounded-circle overflow-hidden" style="width: 48px">
                                    <img src="{{ asset('assets/img/account/reviews/ava01.jpg') }}" alt="Avatar">
                                </div>
                                <div class="ps-3">
                                    <h6 class="mb-1">Randy Walker</h6>
                                    <div class="fs-xs text-body-secondary">Nov 12, 2024</div>
                                </div>
                            </div>
                            <div class="d-flex gap-1 fs-sm pt-2 pt-sm-0 ps-5 ps-sm-0 ms-3 ms-sm-auto">
                                <i class="fi-star-filled text-warning"></i>
                                <i class="fi-star-filled text-warning"></i>
                                <i class="fi-star-filled text-warning"></i>
                                <i class="fi-star-filled text-warning"></i>
                                <i class="fi-star-filled text-warning"></i>
                            </div>
                        </div>
                        <p class="fs-sm mb-2">Review on:<a class="hover-effect-underline fw-medium text-dark-emphasis text-decoration-none ms-2" href="#!">67-04 Myrtle Ave Glendale, NY 11385</a></p>
                        <p class="fs-sm">Excellent apartment in the very center of the city, attractions and entertainment venues are located 50m from the flat. The flat was perfectly clean and had basic slippers, gel-shampoo, clean towels.</p>
                        <div class="nav align-items-center">
                            <button type="button" class="nav-link text-body-secondary animate-scale px-0 me-n1">
                                <i class="fi-thumbs-up fs-base animate-target me-1"></i>
                                6
                            </button>
                            <hr class="vr my-2 mx-3">
                            <button type="button" class="nav-link text-body-secondary animate-scale px-0 ms-n1">
                                <i class="fi-thumbs-down fs-base animate-target me-1"></i>
                                0
                            </button>
                        </div>
                    </div>

                    <!-- Review -->
                    <div class="border-bottom py-4">
                        <div class="d-sm-flex align-items-center mt-2 mb-3">
                            <div class="d-flex align-items-center pe-3">
                                <div class="ratio ratio-1x1 flex-shrink-0 bg-body-secondary rounded-circle overflow-hidden" style="width: 48px">
                                    <img src="{{ asset('assets/img/account/reviews/ava02.jpg') }}" alt="Avatar">
                                </div>
                                <div class="ps-3">
                                    <h6 class="mb-1">Kathryn Murphy</h6>
                                    <div class="fs-xs text-body-secondary">Sep 17, 2024</div>
                                </div>
                            </div>
                            <div class="d-flex gap-1 fs-sm pt-2 pt-sm-0 ps-5 ps-sm-0 ms-3 ms-sm-auto">
                                <i class="fi-star-filled text-warning"></i>
                                <i class="fi-star-filled text-warning"></i>
                                <i class="fi-star-filled text-warning"></i>
                                <i class="fi-star-filled text-warning"></i>
                                <i class="fi-star-half text-warning"></i>
                            </div>
                        </div>
                        <p class="fs-sm mb-2">Review on:<a class="hover-effect-underline fw-medium text-dark-emphasis text-decoration-none ms-2" href="#!">517 82nd St, Brooklyn, NY 11209</a></p>
                        <p class="fs-sm">I recently rented an apartment, and it has been a fantastic experience. The apartment itself is beautiful, with modern finishes and plenty of natural light. The property management team is very attentive and responds quickly to any maintenance requests. The common areas, including the pool and gym, are always clean and well-maintained.</p>
                        <div class="d-flex gap-2 mb-3">
                            <a class="hover-effect-scale hover-effect-opacity position-relative d-block w-100 rounded overflow-hidden" href="{{ asset('assets/img/listings/real-estate/single/01.jpg') }}" style="max-width: 112px" data-glightbox data-gallery="review-images">
                                <i class="fi-zoom-in hover-effect-target fs-4 text-white position-absolute top-50 start-50 translate-middle opacity-0 z-2"></i>
                                <span class="hover-effect-target position-absolute top-0 start-0 w-100 h-100 bg-black bg-opacity-25 opacity-0 z-1"></span>
                                <div class="ratio ratio-1x1 hover-effect-target bg-body-tertiary">
                                    <img src="{{ asset('assets/img/account/reviews/01.jpg') }}" alt="Image">
                                </div>
                            </a>
                            <a class="hover-effect-scale hover-effect-opacity position-relative d-block w-100 rounded overflow-hidden" href="{{ asset('assets/img/listings/real-estate/single/03.jpg') }}" style="max-width: 112px" data-glightbox data-gallery="review-images">
                                <i class="fi-zoom-in hover-effect-target fs-4 text-white position-absolute top-50 start-50 translate-middle opacity-0 z-2"></i>
                                <span class="hover-effect-target position-absolute top-0 start-0 w-100 h-100 bg-black bg-opacity-25 opacity-0 z-1"></span>
                                <div class="ratio ratio-1x1 hover-effect-target bg-body-tertiary">
                                    <img src="{{ asset('assets/img/account/reviews/02.jpg') }}" alt="Image">
                                </div>
                            </a>
                            <a class="hover-effect-scale hover-effect-opacity position-relative d-block w-100 rounded overflow-hidden" href="{{ asset('assets/img/listings/real-estate/single/02.jpg') }}" style="max-width: 112px" data-glightbox data-gallery="review-images">
                                <i class="fi-zoom-in hover-effect-target fs-4 text-white position-absolute top-50 start-50 translate-middle opacity-0 z-2"></i>
                                <span class="hover-effect-target position-absolute top-0 start-0 w-100 h-100 bg-black bg-opacity-25 opacity-0 z-1"></span>
                                <div class="ratio ratio-1x1 hover-effect-target bg-body-tertiary">
                                    <img src="{{ asset('assets/img/account/reviews/03.jpg') }}" alt="Image">
                                </div>
                            </a>
                        </div>
                        <div class="nav align-items-center">
                            <button type="button" class="nav-link text-body-secondary animate-scale px-0 me-n1">
                                <i class="fi-thumbs-up fs-base animate-target me-1"></i>
                                13
                            </button>
                            <hr class="vr my-2 mx-3">
                            <button type="button" class="nav-link text-body-secondary animate-scale px-0 ms-n1">
                                <i class="fi-thumbs-down fs-base animate-target me-1"></i>
                                2
                            </button>
                        </div>
                    </div>

                    <!-- Review -->
                    <div class="border-bottom py-4">
                        <div class="d-sm-flex align-items-center mt-2 mb-3">
                            <div class="d-flex align-items-center pe-3">
                                <div class="ratio ratio-1x1 flex-shrink-0 bg-body-secondary rounded-circle overflow-hidden" style="width: 48px">
                                    <img src="{{ asset('assets/img/account/reviews/ava03.jpg') }}" alt="Avatar">
                                </div>
                                <div class="ps-3">
                                    <h6 class="mb-1">Darrell Steward</h6>
                                    <div class="fs-xs text-body-secondary">Aug 9, 2024</div>
                                </div>
                            </div>
                            <div class="d-flex gap-1 fs-sm pt-2 pt-sm-0 ps-5 ps-sm-0 ms-3 ms-sm-auto">
                                <i class="fi-star-filled text-warning"></i>
                                <i class="fi-star-filled text-warning"></i>
                                <i class="fi-star-filled text-warning"></i>
                                <i class="fi-star-filled text-warning"></i>
                                <i class="fi-star-filled text-warning"></i>
                            </div>
                        </div>
                        <p class="fs-sm mb-2">Review on:<a class="hover-effect-underline fw-medium text-dark-emphasis text-decoration-none ms-2" href="#!">929 Hart St, Brooklyn, NY 11237</a></p>
                        <p class="fs-sm">I had a great experience with Michael Williams when selling my home. The team was professional, reliable, and extremely knowledgeable about the market. They provided excellent marketing for my property, which attracted a lot of interest and ultimately led to a quick sale above the asking price. I highly recommend their services to anyone looking to sell their home.</p>
                        <div class="nav align-items-center">
                            <button type="button" class="nav-link text-body-secondary animate-scale px-0 me-n1">
                                <i class="fi-thumbs-up fs-base animate-target me-1"></i>
                                4
                            </button>
                            <hr class="vr my-2 mx-3">
                            <button type="button" class="nav-link text-body-secondary animate-scale px-0 ms-n1">
                                <i class="fi-thumbs-down fs-base animate-target me-1"></i>
                                1
                            </button>
                        </div>
                    </div>

                    <!-- Review -->
                    <div class="border-bottom py-4">
                        <div class="d-sm-flex align-items-center mt-2 mb-3">
                            <div class="d-flex align-items-center pe-3">
                                <div class="ratio ratio-1x1 flex-shrink-0 bg-body-secondary rounded-circle overflow-hidden" style="width: 48px">
                                    <img src="{{ asset('assets/img/account/reviews/ava04.jpg') }}" alt="Avatar">
                                </div>
                                <div class="ps-3">
                                    <h6 class="mb-1">Ralph Edwards</h6>
                                    <div class="fs-xs text-body-secondary">Jul 4, 2024</div>
                                </div>
                            </div>
                            <div class="d-flex gap-1 fs-sm pt-2 pt-sm-0 ps-5 ps-sm-0 ms-3 ms-sm-auto">
                                <i class="fi-star-filled text-warning"></i>
                                <i class="fi-star-filled text-warning"></i>
                                <i class="fi-star-filled text-warning"></i>
                                <i class="fi-star-filled text-warning"></i>
                                <i class="fi-star text-warning"></i>
                            </div>
                        </div>
                        <p class="fs-sm mb-2">Review on:<a class="hover-effect-underline fw-medium text-dark-emphasis text-decoration-none ms-2" href="#!">1234 Maple Street, Brooklyn, NY 11201</a></p>
                        <p class="fs-sm">I recently rented an apartment and had a positive experience overall. The location is convenient, and the building amenities are great. The apartment itself is spacious and well-maintained. However, there were a few minor issues with the plumbing that took a little longer to fix than expected. Despite that, I'm happy with my decision and would recommend it to others.</p>
                        <div class="nav align-items-center">
                            <button type="button" class="nav-link text-body-secondary animate-scale px-0 me-n1">
                                <i class="fi-thumbs-up fs-base animate-target me-1"></i>
                                19
                            </button>
                            <hr class="vr my-2 mx-3">
                            <button type="button" class="nav-link text-body-secondary animate-scale px-0 ms-n1">
                                <i class="fi-thumbs-down fs-base animate-target me-1"></i>
                                5
                            </button>
                        </div>
                    </div>

                    <!-- Pagination -->
                    <nav class="pt-4 mt-md-2" aria-label="Reviews pagination">
                        <ul class="pagination pagination-lg">
                            <li class="page-item active" aria-current="page">
                                <span class="page-link">
                                    1
                                    <span class="visually-hidden">(current)</span>
                                </span>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#!">2</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#!">3</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#!">4</a>
                            </li>
                            <li class="page-item">
                                <span class="page-link pe-none">...</span>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#!">8</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </section>
    </main>

    @include('layouts.partials.footer.real-estate-footer')

@endsection

@push('scripts')
    <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/glightbox/dist/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/choices.js/public/assets/scripts/choices.min.js') }}"></script>

    @vite(['resources/js/app.js'])

@endpush