@extends('layouts.app')

@section('title', 'Finder | 404 Error - Illustration (City Guide)')

@section('content')

    <!-- Navigation bar (Page header) -->
    <header class="navbar navbar-expand-lg bg-body navbar-sticky sticky-top z-fixed px-0" data-sticky-element>
        <div class="container">

            <!-- Mobile offcanvas menu toggler (Hamburger) -->
            <button type="button" class="navbar-toggler me-3 me-lg-0" data-bs-toggle="offcanvas" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navbar brand (Logo) -->
            <a class="navbar-brand py-1 py-md-2 py-xl-1 me-2 me-sm-n4 me-md-n5 me-lg-0" href="home-city-guide">
                <span class="d-none d-sm-flex flex-shrink-0 text-primary rtl-flip me-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="34">
                        <path d="M34.5 16.894v10.731c0 3.506-2.869 6.375-6.375 6.375H17.5h-.85C7.725 33.575.5 26.138.5 17c0-9.35 7.65-17 17-17s17 7.544 17 16.894z" fill="currentColor" />
                        <g fill-rule="evenodd">
                            <path d="M17.5 13.258c-3.101 0-5.655 2.554-5.655 5.655s2.554 5.655 5.655 5.655 5.655-2.554 5.655-5.655-2.554-5.655-5.655-5.655zm-9.433 5.655c0-5.187 4.246-9.433 9.433-9.433s9.433 4.246 9.433 9.433a9.36 9.36 0 0 1-1.569 5.192l2.397 2.397a1.89 1.89 0 0 1 0 2.671 1.89 1.89 0 0 1-2.671 0l-2.397-2.397a9.36 9.36 0 0 1-5.192 1.569c-5.187 0-9.433-4.246-9.433-9.433z" fill="#000" fill-opacity=".05" />
                            <g fill="#fff">
                                <path d="M17.394 10.153c-3.723 0-6.741 3.018-6.741 6.741s3.018 6.741 6.741 6.741 6.741-3.018 6.741-6.741-3.018-6.741-6.741-6.741zM7.347 16.894A10.05 10.05 0 0 1 17.394 6.847 10.05 10.05 0 0 1 27.44 16.894 10.05 10.05 0 0 1 17.394 26.94 10.05 10.05 0 0 1 7.347 16.894z" />
                                <path d="M23.025 22.525c.645-.645 1.692-.645 2.337 0l3.188 3.188c.645.645.645 1.692 0 2.337s-1.692.645-2.337 0l-3.187-3.187c-.645-.646-.645-1.692 0-2.337z" />
                            </g>
                        </g>
                        <path d="M23.662 14.663c2.112 0 3.825-1.713 3.825-3.825s-1.713-3.825-3.825-3.825-3.825 1.713-3.825 3.825 1.713 3.825 3.825 3.825z" fill="#fff" />
                        <path fill-rule="evenodd" d="M23.663 8.429a2.41 2.41 0 0 0-2.408 2.408 2.41 2.41 0 0 0 2.408 2.408 2.41 2.41 0 0 0 2.408-2.408 2.41 2.41 0 0 0-2.408-2.408zm-5.242 2.408c0-2.895 2.347-5.242 5.242-5.242s5.242 2.347 5.242 5.242-2.347 5.242-5.242 5.242-5.242-2.347-5.242-5.242z" fill="currentColor" />
                    </svg>
                </span>
                Finder
            </a>

            <!-- Main navigation that turns into offcanvas on screens < 992px wide (lg breakpoint) -->
            <nav class="offcanvas offcanvas-start" id="navbarNav" tabindex="-1" aria-labelledby="navbarNavLabel">
                <div class="offcanvas-header py-3">
                    <h5 class="offcanvas-title" id="navbarNavLabel">Browse Finder</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body pt-2 pb-4 py-lg-0 mx-lg-auto">
                    <ul class="navbar-nav position-relative">
                        <li class="nav-item dropdown py-lg-2 me-lg-n1 me-xl-0">
                            <a class="nav-link dropdown-toggle rounded-pill" href="#" role="button" data-bs-toggle="dropdown" data-bs-trigger="hover" aria-expanded="false">Home</a>
                            <ul class="dropdown-menu">
                                <li class="hover-effect-opacity px-2 mx-n2">
                                    <a class="dropdown-item d-block rounded-pill mb-0" href="home-real-estate">
                                        <span class="fw-medium">Real Estate</span>
                                        <span class="d-block fs-xs text-body-secondary">Property listings directory</span>
                                        <div class="d-none d-lg-block hover-effect-target position-absolute top-0 start-100 bg-body border border-light-subtle rounded rounded-start-0 transition-none invisible opacity-0 pt-2 px-2 ms-n2" style="width: 212px; height: calc(100% + 2px); margin-top: -1px">
                                            <img class="position-relative z-2 d-none-dark" src="{{ asset('assets/img/mega-menu/real-estate-light.jpg') }}" alt="Real Estate Demo">
                                            <img class="position-relative z-2 d-none d-block-dark" src="{{ asset('assets/img/mega-menu/real-estate-dark.jpg') }}" alt="Real Estate Demo">
                                            <span class="position-absolute top-0 start-0 w-100 h-100 rounded rounded-start-0 d-none-dark" style="box-shadow: .875rem .5rem 2rem -.5rem #676f7b; opacity: .1"></span>
                                            <span class="position-absolute top-0 start-0 w-100 h-100 rounded rounded-start-0 d-none d-block-dark" style="box-shadow: .875rem .5rem 1.875rem -.5rem #080b12; opacity: .25"></span>
                                        </div>
                                    </a>
                                </li>
                                <li class="hover-effect-opacity px-2 mx-n2">
                                    <a class="dropdown-item d-block rounded-pill mb-0" href="home-cars">
                                        <span class="fw-medium">Cars</span>
                                        <span class="d-block fs-xs text-body-secondary">Vehicle sales listings</span>
                                        <div class="d-none d-lg-block hover-effect-target position-absolute top-0 start-100 bg-body border border-light-subtle rounded rounded-start-0 transition-none invisible opacity-0 pt-2 px-2 ms-n2" style="width: 212px; height: calc(100% + 2px); margin-top: -1px">
                                            <img class="position-relative z-2 d-none-dark" src="{{ asset('assets/img/mega-menu/cars-light.jpg') }}" alt="Cars Demo">
                                            <img class="position-relative z-2 d-none d-block-dark" src="{{ asset('assets/img/mega-menu/cars-dark.jpg') }}" alt="Cars Demo">
                                            <span class="position-absolute top-0 start-0 w-100 h-100 rounded rounded-start-0 d-none-dark" style="box-shadow: .875rem .5rem 2rem -.5rem #676f7b; opacity: .1"></span>
                                            <span class="position-absolute top-0 start-0 w-100 h-100 rounded rounded-start-0 d-none d-block-dark" style="box-shadow: .875rem .5rem 1.875rem -.5rem #080b12; opacity: .25"></span>
                                        </div>
                                    </a>
                                </li>
                                <li class="hover-effect-opacity px-2 mx-n2">
                                    <a class="dropdown-item d-block rounded-pill mb-0" href="home-contractors">
                                        <span class="fw-medium">Contractors</span>
                                        <span class="d-block fs-xs text-body-secondary">Professional services directory</span>
                                        <div class="d-none d-lg-block hover-effect-target position-absolute top-0 start-100 bg-body border border-light-subtle rounded rounded-start-0 transition-none invisible opacity-0 pt-2 px-2 ms-n2" style="width: 212px; height: calc(100% + 2px); margin-top: -1px">
                                            <img class="position-relative z-2 d-none-dark" src="{{ asset('assets/img/mega-menu/contractors-light.jpg') }}" alt="Contractors Demo">
                                            <img class="position-relative z-2 d-none d-block-dark" src="{{ asset('assets/img/mega-menu/contractors-dark.jpg') }}" alt="Contractors Demo">
                                            <span class="position-absolute top-0 start-0 w-100 h-100 rounded rounded-start-0 d-none-dark" style="box-shadow: .875rem .5rem 2rem -.5rem #676f7b; opacity: .1"></span>
                                            <span class="position-absolute top-0 start-0 w-100 h-100 rounded rounded-start-0 d-none d-block-dark" style="box-shadow: .875rem .5rem 1.875rem -.5rem #080b12; opacity: .25"></span>
                                        </div>
                                    </a>
                                </li>
                                <li class="hover-effect-opacity px-2 mx-n2">
                                    <a class="dropdown-item d-block rounded-pill mb-0" href="home-doctors">
                                        <span class="fw-medium">Doctors</span>
                                        <span class="d-block fs-xs text-body-secondary">Medical professionals listings</span>
                                        <div class="d-none d-lg-block hover-effect-target position-absolute top-0 start-100 bg-body border border-light-subtle rounded rounded-start-0 transition-none invisible opacity-0 pt-2 px-2 ms-n2" style="width: 212px; height: calc(100% + 2px); margin-top: -1px">
                                            <img class="position-relative z-2 d-none-dark" src="{{ asset('assets/img/mega-menu/doctors-light.jpg') }}" alt="Doctors Demo">
                                            <img class="position-relative z-2 d-none d-block-dark" src="{{ asset('assets/img/mega-menu/doctors-dark.jpg') }}" alt="Doctors Demo">
                                            <span class="position-absolute top-0 start-0 w-100 h-100 rounded rounded-start-0 d-none-dark" style="box-shadow: .875rem .5rem 2rem -.5rem #676f7b; opacity: .1"></span>
                                            <span class="position-absolute top-0 start-0 w-100 h-100 rounded rounded-start-0 d-none d-block-dark" style="box-shadow: .875rem .5rem 1.875rem -.5rem #080b12; opacity: .25"></span>
                                        </div>
                                    </a>
                                </li>
                                <li class="hover-effect-opacity px-2 mx-n2">
                                    <a class="dropdown-item d-block rounded-pill mb-0" href="home-events">
                                        <span class="fw-medium">Events</span>
                                        <span class="d-block fs-xs text-body-secondary">Upcoming events listings</span>
                                        <div class="d-none d-lg-block hover-effect-target position-absolute top-0 start-100 bg-body border border-light-subtle rounded rounded-start-0 transition-none invisible opacity-0 pt-2 px-2 ms-n2" style="width: 212px; height: calc(100% + 2px); margin-top: -1px">
                                            <img class="position-relative z-2 d-none-dark" src="{{ asset('assets/img/mega-menu/events-light.jpg') }}" alt="Events Demo">
                                            <img class="position-relative z-2 d-none d-block-dark" src="{{ asset('assets/img/mega-menu/events-dark.jpg') }}" alt="Events Demo">
                                            <span class="position-absolute top-0 start-0 w-100 h-100 rounded rounded-start-0 d-none-dark" style="box-shadow: .875rem .5rem 2rem -.5rem #676f7b; opacity: .1"></span>
                                            <span class="position-absolute top-0 start-0 w-100 h-100 rounded rounded-start-0 d-none d-block-dark" style="box-shadow: .875rem .5rem 1.875rem -.5rem #080b12; opacity: .25"></span>
                                        </div>
                                    </a>
                                </li>
                                <li class="hover-effect-opacity px-2 mx-n2">
                                    <a class="dropdown-item d-block rounded-pill mb-0" href="home-city-guide">
                                        <span class="fw-medium">City Guide</span>
                                        <span class="d-block fs-xs text-body-secondary">Local places directory</span>
                                        <div class="d-none d-lg-block hover-effect-target position-absolute top-0 start-100 bg-body border border-light-subtle rounded rounded-start-0 transition-none invisible opacity-0 pt-2 px-2 ms-n2" style="width: 212px; height: calc(100% + 2px); margin-top: -1px">
                                            <img class="position-relative z-2 d-none-dark" src="{{ asset('assets/img/mega-menu/city-guide-light.jpg') }}" alt="City Guide Demo">
                                            <img class="position-relative z-2 d-none d-block-dark" src="{{ asset('assets/img/mega-menu/city-guide-dark.jpg') }}" alt="City Guide Demo">
                                            <span class="position-absolute top-0 start-0 w-100 h-100 rounded rounded-start-0 d-none-dark" style="box-shadow: .875rem .5rem 2rem -.5rem #676f7b; opacity: .1"></span>
                                            <span class="position-absolute top-0 start-0 w-100 h-100 rounded rounded-start-0 d-none d-block-dark" style="box-shadow: .875rem .5rem 1.875rem -.5rem #080b12; opacity: .25"></span>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown position-static py-lg-2 me-lg-n1 me-xl-0">
                            <a class="nav-link dropdown-toggle rounded-pill" href="#" role="button" data-bs-toggle="dropdown" data-bs-trigger="hover" aria-expanded="false">Listings</a>
                            <div class="dropdown-menu rounded-4 p-4">
                                <div class="d-flex flex-column flex-lg-row gap-4">
                                    <div style="min-width: 190px">
                                        <div class="h6 mb-2">Real Estate</div>
                                        <ul class="nav flex-column gap-2 mt-0">
                                            <li class="pt-1">
                                                <a class="nav-link hover-effect-underline d-inline fw-normal p-0" href="listings-real-estate">Map/Listings Split View</a>
                                            </li>
                                            <li class="pt-1">
                                                <a class="nav-link hover-effect-underline d-inline fw-normal p-0" href="single-entry-real-estate">Property Details Page</a>
                                            </li>
                                            <li class="pt-1">
                                                <a class="nav-link hover-effect-underline d-inline fw-normal p-0" href="vendor-real-estate">Vendor Page</a>
                                            </li>
                                        </ul>
                                        <div class="h6 pt-4 mb-2">Cars</div>
                                        <ul class="nav flex-column gap-2 mt-0">
                                            <li class="pt-1">
                                                <a class="nav-link hover-effect-underline d-inline fw-normal p-0" href="listings-grid-cars">Listings Grid View</a>
                                            </li>
                                            <li class="pt-1">
                                                <a class="nav-link hover-effect-underline d-inline fw-normal p-0" href="listings-list-cars">Listings List View</a>
                                            </li>
                                            <li class="pt-1">
                                                <a class="nav-link hover-effect-underline d-inline fw-normal p-0" href="single-entry-cars">Car Details Page</a>
                                            </li>
                                        </ul>
                                        <div class="h6 pt-4 mb-2">Contractors</div>
                                        <ul class="nav flex-column gap-2 mt-0">
                                            <li class="pt-1">
                                                <a class="nav-link hover-effect-underline d-inline fw-normal p-0" href="listings-contractors">Listings with Side Filters</a>
                                            </li>
                                            <li class="pt-1">
                                                <a class="nav-link hover-effect-underline d-inline fw-normal p-0" href="single-entry-contractors">Contractor Details Page</a>
                                            </li>
                                        </ul>
                                        <div class="h6 pt-4 mb-2">Doctors</div>
                                        <ul class="nav flex-column gap-2 mt-0">
                                            <li class="pt-1">
                                                <a class="nav-link hover-effect-underline d-inline fw-normal p-0" href="listings-list-doctors">Listings List View</a>
                                            </li>
                                            <li class="pt-1">
                                                <a class="nav-link hover-effect-underline d-inline fw-normal p-0" href="listings-grid-doctors">Listings Grid View</a>
                                            </li>
                                            <li class="pt-1">
                                                <a class="nav-link hover-effect-underline d-inline fw-normal p-0" href="single-entry-doctors">Doctor Details Page</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div style="min-width: 190px">
                                        <div class="h6 mb-2">Events</div>
                                        <ul class="nav flex-column gap-2 mt-0">
                                            <li class="pt-1">
                                                <a class="nav-link hover-effect-underline d-inline fw-normal p-0" href="listings-events">Listings with Top Filters</a>
                                            </li>
                                            <li class="pt-1">
                                                <a class="nav-link hover-effect-underline d-inline fw-normal p-0" href="single-entry-events">Event Details Page</a>
                                            </li>
                                        </ul>
                                        <div class="h6 pt-4 mb-2">City Guide</div>
                                        <ul class="nav flex-column gap-2 mt-0">
                                            <li class="pt-1">
                                                <a class="nav-link hover-effect-underline d-inline fw-normal p-0" href="listings-side-filters-city-guide">Listings with Side Filters</a>
                                            </li>
                                            <li class="pt-1">
                                                <a class="nav-link hover-effect-underline d-inline fw-normal p-0" href="listings-top-filters-city-guide">Listings with Top Filters</a>
                                            </li>
                                            <li class="pt-1">
                                                <a class="nav-link hover-effect-underline d-inline fw-normal p-0" href="single-entry-city-guide">Place Details Page</a>
                                            </li>
                                        </ul>
                                        <div class="h6 pt-4 mb-2">Add Property</div>
                                        <ul class="nav flex-column gap-2 mt-0">
                                            <li class="pt-1">
                                                <a class="nav-link hover-effect-underline d-inline fw-normal p-0" href="add-property-type">Property type</a>
                                            </li>
                                            <li class="pt-1">
                                                <a class="nav-link hover-effect-underline d-inline fw-normal p-0" href="add-property-location">Location</a>
                                            </li>
                                            <li class="pt-1">
                                                <a class="nav-link hover-effect-underline d-inline fw-normal p-0" href="add-property-photos">Photos and Videos</a>
                                            </li>
                                            <li class="pt-1">
                                                <a class="nav-link hover-effect-underline d-inline fw-normal p-0" href="add-property-details">Property Details</a>
                                            </li>
                                            <li class="pt-1">
                                                <a class="nav-link hover-effect-underline d-inline fw-normal p-0" href="add-property-price">Price</a>
                                            </li>
                                            <li class="pt-1">
                                                <a class="nav-link hover-effect-underline d-inline fw-normal p-0" href="add-property-contact-info">Contact Info</a>
                                            </li>
                                            <li class="pt-1">
                                                <a class="nav-link hover-effect-underline d-inline fw-normal p-0" href="add-property-promotion">Ad Promotion</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div style="min-width: 190px">
                                        <div class="h6 mb-2">Add Contractor</div>
                                        <ul class="nav flex-column gap-2 mt-0">
                                            <li class="pt-1">
                                                <a class="nav-link hover-effect-underline d-inline fw-normal p-0" href="add-contractor-location">Business Location</a>
                                            </li>
                                            <li class="pt-1">
                                                <a class="nav-link hover-effect-underline d-inline fw-normal p-0" href="add-contractor-services">Choose Services</a>
                                            </li>
                                            <li class="pt-1">
                                                <a class="nav-link hover-effect-underline d-inline fw-normal p-0" href="add-contractor-profile">Profile Details</a>
                                            </li>
                                            <li class="pt-1">
                                                <a class="nav-link hover-effect-underline d-inline fw-normal p-0" href="add-contractor-price-hours">Price and Hours</a>
                                            </li>
                                            <li class="pt-1">
                                                <a class="nav-link hover-effect-underline d-inline fw-normal p-0" href="add-contractor-project">Create First Project</a>
                                            </li>
                                        </ul>
                                        <div class="h6 pt-4 mb-2">Add (Sell) Car</div>
                                        <ul class="nav flex-column gap-2 mt-0">
                                            <li class="pt-1">
                                                <a class="nav-link hover-effect-underline d-inline fw-normal p-0" href="add-car">Add (Sell) Car Page</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item dropdown py-lg-2 me-lg-n1 me-xl-0">
                            <a class="nav-link dropdown-toggle rounded-pill" href="#" role="button" data-bs-toggle="dropdown" data-bs-trigger="hover" data-bs-auto-close="outside" aria-expanded="false">Account</a>
                            <ul class="dropdown-menu">
                                <li class="dropend">
                                    <a class="dropdown-item dropdown-toggle rounded-pill" href="#" role="button" data-bs-toggle="dropdown" data-bs-trigger="hover" aria-expanded="false">Auth Pages</a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item rounded-pill" href="account-signin">Sign In</a></li>
                                        <li><a class="dropdown-item rounded-pill" href="account-signup">Sign Up</a></li>
                                        <li><a class="dropdown-item rounded-pill" href="account-password-recovery">Password Recovery</a></li>
                                    </ul>
                                </li>
                                <li><a class="dropdown-item rounded-pill" href="account-profile">My Profile</a></li>
                                <li><a class="dropdown-item rounded-pill" href="account-listings">My Listings</a></li>
                                <li><a class="dropdown-item rounded-pill" href="account-reviews">Reviews</a></li>
                                <li><a class="dropdown-item rounded-pill" href="account-favorites">Favorites</a></li>
                                <li><a class="dropdown-item rounded-pill" href="account-payment">Payment Details</a></li>
                                <li><a class="dropdown-item rounded-pill" href="account-settings">Account Settings</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown py-lg-2 me-lg-n1 me-xl-0">
                            <a class="nav-link dropdown-toggle rounded-pill active" aria-current="page" href="#" role="button" data-bs-toggle="dropdown" data-bs-trigger="hover" data-bs-auto-close="outside" aria-expanded="false">Pages</a>
                            <ul class="dropdown-menu">
                                <li class="dropend">
                                    <a class="dropdown-item dropdown-toggle rounded-pill" href="#!" role="button" data-bs-toggle="dropdown" data-bs-trigger="hover" aria-expanded="false">About</a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item rounded-pill" href="about-v1">About v.1</a></li>
                                        <li><a class="dropdown-item rounded-pill" href="about-v2">About v.2</a></li>
                                    </ul>
                                </li>
                                <li class="dropend">
                                    <a class="dropdown-item dropdown-toggle rounded-pill" href="#" role="button" data-bs-toggle="dropdown" data-bs-trigger="hover" aria-expanded="false">Blog</a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item rounded-pill" href="blog-layout-v1">Blog Layout v.1</a></li>
                                        <li><a class="dropdown-item rounded-pill" href="blog-layout-v2">Blog Layout v.2</a></li>
                                        <li><a class="dropdown-item rounded-pill" href="blog-layout-v3">Blog Layout v.3</a></li>
                                        <li><a class="dropdown-item rounded-pill" href="blog-layout-v4">Blog Layout v.4</a></li>
                                        <li><a class="dropdown-item rounded-pill" href="blog-single-v1">Single Post v.1</a></li>
                                        <li><a class="dropdown-item rounded-pill" href="blog-single-v2">Single Post v.2</a></li>
                                        <li><a class="dropdown-item rounded-pill" href="blog-single-v3">Single Post v.3</a></li>
                                    </ul>
                                </li>
                                <li class="dropend">
                                    <a class="dropdown-item dropdown-toggle rounded-pill" href="#" role="button" data-bs-toggle="dropdown" data-bs-trigger="hover" aria-expanded="false">Contact</a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item rounded-pill" href="contact-v1">Contact v.1</a></li>
                                        <li><a class="dropdown-item rounded-pill" href="contact-v2">Contact v.2</a></li>
                                        <li><a class="dropdown-item rounded-pill" href="contact-v3">Contact v.3</a></li>
                                    </ul>
                                </li>
                                <li class="dropend">
                                    <a class="dropdown-item dropdown-toggle rounded-pill" href="#" role="button" data-bs-toggle="dropdown" data-bs-trigger="hover" aria-expanded="false">Help Center</a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item rounded-pill" href="help-topics-v1">Help Topics v.1</a></li>
                                        <li><a class="dropdown-item rounded-pill" href="help-topics-v2">Help Topics v.2</a></li>
                                        <li><a class="dropdown-item rounded-pill" href="help-topics-v3">Help Topics v.3</a></li>
                                        <li><a class="dropdown-item rounded-pill" href="help-single-article-v1">Help Single Article v.1</a></li>
                                        <li><a class="dropdown-item rounded-pill" href="help-single-article-v2">Help Single Article v.2</a></li>
                                        <li><a class="dropdown-item rounded-pill" href="help-single-article-v3">Help Single Article v.3</a></li>
                                    </ul>
                                </li>
                                <li class="dropend">
                                    <a class="dropdown-item dropdown-toggle rounded-pill" href="#" role="button" data-bs-toggle="dropdown" data-bs-trigger="hover" aria-expanded="false">404 Error</a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item rounded-pill" href="404-bg-image">Background Image (Real Estate)</a></li>
                                        <li><a class="dropdown-item rounded-pill" href="404-icon">Icon Image (Cars)</a></li>
                                        <li><a class="dropdown-item rounded-pill" href="404-split-screen">Split Screen (Contractors)</a></li>
                                        <li><a class="dropdown-item rounded-pill" href="404-illustration">Illustration (City Guide)</a></li>
                                    </ul>
                                </li>
                                <li><a class="dropdown-item rounded-pill" href="terms-and-conditions">Terms &amp; Conditions</a></li>
                            </ul>
                        </li>
                        <li class="nav-item py-lg-2 me-lg-n2 me-xl-0">
                            <a class="nav-link rounded-pill" href="docs/installation">Docs</a>
                        </li>
                        <li class="nav-item py-lg-2 me-lg-n2 me-xl-0">
                            <a class="nav-link rounded-pill" href="docs/typography">Components</a>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Button group -->
            <div class="d-flex gap-sm-1">

                <!-- Theme switcher (light/dark/auto) -->
                <div class="dropdown">
                    <button type="button" class="theme-switcher btn btn-icon btn-outline-secondary fs-lg border-0 animate-scale" data-bs-toggle="dropdown" data-bs-display="dynamic" aria-expanded="false" aria-label="Toggle theme (light)">
                        <span class="theme-icon-active d-flex animate-target">
                            <i class="fi-sun"></i>
                        </span>
                    </button>
                    <ul class="dropdown-menu start-50 translate-middle-x" style="--fn-dropdown-min-width: 9rem; --fn-dropdown-spacer: .5rem">
                        <li>
                            <button type="button" class="dropdown-item active" data-bs-theme-value="light" aria-pressed="true">
                                <span class="theme-icon d-flex fs-base me-2">
                                    <i class="fi-sun"></i>
                                </span>
                                <span class="theme-label">Light</span>
                                <i class="item-active-indicator fi-check ms-auto"></i>
                            </button>
                        </li>
                        <li>
                            <button type="button" class="dropdown-item" data-bs-theme-value="dark" aria-pressed="false">
                                <span class="theme-icon d-flex fs-base me-2">
                                    <i class="fi-moon"></i>
                                </span>
                                <span class="theme-label">Dark</span>
                                <i class="item-active-indicator fi-check ms-auto"></i>
                            </button>
                        </li>
                        <li>
                            <button type="button" class="dropdown-item" data-bs-theme-value="auto" aria-pressed="false">
                                <span class="theme-icon d-flex fs-base me-2">
                                    <i class="fi-auto"></i>
                                </span>
                                <span class="theme-label">Auto</span>
                                <i class="item-active-indicator fi-check ms-auto"></i>
                            </button>
                        </li>
                    </ul>
                </div>

                <!-- Account button -->
                <a class="btn btn-icon btn-outline-secondary fs-lg border-0 animate-shake me-2" href="account-signin" aria-label="Sign in to account">
                    <i class="fi-user animate-target"></i>
                </a>

                <!-- Add business button  -->
                <a class="btn btn-primary animate-scale rounded-pill" href="#!">
                    <i class="fi-plus fs-lg animate-target ms-n2 me-1 me-sm-2"></i>
                    Add<span class="d-none d-xl-inline ms-1">business</span>
                </a>
            </div>
        </div>
    </header>


    <!-- Page content -->
    <main class="content-wrapper position-relative overflow-hidden">
        <div class="container position-relative z-2 pt-4 pt-sm-5 pb-5 mt-3 mt-sm-0 mt-md-4">
            <div class="row align-items-center justify-content-center">
                <div class="col-8 col-sm-7 col-md-6 col-lg-7 pb-3 pb-md-0 mb-4 mb-md-0">
                    <svg xmlns="http://www.w3.org/2000/svg" width="663" viewBox="0 0 663 825" fill="none">
                        <style>
                            <![CDATA[
                            .B {
                                fill: #fff
                            }

                            [data-bs-theme="dark"] .B {
                                fill: #e0e5eb
                            }

                            .C {
                                stroke-linecap: round
                            }

                            .D {
                                stroke-width: .947
                            }

                            .E {
                                stroke-miterlimit: 10
                            }

                            .F {
                                stroke-linejoin: round
                            }

                            .G {
                                stroke: #1f2937
                            }

                            .H {
                                fill: #1f2937
                            }

                            .I {
                                stroke: #fff
                            }

                            .J {
                                fill: var(--fn-info)
                            }
                            ]]>
                        </style>
                        <path d="M189.158 159.341h-40.964C108.337 159.341 76 127.004 76 87.127V73.214C76 33.337 108.337 1 148.214 1h40.964c39.878 0 72.215 32.337 72.215 72.214v13.912c-.021 39.877-32.358 72.214-72.235 72.214z" class="B D E F I" />
                        <path d="M122.301 90.864v-5.812l14.574-22.96h5.011v8.045h-2.966l-9.187 14.54v.273h20.71v5.915h-28.142zM139.057 97v-7.909l.136-2.574V62.091h6.921V97h-7.057zm29.991.767c-2.932-.011-5.454-.733-7.568-2.165-2.102-1.432-3.721-3.506-4.858-6.222-1.125-2.716-1.682-5.983-1.67-9.801 0-3.807.562-7.051 1.687-9.733 1.137-2.682 2.756-4.722 4.858-6.119 2.114-1.409 4.631-2.114 7.551-2.114s5.432.705 7.534 2.114c2.114 1.409 3.739 3.454 4.875 6.136 1.137 2.67 1.699 5.909 1.688 9.716 0 3.83-.568 7.102-1.705 9.818-1.125 2.716-2.738 4.79-4.841 6.222s-4.619 2.148-7.551 2.148zm0-6.119c2 0 3.597-1.006 4.79-3.017s1.784-5.028 1.773-9.051c0-2.648-.273-4.852-.818-6.614-.534-1.761-1.296-3.085-2.284-3.972a4.98 4.98 0 0 0-3.461-1.329c-1.988 0-3.579.994-4.772 2.983s-1.796 4.966-1.807 8.932c0 2.682.267 4.921.801 6.716.545 1.784 1.312 3.125 2.301 4.023a5.04 5.04 0 0 0 3.477 1.329zm18.831-.784v-5.812l14.574-22.96h5.011v8.045h-2.965l-9.188 14.54v.273h20.71v5.915h-28.142zM204.635 97v-7.909l.136-2.574V62.091h6.921V97h-7.057z" class="H" />
                        <g class="B">
                            <path d="M261.374 166.318c9.864 0 17.86-7.996 17.86-17.86s-7.996-17.861-17.86-17.861-17.86 7.997-17.86 17.861 7.996 17.86 17.86 17.86zm30.057 7.123c6.149 0 11.134-4.984 11.134-11.134s-4.985-11.134-11.134-11.134-11.134 4.985-11.134 11.134 4.985 11.134 11.134 11.134zm21.517-7.394a6.71 6.71 0 0 0 6.705-6.706c0-3.703-3.002-6.705-6.705-6.705a6.71 6.71 0 0 0-6.706 6.705 6.71 6.71 0 0 0 6.706 6.706z" class="D E F I" />
                            <path d="M217.384 388.077c-8.197-6.281-9.736-17.996-3.455-26.193l55.842-76.414c6.282-8.197 17.997-9.736 26.194-3.455s9.736 17.997 3.455 26.194l-55.842 76.414c-6.313 8.165-18.028 9.736-26.194 3.454z" class="D E F G" />
                            <path d="M272.975 307.204c-7.192-7.381-7.067-19.19.314-26.414l67.777-69.252c7.381-7.193 19.19-7.067 26.413.345 7.193 7.381 7.067 19.19-.314 26.413l-67.776 69.253c-7.413 7.193-19.222 7.036-26.414-.345z" />
                        </g>
                        <g class="D E F G">
                            <path d="M298.73 308.931l1.696-2.481 66.709-68.185a18.67 18.67 0 0 0 .314-26.414c-7.193-7.38-19.033-7.537-26.414-.345l-67.745 69.316a18.37 18.37 0 0 0-3.015 3.831l-1.822 2.607m6.598 1.79c.251 3.581 2.355 6.973 5.842 8.637 3.486 1.696 7.412 1.288 10.427-.753" class="C" />
                            <path d="M63.196 808.076c9.453-8.812 10.903-22.621 3.238-30.843s-21.541-7.744-30.994 1.068-10.902 22.62-3.238 30.843 21.541 7.744 30.994-1.068z" class="H" />
                            <g class="C">
                                <path d="M122.029 504.064l17.117-85.208c2.167-10.113 11.118-17.368 21.451-17.368h65.798c11.935 0 20.855 11.024 18.342 22.708l-16.583 82.632" />
                                <path d="M139.146 418.856c2.168-10.113 11.119-17.368 21.452-17.368h65.798c11.934 0 20.854 11.024 18.342 22.708" />
                            </g>
                            <path d="M172.44 808.088c9.453-8.812 10.903-22.621 3.238-30.843s-21.541-7.744-30.994 1.068-10.902 22.62-3.238 30.842 21.541 7.744 30.994-1.067z" class="H" />
                            <path d="M195.184 793.168H68.142c-16.677 0-29.146-15.39-25.628-31.722l49.906-233.261c4.052-18.939 20.76-32.444 40.139-32.444h115.044c16.678 0 29.146 15.39 25.629 31.722l-52.419 244.976a26.19 26.19 0 0 1-25.628 20.729z" class="B" />
                            <path d="M147.726 793.168H30.577c-16.677 0-29.146-15.39-25.628-31.722l49.906-233.261c4.051-18.939 20.76-32.444 40.138-32.444h112.124c9.391 0 16.363 8.637 14.416 17.808l-56.91 265.957c-1.727 7.977-8.763 13.662-16.897 13.662z" class="J" />
                            <path d="M120.869 771.654H22.815c-13.976 0-24.403-12.877-21.483-26.539l41.803-195.322c3.392-15.829 17.4-27.167 33.606-27.167h93.876c7.852 0 13.693 7.224 12.06 14.918L135.033 760.19c-1.444 6.69-7.349 11.464-14.164 11.464z" class="B" />
                        </g>
                        <path d="M215.249 366.501l24.215 8.197c5.434 1.853 7.915 8.166 5.151 13.191l-1.068 1.916c-4.899 8.919-15.044 13.599-25 11.495l-44.881-9.422 1.665-8.26c1.224-5.999 5.621-10.867 11.526-12.626l15.955-4.774a21 21 0 0 1 12.437.283z" class="B" />
                        <path d="M173.666 391.94l1.665-8.26c1.224-5.998 5.621-10.867 11.526-12.625l15.955-4.774a20.53 20.53 0 0 1 10.678-.283m29.773 11.181c2.607 2.795 3.298 7.098 1.319 10.741l-1.068 1.916c-4.899 8.92-15.044 13.6-25 11.495l-3.203-.659" class="C D E F G" />
                        <g class="B">
                            <path d="M174.732 414.711c-2.889-.597-4.742-3.424-4.146-6.282l3.455-18.279 10.427 2.136-3.454 18.279c-.597 2.889-3.424 4.742-6.282 4.146z" />
                            <path d="M185.189 416.689c-2.889-.596-4.742-3.423-4.146-6.281l3.392-18.091 10.742 2.167-3.738 18.06c-.565 2.858-3.36 4.711-6.25 4.145z" />
                            <path d="M195.588 418.856c-2.89-.596-4.743-3.423-4.146-6.281l3.769-18.091 10.49 2.042-3.832 18.185c-.597 2.858-3.423 4.711-6.281 4.145z" />
                            <path d="M218.639 412.041c.66 2.858-1.13 5.716-3.988 6.376l-6.125 1.413c-2.858.66-5.747-1.131-6.407-3.989s1.131-5.716 3.989-6.375l6.156-1.445c2.858-.628 5.716 1.162 6.375 4.02z" class="D E F G" />
                            <path d="M206.203 419.861c-2.89-.596-4.743-3.423-4.146-6.281l3.612-17.086 10.427 2.136-3.612 17.086c-.565 2.889-3.392 4.742-6.281 4.145z" />
                        </g>
                        <g class="D E F G">
                            <g class="C">
                                <path d="M184.468 392.286l-3.454 18.279c-.597 2.889-3.424 4.742-6.282 4.146-2.889-.597-4.742-3.424-4.146-6.282l3.455-18.279" />
                                <path d="M195.208 394.453l-3.737 18.059c-.597 2.89-3.424 4.743-6.282 4.146-2.889-.597-4.742-3.423-4.146-6.282l3.392-18.09" />
                                <path d="M205.701 396.526l-3.832 18.185c-.597 2.889-3.423 4.742-6.281 4.145-2.89-.596-4.743-3.423-4.146-6.281l3.769-18.091" />
                                <path d="M205.669 396.526l-3.612 17.085c-.597 2.89 1.256 5.685 4.146 6.282.408.094.816.125 1.193.094 0 0 1.131.032 3.643-.722m5.056-20.603l-2.89 13.725" />
                            </g>
                            <path d="M436.705 139.709s3.863 10.521 5.339 16.834c.188.785-.314 1.602-1.131 1.728-1.476.282-6.061.408-6.061.408l1.005-18.53.848-.44z" class="B" />
                        </g>
                        <path d="M419.872 185.752c11.118-.817 19.473-10.521 18.656-21.64l-2.889-38.787c-1.1-14.542-13.757-25.44-28.298-24.341S381.901 114.74 383 129.282l1.979 26.413c1.319 17.965 16.96 31.408 34.893 30.057z" class="B" />
                        <g class="D E F G">
                            <path d="M437.933 156.48l.566 7.632c.816 11.119-7.507 20.823-18.656 21.64-17.934 1.351-33.574-12.123-34.925-30.057l-1.979-26.413c-1.099-14.542 9.831-27.199 24.341-28.298 14.542-1.099 27.199 9.83 28.298 24.341l1.099 14.478.628 1.696" class="C" />
                            <path d="M414.689 179.785v5.936c1.696.157 3.455.157 5.214.031 3.047-.22 5.873-1.131 8.354-2.513l-13.568-3.454z" class="H" />
                        </g>
                        <path d="M394.304 211.6h11.212c5.057 0 9.171-4.114 9.171-9.171v-40.546c0-5.057-4.114-9.171-9.171-9.171h-11.212c-5.057 0-9.171 4.114-9.171 9.171v40.546c0 5.057 4.083 9.171 9.171 9.171z" class="B" />
                        <g class="D E F G">
                            <path d="M405.516 152.68h-11.212c-5.057 0-9.171 4.115-9.171 9.171v40.547c0 5.056 4.114 9.171 9.171 9.171h11.212c5.057 0 9.171-4.115 9.171-9.171v-24.906" class="C" />
                            <g class="H">
                                <path d="M438.905 126.298c0-16.551-13.411-29.962-29.963-29.962h-3.706c-25.22 0-45.666 20.446-45.666 45.666v18.75c0 6.878 5.591 12.469 12.469 12.469h37.626c2.921 0 5.308-2.387 5.308-5.308v-35.805s1.036-1.224 3.14-3.454c4.492-4.774 4.711-12.72 4.711-12.72 1.351 3.517-2.324 15.986-2.324 15.986 2.796-2.167 5.559-15.609 5.559-15.609.629 2.826-.91 10.176-1.758 13.756-.252 1.036.565 2.041 1.633 2.041h11.432c.817 0 1.508-.659 1.508-1.507v-4.303h.031z" />
                                <path d="M411.332 149.759l6.627-4.271-1.288-17.18-6.909.534 1.57 20.917z" />
                            </g>
                        </g>
                        <path d="M410.383 157.454l3.957 1.445c4.743 1.821 9.768-1.916 9.391-6.973-.188-2.669-1.916-4.993-4.397-5.936l-3.957-1.444c-4.743-1.822-9.642 2.198-9.234 7.286.188 2.67 1.727 4.68 4.24 5.622z" class="B" />
                        <g class="D E F">
                            <g class="G">
                                <g class="C">
                                    <path d="M419.586 146.116c-.095-.031-.189-.063-.283-.126l-3.957-1.444c-4.743-1.822-9.643 2.198-9.234 7.286.188 2.67 1.759 4.68 4.271 5.622l3.957 1.445c.848.345 1.728.471 2.576.471m-3.047-10.867c1.916-1.068 4.366-.408 5.434 1.539 1.067 1.916.408 4.366-1.539 5.433" />
                                    <path d="M415.504 153.308c.816-1.601 2.575-2.418 4.271-2.104" />
                                </g>
                                <path d="M429.982 143.195c.125 1.633 1.099 1.696 2.261 1.633 1.162-.094 2.104-.314 1.979-1.947-.158-2.167-1.1-2.104-2.293-2.01-1.131.063-2.104.189-1.947 2.324z" class="H" />
                                <path d="M435.573 143.038s-1.821-4.585-8.731-2.45c0 0-2.984 1.194-5.119.032" class="C" />
                                <path d="M426.844 136.443l5.842-.44a1.44 1.44 0 0 0 1.319-1.539 1.44 1.44 0 0 0-1.539-1.319l-5.842.44a1.44 1.44 0 0 0-1.319 1.539c.032.785.723 1.382 1.539 1.319z" class="H" />
                                <g class="B">
                                    <path d="M436.55 165.432c.063 1.036.942 1.821 1.948 1.821.094-1.036.094-2.104 0-3.172l-.063-.754h-.063c-1.068.095-1.885 1.037-1.822 2.105z" />
                                    <path d="M435.605 165.62c.377.974 1.351 2.136 2.796 2.732.125-.816.157-1.633.188-2.481-.973 0-1.979-.094-2.984-.251z" />
                                </g>
                                <path d="M433.848 165.275a21.68 21.68 0 0 0 4.711.628" class="C" />
                                <path d="M409.483 146.762c28.595-32.113 44.194-64.896 34.841-73.225s-40.115 10.953-68.71 43.066-44.194 64.896-34.842 73.224 40.116-10.953 68.711-43.065z" class="B" />
                                <g class="J">
                                    <path d="M407.725 145.181c28.595-32.112 44.194-64.896 34.841-73.224s-40.115 10.953-68.71 43.065-44.194 64.896-34.841 73.224 40.115-10.952 68.71-43.065z" />
                                    <path d="M392.576 131.7c8.449-9.485 15.735-19.001 21.608-27.952 1.162-1.79.503-4.209-1.444-5.12l-9.642-4.648c-10.271-4.931-22.551-2.481-30.151 6.03l-14.102 15.83c-7.569 8.511-8.606 21.011-2.513 30.622l5.716 9.045c1.131 1.822 3.612 2.198 5.245.848 8.229-6.847 16.835-15.201 25.283-24.655z" />
                                </g>
                                <path d="M412.737 98.629l-1.853-.911c-6.093 9.547-13.85 19.849-22.958 30.056-9.014 10.113-18.216 18.939-26.916 26.037l1.068 1.696c1.13 1.822 3.611 2.198 5.245.848 8.197-6.847 16.834-15.201 25.251-24.686 8.449-9.485 15.735-19.002 21.608-27.953 1.162-1.758.471-4.145-1.445-5.087z" class="H" />
                                <g class="B">
                                    <path d="M372.726 555.666c18.248 1.728 33.449-11.558 35.176-29.805l5.465-205.937-13.725-1.288c-28.894-2.732-54.554 18.467-57.318 47.394l1.162 153.895c-1.727 18.216 10.993 34.014 29.24 35.741z" />
                                    <path d="M518.926 537.387c15.892-9.139 20.603-28.769 11.464-44.661l-93.06-163.6c-3.769-6.595-13.945-11.307-20.54-7.538l-5.497 1.225c-25.157 14.479-36.495 46.137-22.016 71.295l85.114 130.936c9.139 15.924 28.643 21.483 44.535 12.343z" />
                                    <path d="M351.15 206.418l33.952-5.151 29.554-.031 26.916 5.182 3.894 31.344 5.025 15.107c3.706 13.254.629 27.482-8.197 38.034l-1.288 1.539-2.638 38.506-80.685 2.638-6.533-127.168zm-13.447 550.694h31.03l38.097-221.044c4.837-18.059-6.532-36.432-24.811-40.201-18.311-3.769-36.024 8.668-38.694 27.167l-5.622 234.078z" />
                                </g>
                                <path d="M323.758 805.668h112.375a2.95 2.95 0 0 0 2.952-2.952v-6.596a2.95 2.95 0 0 0-2.952-2.952H323.758a2.95 2.95 0 0 0-2.953 2.952v6.596c-.031 1.601 1.319 2.952 2.953 2.952z" class="J" />
                                <path d="M418.767 769.581l-39.416-26.759v-1.225a4.21 4.21 0 0 0-4.208-4.209h-3.424l-1.036 7.758c-.189 1.319-1.319 2.324-2.638 2.324h-1.602a2.67 2.67 0 0 1-2.67-2.669v-4.335c0-1.696-1.382-3.078-3.078-3.078h-22.864a7.28 7.28 0 0 0-7.224 6.282l-7.003 49.466h112.469c.031-11.055-7.255-20.446-17.306-23.555z" class="H" />
                            </g>
                            <path d="M379.387 742.822v4.585m-52.201 18.908a30.28 30.28 0 0 1 12.154-2.544c16.426 0 29.806 13.065 30.339 29.365m48.997-23.618c4.114 5.182 6.595 11.746 6.595 18.876m-36.023-32.507l17.148 10.836" class="C I" />
                            <g class="G">
                                <path d="M585.662 706.641l-27.638 10.301-85.805-196.923c-7.537-17.085.848-36.998 18.342-43.53 17.526-6.533 36.935 3.046 42.4 20.917l52.701 209.235z" class="B" />
                                <path d="M632.617 686.069l-45.007 4.24-.502-1.57c-.817-2.482-3.424-3.895-5.936-3.235l-.785.219 1.538 6.565c.252 1.036-.345 2.041-1.35 2.355l-2.042.628c-1.067.314-2.198-.314-2.481-1.382l-.502-1.884c-.691-2.575-3.329-4.083-5.905-3.392l-21.262 5.716c-3.424.911-5.685 4.209-5.277 7.726l5.245 47.519 42.149-9.233 66.489-35.145c-2.042-9.359-9.14-16.3-17.808-18.562-2.104-.628-4.334-.753-6.564-.565z" class="H" />
                            </g>
                            <path d="M622.758 687.011s16.332 2.544 18.938 21.043m-44.534-7.506l28.518-5.905m-38.069-4.334l1.728 5.622m-44.126 25.031c3.455-1.664 7.286-2.701 11.369-2.952 14.824-.911 27.796 8.983 31.282 22.865" class="C I" />
                            <g class="G">
                                <path d="M579.6 741.314l-31.376 2.921c-1.759.157-3.046 1.696-2.921 3.455l.377 5.088c.126 1.79 1.696 3.109 3.486 2.984l32.319-2.387c7.663-.566 15.138-2.733 21.922-6.376l56.878-30.402c1.288-.691 1.947-2.167 1.633-3.612l-1.224-5.245c-.472-2.073-2.796-3.109-4.68-2.136l-55.748 29.492c-6.438 3.454-13.474 5.559-20.666 6.218z" class="J" />
                                <path class="text-primary" d="M355.172 327.524s-23.022 24.843-23.022 57.884-6.972 165.767-6.972 165.767l50.911-3.015c40.547-2.418 80.12-13.254 116.207-31.847l40.107-20.666 7.318-1.602-97.646-163.506.911-37.343s9.988-9.767 11.15-23.398c1.13-13.631-8.417-38.254-8.417-38.254l.691-24.969-31.722-5.339-29.554.031-32.381 4.083-5.213 2.042 7.632 120.132z" fill="currentColor" />
                                <path d="M378.918 202.084l6.219-5.465 3.768.408a97.03 97.03 0 0 0 19.096.189l6.69-.597 4.868 5.465s-21.42 4.648-40.641 0z" class="H" />
                                <path d="M410.73 437.073l47.331 58.166 7.192 25.942m-54.524-38.191v33.197l-2.764 23.65" class="C" />
                                <path d="M527.437 225.074c-8.826 5.339-20.321 2.481-25.628-6.344l-45.352-81.345c-5.34-8.825-7.915-18.813.91-24.152s19.598-1.822 24.938 7.004l51.476 79.177c5.308 8.857 2.481 20.352-6.344 25.66z" class="B" />
                            </g>
                        </g>
                        <path d="M536.166 205.947c1.884 10.144-5.748 20.006-15.892 21.891l-74.435 15.421c-10.145 1.884-19.881-4.806-21.765-14.95s4.805-19.881 14.949-21.765l71.64-14.322c10.145-1.916 23.619 3.58 25.503 13.725z" class="B" />
                        <path d="M501.367 194.075l-62.344 12.469c-10.144 1.884-16.834 11.62-14.949 21.765s11.62 16.834 21.765 14.95l74.435-15.421c10.144-1.885 17.776-11.747 15.892-21.891-.22-1.256-.66-2.45-1.225-3.581l-3.612-6.658" class="C D E F G" />
                        <path d="M463.458 137.479l10.459-3.989a17.81 17.81 0 0 0 9.987-23.743l-7.852-17.965-40.107 15.232 7.601 21.263c2.921 8.103 11.903 12.249 19.912 9.202z" class="B" />
                        <path d="M436.006 107.046l7.6 21.262c2.89 8.103 11.841 12.218 19.881 9.171m18.91-10.678c3.266-4.868 4.083-11.244 1.539-17.054l-7.852-17.965" class="C D E F G" />
                        <path d="M441.031 121.116l10.019-3.581-8.26-23.147a5.28 5.28 0 1 0-9.988 3.58l8.229 23.147z" class="B" />
                        <path d="M451.018 117.535l-8.26-23.147a5.28 5.28 0 1 0-9.987 3.58l8.26 23.147" class="C D E F G" />
                        <path d="M466.404 96.21l9.988-3.612-3.989-10.207a5.28 5.28 0 1 0-9.988 3.58l3.989 10.239z" class="B" />
                        <g class="D E F G">
                            <path d="M476.392 92.567l-3.989-10.207a5.28 5.28 0 1 0-9.988 3.58l3.581 9.171" class="C" />
                            <path d="M464.084 80.695c.502-2.889-1.414-5.653-4.303-6.156l-7.821-1.382c-2.889-.502-5.653 1.413-6.155 4.303s1.413 5.653 4.302 6.156l7.821 1.382c2.889.502 5.653-1.413 6.156-4.303z" class="B" />
                        </g>
                        <path d="M459.971 98.471l10.019-3.518-6.03-16.897a5.28 5.28 0 1 0-9.988 3.58l5.999 16.834z" class="B" />
                        <g class="D E F G">
                            <path d="M453.939 81.606l5.748 16.143m10.303-2.795l-6.031-16.897c-.659-1.822-2.198-3.047-3.957-3.423l-2.356-.471" class="C" />
                            <path d="M455.882 81.386c.503-2.889-1.413-5.653-4.302-6.156l-7.821-1.382c-2.889-.502-5.653 1.413-6.156 4.303s1.414 5.653 4.303 6.156l7.821 1.382c2.889.503 5.653-1.413 6.155-4.303z" class="B" />
                        </g>
                        <path d="M452.584 101.11l10.019-3.581-6.438-18.656a5.28 5.28 0 1 0-9.988 3.58l6.407 18.656z" class="B" />
                        <g class="D E F G">
                            <path d="M446.145 82.454l6.155 17.902m10.273-2.827l-6.439-18.656c-.565-1.57-1.79-2.732-3.266-3.235 0 0-.942-.377-2.513-.628" class="C" />
                            <path d="M449.761 84.37c.503-2.889-1.413-5.653-4.302-6.156l-7.821-1.382c-2.889-.503-5.653 1.413-6.156 4.303s1.414 5.653 4.303 6.156l7.821 1.382c2.889.502 5.653-1.413 6.155-4.303z" class="B" />
                        </g>
                        <path d="M445.99 103.465l10.019-3.58-6.282-18.31a5.28 5.28 0 0 0-9.987 3.581l6.25 18.31z" class="B" />
                        <path d="M439.707 85.155l6.281 18.31m10.02-3.58l-6.281-18.31c-.754-2.104-2.701-3.455-4.806-3.518l-2.23-.377" class="C D E F G" />
                    </svg>
                </div>
                <div class="col-sm-10 col-md-6 col-lg-5 text-center text-md-start">
                    <div class="text-uppercase mb-3">Error 404</div>
                    <h1 class="display-5 pb-3 pb-md-4">Sorry, we can't find that page</h1>
                    <div class="d-flex flex-wrap justify-content-center justify-content-md-start gap-3">
                        <a class="btn btn-lg btn-outline-secondary rounded-pill" href="#!">Accommodation</a>
                        <a class="btn btn-lg btn-outline-secondary rounded-pill" href="#!">Shopping</a>
                        <a class="btn btn-lg btn-outline-secondary rounded-pill" href="#!">Food &amp; Drink</a>
                        <a class="btn btn-lg btn-outline-secondary rounded-pill" href="#!">Entertainment</a>
                        <a class="btn btn-lg btn-outline-secondary rounded-pill" href="#!">Health</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="position-absolute top-0 bg-primary-subtle rounded-circle rtl-flip mt-3" style="width: 1255px; height: 1255px; right: 50.6%"></div>
    </main>

@endsection

@push('scripts')
    @vite(['resources/js/app.js'])
@endpush