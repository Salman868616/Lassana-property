@extends('layouts.app')

@section('title', 'Finder Docs | Offcanvas')

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

  <!-- Left offcanvas example -->
  <div class="offcanvas offcanvas-start" id="offcanvasLeft" tabindex="-1" aria-labelledby="offcanvasLeftLabel">
    <div class="offcanvas-header border-bottom">
      <h5 class="offcanvas-title" id="offcanvasLeftLabel">Left offcanvas</h5>
      <button class="btn-close" type="button" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
      <p>Content for the offcanvas goes here. You can place just about any Bootstrap or Finder component or custom elements here.</p>
    </div>
  </div>

  <!-- Top offcanvas example -->
  <div class="offcanvas offcanvas-top" id="offcanvasTop" tabindex="-1" aria-labelledby="offcanvasTopLabel">
    <div class="offcanvas-header border-bottom">
      <h5 class="offcanvas-title" id="offcanvasTopLabel">Top offcanvas</h5>
      <button class="btn-close" type="button" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
      <p>Content for the offcanvas goes here. You can place just about any Bootstrap or Finder component or custom elements here.</p>
    </div>
  </div>

  <!-- Right offcanvas example -->
  <div class="offcanvas offcanvas-end" id="offcanvasRight" tabindex="-1" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header border-bottom">
      <h5 class="offcanvas-title" id="offcanvasRightLabel">Right offcanvas</h5>
      <button class="btn-close" type="button" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
      <p>Content for the offcanvas goes here. You can place just about any Bootstrap or Finder component or custom elements here.</p>
    </div>
  </div>

  <!-- Bottom offcanvas example -->
  <div class="offcanvas offcanvas-bottom" id="offcanvasBottom" tabindex="-1" aria-labelledby="offcanvasBottomLabel">
    <div class="offcanvas-header border-bottom">
      <h5 class="offcanvas-title" id="offcanvasBottomLabel">Bottom offcanvas</h5>
      <button class="btn-close" type="button" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
      <p>Content for the offcanvas goes here. You can place just about any Bootstrap or Finder component or custom elements here.</p>
    </div>
  </div>


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
                  <div class="dropdown">
                    <span class="list-group-item list-group-item-action justify-content-between dropdown-toggle pe-3 pe-none active">
                      Offcanvas
                      <span class="visually-hidden">drawer overlay sidebar</span>
                    </span>
                    <ul id="anchorNav" class="nav nav-underline flex-column border-start ms-2 my-2" style="gap: .25rem;">
                      <li class="nav-item"><a class="nav-link fw-normal" href="#offcanvas-components">Offcanvas components</a></li>
                      <li class="nav-item"><a class="nav-link fw-normal" href="#offcanvas-placement">Placement</a></li>
                      <li class="nav-item"><a class="nav-link fw-normal" href="#offcanvas-mobile-menu">Mobile menu (responsive)</a></li>
                    </ul>
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
          <a class="badge d-inline-flex align-items-center text-info bg-info-subtle fw-semibold text-decoration-none py-2 px-3 mb-2 rounded-pill" href="https://getbootstrap.com/docs/5.3/components/offcanvas/" target="_blank" rel="noreferrer">
            Bootstrap docs
            <i class="fi-external-link fs-sm ms-1"></i>
          </a>
          <h1 class="pt-1">Offcanvas</h1>
          <p class="text-body-secondary mb-4">Build hidden sidebars into your project for navigation, shopping carts, widgets etc.</p>
        </section>


        <!-- Offcanvas components -->
        <section id="offcanvas-components" class="docs-section pb-sm-2 mb-5">
          <h4>Offcanvas components</h4>
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
                  <div class="bg-dotted rounded p-3 p-sm-4">
                    <div class="offcanvas offcanvas-start show position-static border-0 rounded" tabindex="-1" aria-labelledby="offcanvasLabel" data-bs-scroll="true" data-bs-backdrop="false" style="transform: none; visibility: visible;">
                      <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasLabel">Menu</h5>
                        <button type="button" class="btn-close" aria-label="Close"></button>
                      </div>
                      <div class="offcanvas-body pt-0" style="max-height: 275px">
                        <nav class="list-group list-group-borderless">
                          <a class="list-group-item list-group-item-action active" href="#!" aria-current="page">
                            Home
                          </a>
                          <a class="list-group-item list-group-item-action" href="#!">
                            User profile
                          </a>
                          <a class="list-group-item list-group-item-action" href="#!">
                            Services
                          </a>
                          <a class="list-group-item list-group-item-action" href="#!">
                            Our works
                          </a>
                          <a class="list-group-item list-group-item-action" href="#!">
                            About
                          </a>
                          <a class="list-group-item list-group-item-action" href="#!">
                            Our team
                          </a>
                          <a class="list-group-item list-group-item-action" href="#!">
                            Dashboard
                          </a>
                          <a class="list-group-item list-group-item-action" href="#!">
                            Contact
                          </a>
                          <a class="list-group-item list-group-item-action" href="#!">
                            Help center
                          </a>
                          <a class="list-group-item list-group-item-action" href="#!">
                            Support
                          </a>
                        </nav>
                      </div>
                      <div class="offcanvas-header d-flex border-top">
                        <button type="button" class="btn btn-primary w-100 me-3">
                          <i class="fi-log-in fs-base ms-n1 me-2"></i>
                          Login
                        </button>
                        <button type="button" class="btn btn-outline-primary w-100">
                          <i class="fi-user ms-n1 me-2"></i>
                          Sign up
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
                <div id="html-1" class="tab-pane pt-4 fade" role="tabpanel">
                  <div class="position-relative" data-bs-theme="dark">
                    <button type="button" class="btn btn-sm btn-outline-secondary bg-dark position-absolute top-0 end-0 mt-2 px-2 z-3" data-copy-code="#offcanvas-components-code">
                      <i class="fi-copy fs-sm me-1"></i>
                      Copy
                    </button>
                    <pre id="offcanvas-components-code" class="code-highlight mx-n2 mb-n2"><code class="language-html">&lt;!-- Offcanvas. Remove .show class to hide offcanvas initially --&gt;
      &lt;div class=&quot;offcanvas offcanvas-start show&quot; id=&quot;offcanvas&quot; tabindex=&quot;-1&quot; aria-labelledby=&quot;offcanvasLabel&quot;&gt;

        &lt;!-- Offcanvas header --&gt;
        &lt;div class=&quot;offcanvas-header&quot;&gt;
          &lt;h5 class=&quot;offcanvas-title&quot; id=&quot;offcanvasLabel&quot;&gt;Menu&lt;/h5&gt;
          &lt;button type=&quot;button&quot; class=&quot;btn-close&quot; data-bs-dismiss=&quot;offcanvas&quot; aria-label=&quot;Close&quot;&gt;&lt;/button&gt;
        &lt;/div&gt;

        &lt;!-- Offcanvas body --&gt;
        &lt;div class=&quot;offcanvas-body pt-0&quot;&gt;
          &lt;nav class=&quot;list-group list-group-borderless&quot;&gt;
            &lt;a class=&quot;list-group-item list-group-item-action active&quot; href=&quot;#&quot; aria-current=&quot;page&quot;&gt;
              Home
            &lt;/a&gt;
            &lt;a class=&quot;list-group-item list-group-item-action&quot; href=&quot;#&quot;&gt;
              User profile
            &lt;/a&gt;
            &lt;a class=&quot;list-group-item list-group-item-action&quot; href=&quot;#&quot;&gt;
              Services
            &lt;/a&gt;
            &lt;a class=&quot;list-group-item list-group-item-action&quot; href=&quot;#&quot;&gt;
              Our works
            &lt;/a&gt;
            &lt;a class=&quot;list-group-item list-group-item-action&quot; href=&quot;#&quot;&gt;
              About
            &lt;/a&gt;
            &lt;a class=&quot;list-group-item list-group-item-action&quot; href=&quot;#&quot;&gt;
              Our team
            &lt;/a&gt;
            &lt;a class=&quot;list-group-item list-group-item-action&quot; href=&quot;#&quot;&gt;
              Dashboard
            &lt;/a&gt;
            &lt;a class=&quot;list-group-item list-group-item-action&quot; href=&quot;#&quot;&gt;
              Contact
            &lt;/a&gt;
            &lt;a class=&quot;list-group-item list-group-item-action&quot; href=&quot;#&quot;&gt;
              Help center
            &lt;/a&gt;
            &lt;a class=&quot;list-group-item list-group-item-action&quot; href=&quot;#&quot;&gt;
              Support
            &lt;/a&gt;
          &lt;/nav&gt;
        &lt;/div&gt;

        &lt;!-- Offcanvas footer --&gt;
        &lt;div class=&quot;offcanvas-header d-flex border-top&quot;&gt;
          &lt;button type=&quot;button&quot; class=&quot;btn btn-primary w-100 me-3&quot;&gt;
            &lt;i class=&quot;fi-log-in fs-base ms-n1 me-2&quot;&gt;&lt;/i&gt;
            Login
          &lt;/button&gt;
          &lt;button type=&quot;button&quot; class=&quot;btn btn-outline-primary w-100&quot;&gt;
            &lt;i class=&quot;fi-user ms-n1 me-2&quot;&gt;&lt;/i&gt;
            Sign up
          &lt;/button&gt;
        &lt;/div&gt;
      &lt;/div&gt;</code></pre>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>


        <!-- Placement -->
        <section id="offcanvas-placement" class="docs-section pb-sm-2 mb-5">
          <h4>Placement</h4>
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
                <div id="preview-2" class="tab-pane pt-4 mt-3 fade show active" role="tabpanel">
                  <button type="button" class="btn btn-outline-secondary mb-3 me-2" data-bs-toggle="offcanvas" data-bs-target="#offcanvasLeft" aria-controls="offcanvasLeft">Toggle left offcanvas</button>
                  <button type="button" class="btn btn-outline-secondary mb-3 me-2" data-bs-toggle="offcanvas" data-bs-target="#offcanvasTop" aria-controls="offcanvasTop">Toggle top offcanvas</button>
                  <button type="button" class="btn btn-outline-secondary mb-3 me-2" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">Toggle right offcanvas</button>
                  <button type="button" class="btn btn-outline-secondary mb-3" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom" aria-controls="offcanvasBottom">Toggle bottom offcanvas</button>
                </div>
                <div id="html-2" class="tab-pane pt-4 fade" role="tabpanel">
                  <div class="position-relative" data-bs-theme="dark">
                    <button type="button" class="btn btn-sm btn-outline-secondary bg-dark position-absolute top-0 end-0 mt-2 px-2 z-3" data-copy-code="#offcanvas-placement-code">
                      <i class="fi-copy fs-sm me-1"></i>
                      Copy
                    </button>
                    <pre id="offcanvas-placement-code" class="code-highlight mx-n2 mb-n2"><code class="language-html">&lt;!-- Left offcanvas toggle button --&gt;
      &lt;button type=&quot;button&quot; class=&quot;btn btn-outline-secondary&quot; data-bs-toggle=&quot;offcanvas&quot; data-bs-target=&quot;#offcanvasLeft&quot; aria-controls=&quot;offcanvasLeft&quot;&gt;
        Toggle left offcanvas
      &lt;/button&gt;

      &lt;!-- Left offcanvas example --&gt;
      &lt;div class=&quot;offcanvas offcanvas-start&quot; id=&quot;offcanvasLeft&quot; tabindex=&quot;-1&quot; aria-labelledby=&quot;offcanvasLeftLabel&quot;&gt;
        &lt;div class=&quot;offcanvas-header border-bottom&quot;&gt;
          &lt;h5 class=&quot;offcanvas-title&quot; id=&quot;offcanvasLeftLabel&quot;&gt;Left offcanvas&lt;/h5&gt;
          &lt;button class=&quot;btn-close&quot; type=&quot;button&quot; data-bs-dismiss=&quot;offcanvas&quot; aria-label=&quot;Close&quot;&gt;&lt;/button&gt;
        &lt;/div&gt;
        &lt;div class=&quot;offcanvas-body&quot;&gt;
          &lt;p&gt;Content for the offcanvas goes here. You can place just about any Bootstrap or Finder component or custom elements here.&lt;/p&gt;
        &lt;/div&gt;
      &lt;/div&gt;


      &lt;!-- Top offcanvas toggle button --&gt;
      &lt;button type=&quot;button&quot; class=&quot;btn btn-outline-secondary&quot; data-bs-toggle=&quot;offcanvas&quot; data-bs-target=&quot;#offcanvasTop&quot; aria-controls=&quot;offcanvasTop&quot;&gt;
        Toggle top offcanvas
      &lt;/button&gt;

      &lt;!-- Top offcanvas example --&gt;
      &lt;div class=&quot;offcanvas offcanvas-top&quot; id=&quot;offcanvasTop&quot; tabindex=&quot;-1&quot; aria-labelledby=&quot;offcanvasTopLabel&quot;&gt;
        &lt;div class=&quot;offcanvas-header border-bottom&quot;&gt;
          &lt;h5 class=&quot;offcanvas-title&quot; id=&quot;offcanvasTopLabel&quot;&gt;Top offcanvas&lt;/h5&gt;
          &lt;button class=&quot;btn-close&quot; type=&quot;button&quot; data-bs-dismiss=&quot;offcanvas&quot; aria-label=&quot;Close&quot;&gt;&lt;/button&gt;
        &lt;/div&gt;
        &lt;div class=&quot;offcanvas-body&quot;&gt;
          &lt;p&gt;Content for the offcanvas goes here. You can place just about any Bootstrap or Finder component or custom elements here.&lt;/p&gt;
        &lt;/div&gt;
      &lt;/div&gt;


      &lt;!-- Right offcanvas toggle button --&gt;
      &lt;button type=&quot;button&quot; class=&quot;btn btn-outline-secondary&quot; data-bs-toggle=&quot;offcanvas&quot; data-bs-target=&quot;#offcanvasRight&quot; aria-controls=&quot;offcanvasRight&quot;&gt;
        Toggle right offcanvas
      &lt;/button&gt;

      &lt;!-- Right offcanvas example --&gt;
      &lt;div class=&quot;offcanvas offcanvas-end&quot; id=&quot;offcanvasRight&quot; tabindex=&quot;-1&quot; aria-labelledby=&quot;offcanvasRightLabel&quot;&gt;
        &lt;div class=&quot;offcanvas-header border-bottom&quot;&gt;
          &lt;h5 class=&quot;offcanvas-title&quot; id=&quot;offcanvasRightLabel&quot;&gt;Right offcanvas&lt;/h5&gt;
          &lt;button class=&quot;btn-close&quot; type=&quot;button&quot; data-bs-dismiss=&quot;offcanvas&quot; aria-label=&quot;Close&quot;&gt;&lt;/button&gt;
        &lt;/div&gt;
        &lt;div class=&quot;offcanvas-body&quot;&gt;
          &lt;p&gt;Content for the offcanvas goes here. You can place just about any Bootstrap or Finder component or custom elements here.&lt;/p&gt;
        &lt;/div&gt;
      &lt;/div&gt;

      &lt;!-- Bottom offcanvas toggle button --&gt;
      &lt;button type=&quot;button&quot; class=&quot;btn btn-outline-secondary&quot; data-bs-toggle=&quot;offcanvas&quot; data-bs-target=&quot;#offcanvasBottom&quot; aria-controls=&quot;offcanvasBottom&quot;&gt;
        Toggle bottom offcanvas
      &lt;/button&gt;

      &lt;!-- Bottom offcanvas example --&gt;
      &lt;div class=&quot;offcanvas offcanvas-bottom&quot; id=&quot;offcanvasBottom&quot; tabindex=&quot;-1&quot; aria-labelledby=&quot;offcanvasBottomLabel&quot;&gt;
        &lt;div class=&quot;offcanvas-header border-bottom&quot;&gt;
          &lt;h5 class=&quot;offcanvas-title&quot; id=&quot;offcanvasBottomLabel&quot;&gt;Bottom offcanvas&lt;/h5&gt;
          &lt;button class=&quot;btn-close&quot; type=&quot;button&quot; data-bs-dismiss=&quot;offcanvas&quot; aria-label=&quot;Close&quot;&gt;&lt;/button&gt;
        &lt;/div&gt;
        &lt;div class=&quot;offcanvas-body&quot;&gt;
          &lt;p&gt;Content for the offcanvas goes here. You can place just about any Bootstrap or Finder component or custom elements here.&lt;/p&gt;
        &lt;/div&gt;
      &lt;/div&gt;</code></pre>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>


        <!-- Mobile menu (responsive) -->
        <section id="offcanvas-mobile-menu" class="docs-section">
          <h4>Mobile menu (responsive)</h4>
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
                  <div class="bg-dotted rounded p-3 p-sm-4">
                    <iframe class="w-100 shadow rounded" src="navbar-offcanvas" height="522" title="Navbar with offcanvas menu" style="max-width: 375px"></iframe>
                  </div>
                </div>
                <div id="html-3" class="tab-pane pt-4 fade" role="tabpanel">
                  <div class="position-relative" data-bs-theme="dark">
                    <button type="button" class="btn btn-sm btn-outline-secondary bg-dark position-absolute top-0 end-0 mt-2 px-2 z-3" data-copy-code="#offcanvas-mobile-menu-code">
                      <i class="fi-copy fs-sm me-1"></i>
                      Copy
                    </button>
                    <pre id="offcanvas-mobile-menu-code" class="code-highlight mx-n2 mb-n2"><code class="language-html">&lt;!-- Navbar with offcanvas menu on screens smaller than 500px (xs) --&gt;
      &lt;header class=&quot;navbar navbar-expand-lg bg-body sticky-top p-0&quot;&gt;
        &lt;div class=&quot;container py-3&quot;&gt;

          &lt;!-- Navbar brand (Logo) --&gt;
          &lt;a class=&quot;navbar-brand&quot; href=&quot;#&quot;&gt;
            &lt;span class=&quot;d-flex flex-shrink-0 text-primary me-2&quot;&gt;
              &lt;svg xmlns=&quot;http://www.w3.org/2000/svg&quot; width=&quot;36&quot; height=&quot;36&quot;&gt;&lt;path d=&quot;M36 18.01c0 8.097-5.355 14.949-12.705 17.2a18.12 18.12 0 0 1-5.315.79C9.622 36 2.608 30.313.573 22.611.257 21.407.059 20.162 0 18.879v-1.758c.02-.395.059-.79.099-1.185.099-.908.277-1.817.514-2.686C2.687 5.628 9.682 0 18 0c5.572 0 10.551 2.528 13.871 6.517 1.502 1.797 2.648 3.91 3.359 6.201.494 1.659.771 3.436.771 5.292z&quot; fill=&quot;currentColor&quot;/&gt;&lt;g fill=&quot;#fff&quot;&gt;&lt;path d=&quot;M17.466 21.624c-.514 0-.988-.316-1.146-.829-.198-.632.138-1.303.771-1.501l7.666-2.469-1.205-8.254-13.317 4.621a1.19 1.19 0 0 1-1.521-.75 1.19 1.19 0 0 1 .751-1.521l13.89-4.818c.553-.197 1.166-.138 1.64.158a1.82 1.82 0 0 1 .85 1.284l1.344 9.183c.138.987-.494 1.994-1.482 2.33l-7.864 2.528-.375.04zm7.31.138c-.178-.632-.85-1.007-1.482-.81l-5.177 1.58c-2.331.79-3.28.02-3.418-.099l-6.56-8.412a4.25 4.25 0 0 0-4.406-1.758l-3.122.987c-.237.889-.415 1.777-.514 2.686l4.228-1.363a1.84 1.84 0 0 1 1.857.81l6.659 8.551c.751.948 2.015 1.323 3.359 1.323.909 0 1.857-.178 2.687-.474l5.078-1.54c.632-.178 1.008-.829.81-1.481z&quot;/&gt;&lt;use href=&quot;#czlogo&quot;/&gt;&lt;use href=&quot;#czlogo&quot; x=&quot;8.516&quot; y=&quot;-2.172&quot;/&gt;&lt;/g&gt;&lt;defs&gt;&lt;path id=&quot;czlogo&quot; d=&quot;M18.689 28.654a1.94 1.94 0 0 1-1.936 1.935 1.94 1.94 0 0 1-1.936-1.935 1.94 1.94 0 0 1 1.936-1.935 1.94 1.94 0 0 1 1.936 1.935z&quot;/&gt;&lt;/defs&gt;&lt;/svg&gt;
            &lt;/span&gt;
            Finder
          &lt;/a&gt;

          &lt;!-- Menu toggler --&gt;
          &lt;button type=&quot;button&quot; class=&quot;navbar-toggler&quot; data-bs-toggle=&quot;offcanvas&quot; data-bs-target=&quot;#navbarOffcanvas&quot; aria-controls=&quot;navbarOffcanvas&quot; aria-expanded=&quot;false&quot; aria-label=&quot;Toggle navigation&quot;&gt;
            &lt;span class=&quot;navbar-toggler-icon&quot;&gt;&lt;/span&gt;
          &lt;/button&gt;

          &lt;!-- Offcanvas menu --&gt;
          &lt;div class=&quot;offcanvas offcanvas-end&quot; id=&quot;navbarOffcanvas&quot; tabindex=&quot;-1&quot; aria-labelledby=&quot;navbarOffcanvasLabel&quot;&gt;
            &lt;div class=&quot;offcanvas-header&quot;&gt;
              &lt;h5 class=&quot;offcanvas-title&quot; id=&quot;navbarOffcanvasLabel&quot;&gt;Menu&lt;/h5&gt;
              &lt;button type=&quot;button&quot; class=&quot;btn-close&quot; data-bs-dismiss=&quot;offcanvas&quot; aria-label=&quot;Close&quot;&gt;&lt;/button&gt;
            &lt;/div&gt;
            &lt;div class=&quot;offcanvas-body pt-0&quot;&gt;
              &lt;ul class=&quot;navbar-nav ms-lg-4&quot;&gt;
                &lt;li class=&quot;nav-item&quot;&gt;
                  &lt;a class=&quot;nav-link active&quot; aria-current=&quot;page&quot; href=&quot;#&quot;&gt;Home&lt;/a&gt;
                &lt;/li&gt;
                &lt;li class=&quot;nav-item&quot;&gt;
                  &lt;a class=&quot;nav-link&quot; href=&quot;#&quot;&gt;Services&lt;/a&gt;
                &lt;/li&gt;
                &lt;li class=&quot;nav-item dropdown&quot;&gt;
                  &lt;a class=&quot;nav-link dropdown-toggle&quot; href=&quot;#&quot; role=&quot;button&quot; data-bs-toggle=&quot;dropdown&quot; data-bs-auto-close=&quot;outside&quot; aria-expanded=&quot;false&quot;&gt;
                    Dropdown
                  &lt;/a&gt;
                  &lt;ul class=&quot;dropdown-menu&quot;&gt;
                    &lt;li&gt;&lt;a class=&quot;dropdown-item&quot; href=&quot;#&quot;&gt;Action link&lt;/a&gt;&lt;/li&gt;
                    &lt;li class=&quot;dropend&quot;&gt;
                      &lt;a class=&quot;dropdown-item dropdown-toggle&quot; href=&quot;#&quot; role=&quot;button&quot; data-bs-toggle=&quot;dropdown&quot; aria-expanded=&quot;false&quot;&gt;
                        Dropdown
                      &lt;/a&gt;
                      &lt;ul class=&quot;dropdown-menu&quot;&gt;
                        &lt;li&gt;&lt;a class=&quot;dropdown-item&quot; href=&quot;#&quot;&gt;Action link&lt;/a&gt;&lt;/li&gt;
                        &lt;li&gt;&lt;a class=&quot;dropdown-item&quot; href=&quot;#&quot;&gt;Another action&lt;/a&gt;&lt;/li&gt;
                        &lt;li&gt;&lt;a class=&quot;dropdown-item&quot; href=&quot;#&quot;&gt;Something else here&lt;/a&gt;&lt;/li&gt;
                        &lt;li&gt;&lt;a class=&quot;dropdown-item&quot; href=&quot;#&quot;&gt;Yet another link&lt;/a&gt;&lt;/li&gt;
                      &lt;/ul&gt;
                    &lt;/li&gt;
                    &lt;li&gt;&lt;a class=&quot;dropdown-item&quot; href=&quot;#&quot;&gt;Another action&lt;/a&gt;&lt;/li&gt;
                    &lt;li class=&quot;dropdown-divider&quot;&gt;&lt;hr&gt;&lt;/li&gt;
                    &lt;li&gt;&lt;a class=&quot;dropdown-item&quot; href=&quot;#&quot;&gt;Something else here&lt;/a&gt;&lt;/li&gt;
                  &lt;/ul&gt;
                &lt;/li&gt;
                &lt;li class=&quot;nav-item&quot;&gt;
                  &lt;a class=&quot;nav-link&quot; href=&quot;#&quot;&gt;About&lt;/a&gt;
                &lt;/li&gt;
                &lt;li class=&quot;nav-item&quot;&gt;
                  &lt;a class=&quot;nav-link&quot; href=&quot;#&quot;&gt;Contact&lt;/a&gt;
                &lt;/li&gt;
              &lt;/ul&gt;
            &lt;/div&gt;
          &lt;/div&gt;
        &lt;/div&gt;
      &lt;/header&gt;</code></pre>
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