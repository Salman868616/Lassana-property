@php $type = 'real-estate' @endphp
@extends('layouts.app')

@section('title', 'Finder | Real Estate - Property Details Page')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/vendor/glightbox/dist/css/glightbox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/flatpickr/dist/flatpickr.min.css') }}">
@endpush

@section('content')

    @include('layouts.partials.header.real-estate-header')

    <!-- Tour booking form modal -->
    <div class="modal fade" id="tourBooking" tabindex="-1" aria-labelledby="tourBookingLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="max-width: 400px">
            <form class="modal-content needs-validation" novalidate>
                <div class="modal-header border-0">
                    <h5 class="modal-title" id="tourBookingLabel">Schedule a tour</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body pb-4 pt-0">
                    <ul class="nav nav-pills nav-justified mb-4">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">In-person</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Video chat</a>
                        </li>
                    </ul>
                    <div class="vstack gap-3">
                        <div class="position-relative">
                            <i class="fi-calendar position-absolute top-50 start-0 translate-middle-y ms-3"></i>
                            <input type="text" class="form-control form-icon-start bg-transparent" data-datepicker='{"dateFormat": "M j, Y"}' placeholder="Choose date *" required>
                        </div>
                        <div class="position-relative">
                            <i class="fi-clock position-absolute top-50 start-0 translate-middle-y ms-3"></i>
                            <input type="text" class="form-control form-icon-start" id="time-12" data-datepicker='{
                                                              "enableTime": true,
                                                              "noCalendar": true,
                                                              "dateFormat": "h:i K"
                                                            }' placeholder="Choose time *" required>
                        </div>
                        <input type="text" class="form-control" placeholder="Name *" required>
                        <input type="email" class="form-control" placeholder="Email *" required>
                        <input type="tel" class="form-control" data-input-format='{"numericOnly": true, "delimiters": ["+1 ", " ", " "], "blocks": [0, 3, 3, 2]}' placeholder="Phone number">
                    </div>
                </div>
                <div class="modal-footer border-0 pt-0 pb-4 px-4">
                    <button type="submit" class="btn btn-lg btn-primary w-100 m-0 mb-3">Schedule a tour</button>
                    <p class="fs-xs m-0">This site is protected by reCAPTCHA and the Google <a class="hover-effect-underline text-decoration-none" href="#!">Privacy Policy</a> and <a class="hover-effect-underline text-decoration-none" href="#!">Terms of Service</a> apply.</p>
                </div>
            </form>
        </div>
    </div>


    <!-- Contact form modal -->
    <div class="modal fade" id="contactForm" tabindex="-1" aria-labelledby="contactFormLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="max-width: 400px">
            <form class="modal-content needs-validation" novalidate>
                <div class="modal-header border-0">
                    <h5 class="modal-title" id="contactFormLabel">Learn more about this property</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body pb-4 pt-0">
                    <p class="fs-sm">Complete this form so we can get in touch</p>
                    <div class="vstack gap-3">
                        <input type="text" class="form-control" placeholder="Name *" required>
                        <input type="email" class="form-control" placeholder="Email *" required>
                        <input type="tel" class="form-control" data-input-format='{"numericOnly": true, "delimiters": ["+1 ", " ", " "], "blocks": [0, 3, 3, 2]}' placeholder="Phone number">
                        <textarea class="form-control" rows="5" placeholder="Write your message" required></textarea>
                    </div>
                </div>
                <div class="modal-footer border-0 pt-0 pb-4 px-4">
                    <button type="submit" class="btn btn-lg btn-primary w-100 m-0 mb-3">Send message</button>
                    <p class="fs-xs m-0">This site is protected by reCAPTCHA and the Google <a class="hover-effect-underline text-decoration-none" href="#!">Privacy Policy</a> and <a class="hover-effect-underline text-decoration-none" href="#!">Terms of Service</a> apply.</p>
                </div>
            </form>
        </div>
    </div>

    <!-- Page content -->
    <main class="content-wrapper">
        <div class="container pt-4 pb-5 mb-xxl-3">

            <!-- Breadcrumb -->
            <nav class="pb-2 pb-md-3" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="home-real-estate">Home</a></li>
                    <li class="breadcrumb-item"><a href="listings-real-estate">Property for rent</a></li>
                    <li class="breadcrumb-item active" aria-current="page">67-04 Myrtle Ave Glendale, NY</li>
                </ol>
            </nav>

            <!-- Image gallery -->
            <div class="row g-3 g-lg-4">
                <div class="col-md-8">
                    <a class="hover-effect-scale hover-effect-opacity position-relative d-flex rounded overflow-hidden" href="{{ asset('assets/img/listings/real-estate/single/01.jpg') }}" data-glightbox data-gallery="image-gallery">
                        <i class="fi-zoom-in hover-effect-target fs-3 text-white position-absolute top-50 start-50 translate-middle opacity-0 z-2"></i>
                        <span class="hover-effect-target position-absolute top-0 start-0 w-100 h-100 bg-black bg-opacity-25 opacity-0 z-1"></span>
                        <div class="ratio hover-effect-target bg-body-tertiary rounded" style="--fn-aspect-ratio: calc(450 / 856 * 100%)">
                            <img src="{{ asset('assets/img/listings/real-estate/single/01.jpg') }}" alt="Image">
                        </div>
                    </a>
                </div>
                <div class="col-md-4 vstack gap-3 gap-lg-4">
                    <a class="hover-effect-scale hover-effect-opacity position-relative d-flex rounded overflow-hidden" href="{{ asset('assets/img/listings/real-estate/single/02.jpg') }}" data-glightbox data-gallery="image-gallery">
                        <i class="fi-zoom-in hover-effect-target fs-3 text-white position-absolute top-50 start-50 translate-middle opacity-0 z-2"></i>
                        <span class="hover-effect-target position-absolute top-0 start-0 w-100 h-100 bg-black bg-opacity-25 opacity-0 z-1"></span>
                        <div class="ratio hover-effect-target bg-body-tertiary rounded" style="--fn-aspect-ratio: calc(213 / 416 * 100%)">
                            <img src="{{ asset('assets/img/listings/real-estate/single/th02.jpg') }}" alt="Image">
                        </div>
                    </a>
                    <a class="hover-effect-scale hover-effect-opacity position-relative d-flex rounded overflow-hidden" href="{{ asset('assets/img/listings/real-estate/single/03.jpg') }}" data-glightbox data-gallery="image-gallery">
                        <i class="fi-zoom-in hover-effect-target fs-3 text-white position-absolute top-50 start-50 translate-middle opacity-0 z-2"></i>
                        <span class="hover-effect-target position-absolute top-0 start-0 w-100 h-100 bg-black bg-opacity-25 opacity-0 z-1"></span>
                        <div class="ratio hover-effect-target bg-body-tertiary rounded" style="--fn-aspect-ratio: calc(213 / 416 * 100%)">
                            <img src="{{ asset('assets/img/listings/real-estate/single/th03.jpg') }}" alt="Image">
                        </div>
                        <div class="btn btn-sm btn-light pe-none position-absolute end-0 bottom-0 z-2 mb-3 me-3">
                            <i class="fi-camera fs-sm me-1 ms-n1"></i>
                            24
                        </div>
                    </a>
                </div>
            </div>


            <!-- Listing details -->
            <div class="row pt-4 pb-2 pb-sm-3 pb-md-4 py-lg-5 mt-sm-2 mt-lg-0">

                <!-- Content sections -->
                <div class="col-lg-8 col-xl-7 pb-3 pb-sm-0 mb-4 mb-sm-5 mb-lg-0">

                    <!-- Badges + Sharing and wishlist buttons -->
                    <div class="d-flex align-items-center justify-content-between gap-4 mb-3">
                        <div class="d-flex gap-2">
                            <span class="badge text-bg-info d-inline-flex align-items-center">
                                Verified
                                <i class="fi-shield ms-1"></i>
                            </span>
                            <span class="badge text-bg-primary">New</span>
                        </div>
                        <div class="d-flex gap-2">
                            <div class="dropdown" data-bs-toggle="tooltip" data-bs-custom-class="tooltip-sm" title="Share">
                                <button type="button" class="btn btn-icon btn-secondary bg-transparent border-0 animate-scale" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" aria-label="Share">
                                    <i class="fi-share-2 animate-target fs-base"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end" style="--fn-dropdown-min-width: 9.5rem">
                                    <li>
                                        <a class="dropdown-item" href="#!">
                                            <i class="fi-facebook fs-base me-2"></i>
                                            Facebook
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#!">
                                            <i class="fi-instagram fs-base me-2"></i>
                                            Instagram
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <i class="fi-linkedin fs-base me-2"></i>
                                            LinkedIn
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <button type="button" class="btn btn-icon btn-secondary bg-transparent border-0 animate-pulse" data-bs-toggle="tooltip" data-bs-custom-class="tooltip-sm" title="Wishlist" aria-label="Wishlist">
                                <i class="fi-heart animate-target fs-base"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Price + Address + Facilities -->
                    <div class="h3 pb-1 mb-2">$1,170</div>
                    <p class="fs-sm pb-1 mb-2">67-04 Myrtle Ave Glendale, NY 11385</p>
                    <div class="d-flex gap-2 mb-4">
                        <div class="d-flex align-items-center fs-sm gap-1 me-2">
                            1<i class="fi-bed-single fs-base text-secondary-emphasis"></i>
                        </div>
                        <div class="d-flex align-items-center fs-sm gap-1 me-2">
                            1<i class="fi-shower fs-base text-secondary-emphasis"></i>
                        </div>
                        <div class="d-flex align-items-center fs-sm gap-1 me-2">
                            0<i class="fi-car-garage fs-base text-secondary-emphasis"></i>
                        </div>
                        <div class="fs-sm">42 sq.m</div>
                    </div>

                    <!-- Info message (Alert) -->
                    <div class="alert d-flex alert-secondary fs-sm m-0" role="alert">
                        <i class="fi-info fs-lg pe-1 me-2"></i>
                        <div>We estimate this home will sell faster than 94% nearby.</div>
                    </div>

                    <!-- About -->
                    <h2 class="h5 pt-4 pt-sm-5 mt-3 mt-sm-0">About</h2>
                    <p class="fs-sm">It offers a comfortable living area leading to a formal dining room, gorgeous hardwood floors throughout, spacious renovated Island kitchen with granite countertops and stainless steel appliances. Additionally, revel in the convenience of a master bedroom featuring a built-in dressing room, complemented by a private bath and shower for added comfort. This inviting apartment is conveniently located close to transportation hubs, ensuring easy access to the city's heartbeat.</p>

                    <!-- General info -->
                    <h2 class="h5 pt-4 pt-sm-5 mt-3 mt-sm-0">General information</h2>
                    <table class="table table-borderless w-auto fs-sm">
                        <tbody>
                            <tr>
                                <th scope="row" class="py-2 ps-0 pe-3">Property type</th>
                                <td class="text-body py-2">Apartment</td>
                            </tr>
                            <tr>
                                <th scope="row" class="py-2 ps-0 pe-3">Year built</th>
                                <td class="text-body py-2">2023</td>
                            </tr>
                            <tr>
                                <th scope="row" class="py-2 ps-0 pe-3">Living area</th>
                                <td class="text-body py-2">42 sq.m</td>
                            </tr>
                            <tr>
                                <th scope="row" class="py-2 ps-0 pe-3">Floor</th>
                                <td class="text-body py-2">3</td>
                            </tr>
                            <tr>
                                <th scope="row" class="py-2 ps-0 pe-3">Total rooms</th>
                                <td class="text-body py-2">2</td>
                            </tr>
                            <tr>
                                <th scope="row" class="py-2 ps-0 pe-3">Bedrooms</th>
                                <td class="text-body py-2">1</td>
                            </tr>
                            <tr>
                                <th scope="row" class="py-2 ps-0 pe-3">Bathrooms</th>
                                <td class="text-body py-2">1</td>
                            </tr>
                        </tbody>
                    </table>

                    <!-- Amenities -->
                    <h2 class="h5 pt-4 pt-sm-5 mt-3 mt-sm-0">Amenities</h2>
                    <div class="row row-cols-2 row-cols-sm-3 fs-sm gy-3">
                        <div class="col d-flex align-items-center">
                            <i class="fi-wifi fs-lg me-2"></i>
                            WiFi
                        </div>
                        <div class="col d-flex align-items-center">
                            <i class="fi-dishwasher fs-lg me-2"></i>
                            Dishwasher
                        </div>
                        <div class="col d-flex align-items-center">
                            <i class="fi-snowflake fs-lg me-2"></i>
                            Air conditioning
                        </div>
                        <div class="col d-flex align-items-center">
                            <i class="fi-parking fs-lg me-2"></i>
                            Parking place
                        </div>
                        <div class="col d-flex align-items-center">
                            <i class="fi-washing-machine fs-lg me-2"></i>
                            Laundry
                        </div>
                        <div class="col d-flex align-items-center">
                            <i class="fi-iron fs-lg me-2"></i>
                            Icon
                        </div>
                        <div class="col d-flex align-items-center">
                            <i class="fi-video fs-lg me-2"></i>
                            Security cameras
                        </div>
                        <div class="col d-flex align-items-center">
                            <i class="fi-no-smoking fs-lg me-2"></i>
                            No smocking
                        </div>
                        <div class="col d-flex align-items-center">
                            <i class="fi-paw fs-lg me-2"></i>
                            Pets allowed
                        </div>
                    </div>

                    <!-- Transportation -->
                    <h2 class="h5 pt-4 pt-sm-5 mt-3 mt-sm-0">Transportation</h2>
                    <div class="row row-cols-2 row-cols-sm-3 fs-sm gy-3">
                        <div class="col d-flex align-items-center">
                            <i class="fi-footprints fs-lg me-2"></i>
                            <span><span class="fw-semibold">73/100</span> Walkable</span>
                        </div>
                        <div class="col d-flex align-items-center">
                            <i class="fi-car fs-lg me-2"></i>
                            <span><span class="fw-semibold">97%</span> Driveable</span>
                        </div>
                        <div class="col d-flex align-items-center">
                            <i class="fi-bicycle fs-lg me-2"></i>
                            <span><span class="fw-semibold">59/100%</span> Bikeable</span>
                        </div>
                    </div>

                    <!-- Location -->
                    <h2 class="h5 pt-4 pt-sm-5 mt-3 mt-sm-0">Location</h2>
                    <div class="overflow-x-auto pb-3 mb-2">
                        <ul class="nav nav-pills nav-justified flex-nowrap gap-2">
                            <li class="nav-item me-1">
                                <a class="nav-link text-nowrap active" aria-current="page" href="#!">
                                    <i class="fi-tram fs-base me-2 ms-n1"></i>
                                    Transport
                                </a>
                            </li>
                            <li class="nav-item me-1">
                                <a class="nav-link text-nowrap" href="#!">
                                    <i class="fi-graduation-cap fs-base me-2 ms-n1"></i>
                                    Education
                                </a>
                            </li>
                            <li class="nav-item me-1">
                                <a class="nav-link text-nowrap" href="#!">
                                    <i class="fi-shopping-bag fs-base me-2 ms-n1"></i>
                                    Shopping
                                </a>
                            </li>
                            <li class="nav-item me-1">
                                <a class="nav-link text-nowrap" href="#!">
                                    <i class="fi-bowl-food fs-base me-2 ms-n1"></i>
                                    Food
                                </a>
                            </li>
                            <li class="nav-item me-1">
                                <a class="nav-link text-nowrap" href="#!">
                                    <i class="fi-tree fs-base me-2 ms-n1"></i>
                                    Parks
                                </a>
                            </li>
                        </ul>
                    </div>

                    <!-- Google map -->
                    <iframe class="border rounded" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2311.3724100313693!2d-73.82417211551919!3d42.62335692577899!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89dde016efd1fe73%3A0x6861561b35064fe9!2sGlendale%20Ave!5e0!3m2!1sen!2suk!4v1726842151281!5m2!1sen!2suk" width="600" height="350" style="border: 0" allowfullscreen loading="lazy" referrerpolicy="no-referrer-when-downgrade" title="Map"></iframe>

                    <!-- Meta + Sharing and wishlist buttons -->
                    <div class="d-flex align-items-center justify-content-between gap-3 pt-4">
                        <div class="d-flex gap-3 fs-sm">
                            <div>Published: <span class="fw-medium text-dark-emphasis">Sep 9, 2024</span></div>
                            <div>Views: <span class="fw-medium text-dark-emphasis">158</span></div>
                        </div>
                        <div class="d-flex gap-2">
                            <div class="dropdown" data-bs-toggle="tooltip" data-bs-custom-class="tooltip-sm" title="Share">
                                <button type="button" class="btn btn-icon btn-secondary bg-transparent border-0 animate-scale" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" aria-label="Share">
                                    <i class="fi-share-2 animate-target fs-base"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end" style="--fn-dropdown-min-width: 9.5rem">
                                    <li>
                                        <a class="dropdown-item" href="#!">
                                            <i class="fi-facebook fs-base me-2"></i>
                                            Facebook
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#!">
                                            <i class="fi-instagram fs-base me-2"></i>
                                            Instagram
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <i class="fi-linkedin fs-base me-2"></i>
                                            LinkedIn
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <button type="button" class="btn btn-icon btn-secondary bg-transparent border-0 animate-pulse" data-bs-toggle="tooltip" data-bs-custom-class="tooltip-sm" title="Wishlist" aria-label="Wishlist">
                                <i class="fi-heart animate-target fs-base"></i>
                            </button>
                        </div>
                    </div>
                </div>


                <!-- Sidebar with contact form that turns into offcanvas on screens < 992px wide (lg breakpoint) -->
                <aside class="col-lg-4 offset-xl-1">
                    <div class="d-none d-lg-block" style="margin-top: -105px"></div>
                    <div class="sticky-lg-top">
                        <div class="d-none d-lg-block" style="height: 105px"></div>
                        <div class="bg-body-tertiary rounded p-4">
                            <div class="p-sm-2 p-lg-0 p-xl-2">
                                <div class="d-flex align-items-center position-relative mb-4">
                                    <div class="ratio ratio-1x1 flex-shrink-0 bg-body-secondary rounded-circle overflow-hidden" style="width: 80px">
                                        <img src="{{ asset('assets/img/listings/real-estate/single/avatar.jpg') }}" alt="Avatar">
                                    </div>
                                    <div class="ps-4">
                                        <h5 class="mb-1">
                                            <a class="hover-effect-underline stretched-link" href="vendor-real-estate">Liza Williams</a>
                                        </h5>
                                        <p class="fs-sm mb-0">Listing agent</p>
                                    </div>
                                </div>
                                <ul class="nav flex-column gap-2 mb-4">
                                    <li class="nav-item d-flex align-items-center position-relative">
                                        <i class="fi-mail me-2"></i>
                                        <a class="nav-link hover-effect-underline stretched-link fw-normal text-body p-0" href="mailto:liza.williams@example.com">liza.williams@example.com</a>
                                    </li>
                                    <li class="nav-item d-flex align-items-center position-relative">
                                        <i class="fi-phone me-2"></i>
                                        <a class="nav-link hover-effect-underline stretched-link fw-normal text-body p-0" href="tel:745-854-4264">745&#8209;854&#8209;4264</a>
                                    </li>
                                </ul>
                                <button type="button" class="btn btn-lg btn-primary w-100" data-bs-toggle="modal" data-bs-target="#tourBooking">Schedule a tour</button>
                                <div class="fs-xs text-center pt-1 pb-2 my-2">It's free, cancel anytime</div>
                                <div class="d-flex align-items-center mb-3">
                                    <hr class="w-100 m-0">
                                    <div class="mt-n1 px-3">or</div>
                                    <hr class="w-100 m-0">
                                </div>
                                <button type="button" class="btn btn-lg btn-outline-dark w-100" data-bs-toggle="modal" data-bs-target="#contactForm">Send message</button>
                            </div>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </main>

    @include('layouts.partials.footer.real-estate-footer')

@endsection

@push('scripts')
    <script src="{{ asset('assets/vendor/glightbox/dist/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/flatpickr/dist/flatpickr.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/cleave.js/dist/cleave.min.js') }}"></script>

    @vite(['resources/js/app.js'])

@endpush