@extends('layouts.app')

@section('title', 'Finder Docs | Carousel (Slider)')

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
                  <div class="dropdown">
                    <span class="list-group-item list-group-item-action justify-content-between dropdown-toggle pe-3 pe-none active">
                      Carousel (Slider)
                    </span>
                    <ul id="anchorNav" class="nav nav-underline flex-column border-start ms-2 my-2" style="gap: .25rem;">
                      <li class="nav-item"><a class="nav-link fw-normal" href="#carousel-navigation">Navigation (Prev / next buttons)</a></li>
                      <li class="nav-item"><a class="nav-link fw-normal" href="#carousel-pagination">Pagination</a></li>
                      <li class="nav-item"><a class="nav-link fw-normal" href="#carousel-multiple-slides">Multiple slides per view (Responsive)</a></li>
                      <li class="nav-item"><a class="nav-link fw-normal" href="#carousel-fade">Fade transition</a></li>
                      <li class="nav-item"><a class="nav-link fw-normal" href="#carousel-thumbnails">Thumbnails</a></li>
                      <li class="nav-item"><a class="nav-link fw-normal" href="#carousel-sync">Synchronized sliders</a></li>
                    </ul>
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
        <section class="pt-2 pb-md-2">
          <span class="badge d-inline-flex align-items-center text-info bg-info-subtle fw-semibold text-decoration-none py-2 px-3 mb-2 rounded-pill">Finder component</span>
          <h1 class="pt-1">Carousel (Slider)</h1>
          <p class="text-body-secondary mb-4">A slideshow component for cycling through elements (images or slides with various content) like a carousel.</p>
        </section>


        <!-- Info alert -->
        <section class="alert d-sm-flex text-body-emphasis bg-info-subtle border-0 py-4 mb-5">
          <i class="fi-info text-info fs-4 mb-2 mb-sm-0"></i>
          <div class="ps-sm-3 pe-sm-5 w-100">
            <p>The Carousel component relies on the <a class="alert-link" href="https://swiperjs.com/" target="_blank" rel="noreferrer">Swiper</a> plugin. To use a carousel, make sure to include the required reference to the plugin's .css and .js files.</p>
            <p class="mb-2">CSS file is linked in the <code>&lt;head&gt;</code> section and above <code>theme.min.css</code> reference in your document:</p>
            <pre class="code-highlight border mb-3" data-bs-theme="dark"><code class="language-html">&lt;link rel=&quot;stylesheet&quot; href=&quot;assets/vendor/swiper/swiper-bundle.min.css&quot;&gt;</code></pre>
            <p class="mb-2">JavaScript file is linked before the closing <code>&lt;/body&gt;</code> tag and above <code>theme.min.js</code> reference in your document:</p>
            <pre class="code-highlight border" data-bs-theme="dark"><code class="language-html">&lt;script src=&quot;assets/vendor/swiper/swiper-bundle.min.js&quot;&gt;&lt;/script&gt;</code></pre>
            <p class="pt-3 pb-2 mt-2">You can apply virtually any slider option by specifying it within the <code>data-swiper="{}"</code> attribute in JSON format.</p>
            <div class="h6">Usefull links:</div>
            <ul class="list-unstyled d-inline-block mb-0">
              <li class="mb-2">
                <a class="d-flex alert-link fw-medium text-decoration-none" href="https://swiperjs.com/demos" target="_blank" rel="noopener">
                  <i class="fi-external-link mt-1 me-2"></i>
                  Swiper slider demos with code examples
                </a>
              </li>
              <li class="mb-2">
                <a class="d-flex alert-link fw-medium text-decoration-none" href="https://swiperjs.com/swiper-api" target="_blank" rel="noopener">
                  <i class="fi-external-link mt-1 me-2"></i>
                  Swiper slider API: options, methods and events
                </a>
              </li>
            </ul>
          </div>
        </section>


        <!-- Navigation (Prev / next buttons) -->
        <section id="carousel-navigation" class="docs-section pb-sm-2 mb-5">
          <h4>Navigation (Prev / next buttons)</h4>
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
                  <div class="d-flex flex-wrap align-items-center gap-4">
                    <div class="d-flex gap-2">
                      <button type="button" class="btn btn-icon btn-lg btn-outline-secondary animate-slide-start rounded-circle me-1" aria-label="Prev">
                        <i class="fi-chevron-left fs-xl animate-target"></i>
                      </button>
                      <button type="button" class="btn btn-icon btn-lg btn-outline-secondary animate-slide-end rounded-circle" aria-label="Next">
                        <i class="fi-chevron-right fs-xl animate-target"></i>
                      </button>
                    </div>
                    <div class="d-flex gap-2">
                      <button type="button" class="btn btn-icon btn-outline-secondary animate-slide-start rounded-circle me-1" aria-label="Prev">
                        <i class="fi-chevron-left fs-lg animate-target"></i>
                      </button>
                      <button type="button" class="btn btn-icon btn-outline-secondary animate-slide-end rounded-circle" aria-label="Next">
                        <i class="fi-chevron-right fs-lg animate-target"></i>
                      </button>
                    </div>
                    <div class="d-flex gap-2">
                      <button type="button" class="btn btn-icon btn-sm btn-outline-secondary animate-slide-start rounded-circle me-1" aria-label="Prev">
                        <i class="fi-chevron-left fs-base animate-target"></i>
                      </button>
                      <button type="button" class="btn btn-icon btn-sm btn-outline-secondary animate-slide-end rounded-circle" aria-label="Next">
                        <i class="fi-chevron-right fs-base animate-target"></i>
                      </button>
                    </div>
                  </div>
                </div>
                <div id="html-1" class="tab-pane pt-4 fade" role="tabpanel">
                  <div class="position-relative" data-bs-theme="dark">
                    <button type="button" class="btn btn-sm btn-outline-secondary bg-dark position-absolute top-0 end-0 mt-2 px-2 z-3" data-copy-code="#carousel-navigation-code">
                      <i class="fi-copy fs-sm me-1"></i>
                      Copy
                    </button>
                    <pre id="carousel-navigation-code" class="code-highlight mx-n2 mb-n2"><code class="language-html">&lt;!-- You can use any available button style as Carousel controls --&gt;

  &lt;!-- Large prev/next buttons --&gt;
  &lt;div class=&quot;d-flex gap-2&quot;&gt;
    &lt;button type=&quot;button&quot; class=&quot;btn btn-icon btn-lg btn-outline-secondary animate-slide-start rounded-circle me-1&quot; aria-label=&quot;Prev&quot;&gt;
      &lt;i class=&quot;fi-chevron-left fs-xl animate-target&quot;&gt;&lt;/i&gt;
    &lt;/button&gt;
    &lt;button type=&quot;button&quot; class=&quot;btn btn-icon btn-lg btn-outline-secondary animate-slide-end rounded-circle&quot; aria-label=&quot;Next&quot;&gt;
      &lt;i class=&quot;fi-chevron-right fs-xl animate-target&quot;&gt;&lt;/i&gt;
    &lt;/button&gt;
  &lt;/div&gt;

  &lt;!-- Normal prev/next buttons --&gt;
  &lt;div class=&quot;d-flex gap-2&quot;&gt;
    &lt;button type=&quot;button&quot; class=&quot;btn btn-icon btn-outline-secondary animate-slide-start rounded-circle me-1&quot; aria-label=&quot;Prev&quot;&gt;
      &lt;i class=&quot;fi-chevron-left fs-lg animate-target&quot;&gt;&lt;/i&gt;
    &lt;/button&gt;
    &lt;button type=&quot;button&quot; class=&quot;btn btn-icon btn-outline-secondary animate-slide-end rounded-circle&quot; aria-label=&quot;Next&quot;&gt;
      &lt;i class=&quot;fi-chevron-right fs-lg animate-target&quot;&gt;&lt;/i&gt;
    &lt;/button&gt;
  &lt;/div&gt;

  &lt;!-- Small prev/next buttons --&gt;
  &lt;div class=&quot;d-flex gap-2&quot;&gt;
    &lt;button type=&quot;button&quot; class=&quot;btn btn-icon btn-sm btn-outline-secondary animate-slide-start rounded-circle me-1&quot; aria-label=&quot;Prev&quot;&gt;
      &lt;i class=&quot;fi-chevron-left fs-base animate-target&quot;&gt;&lt;/i&gt;
    &lt;/button&gt;
    &lt;button type=&quot;button&quot; class=&quot;btn btn-icon btn-sm btn-outline-secondary animate-slide-end rounded-circle&quot; aria-label=&quot;Next&quot;&gt;
      &lt;i class=&quot;fi-chevron-right fs-base animate-target&quot;&gt;&lt;/i&gt;
    &lt;/button&gt;
  &lt;/div&gt;</code></pre>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>


        <!-- Pagination -->
        <section id="carousel-pagination" class="docs-section pb-sm-2 mb-5">
          <h4>Pagination</h4>
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
                  <div class="row row-cols-md-2 row-cols-xl-2 g-4">
                    <div class="col">
                      <div class="swiper hover-effect-opacity" data-swiper='{
                            "spaceBetween": 20,
                            "loop": true,
                            "pagination": {
                              "el": ".swiper-pagination",
                              "clickable": true
                            },
                            "navigation": {
                              "prevEl": ".btn-prev",
                              "nextEl": ".btn-next"
                            }
                          }'>
                        <div class="swiper-wrapper">
                          <div class="swiper-slide">
                            <div class="ratio ratio-16x9 bg-body-tertiary">
                              <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center display-4">1</div>
                            </div>
                          </div>
                          <div class="swiper-slide">
                            <div class="ratio ratio-16x9 bg-body-tertiary">
                              <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center display-4">2</div>
                            </div>
                          </div>
                          <div class="swiper-slide">
                            <div class="ratio ratio-16x9 bg-body-tertiary">
                              <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center display-4">3</div>
                            </div>
                          </div>
                        </div>
                        <div class="position-absolute top-50 start-0 z-2 translate-middle-y ms-3 hover-effect-target opacity-0">
                          <button type="button" class="btn btn-prev btn-icon btn-outline-secondary rounded-circle animate-slide-start" aria-label="Prev">
                            <i class="fi-chevron-left fs-lg animate-target"></i>
                          </button>
                        </div>
                        <div class="position-absolute top-50 end-0 z-2 translate-middle-y me-3 hover-effect-target opacity-0">
                          <button type="button" class="btn btn-next btn-icon btn-outline-secondary rounded-circle animate-slide-end" aria-label="Next">
                            <i class="fi-chevron-right fs-lg animate-target"></i>
                          </button>
                        </div>
                        <div class="swiper-pagination"></div>
                      </div>
                    </div>
                    <div class="col">
                      <div class="swiper hover-effect-opacity" data-swiper='{
                            "spaceBetween": 20,
                            "pagination": {
                              "el": ".swiper-pagination",
                              "type": "progressbar"
                            },
                            "navigation": {
                              "prevEl": ".btn-prev",
                              "nextEl": ".btn-next"
                            }
                          }'>
                        <div class="swiper-wrapper">
                          <div class="swiper-slide">
                            <div class="ratio ratio-16x9 bg-body-tertiary">
                              <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center display-4">1</div>
                            </div>
                          </div>
                          <div class="swiper-slide">
                            <div class="ratio ratio-16x9 bg-body-tertiary">
                              <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center display-4">2</div>
                            </div>
                          </div>
                          <div class="swiper-slide">
                            <div class="ratio ratio-16x9 bg-body-tertiary">
                              <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center display-4">3</div>
                            </div>
                          </div>
                        </div>
                        <div class="position-absolute top-50 start-0 z-2 translate-middle-y ms-3 hover-effect-target opacity-0">
                          <button type="button" class="btn btn-prev btn-icon btn-outline-secondary rounded-circle animate-slide-start" aria-label="Prev">
                            <i class="fi-chevron-left fs-lg animate-target"></i>
                          </button>
                        </div>
                        <div class="position-absolute top-50 end-0 z-2 translate-middle-y me-3 hover-effect-target opacity-0">
                          <button type="button" class="btn btn-next btn-icon btn-outline-secondary rounded-circle animate-slide-end" aria-label="Next">
                            <i class="fi-chevron-right fs-lg animate-target"></i>
                          </button>
                        </div>
                        <div class="swiper-pagination"></div>
                      </div>
                    </div>
                    <div class="col">
                      <div class="swiper hover-effect-opacity" data-swiper='{
                            "spaceBetween": 20,
                            "pagination": {
                              "el": ".swiper-pagination",
                              "type": "fraction"
                            },
                            "navigation": {
                              "prevEl": ".btn-prev",
                              "nextEl": ".btn-next"
                            }
                          }'>
                        <div class="swiper-wrapper">
                          <div class="swiper-slide">
                            <div class="ratio ratio-16x9 bg-body-tertiary">
                              <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center display-4">1</div>
                            </div>
                          </div>
                          <div class="swiper-slide">
                            <div class="ratio ratio-16x9 bg-body-tertiary">
                              <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center display-4">2</div>
                            </div>
                          </div>
                          <div class="swiper-slide">
                            <div class="ratio ratio-16x9 bg-body-tertiary">
                              <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center display-4">3</div>
                            </div>
                          </div>
                        </div>
                        <div class="position-absolute top-50 start-0 z-2 translate-middle-y ms-3 hover-effect-target opacity-0">
                          <button type="button" class="btn btn-prev btn-icon btn-outline-secondary rounded-circle animate-slide-start" aria-label="Prev">
                            <i class="fi-chevron-left fs-lg animate-target"></i>
                          </button>
                        </div>
                        <div class="position-absolute top-50 end-0 z-2 translate-middle-y me-3 hover-effect-target opacity-0">
                          <button type="button" class="btn btn-next btn-icon btn-outline-secondary rounded-circle animate-slide-end" aria-label="Next">
                            <i class="fi-chevron-right fs-lg animate-target"></i>
                          </button>
                        </div>
                        <div class="swiper-pagination text-body-secondary fs-6 opacity-50 fw-semibold mb-2"></div>
                      </div>
                    </div>
                    <div class="col">
                      <div class="ratio ratio-16x9">
                        <div class="swiper" data-swiper='{
                              "direction": "vertical",
                              "mousewheel": true,
                              "spaceBetween": 20,
                              "scrollbar": {
                                "el": ".swiper-scrollbar"
                              }
                            }'>
                          <div class="swiper-wrapper">
                            <div class="swiper-slide">
                              <div class="ratio ratio-16x9 bg-body-tertiary">
                                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center display-4">1</div>
                              </div>
                            </div>
                            <div class="swiper-slide">
                              <div class="ratio ratio-16x9 bg-body-tertiary">
                                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center display-4">2</div>
                              </div>
                            </div>
                            <div class="swiper-slide">
                              <div class="ratio ratio-16x9 bg-body-tertiary">
                                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center display-4">3</div>
                              </div>
                            </div>
                          </div>
                          <div class="swiper-scrollbar"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div id="html-2" class="tab-pane pt-4 fade" role="tabpanel">
                  <div class="position-relative" data-bs-theme="dark">
                    <button type="button" class="btn btn-sm btn-outline-secondary bg-dark position-absolute top-0 end-0 mt-2 px-2 z-3" data-copy-code="#carousel-pagination-code">
                      <i class="fi-copy fs-sm me-1"></i>
                      Copy
                    </button>
                    <pre id="carousel-pagination-code" class="code-highlight mx-n2 mb-n2"><code class="language-html">&lt;!-- Pagination: Bullets --&gt;
  &lt;div class=&quot;swiper hover-effect-opacity&quot; data-swiper='{
    &quot;spaceBetween&quot;: 20,
    &quot;loop&quot;: true,
    &quot;pagination&quot;: {
      &quot;el&quot;: &quot;.swiper-pagination&quot;,
      &quot;clickable&quot;: true
    },
    &quot;navigation&quot;: {
      &quot;prevEl&quot;: &quot;.btn-prev&quot;,
      &quot;nextEl&quot;: &quot;.btn-next&quot;
    }
  }'&gt;
    &lt;div class=&quot;swiper-wrapper&quot;&gt;

      &lt;!-- Item --&gt;
      &lt;div class=&quot;swiper-slide&quot;&gt;
        &lt;div class=&quot;ratio ratio-16x9 bg-body-tertiary&quot;&gt;
          &lt;div class=&quot;position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center display-4&quot;&gt;1&lt;/div&gt;
        &lt;/div&gt;
      &lt;/div&gt;

      &lt;!-- Item --&gt;
      &lt;div class=&quot;swiper-slide&quot;&gt;
        &lt;div class=&quot;ratio ratio-16x9 bg-body-tertiary&quot;&gt;
          &lt;div class=&quot;position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center display-4&quot;&gt;2&lt;/div&gt;
        &lt;/div&gt;
      &lt;/div&gt;

      &lt;!-- Item --&gt;
      &lt;div class=&quot;swiper-slide&quot;&gt;
        &lt;div class=&quot;ratio ratio-16x9 bg-body-tertiary&quot;&gt;
          &lt;div class=&quot;position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center display-4&quot;&gt;3&lt;/div&gt;
        &lt;/div&gt;
      &lt;/div&gt;
    &lt;/div&gt;

    &lt;!-- Prev button --&gt;
    &lt;div class=&quot;position-absolute top-50 start-0 z-2 translate-middle-y ms-3 hover-effect-target opacity-0&quot;&gt;
      &lt;button type=&quot;button&quot; class=&quot;btn btn-prev btn-icon btn-outline-secondary rounded-circle animate-slide-start&quot; aria-label=&quot;Prev&quot;&gt;
        &lt;i class=&quot;fi-chevron-left fs-lg animate-target&quot;&gt;&lt;/i&gt;
      &lt;/button&gt;
    &lt;/div&gt;

    &lt;!-- Next button --&gt;
    &lt;div class=&quot;position-absolute top-50 end-0 z-2 translate-middle-y me-3 hover-effect-target opacity-0&quot;&gt;
      &lt;button type=&quot;button&quot; class=&quot;btn btn-next btn-icon btn-outline-secondary rounded-circle animate-slide-end&quot; aria-label=&quot;Next&quot;&gt;
        &lt;i class=&quot;fi-chevron-right fs-lg animate-target&quot;&gt;&lt;/i&gt;
      &lt;/button&gt;
    &lt;/div&gt;

    &lt;!-- Bullets --&gt;
    &lt;div class=&quot;swiper-pagination&quot;&gt;&lt;/div&gt;
  &lt;/div&gt;


  &lt;!-- Pagination: Progress bar --&gt;
  &lt;div class=&quot;swiper hover-effect-opacity&quot; data-swiper='{
    &quot;spaceBetween&quot;: 20,
    &quot;pagination&quot;: {
      &quot;el&quot;: &quot;.swiper-pagination&quot;,
      &quot;type&quot;: &quot;progressbar&quot;
    },
    &quot;navigation&quot;: {
      &quot;prevEl&quot;: &quot;.btn-prev&quot;,
      &quot;nextEl&quot;: &quot;.btn-next&quot;
    }
  }'&gt;
    &lt;div class=&quot;swiper-wrapper&quot;&gt;

      &lt;!-- Item --&gt;
      &lt;div class=&quot;swiper-slide&quot;&gt;
        &lt;div class=&quot;ratio ratio-16x9 bg-body-tertiary&quot;&gt;
          &lt;div class=&quot;position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center display-4&quot;&gt;1&lt;/div&gt;
        &lt;/div&gt;
      &lt;/div&gt;

      &lt;!-- Item --&gt;
      &lt;div class=&quot;swiper-slide&quot;&gt;
        &lt;div class=&quot;ratio ratio-16x9 bg-body-tertiary&quot;&gt;
          &lt;div class=&quot;position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center display-4&quot;&gt;2&lt;/div&gt;
        &lt;/div&gt;
      &lt;/div&gt;

      &lt;!-- Item --&gt;
      &lt;div class=&quot;swiper-slide&quot;&gt;
        &lt;div class=&quot;ratio ratio-16x9 bg-body-tertiary&quot;&gt;
          &lt;div class=&quot;position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center display-4&quot;&gt;3&lt;/div&gt;
        &lt;/div&gt;
      &lt;/div&gt;
    &lt;/div&gt;

    &lt;!-- Prev button --&gt;
    &lt;div class=&quot;position-absolute top-50 start-0 z-2 translate-middle-y ms-3 hover-effect-target opacity-0&quot;&gt;
      &lt;button type=&quot;button&quot; class=&quot;btn btn-prev btn-icon btn-outline-secondary rounded-circle animate-slide-start&quot; aria-label=&quot;Prev&quot;&gt;
        &lt;i class=&quot;fi-chevron-left fs-lg animate-target&quot;&gt;&lt;/i&gt;
      &lt;/button&gt;
    &lt;/div&gt;

    &lt;!-- Next button --&gt;
    &lt;div class=&quot;position-absolute top-50 end-0 z-2 translate-middle-y me-3 hover-effect-target opacity-0&quot;&gt;
      &lt;button type=&quot;button&quot; class=&quot;btn btn-next btn-icon btn-outline-secondary rounded-circle animate-slide-end&quot; aria-label=&quot;Next&quot;&gt;
        &lt;i class=&quot;fi-chevron-right fs-lg animate-target&quot;&gt;&lt;/i&gt;
      &lt;/button&gt;
    &lt;/div&gt;

    &lt;!-- Progress bar --&gt;
    &lt;div class=&quot;swiper-pagination&quot;&gt;&lt;/div&gt;
  &lt;/div&gt;


  &lt;!-- Pagination: Fraction --&gt;
  &lt;div class=&quot;swiper hover-effect-opacity&quot; data-swiper='{
    &quot;spaceBetween&quot;: 20,
    &quot;pagination&quot;: {
      &quot;el&quot;: &quot;.swiper-pagination&quot;,
      &quot;type&quot;: &quot;fraction&quot;
    },
    &quot;navigation&quot;: {
      &quot;prevEl&quot;: &quot;.btn-prev&quot;,
      &quot;nextEl&quot;: &quot;.btn-next&quot;
    }
  }'&gt;
    &lt;div class=&quot;swiper-wrapper&quot;&gt;

      &lt;!-- Item --&gt;
      &lt;div class=&quot;swiper-slide&quot;&gt;
        &lt;div class=&quot;ratio ratio-16x9 bg-body-tertiary&quot;&gt;
          &lt;div class=&quot;position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center display-4&quot;&gt;1&lt;/div&gt;
        &lt;/div&gt;
      &lt;/div&gt;

      &lt;!-- Item --&gt;
      &lt;div class=&quot;swiper-slide&quot;&gt;
        &lt;div class=&quot;ratio ratio-16x9 bg-body-tertiary&quot;&gt;
          &lt;div class=&quot;position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center display-4&quot;&gt;2&lt;/div&gt;
        &lt;/div&gt;
      &lt;/div&gt;

      &lt;!-- Item --&gt;
      &lt;div class=&quot;swiper-slide&quot;&gt;
        &lt;div class=&quot;ratio ratio-16x9 bg-body-tertiary&quot;&gt;
          &lt;div class=&quot;position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center display-4&quot;&gt;3&lt;/div&gt;
        &lt;/div&gt;
      &lt;/div&gt;
    &lt;/div&gt;

    &lt;!-- Prev button --&gt;
    &lt;div class=&quot;position-absolute top-50 start-0 z-2 translate-middle-y ms-3 hover-effect-target opacity-0&quot;&gt;
      &lt;button type=&quot;button&quot; class=&quot;btn btn-prev btn-icon btn-outline-secondary rounded-circle animate-slide-start&quot; aria-label=&quot;Prev&quot;&gt;
        &lt;i class=&quot;fi-chevron-left fs-lg animate-target&quot;&gt;&lt;/i&gt;
      &lt;/button&gt;
    &lt;/div&gt;

    &lt;!-- Next button --&gt;
    &lt;div class=&quot;position-absolute top-50 end-0 z-2 translate-middle-y me-3 hover-effect-target opacity-0&quot;&gt;
      &lt;button type=&quot;button&quot; class=&quot;btn btn-next btn-icon btn-outline-secondary rounded-circle animate-slide-end&quot; aria-label=&quot;Next&quot;&gt;
        &lt;i class=&quot;fi-chevron-right fs-lg animate-target&quot;&gt;&lt;/i&gt;
      &lt;/button&gt;
    &lt;/div&gt;

    &lt;!-- Fraction --&gt;
    &lt;div class=&quot;swiper-pagination text-body-secondary fs-6 opacity-50 fw-semibold mb-2&quot;&gt;&lt;/div&gt;
  &lt;/div&gt;


  &lt;!-- Pagination: Scrollbar --&gt;
  &lt;div class=&quot;swiper&quot; data-swiper='{
    &quot;direction&quot;: &quot;vertical&quot;,
    &quot;mousewheel&quot;: true,
    &quot;spaceBetween&quot;: 20,
    &quot;scrollbar&quot;: {
      &quot;el&quot;: &quot;.swiper-scrollbar&quot;
    }
  }'&gt;
    &lt;div class=&quot;swiper-wrapper&quot;&gt;

      &lt;!-- Item --&gt;
      &lt;div class=&quot;swiper-slide&quot;&gt;
        &lt;div class=&quot;ratio ratio-16x9 bg-body-tertiary&quot;&gt;
          &lt;div class=&quot;position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center display-4&quot;&gt;1&lt;/div&gt;
        &lt;/div&gt;
      &lt;/div&gt;

      &lt;!-- Item --&gt;
      &lt;div class=&quot;swiper-slide&quot;&gt;
        &lt;div class=&quot;ratio ratio-16x9 bg-body-tertiary&quot;&gt;
          &lt;div class=&quot;position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center display-4&quot;&gt;2&lt;/div&gt;
        &lt;/div&gt;
      &lt;/div&gt;

      &lt;!-- Item --&gt;
      &lt;div class=&quot;swiper-slide&quot;&gt;
        &lt;div class=&quot;ratio ratio-16x9 bg-body-tertiary&quot;&gt;
          &lt;div class=&quot;position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center display-4&quot;&gt;3&lt;/div&gt;
        &lt;/div&gt;
      &lt;/div&gt;
    &lt;/div&gt;

    &lt;!-- Scrollbar --&gt;
    &lt;div class=&quot;swiper-scrollbar&quot;&gt;&lt;/div&gt;
  &lt;/div&gt;</code></pre>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>


        <!-- Multiple slides per view (Responsive) -->
        <section id="carousel-multiple-slides" class="docs-section pb-sm-2 mb-5">
          <h4>Multiple slides per view (Responsive)</h4>
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
                  <div class="position-relative px-5">
                    <button type="button" id="prev" class="btn btn-icon btn-outline-secondary rounded-circle animate-slide-start position-absolute top-50 start-0 translate-middle-y mt-n3" aria-label="Prev">
                      <i class="fi-chevron-left fs-lg animate-target"></i>
                    </button>
                    <button type="button" id="next" class="btn btn-icon btn-outline-secondary rounded-circle animate-slide-end position-absolute top-50 end-0 translate-middle-y mt-n3" aria-label="Next">
                      <i class="fi-chevron-right fs-lg animate-target"></i>
                    </button>
                    <div class="swiper px-2" data-swiper='{
                          "slidesPerView": 1,
                          "spaceBetween": 16,
                          "loop": true,
                          "pagination": {
                            "el": ".swiper-pagination",
                            "clickable": true
                          },
                          "navigation": {
                            "prevEl": "#prev",
                            "nextEl": "#next"
                          },
                          "breakpoints": {
                            "600": {
                              "slidesPerView": 2
                            },
                            "1000": {
                              "slidesPerView": 3
                            }
                          }
                        }'>
                      <div class="swiper-wrapper">
                        <div class="swiper-slide">
                          <div class="ratio ratio-4x3 bg-info-subtle rounded">
                            <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center display-5">1</div>
                          </div>
                        </div>
                        <div class="swiper-slide">
                          <div class="ratio ratio-4x3 bg-success-subtle rounded">
                            <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center display-5">2</div>
                          </div>
                        </div>
                        <div class="swiper-slide">
                          <div class="ratio ratio-4x3 bg-danger-subtle rounded">
                            <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center display-5">3</div>
                          </div>
                        </div>
                        <div class="swiper-slide">
                          <div class="ratio ratio-4x3 bg-warning-subtle rounded">
                            <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center display-5">4</div>
                          </div>
                        </div>
                      </div>
                      <div class="swiper-pagination position-static mt-3"></div>
                    </div>
                  </div>
                </div>
                <div id="html-3" class="tab-pane pt-4 fade" role="tabpanel">
                  <div class="position-relative" data-bs-theme="dark">
                    <button type="button" class="btn btn-sm btn-outline-secondary bg-dark position-absolute top-0 end-0 mt-2 px-2 z-3" data-copy-code="#carousel-multiple-slides-code">
                      <i class="fi-copy fs-sm me-1"></i>
                      Copy
                    </button>
                    <pre id="carousel-multiple-slides-code" class="code-highlight mx-n2 mb-n2"><code class="language-html">&lt;!-- Responsive slider with multiple slides, featuring external Prev/Next buttons and bullets positioned outside the slider. --&gt;
  &lt;div class=&quot;position-relative px-5&quot;&gt;

    &lt;!-- External slider prev/next buttons --&gt;
    &lt;button type=&quot;button&quot; id=&quot;prev&quot; class=&quot;btn btn-icon btn-outline-secondary rounded-circle animate-slide-start position-absolute top-50 start-0 translate-middle-y mt-n3&quot; aria-label=&quot;Prev&quot;&gt;
      &lt;i class=&quot;fi-chevron-left fs-lg animate-target&quot;&gt;&lt;/i&gt;
    &lt;/button&gt;
    &lt;button type=&quot;button&quot; id=&quot;next&quot; class=&quot;btn btn-icon btn-outline-secondary rounded-circle animate-slide-end position-absolute top-50 end-0 translate-middle-y mt-n3&quot; aria-label=&quot;Next&quot;&gt;
      &lt;i class=&quot;fi-chevron-right fs-lg animate-target&quot;&gt;&lt;/i&gt;
    &lt;/button&gt;

    &lt;!-- Slider --&gt;
    &lt;div class=&quot;swiper px-2&quot; data-swiper='{
      &quot;slidesPerView&quot;: 1,
      &quot;spaceBetween&quot;: 16,
      &quot;loop&quot;: true,
      &quot;pagination&quot;: {
        &quot;el&quot;: &quot;.swiper-pagination&quot;,
        &quot;clickable&quot;: true
      },
      &quot;navigation&quot;: {
        &quot;prevEl&quot;: &quot;#prev&quot;,
        &quot;nextEl&quot;: &quot;#next&quot;
      },
      &quot;breakpoints&quot;: {
        &quot;600&quot;: {
          &quot;slidesPerView&quot;: 2
        },
        &quot;1000&quot;: {
          &quot;slidesPerView&quot;: 3
        }
      }
    }'&gt;
      &lt;div class=&quot;swiper-wrapper&quot;&gt;

        &lt;!-- Item --&gt;
        &lt;div class=&quot;swiper-slide&quot;&gt;
          &lt;div class=&quot;ratio ratio-4x3 bg-info-subtle rounded&quot;&gt;
            &lt;div class=&quot;position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center display-5&quot;&gt;1&lt;/div&gt;
          &lt;/div&gt;
        &lt;/div&gt;

        &lt;!-- Item --&gt;
        &lt;div class=&quot;swiper-slide&quot;&gt;
          &lt;div class=&quot;ratio ratio-4x3 bg-success-subtle rounded&quot;&gt;
            &lt;div class=&quot;position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center display-5&quot;&gt;2&lt;/div&gt;
          &lt;/div&gt;
        &lt;/div&gt;

        &lt;!-- Item --&gt;
        &lt;div class=&quot;swiper-slide&quot;&gt;
          &lt;div class=&quot;ratio ratio-4x3 bg-danger-subtle rounded&quot;&gt;
            &lt;div class=&quot;position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center display-5&quot;&gt;3&lt;/div&gt;
          &lt;/div&gt;
        &lt;/div&gt;

        &lt;!-- Item --&gt;
        &lt;div class=&quot;swiper-slide&quot;&gt;
          &lt;div class=&quot;ratio ratio-4x3 bg-warning-subtle rounded&quot;&gt;
            &lt;div class=&quot;position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center display-5&quot;&gt;4&lt;/div&gt;
          &lt;/div&gt;
        &lt;/div&gt;
      &lt;/div&gt;

      &lt;!-- Pagination (Bullets) --&gt;
      &lt;div class=&quot;swiper-pagination position-static mt-3&quot;&gt;&lt;/div&gt;
    &lt;/div&gt;
  &lt;/div&gt;</code></pre>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>


        <!-- Fade transition -->
        <section id="carousel-fade" class="docs-section pb-sm-2 mb-5">
          <h4>Fade transition</h4>
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
                  <div class="swiper hover-effect-opacity" data-swiper='{
                        "effect": "fade",
                        "loop": true,
                        "navigation": {
                          "prevEl": ".btn-prev",
                          "nextEl": ".btn-next"
                        }
                      }'>
                    <div class="swiper-wrapper">
                      <div class="swiper-slide rounded">
                        <div class="ratio ratio-16x9 bg-info-subtle rounded">
                          <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center display-5">First</div>
                        </div>
                      </div>
                      <div class="swiper-slide rounded">
                        <div class="ratio ratio-16x9 bg-danger-subtle rounded">
                          <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center display-5">Second</div>
                        </div>
                      </div>
                      <div class="swiper-slide rounded">
                        <div class="ratio ratio-16x9 bg-warning-subtle rounded">
                          <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center display-5">Third</div>
                        </div>
                      </div>
                    </div>
                    <div class="position-absolute top-50 start-0 z-2 translate-middle-y ms-3 ms-sm-4 hover-effect-target opacity-0">
                      <button type="button" class="btn btn-prev btn-icon btn-secondary bg-body border-0 rounded-circle animate-slide-start" aria-label="Prev">
                        <i class="fi-chevron-left fs-lg animate-target"></i>
                      </button>
                    </div>
                    <div class="position-absolute top-50 end-0 z-2 translate-middle-y me-3 me-sm-4 hover-effect-target opacity-0">
                      <button type="button" class="btn btn-next btn-icon btn-secondary bg-body border-0 rounded-circle animate-slide-end" aria-label="Next">
                        <i class="fi-chevron-right fs-lg animate-target"></i>
                      </button>
                    </div>
                  </div>
                </div>
                <div id="html-4" class="tab-pane pt-4 fade" role="tabpanel">
                  <div class="position-relative" data-bs-theme="dark">
                    <button type="button" class="btn btn-sm btn-outline-secondary bg-dark position-absolute top-0 end-0 mt-2 px-2 z-3" data-copy-code="#carousel-fade-code">
                      <i class="fi-copy fs-sm me-1"></i>
                      Copy
                    </button>
                    <pre id="carousel-fade-code" class="code-highlight mx-n2 mb-n2"><code class="language-html">&lt;!-- A slider that features a smooth fade transition between slides --&gt;
  &lt;div class=&quot;swiper hover-effect-opacity&quot; data-swiper='{
    &quot;effect&quot;: &quot;fade&quot;,
    &quot;loop&quot;: true,
    &quot;navigation&quot;: {
      &quot;prevEl&quot;: &quot;.btn-prev&quot;,
      &quot;nextEl&quot;: &quot;.btn-next&quot;
    }
  }'&gt;
    &lt;div class=&quot;swiper-wrapper&quot;&gt;

      &lt;!-- Item --&gt;
      &lt;div class=&quot;swiper-slide rounded&quot;&gt;
        &lt;div class=&quot;ratio ratio-16x9 bg-info-subtle rounded&quot;&gt;
          &lt;div class=&quot;position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center display-5&quot;&gt;First&lt;/div&gt;
        &lt;/div&gt;
      &lt;/div&gt;

      &lt;!-- Item --&gt;
      &lt;div class=&quot;swiper-slide rounded&quot;&gt;
        &lt;div class=&quot;ratio ratio-16x9 bg-danger-subtle rounded&quot;&gt;
          &lt;div class=&quot;position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center display-5&quot;&gt;Second&lt;/div&gt;
        &lt;/div&gt;
      &lt;/div&gt;

      &lt;!-- Item --&gt;
      &lt;div class=&quot;swiper-slide rounded&quot;&gt;
        &lt;div class=&quot;ratio ratio-16x9 bg-warning-subtle rounded&quot;&gt;
          &lt;div class=&quot;position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center display-5&quot;&gt;Third&lt;/div&gt;
        &lt;/div&gt;
      &lt;/div&gt;
    &lt;/div&gt;

    &lt;!-- Prev button --&gt;
    &lt;div class=&quot;position-absolute top-50 start-0 z-2 translate-middle-y ms-3 ms-sm-4 hover-effect-target opacity-0&quot;&gt;
      &lt;button type=&quot;button&quot; class=&quot;btn btn-prev btn-icon btn-secondary bg-body border-0 rounded-circle animate-slide-start&quot; aria-label=&quot;Prev&quot;&gt;
        &lt;i class=&quot;fi-chevron-left fs-lg animate-target&quot;&gt;&lt;/i&gt;
      &lt;/button&gt;
    &lt;/div&gt;

    &lt;!-- Next button --&gt;
    &lt;div class=&quot;position-absolute top-50 end-0 z-2 translate-middle-y me-3 me-sm-4 hover-effect-target opacity-0&quot;&gt;
      &lt;button type=&quot;button&quot; class=&quot;btn btn-next btn-icon btn-secondary bg-body border-0 rounded-circle animate-slide-end&quot; aria-label=&quot;Next&quot;&gt;
        &lt;i class=&quot;fi-chevron-right fs-lg animate-target&quot;&gt;&lt;/i&gt;
      &lt;/button&gt;
    &lt;/div&gt;
  &lt;/div&gt;</code></pre>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>


        <!-- Thumbnails -->
        <section id="carousel-thumbnails" class="docs-section pb-sm-2 mb-5">
          <h4>Thumbnails</h4>
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
                  <div style="max-width: 636px">
                    <div class="swiper hover-effect-opacity" data-swiper='{
                          "spaceBetween": 24,
                          "loop": true,
                          "navigation": {
                            "prevEl": ".btn-prev",
                            "nextEl": ".btn-next"
                          },
                          "thumbs": {
                            "swiper": "#thumbs"
                          }
                        }'>
                      <div class="swiper-wrapper">
                        <div class="swiper-slide">
                          <div class="ratio ratio-16x9 bg-primary-subtle rounded">
                            <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center display-4">1</div>
                          </div>
                        </div>
                        <div class="swiper-slide">
                          <div class="ratio ratio-16x9 bg-success-subtle rounded">
                            <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center display-4">2</div>
                          </div>
                        </div>
                        <div class="swiper-slide">
                          <div class="ratio ratio-16x9 bg-warning-subtle rounded">
                            <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center display-4">3</div>
                          </div>
                        </div>
                        <div class="swiper-slide">
                          <div class="ratio ratio-16x9 bg-danger-subtle rounded">
                            <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center display-4">4</div>
                          </div>
                        </div>
                        <div class="swiper-slide">
                          <div class="ratio ratio-16x9 bg-info-subtle rounded">
                            <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center display-4">5</div>
                          </div>
                        </div>
                        <div class="swiper-slide">
                          <div class="ratio ratio-16x9 bg-body-tertiary rounded">
                            <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center display-4">6</div>
                          </div>
                        </div>
                        <div class="swiper-slide">
                          <div class="ratio ratio-16x9 bg-warning-subtle rounded">
                            <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center display-4">7</div>
                          </div>
                        </div>
                      </div>
                      <div class="position-absolute top-50 start-0 z-2 translate-middle-y ms-3 ms-sm-4 hover-effect-target opacity-0">
                        <button type="button" class="btn btn-prev btn-icon btn-secondary bg-body border-0 rounded-circle animate-slide-start" aria-label="Prev">
                          <i class="fi-chevron-left fs-lg animate-target"></i>
                        </button>
                      </div>
                      <div class="position-absolute top-50 end-0 z-2 translate-middle-y me-3 me-sm-4 hover-effect-target opacity-0">
                        <button type="button" class="btn btn-next btn-icon btn-secondary bg-body border-0 rounded-circle animate-slide-end" aria-label="Next">
                          <i class="fi-chevron-right fs-lg animate-target"></i>
                        </button>
                      </div>
                    </div>
                    <div class="swiper swiper-load swiper-thumbs pt-2 mt-1" id="thumbs" data-swiper='{
                          "loop": true,
                          "spaceBetween": 12,
                          "slidesPerView": 3,
                          "watchSlidesProgress": true,
                          "breakpoints": {
                            "340": {
                              "slidesPerView": 4
                            },
                            "500": {
                              "slidesPerView": 5
                            },
                            "600": {
                              "slidesPerView": 6
                            },
                            "768": {
                              "slidesPerView": 4
                            },
                            "992": {
                              "slidesPerView": 5
                            },
                            "1200": {
                              "slidesPerView": 6
                            }
                          }
                        }'>
                      <div class="swiper-wrapper">
                        <div class="swiper-slide swiper-thumb">
                          <div class="ratio ratio-1x1 bg-primary-subtle rounded">
                            <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center fs-3 fw-semibold">1</div>
                          </div>
                        </div>
                        <div class="swiper-slide swiper-thumb">
                          <div class="ratio ratio-1x1 bg-success-subtle rounded">
                            <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center fs-3 fw-semibold">2</div>
                          </div>
                        </div>
                        <div class="swiper-slide swiper-thumb">
                          <div class="ratio ratio-1x1 bg-warning-subtle rounded">
                            <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center fs-3 fw-semibold">3</div>
                          </div>
                        </div>
                        <div class="swiper-slide swiper-thumb">
                          <div class="ratio ratio-1x1 bg-danger-subtle rounded">
                            <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center fs-3 fw-semibold">4</div>
                          </div>
                        </div>
                        <div class="swiper-slide swiper-thumb">
                          <div class="ratio ratio-1x1 bg-info-subtle rounded">
                            <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center fs-3 fw-semibold">5</div>
                          </div>
                        </div>
                        <div class="swiper-slide swiper-thumb">
                          <div class="ratio ratio-1x1 bg-body-tertiary rounded">
                            <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center fs-3 fw-semibold">6</div>
                          </div>
                        </div>
                        <div class="swiper-slide swiper-thumb">
                          <div class="ratio ratio-1x1 bg-warning-subtle rounded">
                            <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center fs-3 fw-semibold">7</div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div id="html-5" class="tab-pane pt-4 fade" role="tabpanel">
                  <div class="position-relative" data-bs-theme="dark">
                    <button type="button" class="btn btn-sm btn-outline-secondary bg-dark position-absolute top-0 end-0 mt-2 px-2 z-3" data-copy-code="#carousel-thumbnails-code">
                      <i class="fi-copy fs-sm me-1"></i>
                      Copy
                    </button>
                    <pre id="carousel-thumbnails-code" class="code-highlight mx-n2 mb-n2"><code class="language-html">&lt;!-- A slider equipped with thumbnails that allow users to control and navigate the main slider --&gt;

  &lt;!-- Main slider --&gt;
  &lt;div class=&quot;swiper hover-effect-opacity&quot; data-swiper='{
    &quot;spaceBetween&quot;: 24,
    &quot;loop&quot;: true,
    &quot;navigation&quot;: {
      &quot;prevEl&quot;: &quot;.btn-prev&quot;,
      &quot;nextEl&quot;: &quot;.btn-next&quot;
    },
    &quot;thumbs&quot;: {
      &quot;swiper&quot;: &quot;#thumbs&quot;
    }
  }'&gt;
    &lt;div class=&quot;swiper-wrapper&quot;&gt;

      &lt;!-- Item --&gt;
      &lt;div class=&quot;swiper-slide&quot;&gt;
        &lt;div class=&quot;ratio ratio-16x9 bg-primary-subtle rounded&quot;&gt;
          &lt;div class=&quot;position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center display-4&quot;&gt;1&lt;/div&gt;
        &lt;/div&gt;
      &lt;/div&gt;

      &lt;!-- Item --&gt;
      &lt;div class=&quot;swiper-slide&quot;&gt;
        &lt;div class=&quot;ratio ratio-16x9 bg-success-subtle rounded&quot;&gt;
          &lt;div class=&quot;position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center display-4&quot;&gt;2&lt;/div&gt;
        &lt;/div&gt;
      &lt;/div&gt;

      &lt;!-- Item --&gt;
      &lt;div class=&quot;swiper-slide&quot;&gt;
        &lt;div class=&quot;ratio ratio-16x9 bg-warning-subtle rounded&quot;&gt;
          &lt;div class=&quot;position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center display-4&quot;&gt;3&lt;/div&gt;
        &lt;/div&gt;
      &lt;/div&gt;

      &lt;!-- Item --&gt;
      &lt;div class=&quot;swiper-slide&quot;&gt;
        &lt;div class=&quot;ratio ratio-16x9 bg-danger-subtle rounded&quot;&gt;
          &lt;div class=&quot;position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center display-4&quot;&gt;4&lt;/div&gt;
        &lt;/div&gt;
      &lt;/div&gt;

      &lt;!-- Item --&gt;
      &lt;div class=&quot;swiper-slide&quot;&gt;
        &lt;div class=&quot;ratio ratio-16x9 bg-info-subtle rounded&quot;&gt;
          &lt;div class=&quot;position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center display-4&quot;&gt;5&lt;/div&gt;
        &lt;/div&gt;
      &lt;/div&gt;

      &lt;!-- Item --&gt;
      &lt;div class=&quot;swiper-slide&quot;&gt;
        &lt;div class=&quot;ratio ratio-16x9 bg-body-tertiary rounded&quot;&gt;
          &lt;div class=&quot;position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center display-4&quot;&gt;6&lt;/div&gt;
        &lt;/div&gt;
      &lt;/div&gt;

      &lt;!-- Item --&gt;
      &lt;div class=&quot;swiper-slide&quot;&gt;
        &lt;div class=&quot;ratio ratio-16x9 bg-warning-subtle rounded&quot;&gt;
          &lt;div class=&quot;position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center display-4&quot;&gt;7&lt;/div&gt;
        &lt;/div&gt;
      &lt;/div&gt;
    &lt;/div&gt;

    &lt;!-- Prev button --&gt;
    &lt;div class=&quot;position-absolute top-50 start-0 z-2 translate-middle-y ms-3 ms-sm-4 hover-effect-target opacity-0&quot;&gt;
      &lt;button type=&quot;button&quot; class=&quot;btn btn-prev btn-icon btn-secondary bg-body border-0 rounded-circle animate-slide-start&quot; aria-label=&quot;Prev&quot;&gt;
        &lt;i class=&quot;fi-chevron-left fs-lg animate-target&quot;&gt;&lt;/i&gt;
      &lt;/button&gt;
    &lt;/div&gt;

    &lt;!-- Next button --&gt;
    &lt;div class=&quot;position-absolute top-50 end-0 z-2 translate-middle-y me-3 me-sm-4 hover-effect-target opacity-0&quot;&gt;
      &lt;button type=&quot;button&quot; class=&quot;btn btn-next btn-icon btn-secondary bg-body border-0 rounded-circle animate-slide-end&quot; aria-label=&quot;Next&quot;&gt;
        &lt;i class=&quot;fi-chevron-right fs-lg animate-target&quot;&gt;&lt;/i&gt;
      &lt;/button&gt;
    &lt;/div&gt;
  &lt;/div&gt;

  &lt;!-- Thumbnails slider --&gt;
  &lt;div class=&quot;swiper swiper-load swiper-thumbs pt-2 mt-1&quot; id=&quot;thumbs&quot; data-swiper='{
    &quot;loop&quot;: true,
    &quot;spaceBetween&quot;: 12,
    &quot;slidesPerView&quot;: 3,
    &quot;watchSlidesProgress&quot;: true,
    &quot;breakpoints&quot;: {
      &quot;340&quot;: {
        &quot;slidesPerView&quot;: 4
      },
      &quot;500&quot;: {
        &quot;slidesPerView&quot;: 5
      },
      &quot;600&quot;: {
        &quot;slidesPerView&quot;: 6
      },
      &quot;768&quot;: {
        &quot;slidesPerView&quot;: 4
      },
      &quot;992&quot;: {
        &quot;slidesPerView&quot;: 5
      },
      &quot;1200&quot;: {
        &quot;slidesPerView&quot;: 6
      }
    }
  }'&gt;
    &lt;div class=&quot;swiper-wrapper&quot;&gt;
      &lt;div class=&quot;swiper-slide swiper-thumb&quot;&gt;
        &lt;div class=&quot;ratio ratio-1x1 bg-primary-subtle rounded&quot;&gt;
          &lt;div class=&quot;position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center fs-3 fw-semibold&quot;&gt;1&lt;/div&gt;
        &lt;/div&gt;
      &lt;/div&gt;
      &lt;div class=&quot;swiper-slide swiper-thumb&quot;&gt;
        &lt;div class=&quot;ratio ratio-1x1 bg-success-subtle rounded&quot;&gt;
          &lt;div class=&quot;position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center fs-3 fw-semibold&quot;&gt;2&lt;/div&gt;
        &lt;/div&gt;
      &lt;/div&gt;
      &lt;div class=&quot;swiper-slide swiper-thumb&quot;&gt;
        &lt;div class=&quot;ratio ratio-1x1 bg-warning-subtle rounded&quot;&gt;
          &lt;div class=&quot;position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center fs-3 fw-semibold&quot;&gt;3&lt;/div&gt;
        &lt;/div&gt;
      &lt;/div&gt;
      &lt;div class=&quot;swiper-slide swiper-thumb&quot;&gt;
        &lt;div class=&quot;ratio ratio-1x1 bg-danger-subtle rounded&quot;&gt;
          &lt;div class=&quot;position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center fs-3 fw-semibold&quot;&gt;4&lt;/div&gt;
        &lt;/div&gt;
      &lt;/div&gt;
      &lt;div class=&quot;swiper-slide swiper-thumb&quot;&gt;
        &lt;div class=&quot;ratio ratio-1x1 bg-info-subtle rounded&quot;&gt;
          &lt;div class=&quot;position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center fs-3 fw-semibold&quot;&gt;5&lt;/div&gt;
        &lt;/div&gt;
      &lt;/div&gt;
      &lt;div class=&quot;swiper-slide swiper-thumb&quot;&gt;
        &lt;div class=&quot;ratio ratio-1x1 bg-body-tertiary rounded&quot;&gt;
          &lt;div class=&quot;position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center fs-3 fw-semibold&quot;&gt;6&lt;/div&gt;
        &lt;/div&gt;
      &lt;/div&gt;
      &lt;div class=&quot;swiper-slide swiper-thumb&quot;&gt;
        &lt;div class=&quot;ratio ratio-1x1 bg-warning-subtle rounded&quot;&gt;
          &lt;div class=&quot;position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center fs-3 fw-semibold&quot;&gt;7&lt;/div&gt;
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


        <!-- Synchronized sliders -->
        <section id="carousel-sync" class="docs-section">
          <h4>Synchronized sliders</h4>
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
                  <div class="row align-items-center">
                    <div class="col-md-5 mb-4 mb-md-0 pb-1 pb-md-0">
                      <div class="swiper" id="images" data-swiper='{
                            "allowTouchMove": false,
                            "effect": "flip",
                            "flipEffect": {
                              "slideShadows": false
                            },
                            "loop": true
                          }'>
                        <div class="swiper-wrapper">
                          <div class="swiper-slide">
                            <div class="ratio ratio-4x3 bg-success-subtle rounded">
                              <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center display-5">
                                <i class="fi-image text-success opacity-75"></i>
                              </div>
                            </div>
                          </div>
                          <div class="swiper-slide">
                            <div class="ratio ratio-4x3 bg-warning-subtle rounded">
                              <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center display-5">
                                <i class="fi-image text-warning opacity-75"></i>
                              </div>
                            </div>
                          </div>
                          <div class="swiper-slide">
                            <div class="ratio ratio-4x3 bg-info-subtle rounded">
                              <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center display-5">
                                <i class="fi-image text-info opacity-75"></i>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-7 ps-xl-5">
                      <div class="swiper" data-swiper='{
                            "spaceBetween": 32,
                            "loop": true,
                            "speed": 400,
                            "controlSlider": "#images",
                            "navigation": {
                              "prevEl": "#prev-btn",
                              "nextEl": "#next-btn"
                            }
                          }'>
                        <div class="swiper-wrapper text-center text-md-start">
                          <div class="swiper-slide">
                            <h3>First slide</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque varius pulvinar dui eu ullamcorper. Donec a nisl sed felis pretium posuere ut vitae arcu.</p>
                          </div>
                          <div class="swiper-slide">
                            <h3>Second slide</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque varius pulvinar dui eu ullamcorper. Donec a nisl sed felis pretium posuere ut vitae arcu.</p>
                          </div>
                          <div class="swiper-slide">
                            <h3>Third slide</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque varius pulvinar dui eu ullamcorper. Donec a nisl sed felis pretium posuere ut vitae arcu.</p>
                          </div>
                        </div>
                      </div>
                      <div class="d-flex justify-content-center justify-content-md-start gap-2 pt-2">
                        <button type="button" class="btn btn-icon btn-outline-secondary animate-slide-start rounded-circle me-1" id="prev-btn" aria-label="Prev">
                          <i class="fi-chevron-left fs-lg animate-target"></i>
                        </button>
                        <button type="button" class="btn btn-icon btn-outline-secondary animate-slide-end rounded-circle" id="next-btn" aria-label="Next">
                          <i class="fi-chevron-right fs-lg animate-target"></i>
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
                <div id="html-6" class="tab-pane pt-4 fade" role="tabpanel">
                  <div class="position-relative" data-bs-theme="dark">
                    <button type="button" class="btn btn-sm btn-outline-secondary bg-dark position-absolute top-0 end-0 mt-2 px-2 z-3" data-copy-code="#carousel-sync-code">
                      <i class="fi-copy fs-sm me-1"></i>
                      Copy
                    </button>
                    <pre id="carousel-sync-code" class="code-highlight mx-n2 mb-n2"><code class="language-html">&lt;!-- Synchronized sliders example --&gt;
  &lt;div class=&quot;row align-items-center&quot;&gt;

    &lt;!-- Controlled slider --&gt;
    &lt;div class=&quot;col-md-5 mb-4 mb-md-0 pb-1 pb-md-0&quot;&gt;
      &lt;div class=&quot;swiper&quot; id=&quot;images&quot; data-swiper='{
        &quot;allowTouchMove&quot;: false,
        &quot;effect&quot;: &quot;flip&quot;,
        &quot;flipEffect&quot;: {
          &quot;slideShadows&quot;: false
        },
        &quot;loop&quot;: true
      }'&gt;
        &lt;div class=&quot;swiper-wrapper&quot;&gt;
          &lt;div class=&quot;swiper-slide&quot;&gt;
            &lt;div class=&quot;ratio ratio-4x3 bg-success-subtle rounded&quot;&gt;
              &lt;div class=&quot;position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center display-5&quot;&gt;
                &lt;i class=&quot;fi-image text-success opacity-75&quot;&gt;&lt;/i&gt;
              &lt;/div&gt;
            &lt;/div&gt;
          &lt;/div&gt;
          &lt;div class=&quot;swiper-slide&quot;&gt;
            &lt;div class=&quot;ratio ratio-4x3 bg-warning-subtle rounded&quot;&gt;
              &lt;div class=&quot;position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center display-5&quot;&gt;
                &lt;i class=&quot;fi-image text-warning opacity-75&quot;&gt;&lt;/i&gt;
              &lt;/div&gt;
            &lt;/div&gt;
          &lt;/div&gt;
          &lt;div class=&quot;swiper-slide&quot;&gt;
            &lt;div class=&quot;ratio ratio-4x3 bg-info-subtle rounded&quot;&gt;
              &lt;div class=&quot;position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center display-5&quot;&gt;
                &lt;i class=&quot;fi-image text-info opacity-75&quot;&gt;&lt;/i&gt;
              &lt;/div&gt;
            &lt;/div&gt;
          &lt;/div&gt;
        &lt;/div&gt;
      &lt;/div&gt;
    &lt;/div&gt;

    &lt;!-- Master slider --&gt;
    &lt;div class=&quot;col-md-7 ps-xl-5&quot;&gt;
      &lt;div class=&quot;swiper&quot; data-swiper='{
        &quot;spaceBetween&quot;: 32,
        &quot;loop&quot;: true,
        &quot;speed&quot;: 400,
        &quot;controlSlider&quot;: &quot;#images&quot;,
        &quot;navigation&quot;: {
          &quot;prevEl&quot;: &quot;#prev-btn&quot;,
          &quot;nextEl&quot;: &quot;#next-btn&quot;
        }
      }'&gt;
        &lt;div class=&quot;swiper-wrapper text-center text-md-start&quot;&gt;
          &lt;div class=&quot;swiper-slide&quot;&gt;
            &lt;h3&gt;First slide&lt;/h3&gt;
            &lt;p&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque varius pulvinar dui eu ullamcorper. Donec a nisl sed felis pretium posuere ut vitae arcu.&lt;/p&gt;
          &lt;/div&gt;
          &lt;div class=&quot;swiper-slide&quot;&gt;
            &lt;h3&gt;Second slide&lt;/h3&gt;
            &lt;p&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque varius pulvinar dui eu ullamcorper. Donec a nisl sed felis pretium posuere ut vitae arcu.&lt;/p&gt;
          &lt;/div&gt;
          &lt;div class=&quot;swiper-slide&quot;&gt;
            &lt;h3&gt;Third slide&lt;/h3&gt;
            &lt;p&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque varius pulvinar dui eu ullamcorper. Donec a nisl sed felis pretium posuere ut vitae arcu.&lt;/p&gt;
          &lt;/div&gt;
        &lt;/div&gt;
      &lt;/div&gt;
      &lt;div class=&quot;d-flex justify-content-center justify-content-md-start gap-2 pt-2&quot;&gt;
        &lt;button type=&quot;button&quot; class=&quot;btn btn-icon btn-outline-secondary animate-slide-start rounded-circle me-1&quot; id=&quot;prev-btn&quot; aria-label=&quot;Prev&quot;&gt;
          &lt;i class=&quot;fi-chevron-left fs-lg animate-target&quot;&gt;&lt;/i&gt;
        &lt;/button&gt;
        &lt;button type=&quot;button&quot; class=&quot;btn btn-icon btn-outline-secondary animate-slide-end rounded-circle&quot; id=&quot;next-btn&quot; aria-label=&quot;Next&quot;&gt;
          &lt;i class=&quot;fi-chevron-right fs-lg animate-target&quot;&gt;&lt;/i&gt;
        &lt;/button&gt;
      &lt;/div&gt;
    &lt;/div&gt;
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