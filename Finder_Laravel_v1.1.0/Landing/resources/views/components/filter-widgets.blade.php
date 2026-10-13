@extends('layouts.app')

@section('title', 'Finder Docs | Shop filters')

@push('styles')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/styles/atom-one-dark.min.css">
  <link rel="stylesheet" href="{{ asset('assets/vendor/simplebar/dist/simplebar.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/vendor/nouislider/dist/nouislider.min.css') }}">

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
                  <div class="dropdown">
                    <span class="list-group-item list-group-item-action justify-content-between dropdown-toggle pe-3 pe-none active">
                      Filter widgets
                      <span class="visually-hidden">sidebar sort</span>
                    </span>
                    <ul id="anchorNav" class="nav nav-underline flex-column border-start ms-2 my-2" style="gap: .25rem;">
                      <li class="nav-item"><a class="nav-link fw-normal" href="#filter-checkboxes">Checkboxes</a></li>
                      <li class="nav-item"><a class="nav-link fw-normal" href="#filter-button-toggles">Button toggles</a></li>
                      <li class="nav-item"><a class="nav-link fw-normal" href="#filter-links">Links</a></li>
                      <li class="nav-item"><a class="nav-link fw-normal" href="#filter-range-slider">Range slider</a></li>
                      <li class="nav-item"><a class="nav-link fw-normal" href="#filter-selected">Selected filters</a></li>
                    </ul>
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
          <h1 class="pt-1">Filter widgets</h1>
          <p class="text-body-secondary mb-4">Filter widgets for the sidebar, allowing users to refine listings based on various attributes like price, brand, type, etc.</p>
        </section>


        <!-- Info alert -->
        <section class="alert d-sm-flex text-body-emphasis bg-info-subtle border-0 py-4 mb-5">
          <i class="fi-info text-info fs-4 mb-2 mb-sm-0"></i>
          <div class="ps-sm-3 pe-sm-5 w-100">
            <p>Several filter components utilize third-party plugins for enhanced functionality:</p>
            <ul>
              <li>The <span class="fw-semibold">range slider</span> is powered by the <a class="alert-link" href="https://refreshless.com/nouislider/" target="_blank" rel="noreferrer">noUISlider</a> plugin.</li>
              <li>The <span class="fw-semibold">search bar</span> integrates with the <a class="alert-link" href="https://listjs.com/" target="_blank" rel="noreferrer">List.js</a> plugin.</li>
              <li>The <span class="fw-semibold">custom scrollbar</span> is implemented using the <a class="alert-link" href="http://grsmto.github.io/simplebar/" target="_blank" rel="noreferrer">SimpleBar</a> plugin.</li>
            </ul>
            <p>Ensure that you include the necessary references to the plugin's CSS and JavaScript files.</p>
            <p class="mb-2">CSS files are linked in the <code>&lt;head&gt;</code> section and above <code>theme.min.css</code> reference in your document:</p>
            <pre class="code-highlight border mb-3" data-bs-theme="dark"><code class="language-html">&lt;link rel=&quot;stylesheet&quot; href=&quot;assets/vendor/nouislider/dist/nouislider.min.css&quot;&gt;
    &lt;link rel=&quot;stylesheet&quot; href=&quot;assets/vendor/simplebar/dist/simplebar.min.css&quot;&gt;</code></pre>
            <p class="mb-2">JavaScript files are linked before the closing <code>&lt;/body&gt;</code> tag and above <code>theme.min.js</code> reference in your document:</p>
            <pre class="code-highlight border" data-bs-theme="dark"><code class="language-html">&lt;script src=&quot;assets/vendor/nouislider/dist/nouislider.min.js&quot;&gt;&lt;/script&gt;
    &lt;script src=&quot;assets/vendor/list.js/dist/list.min.js&quot;&gt;&lt;/script&gt;
    &lt;script src=&quot;assets/vendor/simplebar/dist/simplebar.min.js&quot;&gt;&lt;/script&gt;</code></pre>
          </div>
        </section>


        <!-- Checkboxes -->
        <section id="filter-checkboxes" class="docs-section pb-sm-2 mb-5">
          <h4>Checkboxes</h4>
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
                  <div style="max-width: 280px">
                    <h4 class="h6">Project type</h4>
                    <div data-filter-list='{"searchClass": "project-search", "listClass": "project-list", "valueNames": ["form-check-label"]}'>
                      <div class="position-relative mb-3">
                        <i class="fi-search position-absolute top-50 start-0 translate-middle-y ms-3"></i>
                        <input type="search" class="project-search form-control form-icon-start" placeholder="Search">
                      </div>
                      <div style="height: 215px" data-simplebar data-simplebar-auto-hide="false">
                        <div class="project-list d-flex flex-column gap-2">
                          <div class="form-check mb-0">
                            <input type="checkbox" class="form-check-input" id="bathtub-repair" checked>
                            <label for="bathtub-repair" class="form-check-label">
                              Bathtub repair
                            </label>
                          </div>
                          <div class="form-check mb-0">
                            <input type="checkbox" class="form-check-input" id="door-repair">
                            <label for="door-repair" class="form-check-label">
                              Door repair
                            </label>
                          </div>
                          <div class="form-check mb-0">
                            <input type="checkbox" class="form-check-input" id="locksmith">
                            <label for="locksmith" class="form-check-label">
                              Locksmith
                            </label>
                          </div>
                          <div class="form-check mb-0">
                            <input type="checkbox" class="form-check-input" id="small-appliance-repair" checked>
                            <label for="small-appliance-repair" class="form-check-label">
                              Small appliance repair
                            </label>
                          </div>
                          <div class="form-check mb-0">
                            <input type="checkbox" class="form-check-input" id="smoke-detector-installation">
                            <label for="smoke-detector-installation" class="form-check-label">
                              Smoke detector installation
                            </label>
                          </div>
                          <div class="form-check mb-0">
                            <input type="checkbox" class="form-check-input" id="electrical-work">
                            <label for="electrical-work" class="form-check-label">
                              Electrical work
                            </label>
                          </div>
                          <div class="form-check mb-0">
                            <input type="checkbox" class="form-check-input" id="plumbing">
                            <label for="plumbing" class="form-check-label">
                              Plumbing
                            </label>
                          </div>
                          <div class="form-check mb-0">
                            <input type="checkbox" class="form-check-input" id="hvac-maintenance">
                            <label for="hvac-maintenance" class="form-check-label">
                              HVAC maintenance
                            </label>
                          </div>
                          <div class="form-check mb-0">
                            <input type="checkbox" class="form-check-input" id="painting">
                            <label for="painting" class="form-check-label">
                              Painting
                            </label>
                          </div>
                          <div class="form-check mb-0">
                            <input type="checkbox" class="form-check-input" id="roofing">
                            <label for="roofing" class="form-check-label">
                              Roofing
                            </label>
                          </div>
                          <div class="form-check mb-0">
                            <input type="checkbox" class="form-check-input" id="flooring-installation">
                            <label for="flooring-installation" class="form-check-label">
                              Flooring installation
                            </label>
                          </div>
                          <div class="form-check mb-0">
                            <input type="checkbox" class="form-check-input" id="carpentry">
                            <label for="carpentry" class="form-check-label">
                              Carpentry
                            </label>
                          </div>
                          <div class="form-check mb-0">
                            <input type="checkbox" class="form-check-input" id="landscaping">
                            <label for="landscaping" class="form-check-label">
                              Landscaping
                            </label>
                          </div>
                          <div class="form-check mb-0">
                            <input type="checkbox" class="form-check-input" id="window-installation">
                            <label for="window-installation" class="form-check-label">
                              Window installation
                            </label>
                          </div>
                          <div class="form-check mb-0">
                            <input type="checkbox" class="form-check-input" id="home-security-systems">
                            <label for="home-security-systems" class="form-check-label">
                              Home security systems
                            </label>
                          </div>
                          <div class="form-check mb-0">
                            <input type="checkbox" class="form-check-input" id="drywall-repair">
                            <label for="drywall-repair" class="form-check-label">
                              Drywall repair
                            </label>
                          </div>
                          <div class="form-check mb-0">
                            <input type="checkbox" class="form-check-input" id="gutter-cleaning">
                            <label for="gutter-cleaning" class="form-check-label">
                              Gutter cleaning
                            </label>
                          </div>
                          <div class="form-check mb-0">
                            <input type="checkbox" class="form-check-input" id="insulation-installation">
                            <label for="insulation-installation" class="form-check-label">
                              Insulation installation
                            </label>
                          </div>
                          <div class="form-check mb-0">
                            <input type="checkbox" class="form-check-input" id="kitchen-remodeling">
                            <label for="kitchen-remodeling" class="form-check-label">
                              Kitchen remodeling
                            </label>
                          </div>
                          <div class="form-check mb-0">
                            <input type="checkbox" class="form-check-input" id="bathroom-remodeling">
                            <label for="bathroom-remodeling" class="form-check-label">
                              Bathroom remodeling
                            </label>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div id="html-1" class="tab-pane pt-4 fade" role="tabpanel">
                  <div class="position-relative" data-bs-theme="dark">
                    <button type="button" class="btn btn-sm btn-outline-secondary bg-dark position-absolute top-0 end-0 mt-2 px-2 z-3" data-copy-code="#filter-checkboxes-code">
                      <i class="fi-copy fs-sm me-1"></i>
                      Copy
                    </button>
                    <pre id="filter-checkboxes-code" class="code-highlight mx-n2 mb-n2"><code class="language-html">&lt;!-- List of checkbox based filter items with quick search and custom scrollbar --&gt;
    &lt;h4 class=&quot;h6&quot;&gt;Project type&lt;/h4&gt;
    &lt;div data-filter-list='{&quot;searchClass&quot;: &quot;project-search&quot;, &quot;listClass&quot;: &quot;project-list&quot;, &quot;valueNames&quot;: [&quot;form-check-label&quot;]}'&gt;
      &lt;div class=&quot;position-relative mb-3&quot;&gt;
        &lt;i class=&quot;fi-search position-absolute top-50 start-0 translate-middle-y ms-3&quot;&gt;&lt;/i&gt;
        &lt;input type=&quot;search&quot; class=&quot;project-search form-control form-icon-start&quot; placeholder=&quot;Search&quot;&gt;
      &lt;/div&gt;
      &lt;div style=&quot;height: 215px&quot; data-simplebar data-simplebar-auto-hide=&quot;false&quot;&gt;
        &lt;div class=&quot;project-list d-flex flex-column gap-2&quot;&gt;
          &lt;div class=&quot;form-check mb-0&quot;&gt;
            &lt;input type=&quot;checkbox&quot; class=&quot;form-check-input&quot; id=&quot;bathtub-repair&quot; checked&gt;
            &lt;label for=&quot;bathtub-repair&quot; class=&quot;form-check-label&quot;&gt;
              Bathtub repair
            &lt;/label&gt;
          &lt;/div&gt;
          &lt;div class=&quot;form-check mb-0&quot;&gt;
            &lt;input type=&quot;checkbox&quot; class=&quot;form-check-input&quot; id=&quot;door-repair&quot;&gt;
            &lt;label for=&quot;door-repair&quot; class=&quot;form-check-label&quot;&gt;
              Door repair
            &lt;/label&gt;
          &lt;/div&gt;
          &lt;div class=&quot;form-check mb-0&quot;&gt;
            &lt;input type=&quot;checkbox&quot; class=&quot;form-check-input&quot; id=&quot;locksmith&quot;&gt;
            &lt;label for=&quot;locksmith&quot; class=&quot;form-check-label&quot;&gt;
              Locksmith
            &lt;/label&gt;
          &lt;/div&gt;
          &lt;div class=&quot;form-check mb-0&quot;&gt;
            &lt;input type=&quot;checkbox&quot; class=&quot;form-check-input&quot; id=&quot;small-appliance-repair&quot; checked&gt;
            &lt;label for=&quot;small-appliance-repair&quot; class=&quot;form-check-label&quot;&gt;
              Small appliance repair
            &lt;/label&gt;
          &lt;/div&gt;
          &lt;div class=&quot;form-check mb-0&quot;&gt;
            &lt;input type=&quot;checkbox&quot; class=&quot;form-check-input&quot; id=&quot;smoke-detector-installation&quot;&gt;
            &lt;label for=&quot;smoke-detector-installation&quot; class=&quot;form-check-label&quot;&gt;
              Smoke detector installation
            &lt;/label&gt;
          &lt;/div&gt;
          &lt;div class=&quot;form-check mb-0&quot;&gt;
            &lt;input type=&quot;checkbox&quot; class=&quot;form-check-input&quot; id=&quot;electrical-work&quot;&gt;
            &lt;label for=&quot;electrical-work&quot; class=&quot;form-check-label&quot;&gt;
              Electrical work
            &lt;/label&gt;
          &lt;/div&gt;
          &lt;div class=&quot;form-check mb-0&quot;&gt;
            &lt;input type=&quot;checkbox&quot; class=&quot;form-check-input&quot; id=&quot;plumbing&quot;&gt;
            &lt;label for=&quot;plumbing&quot; class=&quot;form-check-label&quot;&gt;
              Plumbing
            &lt;/label&gt;
          &lt;/div&gt;
          &lt;div class=&quot;form-check mb-0&quot;&gt;
            &lt;input type=&quot;checkbox&quot; class=&quot;form-check-input&quot; id=&quot;hvac-maintenance&quot;&gt;
            &lt;label for=&quot;hvac-maintenance&quot; class=&quot;form-check-label&quot;&gt;
              HVAC maintenance
            &lt;/label&gt;
          &lt;/div&gt;
          &lt;div class=&quot;form-check mb-0&quot;&gt;
            &lt;input type=&quot;checkbox&quot; class=&quot;form-check-input&quot; id=&quot;painting&quot;&gt;
            &lt;label for=&quot;painting&quot; class=&quot;form-check-label&quot;&gt;
              Painting
            &lt;/label&gt;
          &lt;/div&gt;
          &lt;div class=&quot;form-check mb-0&quot;&gt;
            &lt;input type=&quot;checkbox&quot; class=&quot;form-check-input&quot; id=&quot;roofing&quot;&gt;
            &lt;label for=&quot;roofing&quot; class=&quot;form-check-label&quot;&gt;
              Roofing
            &lt;/label&gt;
          &lt;/div&gt;
          &lt;div class=&quot;form-check mb-0&quot;&gt;
            &lt;input type=&quot;checkbox&quot; class=&quot;form-check-input&quot; id=&quot;flooring-installation&quot;&gt;
            &lt;label for=&quot;flooring-installation&quot; class=&quot;form-check-label&quot;&gt;
              Flooring installation
            &lt;/label&gt;
          &lt;/div&gt;
          &lt;div class=&quot;form-check mb-0&quot;&gt;
            &lt;input type=&quot;checkbox&quot; class=&quot;form-check-input&quot; id=&quot;carpentry&quot;&gt;
            &lt;label for=&quot;carpentry&quot; class=&quot;form-check-label&quot;&gt;
              Carpentry
            &lt;/label&gt;
          &lt;/div&gt;
          &lt;div class=&quot;form-check mb-0&quot;&gt;
            &lt;input type=&quot;checkbox&quot; class=&quot;form-check-input&quot; id=&quot;landscaping&quot;&gt;
            &lt;label for=&quot;landscaping&quot; class=&quot;form-check-label&quot;&gt;
              Landscaping
            &lt;/label&gt;
          &lt;/div&gt;
          &lt;div class=&quot;form-check mb-0&quot;&gt;
            &lt;input type=&quot;checkbox&quot; class=&quot;form-check-input&quot; id=&quot;window-installation&quot;&gt;
            &lt;label for=&quot;window-installation&quot; class=&quot;form-check-label&quot;&gt;
              Window installation
            &lt;/label&gt;
          &lt;/div&gt;
          &lt;div class=&quot;form-check mb-0&quot;&gt;
            &lt;input type=&quot;checkbox&quot; class=&quot;form-check-input&quot; id=&quot;home-security-systems&quot;&gt;
            &lt;label for=&quot;home-security-systems&quot; class=&quot;form-check-label&quot;&gt;
              Home security systems
            &lt;/label&gt;
          &lt;/div&gt;
          &lt;div class=&quot;form-check mb-0&quot;&gt;
            &lt;input type=&quot;checkbox&quot; class=&quot;form-check-input&quot; id=&quot;drywall-repair&quot;&gt;
            &lt;label for=&quot;drywall-repair&quot; class=&quot;form-check-label&quot;&gt;
              Drywall repair
            &lt;/label&gt;
          &lt;/div&gt;
          &lt;div class=&quot;form-check mb-0&quot;&gt;
            &lt;input type=&quot;checkbox&quot; class=&quot;form-check-input&quot; id=&quot;gutter-cleaning&quot;&gt;
            &lt;label for=&quot;gutter-cleaning&quot; class=&quot;form-check-label&quot;&gt;
              Gutter cleaning
            &lt;/label&gt;
          &lt;/div&gt;
          &lt;div class=&quot;form-check mb-0&quot;&gt;
            &lt;input type=&quot;checkbox&quot; class=&quot;form-check-input&quot; id=&quot;insulation-installation&quot;&gt;
            &lt;label for=&quot;insulation-installation&quot; class=&quot;form-check-label&quot;&gt;
              Insulation installation
            &lt;/label&gt;
          &lt;/div&gt;
          &lt;div class=&quot;form-check mb-0&quot;&gt;
            &lt;input type=&quot;checkbox&quot; class=&quot;form-check-input&quot; id=&quot;kitchen-remodeling&quot;&gt;
            &lt;label for=&quot;kitchen-remodeling&quot; class=&quot;form-check-label&quot;&gt;
              Kitchen remodeling
            &lt;/label&gt;
          &lt;/div&gt;
          &lt;div class=&quot;form-check mb-0&quot;&gt;
            &lt;input type=&quot;checkbox&quot; class=&quot;form-check-input&quot; id=&quot;bathroom-remodeling&quot;&gt;
            &lt;label for=&quot;bathroom-remodeling&quot; class=&quot;form-check-label&quot;&gt;
              Bathroom remodeling
            &lt;/label&gt;
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


        <!-- Button toggles -->
        <section id="filter-button-toggles" class="docs-section pb-sm-2 mb-5">
          <h4>Button toggles</h4>
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
                  <div class="d-flex flex-column flex-sm-row gap-2 gap-sm-5">
                    <div class="w-100" style="max-width: 280px">
                      <h4 class="h6">Color</h4>
                      <div style="height: 220px" data-simplebar data-simplebar-auto-hide="false">
                        <div class="d-flex flex-column gap-2">
                          <div class="d-flex align-items-center mb-1">
                            <input type="checkbox" class="btn-check" id="amber" checked>
                            <label for="amber" class="btn btn-color fs-xl" style="color: #ffbf00"></label>
                            <label for="amber" class="fs-sm ms-2">Amber</label>
                          </div>
                          <div class="d-flex align-items-center mb-1">
                            <input type="checkbox" class="btn-check" id="azure">
                            <label for="azure" class="btn btn-color fs-xl" style="color: #0080FF"></label>
                            <label for="azure" class="fs-sm ms-2">Azure</label>
                          </div>
                          <div class="d-flex align-items-center mb-1">
                            <input type="checkbox" class="btn-check" id="beige" checked>
                            <label for="beige" class="btn btn-color fs-xl" style="color: #f5e2c4"></label>
                            <label for="beige" class="fs-sm ms-2">Beige</label>
                          </div>
                          <div class="d-flex align-items-center mb-1">
                            <input type="checkbox" class="btn-check" id="black">
                            <label for="black" class="btn btn-color fs-xl" style="color: #333d4c"></label>
                            <label for="black" class="fs-sm ms-2">Black</label>
                          </div>
                          <div class="d-flex align-items-center mb-1">
                            <input type="checkbox" class="btn-check" id="blue">
                            <label for="blue" class="btn btn-color fs-xl" style="color: #5656f3"></label>
                            <label for="blue" class="fs-sm ms-2">Blue</label>
                          </div>
                          <div class="d-flex align-items-center mb-1">
                            <input type="checkbox" class="btn-check" id="brown">
                            <label for="brown" class="btn btn-color fs-xl" style="color: #9d542a"></label>
                            <label for="brown" class="fs-sm ms-2">Brown</label>
                          </div>
                          <div class="d-flex align-items-center mb-1">
                            <input type="checkbox" class="btn-check" id="burgundy">
                            <label for="burgundy" class="btn btn-color fs-xl" style="color: #800020"></label>
                            <label for="burgundy" class="fs-sm ms-2">Burgundy</label>
                          </div>
                          <div class="d-flex align-items-center mb-1">
                            <input type="checkbox" class="btn-check" id="dark-blue">
                            <label for="dark-blue" class="btn btn-color fs-xl" style="color: #23238f"></label>
                            <label for="dark-blue" class="fs-sm ms-2">Dark Blue</label>
                          </div>
                          <div class="d-flex align-items-center mb-1">
                            <input type="checkbox" class="btn-check" id="dark-green">
                            <label for="dark-green" class="btn btn-color fs-xl" style="color: #136930"></label>
                            <label for="dark-green" class="fs-sm ms-2">Dark Green</label>
                          </div>
                          <div class="d-flex align-items-center mb-1">
                            <input type="checkbox" class="btn-check" id="gray">
                            <label for="gray" class="btn btn-color fs-xl" style="color: #808080"></label>
                            <label for="gray" class="fs-sm ms-2">Gray</label>
                          </div>
                          <div class="d-flex align-items-center mb-1">
                            <input type="checkbox" class="btn-check" id="green">
                            <label for="green" class="btn btn-color fs-xl" style="color: #239062"></label>
                            <label for="green" class="fs-sm ms-2">Green</label>
                          </div>
                          <div class="d-flex align-items-center mb-1">
                            <input type="checkbox" class="btn-check" id="light-blue">
                            <label for="light-blue" class="btn btn-color fs-xl" style="color: #add8e6"></label>
                            <label for="light-blue" class="fs-sm ms-2">Light Blue</label>
                          </div>
                          <div class="d-flex align-items-center mb-1">
                            <input type="checkbox" class="btn-check" id="light-gray">
                            <label for="light-gray" class="btn btn-color fs-xl" style="color: #d3d3d3"></label>
                            <label for="light-gray" class="fs-sm ms-2">Light Gray</label>
                          </div>
                          <div class="d-flex align-items-center mb-1">
                            <input type="checkbox" class="btn-check" id="maroon">
                            <label for="maroon" class="btn btn-color fs-xl" style="color: #800000"></label>
                            <label for="maroon" class="fs-sm ms-2">Maroon</label>
                          </div>
                          <div class="d-flex align-items-center mb-1">
                            <input type="checkbox" class="btn-check" id="orange">
                            <label for="orange" class="btn btn-color fs-xl" style="color: #ffa500"></label>
                            <label for="orange" class="fs-sm ms-2">Orange</label>
                          </div>
                          <div class="d-flex align-items-center mb-1">
                            <input type="checkbox" class="btn-check" id="red">
                            <label for="red" class="btn btn-color fs-xl" style="color: #ff0000"></label>
                            <label for="red" class="fs-sm ms-2">Red</label>
                          </div>
                          <div class="d-flex align-items-center mb-1">
                            <input type="checkbox" class="btn-check" id="silver">
                            <label for="silver" class="btn btn-color fs-xl" style="color: #c0c0c0"></label>
                            <label for="silver" class="fs-sm ms-2">Silver</label>
                          </div>
                          <div class="d-flex align-items-center mb-1">
                            <input type="checkbox" class="btn-check" id="white">
                            <label for="white" class="btn btn-color fs-xl" style="color: #eef1f6"></label>
                            <label for="white" class="fs-sm ms-2">White</label>
                          </div>
                          <div class="d-flex align-items-center mb-1">
                            <input type="checkbox" class="btn-check" id="yellow">
                            <label for="yellow" class="btn btn-color fs-xl" style="color: #F4E134"></label>
                            <label for="yellow" class="fs-sm ms-2">Yellow</label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="w-100" style="max-width: 300px">
                      <h4 class="h6">Fuel type</h4>
                      <div class="d-flex flex-wrap gap-2">
                        <input type="checkbox" class="btn-check" id="fuel-gasoline">
                        <label for="fuel-gasoline" class="btn btn-sm btn-outline-secondary">Gasoline</label>
                        <input type="checkbox" class="btn-check" id="fuel-diesel" checked>
                        <label for="fuel-diesel" class="btn btn-sm btn-outline-secondary">Diesel</label>
                        <input type="checkbox" class="btn-check" id="fuel-electric">
                        <label for="fuel-electric" class="btn btn-sm btn-outline-secondary">Electric</label>
                        <input type="checkbox" class="btn-check" id="fuel-hybrid">
                        <label for="fuel-hybrid" class="btn btn-sm btn-outline-secondary">Hybrid</label>
                        <input type="checkbox" class="btn-check" id="fuel-hydrogen">
                        <label for="fuel-hydrogen" class="btn btn-sm btn-outline-secondary">Hydrogen</label>
                        <input type="checkbox" class="btn-check" id="fuel-plugin">
                        <label for="fuel-plugin" class="btn btn-sm btn-outline-secondary">Plug-in Hybrid</label>
                      </div>
                    </div>
                  </div>
                </div>
                <div id="html-2" class="tab-pane pt-4 fade" role="tabpanel">
                  <div class="position-relative" data-bs-theme="dark">
                    <button type="button" class="btn btn-sm btn-outline-secondary bg-dark position-absolute top-0 end-0 mt-2 px-2 z-3" data-copy-code="#filter-button-toggles-code">
                      <i class="fi-copy fs-sm me-1"></i>
                      Copy
                    </button>
                    <pre id="filter-button-toggles-code" class="code-highlight mx-n2 mb-n2"><code class="language-html">&lt;!-- Scrollable list of color filters based on "btn-check" and "btn-color" --&gt;
    &lt;h4 class=&quot;h6&quot;&gt;Color&lt;/h4&gt;
    &lt;div style=&quot;height: 220px&quot; data-simplebar data-simplebar-auto-hide=&quot;false&quot;&gt;
      &lt;div class=&quot;d-flex flex-column gap-2&quot;&gt;
        &lt;div class=&quot;d-flex align-items-center mb-1&quot;&gt;
          &lt;input type=&quot;checkbox&quot; class=&quot;btn-check&quot; id=&quot;amber&quot; checked&gt;
          &lt;label for=&quot;amber&quot; class=&quot;btn btn-color fs-xl&quot; style=&quot;color: #ffbf00&quot;&gt;&lt;/label&gt;
          &lt;label for=&quot;amber&quot; class=&quot;fs-sm ms-2&quot;&gt;Amber&lt;/label&gt;
        &lt;/div&gt;
        &lt;div class=&quot;d-flex align-items-center mb-1&quot;&gt;
          &lt;input type=&quot;checkbox&quot; class=&quot;btn-check&quot; id=&quot;azure&quot;&gt;
          &lt;label for=&quot;azure&quot; class=&quot;btn btn-color fs-xl&quot; style=&quot;color: #0080FF&quot;&gt;&lt;/label&gt;
          &lt;label for=&quot;azure&quot; class=&quot;fs-sm ms-2&quot;&gt;Azure&lt;/label&gt;
        &lt;/div&gt;
        &lt;div class=&quot;d-flex align-items-center mb-1&quot;&gt;
          &lt;input type=&quot;checkbox&quot; class=&quot;btn-check&quot; id=&quot;beige&quot; checked&gt;
          &lt;label for=&quot;beige&quot; class=&quot;btn btn-color fs-xl&quot; style=&quot;color: #f5e2c4&quot;&gt;&lt;/label&gt;
          &lt;label for=&quot;beige&quot; class=&quot;fs-sm ms-2&quot;&gt;Beige&lt;/label&gt;
        &lt;/div&gt;
        &lt;div class=&quot;d-flex align-items-center mb-1&quot;&gt;
          &lt;input type=&quot;checkbox&quot; class=&quot;btn-check&quot; id=&quot;black&quot;&gt;
          &lt;label for=&quot;black&quot; class=&quot;btn btn-color fs-xl&quot; style=&quot;color: #333d4c&quot;&gt;&lt;/label&gt;
          &lt;label for=&quot;black&quot; class=&quot;fs-sm ms-2&quot;&gt;Black&lt;/label&gt;
        &lt;/div&gt;
        &lt;div class=&quot;d-flex align-items-center mb-1&quot;&gt;
          &lt;input type=&quot;checkbox&quot; class=&quot;btn-check&quot; id=&quot;blue&quot;&gt;
          &lt;label for=&quot;blue&quot; class=&quot;btn btn-color fs-xl&quot; style=&quot;color: #5656f3&quot;&gt;&lt;/label&gt;
          &lt;label for=&quot;blue&quot; class=&quot;fs-sm ms-2&quot;&gt;Blue&lt;/label&gt;
        &lt;/div&gt;
        &lt;div class=&quot;d-flex align-items-center mb-1&quot;&gt;
          &lt;input type=&quot;checkbox&quot; class=&quot;btn-check&quot; id=&quot;brown&quot;&gt;
          &lt;label for=&quot;brown&quot; class=&quot;btn btn-color fs-xl&quot; style=&quot;color: #9d542a&quot;&gt;&lt;/label&gt;
          &lt;label for=&quot;brown&quot; class=&quot;fs-sm ms-2&quot;&gt;Brown&lt;/label&gt;
        &lt;/div&gt;
        &lt;div class=&quot;d-flex align-items-center mb-1&quot;&gt;
          &lt;input type=&quot;checkbox&quot; class=&quot;btn-check&quot; id=&quot;burgundy&quot;&gt;
          &lt;label for=&quot;burgundy&quot; class=&quot;btn btn-color fs-xl&quot; style=&quot;color: #800020&quot;&gt;&lt;/label&gt;
          &lt;label for=&quot;burgundy&quot; class=&quot;fs-sm ms-2&quot;&gt;Burgundy&lt;/label&gt;
        &lt;/div&gt;
        &lt;div class=&quot;d-flex align-items-center mb-1&quot;&gt;
          &lt;input type=&quot;checkbox&quot; class=&quot;btn-check&quot; id=&quot;dark-blue&quot;&gt;
          &lt;label for=&quot;dark-blue&quot; class=&quot;btn btn-color fs-xl&quot; style=&quot;color: #23238f&quot;&gt;&lt;/label&gt;
          &lt;label for=&quot;dark-blue&quot; class=&quot;fs-sm ms-2&quot;&gt;Dark Blue&lt;/label&gt;
        &lt;/div&gt;
        &lt;div class=&quot;d-flex align-items-center mb-1&quot;&gt;
          &lt;input type=&quot;checkbox&quot; class=&quot;btn-check&quot; id=&quot;dark-green&quot;&gt;
          &lt;label for=&quot;dark-green&quot; class=&quot;btn btn-color fs-xl&quot; style=&quot;color: #136930&quot;&gt;&lt;/label&gt;
          &lt;label for=&quot;dark-green&quot; class=&quot;fs-sm ms-2&quot;&gt;Dark Green&lt;/label&gt;
        &lt;/div&gt;
        &lt;div class=&quot;d-flex align-items-center mb-1&quot;&gt;
          &lt;input type=&quot;checkbox&quot; class=&quot;btn-check&quot; id=&quot;gray&quot;&gt;
          &lt;label for=&quot;gray&quot; class=&quot;btn btn-color fs-xl&quot; style=&quot;color: #808080&quot;&gt;&lt;/label&gt;
          &lt;label for=&quot;gray&quot; class=&quot;fs-sm ms-2&quot;&gt;Gray&lt;/label&gt;
        &lt;/div&gt;
        &lt;div class=&quot;d-flex align-items-center mb-1&quot;&gt;
          &lt;input type=&quot;checkbox&quot; class=&quot;btn-check&quot; id=&quot;green&quot;&gt;
          &lt;label for=&quot;green&quot; class=&quot;btn btn-color fs-xl&quot; style=&quot;color: #239062&quot;&gt;&lt;/label&gt;
          &lt;label for=&quot;green&quot; class=&quot;fs-sm ms-2&quot;&gt;Green&lt;/label&gt;
        &lt;/div&gt;
        &lt;div class=&quot;d-flex align-items-center mb-1&quot;&gt;
          &lt;input type=&quot;checkbox&quot; class=&quot;btn-check&quot; id=&quot;light-blue&quot;&gt;
          &lt;label for=&quot;light-blue&quot; class=&quot;btn btn-color fs-xl&quot; style=&quot;color: #add8e6&quot;&gt;&lt;/label&gt;
          &lt;label for=&quot;light-blue&quot; class=&quot;fs-sm ms-2&quot;&gt;Light Blue&lt;/label&gt;
        &lt;/div&gt;
        &lt;div class=&quot;d-flex align-items-center mb-1&quot;&gt;
          &lt;input type=&quot;checkbox&quot; class=&quot;btn-check&quot; id=&quot;light-gray&quot;&gt;
          &lt;label for=&quot;light-gray&quot; class=&quot;btn btn-color fs-xl&quot; style=&quot;color: #d3d3d3&quot;&gt;&lt;/label&gt;
          &lt;label for=&quot;light-gray&quot; class=&quot;fs-sm ms-2&quot;&gt;Light Gray&lt;/label&gt;
        &lt;/div&gt;
        &lt;div class=&quot;d-flex align-items-center mb-1&quot;&gt;
          &lt;input type=&quot;checkbox&quot; class=&quot;btn-check&quot; id=&quot;maroon&quot;&gt;
          &lt;label for=&quot;maroon&quot; class=&quot;btn btn-color fs-xl&quot; style=&quot;color: #800000&quot;&gt;&lt;/label&gt;
          &lt;label for=&quot;maroon&quot; class=&quot;fs-sm ms-2&quot;&gt;Maroon&lt;/label&gt;
        &lt;/div&gt;
        &lt;div class=&quot;d-flex align-items-center mb-1&quot;&gt;
          &lt;input type=&quot;checkbox&quot; class=&quot;btn-check&quot; id=&quot;orange&quot;&gt;
          &lt;label for=&quot;orange&quot; class=&quot;btn btn-color fs-xl&quot; style=&quot;color: #ffa500&quot;&gt;&lt;/label&gt;
          &lt;label for=&quot;orange&quot; class=&quot;fs-sm ms-2&quot;&gt;Orange&lt;/label&gt;
        &lt;/div&gt;
        &lt;div class=&quot;d-flex align-items-center mb-1&quot;&gt;
          &lt;input type=&quot;checkbox&quot; class=&quot;btn-check&quot; id=&quot;red&quot;&gt;
          &lt;label for=&quot;red&quot; class=&quot;btn btn-color fs-xl&quot; style=&quot;color: #ff0000&quot;&gt;&lt;/label&gt;
          &lt;label for=&quot;red&quot; class=&quot;fs-sm ms-2&quot;&gt;Red&lt;/label&gt;
        &lt;/div&gt;
        &lt;div class=&quot;d-flex align-items-center mb-1&quot;&gt;
          &lt;input type=&quot;checkbox&quot; class=&quot;btn-check&quot; id=&quot;silver&quot;&gt;
          &lt;label for=&quot;silver&quot; class=&quot;btn btn-color fs-xl&quot; style=&quot;color: #c0c0c0&quot;&gt;&lt;/label&gt;
          &lt;label for=&quot;silver&quot; class=&quot;fs-sm ms-2&quot;&gt;Silver&lt;/label&gt;
        &lt;/div&gt;
        &lt;div class=&quot;d-flex align-items-center mb-1&quot;&gt;
          &lt;input type=&quot;checkbox&quot; class=&quot;btn-check&quot; id=&quot;white&quot;&gt;
          &lt;label for=&quot;white&quot; class=&quot;btn btn-color fs-xl&quot; style=&quot;color: #eef1f6&quot;&gt;&lt;/label&gt;
          &lt;label for=&quot;white&quot; class=&quot;fs-sm ms-2&quot;&gt;White&lt;/label&gt;
        &lt;/div&gt;
        &lt;div class=&quot;d-flex align-items-center mb-1&quot;&gt;
          &lt;input type=&quot;checkbox&quot; class=&quot;btn-check&quot; id=&quot;yellow&quot;&gt;
          &lt;label for=&quot;yellow&quot; class=&quot;btn btn-color fs-xl&quot; style=&quot;color: #F4E134&quot;&gt;&lt;/label&gt;
          &lt;label for=&quot;yellow&quot; class=&quot;fs-sm ms-2&quot;&gt;Yellow&lt;/label&gt;
        &lt;/div&gt;
      &lt;/div&gt;
    &lt;/div&gt;

    &lt;!-- List of fuel type filters based on &quot;btn-check&quot; --&gt;
    &lt;h4 class=&quot;h6&quot;&gt;Fuel type&lt;/h4&gt;
    &lt;div class=&quot;d-flex flex-wrap gap-2&quot;&gt;
      &lt;input type=&quot;checkbox&quot; class=&quot;btn-check&quot; id=&quot;fuel-gasoline&quot;&gt;
      &lt;label for=&quot;fuel-gasoline&quot; class=&quot;btn btn-sm btn-outline-secondary&quot;&gt;Gasoline&lt;/label&gt;
      &lt;input type=&quot;checkbox&quot; class=&quot;btn-check&quot; id=&quot;fuel-diesel&quot; checked&gt;
      &lt;label for=&quot;fuel-diesel&quot; class=&quot;btn btn-sm btn-outline-secondary&quot;&gt;Diesel&lt;/label&gt;
      &lt;input type=&quot;checkbox&quot; class=&quot;btn-check&quot; id=&quot;fuel-electric&quot;&gt;
      &lt;label for=&quot;fuel-electric&quot; class=&quot;btn btn-sm btn-outline-secondary&quot;&gt;Electric&lt;/label&gt;
      &lt;input type=&quot;checkbox&quot; class=&quot;btn-check&quot; id=&quot;fuel-hybrid&quot;&gt;
      &lt;label for=&quot;fuel-hybrid&quot; class=&quot;btn btn-sm btn-outline-secondary&quot;&gt;Hybrid&lt;/label&gt;
      &lt;input type=&quot;checkbox&quot; class=&quot;btn-check&quot; id=&quot;fuel-hydrogen&quot;&gt;
      &lt;label for=&quot;fuel-hydrogen&quot; class=&quot;btn btn-sm btn-outline-secondary&quot;&gt;Hydrogen&lt;/label&gt;
      &lt;input type=&quot;checkbox&quot; class=&quot;btn-check&quot; id=&quot;fuel-plugin&quot;&gt;
      &lt;label for=&quot;fuel-plugin&quot; class=&quot;btn btn-sm btn-outline-secondary&quot;&gt;Plug-in Hybrid&lt;/label&gt;
    &lt;/div&gt;</code></pre>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>


        <!-- Links -->
        <section id="filter-links" class="docs-section pb-sm-2 mb-5">
          <h4>Links</h4>
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
                  <div style="max-width: 280px">
                    <h4 class="h6">Category</h4>
                    <ul class="nav flex-column gap-2 m-0">
                      <li>
                        <a class="nav-link text-body fw-normal py-1 px-0" href="#!">
                          <svg class="flex-shrin-0 text-light-emphasis me-3" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M23.863 9.137l-.613-.613V3.582C23.25 1.607 21.643 0 19.669 0a3.56 3.56 0 0 0-2.164.73C14.853-.572 11.552-.122 9.35 2.08c-2.359 2.359-2.707 5.977-1.047 8.709l-2.686 2.686H4.483a.47.47 0 0 0-.469.469v.86h-.86a.47.47 0 0 0-.469.469v.86h-.86a.47.47 0 0 0-.469.469v.86h-.86a.47.47 0 0 0-.331.137l-.028.028a.47.47 0 0 0-.137.331V21a.47.47 0 0 0 .469.469h3.098a.47.47 0 0 0 .331-.137l5.171-5.171a.47.47 0 0 0 0-.663.47.47 0 0 0-.663 0l-5.033 5.033H.937v-2.132h.888a.47.47 0 0 0 .469-.469v-.86h.86a.47.47 0 0 0 .469-.469v-.86h.86a.47.47 0 0 0 .469-.469v-.86h.86a.47.47 0 0 0 .331-.137l2.708-2.708a7.19 7.19 0 0 0 .499.554 7.05 7.05 0 0 0 4.713 2.073v7.837A1.97 1.97 0 0 0 16.032 24h6A1.97 1.97 0 0 0 24 22.031V9.469a.47.47 0 0 0-.137-.331zm-4.194-8.2a2.65 2.65 0 0 1 2.644 2.644v4.005l-.843-.843c-.1-1.705-.789-3.373-2.079-4.663-.308-.308-.638-.582-.985-.821a2.63 2.63 0 0 1 1.263-.321zm-2.644 3.975V3.878a1.13 1.13 0 0 1 .67 1.035 1.13 1.13 0 0 1-.333.804 1.14 1.14 0 0 1-1.607 0 1.14 1.14 0 0 1 0-1.607 1.13 1.13 0 0 1 .332-.229v1.033a.47.47 0 0 0 .469.469.47.47 0 0 0 .469-.469zm-2.655 8.347c-1.578 0-3.156-.601-4.357-1.802a6.17 6.17 0 0 1 0-8.715A6.12 6.12 0 0 1 14.37.939a6.15 6.15 0 0 1 2.433.497 3.56 3.56 0 0 0-.646 1.443 2.06 2.06 0 0 0-1.065.567c-.809.809-.809 2.124 0 2.933.404.404.935.606 1.466.606s1.062-.202 1.466-.606a2.06 2.06 0 0 0 .607-1.466 2.06 2.06 0 0 0-.607-1.466 2.06 2.06 0 0 0-.915-.532 2.65 2.65 0 0 1 .537-1.035 6.21 6.21 0 0 1 1.08.864 6.12 6.12 0 0 1 1.805 4.357 6.12 6.12 0 0 1-1.805 4.357 6.14 6.14 0 0 1-4.357 1.802zm8.693 8.77c0 .569-.463 1.031-1.031 1.031h-6c-.569 0-1.031-.463-1.031-1.031v-7.858a7.04 7.04 0 0 0 4.39-2.052c1.153-1.153 1.826-2.608 2.018-4.113l1.654 1.654v12.368zM11.983 4.715a.47.47 0 0 0 0-.663.47.47 0 0 0-.663 0 4.32 4.32 0 0 0 0 6.099.47.47 0 0 0 .332.137c.12 0 .24-.046.331-.137a.47.47 0 0 0 0-.663 3.38 3.38 0 0 1 0-4.773zm1.491 5.645a.47.47 0 0 0-.583.325.47.47 0 0 0 .327.577c.043.012.086.018.128.018a.47.47 0 0 0 .45-.34.47.47 0 0 0-.322-.58zm7.549 10.171h-3.984a.47.47 0 0 0-.469.469.47.47 0 0 0 .469.469h3.984a.47.47 0 0 0 .469-.469.47.47 0 0 0-.469-.469zm-10.752-6.236a.47.47 0 0 0-.663 0 .47.47 0 0 0 .331.8.47.47 0 0 0 .332-.8z" />
                          </svg>
                          Accommodation
                          <span class="text-body-tertiary fw-normal ps-2 ms-auto">32</span>
                        </a>
                      </li>
                      <li>
                        <a class="nav-link text-body fw-normal py-1 px-0" href="#!">
                          <svg class="flex-shrin-0 text-light-emphasis me-3" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M20.907 22.579l-.469-15c-.024-.78-.642-1.392-1.406-1.392h-2.109 0V4.922A4.93 4.93 0 0 0 12.001 0a4.93 4.93 0 0 0-4.922 4.922v1.266h-2.11c-.764 0-1.382.611-1.406 1.392l-.469 15a1.35 1.35 0 0 0 .387.988c.266.275.638.432 1.019.432h15c.381 0 .753-.158 1.019-.433a1.35 1.35 0 0 0 .387-.988zM8.016 4.922A3.99 3.99 0 0 1 12.001.937a3.99 3.99 0 0 1 3.984 3.984V8.53a.47.47 0 0 1-.469.469.47.47 0 0 1-.469-.469V4.922A3.05 3.05 0 0 0 12 1.875a3.05 3.05 0 0 0-3.047 3.047v3.609A.47.47 0 0 1 8.485 9a.47.47 0 0 1-.469-.469V4.922zm6.094 1.266H9.891h0V4.922A2.11 2.11 0 0 1 12 2.813a2.11 2.11 0 0 1 2.109 2.109v1.266zm5.736 16.727c-.091.094-.217.148-.346.148h-15a.49.49 0 0 1-.346-.147.42.42 0 0 1-.123-.307l.015-.483h2.469a.47.47 0 0 0 .469-.469.47.47 0 0 0-.469-.469h-2.44L4.5 7.608c.008-.271.214-.483.469-.483h2.109v1.406a1.41 1.41 0 0 0 1.406 1.406A1.41 1.41 0 0 0 9.89 8.531V7.125h4.219v1.406a1.41 1.41 0 0 0 1.406 1.406 1.41 1.41 0 0 0 1.406-1.406V7.125h0 2.109c.255 0 .46.212.469.483l.469 15a.42.42 0 0 1-.123.307zm-7.551-10.076c-.193.192-.442.146-.588 0-1.113-1.109-2.924-1.109-4.037 0-.779.776-1.029 1.791-.723 2.934.647 2.418 3.628 4.854 4.933 5.203a.47.47 0 0 0 .242 0c1.305-.349 4.286-2.785 4.933-5.203.306-1.143.056-2.157-.723-2.934-1.113-1.109-2.924-1.11-4.037 0zm3.854 2.691c-.544 2.034-3.081 4.111-4.148 4.501-1.067-.39-3.604-2.467-4.148-4.501-.22-.823-.064-1.486.479-2.027.374-.373.865-.559 1.357-.559s.983.186 1.357.559a1.34 1.34 0 0 0 1.912 0c.748-.746 1.965-.746 2.713 0 .543.541.699 1.204.479 2.027zm-7.524 5.658a.47.47 0 0 0-.469.469.47.47 0 0 0 .469.469h0a.47.47 0 0 0 .469-.469.47.47 0 0 0-.469-.469z" />
                          </svg>
                          Shopping
                          <span class="text-body-tertiary fw-normal ps-2 ms-auto">102</span>
                        </a>
                      </li>
                      <li>
                        <a class="nav-link text-body fw-semibold py-1 px-0 active" href="#!">
                          <svg class="flex-shrin-0 text-light-emphasis me-3" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M16.609 13.116a.47.47 0 0 0 .469-.469.47.47 0 0 0-.469-.469.47.47 0 0 0-.469.469.47.47 0 0 0 .469.469zm4.663-.469a.47.47 0 0 0-.47-.47h-2.076a.47.47 0 1 0 0 .94h1.593c-.244 4.377-3.882 7.863-8.319 7.863s-8.075-3.486-8.319-7.863h10.812a.47.47 0 1 0 0-.94h-1.671c.039-.273.141-.438.272-.649.192-.309.43-.694.43-1.408s-.239-1.099-.43-1.408c-.168-.271-.289-.466-.289-.913s.121-.642.289-.913c.192-.309.43-.694.43-1.408s-.239-1.099-.43-1.408a2.44 2.44 0 0 1-.189-.343l7.464 1.178a.47.47 0 0 0 .073-.934L12.866 2.77l.116-.784L20.476.935a.47.47 0 0 0 .4-.53.47.47 0 0 0-.53-.4L7.038 1.871c-.235.033-.413.246-.404.483.003.733.213 1.132.399 1.484.163.309.291.552.291 1.064 0 .503-.131.733-.298 1.023a2.67 2.67 0 0 0-.422 1.49 2.67 2.67 0 0 0 .422 1.49c.166.29.298.52.298 1.023s-.131.733-.298 1.023-.365.637-.412 1.226H3.198a.47.47 0 0 0-.47.47c0 3.526 1.979 6.599 4.884 8.166v2.717a.47.47 0 0 0 .47.47h7.836a.47.47 0 0 0 .47-.47v-2.717c2.905-1.567 4.884-4.64 4.884-8.166zm-9.407-9.49c0 .714.239 1.099.43 1.408.168.271.289.467.289.913s-.121.642-.289.913c-.192.309-.43.694-.43 1.408s.239 1.099.43 1.408c.168.271.289.466.289.913s-.121.642-.289.913-.368.595-.419 1.144h-1.745c.039-.297.147-.476.276-.691.19-.317.427-.71.427-1.439s-.237-1.123-.427-1.439c-.164-.272-.293-.487-.293-.955s.129-.683.293-.956c.19-.317.427-.71.427-1.44s-.237-1.123-.427-1.44c-.164-.272-.293-.487-.293-.956v-.473l1.897-.266-.147 1.036zM7.842 8.439c-.166-.29-.298-.52-.298-1.023s.131-.733.298-1.023a2.67 2.67 0 0 0 .422-1.49c0-.745-.212-1.147-.4-1.502-.113-.214-.209-.397-.258-.661l1.569-.22v.342c0 .729.237 1.123.427 1.44.164.272.293.487.293.956s-.129.683-.293.956c-.19.317-.427.71-.427 1.44s.237 1.123.427 1.439c.164.272.293.487.293.955s-.129.683-.293.956-.367.611-.416 1.175H7.559c.038-.33.149-.525.284-.759a2.67 2.67 0 0 0 .422-1.49 2.67 2.67 0 0 0-.422-1.49zm7.606 14.622H8.552v-1.807c1.066.429 2.23.665 3.448.665s2.382-.237 3.448-.665v1.807zm-7.49-8.684a.47.47 0 1 0 0 .94h8.084a.47.47 0 1 0 0-.94H7.958z" />
                          </svg>
                          Food &amp; Drink
                          <span class="text-body-tertiary fw-normal ps-2 ms-auto">260</span>
                        </a>
                      </li>
                      <li>
                        <a class="nav-link text-body fw-normal py-1 px-0" href="#!">
                          <svg class="flex-shrin-0 text-light-emphasis me-3" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M18.618 5.247a4.84 4.84 0 0 0-1.553-.164C16.923 2.255 14.693 0 11.974 0 9.634 0 7.657 1.668 7.06 3.935a4.84 4.84 0 0 0-1.582.162c-.157.043-.314.094-.469.154a.47.47 0 0 0 .168.907.47.47 0 0 0 .168-.031l.379-.124c.386-.105.779-.15 1.173-.136l-.023.505c0 2.468 1.557 5.36 3.694 6.285l-.217 1.136c-.511 1.032-1.244 1.724-2.069 1.949a2.5 2.5 0 0 1-.731.085c-.672-.021-1.279-.281-1.718-.535-1.393-.804-2.6-2.374-3.003-3.907a4.6 4.6 0 0 1 .152-2.854.47.47 0 0 0-.267-.607.47.47 0 0 0-.607.267 5.53 5.53 0 0 0-.185 3.433c.463 1.759 1.846 3.56 3.441 4.48.578.334 1.16.542 1.727.623l.133 1.942a.47.47 0 0 0 .591.42l.901-.245c.384.816.476 1.617.564 2.394.095.836.185 1.626.612 2.377a.47.47 0 0 0 .639.177.47.47 0 0 0 .176-.639c-.332-.584-.407-1.249-.495-2.02s-.187-1.637-.579-2.538l.715-.195a.47.47 0 0 0 .299-.655l-.843-1.756c.299-.237.577-.526.827-.86l.031.002h.935c.165.891.049 1.69-.063 2.466-.121.833-.235 1.619-.014 2.456a.47.47 0 0 0 .453.349.45.45 0 0 0 .12-.016.47.47 0 0 0 .334-.573c-.172-.652-.076-1.315.036-2.082s.236-1.629.087-2.601h.372c.247.813.733 1.519 1.367 2.017l-.838 1.747a.47.47 0 0 0 .299.655l.715.195c-.393.901-.491 1.763-.579 2.538-.088.77-.164 1.435-.495 2.02a.47.47 0 0 0 .407.7.47.47 0 0 0 .408-.237c.426-.751.516-1.54.612-2.376.089-.777.18-1.578.564-2.394l.901.245a.47.47 0 0 0 .591-.42l.133-1.942c.305-.044.615-.125.929-.243 1.904-.718 3.687-2.763 4.24-4.861.753-2.858-.842-5.786-3.555-6.525zm-9.06 11.394l-1.438.392-.089-1.293c.168-.02.334-.051.497-.096A3.32 3.32 0 0 0 9 15.476l.559 1.165zm1.671-3.45l.244-1.273c.165.025.332.038.5.038s.334-.013.5-.038l.243 1.273H11.23zm3.308 4.6l.558-1.163a3.52 3.52 0 0 0 .472.166 3.49 3.49 0 0 0 .497.096l-.089 1.292-1.438-.392zm6.729-6.258c-.474 1.798-2.049 3.613-3.664 4.223-.356.135-.703.208-1.036.219h-.026c-.25.006-.493-.022-.727-.086-1.025-.279-1.838-1.191-2.07-2.324l-.365-1.909.359-.176a.47.47 0 0 0 .185-.636.47.47 0 0 0-.637-.185 3.03 3.03 0 0 1-.575.246c-.248.076-.494.113-.738.113-1.012 0-2.066-.672-2.891-1.844C8.285 8.043 7.81 6.621 7.81 5.37c0-2.444 1.867-4.433 4.161-4.433s4.161 1.989 4.161 4.433c0 .833-.219 1.776-.616 2.653a.47.47 0 0 0 .233.62.47.47 0 0 0 .62-.233 7.9 7.9 0 0 0 .663-2.386c.449-.035.897.007 1.336.127 2.219.605 3.517 3.019 2.895 5.382zM3.58 6.211c.113 0 .225-.04.315-.122h0a.47.47 0 0 0 .031-.662.47.47 0 0 0-.662-.031.47.47 0 0 0-.032.662c.092.102.22.153.347.153zM15.254 9.47a.47.47 0 0 0-.66.06h0a.47.47 0 0 0 .36.769.47.47 0 0 0 .301-.829z" />
                            <path d="M7.43 20.713h0a.47.47 0 0 0-.469.469.47.47 0 0 0 .469.469.47.47 0 0 0 .469-.469.47.47 0 0 0-.469-.469zm11.812-2.063h0a.47.47 0 0 0-.469.469.47.47 0 0 0 .469.469.47.47 0 0 0 .469-.469.47.47 0 0 0-.469-.469zm-2.296 2.485h0a.47.47 0 0 0-.468.469.47.47 0 0 0 .469.469.47.47 0 0 0 .469-.469.47.47 0 0 0-.469-.469zm2.203-17.813a.47.47 0 0 0 .469-.469.47.47 0 0 0-.469-.469h0a.47.47 0 0 0-.469.469.47.47 0 0 0 .469.469z" />
                          </svg>
                          Entertainment
                          <span class="text-body-tertiary fw-normal ps-2 ms-auto">147</span>
                        </a>
                      </li>
                      <li>
                        <a class="nav-link text-body fw-normal py-1 px-0" href="#!">
                          <svg class="flex-shrin-0 text-light-emphasis me-3" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M13.109 7.163h-2.662a.47.47 0 0 0-.469.469v1.612H8.363a.47.47 0 0 0-.469.469v2.659a.47.47 0 0 0 .469.469h1.614v1.612a.47.47 0 0 0 .469.469h2.662a.47.47 0 0 0 .469-.469V12.84h1.613a.47.47 0 0 0 .469-.469V9.712a.47.47 0 0 0-.469-.469h-1.613V7.631a.47.47 0 0 0-.469-.469zm1.613 3.018v1.722h-1.613a.47.47 0 0 0-.469.469v1.612h-1.725v-1.612a.47.47 0 0 0-.469-.469H8.832v-1.722h1.614a.47.47 0 0 0 .469-.469V8.1h1.725v1.612a.47.47 0 0 0 .469.469h1.613zm6.427 3.605l.324-.312c2.768-2.864 2.768-7.505.012-10.358-1.159-1.199-2.751-1.821-4.481-1.75-1.655.068-3.255.748-4.504 1.915l-.089.083c-.259.242-.527.492-.635.539-.109-.047-.376-.297-.635-.539l-.088-.083c-1.25-1.167-2.849-1.847-4.504-1.915-1.731-.071-3.322.551-4.48 1.75-2.758 2.852-2.758 7.494 0 10.346l2.313 2.23c.091.088.208.131.325.131a.47.47 0 0 0 .325-.806l-2.295-2.213C.332 10.311.334 6.259 2.742 3.768c1.95-2.019 5.391-1.93 7.67.199l.088.082c.549.513.851.796 1.275.796s.726-.283 1.275-.796l.088-.082c2.279-2.129 5.72-2.218 7.672-.199 2.407 2.491 2.409 6.544.006 9.037l-.715.688a4.63 4.63 0 0 0-.708-.054 4.61 4.61 0 0 0-4.604 4.599 4.63 4.63 0 0 0 .032.544l-3.046 2.937-3.717-3.582a.47.47 0 0 0-.663.012.47.47 0 0 0 .012.663l4.043 3.896c.091.088.208.131.325.131a.47.47 0 0 0 .325-.131l2.975-2.869c.652 1.75 2.341 3.001 4.317 3.001A4.61 4.61 0 0 0 24 18.038c0-1.916-1.179-3.562-2.851-4.252zm-1.755 7.916a3.67 3.67 0 0 1-3.667-3.663 3.67 3.67 0 0 1 3.667-3.662 3.67 3.67 0 0 1 3.668 3.662 3.67 3.67 0 0 1-3.668 3.663zm.001-6.101a.47.47 0 0 0-.469.469v1.971a.47.47 0 0 0 .469.469.47.47 0 0 0 .469-.469V16.07a.47.47 0 0 0-.469-.469zm0 3.935a.47.47 0 0 0-.469.469v.003c0 .259.21.467.469.467a.47.47 0 0 0 .469-.47.47.47 0 0 0-.469-.469zM5.889 16.484a.47.47 0 0 0 0 .663l.001.001c.091.091.211.137.33.137a.47.47 0 1 0-.332-.801z" />
                          </svg>
                          Health
                          <span class="text-body-tertiary fw-normal ps-2 ms-auto">54</span>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
                <div id="html-3" class="tab-pane pt-4 fade" role="tabpanel">
                  <div class="position-relative" data-bs-theme="dark">
                    <button type="button" class="btn btn-sm btn-outline-secondary bg-dark position-absolute top-0 end-0 mt-2 px-2 z-3" data-copy-code="#filter-links-code">
                      <i class="fi-copy fs-sm me-1"></i>
                      Copy
                    </button>
                    <pre id="filter-links-code" class="code-highlight mx-n2 mb-n2"><code class="language-html">&lt;!-- List of links with custom svg icons --&gt;
    &lt;h4 class=&quot;h6&quot;&gt;Category&lt;/h4&gt;
    &lt;ul class=&quot;nav flex-column gap-2 m-0&quot;&gt;
      &lt;li&gt;
        &lt;a class=&quot;nav-link text-body fw-normal py-1 px-0&quot; href=&quot;#!&quot;&gt;
          &lt;svg class=&quot;flex-shrin-0 text-light-emphasis me-3&quot; xmlns=&quot;http://www.w3.org/2000/svg&quot; width=&quot;24&quot; height=&quot;24&quot; viewBox=&quot;0 0 24 24&quot; fill=&quot;currentColor&quot;&gt;&lt;path d=&quot;M23.863 9.137l-.613-.613V3.582C23.25 1.607 21.643 0 19.669 0a3.56 3.56 0 0 0-2.164.73C14.853-.572 11.552-.122 9.35 2.08c-2.359 2.359-2.707 5.977-1.047 8.709l-2.686 2.686H4.483a.47.47 0 0 0-.469.469v.86h-.86a.47.47 0 0 0-.469.469v.86h-.86a.47.47 0 0 0-.469.469v.86h-.86a.47.47 0 0 0-.331.137l-.028.028a.47.47 0 0 0-.137.331V21a.47.47 0 0 0 .469.469h3.098a.47.47 0 0 0 .331-.137l5.171-5.171a.47.47 0 0 0 0-.663.47.47 0 0 0-.663 0l-5.033 5.033H.937v-2.132h.888a.47.47 0 0 0 .469-.469v-.86h.86a.47.47 0 0 0 .469-.469v-.86h.86a.47.47 0 0 0 .469-.469v-.86h.86a.47.47 0 0 0 .331-.137l2.708-2.708a7.19 7.19 0 0 0 .499.554 7.05 7.05 0 0 0 4.713 2.073v7.837A1.97 1.97 0 0 0 16.032 24h6A1.97 1.97 0 0 0 24 22.031V9.469a.47.47 0 0 0-.137-.331zm-4.194-8.2a2.65 2.65 0 0 1 2.644 2.644v4.005l-.843-.843c-.1-1.705-.789-3.373-2.079-4.663-.308-.308-.638-.582-.985-.821a2.63 2.63 0 0 1 1.263-.321zm-2.644 3.975V3.878a1.13 1.13 0 0 1 .67 1.035 1.13 1.13 0 0 1-.333.804 1.14 1.14 0 0 1-1.607 0 1.14 1.14 0 0 1 0-1.607 1.13 1.13 0 0 1 .332-.229v1.033a.47.47 0 0 0 .469.469.47.47 0 0 0 .469-.469zm-2.655 8.347c-1.578 0-3.156-.601-4.357-1.802a6.17 6.17 0 0 1 0-8.715A6.12 6.12 0 0 1 14.37.939a6.15 6.15 0 0 1 2.433.497 3.56 3.56 0 0 0-.646 1.443 2.06 2.06 0 0 0-1.065.567c-.809.809-.809 2.124 0 2.933.404.404.935.606 1.466.606s1.062-.202 1.466-.606a2.06 2.06 0 0 0 .607-1.466 2.06 2.06 0 0 0-.607-1.466 2.06 2.06 0 0 0-.915-.532 2.65 2.65 0 0 1 .537-1.035 6.21 6.21 0 0 1 1.08.864 6.12 6.12 0 0 1 1.805 4.357 6.12 6.12 0 0 1-1.805 4.357 6.14 6.14 0 0 1-4.357 1.802zm8.693 8.77c0 .569-.463 1.031-1.031 1.031h-6c-.569 0-1.031-.463-1.031-1.031v-7.858a7.04 7.04 0 0 0 4.39-2.052c1.153-1.153 1.826-2.608 2.018-4.113l1.654 1.654v12.368zM11.983 4.715a.47.47 0 0 0 0-.663.47.47 0 0 0-.663 0 4.32 4.32 0 0 0 0 6.099.47.47 0 0 0 .332.137c.12 0 .24-.046.331-.137a.47.47 0 0 0 0-.663 3.38 3.38 0 0 1 0-4.773zm1.491 5.645a.47.47 0 0 0-.583.325.47.47 0 0 0 .327.577c.043.012.086.018.128.018a.47.47 0 0 0 .45-.34.47.47 0 0 0-.322-.58zm7.549 10.171h-3.984a.47.47 0 0 0-.469.469.47.47 0 0 0 .469.469h3.984a.47.47 0 0 0 .469-.469.47.47 0 0 0-.469-.469zm-10.752-6.236a.47.47 0 0 0-.663 0 .47.47 0 0 0 .331.8.47.47 0 0 0 .332-.8z&quot;/&gt;&lt;/svg&gt;
          Accommodation
          &lt;span class=&quot;text-body-tertiary fw-normal ps-2 ms-auto&quot;&gt;32&lt;/span&gt;
        &lt;/a&gt;
      &lt;/li&gt;
      &lt;li&gt;
        &lt;a class=&quot;nav-link text-body fw-normal py-1 px-0&quot; href=&quot;#!&quot;&gt;
          &lt;svg class=&quot;flex-shrin-0 text-light-emphasis me-3&quot; xmlns=&quot;http://www.w3.org/2000/svg&quot; width=&quot;24&quot; height=&quot;24&quot; viewBox=&quot;0 0 24 24&quot; fill=&quot;currentColor&quot;&gt;&lt;path d=&quot;M20.907 22.579l-.469-15c-.024-.78-.642-1.392-1.406-1.392h-2.109 0V4.922A4.93 4.93 0 0 0 12.001 0a4.93 4.93 0 0 0-4.922 4.922v1.266h-2.11c-.764 0-1.382.611-1.406 1.392l-.469 15a1.35 1.35 0 0 0 .387.988c.266.275.638.432 1.019.432h15c.381 0 .753-.158 1.019-.433a1.35 1.35 0 0 0 .387-.988zM8.016 4.922A3.99 3.99 0 0 1 12.001.937a3.99 3.99 0 0 1 3.984 3.984V8.53a.47.47 0 0 1-.469.469.47.47 0 0 1-.469-.469V4.922A3.05 3.05 0 0 0 12 1.875a3.05 3.05 0 0 0-3.047 3.047v3.609A.47.47 0 0 1 8.485 9a.47.47 0 0 1-.469-.469V4.922zm6.094 1.266H9.891h0V4.922A2.11 2.11 0 0 1 12 2.813a2.11 2.11 0 0 1 2.109 2.109v1.266zm5.736 16.727c-.091.094-.217.148-.346.148h-15a.49.49 0 0 1-.346-.147.42.42 0 0 1-.123-.307l.015-.483h2.469a.47.47 0 0 0 .469-.469.47.47 0 0 0-.469-.469h-2.44L4.5 7.608c.008-.271.214-.483.469-.483h2.109v1.406a1.41 1.41 0 0 0 1.406 1.406A1.41 1.41 0 0 0 9.89 8.531V7.125h4.219v1.406a1.41 1.41 0 0 0 1.406 1.406 1.41 1.41 0 0 0 1.406-1.406V7.125h0 2.109c.255 0 .46.212.469.483l.469 15a.42.42 0 0 1-.123.307zm-7.551-10.076c-.193.192-.442.146-.588 0-1.113-1.109-2.924-1.109-4.037 0-.779.776-1.029 1.791-.723 2.934.647 2.418 3.628 4.854 4.933 5.203a.47.47 0 0 0 .242 0c1.305-.349 4.286-2.785 4.933-5.203.306-1.143.056-2.157-.723-2.934-1.113-1.109-2.924-1.11-4.037 0zm3.854 2.691c-.544 2.034-3.081 4.111-4.148 4.501-1.067-.39-3.604-2.467-4.148-4.501-.22-.823-.064-1.486.479-2.027.374-.373.865-.559 1.357-.559s.983.186 1.357.559a1.34 1.34 0 0 0 1.912 0c.748-.746 1.965-.746 2.713 0 .543.541.699 1.204.479 2.027zm-7.524 5.658a.47.47 0 0 0-.469.469.47.47 0 0 0 .469.469h0a.47.47 0 0 0 .469-.469.47.47 0 0 0-.469-.469z&quot;/&gt;&lt;/svg&gt;
          Shopping
          &lt;span class=&quot;text-body-tertiary fw-normal ps-2 ms-auto&quot;&gt;102&lt;/span&gt;
        &lt;/a&gt;
      &lt;/li&gt;
      &lt;li&gt;
        &lt;a class=&quot;nav-link text-body fw-semibold py-1 px-0 active&quot; href=&quot;#!&quot;&gt;
          &lt;svg class=&quot;flex-shrin-0 text-light-emphasis me-3&quot; xmlns=&quot;http://www.w3.org/2000/svg&quot; width=&quot;24&quot; height=&quot;24&quot; viewBox=&quot;0 0 24 24&quot; fill=&quot;currentColor&quot;&gt;&lt;path d=&quot;M16.609 13.116a.47.47 0 0 0 .469-.469.47.47 0 0 0-.469-.469.47.47 0 0 0-.469.469.47.47 0 0 0 .469.469zm4.663-.469a.47.47 0 0 0-.47-.47h-2.076a.47.47 0 1 0 0 .94h1.593c-.244 4.377-3.882 7.863-8.319 7.863s-8.075-3.486-8.319-7.863h10.812a.47.47 0 1 0 0-.94h-1.671c.039-.273.141-.438.272-.649.192-.309.43-.694.43-1.408s-.239-1.099-.43-1.408c-.168-.271-.289-.466-.289-.913s.121-.642.289-.913c.192-.309.43-.694.43-1.408s-.239-1.099-.43-1.408a2.44 2.44 0 0 1-.189-.343l7.464 1.178a.47.47 0 0 0 .073-.934L12.866 2.77l.116-.784L20.476.935a.47.47 0 0 0 .4-.53.47.47 0 0 0-.53-.4L7.038 1.871c-.235.033-.413.246-.404.483.003.733.213 1.132.399 1.484.163.309.291.552.291 1.064 0 .503-.131.733-.298 1.023a2.67 2.67 0 0 0-.422 1.49 2.67 2.67 0 0 0 .422 1.49c.166.29.298.52.298 1.023s-.131.733-.298 1.023-.365.637-.412 1.226H3.198a.47.47 0 0 0-.47.47c0 3.526 1.979 6.599 4.884 8.166v2.717a.47.47 0 0 0 .47.47h7.836a.47.47 0 0 0 .47-.47v-2.717c2.905-1.567 4.884-4.64 4.884-8.166zm-9.407-9.49c0 .714.239 1.099.43 1.408.168.271.289.467.289.913s-.121.642-.289.913c-.192.309-.43.694-.43 1.408s.239 1.099.43 1.408c.168.271.289.466.289.913s-.121.642-.289.913-.368.595-.419 1.144h-1.745c.039-.297.147-.476.276-.691.19-.317.427-.71.427-1.439s-.237-1.123-.427-1.439c-.164-.272-.293-.487-.293-.955s.129-.683.293-.956c.19-.317.427-.71.427-1.44s-.237-1.123-.427-1.44c-.164-.272-.293-.487-.293-.956v-.473l1.897-.266-.147 1.036zM7.842 8.439c-.166-.29-.298-.52-.298-1.023s.131-.733.298-1.023a2.67 2.67 0 0 0 .422-1.49c0-.745-.212-1.147-.4-1.502-.113-.214-.209-.397-.258-.661l1.569-.22v.342c0 .729.237 1.123.427 1.44.164.272.293.487.293.956s-.129.683-.293.956c-.19.317-.427.71-.427 1.44s.237 1.123.427 1.439c.164.272.293.487.293.955s-.129.683-.293.956-.367.611-.416 1.175H7.559c.038-.33.149-.525.284-.759a2.67 2.67 0 0 0 .422-1.49 2.67 2.67 0 0 0-.422-1.49zm7.606 14.622H8.552v-1.807c1.066.429 2.23.665 3.448.665s2.382-.237 3.448-.665v1.807zm-7.49-8.684a.47.47 0 1 0 0 .94h8.084a.47.47 0 1 0 0-.94H7.958z&quot;/&gt;&lt;/svg&gt;
          Food &amp;amp; Drink
          &lt;span class=&quot;text-body-tertiary fw-normal ps-2 ms-auto&quot;&gt;260&lt;/span&gt;
        &lt;/a&gt;
      &lt;/li&gt;
      &lt;li&gt;
        &lt;a class=&quot;nav-link text-body fw-normal py-1 px-0&quot; href=&quot;#!&quot;&gt;
          &lt;svg class=&quot;flex-shrin-0 text-light-emphasis me-3&quot; xmlns=&quot;http://www.w3.org/2000/svg&quot; width=&quot;24&quot; height=&quot;24&quot; viewBox=&quot;0 0 24 24&quot; fill=&quot;currentColor&quot;&gt;&lt;path d=&quot;M18.618 5.247a4.84 4.84 0 0 0-1.553-.164C16.923 2.255 14.693 0 11.974 0 9.634 0 7.657 1.668 7.06 3.935a4.84 4.84 0 0 0-1.582.162c-.157.043-.314.094-.469.154a.47.47 0 0 0 .168.907.47.47 0 0 0 .168-.031l.379-.124c.386-.105.779-.15 1.173-.136l-.023.505c0 2.468 1.557 5.36 3.694 6.285l-.217 1.136c-.511 1.032-1.244 1.724-2.069 1.949a2.5 2.5 0 0 1-.731.085c-.672-.021-1.279-.281-1.718-.535-1.393-.804-2.6-2.374-3.003-3.907a4.6 4.6 0 0 1 .152-2.854.47.47 0 0 0-.267-.607.47.47 0 0 0-.607.267 5.53 5.53 0 0 0-.185 3.433c.463 1.759 1.846 3.56 3.441 4.48.578.334 1.16.542 1.727.623l.133 1.942a.47.47 0 0 0 .591.42l.901-.245c.384.816.476 1.617.564 2.394.095.836.185 1.626.612 2.377a.47.47 0 0 0 .639.177.47.47 0 0 0 .176-.639c-.332-.584-.407-1.249-.495-2.02s-.187-1.637-.579-2.538l.715-.195a.47.47 0 0 0 .299-.655l-.843-1.756c.299-.237.577-.526.827-.86l.031.002h.935c.165.891.049 1.69-.063 2.466-.121.833-.235 1.619-.014 2.456a.47.47 0 0 0 .453.349.45.45 0 0 0 .12-.016.47.47 0 0 0 .334-.573c-.172-.652-.076-1.315.036-2.082s.236-1.629.087-2.601h.372c.247.813.733 1.519 1.367 2.017l-.838 1.747a.47.47 0 0 0 .299.655l.715.195c-.393.901-.491 1.763-.579 2.538-.088.77-.164 1.435-.495 2.02a.47.47 0 0 0 .407.7.47.47 0 0 0 .408-.237c.426-.751.516-1.54.612-2.376.089-.777.18-1.578.564-2.394l.901.245a.47.47 0 0 0 .591-.42l.133-1.942c.305-.044.615-.125.929-.243 1.904-.718 3.687-2.763 4.24-4.861.753-2.858-.842-5.786-3.555-6.525zm-9.06 11.394l-1.438.392-.089-1.293c.168-.02.334-.051.497-.096A3.32 3.32 0 0 0 9 15.476l.559 1.165zm1.671-3.45l.244-1.273c.165.025.332.038.5.038s.334-.013.5-.038l.243 1.273H11.23zm3.308 4.6l.558-1.163a3.52 3.52 0 0 0 .472.166 3.49 3.49 0 0 0 .497.096l-.089 1.292-1.438-.392zm6.729-6.258c-.474 1.798-2.049 3.613-3.664 4.223-.356.135-.703.208-1.036.219h-.026c-.25.006-.493-.022-.727-.086-1.025-.279-1.838-1.191-2.07-2.324l-.365-1.909.359-.176a.47.47 0 0 0 .185-.636.47.47 0 0 0-.637-.185 3.03 3.03 0 0 1-.575.246c-.248.076-.494.113-.738.113-1.012 0-2.066-.672-2.891-1.844C8.285 8.043 7.81 6.621 7.81 5.37c0-2.444 1.867-4.433 4.161-4.433s4.161 1.989 4.161 4.433c0 .833-.219 1.776-.616 2.653a.47.47 0 0 0 .233.62.47.47 0 0 0 .62-.233 7.9 7.9 0 0 0 .663-2.386c.449-.035.897.007 1.336.127 2.219.605 3.517 3.019 2.895 5.382zM3.58 6.211c.113 0 .225-.04.315-.122h0a.47.47 0 0 0 .031-.662.47.47 0 0 0-.662-.031.47.47 0 0 0-.032.662c.092.102.22.153.347.153zM15.254 9.47a.47.47 0 0 0-.66.06h0a.47.47 0 0 0 .36.769.47.47 0 0 0 .301-.829z&quot;/&gt;&lt;path d=&quot;M7.43 20.713h0a.47.47 0 0 0-.469.469.47.47 0 0 0 .469.469.47.47 0 0 0 .469-.469.47.47 0 0 0-.469-.469zm11.812-2.063h0a.47.47 0 0 0-.469.469.47.47 0 0 0 .469.469.47.47 0 0 0 .469-.469.47.47 0 0 0-.469-.469zm-2.296 2.485h0a.47.47 0 0 0-.468.469.47.47 0 0 0 .469.469.47.47 0 0 0 .469-.469.47.47 0 0 0-.469-.469zm2.203-17.813a.47.47 0 0 0 .469-.469.47.47 0 0 0-.469-.469h0a.47.47 0 0 0-.469.469.47.47 0 0 0 .469.469z&quot;/&gt;&lt;/svg&gt;
          Entertainment
          &lt;span class=&quot;text-body-tertiary fw-normal ps-2 ms-auto&quot;&gt;147&lt;/span&gt;
        &lt;/a&gt;
      &lt;/li&gt;
      &lt;li&gt;
        &lt;a class=&quot;nav-link text-body fw-normal py-1 px-0&quot; href=&quot;#!&quot;&gt;
          &lt;svg class=&quot;flex-shrin-0 text-light-emphasis me-3&quot; xmlns=&quot;http://www.w3.org/2000/svg&quot; width=&quot;24&quot; height=&quot;24&quot; viewBox=&quot;0 0 24 24&quot; fill=&quot;currentColor&quot;&gt;&lt;path d=&quot;M13.109 7.163h-2.662a.47.47 0 0 0-.469.469v1.612H8.363a.47.47 0 0 0-.469.469v2.659a.47.47 0 0 0 .469.469h1.614v1.612a.47.47 0 0 0 .469.469h2.662a.47.47 0 0 0 .469-.469V12.84h1.613a.47.47 0 0 0 .469-.469V9.712a.47.47 0 0 0-.469-.469h-1.613V7.631a.47.47 0 0 0-.469-.469zm1.613 3.018v1.722h-1.613a.47.47 0 0 0-.469.469v1.612h-1.725v-1.612a.47.47 0 0 0-.469-.469H8.832v-1.722h1.614a.47.47 0 0 0 .469-.469V8.1h1.725v1.612a.47.47 0 0 0 .469.469h1.613zm6.427 3.605l.324-.312c2.768-2.864 2.768-7.505.012-10.358-1.159-1.199-2.751-1.821-4.481-1.75-1.655.068-3.255.748-4.504 1.915l-.089.083c-.259.242-.527.492-.635.539-.109-.047-.376-.297-.635-.539l-.088-.083c-1.25-1.167-2.849-1.847-4.504-1.915-1.731-.071-3.322.551-4.48 1.75-2.758 2.852-2.758 7.494 0 10.346l2.313 2.23c.091.088.208.131.325.131a.47.47 0 0 0 .325-.806l-2.295-2.213C.332 10.311.334 6.259 2.742 3.768c1.95-2.019 5.391-1.93 7.67.199l.088.082c.549.513.851.796 1.275.796s.726-.283 1.275-.796l.088-.082c2.279-2.129 5.72-2.218 7.672-.199 2.407 2.491 2.409 6.544.006 9.037l-.715.688a4.63 4.63 0 0 0-.708-.054 4.61 4.61 0 0 0-4.604 4.599 4.63 4.63 0 0 0 .032.544l-3.046 2.937-3.717-3.582a.47.47 0 0 0-.663.012.47.47 0 0 0 .012.663l4.043 3.896c.091.088.208.131.325.131a.47.47 0 0 0 .325-.131l2.975-2.869c.652 1.75 2.341 3.001 4.317 3.001A4.61 4.61 0 0 0 24 18.038c0-1.916-1.179-3.562-2.851-4.252zm-1.755 7.916a3.67 3.67 0 0 1-3.667-3.663 3.67 3.67 0 0 1 3.667-3.662 3.67 3.67 0 0 1 3.668 3.662 3.67 3.67 0 0 1-3.668 3.663zm.001-6.101a.47.47 0 0 0-.469.469v1.971a.47.47 0 0 0 .469.469.47.47 0 0 0 .469-.469V16.07a.47.47 0 0 0-.469-.469zm0 3.935a.47.47 0 0 0-.469.469v.003c0 .259.21.467.469.467a.47.47 0 0 0 .469-.47.47.47 0 0 0-.469-.469zM5.889 16.484a.47.47 0 0 0 0 .663l.001.001c.091.091.211.137.33.137a.47.47 0 1 0-.332-.801z&quot;/&gt;&lt;/svg&gt;
          Health
          &lt;span class=&quot;text-body-tertiary fw-normal ps-2 ms-auto&quot;&gt;54&lt;/span&gt;
        &lt;/a&gt;
      &lt;/li&gt;
    &lt;/ul&gt;</code></pre>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>


        <!-- Range slider -->
        <section id="filter-range-slider" class="docs-section pb-sm-2 mb-5">
          <h4>Range slider</h4>
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
                  <div style="max-width: 280px">
                    <h4 class="h6 pb-2" id="headingPrice">Price</h4>
                    <div class="range-slider" data-range-slider='{"startMin": 250, "startMax": 700, "min": 0, "max": 1000, "step": 10, "tooltipPrefix": "$"}' aria-labelledby="headingPrice">
                      <div class="range-slider-ui"></div>
                      <div class="d-flex align-items-center">
                        <div class="position-relative w-50">
                          <i class="fi-dollar-sign position-absolute top-50 start-0 translate-middle-y ms-3"></i>
                          <input type="number" class="form-control form-icon-start" min="0" max="990" step="10" data-range-slider-min>
                        </div>
                        <i class="fi-minus text-body-emphasis mx-2"></i>
                        <div class="position-relative w-50">
                          <i class="fi-dollar-sign position-absolute top-50 start-0 translate-middle-y ms-3"></i>
                          <input type="number" class="form-control form-icon-start" min="0" max="1000" step="10" data-range-slider-max>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div id="html-4" class="tab-pane pt-4 fade" role="tabpanel">
                  <div class="position-relative" data-bs-theme="dark">
                    <button type="button" class="btn btn-sm btn-outline-secondary bg-dark position-absolute top-0 end-0 mt-2 px-2 z-3" data-copy-code="#filter-range-slider-code">
                      <i class="fi-copy fs-sm me-1"></i>
                      Copy
                    </button>
                    <pre id="filter-range-slider-code" class="code-highlight mx-n2 mb-n2"><code class="language-html">&lt;!-- Price range slider example --&gt;
    &lt;h4 class=&quot;h6 pb-2&quot; id=&quot;headingPrice&quot;&gt;Price&lt;/h4&gt;
    &lt;div class=&quot;range-slider&quot; data-range-slider='{&quot;startMin&quot;: 250, &quot;startMax&quot;: 700, &quot;min&quot;: 0, &quot;max&quot;: 1000, &quot;step&quot;: 10, &quot;tooltipPrefix&quot;: &quot;$&quot;}' aria-labelledby=&quot;headingPrice&quot;&gt;
      &lt;div class=&quot;range-slider-ui&quot;&gt;&lt;/div&gt;
      &lt;div class=&quot;d-flex align-items-center&quot;&gt;
        &lt;div class=&quot;position-relative w-50&quot;&gt;
          &lt;i class=&quot;fi-dollar-sign position-absolute top-50 start-0 translate-middle-y ms-3&quot;&gt;&lt;/i&gt;
          &lt;input type=&quot;number&quot; class=&quot;form-control form-icon-start&quot; min=&quot;0&quot; max=&quot;990&quot; step=&quot;10&quot; data-range-slider-min&gt;
        &lt;/div&gt;
        &lt;i class=&quot;fi-minus text-body-emphasis mx-2&quot;&gt;&lt;/i&gt;
        &lt;div class=&quot;position-relative w-50&quot;&gt;
          &lt;i class=&quot;fi-dollar-sign position-absolute top-50 start-0 translate-middle-y ms-3&quot;&gt;&lt;/i&gt;
          &lt;input type=&quot;number&quot; class=&quot;form-control form-icon-start&quot; min=&quot;0&quot; max=&quot;1000&quot; step=&quot;10&quot; data-range-slider-max&gt;
        &lt;/div&gt;
      &lt;/div&gt;
    &lt;/div&gt;</code></pre>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>


        <!-- Selected filters -->
        <section id="filter-selected" class="docs-section">
          <h4>Selected filters</h4>
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
                  <div style="max-width: 280px">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                      <h4 class="h6 mb-0">Filter</h4>
                      <button type="button" class="btn btn-sm btn-secondary bg-transparent border-0 text-decoration-underline p-0 ms-2">
                        Clear all
                      </button>
                    </div>
                    <div class="d-flex flex-wrap gap-2">
                      <button type="button" class="btn btn-sm btn-secondary">
                        <i class="fi-close fs-sm ms-n1 me-1"></i>
                        Year 2019
                      </button>
                      <button type="button" class="btn btn-sm btn-secondary">
                        <i class="fi-close fs-sm ms-n1 me-1"></i>
                        Sedan
                      </button>
                      <button type="button" class="btn btn-sm btn-secondary">
                        <i class="fi-close fs-sm ms-n1 me-1"></i>
                        SUV
                      </button>
                      <button type="button" class="btn btn-sm btn-secondary">
                        <i class="fi-close fs-sm ms-n1 me-1"></i>
                        Lincoln
                      </button>
                      <button type="button" class="btn btn-sm btn-secondary">
                        <i class="fi-close fs-sm ms-n1 me-1"></i>
                        Below $25,000
                      </button>
                    </div>
                  </div>

                </div>
                <div id="html-5" class="tab-pane pt-4 fade" role="tabpanel">
                  <div class="position-relative" data-bs-theme="dark">
                    <button type="button" class="btn btn-sm btn-outline-secondary bg-dark position-absolute top-0 end-0 mt-2 px-2 z-3" data-copy-code="#filter-selected-code">
                      <i class="fi-copy fs-sm me-1"></i>
                      Copy
                    </button>
                    <pre id="filter-selected-code" class="code-highlight mx-n2 mb-n2"><code class="language-html">&lt;!-- Selected filters made of buttons  --&gt;
    &lt;div class=&quot;d-flex align-items-center justify-content-between mb-3&quot;&gt;
      &lt;h4 class=&quot;h6 mb-0&quot;&gt;Filter&lt;/h4&gt;
      &lt;button type=&quot;button&quot; class=&quot;btn btn-sm btn-secondary bg-transparent border-0 text-decoration-underline p-0 ms-2&quot;&gt;
        Clear all
      &lt;/button&gt;
    &lt;/div&gt;
    &lt;div class=&quot;d-flex flex-wrap gap-2&quot;&gt;
      &lt;button type=&quot;button&quot; class=&quot;btn btn-sm btn-secondary&quot;&gt;
        &lt;i class=&quot;fi-close fs-sm ms-n1 me-1&quot;&gt;&lt;/i&gt;
        Year 2019
      &lt;/button&gt;
      &lt;button type=&quot;button&quot; class=&quot;btn btn-sm btn-secondary&quot;&gt;
        &lt;i class=&quot;fi-close fs-sm ms-n1 me-1&quot;&gt;&lt;/i&gt;
        Sedan
      &lt;/button&gt;
      &lt;button type=&quot;button&quot; class=&quot;btn btn-sm btn-secondary&quot;&gt;
        &lt;i class=&quot;fi-close fs-sm ms-n1 me-1&quot;&gt;&lt;/i&gt;
        SUV
      &lt;/button&gt;
      &lt;button type=&quot;button&quot; class=&quot;btn btn-sm btn-secondary&quot;&gt;
        &lt;i class=&quot;fi-close fs-sm ms-n1 me-1&quot;&gt;&lt;/i&gt;
        Lincoln
      &lt;/button&gt;
      &lt;button type=&quot;button&quot; class=&quot;btn btn-sm btn-secondary&quot;&gt;
        &lt;i class=&quot;fi-close fs-sm ms-n1 me-1&quot;&gt;&lt;/i&gt;
        Below $25,000
      &lt;/button&gt;
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
  <script src="{{ asset('assets/vendor/nouislider/dist/nouislider.min.js') }}"></script>
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