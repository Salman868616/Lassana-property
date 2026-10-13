@extends('layouts.app')

@section('title', 'Finder | Directory & Listings Bootstrap Laravel 13 Template')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/vendor/img-comparison-slider/dist/styles.css') }}">
@endpush

@section('content')

    @include('layouts.partials.header.header')

    <!-- Page content -->
    <main class="content-wrapper">

        <!-- Hero (Demos) -->
        <section class="position-relative pt-4 pt-sm-5 pb-5" style="margin-top: -76px">
            <div style="height: 76px"></div>

            <!-- Title -->
            <div class="container position-relative z-1 text-center pt-lg-2 pt-xl-3 pb-3 pb-sm-0 mt-3 mt-sm-0 mb-3 mb-sm-5 mx-auto" style="max-width: 680px">
                <h1 class="display-5 pb-md-2">Directory &amp; Listings <span class="text-nowrap">Bootstrap 5</span> Template</h1>
                <p class="fs-lg mb-0">Maximize your directory or listings platform with our premium Bootstrap 5 template, designed for top performance and easy customization.</p>
            </div>

            <!-- Grid -->
            <div class="container-fluid position-relative z-1 pb-2 pb-sm-3 pb-md-4 pb-lg-5" style="max-width: 1520px">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 g-4 g-sm-3 g-md-4 pb-xl-2 pb-xxl-3">

                    <!-- Contractors -->
                    <div class="col">
                        <div class="hover-effect-scale position-relative rounded-5 overflow-hidden p-1">
                            <div class="position-relative z-1 overflow-hidden" style="border-radius: 14px">
                                <div class="ratio hover-effect-target bg-body-tertiary" style="--fn-aspect-ratio: calc(372 / 472 * 100%)">
                                    <img src="{{ asset('assets/img/intro/demos/contractors-light.jpg') }}" class="d-none-dark" alt="Contractors">
                                    <img src="{{ asset('assets/img/intro/demos/contractors-dark.jpg') }}" class="d-none d-block-dark" alt="Contractors">
                                </div>
                                <div class="position-absolute top-0 start-0 d-flex align-items-end w-100 h-100 p-2">
                                    <a class="btn btn-sm btn-dark animate-slide-up stretched-link fs-sm fw-semibold rounded-pill m-1" href="home-contractors.html">
                                        Contractors
                                        <i class="fi-arrow-up-right animate-target fs-base ms-1 me-n1"></i>
                                    </a>
                                </div>
                            </div>
                            <span class="position-absolute top-0 start-0 w-100 h-100 bg-white d-none-dark"></span>
                            <span class="position-absolute top-0 start-0 w-100 h-100 bg-body-secondary d-none d-block-dark"></span>
                        </div>
                    </div>

                    <!-- Real Estate -->
                    <div class="col">
                        <div class="hover-effect-scale position-relative rounded-5 overflow-hidden p-1">
                            <div class="position-relative z-1 overflow-hidden" style="border-radius: 14px">
                                <div class="ratio hover-effect-target bg-body-tertiary" style="--fn-aspect-ratio: calc(372 / 472 * 100%)">
                                    <img src="{{ asset('assets/img/intro/demos/real-estate-light.jpg') }}" class="d-none-dark" alt="Real Estate">
                                    <img src="{{ asset('assets/img/intro/demos/real-estate-dark.jpg') }}" class="d-none d-block-dark" alt="Real Estate">
                                </div>
                                <div class="position-absolute top-0 start-0 d-flex align-items-end w-100 h-100 p-2">
                                    <a class="btn btn-sm btn-dark animate-slide-up stretched-link fs-sm fw-semibold rounded-pill m-1" href="{{ route('home-real-estate') }}">
                                        Real Estate
                                        <i class="fi-arrow-up-right animate-target fs-base ms-1 me-n1"></i>
                                    </a>
                                </div>
                            </div>
                            <span class="position-absolute top-0 start-0 w-100 h-100 bg-white d-none-dark"></span>
                            <span class="position-absolute top-0 start-0 w-100 h-100 bg-body-secondary d-none d-block-dark"></span>
                        </div>
                    </div>

                    <!-- Doctors -->
                    <div class="col">
                        <div class="hover-effect-scale position-relative rounded-5 overflow-hidden p-1">
                            <div class="position-relative z-1 overflow-hidden" style="border-radius: 14px">
                                <div class="ratio hover-effect-target bg-body-tertiary" style="--fn-aspect-ratio: calc(372 / 472 * 100%)">
                                    <img src="{{ asset('assets/img/intro/demos/doctors-light.jpg') }}" class="d-none-dark" alt="Doctors">
                                    <img src="{{ asset('assets/img/intro/demos/doctors-dark.jpg') }}" class="d-none d-block-dark" alt="Doctors">
                                </div>
                                <div class="position-absolute top-0 start-0 d-flex align-items-end w-100 h-100 p-2">
                                    <a class="btn btn-sm btn-dark animate-slide-up stretched-link fs-sm fw-semibold rounded-pill m-1" href="home-doctors.html">
                                        Doctors
                                        <i class="fi-arrow-up-right animate-target fs-base ms-1 me-n1"></i>
                                    </a>
                                </div>
                            </div>
                            <span class="position-absolute top-0 start-0 w-100 h-100 bg-white d-none-dark"></span>
                            <span class="position-absolute top-0 start-0 w-100 h-100 bg-body-secondary d-none d-block-dark"></span>
                        </div>
                    </div>

                    <!-- Events -->
                    <div class="col">
                        <div class="hover-effect-scale position-relative rounded-5 overflow-hidden p-1">
                            <div class="position-relative z-1 overflow-hidden" style="border-radius: 14px">
                                <div class="ratio hover-effect-target bg-body-tertiary" style="--fn-aspect-ratio: calc(372 / 472 * 100%)">
                                    <img src="{{ asset('assets/img/intro/demos/events-light.jpg') }}" class="d-none-dark" alt="Events">
                                    <img src="{{ asset('assets/img/intro/demos/events-dark.jpg') }}" class="d-none d-block-dark" alt="Events">
                                </div>
                                <div class="position-absolute top-0 start-0 d-flex align-items-end w-100 h-100 p-2">
                                    <a class="btn btn-sm btn-dark animate-slide-up stretched-link fs-sm fw-semibold rounded-pill m-1" href="home-events.html">
                                        Events
                                        <i class="fi-arrow-up-right animate-target fs-base ms-1 me-n1"></i>
                                    </a>
                                </div>
                            </div>
                            <span class="position-absolute top-0 start-0 w-100 h-100 bg-white d-none-dark"></span>
                            <span class="position-absolute top-0 start-0 w-100 h-100 bg-body-secondary d-none d-block-dark"></span>
                        </div>
                    </div>

                    <!-- Cars -->
                    <div class="col">
                        <div class="hover-effect-scale position-relative rounded-5 overflow-hidden p-1">
                            <div class="position-relative z-1 overflow-hidden" style="border-radius: 14px">
                                <div class="ratio hover-effect-target bg-body-tertiary" style="--fn-aspect-ratio: calc(372 / 472 * 100%)">
                                    <img src="{{ asset('assets/img/intro/demos/cars-light.jpg') }}" class="d-none-dark" alt="Cars">
                                    <img src="{{ asset('assets/img/intro/demos/cars-dark.jpg') }}" class="d-none d-block-dark" alt="Cars">
                                </div>
                                <div class="position-absolute top-0 start-0 d-flex align-items-end w-100 h-100 p-2">
                                    <a class="btn btn-sm btn-dark animate-slide-up stretched-link fs-sm fw-semibold rounded-pill m-1" href="home-cars.html">
                                        Cars
                                        <i class="fi-arrow-up-right animate-target fs-base ms-1 me-n1"></i>
                                    </a>
                                </div>
                            </div>
                            <span class="position-absolute top-0 start-0 w-100 h-100 bg-white d-none-dark"></span>
                            <span class="position-absolute top-0 start-0 w-100 h-100 bg-body-secondary d-none d-block-dark"></span>
                        </div>
                    </div>

                    <!-- City Guide -->
                    <div class="col">
                        <div class="hover-effect-scale position-relative rounded-5 overflow-hidden p-1">
                            <div class="position-relative z-1 overflow-hidden" style="border-radius: 14px">
                                <div class="ratio hover-effect-target bg-body-tertiary" style="--fn-aspect-ratio: calc(372 / 472 * 100%)">
                                    <img src="{{ asset('assets/img/intro/demos/city-guide-light.jpg') }}" class="d-none-dark" alt="City Guide">
                                    <img src="{{ asset('assets/img/intro/demos/city-guide-dark.jpg') }}" class="d-none d-block-dark" alt="City Guide">
                                </div>
                                <div class="position-absolute top-0 start-0 d-flex align-items-end w-100 h-100 p-2">
                                    <a class="btn btn-sm btn-dark animate-slide-up stretched-link fs-sm fw-semibold rounded-pill m-1" href="home-city-guide.html">
                                        City Guide
                                        <i class="fi-arrow-up-right animate-target fs-base ms-1 me-n1"></i>
                                    </a>
                                </div>
                            </div>
                            <span class="position-absolute top-0 start-0 w-100 h-100 bg-white d-none-dark"></span>
                            <span class="position-absolute top-0 start-0 w-100 h-100 bg-body-secondary d-none d-block-dark"></span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Backgound color -->
            <span class="position-absolute top-0 start-0 w-100 h-100 bg-body-secondary d-none-dark"></span>
            <div class="position-absolute top-0 start-0 w-100 h-100 bg-body-tertiary d-none d-block-dark"></div>
        </section>


        <!-- Front-end solution -->
        <section class="container py-5 mt-2 mb-3 my-sm-3 my-md-4 my-lg-5">
            <h2 class="h1 text-center pt-xl-2 pt-xxl-4">Complete Front-end Solution</h2>
            <p class="fs-lg text-center pb-4 pb-md-5 mb-0 mb-lg-2 mb-xl-3 mb-xxl-4">All you need for your next directory or listings project</p>
            <div class="row align-items-center justify-content-center pb-xl-2 pb-xxl-4">
                <div class="col-10 col-sm-8 col-md-6 pb-3 pb-md-0 mb-3 mb-md-0">
                    <div class="position-relative w-100" style="max-width: 600px">
                        <div class="ratio" style="--fn-aspect-ratio: calc(480 / 600 * 100%)"></div>
                        <div class="position-absolute ratio ratio-1x1 z-2 bg-primary rounded-5" style="top: 41%; right: 38%; width: 18%">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 110 110" fill="#fff">
                                <path d="M73.199 70.343l-1.184.21a1.4 1.4 0 0 0-.236-.432c-.105-.137-.248-.249-.428-.336s-.406-.131-.677-.131c-.37 0-.679.083-.926.249s-.371.374-.371.633c0 .224.083.405.249.542s.434.249.804.336l1.066.245c.618.143 1.078.363 1.38.66s.454.683.454 1.158a1.76 1.76 0 0 1-.35 1.075c-.23.312-.552.556-.965.734s-.887.266-1.428.266c-.752 0-1.365-.16-1.839-.481a2.03 2.03 0 0 1-.874-1.376l1.263-.192c.079.329.24.578.485.747s.564.249.957.249c.428 0 .77-.089 1.027-.267s.385-.4.385-.66c0-.21-.079-.386-.236-.529s-.392-.25-.712-.323l-1.136-.249c-.626-.143-1.089-.37-1.389-.681s-.446-.706-.446-1.184c0-.396.111-.743.332-1.04s.527-.529.917-.695.837-.253 1.341-.253c.725 0 1.296.157 1.713.472s.692.73.826 1.254zm-9.355 5.208c-.661 0-1.23-.141-1.708-.424a2.84 2.84 0 0 1-1.101-1.201c-.259-.515-.384-1.126-.384-1.822 0-.687.128-1.293.384-1.817s.62-.933 1.084-1.228 1.011-.441 1.634-.441a3.29 3.29 0 0 1 1.101.188 2.67 2.67 0 0 1 .957.59c.283.268.505.616.668 1.044s.245.942.245 1.551v.463H61.39v-.979h4.054c0-.344-.07-.648-.21-.913a1.61 1.61 0 0 0-.59-.634 1.65 1.65 0 0 0-.882-.231c-.367 0-.687.09-.961.271a1.82 1.82 0 0 0-.629.699c-.146.285-.218.596-.218.93v.764c0 .449.079.83.236 1.145s.383.555.668.721.619.245 1 .245c.248 0 .473-.035.677-.105a1.46 1.46 0 0 0 .529-.323c.149-.143.262-.319.341-.529l1.236.223a2.24 2.24 0 0 1-.533.957c-.253.271-.572.482-.957.633s-.817.223-1.306.223zm-7.671 2.521c-.533 0-.992-.07-1.376-.21a2.65 2.65 0 0 1-.935-.555 2.33 2.33 0 0 1-.542-.756l1.123-.463a2.64 2.64 0 0 0 .315.406 1.63 1.63 0 0 0 .542.371c.23.102.526.153.887.153.495 0 .904-.121 1.228-.363s.485-.62.485-1.145v-1.319h-.083a2.98 2.98 0 0 1-.341.476c-.146.175-.347.326-.603.454s-.59.192-1 .192a2.8 2.8 0 0 1-1.433-.371c-.425-.247-.757-.619-1.005-1.105s-.367-1.091-.367-1.804.121-1.325.363-1.835.58-.9 1.005-1.171.907-.411 1.446-.411c.416 0 .753.07 1.009.21a1.87 1.87 0 0 1 .598.481 4.18 4.18 0 0 1 .336.485h.096v-1.088h1.28v6.859c0 .577-.134 1.05-.402 1.42a2.36 2.36 0 0 1-1.088.821c-.457.177-.967.266-1.538.266zm-.013-3.84c.376 0 .693-.087.952-.262s.46-.431.594-.76.205-.73.205-1.193c0-.451-.067-.849-.201-1.193s-.331-.612-.59-.804-.58-.293-.961-.293c-.393 0-.721.102-.983.306s-.46.475-.594.821-.197.734-.197 1.162c0 .44.067.826.201 1.158s.332.591.594.778.591.28.979.28zm-7.853 1.332a2.74 2.74 0 0 1-1.153-.236 1.94 1.94 0 0 1-.817-.695c-.201-.303-.297-.674-.297-1.114 0-.379.073-.69.218-.935a1.61 1.61 0 0 1 .59-.581 3.08 3.08 0 0 1 .83-.323 8.26 8.26 0 0 1 .935-.166l.979-.114c.25-.032.432-.083.546-.153s.17-.184.17-.341v-.031c0-.382-.108-.677-.323-.887s-.53-.315-.952-.315c-.44 0-.786.098-1.04.293s-.424.406-.52.642l-1.228-.28c.146-.408.358-.737.638-.987s.607-.437.974-.55.753-.175 1.158-.175a4.09 4.09 0 0 1 .852.096 2.59 2.59 0 0 1 .848.341 1.9 1.9 0 0 1 .651.712c.169.309.253.703.253 1.193v4.456h-1.276v-.917h-.053c-.084.169-.211.335-.38.498a2.02 2.02 0 0 1-.651.406c-.265.108-.583.162-.952.162zm.284-1.048c.361 0 .67-.071.926-.214s.456-.329.59-.559a1.45 1.45 0 0 0 .205-.747v-.865c-.047.047-.137.09-.271.131s-.281.071-.45.1l-.494.074-.402.052c-.253.032-.485.086-.695.162a1.17 1.17 0 0 0-.498.328c-.125.143-.183.326-.183.559 0 .323.119.568.358.734s.543.245.913.245zm-9.829 3.416v-9.227h1.276v1.088h.109c.076-.14.185-.302.328-.485a1.87 1.87 0 0 1 .594-.481c.253-.137.588-.21 1.005-.21a2.62 2.62 0 0 1 1.45.411c.425.274.759.668 1.001 1.184s.367 1.136.367 1.861-.121 1.347-.363 1.865-.574.913-.996 1.193a2.58 2.58 0 0 1-1.446.415c-.408 0-.741-.069-1.001-.205s-.457-.297-.603-.48a3.63 3.63 0 0 1-.336-.489h-.079v3.561h-1.306zm1.28-5.872c0 .472.069.885.205 1.241s.335.633.594.834.577.297.952.297c.39 0 .716-.103.979-.31s.46-.494.594-.852.205-.762.205-1.21-.067-.84-.201-1.193-.329-.631-.594-.834-.59-.306-.983-.306c-.379 0-.699.098-.961.293s-.456.468-.59.817-.201.757-.201 1.223zm35.887-18.113V36.272h4.468v17.674h-4.468zm-6.603-6.603v-4.468H87v4.468H69.326zM54.115 58.403c-2.147-.008-3.994-.537-5.542-1.585-1.539-1.049-2.725-2.567-3.557-4.556-.824-1.989-1.232-4.381-1.223-7.177 0-2.788.412-5.163 1.236-7.127.832-1.964 2.018-3.457 3.557-4.481 1.548-1.032 3.391-1.548 5.53-1.548s3.977.516 5.517 1.548c1.548 1.032 2.738 2.53 3.57 4.493.832 1.955 1.244 4.327 1.236 7.115 0 2.804-.416 5.201-1.248 7.189-.824 1.989-2.005 3.507-3.545 4.556s-3.383 1.573-5.529 1.573zm0-4.481c1.464 0 2.634-.736 3.507-2.209s1.306-3.682 1.298-6.628c0-1.939-.2-3.553-.599-4.843-.391-1.29-.949-2.259-1.673-2.908-.716-.649-1.56-.974-2.534-.974-1.456 0-2.621.728-3.495 2.184s-1.315 3.636-1.323 6.541c0 1.964.196 3.603.587 4.918.399 1.306.961 2.288 1.685 2.946a3.69 3.69 0 0 0 2.546.974zm-29.367 3.919l10.597-20.969v-.175H23v-4.419h17.936v4.481l-10.61 21.082h-5.579z" />
                            </svg>
                        </div>
                        <img src="{{ asset('assets/img/intro/pages-light.png') }}" class="position-absolute top-0 start-0 w-100 h-100 d-none-dark" alt="Listings Front-end">
                        <img src="{{ asset('assets/img/intro/pages-dark.png') }}" class="position-absolute top-0 start-0 w-100 h-100 d-none d-block-dark" alt="Listings Front-end">
                    </div>
                </div>
                <div class="col-sm-9 col-md-6 col-lg-5 offset-lg-1">
                    <ul class="list-unstyled gap-3 mb-0" style="max-width: 420px;">
                        <li class="d-flex">
                            <i class="fi-check fs-lg text-info mt-1 me-2"></i>
                            <span>Multiple Listings Layout Options</span>
                        </li>
                        <li class="d-flex">
                            <i class="fi-check fs-lg text-info mt-1 me-2"></i>
                            <span>Multiple Listing Detail Page Variations</span>
                        </li>
                        <li class="d-flex">
                            <i class="fi-check fs-lg text-info mt-1 me-2"></i>
                            <span>Complete User Workflow for: Add Property, Add Contractor and Add (Sell) Car</span>
                        </li>
                        <li class="d-flex">
                            <i class="fi-check fs-lg text-info mt-1 me-2"></i>
                            <span>User and Vendor Account Pages</span>
                        </li>
                        <li class="d-flex">
                            <i class="fi-check fs-lg text-info mt-1 me-2"></i>
                            <span>Real Estate, Cars, Contractors, Doctors, Events and City Guide Demos</span>
                        </li>
                        <li class="d-flex">
                            <i class="fi-check fs-lg text-info mt-1 me-2"></i>
                            <span>Blog Pages: Blog Layouts + Single Articles</span>
                        </li>
                        <li class="d-flex">
                            <i class="fi-check fs-lg text-info mt-1 me-2"></i>
                            <span>Help Center / Support Pages</span>
                        </li>
                        <li class="d-flex">
                            <i class="fi-check fs-lg text-info mt-1 me-2"></i>
                            <span>Secondary Pages: About, Contacts, 404, etc.</span>
                        </li>
                        <li class="d-flex">
                            <i class="fi-check fs-lg text-info mt-1 me-2"></i>
                            <span>60+ Flexible Components (UI Kit)</span>
                        </li>
                    </ul>
                </div>
            </div>
        </section>


        <!-- Light / Dark mode (Comparison slider) -->
        <section class="d-flex w-100 position-relative overflow-hidden">
            <div class="position-relative flex-xxl-shrink-0 z-2 start-50 translate-middle-x mt-n1 mb-n2" style="max-width: 1920px">
                <div class="mx-lg-n5 mx-xxl-0">
                    <img-comparison-slider class="focus-none text-primary mx-n5 mx-xxl-0" style="--divider-width: .125rem; --divider-color: currentColor">
                        <figure slot="first">
                            <img src="{{ asset('assets/img/intro/dark-mode.jpg') }}" alt="Dark Mode">
                            <figcaption class="position-absolute top-0 start-50 translate-middle-x pt-3 pt-md-4 pt-lg-5 mt-xl-3 mt-xxl-5" style="padding-right: 200px" data-bs-theme="dark">
                                <span class="badge d-flex align-items-center fs-base bg-body text-white rounded px-3 py-2">
                                    <i class="fi-moon fs-lg" style="margin: 0 8px 0 -4px"></i>
                                    Dark mode
                                </span>
                            </figcaption>
                        </figure>
                        <figure slot="second">
                            <img src="{{ asset('assets/img/intro/light-mode.jpg') }}" alt="Light Mode">
                            <figcaption class="position-absolute top-0 start-50 translate-middle-x pt-3 pt-md-4 pt-lg-5 mt-xl-3 mt-xxl-5" style="padding-left: 200px">
                                <span class="badge d-flex align-items-center fs-base bg-white text-dark rounded px-3 py-2">
                                    <i class="fi-sun fs-lg" style="margin: 0 8px 0 -4px"></i>
                                    Light mode
                                </span>
                            </figcaption>
                        </figure>
                        <div slot="handle" style="width: 42px;">
                            <svg class="text-primary rounded-circle" width="42" height="42" viewBox="0 0 42 42" xmlns="http://www.w3.org/2000/svg">
                                <g>
                                    <circle fill="currentColor" cx="21" cy="21" r="21"></circle>
                                </g>
                                <path fill="white" d="M25.5019 19.7494H15.9147V15.9146L11.1211 20.7081L15.9147 25.5017V21.6669H25.5019V25.5017L30.2955 20.7081L25.5019 15.9146V19.7494Z"></path>
                            </svg>
                        </div>
                    </img-comparison-slider>
                </div>
            </div>
            <div class="position-absolute top-0 start-0 w-50 h-100 bg-dark"></div>
            <div class="position-absolute top-0 end-0 w-50 h-100" style="background-color: #eef1f6"></div>
        </section>


        <!-- Features -->
        <section class="container py-5 my-2 my-sm-3 my-md-4 my-lg-5">
            <h2 class="h1 text-center pb-3 pb-sm-4 pb-lg-2 pb-xl-3 pt-xl-4 mt-xxl-2 mb-lg-5">Finder Feature Highlights</h2>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4 g-lg-5 pb-xl-2 pb-xxl-4">
                <div class="col text-center">
                    <img src="{{ asset('assets/img/intro/features/bootstrap.png') }}" width="56" class="d-inline-flex mb-3" alt="Bootstrap">
                    <h3 class="h5 pt-sm-1 pb-2 mb-1">Built with Latest Bootstrap</h3>
                    <p class="mb-2 mb-sm-3 mb-lg-0">Finder is the powerful e-commerce front-end solution based on Bootstrap 5 - the world's most popular responsive, mobile-first front-end component library.</p>
                </div>
                <div class="col text-center">
                    <img src="{{ asset('assets/img/intro/features/sass.png') }}" width="48" class="d-inline-flex mb-3" alt="Sass">
                    <h3 class="h5 pt-sm-1 pb-2 mb-1">Easy to Customize with Sass</h3>
                    <p class="mb-2 mb-sm-3 mb-lg-0">Finder is built using Sass, allowing for effortless customization of colors, typography, and beyond. It is the most mature, stable, and powerful CSS extension language in the world.</p>
                </div>
                <div class="col text-center">
                    <img src="{{ asset('assets/img/intro/features/npm.png') }}" width="56" class="d-inline-flex mb-3" alt="Npm">
                    <h3 class="h5 pt-sm-1 pb-2 mb-1">Kick-start Your Development</h3>
                    <p class="mb-2 mb-sm-3 mb-lg-0">Start your development process fast and easy with included Npm scripts setup, full tasks automation and local server hot reload. The configuration files are included in the download package.</p>
                </div>
                <div class="col text-center">
                    <img src="{{ asset('assets/img/intro/features/js.png') }}" width="48" class="d-inline-flex mb-3" alt="JavaScript">
                    <h3 class="h5 pt-sm-1 pb-2 mb-1">Future-proof JavaScript</h3>
                    <p class="mb-2 mb-sm-3 mb-lg-0">Finder's core scripts, along with all dependencies, are meticulously crafted in vanilla JS (ES6 modules), ensuring optimal performance and compatibility across various platforms.</p>
                </div>
                <div class="col text-center">
                    <img src="{{ asset('assets/img/intro/features/html5.png') }}" width="48" class="d-inline-flex mb-3" alt="HTML5">
                    <h3 class="h5 pt-sm-1 pb-2 mb-1">W3C Valid HTML Code</h3>
                    <p class="mb-2 mb-sm-3 mb-lg-0">As you likely know, ensuring 100% valid code through W3C validation for all HTML files is crucial. Invalid HTML imposes restrictions on innovation, yet Finder remains innovative at its core.</p>
                </div>
                <div class="col text-center">
                    <img src="{{ asset('assets/img/intro/features/touch.png') }}" width="48" class="d-inline-flex mb-3" alt="Touch UI">
                    <h3 class="h5 pt-sm-1 pb-2 mb-1">Touch-enabled Sliders</h3>
                    <p class="mb-2 mb-sm-3 mb-lg-0">In the era of touch screens it is important to ensure great user experience on handheld devices, especially when it comes to such frequently used interface component as slider.</p>
                </div>
                <div class="col text-center">
                    <img src="{{ asset('assets/img/intro/features/google-fonts.png') }}" width="48" class="d-inline-flex mb-3" alt="Google Fonts">
                    <h3 class="h5 pt-sm-1 pb-2 mb-1">Google Fonts</h3>
                    <p class="mb-2 mb-sm-3 mb-lg-0">Finder uses preloaded variable Google font (Inter) which is free, fast to load and of very high quality. Currently Google fonts library includes 1600+ font families to choose from.</p>
                </div>
                <div class="col text-center">
                    <img src="{{ asset('assets/img/intro/features/vector.png') }}" width="48" class="d-inline-flex mb-3" alt="Vector Icons">
                    <h3 class="h5 pt-sm-1 pb-2 mb-1">Vector Based HD-ready Icons</h3>
                    <p class="mb-2 mb-sm-3 mb-lg-0">Finder is equiped with font-based icon pack and svg icons to ensure that infographics and interface icons look sharp on any device with any screen resolution and pixel density.</p>
                </div>
            </div>
        </section>


        <!-- Mobile friendly (PWA) -->
        <section class="position-relative">
            <div class="container position-relative z-1">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-6 col-lg-5 text-center text-md-start pt-2 pt-sm-3 py-md-4 py-lg-5">
                        <div class="pt-5 pb-sm-2 pb-md-5">
                            <h2 class="h1">Mobile Friendly Interface. <span class="text-primary">PWA ready</span></h2>
                            <p class="fs-lg mb-4">Finder ensures seamless interactions across all devices. With progressive web app (PWA) compatibility, users can enjoy the app-like experiences on their mobile browsers.</p>
                            <p class="fs-sm fw-medium text-body-emphasis mb-4">Scan QR code below to test on your device:</p>
                            <img src="{{ asset('assets/img/intro/qr-light.png') }}" class="d-none-dark rtl-flip" width="120" alt="QR code">
                            <img src="{{ asset('assets/img/intro/qr-dark.png') }}" class="d-none d-inline-block-dark rtl-flip" width="120" alt="QR code">
                        </div>
                    </div>
                    <div class="col-sm-9 col-md-6 col-lg-7 align-self-end">
                        <div class="ratio" style="--fn-aspect-ratio: calc(714 / 746 * 100%)">
                            <img src="{{ asset('assets/img/intro/mobile-light.png') }}" class="d-none-dark rtl-flip" alt="Mobile PWA">
                            <img src="{{ asset('assets/img/intro/mobile-dark.png') }}" class="d-none d-block-dark rtl-flip" alt="Mobile PWA">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Backgound color -->
            <span class="position-absolute top-0 start-0 w-100 h-100 bg-body-secondary d-none-dark"></span>
            <div class="position-absolute top-0 start-0 w-100 h-100 bg-body-tertiary d-none d-block-dark"></div>
        </section>


        <!-- Customizer -->
        <section class="container pt-5 pb-4 pb-sm-5 my-2 mt-sm-3 mt-md-4 mt-lg-5 mb-sm-0 mb-lg-4 mb-xl-5">
            <h2 class="h1 text-center pt-xl-4 pb-md-2 pb-lg-3 pb-xl-4 mt-xxl-2">Theme Customizer</h2>

            <!-- Colors -->
            <div class="row align-items-center justify-content-center py-4">
                <div class="col-9 col-sm-7 col-md-6 order-md-2 offset-lg-1">
                    <div class="ratio" style="max-width: 593px; --fn-aspect-ratio: calc(542 / 593 * 100%)">
                        <img src="{{ asset('assets/img/intro/customizer/colors-light.jpg') }}" class="d-none-dark" alt="Colors">
                        <img src="{{ asset('assets/img/intro/customizer/colors-dark.png') }}" class="d-none d-block-dark" alt="Colors">
                    </div>
                </div>
                <div class="col-md-6 col-lg-5 order-md-1 text-center text-md-start mt-3 mt-md-n5">
                    <span class="badge fs-sm bg-primary-subtle text-primary mb-3 mb-md-4">Colors</span>
                    <h2 class="h3 mb-md-4">Change theme brand colors quickly and easily</h2>
                    <p class="mb-0">Customize theme colors to match your brand palette using the color picker or just type in the color hex. Supported colors: primary, warning, success, info, danger.</p>
                </div>
            </div>

            <hr class="d-md-none my-3 my-sm-4">

            <!-- Typography -->
            <div class="row align-items-center justify-content-center py-4">
                <div class="col-10 col-sm-7 col-md-6 col-lg-7">
                    <div class="ratio" style="max-width: 668px; --fn-aspect-ratio: calc(510 / 668 * 100%)">
                        <img src="{{ asset('assets/img/intro/customizer/typography-light.jpg') }}" class="d-none-dark" alt="Typography">
                        <img src="{{ asset('assets/img/intro/customizer/typography-dark.png') }}" class="d-none d-block-dark" alt="Typography">
                    </div>
                </div>
                <div class="col-md-6 col-lg-5 text-center text-md-start mt-3 mt-md-n5">
                    <span class="badge fs-sm bg-info-subtle text-info mb-3 mb-md-4">Typography</span>
                    <h2 class="h3 mb-md-4">Set up fonts from the huge Google font collection</h2>
                    <p class="mb-0">Easily change the font to your liking. Choose the font from Google Fonts library of 1,600+ open source font families. Update headings and body font sizes right from customizer.</p>
                </div>
            </div>

            <hr class="d-md-none my-3 my-sm-4">

            <!-- Borders -->
            <div class="row align-items-center justify-content-center py-4">
                <div class="col-10 col-sm-7 col-md-6 col-lg-7 order-md-2 d-flex justify-content-end">
                    <div class="ratio" style="max-width: 668px; --fn-aspect-ratio: calc(428 / 668 * 100%)">
                        <img src="{{ asset('assets/img/intro/customizer/borders-light.jpg') }}" class="d-none-dark" alt="Borders">
                        <img src="{{ asset('assets/img/intro/customizer/borders-dark.png') }}" class="d-none d-block-dark" alt="Borders">
                    </div>
                </div>
                <div class="col-md-6 col-lg-5 order-md-1 text-center text-md-start mt-4 mt-md-0">
                    <span class="badge fs-sm bg-warning-subtle text-warning mb-3 mb-md-4">Borders</span>
                    <h2 class="h3 mb-md-4">Rounded or square? Customize borders as you wish</h2>
                    <p class="mb-0">It's up to you to make your website soft and friendly with increased border radius or add business vibes with less rounded shapes. Additionally, you can adjust the border width.</p>
                </div>
            </div>
        </section>
    </main>

    @include('layouts.partials.footer.footer')

@endsection

@push('scripts')
    <script src="{{ asset('assets/vendor/img-comparison-slider/dist/index.js') }}"></script>
    @vite(['resources/js/app.js'])
@endpush