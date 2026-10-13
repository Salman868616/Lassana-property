<!-- Navigation bar (Page header) -->
<header class="navbar navbar-expand-lg bg-body navbar-sticky sticky-top z-fixed px-0" data-sticky-element>
    <div class="container">

        <!-- Mobile offcanvas menu toggler (Hamburger) -->
        <button type="button" class="navbar-toggler me-3 me-lg-0" data-bs-toggle="offcanvas" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar brand (Logo) -->
        <a class="navbar-brand py-1 py-md-2 py-xl-1 me-2 me-sm-n4 me-md-n5 me-lg-0" href="home-real-estate">
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
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" data-bs-display="dynamic" data-bs-trigger="hover" aria-expanded="false">Home</a>
                        <ul class="dropdown-menu">
                            <li class="hover-effect-opacity px-2 mx-n2">
                                <a class="dropdown-item d-block mb-0" href="home-real-estate">
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
                                <a class="dropdown-item d-block mb-0" href="home-cars">
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
                                <a class="dropdown-item d-block mb-0" href="home-contractors">
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
                                <a class="dropdown-item d-block mb-0" href="home-doctors">
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
                                <a class="dropdown-item d-block mb-0" href="home-events">
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
                                <a class="dropdown-item d-block mb-0" href="home-city-guide">
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
                        <a class="nav-link dropdown-toggle active" aria-current="page" href="#" role="button" data-bs-toggle="dropdown" data-bs-display="dynamic" data-bs-trigger="hover" aria-expanded="false">Listings</a>
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
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" data-bs-display="dynamic" data-bs-trigger="hover" data-bs-auto-close="outside" aria-expanded="false">Account</a>
                        <ul class="dropdown-menu">
                            <li class="dropend">
                                <a class="dropdown-item dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" data-bs-display="dynamic" data-bs-trigger="hover" aria-expanded="false">Auth Pages</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="account-signin">Sign In</a></li>
                                    <li><a class="dropdown-item" href="account-signup">Sign Up</a></li>
                                    <li><a class="dropdown-item" href="account-password-recovery">Password Recovery</a></li>
                                </ul>
                            </li>
                            <li><a class="dropdown-item" href="account-profile">My Profile</a></li>
                            <li><a class="dropdown-item" href="account-listings">My Listings</a></li>
                            <li><a class="dropdown-item" href="account-reviews">Reviews</a></li>
                            <li><a class="dropdown-item" href="account-favorites">Favorites</a></li>
                            <li><a class="dropdown-item" href="account-payment">Payment Details</a></li>
                            <li><a class="dropdown-item" href="account-settings">Account Settings</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown py-lg-2 me-lg-n1 me-xl-0">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" data-bs-display="dynamic" data-bs-trigger="hover" data-bs-auto-close="outside" aria-expanded="false">Pages</a>
                        <ul class="dropdown-menu">
                            <li class="dropend">
                                <a class="dropdown-item dropdown-toggle" href="#!" role="button" data-bs-toggle="dropdown" data-bs-display="dynamic" data-bs-trigger="hover" aria-expanded="false">About</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="about-v1">About v.1</a></li>
                                    <li><a class="dropdown-item" href="about-v2">About v.2</a></li>
                                </ul>
                            </li>
                            <li class="dropend">
                                <a class="dropdown-item dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" data-bs-display="dynamic" data-bs-trigger="hover" aria-expanded="false">Blog</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="blog-layout-v1">Blog Layout v.1</a></li>
                                    <li><a class="dropdown-item" href="blog-layout-v2">Blog Layout v.2</a></li>
                                    <li><a class="dropdown-item" href="blog-layout-v3">Blog Layout v.3</a></li>
                                    <li><a class="dropdown-item" href="blog-layout-v4">Blog Layout v.4</a></li>
                                    <li><a class="dropdown-item" href="blog-single-v1">Single Post v.1</a></li>
                                    <li><a class="dropdown-item" href="blog-single-v2">Single Post v.2</a></li>
                                    <li><a class="dropdown-item" href="blog-single-v3">Single Post v.3</a></li>
                                </ul>
                            </li>
                            <li class="dropend">
                                <a class="dropdown-item dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" data-bs-display="dynamic" data-bs-trigger="hover" aria-expanded="false">Contact</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="contact-v1">Contact v.1</a></li>
                                    <li><a class="dropdown-item" href="contact-v2">Contact v.2</a></li>
                                    <li><a class="dropdown-item" href="contact-v3">Contact v.3</a></li>
                                </ul>
                            </li>
                            <li class="dropend">
                                <a class="dropdown-item dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" data-bs-display="dynamic" data-bs-trigger="hover" aria-expanded="false">Help Center</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="help-topics-v1">Help Topics v.1</a></li>
                                    <li><a class="dropdown-item" href="help-topics-v2">Help Topics v.2</a></li>
                                    <li><a class="dropdown-item" href="help-topics-v3">Help Topics v.3</a></li>
                                    <li><a class="dropdown-item" href="help-single-article-v1">Help Single Article v.1</a></li>
                                    <li><a class="dropdown-item" href="help-single-article-v2">Help Single Article v.2</a></li>
                                    <li><a class="dropdown-item" href="help-single-article-v3">Help Single Article v.3</a></li>
                                </ul>
                            </li>
                            <li class="dropend">
                                <a class="dropdown-item dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" data-bs-display="dynamic" data-bs-trigger="hover" aria-expanded="false">404 Error</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="404-bg-image">Background Image (Real Estate)</a></li>
                                    <li><a class="dropdown-item" href="404-icon">Icon Image (Cars)</a></li>
                                    <li><a class="dropdown-item" href="404-split-screen">Split Screen (Contractors)</a></li>
                                    <li><a class="dropdown-item" href="404-illustration">Illustration (City Guide)</a></li>
                                </ul>
                            </li>
                            <li><a class="dropdown-item" href="terms-and-conditions">Terms &amp; Conditions</a></li>
                        </ul>
                    </li>
                    <li class="nav-item py-lg-2 me-lg-n2 me-xl-0">
                        <a class="nav-link" href="docs/installation">Docs</a>
                    </li>
                    <li class="nav-item py-lg-2 me-lg-n2 me-xl-0">
                        <a class="nav-link" href="docs/typography">Components</a>
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

            <!-- Account dropdown (Logged in state) -->
            <div class="dropdown">
                <a class="btn btn-icon hover-effect-scale position-relative bg-body-secondary border rounded-circle overflow-hidden" href="#" role="button" data-bs-toggle="dropdown" data-bs-display="dynamic" aria-expanded="false" aria-label="My account">
                    <img src="{{ asset('assets/img/account/avatar-sm.jpg') }}" class="hover-effect-target position-absolute top-0 start-0 w-100 h-100 object-fit-cover" alt="Avatar">
                </a>
                <ul class="dropdown-menu dropdown-menu-end" style="--fn-dropdown-spacer: .5rem">
                    <li><span class="h6 dropdown-header">Michael Williams</span></li>
                    <li>
                        <a class="dropdown-item" href="account-profile">
                            <i class="fi-user opacity-75 me-2"></i>
                            My profile
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="account-listings">
                            <i class="fi-layers opacity-75 me-2"></i>
                            My listings
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="account-reviews">
                            <i class="fi-star opacity-75 me-2"></i>
                            Reviews
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="account-favorites">
                            <i class="fi-heart opacity-75 me-2"></i>
                            Favorites
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="account-payment">
                            <i class="fi-credit-card opacity-75 me-2"></i>
                            Payment details
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="account-settings">
                            <i class="fi-settings opacity-75 me-2"></i>
                            Account settings
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <a class="dropdown-item" href="account-signin">
                            <i class="fi-log-out opacity-75 me-2"></i>
                            Sign out
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>