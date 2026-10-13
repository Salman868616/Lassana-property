@extends('layouts.app')

@section('title', 'Finder Docs | Icons')

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
                            <a class="nav-link" href="installation">Docs</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="typography">Components</a>
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
                            <input type="search" class="docs-search form-control form-icon-start form-icon-end" placeholder="Quick search...">
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
                                        <a class="list-group-item list-group-item-action justify-content-between dropdown-toggle text-wrap pe-3" href="npm-scripts">
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
                                        <a class="list-group-item list-group-item-action justify-content-between dropdown-toggle pe-3" href="web-font">
                                            Web font(s)
                                        </a>
                                    </div>
                                    <div class="dropend">
                                        <a class="list-group-item list-group-item-action justify-content-between dropdown-toggle pe-3" href="icon-font">
                                            Icon font
                                        </a>
                                    </div>
                                    <div class="dropend">
                                        <a class="list-group-item list-group-item-action justify-content-between dropdown-toggle pe-3" href="performance">
                                            Performance: CLS &amp; Preload
                                            <span class="visually-hidden">cumulative layout shift loading aspect-ratio</span>
                                        </a>
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
                                        <a class="list-group-item list-group-item-action justify-content-between dropdown-toggle pe-3 text-wrap" href="color-modes">
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
                                    <div class="dropdown">
                                        <span class="list-group-item list-group-item-action justify-content-between dropdown-toggle pe-3 active pe-none">Icons</span>
                                        <ul id="anchorNav" class="nav nav-underline flex-column border-start ms-2 my-2" style="gap: .25rem;">
                                            <li class="nav-item"><a class="nav-link fw-normal" href="#icons-ui">UI icons</a></li>
                                            <li class="nav-item"><a class="nav-link fw-normal" href="#icons-brand">Brand icons</a></li>
                                            <li class="nav-item"><a class="nav-link fw-normal" href="#icons-animation">Animate on hover</a></li>
                                        </ul>
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
                <section class="py-2 pb-sm-3">
                    <span class="badge d-inline-flex align-items-center text-info bg-info-subtle fw-semibold text-decoration-none py-2 px-3 mb-2 rounded-pill">Finder component</span>
                    <h1 class="pt-1">Icons</h1>
                    <p class="text-body-secondary mb-4">A collection of vector icons available in font format. The respective CSS class is listed below each icon.</p>
                </section>


                <!-- UI icons -->
                <section id="icons-ui" class="docs-section pb-sm-2 mb-5" data-filter-list='{"searchClass": "ui-icons-search", "listClass": "ui-icons-list", "valueNames": ["icon-name"]}'>
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <h4 class="mb-0 me-3">UI icons</h4>
                        <div class="position-relative">
                            <i class="fi-search position-absolute top-50 start-0 translate-middle-y ms-3"></i>
                            <input type="search" class="ui-icons-search form-control form-icon-start" placeholder="Search icons">
                        </div>
                    </div>
                    <div class="ui-icons-list row row-cols-2 row-cols-sm-3 row-cols-md-4 g-3">
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-activity">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-activity fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-activity</p>
                                    <pre id="fi-activity" class="visually-hidden"><code>&lt;i class=&quot;fi-activity&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-airplay">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-airplay fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-airplay</p>
                                    <pre id="fi-airplay" class="visually-hidden"><code>&lt;i class=&quot;fi-airplay&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-alert-circle">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-alert-circle fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-alert-circle</p>
                                    <pre id="fi-alert-circle" class="visually-hidden"><code>&lt;i class=&quot;fi-alert-circle&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-alert-octagon">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-alert-octagon fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-alert-octagon</p>
                                    <pre id="fi-alert-octagon" class="visually-hidden"><code>&lt;i class=&quot;fi-alert-octagon&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-alert-triangle">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-alert-triangle fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-alert-triangle</p>
                                    <pre id="fi-alert-triangle" class="visually-hidden"><code>&lt;i class=&quot;fi-alert-triangle&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-align-center">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-align-center fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-align-center</p>
                                    <pre id="fi-align-center" class="visually-hidden"><code>&lt;i class=&quot;fi-align-center&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-align-justify">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-align-justify fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-align-justify</p>
                                    <pre id="fi-align-justify" class="visually-hidden"><code>&lt;i class=&quot;fi-align-justify&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-align-left">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-align-left fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-align-left</p>
                                    <pre id="fi-align-left" class="visually-hidden"><code>&lt;i class=&quot;fi-align-left&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-align-right">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-align-right fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-align-right</p>
                                    <pre id="fi-align-right" class="visually-hidden"><code>&lt;i class=&quot;fi-align-right&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-anchor">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-anchor fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-anchor</p>
                                    <pre id="fi-anchor" class="visually-hidden"><code>&lt;i class=&quot;fi-anchor&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-aperture">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-aperture fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-aperture</p>
                                    <pre id="fi-aperture" class="visually-hidden"><code>&lt;i class=&quot;fi-aperture&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-archive">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-archive fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-archive</p>
                                    <pre id="fi-archive" class="visually-hidden"><code>&lt;i class=&quot;fi-archive&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-armchair">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-armchair fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-armchair</p>
                                    <pre id="fi-armchair" class="visually-hidden"><code>&lt;i class=&quot;fi-armchair&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-arrow-down-circle">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-arrow-down-circle fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-arrow-down-circle</p>
                                    <pre id="fi-arrow-down-circle" class="visually-hidden"><code>&lt;i class=&quot;fi-arrow-down-circle&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-arrow-down-left">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-arrow-down-left fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-arrow-down-left</p>
                                    <pre id="fi-arrow-down-left" class="visually-hidden"><code>&lt;i class=&quot;fi-arrow-down-left&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-arrow-down-right">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-arrow-down-right fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-arrow-down-right</p>
                                    <pre id="fi-arrow-down-right" class="visually-hidden"><code>&lt;i class=&quot;fi-arrow-down-right&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-arrow-down">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-arrow-down fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-arrow-down</p>
                                    <pre id="fi-arrow-down" class="visually-hidden"><code>&lt;i class=&quot;fi-arrow-down&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-arrow-left-circle">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-arrow-left-circle fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-arrow-left-circle</p>
                                    <pre id="fi-arrow-left-circle" class="visually-hidden"><code>&lt;i class=&quot;fi-arrow-left-circle&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-arrow-left">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-arrow-left fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-arrow-left</p>
                                    <pre id="fi-arrow-left" class="visually-hidden"><code>&lt;i class=&quot;fi-arrow-left&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-arrow-right-circle">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-arrow-right-circle fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-arrow-right-circle</p>
                                    <pre id="fi-arrow-right-circle" class="visually-hidden"><code>&lt;i class=&quot;fi-arrow-right-circle&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-arrow-right">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-arrow-right fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-arrow-right</p>
                                    <pre id="fi-arrow-right" class="visually-hidden"><code>&lt;i class=&quot;fi-arrow-right&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-arrow-up-circle">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-arrow-up-circle fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-arrow-up-circle</p>
                                    <pre id="fi-arrow-up-circle" class="visually-hidden"><code>&lt;i class=&quot;fi-arrow-up-circle&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-arrow-up-left">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-arrow-up-left fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-arrow-up-left</p>
                                    <pre id="fi-arrow-up-left" class="visually-hidden"><code>&lt;i class=&quot;fi-arrow-up-left&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-arrow-up-right">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-arrow-up-right fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-arrow-up-right</p>
                                    <pre id="fi-arrow-up-right" class="visually-hidden"><code>&lt;i class=&quot;fi-arrow-up-right&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-arrow-up">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-arrow-up fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-arrow-up</p>
                                    <pre id="fi-arrow-up" class="visually-hidden"><code>&lt;i class=&quot;fi-arrow-up&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-at-sign">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-at-sign fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-at-sign</p>
                                    <pre id="fi-at-sign" class="visually-hidden"><code>&lt;i class=&quot;fi-at-sign&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-auto">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-auto fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-auto<span class="visually-hidden">contrast</span></p>
                                    <pre id="fi-auto" class="visually-hidden"><code>&lt;i class=&quot;fi-auto&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-avocado">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-avocado fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-avocado</p>
                                    <pre id="fi-avocado" class="visually-hidden"><code>&lt;i class=&quot;fi-avocado&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-award">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-award fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-award</p>
                                    <pre id="fi-award" class="visually-hidden"><code>&lt;i class=&quot;fi-award&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-baby">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-baby fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-baby<span class="visually-hidden">kids children</span></p>
                                    <pre id="fi-baby" class="visually-hidden"><code>&lt;i class=&quot;fi-baby&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-banned">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-banned fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-banned<span class="visually-hidden">forbidden</span></p>
                                    <pre id="fi-banned" class="visually-hidden"><code>&lt;i class=&quot;fi-banned&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-bar-chart">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-bar-chart fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-bar-chart</p>
                                    <pre id="fi-bar-chart" class="visually-hidden"><code>&lt;i class=&quot;fi-bar-chart&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-bar-chart-2">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-bar-chart-2 fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-bar-chart-2</p>
                                    <pre id="fi-bar-chart-2" class="visually-hidden"><code>&lt;i class=&quot;fi-bar-chart-2&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-battery">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-battery fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-battery</p>
                                    <pre id="fi-battery" class="visually-hidden"><code>&lt;i class=&quot;fi-battery&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-battery-charging">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-battery-charging fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-battery-charging</p>
                                    <pre id="fi-battery-charging" class="visually-hidden"><code>&lt;i class=&quot;fi-battery-charging&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-battery-2">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-battery-2 fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-battery-2</p>
                                    <pre id="fi-battery-2" class="visually-hidden"><code>&lt;i class=&quot;fi-battery-2&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-bed">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-bed fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-bed<span class="visually-hidden">notification</span></p>
                                    <pre id="fi-bed" class="visually-hidden"><code>&lt;i class=&quot;fi-bed&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-bed-double">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-bed-double fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-bed-double<span class="visually-hidden">notification</span></p>
                                    <pre id="fi-bed-double" class="visually-hidden"><code>&lt;i class=&quot;fi-bed-double&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-bed-single">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-bed-single fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-bed-single<span class="visually-hidden">notification</span></p>
                                    <pre id="fi-bed-single" class="visually-hidden"><code>&lt;i class=&quot;fi-bed-single&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-bell">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-bell fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-bell<span class="visually-hidden">notification</span></p>
                                    <pre id="fi-bell" class="visually-hidden"><code>&lt;i class=&quot;fi-bell&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-bell-off">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-bell-off fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-bell-off<span class="visually-hidden">notification</span></p>
                                    <pre id="fi-bell-off" class="visually-hidden"><code>&lt;i class=&quot;fi-bell-off&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-bicycle">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-bicycle fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-bicycle</p>
                                    <pre id="fi-bicycle" class="visually-hidden"><code>&lt;i class=&quot;fi-bicycle&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-bluetooth">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-bluetooth fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-bluetooth</p>
                                    <pre id="fi-bluetooth" class="visually-hidden"><code>&lt;i class=&quot;fi-bluetooth&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-bold">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-bold fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-bold</p>
                                    <pre id="fi-bold" class="visually-hidden"><code>&lt;i class=&quot;fi-bold&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-book">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-book fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-book</p>
                                    <pre id="fi-book" class="visually-hidden"><code>&lt;i class=&quot;fi-book&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-book-open">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-book-open fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-book-open</p>
                                    <pre id="fi-book-open" class="visually-hidden"><code>&lt;i class=&quot;fi-book-open&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-bookmark">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-bookmark fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-bookmark</p>
                                    <pre id="fi-bookmark" class="visually-hidden"><code>&lt;i class=&quot;fi-bookmark&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-bookmark-filled">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-bookmark-filled fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-bookmark-filled</p>
                                    <pre id="fi-bookmark-filled" class="visually-hidden"><code>&lt;i class=&quot;fi-bookmark-filled&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-bowl-food">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-bowl-food fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-bowl-food</p>
                                    <pre id="fi-bowl-food" class="visually-hidden"><code>&lt;i class=&quot;fi-bowl-food&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-box">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-box fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-box</p>
                                    <pre id="fi-box" class="visually-hidden"><code>&lt;i class=&quot;fi-box&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-briefcase">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-briefcase fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-briefcase</p>
                                    <pre id="fi-briefcase" class="visually-hidden"><code>&lt;i class=&quot;fi-briefcase&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-bullet">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-bullet fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-bullet<span class="visually-hidden">dot</span></p>
                                    <pre id="fi-bullet" class="visually-hidden"><code>&lt;i class=&quot;fi-bullet&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-calendar">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-calendar fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-calendar<span class="visually-hidden">date</span></p>
                                    <pre id="fi-calendar" class="visually-hidden"><code>&lt;i class=&quot;fi-calendar&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-camera">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-camera fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-camera</p>
                                    <pre id="fi-camera" class="visually-hidden"><code>&lt;i class=&quot;fi-camera&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-camera-off">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-camera-off fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-camera-off</p>
                                    <pre id="fi-camera-off" class="visually-hidden"><code>&lt;i class=&quot;fi-camera-off&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-car">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-car fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-car</p>
                                    <pre id="fi-car" class="visually-hidden"><code>&lt;i class=&quot;fi-car&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-car-garage">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-car-garage fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-car-garage</p>
                                    <pre id="fi-car-garage" class="visually-hidden"><code>&lt;i class=&quot;fi-car-garage&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-case-medicine">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-case-medicine fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-case-medicine<span class="visually-hidden">doctor healthcare</span></p>
                                    <pre id="fi-case-medicine" class="visually-hidden"><code>&lt;i class=&quot;fi-case-medicine&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-cast">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-cast fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-cast</p>
                                    <pre id="fi-cast" class="visually-hidden"><code>&lt;i class=&quot;fi-cast&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-cctv">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-cctv fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-cctv<span class="visually-hidden">camera surveillance</span></p>
                                    <pre id="fi-cctv" class="visually-hidden"><code>&lt;i class=&quot;fi-cctv&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-chat">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-chat fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-chat</p>
                                    <pre id="fi-chat" class="visually-hidden"><code>&lt;i class=&quot;fi-chat&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-check">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-check fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-check</p>
                                    <pre id="fi-check" class="visually-hidden"><code>&lt;i class=&quot;fi-check&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-check-circle">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-check-circle fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-check-circle</p>
                                    <pre id="fi-check-circle" class="visually-hidden"><code>&lt;i class=&quot;fi-check-circle&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-check-shield">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-check-shield fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-check-shield</p>
                                    <pre id="fi-check-shield" class="visually-hidden"><code>&lt;i class=&quot;fi-check-shield&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-check-square">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-check-square fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-check-square</p>
                                    <pre id="fi-check-square" class="visually-hidden"><code>&lt;i class=&quot;fi-check-square&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-chevron-down">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-chevron-down fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-chevron-down</p>
                                    <pre id="fi-chevron-down" class="visually-hidden"><code>&lt;i class=&quot;fi-chevron-down&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-chevron-left">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-chevron-left fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-chevron-left</p>
                                    <pre id="fi-chevron-left" class="visually-hidden"><code>&lt;i class=&quot;fi-chevron-left&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-chevron-right">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-chevron-right fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-chevron-right</p>
                                    <pre id="fi-chevron-right" class="visually-hidden"><code>&lt;i class=&quot;fi-chevron-right&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-chevron-up">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-chevron-up fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-chevron-up</p>
                                    <pre id="fi-chevron-up" class="visually-hidden"><code>&lt;i class=&quot;fi-chevron-up&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-chevrons-down">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-chevrons-down fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-chevrons-down</p>
                                    <pre id="fi-chevrons-down" class="visually-hidden"><code>&lt;i class=&quot;fi-chevrons-down&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-chevrons-left">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-chevrons-left fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-chevrons-left</p>
                                    <pre id="fi-chevrons-left" class="visually-hidden"><code>&lt;i class=&quot;fi-chevrons-left&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-chevrons-right">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-chevrons-right fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-chevrons-right</p>
                                    <pre id="fi-chevrons-right" class="visually-hidden"><code>&lt;i class=&quot;fi-chevrons-right&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-clipboard">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-clipboard fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-clipboard</p>
                                    <pre id="fi-clipboard" class="visually-hidden"><code>&lt;i class=&quot;fi-clipboard&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-clock">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-clock fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-clock<span class="visually-hidden">time</span></p>
                                    <pre id="fi-clock" class="visually-hidden"><code>&lt;i class=&quot;fi-clock&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-cloud">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-cloud fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-cloud</p>
                                    <pre id="fi-cloud" class="visually-hidden"><code>&lt;i class=&quot;fi-cloud&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-cloud-off">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-cloud-off fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-cloud-off</p>
                                    <pre id="fi-cloud-off" class="visually-hidden"><code>&lt;i class=&quot;fi-cloud-off&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-cloud-drizzle">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-cloud-drizzle fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-cloud-drizzle</p>
                                    <pre id="fi-cloud-drizzle" class="visually-hidden"><code>&lt;i class=&quot;fi-cloud-drizzle&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-cloud-lightning">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-cloud-lightning fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-cloud-lightning</p>
                                    <pre id="fi-cloud-lightning" class="visually-hidden"><code>&lt;i class=&quot;fi-cloud-lightning&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-cloud-rain">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-cloud-rain fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-cloud-rain</p>
                                    <pre id="fi-cloud-rain" class="visually-hidden"><code>&lt;i class=&quot;fi-cloud-rain&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-cloud-snow">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-cloud-snow fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-cloud-snow</p>
                                    <pre id="fi-cloud-snow" class="visually-hidden"><code>&lt;i class=&quot;fi-cloud-snow&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-code">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-code fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-code</p>
                                    <pre id="fi-code" class="visually-hidden"><code>&lt;i class=&quot;fi-code&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-coffee">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-coffee fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-coffee<span class="visually-hidden">mug cup</span></p>
                                    <pre id="fi-coffee" class="visually-hidden"><code>&lt;i class=&quot;fi-coffee&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-coffee-2">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-coffee-2 fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-coffee-2<span class="visually-hidden">mug cup</span></p>
                                    <pre id="fi-coffee-2" class="visually-hidden"><code>&lt;i class=&quot;fi-coffee-2&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-columns">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-columns fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-columns</p>
                                    <pre id="fi-columns" class="visually-hidden"><code>&lt;i class=&quot;fi-columns&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-command">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-command fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-command</p>
                                    <pre id="fi-command" class="visually-hidden"><code>&lt;i class=&quot;fi-command&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-compass">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-compass fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-compass</p>
                                    <pre id="fi-compass" class="visually-hidden"><code>&lt;i class=&quot;fi-compass&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-computer">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-computer fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-computer<span class="visually-hidden">laptop</span></p>
                                    <pre id="fi-computer" class="visually-hidden"><code>&lt;i class=&quot;fi-computer&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-copy">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-copy fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-copy</p>
                                    <pre id="fi-copy" class="visually-hidden"><code>&lt;i class=&quot;fi-copy&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-corner-down-left">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-corner-down-left fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-corner-down-left<span class="visually-hidden">arrow</span></p>
                                    <pre id="fi-corner-down-left" class="visually-hidden"><code>&lt;i class=&quot;fi-corner-down-left&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-corner-down-right">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-corner-down-right fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-corner-down-right<span class="visually-hidden">arrow</span></p>
                                    <pre id="fi-corner-down-right" class="visually-hidden"><code>&lt;i class=&quot;fi-corner-down-right&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-corner-left-down">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-corner-left-down fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-corner-left-down<span class="visually-hidden">arrow</span></p>
                                    <pre id="fi-corner-left-down" class="visually-hidden"><code>&lt;i class=&quot;fi-corner-left-down&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-corner-left-up">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-corner-left-up fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-corner-left-up<span class="visually-hidden">arrow</span></p>
                                    <pre id="fi-corner-left-up" class="visually-hidden"><code>&lt;i class=&quot;fi-corner-left-up&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-corner-right-down">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-corner-right-down fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-corner-right-down<span class="visually-hidden">arrow</span></p>
                                    <pre id="fi-corner-right-down" class="visually-hidden"><code>&lt;i class=&quot;fi-corner-right-down&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-corner-right-up">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-corner-right-up fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-corner-right-up<span class="visually-hidden">arrow</span></p>
                                    <pre id="fi-corner-right-up" class="visually-hidden"><code>&lt;i class=&quot;fi-corner-right-up&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-corner-up-left">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-corner-up-left fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-corner-up-left<span class="visually-hidden">arrow</span></p>
                                    <pre id="fi-corner-up-left" class="visually-hidden"><code>&lt;i class=&quot;fi-corner-up-left&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-corner-up-right">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-corner-up-right fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-corner-up-right<span class="visually-hidden">arrow</span></p>
                                    <pre id="fi-corner-up-right" class="visually-hidden"><code>&lt;i class=&quot;fi-corner-up-right&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-credit-card">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-credit-card fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-credit-card</p>
                                    <pre id="fi-credit-card" class="visually-hidden"><code>&lt;i class=&quot;fi-credit-card&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-crop">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-crop fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-crop</p>
                                    <pre id="fi-crop" class="visually-hidden"><code>&lt;i class=&quot;fi-crop&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-crosshair">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-crosshair fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-crosshair<span class="visually-hidden">aim</span></p>
                                    <pre id="fi-crosshair" class="visually-hidden"><code>&lt;i class=&quot;fi-crosshair&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-database">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-database fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-database</p>
                                    <pre id="fi-database" class="visually-hidden"><code>&lt;i class=&quot;fi-database&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-delete">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-delete fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-delete<span class="visually-hidden">backspace</span></p>
                                    <pre id="fi-delete" class="visually-hidden"><code>&lt;i class=&quot;fi-delete&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-delivery">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-delivery fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-delivery<span class="visually-hidden">truck car</span></p>
                                    <pre id="fi-delivery" class="visually-hidden"><code>&lt;i class=&quot;fi-delivery&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-delivery-2">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-delivery-2 fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-delivery-2<span class="visually-hidden">truck car</span></p>
                                    <pre id="fi-delivery-2" class="visually-hidden"><code>&lt;i class=&quot;fi-delivery-2&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-disc">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-disc fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-disc</p>
                                    <pre id="fi-disc" class="visually-hidden"><code>&lt;i class=&quot;fi-disc&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-dishwasher">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-dishwasher fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-dishwasher</p>
                                    <pre id="fi-dishwasher" class="visually-hidden"><code>&lt;i class=&quot;fi-dishwasher&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-divide">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-divide fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-divide</p>
                                    <pre id="fi-divide" class="visually-hidden"><code>&lt;i class=&quot;fi-divide&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-document-search">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-document-search fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-document-search</p>
                                    <pre id="fi-document-search" class="visually-hidden"><code>&lt;i class=&quot;fi-document-search&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-dollar-sign">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-dollar-sign fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-dollar-sign</p>
                                    <pre id="fi-dollar-sign" class="visually-hidden"><code>&lt;i class=&quot;fi-dollar-sign&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-download">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-download fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-download</p>
                                    <pre id="fi-download" class="visually-hidden"><code>&lt;i class=&quot;fi-download&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-download-cloud">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-download-cloud fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-download-cloud</p>
                                    <pre id="fi-download-cloud" class="visually-hidden"><code>&lt;i class=&quot;fi-download-cloud&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-dresser">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-dresser fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-dresser<span class="visually-hidden">closet cabinet locker cupboard</span></p>
                                    <pre id="fi-dresser" class="visually-hidden"><code>&lt;i class=&quot;fi-dresser&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-droplet">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-droplet fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-droplet</p>
                                    <pre id="fi-droplet" class="visually-hidden"><code>&lt;i class=&quot;fi-droplet&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-edit">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-edit fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-edit</p>
                                    <pre id="fi-edit" class="visually-hidden"><code>&lt;i class=&quot;fi-edit&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-edit-2">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-edit-2 fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-edit-2</p>
                                    <pre id="fi-edit-2" class="visually-hidden"><code>&lt;i class=&quot;fi-edit-2&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-edit-3">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-edit-3 fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-edit-3</p>
                                    <pre id="fi-edit-3" class="visually-hidden"><code>&lt;i class=&quot;fi-edit-3&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-external-link">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-external-link fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-external-link</p>
                                    <pre id="fi-external-link" class="visually-hidden"><code>&lt;i class=&quot;fi-external-link&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-eye">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-eye fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-eye</p>
                                    <pre id="fi-eye" class="visually-hidden"><code>&lt;i class=&quot;fi-eye&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-eye-off">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-eye-off fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-eye-off</p>
                                    <pre id="fi-eye-off" class="visually-hidden"><code>&lt;i class=&quot;fi-eye-off&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-fast-forward">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-fast-forward fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-fast-forward</p>
                                    <pre id="fi-fast-forward" class="visually-hidden"><code>&lt;i class=&quot;fi-fast-forward&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-feather">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-feather fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-feather</p>
                                    <pre id="fi-feather" class="visually-hidden"><code>&lt;i class=&quot;fi-feather&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-file">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-file fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-file</p>
                                    <pre id="fi-file" class="visually-hidden"><code>&lt;i class=&quot;fi-file&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-file-minus">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-file-minus fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-file-minus</p>
                                    <pre id="fi-file-minus" class="visually-hidden"><code>&lt;i class=&quot;fi-file-minus&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-file-plus">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-file-plus fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-file-plus</p>
                                    <pre id="fi-file-plus" class="visually-hidden"><code>&lt;i class=&quot;fi-file-plus&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-file-text">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-file-text fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-file-text</p>
                                    <pre id="fi-file-text" class="visually-hidden"><code>&lt;i class=&quot;fi-file-text&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-film">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-film fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-film</p>
                                    <pre id="fi-film" class="visually-hidden"><code>&lt;i class=&quot;fi-film&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-filter">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-filter fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-filter</p>
                                    <pre id="fi-filter" class="visually-hidden"><code>&lt;i class=&quot;fi-filter&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-flag">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-flag fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-flag</p>
                                    <pre id="fi-flag" class="visually-hidden"><code>&lt;i class=&quot;fi-flag&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-folder">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-folder fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-folder</p>
                                    <pre id="fi-folder" class="visually-hidden"><code>&lt;i class=&quot;fi-folder&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-folder-minus">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-folder-minus fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-folder-minus</p>
                                    <pre id="fi-folder-minus" class="visually-hidden"><code>&lt;i class=&quot;fi-folder-minus&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-folder-plus">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-folder-plus fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-folder-plus</p>
                                    <pre id="fi-folder-plus" class="visually-hidden"><code>&lt;i class=&quot;fi-folder-plus&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-food">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-food fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-food<span class="visually-hidden">meal cook</span></p>
                                    <pre id="fi-food" class="visually-hidden"><code>&lt;i class=&quot;fi-food&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-footprints">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-footprints fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-footprints</p>
                                    <pre id="fi-footprints" class="visually-hidden"><code>&lt;i class=&quot;fi-footprints&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-fork-knife">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-fork-knife fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-fork-knife</p>
                                    <pre id="fi-fork-knife" class="visually-hidden"><code>&lt;i class=&quot;fi-fork-knife&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-frown">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-frown fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-frown<span class="visually-hidden">emoji sad</span></p>
                                    <pre id="fi-frown" class="visually-hidden"><code>&lt;i class=&quot;fi-frown&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-game">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-game fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-game</p>
                                    <pre id="fi-game" class="visually-hidden"><code>&lt;i class=&quot;fi-game&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-garage">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-garage fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-garage</p>
                                    <pre id="fi-garage" class="visually-hidden"><code>&lt;i class=&quot;fi-garage&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-gas-pump">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-gas-pump fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-gas-pump</p>
                                    <pre id="fi-gas-pump" class="visually-hidden"><code>&lt;i class=&quot;fi-gas-pump&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-gearbox">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-gearbox fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-gearbox</p>
                                    <pre id="fi-gearbox" class="visually-hidden"><code>&lt;i class=&quot;fi-gearbox&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-gift">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-gift fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-gift</p>
                                    <pre id="fi-gift" class="visually-hidden"><code>&lt;i class=&quot;fi-gift&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-globe">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-globe fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-globe</p>
                                    <pre id="fi-globe" class="visually-hidden"><code>&lt;i class=&quot;fi-globe&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-gluten-free">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-gluten-free fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-gluten-free</p>
                                    <pre id="fi-gluten-free" class="visually-hidden"><code>&lt;i class=&quot;fi-gluten-free&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-graduation-cap">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-graduation-cap fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-graduation-cap<span class="visually-hidden">student university</span></p>
                                    <pre id="fi-graduation-cap" class="visually-hidden"><code>&lt;i class=&quot;fi-graduation-cap&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-grid">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-grid fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-grid</p>
                                    <pre id="fi-grid" class="visually-hidden"><code>&lt;i class=&quot;fi-grid&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-hanger">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-hanger fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-hanger<span class="visually-hidden">hanger</span></p>
                                    <pre id="fi-hanger" class="visually-hidden"><code>&lt;i class=&quot;fi-hanger&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-hard-drive">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-hard-drive fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-hard-drive</p>
                                    <pre id="fi-hard-drive" class="visually-hidden"><code>&lt;i class=&quot;fi-hard-drive&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-hash">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-hash fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-hash</p>
                                    <pre id="fi-hash" class="visually-hidden"><code>&lt;i class=&quot;fi-hash&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-headphones">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-headphones fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-headphones</p>
                                    <pre id="fi-headphones" class="visually-hidden"><code>&lt;i class=&quot;fi-headphones&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-heart">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-heart fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-heart</p>
                                    <pre id="fi-heart" class="visually-hidden"><code>&lt;i class=&quot;fi-heart&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-heart-filled">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-heart-filled fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-heart-filled</p>
                                    <pre id="fi-heart-filled" class="visually-hidden"><code>&lt;i class=&quot;fi-heart-filled&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-help-circle">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-help-circle fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-help-circle</p>
                                    <pre id="fi-help-circle" class="visually-hidden"><code>&lt;i class=&quot;fi-help-circle&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-home">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-home fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-home</p>
                                    <pre id="fi-home" class="visually-hidden"><code>&lt;i class=&quot;fi-home&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-id-card">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-id-card fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-id-card<span class="visually-hidden">passport</span></p>
                                    <pre id="fi-id-card" class="visually-hidden"><code>&lt;i class=&quot;fi-id-card&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-image">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-image fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-image<span class="visually-hidden">picture photo</span></p>
                                    <pre id="fi-image" class="visually-hidden"><code>&lt;i class=&quot;fi-image&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-inbox">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-inbox fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-inbox</p>
                                    <pre id="fi-inbox" class="visually-hidden"><code>&lt;i class=&quot;fi-inbox&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-info">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-info fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-info</p>
                                    <pre id="fi-info" class="visually-hidden"><code>&lt;i class=&quot;fi-info&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-iron">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-iron fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-iron</p>
                                    <pre id="fi-iron" class="visually-hidden"><code>&lt;i class=&quot;fi-iron&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-italic">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-italic fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-italic</p>
                                    <pre id="fi-italic" class="visually-hidden"><code>&lt;i class=&quot;fi-italic&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-key">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-key fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-key</p>
                                    <pre id="fi-key" class="visually-hidden"><code>&lt;i class=&quot;fi-key&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-lamp-pendant">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-lamp-pendant fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-lamp-pendant</p>
                                    <pre id="fi-lamp-pendant" class="visually-hidden"><code>&lt;i class=&quot;fi-lamp-pendant&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-layers">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-layers fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-layers</p>
                                    <pre id="fi-layers" class="visually-hidden"><code>&lt;i class=&quot;fi-layers&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-layout">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-layout fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-layout</p>
                                    <pre id="fi-layout" class="visually-hidden"><code>&lt;i class=&quot;fi-layout&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-leaf">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-leaf fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-leaf<span class="visually-hidden">eco sustainable plant</span></p>
                                    <pre id="fi-leaf" class="visually-hidden"><code>&lt;i class=&quot;fi-leaf&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-life-buoy">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-life-buoy fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-life-buoy<span class="visually-hidden">support</span></p>
                                    <pre id="fi-life-buoy" class="visually-hidden"><code>&lt;i class=&quot;fi-life-buoy&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-lightbulb">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-lightbulb fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-lightbulb</p>
                                    <pre id="fi-lightbulb" class="visually-hidden"><code>&lt;i class=&quot;fi-lightbulb&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-link">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-link fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-link</p>
                                    <pre id="fi-link" class="visually-hidden"><code>&lt;i class=&quot;fi-link&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-link-2">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-link-2 fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-link-2</p>
                                    <pre id="fi-link-2" class="visually-hidden"><code>&lt;i class=&quot;fi-link-2&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-list">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-list fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-list</p>
                                    <pre id="fi-list" class="visually-hidden"><code>&lt;i class=&quot;fi-list&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-loader">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-loader fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-loader</p>
                                    <pre id="fi-loader" class="visually-hidden"><code>&lt;i class=&quot;fi-loader&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-lock">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-lock fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-lock</p>
                                    <pre id="fi-lock" class="visually-hidden"><code>&lt;i class=&quot;fi-lock&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-log-in">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-log-in fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-log-in<span class="visually-hidden">login signin</span></p>
                                    <pre id="fi-log-in" class="visually-hidden"><code>&lt;i class=&quot;fi-log-in&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-log-out">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-log-out fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-log-out<span class="visually-hidden">logout signout</span></p>
                                    <pre id="fi-log-out" class="visually-hidden"><code>&lt;i class=&quot;fi-log-out&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-mail">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-mail fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-mail<span class="visually-hidden">envelope email</span></p>
                                    <pre id="fi-mail" class="visually-hidden"><code>&lt;i class=&quot;fi-mail&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-map">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-map fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-map</p>
                                    <pre id="fi-map" class="visually-hidden"><code>&lt;i class=&quot;fi-map&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-map-pin">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-map-pin fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-map-pin<span class="visually-hidden">location</span></p>
                                    <pre id="fi-map-pin" class="visually-hidden"><code>&lt;i class=&quot;fi-map-pin&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-map-pin-filled">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-map-pin-filled fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-map-pin-filled<span class="visually-hidden">location</span></p>
                                    <pre id="fi-map-pin-filled" class="visually-hidden"><code>&lt;i class=&quot;fi-map-pin-filled&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-maximize">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-maximize fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-maximize<span class="visually-hidden">expand fullscreen</span></p>
                                    <pre id="fi-maximize" class="visually-hidden"><code>&lt;i class=&quot;fi-maximize&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-maximize-2">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-maximize-2 fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-maximize-2<span class="visually-hidden">expand</span></p>
                                    <pre id="fi-maximize-2" class="visually-hidden"><code>&lt;i class=&quot;fi-maximize-2&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-meh">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-meh fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-meh<span class="visually-hidden">emoji</span></p>
                                    <pre id="fi-meh" class="visually-hidden"><code>&lt;i class=&quot;fi-meh&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-menu">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-menu fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-menu</p>
                                    <pre id="fi-menu" class="visually-hidden"><code>&lt;i class=&quot;fi-menu&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-message-circle">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-message-circle fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-message-circle</p>
                                    <pre id="fi-message-circle" class="visually-hidden"><code>&lt;i class=&quot;fi-message-circle&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-message-square">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-message-square fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-message-square</p>
                                    <pre id="fi-message-square" class="visually-hidden"><code>&lt;i class=&quot;fi-message-square&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-mic">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-mic fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-mic</p>
                                    <pre id="fi-mic" class="visually-hidden"><code>&lt;i class=&quot;fi-mic&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-mic-off">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-mic-off fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-mic-off</p>
                                    <pre id="fi-mic-off" class="visually-hidden"><code>&lt;i class=&quot;fi-mic-off&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-minimize">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-minimize fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-minimize<span class="visually-hidden">collapse</span></p>
                                    <pre id="fi-minimize" class="visually-hidden"><code>&lt;i class=&quot;fi-minimize&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-minimize-2">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-minimize-2 fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-minimize-2<span class="visually-hidden">collapse</span></p>
                                    <pre id="fi-minimize-2" class="visually-hidden"><code>&lt;i class=&quot;fi-minimize-2&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-minus">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-minus fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-minus</p>
                                    <pre id="fi-minus" class="visually-hidden"><code>&lt;i class=&quot;fi-minus&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-minus-circle">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-minus-circle fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-minus-circle</p>
                                    <pre id="fi-minus-circle" class="visually-hidden"><code>&lt;i class=&quot;fi-minus-circle&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-minus-square">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-minus-square fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-minus-square</p>
                                    <pre id="fi-minus-square" class="visually-hidden"><code>&lt;i class=&quot;fi-minus-square&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-money-check">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-money-check fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-money-check</p>
                                    <pre id="fi-money-check" class="visually-hidden"><code>&lt;i class=&quot;fi-money-check&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-monitor">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-monitor fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-monitor</p>
                                    <pre id="fi-monitor" class="visually-hidden"><code>&lt;i class=&quot;fi-monitor&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-moon">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-moon fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-moon</p>
                                    <pre id="fi-moon" class="visually-hidden"><code>&lt;i class=&quot;fi-moon&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-more-horizontal">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-more-horizontal fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-more-horizontal</p>
                                    <pre id="fi-more-horizontal" class="visually-hidden"><code>&lt;i class=&quot;fi-more-horizontal&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-more-vertical">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-more-vertical fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-more-vertical</p>
                                    <pre id="fi-more-vertical" class="visually-hidden"><code>&lt;i class=&quot;fi-more-vertical&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-mouse-pointer">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-mouse-pointer fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-mouse-pointer</p>
                                    <pre id="fi-mouse-pointer" class="visually-hidden"><code>&lt;i class=&quot;fi-mouse-pointer&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-move">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-move fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-move</p>
                                    <pre id="fi-move" class="visually-hidden"><code>&lt;i class=&quot;fi-move&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-music">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-music fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-music</p>
                                    <pre id="fi-music" class="visually-hidden"><code>&lt;i class=&quot;fi-music&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-navigation">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-navigation fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-navigation</p>
                                    <pre id="fi-navigation" class="visually-hidden"><code>&lt;i class=&quot;fi-navigation&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-navigation-2">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-navigation-2 fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-navigation-2</p>
                                    <pre id="fi-navigation-2" class="visually-hidden"><code>&lt;i class=&quot;fi-navigation-2&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-no-smoking">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-no-smoking fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-no-smoking</p>
                                    <pre id="fi-no-smoking" class="visually-hidden"><code>&lt;i class=&quot;fi-no-smoking&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-no-smoking-circle">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-no-smoking-circle fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-no-smoking-circle</p>
                                    <pre id="fi-no-smoking-circle" class="visually-hidden"><code>&lt;i class=&quot;fi-no-smoking-circle&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-oven">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-oven fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-oven<span class="visually-hidden">bake</span></p>
                                    <pre id="fi-oven" class="visually-hidden"><code>&lt;i class=&quot;fi-oven&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-package">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-package fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-package</p>
                                    <pre id="fi-package" class="visually-hidden"><code>&lt;i class=&quot;fi-package&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-paperclip">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-paperclip fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-paperclip</p>
                                    <pre id="fi-paperclip" class="visually-hidden"><code>&lt;i class=&quot;fi-paperclip&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-park">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-park fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-park</p>
                                    <pre id="fi-park" class="visually-hidden"><code>&lt;i class=&quot;fi-park&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-parking">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-parking fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-parking</p>
                                    <pre id="fi-parking" class="visually-hidden"><code>&lt;i class=&quot;fi-parking&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-pause">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-pause fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-pause</p>
                                    <pre id="fi-pause" class="visually-hidden"><code>&lt;i class=&quot;fi-pause&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-pause-circle">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-pause-circle fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-pause-circle</p>
                                    <pre id="fi-pause-circle" class="visually-hidden"><code>&lt;i class=&quot;fi-pause-circle&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-paw">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-paw fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-paw<span class="visually-hidden">pet animal</span></p>
                                    <pre id="fi-paw" class="visually-hidden"><code>&lt;i class=&quot;fi-paw&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-pen-tool">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-pen-tool fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-pen-tool</p>
                                    <pre id="fi-pen-tool" class="visually-hidden"><code>&lt;i class=&quot;fi-pen-tool&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-percent">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-percent fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-percent</p>
                                    <pre id="fi-percent" class="visually-hidden"><code>&lt;i class=&quot;fi-percent&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-phone">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-phone fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-phone</p>
                                    <pre id="fi-phone" class="visually-hidden"><code>&lt;i class=&quot;fi-phone&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-phone-call">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-phone-call fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-phone-call</p>
                                    <pre id="fi-phone-call" class="visually-hidden"><code>&lt;i class=&quot;fi-phone-call&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-phone-forwarded">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-phone-forwarded fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-phone-forwarded</p>
                                    <pre id="fi-phone-forwarded" class="visually-hidden"><code>&lt;i class=&quot;fi-phone-forwarded&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-phone-incoming">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-phone-incoming fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-phone-incoming</p>
                                    <pre id="fi-phone-incoming" class="visually-hidden"><code>&lt;i class=&quot;fi-phone-incoming&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-phone-missed">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-phone-missed fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-phone-missed</p>
                                    <pre id="fi-phone-missed" class="visually-hidden"><code>&lt;i class=&quot;fi-phone-missed&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-phone-off">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-phone-off fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-phone-off</p>
                                    <pre id="fi-phone-off" class="visually-hidden"><code>&lt;i class=&quot;fi-phone-off&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-phone-outgoing">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-phone-outgoing fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-phone-outgoing</p>
                                    <pre id="fi-phone-outgoing" class="visually-hidden"><code>&lt;i class=&quot;fi-phone-outgoing&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-pie-chart">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-pie-chart fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-pie-chart</p>
                                    <pre id="fi-pie-chart" class="visually-hidden"><code>&lt;i class=&quot;fi-pie-chart&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-play">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-play fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-play</p>
                                    <pre id="fi-play" class="visually-hidden"><code>&lt;i class=&quot;fi-play&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-play-circle">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-play-circle fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-play-circle</p>
                                    <pre id="fi-play-circle" class="visually-hidden"><code>&lt;i class=&quot;fi-play-circle&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-play-filled">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-play-filled fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-play-filled</p>
                                    <pre id="fi-play-filled" class="visually-hidden"><code>&lt;i class=&quot;fi-play-filled&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-plus">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-plus fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-plus</p>
                                    <pre id="fi-plus" class="visually-hidden"><code>&lt;i class=&quot;fi-plus&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-plus-circle">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-plus-circle fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-plus-circle</p>
                                    <pre id="fi-plus-circle" class="visually-hidden"><code>&lt;i class=&quot;fi-plus-circle&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-plus-square">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-plus-square fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-plus-square</p>
                                    <pre id="fi-plus-square" class="visually-hidden"><code>&lt;i class=&quot;fi-plus-square&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-power">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-power fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-power</p>
                                    <pre id="fi-power" class="visually-hidden"><code>&lt;i class=&quot;fi-power&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-printer">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-printer fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-printer</p>
                                    <pre id="fi-printer" class="visually-hidden"><code>&lt;i class=&quot;fi-printer&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-radio">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-radio fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-radio<span class="visually-hidden">signal</span></p>
                                    <pre id="fi-radio" class="visually-hidden"><code>&lt;i class=&quot;fi-radio&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-refresh-ccw">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-refresh-ccw fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-refresh-ccw</p>
                                    <pre id="fi-refresh-ccw" class="visually-hidden"><code>&lt;i class=&quot;fi-refresh-ccw&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-refresh-cw">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-refresh-cw fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-refresh-cw</p>
                                    <pre id="fi-refresh-cw" class="visually-hidden"><code>&lt;i class=&quot;fi-refresh-cw&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-rewind">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-rewind fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-rewind</p>
                                    <pre id="fi-rewind" class="visually-hidden"><code>&lt;i class=&quot;fi-rewind&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-rocket">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-rocket fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-rocket</p>
                                    <pre id="fi-rocket" class="visually-hidden"><code>&lt;i class=&quot;fi-rocket&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-rotate-ccw">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-rotate-ccw fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-rotate-ccw</p>
                                    <pre id="fi-rotate-ccw" class="visually-hidden"><code>&lt;i class=&quot;fi-rotate-ccw&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-rotate-cw">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-rotate-cw fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-rotate-cw</p>
                                    <pre id="fi-rotate-cw" class="visually-hidden"><code>&lt;i class=&quot;fi-rotate-cw&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-rss">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-rss fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-rss</p>
                                    <pre id="fi-rss" class="visually-hidden"><code>&lt;i class=&quot;fi-rss&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-ruler">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-ruler fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-ruler<span class="visually-hidden">size</span></p>
                                    <pre id="fi-ruler" class="visually-hidden"><code>&lt;i class=&quot;fi-ruler&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-save">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-save fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-save</p>
                                    <pre id="fi-save" class="visually-hidden"><code>&lt;i class=&quot;fi-save&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-scan">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-scan fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-scan</p>
                                    <pre id="fi-scan" class="visually-hidden"><code>&lt;i class=&quot;fi-scan&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-schedule">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-schedule fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-schedule<span class="visually-hidden">calendar time date</span></p>
                                    <pre id="fi-schedule" class="visually-hidden"><code>&lt;i class=&quot;fi-schedule&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-scissors">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-scissors fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-scissors</p>
                                    <pre id="fi-scissors" class="visually-hidden"><code>&lt;i class=&quot;fi-scissors&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-search">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-search fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-search</p>
                                    <pre id="fi-search" class="visually-hidden"><code>&lt;i class=&quot;fi-search&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-send">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-send fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-send</p>
                                    <pre id="fi-send" class="visually-hidden"><code>&lt;i class=&quot;fi-send&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-server">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-server fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-server</p>
                                    <pre id="fi-server" class="visually-hidden"><code>&lt;i class=&quot;fi-server&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-settings">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-settings fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-settings<span class="visually-hidden">cog</span></p>
                                    <pre id="fi-settings" class="visually-hidden"><code>&lt;i class=&quot;fi-settings&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-share">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-share fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-share</p>
                                    <pre id="fi-share" class="visually-hidden"><code>&lt;i class=&quot;fi-share&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-share-2">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-share-2 fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-share-2</p>
                                    <pre id="fi-share-2" class="visually-hidden"><code>&lt;i class=&quot;fi-share-2&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-shield">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-shield fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-shield</p>
                                    <pre id="fi-shield" class="visually-hidden"><code>&lt;i class=&quot;fi-shield&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-shield-off">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-shield-off fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-shield-off</p>
                                    <pre id="fi-shield-off" class="visually-hidden"><code>&lt;i class=&quot;fi-shield-off&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-shopping-bag">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-shopping-bag fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-shopping-bag</p>
                                    <pre id="fi-shopping-bag" class="visually-hidden"><code>&lt;i class=&quot;fi-shopping-bag&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-shopping-cart">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-shopping-cart fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-shopping-cart</p>
                                    <pre id="fi-shopping-cart" class="visually-hidden"><code>&lt;i class=&quot;fi-shopping-cart&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-shower">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-shower fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-shower</p>
                                    <pre id="fi-shower" class="visually-hidden"><code>&lt;i class=&quot;fi-shower&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-shuffle">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-shuffle fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-shuffle</p>
                                    <pre id="fi-shuffle" class="visually-hidden"><code>&lt;i class=&quot;fi-shuffle&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-sidebar">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-sidebar fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-sidebar</p>
                                    <pre id="fi-sidebar" class="visually-hidden"><code>&lt;i class=&quot;fi-sidebar&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-skip-back">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-skip-back fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-skip-back</p>
                                    <pre id="fi-skip-back" class="visually-hidden"><code>&lt;i class=&quot;fi-skip-back&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-skip-forward">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-skip-forward fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-skip-forward</p>
                                    <pre id="fi-skip-forward" class="visually-hidden"><code>&lt;i class=&quot;fi-skip-forward&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-sliders">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-sliders fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-sliders<span class="visually-hidden">settings</span></p>
                                    <pre id="fi-sliders" class="visually-hidden"><code>&lt;i class=&quot;fi-sliders&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-smartphone">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-smartphone fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-smartphone</p>
                                    <pre id="fi-smartphone" class="visually-hidden"><code>&lt;i class=&quot;fi-smartphone&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-smile">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-smile fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-smile<span class="visually-hidden">emoji happy</span></p>
                                    <pre id="fi-smile" class="visually-hidden"><code>&lt;i class=&quot;fi-smile&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-snowflake">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-snowflake fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-snowflake<span class="visually-hidden">winter</span></p>
                                    <pre id="fi-snowflake" class="visually-hidden"><code>&lt;i class=&quot;fi-snowflake&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-sort">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-sort fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-sort</p>
                                    <pre id="fi-sort" class="visually-hidden"><code>&lt;i class=&quot;fi-sort&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-speaker">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-speaker fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-speaker</p>
                                    <pre id="fi-speaker" class="visually-hidden"><code>&lt;i class=&quot;fi-speaker&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-star">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-star fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-star</p>
                                    <pre id="fi-star" class="visually-hidden"><code>&lt;i class=&quot;fi-star&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-star-half">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-star-half fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-star-half</p>
                                    <pre id="fi-star-half" class="visually-hidden"><code>&lt;i class=&quot;fi-star-half&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-star-filled">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-star-filled fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-star-filled</p>
                                    <pre id="fi-star-filled" class="visually-hidden"><code>&lt;i class=&quot;fi-star-filled&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-stop-circle">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-stop-circle fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-stop-circle</p>
                                    <pre id="fi-stop-circle" class="visually-hidden"><code>&lt;i class=&quot;fi-stop-circle&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-sun">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-sun fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-sun</p>
                                    <pre id="fi-sun" class="visually-hidden"><code>&lt;i class=&quot;fi-sun&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-sunrise">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-sunrise fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-sunrise</p>
                                    <pre id="fi-sunrise" class="visually-hidden"><code>&lt;i class=&quot;fi-sunrise&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-sunset">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-sunset fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-sunset</p>
                                    <pre id="fi-sunset" class="visually-hidden"><code>&lt;i class=&quot;fi-sunset&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-swatches">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-swatches fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-swatches<span class="visually-hidden">color fill paint</span></p>
                                    <pre id="fi-swatches" class="visually-hidden"><code>&lt;i class=&quot;fi-swatches&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-table">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-table fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-table</p>
                                    <pre id="fi-table" class="visually-hidden"><code>&lt;i class=&quot;fi-table&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-tablet">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-tablet fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-tablet</p>
                                    <pre id="fi-tablet" class="visually-hidden"><code>&lt;i class=&quot;fi-tablet&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-tachometer">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-tachometer fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-tachometer<span class="visually-hidden">dashboard</span></p>
                                    <pre id="fi-tachometer" class="visually-hidden"><code>&lt;i class=&quot;fi-tachometer&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-tag">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-tag fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-tag</p>
                                    <pre id="fi-tag" class="visually-hidden"><code>&lt;i class=&quot;fi-tag&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-target">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-target fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-target</p>
                                    <pre id="fi-target" class="visually-hidden"><code>&lt;i class=&quot;fi-target&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-terminal">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-terminal fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-terminal</p>
                                    <pre id="fi-terminal" class="visually-hidden"><code>&lt;i class=&quot;fi-terminal&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-thermometer">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-thermometer fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-thermometer</p>
                                    <pre id="fi-thermometer" class="visually-hidden"><code>&lt;i class=&quot;fi-thermometer&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-thumbs-down">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-thumbs-down fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-thumbs-down<span class="visually-hidden">dislike</span></p>
                                    <pre id="fi-thumbs-down" class="visually-hidden"><code>&lt;i class=&quot;fi-thumbs-down&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-thumbs-up">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-thumbs-up fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-thumbs-up<span class="visually-hidden">dislike</span></p>
                                    <pre id="fi-thumbs-up" class="visually-hidden"><code>&lt;i class=&quot;fi-thumbs-up&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-ticket">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-ticket fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-ticket<span class="visually-hidden">coupon voucher</span></p>
                                    <pre id="fi-ticket" class="visually-hidden"><code>&lt;i class=&quot;fi-ticket&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-tool">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-tool fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-tool<span class="visually-hidden">wrench</span></p>
                                    <pre id="fi-tool" class="visually-hidden"><code>&lt;i class=&quot;fi-tool&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-tram">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-tram fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-tram<span class="visually-hidden">transport wagon carriage</span></p>
                                    <pre id="fi-tram" class="visually-hidden"><code>&lt;i class=&quot;fi-tram&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-trash">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-trash fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-trash</p>
                                    <pre id="fi-trash" class="visually-hidden"><code>&lt;i class=&quot;fi-trash&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-trash-empty">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-trash-empty fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-trash-empty</p>
                                    <pre id="fi-trash-empty" class="visually-hidden"><code>&lt;i class=&quot;fi-trash-empty&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-tree">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-tree fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-tree</p>
                                    <pre id="fi-tree" class="visually-hidden"><code>&lt;i class=&quot;fi-tree&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-trending-down">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-trending-down fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-trending-down</p>
                                    <pre id="fi-trending-down" class="visually-hidden"><code>&lt;i class=&quot;fi-trending-down&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-trending-up">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-trending-up fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-trending-up</p>
                                    <pre id="fi-trending-up" class="visually-hidden"><code>&lt;i class=&quot;fi-trending-up&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-triangle">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-triangle fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-triangle</p>
                                    <pre id="fi-triangle" class="visually-hidden"><code>&lt;i class=&quot;fi-triangle&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-truck">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-truck fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-truck<span class="visually-hidden">delivery</span></p>
                                    <pre id="fi-truck" class="visually-hidden"><code>&lt;i class=&quot;fi-truck&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-tv">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-tv fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-tv</p>
                                    <pre id="fi-tv" class="visually-hidden"><code>&lt;i class=&quot;fi-tv&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-type">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-type fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-type</p>
                                    <pre id="fi-type" class="visually-hidden"><code>&lt;i class=&quot;fi-type&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-umbrella">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-umbrella fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-umbrella</p>
                                    <pre id="fi-umbrella" class="visually-hidden"><code>&lt;i class=&quot;fi-umbrella&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-unlock">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-unlock fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-unlock</p>
                                    <pre id="fi-unlock" class="visually-hidden"><code>&lt;i class=&quot;fi-unlock&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-upload">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-upload fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-upload</p>
                                    <pre id="fi-upload" class="visually-hidden"><code>&lt;i class=&quot;fi-upload&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-upload-cloud">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-upload-cloud fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-upload-cloud</p>
                                    <pre id="fi-upload-cloud" class="visually-hidden"><code>&lt;i class=&quot;fi-upload-cloud&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-user">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-user fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-user</p>
                                    <pre id="fi-user" class="visually-hidden"><code>&lt;i class=&quot;fi-user&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-user-check">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-user-check fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-user-check</p>
                                    <pre id="fi-user-check" class="visually-hidden"><code>&lt;i class=&quot;fi-user-check&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-user-plus">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-user-plus fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-user-plus</p>
                                    <pre id="fi-user-plus" class="visually-hidden"><code>&lt;i class=&quot;fi-user-plus&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-user-x">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-user-x fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-user-x</p>
                                    <pre id="fi-user-x" class="visually-hidden"><code>&lt;i class=&quot;fi-user-x&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-video">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-video fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-video</p>
                                    <pre id="fi-video" class="visually-hidden"><code>&lt;i class=&quot;fi-video&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-video-off">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-video-off fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-video-off</p>
                                    <pre id="fi-video-off" class="visually-hidden"><code>&lt;i class=&quot;fi-video-off&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-voicemail">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-voicemail fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-voicemail</p>
                                    <pre id="fi-voicemail" class="visually-hidden"><code>&lt;i class=&quot;fi-voicemail&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-volume">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-volume fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-volume</p>
                                    <pre id="fi-volume" class="visually-hidden"><code>&lt;i class=&quot;fi-volume&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-volume-1">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-volume-1 fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-volume-1</p>
                                    <pre id="fi-volume-1" class="visually-hidden"><code>&lt;i class=&quot;fi-volume-1&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-volume-2">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-volume-2 fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-volume-2</p>
                                    <pre id="fi-volume-2" class="visually-hidden"><code>&lt;i class=&quot;fi-volume-2&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-volume-x">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-volume-x fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-volume-x</p>
                                    <pre id="fi-volume-x" class="visually-hidden"><code>&lt;i class=&quot;fi-volume-x&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-walk">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-walk fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-walk<span class="visually-hidden">pedestrian</span></p>
                                    <pre id="fi-walk" class="visually-hidden"><code>&lt;i class=&quot;fi-walk&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-washing-machine">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-washing-machine fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-washing-machine</p>
                                    <pre id="fi-washing-machine" class="visually-hidden"><code>&lt;i class=&quot;fi-washing-machine&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-watch">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-watch fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-watch<span class="visually-hidden">time</span></p>
                                    <pre id="fi-watch" class="visually-hidden"><code>&lt;i class=&quot;fi-watch&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-wheelchair">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-wheelchair fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-wheelchair<span class="visually-hidden">handicapped invalid disabled</span></p>
                                    <pre id="fi-wheelchair" class="visually-hidden"><code>&lt;i class=&quot;fi-wheelchair&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-wifi">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-wifi fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-wifi</p>
                                    <pre id="fi-wifi" class="visually-hidden"><code>&lt;i class=&quot;fi-wifi&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-wifi-off">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-wifi-off fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-wifi-off</p>
                                    <pre id="fi-wifi-off" class="visually-hidden"><code>&lt;i class=&quot;fi-wifi-off&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-wind">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-wind fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-wind</p>
                                    <pre id="fi-wind" class="visually-hidden"><code>&lt;i class=&quot;fi-wind&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-wine">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-wine fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-wine<span class="visually-hidden">drink</span></p>
                                    <pre id="fi-wine" class="visually-hidden"><code>&lt;i class=&quot;fi-wine&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-close">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-close fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-close<span class="visually-hidden">x</span></p>
                                    <pre id="fi-close" class="visually-hidden"><code>&lt;i class=&quot;fi-close&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-close-circle">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-close-circle fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-close-circle<span class="visually-hidden">x</span></p>
                                    <pre id="fi-close-circle" class="visually-hidden"><code>&lt;i class=&quot;fi-close-circle&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-close-octagon">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-close-octagon fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-close-octagon<span class="visually-hidden">x</span></p>
                                    <pre id="fi-close-octagon" class="visually-hidden"><code>&lt;i class=&quot;fi-close-octagon&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-close-square">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-close-square fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-close-square<span class="visually-hidden">x</span></p>
                                    <pre id="fi-close-square" class="visually-hidden"><code>&lt;i class=&quot;fi-close-square&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-zap">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-zap fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-zap<span class="visually-hidden">lightning</span></p>
                                    <pre id="fi-zap" class="visually-hidden"><code>&lt;i class=&quot;fi-zap&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-zap-off">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-zap-off fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-zap-off<span class="visually-hidden">lightning</span></p>
                                    <pre id="fi-zap-off" class="visually-hidden"><code>&lt;i class=&quot;fi-zap-off&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-zoom-in">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-zoom-in fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-zoom-in</p>
                                    <pre id="fi-zoom-in" class="visually-hidden"><code>&lt;i class=&quot;fi-zoom-in&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-zoom-out">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-zoom-out fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-zoom-out</p>
                                    <pre id="fi-zoom-out" class="visually-hidden"><code>&lt;i class=&quot;fi-zoom-out&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>


                <!-- Brand icons -->
                <section id="icons-brand" class="docs-section pb-sm-2 mb-5" data-filter-list='{"searchClass": "brand-icons-search", "listClass": "brand-icons-list", "valueNames": ["icon-name"]}'>
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <h4 class="mb-0 me-3">Brand icons</h4>
                        <div class="position-relative">
                            <i class="fi-search position-absolute top-50 start-0 translate-middle-y ms-3"></i>
                            <input type="search" class="brand-icons-search form-control form-icon-start" placeholder="Search icons">
                        </div>
                    </div>
                    <div class="brand-icons-list row row-cols-2 row-cols-sm-3 row-cols-md-4 g-3">
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-airbnb">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-airbnb fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-airbnb</p>
                                    <pre id="fi-airbnb" class="visually-hidden"><code>&lt;i class=&quot;fi-airbnb&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-apple">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-apple fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-apple</p>
                                    <pre id="fi-apple" class="visually-hidden"><code>&lt;i class=&quot;fi-apple&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-behance">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-behance fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-behance</p>
                                    <pre id="fi-behance" class="visually-hidden"><code>&lt;i class=&quot;fi-behance&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-blogger">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-blogger fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-blogger</p>
                                    <pre id="fi-blogger" class="visually-hidden"><code>&lt;i class=&quot;fi-blogger&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-codepen">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-codepen fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-codepen</p>
                                    <pre id="fi-codepen" class="visually-hidden"><code>&lt;i class=&quot;fi-codepen&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-discord">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-discord fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-discord</p>
                                    <pre id="fi-discord" class="visually-hidden"><code>&lt;i class=&quot;fi-discord&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-disqus">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-disqus fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-disqus</p>
                                    <pre id="fi-disqus" class="visually-hidden"><code>&lt;i class=&quot;fi-disqus&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-dribbble">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-dribbble fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-dribbble</p>
                                    <pre id="fi-dribbble" class="visually-hidden"><code>&lt;i class=&quot;fi-dribbble&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-dropbox">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-dropbox fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-dropbox</p>
                                    <pre id="fi-dropbox" class="visually-hidden"><code>&lt;i class=&quot;fi-dropbox&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-envato">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-envato fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-envato</p>
                                    <pre id="fi-envato" class="visually-hidden"><code>&lt;i class=&quot;fi-envato&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-evernote">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-evernote fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-evernote</p>
                                    <pre id="fi-evernote" class="visually-hidden"><code>&lt;i class=&quot;fi-evernote&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-facebook">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-facebook fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-facebook</p>
                                    <pre id="fi-facebook" class="visually-hidden"><code>&lt;i class=&quot;fi-facebook&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-flickr">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-flickr fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-flickr</p>
                                    <pre id="fi-flickr" class="visually-hidden"><code>&lt;i class=&quot;fi-flickr&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-foursquare">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-foursquare fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-foursquare</p>
                                    <pre id="fi-foursquare" class="visually-hidden"><code>&lt;i class=&quot;fi-foursquare&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-github">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-github fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-github</p>
                                    <pre id="fi-github" class="visually-hidden"><code>&lt;i class=&quot;fi-github&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-google">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-google fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-google</p>
                                    <pre id="fi-google" class="visually-hidden"><code>&lt;i class=&quot;fi-google&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-google-drive">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-google-drive fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-google-drive</p>
                                    <pre id="fi-google-drive" class="visually-hidden"><code>&lt;i class=&quot;fi-google-drive&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-google-play">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-google-play fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-google-play</p>
                                    <pre id="fi-google-play" class="visually-hidden"><code>&lt;i class=&quot;fi-google-play&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-hangouts">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-hangouts fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-hangouts</p>
                                    <pre id="fi-hangouts" class="visually-hidden"><code>&lt;i class=&quot;fi-hangouts&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-instagram">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-instagram fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-instagram</p>
                                    <pre id="fi-instagram" class="visually-hidden"><code>&lt;i class=&quot;fi-instagram&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-kickstarter">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-kickstarter fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-kickstarter</p>
                                    <pre id="fi-kickstarter" class="visually-hidden"><code>&lt;i class=&quot;fi-kickstarter&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-linkedin">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-linkedin fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-linkedin</p>
                                    <pre id="fi-linkedin" class="visually-hidden"><code>&lt;i class=&quot;fi-linkedin&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-medium">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-medium fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-medium</p>
                                    <pre id="fi-medium" class="visually-hidden"><code>&lt;i class=&quot;fi-medium&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-messenger">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-messenger fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-messenger</p>
                                    <pre id="fi-messenger" class="visually-hidden"><code>&lt;i class=&quot;fi-messenger&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-myspace">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-myspace fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-myspace</p>
                                    <pre id="fi-myspace" class="visually-hidden"><code>&lt;i class=&quot;fi-myspace&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-odnoklassniki">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-odnoklassniki fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-odnoklassniki</p>
                                    <pre id="fi-odnoklassniki" class="visually-hidden"><code>&lt;i class=&quot;fi-odnoklassniki&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-open-source">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-open-source fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-open-source</p>
                                    <pre id="fi-open-source" class="visually-hidden"><code>&lt;i class=&quot;fi-open-source&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-patreon">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-patreon fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-patreon</p>
                                    <pre id="fi-patreon" class="visually-hidden"><code>&lt;i class=&quot;fi-patreon&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-pinterest">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-pinterest fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-pinterest</p>
                                    <pre id="fi-pinterest" class="visually-hidden"><code>&lt;i class=&quot;fi-pinterest&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-product-hunt">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-product-hunt fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-product-hunt</p>
                                    <pre id="fi-product-hunt" class="visually-hidden"><code>&lt;i class=&quot;fi-product-hunt&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-quora">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-quora fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-quora</p>
                                    <pre id="fi-quora" class="visually-hidden"><code>&lt;i class=&quot;fi-quora&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-reddit">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-reddit fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-reddit</p>
                                    <pre id="fi-reddit" class="visually-hidden"><code>&lt;i class=&quot;fi-reddit&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-rss-2">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-rss-2 fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-rss-2</p>
                                    <pre id="fi-rss-2" class="visually-hidden"><code>&lt;i class=&quot;fi-rss-2&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-skype">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-skype fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-skype</p>
                                    <pre id="fi-skype" class="visually-hidden"><code>&lt;i class=&quot;fi-skype&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-slack">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-slack fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-slack</p>
                                    <pre id="fi-slack" class="visually-hidden"><code>&lt;i class=&quot;fi-slack&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-snapchat">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-snapchat fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-snapchat</p>
                                    <pre id="fi-snapchat" class="visually-hidden"><code>&lt;i class=&quot;fi-snapchat&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-soundcloud">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-soundcloud fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-soundcloud</p>
                                    <pre id="fi-soundcloud" class="visually-hidden"><code>&lt;i class=&quot;fi-soundcloud&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-spotify">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-spotify fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-spotify</p>
                                    <pre id="fi-spotify" class="visually-hidden"><code>&lt;i class=&quot;fi-spotify&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-stack-overflow">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-stack-overflow fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-stack-overflow</p>
                                    <pre id="fi-stack-overflow" class="visually-hidden"><code>&lt;i class=&quot;fi-stack-overflow&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-steam">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-steam fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-steam</p>
                                    <pre id="fi-steam" class="visually-hidden"><code>&lt;i class=&quot;fi-steam&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-stumbleupon">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-stumbleupon fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-stumbleupon</p>
                                    <pre id="fi-stumbleupon" class="visually-hidden"><code>&lt;i class=&quot;fi-stumbleupon&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-telegram">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-telegram fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-telegram</p>
                                    <pre id="fi-telegram" class="visually-hidden"><code>&lt;i class=&quot;fi-telegram&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-tiktok">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-tiktok fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-tiktok</p>
                                    <pre id="fi-tiktok" class="visually-hidden"><code>&lt;i class=&quot;fi-tiktok&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-tinder">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-tinder fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-tinder</p>
                                    <pre id="fi-tinder" class="visually-hidden"><code>&lt;i class=&quot;fi-tinder&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-trello">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-trello fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-trello</p>
                                    <pre id="fi-trello" class="visually-hidden"><code>&lt;i class=&quot;fi-trello&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-tumblr">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-tumblr fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-tumblr</p>
                                    <pre id="fi-tumblr" class="visually-hidden"><code>&lt;i class=&quot;fi-tumblr&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-twitch">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-twitch fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-twitch</p>
                                    <pre id="fi-twitch" class="visually-hidden"><code>&lt;i class=&quot;fi-twitch&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-x">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-x fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-x<span class="visually-hidden">twitter</span></p>
                                    <pre id="fi-x" class="visually-hidden"><code>&lt;i class=&quot;fi-x&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-viber">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-viber fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-viber</p>
                                    <pre id="fi-viber" class="visually-hidden"><code>&lt;i class=&quot;fi-viber&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-vimeo">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-vimeo fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-vimeo</p>
                                    <pre id="fi-vimeo" class="visually-hidden"><code>&lt;i class=&quot;fi-vimeo&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-vk">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-vk fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-vk</p>
                                    <pre id="fi-vk" class="visually-hidden"><code>&lt;i class=&quot;fi-vk&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-wechat">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-wechat fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-wechat</p>
                                    <pre id="fi-wechat" class="visually-hidden"><code>&lt;i class=&quot;fi-wechat&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-whatsapp">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-whatsapp fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-whatsapp</p>
                                    <pre id="fi-whatsapp" class="visually-hidden"><code>&lt;i class=&quot;fi-whatsapp&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-xing">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-xing fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-xing</p>
                                    <pre id="fi-xing" class="visually-hidden"><code>&lt;i class=&quot;fi-xing&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-yelp">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-yelp fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-yelp</p>
                                    <pre id="fi-yelp" class="visually-hidden"><code>&lt;i class=&quot;fi-yelp&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow hover-effect-opacity" tabindex="0">
                                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                <div class="position-absolute top-0 end-0 d-flex align-items-center justify-content-center w-100 h-100 z-2 bg-body rounded hover-effect-target opacity-0">
                                    <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary position-relative z-1 bg-body px-2" data-copy-code="#fi-youtube">
                                        <i class="fi-copy fs-sm me-1"></i>
                                        Copy
                                    </button>
                                </div>
                                <div class="card-body position-relative z-1 text-center px-3">
                                    <i class="fi-youtube fs-2"></i>
                                    <p class="icon-name fs-sm mb-0 pt-2">fi-youtube</p>
                                    <pre id="fi-youtube" class="visually-hidden"><code>&lt;i class=&quot;fi-youtube&quot;&gt;&lt;/i&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>


                <!-- Animate on hover -->
                <section id="icons-animation" class="docs-section">
                    <h4>Animate on hover</h4>
                    <div class="card border-0 shadow">
                        <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                        <div class="card-body position-relative z-2">
                            <ul class="nav nav-tabs m-n2" role="tablist" style="max-width: 240px">
                                <li class="nav-item" role="presentation">
                                    <button type="button" class="nav-link active" data-bs-toggle="tab" data-bs-target="#preview-1" role="tab" aria-controls="preview-1" aria-selected="true">
                                        <i class="fi-eye opacity-75 ms-n1 me-2"></i>
                                        Preview
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button type="button" class="nav-link" data-bs-toggle="tab" data-bs-target="#html-1" role="tab" aria-controls="html-1" aria-selected="false">
                                        <i class="fi-code opacity-75 ms-n1 me-2"></i>
                                        HTML
                                    </button>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div id="preview-1" class="tab-pane pt-4 pb-2 mt-3 fade show active" role="tabpanel">
                                    <div class="row row-cols-3 row-cols-sm-5 row-cols-lg-6 row-cols-xl-auto justify-content-xl-between g-4">
                                        <div class="col position-relative text-center">
                                            <button type="button" class="btn btn-icon btn-lg border animate-shake fs-xl stretched-link mb-2" aria-label="Shake icon">
                                                <i class="fi-bell animate-target"></i>
                                            </button>
                                            <div class="fs-sm">Shake</div>
                                        </div>
                                        <div class="col position-relative text-center">
                                            <button type="button" class="btn btn-icon btn-lg border animate-pulse fs-xl stretched-link mb-2" aria-label="Pulse icon">
                                                <i class="fi-heart animate-target"></i>
                                            </button>
                                            <div class="fs-sm">Pulse</div>
                                        </div>
                                        <div class="col position-relative text-center">
                                            <button type="button" class="btn btn-icon btn-lg border animate-rotate fs-xl stretched-link mb-2" aria-label="Rotate icon">
                                                <i class="fi-refresh-cw animate-target"></i>
                                            </button>
                                            <div class="fs-sm">Rotate</div>
                                        </div>
                                        <div class="col position-relative text-center">
                                            <button type="button" class="btn btn-icon btn-lg border animate-scale fs-xl stretched-link mb-2" aria-label="Scale icon">
                                                <i class="fi-search animate-target"></i>
                                            </button>
                                            <div class="fs-sm">Scale</div>
                                        </div>
                                        <div class="col position-relative text-center">
                                            <button type="button" class="btn btn-icon btn-lg border animate-slide-up fs-xl stretched-link mb-2" aria-label="Slide up icon">
                                                <i class="fi-arrow-up animate-target"></i>
                                            </button>
                                            <div class="fs-sm">Slide up</div>
                                        </div>
                                        <div class="col position-relative text-center">
                                            <button type="button" class="btn btn-icon btn-lg border animate-slide-end fs-xl stretched-link mb-2" aria-label="Slide end icon">
                                                <i class="fi-arrow-right animate-target"></i>
                                            </button>
                                            <div class="fs-sm">Slide end</div>
                                        </div>
                                        <div class="col position-relative text-center">
                                            <button type="button" class="btn btn-icon btn-lg border animate-slide-down fs-xl stretched-link mb-2" aria-label="Slide down icon">
                                                <i class="fi-arrow-down animate-target"></i>
                                            </button>
                                            <div class="fs-sm">Slide down</div>
                                        </div>
                                        <div class="col position-relative text-center">
                                            <button type="button" class="btn btn-icon btn-lg border animate-slide-start fs-xl stretched-link mb-2" aria-label="Slide start icon">
                                                <i class="fi-arrow-left animate-target"></i>
                                            </button>
                                            <div class="fs-sm">Slide start</div>
                                        </div>
                                    </div>
                                </div>
                                <div id="html-1" class="tab-pane pt-4 fade" role="tabpanel">
                                    <div class="position-relative" data-bs-theme="dark">
                                        <button type="button" class="btn btn-sm btn-outline-secondary bg-dark position-absolute top-0 end-0 mt-2 px-2 z-3" data-copy-code="#icons-animate-code">
                                            <i class="fi-copy fs-sm me-1"></i>
                                            Copy
                                        </button>
                                        <pre id="icons-animate-code" class="code-highlight mx-n2 mb-n2"><code class="language-html">&lt;!-- Icon animations on hover --&gt;

                    &lt;!-- Shake --&gt;
                    &lt;button type=&quot;button&quot; class=&quot;btn btn-icon btn-lg btn-outline-secondary animate-shake fs-xl&quot; aria-label=&quot;Shake icon&quot;&gt;
                      &lt;i class=&quot;fi-bell animate-target&quot;&gt;&lt;/i&gt;
                    &lt;/button&gt;

                    &lt;!-- Pulse --&gt;
                    &lt;button type=&quot;button&quot; class=&quot;btn btn-icon btn-lg btn-outline-secondary animate-pulse fs-xl&quot; aria-label=&quot;Pulse icon&quot;&gt;
                      &lt;i class=&quot;fi-heart animate-target&quot;&gt;&lt;/i&gt;
                    &lt;/button&gt;

                    &lt;!-- Rotate --&gt;
                    &lt;button type=&quot;button&quot; class=&quot;btn btn-icon btn-lg btn-outline-secondary animate-rotate fs-xl&quot; aria-label=&quot;Rotate icon&quot;&gt;
                      &lt;i class=&quot;fi-refresh-cw animate-target&quot;&gt;&lt;/i&gt;
                    &lt;/button&gt;

                    &lt;!-- Scale --&gt;
                    &lt;button type=&quot;button&quot; class=&quot;btn btn-icon btn-lg btn-outline-secondary animate-scale fs-xl&quot; aria-label=&quot;Scale icon&quot;&gt;
                      &lt;i class=&quot;fi-search animate-target&quot;&gt;&lt;/i&gt;
                    &lt;/button&gt;

                    &lt;!-- Slide up --&gt;
                    &lt;button type=&quot;button&quot; class=&quot;btn btn-icon btn-lg btn-outline-secondary animate-slide-up fs-xl&quot; aria-label=&quot;Slide up icon&quot;&gt;
                      &lt;i class=&quot;fi-arrow-up animate-target&quot;&gt;&lt;/i&gt;
                    &lt;/button&gt;

                    &lt;!-- Slide end --&gt;
                    &lt;button type=&quot;button&quot; class=&quot;btn btn-icon btn-lg btn-outline-secondary animate-slide-end fs-xl&quot; aria-label=&quot;Slide end icon&quot;&gt;
                      &lt;i class=&quot;fi-arrow-right animate-target&quot;&gt;&lt;/i&gt;
                    &lt;/button&gt;

                    &lt;!-- Slide down --&gt;
                    &lt;button type=&quot;button&quot; class=&quot;btn btn-icon btn-lg btn-outline-secondary animate-slide-down fs-xl&quot; aria-label=&quot;Slide down icon&quot;&gt;
                      &lt;i class=&quot;fi-arrow-down animate-target&quot;&gt;&lt;/i&gt;
                    &lt;/button&gt;

                    &lt;!-- Slide start --&gt;
                    &lt;button type=&quot;button&quot; class=&quot;btn btn-icon btn-lg btn-outline-secondary animate-slide-start fs-xl&quot; aria-label=&quot;Slide start icon&quot;&gt;
                      &lt;i class=&quot;fi-arrow-left animate-target&quot;&gt;&lt;/i&gt;
                    &lt;/button&gt;</code></pre>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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