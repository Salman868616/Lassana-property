@extends('layouts.app')

@section('title', 'Finder Docs | Select box')

@push('styles')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/styles/atom-one-dark.min.css">
  <link rel="stylesheet" href="{{ asset('assets/vendor/simplebar/dist/simplebar.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/vendor/choices.js/public/assets/styles/choices.min.css') }}">

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
                    <div class="dropdown">
                      <span class="list-group-item list-group-item-action justify-content-between dropdown-toggle pe-3 pe-none active">
                        Select box
                        <span class="visually-hidden">tags choices input form multiple control</span>
                      </span>
                      <ul id="anchorNav" class="nav nav-underline flex-column border-start ms-2 my-2" style="gap: .25rem;">
                        <li class="nav-item"><a class="nav-link fw-normal" href="#select-basic">Basic select</a></li>
                        <li class="nav-item"><a class="nav-link fw-normal" href="#select-search">Search and option groups</a></li>
                        <li class="nav-item"><a class="nav-link fw-normal" href="#select-multiple">Multiple select</a></li>
                        <li class="nav-item"><a class="nav-link fw-normal" href="#select-tags-input">Tags input</a></li>
                        <li class="nav-item"><a class="nav-link fw-normal" href="#select-custom-template">Custom option template</a></li>
                        <li class="nav-item"><a class="nav-link fw-normal" href="#select-sizes-shapes">Sizes and shapes</a></li>
                      </ul>
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
          <section class="pt-2 pb-md-2">
            <span class="badge d-inline-flex align-items-center text-info bg-info-subtle fw-semibold text-decoration-none py-2 px-3 mb-2 rounded-pill">Finder component</span>
            <h1 class="pt-1">Select box</h1>
            <p class="text-body-secondary mb-4">Single / multiple select with search and sorting, tags components.</p>
          </section>


          <!-- Info alert -->
          <section class="alert d-sm-flex text-body-emphasis bg-info-subtle border-0 py-4 mb-5">
            <i class="fi-info text-info fs-4 mb-2 mb-sm-0"></i>
            <div class="ps-sm-3 pe-sm-5 w-100">
              <p>The Select box component relies on the <a class="alert-link" href="https://github.com/Choices-js/Choices" target="_blank" rel="noreferrer">Choices.js</a> plugin. To use this component, ensure to include the required reference to the plugin's .css and .js files.</p>
              <p class="mb-2">CSS file is linked in the <code>&lt;head&gt;</code> section and above <code>theme.min.css</code> reference in your document:</p>
              <pre class="code-highlight border mb-3" data-bs-theme="dark"><code class="language-html">&lt;link rel=&quot;stylesheet&quot; href=&quot;assets/vendor/choices.js/public/assets/styles/choices.min.css&quot;&gt;</code></pre>
              <p class="mb-2">JavaScript file is linked before the closing <code>&lt;/body&gt;</code> tag and above <code>theme.min.js</code> reference in your document:</p>
              <pre class="code-highlight border" data-bs-theme="dark"><code class="language-html">&lt;script src=&quot;assets/vendor/choices.js/public/assets/scripts/choices.min.js&quot;&gt;&lt;/script&gt;</code></pre>
              <p class="pt-3 pb-2 mt-2">You can apply virtually any Choices.js option by specifying it within the <code>data-select="{}"</code> attribute.</p>
              <div class="h6">Usefull links:</div>
              <ul class="list-unstyled d-inline-block mb-0">
                <li class="mb-2">
                  <a class="d-flex alert-link fw-medium text-decoration-none" href="https://choices-js.github.io/Choices/" target="_blank" rel="noopener">
                    <i class="fi-external-link mt-1 me-2"></i>
                    All Choices.js possible configuration demos
                  </a>
                </li>
                <li class="mb-2">
                  <a class="d-flex alert-link fw-medium text-decoration-none" href="https://github.com/Choices-js/Choices?tab=readme-ov-file#setup" target="_blank" rel="noopener">
                    <i class="fi-external-link mt-1 me-2"></i>
                    Choices.js API: options, methods and events</a>
                </li>
              </ul>
            </div>
          </section>


          <!-- Basic select -->
          <section id="select-basic" class="docs-section pb-sm-2 mb-5">
            <h4>Basic select</h4>
            <div class="card border-0 shadow">
              <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded z-0" style="opacity: .4"></span>
              <div class="card-body position-relative">
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
                    <div class="mb-4" style="max-width: 400px">
                      <select class="form-select" data-select aria-label="Basic select example">
                        <option value="">Choose name...</option>
                        <option value="Emily Johnson">Emily Johnson</option>
                        <option value="Michael Davis">Michael Davis</option>
                        <option value="Jessica Smith">Jessica Smith</option>
                        <option value="Christopher Taylor">Christopher Taylor</option>
                        <option value="Olivia Anderson">Olivia Anderson</option>
                        <option value="Ethan Williams">Ethan Williams</option>
                      </select>
                    </div>
                    <div style="max-width: 400px">
                      <select class="form-select" data-select aria-label="Disabled select example" disabled>
                        <option value="">Disabled select</option>
                        <option value="1">Option 1</option>
                        <option value="2">Option 2</option>
                        <option value="3">Option 3</option>
                        <option value="4">Option 4</option>
                        <option value="5">Option 5</option>
                      </select>
                    </div>
                  </div>
                  <div id="html-1" class="tab-pane pt-4 fade" role="tabpanel">
                    <div class="position-relative" data-bs-theme="dark">
                      <button type="button" class="btn btn-sm btn-outline-secondary bg-dark position-absolute top-0 end-0 mt-2 px-2 z-3" data-copy-code="#select-basic-code">
                        <i class="fi-copy fs-sm me-1"></i>
                        Copy
                      </button>
                      <pre id="select-basic-code" class="code-highlight mx-n2 mb-n2"><code class="language-html">&lt;!-- Basic select example --&gt;
      &lt;select class=&quot;form-select&quot; data-select aria-label=&quot;Basic select example&quot;&gt;
        &lt;option value=&quot;&quot;&gt;Choose name...&lt;/option&gt;
        &lt;option value=&quot;Emily Johnson&quot;&gt;Emily Johnson&lt;/option&gt;
        &lt;option value=&quot;Michael Davis&quot;&gt;Michael Davis&lt;/option&gt;
        &lt;option value=&quot;Jessica Smith&quot;&gt;Jessica Smith&lt;/option&gt;
        &lt;option value=&quot;Christopher Taylor&quot;&gt;Christopher Taylor&lt;/option&gt;
        &lt;option value=&quot;Olivia Anderson&quot;&gt;Olivia Anderson&lt;/option&gt;
        &lt;option value=&quot;Ethan Williams&quot;&gt;Ethan Williams&lt;/option&gt;
      &lt;/select&gt;

      &lt;!-- Disabled select --&gt;
      &lt;select class=&quot;form-select&quot; data-select aria-label=&quot;Disabled select example&quot; disabled&gt;
        &lt;option value=&quot;&quot;&gt;Disabled select&lt;/option&gt;
        &lt;option value=&quot;1&quot;&gt;Option 1&lt;/option&gt;
        &lt;option value=&quot;2&quot;&gt;Option 2&lt;/option&gt;
        &lt;option value=&quot;3&quot;&gt;Option 3&lt;/option&gt;
        &lt;option value=&quot;4&quot;&gt;Option 4&lt;/option&gt;
        &lt;option value=&quot;5&quot;&gt;Option 5&lt;/option&gt;
      &lt;/select&gt;</code></pre>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>


          <!-- Search and option groups -->
          <section id="select-search" class="docs-section pb-sm-2 mb-5">
            <h4>Search and option groups</h4>
            <div class="card border-0 shadow">
              <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded z-0" style="opacity: .4"></span>
              <div class="card-body position-relative">
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
                    <div style="max-width: 400px">
                      <select class="form-select" data-select='{
                              "searchEnabled": true
                            }' aria-label="Select with search example">
                        <option value="">Select country...</option>
                        <optgroup label="Africa">
                          <option value="Nigeria">Nigeria</option>
                          <option value="South Africa">South Africa</option>
                          <option value="Kenya">Kenya</option>
                          <option value="Egypt">Egypt</option>
                          <option value="Ethiopia">Ethiopia</option>
                        </optgroup>
                        <optgroup label="Asia">
                          <option value="China">China</option>
                          <option value="India">India</option>
                          <option value="Japan">Japan</option>
                          <option value="South Korea">South Korea</option>
                          <option value="Saudi Arabia">Saudi Arabia</option>
                        </optgroup>
                        <optgroup label="Europe">
                          <option value="Germany">Germany</option>
                          <option value="France">France</option>
                          <option value="United Kingdom">United Kingdom</option>
                          <option value="Italy">Italy</option>
                          <option value="Spain">Spain</option>
                        </optgroup>
                        <optgroup label="North America">
                          <option value="United States">United States</option>
                          <option value="Canada">Canada</option>
                          <option value="Mexico">Mexico</option>
                          <option value="Jamaica">Jamaica</option>
                          <option value="Costa Rica">Costa Rica</option>
                        </optgroup>
                        <optgroup label="South America">
                          <option value="Brazil">Brazil</option>
                          <option value="Argentina">Argentina</option>
                          <option value="Colombia">Colombia</option>
                          <option value="Chile">Chile</option>
                          <option value="Peru">Peru</option>
                        </optgroup>
                        <optgroup label="Oceania">
                          <option value="Australia">Australia</option>
                          <option value="New Zealand">New Zealand</option>
                          <option value="Papua New Guinea">Papua New Guinea</option>
                          <option value="Fiji">Fiji</option>
                          <option value="Solomon Islands">Solomon Islands</option>
                        </optgroup>
                      </select>
                    </div>
                  </div>
                  <div id="html-2" class="tab-pane pt-4 fade" role="tabpanel">
                    <div class="position-relative" data-bs-theme="dark">
                      <button type="button" class="btn btn-sm btn-outline-secondary bg-dark position-absolute top-0 end-0 mt-2 px-2 z-3" data-copy-code="#select-search-code">
                        <i class="fi-copy fs-sm me-1"></i>
                        Copy
                      </button>
                      <pre id="select-search-code" class="code-highlight mx-n2 mb-n2"><code class="language-html">&lt;!-- Select with enabled search and option groups --&gt;
      &lt;select class=&quot;form-select&quot; data-select='{
        &quot;searchEnabled&quot;: true
      }' aria-label=&quot;Select with search example&quot;&gt;
        &lt;option value=&quot;&quot;&gt;Select country...&lt;/option&gt;
        &lt;optgroup label=&quot;Africa&quot;&gt;
          &lt;option value=&quot;Nigeria&quot;&gt;Nigeria&lt;/option&gt;
          &lt;option value=&quot;South Africa&quot;&gt;South Africa&lt;/option&gt;
          &lt;option value=&quot;Kenya&quot;&gt;Kenya&lt;/option&gt;
          &lt;option value=&quot;Egypt&quot;&gt;Egypt&lt;/option&gt;
          &lt;option value=&quot;Ethiopia&quot;&gt;Ethiopia&lt;/option&gt;
        &lt;/optgroup&gt;
        &lt;optgroup label=&quot;Asia&quot;&gt;
          &lt;option value=&quot;China&quot;&gt;China&lt;/option&gt;
          &lt;option value=&quot;India&quot;&gt;India&lt;/option&gt;
          &lt;option value=&quot;Japan&quot;&gt;Japan&lt;/option&gt;
          &lt;option value=&quot;South Korea&quot;&gt;South Korea&lt;/option&gt;
          &lt;option value=&quot;Saudi Arabia&quot;&gt;Saudi Arabia&lt;/option&gt;
        &lt;/optgroup&gt;
        &lt;optgroup label=&quot;Europe&quot;&gt;
          &lt;option value=&quot;Germany&quot;&gt;Germany&lt;/option&gt;
          &lt;option value=&quot;France&quot;&gt;France&lt;/option&gt;
          &lt;option value=&quot;United Kingdom&quot;&gt;United Kingdom&lt;/option&gt;
          &lt;option value=&quot;Italy&quot;&gt;Italy&lt;/option&gt;
          &lt;option value=&quot;Spain&quot;&gt;Spain&lt;/option&gt;
        &lt;/optgroup&gt;
        &lt;optgroup label=&quot;North America&quot;&gt;
          &lt;option value=&quot;United States&quot;&gt;United States&lt;/option&gt;
          &lt;option value=&quot;Canada&quot;&gt;Canada&lt;/option&gt;
          &lt;option value=&quot;Mexico&quot;&gt;Mexico&lt;/option&gt;
          &lt;option value=&quot;Jamaica&quot;&gt;Jamaica&lt;/option&gt;
          &lt;option value=&quot;Costa Rica&quot;&gt;Costa Rica&lt;/option&gt;
        &lt;/optgroup&gt;
        &lt;optgroup label=&quot;South America&quot;&gt;
          &lt;option value=&quot;Brazil&quot;&gt;Brazil&lt;/option&gt;
          &lt;option value=&quot;Argentina&quot;&gt;Argentina&lt;/option&gt;
          &lt;option value=&quot;Colombia&quot;&gt;Colombia&lt;/option&gt;
          &lt;option value=&quot;Chile&quot;&gt;Chile&lt;/option&gt;
          &lt;option value=&quot;Peru&quot;&gt;Peru&lt;/option&gt;
        &lt;/optgroup&gt;
        &lt;optgroup label=&quot;Oceania&quot;&gt;
          &lt;option value=&quot;Australia&quot;&gt;Australia&lt;/option&gt;
          &lt;option value=&quot;New Zealand&quot;&gt;New Zealand&lt;/option&gt;
          &lt;option value=&quot;Papua New Guinea&quot;&gt;Papua New Guinea&lt;/option&gt;
          &lt;option value=&quot;Fiji&quot;&gt;Fiji&lt;/option&gt;
          &lt;option value=&quot;Solomon Islands&quot;&gt;Solomon Islands&lt;/option&gt;
        &lt;/optgroup&gt;
      &lt;/select&gt;</code></pre>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>


          <!-- Multiple select -->
          <section id="select-multiple" class="docs-section pb-sm-2 mb-5">
            <h4>Multiple select</h4>
            <div class="card border-0 shadow">
              <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded z-0" style="opacity: .4"></span>
              <div class="card-body position-relative">
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
                    <div class="mb-4" style="max-width: 500px">
                      <select class="form-select" data-select multiple aria-label="Multiple select example">
                        <option value="">Select CMS</option>
                        <option value="Shopify" selected>Shopify</option>
                        <option value="WooCommerce">WooCommerce</option>
                        <option value="Magento">Magento</option>
                        <option value="OpenCart">OpenCart</option>
                        <option value="PrestaShop">PrestaShop</option>
                        <option value="VirtueMart">VirtueMart</option>
                      </select>
                    </div>
                    <div style="max-width: 500px">
                      <select class="form-select" data-select multiple aria-label="Disabled multiple select" disabled>
                        <option value="">Disabled select</option>
                        <option value="Shopify" selected>Shopify</option>
                        <option value="WooCommerce">WooCommerce</option>
                        <option value="Magento">Magento</option>
                        <option value="OpenCart">OpenCart</option>
                        <option value="PrestaShop">PrestaShop</option>
                        <option value="VirtueMart">VirtueMart</option>
                      </select>
                    </div>
                  </div>
                  <div id="html-3" class="tab-pane pt-4 fade" role="tabpanel">
                    <div class="position-relative" data-bs-theme="dark">
                      <button type="button" class="btn btn-sm btn-outline-secondary bg-dark position-absolute top-0 end-0 mt-2 px-2 z-3" data-copy-code="#select-multiple-code">
                        <i class="fi-copy fs-sm me-1"></i>
                        Copy
                      </button>
                      <pre id="select-multiple-code" class="code-highlight mx-n2 mb-n2"><code class="language-html">&lt;!-- Multiple select example --&gt;
      &lt;select class=&quot;form-select&quot; data-select multiple aria-label=&quot;Multiple select example&quot;&gt;
        &lt;option value=&quot;&quot;&gt;Select CMS&lt;/option&gt;
        &lt;option value=&quot;Shopify&quot; selected&gt;Shopify&lt;/option&gt;
        &lt;option value=&quot;WooCommerce&quot;&gt;WooCommerce&lt;/option&gt;
        &lt;option value=&quot;Magento&quot;&gt;Magento&lt;/option&gt;
        &lt;option value=&quot;OpenCart&quot;&gt;OpenCart&lt;/option&gt;
        &lt;option value=&quot;PrestaShop&quot;&gt;PrestaShop&lt;/option&gt;
        &lt;option value=&quot;VirtueMart&quot;&gt;VirtueMart&lt;/option&gt;
      &lt;/select&gt;

      &lt;!-- Disabled select --&gt;
      &lt;select class=&quot;form-select&quot; data-select multiple aria-label=&quot;Disabled multiple select&quot; disabled&gt;
        &lt;option value=&quot;&quot;&gt;Disabled select&lt;/option&gt;
        &lt;option value=&quot;Shopify&quot; selected&gt;Shopify&lt;/option&gt;
        &lt;option value=&quot;WooCommerce&quot;&gt;WooCommerce&lt;/option&gt;
        &lt;option value=&quot;Magento&quot;&gt;Magento&lt;/option&gt;
        &lt;option value=&quot;OpenCart&quot;&gt;OpenCart&lt;/option&gt;
        &lt;option value=&quot;PrestaShop&quot;&gt;PrestaShop&lt;/option&gt;
        &lt;option value=&quot;VirtueMart&quot;&gt;VirtueMart&lt;/option&gt;
      &lt;/select&gt;</code></pre>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>


          <!-- Tags input -->
          <section id="select-tags-input" class="docs-section pb-sm-2 mb-5">
            <h4>Tags input</h4>
            <div class="card border-0 shadow">
              <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded z-0" style="opacity: .4"></span>
              <div class="card-body position-relative">
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
                    <div class="mb-4" style="max-width: 500px">
                      <input type="text" class="form-select" data-select='{"placeholderValue": "Enter something"}' value="tag-1,tag-2">
                    </div>
                    <div style="max-width: 500px">
                      <input type="text" class="form-select" data-select='{"placeholderValue": "Disabled input"}' value="tag-1,tag-2" disabled>
                    </div>
                  </div>
                  <div id="html-4" class="tab-pane pt-4 fade" role="tabpanel">
                    <div class="position-relative" data-bs-theme="dark">
                      <button type="button" class="btn btn-sm btn-outline-secondary bg-dark position-absolute top-0 end-0 mt-2 px-2 z-3" data-copy-code="#select-tags-input-code">
                        <i class="fi-copy fs-sm me-1"></i>
                        Copy
                      </button>
                      <pre id="select-tags-input-code" class="code-highlight mx-n2 mb-n2"><code class="language-html">&lt;!-- Tags input example --&gt;
      &lt;input type=&quot;text&quot; class=&quot;form-select&quot; data-select='{&quot;placeholderValue&quot;: &quot;Enter something&quot;}' value=&quot;tag-1,tag-2&quot;&gt;

      &lt;!-- Disabled tags input --&gt;
      &lt;input type=&quot;text&quot; class=&quot;form-select&quot; data-select='{&quot;placeholderValue&quot;: &quot;Disabled input&quot;}' value=&quot;tag-1,tag-2&quot; disabled&gt;</code></pre>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>


          <!-- Custom option template -->
          <section id="select-custom-template" class="docs-section pb-sm-2 mb-5">
            <h4>Custom option template</h4>
            <div class="card border-0 shadow">
              <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded z-0" style="opacity: .4"></span>
              <div class="card-body position-relative">
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
                    <div class="mb-3" style="max-width: 400px">
                      <select class="form-select" data-select='{
                              "placeholderValue": "Select language",
                              "choices": [
                                {
                                  "value": "",
                                  "label": "Select language",
                                  "placeholder": true
                                },
                                {
                                  "value": "English",
                                  "label": "<div class=\"d-flex align-items-center\"><img src={{ asset('assets/img/flags/en-uk.png') }} class=\"flex-shrink-0 me-2\" width=\"20\" alt=\"English\"> English</div>",
                                  "selected": true
                                },
                                {
                                  "value": "Français",
                                  "label": "<div class=\"d-flex align-items-center\"><img src={{ asset('assets/img/flags/fr.png') }} class=\"flex-shrink-0 me-2\" width=\"20\" alt=\"Français\"> Français</div>"
                                },
                                {
                                  "value": "Deutsch",
                                  "label": "<div class=\"d-flex align-items-center\"><img src={{ asset('assets/img/flags/de.png') }} class=\"flex-shrink-0 me-2\" width=\"20\" alt=\"Deutsch\"> Deutsch</div>"
                                },
                                {
                                  "value": "Italiano",
                                  "label": "<div class=\"d-flex align-items-center\"><img src={{ asset('assets/img/flags/it.png') }} class=\"flex-shrink-0 me-2\" width=\"20\" alt=\"Italiano\"> Italiano</div>"
                                }
                              ]
                            }' data-select-template="true" aria-label="Select language"></select>
                    </div>
                    <div style="max-width: 400px">
                      <select class="form-select" data-select='{
                              "placeholderValue": "Choose rating",
                              "choices": [
                                {
                                  "value": "",
                                  "label": "Choose rating",
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
                                    "icon": "<span class=\"d-flex gap-1 py-1\"><i class=\"fi-star-filled text-warning\"></i><i class=\"fi-star-filled text-warning\"></i><i class=\"fi-star-filled text-warning\"></i><i class=\"fi-star-filled text-warning\"></i></span>",
                                    "selected": "4 stars"
                                  }
                                },
                                {
                                  "value": "5",
                                  "label": "<span class=\"visually-hidden\">5 stars</span>",
                                  "customProperties": {
                                    "icon": "<span class=\"d-flex gap-1 py-1\"><i class=\"fi-star-filled text-warning\"></i><i class=\"fi-star-filled text-warning\"></i><i class=\"fi-star-filled text-warning\"></i><i class=\"fi-star-filled text-warning\"></i><i class=\"fi-star-filled text-warning\"></i></span>",
                                    "selected": "5 stars"
                                  }
                                }
                              ]
                            }' data-select-template="true" aria-label="Choose rating"></select>
                    </div>
                  </div>
                  <div id="html-5" class="tab-pane pt-4 fade" role="tabpanel">
                    <div class="position-relative" data-bs-theme="dark">
                      <button type="button" class="btn btn-sm btn-outline-secondary bg-dark position-absolute top-0 end-0 mt-2 px-2 z-3" data-copy-code="#select-custom-template-code">
                        <i class="fi-copy fs-sm me-1"></i>
                        Copy
                      </button>
                      <pre id="select-custom-template-code" class="code-highlight mx-n2 mb-n2"><code class="language-html">&lt;!-- Select with custom option template --&gt;
      &lt;select class=&quot;form-select&quot; data-select='{
        &quot;placeholderValue&quot;: &quot;Select language&quot;,
        &quot;choices&quot;: [
          {
            &quot;value&quot;: &quot;&quot;,
            &quot;label&quot;: &quot;Select language&quot;,
            &quot;placeholder&quot;: true
          },
          {
            &quot;value&quot;: &quot;English&quot;,
            &quot;label&quot;: &quot;&lt;div class=\&quot;d-flex align-items-center\&quot;&gt;&lt;img src=\&quot;assets/img/flags/en-uk.png\&quot; class=\&quot;flex-shrink-0 me-2\&quot; width=\&quot;20\&quot; alt=\&quot;English\&quot;&gt; English&lt;/div&gt;&quot;,
            &quot;selected&quot;: true
          },
          {
            &quot;value&quot;: &quot;Français&quot;,
            &quot;label&quot;: &quot;&lt;div class=\&quot;d-flex align-items-center\&quot;&gt;&lt;img src=\&quot;assets/img/flags/fr.png\&quot; class=\&quot;flex-shrink-0 me-2\&quot; width=\&quot;20\&quot; alt=\&quot;Français\&quot;&gt; Français&lt;/div&gt;&quot;
          },
          {
            &quot;value&quot;: &quot;Deutsch&quot;,
            &quot;label&quot;: &quot;&lt;div class=\&quot;d-flex align-items-center\&quot;&gt;&lt;img src=\&quot;assets/img/flags/de.png\&quot; class=\&quot;flex-shrink-0 me-2\&quot; width=\&quot;20\&quot; alt=\&quot;Deutsch\&quot;&gt; Deutsch&lt;/div&gt;&quot;
          },
          {
            &quot;value&quot;: &quot;Italiano&quot;,
            &quot;label&quot;: &quot;&lt;div class=\&quot;d-flex align-items-center\&quot;&gt;&lt;img src=\&quot;assets/img/flags/it.png\&quot; class=\&quot;flex-shrink-0 me-2\&quot; width=\&quot;20\&quot; alt=\&quot;Italiano\&quot;&gt; Italiano&lt;/div&gt;&quot;
          }
        ]
      }' data-select-template=&quot;true&quot; aria-label=&quot;Select language&quot;&gt;&lt;/select&gt;

      &lt;!-- Select with custom option template where selected label = customProperties.selected --&gt;
      &lt;select class=&quot;form-select&quot; data-select='{
        &quot;placeholderValue&quot;: &quot;Choose rating&quot;,
        &quot;choices&quot;: [
          {
            &quot;value&quot;: &quot;&quot;,
            &quot;label&quot;: &quot;Choose rating&quot;,
            &quot;placeholder&quot;: true
          },
          {
            &quot;value&quot;: &quot;1&quot;,
            &quot;label&quot;: &quot;&lt;span class=\&quot;visually-hidden\&quot;&gt;1 star&lt;/span&gt;&quot;,
            &quot;customProperties&quot;: {
              &quot;icon&quot;: &quot;&lt;span class=\&quot;d-flex gap-1 py-1\&quot;&gt;&lt;i class=\&quot;fi-star-filled text-warning\&quot;&gt;&lt;/i&gt;&lt;/span&gt;&quot;,
              &quot;selected&quot;: &quot;1 star&quot;
            }
          },
          {
            &quot;value&quot;: &quot;2&quot;,
            &quot;label&quot;: &quot;&lt;span class=\&quot;visually-hidden\&quot;&gt;2 stars&lt;/span&gt;&quot;,
            &quot;customProperties&quot;: {
              &quot;icon&quot;: &quot;&lt;span class=\&quot;d-flex gap-1 py-1\&quot;&gt;&lt;i class=\&quot;fi-star-filled text-warning\&quot;&gt;&lt;/i&gt;&lt;i class=\&quot;fi-star-filled text-warning\&quot;&gt;&lt;/i&gt;&lt;/span&gt;&quot;,
              &quot;selected&quot;: &quot;2 stars&quot;
            }
          },
          {
            &quot;value&quot;: &quot;3&quot;,
            &quot;label&quot;: &quot;&lt;span class=\&quot;visually-hidden\&quot;&gt;3 stars&lt;/span&gt;&quot;,
            &quot;customProperties&quot;: {
              &quot;icon&quot;: &quot;&lt;span class=\&quot;d-flex gap-1 py-1\&quot;&gt;&lt;i class=\&quot;fi-star-filled text-warning\&quot;&gt;&lt;/i&gt;&lt;i class=\&quot;fi-star-filled text-warning\&quot;&gt;&lt;/i&gt;&lt;i class=\&quot;fi-star-filled text-warning\&quot;&gt;&lt;/i&gt;&lt;/span&gt;&quot;,
              &quot;selected&quot;: &quot;3 stars&quot;
            }
          },
          {
            &quot;value&quot;: &quot;4&quot;,
            &quot;label&quot;: &quot;&lt;span class=\&quot;visually-hidden\&quot;&gt;4 stars&lt;/span&gt;&quot;,
            &quot;customProperties&quot;: {
              &quot;icon&quot;: &quot;&lt;span class=\&quot;d-flex gap-1 py-1\&quot;&gt;&lt;i class=\&quot;fi-star-filled text-warning\&quot;&gt;&lt;/i&gt;&lt;i class=\&quot;fi-star-filled text-warning\&quot;&gt;&lt;/i&gt;&lt;i class=\&quot;fi-star-filled text-warning\&quot;&gt;&lt;/i&gt;&lt;i class=\&quot;fi-star-filled text-warning\&quot;&gt;&lt;/i&gt;&lt;/span&gt;&quot;,
              &quot;selected&quot;: &quot;4 stars&quot;
            }
          },
          {
            &quot;value&quot;: &quot;5&quot;,
            &quot;label&quot;: &quot;&lt;span class=\&quot;visually-hidden\&quot;&gt;5 stars&lt;/span&gt;&quot;,
            &quot;customProperties&quot;: {
              &quot;icon&quot;: &quot;&lt;span class=\&quot;d-flex gap-1 py-1\&quot;&gt;&lt;i class=\&quot;fi-star-filled text-warning\&quot;&gt;&lt;/i&gt;&lt;i class=\&quot;fi-star-filled text-warning\&quot;&gt;&lt;/i&gt;&lt;i class=\&quot;fi-star-filled text-warning\&quot;&gt;&lt;/i&gt;&lt;i class=\&quot;fi-star-filled text-warning\&quot;&gt;&lt;/i&gt;&lt;i class=\&quot;fi-star-filled text-warning\&quot;&gt;&lt;/i&gt;&lt;/span&gt;&quot;,
              &quot;selected&quot;: &quot;5 stars&quot;
            }
          }
        ]
      }' data-select-template=&quot;true&quot; aria-label=&quot;Choose rating&quot;&gt;&lt;/select&gt;</code></pre>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>


          <!-- Sizes and shapes -->
          <section id="select-sizes-shapes" class="docs-section">
            <h4>Sizes and shapes</h4>
            <div class="card border-0 shadow">
              <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded z-0" style="opacity: .4"></span>
              <div class="card-body position-relative">
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
                    <div class="d-flex flex-wrap flex-sm-nowrap gap-4">
                      <div class="w-100" style="max-width: 400px">
                        <div class="mb-3">
                          <select class="form-select form-select-lg" data-select='{
                                  "classNames": {
                                    "containerInner": ["form-select", "form-select-lg"]
                                  }
                                }' aria-label="Large rounded select">
                            <option value="">Select option...</option>
                            <option value="1">Option 1</option>
                            <option value="2">Option 2</option>
                            <option value="3">Option 3</option>
                          </select>
                        </div>
                        <div class="mb-3">
                          <select class="form-select" data-select aria-label="Normal rounded select">
                            <option value="">Select option...</option>
                            <option value="1">Option 1</option>
                            <option value="2">Option 2</option>
                            <option value="3">Option 3</option>
                          </select>
                        </div>
                        <select class="form-select form-select-sm" data-select='{
                                "classNames": {
                                  "containerInner": ["form-select", "form-select-sm"]
                                }
                              }' aria-label="Small rounded select">
                          <option value="">Select option...</option>
                          <option value="1">Option 1</option>
                          <option value="2">Option 2</option>
                          <option value="3">Option 3</option>
                        </select>
                      </div>
                      <div class="w-100" style="max-width: 400px">
                        <div class="mb-3">
                          <select class="form-select form-select-lg rounded-pill" data-select='{
                                  "classNames": {
                                    "containerInner": ["form-select", "form-select-lg", "rounded-pill"]
                                  }
                                }' aria-label="Large pill select">
                            <option value="">Select option...</option>
                            <option value="1">Option 1</option>
                            <option value="2">Option 2</option>
                            <option value="3">Option 3</option>
                          </select>
                        </div>
                        <div class="mb-3">
                          <select class="form-select rounded-pill" data-select='{
                                  "classNames": {
                                    "containerInner": ["form-select", "rounded-pill"]
                                  }
                                }' aria-label="Normal pill select">
                            <option value="">Select option...</option>
                            <option value="1">Option 1</option>
                            <option value="2">Option 2</option>
                            <option value="3">Option 3</option>
                          </select>
                        </div>
                        <select class="form-select form-select-sm rounded-pill" data-select='{
                                "classNames": {
                                  "containerInner": ["form-select", "form-select-sm", "rounded-pill"]
                                }
                              }' aria-label="Small pill select">
                          <option value="">Select option...</option>
                          <option value="1">Option 1</option>
                          <option value="2">Option 2</option>
                          <option value="3">Option 3</option>
                        </select>
                      </div>
                    </div>
                    <div class="w-100 pt-4 mt-sm-2" style="max-width: 400px">
                      <div class="mb-3">
                        <select class="form-select form-select-lg rounded-0" data-select='{
                                "classNames": {
                                  "containerInner": ["form-select", "form-select-lg", "rounded-0"]
                                }
                              }' aria-label="Large square select">
                          <option value="">Select option...</option>
                          <option value="1">Option 1</option>
                          <option value="2">Option 2</option>
                          <option value="3">Option 3</option>
                        </select>
                      </div>
                      <div class="mb-3">
                        <select class="form-select rounded-0" data-select='{
                                "classNames": {
                                  "containerInner": ["form-select", "rounded-0"]
                                }
                              }' aria-label="Normal square select">
                          <option value="">Select option...</option>
                          <option value="1">Option 1</option>
                          <option value="2">Option 2</option>
                          <option value="3">Option 3</option>
                        </select>
                      </div>
                      <select class="form-select form-select-sm rounded-0" data-select='{
                              "classNames": {
                                "containerInner": ["form-select", "form-select-sm", "rounded-0"]
                              }
                            }' aria-label="Small square select">
                        <option value="">Select option...</option>
                        <option value="1">Option 1</option>
                        <option value="2">Option 2</option>
                        <option value="3">Option 3</option>
                      </select>
                    </div>
                  </div>
                  <div id="html-6" class="tab-pane pt-4 fade" role="tabpanel">
                    <div class="position-relative" data-bs-theme="dark">
                      <button type="button" class="btn btn-sm btn-outline-secondary bg-dark position-absolute top-0 end-0 mt-2 px-2 z-3" data-copy-code="#select-sizes-shapes-code">
                        <i class="fi-copy fs-sm me-1"></i>
                        Copy
                      </button>
                      <pre id="select-sizes-shapes-code" class="code-highlight mx-n2 mb-n2"><code class="language-html">&lt;!-- Large rounded select --&gt;
      &lt;div class=&quot;mb-3&quot;&gt;
        &lt;select class=&quot;form-select form-select-lg&quot; data-select='{
          &quot;classNames&quot;: {
            &quot;containerInner&quot;: [&quot;form-select&quot;, &quot;form-select-lg&quot;]
          }
        }' aria-label=&quot;Large rounded select&quot;&gt;
          &lt;option value=&quot;&quot;&gt;Select option...&lt;/option&gt;
          &lt;option value=&quot;1&quot;&gt;Option 1&lt;/option&gt;
          &lt;option value=&quot;2&quot;&gt;Option 2&lt;/option&gt;
          &lt;option value=&quot;3&quot;&gt;Option 3&lt;/option&gt;
        &lt;/select&gt;
      &lt;/div&gt;

      &lt;!-- Normal rounded select --&gt;
      &lt;div class=&quot;mb-3&quot;&gt;
        &lt;select class=&quot;form-select&quot; data-select aria-label=&quot;Normal rounded select&quot;&gt;
          &lt;option value=&quot;&quot;&gt;Select option...&lt;/option&gt;
          &lt;option value=&quot;1&quot;&gt;Option 1&lt;/option&gt;
          &lt;option value=&quot;2&quot;&gt;Option 2&lt;/option&gt;
          &lt;option value=&quot;3&quot;&gt;Option 3&lt;/option&gt;
        &lt;/select&gt;
      &lt;/div&gt;

      &lt;!-- Small rounded select --&gt;
      &lt;div class=&quot;mb-3&quot;&gt;
        &lt;select class=&quot;form-select form-select-sm&quot; data-select='{
          &quot;classNames&quot;: {
            &quot;containerInner&quot;: [&quot;form-select&quot;, &quot;form-select-sm&quot;]
          }
        }' aria-label=&quot;Small rounded select&quot;&gt;
          &lt;option value=&quot;&quot;&gt;Select option...&lt;/option&gt;
          &lt;option value=&quot;1&quot;&gt;Option 1&lt;/option&gt;
          &lt;option value=&quot;2&quot;&gt;Option 2&lt;/option&gt;
          &lt;option value=&quot;3&quot;&gt;Option 3&lt;/option&gt;
        &lt;/select&gt;
      &lt;/div&gt;

      &lt;!-- Large pill select --&gt;
      &lt;div class=&quot;mb-3&quot;&gt;
        &lt;select class=&quot;form-select form-select-lg rounded-pill&quot; data-select='{
          &quot;classNames&quot;: {
            &quot;containerInner&quot;: [&quot;form-select&quot;, &quot;form-select-lg&quot;, &quot;rounded-pill&quot;]
          }
        }' aria-label=&quot;Large pill select&quot;&gt;
          &lt;option value=&quot;&quot;&gt;Select option...&lt;/option&gt;
          &lt;option value=&quot;1&quot;&gt;Option 1&lt;/option&gt;
          &lt;option value=&quot;2&quot;&gt;Option 2&lt;/option&gt;
          &lt;option value=&quot;3&quot;&gt;Option 3&lt;/option&gt;
        &lt;/select&gt;
      &lt;/div&gt;

      &lt;!-- Normal pill select --&gt;
      &lt;div class=&quot;mb-3&quot;&gt;
        &lt;select class=&quot;form-select rounded-pill&quot; data-select='{
          &quot;classNames&quot;: {
            &quot;containerInner&quot;: [&quot;form-select&quot;, &quot;rounded-pill&quot;]
          }
        }' aria-label=&quot;Normal pill select&quot;&gt;
          &lt;option value=&quot;&quot;&gt;Select option...&lt;/option&gt;
          &lt;option value=&quot;1&quot;&gt;Option 1&lt;/option&gt;
          &lt;option value=&quot;2&quot;&gt;Option 2&lt;/option&gt;
          &lt;option value=&quot;3&quot;&gt;Option 3&lt;/option&gt;
        &lt;/select&gt;
      &lt;/div&gt;

      &lt;!-- Small pill select --&gt;
      &lt;div class=&quot;mb-3&quot;&gt;
        &lt;select class=&quot;form-select form-select-sm rounded-pill&quot; data-select='{
          &quot;classNames&quot;: {
            &quot;containerInner&quot;: [&quot;form-select&quot;, &quot;form-select-sm&quot;, &quot;rounded-pill&quot;]
          }
        }' aria-label=&quot;Small pill select&quot;&gt;
          &lt;option value=&quot;&quot;&gt;Select option...&lt;/option&gt;
          &lt;option value=&quot;1&quot;&gt;Option 1&lt;/option&gt;
          &lt;option value=&quot;2&quot;&gt;Option 2&lt;/option&gt;
          &lt;option value=&quot;3&quot;&gt;Option 3&lt;/option&gt;
        &lt;/select&gt;
      &lt;/div&gt;

      &lt;!-- Large square select --&gt;
      &lt;div class=&quot;mb-3&quot;&gt;
        &lt;select class=&quot;form-select form-select-lg rounded-0&quot; data-select='{
          &quot;classNames&quot;: {
            &quot;containerInner&quot;: [&quot;form-select&quot;, &quot;form-select-lg&quot;, &quot;rounded-0&quot;]
          }
        }' aria-label=&quot;Large square select&quot;&gt;
          &lt;option value=&quot;&quot;&gt;Select option...&lt;/option&gt;
          &lt;option value=&quot;1&quot;&gt;Option 1&lt;/option&gt;
          &lt;option value=&quot;2&quot;&gt;Option 2&lt;/option&gt;
          &lt;option value=&quot;3&quot;&gt;Option 3&lt;/option&gt;
        &lt;/select&gt;
      &lt;/div&gt;

      &lt;!-- Normal square select --&gt;
      &lt;div class=&quot;mb-3&quot;&gt;
        &lt;select class=&quot;form-select rounded-0&quot; data-select='{
          &quot;classNames&quot;: {
            &quot;containerInner&quot;: [&quot;form-select&quot;, &quot;rounded-0&quot;]
          }
        }' aria-label=&quot;Normal square select&quot;&gt;
          &lt;option value=&quot;&quot;&gt;Select option...&lt;/option&gt;
          &lt;option value=&quot;1&quot;&gt;Option 1&lt;/option&gt;
          &lt;option value=&quot;2&quot;&gt;Option 2&lt;/option&gt;
          &lt;option value=&quot;3&quot;&gt;Option 3&lt;/option&gt;
        &lt;/select&gt;
      &lt;/div&gt;

      &lt;!-- Small square select --&gt;
      &lt;div class=&quot;mb-3&quot;&gt;
        &lt;select class=&quot;form-select form-select-sm rounded-0&quot; data-select='{
          &quot;classNames&quot;: {
            &quot;containerInner&quot;: [&quot;form-select&quot;, &quot;form-select-sm&quot;, &quot;rounded-0&quot;]
          }
        }' aria-label=&quot;Small square select&quot;&gt;
          &lt;option value=&quot;&quot;&gt;Select option...&lt;/option&gt;
          &lt;option value=&quot;1&quot;&gt;Option 1&lt;/option&gt;
          &lt;option value=&quot;2&quot;&gt;Option 2&lt;/option&gt;
          &lt;option value=&quot;3&quot;&gt;Option 3&lt;/option&gt;
        &lt;/select&gt;
      &lt;/div&gt;</code></pre>
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
  <script src="{{ asset('assets/vendor/choices.js/public/assets/scripts/choices.min.js') }}"></script>
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