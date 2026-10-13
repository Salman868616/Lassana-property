@extends('layouts.app')

@section('title', 'Finder Docs | Performance: CLS &amp; Preload')

@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/styles/atom-one-dark.min.css">
    <link rel="stylesheet" href="{{ asset('assets/vendor/simplebar/dist/simplebar.min.css') }}">

    <!-- Docs specific styles -->
    <style>
        .docs-section {
            scroll-margin-top: 100px;
        }

        @media (min-width: 992px) {
            .docs-sidebar {
                position: sticky;
                top: 7rem;
                height: calc(100vh - 8.5rem);
            }

            .docs-section {
                scroll-margin-top: 118px;
            }
        }
    </style>
@endpush

@section('content')

    <!-- Navigation bar (Header) -->
    <header class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top z-fixed px-0" data-bs-theme="dark">
        <div class="container py-1 py-lg-2">
            <button type="button" class="navbar-toggler me-3" data-bs-toggle="offcanvas" data-bs-target="#sidebarNav" aria-controls="sidebarNav" aria-expanded="false" aria-label="Toggle sidebar navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand mx-auto mx-lg-0" href="index">
                <span class="d-flex flex-shrink-0 text-primary rtl-flip me-2">
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
                <span class="badge text-primary bg-primary bg-opacity-10 fs-xs rounded-pill d-none d-lg-inline-block ms-2">v1.1.0</span>
            </a>
            <div id="navbarNav" class="offcanvas-lg offcanvas-end ms-auto" tabindex="-1" aria-labelledby="navbarNavLabel">
                <div class="offcanvas-header py-3">
                    <h5 class="offcanvas-title" id="navbarNavLabel">Finder</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#navbarNav" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body pt-0">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" href="installation">Docs</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="typography">Components</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index">Live demo</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="https://srbthemes.kcubeinfotech.com/portfolio" target="_blank" rel="noreferrer">Support</a>
                        </li>
                    </ul>
                </div>
                <div class="offcanvas-header border-top">
                    <a class="btn btn-primary w-100" href="https://1.envato.market/Finder-Laravel" target="_blank" rel="noreferrer">
                        <i class="fi-shopping-bag fs-base ms-n1 me-2"></i>
                        Buy now
                    </a>
                </div>
            </div>
            <div class="dropdown pe-lg-1 ms-lg-3">
                <button type="button" class="theme-switcher btn btn-icon btn-secondary fs-base rounded-circle animate-scale" data-bs-toggle="dropdown" aria-expanded="false" aria-label="Toggle theme (light)">
                    <span class="theme-icon-active d-flex animate-target">
                        <i class="fi-sun"></i>
                    </span>
                </button>
                <ul class="dropdown-menu dropdown-menu-end" style="--fn-dropdown-spacer: .625rem; --fn-dropdown-min-width: 9rem">
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
            <button type="button" class="btn btn-icon btn-outline-secondary border-0 d-lg-none ms-2 me-n2" data-bs-toggle="offcanvas" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-label="Toggle navbar navigation">
                <i class="fi-more-horizontal fs-3"></i>
            </button>
            <a class="btn btn-primary animate-shake d-none d-lg-inline-flex ms-4" href="https://1.envato.market/Finder-Laravel" target="_blank" rel="noreferrer">
                <i class="fi-shopping-bag fs-base animate-target ms-n1 me-2"></i>
                Buy now
            </a>
        </div>
    </header>


    <!-- Page container -->
    <div class="container pt-4">
        <div class="row pt-sm-2">

            <!-- Sidebar navigation -->
            <aside class="col-lg-3 pe-xl-4">
                <div class="docs-sidebar" data-filter-list='{"searchClass": "docs-search", "listClass": "docs-list", "valueNames": ["list-group-item"]}'>
                    <div id="sidebarNav" class="offcanvas-lg offcanvas-start d-flex flex-column h-100" tabindex="-1" aria-labelledby="sidebarNavLabel">
                        <div class="offcanvas-header py-3">
                            <h5 class="offcanvas-title" id="sidebarNavLabel">Browse docs</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarNav" aria-label="Close"></button>
                        </div>
                        <div class="position-relative mx-4 ms-lg-0 mb-4">
                            <i class="fi-search position-absolute top-50 start-0 translate-middle-y ms-3"></i>
                            <input type="search" class="docs-search form-control form-icon-start" placeholder="Quick search...">
                        </div>
                        <div class="offcanvas-body d-block flex-grow-1 overflow-hidden pt-0 pe-0 pb-lg-2">
                            <div id="scrollable" class="h-100 overflow-y-auto pe-4">
                                <nav class="docs-list list-group list-group-borderless" onclick="closeSidebar()">
                                    <h3 class="h6 d-flex align-items-center pb-1 mb-2">
                                        <i class="fi-book fs-lg text-success me-2"></i>
                                        Getting started
                                    </h3>
                                    <div class="dropend">
                                        <a class="list-group-item list-group-item-action justify-content-between dropdown-toggle pe-3" href="installation">
                                            Installation
                                            <span class="visually-hidden">setup npm prerequisites</span>
                                        </a>
                                    </div>
                                    <div class="dropend">
                                        <a class="list-group-item list-group-item-action justify-content-between dropdown-toggle pe-3" href="npm-scripts">
                                            Npm commands (Scripts)
                                            <span class="visually-hidden">dev build styles:compile styles:minify scripts:compile scripts:minify icon-font vendor validate watch dist</span>
                                        </a>
                                    </div>
                                    <div class="dropend">
                                        <a class="list-group-item list-group-item-action justify-content-between dropdown-toggle pe-3" href="structure">
                                            File structure
                                            <span class="visually-hidden">project folders</span>
                                        </a>
                                    </div>
                                    <div class="dropend">
                                        <a class="list-group-item list-group-item-action justify-content-between dropdown-toggle pe-3" href="configuration">
                                            Configuration files
                                            <span class="visually-hidden">package.json config.js babelrc browserslistrc editorconfig eslintrc gitignore htmlvalidate prettierignore prettierrc stylelintrc webmanifest manifest.json</span>
                                        </a>
                                    </div>
                                    <div class="dropend">
                                        <a class="list-group-item list-group-item-action justify-content-between dropdown-toggle text-wrap pe-3" href="pwa">
                                            Progressive Web App (PWA)
                                            <span class="visually-hidden">service worker manifest</span>
                                        </a>
                                    </div>
                                    <div class="dropend">
                                        <a class="list-group-item list-group-item-action justify-content-between dropdown-toggle text-wrap pe-3" href="web-font">
                                            Web font(s)
                                        </a>
                                    </div>
                                    <div class="dropend">
                                        <a class="list-group-item list-group-item-action justify-content-between dropdown-toggle pe-3" href="icon-font">
                                            Icon font
                                        </a>
                                    </div>
                                    <div class="dropdown">
                                        <span class="list-group-item list-group-item-action justify-content-between dropdown-toggle pe-3 pe-none active">
                                            Performance: CLS &amp; Preload
                                            <span class="visually-hidden">cumulative layout shift loading aspect-ratio</span>
                                        </span>
                                    </div>
                                    <div class="dropend">
                                        <a class="list-group-item list-group-item-action justify-content-between dropdown-toggle pe-3" href="browser-support">
                                            Browser support
                                            <span class="visually-hidden">autoprefixer</span>
                                        </a>
                                    </div>
                                    <div class="dropend">
                                        <a class="list-group-item list-group-item-action justify-content-between dropdown-toggle pe-3" href="rtl">Right-to-Left (RTL)</a>
                                    </div>
                                    <div class="dropend">
                                        <a class="list-group-item list-group-item-action justify-content-between dropdown-toggle pe-3" href="deployment">
                                            Deployment guide
                                            <span class="visually-hidden">launch hosting publishing rollout go-live</span>
                                        </a>
                                    </div>
                                    <div class="dropend">
                                        <a class="list-group-item list-group-item-action justify-content-between dropdown-toggle pe-3" href="credits">
                                            Sources and credits
                                            <span class="visually-hidden">resources plugins libraries frameworks assets</span>
                                        </a>
                                    </div>
                                    <div class="dropend">
                                        <a class="list-group-item list-group-item-action justify-content-between dropdown-toggle pe-3" href="changelog">
                                            Changelog
                                            <span class="visually-hidden">updates</span>
                                        </a>
                                    </div>
                                    <h3 class="h6 d-flex align-items-center border-top pt-4 pb-1 mt-3 mb-2">
                                        <i class="fi-settings fs-lg text-primary me-2"></i>
                                        Customize
                                    </h3>
                                    <div class="dropend">
                                        <a class="list-group-item list-group-item-action justify-content-between dropdown-toggle pe-3" href="options">
                                            Global options
                                        </a>
                                    </div>
                                    <div class="dropend">
                                        <a class="list-group-item list-group-item-action justify-content-between dropdown-toggle pe-3" href="colors">
                                            Colors
                                            <span class="visually-hidden">grayscale primary secondary info warning success danger dark light</span>
                                        </a>
                                    </div>
                                    <div class="dropend">
                                        <a class="list-group-item list-group-item-action justify-content-between dropdown-toggle pe-3" href="color-modes">
                                            Color modes (Light/Dark)
                                            <span class="visually-hidden">themes</span>
                                        </a>
                                    </div>
                                    <div class="dropend">
                                        <a class="list-group-item list-group-item-action justify-content-between dropdown-toggle pe-3" href="css-variables">
                                            CSS variables
                                        </a>
                                    </div>
                                    <h3 class="h6 d-flex align-items-center border-top pt-4 pb-1 mt-3 mb-2">
                                        <i class="fi-file-text fs-lg text-secondary me-2"></i>
                                        Content
                                    </h3>
                                    <div class="dropend">
                                        <a class="list-group-item list-group-item-action justify-content-between dropdown-toggle pe-3" href="typography">
                                            Typography
                                            <span class="visually-hidden">text font heading title paragraph list ordered unordered description blockquote quotation abbreviation</span>
                                        </a>
                                    </div>
                                    <div class="dropend">
                                        <a class="list-group-item list-group-item-action justify-content-between dropdown-toggle pe-3" href="icons">Icons</a>
                                    </div>
                                    <div class="dropend">
                                        <a class="list-group-item list-group-item-action justify-content-between dropdown-toggle pe-3" href="code">
                                            Code
                                            <span class="visually-hidden">pre kbd highlight</span>
                                        </a>
                                    </div>
                                    <div class="dropend">
                                        <a class="list-group-item list-group-item-action justify-content-between dropdown-toggle pe-3" href="images">
                                            Images &amp; figures
                                            <span class="visually-hidden">thumbnails picture</span>
                                        </a>
                                    </div>
                                    <div class="dropend">
                                        <a class="list-group-item list-group-item-action justify-content-between dropdown-toggle pe-3" href="tables">
                                            Tables
                                        </a>
                                    </div>
                                    <h3 class="h6 d-flex align-items-center border-top pt-4 pb-1 mt-3 mb-2">
                                        <i class="fi-layers fs-lg text-info me-2"></i>
                                        Components
                                    </h3>
                                    <div class="dropend">
                                        <a class="list-group-item list-group-item-action justify-content-between dropdown-toggle pe-3" href="accordion">
                                            Accordion
                                            <span class="visually-hidden">collapse</span>
                                        </a>
                                    </div>
                                    <div class="dropend">
                                        <a class="list-group-item list-group-item-action justify-content-between dropdown-toggle pe-3" href="alerts">
                                            Alerts
                                            <span class="visually-hidden">notification callout</span>
                                        </a>
                                    </div>
                                    <div class="dropend">
                                        <a class="list-group-item list-group-item-action justify-content-between dropdown-toggle pe-3" href="badges">
                                            Badges
                                            <span class="visually-hidden">count indicator</span>
                                        </a>
                                    </div>
                                    <div class="dropend">
                                        <a class="list-group-item list-group-item-action justify-content-between dropdown-toggle pe-3" href="blog-components">
                                            Blog components
                                            <span class="visually-hidden">post article</span>
                                        </a>
                                    </div>
                                    <div class="dropend">
                                        <a class="list-group-item list-group-item-action justify-content-between dropdown-toggle pe-3" href="breadcrumb">
                                            Breadcrumb
                                            <span class="visually-hidden">navigation links</span>
                                        </a>
                                    </div>
                                    <div class="dropend">
                                        <a class="list-group-item list-group-item-action justify-content-between dropdown-toggle pe-3" href="buttons">
                                            Buttons
                                            <span class="visually-hidden">navigation links</span>
                                        </a>
                                    </div>
                                    <div class="dropend">
                                        <a class="list-group-item list-group-item-action justify-content-between dropdown-toggle pe-3" href="button-group">
                                            Button group
                                            <span class="visually-hidden">navigation link</span>
                                        </a>
                                    </div>
                                    <div class="dropend">
                                        <a class="list-group-item list-group-item-action justify-content-between dropdown-toggle pe-3" href="card">
                                            Card
                                            <span class="visually-hidden">box container</span>
                                        </a>
                                    </div>
                                    <div class="dropend">
                                        <a class="list-group-item list-group-item-action justify-content-between dropdown-toggle pe-3" href="carousel">
                                            Carousel (Slider)
                                        </a>
                                    </div>
                                    <div class="dropend">
                                        <a class="list-group-item list-group-item-action justify-content-between dropdown-toggle pe-3" href="categories">
                                            Categories
                                            <span class="visually-hidden">listing directory filter links navigation cards</span>
                                        </a>
                                    </div>
                                    <div class="dropend">
                                        <a class="list-group-item list-group-item-action justify-content-between dropdown-toggle pe-3" href="collapse">
                                            Collapse
                                        </a>
                                    </div>
                                    <div class="dropend">
                                        <a class="list-group-item list-group-item-action justify-content-between dropdown-toggle pe-3" href="countdown">
                                            Countdown
                                            <span class="visually-hidden">timer</span>
                                        </a>
                                    </div>
                                    <div class="dropend">
                                        <a class="list-group-item list-group-item-action justify-content-between dropdown-toggle pe-3" href="date-picker">
                                            Date / time picker
                                            <span class="visually-hidden">calendar form control input select</span>
                                        </a>
                                    </div>
                                    <div class="dropend">
                                        <a class="list-group-item list-group-item-action justify-content-between dropdown-toggle pe-3" href="dropdowns">
                                            Dropdowns
                                            <span class="visually-hidden">navigation menu submenu overlay links dropend dropstart dropup</span>
                                        </a>
                                    </div>
                                    <div class="dropend">
                                        <a class="list-group-item list-group-item-action justify-content-between dropdown-toggle pe-3" href="filter-widgets">
                                            Filter widgets
                                            <span class="visually-hidden">sidebar sort</span>
                                        </a>
                                    </div>
                                    <div class="dropend">
                                        <a class="list-group-item list-group-item-action justify-content-between dropdown-toggle pe-3" href="forms">
                                            Forms
                                            <span class="visually-hidden">input select textarea checkbox radio range slider picker floating label validation control file switch quantity</span>
                                        </a>
                                    </div>
                                    <div class="dropend">
                                        <a class="list-group-item list-group-item-action justify-content-between dropdown-toggle pe-3" href="image-comparison-slider">
                                            Image comparison slider
                                        </a>
                                    </div>
                                    <div class="dropend">
                                        <a class="list-group-item list-group-item-action justify-content-between dropdown-toggle pe-3" href="input-group">
                                            Input group
                                            <span class="visually-hidden">form control select textarea addon</span>
                                        </a>
                                    </div>
                                    <div class="dropend">
                                        <a class="list-group-item list-group-item-action justify-content-between dropdown-toggle pe-3" href="input-formatter">
                                            Input text formatter
                                            <span class="visually-hidden">form control mask</span>
                                        </a>
                                    </div>
                                    <div class="dropend">
                                        <a class="list-group-item list-group-item-action justify-content-between dropdown-toggle pe-3" href="lightbox">
                                            Lightbox (Gallery)
                                            <span class="visually-hidden">popup modal overlay image picture video youtube vimeo iframe</span>
                                        </a>
                                    </div>
                                    <div class="dropend">
                                        <a class="list-group-item list-group-item-action justify-content-between dropdown-toggle pe-3" href="list-group">
                                            List group
                                            <span class="visually-hidden">navigation links menu ordered unordered</span>
                                        </a>
                                    </div>
                                    <div class="dropend">
                                        <a class="list-group-item list-group-item-action justify-content-between dropdown-toggle pe-3" href="listing-cards">
                                            Listing cards
                                            <span class="visually-hidden">product service item entry summary</span>
                                        </a>
                                    </div>
                                    <div class="dropend">
                                        <a class="list-group-item list-group-item-action justify-content-between dropdown-toggle pe-3" href="map">
                                            Map
                                            <span class="visually-hidden">location directions</span>
                                        </a>
                                    </div>
                                    <div class="dropend">
                                        <a class="list-group-item list-group-item-action justify-content-between dropdown-toggle pe-3" href="modal">
                                            Modal
                                            <span class="visually-hidden">dialog popup overlay lightbox</span>
                                        </a>
                                    </div>
                                    <div class="dropend">
                                        <a class="list-group-item list-group-item-action justify-content-between dropdown-toggle pe-3" href="nav-links">
                                            Nav links
                                            <span class="visually-hidden">navigation menu links</span>
                                        </a>
                                    </div>
                                    <div class="dropend">
                                        <a class="list-group-item list-group-item-action justify-content-between dropdown-toggle pe-3" href="navbar">
                                            Navbar
                                            <span class="visually-hidden">header navigation menu submenu links brand logo</span>
                                        </a>
                                    </div>
                                    <div class="dropend">
                                        <a class="list-group-item list-group-item-action justify-content-between dropdown-toggle pe-3" href="offcanvas">
                                            Offcanvas
                                            <span class="visually-hidden">drawer overlay sidebar</span>
                                        </a>
                                    </div>
                                    <div class="dropend">
                                        <a class="list-group-item list-group-item-action justify-content-between dropdown-toggle pe-3" href="pagination">
                                            Pagination
                                            <span class="visually-hidden">pager navigation links</span>
                                        </a>
                                    </div>
                                    <div class="dropend">
                                        <a class="list-group-item list-group-item-action justify-content-between dropdown-toggle pe-3" href="pills">
                                            Pills
                                            <span class="visually-hidden">navigation links tabs</span>
                                        </a>
                                    </div>
                                    <div class="dropend">
                                        <a class="list-group-item list-group-item-action justify-content-between dropdown-toggle pe-3" href="placeholders">
                                            Placeholders
                                            <span class="visually-hidden">loading loader</span>
                                        </a>
                                    </div>
                                    <div class="dropend">
                                        <a class="list-group-item list-group-item-action justify-content-between dropdown-toggle pe-3" href="popovers">
                                            Popovers
                                            <span class="visually-hidden">tooltip overlay popup</span>
                                        </a>
                                    </div>
                                    <div class="dropend">
                                        <a class="list-group-item list-group-item-action justify-content-between dropdown-toggle pe-3" href="pricing">
                                            Pricing
                                            <span class="visually-hidden">price cost subscription membership payment tier plan package</span>
                                        </a>
                                    </div>
                                    <div class="dropend">
                                        <a class="list-group-item list-group-item-action justify-content-between dropdown-toggle pe-3" href="progress">
                                            Progress
                                            <span class="visually-hidden">bars status circular</span>
                                        </a>
                                    </div>
                                    <div class="dropend">
                                        <a class="list-group-item list-group-item-action justify-content-between dropdown-toggle pe-3" href="reviews">
                                            Reviews
                                            <span class="visually-hidden">testimonials feedback stars rating</span>
                                        </a>
                                    </div>
                                    <div class="dropend">
                                        <a class="list-group-item list-group-item-action justify-content-between dropdown-toggle pe-3" href="scrollbar">
                                            Scrollbar
                                        </a>
                                    </div>
                                    <div class="dropend">
                                        <a class="list-group-item list-group-item-action justify-content-between dropdown-toggle pe-3" href="scrollspy">
                                            Scrollspy
                                            <span class="visually-hidden">anchor links navigation menu</span>
                                        </a>
                                    </div>
                                    <div class="dropend">
                                        <a class="list-group-item list-group-item-action justify-content-between dropdown-toggle pe-3" href="select-box">
                                            Select box
                                            <span class="visually-hidden">tags choices input form multiple control</span>
                                        </a>
                                    </div>
                                    <div class="dropend">
                                        <a class="list-group-item list-group-item-action justify-content-between dropdown-toggle pe-3" href="spinners">
                                            Spinners
                                            <span class="visually-hidden">loading loader</span>
                                        </a>
                                    </div>
                                    <div class="dropend">
                                        <a class="list-group-item list-group-item-action justify-content-between dropdown-toggle pe-3" href="tabs">
                                            Tabs
                                            <span class="visually-hidden">navigation links underline</span>
                                        </a>
                                    </div>
                                    <div class="dropend">
                                        <a class="list-group-item list-group-item-action justify-content-between dropdown-toggle pe-3" href="toasts">
                                            Toasts
                                            <span class="visually-hidden">notification overlay popup alert feedback</span>
                                        </a>
                                    </div>
                                    <div class="dropend">
                                        <a class="list-group-item list-group-item-action justify-content-between dropdown-toggle pe-3" href="tooltips">
                                            Tooltips
                                            <span class="visually-hidden">overlay popup popover</span>
                                        </a>
                                    </div>
                                    <h3 class="h6 d-flex align-items-center border-top pt-4 pb-1 mt-3 mb-2">
                                        <i class="fi-tool fs-lg text-warning me-2"></i>
                                        Utilities &amp; helpers
                                    </h3>
                                    <div class="dropend">
                                        <a class="list-group-item list-group-item-action justify-content-between dropdown-toggle pe-3" href="utilities">
                                            Finder utilities
                                            <span class="visually-hidden">border background cursor</span>
                                        </a>
                                    </div>
                                    <div class="dropend">
                                        <a class="list-group-item list-group-item-action justify-content-between dropdown-toggle pe-3" href="https://getbootstrap.com/docs/5.3/utilities/background/" target="_blank" rel="noreferrer">
                                            Bootstrap utilities
                                            <span class="visually-hidden">border background color text font size position weight display opacity flex space spacing align visibility overflow object float shadow</span>
                                        </a>
                                    </div>
                                    <div class="dropend">
                                        <a class="list-group-item list-group-item-action justify-content-between dropdown-toggle pe-3" href="https://getbootstrap.com/docs/5.3/helpers/clearfix/" target="_blank" rel="noreferrer">
                                            Bootstrap helpers
                                            <span class="visually-hidden">position ratio stacks stretched link focus truncation rule</span>
                                        </a>
                                    </div>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </aside>


            <!-- Page content -->
            <main class="col-lg-9 pt-1 pb-5 mb-sm-2 mb-md-3">

                <!-- Page title -->
                <section class="py-2 pb-3 pb-lg-4">
                    <span class="badge d-inline-flex align-items-center text-success bg-success-subtle fw-semibold text-decoration-none py-2 px-3 mb-2 rounded-pill">Getting started</span>
                    <h1 class="pt-1 mb-2">Performance: CLS &amp; Preload</h1>
                </section>


                <!-- Page content -->
                <section class="mb-3">
                    <p class="pb-2 mb-4">This article explores the implementation of several key techniques in Finder that enhance website loading performance and reduce Cumulative Layout Shift (CLS). These methods include preloading essential assets and effectively wrapping images and videos in Bootstrap's .ratio element to preserve aspect ratios.</p>
                    <h2 class="h4">Preloading assets</h2>
                    <p class="mb-4">Preloading assets is a critical technique used to instruct the browser to download and cache key resources early in the page load process. This ensures that fonts, icons, styles, and other content are available immediately when needed, reducing load times and preventing layout shifts. Below are examples of how Finder preloads web fonts and icon fonts:</p>
                    <div class="position-relative" data-bs-theme="dark">
                        <button type="button" class="btn btn-sm btn-outline-secondary bg-dark position-absolute top-0 end-0 mt-2 me-2 px-2 z-3" data-copy-code="#preload-assets-code">
                            <i class="fi-copy fs-sm me-1"></i>
                            Copy
                        </button>
                        <pre id="preload-assets-code" class="code-highlight border"><code class="language-html">&lt;!-- Preloaded local web font (Inter) --&gt;
        &lt;link rel=&quot;preload&quot; href=&quot;assets/fonts/inter-variable-latin.woff2&quot; as=&quot;font&quot; type=&quot;font/woff2&quot; crossorigin&gt;

        &lt;!-- Font icons --&gt;
        &lt;link rel=&quot;preload&quot; href=&quot;assets/icons/finder-icons.woff2&quot; as=&quot;font&quot; type=&quot;font/woff2&quot; crossorigin&gt;
        &lt;link rel=&quot;stylesheet&quot; href=&quot;assets/icons/finder-icons.min.css&quot;&gt;

        &lt;!-- Theme styles --&gt;
        &lt;link rel=&quot;preload&quot; href=&quot;assets/css/theme.min.css&quot; as=&quot;style&quot;&gt;
        &lt;link rel=&quot;stylesheet&quot; href=&quot;assets/css/theme.min.css&quot;&gt;</code></pre>
                    </div>
                    <p class="pt-4">By preloading these assets, Finder ensures that text and icons render instantly when the rest of the content loads, enhancing the perceived speed of the site and improving the user experience.</p>
                    <h2 class="h4 pt-4 mt-2">Using the <code>.ratio</code> element</h2>
                    <p class="mb-4">To further improve CLS, Finder utilizes Bootstrap's <code>.ratio</code> utility class, which helps maintain the aspect ratio of images and videos. This technique prevents layout shifts that occur when media loads and expands into its designated space. Here are examples of how the <code>.ratio</code> element is used for predefined and custom aspect ratios:</p>
                    <div class="position-relative" data-bs-theme="dark">
                        <button type="button" class="btn btn-sm btn-outline-secondary bg-dark position-absolute top-0 end-0 mt-2 me-2 px-2 z-3" data-copy-code="#ratio-code">
                            <i class="fi-copy fs-sm me-1"></i>
                            Copy
                        </button>
                        <pre id="ratio-code" class="code-highlight border"><code class="language-html">&lt;!-- Predefined ratio --&gt;
        &lt;div class=&quot;ratio ratio-4x3&quot;&gt;
            &lt;img src=&quot;...&quot; alt=&quot;...&quot;&gt;
        &lt;/div&gt;

        &lt;!-- Custom ratio --&gt;
        &lt;!-- Aspect ratio formula: imageHeight / imageWidth * 100% --&gt;
        &lt;div class=&quot;ratio&quot; style=&quot;--fn-aspect-ratio: calc(306 / 416 * 100%)&quot;&gt;
            &lt;img src=&quot;...&quot; alt=&quot;...&quot;&gt;
        &lt;/div&gt;</code></pre>
                    </div>
                    <p class="pt-4 mb-0">These examples show how the .ratio element can be used to ensure that the space for an image or video is reserved, regardless of whether the media has finished loading. This method significantly reduces CLS by stabilizing the layout as the rest of the page continues to load.</p>
                </section>
            </main>
        </div>
    </div>


    <!-- Back to top button -->
    <div class="floating-buttons position-fixed top-50 end-0 z-sticky me-3 me-xl-4 pb-4">
        <a class="btn-scroll-top btn btn-sm bg-body border-0 rounded-pill shadow animate-slide-end" href="#top">
            Top
            <i class="fi-arrow-right fs-base ms-1 me-n1 animate-target"></i>
            <span class="position-absolute top-0 start-0 w-100 h-100 border rounded-pill z-0"></span>
            <svg class="position-absolute top-0 start-0 w-100 h-100 z-1" viewBox="0 0 62 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect x=".75" y=".75" width="60.5" height="30.5" rx="15.25" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" />
            </svg>
        </a>
    </div>
@endsection

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/highlight.min.js"></script>
    <script src="{{ asset('assets/vendor/simplebar/dist/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/list.js/dist/list.min.js') }}"></script>
    @vite(['resources/js/app.js'])

    <!-- Docs specific scripts -->
    <script type="module">
        import * as bootstrap from 'bootstrap'
        const sidebar = new bootstrap.Offcanvas('#sidebarNav')
        const closeSidebar = () => {
            setTimeout(() => {
                sidebar.hide()
            }, 500)
        }
        (() => {
            const scrollable = document.getElementById('scrollable')
            const simplebar = new SimpleBar(scrollable)
            const anchor = scrollable.querySelector('.list-group-item.active')
            if (anchor === null) return
            simplebar.getScrollElement().scrollTo({
                top: anchor.parentNode.offsetTop,
                behavior: 'instant'
            })
        })()
    </script>
@endpush