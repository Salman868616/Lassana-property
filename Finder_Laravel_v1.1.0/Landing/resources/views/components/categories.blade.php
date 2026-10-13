@extends('layouts.app')

@section('title', 'Finder Docs | Categories')

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
                  <div class="dropdown">
                    <span class="list-group-item list-group-item-action justify-content-between dropdown-toggle pe-3 pe-none active">
                      Categories
                      <span class="visually-hidden">listing directory filter links navigation cards</span>
                    </span>
                    <ul id="anchorNav" class="nav nav-underline flex-column border-start ms-2 my-2" style="gap: .25rem;">
                      <li class="nav-item"><a class="nav-link fw-normal" href="#real-estate-category">Real Estate category card</a></li>
                      <li class="nav-item"><a class="nav-link fw-normal" href="#real-estate-city">Real Estate city card</a></li>
                      <li class="nav-item"><a class="nav-link fw-normal" href="#cars-category-1">Cars category card: Variant 1</a></li>
                      <li class="nav-item"><a class="nav-link fw-normal" href="#cars-category-2">Cars category card: Variant 2</a></li>
                      <li class="nav-item"><a class="nav-link fw-normal" href="#city-guide-category">City Guide category</a></li>
                      <li class="nav-item"><a class="nav-link fw-normal" href="#contractors-category">Contractors category</a></li>
                      <li class="nav-item"><a class="nav-link fw-normal" href="#doctors-directory">Doctors directory card</a></li>
                      <li class="nav-item"><a class="nav-link fw-normal" href="#events-category">Events category</a></li>
                    </ul>
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
          <h1 class="pt-1">Categories</h1>
          <p class="text-body-secondary mb-4">Provide a navigational structure with links to different listing categories for easy access and exploration.</p>
        </section>


        <!-- Real Estate category card -->
        <section id="real-estate-category" class="docs-section pb-sm-2 mb-5">
          <h4>Real Estate category card</h4>
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
                  <article class="card hover-effect-scale bg-primary-subtle border-0 overflow-hidden text-center h-100" style="max-width: 416px">
                    <div class="card-body pt-sm-5 pb-3">
                      <svg class="text-dark-emphasis my-3 mt-sm-0" xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor">
                        <path d="M43.777.231H3.73C1.673.231 0 1.905 0 3.961v22.548c0 2.057 1.673 3.73 3.73 3.73h9.225a.941.941 0 1 0 0-1.882H3.73a1.85 1.85 0 0 1-1.847-1.847V3.961A1.85 1.85 0 0 1 3.73 2.114h40.048a1.85 1.85 0 0 1 1.847 1.847v22.548a1.85 1.85 0 0 1-1.847 1.847h-2.826a.941.941 0 1 0 0 1.882h2.826c2.057 0 3.73-1.673 3.73-3.73V3.961c0-2.056-1.673-3.73-3.73-3.73zm4.22 34.579a1.81 1.81 0 0 0-1.185-1.647h0l-15.567-5.775a2.81 2.81 0 0 0-3.653 3.653l5.761 15.541a1.81 1.81 0 0 0 1.655 1.186l.052.001a1.81 1.81 0 0 0 1.666-1.093l1.593-3.658 3.455 3.456c.983.984 2.584.984 3.567.001l1.333-1.332c.476-.476.739-1.11.739-1.784a2.51 2.51 0 0 0-.738-1.784l-3.411-3.412 3.658-1.633a1.81 1.81 0 0 0 1.077-1.72zm-6.751 2.191a.94.94 0 0 0-.282 1.525l4.378 4.379a.64.64 0 0 1 0 .905l-1.333 1.332c-.121.121-.282.187-.452.187h0a.64.64 0 0 1-.453-.187l-4.431-4.433a.94.94 0 0 0-1.529.29l-2.082 4.781-5.706-15.394c-.198-.535.119-.91.221-1.012.079-.079.319-.285.67-.285a.98.98 0 0 1 .342.064l15.422 5.721-4.765 2.127zm4.911-2.073l.327-.883-.327.883zm-19.352-9.664l-2.659-2.66a.941.941 0 1 0-1.331 1.331l2.66 2.66a.94.94 0 1 0 1.331-1.331zm-2.606 3.1h-3.761a.941.941 0 1 0 0 1.882h3.761a.941.941 0 1 0 0-1.882zm5.398-9.161a.94.94 0 0 0-.941.941v3.761a.941.941 0 1 0 1.882 0v-3.761a.94.94 0 0 0-.941-.941zm7.9 1.748a.94.94 0 0 0-1.331 0l-2.66 2.66a.94.94 0 1 0 1.332 1.331l2.66-2.66a.94.94 0 0 0 0-1.331zM25.716 32.736a.94.94 0 0 0-1.331 0l-2.66 2.66a.94.94 0 1 0 1.331 1.331l2.66-2.66a.94.94 0 0 0 0-1.331zm-9.026-2.495c.521 0 .944-.423.944-.944s-.423-.944-.944-.944-.944.423-.944.944.423.944.944.944zm-.166-16.121c.825-.358 1.323-1.198 1.323-2.475 0-2.21-1.51-2.739-3.128-2.739h-3.004c-.451 0-.887.218-.887.638V19.66c0 .327.342.623.887.623h3.299c1.759 0 3.112-.872 3.112-3.299v-.327c0-1.556-.654-2.163-1.603-2.537zm-3.688-3.439h1.727c.794 0 1.261.498 1.261 1.307 0 .794-.405 1.338-1.245 1.338h-1.743v-2.645zm3.268 6.132c0 1.183-.56 1.696-1.51 1.696h-1.758v-3.595h1.758c.949 0 1.51.436 1.51 1.65v.249zm9.882-7.906c-.514 0-1.012.187-1.012.623v7.283c0 1.214-.638 1.79-1.712 1.79s-1.712-.576-1.712-1.79V9.529c0-.436-.514-.623-1.012-.623-.514 0-1.012.187-1.012.623v7.283c0 2.599 1.634 3.564 3.735 3.564 2.085 0 3.735-.965 3.735-3.564V9.529c0-.436-.514-.623-1.011-.623zm9.352 0c-.327 0-.467.14-.607.405L32.35 13.81l-2.366-4.498c-.14-.28-.296-.405-.623-.405-.545 0-1.338.342-1.338.84a.61.61 0 0 0 .047.202l3.221 5.571a.39.39 0 0 1 .047.202v3.922c0 .42.514.638 1.012.638.514 0 1.012-.218 1.012-.638v-3.922a.39.39 0 0 1 .062-.202l3.206-5.571c.047-.078.047-.156.047-.202 0-.498-.794-.84-1.338-.84z" />
                      </svg>
                      <h3 class="h5 mb-0">Buy a property</h3>
                    </div>
                    <div class="card-footer d-flex flex-column align-items-center gap-4 gap-sm-5 bg-transparent border-0 p-0">
                      <a class="btn btn-dark stretched-link mx-4" href="#!">Find a home</a>
                      <div class="ratio hover-effect-target mt-3 mt-sm-0" style="--fn-aspect-ratio: calc(216 / 416 * 100%)">
                        <img src="{{ asset('assets/img/home/real-estate/categories/01.png') }}" alt="Image">
                      </div>
                    </div>
                  </article>
                </div>
                <div id="html-1" class="tab-pane pt-4 fade" role="tabpanel">
                  <div class="position-relative" data-bs-theme="dark">
                    <button type="button" class="btn btn-sm btn-outline-secondary bg-dark position-absolute top-0 end-0 mt-2 px-2 z-3" data-copy-code="#real-estate-category-code">
                      <i class="fi-copy fs-sm me-1"></i>
                      Copy
                    </button>
                    <pre id="real-estate-category-code" class="code-highlight mx-n2 mb-n2"><code class="language-html">&lt;!-- Real Estate category card --&gt;
  &lt;article class=&quot;card hover-effect-scale bg-primary-subtle border-0 overflow-hidden text-center&quot;&gt;

    &lt;!-- Card body: Icon + Title --&gt;
    &lt;div class=&quot;card-body pt-sm-5 pb-3&quot;&gt;
      &lt;svg class=&quot;text-dark-emphasis my-3 mt-sm-0&quot; xmlns=&quot;http://www.w3.org/2000/svg&quot; width=&quot;48&quot; height=&quot;48&quot; fill=&quot;currentColor&quot;&gt;&lt;path d=&quot;M43.777.231H3.73C1.673.231 0 1.905 0 3.961v22.548c0 2.057 1.673 3.73 3.73 3.73h9.225a.941.941 0 1 0 0-1.882H3.73a1.85 1.85 0 0 1-1.847-1.847V3.961A1.85 1.85 0 0 1 3.73 2.114h40.048a1.85 1.85 0 0 1 1.847 1.847v22.548a1.85 1.85 0 0 1-1.847 1.847h-2.826a.941.941 0 1 0 0 1.882h2.826c2.057 0 3.73-1.673 3.73-3.73V3.961c0-2.056-1.673-3.73-3.73-3.73zm4.22 34.579a1.81 1.81 0 0 0-1.185-1.647h0l-15.567-5.775a2.81 2.81 0 0 0-3.653 3.653l5.761 15.541a1.81 1.81 0 0 0 1.655 1.186l.052.001a1.81 1.81 0 0 0 1.666-1.093l1.593-3.658 3.455 3.456c.983.984 2.584.984 3.567.001l1.333-1.332c.476-.476.739-1.11.739-1.784a2.51 2.51 0 0 0-.738-1.784l-3.411-3.412 3.658-1.633a1.81 1.81 0 0 0 1.077-1.72zm-6.751 2.191a.94.94 0 0 0-.282 1.525l4.378 4.379a.64.64 0 0 1 0 .905l-1.333 1.332c-.121.121-.282.187-.452.187h0a.64.64 0 0 1-.453-.187l-4.431-4.433a.94.94 0 0 0-1.529.29l-2.082 4.781-5.706-15.394c-.198-.535.119-.91.221-1.012.079-.079.319-.285.67-.285a.98.98 0 0 1 .342.064l15.422 5.721-4.765 2.127zm4.911-2.073l.327-.883-.327.883zm-19.352-9.664l-2.659-2.66a.941.941 0 1 0-1.331 1.331l2.66 2.66a.94.94 0 1 0 1.331-1.331zm-2.606 3.1h-3.761a.941.941 0 1 0 0 1.882h3.761a.941.941 0 1 0 0-1.882zm5.398-9.161a.94.94 0 0 0-.941.941v3.761a.941.941 0 1 0 1.882 0v-3.761a.94.94 0 0 0-.941-.941zm7.9 1.748a.94.94 0 0 0-1.331 0l-2.66 2.66a.94.94 0 1 0 1.332 1.331l2.66-2.66a.94.94 0 0 0 0-1.331zM25.716 32.736a.94.94 0 0 0-1.331 0l-2.66 2.66a.94.94 0 1 0 1.331 1.331l2.66-2.66a.94.94 0 0 0 0-1.331zm-9.026-2.495c.521 0 .944-.423.944-.944s-.423-.944-.944-.944-.944.423-.944.944.423.944.944.944zm-.166-16.121c.825-.358 1.323-1.198 1.323-2.475 0-2.21-1.51-2.739-3.128-2.739h-3.004c-.451 0-.887.218-.887.638V19.66c0 .327.342.623.887.623h3.299c1.759 0 3.112-.872 3.112-3.299v-.327c0-1.556-.654-2.163-1.603-2.537zm-3.688-3.439h1.727c.794 0 1.261.498 1.261 1.307 0 .794-.405 1.338-1.245 1.338h-1.743v-2.645zm3.268 6.132c0 1.183-.56 1.696-1.51 1.696h-1.758v-3.595h1.758c.949 0 1.51.436 1.51 1.65v.249zm9.882-7.906c-.514 0-1.012.187-1.012.623v7.283c0 1.214-.638 1.79-1.712 1.79s-1.712-.576-1.712-1.79V9.529c0-.436-.514-.623-1.012-.623-.514 0-1.012.187-1.012.623v7.283c0 2.599 1.634 3.564 3.735 3.564 2.085 0 3.735-.965 3.735-3.564V9.529c0-.436-.514-.623-1.011-.623zm9.352 0c-.327 0-.467.14-.607.405L32.35 13.81l-2.366-4.498c-.14-.28-.296-.405-.623-.405-.545 0-1.338.342-1.338.84a.61.61 0 0 0 .047.202l3.221 5.571a.39.39 0 0 1 .047.202v3.922c0 .42.514.638 1.012.638.514 0 1.012-.218 1.012-.638v-3.922a.39.39 0 0 1 .062-.202l3.206-5.571c.047-.078.047-.156.047-.202 0-.498-.794-.84-1.338-.84z&quot;/&gt;&lt;/svg&gt;
      &lt;h3 class=&quot;h5 mb-0&quot;&gt;Buy a property&lt;/h3&gt;
    &lt;/div&gt;

    &lt;!-- Card footer: Button + Image --&gt;
    &lt;div class=&quot;card-footer d-flex flex-column align-items-center gap-4 gap-sm-5 bg-transparent border-0 p-0&quot;&gt;
      &lt;a class=&quot;btn btn-dark stretched-link mx-4&quot; href=&quot;#&quot;&gt;Find a home&lt;/a&gt;
      &lt;!-- Wrap the image with a "ratio" element to avoid content shifts on page load. Formula: imageHeight / imageWidth * 100% --&gt;
      &lt;div class=&quot;ratio hover-effect-target mt-3 mt-sm-0&quot; style=&quot;--fn-aspect-ratio: calc(216 / 416 * 100%)&quot;&gt;
        &lt;img src=&quot;assets/img/home/real-estate/categories/01.png&quot; alt=&quot;Image&quot;&gt;
      &lt;/div&gt;
    &lt;/div&gt;
  &lt;/article&gt;</code></pre>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>


        <!-- Real Estate city card -->
        <section id="real-estate-city" class="docs-section pb-sm-2 mb-5">
          <h4>Real Estate city card</h4>
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
                  <article class="card hover-effect-scale bg-transparent" style="max-width: 306px">
                    <div class="card-img-top bg-body-tertiary overflow-hidden">
                      <div class="ratio hover-effect-target" style="--fn-aspect-ratio: calc(230 / 306 * 100%)">
                        <img src="{{ asset('assets/img/home/real-estate/cities/01.jpg') }}" alt="Image">
                      </div>
                    </div>
                    <div class="card-body text-center p-3">
                      <h3 class="h5 mb-0">
                        <a class="hover-effect-underline stretched-link" href="#!">New York</a>
                      </h3>
                    </div>
                    <div class="card-footer d-flex bg-transparent border-0 pt-0 pb-3 px-3 mt-n1">
                      <div class="w-50 text-center pe-1">
                        <i class="fi-zap mb-1"></i>
                        <div class="fs-sm">for sale <span class="fw-semibold">1739</span></div>
                      </div>
                      <hr class="vr my-0 mx-2">
                      <div class="w-50 text-center ps-1">
                        <i class="fi-tag mb-1"></i>
                        <div class="fs-sm">for rent <span class="fw-semibold">3845</span></div>
                      </div>
                    </div>
                  </article>
                </div>
                <div id="html-2" class="tab-pane pt-4 fade" role="tabpanel">
                  <div class="position-relative" data-bs-theme="dark">
                    <button type="button" class="btn btn-sm btn-outline-secondary bg-dark position-absolute top-0 end-0 mt-2 px-2 z-3" data-copy-code="#real-estate-city-code">
                      <i class="fi-copy fs-sm me-1"></i>
                      Copy
                    </button>
                    <pre id="real-estate-city-code" class="code-highlight mx-n2 mb-n2"><code class="language-html">&lt;!-- Real Estate city card --&gt;
  &lt;article class=&quot;card hover-effect-scale bg-transparent&quot;&gt;

    &lt;!-- Image --&gt;
    &lt;div class=&quot;card-img-top bg-body-tertiary overflow-hidden&quot;&gt;
      &lt;!-- Wrap the image with a "ratio" element to avoid content shifts on page load. Formula: imageHeight / imageWidth * 100% --&gt;
      &lt;div class=&quot;ratio hover-effect-target&quot; style=&quot;--fn-aspect-ratio: calc(230 / 306 * 100%)&quot;&gt;
        &lt;img src=&quot;assets/img/home/real-estate/cities/01.jpg&quot; alt=&quot;Image&quot;&gt;
      &lt;/div&gt;
    &lt;/div&gt;

    &lt;!-- Card body: Title --&gt;
    &lt;div class=&quot;card-body text-center p-3&quot;&gt;
      &lt;h3 class=&quot;h5 mb-0&quot;&gt;
        &lt;a class=&quot;hover-effect-underline stretched-link&quot; href=&quot;#&quot;&gt;New York&lt;/a&gt;
      &lt;/h3&gt;
    &lt;/div&gt;

    &lt;!-- Card footer: Stats --&gt;
    &lt;div class=&quot;card-footer d-flex bg-transparent border-0 pt-0 pb-3 px-3 mt-n1&quot;&gt;
      &lt;div class=&quot;w-50 text-center pe-1&quot;&gt;
        &lt;i class=&quot;fi-zap mb-1&quot;&gt;&lt;/i&gt;
        &lt;div class=&quot;fs-sm&quot;&gt;for sale &lt;span class=&quot;fw-semibold&quot;&gt;1739&lt;/span&gt;&lt;/div&gt;
      &lt;/div&gt;
      &lt;hr class=&quot;vr my-0 mx-2&quot;&gt;
      &lt;div class=&quot;w-50 text-center ps-1&quot;&gt;
        &lt;i class=&quot;fi-tag mb-1&quot;&gt;&lt;/i&gt;
        &lt;div class=&quot;fs-sm&quot;&gt;for rent &lt;span class=&quot;fw-semibold&quot;&gt;3845&lt;/span&gt;&lt;/div&gt;
      &lt;/div&gt;
    &lt;/div&gt;
  &lt;/article&gt;</code></pre>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>


        <!-- Cars category card: Variant 1 -->
        <section id="cars-category-1" class="docs-section pb-sm-2 mb-5">
          <h4>Cars category card: Variant 1</h4>
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
                  <article class="card hover-effect-scale bg-body-tertiary border-0" style="max-width: 196px">
                    <div class="card-body text-center px-3">
                      <div class="ratio hover-effect-target" style="--fn-aspect-ratio: calc(80 / 164 * 100%)">
                        <img src="{{ asset('assets/img/home/cars/body-type/mpv.svg') }}" alt="Image">
                      </div>
                      <h3 class="h6 pt-3 mb-1">
                        <a class="hover-effect-underline stretched-link" href="#!">Family MPV</a>
                      </h3>
                      <p class="fs-sm text-body-secondary mb-2">582 offers</p>
                    </div>
                  </article>
                </div>
                <div id="html-3" class="tab-pane pt-4 fade" role="tabpanel">
                  <div class="position-relative" data-bs-theme="dark">
                    <button type="button" class="btn btn-sm btn-outline-secondary bg-dark position-absolute top-0 end-0 mt-2 px-2 z-3" data-copy-code="#cars-category-1-code">
                      <i class="fi-copy fs-sm me-1"></i>
                      Copy
                    </button>
                    <pre id="cars-category-1-code" class="code-highlight mx-n2 mb-n2"><code class="language-html">&lt;!-- Cars category card: Variant 1 --&gt;
  &lt;article class=&quot;card hover-effect-scale bg-body-tertiary border-0&quot;&gt;
    &lt;div class=&quot;card-body text-center px-3&quot;&gt;
      &lt;!-- Wrap the image with a "ratio" element to avoid content shifts on page load. Formula: imageHeight / imageWidth * 100% --&gt;
      &lt;div class=&quot;ratio hover-effect-target&quot; style=&quot;--fn-aspect-ratio: calc(80 / 164 * 100%)&quot;&gt;
        &lt;img src=&quot;assets/img/home/cars/body-type/mpv.svg&quot; alt=&quot;Image&quot;&gt;
      &lt;/div&gt;
      &lt;h3 class=&quot;h6 pt-3 mb-1&quot;&gt;
        &lt;a class=&quot;hover-effect-underline stretched-link&quot; href=&quot;#&quot;&gt;Family MPV&lt;/a&gt;
      &lt;/h3&gt;
      &lt;p class=&quot;fs-sm text-body-secondary mb-2&quot;&gt;582 offers&lt;/p&gt;
    &lt;/div&gt;
  &lt;/article&gt;</code></pre>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>


        <!-- Cars category card: Variant 2 -->
        <section id="cars-category-2" class="docs-section pb-sm-2 mb-5">
          <h4>Cars category card: Variant 2</h4>
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
                  <article class="hover-effect-scale position-relative text-center" style="max-width: 200px">
                    <div class="bg-body-tertiary rounded-circle overflow-hidden mx-auto" style="width: 132px">
                      <div class="ratio ratio-1x1 hover-effect-target">
                        <img src="{{ asset('assets/img/home/cars/categories/04.jpg') }}" alt="Image">
                      </div>
                    </div>
                    <h3 class="h6 pt-3 mb-0">
                      <a class="hover-effect-underline stretched-link" href="#!">Off-road cars</a>
                    </h3>
                  </article>
                </div>
                <div id="html-4" class="tab-pane pt-4 fade" role="tabpanel">
                  <div class="position-relative" data-bs-theme="dark">
                    <button type="button" class="btn btn-sm btn-outline-secondary bg-dark position-absolute top-0 end-0 mt-2 px-2 z-3" data-copy-code="#cars-category-2-code">
                      <i class="fi-copy fs-sm me-1"></i>
                      Copy
                    </button>
                    <pre id="cars-category-2-code" class="code-highlight mx-n2 mb-n2"><code class="language-html">&lt;!-- Cars category card: Variant 2 --&gt;
  &lt;article class=&quot;hover-effect-scale position-relative text-center&quot; style=&quot;max-width: 200px&quot;&gt;
    &lt;div class=&quot;bg-body-tertiary rounded-circle overflow-hidden mx-auto&quot; style=&quot;width: 132px&quot;&gt;
      &lt;!-- Wrap the image with a "ratio" element to avoid content shifts on page load. Formula: imageHeight / imageWidth * 100% --&gt;
      &lt;div class=&quot;ratio ratio-1x1 hover-effect-target&quot;&gt;
        &lt;img src=&quot;assets/img/home/cars/categories/04.jpg&quot; alt=&quot;Image&quot;&gt;
      &lt;/div&gt;
    &lt;/div&gt;
    &lt;h3 class=&quot;h6 pt-3 mb-0&quot;&gt;
      &lt;a class=&quot;hover-effect-underline stretched-link&quot; href=&quot;#&quot;&gt;Off-road cars&lt;/a&gt;
    &lt;/h3&gt;
  &lt;/article&gt;</code></pre>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>


        <!-- City Guide category -->
        <section id="city-guide-category" class="docs-section pb-sm-2 mb-5">
          <h4>City Guide category</h4>
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
                  <article class="hover-effect-scale position-relative text-center" style="max-width: 164px">
                    <div class="position-relative d-flex align-items-end justify-content-center text-primary mx-auto" style="width: 88px; height: 88px">
                      <svg class="position-relative z-1" style="backface-visibility: hidden" xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor">
                        <path d="M47.725 18.275L46.5 17.049V7.164c0-3.95-3.213-7.163-7.163-7.163-1.625 0-3.125.545-4.328 1.46-5.303-2.604-11.905-1.704-16.31 2.701-4.717 4.717-5.414 11.954-2.093 17.417l-5.371 5.371H8.966a.94.94 0 0 0-.937.938v1.72h-1.72a.94.94 0 0 0-.937.938v1.72h-1.72a.94.94 0 0 0-.937.938v1.72H.994a.94.94 0 0 0-.663.275l-.057.057c-.176.176-.275.414-.275.663v6.083a.94.94 0 0 0 .937.938h6.196a.94.94 0 0 0 .663-.275l10.341-10.341a.94.94 0 0 0 0-1.326.94.94 0 0 0-1.326 0L6.745 41.062h-4.87v-4.265h1.777a.94.94 0 0 0 .937-.937v-1.72h1.72a.94.94 0 0 0 .938-.937v-1.72h1.72a.94.94 0 0 0 .938-.937v-1.72h1.72a.94.94 0 0 0 .663-.275l5.415-5.415a14.38 14.38 0 0 0 .998 1.108c2.537 2.537 5.864 3.994 9.426 4.145v15.674c0 2.171 1.766 3.937 3.937 3.937h12c2.171 0 3.937-1.766 3.937-3.937V18.937a.94.94 0 0 0-.275-.663zM39.337 1.876c2.916 0 5.288 2.372 5.288 5.288v8.011l-1.686-1.686c-.008-.008-.017-.015-.026-.023-.175-3.387-1.552-6.723-4.133-9.304-.617-.616-1.276-1.164-1.969-1.643a5.26 5.26 0 0 1 2.526-.643zm-5.288 7.951v-2.07a2.26 2.26 0 0 1 1.34 2.07 2.26 2.26 0 0 1-.666 1.607c-.886.886-2.328.886-3.214 0s-.886-2.328 0-3.214c.198-.198.424-.349.665-.458v2.065a.94.94 0 0 0 .938.938.94.94 0 0 0 .937-.938zM28.74 26.521a12.29 12.29 0 0 1-8.715-3.604c-4.805-4.805-4.805-12.624 0-17.429 2.328-2.328 5.423-3.61 8.715-3.61a12.3 12.3 0 0 1 4.865.995 7.13 7.13 0 0 0-1.292 2.886c-.781.153-1.526.531-2.13 1.135-1.617 1.617-1.617 4.248 0 5.866.809.809 1.871 1.213 2.933 1.213s2.124-.404 2.933-1.213a4.12 4.12 0 0 0 1.215-2.933 4.12 4.12 0 0 0-1.215-2.933A4.12 4.12 0 0 0 34.22 5.83a5.27 5.27 0 0 1 1.075-2.07 12.42 12.42 0 0 1 2.161 1.728 12.24 12.24 0 0 1 3.61 8.715 12.24 12.24 0 0 1-3.61 8.715c-2.403 2.403-5.558 3.604-8.715 3.604zm17.385 17.541c0 1.137-.925 2.063-2.062 2.063h-12c-1.137 0-2.063-.925-2.063-2.062V28.346a14.09 14.09 0 0 0 8.78-4.103c2.307-2.306 3.651-5.216 4.036-8.225l3.308 3.308v24.736zM23.965 9.429a.94.94 0 0 0 0-1.326.94.94 0 0 0-1.326 0 8.64 8.64 0 0 0 0 12.198c.183.183.423.275.663.275s.48-.092.663-.275a.94.94 0 0 0 0-1.326 6.76 6.76 0 0 1 0-9.547zm2.982 11.291a.94.94 0 1 0-.257 1.84.94.94 0 0 0 .901-.68.94.94 0 0 0-.644-1.159zm15.1 20.342h-7.969a.94.94 0 0 0-.937.938.94.94 0 0 0 .938.938h7.969a.94.94 0 0 0 .938-.937.94.94 0 0 0-.937-.937zM20.542 28.591c-.174-.174-.416-.275-.663-.275s-.488.1-.663.275-.275.416-.275.663.1.488.275.663.416.275.663.275.488-.1.663-.275a.94.94 0 0 0 0-1.326z" />
                      </svg>
                      <span class="hover-effect-target position-absolute top-0 start-0 w-100 h-100 bg-primary-subtle rounded-circle" style="--fn-transform-scale: 1.1"></span>
                    </div>
                    <h3 class="h6 fw-normal pt-3 pt-sm-4 mb-0">
                      <a class="hover-effect-underline stretched-link" href="#!">Accommodation</a>
                    </h3>
                  </article>
                </div>
                <div id="html-5" class="tab-pane pt-4 fade" role="tabpanel">
                  <div class="position-relative" data-bs-theme="dark">
                    <button type="button" class="btn btn-sm btn-outline-secondary bg-dark position-absolute top-0 end-0 mt-2 px-2 z-3" data-copy-code="#city-guide-category-code">
                      <i class="fi-copy fs-sm me-1"></i>
                      Copy
                    </button>
                    <pre id="city-guide-category-code" class="code-highlight mx-n2 mb-n2"><code class="language-html">&lt;!-- City Guide category --&gt;
  &lt;article class=&quot;hover-effect-scale position-relative text-center&quot; style=&quot;max-width: 164px&quot;&gt;
    &lt;div class=&quot;position-relative d-flex align-items-end justify-content-center text-primary mx-auto&quot; style=&quot;width: 88px; height: 88px&quot;&gt;
      &lt;svg class=&quot;position-relative z-1&quot; style=&quot;backface-visibility: hidden&quot; xmlns=&quot;http://www.w3.org/2000/svg&quot; width=&quot;48&quot; height=&quot;48&quot; fill=&quot;currentColor&quot;&gt;&lt;path d=&quot;M47.725 18.275L46.5 17.049V7.164c0-3.95-3.213-7.163-7.163-7.163-1.625 0-3.125.545-4.328 1.46-5.303-2.604-11.905-1.704-16.31 2.701-4.717 4.717-5.414 11.954-2.093 17.417l-5.371 5.371H8.966a.94.94 0 0 0-.937.938v1.72h-1.72a.94.94 0 0 0-.937.938v1.72h-1.72a.94.94 0 0 0-.937.938v1.72H.994a.94.94 0 0 0-.663.275l-.057.057c-.176.176-.275.414-.275.663v6.083a.94.94 0 0 0 .937.938h6.196a.94.94 0 0 0 .663-.275l10.341-10.341a.94.94 0 0 0 0-1.326.94.94 0 0 0-1.326 0L6.745 41.062h-4.87v-4.265h1.777a.94.94 0 0 0 .937-.937v-1.72h1.72a.94.94 0 0 0 .938-.937v-1.72h1.72a.94.94 0 0 0 .938-.937v-1.72h1.72a.94.94 0 0 0 .663-.275l5.415-5.415a14.38 14.38 0 0 0 .998 1.108c2.537 2.537 5.864 3.994 9.426 4.145v15.674c0 2.171 1.766 3.937 3.937 3.937h12c2.171 0 3.937-1.766 3.937-3.937V18.937a.94.94 0 0 0-.275-.663zM39.337 1.876c2.916 0 5.288 2.372 5.288 5.288v8.011l-1.686-1.686c-.008-.008-.017-.015-.026-.023-.175-3.387-1.552-6.723-4.133-9.304-.617-.616-1.276-1.164-1.969-1.643a5.26 5.26 0 0 1 2.526-.643zm-5.288 7.951v-2.07a2.26 2.26 0 0 1 1.34 2.07 2.26 2.26 0 0 1-.666 1.607c-.886.886-2.328.886-3.214 0s-.886-2.328 0-3.214c.198-.198.424-.349.665-.458v2.065a.94.94 0 0 0 .938.938.94.94 0 0 0 .937-.938zM28.74 26.521a12.29 12.29 0 0 1-8.715-3.604c-4.805-4.805-4.805-12.624 0-17.429 2.328-2.328 5.423-3.61 8.715-3.61a12.3 12.3 0 0 1 4.865.995 7.13 7.13 0 0 0-1.292 2.886c-.781.153-1.526.531-2.13 1.135-1.617 1.617-1.617 4.248 0 5.866.809.809 1.871 1.213 2.933 1.213s2.124-.404 2.933-1.213a4.12 4.12 0 0 0 1.215-2.933 4.12 4.12 0 0 0-1.215-2.933A4.12 4.12 0 0 0 34.22 5.83a5.27 5.27 0 0 1 1.075-2.07 12.42 12.42 0 0 1 2.161 1.728 12.24 12.24 0 0 1 3.61 8.715 12.24 12.24 0 0 1-3.61 8.715c-2.403 2.403-5.558 3.604-8.715 3.604zm17.385 17.541c0 1.137-.925 2.063-2.062 2.063h-12c-1.137 0-2.063-.925-2.063-2.062V28.346a14.09 14.09 0 0 0 8.78-4.103c2.307-2.306 3.651-5.216 4.036-8.225l3.308 3.308v24.736zM23.965 9.429a.94.94 0 0 0 0-1.326.94.94 0 0 0-1.326 0 8.64 8.64 0 0 0 0 12.198c.183.183.423.275.663.275s.48-.092.663-.275a.94.94 0 0 0 0-1.326 6.76 6.76 0 0 1 0-9.547zm2.982 11.291a.94.94 0 1 0-.257 1.84.94.94 0 0 0 .901-.68.94.94 0 0 0-.644-1.159zm15.1 20.342h-7.969a.94.94 0 0 0-.937.938.94.94 0 0 0 .938.938h7.969a.94.94 0 0 0 .938-.937.94.94 0 0 0-.937-.937zM20.542 28.591c-.174-.174-.416-.275-.663-.275s-.488.1-.663.275-.275.416-.275.663.1.488.275.663.416.275.663.275.488-.1.663-.275a.94.94 0 0 0 0-1.326z&quot;/&gt;&lt;/svg&gt;
      &lt;span class=&quot;hover-effect-target position-absolute top-0 start-0 w-100 h-100 bg-primary-subtle rounded-circle&quot; style=&quot;--fn-transform-scale: 1.1&quot;&gt;&lt;/span&gt;
    &lt;/div&gt;
    &lt;h3 class=&quot;h6 fw-normal pt-3 pt-sm-4 mb-0&quot;&gt;
      &lt;a class=&quot;hover-effect-underline stretched-link&quot; href=&quot;#&quot;&gt;Accommodation&lt;/a&gt;
    &lt;/h3&gt;
  &lt;/article&gt;</code></pre>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>


        <!-- Contractors category -->
        <section id="contractors-category" class="docs-section pb-sm-2 mb-5">
          <h4>Contractors category</h4>
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
                  <article class="hover-effect-scale position-relative d-inline-flex align-items-center gap-3">
                    <div class="position-relative d-flex align-items-center justify-content-center text-secondary-emphasis" style="width: 56px; height: 56px">
                      <svg class="position-relative z-1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor">
                        <path d="M15.853 5.586h-.815v-.75a.5.5 0 0 0-.5-.5h-.75V2.985h.957a.5.5 0 1 0 0-1.001h-.957v-1.4a.5.5 0 0 0-.5-.5h-2.751a.5.5 0 0 0-.5.5v1.401H8.952L7.165.151A.5.5 0 0 0 6.806 0H4.072a.5.5 0 1 0 0 1.001h2.524l1.787 1.833a.5.5 0 0 0 .358.151h1.294v1.351h-.75a.5.5 0 0 0-.5.5v.75h-.636a6.64 6.64 0 0 0-6.628 6.628V23.5a.5.5 0 0 0 .5.5h3.502a.5.5 0 0 0 .5-.5V12.214a2.13 2.13 0 0 1 2.126-2.126h1.136 5.253 1.315a2.13 2.13 0 0 1 2.126 2.126v1.376a.5.5 0 0 0 .5.5h3.502a.5.5 0 0 0 .5-.5v-1.376a6.64 6.64 0 0 0-6.628-6.628zM8.784 9.088h-.636a3.13 3.13 0 0 0-3.127 3.127V23h-2.5V12.214c0-3.103 2.525-5.628 5.628-5.628h.636v2.501h0zm2.251-8.004h1.751v.9h-1.751v-.9zm0 1.901h1.751v1.351h-1.751V2.985zm3.001 6.103H9.785V5.336h.75 2.751.75v3.752zm7.444 4.002h-2.501v-.875a3.13 3.13 0 0 0-3.127-3.127h-.815V6.587h.815c3.103 0 5.628 2.525 5.628 5.628v.875h0zm-1.327 3.835a.5.5 0 0 0-.394.192c-.268.344-1.607 2.107-1.607 3.059 0 1.103.898 2.001 2.001 2.001s2.001-.898 2.001-2.001c0-.953-1.338-2.715-1.607-3.059a.5.5 0 0 0-.394-.192zm0 4.252a1 1 0 0 1-1.001-1c0-.326.468-1.152 1.001-1.91.532.758 1 1.584 1 1.91a1 1 0 0 1-1 1zm-16.38-2.884a.5.5 0 0 0-.5.5v3.055a.5.5 0 1 0 1.001 0v-3.055a.5.5 0 0 0-.5-.5zm0-2.907a.5.5 0 0 0-.5.5v.834a.5.5 0 1 0 1.001 0v-.834a.5.5 0 0 0-.5-.5z" />
                      </svg>
                      <span class="hover-effect-target position-absolute top-0 start-0 w-100 h-100 bg-body-secondary rounded-circle" style="--fn-transform-scale: 1.1"></span>
                    </div>
                    <h3 class="h6 fw-normal mb-0">
                      <a class="hover-effect-underline stretched-link" href="#!">Plumbing</a>
                    </h3>
                  </article>
                </div>
                <div id="html-6" class="tab-pane pt-4 fade" role="tabpanel">
                  <div class="position-relative" data-bs-theme="dark">
                    <button type="button" class="btn btn-sm btn-outline-secondary bg-dark position-absolute top-0 end-0 mt-2 px-2 z-3" data-copy-code="#contractors-category-code">
                      <i class="fi-copy fs-sm me-1"></i>
                      Copy
                    </button>
                    <pre id="contractors-category-code" class="code-highlight mx-n2 mb-n2"><code class="language-html">&lt;!-- Contractors category --&gt;
  &lt;article class=&quot;hover-effect-scale position-relative d-inline-flex align-items-center gap-3&quot;&gt;
    &lt;div class=&quot;position-relative d-flex align-items-center justify-content-center text-secondary-emphasis&quot; style=&quot;width: 56px; height: 56px&quot;&gt;
      &lt;svg class=&quot;position-relative z-1&quot; xmlns=&quot;http://www.w3.org/2000/svg&quot; width=&quot;24&quot; height=&quot;24&quot; fill=&quot;currentColor&quot;&gt;&lt;path d=&quot;M15.853 5.586h-.815v-.75a.5.5 0 0 0-.5-.5h-.75V2.985h.957a.5.5 0 1 0 0-1.001h-.957v-1.4a.5.5 0 0 0-.5-.5h-2.751a.5.5 0 0 0-.5.5v1.401H8.952L7.165.151A.5.5 0 0 0 6.806 0H4.072a.5.5 0 1 0 0 1.001h2.524l1.787 1.833a.5.5 0 0 0 .358.151h1.294v1.351h-.75a.5.5 0 0 0-.5.5v.75h-.636a6.64 6.64 0 0 0-6.628 6.628V23.5a.5.5 0 0 0 .5.5h3.502a.5.5 0 0 0 .5-.5V12.214a2.13 2.13 0 0 1 2.126-2.126h1.136 5.253 1.315a2.13 2.13 0 0 1 2.126 2.126v1.376a.5.5 0 0 0 .5.5h3.502a.5.5 0 0 0 .5-.5v-1.376a6.64 6.64 0 0 0-6.628-6.628zM8.784 9.088h-.636a3.13 3.13 0 0 0-3.127 3.127V23h-2.5V12.214c0-3.103 2.525-5.628 5.628-5.628h.636v2.501h0zm2.251-8.004h1.751v.9h-1.751v-.9zm0 1.901h1.751v1.351h-1.751V2.985zm3.001 6.103H9.785V5.336h.75 2.751.75v3.752zm7.444 4.002h-2.501v-.875a3.13 3.13 0 0 0-3.127-3.127h-.815V6.587h.815c3.103 0 5.628 2.525 5.628 5.628v.875h0zm-1.327 3.835a.5.5 0 0 0-.394.192c-.268.344-1.607 2.107-1.607 3.059 0 1.103.898 2.001 2.001 2.001s2.001-.898 2.001-2.001c0-.953-1.338-2.715-1.607-3.059a.5.5 0 0 0-.394-.192zm0 4.252a1 1 0 0 1-1.001-1c0-.326.468-1.152 1.001-1.91.532.758 1 1.584 1 1.91a1 1 0 0 1-1 1zm-16.38-2.884a.5.5 0 0 0-.5.5v3.055a.5.5 0 1 0 1.001 0v-3.055a.5.5 0 0 0-.5-.5zm0-2.907a.5.5 0 0 0-.5.5v.834a.5.5 0 1 0 1.001 0v-.834a.5.5 0 0 0-.5-.5z&quot;/&gt;&lt;/svg&gt;
      &lt;span class=&quot;hover-effect-target position-absolute top-0 start-0 w-100 h-100 bg-body-secondary rounded-circle&quot; style=&quot;--fn-transform-scale: 1.1&quot;&gt;&lt;/span&gt;
    &lt;/div&gt;
    &lt;h3 class=&quot;h6 fw-normal mb-0&quot;&gt;
      &lt;a class=&quot;hover-effect-underline stretched-link&quot; href=&quot;#&quot;&gt;Plumbing&lt;/a&gt;
    &lt;/h3&gt;
  &lt;/article&gt;</code></pre>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>


        <!-- Doctors directory card -->
        <section id="doctors-directory" class="docs-section pb-sm-2 mb-5">
          <h4>Doctors directory card</h4>
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
                  <article class="card hover-effect-scale bg-transparent" style="max-width: 416px">
                    <div class="card-img-top bg-body-tertiary overflow-hidden">
                      <div class="ratio hover-effect-target" style="--fn-aspect-ratio: calc(230 / 416 * 100%)">
                        <img src="{{ asset('assets/img/home/doctors/consultation/01.jpg') }}" alt="Image">
                      </div>
                    </div>
                    <div class="card-body p-3">
                      <h3 class="h4 pt-1 mb-2">
                        <a class="hover-effect-underline stretched-link" href="#!">Optometrist</a>
                      </h3>
                      <p class="fs-sm mb-0">Providing comprehensive eye exams, vision correction, and eye health services to ensure optimal visual performance and eye care.</p>
                    </div>
                    <div class="card-footer d-flex flex-wrap justify-content-between gap-3 bg-transparent border-0 pt-1 pt-sm-2 pt-xl-3 pb-3 px-3">
                      <div class="d-flex align-items-center gap-2">
                        <div class="h4 mb-0">$50.00</div>
                        <del class="fs-sm text-body-secondary">$75.00</del>
                      </div>
                      <button type="button" class="btn btn-outline-primary position-relative z-2">
                        Book an appointment
                      </button>
                    </div>
                  </article>
                </div>
                <div id="html-7" class="tab-pane pt-4 fade" role="tabpanel">
                  <div class="position-relative" data-bs-theme="dark">
                    <button type="button" class="btn btn-sm btn-outline-secondary bg-dark position-absolute top-0 end-0 mt-2 px-2 z-3" data-copy-code="#doctors-directory-code">
                      <i class="fi-copy fs-sm me-1"></i>
                      Copy
                    </button>
                    <pre id="doctors-directory-code" class="code-highlight mx-n2 mb-n2"><code class="language-html">&lt;!-- Doctors directory card --&gt;
  &lt;article class=&quot;card hover-effect-scale&quot;&gt;

    &lt;!-- Image --&gt;
    &lt;div class=&quot;card-img-top bg-body-tertiary overflow-hidden&quot;&gt;
      &lt;!-- Wrap the image with a &quot;ratio&quot; element to avoid content shifts on page load. Formula: imageHeight / imageWidth * 100% --&gt;
      &lt;div class=&quot;ratio hover-effect-target&quot; style=&quot;--fn-aspect-ratio: calc(230 / 416 * 100%)&quot;&gt;
        &lt;img src=&quot;assets/img/home/doctors/consultation/01.jpg&quot; alt=&quot;Image&quot;&gt;
      &lt;/div&gt;
    &lt;/div&gt;

    &lt;!-- Card body: Title + Description --&gt;
    &lt;div class=&quot;card-body p-3&quot;&gt;
      &lt;h3 class=&quot;h4 pt-1 mb-2&quot;&gt;
        &lt;a class=&quot;hover-effect-underline stretched-link&quot; href=&quot;#&quot;&gt;Optometrist&lt;/a&gt;
      &lt;/h3&gt;
      &lt;p class=&quot;fs-sm mb-0&quot;&gt;Providing comprehensive eye exams, vision correction, and eye health services to ensure optimal visual performance and eye care.&lt;/p&gt;
    &lt;/div&gt;

    &lt;!-- Card footer: Price + Booking button --&gt;
    &lt;div class=&quot;card-footer d-flex flex-wrap justify-content-between gap-3 bg-transparent border-0 pt-1 pt-sm-2 pt-xl-3 pb-3 px-3&quot;&gt;
      &lt;div class=&quot;d-flex align-items-center gap-2&quot;&gt;
        &lt;div class=&quot;h4 mb-0&quot;&gt;$50.00&lt;/div&gt;
        &lt;del class=&quot;fs-sm text-body-secondary&quot;&gt;$75.00&lt;/del&gt;
      &lt;/div&gt;
      &lt;button type=&quot;button&quot; class=&quot;btn btn-outline-primary position-relative z-2&quot;&gt;
        Book an appointment
      &lt;/button&gt;
    &lt;/div&gt;
  &lt;/article&gt;</code></pre>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>


        <!-- Events category -->
        <section id="events-category" class="docs-section">
          <h4>Events category</h4>
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
                  <div class="nav nav-pills">
                    <a class="nav-link flex-column justify-content-center gap-2 rounded-circle p-0" href="#!" style="width: 150px; height: 150px">
                      <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor">
                        <path d="M29.206 4.898c-.137-.317-.505-.463-.822-.326s-.462.505-.325.822c.947 2.189.68 4.708-.65 6.639l-.027-.029-9.515-9.515-.029-.027a6.91 6.91 0 0 1 6.639-.65c.317.137.685-.009.822-.326s-.009-.685-.326-.822a8.16 8.16 0 0 0-8.471 1.246l-.035-.001c-.529 0-1.026.206-1.399.58a1.98 1.98 0 0 0-.526 1.855 8.13 8.13 0 0 0-.9 4.516l-.051.053L3.402 21.086a3.39 3.39 0 0 0 .063 4.436l-.273.273a3.64 3.64 0 0 0 0 5.142C3.901 31.646 4.832 32 5.763 32s1.862-.354 2.571-1.063l2.919-2.919c.602-.602 1.582-.602 2.184 0l.985.985c.244.244.64.244.884 0s.244-.64 0-.884l-.985-.985a2.8 2.8 0 0 0-3.951 0l-2.92 2.919a2.39 2.39 0 0 1-3.374 0 2.39 2.39 0 0 1 0-3.374l.273-.273a3.39 3.39 0 0 0 2.104.853l.152.003a3.39 3.39 0 0 0 2.181-.793L20.958 16.28a.65.65 0 0 0 .054-.051l.732.033a8.12 8.12 0 0 0 3.783-.933c.15.035.303.053.456.053a1.97 1.97 0 0 0 1.399-.579c.394-.394.587-.915.578-1.433 1.978-2.344 2.472-5.643 1.247-8.473zM7.983 25.511a2.14 2.14 0 0 1-2.899-.128l-.297-.297-.298-.298a2.14 2.14 0 0 1-.128-2.899l9.75-11.648 5.521 5.521-11.648 9.75zm12.565-10.602l-5.585-5.586a6.89 6.89 0 0 1 .388-3.751l8.949 8.949a6.9 6.9 0 0 1-3.752.388zm5.949-.989a.73.73 0 0 1-1.031 0l-9.515-9.516a.73.73 0 0 1 0-1.031c.138-.138.321-.214.515-.214a.72.72 0 0 1 .515.214l9.515 9.515a.73.73 0 0 1 0 1.031zm-11.199.652c-.409-.409-.953-.635-1.532-.635a2.15 2.15 0 0 0-1.532.635l-2.021 2.021a2.15 2.15 0 0 0-.635 1.532 2.15 2.15 0 0 0 .635 1.532 2.16 2.16 0 0 0 3.064 0l2.021-2.021a2.17 2.17 0 0 0 0-3.064zm-4.202 4.202a.91.91 0 0 1-.268-.648.91.91 0 0 1 .268-.648l.569-.569 1.296 1.296-.569.569a.92.92 0 0 1-1.296 0zm3.318-2.021l-.569.569-1.296-1.296.569-.569a.91.91 0 0 1 1.296 0 .92.92 0 0 1 0 1.296zM27.043 3.455c.16 0 .32-.061.442-.183l.008-.008c.244-.244.244-.64 0-.884s-.64-.244-.884 0l-.008.008c-.244.244-.244.64 0 .884.122.122.282.183.442.183z" />
                      </svg>
                      Concerts
                    </a>
                  </div>
                </div>
                <div id="html-8" class="tab-pane pt-4 fade" role="tabpanel">
                  <div class="position-relative" data-bs-theme="dark">
                    <button type="button" class="btn btn-sm btn-outline-secondary bg-dark position-absolute top-0 end-0 mt-2 px-2 z-3" data-copy-code="#events-category-code">
                      <i class="fi-copy fs-sm me-1"></i>
                      Copy
                    </button>
                    <pre id="events-category-code" class="code-highlight mx-n2 mb-n2"><code class="language-html">&lt;!-- Events category --&gt;
  &lt;div class=&quot;nav nav-pills&quot;&gt;
    &lt;a class=&quot;nav-link flex-column justify-content-center gap-2 rounded-circle p-0&quot; href=&quot;#&quot; style=&quot;width: 150px; height: 150px&quot;&gt;
      &lt;svg xmlns=&quot;http://www.w3.org/2000/svg&quot; width=&quot;32&quot; height=&quot;32&quot; fill=&quot;currentColor&quot;&gt;&lt;path d=&quot;M29.206 4.898c-.137-.317-.505-.463-.822-.326s-.462.505-.325.822c.947 2.189.68 4.708-.65 6.639l-.027-.029-9.515-9.515-.029-.027a6.91 6.91 0 0 1 6.639-.65c.317.137.685-.009.822-.326s-.009-.685-.326-.822a8.16 8.16 0 0 0-8.471 1.246l-.035-.001c-.529 0-1.026.206-1.399.58a1.98 1.98 0 0 0-.526 1.855 8.13 8.13 0 0 0-.9 4.516l-.051.053L3.402 21.086a3.39 3.39 0 0 0 .063 4.436l-.273.273a3.64 3.64 0 0 0 0 5.142C3.901 31.646 4.832 32 5.763 32s1.862-.354 2.571-1.063l2.919-2.919c.602-.602 1.582-.602 2.184 0l.985.985c.244.244.64.244.884 0s.244-.64 0-.884l-.985-.985a2.8 2.8 0 0 0-3.951 0l-2.92 2.919a2.39 2.39 0 0 1-3.374 0 2.39 2.39 0 0 1 0-3.374l.273-.273a3.39 3.39 0 0 0 2.104.853l.152.003a3.39 3.39 0 0 0 2.181-.793L20.958 16.28a.65.65 0 0 0 .054-.051l.732.033a8.12 8.12 0 0 0 3.783-.933c.15.035.303.053.456.053a1.97 1.97 0 0 0 1.399-.579c.394-.394.587-.915.578-1.433 1.978-2.344 2.472-5.643 1.247-8.473zM7.983 25.511a2.14 2.14 0 0 1-2.899-.128l-.297-.297-.298-.298a2.14 2.14 0 0 1-.128-2.899l9.75-11.648 5.521 5.521-11.648 9.75zm12.565-10.602l-5.585-5.586a6.89 6.89 0 0 1 .388-3.751l8.949 8.949a6.9 6.9 0 0 1-3.752.388zm5.949-.989a.73.73 0 0 1-1.031 0l-9.515-9.516a.73.73 0 0 1 0-1.031c.138-.138.321-.214.515-.214a.72.72 0 0 1 .515.214l9.515 9.515a.73.73 0 0 1 0 1.031zm-11.199.652c-.409-.409-.953-.635-1.532-.635a2.15 2.15 0 0 0-1.532.635l-2.021 2.021a2.15 2.15 0 0 0-.635 1.532 2.15 2.15 0 0 0 .635 1.532 2.16 2.16 0 0 0 3.064 0l2.021-2.021a2.17 2.17 0 0 0 0-3.064zm-4.202 4.202a.91.91 0 0 1-.268-.648.91.91 0 0 1 .268-.648l.569-.569 1.296 1.296-.569.569a.92.92 0 0 1-1.296 0zm3.318-2.021l-.569.569-1.296-1.296.569-.569a.91.91 0 0 1 1.296 0 .92.92 0 0 1 0 1.296zM27.043 3.455c.16 0 .32-.061.442-.183l.008-.008c.244-.244.244-.64 0-.884s-.64-.244-.884 0l-.008.008c-.244.244-.244.64 0 .884.122.122.282.183.442.183z&quot;/&gt;&lt;/svg&gt;
      Concerts
    &lt;/a&gt;
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