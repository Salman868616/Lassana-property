@extends('layouts.app')

@section('title', 'Finder Docs | Pricing')

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
                  <div class="dropdown">
                    <span class="list-group-item list-group-item-action justify-content-between dropdown-toggle pe-3 pe-none active">
                      Pricing
                      <span class="visually-hidden">price cost subscription membership payment tier plan package</span>
                    </span>
                    <ul id="anchorNav" class="nav nav-underline flex-column border-start ms-2 my-2" style="gap: .25rem;">
                      <li class="nav-item"><a class="nav-link fw-normal" href="#pricing-basic">Basic pricing plan</a></li>
                      <li class="nav-item"><a class="nav-link fw-normal" href="#pricing-featured">Featured pricing plan</a></li>
                    </ul>
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
          <h1 class="pt-1">Pricing</h1>
          <p class="text-body-secondary mb-4">Quickly build pricing plans for subscription based pricing model.</p>
        </section>


        <!-- Basic pricing plan -->
        <section id="pricing-basic" class="docs-section pb-sm-2 mb-5">
          <h4>Basic pricing plan</h4>
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
                  <div class="card bg-body-tertiary border-0 rounded-5 p-3" style="max-width: 416px">
                    <div class="card-body p-2 p-xl-3">
                      <svg class="d-block mb-3 mb-xl-4" xmlns="http://www.w3.org/2000/svg" width="56" height="56" fill="none">
                        <path class="text-primary" d="M51.729 34.356c.085-.254.17-.508.17-.763-2.119 9.068-9.237 16.187-18.305 18.305.254-.085.508-.085.678-.169l-3.475-13.051a10.99 10.99 0 0 0 7.797-7.797l13.136 3.475zm.169-12.034c-.085-.254-.085-.508-.169-.763l-13.051 3.475a10.99 10.99 0 0 0-7.797-7.797l3.475-13.051c-.254-.085-.508-.085-.678-.17 8.983 2.203 16.102 9.322 18.22 18.305zM21.644 4.271l3.475 13.051a10.99 10.99 0 0 0-7.797 7.797L4.271 21.644c-.085.254-.085.509-.17.763C6.22 13.339 13.339 6.22 22.406 4.102c-.254 0-.509.085-.763.17zm3.475 34.407l-3.559 13.136c.254.085.508.085.763.169-9.068-2.119-16.186-9.237-18.305-18.305.085.254.085.508.17.763l13.051-3.475c1.102 3.644 4.153 6.695 7.881 7.712z" fill="currentColor" />
                        <path class="text-secondary-emphasis" d="M45.797 53h-5.085a.4.4 0 1 1 0-.847h5.085c3.475 0 6.356-2.881 6.356-6.356v-5.085a.4.4 0 1 1 .847 0v5.085A7.2 7.2 0 0 1 45.797 53zM28 53c-2.203 0-4.322-.254-6.441-.847-.254-.085-.339-.254-.339-.508l3.39-12.712c-3.644-1.102-6.441-3.983-7.542-7.542L4.356 34.78c-.254.085-.424-.085-.508-.339C3.254 32.322 3 30.203 3 28s.254-4.322.847-6.441c.085-.254.254-.339.508-.339l12.712 3.39c1.102-3.644 3.983-6.441 7.542-7.542L21.22 4.356c-.085-.254.085-.424.339-.508C23.678 3.254 25.797 3 28 3s4.322.254 6.441.847c.254.085.339.254.339.508l-3.39 12.712c3.644 1.102 6.441 3.983 7.542 7.542l12.712-3.39c.254-.085.424.085.509.339.593 2.119.847 4.237.847 6.441s-.254 4.322-.847 6.441c-.085.254-.254.339-.509.339l-12.712-3.39c-1.102 3.644-3.983 6.441-7.542 7.542l3.39 12.712c.085.254-.085.424-.339.509-2.119.593-4.237.847-6.441.847zm-5.847-1.525c1.949.508 3.814.678 5.848.678s3.898-.254 5.847-.678l-3.305-12.288c-1.61.339-3.475.339-5.085 0l-3.305 12.288zm3.136-13.22a11.73 11.73 0 0 0 5.424 0c3.644-1.017 6.441-3.813 7.458-7.457.254-.848.339-1.78.339-2.712s-.085-1.864-.339-2.712c-1.017-3.644-3.814-6.441-7.458-7.458a11.73 11.73 0 0 0-5.424 0c-3.644 1.017-6.441 3.814-7.458 7.458-.254.847-.339 1.78-.339 2.712s.085 1.864.339 2.712c.932 3.559 3.813 6.441 7.458 7.457zm13.898-7.712l12.288 3.305c.508-1.949.678-3.814.678-5.847s-.254-3.898-.678-5.847l-12.288 3.305c.169.847.254 1.695.254 2.542s-.085 1.695-.254 2.542zm-34.661-8.39c-.508 1.949-.678 3.814-.678 5.848s.254 3.898.678 5.847l12.288-3.305c-.17-.847-.254-1.695-.254-2.542s.085-1.695.254-2.542L4.525 22.153zM22.153 4.525l3.305 12.288c1.61-.339 3.475-.339 5.085 0l3.305-12.288c-1.949-.508-3.814-.678-5.847-.678s-3.898.254-5.847.678zM15.288 53h-5.085A7.2 7.2 0 0 1 3 45.797v-5.085a.4.4 0 0 1 .424-.424.4.4 0 0 1 .424.424v5.085c0 3.475 2.881 6.356 6.356 6.356h5.085a.4.4 0 1 1 0 .847zm22.034-1.864c-.169 0-.339-.085-.424-.254-.085-.254 0-.424.254-.593 5.932-2.458 10.763-7.203 13.22-13.136.085-.254.339-.339.593-.254s.339.339.254.593c-2.542 6.102-7.542 11.102-13.644 13.644h-.254zm-18.644 0h-.169c-6.102-2.542-11.102-7.542-13.644-13.644-.085-.254 0-.424.254-.593.254-.085.424 0 .593.254 2.458 5.932 7.203 10.763 13.136 13.22.254.085.339.339.254.593a.65.65 0 0 1-.424.169zm32.034-32.034c-.17 0-.339-.085-.424-.254-2.458-5.932-7.203-10.763-13.136-13.22-.254-.085-.339-.339-.254-.593s.339-.339.593-.254c6.102 2.542 11.102 7.458 13.644 13.644.085.254 0 .424-.254.593 0 .085-.085.085-.169.085zm-45.424 0h-.17c-.254-.085-.339-.339-.254-.593 2.542-6.102 7.542-11.102 13.644-13.644.254-.085.424 0 .593.254.085.254 0 .424-.254.593-5.932 2.458-10.763 7.203-13.22 13.136 0 .169-.169.254-.339.254zm47.288-3.39a.4.4 0 0 1-.424-.424v-5.085c0-3.475-2.881-6.356-6.356-6.356h-5.085a.4.4 0 0 1-.424-.424.4.4 0 0 1 .424-.424h5.085A7.2 7.2 0 0 1 53 10.203v5.085a.4.4 0 0 1-.424.424zm-49.152 0A.4.4 0 0 1 3 15.288v-5.085A7.2 7.2 0 0 1 10.203 3h5.085a.4.4 0 0 1 .424.424.4.4 0 0 1-.424.424h-5.085c-3.475 0-6.356 2.881-6.356 6.356v5.085a.4.4 0 0 1-.424.424z" fill="currentColor" />
                      </svg>
                      <h3 class="fs-lg fw-normal">Easy Start</h3>
                      <div class="d-flex align-items-center pb-1 pb-xl-0 mb-2 mb-xl-3">
                        <div class="h1 mb-0">$25</div>
                        <div class="fs-sm ms-2">/ month</div>
                      </div>
                      <p class="fs-sm mb-xl-4">Ideal if you're testing the waters and want to start with basic exposure.</p>
                      <button type="button" class="btn btn-lg btn-outline-info w-100">Select Easy Start</button>
                      <ul class="list-unstyled gap-md-3 fs-sm text-dark-emphasis pt-4 mt-lg-1 mt-xl-2 mb-0">
                        <li class="d-flex">
                          <i class="fi-check fs-base text-body-secondary me-2" style="margin-top: 3px"></i>
                          7-Day Run for your ad active for one weeks
                        </li>
                        <li class="d-flex">
                          <i class="fi-check fs-base text-body-secondary me-2" style="margin-top: 3px"></i>
                          Keep your ad live and active for one week
                        </li>
                        <li class="d-flex">
                          <i class="fi-check fs-base text-body-secondary me-2" style="margin-top: 3px"></i>
                          Track views and basic engagement metrics
                        </li>
                      </ul>
                    </div>
                  </div>

                </div>
                <div id="html-1" class="tab-pane pt-4 fade" role="tabpanel">
                  <div class="position-relative" data-bs-theme="dark">
                    <button type="button" class="btn btn-sm btn-outline-secondary bg-dark position-absolute top-0 end-0 mt-2 px-2 z-3" data-copy-code="#pricing-basic-code">
                      <i class="fi-copy fs-sm me-1"></i>
                      Copy
                    </button>
                    <pre id="pricing-basic-code" class="code-highlight mx-n2 mb-n2"><code class="language-html">&lt;!-- Basic pricing plan --&gt;
    &lt;div class=&quot;card bg-body-tertiary border-0 rounded-5 p-3&quot;&gt;
      &lt;div class=&quot;card-body p-2 p-xl-3&quot;&gt;
        &lt;svg class=&quot;d-block mb-3 mb-xl-4&quot; xmlns=&quot;http://www.w3.org/2000/svg&quot; width=&quot;56&quot; height=&quot;56&quot; fill=&quot;none&quot;&gt;&lt;path class=&quot;text-primary&quot; d=&quot;M51.729 34.356c.085-.254.17-.508.17-.763-2.119 9.068-9.237 16.187-18.305 18.305.254-.085.508-.085.678-.169l-3.475-13.051a10.99 10.99 0 0 0 7.797-7.797l13.136 3.475zm.169-12.034c-.085-.254-.085-.508-.169-.763l-13.051 3.475a10.99 10.99 0 0 0-7.797-7.797l3.475-13.051c-.254-.085-.508-.085-.678-.17 8.983 2.203 16.102 9.322 18.22 18.305zM21.644 4.271l3.475 13.051a10.99 10.99 0 0 0-7.797 7.797L4.271 21.644c-.085.254-.085.509-.17.763C6.22 13.339 13.339 6.22 22.406 4.102c-.254 0-.509.085-.763.17zm3.475 34.407l-3.559 13.136c.254.085.508.085.763.169-9.068-2.119-16.186-9.237-18.305-18.305.085.254.085.508.17.763l13.051-3.475c1.102 3.644 4.153 6.695 7.881 7.712z&quot; fill=&quot;currentColor&quot;/&gt;&lt;path class=&quot;text-secondary-emphasis&quot; d=&quot;M45.797 53h-5.085a.4.4 0 1 1 0-.847h5.085c3.475 0 6.356-2.881 6.356-6.356v-5.085a.4.4 0 1 1 .847 0v5.085A7.2 7.2 0 0 1 45.797 53zM28 53c-2.203 0-4.322-.254-6.441-.847-.254-.085-.339-.254-.339-.508l3.39-12.712c-3.644-1.102-6.441-3.983-7.542-7.542L4.356 34.78c-.254.085-.424-.085-.508-.339C3.254 32.322 3 30.203 3 28s.254-4.322.847-6.441c.085-.254.254-.339.508-.339l12.712 3.39c1.102-3.644 3.983-6.441 7.542-7.542L21.22 4.356c-.085-.254.085-.424.339-.508C23.678 3.254 25.797 3 28 3s4.322.254 6.441.847c.254.085.339.254.339.508l-3.39 12.712c3.644 1.102 6.441 3.983 7.542 7.542l12.712-3.39c.254-.085.424.085.509.339.593 2.119.847 4.237.847 6.441s-.254 4.322-.847 6.441c-.085.254-.254.339-.509.339l-12.712-3.39c-1.102 3.644-3.983 6.441-7.542 7.542l3.39 12.712c.085.254-.085.424-.339.509-2.119.593-4.237.847-6.441.847zm-5.847-1.525c1.949.508 3.814.678 5.848.678s3.898-.254 5.847-.678l-3.305-12.288c-1.61.339-3.475.339-5.085 0l-3.305 12.288zm3.136-13.22a11.73 11.73 0 0 0 5.424 0c3.644-1.017 6.441-3.813 7.458-7.457.254-.848.339-1.78.339-2.712s-.085-1.864-.339-2.712c-1.017-3.644-3.814-6.441-7.458-7.458a11.73 11.73 0 0 0-5.424 0c-3.644 1.017-6.441 3.814-7.458 7.458-.254.847-.339 1.78-.339 2.712s.085 1.864.339 2.712c.932 3.559 3.813 6.441 7.458 7.457zm13.898-7.712l12.288 3.305c.508-1.949.678-3.814.678-5.847s-.254-3.898-.678-5.847l-12.288 3.305c.169.847.254 1.695.254 2.542s-.085 1.695-.254 2.542zm-34.661-8.39c-.508 1.949-.678 3.814-.678 5.848s.254 3.898.678 5.847l12.288-3.305c-.17-.847-.254-1.695-.254-2.542s.085-1.695.254-2.542L4.525 22.153zM22.153 4.525l3.305 12.288c1.61-.339 3.475-.339 5.085 0l3.305-12.288c-1.949-.508-3.814-.678-5.847-.678s-3.898.254-5.847.678zM15.288 53h-5.085A7.2 7.2 0 0 1 3 45.797v-5.085a.4.4 0 0 1 .424-.424.4.4 0 0 1 .424.424v5.085c0 3.475 2.881 6.356 6.356 6.356h5.085a.4.4 0 1 1 0 .847zm22.034-1.864c-.169 0-.339-.085-.424-.254-.085-.254 0-.424.254-.593 5.932-2.458 10.763-7.203 13.22-13.136.085-.254.339-.339.593-.254s.339.339.254.593c-2.542 6.102-7.542 11.102-13.644 13.644h-.254zm-18.644 0h-.169c-6.102-2.542-11.102-7.542-13.644-13.644-.085-.254 0-.424.254-.593.254-.085.424 0 .593.254 2.458 5.932 7.203 10.763 13.136 13.22.254.085.339.339.254.593a.65.65 0 0 1-.424.169zm32.034-32.034c-.17 0-.339-.085-.424-.254-2.458-5.932-7.203-10.763-13.136-13.22-.254-.085-.339-.339-.254-.593s.339-.339.593-.254c6.102 2.542 11.102 7.458 13.644 13.644.085.254 0 .424-.254.593 0 .085-.085.085-.169.085zm-45.424 0h-.17c-.254-.085-.339-.339-.254-.593 2.542-6.102 7.542-11.102 13.644-13.644.254-.085.424 0 .593.254.085.254 0 .424-.254.593-5.932 2.458-10.763 7.203-13.22 13.136 0 .169-.169.254-.339.254zm47.288-3.39a.4.4 0 0 1-.424-.424v-5.085c0-3.475-2.881-6.356-6.356-6.356h-5.085a.4.4 0 0 1-.424-.424.4.4 0 0 1 .424-.424h5.085A7.2 7.2 0 0 1 53 10.203v5.085a.4.4 0 0 1-.424.424zm-49.152 0A.4.4 0 0 1 3 15.288v-5.085A7.2 7.2 0 0 1 10.203 3h5.085a.4.4 0 0 1 .424.424.4.4 0 0 1-.424.424h-5.085c-3.475 0-6.356 2.881-6.356 6.356v5.085a.4.4 0 0 1-.424.424z&quot; fill=&quot;currentColor&quot;/&gt;&lt;/svg&gt;
        &lt;h3 class=&quot;fs-lg fw-normal&quot;&gt;Easy Start&lt;/h3&gt;
        &lt;div class=&quot;d-flex align-items-center pb-1 pb-xl-0 mb-2 mb-xl-3&quot;&gt;
          &lt;div class=&quot;h1 mb-0&quot;&gt;$25&lt;/div&gt;
          &lt;div class=&quot;fs-sm ms-2&quot;&gt;/ month&lt;/div&gt;
        &lt;/div&gt;
        &lt;p class=&quot;fs-sm mb-xl-4&quot;&gt;Ideal if you're testing the waters and want to start with basic exposure.&lt;/p&gt;
        &lt;button type=&quot;button&quot; class=&quot;btn btn-lg btn-outline-info w-100&quot;&gt;Select Easy Start&lt;/button&gt;
        &lt;ul class=&quot;list-unstyled gap-md-3 fs-sm text-dark-emphasis pt-4 mt-lg-1 mt-xl-2 mb-0&quot;&gt;
          &lt;li class=&quot;d-flex&quot;&gt;
            &lt;i class=&quot;fi-check fs-base text-body-secondary me-2&quot; style=&quot;margin-top: 3px&quot;&gt;&lt;/i&gt;
            7-Day Run for your ad active for one weeks
          &lt;/li&gt;
          &lt;li class=&quot;d-flex&quot;&gt;
            &lt;i class=&quot;fi-check fs-base text-body-secondary me-2&quot; style=&quot;margin-top: 3px&quot;&gt;&lt;/i&gt;
            Keep your ad live and active for one week
          &lt;/li&gt;
          &lt;li class=&quot;d-flex&quot;&gt;
            &lt;i class=&quot;fi-check fs-base text-body-secondary me-2&quot; style=&quot;margin-top: 3px&quot;&gt;&lt;/i&gt;
            Track views and basic engagement metrics
          &lt;/li&gt;
        &lt;/ul&gt;
      &lt;/div&gt;
    &lt;/div&gt;</code></pre>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>


        <!-- Featured pricing plan -->
        <section id="pricing-featured" class="docs-section">
          <h4>Featured pricing plan</h4>
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
                <div id="preview-2" class="tab-pane pt-5 pb-2 mt-3 fade show active" role="tabpanel">
                  <div class="position-relative" style="max-width: 416px">
                    <div class="card position-relative z-2 bg-body-tertiary border-0 rounded-5 p-3">
                      <div class="card-body p-2 p-xl-3">
                        <svg class="d-block mb-3 mb-xl-4" xmlns="http://www.w3.org/2000/svg" width="56" height="56" fill="none">
                          <path class="text-info" d="M44.136 9.966c5.79 4.746 9.491 11.864 9.491 19.932 0 14.142-11.485 25.627-25.627 25.627S2.373 44.041 2.373 29.898 13.858 4.271 28 4.271v5.695c-11.01 0-19.932 8.922-19.932 19.932S16.99 49.831 28 49.831s19.932-8.922 19.932-19.932c0-7.973-4.746-14.807-11.485-18.034h.095 7.593V9.966z" fill="currentColor" />
                          <path class="text-primary" d="M44.136 9.966v1.898h-7.593V9.966 2.373h7.593v7.593z" fill="currentColor" />
                          <path class="text-info" d="M28 21.356c-4.746 0-8.542 3.797-8.542 8.542s3.797 8.542 8.542 8.542 8.542-3.797 8.542-8.542-3.796-8.542-8.542-8.542zm0-5.695a14.22 14.22 0 0 1 14.237 14.237A14.22 14.22 0 0 1 28 44.136a14.22 14.22 0 0 1-14.237-14.237A14.22 14.22 0 0 1 28 15.661z" fill="currentColor" />
                          <path class="text-primary" d="M36.543 2.373v7.593h-.949-7.593V4.271.475h8.542v1.898zM28 27.051c1.614 0 2.847 1.234 2.847 2.848S29.614 32.746 28 32.746s-2.847-1.234-2.847-2.848 1.234-2.847 2.848-2.847z" fill="currentColor" />
                          <path class="text-secondary-emphasis" d="M28 56A26.09 26.09 0 0 1 1.898 29.898c0-14.237 11.485-25.817 25.627-26.102V.475c0-.285.19-.475.475-.475h8.542c.285 0 .475.19.475.475V11.39h6.644V2.847h-3.322c-.285 0-.475-.19-.475-.475s.19-.475.475-.475h3.797c.285 0 .475.19.475.475v9.491c0 .285-.19.475-.475.475h-7.593c-.285 0-.475-.19-.475-.475v-1.424h-4.271c-.285 0-.475-.19-.475-.475s.19-.475.475-.475h4.271V.949h-7.593v28.949c0 .285-.19.475-.475.475s-.475-.19-.475-.475V27.62c-1.044.19-1.898 1.139-1.898 2.278A2.35 2.35 0 0 0 28 32.271a2.35 2.35 0 0 0 2.373-2.373c0-.285.19-.475.475-.475s.475.19.475.475c0 1.803-1.519 3.322-3.322 3.322s-3.322-1.519-3.322-3.322c0-1.708 1.234-3.037 2.847-3.322V21.83c-4.271.285-7.593 3.797-7.593 8.068A8.06 8.06 0 0 0 28 37.966c4.461 0 8.068-3.607 8.068-8.068 0-3.132-1.709-5.885-4.461-7.213-.19-.095-.285-.38-.19-.664.095-.19.38-.285.664-.19 3.132 1.519 5.031 4.651 5.031 8.068 0 4.936-4.081 9.017-9.017 9.017s-9.016-4.081-9.016-9.017c0-4.841 3.797-8.732 8.542-9.017v-4.746c-7.403.285-13.288 6.359-13.288 13.763 0 7.593 6.169 13.763 13.763 13.763s13.763-6.169 13.763-13.763c0-5.79-3.702-11.01-9.207-13.003-.285-.095-.38-.38-.285-.57s.38-.38.569-.285c5.885 2.088 9.776 7.688 9.776 13.858 0 8.068-6.644 14.712-14.712 14.712s-14.712-6.644-14.712-14.712c0-7.973 6.359-14.427 14.237-14.712v-4.746c-10.536.285-18.983 8.922-18.983 19.458 0 10.725 8.732 19.458 19.458 19.458s19.458-8.732 19.458-19.458c0-5.315-2.088-10.251-5.885-13.858-.19-.19-.19-.475 0-.664a.46.46 0 0 1 .664 0c3.986 3.892 6.17 9.017 6.17 14.617A20.38 20.38 0 0 1 28 50.4 20.38 20.38 0 0 1 7.593 29.993c0-11.105 8.922-20.122 19.932-20.407V4.841c-13.668.285-24.678 11.39-24.678 25.153 0 13.858 11.295 25.152 25.153 25.152s25.153-11.295 25.153-25.152a25.23 25.23 0 0 0-5.6-15.851c-.19-.19-.095-.475.095-.664s.475-.095.664.095c3.797 4.651 5.79 10.441 5.79 16.42C54.102 44.325 42.427 56 28 56z" fill="currentColor" />
                        </svg>
                        <h3 class="fs-lg fw-normal">Fast Sale</h3>
                        <div class="d-flex align-items-center pb-1 pb-xl-0 mb-2 mb-xl-3">
                          <div class="h1 mb-0">$49</div>
                          <div class="fs-sm ms-2">/ month</div>
                        </div>
                        <p class="fs-sm mb-xl-4">Perfect for serious sellers who want more exposure and detailed insights.</p>
                        <button type="button" class="btn btn-lg btn-info w-100">Select Fast Sale</button>
                        <div class="h6 fs-sm pt-4 mt-lg-1 mt-xl-2">Includes everything in Easy Start +</div>
                        <ul class="list-unstyled gap-md-3 fs-sm text-dark-emphasis mb-0">
                          <li class="d-flex">
                            <i class="fi-check fs-base text-body-secondary me-2" style="margin-top: 3px"></i>
                            14-Day Run for your ad active for two weeks
                          </li>
                          <li class="d-flex">
                            <i class="fi-check fs-base text-body-secondary me-2" style="margin-top: 3px"></i>
                            Detailed user engagement analytics
                          </li>
                          <li class="d-flex">
                            <i class="fi-check fs-base text-body-secondary me-2" style="margin-top: 3px"></i>
                            Dedicated assistance from our support team
                          </li>
                        </ul>
                      </div>
                    </div>
                    <div class="position-absolute top-0 start-0 w-100 z-1 fs-sm fw-semibold text-white text-center" style="margin-top: -27px">Recommended</div>
                    <div class="position-absolute top-0 start-0 bg-info rounded-5 ms-n1" style="width: calc(100% + 8px); height: calc(100% + 36px); margin-top: -32px"></div>
                  </div>
                </div>
                <div id="html-2" class="tab-pane pt-4 fade" role="tabpanel">
                  <div class="position-relative" data-bs-theme="dark">
                    <button type="button" class="btn btn-sm btn-outline-secondary bg-dark position-absolute top-0 end-0 mt-2 px-2 z-3" data-copy-code="#pricing-featured-code">
                      <i class="fi-copy fs-sm me-1"></i>
                      Copy
                    </button>
                    <pre id="pricing-featured-code" class="code-highlight mx-n2 mb-n2"><code class="language-html">&lt;!-- Featured pricing plan --&gt;
    &lt;div class=&quot;position-relative&quot;&gt;
      &lt;div class=&quot;card position-relative z-2 bg-body-tertiary border-0 rounded-5 p-3&quot;&gt;
        &lt;div class=&quot;card-body p-2 p-xl-3&quot;&gt;
          &lt;svg class=&quot;d-block mb-3 mb-xl-4&quot; xmlns=&quot;http://www.w3.org/2000/svg&quot; width=&quot;56&quot; height=&quot;56&quot; fill=&quot;none&quot;&gt;&lt;path class=&quot;text-info&quot; d=&quot;M44.136 9.966c5.79 4.746 9.491 11.864 9.491 19.932 0 14.142-11.485 25.627-25.627 25.627S2.373 44.041 2.373 29.898 13.858 4.271 28 4.271v5.695c-11.01 0-19.932 8.922-19.932 19.932S16.99 49.831 28 49.831s19.932-8.922 19.932-19.932c0-7.973-4.746-14.807-11.485-18.034h.095 7.593V9.966z&quot; fill=&quot;currentColor&quot;/&gt;&lt;path class=&quot;text-primary&quot; d=&quot;M44.136 9.966v1.898h-7.593V9.966 2.373h7.593v7.593z&quot; fill=&quot;currentColor&quot;/&gt;&lt;path class=&quot;text-info&quot; d=&quot;M28 21.356c-4.746 0-8.542 3.797-8.542 8.542s3.797 8.542 8.542 8.542 8.542-3.797 8.542-8.542-3.796-8.542-8.542-8.542zm0-5.695a14.22 14.22 0 0 1 14.237 14.237A14.22 14.22 0 0 1 28 44.136a14.22 14.22 0 0 1-14.237-14.237A14.22 14.22 0 0 1 28 15.661z&quot; fill=&quot;currentColor&quot;/&gt;&lt;path class=&quot;text-primary&quot; d=&quot;M36.543 2.373v7.593h-.949-7.593V4.271.475h8.542v1.898zM28 27.051c1.614 0 2.847 1.234 2.847 2.848S29.614 32.746 28 32.746s-2.847-1.234-2.847-2.848 1.234-2.847 2.848-2.847z&quot; fill=&quot;currentColor&quot;/&gt;&lt;path class=&quot;text-secondary-emphasis&quot; d=&quot;M28 56A26.09 26.09 0 0 1 1.898 29.898c0-14.237 11.485-25.817 25.627-26.102V.475c0-.285.19-.475.475-.475h8.542c.285 0 .475.19.475.475V11.39h6.644V2.847h-3.322c-.285 0-.475-.19-.475-.475s.19-.475.475-.475h3.797c.285 0 .475.19.475.475v9.491c0 .285-.19.475-.475.475h-7.593c-.285 0-.475-.19-.475-.475v-1.424h-4.271c-.285 0-.475-.19-.475-.475s.19-.475.475-.475h4.271V.949h-7.593v28.949c0 .285-.19.475-.475.475s-.475-.19-.475-.475V27.62c-1.044.19-1.898 1.139-1.898 2.278A2.35 2.35 0 0 0 28 32.271a2.35 2.35 0 0 0 2.373-2.373c0-.285.19-.475.475-.475s.475.19.475.475c0 1.803-1.519 3.322-3.322 3.322s-3.322-1.519-3.322-3.322c0-1.708 1.234-3.037 2.847-3.322V21.83c-4.271.285-7.593 3.797-7.593 8.068A8.06 8.06 0 0 0 28 37.966c4.461 0 8.068-3.607 8.068-8.068 0-3.132-1.709-5.885-4.461-7.213-.19-.095-.285-.38-.19-.664.095-.19.38-.285.664-.19 3.132 1.519 5.031 4.651 5.031 8.068 0 4.936-4.081 9.017-9.017 9.017s-9.016-4.081-9.016-9.017c0-4.841 3.797-8.732 8.542-9.017v-4.746c-7.403.285-13.288 6.359-13.288 13.763 0 7.593 6.169 13.763 13.763 13.763s13.763-6.169 13.763-13.763c0-5.79-3.702-11.01-9.207-13.003-.285-.095-.38-.38-.285-.57s.38-.38.569-.285c5.885 2.088 9.776 7.688 9.776 13.858 0 8.068-6.644 14.712-14.712 14.712s-14.712-6.644-14.712-14.712c0-7.973 6.359-14.427 14.237-14.712v-4.746c-10.536.285-18.983 8.922-18.983 19.458 0 10.725 8.732 19.458 19.458 19.458s19.458-8.732 19.458-19.458c0-5.315-2.088-10.251-5.885-13.858-.19-.19-.19-.475 0-.664a.46.46 0 0 1 .664 0c3.986 3.892 6.17 9.017 6.17 14.617A20.38 20.38 0 0 1 28 50.4 20.38 20.38 0 0 1 7.593 29.993c0-11.105 8.922-20.122 19.932-20.407V4.841c-13.668.285-24.678 11.39-24.678 25.153 0 13.858 11.295 25.152 25.153 25.152s25.153-11.295 25.153-25.152a25.23 25.23 0 0 0-5.6-15.851c-.19-.19-.095-.475.095-.664s.475-.095.664.095c3.797 4.651 5.79 10.441 5.79 16.42C54.102 44.325 42.427 56 28 56z&quot; fill=&quot;currentColor&quot;/&gt;&lt;/svg&gt;
          &lt;h3 class=&quot;fs-lg fw-normal&quot;&gt;Fast Sale&lt;/h3&gt;
          &lt;div class=&quot;d-flex align-items-center pb-1 pb-xl-0 mb-2 mb-xl-3&quot;&gt;
            &lt;div class=&quot;h1 mb-0&quot;&gt;$49&lt;/div&gt;
            &lt;div class=&quot;fs-sm ms-2&quot;&gt;/ month&lt;/div&gt;
          &lt;/div&gt;
          &lt;p class=&quot;fs-sm mb-xl-4&quot;&gt;Perfect for serious sellers who want more exposure and detailed insights.&lt;/p&gt;
          &lt;button type=&quot;button&quot; class=&quot;btn btn-lg btn-info w-100&quot;&gt;Select Fast Sale&lt;/button&gt;
          &lt;div class=&quot;h6 fs-sm pt-4 mt-lg-1 mt-xl-2&quot;&gt;Includes everything in Easy Start +&lt;/div&gt;
          &lt;ul class=&quot;list-unstyled gap-md-3 fs-sm text-dark-emphasis mb-0&quot;&gt;
            &lt;li class=&quot;d-flex&quot;&gt;
              &lt;i class=&quot;fi-check fs-base text-body-secondary me-2&quot; style=&quot;margin-top: 3px&quot;&gt;&lt;/i&gt;
              14-Day Run for your ad active for two weeks
            &lt;/li&gt;
            &lt;li class=&quot;d-flex&quot;&gt;
              &lt;i class=&quot;fi-check fs-base text-body-secondary me-2&quot; style=&quot;margin-top: 3px&quot;&gt;&lt;/i&gt;
              Detailed user engagement analytics
            &lt;/li&gt;
            &lt;li class=&quot;d-flex&quot;&gt;
              &lt;i class=&quot;fi-check fs-base text-body-secondary me-2&quot; style=&quot;margin-top: 3px&quot;&gt;&lt;/i&gt;
              Dedicated assistance from our support team
            &lt;/li&gt;
          &lt;/ul&gt;
        &lt;/div&gt;
      &lt;/div&gt;
      &lt;div class=&quot;position-absolute top-0 start-0 w-100 z-1 fs-sm fw-semibold text-white text-center&quot; style=&quot;margin-top: -27px&quot;&gt;Recommended&lt;/div&gt;
      &lt;div class=&quot;position-absolute top-0 start-0 bg-info rounded-5 ms-n1&quot; style=&quot;width: calc(100% + 8px); height: calc(100% + 36px); margin-top: -32px&quot;&gt;&lt;/div&gt;
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