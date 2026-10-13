@extends('layouts.app')

@section('title', 'Finder Docs | Listing cards')

@push('styles')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/styles/atom-one-dark.min.css">
  <link rel="stylesheet" href="{{ asset('assets/vendor/simplebar/dist/simplebar.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}">

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
                  <div class="dropdown">
                    <span class="list-group-item list-group-item-action justify-content-between dropdown-toggle pe-3 pe-none active">
                      Listing cards
                      <span class="visually-hidden">product service item entry summary</span>
                    </span>
                    <ul id="anchorNav" class="nav nav-underline flex-column border-start ms-2 my-2" style="gap: .25rem;">
                      <li class="nav-item"><a class="nav-link fw-normal" href="#real-estate-1">Real Estate listing card: Variant 1</a></li>
                      <li class="nav-item"><a class="nav-link fw-normal" href="#real-estate-2">Real Estate listing card: Variant 2</a></li>
                      <li class="nav-item"><a class="nav-link fw-normal" href="#real-estate-admin">Real Estate listing card: Admin</a></li>
                      <li class="nav-item"><a class="nav-link fw-normal" href="#cars-vertical">Car listing card: Vertical (Grid)</a></li>
                      <li class="nav-item"><a class="nav-link fw-normal" href="#cars-horizontal">Car listing card: Horizontal (List)</a></li>
                      <li class="nav-item"><a class="nav-link fw-normal" href="#city-guide-1">City Guide listing card: Variant 1</a></li>
                      <li class="nav-item"><a class="nav-link fw-normal" href="#city-guide-2">City Guide listing card: Variant 2</a></li>
                      <li class="nav-item"><a class="nav-link fw-normal" href="#contractor">Contractor listing card</a></li>
                      <li class="nav-item"><a class="nav-link fw-normal" href="#project-vertical">Project listing card: Vertical</a></li>
                      <li class="nav-item"><a class="nav-link fw-normal" href="#project-horizontal">Project listing card: Horizontal</a></li>
                      <li class="nav-item"><a class="nav-link fw-normal" href="#doctor-1">Doctor listing card: Variant 1</a></li>
                      <li class="nav-item"><a class="nav-link fw-normal" href="#doctor-2">Doctor listing card: Variant 2</a></li>
                      <li class="nav-item"><a class="nav-link fw-normal" href="#doctor-3">Doctor listing card: Variant 3</a></li>
                      <li class="nav-item"><a class="nav-link fw-normal" href="#event-1">Event listing card: Variant 1</a></li>
                      <li class="nav-item"><a class="nav-link fw-normal" href="#event-2">Event listing card: Variant 2</a></li>
                      <li class="nav-item"><a class="nav-link fw-normal" href="#event-3">Event listing card: Variant 3</a></li>
                    </ul>
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
        <section class="pt-2 pb-md-2">
          <span class="badge d-inline-flex align-items-center text-info bg-info-subtle fw-semibold text-decoration-none py-2 px-3 mb-2 rounded-pill">Finder component</span>
          <h1 class="pt-1">Listing cards</h1>
          <p class="text-body-secondary mb-4">Displays of individual items or entries, featuring key details like images, titles, descriptions, and additional metadata.</p>
        </section>


        <!-- Info alert -->
        <section class="alert d-sm-flex text-body-emphasis bg-info-subtle border-0 py-4 mb-5">
          <i class="fi-info text-info fs-4 mb-2 mb-sm-0"></i>
          <div class="ps-sm-3 pe-sm-5 w-100">
            <p>Some listing cards include an image carousel (slider) for previewing multiple images which relies on the <a class="alert-link" href="https://swiperjs.com/" target="_blank" rel="noreferrer">Swiper</a> plugin. Ensure you include the required references to the plugin's .css and .js files.</p>
            <p class="mb-2">CSS file is linked in the <code>&lt;head&gt;</code> section and above <code>theme.min.css</code> reference in your document:</p>
            <pre class="code-highlight border mb-3" data-bs-theme="dark"><code class="language-html">&lt;link rel=&quot;stylesheet&quot; href=&quot;assets/vendor/swiper/swiper-bundle.min.css&quot;&gt;</code></pre>
            <p class="mb-2">JavaScript file is linked before the closing <code>&lt;/body&gt;</code> tag and above <code>theme.min.js</code> reference in your document:</p>
            <pre class="code-highlight border" data-bs-theme="dark"><code class="language-html">&lt;script src=&quot;assets/vendor/swiper/swiper-bundle.min.js&quot;&gt;&lt;/script&gt;</code></pre>
          </div>
        </section>


        <!-- Real Estate listing card: Variant 1 -->
        <section id="real-estate-1" class="docs-section pb-sm-2 mb-5">
          <h4>Real Estate listing card: Variant 1</h4>
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
                  <article class="card hover-effect-opacity bg-transparent" style="max-width: 362px">
                    <div class="card-img-top position-relative bg-body-tertiary overflow-hidden">
                      <div class="swiper z-2" data-swiper='{
                              "pagination": {
                                "el": ".swiper-pagination"
                              },
                              "navigation": {
                                "prevEl": ".btn-prev",
                                "nextEl": ".btn-next"
                              },
                              "breakpoints": {
                                "991": {
                                  "allowTouchMove": false
                                }
                              }
                            }'>
                        <a class="swiper-wrapper" href="#!">
                          <div class="swiper-slide">
                            <div class="ratio d-block" style="--fn-aspect-ratio: calc(248 / 362 * 100%)">
                              <img src="{{ asset('assets/img/listings/real-estate/06.jpg') }}" alt="Image">
                              <span class="position-absolute top-0 start-0 w-100 h-100 z-1" style="background: linear-gradient(180deg, rgba(0,0,0, 0) 0%, rgba(0,0,0, .11) 100%)"></span>
                            </div>
                          </div>
                          <div class="swiper-slide">
                            <div class="ratio d-block" style="--fn-aspect-ratio: calc(248 / 362 * 100%)">
                              <img src="{{ asset('assets/img/listings/real-estate/04.jpg') }}" alt="Image">
                              <span class="position-absolute top-0 start-0 w-100 h-100 z-1" style="background: linear-gradient(180deg, rgba(0,0,0, 0) 0%, rgba(0,0,0, .11) 100%)"></span>
                            </div>
                          </div>
                          <div class="swiper-slide">
                            <div class="ratio d-block" style="--fn-aspect-ratio: calc(248 / 362 * 100%)">
                              <img src="{{ asset('assets/img/listings/real-estate/07.jpg') }}" alt="Image">
                              <span class="position-absolute top-0 start-0 w-100 h-100 z-1" style="background: linear-gradient(180deg, rgba(0,0,0, 0) 0%, rgba(0,0,0, .11) 100%)"></span>
                            </div>
                          </div>
                        </a>
                        <div class="d-flex flex-column gap-2 align-items-start position-absolute top-0 start-0 z-1 pt-1 pt-sm-0 ps-1 ps-sm-0 mt-2 mt-sm-3 ms-2 ms-sm-3">
                          <span class="badge text-bg-info d-inline-flex align-items-center">
                            Verified
                            <i class="fi-shield ms-1"></i>
                          </span>
                          <span class="badge text-bg-primary">New</span>
                        </div>
                        <div class="position-absolute top-0 end-0 z-1 hover-effect-target opacity-0 pt-1 pt-sm-0 pe-1 pe-sm-0 mt-2 mt-sm-3 me-2 me-sm-3">
                          <button type="button" class="btn btn-sm btn-icon btn-light bg-light border-0 rounded-circle animate-pulse" aria-label="Add to wishlist">
                            <i class="fi-heart animate-target fs-sm"></i>
                          </button>
                        </div>
                        <div class="position-absolute top-50 start-0 z-1 translate-middle-y d-none d-lg-block hover-effect-target opacity-0 ms-3">
                          <button type="button" class="btn btn-sm btn-prev btn-icon btn-light bg-light rounded-circle animate-slide-start" aria-label="Prev">
                            <i class="fi-chevron-left fs-lg animate-target"></i>
                          </button>
                        </div>
                        <div class="position-absolute top-50 end-0 z-1 translate-middle-y d-none d-lg-block hover-effect-target opacity-0 me-3">
                          <button type="button" class="btn btn-sm btn-next btn-icon btn-light bg-light rounded-circle animate-slide-end" aria-label="Next">
                            <i class="fi-chevron-right fs-lg animate-target"></i>
                          </button>
                        </div>
                        <div class="swiper-pagination bottom-0 mb-2" data-bs-theme="light"></div>
                      </div>
                    </div>
                    <div class="card-body p-3">
                      <div class="h5 mb-2">$2,750</div>
                      <h3 class="fs-sm fw-normal text-body mb-2">
                        <a class="stretched-link text-body" href="#!">929 Hart St, Brooklyn, NY 11237</a>
                      </h3>
                      <div class="h6 fs-sm mb-0">108 sq.m</div>
                    </div>
                    <div class="card-footer d-flex gap-2 border-0 bg-transparent pt-0 pb-3 px-3 mt-n1">
                      <div class="d-flex align-items-center fs-sm gap-1 me-1">
                        3<i class="fi-bed-single fs-base text-secondary-emphasis"></i>
                      </div>
                      <div class="d-flex align-items-center fs-sm gap-1 me-1">
                        2<i class="fi-shower fs-base text-secondary-emphasis"></i>
                      </div>
                      <div class="d-flex align-items-center fs-sm gap-1 me-1">
                        1<i class="fi-car-garage fs-base text-secondary-emphasis"></i>
                      </div>
                    </div>
                  </article>
                </div>
                <div id="html-1" class="tab-pane pt-4 fade" role="tabpanel">
                  <div class="position-relative" data-bs-theme="dark">
                    <button type="button" class="btn btn-sm btn-outline-secondary bg-dark position-absolute top-0 end-0 mt-2 px-2 z-3" data-copy-code="#real-estate-1-code">
                      <i class="fi-copy fs-sm me-1"></i>
                      Copy
                    </button>
                    <pre id="real-estate-1-code" class="code-highlight mx-n2 mb-n2"><code class="language-html">&lt;!-- Real Estate listing card: Variant 1 --&gt;
    &lt;article class=&quot;card hover-effect-opacity&quot;&gt;

      &lt;!-- Image container --&gt;
      &lt;div class=&quot;card-img-top position-relative bg-body-tertiary overflow-hidden&quot;&gt;
        &lt;div class=&quot;swiper z-2&quot; data-swiper='{
          &quot;pagination&quot;: {
            &quot;el&quot;: &quot;.swiper-pagination&quot;
          },
          &quot;navigation&quot;: {
            &quot;prevEl&quot;: &quot;.btn-prev&quot;,
            &quot;nextEl&quot;: &quot;.btn-next&quot;
          },
          &quot;breakpoints&quot;: {
            &quot;991&quot;: {
              &quot;allowTouchMove&quot;: false
            }
          }
        }'&gt;
          &lt;a class=&quot;swiper-wrapper&quot; href=&quot;#&quot;&gt;
            &lt;div class=&quot;swiper-slide&quot;&gt;
              &lt;!-- Wrap the image with a "ratio" element to avoid content shifts on page load. Formula: imageHeight / imageWidth * 100% --&gt;
              &lt;div class=&quot;ratio d-block&quot; style=&quot;--fn-aspect-ratio: calc(248 / 362 * 100%)&quot;&gt;
                &lt;img src=&quot;assets/img/listings/real-estate/06.jpg&quot; alt=&quot;Image&quot;&gt;
                &lt;span class=&quot;position-absolute top-0 start-0 w-100 h-100 z-1&quot; style=&quot;background: linear-gradient(180deg, rgba(0,0,0, 0) 0%, rgba(0,0,0, .11) 100%)&quot;&gt;&lt;/span&gt;
              &lt;/div&gt;
            &lt;/div&gt;
            &lt;div class=&quot;swiper-slide&quot;&gt;
              &lt;!-- Wrap the image with a "ratio" element to avoid content shifts on page load. Formula: imageHeight / imageWidth * 100% --&gt;
              &lt;div class=&quot;ratio d-block&quot; style=&quot;--fn-aspect-ratio: calc(248 / 362 * 100%)&quot;&gt;
                &lt;img src=&quot;assets/img/listings/real-estate/04.jpg&quot; alt=&quot;Image&quot;&gt;
                &lt;span class=&quot;position-absolute top-0 start-0 w-100 h-100 z-1&quot; style=&quot;background: linear-gradient(180deg, rgba(0,0,0, 0) 0%, rgba(0,0,0, .11) 100%)&quot;&gt;&lt;/span&gt;
              &lt;/div&gt;
            &lt;/div&gt;
            &lt;div class=&quot;swiper-slide&quot;&gt;
              &lt;!-- Wrap the image with a "ratio" element to avoid content shifts on page load. Formula: imageHeight / imageWidth * 100% --&gt;
              &lt;div class=&quot;ratio d-block&quot; style=&quot;--fn-aspect-ratio: calc(248 / 362 * 100%)&quot;&gt;
                &lt;img src=&quot;assets/img/listings/real-estate/07.jpg&quot; alt=&quot;Image&quot;&gt;
                &lt;span class=&quot;position-absolute top-0 start-0 w-100 h-100 z-1&quot; style=&quot;background: linear-gradient(180deg, rgba(0,0,0, 0) 0%, rgba(0,0,0, .11) 100%)&quot;&gt;&lt;/span&gt;
              &lt;/div&gt;
            &lt;/div&gt;
          &lt;/a&gt;

          &lt;!-- Badges --&gt;
          &lt;div class=&quot;d-flex flex-column gap-2 align-items-start position-absolute top-0 start-0 z-1 pt-1 pt-sm-0 ps-1 ps-sm-0 mt-2 mt-sm-3 ms-2 ms-sm-3&quot;&gt;
            &lt;span class=&quot;badge text-bg-info d-inline-flex align-items-center&quot;&gt;
              Verified
              &lt;i class=&quot;fi-shield ms-1&quot;&gt;&lt;/i&gt;
            &lt;/span&gt;
            &lt;span class=&quot;badge text-bg-primary&quot;&gt;New&lt;/span&gt;
          &lt;/div&gt;

          &lt;!-- Wishlist button --&gt;
          &lt;div class=&quot;position-absolute top-0 end-0 z-1 hover-effect-target opacity-0 pt-1 pt-sm-0 pe-1 pe-sm-0 mt-2 mt-sm-3 me-2 me-sm-3&quot;&gt;
            &lt;button type=&quot;button&quot; class=&quot;btn btn-sm btn-icon btn-light bg-light border-0 rounded-circle animate-pulse&quot; aria-label=&quot;Add to wishlist&quot;&gt;
              &lt;i class=&quot;fi-heart animate-target fs-sm&quot;&gt;&lt;/i&gt;
            &lt;/button&gt;
          &lt;/div&gt;

          &lt;!-- Prev slide button --&gt;
          &lt;div class=&quot;position-absolute top-50 start-0 z-1 translate-middle-y d-none d-lg-block hover-effect-target opacity-0 ms-3&quot;&gt;
            &lt;button type=&quot;button&quot; class=&quot;btn btn-sm btn-prev btn-icon btn-light bg-light rounded-circle animate-slide-start&quot; aria-label=&quot;Prev&quot;&gt;
              &lt;i class=&quot;fi-chevron-left fs-lg animate-target&quot;&gt;&lt;/i&gt;
            &lt;/button&gt;
          &lt;/div&gt;

          &lt;!-- Next slide button --&gt;
          &lt;div class=&quot;position-absolute top-50 end-0 z-1 translate-middle-y d-none d-lg-block hover-effect-target opacity-0 me-3&quot;&gt;
            &lt;button type=&quot;button&quot; class=&quot;btn btn-sm btn-next btn-icon btn-light bg-light rounded-circle animate-slide-end&quot; aria-label=&quot;Next&quot;&gt;
              &lt;i class=&quot;fi-chevron-right fs-lg animate-target&quot;&gt;&lt;/i&gt;
            &lt;/button&gt;
          &lt;/div&gt;

          &lt;!-- Bullets --&gt;
          &lt;div class=&quot;swiper-pagination bottom-0 mb-2&quot; data-bs-theme=&quot;light&quot;&gt;&lt;/div&gt;
        &lt;/div&gt;
      &lt;/div&gt;

      &lt;!-- Card body --&gt;
      &lt;div class=&quot;card-body p-3&quot;&gt;
        &lt;div class=&quot;h5 mb-2&quot;&gt;$2,750&lt;/div&gt;
        &lt;h3 class=&quot;fs-sm fw-normal text-body mb-2&quot;&gt;
          &lt;a class=&quot;stretched-link text-body&quot; href=&quot;#&quot;&gt;929 Hart St, Brooklyn, NY 11237&lt;/a&gt;
        &lt;/h3&gt;
        &lt;div class=&quot;h6 fs-sm mb-0&quot;&gt;108 sq.m&lt;/div&gt;
      &lt;/div&gt;

      &lt;!-- Card footer --&gt;
      &lt;div class=&quot;card-footer d-flex gap-2 border-0 bg-transparent pt-0 pb-3 px-3 mt-n1&quot;&gt;
        &lt;div class=&quot;d-flex align-items-center fs-sm gap-1 me-1&quot;&gt;
          3&lt;i class=&quot;fi-bed-single fs-base text-secondary-emphasis&quot;&gt;&lt;/i&gt;
        &lt;/div&gt;
        &lt;div class=&quot;d-flex align-items-center fs-sm gap-1 me-1&quot;&gt;
          2&lt;i class=&quot;fi-shower fs-base text-secondary-emphasis&quot;&gt;&lt;/i&gt;
        &lt;/div&gt;
        &lt;div class=&quot;d-flex align-items-center fs-sm gap-1 me-1&quot;&gt;
          1&lt;i class=&quot;fi-car-garage fs-base text-secondary-emphasis&quot;&gt;&lt;/i&gt;
        &lt;/div&gt;
      &lt;/div&gt;
    &lt;/article&gt;</code></pre>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>


        <!-- Real Estate listing card: Variant 2 -->
        <section id="real-estate-2" class="docs-section pb-sm-2 mb-5">
          <h4>Real Estate listing card: Variant 2</h4>
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
                  <article class="hover-effect-scale position-relative bg-body-tertiary rounded overflow-hidden" style="max-width: 636px">
                    <div class="d-flex gap-2 position-absolute top-0 start-0 z-1 pt-3 ps-3 mt-lg-2 mt-xl-3 ms-lg-2 ms-xl-3">
                      <span class="badge text-bg-info d-inline-flex align-items-center">
                        Verified
                        <i class="fi-shield ms-1"></i>
                      </span>
                      <span class="badge text-bg-warning">Featured</span>
                    </div>
                    <img src="{{ asset('assets/img/listings/real-estate/featured/02.jpg') }}" class="hover-effect-target position-absolute top-0 start-0 w-100 h-100 object-fit-cover" alt="Image">
                    <div class="ratio d-none d-sm-block" style="--fn-aspect-ratio: calc(307 / 636 * 100%)"></div>
                    <div class="ratio d-sm-none" style="--fn-aspect-ratio: calc(410 / 636 * 100%)"></div>
                    <div class="position-absolute top-0 start-0 w-100 h-100 z-1 p-3">
                      <div class="d-flex align-items-end h-100 p-lg-2 p-xl-3">
                        <div class="d-flex flex-wrap align-items-center justify-content-between w-100 gap-3">
                          <div class="mb-1 mb-sm-0">
                            <h3 class="text-white d-flex flex-wrap align-items-center mb-1 mb-lg-2">2-bed apartment<span class="fs-6 fw-medium mx-2">|</span><span class="fs-6">78 sq.m</span></h3>
                            <p class="fs-sm text-white mb-0">40 S 9th St, Brooklyn, NY 11249</p>
                          </div>
                          <a class="btn btn-primary stretched-link" href="#">From $2,600</a>
                        </div>
                      </div>
                    </div>
                    <span class="position-absolute top-0 start-0 w-100 h-100 bg-dark d-sm-none" style="opacity: .4"></span>
                    <span class="position-absolute top-0 start-0 w-100 h-100 d-none d-sm-block" style="background: linear-gradient(0deg, rgba(64,64,64, .74) 10.5%, rgba(0,0,0, 0) 54.86%)"></span>
                  </article>
                </div>
                <div id="html-2" class="tab-pane pt-4 fade" role="tabpanel">
                  <div class="position-relative" data-bs-theme="dark">
                    <button type="button" class="btn btn-sm btn-outline-secondary bg-dark position-absolute top-0 end-0 mt-2 px-2 z-3" data-copy-code="#real-estate-2-code">
                      <i class="fi-copy fs-sm me-1"></i>
                      Copy
                    </button>
                    <pre id="real-estate-2-code" class="code-highlight mx-n2 mb-n2"><code class="language-html">&lt;!-- Real Estate listing card: Variant 2 --&gt;
    &lt;article class=&quot;hover-effect-scale position-relative bg-body-tertiary rounded overflow-hidden&quot;&gt;

      &lt;!-- Badges --&gt;
      &lt;div class=&quot;d-flex gap-2 position-absolute top-0 start-0 z-1 pt-3 ps-3 mt-lg-2 mt-xl-3 ms-lg-2 ms-xl-3&quot;&gt;
        &lt;span class=&quot;badge text-bg-info d-inline-flex align-items-center&quot;&gt;
          Verified
          &lt;i class=&quot;fi-shield ms-1&quot;&gt;&lt;/i&gt;
        &lt;/span&gt;
        &lt;span class=&quot;badge text-bg-warning&quot;&gt;Featured&lt;/span&gt;
      &lt;/div&gt;

      &lt;!-- Background image --&gt;
      &lt;img src=&quot;assets/img/listings/real-estate/featured/02.jpg&quot; class=&quot;hover-effect-target position-absolute top-0 start-0 w-100 h-100 object-fit-cover&quot; alt=&quot;Image&quot;&gt;

      &lt;!-- Add a &quot;ratio&quot; element to avoid content shifts on page load. Formula: imageHeight / imageWidth * 100% --&gt;
      &lt;div class=&quot;ratio d-none d-sm-block&quot; style=&quot;--fn-aspect-ratio: calc(307 / 636 * 100%)&quot;&gt;&lt;/div&gt;
      &lt;div class=&quot;ratio d-sm-none&quot; style=&quot;--fn-aspect-ratio: calc(410 / 636 * 100%)&quot;&gt;&lt;/div&gt;

      &lt;!-- Text + Button --&gt;
      &lt;div class=&quot;position-absolute top-0 start-0 w-100 h-100 z-1 p-3&quot;&gt;
        &lt;div class=&quot;d-flex align-items-end h-100 p-lg-2 p-xl-3&quot;&gt;
          &lt;div class=&quot;d-flex flex-wrap align-items-center justify-content-between w-100 gap-3&quot;&gt;
            &lt;div class=&quot;mb-1 mb-sm-0&quot;&gt;
              &lt;h3 class=&quot;text-white d-flex flex-wrap align-items-center mb-1 mb-lg-2&quot;&gt;2-bed apartment&lt;span class=&quot;fs-6 fw-medium mx-2&quot;&gt;|&lt;/span&gt;&lt;span class=&quot;fs-6&quot;&gt;78 sq.m&lt;/span&gt;&lt;/h3&gt;
              &lt;p class=&quot;fs-sm text-white mb-0&quot;&gt;40 S 9th St, Brooklyn, NY 11249&lt;/p&gt;
            &lt;/div&gt;
            &lt;a class=&quot;btn btn-primary stretched-link&quot; href=&quot;#&quot;&gt;From $2,600&lt;/a&gt;
          &lt;/div&gt;
        &lt;/div&gt;
      &lt;/div&gt;

      &lt;!-- Gradient overlay --&gt;
      &lt;span class=&quot;position-absolute top-0 start-0 w-100 h-100 bg-dark d-sm-none&quot; style=&quot;opacity: .4&quot;&gt;&lt;/span&gt;
      &lt;span class=&quot;position-absolute top-0 start-0 w-100 h-100 d-none d-sm-block&quot; style=&quot;background: linear-gradient(0deg, rgba(64,64,64, .74) 10.5%, rgba(0,0,0, 0) 54.86%)&quot;&gt;&lt;/span&gt;
    &lt;/article&gt;</code></pre>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>


        <!-- Real Estate listing card: Admin -->
        <section id="real-estate-admin" class="docs-section pb-sm-2 mb-5">
          <h4>Real Estate listing card: Admin</h4>
          <div class="card border-0 shadow">
            <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
            <div class="card-body position-relative z-2">
              <ul class="nav nav-tabs m-n2" role="tablist" style="max-width: 240px">
                <li class="nav-item" role="presentation">
                  <button type="button" class="nav-link active" data-bs-toggle="tab" data-bs-target="#preview-16" role="tab" aria-controls="preview-16" aria-selected="true">
                    <i class="fi-eye opacity-75 ms-n1 me-2"></i>
                    Preview
                  </button>
                </li>
                <li class="nav-item" role="presentation">
                  <button type="button" class="nav-link" data-bs-toggle="tab" data-bs-target="#html-16" role="tab" aria-controls="html-16" aria-selected="false">
                    <i class="fi-code opacity-75 ms-n1 me-2"></i>
                    HTML
                  </button>
                </li>
              </ul>
              <div class="tab-content">
                <div id="preview-16" class="tab-pane pt-4 pb-2 mt-3 fade show active" role="tabpanel">
                  <article class="card">
                    <div class="row g-0">
                      <div class="col-sm-4 col-md-3 rounded overflow-hidden pb-2 pb-sm-0 pe-sm-2">
                        <a class="position-relative d-flex h-100 bg-body-tertiary" href="#!" style="min-height: 174px">
                          <img src="{{ asset('assets/img/listings/real-estate/01.jpg') }}" class="position-absolute top-0 start-0 w-100 h-100 object-fit-cover" alt="Image">
                          <div class="ratio d-none d-sm-block" style="--fn-aspect-ratio: calc(180 / 240 * 100%)"></div>
                          <div class="ratio ratio-16x9 d-sm-none"></div>
                        </a>
                      </div>
                      <div class="col-sm-8 col-md-9 align-self-center">
                        <div class="card-body d-flex justify-content-between p-3 py-sm-4 ps-sm-2 ps-md-3 pe-md-4 mt-n1 mt-sm-0">
                          <div class="position-relative pe-3">
                            <span class="badge text-body-emphasis bg-body-secondary mb-2">For rent</span>
                            <div class="h5 mb-2">$2,500</div>
                            <a class="stretched-link d-block fs-sm text-body text-decoration-none mb-2" href="#!">40 S 9th St, Brooklyn, NY 11249</a>
                            <div class="h6 fs-sm mb-0">97 sq.m</div>
                          </div>
                          <div class="text-end">
                            <div class="fs-xs text-body-secondary mb-3">Created: 05/10/2024</div>
                            <div class="d-flex justify-content-end gap-2 mb-3">
                              <button type="button" class="btn btn-outline-secondary">Statistics</button>
                              <div class="dropdown">
                                <button type="button" class="btn btn-icon btn-outline-secondary" data-bs-toggle="dropdown" aria-expanded="false" aria-label="Settings">
                                  <i class="fi-settings fs-base"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end">
                                  <li>
                                    <a class="dropdown-item" href="#!">
                                      <i class="fi-edit opacity-75 me-2"></i>
                                      Edit
                                    </a>
                                  </li>
                                  <li>
                                    <a class="dropdown-item" href="#!">
                                      <i class="fi-zap fs-base opacity-75 me-2"></i>
                                      Promote
                                    </a>
                                  </li>
                                  <li>
                                    <a class="dropdown-item" href="#!">
                                      <i class="fi-archive opacity-75 me-2"></i>
                                      Move to archive
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
                            <ul class="list-unstyled flex-row flex-wrap justify-content-end fs-sm mb-0">
                              <li class="d-flex align-items-center me-2 me-md-3">
                                <i class="fi-eye fs-base me-1"></i>
                                1246
                              </li>
                              <li class="d-flex align-items-center me-2 me-md-3">
                                <i class="fi-heart fs-base me-1"></i>
                                23
                              </li>
                              <li class="d-flex align-items-center">
                                <i class="fi-phone-incoming fs-base me-1"></i>
                                8
                              </li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                  </article>
                </div>
                <div id="html-16" class="tab-pane pt-4 fade" role="tabpanel">
                  <div class="position-relative" data-bs-theme="dark">
                    <button type="button" class="btn btn-sm btn-outline-secondary bg-dark position-absolute top-0 end-0 mt-2 px-2 z-3" data-copy-code="#real-estate-admin-code">
                      <i class="fi-copy fs-sm me-1"></i>
                      Copy
                    </button>
                    <pre id="real-estate-admin-code" class="code-highlight mx-n2 mb-n2"><code class="language-html">&lt;!-- Real Estate listing card: Admin --&gt;
    &lt;article class=&quot;card&quot;&gt;
      &lt;div class=&quot;row g-0&quot;&gt;

        &lt;!-- Image --&gt;
        &lt;div class=&quot;col-sm-4 col-md-3 rounded overflow-hidden pb-2 pb-sm-0 pe-sm-2&quot;&gt;
          &lt;a class=&quot;position-relative d-flex h-100 bg-body-tertiary&quot; href=&quot;#!&quot; style=&quot;min-height: 174px&quot;&gt;
            &lt;img src=&quot;assets/img/listings/real-estate/01.jpg&quot; class=&quot;position-absolute top-0 start-0 w-100 h-100 object-fit-cover&quot; alt=&quot;Image&quot;&gt;
            &lt;div class=&quot;ratio d-none d-sm-block&quot;  style=&quot;--fn-aspect-ratio: calc(180 / 240 * 100%)&quot;&gt;&lt;/div&gt;
            &lt;div class=&quot;ratio ratio-16x9 d-sm-none&quot;&gt;&lt;/div&gt;
          &lt;/a&gt;
        &lt;/div&gt;

        &lt;!-- Card body: Details + Stats + Action buttons --&gt;
        &lt;div class=&quot;col-sm-8 col-md-9 align-self-center&quot;&gt;
          &lt;div class=&quot;card-body d-flex justify-content-between p-3 py-sm-4 ps-sm-2 ps-md-3 pe-md-4 mt-n1 mt-sm-0&quot;&gt;
            &lt;div class=&quot;position-relative pe-3&quot;&gt;
              &lt;span class=&quot;badge text-body-emphasis bg-body-secondary mb-2&quot;&gt;For rent&lt;/span&gt;
              &lt;div class=&quot;h5 mb-2&quot;&gt;$2,500&lt;/div&gt;
              &lt;a class=&quot;stretched-link d-block fs-sm text-body text-decoration-none mb-2&quot; href=&quot;#!&quot;&gt;40 S 9th St, Brooklyn, NY 11249&lt;/a&gt;
              &lt;div class=&quot;h6 fs-sm mb-0&quot;&gt;97 sq.m&lt;/div&gt;
            &lt;/div&gt;
            &lt;div class=&quot;text-end&quot;&gt;
              &lt;div class=&quot;fs-xs text-body-secondary mb-3&quot;&gt;Created: 05/10/2024&lt;/div&gt;
              &lt;div class=&quot;d-flex justify-content-end gap-2 mb-3&quot;&gt;
                &lt;button type=&quot;button&quot; class=&quot;btn btn-outline-secondary&quot;&gt;Statistics&lt;/button&gt;

                &lt;!-- Action dropdown --&gt;
                &lt;div class=&quot;dropdown&quot;&gt;
                  &lt;button type=&quot;button&quot; class=&quot;btn btn-icon btn-outline-secondary&quot; data-bs-toggle=&quot;dropdown&quot; aria-expanded=&quot;false&quot; aria-label=&quot;Settings&quot;&gt;
                    &lt;i class=&quot;fi-settings fs-base&quot;&gt;&lt;/i&gt;
                  &lt;/button&gt;
                  &lt;ul class=&quot;dropdown-menu dropdown-menu-end&quot;&gt;
                    &lt;li&gt;
                      &lt;a class=&quot;dropdown-item&quot; href=&quot;#!&quot;&gt;
                        &lt;i class=&quot;fi-edit opacity-75 me-2&quot;&gt;&lt;/i&gt;
                        Edit
                      &lt;/a&gt;
                    &lt;/li&gt;
                    &lt;li&gt;
                      &lt;a class=&quot;dropdown-item&quot; href=&quot;#!&quot;&gt;
                        &lt;i class=&quot;fi-zap fs-base opacity-75 me-2&quot;&gt;&lt;/i&gt;
                        Promote
                      &lt;/a&gt;
                    &lt;/li&gt;
                    &lt;li&gt;
                      &lt;a class=&quot;dropdown-item&quot; href=&quot;#!&quot;&gt;
                        &lt;i class=&quot;fi-archive opacity-75 me-2&quot;&gt;&lt;/i&gt;
                        Move to archive
                      &lt;/a&gt;
                    &lt;/li&gt;
                    &lt;li&gt;
                      &lt;a class=&quot;dropdown-item text-danger&quot; href=&quot;#!&quot;&gt;
                        &lt;i class=&quot;fi-trash opacity-75 me-2&quot;&gt;&lt;/i&gt;
                        Delete
                      &lt;/a&gt;
                    &lt;/li&gt;
                  &lt;/ul&gt;
                &lt;/div&gt;
              &lt;/div&gt;

              &lt;!-- Statistics --&gt;
              &lt;ul class=&quot;list-unstyled flex-row flex-wrap justify-content-end fs-sm mb-0&quot;&gt;
                &lt;li class=&quot;d-flex align-items-center me-2 me-md-3&quot;&gt;
                  &lt;i class=&quot;fi-eye fs-base me-1&quot;&gt;&lt;/i&gt;
                  1246
                &lt;/li&gt;
                &lt;li class=&quot;d-flex align-items-center me-2 me-md-3&quot;&gt;
                  &lt;i class=&quot;fi-heart fs-base me-1&quot;&gt;&lt;/i&gt;
                  23
                &lt;/li&gt;
                &lt;li class=&quot;d-flex align-items-center&quot;&gt;
                  &lt;i class=&quot;fi-phone-incoming fs-base me-1&quot;&gt;&lt;/i&gt;
                  8
                &lt;/li&gt;
              &lt;/ul&gt;
            &lt;/div&gt;
          &lt;/div&gt;
        &lt;/div&gt;
      &lt;/div&gt;
    &lt;/article&gt;</code></pre>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>


        <!-- Car listing card: Vertical (Grid) -->
        <section id="cars-vertical" class="docs-section pb-sm-2 mb-5">
          <h4>Car listing card: Vertical (Grid)</h4>
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
                  <article class="card hover-effect-scale bg-body-tertiary border-0" style="max-width: 306px">
                    <div class="card-img-top position-relative overflow-hidden">
                      <div class="d-flex flex-column gap-2 align-items-start position-absolute top-0 start-0 z-1 pt-1 pt-sm-0 ps-1 ps-sm-0 mt-2 mt-sm-3 ms-2 ms-sm-3">
                        <span class="badge text-bg-info d-inline-flex align-items-center">
                          Verified
                          <i class="fi-shield ms-1"></i>
                        </span>
                        <span class="badge text-bg-warning">Used</span>
                      </div>
                      <div class="ratio hover-effect-target bg-body-secondary" style="--fn-aspect-ratio: calc(204 / 306 * 100%)">
                        <img src="{{ asset('assets/img/listings/cars/grid/06.jpg') }}" alt="Image">
                      </div>
                    </div>
                    <div class="card-body pb-3">
                      <div class="d-flex align-items-center justify-content-between mb-2">
                        <div class="fs-xs text-body-secondary me-3">28/06/2024</div>
                        <div class="d-flex gap-2 position-relative z-2">
                          <button type="button" class="btn btn-icon btn-sm btn-outline-secondary animate-pulse rounded-circle" data-bs-toggle="tooltip" data-bs-custom-class="tooltip-sm" title="Wishlist" aria-label="Add to wishlist">
                            <i class="fi-heart animate-target fs-sm"></i>
                          </button>
                          <button type="button" class="btn btn-icon btn-sm btn-outline-secondary animate-shake rounded-circle" data-bs-toggle="tooltip" data-bs-custom-class="tooltip-sm" title="Notify" aria-label="Notify">
                            <i class="fi-bell animate-target fs-sm"></i>
                          </button>
                          <button type="button" class="btn btn-icon btn-sm btn-outline-secondary animate-rotate rounded-circle" data-bs-toggle="tooltip" data-bs-custom-class="tooltip-sm" title="Compare" aria-label="Compare">
                            <i class="fi-repeat animate-target fs-sm"></i>
                          </button>
                        </div>
                      </div>
                      <h3 class="h6 mb-2">
                        <a class="hover-effect-underline stretched-link me-1" href="#!">Maserati Granturismo</a>
                        <span class="fs-xs fw-normal text-body-secondary">(2020)</span>
                      </h3>
                      <div class="h6 mb-0">$73,000</div>
                    </div>
                    <div class="card-footer bg-transparent border-0 pt-0 pb-4">
                      <div class="border-top pt-3">
                        <div class="row row-cols-2 g-2 fs-sm">
                          <div class="col d-flex align-items-center gap-2">
                            <i class="fi-map-pin"></i>
                            Chicago
                          </div>
                          <div class="col d-flex align-items-center gap-2">
                            <i class="fi-tachometer"></i>
                            69K mi
                          </div>
                          <div class="col d-flex align-items-center gap-2">
                            <i class="fi-gas-pump"></i>
                            Gasoline
                          </div>
                          <div class="col d-flex align-items-center gap-2">
                            <i class="fi-gearbox"></i>
                            Automatic
                          </div>
                        </div>
                      </div>
                    </div>
                  </article>
                </div>
                <div id="html-3" class="tab-pane pt-4 fade" role="tabpanel">
                  <div class="position-relative" data-bs-theme="dark">
                    <button type="button" class="btn btn-sm btn-outline-secondary bg-dark position-absolute top-0 end-0 mt-2 px-2 z-3" data-copy-code="#cars-vertical-code">
                      <i class="fi-copy fs-sm me-1"></i>
                      Copy
                    </button>
                    <pre id="cars-vertical-code" class="code-highlight mx-n2 mb-n2"><code class="language-html">&lt;!-- Car listing card: Vertical (Grid) --&gt;
    &lt;article class=&quot;card hover-effect-scale bg-body-tertiary border-0&quot;&gt;

      &lt;!-- Image + Badges --&gt;
      &lt;div class=&quot;card-img-top position-relative overflow-hidden&quot;&gt;
        &lt;div class=&quot;d-flex flex-column gap-2 align-items-start position-absolute top-0 start-0 z-1 pt-1 pt-sm-0 ps-1 ps-sm-0 mt-2 mt-sm-3 ms-2 ms-sm-3&quot;&gt;
          &lt;span class=&quot;badge text-bg-info d-inline-flex align-items-center&quot;&gt;
            Verified
            &lt;i class=&quot;fi-shield ms-1&quot;&gt;&lt;/i&gt;
          &lt;/span&gt;
          &lt;span class=&quot;badge text-bg-warning&quot;&gt;Used&lt;/span&gt;
        &lt;/div&gt;

        &lt;!-- Wrap the image with a "ratio" element to avoid content shifts on page load. Formula: imageHeight / imageWidth * 100% --&gt;
        &lt;div class=&quot;ratio hover-effect-target bg-body-secondary&quot; style=&quot;--fn-aspect-ratio: calc(204 / 306 * 100%)&quot;&gt;
          &lt;img src=&quot;assets/img/listings/cars/grid/06.jpg&quot; alt=&quot;Image&quot;&gt;
        &lt;/div&gt;
      &lt;/div&gt;

      &lt;!-- Card body --&gt;
      &lt;div class=&quot;card-body pb-3&quot;&gt;

        &lt;!-- Date + Action buttons --&gt;
        &lt;div class=&quot;d-flex align-items-center justify-content-between mb-2&quot;&gt;
          &lt;div class=&quot;fs-xs text-body-secondary me-3&quot;&gt;28/06/2024&lt;/div&gt;
          &lt;div class=&quot;d-flex gap-2 position-relative z-2&quot;&gt;
            &lt;button type=&quot;button&quot; class=&quot;btn btn-icon btn-sm btn-outline-secondary animate-pulse rounded-circle&quot; data-bs-toggle=&quot;tooltip&quot; data-bs-custom-class=&quot;tooltip-sm&quot; title=&quot;Wishlist&quot; aria-label=&quot;Add to wishlist&quot;&gt;
              &lt;i class=&quot;fi-heart animate-target fs-sm&quot;&gt;&lt;/i&gt;
            &lt;/button&gt;
            &lt;button type=&quot;button&quot; class=&quot;btn btn-icon btn-sm btn-outline-secondary animate-shake rounded-circle&quot; data-bs-toggle=&quot;tooltip&quot; data-bs-custom-class=&quot;tooltip-sm&quot; title=&quot;Notify&quot; aria-label=&quot;Notify&quot;&gt;
              &lt;i class=&quot;fi-bell animate-target fs-sm&quot;&gt;&lt;/i&gt;
            &lt;/button&gt;
            &lt;button type=&quot;button&quot; class=&quot;btn btn-icon btn-sm btn-outline-secondary animate-rotate rounded-circle&quot; data-bs-toggle=&quot;tooltip&quot; data-bs-custom-class=&quot;tooltip-sm&quot; title=&quot;Compare&quot; aria-label=&quot;Compare&quot;&gt;
              &lt;i class=&quot;fi-repeat animate-target fs-sm&quot;&gt;&lt;/i&gt;
            &lt;/button&gt;
          &lt;/div&gt;
        &lt;/div&gt;

        &lt;!-- Title + Price --&gt;
        &lt;h3 class=&quot;h6 mb-2&quot;&gt;
          &lt;a class=&quot;hover-effect-underline stretched-link me-1&quot; href=&quot;#&quot;&gt;Maserati Granturismo&lt;/a&gt;
          &lt;span class=&quot;fs-xs fw-normal text-body-secondary&quot;&gt;(2020)&lt;/span&gt;
        &lt;/h3&gt;
        &lt;div class=&quot;h6 mb-0&quot;&gt;$73,000&lt;/div&gt;
      &lt;/div&gt;

      &lt;!-- Card footer: Specs --&gt;
      &lt;div class=&quot;card-footer bg-transparent border-0 pt-0 pb-4&quot;&gt;
        &lt;div class=&quot;border-top pt-3&quot;&gt;
          &lt;div class=&quot;row row-cols-2 g-2 fs-sm&quot;&gt;
            &lt;div class=&quot;col d-flex align-items-center gap-2&quot;&gt;
              &lt;i class=&quot;fi-map-pin&quot;&gt;&lt;/i&gt;
              Chicago
            &lt;/div&gt;
            &lt;div class=&quot;col d-flex align-items-center gap-2&quot;&gt;
              &lt;i class=&quot;fi-tachometer&quot;&gt;&lt;/i&gt;
              69K mi
            &lt;/div&gt;
            &lt;div class=&quot;col d-flex align-items-center gap-2&quot;&gt;
              &lt;i class=&quot;fi-gas-pump&quot;&gt;&lt;/i&gt;
              Gasoline
            &lt;/div&gt;
            &lt;div class=&quot;col d-flex align-items-center gap-2&quot;&gt;
              &lt;i class=&quot;fi-gearbox&quot;&gt;&lt;/i&gt;
              Automatic
            &lt;/div&gt;
          &lt;/div&gt;
        &lt;/div&gt;
      &lt;/div&gt;
    &lt;/article&gt;</code></pre>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>


        <!-- Car listing card: Horizontal (List) -->
        <section id="cars-horizontal" class="docs-section pb-sm-2 mb-5">
          <h4>Car listing card: Horizontal (List)</h4>
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
                  <article class="card hover-effect-scale bg-body-tertiary border-0 overflow-hidden">
                    <div class="row g-0">
                      <div class="col-sm-5 position-relative bg-body-secondary overflow-hidden" style="min-height: 220px">
                        <div class="d-flex flex-column gap-2 align-items-start position-absolute top-0 start-0 z-1 pt-1 pt-sm-0 ps-1 ps-sm-0 mt-2 mt-sm-3 ms-2 ms-sm-3">
                          <span class="badge text-bg-info d-inline-flex align-items-center">
                            Verified
                            <i class="fi-shield ms-1"></i>
                          </span>
                          <span class="badge text-bg-warning">Used</span>
                        </div>
                        <img src="{{ asset('assets/img/listings/cars/list/05.jpg') }}" class="hover-effect-target position-absolute top-0 start-0 w-100 h-100 object-fit-cover" alt="Image">
                      </div>
                      <div class="col-sm-7 py-md-2">
                        <div class="card-body pb-3 pb-md-4">
                          <div class="d-flex align-items-center justify-content-between mb-2">
                            <div class="fs-xs text-body-secondary me-3">15/07/2024</div>
                            <div class="d-flex gap-2 position-relative z-2">
                              <button type="button" class="btn btn-icon btn-sm btn-outline-secondary animate-pulse rounded-circle" data-bs-toggle="tooltip" data-bs-custom-class="tooltip-sm" title="Wishlist" aria-label="Add to wishlist">
                                <i class="fi-heart animate-target fs-sm"></i>
                              </button>
                              <button type="button" class="btn btn-icon btn-sm btn-outline-secondary animate-shake rounded-circle" data-bs-toggle="tooltip" data-bs-custom-class="tooltip-sm" title="Notify" aria-label="Notify">
                                <i class="fi-bell animate-target fs-sm"></i>
                              </button>
                              <button type="button" class="btn btn-icon btn-sm btn-outline-secondary animate-rotate rounded-circle" data-bs-toggle="tooltip" data-bs-custom-class="tooltip-sm" title="Compare" aria-label="Compare">
                                <i class="fi-repeat animate-target fs-sm"></i>
                              </button>
                            </div>
                          </div>
                          <h3 class="h5 mb-2">
                            <a class="hover-effect-underline stretched-link me-1" href="#!">Mercedes-Benz Coupe</a>
                            <span class="fs-sm fw-normal text-body-secondary">(2021)</span>
                          </h3>
                          <div class="h6 mb-0">$115,400</div>
                          <p class="fs-sm pt-2 mt-1 mb-0">A sleek, luxurious vehicle featuring powerful performance, advanced technology, and elegant design for a premium driving experience.</p>
                        </div>
                        <div class="card-footer bg-transparent border-0 pt-0 pb-4">
                          <div class="d-flex flex-wrap justify-content-between gap-3 border-top fs-sm text-nowrap pt-3 pt-md-4">
                            <div class="d-flex align-items-center gap-2">
                              <i class="fi-map-pin"></i>
                              New York
                            </div>
                            <div class="d-flex align-items-center gap-2">
                              <i class="fi-tachometer"></i>
                              15K mi
                            </div>
                            <div class="d-flex align-items-center gap-2">
                              <i class="fi-gas-pump"></i>
                              Diesel
                            </div>
                            <div class="d-flex align-items-center gap-2">
                              <i class="fi-gearbox"></i>
                              Manual
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </article>
                </div>
                <div id="html-4" class="tab-pane pt-4 fade" role="tabpanel">
                  <div class="position-relative" data-bs-theme="dark">
                    <button type="button" class="btn btn-sm btn-outline-secondary bg-dark position-absolute top-0 end-0 mt-2 px-2 z-3" data-copy-code="#cars-horizontal-code">
                      <i class="fi-copy fs-sm me-1"></i>
                      Copy
                    </button>
                    <pre id="cars-horizontal-code" class="code-highlight mx-n2 mb-n2"><code class="language-html">&lt;!-- Car listing card: Horizontal (List) --&gt;
    &lt;article class=&quot;card hover-effect-scale bg-body-tertiary border-0 overflow-hidden&quot;&gt;
      &lt;div class=&quot;row g-0&quot;&gt;

        &lt;!-- Image + Badges --&gt;
        &lt;div class=&quot;col-sm-5 position-relative bg-body-secondary overflow-hidden&quot; style=&quot;min-height: 220px&quot;&gt;
          &lt;div class=&quot;d-flex flex-column gap-2 align-items-start position-absolute top-0 start-0 z-1 pt-1 pt-sm-0 ps-1 ps-sm-0 mt-2 mt-sm-3 ms-2 ms-sm-3&quot;&gt;
            &lt;span class=&quot;badge text-bg-info d-inline-flex align-items-center&quot;&gt;
              Verified
              &lt;i class=&quot;fi-shield ms-1&quot;&gt;&lt;/i&gt;
            &lt;/span&gt;
            &lt;span class=&quot;badge text-bg-warning&quot;&gt;Used&lt;/span&gt;
          &lt;/div&gt;
          &lt;img src=&quot;assets/img/listings/cars/list/05.jpg&quot; class=&quot;hover-effect-target position-absolute top-0 start-0 w-100 h-100 object-fit-cover&quot; alt=&quot;Image&quot;&gt;
        &lt;/div&gt;

        &lt;!-- Card body and footer --&gt;
        &lt;div class=&quot;col-sm-7 py-md-2&quot;&gt;

          &lt;!-- Card body --&gt;
          &lt;div class=&quot;card-body pb-3 pb-md-4&quot;&gt;
            &lt;div class=&quot;d-flex align-items-center justify-content-between mb-2&quot;&gt;
              &lt;div class=&quot;fs-xs text-body-secondary me-3&quot;&gt;15/07/2024&lt;/div&gt;
              &lt;div class=&quot;d-flex gap-2 position-relative z-2&quot;&gt;
                &lt;button type=&quot;button&quot; class=&quot;btn btn-icon btn-sm btn-outline-secondary animate-pulse rounded-circle&quot; data-bs-toggle=&quot;tooltip&quot; data-bs-custom-class=&quot;tooltip-sm&quot; title=&quot;Wishlist&quot; aria-label=&quot;Add to wishlist&quot;&gt;
                  &lt;i class=&quot;fi-heart animate-target fs-sm&quot;&gt;&lt;/i&gt;
                &lt;/button&gt;
                &lt;button type=&quot;button&quot; class=&quot;btn btn-icon btn-sm btn-outline-secondary animate-shake rounded-circle&quot; data-bs-toggle=&quot;tooltip&quot; data-bs-custom-class=&quot;tooltip-sm&quot; title=&quot;Notify&quot; aria-label=&quot;Notify&quot;&gt;
                  &lt;i class=&quot;fi-bell animate-target fs-sm&quot;&gt;&lt;/i&gt;
                &lt;/button&gt;
                &lt;button type=&quot;button&quot; class=&quot;btn btn-icon btn-sm btn-outline-secondary animate-rotate rounded-circle&quot; data-bs-toggle=&quot;tooltip&quot; data-bs-custom-class=&quot;tooltip-sm&quot; title=&quot;Compare&quot; aria-label=&quot;Compare&quot;&gt;
                  &lt;i class=&quot;fi-repeat animate-target fs-sm&quot;&gt;&lt;/i&gt;
                &lt;/button&gt;
              &lt;/div&gt;
            &lt;/div&gt;

            &lt;!-- Title + Price + Description --&gt;
            &lt;h3 class=&quot;h5 mb-2&quot;&gt;
              &lt;a class=&quot;hover-effect-underline stretched-link me-1&quot; href=&quot;#&quot;&gt;Mercedes-Benz Coupe&lt;/a&gt;
              &lt;span class=&quot;fs-sm fw-normal text-body-secondary&quot;&gt;(2021)&lt;/span&gt;
            &lt;/h3&gt;
            &lt;div class=&quot;h6 mb-0&quot;&gt;$115,400&lt;/div&gt;
            &lt;p class=&quot;fs-sm pt-2 mt-1 mb-0&quot;&gt;A sleek, luxurious vehicle featuring powerful performance, advanced technology, and elegant design for a premium driving experience.&lt;/p&gt;
          &lt;/div&gt;

          &lt;!-- Card footer: Specs --&gt;
          &lt;div class=&quot;card-footer bg-transparent border-0 pt-0 pb-4&quot;&gt;
            &lt;div class=&quot;d-flex flex-wrap justify-content-between gap-3 border-top fs-sm text-nowrap pt-3 pt-md-4&quot;&gt;
              &lt;div class=&quot;d-flex align-items-center gap-2&quot;&gt;
                &lt;i class=&quot;fi-map-pin&quot;&gt;&lt;/i&gt;
                New York
              &lt;/div&gt;
              &lt;div class=&quot;d-flex align-items-center gap-2&quot;&gt;
                &lt;i class=&quot;fi-tachometer&quot;&gt;&lt;/i&gt;
                15K mi
              &lt;/div&gt;
              &lt;div class=&quot;d-flex align-items-center gap-2&quot;&gt;
                &lt;i class=&quot;fi-gas-pump&quot;&gt;&lt;/i&gt;
                Diesel
              &lt;/div&gt;
              &lt;div class=&quot;d-flex align-items-center gap-2&quot;&gt;
                &lt;i class=&quot;fi-gearbox&quot;&gt;&lt;/i&gt;
                Manual
              &lt;/div&gt;
            &lt;/div&gt;
          &lt;/div&gt;
        &lt;/div&gt;
      &lt;/div&gt;
    &lt;/article&gt;</code></pre>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>


        <!-- City Guide listing card: Variant 1 -->
        <section id="city-guide-1" class="docs-section pb-sm-2 mb-5">
          <h4>City Guide listing card: Variant 1</h4>
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
                  <article class="card hover-effect-scale hover-effect-opacity bg-transparent" style="max-width: 306px">
                    <div class="card-img-top position-relative bg-body-tertiary overflow-hidden">
                      <div class="ratio hover-effect-target" style="--fn-aspect-ratio: calc(198 / 304 * 100%)">
                        <img src="{{ asset('assets/img/listings/city-guide/v1/07.jpg') }}" alt="Image">
                      </div>
                      <div class="position-absolute top-0 end-0 z-2 hover-effect-target opacity-0 pt-1 pt-sm-0 pe-1 pe-sm-0 mt-2 mt-sm-3 me-2 me-sm-3">
                        <button type="button" class="btn btn-sm btn-icon btn-light bg-light border-0 rounded-circle animate-pulse" aria-label="Add to wishlist">
                          <i class="fi-heart animate-target fs-sm"></i>
                        </button>
                      </div>
                    </div>
                    <div class="card-body pt-3 pb-2 px-3">
                      <span class="badge text-body-emphasis bg-secondary-subtle text-decoration-none mb-2">Entertainment</span>
                      <h3 class="h5 pt-1 mb-2">
                        <a class="hover-effect-underline stretched-link" href="#!">Art &amp; Design Museum</a>
                      </h3>
                      <p class="fs-sm mb-0">Europe's most extensive collection of modern and contemporary art.</p>
                    </div>
                    <div class="card-footer bg-transparent border-0 pt-0 pb-3 px-3">
                      <div class="d-flex align-items-center gap-3">
                        <div class="d-flex align-items-center gap-1">
                          <i class="fi-star-filled text-warning"></i>
                          <span class="fs-sm text-secondary-emphasis">4.9</span>
                          <span class="fs-xs text-body-secondary align-self-end">(2078)</span>
                        </div>
                        <div class="d-flex align-items-center gap-1 min-w-0 fs-sm">
                          <i class="fi-map-pin"></i>
                          <span class="text-truncate">1.4 km from center</span>
                        </div>
                      </div>
                      <div class="h6 pt-3 mb-0">$15</div>
                    </div>
                  </article>
                </div>
                <div id="html-5" class="tab-pane pt-4 fade" role="tabpanel">
                  <div class="position-relative" data-bs-theme="dark">
                    <button type="button" class="btn btn-sm btn-outline-secondary bg-dark position-absolute top-0 end-0 mt-2 px-2 z-3" data-copy-code="#city-guide-1-code">
                      <i class="fi-copy fs-sm me-1"></i>
                      Copy
                    </button>
                    <pre id="city-guide-1-code" class="code-highlight mx-n2 mb-n2"><code class="language-html">&lt;!-- City Guide listing card: Variant 1 --&gt;
    &lt;article class=&quot;card hover-effect-scale hover-effect-opacity bg-transparent&quot;&gt;

      &lt;!-- Image + Wishlist button --&gt;
      &lt;div class=&quot;card-img-top position-relative bg-body-tertiary overflow-hidden&quot;&gt;
        &lt;!-- Wrap the image with a "ratio" element to avoid content shifts on page load. Formula: imageHeight / imageWidth * 100% --&gt;
        &lt;div class=&quot;ratio hover-effect-target&quot; style=&quot;--fn-aspect-ratio: calc(198 / 304 * 100%)&quot;&gt;
          &lt;img src=&quot;assets/img/listings/city-guide/v1/07.jpg&quot; alt=&quot;Image&quot;&gt;
        &lt;/div&gt;
        &lt;div class=&quot;position-absolute top-0 end-0 z-2 hover-effect-target opacity-0 pt-1 pt-sm-0 pe-1 pe-sm-0 mt-2 mt-sm-3 me-2 me-sm-3&quot;&gt;
          &lt;button type=&quot;button&quot; class=&quot;btn btn-sm btn-icon btn-light bg-light border-0 rounded-circle animate-pulse&quot; aria-label=&quot;Add to wishlist&quot;&gt;
            &lt;i class=&quot;fi-heart animate-target fs-sm&quot;&gt;&lt;/i&gt;
          &lt;/button&gt;
        &lt;/div&gt;
      &lt;/div&gt;

      &lt;!-- Card body: Category badge + Title + Description --&gt;
      &lt;div class=&quot;card-body pt-3 pb-2 px-3&quot;&gt;
        &lt;span class=&quot;badge text-body-emphasis bg-secondary-subtle text-decoration-none mb-2&quot;&gt;Entertainment&lt;/span&gt;
        &lt;h3 class=&quot;h5 pt-1 mb-2&quot;&gt;
          &lt;a class=&quot;hover-effect-underline stretched-link&quot; href=&quot;#&quot;&gt;Art &amp;amp; Design Museum&lt;/a&gt;
        &lt;/h3&gt;
        &lt;p class=&quot;fs-sm mb-0&quot;&gt;Europe's most extensive collection of modern and contemporary art.&lt;/p&gt;
      &lt;/div&gt;

      &lt;!-- Card footer: Rating + Distance + Price --&gt;
      &lt;div class=&quot;card-footer bg-transparent border-0 pt-0 pb-3 px-3&quot;&gt;
        &lt;div class=&quot;d-flex align-items-center gap-3&quot;&gt;
          &lt;div class=&quot;d-flex align-items-center gap-1&quot;&gt;
            &lt;i class=&quot;fi-star-filled text-warning&quot;&gt;&lt;/i&gt;
            &lt;span class=&quot;fs-sm text-secondary-emphasis&quot;&gt;4.9&lt;/span&gt;
            &lt;span class=&quot;fs-xs text-body-secondary align-self-end&quot;&gt;(2078)&lt;/span&gt;
          &lt;/div&gt;
          &lt;div class=&quot;d-flex align-items-center gap-1 min-w-0 fs-sm&quot;&gt;
            &lt;i class=&quot;fi-map-pin&quot;&gt;&lt;/i&gt;
            &lt;span class=&quot;text-truncate&quot;&gt;1.4 km from center&lt;/span&gt;
          &lt;/div&gt;
        &lt;/div&gt;
        &lt;div class=&quot;h6 pt-3 mb-0&quot;&gt;$15&lt;/div&gt;
      &lt;/div&gt;
    &lt;/article&gt;</code></pre>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>


        <!-- City Guide listing card: Variant 2 -->
        <section id="city-guide-2" class="docs-section pb-sm-2 mb-5">
          <h4>City Guide listing card: Variant 2</h4>
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
                  <article class="card hover-effect-scale hover-effect-opacity bg-transparent border-0" style="max-width: 416px">
                    <div class="bg-body-tertiary rounded overflow-hidden">
                      <div class="ratio hover-effect-target" style="--fn-aspect-ratio: calc(280 / 416 * 100%)">
                        <img src="{{ asset('assets/img/listings/city-guide/v2/12.jpg') }}" alt="Image">
                      </div>
                    </div>
                    <div class="position-absolute top-0 end-0 z-2 hover-effect-target opacity-0 pt-1 pt-sm-0 pe-1 pe-sm-0 mt-2 mt-sm-3 me-2 me-sm-3">
                      <button type="button" class="btn btn-sm btn-icon btn-light bg-light border-0 rounded-circle animate-pulse" aria-label="Add to wishlist">
                        <i class="fi-heart animate-target fs-sm"></i>
                      </button>
                    </div>
                    <div class="card-body pt-3 pb-2 px-0">
                      <h3 class="h5 mb-0">
                        <a class="hover-effect-underline stretched-link" href="#!">Crystal Studio Apartment</a>
                      </h3>
                    </div>
                    <div class="card-footer d-flex align-items-center gap-3 bg-transparent border-0 p-0">
                      <div class="d-flex align-items-center gap-1">
                        <i class="fi-star-filled text-warning"></i>
                        <span class="fs-sm text-secondary-emphasis">4.7</span>
                        <span class="fs-xs text-body-secondary align-self-end">(26)</span>
                      </div>
                      <div class="d-flex align-items-center gap-1 fs-sm">
                        <i class="fi-credit-card"></i>
                        $$
                      </div>
                      <div class="d-flex align-items-center gap-1 min-w-0 fs-sm">
                        <i class="fi-map-pin"></i>
                        <span class="text-truncate">1.3 km from center</span>
                      </div>
                    </div>
                  </article>
                </div>
                <div id="html-6" class="tab-pane pt-4 fade" role="tabpanel">
                  <div class="position-relative" data-bs-theme="dark">
                    <button type="button" class="btn btn-sm btn-outline-secondary bg-dark position-absolute top-0 end-0 mt-2 px-2 z-3" data-copy-code="#city-guide-2-code">
                      <i class="fi-copy fs-sm me-1"></i>
                      Copy
                    </button>
                    <pre id="city-guide-2-code" class="code-highlight mx-n2 mb-n2"><code class="language-html">&lt;!-- City Guide listing card: Variant 2 --&gt;
    &lt;article class=&quot;card hover-effect-scale hover-effect-opacity bg-transparent border-0&quot;&gt;

      &lt;!-- Image thumb --&gt;
      &lt;div class=&quot;bg-body-tertiary rounded overflow-hidden&quot;&gt;
        &lt;!-- Wrap the image with a "ratio" element to avoid content shifts on page load. Formula: imageHeight / imageWidth * 100% --&gt;
        &lt;div class=&quot;ratio hover-effect-target&quot; style=&quot;--fn-aspect-ratio: calc(280 / 416 * 100%)&quot;&gt;
          &lt;img src=&quot;assets/img/listings/city-guide/v2/12.jpg&quot; alt=&quot;Image&quot;&gt;
        &lt;/div&gt;
      &lt;/div&gt;

      &lt;!-- Wishlist button --&gt;
      &lt;div class=&quot;position-absolute top-0 end-0 z-2 hover-effect-target opacity-0 pt-1 pt-sm-0 pe-1 pe-sm-0 mt-2 mt-sm-3 me-2 me-sm-3&quot;&gt;
        &lt;button type=&quot;button&quot; class=&quot;btn btn-sm btn-icon btn-light bg-light border-0 rounded-circle animate-pulse&quot; aria-label=&quot;Add to wishlist&quot;&gt;
          &lt;i class=&quot;fi-heart animate-target fs-sm&quot;&gt;&lt;/i&gt;
        &lt;/button&gt;
      &lt;/div&gt;

      &lt;!-- Card body: Title --&gt;
      &lt;div class=&quot;card-body pt-3 pb-2 px-0&quot;&gt;
        &lt;h3 class=&quot;h5 mb-0&quot;&gt;
          &lt;a class=&quot;hover-effect-underline stretched-link&quot; href=&quot;#&quot;&gt;Crystal Studio Apartment&lt;/a&gt;
        &lt;/h3&gt;
      &lt;/div&gt;

      &lt;!-- Card footer: Rating + Cost + Distance --&gt;
      &lt;div class=&quot;card-footer d-flex align-items-center gap-3 bg-transparent border-0 p-0&quot;&gt;
        &lt;div class=&quot;d-flex align-items-center gap-1&quot;&gt;
          &lt;i class=&quot;fi-star-filled text-warning&quot;&gt;&lt;/i&gt;
          &lt;span class=&quot;fs-sm text-secondary-emphasis&quot;&gt;4.7&lt;/span&gt;
          &lt;span class=&quot;fs-xs text-body-secondary align-self-end&quot;&gt;(26)&lt;/span&gt;
        &lt;/div&gt;
        &lt;div class=&quot;d-flex align-items-center gap-1 fs-sm&quot;&gt;
          &lt;i class=&quot;fi-credit-card&quot;&gt;&lt;/i&gt;
          $$
        &lt;/div&gt;
        &lt;div class=&quot;d-flex align-items-center gap-1 min-w-0 fs-sm&quot;&gt;
          &lt;i class=&quot;fi-map-pin&quot;&gt;&lt;/i&gt;
          &lt;span class=&quot;text-truncate&quot;&gt;1.3 km from center&lt;/span&gt;
        &lt;/div&gt;
      &lt;/div&gt;
    &lt;/article&gt;</code></pre>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>


        <!-- Contractor listing card -->
        <section id="contractor" class="docs-section pb-sm-2 mb-5">
          <h4>Contractor listing card</h4>
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
                  <article class="card hover-effect-opacity overflow-hidden bg-transparent">
                    <div class="row g-0">
                      <div class="col-sm-4 position-relative bg-body-tertiary" style="min-height: 220px">
                        <div class="d-flex flex-column gap-2 align-items-start position-absolute top-0 start-0 z-3 pt-1 pt-sm-0 ps-1 ps-sm-0 mt-2 mt-sm-3 ms-2 ms-sm-3">
                          <span class="badge text-bg-info d-inline-flex align-items-center">
                            Verified
                            <i class="fi-shield ms-1"></i>
                          </span>
                        </div>
                        <div class="swiper h-100 z-2" data-swiper='{
                                "pagination": {
                                  "el": ".swiper-pagination"
                                },
                                "navigation": {
                                  "prevEl": ".btn-prev",
                                  "nextEl": ".btn-next"
                                },
                                "breakpoints": {
                                  "991": {
                                    "allowTouchMove": false
                                  }
                                }
                              }'>
                          <a class="swiper-wrapper h-100" href="#!">
                            <div class="swiper-slide">
                              <img src="{{ asset('assets/img/listings/contractors/01.jpg') }}" class="position-absolute top-0 start-0 w-100 h-100 object-fit-cover" alt="Image">
                              <span class="position-absolute top-0 start-0 w-100 h-100" style="background: linear-gradient(180deg, rgba(0,0,0, 0) 0%, rgba(0,0,0, .16) 100%)"></span>
                            </div>
                            <div class="swiper-slide">
                              <img src="{{ asset('assets/img/listings/contractors/01.jpg') }}" class="position-absolute top-0 start-0 w-100 h-100 object-fit-cover" alt="Image">
                              <span class="position-absolute top-0 start-0 w-100 h-100" style="background: linear-gradient(180deg, rgba(0,0,0, 0) 0%, rgba(0,0,0, .16) 100%)"></span>
                            </div>
                            <div class="swiper-slide">
                              <img src="{{ asset('assets/img/listings/contractors/01.jpg') }}" class="position-absolute top-0 start-0 w-100 h-100 object-fit-cover" alt="Image">
                              <span class="position-absolute top-0 start-0 w-100 h-100" style="background: linear-gradient(180deg, rgba(0,0,0, 0) 0%, rgba(0,0,0, .16) 100%)"></span>
                            </div>
                          </a>
                          <div class="position-absolute top-50 start-0 z-1 translate-middle-y d-none d-lg-block hover-effect-target opacity-0 ms-3">
                            <button type="button" class="btn btn-sm btn-prev btn-icon btn-light bg-light rounded-circle animate-slide-start" aria-label="Prev">
                              <i class="fi-chevron-left fs-lg animate-target"></i>
                            </button>
                          </div>
                          <div class="position-absolute top-50 end-0 z-1 translate-middle-y d-none d-lg-block hover-effect-target opacity-0 me-3">
                            <button type="button" class="btn btn-sm btn-next btn-icon btn-light bg-light rounded-circle animate-slide-end" aria-label="Next">
                              <i class="fi-chevron-right fs-lg animate-target"></i>
                            </button>
                          </div>
                          <div class="swiper-pagination bottom-0 z-1 mb-2" data-bs-theme="light"></div>
                        </div>
                      </div>
                      <div class="col-sm-8 d-flex p-3 p-sm-4" style="min-height: 255px">
                        <div class="row flex-lg-nowrap g-0 position-relative pt-1 pt-sm-0">
                          <button type="button" class="btn btn-icon btn-outline-secondary rounded-circle position-absolute top-0 end-0 z-2" data-bs-toggle="tooltip" data-bs-custom-class="tooltip-sm" title="Bookmark" aria-label="Bookmark">
                            <i class="fi-bookmark fs-base"></i>
                          </button>
                          <div class="col-lg-8 pe-lg-4">
                            <div class="d-flex align-items-center pe-5 pe-lg-0 pb-2 mb-1">
                              <div class="ratio ratio-1x1 me-3" style="width: 48px">
                                <img src="{{ asset('assets/img/listings/contractors/ava01.jpg') }}" class="bg-body-secondary rounded-circle" alt="Avatar">
                              </div>
                              <h3 class="h6 mb-0">
                                <a class="hover-effect-underline stretched-link" href="#!">Samantha Donovan</a>
                              </h3>
                            </div>
                            <div class="fs-sm mb-2 mb-lg-3">
                              <span class="fw-medium text-dark-emphasis">Water softener installation</span>
                              <i class="fi-bullet fs-base align-middle"></i>
                              <span class="fw-medium text-dark-emphasis">Water heater repair</span>
                            </div>
                            <p class="fs-sm mb-0">I'm Samantha, your licensed, insured plumber in NYC. Specializing in servicing residential buildings, high rises, offices, and eateries.</p>
                          </div>
                          <hr class="vr flex-shrink-0 d-none d-lg-block m-0">
                          <div class="col-lg-4 d-flex flex-column pt-3 pt-lg-5 ps-lg-4">
                            <ul class="list-unstyled pb-2 pb-lg-4 mb-3">
                              <li class="d-flex align-items-center gap-1">
                                <i class="fi-star-filled text-warning"></i>
                                <span class="fs-sm text-secondary-emphasis">4.7</span>
                                <span class="fs-xs text-body-secondary align-self-end">(26)</span>
                              </li>
                              <li class="d-flex align-items-center gap-1 fs-sm">
                                <i class="fi-thumbs-up"></i>
                                Listing of the month
                              </li>
                              <li class="d-flex align-items-center gap-1 fs-sm">
                                <i class="fi-leaf"></i>
                                Eco-friendly
                              </li>
                            </ul>
                            <button type="button" class="btn btn-outline-dark position-relative z-2 mt-auto">
                              <i class="fi-mail me-2"></i>
                              Connect
                            </button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </article>
                </div>
                <div id="html-7" class="tab-pane pt-4 fade" role="tabpanel">
                  <div class="position-relative" data-bs-theme="dark">
                    <button type="button" class="btn btn-sm btn-outline-secondary bg-dark position-absolute top-0 end-0 mt-2 px-2 z-3" data-copy-code="#contractor-code">
                      <i class="fi-copy fs-sm me-1"></i>
                      Copy
                    </button>
                    <pre id="contractor-code" class="code-highlight mx-n2 mb-n2"><code class="language-html">&lt;!-- Contractor listing card --&gt;
    &lt;article class=&quot;card hover-effect-opacity overflow-hidden&quot;&gt;
      &lt;div class=&quot;row g-0&quot;&gt;
        &lt;div class=&quot;col-sm-4 position-relative bg-body-tertiary&quot; style=&quot;min-height: 220px&quot;&gt;

          &lt;!-- Badges --&gt;
          &lt;div class=&quot;d-flex flex-column gap-2 align-items-start position-absolute top-0 start-0 z-3 pt-1 pt-sm-0 ps-1 ps-sm-0 mt-2 mt-sm-3 ms-2 ms-sm-3&quot;&gt;
            &lt;span class=&quot;badge text-bg-info d-inline-flex align-items-center&quot;&gt;
              Verified
              &lt;i class=&quot;fi-shield ms-1&quot;&gt;&lt;/i&gt;
            &lt;/span&gt;
          &lt;/div&gt;

          &lt;!-- Image slider --&gt;
          &lt;div class=&quot;swiper h-100 z-2&quot; data-swiper='{
            &quot;pagination&quot;: {
              &quot;el&quot;: &quot;.swiper-pagination&quot;
            },
            &quot;navigation&quot;: {
              &quot;prevEl&quot;: &quot;.btn-prev&quot;,
              &quot;nextEl&quot;: &quot;.btn-next&quot;
            },
            &quot;breakpoints&quot;: {
              &quot;991&quot;: {
                &quot;allowTouchMove&quot;: false
              }
            }
          }'&gt;
            &lt;a class=&quot;swiper-wrapper h-100&quot; href=&quot;#&quot;&gt;
              &lt;div class=&quot;swiper-slide&quot;&gt;
                &lt;img src=&quot;assets/img/listings/contractors/01.jpg&quot; class=&quot;position-absolute top-0 start-0 w-100 h-100 object-fit-cover&quot; alt=&quot;Image&quot;&gt;
                &lt;span class=&quot;position-absolute top-0 start-0 w-100 h-100&quot; style=&quot;background: linear-gradient(180deg, rgba(0,0,0, 0) 0%, rgba(0,0,0, .16) 100%)&quot;&gt;&lt;/span&gt;
              &lt;/div&gt;
              &lt;div class=&quot;swiper-slide&quot;&gt;
                &lt;img src=&quot;assets/img/listings/contractors/01.jpg&quot; class=&quot;position-absolute top-0 start-0 w-100 h-100 object-fit-cover&quot; alt=&quot;Image&quot;&gt;
                &lt;span class=&quot;position-absolute top-0 start-0 w-100 h-100&quot; style=&quot;background: linear-gradient(180deg, rgba(0,0,0, 0) 0%, rgba(0,0,0, .16) 100%)&quot;&gt;&lt;/span&gt;
              &lt;/div&gt;
              &lt;div class=&quot;swiper-slide&quot;&gt;
                &lt;img src=&quot;assets/img/listings/contractors/01.jpg&quot; class=&quot;position-absolute top-0 start-0 w-100 h-100 object-fit-cover&quot; alt=&quot;Image&quot;&gt;
                &lt;span class=&quot;position-absolute top-0 start-0 w-100 h-100&quot; style=&quot;background: linear-gradient(180deg, rgba(0,0,0, 0) 0%, rgba(0,0,0, .16) 100%)&quot;&gt;&lt;/span&gt;
              &lt;/div&gt;
            &lt;/a&gt;

            &lt;!-- Prev slide button --&gt;
            &lt;div class=&quot;position-absolute top-50 start-0 z-1 translate-middle-y d-none d-lg-block hover-effect-target opacity-0 ms-3&quot;&gt;
              &lt;button type=&quot;button&quot; class=&quot;btn btn-sm btn-prev btn-icon btn-light bg-light rounded-circle animate-slide-start&quot; aria-label=&quot;Prev&quot;&gt;
                &lt;i class=&quot;fi-chevron-left fs-lg animate-target&quot;&gt;&lt;/i&gt;
              &lt;/button&gt;
            &lt;/div&gt;

            &lt;!-- Next slide button --&gt;
            &lt;div class=&quot;position-absolute top-50 end-0 z-1 translate-middle-y d-none d-lg-block hover-effect-target opacity-0 me-3&quot;&gt;
              &lt;button type=&quot;button&quot; class=&quot;btn btn-sm btn-next btn-icon btn-light bg-light rounded-circle animate-slide-end&quot; aria-label=&quot;Next&quot;&gt;
                &lt;i class=&quot;fi-chevron-right fs-lg animate-target&quot;&gt;&lt;/i&gt;
              &lt;/button&gt;
            &lt;/div&gt;

            &lt;!-- Bullets --&gt;
            &lt;div class=&quot;swiper-pagination bottom-0 z-1 mb-2&quot; data-bs-theme=&quot;light&quot;&gt;&lt;/div&gt;
          &lt;/div&gt;
        &lt;/div&gt;

        &lt;!-- Content --&gt;
        &lt;div class=&quot;col-sm-8 d-flex p-3 p-sm-4&quot; style=&quot;min-height: 255px&quot;&gt;
          &lt;div class=&quot;row flex-lg-nowrap g-0 position-relative pt-1 pt-sm-0&quot;&gt;

            &lt;!-- Bookmark button --&gt;
            &lt;button type=&quot;button&quot; class=&quot;btn btn-icon btn-outline-secondary rounded-circle position-absolute top-0 end-0 z-2&quot; data-bs-toggle=&quot;tooltip&quot; data-bs-custom-class=&quot;tooltip-sm&quot; title=&quot;Bookmark&quot; aria-label=&quot;Bookmark&quot;&gt;
              &lt;i class=&quot;fi-bookmark fs-base&quot;&gt;&lt;/i&gt;
            &lt;/button&gt;

            &lt;div class=&quot;col-lg-8 pe-lg-4&quot;&gt;

              &lt;!-- Contractor avatar and name --&gt;
              &lt;div class=&quot;d-flex align-items-center pe-5 pe-lg-0 pb-2 mb-1&quot;&gt;
                &lt;div class=&quot;ratio ratio-1x1 me-3&quot; style=&quot;width: 48px&quot;&gt;
                  &lt;img src=&quot;assets/img/listings/contractors/ava01.jpg&quot; class=&quot;bg-body-tertiary rounded-circle&quot; alt=&quot;Avatar&quot;&gt;
                &lt;/div&gt;
                &lt;h3 class=&quot;h6 mb-0&quot;&gt;
                  &lt;a class=&quot;hover-effect-underline stretched-link&quot; href=&quot;#&quot;&gt;Samantha Donovan&lt;/a&gt;
                &lt;/h3&gt;
              &lt;/div&gt;

              &lt;!-- Services --&gt;
              &lt;div class=&quot;fs-sm mb-2 mb-lg-3&quot;&gt;
                &lt;span class=&quot;fw-medium text-dark-emphasis&quot;&gt;Water softener installation&lt;/span&gt;
                &lt;i class=&quot;fi-bullet fs-base align-middle&quot;&gt;&lt;/i&gt;
                &lt;span class=&quot;fw-medium text-dark-emphasis&quot;&gt;Water heater repair&lt;/span&gt;
              &lt;/div&gt;
              &lt;p class=&quot;fs-sm mb-0&quot;&gt;I'm Samantha, your licensed, insured plumber in NYC. Specializing in servicing residential buildings, high rises, offices, and eateries.&lt;/p&gt;
            &lt;/div&gt;

            &lt;!-- Divider --&gt;
            &lt;hr class=&quot;vr flex-shrink-0 d-none d-lg-block m-0&quot;&gt;

            &lt;div class=&quot;col-lg-4 d-flex flex-column pt-3 pt-lg-5 ps-lg-4&quot;&gt;

              &lt;!-- Feature list --&gt;
              &lt;ul class=&quot;list-unstyled pb-2 pb-lg-4 mb-3&quot;&gt;
                &lt;li class=&quot;d-flex align-items-center gap-1&quot;&gt;
                  &lt;i class=&quot;fi-star-filled text-warning&quot;&gt;&lt;/i&gt;
                  &lt;span class=&quot;fs-sm text-secondary-emphasis&quot;&gt;4.7&lt;/span&gt;
                  &lt;span class=&quot;fs-xs text-body-secondary align-self-end&quot;&gt;(26)&lt;/span&gt;
                &lt;/li&gt;
                &lt;li class=&quot;d-flex align-items-center gap-1 fs-sm&quot;&gt;
                  &lt;i class=&quot;fi-thumbs-up&quot;&gt;&lt;/i&gt;
                  Listing of the month
                &lt;/li&gt;
                &lt;li class=&quot;d-flex align-items-center gap-1 fs-sm&quot;&gt;
                  &lt;i class=&quot;fi-leaf&quot;&gt;&lt;/i&gt;
                  Eco-friendly
                &lt;/li&gt;
              &lt;/ul&gt;

              &lt;!-- Connect button --&gt;
              &lt;button type=&quot;button&quot; class=&quot;btn btn-outline-dark position-relative z-2 mt-auto&quot;&gt;
                &lt;i class=&quot;fi-mail me-2&quot;&gt;&lt;/i&gt;
                Connect
              &lt;/button&gt;
            &lt;/div&gt;
          &lt;/div&gt;
        &lt;/div&gt;
      &lt;/div&gt;
    &lt;/article&gt;</code></pre>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>


        <!-- Project listing card: Vertical -->
        <section id="project-vertical" class="docs-section pb-sm-2 mb-5">
          <h4>Project listing card: Vertical</h4>
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
                  <article class="card hover-effect-scale hover-effect-opacity bg-transparent" style="max-width: 416px">
                    <div class="card-img-top position-relative bg-body-tertiary overflow-hidden">
                      <div class="position-absolute top-0 end-0 z-2 hover-effect-target opacity-0 pt-1 pt-sm-0 pe-1 pe-sm-0 mt-2 mt-sm-3 me-2 me-sm-3">
                        <button type="button" class="btn btn-sm btn-icon btn-light bg-light border-0 rounded-circle animate-pulse" aria-label="Add to wishlist">
                          <i class="fi-heart animate-target fs-sm"></i>
                        </button>
                      </div>
                      <div class="ratio hover-effect-target" style="--fn-aspect-ratio: calc(280 / 416 * 100%)">
                        <img src="{{ asset('assets/img/home/contractors/projects/02.jpg') }}" alt="Image">
                      </div>
                      <h3 class="h5 position-absolute bottom-0 start-0 d-flex align-items-end w-100 h-100 text-white z-1 p-3 mb-0">Handyperson for small projects</h3>
                      <span class="position-absolute top-0 start-0 w-100 h-100" style="background: linear-gradient(1deg, rgba(33,42,54, .75) 0.33%, rgba(33,42,54, 0) 45.72%)"></span>
                    </div>
                    <div class="card-body p-3">
                      <div class="d-flex align-items-center gap-3">
                        <div class="d-flex align-items-center gap-1">
                          <i class="fi-star-filled text-warning"></i>
                          <span class="fs-sm text-secondary-emphasis">4.7</span>
                          <span class="fs-xs text-body-secondary align-self-end">(63)</span>
                        </div>
                        <a class="stretched-link fs-sm text-dark-emphasis text-decoration-none" href="#!">From $250</a>
                        <button type="button" class="btn btn-outline-dark position-relative z-2 ms-auto">Book now</button>
                      </div>
                    </div>
                  </article>
                </div>
                <div id="html-8" class="tab-pane pt-4 fade" role="tabpanel">
                  <div class="position-relative" data-bs-theme="dark">
                    <button type="button" class="btn btn-sm btn-outline-secondary bg-dark position-absolute top-0 end-0 mt-2 px-2 z-3" data-copy-code="#project-vertical-code">
                      <i class="fi-copy fs-sm me-1"></i>
                      Copy
                    </button>
                    <pre id="project-vertical-code" class="code-highlight mx-n2 mb-n2"><code class="language-html">&lt;!-- Project listing card: Vertical --&gt;
    &lt;article class=&quot;card hover-effect-scale hover-effect-opacity&quot;&gt;

      &lt;!-- Image + Wishlist button + Title --&gt;
      &lt;div class=&quot;card-img-top position-relative bg-body-tertiary overflow-hidden&quot;&gt;
        &lt;div class=&quot;position-absolute top-0 end-0 z-2 hover-effect-target opacity-0 pt-1 pt-sm-0 pe-1 pe-sm-0 mt-2 mt-sm-3 me-2 me-sm-3&quot;&gt;
          &lt;button type=&quot;button&quot; class=&quot;btn btn-sm btn-icon btn-light bg-light border-0 rounded-circle animate-pulse&quot; aria-label=&quot;Add to wishlist&quot;&gt;
            &lt;i class=&quot;fi-heart animate-target fs-sm&quot;&gt;&lt;/i&gt;
          &lt;/button&gt;
        &lt;/div&gt;
        &lt;!-- Wrap the image with a "ratio" element to avoid content shifts on page load. Formula: imageHeight / imageWidth * 100% --&gt;
        &lt;div class=&quot;ratio hover-effect-target&quot; style=&quot;--fn-aspect-ratio: calc(280 / 416 * 100%)&quot;&gt;
          &lt;img src=&quot;assets/img/home/contractors/projects/02.jpg&quot; alt=&quot;Image&quot;&gt;
        &lt;/div&gt;
        &lt;h3 class=&quot;h5 position-absolute bottom-0 start-0 d-flex align-items-end w-100 h-100 text-white z-1 p-3 mb-0&quot;&gt;Handyperson for small projects&lt;/h3&gt;
        &lt;span class=&quot;position-absolute top-0 start-0 w-100 h-100&quot; style=&quot;background: linear-gradient(1deg, rgba(33,42,54, .75) 0.33%, rgba(33,42,54, 0) 45.72%)&quot;&gt;&lt;/span&gt;
      &lt;/div&gt;

      &lt;!-- Card body: Rating + Price + Booking button --&gt;
      &lt;div class=&quot;card-body p-3&quot;&gt;
        &lt;div class=&quot;d-flex align-items-center gap-3&quot;&gt;
          &lt;div class=&quot;d-flex align-items-center gap-1&quot;&gt;
            &lt;i class=&quot;fi-star-filled text-warning&quot;&gt;&lt;/i&gt;
            &lt;span class=&quot;fs-sm text-secondary-emphasis&quot;&gt;4.7&lt;/span&gt;
            &lt;span class=&quot;fs-xs text-body-secondary align-self-end&quot;&gt;(63)&lt;/span&gt;
          &lt;/div&gt;
          &lt;a class=&quot;stretched-link fs-sm text-dark-emphasis text-decoration-none&quot; href=&quot;#&quot;&gt;From $250&lt;/a&gt;
          &lt;button type=&quot;button&quot; class=&quot;btn btn-outline-dark position-relative z-2 ms-auto&quot;&gt;Book now&lt;/button&gt;
        &lt;/div&gt;
      &lt;/div&gt;
    &lt;/article&gt;</code></pre>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>


        <!-- Project listing card: Horizontal -->
        <section id="project-horizontal" class="docs-section pb-sm-2 mb-5">
          <h4>Project listing card: Horizontal</h4>
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
                  <div class="d-flex flex-column align-items-start gap-4">
                    <article class="card w-100 hover-effect-scale bg-transparent overflow-hidden mb-3" style="max-width: 636px">
                      <div class="row h-100 g-0">
                        <div class="col-sm-4 position-relative overflow-hidden" style="min-height: 178px">
                          <img src="{{ asset('assets/img/home/contractors/projects/04.jpg') }}" class="hover-effect-target position-absolute top-0 start-0 w-100 h-100 object-fit-cover" alt="Image">
                        </div>
                        <div class="col-sm-8 card-body d-flex flex-column align-items-start p-3 p-sm-4">
                          <h3 class="h6 mt-1 mt-sm-0 mb-2">
                            <a class="stretched-link hover-effect-underline" href="#!">Cleaning up after repairs</a>
                          </h3>
                          <div class="d-flex align-items-center gap-3 mb-4">
                            <div class="d-flex align-items-center gap-1">
                              <i class="fi-star-filled text-warning"></i>
                              <span class="fs-sm text-secondary-emphasis">4.7</span>
                              <span class="fs-xs text-body-secondary align-self-end">(63)</span>
                            </div>
                            <div class="fs-sm text-dark-emphasis">From $150</div>
                          </div>
                          <button type="button" class="btn btn-outline-dark position-relative z-2 mt-auto">Book now</button>
                        </div>
                      </div>
                    </article>
                    <article class="hover-effect-scale position-relative d-inline-flex align-items-start">
                      <div class="flex-shrink-0 rounded overflow-hidden" style="width: 112px">
                        <div class="ratio hover-effect-target" style="--fn-aspect-ratio: calc(80 / 112 * 100%)">
                          <img src="{{ asset('assets/img/home/contractors/projects/th03.jpg') }}" alt="Image">
                        </div>
                      </div>
                      <div class="pt-1 ps-3">
                        <h3 class="h6 mb-1">
                          <a class="hover-effect-underline stretched-link" href="#!">Appliance repair</a>
                        </h3>
                        <div class="d-flex align-items-center gap-1 mb-1">
                          <i class="fi-star-filled text-warning"></i>
                          <span class="fs-sm text-secondary-emphasis">4.8</span>
                          <span class="fs-xs text-body-secondary align-self-end">(113)</span>
                        </div>
                        <div class="fs-sm text-dark-emphasis">From $120</div>
                      </div>
                    </article>
                  </div>
                </div>
                <div id="html-9" class="tab-pane pt-4 fade" role="tabpanel">
                  <div class="position-relative" data-bs-theme="dark">
                    <button type="button" class="btn btn-sm btn-outline-secondary bg-dark position-absolute top-0 end-0 mt-2 px-2 z-3" data-copy-code="#project-horizontal-code">
                      <i class="fi-copy fs-sm me-1"></i>
                      Copy
                    </button>
                    <pre id="project-horizontal-code" class="code-highlight mx-n2 mb-n2"><code class="language-html">&lt;!-- Horizontal project listing card: Variant 1 --&gt;
    &lt;article class=&quot;card hover-effect-scale bg-transparent overflow-hidden&quot;&gt;
      &lt;div class=&quot;row h-100 g-0&quot;&gt;

        &lt;!-- Image --&gt;
        &lt;div class=&quot;col-sm-4 position-relative bg-body-tertiary overflow-hidden&quot; style=&quot;min-height: 178px&quot;&gt;
          &lt;img src=&quot;assets/img/home/contractors/projects/04.jpg&quot; class=&quot;hover-effect-target position-absolute top-0 start-0 w-100 h-100 object-fit-cover&quot; alt=&quot;Image&quot;&gt;
        &lt;/div&gt;

        &lt;!-- Card body: Title + Rating + Price + Book button --&gt;
        &lt;div class=&quot;col-sm-8 card-body d-flex flex-column align-items-start p-3 p-sm-4&quot;&gt;
          &lt;h3 class=&quot;h6 mt-1 mt-sm-0 mb-2&quot;&gt;
            &lt;a class=&quot;stretched-link hover-effect-underline&quot; href=&quot;#&quot;&gt;Cleaning up after repairs&lt;/a&gt;
          &lt;/h3&gt;
          &lt;div class=&quot;d-flex align-items-center gap-3 mb-4&quot;&gt;
            &lt;div class=&quot;d-flex align-items-center gap-1&quot;&gt;
              &lt;i class=&quot;fi-star-filled text-warning&quot;&gt;&lt;/i&gt;
              &lt;span class=&quot;fs-sm text-secondary-emphasis&quot;&gt;4.7&lt;/span&gt;
              &lt;span class=&quot;fs-xs text-body-secondary align-self-end&quot;&gt;(63)&lt;/span&gt;
            &lt;/div&gt;
            &lt;div class=&quot;fs-sm text-dark-emphasis&quot;&gt;From $150&lt;/div&gt;
          &lt;/div&gt;
          &lt;button type=&quot;button&quot; class=&quot;btn btn-outline-dark position-relative z-2 mt-auto&quot;&gt;Book now&lt;/button&gt;
        &lt;/div&gt;
      &lt;/div&gt;
    &lt;/article&gt;


    &lt;!-- Horizontal project listing card: Variant 2 --&gt;
    &lt;article class=&quot;hover-effect-scale position-relative d-inline-flex align-items-start&quot;&gt;

      &lt;!-- Image thumb --&gt;
      &lt;div class=&quot;flex-shrink-0 bg-body-tertiary rounded overflow-hidden&quot; style=&quot;width: 112px&quot;&gt;
        &lt;!-- Wrap the image with a "ratio" element to avoid content shifts on page load. Formula: imageHeight / imageWidth * 100% --&gt;
        &lt;div class=&quot;ratio hover-effect-target&quot; style=&quot;--fn-aspect-ratio: calc(80 / 112 * 100%)&quot;&gt;
          &lt;img src=&quot;assets/img/home/contractors/projects/th03.jpg&quot; alt=&quot;Image&quot;&gt;
        &lt;/div&gt;
      &lt;/div&gt;

      &lt;!-- Title + Rating + Price --&gt;
      &lt;div class=&quot;pt-1 ps-3&quot;&gt;
        &lt;h3 class=&quot;h6 mb-1&quot;&gt;
          &lt;a class=&quot;hover-effect-underline stretched-link&quot; href=&quot;#&quot;&gt;Appliance repair&lt;/a&gt;
        &lt;/h3&gt;
        &lt;div class=&quot;d-flex align-items-center gap-1 mb-1&quot;&gt;
          &lt;i class=&quot;fi-star-filled text-warning&quot;&gt;&lt;/i&gt;
          &lt;span class=&quot;fs-sm text-secondary-emphasis&quot;&gt;4.8&lt;/span&gt;
          &lt;span class=&quot;fs-xs text-body-secondary align-self-end&quot;&gt;(113)&lt;/span&gt;
        &lt;/div&gt;
        &lt;div class=&quot;fs-sm text-dark-emphasis&quot;&gt;From $120&lt;/div&gt;
      &lt;/div&gt;
    &lt;/article&gt;</code></pre>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>


        <!-- Doctor listing card: Variant 1 -->
        <section id="doctor-1" class="docs-section pb-sm-2 mb-5">
          <h4 class="pb-3">Doctor listing card: Variant 1</h4>
          <div class="card position-static border-0">
            <div class="card-body p-0">
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
                  <article class="position-relative z-1">
                    <div class="row flex-lg-nowrap g-0">
                      <div class="col-lg-8 p-4">
                        <div class="d-flex align-items-start">
                          <a class="d-block text-decoration-none flex-shrink-0" href="#!">
                            <div class="d-md-none" style="width: 48px"></div>
                            <div class="d-none d-sm-block d-xl-none" style="width: 100px"></div>
                            <div class="d-none d-xl-block" style="width: 164px"></div>
                            <div class="ratio" style="--fn-aspect-ratio: calc(204 / 164 * 100%)">
                              <img src="{{ asset('assets/img/listings/doctors/01.jpg') }}" class="bg-body-tertiary rounded" alt="Image">
                            </div>
                            <div class="d-none d-sm-flex align-items-center justify-content-center gap-1 pt-3">
                              <i class="fi-star-filled text-warning"></i>
                              <span class="fs-sm text-secondary-emphasis">4.5</span>
                              <span class="fs-xs text-body-secondary align-self-end">(176)</span>
                            </div>
                          </a>
                          <div class="ps-sm-4 ms-md-2">
                            <div class="position-relative">
                              <h3 class="h5 ms-3 ms-sm-0 mb-2">
                                <a class="hover-effect-underline stretched-link" href="#!">Dr. Michael Johnston</a>
                              </h3>
                              <div class="d-flex align-items-center gap-3 pb-1 ms-3 ms-sm-0 mb-2">
                                <div class="h6 fs-sm mb-0">Cardiologist</div>
                                <div class="d-flex d-sm-none align-items-center gap-1">
                                  <i class="fi-star-filled text-warning"></i>
                                  <span class="fs-sm text-secondary-emphasis">4.5</span>
                                  <span class="fs-xs text-body-secondary align-self-end">(176)</span>
                                </div>
                              </div>
                              <ul class="list-unstyled flex-row flex-wrap align-items-center text-nowrap pt-2 pt-sm-0 ms-n5 ms-sm-0 mb-3">
                                <li class="d-flex align-items-center gap-2 me-2">
                                  <span class="badge text-bg-primary">21</span>
                                  <span class="fs-sm text-dark-emphasis">years experience</span>
                                </li>
                                <li class="d-flex align-items-center gap-1 fs-sm text-dark-emphasis me-2">
                                  <i class="fi-user fs-base"></i>
                                  Adults
                                </li>
                                <li class="d-flex align-items-center gap-1 fs-sm text-dark-emphasis me-2">
                                  <i class="fi-baby fs-base"></i>
                                  Children
                                </li>
                              </ul>
                            </div>
                            <p class="fs-sm ms-n5 ms-sm-0">Dr. Michael Johnston, a cardiologist with over two decades of experience, offers advanced cardiovascular care, utilizing cutting-edge techniques and thorough diagnostic analysis. Trust his expertise for all your heart health needs.</p>
                            <dl class="ms-n5 ms-sm-0 mb-0">
                              <dt class="fs-sm mb-2">Citywide Heart Clinic</dt>
                              <dd class="d-flex flex-wrap gap-2 fs-sm mb-3">
                                <div class="d-flex align-items-center gap-1 me-2">
                                  <i class="fi-map-pin fs-base"></i>
                                  1.4 mi
                                </div>
                                <div class="me-2">201 E Randolph St, Chicago, IL 60602</div>
                                <div class="nav mt-n1">
                                  <a class="nav-link position-relative gap-2 fs-xs py-1 px-0" href="#!">
                                    <i class="fi-map fs-sm"></i>
                                    <span class="hover-effect-underline stretched-link">Show on map</span>
                                  </a>
                                </div>
                              </dd>
                              <dt class="fs-sm mb-2">Skyline Medical Center</dt>
                              <dd class="d-flex flex-wrap gap-2 fs-sm mb-0">
                                <div class="d-flex align-items-center gap-1 me-2">
                                  <i class="fi-map-pin fs-base"></i>
                                  3.2 mi
                                </div>
                                <div class="me-2">233 S Wacker Dr, Chicago, IL 60606</div>
                                <div class="nav mt-n1">
                                  <a class="nav-link position-relative gap-2 fs-xs py-1 px-0" href="#!">
                                    <i class="fi-map fs-sm"></i>
                                    <span class="hover-effect-underline stretched-link">Show on map</span>
                                  </a>
                                </div>
                              </dd>
                            </dl>
                            <div class="d-flex d-sm-block d-lg-none flex-column mt-4 ms-n5 ms-sm-0">
                              <button type="button" class="btn btn-outline-primary" data-bs-toggle="offcanvas" data-bs-target="#bookAppointment" aria-controls="bookAppointment">
                                Book an appointment
                              </button>
                            </div>
                          </div>
                        </div>
                      </div>
                      <hr class="vr d-none d-lg-block m-0">
                      <div class="col-lg-4 p-lg-4">
                        <div class="offcanvas-lg offcanvas-end" tabindex="-1" id="bookAppointment" style="z-index: 1050">
                          <div class="offcanvas-header pt-3">
                            <h5 class="offcanvas-title">Book an appointment</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#bookAppointment" aria-label="Close"></button>
                          </div>
                          <div class="offcanvas-body d-block pt-0 p-xl-0">
                            <ul class="list-unstyled gap-1 fs-sm text-body-secondary mb-4">
                              <li>
                                <span class="fs-6 fw-semibold text-primary me-1">$75.00</span>
                                Online consultation
                              </li>
                              <li>
                                <span class="fs-6 fw-semibold text-dark-emphasis me-1">$90.00</span>
                                Visiting the clinic
                              </li>
                            </ul>
                            <div class="d-flex gap-4 pb-2 mb-1">
                              <div class="form-check form-switch">
                                <label class="form-check-label">
                                  <input type="radio" class="form-check-input" name="visit-method" checked>
                                  Online
                                </label>
                              </div>
                              <div class="form-check form-switch">
                                <label class="form-check-label">
                                  <input type="radio" class="form-check-input" name="visit-method">
                                  Visit clinic
                                </label>
                              </div>
                            </div>
                            <div class="btn-group w-100" role="group" aria-label="Date/time selection">
                              <input type="radio" class="btn-check" name="visit-day" id="visit-day-1" checked>
                              <label class="btn btn-outline-info w-100 px-2" for="visit-day-1">Mon, 11</label>
                              <input type="radio" class="btn-check" name="visit-day" id="visit-day-2">
                              <label class="btn btn-outline-info w-100 px-2" for="visit-day-2">Tue, 12</label>
                              <input type="radio" class="btn-check" name="visit-day" id="visit-day-3">
                              <label class="btn btn-outline-info w-100 px-2" for="visit-day-3">Wed, 13</label>
                              <button type="button" class="btn btn-icon btn-outline-info flex-grow-0 px-2" aria-label="Next">
                                <i class="fi-chevron-right fs-lg"></i>
                              </button>
                            </div>
                            <div class="row row-cols-4 g-2 pt-4">
                              <div class="col">
                                <input type="radio" class="btn-check" name="visit-time" id="visit-time-1">
                                <label class="btn btn-outline-secondary w-100 rounded-pill px-2" for="visit-time-1">10:00</label>
                              </div>
                              <div class="col">
                                <input type="radio" class="btn-check" name="visit-time" id="visit-time-2">
                                <label class="btn btn-outline-secondary w-100 rounded-pill px-2" for="visit-time-2">10:30</label>
                              </div>
                              <div class="col">
                                <input type="radio" class="btn-check" name="visit-time" id="visit-time-3">
                                <label class="btn btn-outline-secondary w-100 rounded-pill px-2" for="visit-time-3">11:00</label>
                              </div>
                              <div class="col">
                                <input type="radio" class="btn-check" name="visit-time" id="visit-time-4">
                                <label class="btn btn-outline-secondary w-100 rounded-pill px-2" for="visit-time-4">11:30</label>
                              </div>
                              <div class="col">
                                <input type="radio" class="btn-check" name="visit-time" id="visit-time-5">
                                <label class="btn btn-outline-secondary w-100 rounded-pill px-2" for="visit-time-5">12:00</label>
                              </div>
                              <div class="col">
                                <input type="radio" class="btn-check" name="visit-time" id="visit-time-6">
                                <label class="btn btn-outline-secondary w-100 rounded-pill px-2" for="visit-time-6">12:30</label>
                              </div>
                              <div class="col">
                                <input type="radio" class="btn-check" name="visit-time" id="visit-time-7">
                                <label class="btn btn-outline-secondary w-100 rounded-pill px-2" for="visit-time-7">13:00</label>
                              </div>
                              <div class="col">
                                <input type="radio" class="btn-check" name="visit-time" id="visit-time-8">
                                <label class="btn btn-outline-secondary w-100 rounded-pill px-2" for="visit-time-8">13:30</label>
                              </div>
                              <div class="col">
                                <input type="radio" class="btn-check" name="visit-time" id="visit-time-9">
                                <label class="btn btn-outline-secondary w-100 rounded-pill px-2" for="visit-time-9">14:00</label>
                              </div>
                              <div class="col">
                                <input type="radio" class="btn-check" name="visit-time" id="visit-time-10">
                                <label class="btn btn-outline-secondary w-100 rounded-pill px-2" for="visit-time-10">14:30</label>
                              </div>
                              <div class="col">
                                <input type="radio" class="btn-check" name="visit-time" id="visit-time-11">
                                <label class="btn btn-outline-secondary w-100 rounded-pill px-2" for="visit-time-11">15:00</label>
                              </div>
                              <div class="col">
                                <input type="radio" class="btn-check" name="visit-time" id="visit-time-12">
                                <label class="btn btn-outline-secondary w-100 rounded-pill px-2" for="visit-time-12">15:30</label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <span class="position-absolute top-0 start-0 w-100 h-100 bg-white border rounded shadow z-n1 d-none-dark"></span>
                    <span class="position-absolute top-0 start-0 w-100 h-100 bg-body-tertiary rounded z-n1 d-none d-block-dark"></span>
                  </article>
                </div>
                <div id="html-10" class="tab-pane pt-4 fade" role="tabpanel">
                  <div class="position-relative" data-bs-theme="dark">
                    <button type="button" class="btn btn-sm btn-outline-secondary bg-dark position-absolute top-0 end-0 mt-2 px-2 z-3" data-copy-code="#doctor-1-code">
                      <i class="fi-copy fs-sm me-1"></i>
                      Copy
                    </button>
                    <pre id="doctor-1-code" class="code-highlight mx-n2 mb-n2"><code class="language-html">&lt;!-- Doctor listing card: Variant 1 --&gt;
    &lt;article class=&quot;position-relative&quot;&gt;
      &lt;div class=&quot;row flex-lg-nowrap g-0&quot;&gt;
        &lt;div class=&quot;col-lg-8 p-4&quot;&gt;
          &lt;div class=&quot;d-flex align-items-start p-xl-2&quot;&gt;

            &lt;!-- Image + Reviews (visible on screens &gt; 500px wide) --&gt;
            &lt;a class=&quot;d-block text-decoration-none flex-shrink-0&quot; href=&quot;#&quot;&gt;
              &lt;div class=&quot;d-md-none&quot; style=&quot;width: 48px&quot;&gt;&lt;/div&gt;
              &lt;div class=&quot;d-none d-sm-block d-md-none&quot; style=&quot;width: 100px&quot;&gt;&lt;/div&gt;
              &lt;div class=&quot;d-none d-md-block&quot; style=&quot;width: 164px&quot;&gt;&lt;/div&gt;
              &lt;!-- Wrap the image with a &quot;ratio&quot; element to avoid content shifts on page load. Formula: imageHeight / imageWidth * 100% --&gt;
              &lt;div class=&quot;ratio&quot; style=&quot;--fn-aspect-ratio: calc(204 / 164 * 100%)&quot;&gt;
                &lt;img src=&quot;assets/img/listings/doctors/01.jpg&quot; class=&quot;rounded&quot; alt=&quot;Image&quot;&gt;
              &lt;/div&gt;
              &lt;div class=&quot;d-none d-sm-flex align-items-center justify-content-center gap-1 pt-3&quot;&gt;
                &lt;i class=&quot;fi-star-filled text-warning&quot;&gt;&lt;/i&gt;
                &lt;span class=&quot;fs-sm text-secondary-emphasis&quot;&gt;4.5&lt;/span&gt;
                &lt;span class=&quot;fs-xs text-body-secondary align-self-end&quot;&gt;(176)&lt;/span&gt;
              &lt;/div&gt;
            &lt;/a&gt;

            &lt;!-- Doctor details --&gt;
            &lt;div class=&quot;ps-sm-4 ps-xl-5 pe-xl-3 ms-md-2 ms-xl-0&quot;&gt;
              &lt;div class=&quot;position-relative&quot;&gt;
                &lt;h3 class=&quot;h5 ms-3 ms-sm-0 mb-2&quot;&gt;
                  &lt;a class=&quot;hover-effect-underline stretched-link&quot; href=&quot;#&quot;&gt;Dr. Michael Johnston&lt;/a&gt;
                &lt;/h3&gt;
                &lt;div class=&quot;d-flex align-items-center gap-3 pb-1 ms-3 ms-sm-0 mb-2&quot;&gt;
                  &lt;div class=&quot;h6 fs-sm mb-0&quot;&gt;Cardiologist&lt;/div&gt;
                  &lt;div class=&quot;d-flex d-sm-none align-items-center gap-1&quot;&gt;
                    &lt;i class=&quot;fi-star-filled text-warning&quot;&gt;&lt;/i&gt;
                    &lt;span class=&quot;fs-sm text-secondary-emphasis&quot;&gt;4.5&lt;/span&gt;
                    &lt;span class=&quot;fs-xs text-body-secondary align-self-end&quot;&gt;(176)&lt;/span&gt;
                  &lt;/div&gt;
                &lt;/div&gt;
                &lt;ul class=&quot;list-unstyled flex-row flex-wrap align-items-center text-nowrap pt-2 pt-sm-0 ms-n5 ms-sm-0 mb-3&quot;&gt;
                  &lt;li class=&quot;d-flex align-items-center gap-2 me-2&quot;&gt;
                    &lt;span class=&quot;badge text-bg-primary&quot;&gt;21&lt;/span&gt;
                    &lt;span class=&quot;fs-sm text-dark-emphasis&quot;&gt;years experience&lt;/span&gt;
                  &lt;/li&gt;
                  &lt;li class=&quot;d-flex align-items-center gap-1 fs-sm text-dark-emphasis me-2&quot;&gt;
                    &lt;i class=&quot;fi-user fs-base&quot;&gt;&lt;/i&gt;
                    Adults
                  &lt;/li&gt;
                  &lt;li class=&quot;d-flex align-items-center gap-1 fs-sm text-dark-emphasis me-2&quot;&gt;
                    &lt;i class=&quot;fi-baby fs-base&quot;&gt;&lt;/i&gt;
                    Children
                  &lt;/li&gt;
                &lt;/ul&gt;
              &lt;/div&gt;
              &lt;p class=&quot;fs-sm ms-n5 ms-sm-0&quot;&gt;Dr. Michael Johnston, a cardiologist with over two decades of experience, offers advanced cardiovascular care, utilizing cutting-edge techniques and thorough diagnostic analysis. Trust his expertise for all your heart health needs.&lt;/p&gt;
              &lt;dl class=&quot;ms-n5 ms-sm-0 mb-0&quot;&gt;
                &lt;dt class=&quot;fs-sm mb-2&quot;&gt;Citywide Heart Clinic&lt;/dt&gt;
                &lt;dd class=&quot;d-flex flex-wrap gap-2 fs-sm mb-3&quot;&gt;
                  &lt;div class=&quot;d-flex align-items-center gap-1 me-2&quot;&gt;
                    &lt;i class=&quot;fi-map-pin fs-base&quot;&gt;&lt;/i&gt;
                    1.4 mi
                  &lt;/div&gt;
                  &lt;div class=&quot;me-2&quot;&gt;201 E Randolph St, Chicago, IL 60602&lt;/div&gt;
                  &lt;div class=&quot;nav mt-n1&quot;&gt;
                    &lt;a class=&quot;nav-link position-relative gap-2 fs-xs py-1 px-0&quot; href=&quot;#&quot;&gt;
                      &lt;i class=&quot;fi-map fs-sm&quot;&gt;&lt;/i&gt;
                      &lt;span class=&quot;hover-effect-underline stretched-link&quot;&gt;Show on map&lt;/span&gt;
                    &lt;/a&gt;
                  &lt;/div&gt;
                &lt;/dd&gt;
                &lt;dt class=&quot;fs-sm mb-2&quot;&gt;Skyline Medical Center&lt;/dt&gt;
                &lt;dd class=&quot;d-flex flex-wrap gap-2 fs-sm mb-0&quot;&gt;
                  &lt;div class=&quot;d-flex align-items-center gap-1 me-2&quot;&gt;
                    &lt;i class=&quot;fi-map-pin fs-base&quot;&gt;&lt;/i&gt;
                    3.2 mi
                  &lt;/div&gt;
                  &lt;div class=&quot;me-2&quot;&gt;233 S Wacker Dr, Chicago, IL 60606&lt;/div&gt;
                  &lt;div class=&quot;nav mt-n1&quot;&gt;
                    &lt;a class=&quot;nav-link position-relative gap-2 fs-xs py-1 px-0&quot; href=&quot;#&quot;&gt;
                      &lt;i class=&quot;fi-map fs-sm&quot;&gt;&lt;/i&gt;
                      &lt;span class=&quot;hover-effect-underline stretched-link&quot;&gt;Show on map&lt;/span&gt;
                    &lt;/a&gt;
                  &lt;/div&gt;
                &lt;/dd&gt;
              &lt;/dl&gt;
              &lt;div class=&quot;d-flex d-sm-block d-lg-none flex-column mt-4 ms-n5 ms-sm-0&quot;&gt;
                &lt;button type=&quot;button&quot; class=&quot;btn btn-outline-primary&quot; data-bs-toggle=&quot;offcanvas&quot; data-bs-target=&quot;#bookAppointment&quot; aria-controls=&quot;bookAppointment&quot;&gt;
                  Book an appointment
                &lt;/button&gt;
              &lt;/div&gt;
            &lt;/div&gt;
          &lt;/div&gt;
        &lt;/div&gt;
        &lt;hr class=&quot;vr d-none d-lg-block m-0&quot;&gt;

        &lt;!-- Booking form that turns into offcanvas on screens &lt; 992px wide --&gt;
        &lt;div class=&quot;col-lg-4 p-lg-4&quot;&gt;
          &lt;div class=&quot;offcanvas-lg offcanvas-end&quot; tabindex=&quot;-1&quot; id=&quot;bookAppointment&quot;&gt;
            &lt;div class=&quot;offcanvas-header pt-3&quot;&gt;
              &lt;h5 class=&quot;offcanvas-title&quot;&gt;Book an appointment&lt;/h5&gt;
              &lt;button type=&quot;button&quot; class=&quot;btn-close&quot; data-bs-dismiss=&quot;offcanvas&quot; data-bs-target=&quot;#bookAppointment&quot; aria-label=&quot;Close&quot;&gt;&lt;/button&gt;
            &lt;/div&gt;
            &lt;div class=&quot;offcanvas-body d-block pt-0 p-xl-2&quot;&gt;
              &lt;ul class=&quot;list-unstyled gap-1 fs-sm text-body-secondary mb-4&quot;&gt;
                &lt;li&gt;
                  &lt;span class=&quot;fs-6 fw-semibold text-primary me-1&quot;&gt;$75.00&lt;/span&gt;
                  Online consultation
                &lt;/li&gt;
                &lt;li&gt;
                  &lt;span class=&quot;fs-6 fw-semibold text-dark-emphasis me-1&quot;&gt;$90.00&lt;/span&gt;
                  Visiting the clinic
                &lt;/li&gt;
              &lt;/ul&gt;
              &lt;div class=&quot;d-flex gap-4 pb-2 mb-1&quot;&gt;
                &lt;div class=&quot;form-check form-switch&quot;&gt;
                  &lt;label class=&quot;form-check-label&quot;&gt;
                    &lt;input type=&quot;radio&quot; class=&quot;form-check-input&quot; name=&quot;visit-method&quot; checked&gt;
                    Online
                  &lt;/label&gt;
                &lt;/div&gt;
                &lt;div class=&quot;form-check form-switch&quot;&gt;
                  &lt;label class=&quot;form-check-label&quot;&gt;
                    &lt;input type=&quot;radio&quot; class=&quot;form-check-input&quot; name=&quot;visit-method&quot;&gt;
                    Visit clinic
                  &lt;/label&gt;
                &lt;/div&gt;
              &lt;/div&gt;
              &lt;div class=&quot;btn-group w-100&quot; role=&quot;group&quot; aria-label=&quot;Date/time selection&quot;&gt;
                &lt;input type=&quot;radio&quot; class=&quot;btn-check&quot; name=&quot;visit-day&quot; id=&quot;visit-day-1&quot; checked&gt;
                &lt;label class=&quot;btn btn-outline-info w-100 px-2&quot; for=&quot;visit-day-1&quot;&gt;Mon, 11&lt;/label&gt;
                &lt;input type=&quot;radio&quot; class=&quot;btn-check&quot; name=&quot;visit-day&quot; id=&quot;visit-day-2&quot;&gt;
                &lt;label class=&quot;btn btn-outline-info w-100 px-2&quot; for=&quot;visit-day-2&quot;&gt;Tue, 12&lt;/label&gt;
                &lt;input type=&quot;radio&quot; class=&quot;btn-check&quot; name=&quot;visit-day&quot; id=&quot;visit-day-3&quot;&gt;
                &lt;label class=&quot;btn btn-outline-info w-100 px-2&quot; for=&quot;visit-day-3&quot;&gt;Wed, 13&lt;/label&gt;
                &lt;button type=&quot;button&quot; class=&quot;btn btn-icon btn-outline-info flex-grow-0 px-2&quot; aria-label=&quot;Next&quot;&gt;
                  &lt;i class=&quot;fi-chevron-right fs-lg&quot;&gt;&lt;/i&gt;
                &lt;/button&gt;
              &lt;/div&gt;
              &lt;div class=&quot;row row-cols-4 g-2 pt-4&quot;&gt;
                &lt;div class=&quot;col&quot;&gt;
                  &lt;input type=&quot;radio&quot; class=&quot;btn-check&quot; name=&quot;visit-time&quot; id=&quot;visit-time-1&quot;&gt;
                  &lt;label class=&quot;btn btn-outline-secondary w-100 rounded-pill px-2&quot; for=&quot;visit-time-1&quot;&gt;10:00&lt;/label&gt;
                &lt;/div&gt;
                &lt;div class=&quot;col&quot;&gt;
                  &lt;input type=&quot;radio&quot; class=&quot;btn-check&quot; name=&quot;visit-time&quot; id=&quot;visit-time-2&quot;&gt;
                  &lt;label class=&quot;btn btn-outline-secondary w-100 rounded-pill px-2&quot; for=&quot;visit-time-2&quot;&gt;10:30&lt;/label&gt;
                &lt;/div&gt;
                &lt;div class=&quot;col&quot;&gt;
                  &lt;input type=&quot;radio&quot; class=&quot;btn-check&quot; name=&quot;visit-time&quot; id=&quot;visit-time-3&quot;&gt;
                  &lt;label class=&quot;btn btn-outline-secondary w-100 rounded-pill px-2&quot; for=&quot;visit-time-3&quot;&gt;11:00&lt;/label&gt;
                &lt;/div&gt;
                &lt;div class=&quot;col&quot;&gt;
                  &lt;input type=&quot;radio&quot; class=&quot;btn-check&quot; name=&quot;visit-time&quot; id=&quot;visit-time-4&quot;&gt;
                  &lt;label class=&quot;btn btn-outline-secondary w-100 rounded-pill px-2&quot; for=&quot;visit-time-4&quot;&gt;11:30&lt;/label&gt;
                &lt;/div&gt;
                &lt;div class=&quot;col&quot;&gt;
                  &lt;input type=&quot;radio&quot; class=&quot;btn-check&quot; name=&quot;visit-time&quot; id=&quot;visit-time-5&quot;&gt;
                  &lt;label class=&quot;btn btn-outline-secondary w-100 rounded-pill px-2&quot; for=&quot;visit-time-5&quot;&gt;12:00&lt;/label&gt;
                &lt;/div&gt;
                &lt;div class=&quot;col&quot;&gt;
                  &lt;input type=&quot;radio&quot; class=&quot;btn-check&quot; name=&quot;visit-time&quot; id=&quot;visit-time-6&quot;&gt;
                  &lt;label class=&quot;btn btn-outline-secondary w-100 rounded-pill px-2&quot; for=&quot;visit-time-6&quot;&gt;12:30&lt;/label&gt;
                &lt;/div&gt;
                &lt;div class=&quot;col&quot;&gt;
                  &lt;input type=&quot;radio&quot; class=&quot;btn-check&quot; name=&quot;visit-time&quot; id=&quot;visit-time-7&quot;&gt;
                  &lt;label class=&quot;btn btn-outline-secondary w-100 rounded-pill px-2&quot; for=&quot;visit-time-7&quot;&gt;13:00&lt;/label&gt;
                &lt;/div&gt;
                &lt;div class=&quot;col&quot;&gt;
                  &lt;input type=&quot;radio&quot; class=&quot;btn-check&quot; name=&quot;visit-time&quot; id=&quot;visit-time-8&quot;&gt;
                  &lt;label class=&quot;btn btn-outline-secondary w-100 rounded-pill px-2&quot; for=&quot;visit-time-8&quot;&gt;13:30&lt;/label&gt;
                &lt;/div&gt;
                &lt;div class=&quot;col&quot;&gt;
                  &lt;input type=&quot;radio&quot; class=&quot;btn-check&quot; name=&quot;visit-time&quot; id=&quot;visit-time-9&quot;&gt;
                  &lt;label class=&quot;btn btn-outline-secondary w-100 rounded-pill px-2&quot; for=&quot;visit-time-9&quot;&gt;14:00&lt;/label&gt;
                &lt;/div&gt;
                &lt;div class=&quot;col&quot;&gt;
                  &lt;input type=&quot;radio&quot; class=&quot;btn-check&quot; name=&quot;visit-time&quot; id=&quot;visit-time-10&quot;&gt;
                  &lt;label class=&quot;btn btn-outline-secondary w-100 rounded-pill px-2&quot; for=&quot;visit-time-10&quot;&gt;14:30&lt;/label&gt;
                &lt;/div&gt;
                &lt;div class=&quot;col&quot;&gt;
                  &lt;input type=&quot;radio&quot; class=&quot;btn-check&quot; name=&quot;visit-time&quot; id=&quot;visit-time-11&quot;&gt;
                  &lt;label class=&quot;btn btn-outline-secondary w-100 rounded-pill px-2&quot; for=&quot;visit-time-11&quot;&gt;15:00&lt;/label&gt;
                &lt;/div&gt;
                &lt;div class=&quot;col&quot;&gt;
                  &lt;input type=&quot;radio&quot; class=&quot;btn-check&quot; name=&quot;visit-time&quot; id=&quot;visit-time-12&quot;&gt;
                  &lt;label class=&quot;btn btn-outline-secondary w-100 rounded-pill px-2&quot; for=&quot;visit-time-12&quot;&gt;15:30&lt;/label&gt;
                &lt;/div&gt;
              &lt;/div&gt;
            &lt;/div&gt;
          &lt;/div&gt;
        &lt;/div&gt;
      &lt;/div&gt;

      &lt;!-- Background color overlays for light and dark mode --&gt;
      &lt;span class=&quot;position-absolute top-0 start-0 w-100 h-100 bg-white rounded shadow z-n1 d-none-dark&quot;&gt;&lt;/span&gt;
      &lt;span class=&quot;position-absolute top-0 start-0 w-100 h-100 bg-body-tertiary rounded z-n1 d-none d-block-dark&quot;&gt;&lt;/span&gt;
    &lt;/article&gt;</code></pre>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>


        <!-- Doctor listing card: Variant 2 -->
        <section id="doctor-2" class="docs-section pb-sm-2 mb-5">
          <h4>Doctor listing card: Variant 2</h4>
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
                  <article class="card border-0 z-1" style="max-width: 636px">
                    <div class="card-body position-relative d-flex">
                      <div class="flex-shrink-0">
                        <div class="d-md-none" style="width: 48px"></div>
                        <div class="d-none d-sm-block d-xl-none" style="width: 100px"></div>
                        <div class="d-none d-xl-block" style="width: 150px"></div>
                        <div class="ratio" style="--fn-aspect-ratio: calc(164 / 150 * 100%)">
                          <img src="{{ asset('assets/img/listings/doctors/08.jpg') }}" class="bg-body-secondary rounded" alt="Image">
                        </div>
                      </div>
                      <div class="w-100 ps-sm-4">
                        <div class="d-flex flex-wrap align-items-center justify-content-between ms-3 ms-sm-0 mb-2">
                          <h3 class="h5 me-2 mb-0">
                            <a class="hover-effect-underline stretched-link" href="#!">Dr. Sophia Davis</a>
                          </h3>
                          <div class="d-flex align-items-center gap-1">
                            <i class="fi-star-filled text-warning"></i>
                            <span class="fs-sm text-secondary-emphasis">4.8</span>
                            <span class="fs-xs text-body-secondary align-self-end">(63)</span>
                          </div>
                        </div>
                        <div class="h6 fs-sm ms-3 ms-sm-0 mb-0">Pediatrician</div>
                        <ul class="list-unstyled flex-row flex-wrap align-items-center gap-3 pt-3 ms-n5 ms-sm-0 mb-3">
                          <li class="badge text-bg-info d-inline-flex align-items-center me-n1">
                            Verified
                            <i class="fi-shield ms-1"></i>
                          </li>
                          <li class="d-flex align-items-center fs-sm">
                            <i class="fi-award fs-base me-1"></i>
                            5 years experience
                          </li>
                          <li class="d-flex align-items-center fs-sm">
                            <i class="fi-baby fs-base me-1"></i>
                            Children
                          </li>
                        </ul>
                        <p class="fs-sm ms-n5 ms-sm-0">Dr. Davis is highly respected in her field, known for her innovative treatment plans and her ability to connect with young patients and their families.</p>
                        <ul class="list-unstyled fs-sm ms-n5 ms-sm-0 mb-0">
                          <li>
                            <span class="fw-semibold text-dark-emphasis me-1">Kids Health Clinic</span>
                            3.1 mi
                          </li>
                          <li>
                            <span class="fw-semibold text-dark-emphasis me-1">Pediatric Medical Center</span>
                            5.2 mi
                          </li>
                        </ul>
                      </div>
                    </div>
                    <div class="card-footer bg-transparent border-0 pt-0 p-4">
                      <hr class="m-0 mb-4">
                      <div class="d-flex flex-column flex-sm-row align-items-sm-center justify-content-between gap-3">
                        <div class="d-flex flex-wrap align-items-center gap-2">
                          <div class="h5 me-1 mb-0">From $35.00</div>
                          <div class="fs-sm">Online / Offline / Home visit</div>
                        </div>
                        <button type="button" class="btn btn-outline-primary">
                          Book an appointment
                        </button>
                      </div>
                    </div>
                    <span class="position-absolute top-0 start-0 w-100 h-100 bg-white rounded shadow z-n1 d-none-dark"></span>
                    <span class="position-absolute top-0 start-0 w-100 h-100 bg-body-tertiary rounded z-n1 d-none d-block-dark"></span>
                  </article>
                </div>
                <div id="html-11" class="tab-pane pt-4 fade" role="tabpanel">
                  <div class="position-relative" data-bs-theme="dark">
                    <button type="button" class="btn btn-sm btn-outline-secondary bg-dark position-absolute top-0 end-0 mt-2 px-2 z-3" data-copy-code="#doctor-2-code">
                      <i class="fi-copy fs-sm me-1"></i>
                      Copy
                    </button>
                    <pre id="doctor-2-code" class="code-highlight mx-n2 mb-n2"><code class="language-html">&lt;!-- Doctor listing card: Variant 2 --&gt;
    &lt;article class=&quot;card border-0 z-1&quot;&gt;
      &lt;div class=&quot;card-body position-relative d-flex&quot;&gt;

        &lt;!-- Image --&gt;
        &lt;div class=&quot;flex-shrink-0&quot;&gt;
          &lt;div class=&quot;d-md-none&quot; style=&quot;width: 48px&quot;&gt;&lt;/div&gt;
          &lt;div class=&quot;d-none d-sm-block d-xl-none&quot; style=&quot;width: 100px&quot;&gt;&lt;/div&gt;
          &lt;div class=&quot;d-none d-xl-block&quot; style=&quot;width: 150px&quot;&gt;&lt;/div&gt;
          &lt;!-- Wrap the image with a &quot;ratio&quot; element to avoid content shifts on page load. Formula: imageHeight / imageWidth * 100% --&gt;
          &lt;div class=&quot;ratio&quot; style=&quot;--fn-aspect-ratio: calc(164 / 150 * 100%)&quot;&gt;
            &lt;img src=&quot;assets/img/listings/doctors/08.jpg&quot; class=&quot;bg-body-secondary rounded&quot; alt=&quot;Image&quot;&gt;
          &lt;/div&gt;
        &lt;/div&gt;

        &lt;!-- Doctor details --&gt;
        &lt;div class=&quot;w-100 ps-sm-4&quot;&gt;
          &lt;div class=&quot;d-flex flex-wrap align-items-center justify-content-between ms-3 ms-sm-0 mb-2&quot;&gt;
            &lt;h3 class=&quot;h5 me-2 mb-0&quot;&gt;
              &lt;a class=&quot;hover-effect-underline stretched-link&quot; href=&quot;#!&quot;&gt;Dr. Sophia Davis&lt;/a&gt;
            &lt;/h3&gt;
            &lt;div class=&quot;d-flex align-items-center gap-1&quot;&gt;
              &lt;i class=&quot;fi-star-filled text-warning&quot;&gt;&lt;/i&gt;
              &lt;span class=&quot;fs-sm text-secondary-emphasis&quot;&gt;4.8&lt;/span&gt;
              &lt;span class=&quot;fs-xs text-body-secondary align-self-end&quot;&gt;(63)&lt;/span&gt;
            &lt;/div&gt;
          &lt;/div&gt;
          &lt;div class=&quot;h6 fs-sm ms-3 ms-sm-0 mb-0&quot;&gt;Pediatrician&lt;/div&gt;
          &lt;ul class=&quot;list-unstyled flex-row flex-wrap align-items-center gap-3 pt-3 ms-n5 ms-sm-0 mb-3&quot;&gt;
            &lt;li class=&quot;badge text-bg-info d-inline-flex align-items-center me-n1&quot;&gt;
              Verified
              &lt;i class=&quot;fi-shield ms-1&quot;&gt;&lt;/i&gt;
            &lt;/li&gt;
            &lt;li class=&quot;d-flex align-items-center fs-sm&quot;&gt;
              &lt;i class=&quot;fi-award fs-base me-1&quot;&gt;&lt;/i&gt;
              5 years experience
            &lt;/li&gt;
            &lt;li class=&quot;d-flex align-items-center fs-sm&quot;&gt;
              &lt;i class=&quot;fi-baby fs-base me-1&quot;&gt;&lt;/i&gt;
              Children
            &lt;/li&gt;
          &lt;/ul&gt;
          &lt;p class=&quot;fs-sm ms-n5 ms-sm-0&quot;&gt;Dr. Davis is highly respected in her field, known for her innovative treatment plans and her ability to connect with young patients and their families.&lt;/p&gt;
          &lt;ul class=&quot;list-unstyled fs-sm ms-n5 ms-sm-0 mb-0&quot;&gt;
            &lt;li&gt;
              &lt;span class=&quot;fw-semibold text-dark-emphasis me-1&quot;&gt;Kids Health Clinic&lt;/span&gt;
              3.1 mi
            &lt;/li&gt;
            &lt;li&gt;
              &lt;span class=&quot;fw-semibold text-dark-emphasis me-1&quot;&gt;Pediatric Medical Center&lt;/span&gt;
              5.2 mi
            &lt;/li&gt;
          &lt;/ul&gt;
        &lt;/div&gt;
      &lt;/div&gt;

      &lt;!-- Card footer: Price + Bookin button --&gt;
      &lt;div class=&quot;card-footer bg-transparent border-0 pt-0 p-4&quot;&gt;
        &lt;hr class=&quot;m-0 mb-4&quot;&gt;
        &lt;div class=&quot;d-flex flex-column flex-sm-row align-items-sm-center justify-content-between gap-3&quot;&gt;
          &lt;div class=&quot;d-flex flex-wrap align-items-center gap-2&quot;&gt;
            &lt;div class=&quot;h5 me-1 mb-0&quot;&gt;From $35.00&lt;/div&gt;
            &lt;div class=&quot;fs-sm&quot;&gt;Online / Offline / Home visit&lt;/div&gt;
          &lt;/div&gt;
          &lt;button type=&quot;button&quot; class=&quot;btn btn-outline-primary&quot;&gt;
            Book an appointment
          &lt;/button&gt;
        &lt;/div&gt;
      &lt;/div&gt;

      &lt;!-- Background color overlays for light and dark mode --&gt;
      &lt;span class=&quot;position-absolute top-0 start-0 w-100 h-100 bg-white rounded shadow z-n1 d-none-dark&quot;&gt;&lt;/span&gt;
      &lt;span class=&quot;position-absolute top-0 start-0 w-100 h-100 bg-body-tertiary rounded z-n1 d-none d-block-dark&quot;&gt;&lt;/span&gt;
    &lt;/article&gt;</code></pre>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>


        <!-- Doctor listing card: Variant 3 -->
        <section id="doctor-3" class="docs-section pb-sm-2 mb-5">
          <h4>Doctor listing card: Variant 3</h4>
          <div class="card border-0 shadow">
            <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
            <div class="card-body position-relative z-2">
              <ul class="nav nav-tabs m-n2" role="tablist" style="max-width: 240px">
                <li class="nav-item" role="presentation">
                  <button type="button" class="nav-link active" data-bs-toggle="tab" data-bs-target="#preview-12" role="tab" aria-controls="preview-12" aria-selected="true">
                    <i class="fi-eye opacity-75 ms-n1 me-2"></i>
                    Preview
                  </button>
                </li>
                <li class="nav-item" role="presentation">
                  <button type="button" class="nav-link" data-bs-toggle="tab" data-bs-target="#html-12" role="tab" aria-controls="html-12" aria-selected="false">
                    <i class="fi-code opacity-75 ms-n1 me-2"></i>
                    HTML
                  </button>
                </li>
              </ul>
              <div class="tab-content">
                <div id="preview-12" class="tab-pane pt-4 pb-2 mt-3 fade show active" role="tabpanel">
                  <article class="card hover-effect-scale z-1 border-0" style="max-width: 306px">
                    <div class="card-img-top bg-body-tertiary overflow-hidden">
                      <div class="ratio hover-effect-target" style="--fn-aspect-ratio: calc(200 / 306 * 100%)">
                        <img src="{{ asset('assets/img/listings/doctors/20.jpg') }}" alt="Image">
                      </div>
                    </div>
                    <div class="card-body">
                      <div class="d-flex align-items-center gap-1 mb-2">
                        <i class="fi-star-filled text-warning"></i>
                        <span class="fs-sm text-secondary-emphasis">5.0</span>
                        <span class="fs-xs text-body-secondary align-self-end">(43)</span>
                      </div>
                      <h3 class="h5 mb-2">
                        <a class="hover-effect-underline stretched-link" href="#!">Dr. Peter Grokovski</a>
                      </h3>
                      <p class="fs-sm fw-semibold text-dark-emphasis mb-2">Dermatologist</p>
                      <ul class="list-unstyled flex-wrap flex-row gap-2 fs-sm mb-0">
                        <li class="d-flex align-items-center me-2">
                          <i class="fi-map-pin me-1"></i>
                          1.4 mi
                        </li>
                        <li class="d-flex align-items-center me-2">
                          <i class="fi-user me-1"></i>
                          Adults
                        </li>
                        <li class="d-flex align-items-center">
                          <i class="fi-baby me-1"></i>
                          Children
                        </li>
                      </ul>
                    </div>
                    <div class="card-footer bg-transparent border-0 h6 text-dark-emphasis pt-0 pb-4 mb-0">
                      $60.00
                    </div>
                    <span class="position-absolute top-0 start-0 w-100 h-100 z-n1 bg-white rounded shadow d-none-dark"></span>
                    <span class="position-absolute top-0 start-0 w-100 h-100 z-n1 bg-body-tertiary rounded d-none d-block-dark"></span>
                  </article>
                </div>
                <div id="html-12" class="tab-pane pt-4 fade" role="tabpanel">
                  <div class="position-relative" data-bs-theme="dark">
                    <button type="button" class="btn btn-sm btn-outline-secondary bg-dark position-absolute top-0 end-0 mt-2 px-2 z-3" data-copy-code="#doctor-3-code">
                      <i class="fi-copy fs-sm me-1"></i>
                      Copy
                    </button>
                    <pre id="doctor-3-code" class="code-highlight mx-n2 mb-n2"><code class="language-html">&lt;!-- Doctor listing card: Variant 3 --&gt;
    &lt;article class=&quot;card hover-effect-scale z-1 border-0&quot;&gt;

      &lt;!-- Image --&gt;
      &lt;div class=&quot;card-img-top bg-body-tertiary overflow-hidden&quot;&gt;
        &lt;!-- Wrap the image with a &quot;ratio&quot; element to avoid content shifts on page load. Formula: imageHeight / imageWidth * 100% --&gt;
        &lt;div class=&quot;ratio hover-effect-target&quot; style=&quot;--fn-aspect-ratio: calc(200 / 306 * 100%)&quot;&gt;
          &lt;img src=&quot;assets/img/listings/doctors/20.jpg&quot; alt=&quot;Image&quot;&gt;
        &lt;/div&gt;
      &lt;/div&gt;

      &lt;!-- Card body: Rating + Name + Position --&gt;
      &lt;div class=&quot;card-body&quot;&gt;
        &lt;div class=&quot;d-flex align-items-center gap-1 mb-2&quot;&gt;
          &lt;i class=&quot;fi-star-filled text-warning&quot;&gt;&lt;/i&gt;
          &lt;span class=&quot;fs-sm text-secondary-emphasis&quot;&gt;5.0&lt;/span&gt;
          &lt;span class=&quot;fs-xs text-body-secondary align-self-end&quot;&gt;(43)&lt;/span&gt;
        &lt;/div&gt;
        &lt;h3 class=&quot;h5 mb-2&quot;&gt;
          &lt;a class=&quot;hover-effect-underline stretched-link&quot; href=&quot;#&quot;&gt;Dr. Peter Grokovski&lt;/a&gt;
        &lt;/h3&gt;
        &lt;p class=&quot;fs-sm fw-semibold text-dark-emphasis mb-2&quot;&gt;Dermatologist&lt;/p&gt;
        &lt;ul class=&quot;list-unstyled flex-wrap flex-row gap-2 fs-sm mb-0&quot;&gt;
          &lt;li class=&quot;d-flex align-items-center me-2&quot;&gt;
            &lt;i class=&quot;fi-map-pin me-1&quot;&gt;&lt;/i&gt;
            1.4 mi
          &lt;/li&gt;
          &lt;li class=&quot;d-flex align-items-center me-2&quot;&gt;
            &lt;i class=&quot;fi-user me-1&quot;&gt;&lt;/i&gt;
            Adults
          &lt;/li&gt;
          &lt;li class=&quot;d-flex align-items-center&quot;&gt;
            &lt;i class=&quot;fi-baby me-1&quot;&gt;&lt;/i&gt;
            Children
          &lt;/li&gt;
        &lt;/ul&gt;
      &lt;/div&gt;

      &lt;!-- Card footer: Price --&gt;
      &lt;div class=&quot;card-footer bg-transparent border-0 h6 text-dark-emphasis pt-0 pb-4 mb-0&quot;&gt;
        $60.00
      &lt;/div&gt;

      &lt;!-- Background color overlays for light and dark mode --&gt;
      &lt;span class=&quot;position-absolute top-0 start-0 w-100 h-100 z-n1 bg-white rounded shadow d-none-dark&quot;&gt;&lt;/span&gt;
      &lt;span class=&quot;position-absolute top-0 start-0 w-100 h-100 z-n1 bg-body-tertiary rounded d-none d-block-dark&quot;&gt;&lt;/span&gt;
    &lt;/article&gt;</code></pre>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>


        <!-- Event listing card: Variant 1 -->
        <section id="event-1" class="docs-section pb-sm-2 mb-5">
          <h4>Event listing card: Variant 1</h4>
          <div class="card border-0 shadow">
            <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
            <div class="card-body position-relative z-2">
              <ul class="nav nav-tabs m-n2" role="tablist" style="max-width: 240px">
                <li class="nav-item" role="presentation">
                  <button type="button" class="nav-link active" data-bs-toggle="tab" data-bs-target="#preview-13" role="tab" aria-controls="preview-13" aria-selected="true">
                    <i class="fi-eye opacity-75 ms-n1 me-2"></i>
                    Preview
                  </button>
                </li>
                <li class="nav-item" role="presentation">
                  <button type="button" class="nav-link" data-bs-toggle="tab" data-bs-target="#html-13" role="tab" aria-controls="html-13" aria-selected="false">
                    <i class="fi-code opacity-75 ms-n1 me-2"></i>
                    HTML
                  </button>
                </li>
              </ul>
              <div class="tab-content">
                <div id="preview-13" class="tab-pane pt-4 pb-2 mt-3 fade show active" role="tabpanel">
                  <article class="card hover-effect-scale hover-effect-opacity bg-body-tertiary border-0" style="max-width: 416px">
                    <div class="position-absolute top-0 end-0 z-2 hover-effect-target opacity-0 pt-1 pt-sm-0 pe-1 pe-sm-0 mt-2 mt-sm-3 me-2 me-sm-3">
                      <button type="button" class="btn btn-sm btn-icon btn-light bg-light border-0 rounded-circle animate-pulse" aria-label="Add to wishlist">
                        <i class="fi-heart animate-target fs-sm"></i>
                      </button>
                    </div>
                    <div class="bg-body-secondary rounded overflow-hidden">
                      <div class="ratio hover-effect-target" style="--fn-aspect-ratio: calc(250 / 416 * 100%)">
                        <img src="{{ asset('assets/img/listings/events/04.jpg') }}" alt="Image">
                      </div>
                    </div>
                    <div class="card-body">
                      <ul class="list-unstyled flex-row flex-wrap align-items-center gap-2 fs-sm mb-2">
                        <li class="d-flex align-items-center">
                          <i class="fi-calendar me-1"></i>
                          Aug 13
                        </li>
                        <li>20:00</li>
                        <li class="d-flex mx-n1">
                          <i class="fi-bullet fs-base"></i>
                        </li>
                        <li>Concert</li>
                      </ul>
                      <h3 class="h5 pt-1 mb-2">
                        <a class="hover-effect-underline stretched-link" href="#!">Nostalgic Jazzphonic Quartet</a>
                      </h3>
                      <div class="d-flex align-items-center fs-sm">
                        <i class="fi-map-pin me-1"></i>
                        Chicago
                      </div>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between gap-3 bg-transparent border-0 pt-0 pb-4">
                      <div class="h5 text-info mb-0">$68.00</div>
                      <button type="button" class="btn btn-outline-dark position-relative z-2">Book now</button>
                    </div>
                  </article>
                </div>
                <div id="html-13" class="tab-pane pt-4 fade" role="tabpanel">
                  <div class="position-relative" data-bs-theme="dark">
                    <button type="button" class="btn btn-sm btn-outline-secondary bg-dark position-absolute top-0 end-0 mt-2 px-2 z-3" data-copy-code="#event-1-code">
                      <i class="fi-copy fs-sm me-1"></i>
                      Copy
                    </button>
                    <pre id="event-1-code" class="code-highlight mx-n2 mb-n2"><code class="language-html">&lt;!-- Event listing card: Variant 1 --&gt;
    &lt;article class=&quot;card hover-effect-scale hover-effect-opacity bg-body-tertiary border-0&quot;&gt;

      &lt;!-- Wishlist button --&gt;
      &lt;div class=&quot;position-absolute top-0 end-0 z-2 hover-effect-target opacity-0 pt-1 pt-sm-0 pe-1 pe-sm-0 mt-2 mt-sm-3 me-2 me-sm-3&quot;&gt;
        &lt;button type=&quot;button&quot; class=&quot;btn btn-sm btn-icon btn-light bg-light border-0 rounded-circle animate-pulse&quot; aria-label=&quot;Add to wishlist&quot;&gt;
          &lt;i class=&quot;fi-heart animate-target fs-sm&quot;&gt;&lt;/i&gt;
        &lt;/button&gt;
      &lt;/div&gt;

      &lt;!-- Image --&gt;
      &lt;div class=&quot;bg-body-secondary rounded overflow-hidden&quot;&gt;
        &lt;!-- Wrap the image with a &quot;ratio&quot; element to avoid content shifts on page load. Formula: imageHeight / imageWidth * 100% --&gt;
        &lt;div class=&quot;ratio hover-effect-target&quot; style=&quot;--fn-aspect-ratio: calc(250 / 416 * 100%)&quot;&gt;
          &lt;img src=&quot;assets/img/listings/events/04.jpg&quot; alt=&quot;Image&quot;&gt;
        &lt;/div&gt;
      &lt;/div&gt;

      &lt;!-- Card body: Title + Metadata --&gt;
      &lt;div class=&quot;card-body&quot;&gt;
        &lt;ul class=&quot;list-unstyled flex-row flex-wrap align-items-center gap-2 fs-sm mb-2&quot;&gt;
          &lt;li class=&quot;d-flex align-items-center&quot;&gt;
            &lt;i class=&quot;fi-calendar me-1&quot;&gt;&lt;/i&gt;
            Aug 13
          &lt;/li&gt;
          &lt;li&gt;20:00&lt;/li&gt;
          &lt;li class=&quot;d-flex mx-n1&quot;&gt;
            &lt;i class=&quot;fi-bullet fs-base&quot;&gt;&lt;/i&gt;
          &lt;/li&gt;
          &lt;li&gt;Concert&lt;/li&gt;
        &lt;/ul&gt;
        &lt;h3 class=&quot;h5 pt-1 mb-2&quot;&gt;
          &lt;a class=&quot;hover-effect-underline stretched-link&quot; href=&quot;#&quot;&gt;Nostalgic Jazzphonic Quartet&lt;/a&gt;
        &lt;/h3&gt;
        &lt;div class=&quot;d-flex align-items-center fs-sm&quot;&gt;
          &lt;i class=&quot;fi-map-pin me-1&quot;&gt;&lt;/i&gt;
          Chicago
        &lt;/div&gt;
      &lt;/div&gt;

      &lt;!-- Card footer: Price + Booking button --&gt;
      &lt;div class=&quot;card-footer d-flex align-items-center justify-content-between gap-3 bg-transparent border-0 pt-0 pb-4&quot;&gt;
        &lt;div class=&quot;h5 text-info mb-0&quot;&gt;$68.00&lt;/div&gt;
        &lt;button type=&quot;button&quot; class=&quot;btn btn-outline-dark position-relative z-2&quot;&gt;Book now&lt;/button&gt;
      &lt;/div&gt;
    &lt;/article&gt;</code></pre>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>


        <!-- Event listing card: Variant 2 -->
        <section id="event-2" class="docs-section pb-sm-2 mb-5">
          <h4>Event listing card: Variant 2</h4>
          <div class="card border-0 shadow">
            <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
            <div class="card-body position-relative z-2">
              <ul class="nav nav-tabs m-n2" role="tablist" style="max-width: 240px">
                <li class="nav-item" role="presentation">
                  <button type="button" class="nav-link active" data-bs-toggle="tab" data-bs-target="#preview-14" role="tab" aria-controls="preview-14" aria-selected="true">
                    <i class="fi-eye opacity-75 ms-n1 me-2"></i>
                    Preview
                  </button>
                </li>
                <li class="nav-item" role="presentation">
                  <button type="button" class="nav-link" data-bs-toggle="tab" data-bs-target="#html-14" role="tab" aria-controls="html-14" aria-selected="false">
                    <i class="fi-code opacity-75 ms-n1 me-2"></i>
                    HTML
                  </button>
                </li>
              </ul>
              <div class="tab-content">
                <div id="preview-14" class="tab-pane pt-4 pb-2 mt-3 fade show active" role="tabpanel">
                  <article class="card hover-effect-scale hover-effect-opacity bg-body-tertiary border-0" style="max-width: 636px">
                    <div class="position-absolute top-0 end-0 z-2 hover-effect-target opacity-0 pt-1 pt-sm-0 pe-1 pe-sm-0 mt-2 mt-sm-3 me-2 me-sm-3">
                      <button type="button" class="btn btn-sm btn-icon btn-light bg-light border-0 rounded-circle animate-pulse" aria-label="Add to wishlist">
                        <i class="fi-heart animate-target fs-sm"></i>
                      </button>
                    </div>
                    <div class="row">
                      <div class="col-sm-5 col-md-6 order-sm-2">
                        <div class="position-relative h-100 bg-body-secondary rounded overflow-hidden">
                          <div class="ratio d-none d-lg-block" style="--fn-aspect-ratio: calc(250 / 306 * 100%)"></div>
                          <div class="ratio ratio-16x9 d-lg-none"></div>
                          <img src="{{ asset('assets/img/listings/events/17.jpg') }}" class="hover-effect-target position-absolute top-0 start-0 w-100 h-100 object-fit-cover" style="object-position: center top" alt="Image">
                        </div>
                      </div>
                      <div class="col-sm-7 col-md-6 d-flex flex-column order-md-1">
                        <div class="card-body pe-sm-0">
                          <ul class="list-unstyled flex-row flex-wrap align-items-center gap-2 fs-sm mb-2">
                            <li class="d-flex align-items-center">
                              <i class="fi-calendar me-1"></i>
                              Oct 15
                            </li>
                            <li>18:00</li>
                            <li class="d-flex mx-n1">
                              <i class="fi-bullet fs-base"></i>
                            </li>
                            <li>Theater &amp; Cinema</li>
                          </ul>
                          <h3 class="h5 pt-1 mb-2">
                            <a class="hover-effect-underline stretched-link" href="#!">Parallax Show Ballet</a>
                          </h3>
                          <div class="d-flex align-items-center fs-sm">
                            <i class="fi-map-pin me-1"></i>
                            Chicago
                          </div>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between gap-3 bg-transparent border-0 pt-0 pt-sm-4 p-4 pe-sm-0">
                          <div class="h5 text-info mb-0">$56.00</div>
                          <button type="button" class="btn btn-outline-dark position-relative z-2">Book now</button>
                        </div>
                      </div>
                    </div>
                  </article>
                </div>
                <div id="html-14" class="tab-pane pt-4 fade" role="tabpanel">
                  <div class="position-relative" data-bs-theme="dark">
                    <button type="button" class="btn btn-sm btn-outline-secondary bg-dark position-absolute top-0 end-0 mt-2 px-2 z-3" data-copy-code="#event-2-code">
                      <i class="fi-copy fs-sm me-1"></i>
                      Copy
                    </button>
                    <pre id="event-2-code" class="code-highlight mx-n2 mb-n2"><code class="language-html">&lt;!-- Event listing card: Variant 2 --&gt;
    &lt;article class=&quot;card hover-effect-scale hover-effect-opacity bg-body-tertiary border-0&quot;&gt;

      &lt;!-- Wishlist button --&gt;
      &lt;div class=&quot;position-absolute top-0 end-0 z-2 hover-effect-target opacity-0 pt-1 pt-sm-0 pe-1 pe-sm-0 mt-2 mt-sm-3 me-2 me-sm-3&quot;&gt;
        &lt;button type=&quot;button&quot; class=&quot;btn btn-sm btn-icon btn-light bg-light border-0 rounded-circle animate-pulse&quot; aria-label=&quot;Add to wishlist&quot;&gt;
          &lt;i class=&quot;fi-heart animate-target fs-sm&quot;&gt;&lt;/i&gt;
        &lt;/button&gt;
      &lt;/div&gt;
      &lt;div class=&quot;row&quot;&gt;
        &lt;div class=&quot;col-sm-5 col-md-6 order-sm-2&quot;&gt;

          &lt;!-- Image --&gt;
          &lt;div class=&quot;position-relative h-100 bg-body-secondary rounded overflow-hidden&quot;&gt;
            &lt;div class=&quot;ratio d-none d-lg-block&quot; style=&quot;--fn-aspect-ratio: calc(250 / 306 * 100%)&quot;&gt;&lt;/div&gt;
            &lt;div class=&quot;ratio ratio-16x9 d-lg-none&quot;&gt;&lt;/div&gt;
            &lt;img src=&quot;assets/img/listings/events/17.jpg&quot; class=&quot;hover-effect-target position-absolute top-0 start-0 w-100 h-100 object-fit-cover&quot; style=&quot;object-position: center top&quot; alt=&quot;Image&quot;&gt;
          &lt;/div&gt;
        &lt;/div&gt;
        &lt;div class=&quot;col-sm-7 col-md-6 d-flex flex-column order-md-1&quot;&gt;

          &lt;!-- Card body: Title + Metadata --&gt;
          &lt;div class=&quot;card-body pe-sm-0&quot;&gt;
            &lt;ul class=&quot;list-unstyled flex-row flex-wrap align-items-center gap-2 fs-sm mb-2&quot;&gt;
              &lt;li class=&quot;d-flex align-items-center&quot;&gt;
                &lt;i class=&quot;fi-calendar me-1&quot;&gt;&lt;/i&gt;
                Oct 15
              &lt;/li&gt;
              &lt;li&gt;18:00&lt;/li&gt;
              &lt;li class=&quot;d-flex mx-n1&quot;&gt;
                &lt;i class=&quot;fi-bullet fs-base&quot;&gt;&lt;/i&gt;
              &lt;/li&gt;
              &lt;li&gt;Theater &amp; Cinema&lt;/li&gt;
            &lt;/ul&gt;
            &lt;h3 class=&quot;h5 pt-1 mb-2&quot;&gt;
              &lt;a class=&quot;hover-effect-underline stretched-link&quot; href=&quot;#&quot;&gt;Parallax Show Ballet&lt;/a&gt;
            &lt;/h3&gt;
            &lt;div class=&quot;d-flex align-items-center fs-sm&quot;&gt;
              &lt;i class=&quot;fi-map-pin me-1&quot;&gt;&lt;/i&gt;
              Chicago
            &lt;/div&gt;
          &lt;/div&gt;

          &lt;!-- Card footer: Price + Booking button --&gt;
          &lt;div class=&quot;card-footer d-flex align-items-center justify-content-between gap-3 bg-transparent border-0 pt-0 pt-sm-4 p-4 pe-sm-0&quot;&gt;
            &lt;div class=&quot;h5 text-info mb-0&quot;&gt;$56.00&lt;/div&gt;
            &lt;button type=&quot;button&quot; class=&quot;btn btn-outline-dark position-relative z-2&quot;&gt;Book now&lt;/button&gt;
          &lt;/div&gt;
        &lt;/div&gt;
      &lt;/div&gt;
    &lt;/article&gt;</code></pre>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>


        <!-- Event listing card: Variant 3 -->
        <section id="event-3" class="docs-section">
          <h4>Event listing card: Variant 3</h4>
          <div class="card border-0 shadow">
            <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
            <div class="card-body position-relative z-2">
              <ul class="nav nav-tabs m-n2" role="tablist" style="max-width: 240px">
                <li class="nav-item" role="presentation">
                  <button type="button" class="nav-link active" data-bs-toggle="tab" data-bs-target="#preview-15" role="tab" aria-controls="preview-15" aria-selected="true">
                    <i class="fi-eye opacity-75 ms-n1 me-2"></i>
                    Preview
                  </button>
                </li>
                <li class="nav-item" role="presentation">
                  <button type="button" class="nav-link" data-bs-toggle="tab" data-bs-target="#html-15" role="tab" aria-controls="html-15" aria-selected="false">
                    <i class="fi-code opacity-75 ms-n1 me-2"></i>
                    HTML
                  </button>
                </li>
              </ul>
              <div class="tab-content">
                <div id="preview-15" class="tab-pane pt-4 pb-2 mt-3 fade show active" role="tabpanel">
                  <article class="card hover-effect-scale hover-effect-opacity bg-transparent border-0" style="max-width: 306px">
                    <div class="position-absolute top-0 end-0 z-2 hover-effect-target opacity-0 pt-1 pt-sm-0 pe-1 pe-sm-0 mt-2 mt-sm-3 me-2 me-sm-3">
                      <button type="button" class="btn btn-sm btn-icon btn-light bg-light border-0 rounded-circle animate-pulse" aria-label="Add to wishlist">
                        <i class="fi-heart animate-target fs-sm"></i>
                      </button>
                    </div>
                    <div class="bg-body-tertiary rounded overflow-hidden">
                      <div class="ratio hover-effect-target" style="--fn-aspect-ratio: calc(320 / 306 * 100%)">
                        <img src="{{ asset('assets/img/listings/events/20.jpg') }}" alt="Image">
                      </div>
                    </div>
                    <div class="card-body pt-3 pt-sm-4 p-0">
                      <ul class="list-unstyled flex-row flex-wrap align-items-center gap-2 fs-sm pt-1 pt-sm-0 mb-2">
                        <li class="d-flex align-items-center me-2">
                          <i class="fi-calendar me-1"></i>
                          May 17
                          <span class="ms-1">12:00</span>
                        </li>
                        <li class="d-flex align-items-center me-2">
                          <i class="fi-map-pin me-1"></i>
                          Chicago
                        </li>
                      </ul>
                      <h3 class="h5 mb-0">
                        <a class="hover-effect-underline stretched-link" href="#!">Regional Motocross Championship</a>
                      </h3>
                    </div>
                  </article>
                </div>
                <div id="html-15" class="tab-pane pt-4 fade" role="tabpanel">
                  <div class="position-relative" data-bs-theme="dark">
                    <button type="button" class="btn btn-sm btn-outline-secondary bg-dark position-absolute top-0 end-0 mt-2 px-2 z-3" data-copy-code="#event-3-code">
                      <i class="fi-copy fs-sm me-1"></i>
                      Copy
                    </button>
                    <pre id="event-3-code" class="code-highlight mx-n2 mb-n2"><code class="language-html">&lt;!-- Event listing card: Variant 3 --&gt;
    &lt;article class=&quot;card hover-effect-scale hover-effect-opacity bg-transparent border-0&quot;&gt;

      &lt;!-- Wishlist button --&gt;
      &lt;div class=&quot;position-absolute top-0 end-0 z-2 hover-effect-target opacity-0 pt-1 pt-sm-0 pe-1 pe-sm-0 mt-2 mt-sm-3 me-2 me-sm-3&quot;&gt;
        &lt;button type=&quot;button&quot; class=&quot;btn btn-sm btn-icon btn-light bg-light border-0 rounded-circle animate-pulse&quot; aria-label=&quot;Add to wishlist&quot;&gt;
          &lt;i class=&quot;fi-heart animate-target fs-sm&quot;&gt;&lt;/i&gt;
        &lt;/button&gt;
      &lt;/div&gt;

      &lt;!-- Image --&gt;
      &lt;div class=&quot;bg-body-tertiary rounded overflow-hidden&quot;&gt;
        &lt;!-- Wrap the image with a &quot;ratio&quot; element to avoid content shifts on page load. Formula: imageHeight / imageWidth * 100% --&gt;
        &lt;div class=&quot;ratio hover-effect-target&quot; style=&quot;--fn-aspect-ratio: calc(320 / 306 * 100%)&quot;&gt;
          &lt;img src=&quot;assets/img/listings/events/20.jpg&quot; alt=&quot;Image&quot;&gt;
        &lt;/div&gt;
      &lt;/div&gt;

      &lt;!-- Card body: Metadata + Title --&gt;
      &lt;div class=&quot;card-body pt-3 pt-sm-4 p-0&quot;&gt;
        &lt;ul class=&quot;list-unstyled flex-row flex-wrap align-items-center gap-2 fs-sm pt-1 pt-sm-0 mb-2&quot;&gt;
          &lt;li class=&quot;d-flex align-items-center me-2&quot;&gt;
            &lt;i class=&quot;fi-calendar me-1&quot;&gt;&lt;/i&gt;
            May 17
            &lt;span class=&quot;ms-1&quot;&gt;12:00&lt;/span&gt;
          &lt;/li&gt;
          &lt;li class=&quot;d-flex align-items-center me-2&quot;&gt;
            &lt;i class=&quot;fi-map-pin me-1&quot;&gt;&lt;/i&gt;
            Chicago
          &lt;/li&gt;
        &lt;/ul&gt;
        &lt;h3 class=&quot;h5 mb-0&quot;&gt;
          &lt;a class=&quot;hover-effect-underline stretched-link&quot; href=&quot;#&quot;&gt;Regional Motocross Championship&lt;/a&gt;
        &lt;/h3&gt;
      &lt;/div&gt;
    &lt;/article&gt;</code></pre>
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
  <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
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