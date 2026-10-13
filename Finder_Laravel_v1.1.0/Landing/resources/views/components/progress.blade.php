@extends('layouts.app')

@section('title', 'Finder Docs | Progress')

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
                  <div class="dropdown">
                    <span class="list-group-item list-group-item-action justify-content-between dropdown-toggle pe-3 pe-none active">
                      Progress
                      <span class="visually-hidden">bars status circular</span>
                    </span>
                    <ul id="anchorNav" class="nav nav-underline flex-column border-start ms-2 my-2" style="gap: .25rem;">
                      <li class="nav-item"><a class="nav-link fw-normal" href="#progress-colors-thick">Color variations (thick)</a></li>
                      <li class="nav-item"><a class="nav-link fw-normal" href="#progress-colors-thin">Color variations (thin)</a></li>
                      <li class="nav-item"><a class="nav-link fw-normal" href="#progress-multiple">Multiple bars</a></li>
                      <li class="nav-item"><a class="nav-link fw-normal" href="#progress-striped">Animated striped bars</a></li>
                      <li class="nav-item"><a class="nav-link fw-normal" href="#progress-rating-breakdown">Use case: Rating breakdown</a></li>
                      <li class="nav-item"><a class="nav-link fw-normal" href="#progress-circular-colors">Circular progress: Colors</a></li>
                      <li class="nav-item"><a class="nav-link fw-normal" href="#progress-circular-sizes">Circular progress: Sizes</a></li>
                      <li class="nav-item"><a class="nav-link fw-normal" href="#progress-circular-bar-width">Circular progress: Bar width</a></li>
                    </ul>
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
          <a class="badge d-inline-flex align-items-center text-info bg-info-subtle fw-semibold text-decoration-none py-2 px-3 mb-2 rounded-pill" href="https://getbootstrap.com/docs/5.3/components/progress/" target="_blank" rel="noreferrer">
            Bootstrap docs
            <i class="fi-external-link fs-sm ms-1"></i>
          </a>
          <h1 class="pt-1">Progress</h1>
          <p class="text-body-secondary mb-4">Custom progress bars featuring support for stacked bars, animated backgrounds, and text labels.</p>
        </section>


        <!-- Color variations (thick) -->
        <section id="progress-colors-thick" class="docs-section pb-sm-2 mb-5">
          <h4>Color variations (thick)</h4>
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
                  <div class="progress mb-3" role="progressbar" aria-label="Primary (default) example" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100">
                    <div class="progress-bar fw-medium rounded-pill" style="width: 45%">45%</div>
                  </div>
                  <div class="progress mb-3" role="progressbar" aria-label="Success example" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100">
                    <div class="progress-bar bg-success fw-medium rounded-pill" style="width: 55%">55%</div>
                  </div>
                  <div class="progress mb-3" role="progressbar" aria-label="Danger example" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">
                    <div class="progress-bar bg-danger fw-medium rounded-pill" style="width: 40%">40%</div>
                  </div>
                  <div class="progress mb-3" role="progressbar" aria-label="Warning example" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100">
                    <div class="progress-bar bg-warning fw-medium rounded-pill" style="width: 70%">70%</div>
                  </div>
                  <div class="progress mb-3" role="progressbar" aria-label="Info example" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100">
                    <div class="progress-bar bg-info fw-medium rounded-pill" style="width: 60%">60%</div>
                  </div>
                  <div class="progress" role="progressbar" aria-label="Dark example" aria-valuenow="33" aria-valuemin="0" aria-valuemax="100">
                    <div class="progress-bar bg-dark fw-medium rounded-pill d-none-dark" style="width: 33%">33%</div>
                    <div class="progress-bar bg-light text-dark fw-medium rounded-pill d-none d-block-dark" style="width: 33%">33%</div>
                  </div>
                </div>
                <div id="html-1" class="tab-pane pt-4 fade" role="tabpanel">
                  <div class="position-relative" data-bs-theme="dark">
                    <button type="button" class="btn btn-sm btn-outline-secondary bg-dark position-absolute top-0 end-0 mt-2 px-2 z-3" data-copy-code="#progress-colors-thick-code">
                      <i class="fi-copy fs-sm me-1"></i>
                      Copy
                    </button>
                    <pre id="progress-colors-thick-code" class="code-highlight mx-n2 mb-n2"><code class="language-html">&lt;!-- Primary (default) progress bar --&gt;
    &lt;div class=&quot;progress mb-3&quot; role=&quot;progressbar&quot; aria-label=&quot;Primary (default) example&quot; aria-valuenow=&quot;45&quot; aria-valuemin=&quot;0&quot; aria-valuemax=&quot;100&quot;&gt;
      &lt;div class=&quot;progress-bar fw-medium rounded-pill&quot; style=&quot;width: 45%&quot;&gt;45%&lt;/div&gt;
    &lt;/div&gt;

    &lt;!-- Success progress bar --&gt;
    &lt;div class=&quot;progress mb-3&quot; role=&quot;progressbar&quot; aria-label=&quot;Success example&quot; aria-valuenow=&quot;55&quot; aria-valuemin=&quot;0&quot; aria-valuemax=&quot;100&quot;&gt;
      &lt;div class=&quot;progress-bar bg-success fw-medium rounded-pill&quot; style=&quot;width: 55%&quot;&gt;55%&lt;/div&gt;
    &lt;/div&gt;

    &lt;!-- Danger progress bar --&gt;
    &lt;div class=&quot;progress mb-3&quot; role=&quot;progressbar&quot; aria-label=&quot;Danger example&quot; aria-valuenow=&quot;40&quot; aria-valuemin=&quot;0&quot; aria-valuemax=&quot;100&quot;&gt;
      &lt;div class=&quot;progress-bar bg-danger fw-medium rounded-pill&quot; style=&quot;width: 40%&quot;&gt;40%&lt;/div&gt;
    &lt;/div&gt;

    &lt;!-- Warning progress bar --&gt;
    &lt;div class=&quot;progress mb-3&quot; role=&quot;progressbar&quot; aria-label=&quot;Warning example&quot; aria-valuenow=&quot;70&quot; aria-valuemin=&quot;0&quot; aria-valuemax=&quot;100&quot;&gt;
      &lt;div class=&quot;progress-bar bg-warning fw-medium rounded-pill&quot; style=&quot;width: 70%&quot;&gt;70%&lt;/div&gt;
    &lt;/div&gt;

    &lt;!-- Info progress bar --&gt;
    &lt;div class=&quot;progress mb-3&quot; role=&quot;progressbar&quot; aria-label=&quot;Info example&quot; aria-valuenow=&quot;60&quot; aria-valuemin=&quot;0&quot; aria-valuemax=&quot;100&quot;&gt;
      &lt;div class=&quot;progress-bar bg-info fw-medium rounded-pill&quot; style=&quot;width: 60%&quot;&gt;60%&lt;/div&gt;
    &lt;/div&gt;

    &lt;!-- Dark progress bar that switches to light color in dark mode --&gt;
    &lt;div class=&quot;progress mb-3&quot; role=&quot;progressbar&quot; aria-label=&quot;Dark example&quot; aria-valuenow=&quot;33&quot; aria-valuemin=&quot;0&quot; aria-valuemax=&quot;100&quot;&gt;
      &lt;div class=&quot;progress-bar bg-dark fw-medium rounded-pill d-none-dark&quot; style=&quot;width: 33%&quot;&gt;33%&lt;/div&gt;
      &lt;div class=&quot;progress-bar bg-light text-dark fw-medium rounded-pill d-none d-block-dark&quot; style=&quot;width: 33%&quot;&gt;33%&lt;/div&gt;
    &lt;/div&gt;</code></pre>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>


        <!-- Color variations (thin) -->
        <section id="progress-colors-thin" class="docs-section pb-sm-2 mb-5">
          <h4>Color variations (thin)</h4>
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
                  <div class="fs-sm mb-2">45%</div>
                  <div class="progress mb-3" role="progressbar" aria-label="Primary (default) example" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="height: 4px">
                    <div class="progress-bar rounded-pill" style="width: 45%"></div>
                  </div>
                  <div class="fs-sm mb-2">55%</div>
                  <div class="progress mb-3" role="progressbar" aria-label="Success example" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100" style="height: 4px">
                    <div class="progress-bar bg-success rounded-pill" style="width: 55%"></div>
                  </div>
                  <div class="fs-sm mb-2">40%</div>
                  <div class="progress mb-3" role="progressbar" aria-label="Danger example" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="height: 4px">
                    <div class="progress-bar bg-danger rounded-pill" style="width: 40%"></div>
                  </div>
                  <div class="fs-sm mb-2">70%</div>
                  <div class="progress mb-3" role="progressbar" aria-label="Warning example" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="height: 4px">
                    <div class="progress-bar bg-warning rounded-pill" style="width: 70%"></div>
                  </div>
                  <div class="fs-sm mb-2">60%</div>
                  <div class="progress mb-3" role="progressbar" aria-label="Info example" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="height: 4px">
                    <div class="progress-bar bg-info rounded-pill" style="width: 60%"></div>
                  </div>
                  <div class="fs-sm mb-2">33%</div>
                  <div class="progress" role="progressbar" aria-label="Dark example" aria-valuenow="33" aria-valuemin="0" aria-valuemax="100" style="height: 4px">
                    <div class="progress-bar bg-dark rounded-pill d-none-dark" style="width: 33%"></div>
                    <div class="progress-bar bg-light rounded-pill d-none d-block-dark" style="width: 33%"></div>
                  </div>
                </div>
                <div id="html-2" class="tab-pane pt-4 fade" role="tabpanel">
                  <div class="position-relative" data-bs-theme="dark">
                    <button type="button" class="btn btn-sm btn-outline-secondary bg-dark position-absolute top-0 end-0 mt-2 px-2 z-3" data-copy-code="#progress-colors-thin-code">
                      <i class="fi-copy fs-sm me-1"></i>
                      Copy
                    </button>
                    <pre id="progress-colors-thin-code" class="code-highlight mx-n2 mb-n2"><code class="language-html">&lt;!-- Primary (default) progress bar --&gt;
    &lt;div class=&quot;fs-sm mb-2&quot;&gt;45%&lt;/div&gt;
    &lt;div class=&quot;progress mb-3&quot; role=&quot;progressbar&quot; aria-label=&quot;Primary (default) example&quot; aria-valuenow=&quot;45&quot; aria-valuemin=&quot;0&quot; aria-valuemax=&quot;100&quot; style=&quot;height: 4px&quot;&gt;
      &lt;div class=&quot;progress-bar rounded-pill&quot; style=&quot;width: 45%&quot;&gt;&lt;/div&gt;
    &lt;/div&gt;

    &lt;!-- Success progress bar --&gt;
    &lt;div class=&quot;fs-sm mb-2&quot;&gt;55%&lt;/div&gt;
    &lt;div class=&quot;progress mb-3&quot; role=&quot;progressbar&quot; aria-label=&quot;Success example&quot; aria-valuenow=&quot;55&quot; aria-valuemin=&quot;0&quot; aria-valuemax=&quot;100&quot; style=&quot;height: 4px&quot;&gt;
      &lt;div class=&quot;progress-bar bg-success rounded-pill&quot; style=&quot;width: 55%&quot;&gt;&lt;/div&gt;
    &lt;/div&gt;

    &lt;!-- Danger progress bar --&gt;
    &lt;div class=&quot;fs-sm mb-2&quot;&gt;40%&lt;/div&gt;
    &lt;div class=&quot;progress mb-3&quot; role=&quot;progressbar&quot; aria-label=&quot;Danger example&quot; aria-valuenow=&quot;40&quot; aria-valuemin=&quot;0&quot; aria-valuemax=&quot;100&quot; style=&quot;height: 4px&quot;&gt;
      &lt;div class=&quot;progress-bar bg-danger rounded-pill&quot; style=&quot;width: 40%&quot;&gt;&lt;/div&gt;
    &lt;/div&gt;

    &lt;!-- Warning progress bar --&gt;
    &lt;div class=&quot;fs-sm mb-2&quot;&gt;70%&lt;/div&gt;
    &lt;div class=&quot;progress mb-3&quot; role=&quot;progressbar&quot; aria-label=&quot;Warning example&quot; aria-valuenow=&quot;70&quot; aria-valuemin=&quot;0&quot; aria-valuemax=&quot;100&quot; style=&quot;height: 4px&quot;&gt;
      &lt;div class=&quot;progress-bar bg-warning rounded-pill&quot; style=&quot;width: 70%&quot;&gt;&lt;/div&gt;
    &lt;/div&gt;

    &lt;!-- Info progress bar --&gt;
    &lt;div class=&quot;fs-sm mb-2&quot;&gt;60%&lt;/div&gt;
    &lt;div class=&quot;progress mb-3&quot; role=&quot;progressbar&quot; aria-label=&quot;Info example&quot; aria-valuenow=&quot;60&quot; aria-valuemin=&quot;0&quot; aria-valuemax=&quot;100&quot; style=&quot;height: 4px&quot;&gt;
      &lt;div class=&quot;progress-bar bg-info rounded-pill&quot; style=&quot;width: 60%&quot;&gt;&lt;/div&gt;
    &lt;/div&gt;

    &lt;!-- Dark progress bar that switches to light color in dark mode --&gt;
    &lt;div class=&quot;fs-sm mb-2&quot;&gt;33%&lt;/div&gt;
    &lt;div class=&quot;progress mb-3&quot; role=&quot;progressbar&quot; aria-label=&quot;Dark example&quot; aria-valuenow=&quot;33&quot; aria-valuemin=&quot;0&quot; aria-valuemax=&quot;100&quot; style=&quot;height: 4px&quot;&gt;
      &lt;div class=&quot;progress-bar bg-dark rounded-pill d-none-dark&quot; style=&quot;width: 33%&quot;&gt;&lt;/div&gt;
      &lt;div class=&quot;progress-bar bg-light rounded-pill d-none d-block-dark&quot; style=&quot;width: 33%&quot;&gt;&lt;/div&gt;
    &lt;/div&gt;</code></pre>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>


        <!-- Multiple bars -->
        <section id="progress-multiple" class="docs-section pb-sm-2 mb-5">
          <h4>Multiple bars</h4>
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
                  <div class="progress-stacked mb-3">
                    <div class="progress" role="progressbar" aria-label="Segment one" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100" style="width: 15%">
                      <div class="progress-bar"></div>
                    </div>
                    <div class="progress" role="progressbar" aria-label="Segment two" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: 10%">
                      <div class="progress-bar bg-success"></div>
                    </div>
                    <div class="progress" role="progressbar" aria-label="Segment three" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                      <div class="progress-bar bg-info"></div>
                    </div>
                    <div class="progress" role="progressbar" aria-label="Segment four" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%">
                      <div class="progress-bar bg-warning"></div>
                    </div>
                  </div>
                  <div class="progress-stacked" style="height: 4px">
                    <div class="progress" role="progressbar" aria-label="Segment one" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%">
                      <div class="progress-bar bg-warning"></div>
                    </div>
                    <div class="progress" role="progressbar" aria-label="Segment two" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100" style="width: 15%">
                      <div class="progress-bar bg-success"></div>
                    </div>
                    <div class="progress" role="progressbar" aria-label="Segment three" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                      <div class="progress-bar"></div>
                    </div>
                    <div class="progress" role="progressbar" aria-label="Segment four" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: 10%">
                      <div class="progress-bar bg-info"></div>
                    </div>
                  </div>
                </div>
                <div id="html-3" class="tab-pane pt-4 fade" role="tabpanel">
                  <div class="position-relative" data-bs-theme="dark">
                    <button type="button" class="btn btn-sm btn-outline-secondary bg-dark position-absolute top-0 end-0 mt-2 px-2 z-3" data-copy-code="#progress-multiple-code">
                      <i class="fi-copy fs-sm me-1"></i>
                      Copy
                    </button>
                    <pre id="progress-multiple-code" class="code-highlight mx-n2 mb-n2"><code class="language-html">&lt;!-- Thick (default) stacked bars --&gt;
    &lt;div class=&quot;progress-stacked mb-3&quot;&gt;
      &lt;div class=&quot;progress&quot; role=&quot;progressbar&quot; aria-label=&quot;Segment one&quot; aria-valuenow=&quot;15&quot; aria-valuemin=&quot;0&quot; aria-valuemax=&quot;100&quot; style=&quot;width: 15%&quot;&gt;
        &lt;div class=&quot;progress-bar&quot;&gt;&lt;/div&gt;
      &lt;/div&gt;
      &lt;div class=&quot;progress&quot; role=&quot;progressbar&quot; aria-label=&quot;Segment two&quot; aria-valuenow=&quot;10&quot; aria-valuemin=&quot;0&quot; aria-valuemax=&quot;100&quot; style=&quot;width: 10%&quot;&gt;
        &lt;div class=&quot;progress-bar bg-success&quot;&gt;&lt;/div&gt;
      &lt;/div&gt;
      &lt;div class=&quot;progress&quot; role=&quot;progressbar&quot; aria-label=&quot;Segment three&quot; aria-valuenow=&quot;20&quot; aria-valuemin=&quot;0&quot; aria-valuemax=&quot;100&quot; style=&quot;width: 20%&quot;&gt;
        &lt;div class=&quot;progress-bar bg-info&quot;&gt;&lt;/div&gt;
      &lt;/div&gt;
      &lt;div class=&quot;progress&quot; role=&quot;progressbar&quot; aria-label=&quot;Segment four&quot; aria-valuenow=&quot;25&quot; aria-valuemin=&quot;0&quot; aria-valuemax=&quot;100&quot; style=&quot;width: 25%&quot;&gt;
        &lt;div class=&quot;progress-bar bg-warning&quot;&gt;&lt;/div&gt;
      &lt;/div&gt;
    &lt;/div&gt;

    &lt;!-- Thin stacked bars --&gt;
    &lt;div class=&quot;progress-stacked mb-3&quot; style=&quot;height: 4px&quot;&gt;
      &lt;div class=&quot;progress&quot; role=&quot;progressbar&quot; aria-label=&quot;Segment one&quot; aria-valuenow=&quot;25&quot; aria-valuemin=&quot;0&quot; aria-valuemax=&quot;100&quot; style=&quot;width: 25%&quot;&gt;
        &lt;div class=&quot;progress-bar bg-warning&quot;&gt;&lt;/div&gt;
      &lt;/div&gt;
      &lt;div class=&quot;progress&quot; role=&quot;progressbar&quot; aria-label=&quot;Segment two&quot; aria-valuenow=&quot;15&quot; aria-valuemin=&quot;0&quot; aria-valuemax=&quot;100&quot; style=&quot;width: 15%&quot;&gt;
        &lt;div class=&quot;progress-bar bg-success&quot;&gt;&lt;/div&gt;
      &lt;/div&gt;
      &lt;div class=&quot;progress&quot; role=&quot;progressbar&quot; aria-label=&quot;Segment three&quot; aria-valuenow=&quot;20&quot; aria-valuemin=&quot;0&quot; aria-valuemax=&quot;100&quot; style=&quot;width: 20%&quot;&gt;
        &lt;div class=&quot;progress-bar&quot;&gt;&lt;/div&gt;
      &lt;/div&gt;
      &lt;div class=&quot;progress&quot; role=&quot;progressbar&quot; aria-label=&quot;Segment four&quot; aria-valuenow=&quot;10&quot; aria-valuemin=&quot;0&quot; aria-valuemax=&quot;100&quot; style=&quot;width: 10%&quot;&gt;
        &lt;div class=&quot;progress-bar bg-info&quot;&gt;&lt;/div&gt;
      &lt;/div&gt;
    &lt;/div&gt;</code></pre>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>


        <!-- Animated striped bars -->
        <section id="progress-striped" class="docs-section pb-sm-2 mb-5">
          <h4>Animated striped bars</h4>
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
                  <div class="progress mb-3" role="progressbar" aria-label="Animated striped primary progress" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100">
                    <div class="progress-bar progress-bar-striped progress-bar-animated" style="width: 45%"></div>
                  </div>
                  <div class="progress mb-3" role="progressbar" aria-label="Animated striped success progress" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100">
                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" style="width: 55%"></div>
                  </div>
                  <div class="progress mb-3" role="progressbar" aria-label="Animated striped danger progress" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">
                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger" style="width: 40%"></div>
                  </div>
                  <div class="progress mb-3" role="progressbar" aria-label="Animated striped warning progress" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100">
                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-warning" style="width: 70%"></div>
                  </div>
                  <div class="progress mb-3" role="progressbar" aria-label="Animated striped info progress" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100">
                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-info" style="width: 60%"></div>
                  </div>
                  <div class="progress mb-3" role="progressbar" aria-label="Animated striped dark progress" aria-valuenow="33" aria-valuemin="0" aria-valuemax="100">
                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-dark d-none-dark" style="width: 33%"></div>
                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-light d-none d-block-dark" style="width: 33%"></div>
                  </div>
                </div>
                <div id="html-4" class="tab-pane pt-4 fade" role="tabpanel">
                  <div class="position-relative" data-bs-theme="dark">
                    <button type="button" class="btn btn-sm btn-outline-secondary bg-dark position-absolute top-0 end-0 mt-2 px-2 z-3" data-copy-code="#progress-striped-code">
                      <i class="fi-copy fs-sm me-1"></i>
                      Copy
                    </button>
                    <pre id="progress-striped-code" class="code-highlight mx-n2 mb-n2"><code class="language-html">&lt;!-- Striped primary (default) progress bar --&gt;
    &lt;div class=&quot;progress mb-3&quot; role=&quot;progressbar&quot; aria-label=&quot;Animated striped primary progress&quot; aria-valuenow=&quot;45&quot; aria-valuemin=&quot;0&quot; aria-valuemax=&quot;100&quot;&gt;
      &lt;div class=&quot;progress-bar progress-bar-striped progress-bar-animated&quot; style=&quot;width: 45%&quot;&gt;&lt;/div&gt;
    &lt;/div&gt;

    &lt;!-- Striped success progress bar --&gt;
    &lt;div class=&quot;progress mb-3&quot; role=&quot;progressbar&quot; aria-label=&quot;Animated striped success progress&quot; aria-valuenow=&quot;55&quot; aria-valuemin=&quot;0&quot; aria-valuemax=&quot;100&quot;&gt;
      &lt;div class=&quot;progress-bar progress-bar-striped progress-bar-animated bg-success&quot; style=&quot;width: 55%&quot;&gt;&lt;/div&gt;
    &lt;/div&gt;

    &lt;!-- Striped danger progress bar --&gt;
    &lt;div class=&quot;progress mb-3&quot; role=&quot;progressbar&quot; aria-label=&quot;Animated striped danger progress&quot; aria-valuenow=&quot;40&quot; aria-valuemin=&quot;0&quot; aria-valuemax=&quot;100&quot;&gt;
      &lt;div class=&quot;progress-bar progress-bar-striped progress-bar-animated bg-danger&quot; style=&quot;width: 40%&quot;&gt;&lt;/div&gt;
    &lt;/div&gt;

    &lt;!-- Striped warning progress bar --&gt;
    &lt;div class=&quot;progress mb-3&quot; role=&quot;progressbar&quot; aria-label=&quot;Animated striped warning progress&quot; aria-valuenow=&quot;70&quot; aria-valuemin=&quot;0&quot; aria-valuemax=&quot;100&quot;&gt;
      &lt;div class=&quot;progress-bar progress-bar-striped progress-bar-animated bg-warning&quot; style=&quot;width: 70%&quot;&gt;&lt;/div&gt;
    &lt;/div&gt;

    &lt;!-- Striped info progress bar --&gt;
    &lt;div class=&quot;progress mb-3&quot; role=&quot;progressbar&quot; aria-label=&quot;Animated striped info progress&quot; aria-valuenow=&quot;60&quot; aria-valuemin=&quot;0&quot; aria-valuemax=&quot;100&quot;&gt;
      &lt;div class=&quot;progress-bar progress-bar-striped progress-bar-animated bg-info&quot; style=&quot;width: 60%&quot;&gt;&lt;/div&gt;
    &lt;/div&gt;

    &lt;!-- Striped dark progress bar that switches to light color in dark mode --&gt;
    &lt;div class=&quot;progress mb-3&quot; role=&quot;progressbar&quot; aria-label=&quot;Animated striped dark progress&quot; aria-valuenow=&quot;33&quot; aria-valuemin=&quot;0&quot; aria-valuemax=&quot;100&quot;&gt;
      &lt;div class=&quot;progress-bar progress-bar-striped progress-bar-animated bg-dark d-none-dark&quot; style=&quot;width: 33%&quot;&gt;&lt;/div&gt;
      &lt;div class=&quot;progress-bar progress-bar-striped progress-bar-animated bg-light d-none d-block-dark&quot; style=&quot;width: 33%&quot;&gt;&lt;/div&gt;
    &lt;/div&gt;</code></pre>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>


        <!-- Use case: Rating breakdown -->
        <section id="progress-rating-breakdown" class="docs-section pb-sm-2 mb-5">
          <h4>Use case: Rating breakdown</h4>
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
                <div id="preview-5" class="tab-pane pt-4 pb-1 mt-3 fade show active" role="tabpanel">
                  <div class="row g-4">
                    <div class="col-sm-5 col-md-3">
                      <div class="d-flex flex-column align-items-center justify-content-center h-100 bg-body-tertiary rounded p-4">
                        <div class="h1 pb-2 mb-1">4.5</div>
                        <div class="hstack justify-content-center gap-1 fs-sm mb-2">
                          <i class="fi-star-filled text-warning"></i>
                          <i class="fi-star-filled text-warning"></i>
                          <i class="fi-star-filled text-warning"></i>
                          <i class="fi-star-filled text-warning"></i>
                          <i class="fi-star-half text-warning"></i>
                        </div>
                        <div class="fs-sm">76 reviews</div>
                      </div>
                    </div>
                    <div class="col-sm-7 col-md-9">
                      <div class="vstack gap-3">
                        <div class="hstack gap-2">
                          <div class="hstack fs-sm gap-1">
                            5<i class="fi-star-filled text-warning"></i>
                          </div>
                          <div class="progress w-100" role="progressbar" aria-label="Five stars" aria-valuenow="58" aria-valuemin="0" aria-valuemax="100" style="height: 4px">
                            <div class="progress-bar bg-warning rounded-pill" style="width: 58%"></div>
                          </div>
                          <div class="fs-sm text-nowrap text-end" style="width: 40px;">44</div>
                        </div>
                        <div class="hstack gap-2">
                          <div class="hstack fs-sm gap-1">
                            4<i class="fi-star-filled text-warning"></i>
                          </div>
                          <div class="progress w-100" role="progressbar" aria-label="Four stars" aria-valuenow="22.4" aria-valuemin="0" aria-valuemax="100" style="height: 4px">
                            <div class="progress-bar bg-warning rounded-pill" style="width: 22.4%"></div>
                          </div>
                          <div class="fs-sm text-nowrap text-end" style="width: 40px;">17</div>
                        </div>
                        <div class="hstack gap-2">
                          <div class="hstack fs-sm gap-1">
                            3<i class="fi-star-filled text-warning"></i>
                          </div>
                          <div class="progress w-100" role="progressbar" aria-label="Three stars" aria-valuenow="12" aria-valuemin="0" aria-valuemax="100" style="height: 4px">
                            <div class="progress-bar bg-warning rounded-pill" style="width: 12%"></div>
                          </div>
                          <div class="fs-sm text-nowrap text-end" style="width: 40px;">9</div>
                        </div>
                        <div class="hstack gap-2">
                          <div class="hstack fs-sm gap-1">
                            2<i class="fi-star-filled text-warning"></i>
                          </div>
                          <div class="progress w-100" role="progressbar" aria-label="Two stars" aria-valuenow="5" aria-valuemin="0" aria-valuemax="100" style="height: 4px">
                            <div class="progress-bar bg-warning rounded-pill" style="width: 5%"></div>
                          </div>
                          <div class="fs-sm text-nowrap text-end" style="width: 40px;">4</div>
                        </div>
                        <div class="hstack gap-2">
                          <div class="hstack fs-sm gap-1">
                            1<i class="fi-star-filled text-warning"></i>
                          </div>
                          <div class="progress w-100" role="progressbar" aria-label="One star" aria-valuenow="2.6" aria-valuemin="0" aria-valuemax="100" style="height: 4px">
                            <div class="progress-bar bg-warning rounded-pill" style="width: 2.6%"></div>
                          </div>
                          <div class="fs-sm text-nowrap text-end" style="width: 40px;">2</div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div id="html-5" class="tab-pane pt-4 fade" role="tabpanel">
                  <div class="position-relative" data-bs-theme="dark">
                    <button type="button" class="btn btn-sm btn-outline-secondary bg-dark position-absolute top-0 end-0 mt-2 px-2 z-3" data-copy-code="#progress-rating-breakdown-code">
                      <i class="fi-copy fs-sm me-1"></i>
                      Copy
                    </button>
                    <pre id="progress-rating-breakdown-code" class="code-highlight mx-n2 mb-n2"><code class="language-html">&lt;div class=&quot;row g-4&quot;&gt;
      &lt;div class=&quot;col-sm-5 col-md-3&quot;&gt;

        &lt;!-- Overall rating card --&gt;
        &lt;div class=&quot;d-flex flex-column align-items-center justify-content-center h-100 bg-body-tertiary rounded p-4&quot;&gt;
          &lt;div class=&quot;h1 pb-2 mb-1&quot;&gt;4.5&lt;/div&gt;
          &lt;div class=&quot;hstack justify-content-center gap-1 fs-sm mb-2&quot;&gt;
            &lt;i class=&quot;fi-star-filled text-warning&quot;&gt;&lt;/i&gt;
            &lt;i class=&quot;fi-star-filled text-warning&quot;&gt;&lt;/i&gt;
            &lt;i class=&quot;fi-star-filled text-warning&quot;&gt;&lt;/i&gt;
            &lt;i class=&quot;fi-star-filled text-warning&quot;&gt;&lt;/i&gt;
            &lt;i class=&quot;fi-star-half text-warning&quot;&gt;&lt;/i&gt;
          &lt;/div&gt;
          &lt;div class=&quot;fs-sm&quot;&gt;76 reviews&lt;/div&gt;
        &lt;/div&gt;
      &lt;/div&gt;
      &lt;div class=&quot;col-sm-7 col-md-9&quot;&gt;

        &lt;!-- Rating breakdown by quantity --&gt;
        &lt;div class=&quot;vstack gap-3&quot;&gt;

          &lt;!-- 5 stars --&gt;
          &lt;div class=&quot;hstack gap-2&quot;&gt;
            &lt;div class=&quot;hstack fs-sm gap-1&quot;&gt;
              5&lt;i class=&quot;fi-star-filled text-warning&quot;&gt;&lt;/i&gt;
            &lt;/div&gt;
            &lt;div class=&quot;progress w-100&quot; role=&quot;progressbar&quot; aria-label=&quot;Five stars&quot; aria-valuenow=&quot;58&quot; aria-valuemin=&quot;0&quot; aria-valuemax=&quot;100&quot; style=&quot;height: 4px&quot;&gt;
              &lt;div class=&quot;progress-bar bg-warning rounded-pill&quot; style=&quot;width: 58%&quot;&gt;&lt;/div&gt;
            &lt;/div&gt;
            &lt;div class=&quot;fs-sm text-nowrap text-end&quot; style=&quot;width: 40px;&quot;&gt;44&lt;/div&gt;
          &lt;/div&gt;

          &lt;!-- 4 stars --&gt;
          &lt;div class=&quot;hstack gap-2&quot;&gt;
            &lt;div class=&quot;hstack fs-sm gap-1&quot;&gt;
              4&lt;i class=&quot;fi-star-filled text-warning&quot;&gt;&lt;/i&gt;
            &lt;/div&gt;
            &lt;div class=&quot;progress w-100&quot; role=&quot;progressbar&quot; aria-label=&quot;Four stars&quot; aria-valuenow=&quot;22.4&quot; aria-valuemin=&quot;0&quot; aria-valuemax=&quot;100&quot; style=&quot;height: 4px&quot;&gt;
              &lt;div class=&quot;progress-bar bg-warning rounded-pill&quot; style=&quot;width: 22.4%&quot;&gt;&lt;/div&gt;
            &lt;/div&gt;
            &lt;div class=&quot;fs-sm text-nowrap text-end&quot; style=&quot;width: 40px;&quot;&gt;17&lt;/div&gt;
          &lt;/div&gt;

          &lt;!-- 3 stars --&gt;
          &lt;div class=&quot;hstack gap-2&quot;&gt;
            &lt;div class=&quot;hstack fs-sm gap-1&quot;&gt;
              3&lt;i class=&quot;fi-star-filled text-warning&quot;&gt;&lt;/i&gt;
            &lt;/div&gt;
            &lt;div class=&quot;progress w-100&quot; role=&quot;progressbar&quot; aria-label=&quot;Three stars&quot; aria-valuenow=&quot;12&quot; aria-valuemin=&quot;0&quot; aria-valuemax=&quot;100&quot; style=&quot;height: 4px&quot;&gt;
              &lt;div class=&quot;progress-bar bg-warning rounded-pill&quot; style=&quot;width: 12%&quot;&gt;&lt;/div&gt;
            &lt;/div&gt;
            &lt;div class=&quot;fs-sm text-nowrap text-end&quot; style=&quot;width: 40px;&quot;&gt;9&lt;/div&gt;
          &lt;/div&gt;

          &lt;!-- 2 stars --&gt;
          &lt;div class=&quot;hstack gap-2&quot;&gt;
            &lt;div class=&quot;hstack fs-sm gap-1&quot;&gt;
              2&lt;i class=&quot;fi-star-filled text-warning&quot;&gt;&lt;/i&gt;
            &lt;/div&gt;
            &lt;div class=&quot;progress w-100&quot; role=&quot;progressbar&quot; aria-label=&quot;Two stars&quot; aria-valuenow=&quot;5&quot; aria-valuemin=&quot;0&quot; aria-valuemax=&quot;100&quot; style=&quot;height: 4px&quot;&gt;
              &lt;div class=&quot;progress-bar bg-warning rounded-pill&quot; style=&quot;width: 5%&quot;&gt;&lt;/div&gt;
            &lt;/div&gt;
            &lt;div class=&quot;fs-sm text-nowrap text-end&quot; style=&quot;width: 40px;&quot;&gt;4&lt;/div&gt;
          &lt;/div&gt;

          &lt;!-- 1 star --&gt;
          &lt;div class=&quot;hstack gap-2&quot;&gt;
            &lt;div class=&quot;hstack fs-sm gap-1&quot;&gt;
              1&lt;i class=&quot;fi-star-filled text-warning&quot;&gt;&lt;/i&gt;
            &lt;/div&gt;
            &lt;div class=&quot;progress w-100&quot; role=&quot;progressbar&quot; aria-label=&quot;One star&quot; aria-valuenow=&quot;2.6&quot; aria-valuemin=&quot;0&quot; aria-valuemax=&quot;100&quot; style=&quot;height: 4px&quot;&gt;
              &lt;div class=&quot;progress-bar bg-warning rounded-pill&quot; style=&quot;width: 2.6%&quot;&gt;&lt;/div&gt;
            &lt;/div&gt;
            &lt;div class=&quot;fs-sm text-nowrap text-end&quot; style=&quot;width: 40px;&quot;&gt;2&lt;/div&gt;
          &lt;/div&gt;
        &lt;/div&gt;
      &lt;/div&gt;
    &lt;/div&gt;</code></pre>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>


        <!-- Circular progress: Colors -->
        <section id="progress-circular-colors" class="docs-section pb-sm-2 mb-5">
          <h4>Circular progress: Colors</h4>
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
                <div id="preview-6" class="tab-pane pt-4 pb-1 mt-3 fade show active" role="tabpanel">
                  <div class="d-flex flex-wrap gap-4">
                    <div class="circular-progress text-primary" role="progressbar" style="--fn-progress: 45" aria-label="Primary progress" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100">
                      <svg class="progress-circle">
                        <circle class="progress-background" r="0"></circle>
                        <circle class="progress-bar" r="0"></circle>
                      </svg>
                      <h5 class="position-absolute top-50 start-50 translate-middle text-center mb-0">45%</h5>
                    </div>
                    <div class="circular-progress text-success" role="progressbar" style="--fn-progress: 55" aria-label="Success progress" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100">
                      <svg class="progress-circle">
                        <circle class="progress-background" r="0"></circle>
                        <circle class="progress-bar" r="0"></circle>
                      </svg>
                      <h5 class="position-absolute top-50 start-50 translate-middle text-center mb-0">55%</h5>
                    </div>
                    <div class="circular-progress text-danger" role="progressbar" style="--fn-progress: 40" aria-label="Danger progress" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">
                      <svg class="progress-circle">
                        <circle class="progress-background" r="0"></circle>
                        <circle class="progress-bar" r="0"></circle>
                      </svg>
                      <h5 class="position-absolute top-50 start-50 translate-middle text-center mb-0">40%</h5>
                    </div>
                    <div class="circular-progress text-warning" role="progressbar" style="--fn-progress: 70" aria-label="Warning progress" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100">
                      <svg class="progress-circle">
                        <circle class="progress-background" r="0"></circle>
                        <circle class="progress-bar" r="0"></circle>
                      </svg>
                      <h5 class="position-absolute top-50 start-50 translate-middle text-center mb-0">70%</h5>
                    </div>
                    <div class="circular-progress text-info" role="progressbar" style="--fn-progress: 60" aria-label="Info progress" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100">
                      <svg class="progress-circle">
                        <circle class="progress-background" r="0"></circle>
                        <circle class="progress-bar" r="0"></circle>
                      </svg>
                      <h5 class="position-absolute top-50 start-50 translate-middle text-center mb-0">60%</h5>
                    </div>
                    <div class="circular-progress text-dark-emphasis" role="progressbar" style="--fn-progress: 33" aria-label="Dark progress" aria-valuenow="33" aria-valuemin="0" aria-valuemax="100">
                      <svg class="progress-circle">
                        <circle class="progress-background" r="0"></circle>
                        <circle class="progress-bar" r="0"></circle>
                      </svg>
                      <h5 class="position-absolute top-50 start-50 translate-middle text-center mb-0">33%</h5>
                    </div>
                  </div>
                </div>
                <div id="html-6" class="tab-pane pt-4 fade" role="tabpanel">
                  <div class="position-relative" data-bs-theme="dark">
                    <button type="button" class="btn btn-sm btn-outline-secondary bg-dark position-absolute top-0 end-0 mt-2 px-2 z-3" data-copy-code="#progress-circular-colors-code">
                      <i class="fi-copy fs-sm me-1"></i>
                      Copy
                    </button>
                    <pre id="progress-circular-colors-code" class="code-highlight mx-n2 mb-n2"><code class="language-html">&lt;!-- Primary circular progress --&gt;
    &lt;div class=&quot;circular-progress text-primary&quot; role=&quot;progressbar&quot; style=&quot;--fn-progress: 45&quot; aria-label=&quot;Primary progress&quot; aria-valuenow=&quot;45&quot; aria-valuemin=&quot;0&quot; aria-valuemax=&quot;100&quot;&gt;
      &lt;svg class=&quot;progress-circle&quot;&gt;
        &lt;circle class=&quot;progress-background&quot; r=&quot;0&quot;&gt;&lt;/circle&gt;
        &lt;circle class=&quot;progress-bar&quot; r=&quot;0&quot;&gt;&lt;/circle&gt;
      &lt;/svg&gt;
      &lt;h5 class=&quot;position-absolute top-50 start-50 translate-middle text-center mb-0&quot;&gt;45%&lt;/h5&gt;
    &lt;/div&gt;

    &lt;!-- Success circular progress --&gt;
    &lt;div class=&quot;circular-progress text-success&quot; role=&quot;progressbar&quot; style=&quot;--fn-progress: 55&quot; aria-label=&quot;Success progress&quot; aria-valuenow=&quot;55&quot; aria-valuemin=&quot;0&quot; aria-valuemax=&quot;100&quot;&gt;
      &lt;svg class=&quot;progress-circle&quot;&gt;
        &lt;circle class=&quot;progress-background&quot; r=&quot;0&quot;&gt;&lt;/circle&gt;
        &lt;circle class=&quot;progress-bar&quot; r=&quot;0&quot;&gt;&lt;/circle&gt;
      &lt;/svg&gt;
      &lt;h5 class=&quot;position-absolute top-50 start-50 translate-middle text-center mb-0&quot;&gt;55%&lt;/h5&gt;
    &lt;/div&gt;

    &lt;!-- Danger circular progress --&gt;
    &lt;div class=&quot;circular-progress text-danger&quot; role=&quot;progressbar&quot; style=&quot;--fn-progress: 40&quot; aria-label=&quot;Danger progress&quot; aria-valuenow=&quot;40&quot; aria-valuemin=&quot;0&quot; aria-valuemax=&quot;100&quot;&gt;
      &lt;svg class=&quot;progress-circle&quot;&gt;
        &lt;circle class=&quot;progress-background&quot; r=&quot;0&quot;&gt;&lt;/circle&gt;
        &lt;circle class=&quot;progress-bar&quot; r=&quot;0&quot;&gt;&lt;/circle&gt;
      &lt;/svg&gt;
      &lt;h5 class=&quot;position-absolute top-50 start-50 translate-middle text-center mb-0&quot;&gt;40%&lt;/h5&gt;
    &lt;/div&gt;

    &lt;!-- Warning circular progress --&gt;
    &lt;div class=&quot;circular-progress text-warning&quot; role=&quot;progressbar&quot; style=&quot;--fn-progress: 70&quot; aria-label=&quot;Warning progress&quot; aria-valuenow=&quot;70&quot; aria-valuemin=&quot;0&quot; aria-valuemax=&quot;100&quot;&gt;
      &lt;svg class=&quot;progress-circle&quot;&gt;
        &lt;circle class=&quot;progress-background&quot; r=&quot;0&quot;&gt;&lt;/circle&gt;
        &lt;circle class=&quot;progress-bar&quot; r=&quot;0&quot;&gt;&lt;/circle&gt;
      &lt;/svg&gt;
      &lt;h5 class=&quot;position-absolute top-50 start-50 translate-middle text-center mb-0&quot;&gt;70%&lt;/h5&gt;
    &lt;/div&gt;

    &lt;!-- Info circular progress --&gt;
    &lt;div class=&quot;circular-progress text-info&quot; role=&quot;progressbar&quot; style=&quot;--fn-progress: 60&quot; aria-label=&quot;Info progress&quot; aria-valuenow=&quot;60&quot; aria-valuemin=&quot;0&quot; aria-valuemax=&quot;100&quot;&gt;
      &lt;svg class=&quot;progress-circle&quot;&gt;
        &lt;circle class=&quot;progress-background&quot; r=&quot;0&quot;&gt;&lt;/circle&gt;
        &lt;circle class=&quot;progress-bar&quot; r=&quot;0&quot;&gt;&lt;/circle&gt;
      &lt;/svg&gt;
      &lt;h5 class=&quot;position-absolute top-50 start-50 translate-middle text-center mb-0&quot;&gt;60%&lt;/h5&gt;
    &lt;/div&gt;

    &lt;!-- Dark circular progress --&gt;
    &lt;div class=&quot;circular-progress text-dark-emphasis&quot; role=&quot;progressbar&quot; style=&quot;--fn-progress: 33&quot; aria-label=&quot;Dark progress&quot; aria-valuenow=&quot;33&quot; aria-valuemin=&quot;0&quot; aria-valuemax=&quot;100&quot;&gt;
      &lt;svg class=&quot;progress-circle&quot;&gt;
        &lt;circle class=&quot;progress-background&quot; r=&quot;0&quot;&gt;&lt;/circle&gt;
        &lt;circle class=&quot;progress-bar&quot; r=&quot;0&quot;&gt;&lt;/circle&gt;
      &lt;/svg&gt;
      &lt;h5 class=&quot;position-absolute top-50 start-50 translate-middle text-center mb-0&quot;&gt;33%&lt;/h5&gt;
    &lt;/div&gt;</code></pre>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>


        <!-- Circular progress: Sizes -->
        <section id="progress-circular-sizes" class="docs-section pb-sm-2 mb-5">
          <h4>Circular progress: Sizes</h4>
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
                <div id="preview-7" class="tab-pane pt-4 pb-1 mt-3 fade show active" role="tabpanel">
                  <div class="d-flex flex-wrap align-items-center gap-4">
                    <div class="circular-progress text-secondary" role="progressbar" style="--fn-progress-size: 48px; --fn-progress: 60" aria-label="48px progress" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100">
                      <svg class="progress-circle">
                        <circle class="progress-background" r="0"></circle>
                        <circle class="progress-bar" r="0"></circle>
                      </svg>
                      <h5 class="position-absolute top-50 start-50 translate-middle fs-xs text-center mb-0">60%</h5>
                    </div>
                    <div class="circular-progress text-secondary" role="progressbar" style="--fn-progress-size: 72px; --fn-progress: 60" aria-label="72px progress" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100">
                      <svg class="progress-circle">
                        <circle class="progress-background" r="0"></circle>
                        <circle class="progress-bar" r="0"></circle>
                      </svg>
                      <h5 class="position-absolute top-50 start-50 translate-middle fs-base text-center mb-0">60%</h5>
                    </div>
                    <div class="circular-progress text-secondary" role="progressbar" style="--fn-progress: 60" aria-label="96px progress" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100">
                      <svg class="progress-circle">
                        <circle class="progress-background" r="0"></circle>
                        <circle class="progress-bar" r="0"></circle>
                      </svg>
                      <h5 class="position-absolute top-50 start-50 translate-middle text-center mb-0">60%</h5>
                    </div>
                    <div class="circular-progress text-secondary" role="progressbar" style="--fn-progress-size: 120px; --fn-progress: 60" aria-label="120px progress" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100">
                      <svg class="progress-circle">
                        <circle class="progress-background" r="0"></circle>
                        <circle class="progress-bar" r="0"></circle>
                      </svg>
                      <h5 class="position-absolute top-50 start-50 translate-middle h4 text-center mb-0">60%</h5>
                    </div>
                  </div>
                </div>
                <div id="html-7" class="tab-pane pt-4 fade" role="tabpanel">
                  <div class="position-relative" data-bs-theme="dark">
                    <button type="button" class="btn btn-sm btn-outline-secondary bg-dark position-absolute top-0 end-0 mt-2 px-2 z-3" data-copy-code="#progress-circular-sizes-code">
                      <i class="fi-copy fs-sm me-1"></i>
                      Copy
                    </button>
                    <pre id="progress-circular-sizes-code" class="code-highlight mx-n2 mb-n2"><code class="language-html">&lt;!-- Use --fn-progress-size CSS variable to adjust circular progress size --&gt;

    &lt;!-- 48px --&gt;
    &lt;div class=&quot;circular-progress text-secondary&quot; role=&quot;progressbar&quot; style=&quot;--fn-progress-size: 48px; --fn-progress: 60&quot; aria-label=&quot;48px progress&quot; aria-valuenow=&quot;60&quot; aria-valuemin=&quot;0&quot; aria-valuemax=&quot;100&quot;&gt;
      &lt;svg class=&quot;progress-circle&quot;&gt;
        &lt;circle class=&quot;progress-background&quot; r=&quot;0&quot;&gt;&lt;/circle&gt;
        &lt;circle class=&quot;progress-bar&quot; r=&quot;0&quot;&gt;&lt;/circle&gt;
      &lt;/svg&gt;
      &lt;h5 class=&quot;position-absolute top-50 start-50 translate-middle fs-xs text-center mb-0&quot;&gt;60%&lt;/h5&gt;
    &lt;/div&gt;

    &lt;!-- 72px --&gt;
    &lt;div class=&quot;circular-progress text-secondary&quot; role=&quot;progressbar&quot; style=&quot;--fn-progress-size: 72px; --fn-progress: 60&quot; aria-label=&quot;72px progress&quot; aria-valuenow=&quot;60&quot; aria-valuemin=&quot;0&quot; aria-valuemax=&quot;100&quot;&gt;
      &lt;svg class=&quot;progress-circle&quot;&gt;
        &lt;circle class=&quot;progress-background&quot; r=&quot;0&quot;&gt;&lt;/circle&gt;
        &lt;circle class=&quot;progress-bar&quot; r=&quot;0&quot;&gt;&lt;/circle&gt;
      &lt;/svg&gt;
      &lt;h5 class=&quot;position-absolute top-50 start-50 translate-middle fs-base text-center mb-0&quot;&gt;60%&lt;/h5&gt;
    &lt;/div&gt;

    &lt;!-- 96px (default) --&gt;
    &lt;div class=&quot;circular-progress text-secondary&quot; role=&quot;progressbar&quot; style=&quot;--fn-progress: 60&quot; aria-label=&quot;96px progress&quot; aria-valuenow=&quot;60&quot; aria-valuemin=&quot;0&quot; aria-valuemax=&quot;100&quot;&gt;
      &lt;svg class=&quot;progress-circle&quot;&gt;
        &lt;circle class=&quot;progress-background&quot; r=&quot;0&quot;&gt;&lt;/circle&gt;
        &lt;circle class=&quot;progress-bar&quot; r=&quot;0&quot;&gt;&lt;/circle&gt;
      &lt;/svg&gt;
      &lt;h5 class=&quot;position-absolute top-50 start-50 translate-middle text-center mb-0&quot;&gt;60%&lt;/h5&gt;
    &lt;/div&gt;

    &lt;!-- 120px --&gt;
    &lt;div class=&quot;circular-progress text-secondary&quot; role=&quot;progressbar&quot; style=&quot;--fn-progress-size: 120px; --fn-progress: 60&quot; aria-label=&quot;120px progress&quot; aria-valuenow=&quot;60&quot; aria-valuemin=&quot;0&quot; aria-valuemax=&quot;100&quot;&gt;
      &lt;svg class=&quot;progress-circle&quot;&gt;
        &lt;circle class=&quot;progress-background&quot; r=&quot;0&quot;&gt;&lt;/circle&gt;
        &lt;circle class=&quot;progress-bar&quot; r=&quot;0&quot;&gt;&lt;/circle&gt;
      &lt;/svg&gt;
      &lt;h5 class=&quot;position-absolute top-50 start-50 translate-middle h4 text-center mb-0&quot;&gt;60%&lt;/h5&gt;
    &lt;/div&gt;</code></pre>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>


        <!-- Circular progress: Bar width -->
        <section id="progress-circular-bar-width" class="docs-section">
          <h4>Circular progress: Bar width</h4>
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
                <div id="preview-8" class="tab-pane pt-4 pb-1 mt-3 fade show active" role="tabpanel">
                  <div class="d-flex flex-wrap gap-4">
                    <div class="circular-progress text-primary" role="progressbar" style="--fn-progress-bar-width: 14px; --fn-progress: 60" aria-label="Thick bar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100">
                      <svg class="progress-circle">
                        <circle class="progress-background" r="0"></circle>
                        <circle class="progress-bar" r="0"></circle>
                      </svg>
                      <h5 class="position-absolute top-50 start-50 translate-middle text-center mb-0">60%</h5>
                    </div>
                    <div class="circular-progress text-primary" role="progressbar" style="--fn-progress-bar-width: 4px; --fn-progress: 60" aria-label="Thin bar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100">
                      <svg class="progress-circle">
                        <circle class="progress-background" r="0"></circle>
                        <circle class="progress-bar" r="0"></circle>
                      </svg>
                      <h5 class="position-absolute top-50 start-50 translate-middle fw-normal text-center mb-0">60%</h5>
                    </div>
                  </div>
                </div>
                <div id="html-8" class="tab-pane pt-4 fade" role="tabpanel">
                  <div class="position-relative" data-bs-theme="dark">
                    <button type="button" class="btn btn-sm btn-outline-secondary bg-dark position-absolute top-0 end-0 mt-2 px-2 z-3" data-copy-code="#progress-circular-bar-width-code">
                      <i class="fi-copy fs-sm me-1"></i>
                      Copy
                    </button>
                    <pre id="progress-circular-bar-width-code" class="code-highlight mx-n2 mb-n2"><code class="language-html">&lt;!-- Use --fn-progress-bar-width CSS variable to adjust circular progress bar width --&gt;

    &lt;!-- Thick bar (14px) --&gt;
    &lt;div class=&quot;circular-progress text-primary&quot; role=&quot;progressbar&quot; style=&quot;--fn-progress-bar-width: 14px; --fn-progress: 60&quot; aria-label=&quot;Thick bar&quot; aria-valuenow=&quot;60&quot; aria-valuemin=&quot;0&quot; aria-valuemax=&quot;100&quot;&gt;
      &lt;svg class=&quot;progress-circle&quot;&gt;
        &lt;circle class=&quot;progress-background&quot; r=&quot;0&quot;&gt;&lt;/circle&gt;
        &lt;circle class=&quot;progress-bar&quot; r=&quot;0&quot;&gt;&lt;/circle&gt;
      &lt;/svg&gt;
      &lt;h5 class=&quot;position-absolute top-50 start-50 translate-middle text-center mb-0&quot;&gt;60%&lt;/h5&gt;
    &lt;/div&gt;

    &lt;!-- Thin bar (4px) --&gt;
    &lt;div class=&quot;circular-progress text-primary&quot; role=&quot;progressbar&quot; style=&quot;--fn-progress-bar-width: 4px; --fn-progress: 60&quot; aria-label=&quot;Thin bar&quot; aria-valuenow=&quot;60&quot; aria-valuemin=&quot;0&quot; aria-valuemax=&quot;100&quot;&gt;
      &lt;svg class=&quot;progress-circle&quot;&gt;
        &lt;circle class=&quot;progress-background&quot; r=&quot;0&quot;&gt;&lt;/circle&gt;
        &lt;circle class=&quot;progress-bar&quot; r=&quot;0&quot;&gt;&lt;/circle&gt;
      &lt;/svg&gt;
      &lt;h5 class=&quot;position-absolute top-50 start-50 translate-middle fw-normal text-center mb-0&quot;&gt;60%&lt;/h5&gt;
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