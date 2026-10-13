@extends('layouts.app')

@section('title', 'Finder Docs | Countdown')

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
                  <div class="dropdown">
                    <span class="list-group-item list-group-item-action justify-content-between dropdown-toggle pe-3 pe-none active">
                      Countdown
                      <span class="visually-hidden">timer</span>
                    </span>
                    <ul id="anchorNav" class="nav nav-underline flex-column border-start ms-2 my-2" style="gap: .25rem;">
                      <li class="nav-item"><a class="nav-link fw-normal" href="#countdown-basic">Basic example</a></li>
                      <li class="nav-item"><a class="nav-link fw-normal" href="#countdown-no-years">Display no years</a></li>
                      <li class="nav-item"><a class="nav-link fw-normal" href="#countdown-sizing">Sizing</a></li>
                      <li class="nav-item"><a class="nav-link fw-normal" href="#countdown-colors">Colors</a></li>
                      <li class="nav-item"><a class="nav-link fw-normal" href="#countdown-cards">Cards example</a></li>
                    </ul>
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
        <section class="py-2 pb-md-2">
          <span class="badge d-inline-flex align-items-center text-info bg-info-subtle fw-semibold text-decoration-none py-2 px-3 mb-2 rounded-pill">Finder component</span>
          <h1 class="pt-1">Countdown</h1>
          <p class="text-body-secondary mb-4">A versatile timer that counts down to any specific date, displaying time remaining in years, days, hours, minutes, and seconds.</p>
        </section>


        <!-- Info alert -->
        <section class="alert d-sm-flex text-body-emphasis bg-info-subtle border-0 py-4 mb-5">
          <i class="fi-info text-info fs-4 mb-2 mb-sm-0"></i>
          <div class="ps-sm-3 pe-sm-5 w-100">
            <p>The Countdown component relies on the <a class="alert-link" href="https://github.com/letstri/timezz" target="_blank" rel="noreferrer">Timezz</a> plugin.</p>
            <h6 class="pt-2">Data attribute API</h6>
            <p class="mb-1">Finder adds extra layer of data attribute to access the date option of the plugin right from the HTML document:</p>
            <code>data-countdown-date='01/15/2025 12:00:00 UTC-08:00'</code>
            <span> - UTC offset can be positive (+) or negative (-).</span>
            <p class="pt-2 mb-2">More on <span class="fw-semibold">UTC offsets</span> by countries <a class="alert-link" href="https://en.wikipedia.org/wiki/Time_zone#List_of_UTC_offsets" target="_blank" rel="noopener">read here</a>.</p>
          </div>
        </section>


        <!-- Basic example -->
        <section id="countdown-basic" class="docs-section pb-sm-2 mb-5">
          <h4>Basic example</h4>
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
                  <div class="d-flex mb-2" data-countdown-date="10/15/2030 12:00:00">
                    <div class="text-center">
                      <div class="h4 mb-0" data-years></div>
                      <span class="fs-sm">years</span>
                    </div>
                    <span class="animate-blinking text-body-secondary fs-xl mx-2">:</span>
                    <div class="text-center">
                      <div class="h4 mb-0" data-days></div>
                      <span class="fs-sm">days</span>
                    </div>
                    <span class="animate-blinking text-body-secondary fs-xl mx-2">:</span>
                    <div class="text-center">
                      <div class="h4 mb-0" data-hours></div>
                      <span class="fs-sm">hours</span>
                    </div>
                    <span class="animate-blinking text-body-secondary fs-xl mx-2">:</span>
                    <div class="text-center">
                      <div class="h4 mb-0" data-minutes></div>
                      <span class="fs-sm">mins</span>
                    </div>
                    <span class="animate-blinking text-body-secondary fs-xl mx-2">:</span>
                    <div class="text-center">
                      <div class="h4 mb-0" data-seconds></div>
                      <span class="fs-sm">secs</span>
                    </div>
                  </div>
                </div>
                <div id="html-1" class="tab-pane pt-4 fade" role="tabpanel">
                  <div class="position-relative" data-bs-theme="dark">
                    <button type="button" class="btn btn-sm btn-outline-secondary bg-dark position-absolute top-0 end-0 mt-2 px-2 z-3" data-copy-code="#countdown-basic-code">
                      <i class="fi-copy fs-sm me-1"></i>
                      Copy
                    </button>
                    <pre id="countdown-basic-code" class="code-highlight mx-n2 mb-n2"><code class="language-html">&lt;!-- Basic countdown example --&gt;
    &lt;div class=&quot;d-flex&quot; data-countdown-date=&quot;10/15/2030 12:00:00&quot;&gt;
      &lt;div class=&quot;text-center&quot;&gt;
        &lt;div class=&quot;h4 mb-0&quot; data-years&gt;&lt;/div&gt;
        &lt;span class=&quot;fs-sm&quot;&gt;years&lt;/span&gt;
      &lt;/div&gt;
      &lt;span class=&quot;animate-blinking text-body-secondary fs-xl mx-2&quot;&gt;:&lt;/span&gt;
      &lt;div class=&quot;text-center&quot;&gt;
        &lt;div class=&quot;h4 mb-0&quot; data-days&gt;&lt;/div&gt;
        &lt;span class=&quot;fs-sm&quot;&gt;days&lt;/span&gt;
      &lt;/div&gt;
      &lt;span class=&quot;animate-blinking text-body-secondary fs-xl mx-2&quot;&gt;:&lt;/span&gt;
      &lt;div class=&quot;text-center&quot;&gt;
        &lt;div class=&quot;h4 mb-0&quot; data-hours&gt;&lt;/div&gt;
        &lt;span class=&quot;fs-sm&quot;&gt;hours&lt;/span&gt;
      &lt;/div&gt;
      &lt;span class=&quot;animate-blinking text-body-secondary fs-xl mx-2&quot;&gt;:&lt;/span&gt;
      &lt;div class=&quot;text-center&quot;&gt;
        &lt;div class=&quot;h4 mb-0&quot; data-minutes&gt;&lt;/div&gt;
        &lt;span class=&quot;fs-sm&quot;&gt;mins&lt;/span&gt;
      &lt;/div&gt;
      &lt;span class=&quot;animate-blinking text-body-secondary fs-xl mx-2&quot;&gt;:&lt;/span&gt;
      &lt;div class=&quot;text-center&quot;&gt;
        &lt;div class=&quot;h4 mb-0&quot; data-seconds&gt;&lt;/div&gt;
        &lt;span class=&quot;fs-sm&quot;&gt;secs&lt;/span&gt;
      &lt;/div&gt;
    &lt;/div&gt;</code></pre>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>


        <!-- Display no years -->
        <section id="countdown-no-years" class="docs-section pb-sm-2 mb-5">
          <h4>Display no years</h4>
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
                  <div class="d-flex mb-2" data-countdown-date="demoDate">
                    <div class="text-center">
                      <div class="h4 mb-0" data-days></div>
                      <span class="fs-sm">days</span>
                    </div>
                    <span class="animate-blinking text-body-secondary fs-xl mx-2">:</span>
                    <div class="text-center">
                      <div class="h4 mb-0" data-hours></div>
                      <span class="fs-sm">hours</span>
                    </div>
                    <span class="animate-blinking text-body-secondary fs-xl mx-2">:</span>
                    <div class="text-center">
                      <div class="h4 mb-0" data-minutes></div>
                      <span class="fs-sm">mins</span>
                    </div>
                    <span class="animate-blinking text-body-secondary fs-xl mx-2">:</span>
                    <div class="text-center">
                      <div class="h4 mb-0" data-seconds></div>
                      <span class="fs-sm">secs</span>
                    </div>
                  </div>
                </div>
                <div id="html-2" class="tab-pane pt-4 fade" role="tabpanel">
                  <div class="position-relative" data-bs-theme="dark">
                    <button type="button" class="btn btn-sm btn-outline-secondary bg-dark position-absolute top-0 end-0 mt-2 px-2 z-3" data-copy-code="#countdown-no-years-code">
                      <i class="fi-copy fs-sm me-1"></i>
                      Copy
                    </button>
                    <pre id="countdown-no-years-code" class="code-highlight mx-n2 mb-n2"><code class="language-html">&lt;!-- Countdown example without years label --&gt;
    &lt;div class=&quot;d-flex&quot; data-countdown-date=&quot;10/15/2025 12:00:00&quot;&gt;
      &lt;div class=&quot;text-center&quot;&gt;
        &lt;div class=&quot;h4 mb-0&quot; data-days&gt;&lt;/div&gt;
        &lt;span class=&quot;fs-sm&quot;&gt;days&lt;/span&gt;
      &lt;/div&gt;
      &lt;span class=&quot;animate-blinking text-body-secondary fs-xl mx-2&quot;&gt;:&lt;/span&gt;
      &lt;div class=&quot;text-center&quot;&gt;
        &lt;div class=&quot;h4 mb-0&quot; data-hours&gt;&lt;/div&gt;
        &lt;span class=&quot;fs-sm&quot;&gt;hours&lt;/span&gt;
      &lt;/div&gt;
      &lt;span class=&quot;animate-blinking text-body-secondary fs-xl mx-2&quot;&gt;:&lt;/span&gt;
      &lt;div class=&quot;text-center&quot;&gt;
        &lt;div class=&quot;h4 mb-0&quot; data-minutes&gt;&lt;/div&gt;
        &lt;span class=&quot;fs-sm&quot;&gt;mins&lt;/span&gt;
      &lt;/div&gt;
      &lt;span class=&quot;animate-blinking text-body-secondary fs-xl mx-2&quot;&gt;:&lt;/span&gt;
      &lt;div class=&quot;text-center&quot;&gt;
        &lt;div class=&quot;h4 mb-0&quot; data-seconds&gt;&lt;/div&gt;
        &lt;span class=&quot;fs-sm&quot;&gt;secs&lt;/span&gt;
      &lt;/div&gt;
    &lt;/div&gt;</code></pre>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>


        <!-- Sizing -->
        <section id="countdown-sizing" class="docs-section pb-sm-2 mb-5">
          <h4>Sizing</h4>
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
                  <div class="d-flex pb-2 mb-4" data-countdown-date="10/15/2030 12:00:00">
                    <div class="text-center">
                      <div class="h1 mb-0" data-years></div>
                      <span class="fs-lg">years</span>
                    </div>
                    <span class="animate-blinking text-body-secondary fs-3 mx-2">:</span>
                    <div class="text-center">
                      <div class="h1 mb-0" data-days></div>
                      <span class="fs-lg">days</span>
                    </div>
                    <span class="animate-blinking text-body-secondary fs-3 mx-2">:</span>
                    <div class="text-center">
                      <div class="h1 mb-0" data-hours></div>
                      <span class="fs-lg">hours</span>
                    </div>
                    <span class="animate-blinking text-body-secondary fs-3 mx-2">:</span>
                    <div class="text-center">
                      <div class="h1 mb-0" data-minutes></div>
                      <span class="fs-lg">mins</span>
                    </div>
                    <span class="animate-blinking text-body-secondary fs-3 mx-2">:</span>
                    <div class="text-center">
                      <div class="h1 mb-0" data-seconds></div>
                      <span class="fs-lg">secs</span>
                    </div>
                  </div>
                  <div class="d-flex pb-2 mb-4" data-countdown-date="10/15/2030 12:00:00">
                    <div class="text-center">
                      <div class="h2 mb-0" data-years></div>
                      <span>years</span>
                    </div>
                    <span class="animate-blinking text-body-secondary fs-4 mx-2">:</span>
                    <div class="text-center">
                      <div class="h2 mb-0" data-days></div>
                      <span>days</span>
                    </div>
                    <span class="animate-blinking text-body-secondary fs-4 mx-2">:</span>
                    <div class="text-center">
                      <div class="h2 mb-0" data-hours></div>
                      <span>hours</span>
                    </div>
                    <span class="animate-blinking text-body-secondary fs-4 mx-2">:</span>
                    <div class="text-center">
                      <div class="h2 mb-0" data-minutes></div>
                      <span>mins</span>
                    </div>
                    <span class="animate-blinking text-body-secondary fs-4 mx-2">:</span>
                    <div class="text-center">
                      <div class="h2 mb-0" data-seconds></div>
                      <span>secs</span>
                    </div>
                  </div>
                  <div class="d-flex pb-1 mb-4" data-countdown-date="10/15/2030 12:00:00">
                    <div class="text-center">
                      <div class="h3 mb-0" data-years></div>
                      <span class="fs-sm">years</span>
                    </div>
                    <span class="animate-blinking text-body-secondary fs-4 mx-2">:</span>
                    <div class="text-center">
                      <div class="h3 mb-0" data-days></div>
                      <span class="fs-sm">days</span>
                    </div>
                    <span class="animate-blinking text-body-secondary fs-4 mx-2">:</span>
                    <div class="text-center">
                      <div class="h3 mb-0" data-hours></div>
                      <span class="fs-sm">hours</span>
                    </div>
                    <span class="animate-blinking text-body-secondary fs-4 mx-2">:</span>
                    <div class="text-center">
                      <div class="h3 mb-0" data-minutes></div>
                      <span class="fs-sm">mins</span>
                    </div>
                    <span class="animate-blinking text-body-secondary fs-4 mx-2">:</span>
                    <div class="text-center">
                      <div class="h3 mb-0" data-seconds></div>
                      <span class="fs-sm">secs</span>
                    </div>
                  </div>
                  <div class="d-flex mb-4" data-countdown-date="10/15/2030 12:00:00">
                    <div class="text-center">
                      <div class="h4 mb-0" data-years></div>
                      <span class="fs-sm">years</span>
                    </div>
                    <span class="animate-blinking text-body-secondary fs-xl mx-2">:</span>
                    <div class="text-center">
                      <div class="h4 mb-0" data-days></div>
                      <span class="fs-sm">days</span>
                    </div>
                    <span class="animate-blinking text-body-secondary fs-xl mx-2">:</span>
                    <div class="text-center">
                      <div class="h4 mb-0" data-hours></div>
                      <span class="fs-sm">hours</span>
                    </div>
                    <span class="animate-blinking text-body-secondary fs-xl mx-2">:</span>
                    <div class="text-center">
                      <div class="h4 mb-0" data-minutes></div>
                      <span class="fs-sm">mins</span>
                    </div>
                    <span class="animate-blinking text-body-secondary fs-xl mx-2">:</span>
                    <div class="text-center">
                      <div class="h4 mb-0" data-seconds></div>
                      <span class="fs-sm">secs</span>
                    </div>
                  </div>
                  <div class="d-flex mb-4" data-countdown-date="10/15/2030 12:00:00">
                    <div class="text-center">
                      <div class="h5 mb-0" data-years></div>
                      <span class="fs-xs">years</span>
                    </div>
                    <span class="animate-blinking text-body-secondary fs-lg mx-2">:</span>
                    <div class="text-center">
                      <div class="h5 mb-0" data-days></div>
                      <span class="fs-xs">days</span>
                    </div>
                    <span class="animate-blinking text-body-secondary fs-lg mx-2">:</span>
                    <div class="text-center">
                      <div class="h5 mb-0" data-hours></div>
                      <span class="fs-xs">hours</span>
                    </div>
                    <span class="animate-blinking text-body-secondary fs-lg mx-2">:</span>
                    <div class="text-center">
                      <div class="h5 mb-0" data-minutes></div>
                      <span class="fs-xs">mins</span>
                    </div>
                    <span class="animate-blinking text-body-secondary fs-lg mx-2">:</span>
                    <div class="text-center">
                      <div class="h5 mb-0" data-seconds></div>
                      <span class="fs-xs">secs</span>
                    </div>
                  </div>
                  <div class="d-flex mb-2" data-countdown-date="10/15/2030 12:00:00">
                    <div class="text-center">
                      <div class="h6 mb-0" data-years></div>
                      <span class="fs-xs">years</span>
                    </div>
                    <span class="animate-blinking text-body-secondary mt-n1 mx-2">:</span>
                    <div class="text-center">
                      <div class="h6 mb-0" data-days></div>
                      <span class="fs-xs">days</span>
                    </div>
                    <span class="animate-blinking text-body-secondary mt-n1 mx-2">:</span>
                    <div class="text-center">
                      <div class="h6 mb-0" data-hours></div>
                      <span class="fs-xs">hours</span>
                    </div>
                    <span class="animate-blinking text-body-secondary mt-n1 mx-2">:</span>
                    <div class="text-center">
                      <div class="h6 mb-0" data-minutes></div>
                      <span class="fs-xs">mins</span>
                    </div>
                    <span class="animate-blinking text-body-secondary mt-n1 mx-2">:</span>
                    <div class="text-center">
                      <div class="h6 mb-0" data-seconds></div>
                      <span class="fs-xs">secs</span>
                    </div>
                  </div>
                </div>
                <div id="html-3" class="tab-pane pt-4 fade" role="tabpanel">
                  <div class="position-relative" data-bs-theme="dark">
                    <button type="button" class="btn btn-sm btn-outline-secondary bg-dark position-absolute top-0 end-0 mt-2 px-2 z-3" data-copy-code="#countdown-sizing-code">
                      <i class="fi-copy fs-sm me-1"></i>
                      Copy
                    </button>
                    <pre id="countdown-sizing-code" class="code-highlight mx-n2 mb-n2"><code class="language-html">&lt;!-- Sizing --&gt;
    &lt;!-- To adjust the size of the countdown, apply heading classes (.h1, .h2, .h3, ..., .display-1, .display-2, .display-3, ...) to the numbers and body size classes (.fs-xs, .fs-sm, .fs-lg, ...) to the labels. --&gt;
    &lt;div class=&quot;d-flex&quot; data-countdown-date=&quot;10/15/2030 12:00:00&quot;&gt;
      &lt;div class=&quot;text-center&quot;&gt;
        &lt;div class=&quot;h1 mb-0&quot; data-days&gt;&lt;/div&gt;
        &lt;span class=&quot;fs-lg&quot;&gt;days&lt;/span&gt;
      &lt;/div&gt;
      &lt;span class=&quot;animate-blinking text-body-secondary fs-3 mx-2&quot;&gt;:&lt;/span&gt;
    &lt;/div&gt;

    &lt;div class=&quot;d-flex&quot; data-countdown-date=&quot;10/15/2030 12:00:00&quot;&gt;
      &lt;div class=&quot;text-center&quot;&gt;
        &lt;div class=&quot;h2 mb-0&quot; data-days&gt;&lt;/div&gt;
        &lt;span&gt;days&lt;/span&gt;
      &lt;/div&gt;
      &lt;span class=&quot;animate-blinking text-body-secondary fs-4 mx-2&quot;&gt;:&lt;/span&gt;
    &lt;/div&gt;

    &lt;div class=&quot;d-flex&quot; data-countdown-date=&quot;10/15/2030 12:00:00&quot;&gt;
      &lt;div class=&quot;text-center&quot;&gt;
        &lt;div class=&quot;h3 mb-0&quot; data-days&gt;&lt;/div&gt;
        &lt;span class=&quot;fs-sm&quot;&gt;days&lt;/span&gt;
      &lt;/div&gt;
      &lt;span class=&quot;animate-blinking text-body-secondary fs-4 mx-2&quot;&gt;:&lt;/span&gt;
    &lt;/div&gt;

    &lt;div class=&quot;d-flex&quot; data-countdown-date=&quot;10/15/2030 12:00:00&quot;&gt;
      &lt;div class=&quot;text-center&quot;&gt;
        &lt;div class=&quot;h4 mb-0&quot; data-days&gt;&lt;/div&gt;
        &lt;span class=&quot;fs-sm&quot;&gt;days&lt;/span&gt;
      &lt;/div&gt;
      &lt;span class=&quot;animate-blinking text-body-secondary fs-xl mx-2&quot;&gt;:&lt;/span&gt;
    &lt;/div&gt;

    &lt;div class=&quot;d-flex&quot; data-countdown-date=&quot;10/15/2030 12:00:00&quot;&gt;
      &lt;div class=&quot;text-center&quot;&gt;
        &lt;div class=&quot;h5 mb-0&quot; data-days&gt;&lt;/div&gt;
        &lt;span class=&quot;fs-xs&quot;&gt;days&lt;/span&gt;
      &lt;/div&gt;
      &lt;span class=&quot;animate-blinking text-body-secondary fs-lg mx-2&quot;&gt;:&lt;/span&gt;
    &lt;/div&gt;

    &lt;div class=&quot;d-flex mb-2&quot; data-countdown-date=&quot;10/15/2030 12:00:00&quot;&gt;
      &lt;div class=&quot;text-center&quot;&gt;
        &lt;div class=&quot;h6 mb-0&quot; data-days&gt;&lt;/div&gt;
        &lt;span class=&quot;fs-xs&quot;&gt;days&lt;/span&gt;
      &lt;/div&gt;
      &lt;span class=&quot;animate-blinking text-body-secondary mt-n1 mx-2&quot;&gt;:&lt;/span&gt;
    &lt;/div&gt;</code></pre>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>


        <!-- Colors -->
        <section id="countdown-colors" class="docs-section pb-sm-2 mb-5">
          <h4>Colors</h4>
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
                  <div class="d-flex mb-2" data-countdown-date="10/15/2030 12:00:00">
                    <div class="text-center">
                      <div class="h4 text-primary mb-0" data-years></div>
                      <span class="fs-sm text-primary opacity-75">years</span>
                    </div>
                    <span class="animate-blinking text-body-secondary fs-xl mx-2">:</span>
                    <div class="text-center">
                      <div class="h4 text-success mb-0" data-days></div>
                      <span class="fs-sm text-success opacity-75">days</span>
                    </div>
                    <span class="animate-blinking text-body-secondary fs-xl mx-2">:</span>
                    <div class="text-center">
                      <div class="h4 text-warning mb-0" data-hours></div>
                      <span class="fs-sm text-warning opacity-75">hours</span>
                    </div>
                    <span class="animate-blinking text-body-secondary fs-xl mx-2">:</span>
                    <div class="text-center">
                      <div class="h4 text-danger mb-0" data-minutes></div>
                      <span class="fs-sm text-danger opacity-75">mins</span>
                    </div>
                    <span class="animate-blinking text-body-secondary fs-xl mx-2">:</span>
                    <div class="text-center">
                      <div class="h4 text-info mb-0" data-seconds></div>
                      <span class="fs-sm text-info opacity-75">secs</span>
                    </div>
                  </div>
                </div>
                <div id="html-4" class="tab-pane pt-4 fade" role="tabpanel">
                  <div class="position-relative" data-bs-theme="dark">
                    <button type="button" class="btn btn-sm btn-outline-secondary bg-dark position-absolute top-0 end-0 mt-2 px-2 z-3" data-copy-code="#countdown-colors-code">
                      <i class="fi-copy fs-sm me-1"></i>
                      Copy
                    </button>
                    <pre id="countdown-colors-code" class="code-highlight mx-n2 mb-n2"><code class="language-html">&lt;!-- Supports a predefined color palette or can be configured to use any custom color. --&gt;
    &lt;div class=&quot;d-flex&quot; data-countdown-date=&quot;10/15/2030 12:00:00&quot;&gt;

      &lt;!-- Primary --&gt;
      &lt;div class=&quot;text-center&quot;&gt;
        &lt;div class=&quot;h4 text-primary mb-0&quot; data-years&gt;&lt;/div&gt;
        &lt;span class=&quot;fs-sm text-primary opacity-75&quot;&gt;years&lt;/span&gt;
      &lt;/div&gt;
      &lt;span class=&quot;animate-blinking text-body-secondary fs-xl mx-2&quot;&gt;:&lt;/span&gt;

      &lt;!-- Success --&gt;
      &lt;div class=&quot;text-center&quot;&gt;
        &lt;div class=&quot;h4 text-success mb-0&quot; data-days&gt;&lt;/div&gt;
        &lt;span class=&quot;fs-sm text-success opacity-75&quot;&gt;days&lt;/span&gt;
      &lt;/div&gt;
      &lt;span class=&quot;animate-blinking text-body-secondary fs-xl mx-2&quot;&gt;:&lt;/span&gt;

      &lt;!-- Warning --&gt;
      &lt;div class=&quot;text-center&quot;&gt;
        &lt;div class=&quot;h4 text-warning mb-0&quot; data-hours&gt;&lt;/div&gt;
        &lt;span class=&quot;fs-sm text-warning opacity-75&quot;&gt;hours&lt;/span&gt;
      &lt;/div&gt;
      &lt;span class=&quot;animate-blinking text-body-secondary fs-xl mx-2&quot;&gt;:&lt;/span&gt;

      &lt;!-- Danger --&gt;
      &lt;div class=&quot;text-center&quot;&gt;
        &lt;div class=&quot;h4 text-danger mb-0&quot; data-minutes&gt;&lt;/div&gt;
        &lt;span class=&quot;fs-sm text-danger opacity-75&quot;&gt;mins&lt;/span&gt;
      &lt;/div&gt;
      &lt;span class=&quot;animate-blinking text-body-secondary fs-xl mx-2&quot;&gt;:&lt;/span&gt;

      &lt;!-- Info --&gt;
      &lt;div class=&quot;text-center&quot;&gt;
        &lt;div class=&quot;h4 text-info mb-0&quot; data-seconds&gt;&lt;/div&gt;
        &lt;span class=&quot;fs-sm text-info opacity-75&quot;&gt;secs&lt;/span&gt;
      &lt;/div&gt;
    &lt;/div&gt;</code></pre>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>


        <!-- Cards example -->
        <section id="countdown-cards" class="docs-section">
          <h4>Cards example</h4>
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
                  <div class="d-flex flex-wrap pb-4" data-countdown-date="10/15/2030 12:00:00">
                    <div class="text-center mb-2">
                      <div class="border rounded p-2">
                        <div class="h3 fw-medium mb-0 mx-1" data-years></div>
                      </div>
                      <span class="fs-sm">years</span>
                    </div>
                    <span class="animate-blinking text-body-secondary fs-2 mx-2">:</span>
                    <div class="text-center mb-2">
                      <div class="border rounded p-2">
                        <div class="h3 fw-medium mb-0 mx-1" data-days></div>
                      </div>
                      <span class="fs-sm">days</span>
                    </div>
                    <span class="animate-blinking text-body-secondary fs-2 mx-2">:</span>
                    <div class="text-center mb-2">
                      <div class="border rounded p-2">
                        <div class="h3 fw-medium mb-0 mx-1" data-hours></div>
                      </div>
                      <span class="fs-sm">hours</span>
                    </div>
                    <span class="animate-blinking text-body-secondary fs-2 mx-2">:</span>
                    <div class="text-center mb-2">
                      <div class="border rounded p-2">
                        <div class="h3 fw-medium mb-0 mx-1" data-minutes></div>
                      </div>
                      <span class="fs-sm">mins</span>
                    </div>
                    <span class="animate-blinking text-body-secondary fs-2 mx-2">:</span>
                    <div class="text-center mb-2">
                      <div class="border rounded p-2">
                        <div class="h3 fw-medium mb-0 mx-1" data-seconds></div>
                      </div>
                      <span class="fs-sm">secs</span>
                    </div>
                  </div>
                  <div class="bg-body-tertiary p-3 mb-4">
                    <div class="d-flex flex-wrap" data-countdown-date="10/15/2030 12:00:00">
                      <div class="text-center mb-2">
                        <div class="bg-body rounded shadow-sm p-2">
                          <div class="h3 fw-medium mb-0 mx-1" data-years></div>
                        </div>
                        <span class="fs-sm">years</span>
                      </div>
                      <span class="animate-blinking text-body-secondary fs-2 mx-2">:</span>
                      <div class="text-center mb-2">
                        <div class="bg-body rounded shadow-sm p-2">
                          <div class="h3 fw-medium mb-0 mx-1" data-days></div>
                        </div>
                        <span class="fs-sm">days</span>
                      </div>
                      <span class="animate-blinking text-body-secondary fs-2 mx-2">:</span>
                      <div class="text-center mb-2">
                        <div class="bg-body rounded shadow-sm p-2">
                          <div class="h3 fw-medium mb-0 mx-1" data-hours></div>
                        </div>
                        <span class="fs-sm">hours</span>
                      </div>
                      <span class="animate-blinking text-body-secondary fs-2 mx-2">:</span>
                      <div class="text-center mb-2">
                        <div class="bg-body rounded shadow-sm p-2">
                          <div class="h3 fw-medium mb-0 mx-1" data-minutes></div>
                        </div>
                        <span class="fs-sm">mins</span>
                      </div>
                      <span class="animate-blinking text-body-secondary fs-2 mx-2">:</span>
                      <div class="text-center mb-2">
                        <div class="bg-body rounded shadow-sm p-2">
                          <div class="h3 fw-medium mb-0 mx-1" data-seconds></div>
                        </div>
                        <span class="fs-sm">secs</span>
                      </div>
                    </div>
                  </div>
                  <div class="d-flex flex-wrap pt-2 pb-4" data-countdown-date="10/15/2030 12:00:00">
                    <div class="text-center mb-2">
                      <div class="bg-body-secondary rounded p-2">
                        <div class="h3 fw-medium mb-0 mx-1" data-years></div>
                      </div>
                      <span class="fs-sm">years</span>
                    </div>
                    <span class="blinking text-body-secondary fs-2 mx-2">:</span>
                    <div class="text-center mb-2">
                      <div class="bg-body-secondary rounded p-2">
                        <div class="h3 fw-medium mb-0 mx-1" data-days></div>
                      </div>
                      <span class="fs-sm">days</span>
                    </div>
                    <span class="blinking text-body-secondary fs-2 mx-2">:</span>
                    <div class="text-center mb-2">
                      <div class="bg-body-secondary rounded p-2">
                        <div class="h3 fw-medium mb-0 mx-1" data-hours></div>
                      </div>
                      <span class="fs-sm">hours</span>
                    </div>
                    <span class="blinking text-body-secondary fs-2 mx-2">:</span>
                    <div class="text-center mb-2">
                      <div class="bg-body-secondary rounded p-2">
                        <div class="h3 fw-medium mb-0 mx-1" data-minutes></div>
                      </div>
                      <span class="fs-sm">mins</span>
                    </div>
                    <span class="blinking text-body-secondary fs-2 mx-2">:</span>
                    <div class="text-center mb-2">
                      <div class="bg-body-secondary rounded p-2">
                        <div class="h3 fw-medium mb-0 mx-1" data-seconds></div>
                      </div>
                      <span class="fs-sm">secs</span>
                    </div>
                  </div>
                  <div class="d-flex flex-wrap pt-2" data-countdown-date="10/15/2030 12:00:00">
                    <div class="text-center mb-2">
                      <div class="bg-warning-subtle rounded p-2">
                        <div class="text-warning h3 fw-medium mb-0 mx-1" data-years></div>
                      </div>
                      <span class="text-warning fs-sm">years</span>
                    </div>
                    <span class="blinking text-body-secondary fs-2 mx-2">:</span>
                    <div class="text-center mb-2">
                      <div class="bg-primary-subtle rounded p-2">
                        <div class="text-primary h3 fw-medium mb-0 mx-1" data-days></div>
                      </div>
                      <span class="text-primary fs-sm">days</span>
                    </div>
                    <span class="blinking text-body-secondary fs-2 mx-2">:</span>
                    <div class="text-center mb-2">
                      <div class="bg-info-subtle rounded p-2">
                        <div class="text-info h3 fw-medium mb-0 mx-1" data-hours></div>
                      </div>
                      <span class="text-info fs-sm">hours</span>
                    </div>
                    <span class="blinking text-body-secondary fs-2 mx-2">:</span>
                    <div class="text-center mb-2">
                      <div class="bg-danger-subtle rounded p-2">
                        <div class="text-danger h3 fw-medium mb-0 mx-1" data-minutes></div>
                      </div>
                      <span class="text-danger fs-sm">mins</span>
                    </div>
                    <span class="blinking text-body-secondary fs-2 mx-2">:</span>
                    <div class="text-center mb-2">
                      <div class="bg-success-subtle rounded p-2">
                        <div class="text-success h3 fw-medium mb-0 mx-1" data-seconds></div>
                      </div>
                      <span class="text-success fs-sm">secs</span>
                    </div>
                  </div>
                </div>
                <div id="html-5" class="tab-pane pt-4 fade" role="tabpanel">
                  <div class="position-relative" data-bs-theme="dark">
                    <button type="button" class="btn btn-sm btn-outline-secondary bg-dark position-absolute top-0 end-0 mt-2 px-2 z-3" data-copy-code="#countdown-cards-code">
                      <i class="fi-copy fs-sm me-1"></i>
                      Copy
                    </button>
                    <pre id="countdown-cards-code" class="code-highlight mx-n2 mb-n2"><code class="language-html">&lt;!-- Different card styles --&gt;
    &lt;!-- Border --&gt;
    &lt;div class="d-flex flex-wrap" data-countdown-date="10/15/2030 12:00:00"&gt;
      &lt;div class="text-center mb-2"&gt;
        &lt;div class="border rounded p-2"&gt;
          &lt;div class="h3 fw-medium mb-0 mx-1" data-years&gt;&lt;/div&gt;
        &lt;/div&gt;
        &lt;span class="fs-sm"&gt;years&lt;/span&gt;
      &lt;/div&gt;
      &lt;span class="animate-blinking text-body-secondary fs-2 mx-2"&gt;:&lt;/span&gt;
      &lt;div class="text-center mb-2"&gt;
        &lt;div class="border rounded p-2"&gt;
          &lt;div class="h3 fw-medium mb-0 mx-1" data-days&gt;&lt;/div&gt;
        &lt;/div&gt;
        &lt;span class="fs-sm"&gt;days&lt;/span&gt;
      &lt;/div&gt;
      &lt;span class="animate-blinking text-body-secondary fs-2 mx-2"&gt;:&lt;/span&gt;
      &lt;div class="text-center mb-2"&gt;
        &lt;div class="border rounded p-2"&gt;
          &lt;div class="h3 fw-medium mb-0 mx-1" data-hours&gt;&lt;/div&gt;
        &lt;/div&gt;
        &lt;span class="fs-sm"&gt;hours&lt;/span&gt;
      &lt;/div&gt;
      &lt;span class="animate-blinking text-body-secondary fs-2 mx-2"&gt;:&lt;/span&gt;
      &lt;div class="text-center mb-2"&gt;
        &lt;div class="border rounded p-2"&gt;
          &lt;div class="h3 fw-medium mb-0 mx-1" data-minutes&gt;&lt;/div&gt;
        &lt;/div&gt;
        &lt;span class="fs-sm"&gt;mins&lt;/span&gt;
      &lt;/div&gt;
      &lt;span class="animate-blinking text-body-secondary fs-2 mx-2"&gt;:&lt;/span&gt;
      &lt;div class="text-center mb-2"&gt;
        &lt;div class="border rounded p-2"&gt;
          &lt;div class="h3 fw-medium mb-0 mx-1" data-seconds&gt;&lt;/div&gt;
        &lt;/div&gt;
        &lt;span class="fs-sm"&gt;secs&lt;/span&gt;
      &lt;/div&gt;
    &lt;/div&gt;

    &lt;!-- Body background + shadow --&gt;
    &lt;div class="d-flex flex-wrap" data-countdown-date="10/15/2030 12:00:00"&gt;
      &lt;div class="text-center mb-2"&gt;
        &lt;div class="bg-body rounded shadow-sm p-2"&gt;
          &lt;div class="h3 fw-medium mb-0 mx-1" data-years&gt;&lt;/div&gt;
        &lt;/div&gt;
        &lt;span class="fs-sm"&gt;years&lt;/span&gt;
      &lt;/div&gt;
      &lt;span class="animate-blinking text-body-secondary fs-2 mx-2"&gt;:&lt;/span&gt;
      &lt;div class="text-center mb-2"&gt;
        &lt;div class="bg-body rounded shadow-sm p-2"&gt;
          &lt;div class="h3 fw-medium mb-0 mx-1" data-days&gt;&lt;/div&gt;
        &lt;/div&gt;
        &lt;span class="fs-sm"&gt;days&lt;/span&gt;
      &lt;/div&gt;
      &lt;span class="animate-blinking text-body-secondary fs-2 mx-2"&gt;:&lt;/span&gt;
      &lt;div class="text-center mb-2"&gt;
        &lt;div class="bg-body rounded shadow-sm p-2"&gt;
          &lt;div class="h3 fw-medium mb-0 mx-1" data-hours&gt;&lt;/div&gt;
        &lt;/div&gt;
        &lt;span class="fs-sm"&gt;hours&lt;/span&gt;
      &lt;/div&gt;
      &lt;span class="animate-blinking text-body-secondary fs-2 mx-2"&gt;:&lt;/span&gt;
      &lt;div class="text-center mb-2"&gt;
        &lt;div class="bg-body rounded shadow-sm p-2"&gt;
          &lt;div class="h3 fw-medium mb-0 mx-1" data-minutes&gt;&lt;/div&gt;
        &lt;/div&gt;
        &lt;span class="fs-sm"&gt;mins&lt;/span&gt;
      &lt;/div&gt;
      &lt;span class="animate-blinking text-body-secondary fs-2 mx-2"&gt;:&lt;/span&gt;
      &lt;div class="text-center mb-2"&gt;
        &lt;div class="bg-body rounded shadow-sm p-2"&gt;
          &lt;div class="h3 fw-medium mb-0 mx-1" data-seconds&gt;&lt;/div&gt;
        &lt;/div&gt;
        &lt;span class="fs-sm"&gt;secs&lt;/span&gt;
      &lt;/div&gt;
    &lt;/div&gt;

    &lt;!-- Secondary background --&gt;
    &lt;div class="d-flex flex-wrap" data-countdown-date="10/15/2030 12:00:00"&gt;
      &lt;div class="text-center mb-2"&gt;
        &lt;div class="bg-body-secondary rounded p-2"&gt;
          &lt;div class="h3 fw-medium mb-0 mx-1" data-years&gt;&lt;/div&gt;
        &lt;/div&gt;
        &lt;span class="fs-sm"&gt;years&lt;/span&gt;
      &lt;/div&gt;
      &lt;span class="blinking text-body-secondary fs-2 mx-2"&gt;:&lt;/span&gt;
      &lt;div class="text-center mb-2"&gt;
        &lt;div class="bg-body-secondary rounded p-2"&gt;
          &lt;div class="h3 fw-medium mb-0 mx-1" data-days&gt;&lt;/div&gt;
        &lt;/div&gt;
        &lt;span class="fs-sm"&gt;days&lt;/span&gt;
      &lt;/div&gt;
      &lt;span class="blinking text-body-secondary fs-2 mx-2"&gt;:&lt;/span&gt;
      &lt;div class="text-center mb-2"&gt;
        &lt;div class="bg-body-secondary rounded p-2"&gt;
          &lt;div class="h3 fw-medium mb-0 mx-1" data-hours&gt;&lt;/div&gt;
        &lt;/div&gt;
        &lt;span class="fs-sm"&gt;hours&lt;/span&gt;
      &lt;/div&gt;
      &lt;span class="blinking text-body-secondary fs-2 mx-2"&gt;:&lt;/span&gt;
      &lt;div class="text-center mb-2"&gt;
        &lt;div class="bg-body-secondary rounded p-2"&gt;
          &lt;div class="h3 fw-medium mb-0 mx-1" data-minutes&gt;&lt;/div&gt;
        &lt;/div&gt;
        &lt;span class="fs-sm"&gt;mins&lt;/span&gt;
      &lt;/div&gt;
      &lt;span class="blinking text-body-secondary fs-2 mx-2"&gt;:&lt;/span&gt;
      &lt;div class="text-center mb-2"&gt;
        &lt;div class="bg-body-secondary rounded p-2"&gt;
          &lt;div class="h3 fw-medium mb-0 mx-1" data-seconds&gt;&lt;/div&gt;
        &lt;/div&gt;
        &lt;span class="fs-sm"&gt;secs&lt;/span&gt;
      &lt;/div&gt;
    &lt;/div&gt;

    &lt;!-- Theme subtle backgrounds + color --&gt;
    &lt;div class="d-flex flex-wrap" data-countdown-date="10/15/2030 12:00:00"&gt;
      &lt;div class="text-center mb-2"&gt;
        &lt;div class="bg-warning-subtle rounded p-2"&gt;
          &lt;div class="text-warning h3 fw-medium mb-0 mx-1" data-years&gt;&lt;/div&gt;
        &lt;/div&gt;
        &lt;span class="text-warning fs-sm"&gt;years&lt;/span&gt;
      &lt;/div&gt;
      &lt;span class="blinking text-body-secondary fs-2 mx-2"&gt;:&lt;/span&gt;
      &lt;div class="text-center mb-2"&gt;
        &lt;div class="bg-primary-subtle rounded p-2"&gt;
          &lt;div class="text-primary h3 fw-medium mb-0 mx-1" data-days&gt;&lt;/div&gt;
        &lt;/div&gt;
        &lt;span class="text-primary fs-sm"&gt;days&lt;/span&gt;
      &lt;/div&gt;
      &lt;span class="blinking text-body-secondary fs-2 mx-2"&gt;:&lt;/span&gt;
      &lt;div class="text-center mb-2"&gt;
        &lt;div class="bg-info-subtle rounded p-2"&gt;
          &lt;div class="text-info h3 fw-medium mb-0 mx-1" data-hours&gt;&lt;/div&gt;
        &lt;/div&gt;
        &lt;span class="text-info fs-sm"&gt;hours&lt;/span&gt;
      &lt;/div&gt;
      &lt;span class="blinking text-body-secondary fs-2 mx-2"&gt;:&lt;/span&gt;
      &lt;div class="text-center mb-2"&gt;
        &lt;div class="bg-danger-subtle rounded p-2"&gt;
          &lt;div class="text-danger h3 fw-medium mb-0 mx-1" data-minutes&gt;&lt;/div&gt;
        &lt;/div&gt;
        &lt;span class="text-danger fs-sm"&gt;mins&lt;/span&gt;
      &lt;/div&gt;
      &lt;span class="blinking text-body-secondary fs-2 mx-2"&gt;:&lt;/span&gt;
      &lt;div class="text-center mb-2"&gt;
        &lt;div class="bg-success-subtle rounded p-2"&gt;
          &lt;div class="text-success h3 fw-medium mb-0 mx-1" data-seconds&gt;&lt;/div&gt;
        &lt;/div&gt;
        &lt;span class="text-success fs-sm"&gt;secs&lt;/span&gt;
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