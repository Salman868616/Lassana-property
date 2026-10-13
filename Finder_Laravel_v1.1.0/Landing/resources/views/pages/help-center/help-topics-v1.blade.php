@extends('layouts.app')

@section('title', 'Finder | Help Topics v.1')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}">
@endpush

@section('content')

    @include('layouts.partials.header.real-estate-header')

    <!-- Page content -->
    <main class="content-wrapper">

        <!-- Hero with search form -->
        <section class="container pb-5 mb-lg-3">
            <div class="bg-info rounded" data-bs-theme="light">
                <div class="row align-items-center justify-content-center">

                    <!-- Search form -->
                    <div class="col-md-7 col-lg-6 offset-lg-1">
                        <div class="pt-5 pb-3 pb-md-5 px-4 px-sm-5 ps-lg-0 pe-md-0">
                            <h1 class="display-6 text-white text-center text-md-start mb-4">How can we help you?</h1>
                            <div class="bg-body border rounded p-2">
                                <form class="d-flex flex-column flex-sm-row gap-2 p-1">
                                    <div class="position-relative w-100">
                                        <i class="fi-search position-absolute top-50 start-0 translate-middle-y fs-xl text-secondary-emphasis ms-2"></i>
                                        <input type="search" class="form-control form-control-lg form-icon-start border-0 rounded-0" placeholder="What do you need help with?">
                                    </div>
                                    <button type="submit" class="btn btn-lg btn-primary">Search</button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Image -->
                    <div class="col-8 col-sm-6 col-md-5 col-xl-4 offset-xl-1 align-self-end">
                        <div class="ps-md-5 ms-lg-2 ms-xl-0 ps-xl-0">
                            <div class="ratio" style="--fn-aspect-ratio: calc(356 / 416 * 100%)">
                                <img src="{{ asset('assets/img/help/v1/hero.png') }}" alt="Image">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <!-- Help topics -->
        <section class="container pb-5 mb-2 mb-sm-3 mb-md-4 mb-xl-5">

            <!-- Nav pills -->
            <ul class="nav nav-pills gap-2 pb-1 pb-sm-2 pb-md-3 pb-lg-0 mb-4 mb-lg-5">
                <li class="nav-item me-1">
                    <a class="nav-link active" aria-current="page" href="#!">For tenants</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#!">For hosts</a>
                </li>
            </ul>

            <div class="row g-0">
                <div class="col-md-4 col-lg-3 pb-2 pb-sm-3 pb-md-0 mb-4 mb-md-0">
                    <h2 class="h5 border-bottom pb-3 pb-sm-4 mb-0">Help topics</h2>

                    <!-- Nav tabs in format of list group -->
                    <div class="list-group list-group-borderless pt-4 pe-md-4" role="tablist">
                        <a class="list-group-item list-group-item-action d-flex align-items-center fs-base active" href="#accommodation" data-bs-toggle="list" role="tab" aria-controls="accommodation" id="accommodation-tab" aria-selected="true">Accommodation</a>
                        <a class="list-group-item list-group-item-action d-flex align-items-center fs-base" href="#booking" data-bs-toggle="list" role="tab" aria-controls="booking" id="booking-tab" aria-selected="false" tabindex="-1">Booking</a>
                        <a class="list-group-item list-group-item-action d-flex align-items-center fs-base" href="#payment" data-bs-toggle="list" role="tab" aria-controls="payment" id="payment-tab" aria-selected="false" tabindex="-1">Payment</a>
                        <a class="list-group-item list-group-item-action d-flex align-items-center fs-base" href="#after-booking" data-bs-toggle="list" role="tab" aria-controls="after-booking" id="after-booking-tab" aria-selected="false" tabindex="-1">After a booking</a>
                        <a class="list-group-item list-group-item-action d-flex align-items-center fs-base" href="#cancellation" data-bs-toggle="list" role="tab" aria-controls="cancellation" id="cancellation-tab" aria-selected="false" tabindex="-1">Cancellation, notice, extension</a>
                        <a class="list-group-item list-group-item-action d-flex align-items-center fs-base" href="#regulations" data-bs-toggle="list" role="tab" aria-controls="regulations" id="regulations-tab" aria-selected="false" tabindex="-1">Regulations</a>
                        <a class="list-group-item list-group-item-action d-flex align-items-center fs-base" href="#insurances" data-bs-toggle="list" role="tab" aria-controls="insurances" id="insurances-tab" aria-selected="false" tabindex="-1">Insurances</a>
                    </div>

                </div>
                <div class="col-md-8 col-lg-9">

                    <!-- Tabs with links -->
                    <div class="tab-content">

                        <!-- Accommodation tab -->
                        <div class="tab-pane show active" id="accommodation" role="tabpanel" aria-labelledby="accommodation-tab">
                            <div class="d-flex border-bottom ps-md-4 pb-3 pb-sm-4">
                                <h2 class="h5 mb-0">Accommodation</h2>
                            </div>
                            <div class="position-relative">
                                <div class="position-absolute top-0 start-0 h-100 border-start d-none d-md-block"></div>
                                <ul class="nav flex-column gap-3 pt-4 ps-md-4">
                                    <li>
                                        <a class="nav-link position-relative fs-base fw-normal py-1 px-0" href="help-single-article-v1">
                                            <i class="fi-chevron-right fs-lg ms-n1 me-2"></i>
                                            <span class="hover-effect-underline stretched-link">What is included in my rental accommodation?</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="nav-link position-relative fs-base fw-normal py-1 px-0" href="help-single-article-v1">
                                            <i class="fi-chevron-right fs-lg ms-n1 me-2"></i>
                                            <span class="hover-effect-underline stretched-link">Are utilities like water, electricity, and internet included in the rent?</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="nav-link position-relative fs-base fw-normal py-1 px-0" href="help-single-article-v1">
                                            <i class="fi-chevron-right fs-lg ms-n1 me-2"></i>
                                            <span class="hover-effect-underline stretched-link">Can I view the property before I move in?</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="nav-link position-relative fs-base fw-normal py-1 px-0" href="help-single-article-v1">
                                            <i class="fi-chevron-right fs-lg ms-n1 me-2"></i>
                                            <span class="hover-effect-underline stretched-link">What furniture is provided with the accommodation?</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="nav-link position-relative fs-base fw-normal py-1 px-0" href="help-single-article-v1">
                                            <i class="fi-chevron-right fs-lg ms-n1 me-2"></i>
                                            <span class="hover-effect-underline stretched-link">Are pets allowed in the accommodation?</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="nav-link position-relative fs-base fw-normal py-1 px-0" href="help-single-article-v1">
                                            <i class="fi-chevron-right fs-lg ms-n1 me-2"></i>
                                            <span class="hover-effect-underline stretched-link">Is smoking permitted inside the property?</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="nav-link position-relative fs-base fw-normal py-1 px-0" href="help-single-article-v1">
                                            <i class="fi-chevron-right fs-lg ms-n1 me-2"></i>
                                            <span class="hover-effect-underline stretched-link">How do I report maintenance issues or repairs needed in the accommodation?</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="nav-link position-relative fs-base fw-normal py-1 px-0" href="help-single-article-v1">
                                            <i class="fi-chevron-right fs-lg ms-n1 me-2"></i>
                                            <span class="hover-effect-underline stretched-link">What should I do if something in the property is damaged when I move in?</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="nav-link position-relative fs-base fw-normal py-1 px-0" href="help-single-article-v1">
                                            <i class="fi-chevron-right fs-lg ms-n1 me-2"></i>
                                            <span class="hover-effect-underline stretched-link">Are there any restrictions on guests staying over?</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="nav-link position-relative fs-base fw-normal py-1 px-0" href="help-single-article-v1">
                                            <i class="fi-chevron-right fs-lg ms-n1 me-2"></i>
                                            <span class="hover-effect-underline stretched-link">Can I make modifications or decorate the property?</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="nav-link position-relative fs-base fw-normal py-1 px-0" href="help-single-article-v1">
                                            <i class="fi-chevron-right fs-lg ms-n1 me-2"></i>
                                            <span class="hover-effect-underline stretched-link">How is the security of the property managed?</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="nav-link position-relative fs-base fw-normal py-1 px-0" href="help-single-article-v1">
                                            <i class="fi-chevron-right fs-lg ms-n1 me-2"></i>
                                            <span class="hover-effect-underline stretched-link">What is the procedure for renewing my lease?</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!-- Booking tab -->
                        <div class="tab-pane" id="booking" role="tabpanel" aria-labelledby="booking-tab">
                            <div class="d-flex border-bottom ps-md-4 pb-3 pb-sm-4">
                                <h2 class="h5 mb-0">Booking</h2>
                            </div>
                            <div class="position-relative">
                                <div class="position-absolute top-0 start-0 h-100 border-start d-none d-md-block"></div>
                                <ul class="nav flex-column gap-3 pt-4 ps-md-4">
                                    <li>
                                        <a class="nav-link position-relative fs-base fw-normal py-1 px-0" href="help-single-article-v1">
                                            <i class="fi-chevron-right fs-lg ms-n1 me-2"></i>
                                            <span class="hover-effect-underline stretched-link">How do I book a property on the website?</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="nav-link position-relative fs-base fw-normal py-1 px-0" href="help-single-article-v1">
                                            <i class="fi-chevron-right fs-lg ms-n1 me-2"></i>
                                            <span class="hover-effect-underline stretched-link">What documents do I need to provide to make a booking?</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="nav-link position-relative fs-base fw-normal py-1 px-0" href="help-single-article-v1">
                                            <i class="fi-chevron-right fs-lg ms-n1 me-2"></i>
                                            <span class="hover-effect-underline stretched-link">Can I book a property for a short-term stay?</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="nav-link position-relative fs-base fw-normal py-1 px-0" href="help-single-article-v1">
                                            <i class="fi-chevron-right fs-lg ms-n1 me-2"></i>
                                            <span class="hover-effect-underline stretched-link">How do I know if my booking is confirmed?</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="nav-link position-relative fs-base fw-normal py-1 px-0" href="help-single-article-v1">
                                            <i class="fi-chevron-right fs-lg ms-n1 me-2"></i>
                                            <span class="hover-effect-underline stretched-link">What are the payment options available for booking?</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="nav-link position-relative fs-base fw-normal py-1 px-0" href="help-single-article-v1">
                                            <i class="fi-chevron-right fs-lg ms-n1 me-2"></i>
                                            <span class="hover-effect-underline stretched-link">Can I book a property on behalf of someone else?</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="nav-link position-relative fs-base fw-normal py-1 px-0" href="help-single-article-v1">
                                            <i class="fi-chevron-right fs-lg ms-n1 me-2"></i>
                                            <span class="hover-effect-underline stretched-link">What happens if the property I booked becomes unavailable?</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="nav-link position-relative fs-base fw-normal py-1 px-0" href="help-single-article-v1">
                                            <i class="fi-chevron-right fs-lg ms-n1 me-2"></i>
                                            <span class="hover-effect-underline stretched-link">Can I change the dates of my booking after it's confirmed?</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="nav-link position-relative fs-base fw-normal py-1 px-0" href="help-single-article-v1">
                                            <i class="fi-chevron-right fs-lg ms-n1 me-2"></i>
                                            <span class="hover-effect-underline stretched-link">Do I need to pay a deposit when making a booking?</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="nav-link position-relative fs-base fw-normal py-1 px-0" href="help-single-article-v1">
                                            <i class="fi-chevron-right fs-lg ms-n1 me-2"></i>
                                            <span class="hover-effect-underline stretched-link">How long does it take to process my booking?</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="nav-link position-relative fs-base fw-normal py-1 px-0" href="help-single-article-v1">
                                            <i class="fi-chevron-right fs-lg ms-n1 me-2"></i>
                                            <span class="hover-effect-underline stretched-link">What is the policy for last-minute bookings?</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="nav-link position-relative fs-base fw-normal py-1 px-0" href="help-single-article-v1">
                                            <i class="fi-chevron-right fs-lg ms-n1 me-2"></i>
                                            <span class="hover-effect-underline stretched-link">Is there a minimum stay requirement for bookings?</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!-- Payment tab -->
                        <div class="tab-pane" id="payment" role="tabpanel" aria-labelledby="payment-tab">
                            <div class="d-flex border-bottom ps-md-4 pb-3 pb-sm-4">
                                <h2 class="h5 mb-0">Payment</h2>
                            </div>
                            <div class="position-relative">
                                <div class="position-absolute top-0 start-0 h-100 border-start d-none d-md-block"></div>
                                <ul class="nav flex-column gap-3 pt-4 ps-md-4">
                                    <li>
                                        <a class="nav-link position-relative fs-base fw-normal py-1 px-0" href="help-single-article-v1">
                                            <i class="fi-chevron-right fs-lg ms-n1 me-2"></i>
                                            <span class="hover-effect-underline stretched-link">What payment methods are accepted?</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="nav-link position-relative fs-base fw-normal py-1 px-0" href="help-single-article-v1">
                                            <i class="fi-chevron-right fs-lg ms-n1 me-2"></i>
                                            <span class="hover-effect-underline stretched-link">When is my rent due?</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="nav-link position-relative fs-base fw-normal py-1 px-0" href="help-single-article-v1">
                                            <i class="fi-chevron-right fs-lg ms-n1 me-2"></i>
                                            <span class="hover-effect-underline stretched-link">Can I set up automatic payments for my rent?</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="nav-link position-relative fs-base fw-normal py-1 px-0" href="help-single-article-v1">
                                            <i class="fi-chevron-right fs-lg ms-n1 me-2"></i>
                                            <span class="hover-effect-underline stretched-link">Are there any fees associated with late payments?</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="nav-link position-relative fs-base fw-normal py-1 px-0" href="help-single-article-v1">
                                            <i class="fi-chevron-right fs-lg ms-n1 me-2"></i>
                                            <span class="hover-effect-underline stretched-link">How do I pay my rent online?</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="nav-link position-relative fs-base fw-normal py-1 px-0" href="help-single-article-v1">
                                            <i class="fi-chevron-right fs-lg ms-n1 me-2"></i>
                                            <span class="hover-effect-underline stretched-link">What should I do if I'm unable to make a payment on time?</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="nav-link position-relative fs-base fw-normal py-1 px-0" href="help-single-article-v1">
                                            <i class="fi-chevron-right fs-lg ms-n1 me-2"></i>
                                            <span class="hover-effect-underline stretched-link">Is there a grace period for rent payments?</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="nav-link position-relative fs-base fw-normal py-1 px-0" href="help-single-article-v1">
                                            <i class="fi-chevron-right fs-lg ms-n1 me-2"></i>
                                            <span class="hover-effect-underline stretched-link">How do I receive a receipt for my payment?</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="nav-link position-relative fs-base fw-normal py-1 px-0" href="help-single-article-v1">
                                            <i class="fi-chevron-right fs-lg ms-n1 me-2"></i>
                                            <span class="hover-effect-underline stretched-link">Can I split my payment into multiple transactions?</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="nav-link position-relative fs-base fw-normal py-1 px-0" href="help-single-article-v1">
                                            <i class="fi-chevron-right fs-lg ms-n1 me-2"></i>
                                            <span class="hover-effect-underline stretched-link">What happens if my payment fails or is declined?</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="nav-link position-relative fs-base fw-normal py-1 px-0" href="help-single-article-v1">
                                            <i class="fi-chevron-right fs-lg ms-n1 me-2"></i>
                                            <span class="hover-effect-underline stretched-link">Can I pay my rent in advance?</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="nav-link position-relative fs-base fw-normal py-1 px-0" href="help-single-article-v1">
                                            <i class="fi-chevron-right fs-lg ms-n1 me-2"></i>
                                            <span class="hover-effect-underline stretched-link">Are there any discounts for early or lump-sum payments?</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!-- After a booking tab -->
                        <div class="tab-pane" id="after-booking" role="tabpanel" aria-labelledby="after-booking-tab">
                            <div class="d-flex border-bottom ps-md-4 pb-3 pb-sm-4">
                                <h2 class="h5 mb-0">After a booking</h2>
                            </div>
                            <div class="position-relative">
                                <div class="position-absolute top-0 start-0 h-100 border-start d-none d-md-block"></div>
                                <ul class="nav flex-column gap-3 pt-4 ps-md-4">
                                    <li>
                                        <a class="nav-link position-relative fs-base fw-normal py-1 px-0" href="help-single-article-v1">
                                            <i class="fi-chevron-right fs-lg ms-n1 me-2"></i>
                                            <span class="hover-effect-underline stretched-link">How do I collect the keys for my accommodation?</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="nav-link position-relative fs-base fw-normal py-1 px-0" href="help-single-article-v1">
                                            <i class="fi-chevron-right fs-lg ms-n1 me-2"></i>
                                            <span class="hover-effect-underline stretched-link">What should I do upon arrival at the property?</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="nav-link position-relative fs-base fw-normal py-1 px-0" href="help-single-article-v1">
                                            <i class="fi-chevron-right fs-lg ms-n1 me-2"></i>
                                            <span class="hover-effect-underline stretched-link">Who do I contact if I have any issues after moving in?</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="nav-link position-relative fs-base fw-normal py-1 px-0" href="help-single-article-v1">
                                            <i class="fi-chevron-right fs-lg ms-n1 me-2"></i>
                                            <span class="hover-effect-underline stretched-link">How do I set up utilities like electricity and internet?</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="nav-link position-relative fs-base fw-normal py-1 px-0" href="help-single-article-v1">
                                            <i class="fi-chevron-right fs-lg ms-n1 me-2"></i>
                                            <span class="hover-effect-underline stretched-link">What is the process for checking in to the property?</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="nav-link position-relative fs-base fw-normal py-1 px-0" href="help-single-article-v1">
                                            <i class="fi-chevron-right fs-lg ms-n1 me-2"></i>
                                            <span class="hover-effect-underline stretched-link">Can I request additional services or amenities after moving in?</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="nav-link position-relative fs-base fw-normal py-1 px-0" href="help-single-article-v1">
                                            <i class="fi-chevron-right fs-lg ms-n1 me-2"></i>
                                            <span class="hover-effect-underline stretched-link">How do I update my contact information or other details after booking?</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="nav-link position-relative fs-base fw-normal py-1 px-0" href="help-single-article-v1">
                                            <i class="fi-chevron-right fs-lg ms-n1 me-2"></i>
                                            <span class="hover-effect-underline stretched-link">What is the procedure if I need repairs or maintenance?</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="nav-link position-relative fs-base fw-normal py-1 px-0" href="help-single-article-v1">
                                            <i class="fi-chevron-right fs-lg ms-n1 me-2"></i>
                                            <span class="hover-effect-underline stretched-link">How do I report issues with my neighbors?</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="nav-link position-relative fs-base fw-normal py-1 px-0" href="help-single-article-v1">
                                            <i class="fi-chevron-right fs-lg ms-n1 me-2"></i>
                                            <span class="hover-effect-underline stretched-link">Who is responsible for property maintenance during my stay?</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="nav-link position-relative fs-base fw-normal py-1 px-0" href="help-single-article-v1">
                                            <i class="fi-chevron-right fs-lg ms-n1 me-2"></i>
                                            <span class="hover-effect-underline stretched-link">Can I upgrade or change my accommodation after booking?</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="nav-link position-relative fs-base fw-normal py-1 px-0" href="help-single-article-v1">
                                            <i class="fi-chevron-right fs-lg ms-n1 me-2"></i>
                                            <span class="hover-effect-underline stretched-link">How do I renew my lease if I want to stay longer?</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!-- Cancellation, notice, extension tab -->
                        <div class="tab-pane" id="cancellation" role="tabpanel" aria-labelledby="cancellation-tab">
                            <div class="d-flex border-bottom ps-md-4 pb-3 pb-sm-4">
                                <h2 class="h5 mb-0">Cancellation, notice, extension</h2>
                            </div>
                            <div class="position-relative">
                                <div class="position-absolute top-0 start-0 h-100 border-start d-none d-md-block"></div>
                                <ul class="nav flex-column gap-3 pt-4 ps-md-4">
                                    <li>
                                        <a class="nav-link position-relative fs-base fw-normal py-1 px-0" href="help-single-article-v1">
                                            <i class="fi-chevron-right fs-lg ms-n1 me-2"></i>
                                            <span class="hover-effect-underline stretched-link">What is the process for canceling my booking?</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="nav-link position-relative fs-base fw-normal py-1 px-0" href="help-single-article-v1">
                                            <i class="fi-chevron-right fs-lg ms-n1 me-2"></i>
                                            <span class="hover-effect-underline stretched-link">Is there a penalty for canceling my booking?</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="nav-link position-relative fs-base fw-normal py-1 px-0" href="help-single-article-v1">
                                            <i class="fi-chevron-right fs-lg ms-n1 me-2"></i>
                                            <span class="hover-effect-underline stretched-link">How much notice do I need to give before moving out?</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="nav-link position-relative fs-base fw-normal py-1 px-0" href="help-single-article-v1">
                                            <i class="fi-chevron-right fs-lg ms-n1 me-2"></i>
                                            <span class="hover-effect-underline stretched-link">Can I extend my stay after the initial booking period?</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="nav-link position-relative fs-base fw-normal py-1 px-0" href="help-single-article-v1">
                                            <i class="fi-chevron-right fs-lg ms-n1 me-2"></i>
                                            <span class="hover-effect-underline stretched-link">What happens if I need to leave before my lease ends?</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="nav-link position-relative fs-base fw-normal py-1 px-0" href="help-single-article-v1">
                                            <i class="fi-chevron-right fs-lg ms-n1 me-2"></i>
                                            <span class="hover-effect-underline stretched-link">How do I request a lease extension?</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="nav-link position-relative fs-base fw-normal py-1 px-0" href="help-single-article-v1">
                                            <i class="fi-chevron-right fs-lg ms-n1 me-2"></i>
                                            <span class="hover-effect-underline stretched-link">Will I get a refund if I cancel my booking?</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="nav-link position-relative fs-base fw-normal py-1 px-0" href="help-single-article-v1">
                                            <i class="fi-chevron-right fs-lg ms-n1 me-2"></i>
                                            <span class="hover-effect-underline stretched-link">What is the policy on early termination of the lease?</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="nav-link position-relative fs-base fw-normal py-1 px-0" href="help-single-article-v1">
                                            <i class="fi-chevron-right fs-lg ms-n1 me-2"></i>
                                            <span class="hover-effect-underline stretched-link">How do I provide notice if I plan to vacate the property?</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="nav-link position-relative fs-base fw-normal py-1 px-0" href="help-single-article-v1">
                                            <i class="fi-chevron-right fs-lg ms-n1 me-2"></i>
                                            <span class="hover-effect-underline stretched-link">Can I transfer my lease to someone else if I need to move?</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="nav-link position-relative fs-base fw-normal py-1 px-0" href="help-single-article-v1">
                                            <i class="fi-chevron-right fs-lg ms-n1 me-2"></i>
                                            <span class="hover-effect-underline stretched-link">What happens if the property owner cancels my booking?</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="nav-link position-relative fs-base fw-normal py-1 px-0" href="help-single-article-v1">
                                            <i class="fi-chevron-right fs-lg ms-n1 me-2"></i>
                                            <span class="hover-effect-underline stretched-link">Is there a fee for extending my stay?</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!-- Regulations tab -->
                        <div class="tab-pane" id="regulations" role="tabpanel" aria-labelledby="regulations-tab">
                            <div class="d-flex border-bottom ps-md-4 pb-3 pb-sm-4">
                                <h2 class="h5 mb-0">Regulations</h2>
                            </div>
                            <div class="position-relative">
                                <div class="position-absolute top-0 start-0 h-100 border-start d-none d-md-block"></div>
                                <ul class="nav flex-column gap-3 pt-4 ps-md-4">
                                    <li>
                                        <a class="nav-link position-relative fs-base fw-normal py-1 px-0" href="help-single-article-v1">
                                            <i class="fi-chevron-right fs-lg ms-n1 me-2"></i>
                                            <span class="hover-effect-underline stretched-link">What are the local laws regarding renting accommodation?</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="nav-link position-relative fs-base fw-normal py-1 px-0" href="help-single-article-v1">
                                            <i class="fi-chevron-right fs-lg ms-n1 me-2"></i>
                                            <span class="hover-effect-underline stretched-link">Are there any noise regulations I need to follow?</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="nav-link position-relative fs-base fw-normal py-1 px-0" href="help-single-article-v1">
                                            <i class="fi-chevron-right fs-lg ms-n1 me-2"></i>
                                            <span class="hover-effect-underline stretched-link">What are the rules regarding waste disposal and recycling?</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="nav-link position-relative fs-base fw-normal py-1 px-0" href="help-single-article-v1">
                                            <i class="fi-chevron-right fs-lg ms-n1 me-2"></i>
                                            <span class="hover-effect-underline stretched-link">Are there any specific regulations for pet owners?</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="nav-link position-relative fs-base fw-normal py-1 px-0" href="help-single-article-v1">
                                            <i class="fi-chevron-right fs-lg ms-n1 me-2"></i>
                                            <span class="hover-effect-underline stretched-link">Do I need to register with local authorities after moving in?</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="nav-link position-relative fs-base fw-normal py-1 px-0" href="help-single-article-v1">
                                            <i class="fi-chevron-right fs-lg ms-n1 me-2"></i>
                                            <span class="hover-effect-underline stretched-link">What are the parking regulations for tenants?</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="nav-link position-relative fs-base fw-normal py-1 px-0" href="help-single-article-v1">
                                            <i class="fi-chevron-right fs-lg ms-n1 me-2"></i>
                                            <span class="hover-effect-underline stretched-link">Are there restrictions on the type of activities I can conduct in the property?</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="nav-link position-relative fs-base fw-normal py-1 px-0" href="help-single-article-v1">
                                            <i class="fi-chevron-right fs-lg ms-n1 me-2"></i>
                                            <span class="hover-effect-underline stretched-link">What should I do if I receive a notice of violation?</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="nav-link position-relative fs-base fw-normal py-1 px-0" href="help-single-article-v1">
                                            <i class="fi-chevron-right fs-lg ms-n1 me-2"></i>
                                            <span class="hover-effect-underline stretched-link">Are there any occupancy limits for the property?</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="nav-link position-relative fs-base fw-normal py-1 px-0" href="help-single-article-v1">
                                            <i class="fi-chevron-right fs-lg ms-n1 me-2"></i>
                                            <span class="hover-effect-underline stretched-link">What are the fire safety regulations I need to follow?</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="nav-link position-relative fs-base fw-normal py-1 px-0" href="help-single-article-v1">
                                            <i class="fi-chevron-right fs-lg ms-n1 me-2"></i>
                                            <span class="hover-effect-underline stretched-link">How are disputes with landlords or neighbors handled legally?</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="nav-link position-relative fs-base fw-normal py-1 px-0" href="help-single-article-v1">
                                            <i class="fi-chevron-right fs-lg ms-n1 me-2"></i>
                                            <span class="hover-effect-underline stretched-link">What are the rules for subletting the property?</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!-- Insurances tab -->
                        <div class="tab-pane" id="insurances" role="tabpanel" aria-labelledby="insurances-tab">
                            <div class="d-flex border-bottom ps-md-4 pb-3 pb-sm-4">
                                <h2 class="h5 mb-0">Insurances</h2>
                            </div>
                            <div class="position-relative">
                                <div class="position-absolute top-0 start-0 h-100 border-start d-none d-md-block"></div>
                                <ul class="nav flex-column gap-3 pt-4 ps-md-4">
                                    <li>
                                        <a class="nav-link position-relative fs-base fw-normal py-1 px-0" href="help-single-article-v1">
                                            <i class="fi-chevron-right fs-lg ms-n1 me-2"></i>
                                            <span class="hover-effect-underline stretched-link">Do I need renter's insurance?</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="nav-link position-relative fs-base fw-normal py-1 px-0" href="help-single-article-v1">
                                            <i class="fi-chevron-right fs-lg ms-n1 me-2"></i>
                                            <span class="hover-effect-underline stretched-link">What does renter's insurance cover?</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="nav-link position-relative fs-base fw-normal py-1 px-0" href="help-single-article-v1">
                                            <i class="fi-chevron-right fs-lg ms-n1 me-2"></i>
                                            <span class="hover-effect-underline stretched-link">Is renter's insurance included in my rent?</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="nav-link position-relative fs-base fw-normal py-1 px-0" href="help-single-article-v1">
                                            <i class="fi-chevron-right fs-lg ms-n1 me-2"></i>
                                            <span class="hover-effect-underline stretched-link">How do I choose the right insurance policy for my needs?</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="nav-link position-relative fs-base fw-normal py-1 px-0" href="help-single-article-v1">
                                            <i class="fi-chevron-right fs-lg ms-n1 me-2"></i>
                                            <span class="hover-effect-underline stretched-link">What happens if my belongings are damaged or stolen?</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="nav-link position-relative fs-base fw-normal py-1 px-0" href="help-single-article-v1">
                                            <i class="fi-chevron-right fs-lg ms-n1 me-2"></i>
                                            <span class="hover-effect-underline stretched-link">Does the property owner's insurance cover tenant belongings?</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="nav-link position-relative fs-base fw-normal py-1 px-0" href="help-single-article-v1">
                                            <i class="fi-chevron-right fs-lg ms-n1 me-2"></i>
                                            <span class="hover-effect-underline stretched-link">How do I file a claim with my renter's insurance?</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="nav-link position-relative fs-base fw-normal py-1 px-0" href="help-single-article-v1">
                                            <i class="fi-chevron-right fs-lg ms-n1 me-2"></i>
                                            <span class="hover-effect-underline stretched-link">What is the cost of renter's insurance?</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="nav-link position-relative fs-base fw-normal py-1 px-0" href="help-single-article-v1">
                                            <i class="fi-chevron-right fs-lg ms-n1 me-2"></i>
                                            <span class="hover-effect-underline stretched-link">Do I need additional insurance for valuable items?</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="nav-link position-relative fs-base fw-normal py-1 px-0" href="help-single-article-v1">
                                            <i class="fi-chevron-right fs-lg ms-n1 me-2"></i>
                                            <span class="hover-effect-underline stretched-link">What is the process for transferring my insurance if I move?</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="nav-link position-relative fs-base fw-normal py-1 px-0" href="help-single-article-v1">
                                            <i class="fi-chevron-right fs-lg ms-n1 me-2"></i>
                                            <span class="hover-effect-underline stretched-link">Is insurance required by law for tenants?</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="nav-link position-relative fs-base fw-normal py-1 px-0" href="help-single-article-v1">
                                            <i class="fi-chevron-right fs-lg ms-n1 me-2"></i>
                                            <span class="hover-effect-underline stretched-link">How does renter's insurance differ from homeowner's insurance?</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contact CTA -->
            <div class="pt-4 mt-2 mt-sm-3">
                <h3 class="fs-base pb-sm-1">Can't find an answer to your question?</h3>
                <a class="btn btn-lg btn-primary" href="contact-v1">Contact us</a>
            </div>
        </section>


        <!-- Popular articles -->
        <section class="bg-body-tertiary py-5">
            <div class="container py-1 py-sm-3 py-md-4 py-xl-5">
                <h2 class="pb-2 pb-md-3">Popular articles</h2>

                <!-- Filter nav pills -->
                <div class="d-flex align-items-center justify-content-between gap-3">
                    <div class="overflow-x-auto pb-3 mb-3 mb-lg-4">
                        <ul class="nav nav-pills flex-nowrap gap-2">
                            <li class="nav-item me-1">
                                <a class="nav-link text-nowrap active" aria-current="page" href="#!">All</a>
                            </li>
                            <li class="nav-item me-1">
                                <a class="nav-link text-nowrap" href="#!">Accommodation</a>
                            </li>
                            <li class="nav-item me-1">
                                <a class="nav-link text-nowrap" href="#!">Booking</a>
                            </li>
                            <li class="nav-item me-1">
                                <a class="nav-link text-nowrap" href="#!">Payment</a>
                            </li>
                            <li class="nav-item me-1">
                                <a class="nav-link text-nowrap" href="#!">Cancellation</a>
                            </li>
                            <li class="nav-item me-1">
                                <a class="nav-link text-nowrap" href="#!">Insurances</a>
                            </li>
                        </ul>
                    </div>
                    <div class="nav pb-3 mb-3 mb-lg-4">
                        <a class="nav-link position-relative text-nowrap p-0" href="#!">
                            <span class="hover-effect-underline stretched-link">Browse all<span class="d-none d-sm-inline"> topics</span></span>
                            <i class="fi-chevron-right fs-base mt-1 ms-1 me-n1"></i>
                        </a>
                    </div>
                </div>

                <!-- Grid of articles that turns into carousel on screens <992px wide (lg breakpoint) -->
                <div class="swiper" data-swiper='{
                            "slidesPerView": 1,
                            "spaceBetween": 24,
                            "autoHeight": true,
                            "pagination": {
                              "el": ".swiper-pagination",
                              "clickable": true
                            },
                            "breakpoints": {
                              "500": {
                                "slidesPerView": 2
                              },
                              "992": {
                                "slidesPerView": 3
                              }
                            }
                          }'>
                    <div class="swiper-wrapper">

                        <!-- Article -->
                        <article class="swiper-slide">
                            <a class="ratio d-flex hover-effect-scale bg-body-secondary rounded overflow-hidden" href="help-single-article-v1" style="--fn-aspect-ratio: calc(300 / 416 * 100%)">
                                <img src="{{ asset('assets/img/help/v1/01.jpg') }}" class="hover-effect-target" alt="Image">
                            </a>
                            <div class="pt-4">
                                <div class="text-body-secondary fs-xs text-uppercase pb-2 mt-n1 mb-1">Accommodation</div>
                                <h3 class="h5 mb-2">
                                    <a class="hover-effect-underline" href="help-single-article-v1">Renting out a condo</a>
                                </h3>
                                <p class="fs-sm mb-0">Maximize your investment by renting out your condo - unlock a steady income stream and build wealth over time...</p>
                            </div>
                        </article>

                        <!-- Article -->
                        <article class="swiper-slide">
                            <a class="ratio d-flex hover-effect-scale bg-body-secondary rounded overflow-hidden" href="help-single-article-v1" style="--fn-aspect-ratio: calc(300 / 416 * 100%)">
                                <img src="{{ asset('assets/img/help/v1/02.jpg') }}" class="hover-effect-target" alt="Image">
                            </a>
                            <div class="pt-4">
                                <div class="text-body-secondary fs-xs text-uppercase pb-2 mt-n1 mb-1">Insurances</div>
                                <h3 class="h5 mb-2">
                                    <a class="hover-effect-underline" href="help-single-article-v1">What is renters' insurance?</a>
                                </h3>
                                <p class="fs-sm mb-0">Renters' insurance is a type of insurance policy that provides coverage for tenants renting a home or apartment...</p>
                            </div>
                        </article>

                        <!-- Article -->
                        <article class="swiper-slide">
                            <a class="ratio d-flex hover-effect-scale bg-body-secondary rounded overflow-hidden" href="help-single-article-v1" style="--fn-aspect-ratio: calc(300 / 416 * 100%)">
                                <img src="{{ asset('assets/img/help/v1/03.jpg') }}" class="hover-effect-target" alt="Image">
                            </a>
                            <div class="pt-4">
                                <div class="text-body-secondary fs-xs text-uppercase pb-2 mt-n1 mb-1">Booking</div>
                                <h3 class="h5 mb-2">
                                    <a class="hover-effect-underline" href="help-single-article-v1">Tips and tricks for renters</a>
                                </h3>
                                <p class="fs-sm mb-0">Unlock your best renting experience with our essential tips and tricks, designed to help you save money and find the...</p>
                            </div>
                        </article>
                    </div>

                    <!-- Pagination (Bullets) -->
                    <div class="swiper-pagination position-static mt-3 mt-md-4"></div>
                </div>
            </div>
        </section>


        <!-- FAQ (Accordion) -->
        <section class="container py-5 mb-xxl-3">
            <div class="row py-1 py-sm-2 py-md-3 py-lg-4 py-xl-5">
                <div class="col-md-4 col-xl-3 mb-4 mb-md-0" style="margin-top: -120px">
                    <div class="sticky-md-top text-center text-md-start pe-md-4 pe-lg-5 pe-xl-0" style="padding-top: 120px;">
                        <h2>Popular FAQs</h2>
                        <p class="pb-2 pb-md-3">Still have unanswered questions and need to get in touch?</p>
                        <a class="btn btn-lg btn-primary" href="contact-v1">Contact us</a>
                    </div>
                </div>
                <div class="col-md-8 offset-xl-1">

                    <!-- Accordion of questions -->
                    <div class="accordion" id="faq">

                        <!-- Question -->
                        <div class="accordion-item">
                            <h3 class="accordion-header" id="faqHeading-1">
                                <button type="button" class="accordion-button hover-effect-underline collapsed" data-bs-toggle="collapse" data-bs-target="#faqCollapse-1" aria-expanded="false" aria-controls="faqCollapse-1">
                                    <span class="me-2">How do I start the process of buying a home?</span>
                                </button>
                            </h3>
                            <div class="accordion-collapse collapse" id="faqCollapse-1" aria-labelledby="faqHeading-1" data-bs-parent="#faq">
                                <div class="accordion-body">The first step is to assess your financial situation and get pre-approved for a mortgage. This will give you a clear understanding of your budget. After that, you can start searching for properties that match your criteria and work with a real estate agent to guide you through the process.</div>
                            </div>
                        </div>

                        <!-- Question -->
                        <div class="accordion-item">
                            <h3 class="accordion-header" id="faqHeading-2">
                                <button type="button" class="accordion-button hover-effect-underline collapsed" data-bs-toggle="collapse" data-bs-target="#faqCollapse-2" aria-expanded="false" aria-controls="faqCollapse-2">
                                    <span class="me-2">What should I consider when choosing a neighborhood?</span>
                                </button>
                            </h3>
                            <div class="accordion-collapse collapse" id="faqCollapse-2" aria-labelledby="faqHeading-2" data-bs-parent="#faq">
                                <div class="accordion-body">Consider factors such as the proximity to schools, work, public transportation, safety, and local amenities like shops and parks. It’s also important to research the neighborhood's future development plans and property value trends.</div>
                            </div>
                        </div>

                        <!-- Question -->
                        <div class="accordion-item">
                            <h3 class="accordion-header" id="faqHeading-3">
                                <button type="button" class="accordion-button hover-effect-underline collapsed" data-bs-toggle="collapse" data-bs-target="#faqCollapse-3" aria-expanded="false" aria-controls="faqCollapse-3">
                                    <span class="me-2">How much should I budget for closing costs?</span>
                                </button>
                            </h3>
                            <div class="accordion-collapse collapse" id="faqCollapse-3" aria-labelledby="faqHeading-3" data-bs-parent="#faq">
                                <div class="accordion-body">Closing costs typically range from 2% to 5% of the home's purchase price. These costs can include loan origination fees, title insurance, attorney fees, and other related expenses. It's advisable to set aside additional funds for these costs.</div>
                            </div>
                        </div>

                        <!-- Question -->
                        <div class="accordion-item">
                            <h3 class="accordion-header" id="faqHeading-4">
                                <button type="button" class="accordion-button hover-effect-underline collapsed" data-bs-toggle="collapse" data-bs-target="#faqCollapse-4" aria-expanded="false" aria-controls="faqCollapse-4">
                                    <span class="me-2">Is it better to rent or buy a home?</span>
                                </button>
                            </h3>
                            <div class="accordion-collapse collapse" id="faqCollapse-4" aria-labelledby="faqHeading-4" data-bs-parent="#faq">
                                <div class="accordion-body">This depends on your personal financial situation, lifestyle, and long-term goals. Buying is often considered a good investment, but it requires a significant upfront cost and ongoing maintenance. Renting offers more flexibility and fewer responsibilities, but you won't build equity.</div>
                            </div>
                        </div>

                        <!-- Question -->
                        <div class="accordion-item">
                            <h3 class="accordion-header" id="faqHeading-5">
                                <button type="button" class="accordion-button hover-effect-underline collapsed" data-bs-toggle="collapse" data-bs-target="#faqCollapse-5" aria-expanded="false" aria-controls="faqCollapse-5">
                                    <span class="me-2">How do I determine the right price to offer on a home?</span>
                                </button>
                            </h3>
                            <div class="accordion-collapse collapse" id="faqCollapse-5" aria-labelledby="faqHeading-5" data-bs-parent="#faq">
                                <div class="accordion-body">Research comparable properties in the area that have recently sold to get a sense of the market value. Your real estate agent can also provide a comparative market analysis (CMA) to help determine a fair offer based on the property's condition, location, and market demand.</div>
                            </div>
                        </div>

                        <!-- Question -->
                        <div class="accordion-item">
                            <h3 class="accordion-header" id="faqHeading-6">
                                <button type="button" class="accordion-button hover-effect-underline collapsed" data-bs-toggle="collapse" data-bs-target="#faqCollapse-6" aria-expanded="false" aria-controls="faqCollapse-6">
                                    <span class="me-2">What should I look for during a home inspection?</span>
                                </button>
                            </h3>
                            <div class="accordion-collapse collapse" id="faqCollapse-6" aria-labelledby="faqHeading-6" data-bs-parent="#faq">
                                <div class="accordion-body">During a home inspection, focus on the structural integrity of the property, including the roof, foundation, plumbing, electrical systems, and HVAC. Look for signs of water damage, mold, and pests. The inspector will provide a detailed report, which can be used to negotiate repairs or price adjustments.</div>
                            </div>
                        </div>

                        <!-- Question -->
                        <div class="accordion-item">
                            <h3 class="accordion-header" id="faqHeading-7">
                                <button type="button" class="accordion-button hover-effect-underline collapsed" data-bs-toggle="collapse" data-bs-target="#faqCollapse-7" aria-expanded="false" aria-controls="faqCollapse-7">
                                    <span class="me-2">What are the benefits of getting a pre-approved mortgage?</span>
                                </button>
                            </h3>
                            <div class="accordion-collapse collapse" id="faqCollapse-7" aria-labelledby="faqHeading-7" data-bs-parent="#faq">
                                <div class="accordion-body">Getting pre-approved for a mortgage shows sellers that you are a serious buyer and can afford the property. It also helps you set a realistic budget and speeds up the home-buying process since your financial documents are already in order.</div>
                            </div>
                        </div>

                        <!-- Question -->
                        <div class="accordion-item">
                            <h3 class="accordion-header" id="faqHeading-8">
                                <button type="button" class="accordion-button hover-effect-underline collapsed" data-bs-toggle="collapse" data-bs-target="#faqCollapse-8" aria-expanded="false" aria-controls="faqCollapse-8">
                                    <span class="me-2">How can I make my home more appealing to buyers?</span>
                                </button>
                            </h3>
                            <div class="accordion-collapse collapse" id="faqCollapse-8" aria-labelledby="faqHeading-8" data-bs-parent="#faq">
                                <div class="accordion-body">To make your home more appealing, focus on curb appeal by maintaining the exterior, landscaping, and entryway. Inside, declutter, clean thoroughly, and consider staging the home with neutral décor to allow buyers to envision themselves living there. Address any necessary repairs and updates.</div>
                            </div>
                        </div>

                        <!-- Question -->
                        <div class="accordion-item">
                            <h3 class="accordion-header" id="faqHeading-9">
                                <button type="button" class="accordion-button hover-effect-underline collapsed" data-bs-toggle="collapse" data-bs-target="#faqCollapse-9" aria-expanded="false" aria-controls="faqCollapse-9">
                                    <span class="me-2">What is a seller's market vs. a buyer's market?</span>
                                </button>
                            </h3>
                            <div class="accordion-collapse collapse" id="faqCollapse-9" aria-labelledby="faqHeading-9" data-bs-parent="#faq">
                                <div class="accordion-body">A seller's market occurs when there are more buyers than available properties, leading to higher prices and quicker sales. A buyer's market happens when there are more properties than buyers, giving buyers more negotiating power and typically leading to lower prices.</div>
                            </div>
                        </div>

                        <!-- Question -->
                        <div class="accordion-item">
                            <h3 class="accordion-header" id="faqHeading-10">
                                <button type="button" class="accordion-button hover-effect-underline collapsed" data-bs-toggle="collapse" data-bs-target="#faqCollapse-10" aria-expanded="false" aria-controls="faqCollapse-10">
                                    <span class="me-2">How long does it take to close on a home?</span>
                                </button>
                            </h3>
                            <div class="accordion-collapse collapse" id="faqCollapse-10" aria-labelledby="faqHeading-10" data-bs-parent="#faq">
                                <div class="accordion-body">The closing process typically takes 30 to 45 days, depending on various factors such as the type of loan, the efficiency of the involved parties, and any unforeseen issues that may arise. Staying organized and responsive can help ensure a smoother, faster closing process.</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    @include('layouts.partials.footer.real-estate-footer')

@endsection

@push('scripts')
    <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    @vite(['resources/js/app.js'])
@endpush