@extends('layouts.app')

@section('title', 'Finder | Account - Payment Details')

@section('content')

    <!-- Add payment method modal -->
    <div class="modal fade" id="addPayment" data-bs-backdrop="static" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <ul class="nav nav-pills gap-3" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button type="button" class="nav-link active" id="add-card-tab" data-bs-toggle="pill" data-bs-target="#add-card" role="tab" aria-controls="add-card" aria-selected="true">
                                Add card
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button type="button" class="nav-link" id="add-paypal-tab" data-bs-toggle="pill" data-bs-target="#add-paypal" role="tab" aria-controls="add-paypal" aria-selected="false">
                                Add PayPal
                            </button>
                        </li>
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body tab-content">
                    <div class="tab-pane fade show active" id="add-card" role="tabpanel" aria-labelledby="add-card-tab">
                        <form class="needs-validation" novalidate>
                            <div class="mb-4">
                                <label for="card-number" class="form-label">Card number</label>
                                <div class="position-relative" data-input-format='{"creditCard": true}'>
                                    <input type="text" class="form-control form-control-lg form-icon-end bg-image-none" id="card-number" placeholder="XXXX XXXX XXXX XXXX" required>
                                    <span class="position-absolute d-flex top-50 end-0 translate-middle-y fs-5 text-body-tertiary me-3" data-card-icon></span>
                                    <div class="invalid-tooltip bg-transparent p-0">Please provide a valid card number!</div>
                                </div>
                            </div>
                            <div class="position-relative mb-4">
                                <label for="card-name" class="form-label">Name on card</label>
                                <input type="text" class="form-control form-control-lg" id="card-name" required>
                                <div class="invalid-tooltip bg-transparent p-0">Please enters cardholder's name!</div>
                            </div>
                            <div class="row row-cols-2 g-4 mb-4">
                                <div class="col position-relative">
                                    <label for="card-expiration" class="form-label">Expiration date</label>
                                    <input type="text" class="form-control form-control-lg" id="card-expiration" data-input-format='{"date": true, "datePattern": ["m", "y"]}' placeholder="MM/YY" required>
                                    <div class="invalid-tooltip bg-transparent p-0">Field is required!</div>
                                </div>
                                <div class="col position-relative">
                                    <label for="card-cvc" class="form-label">CVC</label>
                                    <input type="text" class="form-control form-control-lg" id="card-cvc" data-input-format='{"numericOnly": true, "blocks": [3]}' placeholder="XXX" required>
                                    <div class="invalid-tooltip bg-transparent p-0">Field is required!</div>
                                </div>
                            </div>
                            <div class="d-flex gap-3">
                                <button type="reset" class="btn btn-secondary w-100" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary w-100">Add card</button>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="add-paypal" role="tabpanel" aria-labelledby="add-paypal-tab">
                        <form class="needs-validation" novalidate>
                            <div class="position-relative mb-4">
                                <label for="paypal-email" class="form-label">Email associated with PayPal</label>
                                <input type="email" class="form-control form-control-lg" id="paypal-email" required>
                                <div class="invalid-tooltip bg-transparent p-0">Please provide a valid email address!</div>
                            </div>
                            <div class="d-flex gap-3">
                                <button type="reset" class="btn btn-secondary w-100" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary w-100">Continue</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" data-bs-trigger="hover" aria-expanded="false">Home</a>
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
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" data-bs-trigger="hover" aria-expanded="false">Listings</a>
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
                            <a class="nav-link dropdown-toggle active" aria-current="page" href="#" role="button" data-bs-toggle="dropdown" data-bs-trigger="hover" data-bs-auto-close="outside" aria-expanded="false">Account</a>
                            <ul class="dropdown-menu">
                                <li class="dropend">
                                    <a class="dropdown-item dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" data-bs-trigger="hover" aria-expanded="false">Auth Pages</a>
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
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" data-bs-trigger="hover" data-bs-auto-close="outside" aria-expanded="false">Pages</a>
                            <ul class="dropdown-menu">
                                <li class="dropend">
                                    <a class="dropdown-item dropdown-toggle" href="#!" role="button" data-bs-toggle="dropdown" data-bs-trigger="hover" aria-expanded="false">About</a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="about-v1">About v.1</a></li>
                                        <li><a class="dropdown-item" href="about-v2">About v.2</a></li>
                                    </ul>
                                </li>
                                <li class="dropend">
                                    <a class="dropdown-item dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" data-bs-trigger="hover" aria-expanded="false">Blog</a>
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
                                    <a class="dropdown-item dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" data-bs-trigger="hover" aria-expanded="false">Contact</a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="contact-v1">Contact v.1</a></li>
                                        <li><a class="dropdown-item" href="contact-v2">Contact v.2</a></li>
                                        <li><a class="dropdown-item" href="contact-v3">Contact v.3</a></li>
                                    </ul>
                                </li>
                                <li class="dropend">
                                    <a class="dropdown-item dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" data-bs-trigger="hover" aria-expanded="false">Help Center</a>
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
                                    <a class="dropdown-item dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" data-bs-trigger="hover" aria-expanded="false">404 Error</a>
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
                    <button type="button" class="theme-switcher btn btn-icon btn-outline-secondary fs-lg border-0 animate-scale" data-bs-toggle="dropdown" aria-expanded="false" aria-label="Toggle theme (light)">
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
                <div class="dropdown pe-1 me-2">
                    <a class="btn btn-icon hover-effect-scale position-relative bg-body-secondary border rounded-circle overflow-hidden" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" aria-label="My account">
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

                <!-- Add property button  -->
                <a class="btn btn-primary animate-scale" href="add-property-type">
                    <i class="fi-plus fs-lg animate-target ms-n2 me-1 me-sm-2"></i>
                    Add<span class="d-none d-xl-inline ms-1">property</span>
                </a>
            </div>
        </div>
    </header>


    <!-- Page content -->
    <main class="content-wrapper">
        <div class="container pt-4 pt-sm-5 pb-5 mb-xxl-3">
            <div class="row pt-2 pt-sm-0 pt-lg-2 pb-2 pb-sm-3 pb-md-4 pb-lg-5">


                <!-- Sidebar navigation that turns into offcanvas on screens < 992px wide (lg breakpoint) -->
                <aside class="col-lg-3" style="margin-top: -105px">
                    <div class="offcanvas-lg offcanvas-start sticky-lg-top pe-lg-3 pe-xl-4" id="accountSidebar">
                        <div class="d-none d-lg-block" style="height: 105px"></div>

                        <!-- Header -->
                        <div class="offcanvas-header d-lg-block py-3 p-lg-0">
                            <div class="d-flex flex-row flex-lg-column align-items-center align-items-lg-start">
                                <div class="flex-shrink-0 bg-body-secondary border rounded-circle overflow-hidden" style="width: 64px; height: 64px">
                                    <img src="{{ asset('assets/img/account/avatar.jpg') }}" alt="Avatar">
                                </div>
                                <div class="pt-lg-3 ps-3 ps-lg-0">
                                    <h6 class="mb-1">Michael Williams</h6>
                                    <p class="fs-sm mb-0">m.williams@example.com</p>
                                </div>
                            </div>
                            <button type="button" class="btn-close d-lg-none" data-bs-dismiss="offcanvas" data-bs-target="#accountSidebar" aria-label="Close"></button>
                        </div>

                        <!-- Body (Navigation) -->
                        <div class="offcanvas-body d-block pt-2 pt-lg-4 pb-lg-0">
                            <nav class="list-group list-group-borderless">
                                <a class="list-group-item list-group-item-action d-flex align-items-center" href="account-profile">
                                    <i class="fi-user fs-base opacity-75 me-2"></i>
                                    My profile
                                </a>
                                <a class="list-group-item list-group-item-action d-flex align-items-center" href="account-listings">
                                    <i class="fi-layers fs-base opacity-75 me-2"></i>
                                    My listings
                                </a>
                                <a class="list-group-item list-group-item-action d-flex align-items-center" href="account-reviews">
                                    <i class="fi-star fs-base opacity-75 me-2"></i>
                                    Reviews
                                </a>
                                <a class="list-group-item list-group-item-action d-flex align-items-center" href="account-favorites">
                                    <i class="fi-heart fs-base opacity-75 me-2"></i>
                                    Favorites
                                </a>
                                <a class="list-group-item list-group-item-action d-flex align-items-center active" aria-current="page" href="account-payment">
                                    <i class="fi-credit-card fs-base opacity-75 me-2"></i>
                                    Payment details
                                </a>
                                <a class="list-group-item list-group-item-action d-flex align-items-center" href="account-settings">
                                    <i class="fi-settings fs-base opacity-75 me-2"></i>
                                    Account settings
                                </a>
                                <a class="list-group-item list-group-item-action d-flex align-items-center" href="help-topics-v1">
                                    <i class="fi-help-circle fs-base opacity-75 me-2"></i>
                                    Help center
                                </a>
                            </nav>
                            <nav class="list-group list-group-borderless pt-3">
                                <a class="list-group-item list-group-item-action d-flex align-items-center" href="account-signin">
                                    <i class="fi-log-out fs-base opacity-75 me-2"></i>
                                    Sign out
                                </a>
                            </nav>
                        </div>
                    </div>
                </aside>


                <!-- Account payment content -->
                <div class="col-lg-9">
                    <h1 class="h2">Payment details</h1>
                    <p class="pb-2 pb-lg-3">Add and manage payment methods with our secure payment system.</p>

                    <!-- Cards -->
                    <div class="d-flex flex-column flex-sm-row gap-3 gap-md-4 pb-2 pb-lg-3 mb-3" style="max-width: 810px">

                        <!-- Visa card -->
                        <div class="card w-100 border-0">
                            <div class="card-body position-relative z-2">
                                <div class="d-flex align-items-center pb-4 mb-2 mb-md-3">
                                    <svg class="flex-shrink-0 text-dark-emphasis" xmlns="http://www.w3.org/2000/svg" width="52" height="32" fill="currentColor">
                                        <path d="M20.224 8.524L13.94 23.516h-4.1L6.748 11.55c-.188-.736-.35-1.006-.922-1.316-.932-.506-2.472-.98-3.826-1.276l.092-.434h6.6a1.81 1.81 0 0 1 1.788 1.528l1.634 8.676L16.15 8.524h4.074zM36.29 18.622c.016-3.958-5.472-4.176-5.434-5.944.012-.538.524-1.11 1.644-1.256a7.32 7.32 0 0 1 3.826.672l.68-3.18c-1.16-.436-2.389-.662-3.628-.666-3.834 0-6.532 2.04-6.556 4.958-.024 2.158 1.926 3.36 3.396 4.08 1.512.734 2.02 1.206 2.012 1.862-.01 1.008-1.204 1.45-2.32 1.468-1.95.03-3.08-.526-3.984-.946l-.702 3.284c.906.416 2.578.78 4.312.796 4.074 0 6.74-2.012 6.754-5.128zm10.122 4.894H50L46.87 8.524h-3.312c-.354-.003-.701.1-.995.296s-.523.476-.657.804l-5.818 13.892h4.072l.81-2.24h4.976l.466 2.24zm-4.326-5.312l2.04-5.63 1.176 5.63h-3.216zm-16.32-9.68L22.56 23.516h-3.88l3.21-14.992h3.876z" />
                                    </svg>
                                    <span class="badge text-bg-light ms-3">Primary</span>
                                    <div class="dropdown ms-auto">
                                        <button type="button" class="btn btn-icon btn-sm fs-xl text-dark-emphasis border-0" data-bs-toggle="dropdown" aria-expanded="false" aria-label="Actions">
                                            <i class="fi-more-vertical"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end" style="--fn-dropdown-min-width: 8rem">
                                            <li>
                                                <a class="dropdown-item" href="#!">
                                                    <i class="fi-edit opacity-75 me-2"></i>
                                                    Edit
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item text-danger" href="#!">
                                                    <i class="fi-trash opacity-75 me-2"></i>
                                                    Delete
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="h5 pt-md-1 pb-2 pb-md-3" style="letter-spacing: 1.25px">1245 **** **** 0730</div>
                                <div class="d-flex justify-content-between">
                                    <div class="me-3">
                                        <div class="fs-xs text-body mb-1">Name</div>
                                        <div class="h6 fs-sm mb-0">Michael Williams</div>
                                    </div>
                                    <div>
                                        <div class="fs-xs text-body mb-1">Expiry date</div>
                                        <div class="h6 fs-sm mb-0">12/26</div>
                                    </div>
                                </div>
                            </div>
                            <span class="position-absolute top-0 start-0 w-100 h-100 rounded-4 d-none-dark" style="background: linear-gradient(90deg, #accbee 0%, #dbeafe 100%)"></span>
                            <span class="position-absolute top-0 start-0 w-100 h-100 rounded-4 d-none d-block-dark" style="background: linear-gradient(90deg, #1b273a 0%, #1f2632 100%)"></span>
                        </div>

                        <!-- Master card -->
                        <div class="card w-100 border-0">
                            <div class="card-body position-relative z-2">
                                <div class="d-flex align-items-center pb-4 mb-2 mb-md-3">
                                    <svg class="flex-shrink-0" xmlns="http://www.w3.org/2000/svg" width="52" height="32" fill="none">
                                        <path d="M31.411 25.616H20.594V5.707h10.817v19.909z" fill="#ff5f00" />
                                        <path d="M21.28 15.662c0-4.038 1.846-7.636 4.722-9.954C23.825 3.95 21.133 2.996 18.362 3 11.534 3 6 8.669 6 15.662s5.534 12.662 12.362 12.662c2.772.004 5.464-.95 7.64-2.707-2.875-2.318-4.722-5.916-4.722-9.955z" fill="#eb001b" />
                                        <path d="M46.003 15.662c0 6.993-5.534 12.662-12.362 12.662A12.13 12.13 0 0 1 26 25.616c2.876-2.318 4.722-5.916 4.722-9.955S28.876 8.026 26 5.707A12.13 12.13 0 0 1 33.641 3c6.827 0 12.362 5.669 12.362 12.662" fill="#f79e1b" />
                                    </svg>
                                    <div class="dropdown ms-auto">
                                        <button type="button" class="btn btn-icon btn-sm fs-xl text-dark-emphasis border-0" data-bs-toggle="dropdown" aria-expanded="false" aria-label="Actions">
                                            <i class="fi-more-vertical"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end" style="--fn-dropdown-min-width: 8rem">
                                            <li>
                                                <a class="dropdown-item" href="#!">
                                                    <i class="fi-edit opacity-75 me-2"></i>
                                                    Edit
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item text-danger" href="#!">
                                                    <i class="fi-trash opacity-75 me-2"></i>
                                                    Delete
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="h5 pt-md-1 pb-2 pb-md-3" style="letter-spacing: 1.25px">4460 **** **** 7821</div>
                                <div class="d-flex justify-content-between">
                                    <div class="me-3">
                                        <div class="fs-xs text-body mb-1">Name</div>
                                        <div class="h6 fs-sm mb-0">Michael Williams</div>
                                    </div>
                                    <div>
                                        <span class="badge text-bg-danger mt-n1 mb-1">Expired</span>
                                        <div class="h6 fs-sm mb-0">10/23</div>
                                    </div>
                                </div>
                            </div>
                            <span class="position-absolute top-0 start-0 w-100 h-100 rounded-4 d-none-dark" style="background: linear-gradient(90deg, #fcb69f 0%, #ffe8c9 100%)"></span>
                            <span class="position-absolute top-0 start-0 w-100 h-100 rounded-4 d-none d-block-dark" style="background: linear-gradient(-90deg, #2f2c3a 0%, #372e2f 52.24%)"></span>
                        </div>
                    </div>

                    <!-- Add payment method button -->
                    <div class="d-flex flex-column align-items-sm-start">
                        <button type="button" class="btn btn-lg btn-outline-dark" data-bs-toggle="modal" data-bs-target="#addPayment">
                            <i class="fi-plus fs-lg ms-n2 me-2"></i>
                            Add payment method
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Sidebar navigation offcanvas toggle that is visible on screens < 992px wide (lg breakpoint) -->
    <button type="button" class="fixed-bottom z-sticky w-100 btn btn-lg btn-dark border-0 border-top border-light border-opacity-10 rounded-0 pb-4 d-lg-none" data-bs-toggle="offcanvas" data-bs-target="#accountSidebar" aria-controls="accountSidebar" data-bs-theme="light">
        <i class="fi-sidebar fs-base me-2"></i>
        Account menu
    </button>

    @include('layouts.partials.footer.real-estate-footer')

@endsection

@push('scripts')
    <script src="{{ asset('assets/vendor/cleave.js/dist/cleave.min.js') }}"></script>

    @vite(['resources/js/app.js'])
@endpush