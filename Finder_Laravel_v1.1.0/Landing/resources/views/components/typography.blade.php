@extends('layouts.app')

@section('title', 'Finder Docs | Typography')

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
                                        <a class="list-group-item list-group-item-action justify-content-between dropdown-toggle text-wrap pe-3" href="color-modes">
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
                                    <div class="dropdown">
                                        <span class="list-group-item list-group-item-action justify-content-between dropdown-toggle pe-3 active pe-none">
                                            Typography
                                            <span class="visually-hidden">text font heading title paragraph list ordered unordered description blockquote quotation abbreviation</span>
                                        </span>
                                        <ul id="anchorNav" class="nav nav-underline flex-column border-start ms-2 my-2" style="gap: .25rem;">
                                            <li class="nav-item"><a class="nav-link fw-normal" href="#type-headings">Headings</a></li>
                                            <li class="nav-item"><a class="nav-link fw-normal" href="#type-displays">Display headings</a></li>
                                            <li class="nav-item"><a class="nav-link fw-normal" href="#type-body-text">Body text sizes</a></li>
                                            <li class="nav-item"><a class="nav-link fw-normal" href="#type-inline">Inline text elements</a></li>
                                            <li class="nav-item"><a class="nav-link fw-normal" href="#type-abbreviations">Abbreviations</a></li>
                                            <li class="nav-item"><a class="nav-link fw-normal" href="#type-blockquote">Blockquote</a></li>
                                            <li class="nav-item"><a class="nav-link fw-normal" href="#type-lists">Lists: Unordered and ordered</a></li>
                                            <li class="nav-item"><a class="nav-link fw-normal" href="#type-lists-unstyled">Lists: Unstyled</a></li>
                                            <li class="nav-item"><a class="nav-link fw-normal" href="#type-lists-inline">Lists: Inline</a></li>
                                            <li class="nav-item"><a class="nav-link fw-normal" href="#type-description-list">Description list basic example</a></li>
                                            <li class="nav-item"><a class="nav-link fw-normal" href="#type-description-list-align">Description list alignment</a></li>
                                        </ul>
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
                <section class="py-2 pb-sm-3">
                    <a class="badge d-inline-flex align-items-center text-info bg-info-subtle fw-semibold text-decoration-none py-2 px-3 mb-2 rounded-pill" href="https://getbootstrap.com/docs/5.3/content/typography/" target="_blank" rel="noreferrer">
                        Bootstrap docs
                        <i class="fi-external-link fs-sm ms-1"></i>
                    </a>
                    <h1 class="pt-1">Typography</h1>
                    <p class="text-body-secondary mb-4">Headings, body text, lists, blockquotes and more.</p>
                </section>


                <!-- Headings -->
                <section id="type-headings" class="docs-section pb-sm-2 mb-5">
                    <h4>Headings</h4>
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
                                    <h1>h1. Finder heading</h1>
                                    <hr>
                                    <h2>h2. Finder heading</h2>
                                    <hr>
                                    <h3>h3. Finder heading</h3>
                                    <hr>
                                    <h4>h4. Finder heading</h4>
                                    <hr>
                                    <h5>h5. Finder heading</h5>
                                    <hr>
                                    <h6 class="mb-0">h6. Finder heading</h6>
                                </div>
                                <div id="html-1" class="tab-pane pt-4 fade" role="tabpanel">
                                    <div class="position-relative" data-bs-theme="dark">
                                        <button type="button" class="btn btn-sm btn-outline-secondary bg-dark position-absolute top-0 end-0 mt-2 px-2 z-3" data-copy-code="#headings-code">
                                            <i class="fi-copy fs-sm me-1"></i>
                                            Copy
                                        </button>
                                        <pre id="headings-code" class="code-highlight mx-n2 mb-n2"><code class="language-html">&lt;!-- Headings --&gt;
                                    &lt;h1&gt;h1. Finder heading&lt;/h1&gt;
                                    &lt;h2&gt;h2. Finder heading&lt;/h2&gt;
                                    &lt;h3&gt;h3. Finder heading&lt;/h3&gt;
                                    &lt;h4&gt;h4. Finder heading&lt;/h4&gt;
                                    &lt;h5&gt;h5. Finder heading&lt;/h5&gt;
                                    &lt;h6&gt;h6. Finder heading&lt;/h6&gt;</code></pre>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>


                <!-- Display headings -->
                <section id="type-displays" class="docs-section pb-sm-2 mb-5">
                    <h4>Display headings</h4>
                    <div class="card border-0 shadow">
                        <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                        <div class="card-body position-relative z-2">
                            <ul class="nav nav-tabs m-n2" role="tablist" style="max-width: 240px">
                                <li class="nav-item" role="presentation">
                                    <button type="button" class="nav-link active" data-bs-toggle="tab" data-bs-target="#preview-2" role="tab" aria-controls="preview-2" aria-selected="true">
                                        <i class="fi-eye opacity-75 ms-n1 me-2"></i>
                                        Preview
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button type="button" class="nav-link" data-bs-toggle="tab" data-bs-target="#html-2" role="tab" aria-controls="html-2" aria-selected="false">
                                        <i class="fi-code opacity-75 ms-n1 me-2"></i>
                                        HTML
                                    </button>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div id="preview-2" class="tab-pane pt-4 pb-2 mt-3 fade show active" role="tabpanel">
                                    <h1 class="display-1">Display 1</h1>
                                    <hr>
                                    <h1 class="display-2">Display 2</h1>
                                    <hr>
                                    <h1 class="display-3">Display 3</h1>
                                    <hr>
                                    <h1 class="display-4">Display 4</h1>
                                    <hr>
                                    <h1 class="display-5">Display 5</h1>
                                    <hr>
                                    <h1 class="display-6 mb-0">Display 6</h1>
                                </div>
                                <div id="html-2" class="tab-pane pt-4 fade" role="tabpanel">
                                    <div class="position-relative" data-bs-theme="dark">
                                        <button type="button" class="btn btn-sm btn-outline-secondary bg-dark position-absolute top-0 end-0 mt-2 px-2 z-3" data-copy-code="#displays-code">
                                            <i class="fi-copy fs-sm me-1"></i>
                                            Copy
                                        </button>
                                        <pre id="displays-code" class="code-highlight mx-n2 mb-n2"><code class="language-html">&lt;!-- Display headings --&gt;
                                    &lt;h1 class=&quot;display-1&quot;&gt;Display 1&lt;/h1&gt;
                                    &lt;h1 class=&quot;display-2&quot;&gt;Display 2&lt;/h1&gt;
                                    &lt;h1 class=&quot;display-3&quot;&gt;Display 3&lt;/h1&gt;
                                    &lt;h1 class=&quot;display-4&quot;&gt;Display 4&lt;/h1&gt;
                                    &lt;h1 class=&quot;display-5&quot;&gt;Display 5&lt;/h1&gt;
                                    &lt;h1 class=&quot;display-6&quot;&gt;Display 6&lt;/h1&gt;</code></pre>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>


                <!-- Body text sizes -->
                <section id="type-body-text" class="docs-section pb-sm-2 mb-5">
                    <h4>Body text sizes</h4>
                    <div class="card border-0 shadow">
                        <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                        <div class="card-body position-relative z-2">
                            <ul class="nav nav-tabs m-n2" role="tablist" style="max-width: 240px">
                                <li class="nav-item" role="presentation">
                                    <button type="button" class="nav-link active" data-bs-toggle="tab" data-bs-target="#preview-3" role="tab" aria-controls="preview-3" aria-selected="true">
                                        <i class="fi-eye opacity-75 ms-n1 me-2"></i>
                                        Preview
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button type="button" class="nav-link" data-bs-toggle="tab" data-bs-target="#html-3" role="tab" aria-controls="html-3" aria-selected="false">
                                        <i class="fi-code opacity-75 ms-n1 me-2"></i>
                                        HTML
                                    </button>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div id="preview-3" class="tab-pane pt-4 pb-2 mt-3 fade show active" role="tabpanel">
                                    <p class="fs-1"><span class="fw-bold">fs-1.&nbsp;</span>Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor</p>
                                    <p class="fs-2"><span class="fw-bold">fs-2.&nbsp;</span>Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor</p>
                                    <p class="fs-3"><span class="fw-bold">fs-3.&nbsp;</span>Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor</p>
                                    <p class="fs-4"><span class="fw-bold">fs-4.&nbsp;</span>Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor</p>
                                    <p class="fs-5"><span class="fw-bold">fs-5.&nbsp;</span>Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor</p>
                                    <p class="fs-6"><span class="fw-bold">fs-6.&nbsp;</span>Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor</p>
                                    <p class="lead"> <span class="fw-bold">Lead.&nbsp;</span>Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor</p>
                                    <p class="fs-xl"> <strong>Extra large.&nbsp;</strong>Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor</p>
                                    <p class="fs-lg"> <strong>Large.&nbsp;</strong>Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor</p>
                                    <p><strong>Normal.&nbsp;</strong>Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor</p>
                                    <p class="fs-sm"><strong>Small.&nbsp;</strong>Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor</p>
                                    <p class="fs-xs mb-0"><strong>Extra small.&nbsp;</strong>Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor</p>
                                </div>
                                <div id="html-3" class="tab-pane pt-4 fade" role="tabpanel">
                                    <div class="position-relative" data-bs-theme="dark">
                                        <button type="button" class="btn btn-sm btn-outline-secondary bg-dark position-absolute top-0 end-0 mt-2 px-2 z-3" data-copy-code="#body-text-code">
                                            <i class="fi-copy fs-sm me-1"></i>
                                            Copy
                                        </button>
                                        <pre id="body-text-code" class="code-highlight mx-n2 mb-n2"><code class="language-html">&lt;!-- Body text sizes --&gt;
                                    &lt;p class=&quot;fs-1&quot;&gt;Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor&lt;/p&gt;
                                    &lt;p class=&quot;fs-2&quot;&gt;Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor&lt;/p&gt;
                                    &lt;p class=&quot;fs-3&quot;&gt;Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor&lt;/p&gt;
                                    &lt;p class=&quot;fs-4&quot;&gt;Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor&lt;/p&gt;
                                    &lt;p class=&quot;fs-5&quot;&gt;Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor&lt;/p&gt;
                                    &lt;p class=&quot;fs-6&quot;&gt;Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor&lt;/p&gt;
                                    &lt;p class=&quot;lead&quot;&gt;Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor&lt;/p&gt;
                                    &lt;p class=&quot;fs-xl&quot;&gt;Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor&lt;/p&gt;
                                    &lt;p class=&quot;fs-lg&quot;&gt;Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor&lt;/p&gt;
                                    &lt;p&gt;Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor&lt;/p&gt;
                                    &lt;p class=&quot;fs-sm&quot;&gt;Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor&lt;/p&gt;
                                    &lt;p class=&quot;fs-xs&quot;&gt;Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor&lt;/p&gt;</code></pre>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>


                <!-- Inline text elements -->
                <section id="type-inline" class="docs-section pb-sm-2 mb-5">
                    <h4>Inline text elements</h4>
                    <div class="card border-0 shadow">
                        <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                        <div class="card-body position-relative z-2">
                            <ul class="nav nav-tabs m-n2" role="tablist" style="max-width: 240px">
                                <li class="nav-item" role="presentation">
                                    <button type="button" class="nav-link active" data-bs-toggle="tab" data-bs-target="#preview-4" role="tab" aria-controls="preview-4" aria-selected="true">
                                        <i class="fi-eye opacity-75 ms-n1 me-2"></i>
                                        Preview
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button type="button" class="nav-link" data-bs-toggle="tab" data-bs-target="#html-4" role="tab" aria-controls="html-4" aria-selected="false">
                                        <i class="fi-code opacity-75 ms-n1 me-2"></i>
                                        HTML
                                    </button>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div id="preview-4" class="tab-pane pt-4 pb-2 mt-3 fade show active" role="tabpanel">
                                    <p>You can use the mark tag to <mark>highlight</mark> text.</p>
                                    <p>
                                        <del>This line of text is meant to be treated as deleted text.</del>
                                    </p>
                                    <p>
                                        <s>This line of text is meant to be treated as no longer accurate.</s>
                                    </p>
                                    <p><ins>This line of text is meant to be treated as an addition to the document.</ins></p>
                                    <p>
                                        <u>This line of text will render as underlined.</u>
                                    </p>
                                    <p><small>This line of text is meant to be treated as fine print.</small></p>
                                    <p><strong>This line rendered as bold text.</strong></p>
                                    <p><em>This line rendered as italicized text.</em></p>
                                    <p class="mb-0"><a href="#!">Inline link</a></p>
                                </div>
                                <div id="html-4" class="tab-pane pt-4 fade" role="tabpanel">
                                    <div class="position-relative" data-bs-theme="dark">
                                        <button type="button" class="btn btn-sm btn-outline-secondary bg-dark position-absolute top-0 end-0 mt-2 px-2 z-3" data-copy-code="#inline-code">
                                            <i class="fi-copy fs-sm me-1"></i>
                                            Copy
                                        </button>
                                        <pre id="inline-code" class="code-highlight mx-n2 mb-n2"><code class="language-html">&lt;!-- Inline text elements --&gt;
                                    &lt;p&gt;You can use the mark tag to &lt;mark&gt;highlight&lt;/mark&gt; text.&lt;/p&gt;
                                    &lt;p&gt;&lt;del&gt;This line of text is meant to be treated as deleted text.&lt;/del&gt;&lt;/p&gt;
                                    &lt;p&gt;&lt;s&gt;This line of text is meant to be treated as no longer accurate.&lt;/s&gt;&lt;/p&gt;
                                    &lt;p&gt;&lt;ins&gt;This line of text is meant to be treated as an addition to the document.&lt;/ins&gt;&lt;/p&gt;
                                    &lt;p&gt;&lt;u&gt;This line of text will render as underlined.&lt;/u&gt;&lt;/p&gt;
                                    &lt;p&gt;&lt;small&gt;This line of text is meant to be treated as fine print.&lt;/small&gt;&lt;/p&gt;
                                    &lt;p&gt;&lt;strong&gt;This line rendered as bold text.&lt;/strong&gt;&lt;/p&gt;
                                    &lt;p&gt;&lt;em&gt;This line rendered as italicized text.&lt;/em&gt;&lt;/p&gt;
                                    &lt;p&gt;&lt;a href=&quot;#&quot;&gt;Inline link&lt;/a&gt;&lt;/p&gt;</code></pre>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>


                <!-- Abbreviations -->
                <section id="type-abbreviations" class="docs-section pb-sm-2 mb-5">
                    <h4>Abbreviations</h4>
                    <div class="card border-0 shadow">
                        <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                        <div class="card-body position-relative z-2">
                            <ul class="nav nav-tabs m-n2" role="tablist" style="max-width: 240px">
                                <li class="nav-item" role="presentation">
                                    <button type="button" class="nav-link active" data-bs-toggle="tab" data-bs-target="#preview-5" role="tab" aria-controls="preview-5" aria-selected="true">
                                        <i class="fi-eye opacity-75 ms-n1 me-2"></i>
                                        Preview
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button type="button" class="nav-link" data-bs-toggle="tab" data-bs-target="#html-5" role="tab" aria-controls="html-5" aria-selected="false">
                                        <i class="fi-code opacity-75 ms-n1 me-2"></i>
                                        HTML
                                    </button>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div id="preview-5" class="tab-pane pt-4 pb-2 mt-3 fade show active" role="tabpanel">
                                    <p><abbr title="attribute">attr</abbr></p>
                                    <p class="mb-0"><abbr class="initialism" title="HyperText Markup Language">HTML</abbr></p>
                                </div>
                                <div id="html-5" class="tab-pane pt-4 fade" role="tabpanel">
                                    <div class="position-relative" data-bs-theme="dark">
                                        <button type="button" class="btn btn-sm btn-outline-secondary bg-dark position-absolute top-0 end-0 mt-2 px-2 z-3" data-copy-code="#abbreviations-code">
                                            <i class="fi-copy fs-sm me-1"></i>
                                            Copy
                                        </button>
                                        <pre id="abbreviations-code" class="code-highlight mx-n2 mb-n2"><code class="language-html">&lt;!-- Abbreviations --&gt;
                                    &lt;p&gt;&lt;abbr title=&quot;attribute&quot;&gt;attr&lt;/abbr&gt;&lt;/p&gt;
                                    &lt;p&gt;&lt;abbr class=&quot;initialism&quot; title=&quot;HyperText Markup Language&quot;&gt;HTML&lt;/abbr&gt;&lt;/p&gt;</code></pre>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>


                <!-- Blockquote -->
                <section id="type-blockquote" class="docs-section pb-sm-2 mb-5">
                    <h4>Blockquote</h4>
                    <div class="card border-0 shadow">
                        <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                        <div class="card-body position-relative z-2">
                            <ul class="nav nav-tabs m-n2" role="tablist" style="max-width: 240px">
                                <li class="nav-item" role="presentation">
                                    <button type="button" class="nav-link active" data-bs-toggle="tab" data-bs-target="#preview-6" role="tab" aria-controls="preview-6" aria-selected="true">
                                        <i class="fi-eye opacity-75 ms-n1 me-2"></i>
                                        Preview
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button type="button" class="nav-link" data-bs-toggle="tab" data-bs-target="#html-6" role="tab" aria-controls="html-6" aria-selected="false">
                                        <i class="fi-code opacity-75 ms-n1 me-2"></i>
                                        HTML
                                    </button>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div id="preview-6" class="tab-pane pt-4 pb-2 mt-3 fade show active" role="tabpanel">
                                    <figure class="mb-0">
                                        <blockquote class="blockquote">
                                            <p>&ldquo;A well-known quote, contained in a blockquote element.&rdquo;</p>
                                        </blockquote>
                                        <figcaption class="blockquote-footer mb-0">Someone famous in <cite title="Source Title">Source Title</cite></figcaption>
                                    </figure>
                                </div>
                                <div id="html-6" class="tab-pane pt-4 fade" role="tabpanel">
                                    <div class="position-relative" data-bs-theme="dark">
                                        <button type="button" class="btn btn-sm btn-outline-secondary bg-dark position-absolute top-0 end-0 mt-2 px-2 z-3" data-copy-code="#blockquote-code">
                                            <i class="fi-copy fs-sm me-1"></i>
                                            Copy
                                        </button>
                                        <pre id="blockquote-code" class="code-highlight mx-n2 mb-n2"><code class="language-html">&lt;!-- Blockquote --&gt;
                                    &lt;figure&gt;
                                      &lt;blockquote class=&quot;blockquote&quot;&gt;
                                        &lt;p&gt;A well-known quote, contained in a blockquote element.&lt;/p&gt;
                                      &lt;/blockquote&gt;
                                      &lt;figcaption class=&quot;blockquote-footer&quot;&gt;
                                        Someone famous in &lt;cite title=&quot;Source Title&quot;&gt;Source Title&lt;/cite&gt;
                                      &lt;/figcaption&gt;
                                    &lt;/figure&gt;</code></pre>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>


                <!-- Lists: Unordered and ordered -->
                <section id="type-lists" class="docs-section pb-sm-2 mb-5">
                    <h4>Lists: Unordered and ordered</h4>
                    <div class="card border-0 shadow">
                        <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                        <div class="card-body position-relative z-2">
                            <ul class="nav nav-tabs m-n2" role="tablist" style="max-width: 240px">
                                <li class="nav-item" role="presentation">
                                    <button type="button" class="nav-link active" data-bs-toggle="tab" data-bs-target="#preview-7" role="tab" aria-controls="preview-7" aria-selected="true">
                                        <i class="fi-eye opacity-75 ms-n1 me-2"></i>
                                        Preview
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button type="button" class="nav-link" data-bs-toggle="tab" data-bs-target="#html-7" role="tab" aria-controls="html-7" aria-selected="false">
                                        <i class="fi-code opacity-75 ms-n1 me-2"></i>
                                        HTML
                                    </button>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div id="preview-7" class="tab-pane pt-4 pb-2 mt-3 fade show active" role="tabpanel">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <ul class="mb-sm-0">
                                                <li>Lorem ipsum dolor sit amet</li>
                                                <li>Consectetur adipiscing elit</li>
                                                <li>Integer molestie lorem at massa</li>
                                                <li>Facilisis in pretium nisl aliquet</li>
                                                <li>Nulla volutpat aliquam velit</li>
                                            </ul>
                                        </div>
                                        <div class="col-sm-6">
                                            <ol class="mb-0">
                                                <li>Lorem ipsum dolor sit amet</li>
                                                <li>Consectetur adipiscing elit</li>
                                                <li>Integer molestie lorem at massa</li>
                                                <li>Facilisis in pretium nisl aliquet</li>
                                                <li>Nulla volutpat aliquam velit</li>
                                            </ol>
                                        </div>
                                    </div>
                                </div>
                                <div id="html-7" class="tab-pane pt-4 fade" role="tabpanel">
                                    <div class="position-relative" data-bs-theme="dark">
                                        <button type="button" class="btn btn-sm btn-outline-secondary bg-dark position-absolute top-0 end-0 mt-2 px-2 z-3" data-copy-code="#lists-code">
                                            <i class="fi-copy fs-sm me-1"></i>
                                            Copy
                                        </button>
                                        <pre id="lists-code" class="code-highlight mx-n2 mb-n2"><code class="language-html">&lt;!-- Unordered list --&gt;
                                    &lt;ul&gt;
                                      &lt;li&gt;Lorem ipsum dolor sit amet&lt;/li&gt;
                                      &lt;li&gt;Consectetur adipiscing elit&lt;/li&gt;
                                      &lt;li&gt;Integer molestie lorem at massa&lt;/li&gt;
                                      &lt;li&gt;Facilisis in pretium nisl aliquet&lt;/li&gt;
                                      &lt;li&gt;Nulla volutpat aliquam velit&lt;/li&gt;
                                    &lt;/ul&gt;

                                    &lt;!-- Ordered list --&gt;
                                    &lt;ol&gt;
                                      &lt;li&gt;Lorem ipsum dolor sit amet&lt;/li&gt;
                                      &lt;li&gt;Consectetur adipiscing elit&lt;/li&gt;
                                      &lt;li&gt;Integer molestie lorem at massa&lt;/li&gt;
                                      &lt;li&gt;Facilisis in pretium nisl aliquet&lt;/li&gt;
                                      &lt;li&gt;Nulla volutpat aliquam velit&lt;/li&gt;
                                    &lt;/ol&gt;</code></pre>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>


                <!-- Lists: Unstyled -->
                <section id="type-lists-unstyled" class="docs-section pb-sm-2 mb-5">
                    <h4>Lists: Unstyled</h4>
                    <div class="card border-0 shadow">
                        <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                        <div class="card-body position-relative z-2">
                            <ul class="nav nav-tabs m-n2" role="tablist" style="max-width: 240px">
                                <li class="nav-item" role="presentation">
                                    <button type="button" class="nav-link active" data-bs-toggle="tab" data-bs-target="#preview-8" role="tab" aria-controls="preview-8" aria-selected="true">
                                        <i class="fi-eye opacity-75 ms-n1 me-2"></i>
                                        Preview
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button type="button" class="nav-link" data-bs-toggle="tab" data-bs-target="#html-8" role="tab" aria-controls="html-8" aria-selected="false">
                                        <i class="fi-code opacity-75 ms-n1 me-2"></i>
                                        HTML
                                    </button>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div id="preview-8" class="tab-pane pt-4 pb-2 mt-3 fade show active" role="tabpanel">
                                    <ul class="list-unstyled mb-0">
                                        <li>Lorem ipsum dolor sit amet</li>
                                        <li>Consectetur adipiscing elit</li>
                                        <li>Integer molestie lorem at massa
                                            <ul>
                                                <li>Phasellus iaculis neque</li>
                                                <li>Purus sodales ultricies</li>
                                                <li>Vestibulum laoreet porttitor sem</li>
                                            </ul>
                                        </li>
                                        <li>Faucibus porta lacus fringilla vel</li>
                                        <li>Aenean sit amet erat nunc</li>
                                    </ul>
                                </div>
                                <div id="html-8" class="tab-pane pt-4 fade" role="tabpanel">
                                    <div class="position-relative" data-bs-theme="dark">
                                        <button type="button" class="btn btn-sm btn-outline-secondary bg-dark position-absolute top-0 end-0 mt-2 px-2 z-3" data-copy-code="#lists-unstyled-code">
                                            <i class="fi-copy fs-sm me-1"></i>
                                            Copy
                                        </button>
                                        <pre id="lists-unstyled-code" class="code-highlight mx-n2 mb-n2"><code class="language-html">&lt;!-- Unstyled list --&gt;
                                    &lt;ul class=&quot;list-unstyled&quot;&gt;
                                      &lt;li&gt;Lorem ipsum dolor sit amet&lt;/li&gt;
                                      &lt;li&gt;Consectetur adipiscing elit&lt;/li&gt;
                                      &lt;li&gt;Integer molestie lorem at massa&lt;/li&gt;
                                        &lt;ul&gt;
                                          &lt;li&gt;Phasellus iaculis neque&lt;/li&gt;
                                          &lt;li&gt;Purus sodales ultricies&lt;/li&gt;
                                          &lt;li&gt;Vestibulum laoreet porttitor sem&lt;/li&gt;
                                        &lt;/ul&gt;
                                      &lt;/li&gt;
                                      &lt;li&gt;Faucibus porta lacus fringilla vel&lt;/li&gt;
                                      &lt;li&gt;Aenean sit amet erat nunc&lt;/li&gt;
                                    &lt;/ul&gt;</code></pre>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>


                <!-- Lists: Inline -->
                <section id="type-lists-inline" class="docs-section pb-sm-2 mb-5">
                    <h4>Lists: Inline</h4>
                    <div class="card border-0 shadow">
                        <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                        <div class="card-body position-relative z-2">
                            <ul class="nav nav-tabs m-n2" role="tablist" style="max-width: 240px">
                                <li class="nav-item" role="presentation">
                                    <button type="button" class="nav-link active" data-bs-toggle="tab" data-bs-target="#preview-9" role="tab" aria-controls="preview-9" aria-selected="true">
                                        <i class="fi-eye opacity-75 ms-n1 me-2"></i>
                                        Preview
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button type="button" class="nav-link" data-bs-toggle="tab" data-bs-target="#html-9" role="tab" aria-controls="html-9" aria-selected="false">
                                        <i class="fi-code opacity-75 ms-n1 me-2"></i>
                                        HTML
                                    </button>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div id="preview-9" class="tab-pane pt-4 pb-2 mt-3 fade show active" role="tabpanel">
                                    <ul class="list-inline mb-0">
                                        <li class="list-inline-item">Lorem ipsum dolor</li>
                                        <li class="list-inline-item">Consectetur adipiscing</li>
                                        <li class="list-inline-item">Integer molestie</li>
                                    </ul>
                                </div>
                                <div id="html-9" class="tab-pane pt-4 fade" role="tabpanel">
                                    <div class="position-relative" data-bs-theme="dark">
                                        <button type="button" class="btn btn-sm btn-outline-secondary bg-dark position-absolute top-0 end-0 mt-2 px-2 z-3" data-copy-code="#lists-inline-code">
                                            <i class="fi-copy fs-sm me-1"></i>
                                            Copy
                                        </button>
                                        <pre id="lists-inline-code" class="code-highlight mx-n2 mb-n2"><code class="language-html">&lt;!-- Inline list --&gt;
                                    &lt;ul class=&quot;list-inline&quot;&gt;
                                      &lt;li class=&quot;list-inline-item&quot;&gt;Lorem ipsum dolor&lt;/li&gt;
                                      &lt;li class=&quot;list-inline-item&quot;&gt;Consectetur adipiscing&lt;/li&gt;
                                      &lt;li class=&quot;list-inline-item&quot;&gt;Integer molestie&lt;/li&gt;
                                    &lt;/ul&gt;</code></pre>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>


                <!-- Description list basic example -->
                <section id="type-description-list" class="docs-section pb-sm-2 mb-5">
                    <h4>Description list basic example</h4>
                    <div class="card border-0 shadow">
                        <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                        <div class="card-body position-relative z-2">
                            <ul class="nav nav-tabs m-n2" role="tablist" style="max-width: 240px">
                                <li class="nav-item" role="presentation">
                                    <button type="button" class="nav-link active" data-bs-toggle="tab" data-bs-target="#preview-10" role="tab" aria-controls="preview-10" aria-selected="true">
                                        <i class="fi-eye opacity-75 ms-n1 me-2"></i>
                                        Preview
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button type="button" class="nav-link" data-bs-toggle="tab" data-bs-target="#html-10" role="tab" aria-controls="html-10" aria-selected="false">
                                        <i class="fi-code opacity-75 ms-n1 me-2"></i>
                                        HTML
                                    </button>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div id="preview-10" class="tab-pane pt-4 pb-2 mt-3 fade show active" role="tabpanel">
                                    <dl class="mb-0">
                                        <dt>Description lists</dt>
                                        <dd>A description list is perfect for defining terms.</dd>
                                        <dt>Malesuada porta</dt>
                                        <dd>Etiam porta sem malesuada magna mollis euismod.</dd>
                                        <dt>Euismod</dt>
                                        <dd>Vestibulum id ligula porta felis euismod semper eget lacinia odio sem nec elit.</dd>
                                    </dl>
                                </div>
                                <div id="html-10" class="tab-pane pt-4 fade" role="tabpanel">
                                    <div class="position-relative" data-bs-theme="dark">
                                        <button type="button" class="btn btn-sm btn-outline-secondary bg-dark position-absolute top-0 end-0 mt-2 px-2 z-3" data-copy-code="#description-code">
                                            <i class="fi-copy fs-sm me-1"></i>
                                            Copy
                                        </button>
                                        <pre id="description-code" class="code-highlight mx-n2 mb-n2"><code class="language-html">&lt;!-- Description list basic example --&gt;
                                    &lt;dl&gt;
                                      &lt;dt&gt;Description lists&lt;/dt&gt;
                                      &lt;dd&gt;A description list is perfect for defining terms.&lt;/dd&gt;
                                      &lt;dt&gt;Malesuada porta&lt;/dt&gt;
                                      &lt;dd&gt;Etiam porta sem malesuada magna mollis euismod.&lt;/dd&gt;
                                      &lt;dt&gt;Euismod&lt;/dt&gt;
                                      &lt;dd&gt;Vestibulum id ligula porta felis euismod semper eget lacinia odio sem nec elit.&lt;/dd&gt;
                                    &lt;/dl&gt;</code></pre>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>


                <!-- Description list alignment -->
                <section id="type-description-list-align" class="docs-section">
                    <h4>Description list alignment</h4>
                    <div class="card border-0 shadow">
                        <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                        <div class="card-body position-relative z-2">
                            <ul class="nav nav-tabs m-n2" role="tablist" style="max-width: 240px">
                                <li class="nav-item" role="presentation">
                                    <button type="button" class="nav-link active" data-bs-toggle="tab" data-bs-target="#preview-11" role="tab" aria-controls="preview-11" aria-selected="true">
                                        <i class="fi-eye opacity-75 ms-n1 me-2"></i>
                                        Preview
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button type="button" class="nav-link" data-bs-toggle="tab" data-bs-target="#html-11" role="tab" aria-controls="html-11" aria-selected="false">
                                        <i class="fi-code opacity-75 ms-n1 me-2"></i>
                                        HTML
                                    </button>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div id="preview-11" class="tab-pane pt-4 pb-2 mt-3 fade show active" role="tabpanel">
                                    <dl class="row mb-0">
                                        <dt class="col-sm-3">Description lists</dt>
                                        <dd class="col-sm-9">A description list is perfect for defining terms.</dd>
                                        <dt class="col-sm-3">Euismod</dt>
                                        <dd class="col-sm-9">
                                            <p class="mb-2">Vestibulum id ligula porta felis euismod semper eget lacinia odio sem nec elit.</p>
                                            <p class="mb-0">Donec id elit non mi porta gravida at eget metus.</p>
                                        </dd>
                                        <dt class="col-sm-3">Malesuada porta</dt>
                                        <dd class="col-sm-9">Etiam porta sem malesuada magna mollis euismod.</dd>
                                        <dt class="col-sm-3 text-truncate">Long truncated term is truncated</dt>
                                        <dd class="col-sm-9">Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</dd>
                                        <dt class="col-sm-3">Nesting</dt>
                                        <dd class="col-sm-9">
                                            <dl class="row mb-0">
                                                <dt class="col-sm-4">Nested definition list</dt>
                                                <dd class="col-sm-8">Aenean posuere, tortor sed cursus feugiat nunc augue.</dd>
                                            </dl>
                                        </dd>
                                    </dl>
                                </div>
                                <div id="html-11" class="tab-pane pt-4 fade" role="tabpanel">
                                    <div class="position-relative" data-bs-theme="dark">
                                        <button type="button" class="btn btn-sm btn-outline-secondary bg-dark position-absolute top-0 end-0 mt-2 px-2 z-3" data-copy-code="#description-align-code">
                                            <i class="fi-copy fs-sm me-1"></i>
                                            Copy
                                        </button>
                                        <pre id="description-align-code" class="code-highlight mx-n2 mb-n2"><code class="language-html">&lt;!-- Description list alignment --&gt;
                                    &lt;dl class=&quot;row&quot;&gt;
                                      &lt;dt class=&quot;col-sm-3&quot;&gt;Description lists&amp;nbsp;&lt;/dt&gt;
                                      &lt;dd class=&quot;col-sm-9&quot;&gt;A description list is perfect for defining terms.&lt;/dd&gt;
                                      &lt;dt class=&quot;col-sm-3&quot;&gt;Euismod&lt;/dt&gt;
                                      &lt;dd class=&quot;col-sm-9&quot;&gt;
                                        &lt;p class=&quot;mb-2&quot;&gt;Vestibulum id ligula porta felis euismod semper eget lacinia odio sem nec elit.&lt;/p&gt;
                                        &lt;p class=&quot;mb-0&quot;&gt;Donec id elit non mi porta gravida at eget metus.&lt;/p&gt;
                                      &lt;/dd&gt;
                                      &lt;dt class=&quot;col-sm-3&quot;&gt;Malesuada porta&lt;/dt&gt;
                                      &lt;dd class=&quot;col-sm-9&quot;&gt;Etiam porta sem malesuada magna mollis euismod.&lt;/dd&gt;
                                      &lt;dt class=&quot;col-sm-3 text-truncate&quot;&gt;Long truncated term is truncated&lt;/dt&gt;
                                      &lt;dd class=&quot;col-sm-9&quot;&gt;Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.&lt;/dd&gt;
                                      &lt;dt class=&quot;col-sm-3&quot;&gt;Nesting&lt;/dt&gt;
                                      &lt;dd class=&quot;col-sm-9&quot;&gt;
                                        &lt;dl class=&quot;row&quot;&gt;
                                          &lt;dt class=&quot;col-sm-4&quot;&gt;Nested definition list&lt;/dt&gt;
                                          &lt;dd class=&quot;col-sm-8&quot;&gt;Aenean posuere, tortor sed cursus feugiat nunc augue.&lt;/dd&gt;
                                        &lt;/dl&gt;
                                      &lt;/dd&gt;
                                    &lt;/dl&gt;</code></pre>
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