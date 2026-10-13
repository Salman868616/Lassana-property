@extends('layouts.app')

@section('title', 'Finder Docs | Navbar')

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
                  <div class="dropdown">
                    <span class="list-group-item list-group-item-action justify-content-between dropdown-toggle pe-3 pe-none active">
                      Navbar
                      <span class="visually-hidden">header navigation menu submenu links brand logo</span>
                    </span>
                    <ul id="anchorNav" class="nav nav-underline flex-column border-start ms-2 my-2" style="gap: .25rem;">
                      <li class="nav-item"><a class="nav-link fw-normal" href="#navbar-content">Supported content</a></li>
                      <li class="nav-item"><a class="nav-link fw-normal" href="#navbar-colors">Color schemes</a></li>
                      <li class="nav-item"><a class="nav-link fw-normal" href="#navbar-offcanvas">Responsive offcanvas menu</a></li>
                    </ul>
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
          <a class="badge d-inline-flex align-items-center text-info bg-info-subtle fw-semibold text-decoration-none py-2 px-3 mb-2 rounded-pill" href="https://getbootstrap.com/docs/5.3/components/navbar/" target="_blank" rel="noreferrer">
            Bootstrap docs
            <i class="fi-external-link fs-sm ms-1"></i>
          </a>
          <h1 class="pt-1">Navbar</h1>
          <p class="text-body-secondary mb-4">Responsive navigation header that includes support for branding, navigation, and more.</p>
        </section>


        <!-- Supported content -->
        <section id="navbar-content" class="docs-section pb-sm-2 pb-lg-3 mb-5">
          <h4 class="mb-4">Supported content</h4>
          <ul class="nav nav-tabs" role="tablist" style="max-width: 240px">
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
            <div id="preview-1" class="tab-pane pt-4 pb-2 fade show active" role="tabpanel">
              <div class="bg-dotted rounded p-4">
                <header class="navbar navbar-expand-lg bg-body rounded shadow p-3 mb-4">
                  <a class="navbar-brand" href="#!">
                    <span class="d-flex flex-shrink-0 text-primary me-2">
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
                  </a>
                  <button type="button" class="navbar-toggler collapsed ms-3" data-bs-toggle="collapse" data-bs-target="#navbarCollapse1" aria-controls="navbarCollapse1" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <nav class="collapse navbar-collapse" id="navbarCollapse1">
                    <ul class="navbar-nav pt-2 pt-lg-0 me-auto">
                      <li class="nav-item">
                        <a class="nav-link active" href="#!">Home</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#!">Link</a>
                      </li>
                      <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" data-bs-trigger="hover" data-bs-auto-close="outside" aria-expanded="false">Dropdown</a>
                        <ul class="dropdown-menu">
                          <li><a class="dropdown-item" href="#!">Action link</a></li>
                          <li class="dropend">
                            <a class="dropdown-item dropdown-toggle" href="#" data-bs-toggle="dropdown" data-bs-trigger="hover" aria-expanded="false">Dropdown</a>
                            <ul class="dropdown-menu">
                              <li><a class="dropdown-item" href="#!">Action link</a></li>
                              <li><a class="dropdown-item" href="#!">Another action</a></li>
                              <li><a class="dropdown-item" href="#!">Something else here</a></li>
                              <li><a class="dropdown-item" href="#!">Yet another link</a></li>
                            </ul>
                          </li>
                          <li><a class="dropdown-item" href="#!">Another action</a></li>
                          <li class="dropdown-divider"></li>
                          <li><a class="dropdown-item" href="#!">Something else here</a></li>
                        </ul>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link disabled" tabindex="-1" aria-disabled="true">Disabled</a>
                      </li>
                    </ul>
                    <a class="btn btn-primary animate-shake mt-3 mt-lg-0" href="#!">
                      <i class="fi-user animate-target ms-n1 me-2"></i>
                      Sign up
                    </a>
                  </nav>
                </header>

                <header class="navbar navbar-expand-lg bg-body rounded shadow px-3 mb-4">
                  <a class="navbar-brand" href="#!">
                    <span class="d-flex flex-shrink-0 text-primary me-2">
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
                    <span class="d-none d-sm-inline">Finder</span>
                    <span class="d-sm-none">Fn</span>
                  </a>
                  <div class="d-flex align-items-center order-lg-2 py-lg-1">
                    <button type="button" class="btn btn-icon btn-lg fs-xl btn-outline-secondary border-0 rounded-circle animate-scale" aria-label="Toggle search bar">
                      <i class="fi-search animate-target"></i>
                    </button>
                    <a class="btn btn-icon btn-lg fs-lg btn-outline-secondary border-0 rounded-circle animate-shake d-none d-sm-inline-flex" href="#!" aria-label="Account">
                      <i class="fi-user animate-target"></i>
                    </a>
                    <button type="button" class="btn btn-icon btn-lg btn-secondary position-relative rounded-circle ms-2" aria-label="Shopping cart">
                      <span class="position-absolute top-0 start-100 mt-n1 ms-n3 badge text-bg-success border border-3 rounded-pill" style="--fn-badge-padding-y: .25em; --fn-badge-padding-x: .42em; --fn-border-color: var(--fn-body-bg)">3</span>
                      <span class="position-absolute top-0 start-0 d-flex align-items-center justify-content-center w-100 h-100 rounded-circle animate-slide-end fs-lg">
                        <i class="fi-shopping-cart animate-target ms-n1"></i>
                      </span>
                    </button>
                    <button type="button" class="navbar-toggler collapsed ms-3" data-bs-toggle="collapse" data-bs-target="#navbarCollapse2" aria-controls="navbarCollapse2" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                    </button>
                  </div>
                  <nav class="collapse navbar-collapse" id="navbarCollapse2">
                    <ul class="navbar-nav pt-2 pt-lg-0 me-auto">
                      <li class="nav-item">
                        <a class="nav-link active" href="#!">Home</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#!">Services</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#!">About</a>
                      </li>
                    </ul>
                    <a class="btn btn-secondary d-sm-none mt-3 mb-2 mt-lg-0" href="#!">
                      <i class="fi-user ms-n1 me-2"></i>
                      Sign up
                    </a>
                  </nav>
                </header>

                <header class="navbar navbar-expand-lg d-block bg-body rounded shadow px-3">
                  <div class="d-flex align-items-center justify-content-between">
                    <a class="navbar-brand flex-shrink-0" href="#!">
                      <span class="d-flex flex-shrink-0 text-primary me-2">
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
                      <span class="d-none d-sm-inline">Finder</span>
                      <span class="d-sm-none">Fn</span>
                    </a>
                    <div class="position-relative w-100 d-none d-md-block mx-3 mx-lg-4">
                      <i class="fi-search position-absolute top-50 start-0 translate-middle-y ms-3"></i>
                      <input type="search" class="form-control form-icon-start" placeholder="Search" aria-label="Search">
                    </div>
                    <div class="d-flex align-items-center py-lg-1">
                      <div class="dropdown">
                        <button type="button" class="btn btn-icon btn-lg btn-outline-secondary fs-lg border-0 rounded-circle animate-scale" data-bs-toggle="dropdown" aria-expanded="false" aria-label="Toggle theme (light)">
                          <span class="theme-icon-active d-flex animate-target">
                            <i class="fi-sun"></i>
                          </span>
                        </button>
                        <ul class="dropdown-menu" style="--fn-dropdown-min-width: 9rem">
                          <li>
                            <button type="button" class="dropdown-item active">
                              <span class="theme-icon d-flex fs-base me-2">
                                <i class="fi-sun"></i>
                              </span>
                              <span class="theme-label">Light</span>
                              <i class="item-active-indicator fi-check ms-auto"></i>
                            </button>
                          </li>
                          <li>
                            <button type="button" class="dropdown-item">
                              <span class="theme-icon d-flex fs-base me-2">
                                <i class="fi-moon"></i>
                              </span>
                              <span class="theme-label">Dark</span>
                              <i class="item-active-indicator fi-check ms-auto"></i>
                            </button>
                          </li>
                          <li>
                            <button type="button" class="dropdown-item">
                              <span class="theme-icon d-flex fs-base me-2">
                                <i class="fi-auto"></i>
                              </span>
                              <span class="theme-label">Auto</span>
                              <i class="item-active-indicator fi-check ms-auto"></i>
                            </button>
                          </li>
                        </ul>
                      </div>
                      <a class="btn btn-icon btn-lg fs-lg btn-outline-secondary border-0 rounded-circle animate-pulse" href="#!" aria-label="Wishlist">
                        <i class="fi-heart animate-target"></i>
                      </a>
                      <a class="btn btn-icon btn-lg fs-lg btn-outline-secondary border-0 rounded-circle animate-shake d-none d-sm-inline-flex" href="#!" aria-label="Account">
                        <i class="fi-user animate-target"></i>
                      </a>
                      <button type="button" class="navbar-toggler collapsed ms-1" data-bs-toggle="collapse" data-bs-target="#navbarCollapse3" aria-controls="navbarCollapse3" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                      </button>
                    </div>
                  </div>
                  <nav class="collapse navbar-collapse" id="navbarCollapse3">
                    <div class="position-relative d-md-none mt-3">
                      <i class="fi-search position-absolute top-50 start-0 translate-middle-y ms-3"></i>
                      <input type="search" class="form-control form-icon-start" placeholder="Search" aria-label="Search">
                    </div>
                    <div class="d-lg-flex pt-3 pb-2">
                      <ul class="navbar-nav">
                        <li class="nav-item">
                          <a class="nav-link active" href="#!">Home</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#!">Products</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#!">Services</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#!">About</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#!">Contacts</a>
                        </li>
                      </ul>
                      <a class="btn btn-secondary d-sm-none mt-3 mb-2 mt-lg-0" href="#!">
                        <i class="fi-user ms-n1 me-2"></i>
                        Sign up
                      </a>
                    </div>
                  </nav>
                </header>
              </div>
            </div>
            <div id="html-1" class="tab-pane pt-4 fade" role="tabpanel">
              <div class="position-relative" data-bs-theme="dark">
                <button type="button" class="btn btn-sm btn-outline-secondary bg-dark position-absolute top-0 end-0 mt-2 me-2 px-2 z-3" data-copy-code="#navbar-content-code">
                  <i class="fi-copy fs-sm me-1"></i>
                  Copy
                </button>
                <pre id="navbar-content-code" class="code-highlight"><code class="language-html">&lt;!-- Change to "container-fluid" for full width navbar --&gt;

        &lt;!-- Navbar with multi-level dropdown + CTA button --&gt;
        &lt;header class=&quot;navbar navbar-expand-lg bg-body shadow px-0&quot;&gt;
          &lt;div class=&quot;container py-1&quot;&gt;
            &lt;a class=&quot;navbar-brand&quot; href=&quot;#&quot;&gt;
              &lt;span class=&quot;d-flex flex-shrink-0 text-primary me-2&quot;&gt;
                &lt;svg xmlns=&quot;http://www.w3.org/2000/svg&quot; width=&quot;35&quot; height=&quot;34&quot;&gt;&lt;path d=&quot;M34.5 16.894v10.731c0 3.506-2.869 6.375-6.375 6.375H17.5h-.85C7.725 33.575.5 26.138.5 17c0-9.35 7.65-17 17-17s17 7.544 17 16.894z&quot; fill=&quot;currentColor&quot;/&gt;&lt;g fill-rule=&quot;evenodd&quot;&gt;&lt;path d=&quot;M17.5 13.258c-3.101 0-5.655 2.554-5.655 5.655s2.554 5.655 5.655 5.655 5.655-2.554 5.655-5.655-2.554-5.655-5.655-5.655zm-9.433 5.655c0-5.187 4.246-9.433 9.433-9.433s9.433 4.246 9.433 9.433a9.36 9.36 0 0 1-1.569 5.192l2.397 2.397a1.89 1.89 0 0 1 0 2.671 1.89 1.89 0 0 1-2.671 0l-2.397-2.397a9.36 9.36 0 0 1-5.192 1.569c-5.187 0-9.433-4.246-9.433-9.433z&quot; fill=&quot;#000&quot; fill-opacity=&quot;.05&quot;/&gt;&lt;g fill=&quot;#fff&quot;&gt;&lt;path d=&quot;M17.394 10.153c-3.723 0-6.741 3.018-6.741 6.741s3.018 6.741 6.741 6.741 6.741-3.018 6.741-6.741-3.018-6.741-6.741-6.741zM7.347 16.894A10.05 10.05 0 0 1 17.394 6.847 10.05 10.05 0 0 1 27.44 16.894 10.05 10.05 0 0 1 17.394 26.94 10.05 10.05 0 0 1 7.347 16.894z&quot;/&gt;&lt;path d=&quot;M23.025 22.525c.645-.645 1.692-.645 2.337 0l3.188 3.188c.645.645.645 1.692 0 2.337s-1.692.645-2.337 0l-3.187-3.187c-.645-.646-.645-1.692 0-2.337z&quot;/&gt;&lt;/g&gt;&lt;/g&gt;&lt;path d=&quot;M23.662 14.663c2.112 0 3.825-1.713 3.825-3.825s-1.713-3.825-3.825-3.825-3.825 1.713-3.825 3.825 1.713 3.825 3.825 3.825z&quot; fill=&quot;#fff&quot;/&gt;&lt;path fill-rule=&quot;evenodd&quot; d=&quot;M23.663 8.429a2.41 2.41 0 0 0-2.408 2.408 2.41 2.41 0 0 0 2.408 2.408 2.41 2.41 0 0 0 2.408-2.408 2.41 2.41 0 0 0-2.408-2.408zm-5.242 2.408c0-2.895 2.347-5.242 5.242-5.242s5.242 2.347 5.242 5.242-2.347 5.242-5.242 5.242-5.242-2.347-5.242-5.242z&quot; fill=&quot;currentColor&quot;/&gt;&lt;/svg&gt;
              &lt;/span&gt;
              Finder
            &lt;/a&gt;
            &lt;button type=&quot;button&quot; class=&quot;navbar-toggler collapsed ms-3&quot; data-bs-toggle=&quot;collapse&quot; data-bs-target=&quot;#navbarCollapse1&quot; aria-controls=&quot;navbarCollapse1&quot; aria-expanded=&quot;false&quot; aria-label=&quot;Toggle navigation&quot;&gt;
              &lt;span class=&quot;navbar-toggler-icon&quot;&gt;&lt;/span&gt;
            &lt;/button&gt;
            &lt;nav class=&quot;collapse navbar-collapse&quot; id=&quot;navbarCollapse1&quot;&gt;
              &lt;ul class=&quot;navbar-nav pt-2 pt-lg-0 me-auto&quot;&gt;
                &lt;li class=&quot;nav-item&quot;&gt;
                  &lt;a class=&quot;nav-link active&quot; href=&quot;#&quot;&gt;Home&lt;/a&gt;
                &lt;/li&gt;
                &lt;li class=&quot;nav-item&quot;&gt;
                  &lt;a class=&quot;nav-link&quot; href=&quot;#&quot;&gt;Link&lt;/a&gt;
                &lt;/li&gt;
                &lt;li class=&quot;nav-item dropdown&quot;&gt;
                  &lt;a class=&quot;nav-link dropdown-toggle&quot; href=&quot;#&quot; data-bs-toggle=&quot;dropdown&quot; data-bs-trigger=&quot;hover&quot; data-bs-auto-close=&quot;outside&quot; aria-expanded=&quot;false&quot;&gt;Dropdown&lt;/a&gt;
                  &lt;ul class=&quot;dropdown-menu&quot;&gt;
                    &lt;li&gt;&lt;a class=&quot;dropdown-item&quot; href=&quot;#&quot;&gt;Action link&lt;/a&gt;&lt;/li&gt;
                    &lt;li class=&quot;dropend&quot;&gt;
                      &lt;a class=&quot;dropdown-item dropdown-toggle&quot; href=&quot;#&quot; data-bs-toggle=&quot;dropdown&quot; data-bs-trigger=&quot;hover&quot; aria-expanded=&quot;false&quot;&gt;Dropdown&lt;/a&gt;
                      &lt;ul class=&quot;dropdown-menu&quot;&gt;
                        &lt;li&gt;&lt;a class=&quot;dropdown-item&quot; href=&quot;#&quot;&gt;Action link&lt;/a&gt;&lt;/li&gt;
                        &lt;li&gt;&lt;a class=&quot;dropdown-item&quot; href=&quot;#&quot;&gt;Another action&lt;/a&gt;&lt;/li&gt;
                        &lt;li&gt;&lt;a class=&quot;dropdown-item&quot; href=&quot;#&quot;&gt;Something else here&lt;/a&gt;&lt;/li&gt;
                        &lt;li&gt;&lt;a class=&quot;dropdown-item&quot; href=&quot;#&quot;&gt;Yet another link&lt;/a&gt;&lt;/li&gt;
                      &lt;/ul&gt;
                    &lt;/li&gt;
                    &lt;li&gt;&lt;a class=&quot;dropdown-item&quot; href=&quot;#&quot;&gt;Another action&lt;/a&gt;&lt;/li&gt;
                    &lt;li class=&quot;dropdown-divider&quot;&gt;&lt;/li&gt;
                    &lt;li&gt;&lt;a class=&quot;dropdown-item&quot; href=&quot;#&quot;&gt;Something else here&lt;/a&gt;&lt;/li&gt;
                  &lt;/ul&gt;
                &lt;/li&gt;
                &lt;li class=&quot;nav-item&quot;&gt;
                  &lt;a class=&quot;nav-link disabled&quot; tabindex=&quot;-1&quot; aria-disabled=&quot;true&quot;&gt;Disabled&lt;/a&gt;
                &lt;/li&gt;
              &lt;/ul&gt;
              &lt;a class=&quot;btn btn-primary animate-shake mt-3 mt-lg-0&quot; href=&quot;#&quot;&gt;
                &lt;i class=&quot;fi-user animate-target ms-n1 me-2&quot;&gt;&lt;/i&gt;
                Sign up
              &lt;/a&gt;
            &lt;/nav&gt;
          &lt;/div&gt;
        &lt;/header&gt;


        &lt;!-- Navbar with simple navigation + Action buttons group --&gt;
        &lt;header class=&quot;navbar navbar-expand-lg bg-body shadow px-0&quot;&gt;
          &lt;div class=&quot;container&quot;&gt;
            &lt;a class=&quot;navbar-brand&quot; href=&quot;#&quot;&gt;
              &lt;span class=&quot;d-flex flex-shrink-0 text-primary me-2&quot;&gt;
                &lt;svg xmlns=&quot;http://www.w3.org/2000/svg&quot; width=&quot;35&quot; height=&quot;34&quot;&gt;&lt;path d=&quot;M34.5 16.894v10.731c0 3.506-2.869 6.375-6.375 6.375H17.5h-.85C7.725 33.575.5 26.138.5 17c0-9.35 7.65-17 17-17s17 7.544 17 16.894z&quot; fill=&quot;currentColor&quot;/&gt;&lt;g fill-rule=&quot;evenodd&quot;&gt;&lt;path d=&quot;M17.5 13.258c-3.101 0-5.655 2.554-5.655 5.655s2.554 5.655 5.655 5.655 5.655-2.554 5.655-5.655-2.554-5.655-5.655-5.655zm-9.433 5.655c0-5.187 4.246-9.433 9.433-9.433s9.433 4.246 9.433 9.433a9.36 9.36 0 0 1-1.569 5.192l2.397 2.397a1.89 1.89 0 0 1 0 2.671 1.89 1.89 0 0 1-2.671 0l-2.397-2.397a9.36 9.36 0 0 1-5.192 1.569c-5.187 0-9.433-4.246-9.433-9.433z&quot; fill=&quot;#000&quot; fill-opacity=&quot;.05&quot;/&gt;&lt;g fill=&quot;#fff&quot;&gt;&lt;path d=&quot;M17.394 10.153c-3.723 0-6.741 3.018-6.741 6.741s3.018 6.741 6.741 6.741 6.741-3.018 6.741-6.741-3.018-6.741-6.741-6.741zM7.347 16.894A10.05 10.05 0 0 1 17.394 6.847 10.05 10.05 0 0 1 27.44 16.894 10.05 10.05 0 0 1 17.394 26.94 10.05 10.05 0 0 1 7.347 16.894z&quot;/&gt;&lt;path d=&quot;M23.025 22.525c.645-.645 1.692-.645 2.337 0l3.188 3.188c.645.645.645 1.692 0 2.337s-1.692.645-2.337 0l-3.187-3.187c-.645-.646-.645-1.692 0-2.337z&quot;/&gt;&lt;/g&gt;&lt;/g&gt;&lt;path d=&quot;M23.662 14.663c2.112 0 3.825-1.713 3.825-3.825s-1.713-3.825-3.825-3.825-3.825 1.713-3.825 3.825 1.713 3.825 3.825 3.825z&quot; fill=&quot;#fff&quot;/&gt;&lt;path fill-rule=&quot;evenodd&quot; d=&quot;M23.663 8.429a2.41 2.41 0 0 0-2.408 2.408 2.41 2.41 0 0 0 2.408 2.408 2.41 2.41 0 0 0 2.408-2.408 2.41 2.41 0 0 0-2.408-2.408zm-5.242 2.408c0-2.895 2.347-5.242 5.242-5.242s5.242 2.347 5.242 5.242-2.347 5.242-5.242 5.242-5.242-2.347-5.242-5.242z&quot; fill=&quot;currentColor&quot;/&gt;&lt;/svg&gt;
              &lt;/span&gt;
              &lt;span class=&quot;d-none d-sm-inline&quot;&gt;Finder&lt;/span&gt;
              &lt;span class=&quot;d-sm-none&quot;&gt;Fn&lt;/span&gt;
            &lt;/a&gt;
            &lt;div class=&quot;d-flex align-items-center order-lg-2 py-lg-1&quot;&gt;
              &lt;button type=&quot;button&quot; class=&quot;btn btn-icon btn-lg fs-xl btn-outline-secondary border-0 rounded-circle animate-scale&quot; aria-label=&quot;Toggle search bar&quot;&gt;
                &lt;i class=&quot;fi-search animate-target&quot;&gt;&lt;/i&gt;
              &lt;/button&gt;
              &lt;a class=&quot;btn btn-icon btn-lg fs-lg btn-outline-secondary border-0 rounded-circle animate-shake d-none d-sm-inline-flex&quot; href=&quot;#&quot; aria-label=&quot;Account&quot;&gt;
                &lt;i class=&quot;fi-user animate-target&quot;&gt;&lt;/i&gt;
              &lt;/a&gt;
              &lt;button type=&quot;button&quot; class=&quot;btn btn-icon btn-lg btn-secondary position-relative rounded-circle ms-2&quot; aria-label=&quot;Shopping cart&quot;&gt;
                &lt;span class=&quot;position-absolute top-0 start-100 mt-n1 ms-n3 badge text-bg-success border border-3 rounded-pill&quot; style=&quot;--fn-badge-padding-y: .25em; --fn-badge-padding-x: .42em; --fn-border-color: var(--fn-body-bg)&quot;&gt;3&lt;/span&gt;
                &lt;span class=&quot;position-absolute top-0 start-0 d-flex align-items-center justify-content-center w-100 h-100 rounded-circle animate-slide-end fs-lg&quot;&gt;
                  &lt;i class=&quot;fi-shopping-cart animate-target ms-n1&quot;&gt;&lt;/i&gt;
                &lt;/span&gt;
              &lt;/button&gt;
              &lt;button type=&quot;button&quot; class=&quot;navbar-toggler collapsed ms-3&quot; data-bs-toggle=&quot;collapse&quot; data-bs-target=&quot;#navbarCollapse2&quot; aria-controls=&quot;navbarCollapse2&quot; aria-expanded=&quot;false&quot; aria-label=&quot;Toggle navigation&quot;&gt;
                &lt;span class=&quot;navbar-toggler-icon&quot;&gt;&lt;/span&gt;
              &lt;/button&gt;
            &lt;/div&gt;
            &lt;nav class=&quot;collapse navbar-collapse&quot; id=&quot;navbarCollapse2&quot;&gt;
              &lt;ul class=&quot;navbar-nav pt-2 pt-lg-0 me-auto&quot;&gt;
                &lt;li class=&quot;nav-item&quot;&gt;
                  &lt;a class=&quot;nav-link active&quot; href=&quot;#&quot;&gt;Home&lt;/a&gt;
                &lt;/li&gt;
                &lt;li class=&quot;nav-item&quot;&gt;
                  &lt;a class=&quot;nav-link&quot; href=&quot;#&quot;&gt;Services&lt;/a&gt;
                &lt;/li&gt;
                &lt;li class=&quot;nav-item&quot;&gt;
                  &lt;a class=&quot;nav-link&quot; href=&quot;#&quot;&gt;About&lt;/a&gt;
                &lt;/li&gt;
              &lt;/ul&gt;
              &lt;a class=&quot;btn btn-secondary d-sm-none mt-3 mb-2 mt-lg-0&quot; href=&quot;#!&quot;&gt;
                &lt;i class=&quot;fi-user ms-n1 me-2&quot;&gt;&lt;/i&gt;
                Sign up
              &lt;/a&gt;
            &lt;/nav&gt;
          &lt;/div&gt;
        &lt;/header&gt;


        &lt;!-- Multi-level navbar with search bar, action buttons group and navigation links --&gt;
        &lt;header class=&quot;navbar navbar-expand-lg d-block bg-body shadow px-0&quot;&gt;

          &lt;!-- First level: Brand (logo) + search bar + action buttons group --&gt;
          &lt;div class=&quot;container d-flex flex-nowrap align-items-center justify-content-between&quot;&gt;
            &lt;a class=&quot;navbar-brand flex-shrink-0&quot; href=&quot;#&quot;&gt;
              &lt;span class=&quot;d-flex flex-shrink-0 text-primary me-2&quot;&gt;
                &lt;svg xmlns=&quot;http://www.w3.org/2000/svg&quot; width=&quot;35&quot; height=&quot;34&quot;&gt;&lt;path d=&quot;M34.5 16.894v10.731c0 3.506-2.869 6.375-6.375 6.375H17.5h-.85C7.725 33.575.5 26.138.5 17c0-9.35 7.65-17 17-17s17 7.544 17 16.894z&quot; fill=&quot;currentColor&quot;/&gt;&lt;g fill-rule=&quot;evenodd&quot;&gt;&lt;path d=&quot;M17.5 13.258c-3.101 0-5.655 2.554-5.655 5.655s2.554 5.655 5.655 5.655 5.655-2.554 5.655-5.655-2.554-5.655-5.655-5.655zm-9.433 5.655c0-5.187 4.246-9.433 9.433-9.433s9.433 4.246 9.433 9.433a9.36 9.36 0 0 1-1.569 5.192l2.397 2.397a1.89 1.89 0 0 1 0 2.671 1.89 1.89 0 0 1-2.671 0l-2.397-2.397a9.36 9.36 0 0 1-5.192 1.569c-5.187 0-9.433-4.246-9.433-9.433z&quot; fill=&quot;#000&quot; fill-opacity=&quot;.05&quot;/&gt;&lt;g fill=&quot;#fff&quot;&gt;&lt;path d=&quot;M17.394 10.153c-3.723 0-6.741 3.018-6.741 6.741s3.018 6.741 6.741 6.741 6.741-3.018 6.741-6.741-3.018-6.741-6.741-6.741zM7.347 16.894A10.05 10.05 0 0 1 17.394 6.847 10.05 10.05 0 0 1 27.44 16.894 10.05 10.05 0 0 1 17.394 26.94 10.05 10.05 0 0 1 7.347 16.894z&quot;/&gt;&lt;path d=&quot;M23.025 22.525c.645-.645 1.692-.645 2.337 0l3.188 3.188c.645.645.645 1.692 0 2.337s-1.692.645-2.337 0l-3.187-3.187c-.645-.646-.645-1.692 0-2.337z&quot;/&gt;&lt;/g&gt;&lt;/g&gt;&lt;path d=&quot;M23.662 14.663c2.112 0 3.825-1.713 3.825-3.825s-1.713-3.825-3.825-3.825-3.825 1.713-3.825 3.825 1.713 3.825 3.825 3.825z&quot; fill=&quot;#fff&quot;/&gt;&lt;path fill-rule=&quot;evenodd&quot; d=&quot;M23.663 8.429a2.41 2.41 0 0 0-2.408 2.408 2.41 2.41 0 0 0 2.408 2.408 2.41 2.41 0 0 0 2.408-2.408 2.41 2.41 0 0 0-2.408-2.408zm-5.242 2.408c0-2.895 2.347-5.242 5.242-5.242s5.242 2.347 5.242 5.242-2.347 5.242-5.242 5.242-5.242-2.347-5.242-5.242z&quot; fill=&quot;currentColor&quot;/&gt;&lt;/svg&gt;
              &lt;/span&gt;
              &lt;span class=&quot;d-none d-sm-inline&quot;&gt;Finder&lt;/span&gt;
              &lt;span class=&quot;d-sm-none&quot;&gt;Fn&lt;/span&gt;
            &lt;/a&gt;
            &lt;div class=&quot;position-relative w-100 d-none d-md-block mx-3 mx-lg-4&quot;&gt;
              &lt;i class=&quot;fi-search position-absolute top-50 start-0 translate-middle-y ms-3&quot;&gt;&lt;/i&gt;
              &lt;input type=&quot;search&quot; class=&quot;form-control form-icon-start&quot; placeholder=&quot;Search&quot; aria-label=&quot;Search&quot;&gt;
            &lt;/div&gt;
            &lt;div class=&quot;d-flex align-items-center py-lg-1&quot;&gt;
              &lt;div class=&quot;dropdown&quot;&gt;
                &lt;button type=&quot;button&quot; class=&quot;theme-switcher btn btn-icon btn-lg btn-outline-secondary fs-lg border-0 rounded-circle animate-scale&quot; data-bs-toggle=&quot;dropdown&quot; aria-expanded=&quot;false&quot; aria-label=&quot;Toggle theme (light)&quot;&gt;
                  &lt;span class=&quot;theme-icon-active d-flex animate-target&quot;&gt;
                    &lt;i class=&quot;fi-sun&quot;&gt;&lt;/i&gt;
                  &lt;/span&gt;
                &lt;/button&gt;
                &lt;ul class=&quot;dropdown-menu&quot; style=&quot;--fn-dropdown-min-width: 9rem&quot;&gt;
                  &lt;li&gt;
                    &lt;button type=&quot;button&quot; class=&quot;dropdown-item active&quot; data-bs-theme-value=&quot;light&quot; aria-pressed=&quot;true&quot;&gt;
                      &lt;span class=&quot;theme-icon d-flex fs-base me-2&quot;&gt;
                        &lt;i class=&quot;fi-sun&quot;&gt;&lt;/i&gt;
                      &lt;/span&gt;
                      &lt;span class=&quot;theme-label&quot;&gt;Light&lt;/span&gt;
                      &lt;i class=&quot;item-active-indicator fi-check ms-auto&quot;&gt;&lt;/i&gt;
                    &lt;/button&gt;
                  &lt;/li&gt;
                  &lt;li&gt;
                    &lt;button type=&quot;button&quot; class=&quot;dropdown-item&quot; data-bs-theme-value=&quot;dark&quot; aria-pressed=&quot;false&quot;&gt;
                      &lt;span class=&quot;theme-icon d-flex fs-base me-2&quot;&gt;
                        &lt;i class=&quot;fi-moon&quot;&gt;&lt;/i&gt;
                      &lt;/span&gt;
                      &lt;span class=&quot;theme-label&quot;&gt;Dark&lt;/span&gt;
                      &lt;i class=&quot;item-active-indicator fi-check ms-auto&quot;&gt;&lt;/i&gt;
                    &lt;/button&gt;
                  &lt;/li&gt;
                  &lt;li&gt;
                    &lt;button type=&quot;button&quot; class=&quot;dropdown-item&quot; data-bs-theme-value=&quot;auto&quot; aria-pressed=&quot;false&quot;&gt;
                      &lt;span class=&quot;theme-icon d-flex fs-base me-2&quot;&gt;
                        &lt;i class=&quot;fi-auto&quot;&gt;&lt;/i&gt;
                      &lt;/span&gt;
                      &lt;span class=&quot;theme-label&quot;&gt;Auto&lt;/span&gt;
                      &lt;i class=&quot;item-active-indicator fi-check ms-auto&quot;&gt;&lt;/i&gt;
                    &lt;/button&gt;
                  &lt;/li&gt;
                &lt;/ul&gt;
              &lt;/div&gt;
              &lt;a class=&quot;btn btn-icon btn-lg fs-lg btn-outline-secondary border-0 rounded-circle animate-pulse&quot; href=&quot;#&quot; aria-label=&quot;Wishlist&quot;&gt;
                &lt;i class=&quot;fi-heart animate-target&quot;&gt;&lt;/i&gt;
              &lt;/a&gt;
              &lt;a class=&quot;btn btn-icon btn-lg fs-lg btn-outline-secondary border-0 rounded-circle animate-shake d-none d-sm-inline-flex&quot; href=&quot;#&quot; aria-label=&quot;Account&quot;&gt;
                &lt;i class=&quot;fi-user animate-target&quot;&gt;&lt;/i&gt;
              &lt;/a&gt;
              &lt;button type=&quot;button&quot; class=&quot;navbar-toggler collapsed ms-1&quot; data-bs-toggle=&quot;collapse&quot; data-bs-target=&quot;#navbarCollapse3&quot; aria-controls=&quot;navbarCollapse3&quot; aria-expanded=&quot;false&quot; aria-label=&quot;Toggle navigation&quot;&gt;
                &lt;span class=&quot;navbar-toggler-icon&quot;&gt;&lt;/span&gt;
              &lt;/button&gt;
            &lt;/div&gt;
          &lt;/div&gt;

          &lt;!-- Second level: Collapsible navigation --&gt;
          &lt;div class=&quot;container&quot;&gt;
            &lt;nav class=&quot;collapse navbar-collapse&quot; id=&quot;navbarCollapse3&quot;&gt;
              &lt;div class=&quot;position-relative d-md-none mt-3&quot;&gt;
                &lt;i class=&quot;fi-search position-absolute top-50 start-0 translate-middle-y ms-3&quot;&gt;&lt;/i&gt;
                &lt;input type=&quot;search&quot; class=&quot;form-control form-icon-start&quot; placeholder=&quot;Search&quot; aria-label=&quot;Search&quot;&gt;
              &lt;/div&gt;
              &lt;div class=&quot;d-lg-flex pt-3 pb-2&quot;&gt;
                &lt;ul class=&quot;navbar-nav&quot;&gt;
                  &lt;li class=&quot;nav-item&quot;&gt;
                    &lt;a class=&quot;nav-link active&quot; href=&quot;#&quot;&gt;Home&lt;/a&gt;
                  &lt;/li&gt;
                  &lt;li class=&quot;nav-item&quot;&gt;
                    &lt;a class=&quot;nav-link&quot; href=&quot;#&quot;&gt;Services&lt;/a&gt;
                  &lt;/li&gt;
                  &lt;li class=&quot;nav-item&quot;&gt;
                    &lt;a class=&quot;nav-link&quot; href=&quot;#&quot;&gt;About&lt;/a&gt;
                  &lt;/li&gt;
                  &lt;li class=&quot;nav-item&quot;&gt;
                    &lt;a class=&quot;nav-link&quot; href=&quot;#&quot;&gt;Contacts&lt;/a&gt;
                  &lt;/li&gt;
                &lt;/ul&gt;
                &lt;a class=&quot;btn btn-secondary d-sm-none mt-3 mb-2 mt-lg-0&quot; href=&quot;#!&quot;&gt;
                  &lt;i class=&quot;fi-user ms-n1 me-2&quot;&gt;&lt;/i&gt;
                  Sign up
                &lt;/a&gt;
              &lt;/div&gt;
            &lt;/nav&gt;
          &lt;/div&gt;
        &lt;/header&gt;</code></pre>
              </div>
            </div>
          </div>
        </section>


        <!-- Color schemes -->
        <section id="navbar-colors" class="docs-section pb-sm-2 pb-lg-3 mb-5">
          <h4 class="mb-4">Color schemes</h4>
          <ul class="nav nav-tabs" role="tablist" style="max-width: 240px">
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
            <div id="preview-2" class="tab-pane pt-4 pb-2 fade show active" role="tabpanel">
              <header class="navbar navbar-expand-lg navbar-dark bg-dark rounded p-3 mb-4" data-bs-theme="dark">
                <a class="navbar-brand" href="#!">
                  <span class="d-flex flex-shrink-0 text-primary me-2">
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
                  <span class="d-none d-sm-inline">Finder</span>
                  <span class="d-sm-none">Fn</span>
                </a>
                <div class="d-flex align-items-center order-lg-2">
                  <button type="button" class="navbar-toggler collapsed me-3" data-bs-toggle="collapse" data-bs-target="#navbarDarkCollapse" aria-controls="navbarDarkCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <a class="btn btn-outline-light animate-shake" href="#!">
                    <i class="fi-user animate-target ms-n1 me-2"></i>
                    Sign up
                  </a>
                </div>
                <nav class="collapse navbar-collapse" id="navbarDarkCollapse">
                  <ul class="navbar-nav pt-2 pt-lg-0 me-auto">
                    <li class="nav-item">
                      <a class="nav-link active" href="#!">Home</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#!">Link</a>
                    </li>
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" data-bs-trigger="hover" aria-expanded="false">Dropdown</a>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#!">Action link</a></li>
                        <li><a class="dropdown-item" href="#!">Yet another link</a></li>
                        <li><a class="dropdown-item" href="#!">Another action</a></li>
                        <li class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#!">Something else here</a></li>
                      </ul>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link disabled" tabindex="-1" aria-disabled="true">Disabled</a>
                    </li>
                  </ul>
                </nav>
              </header>

              <header class="navbar navbar-expand-lg navbar-dark bg-info rounded p-3 mb-4">
                <a class="navbar-brand" href="#!">
                  <span class="d-flex flex-shrink-0 text-primary me-2">
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
                  <span class="d-none d-sm-inline">Finder</span>
                  <span class="d-sm-none">Fn</span>
                </a>
                <div class="d-flex align-items-center order-lg-2" data-bs-theme="dark">
                  <button type="button" class="navbar-toggler collapsed me-3" data-bs-toggle="collapse" data-bs-target="#navbarInfoCollapse" aria-controls="navbarInfoCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <a class="btn btn-outline-light animate-shake" href="#!">
                    <i class="fi-user animate-target ms-n1 me-2"></i>
                    Sign up
                  </a>
                </div>
                <nav class="collapse navbar-collapse" id="navbarInfoCollapse">
                  <ul class="navbar-nav pt-2 pt-lg-0 me-auto">
                    <li class="nav-item">
                      <a class="nav-link active" href="#!">Home</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#!">Link</a>
                    </li>
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" data-bs-trigger="hover" aria-expanded="false">Dropdown</a>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#!">Action link</a></li>
                        <li><a class="dropdown-item" href="#!">Yet another link</a></li>
                        <li><a class="dropdown-item" href="#!">Another action</a></li>
                        <li class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#!">Something else here</a></li>
                      </ul>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link disabled" tabindex="-1" aria-disabled="true">Disabled</a>
                    </li>
                  </ul>
                </nav>
              </header>

              <header class="navbar navbar-expand-lg bg-body-secondary rounded p-3 mb-4">
                <a class="navbar-brand" href="#!">
                  <span class="d-flex flex-shrink-0 text-primary me-2">
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
                  <span class="d-none d-sm-inline">Finder</span>
                  <span class="d-sm-none">Fn</span>
                </a>
                <div class="d-flex align-items-center order-lg-2">
                  <button type="button" class="navbar-toggler collapsed me-3" data-bs-toggle="collapse" data-bs-target="#navbarGrayCollapse" aria-controls="navbarGrayCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <a class="btn btn-outline-dark animate-shake" href="#!">
                    <i class="fi-user animate-target ms-n1 me-2"></i>
                    Sign up
                  </a>
                </div>
                <nav class="collapse navbar-collapse" id="navbarGrayCollapse">
                  <ul class="navbar-nav pt-2 pt-lg-0 me-auto">
                    <li class="nav-item">
                      <a class="nav-link active" href="#!">Home</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#!">Link</a>
                    </li>
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" data-bs-trigger="hover" aria-expanded="false">Dropdown</a>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#!">Action link</a></li>
                        <li><a class="dropdown-item" href="#!">Another action</a></li>
                        <li><a class="dropdown-item" href="#!">Yet another link</a></li>
                        <li class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#!">Something else here</a></li>
                      </ul>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link disabled" tabindex="-1" aria-disabled="true">Disabled</a>
                    </li>
                  </ul>
                </nav>
              </header>

              <header class="navbar navbar-expand-lg bg-primary-subtle rounded p-3">
                <a class="navbar-brand" href="#!">
                  <span class="d-flex flex-shrink-0 text-primary me-2">
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
                  <span class="d-none d-sm-inline">Finder</span>
                  <span class="d-sm-none">Fn</span>
                </a>
                <div class="d-flex align-items-center order-lg-2">
                  <button type="button" class="navbar-toggler collapsed me-3" data-bs-toggle="collapse" data-bs-target="#navbarPrimaryCollapse" aria-controls="navbarPrimaryCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <a class="btn btn-outline-primary animate-shake" href="#!">
                    <i class="fi-user animate-target ms-n1 me-2"></i>
                    Sign up
                  </a>
                </div>
                <nav class="collapse navbar-collapse" id="navbarPrimaryCollapse">
                  <ul class="navbar-nav pt-2 pt-lg-0 me-auto">
                    <li class="nav-item">
                      <a class="nav-link active" href="#!">Home</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#!">Link</a>
                    </li>
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" data-bs-trigger="hover" aria-expanded="false">Dropdown</a>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#!">Action link</a></li>
                        <li><a class="dropdown-item" href="#!">Yet another link</a></li>
                        <li><a class="dropdown-item" href="#!">Another action</a></li>
                        <li class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#!">Something else here</a></li>
                      </ul>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link disabled" tabindex="-1" aria-disabled="true">Disabled</a>
                    </li>
                  </ul>
                </nav>
              </header>
            </div>
            <div id="html-2" class="tab-pane pt-4 fade" role="tabpanel">
              <div class="position-relative" data-bs-theme="dark">
                <button type="button" class="btn btn-sm btn-outline-secondary bg-dark position-absolute top-0 end-0 mt-2 me-2 px-2 z-3" data-copy-code="#navbar-colors-code">
                  <i class="fi-copy fs-sm me-1"></i>
                  Copy
                </button>
                <pre id="navbar-colors-code" class="code-highlight"><code class="language-html">&lt;!-- Change to "container-fluid" for full width navbar --&gt;

        &lt;!-- Dark navbar --&gt;
        &lt;header class=&quot;navbar navbar-expand-lg navbar-dark bg-dark py-3 px-0&quot; data-bs-theme=&quot;dark&quot;&gt;
          &lt;div class=&quot;container&quot;&gt;
            &lt;a class=&quot;navbar-brand&quot; href=&quot;#&quot;&gt;
              &lt;span class=&quot;d-flex flex-shrink-0 text-primary me-2&quot;&gt;
                &lt;svg xmlns=&quot;http://www.w3.org/2000/svg&quot; width=&quot;35&quot; height=&quot;34&quot;&gt;&lt;path d=&quot;M34.5 16.894v10.731c0 3.506-2.869 6.375-6.375 6.375H17.5h-.85C7.725 33.575.5 26.138.5 17c0-9.35 7.65-17 17-17s17 7.544 17 16.894z&quot; fill=&quot;currentColor&quot;/&gt;&lt;g fill-rule=&quot;evenodd&quot;&gt;&lt;path d=&quot;M17.5 13.258c-3.101 0-5.655 2.554-5.655 5.655s2.554 5.655 5.655 5.655 5.655-2.554 5.655-5.655-2.554-5.655-5.655-5.655zm-9.433 5.655c0-5.187 4.246-9.433 9.433-9.433s9.433 4.246 9.433 9.433a9.36 9.36 0 0 1-1.569 5.192l2.397 2.397a1.89 1.89 0 0 1 0 2.671 1.89 1.89 0 0 1-2.671 0l-2.397-2.397a9.36 9.36 0 0 1-5.192 1.569c-5.187 0-9.433-4.246-9.433-9.433z&quot; fill=&quot;#000&quot; fill-opacity=&quot;.05&quot;/&gt;&lt;g fill=&quot;#fff&quot;&gt;&lt;path d=&quot;M17.394 10.153c-3.723 0-6.741 3.018-6.741 6.741s3.018 6.741 6.741 6.741 6.741-3.018 6.741-6.741-3.018-6.741-6.741-6.741zM7.347 16.894A10.05 10.05 0 0 1 17.394 6.847 10.05 10.05 0 0 1 27.44 16.894 10.05 10.05 0 0 1 17.394 26.94 10.05 10.05 0 0 1 7.347 16.894z&quot;/&gt;&lt;path d=&quot;M23.025 22.525c.645-.645 1.692-.645 2.337 0l3.188 3.188c.645.645.645 1.692 0 2.337s-1.692.645-2.337 0l-3.187-3.187c-.645-.646-.645-1.692 0-2.337z&quot;/&gt;&lt;/g&gt;&lt;/g&gt;&lt;path d=&quot;M23.662 14.663c2.112 0 3.825-1.713 3.825-3.825s-1.713-3.825-3.825-3.825-3.825 1.713-3.825 3.825 1.713 3.825 3.825 3.825z&quot; fill=&quot;#fff&quot;/&gt;&lt;path fill-rule=&quot;evenodd&quot; d=&quot;M23.663 8.429a2.41 2.41 0 0 0-2.408 2.408 2.41 2.41 0 0 0 2.408 2.408 2.41 2.41 0 0 0 2.408-2.408 2.41 2.41 0 0 0-2.408-2.408zm-5.242 2.408c0-2.895 2.347-5.242 5.242-5.242s5.242 2.347 5.242 5.242-2.347 5.242-5.242 5.242-5.242-2.347-5.242-5.242z&quot; fill=&quot;currentColor&quot;/&gt;&lt;/svg&gt;
              &lt;/span&gt;
              &lt;span class=&quot;d-none d-sm-inline&quot;&gt;Finder&lt;/span&gt;
              &lt;span class=&quot;d-sm-none&quot;&gt;Fn&lt;/span&gt;
            &lt;/a&gt;
            &lt;div class=&quot;d-flex align-items-center order-lg-2&quot;&gt;
              &lt;button type=&quot;button&quot; class=&quot;navbar-toggler collapsed me-3&quot; data-bs-toggle=&quot;collapse&quot; data-bs-target=&quot;#navbarDarkCollapse&quot; aria-controls=&quot;navbarDarkCollapse&quot; aria-expanded=&quot;false&quot; aria-label=&quot;Toggle navigation&quot;&gt;
                &lt;span class=&quot;navbar-toggler-icon&quot;&gt;&lt;/span&gt;
              &lt;/button&gt;
              &lt;a class=&quot;btn btn-outline-light animate-shake&quot; href=&quot;#!&quot;&gt;
                &lt;i class=&quot;fi-user animate-target ms-n1 me-2&quot;&gt;&lt;/i&gt;
                Sign up
              &lt;/a&gt;
            &lt;/div&gt;
            &lt;nav class=&quot;collapse navbar-collapse&quot; id=&quot;navbarDarkCollapse&quot;&gt;
              &lt;ul class=&quot;navbar-nav pt-2 pt-lg-0 me-auto&quot;&gt;
                &lt;li class=&quot;nav-item&quot;&gt;
                  &lt;a class=&quot;nav-link active&quot; href=&quot;#&quot;&gt;Home&lt;/a&gt;
                &lt;/li&gt;
                &lt;li class=&quot;nav-item&quot;&gt;
                  &lt;a class=&quot;nav-link&quot; href=&quot;#&quot;&gt;Link&lt;/a&gt;
                &lt;/li&gt;
                &lt;li class=&quot;nav-item dropdown&quot;&gt;
                  &lt;a class=&quot;nav-link dropdown-toggle&quot; href=&quot;#&quot; data-bs-toggle=&quot;dropdown&quot; data-bs-trigger=&quot;hover&quot; aria-expanded=&quot;false&quot;&gt;Dropdown&lt;/a&gt;
                  &lt;ul class=&quot;dropdown-menu&quot;&gt;
                    &lt;li&gt;&lt;a class=&quot;dropdown-item&quot; href=&quot;#&quot;&gt;Action link&lt;/a&gt;&lt;/li&gt;
                    &lt;li&gt;&lt;a class=&quot;dropdown-item&quot; href=&quot;#&quot;&gt;Yet another link&lt;/a&gt;&lt;/li&gt;
                    &lt;li&gt;&lt;a class=&quot;dropdown-item&quot; href=&quot;#&quot;&gt;Another action&lt;/a&gt;&lt;/li&gt;
                    &lt;li class=&quot;dropdown-divider&quot;&gt;&lt;/li&gt;
                    &lt;li&gt;&lt;a class=&quot;dropdown-item&quot; href=&quot;#&quot;&gt;Something else here&lt;/a&gt;&lt;/li&gt;
                  &lt;/ul&gt;
                &lt;/li&gt;
                &lt;li class=&quot;nav-item&quot;&gt;
                  &lt;a class=&quot;nav-link disabled&quot; tabindex=&quot;-1&quot; aria-disabled=&quot;true&quot;&gt;Disabled&lt;/a&gt;
                &lt;/li&gt;
              &lt;/ul&gt;
            &lt;/nav&gt;
          &lt;/div&gt;
        &lt;/header&gt;


        &lt;!-- Info navbar --&gt;
        &lt;header class=&quot;navbar navbar-expand-lg navbar-dark bg-info py-3 px-0&quot;&gt;
          &lt;div class=&quot;container&quot;&gt;
            &lt;a class=&quot;navbar-brand&quot; href=&quot;#&quot;&gt;
              &lt;span class=&quot;d-flex flex-shrink-0 text-primary me-2&quot;&gt;
                &lt;svg xmlns=&quot;http://www.w3.org/2000/svg&quot; width=&quot;35&quot; height=&quot;34&quot;&gt;&lt;path d=&quot;M34.5 16.894v10.731c0 3.506-2.869 6.375-6.375 6.375H17.5h-.85C7.725 33.575.5 26.138.5 17c0-9.35 7.65-17 17-17s17 7.544 17 16.894z&quot; fill=&quot;currentColor&quot;/&gt;&lt;g fill-rule=&quot;evenodd&quot;&gt;&lt;path d=&quot;M17.5 13.258c-3.101 0-5.655 2.554-5.655 5.655s2.554 5.655 5.655 5.655 5.655-2.554 5.655-5.655-2.554-5.655-5.655-5.655zm-9.433 5.655c0-5.187 4.246-9.433 9.433-9.433s9.433 4.246 9.433 9.433a9.36 9.36 0 0 1-1.569 5.192l2.397 2.397a1.89 1.89 0 0 1 0 2.671 1.89 1.89 0 0 1-2.671 0l-2.397-2.397a9.36 9.36 0 0 1-5.192 1.569c-5.187 0-9.433-4.246-9.433-9.433z&quot; fill=&quot;#000&quot; fill-opacity=&quot;.05&quot;/&gt;&lt;g fill=&quot;#fff&quot;&gt;&lt;path d=&quot;M17.394 10.153c-3.723 0-6.741 3.018-6.741 6.741s3.018 6.741 6.741 6.741 6.741-3.018 6.741-6.741-3.018-6.741-6.741-6.741zM7.347 16.894A10.05 10.05 0 0 1 17.394 6.847 10.05 10.05 0 0 1 27.44 16.894 10.05 10.05 0 0 1 17.394 26.94 10.05 10.05 0 0 1 7.347 16.894z&quot;/&gt;&lt;path d=&quot;M23.025 22.525c.645-.645 1.692-.645 2.337 0l3.188 3.188c.645.645.645 1.692 0 2.337s-1.692.645-2.337 0l-3.187-3.187c-.645-.646-.645-1.692 0-2.337z&quot;/&gt;&lt;/g&gt;&lt;/g&gt;&lt;path d=&quot;M23.662 14.663c2.112 0 3.825-1.713 3.825-3.825s-1.713-3.825-3.825-3.825-3.825 1.713-3.825 3.825 1.713 3.825 3.825 3.825z&quot; fill=&quot;#fff&quot;/&gt;&lt;path fill-rule=&quot;evenodd&quot; d=&quot;M23.663 8.429a2.41 2.41 0 0 0-2.408 2.408 2.41 2.41 0 0 0 2.408 2.408 2.41 2.41 0 0 0 2.408-2.408 2.41 2.41 0 0 0-2.408-2.408zm-5.242 2.408c0-2.895 2.347-5.242 5.242-5.242s5.242 2.347 5.242 5.242-2.347 5.242-5.242 5.242-5.242-2.347-5.242-5.242z&quot; fill=&quot;currentColor&quot;/&gt;&lt;/svg&gt;
              &lt;/span&gt;
              &lt;span class=&quot;d-none d-sm-inline&quot;&gt;Finder&lt;/span&gt;
              &lt;span class=&quot;d-sm-none&quot;&gt;Fn&lt;/span&gt;
            &lt;/a&gt;
            &lt;div class=&quot;d-flex align-items-center order-lg-2&quot; data-bs-theme=&quot;dark&quot;&gt;
              &lt;button type=&quot;button&quot; class=&quot;navbar-toggler collapsed me-3&quot; data-bs-toggle=&quot;collapse&quot; data-bs-target=&quot;#navbarInfoCollapse&quot; aria-controls=&quot;navbarInfoCollapse&quot; aria-expanded=&quot;false&quot; aria-label=&quot;Toggle navigation&quot;&gt;
                &lt;span class=&quot;navbar-toggler-icon&quot;&gt;&lt;/span&gt;
              &lt;/button&gt;
              &lt;a class=&quot;btn btn-outline-light animate-shake&quot; href=&quot;#!&quot;&gt;
                &lt;i class=&quot;fi-user animate-target ms-n1 me-2&quot;&gt;&lt;/i&gt;
                Sign up
              &lt;/a&gt;
            &lt;/div&gt;
            &lt;nav class=&quot;collapse navbar-collapse&quot; id=&quot;navbarInfoCollapse&quot;&gt;
              &lt;ul class=&quot;navbar-nav pt-2 pt-lg-0 me-auto&quot;&gt;
                &lt;li class=&quot;nav-item&quot;&gt;
                  &lt;a class=&quot;nav-link active&quot; href=&quot;#&quot;&gt;Home&lt;/a&gt;
                &lt;/li&gt;
                &lt;li class=&quot;nav-item&quot;&gt;
                  &lt;a class=&quot;nav-link&quot; href=&quot;#&quot;&gt;Link&lt;/a&gt;
                &lt;/li&gt;
                &lt;li class=&quot;nav-item dropdown&quot;&gt;
                  &lt;a class=&quot;nav-link dropdown-toggle&quot; href=&quot;#&quot; data-bs-toggle=&quot;dropdown&quot; data-bs-trigger=&quot;hover&quot; aria-expanded=&quot;false&quot;&gt;Dropdown&lt;/a&gt;
                  &lt;ul class=&quot;dropdown-menu&quot;&gt;
                    &lt;li&gt;&lt;a class=&quot;dropdown-item&quot; href=&quot;#&quot;&gt;Action link&lt;/a&gt;&lt;/li&gt;
                    &lt;li&gt;&lt;a class=&quot;dropdown-item&quot; href=&quot;#&quot;&gt;Yet another link&lt;/a&gt;&lt;/li&gt;
                    &lt;li&gt;&lt;a class=&quot;dropdown-item&quot; href=&quot;#&quot;&gt;Another action&lt;/a&gt;&lt;/li&gt;
                    &lt;li class=&quot;dropdown-divider&quot;&gt;&lt;/li&gt;
                    &lt;li&gt;&lt;a class=&quot;dropdown-item&quot; href=&quot;#&quot;&gt;Something else here&lt;/a&gt;&lt;/li&gt;
                  &lt;/ul&gt;
                &lt;/li&gt;
                &lt;li class=&quot;nav-item&quot;&gt;
                  &lt;a class=&quot;nav-link disabled&quot; tabindex=&quot;-1&quot; aria-disabled=&quot;true&quot;&gt;Disabled&lt;/a&gt;
                &lt;/li&gt;
              &lt;/ul&gt;
            &lt;/nav&gt;
          &lt;/div&gt;
        &lt;/header&gt;


        &lt;!-- Gray navbar --&gt;
        &lt;header class=&quot;navbar navbar-expand-lg bg-body-secondary py-3 px-0&quot;&gt;
          &lt;div class=&quot;container&quot;&gt;
            &lt;a class=&quot;navbar-brand&quot; href=&quot;#&quot;&gt;
              &lt;span class=&quot;d-flex flex-shrink-0 text-primary me-2&quot;&gt;
                &lt;svg xmlns=&quot;http://www.w3.org/2000/svg&quot; width=&quot;35&quot; height=&quot;34&quot;&gt;&lt;path d=&quot;M34.5 16.894v10.731c0 3.506-2.869 6.375-6.375 6.375H17.5h-.85C7.725 33.575.5 26.138.5 17c0-9.35 7.65-17 17-17s17 7.544 17 16.894z&quot; fill=&quot;currentColor&quot;/&gt;&lt;g fill-rule=&quot;evenodd&quot;&gt;&lt;path d=&quot;M17.5 13.258c-3.101 0-5.655 2.554-5.655 5.655s2.554 5.655 5.655 5.655 5.655-2.554 5.655-5.655-2.554-5.655-5.655-5.655zm-9.433 5.655c0-5.187 4.246-9.433 9.433-9.433s9.433 4.246 9.433 9.433a9.36 9.36 0 0 1-1.569 5.192l2.397 2.397a1.89 1.89 0 0 1 0 2.671 1.89 1.89 0 0 1-2.671 0l-2.397-2.397a9.36 9.36 0 0 1-5.192 1.569c-5.187 0-9.433-4.246-9.433-9.433z&quot; fill=&quot;#000&quot; fill-opacity=&quot;.05&quot;/&gt;&lt;g fill=&quot;#fff&quot;&gt;&lt;path d=&quot;M17.394 10.153c-3.723 0-6.741 3.018-6.741 6.741s3.018 6.741 6.741 6.741 6.741-3.018 6.741-6.741-3.018-6.741-6.741-6.741zM7.347 16.894A10.05 10.05 0 0 1 17.394 6.847 10.05 10.05 0 0 1 27.44 16.894 10.05 10.05 0 0 1 17.394 26.94 10.05 10.05 0 0 1 7.347 16.894z&quot;/&gt;&lt;path d=&quot;M23.025 22.525c.645-.645 1.692-.645 2.337 0l3.188 3.188c.645.645.645 1.692 0 2.337s-1.692.645-2.337 0l-3.187-3.187c-.645-.646-.645-1.692 0-2.337z&quot;/&gt;&lt;/g&gt;&lt;/g&gt;&lt;path d=&quot;M23.662 14.663c2.112 0 3.825-1.713 3.825-3.825s-1.713-3.825-3.825-3.825-3.825 1.713-3.825 3.825 1.713 3.825 3.825 3.825z&quot; fill=&quot;#fff&quot;/&gt;&lt;path fill-rule=&quot;evenodd&quot; d=&quot;M23.663 8.429a2.41 2.41 0 0 0-2.408 2.408 2.41 2.41 0 0 0 2.408 2.408 2.41 2.41 0 0 0 2.408-2.408 2.41 2.41 0 0 0-2.408-2.408zm-5.242 2.408c0-2.895 2.347-5.242 5.242-5.242s5.242 2.347 5.242 5.242-2.347 5.242-5.242 5.242-5.242-2.347-5.242-5.242z&quot; fill=&quot;currentColor&quot;/&gt;&lt;/svg&gt;
              &lt;/span&gt;
              &lt;span class=&quot;d-none d-sm-inline&quot;&gt;Finder&lt;/span&gt;
              &lt;span class=&quot;d-sm-none&quot;&gt;Fn&lt;/span&gt;
            &lt;/a&gt;
            &lt;div class=&quot;d-flex align-items-center order-lg-2&quot;&gt;
              &lt;button type=&quot;button&quot; class=&quot;navbar-toggler collapsed me-3&quot; data-bs-toggle=&quot;collapse&quot; data-bs-target=&quot;#navbarGrayCollapse&quot; aria-controls=&quot;navbarGrayCollapse&quot; aria-expanded=&quot;false&quot; aria-label=&quot;Toggle navigation&quot;&gt;
                &lt;span class=&quot;navbar-toggler-icon&quot;&gt;&lt;/span&gt;
              &lt;/button&gt;
              &lt;a class=&quot;btn btn-outline-dark animate-shake&quot; href=&quot;#!&quot;&gt;
                &lt;i class=&quot;fi-user animate-target ms-n1 me-2&quot;&gt;&lt;/i&gt;
                Sign up
              &lt;/a&gt;
            &lt;/div&gt;
            &lt;nav class=&quot;collapse navbar-collapse&quot; id=&quot;navbarGrayCollapse&quot;&gt;
              &lt;ul class=&quot;navbar-nav pt-2 pt-lg-0 me-auto&quot;&gt;
                &lt;li class=&quot;nav-item&quot;&gt;
                  &lt;a class=&quot;nav-link active&quot; href=&quot;#&quot;&gt;Home&lt;/a&gt;
                &lt;/li&gt;
                &lt;li class=&quot;nav-item&quot;&gt;
                  &lt;a class=&quot;nav-link&quot; href=&quot;#&quot;&gt;Link&lt;/a&gt;
                &lt;/li&gt;
                &lt;li class=&quot;nav-item dropdown&quot;&gt;
                  &lt;a class=&quot;nav-link dropdown-toggle&quot; href=&quot;#&quot; data-bs-toggle=&quot;dropdown&quot; data-bs-trigger=&quot;hover&quot; aria-expanded=&quot;false&quot;&gt;Dropdown&lt;/a&gt;
                  &lt;ul class=&quot;dropdown-menu&quot;&gt;
                    &lt;li&gt;&lt;a class=&quot;dropdown-item&quot; href=&quot;#&quot;&gt;Action link&lt;/a&gt;&lt;/li&gt;
                    &lt;li&gt;&lt;a class=&quot;dropdown-item&quot; href=&quot;#&quot;&gt;Another action&lt;/a&gt;&lt;/li&gt;
                    &lt;li&gt;&lt;a class=&quot;dropdown-item&quot; href=&quot;#&quot;&gt;Yet another link&lt;/a&gt;&lt;/li&gt;
                    &lt;li class=&quot;dropdown-divider&quot;&gt;&lt;/li&gt;
                    &lt;li&gt;&lt;a class=&quot;dropdown-item&quot; href=&quot;#&quot;&gt;Something else here&lt;/a&gt;&lt;/li&gt;
                  &lt;/ul&gt;
                &lt;/li&gt;
                &lt;li class=&quot;nav-item&quot;&gt;
                  &lt;a class=&quot;nav-link disabled&quot; tabindex=&quot;-1&quot; aria-disabled=&quot;true&quot;&gt;Disabled&lt;/a&gt;
                &lt;/li&gt;
              &lt;/ul&gt;
            &lt;/nav&gt;
          &lt;/div&gt;
        &lt;/header&gt;


        &lt;!-- Subtle primary navbar --&gt;
        &lt;header class=&quot;navbar navbar-expand-lg bg-primary-subtle py-3 px-0&quot;&gt;
          &lt;div class=&quot;container&quot;&gt;
            &lt;a class=&quot;navbar-brand&quot; href=&quot;#&quot;&gt;
              &lt;span class=&quot;d-flex flex-shrink-0 text-primary me-2&quot;&gt;
                &lt;svg xmlns=&quot;http://www.w3.org/2000/svg&quot; width=&quot;35&quot; height=&quot;34&quot;&gt;&lt;path d=&quot;M34.5 16.894v10.731c0 3.506-2.869 6.375-6.375 6.375H17.5h-.85C7.725 33.575.5 26.138.5 17c0-9.35 7.65-17 17-17s17 7.544 17 16.894z&quot; fill=&quot;currentColor&quot;/&gt;&lt;g fill-rule=&quot;evenodd&quot;&gt;&lt;path d=&quot;M17.5 13.258c-3.101 0-5.655 2.554-5.655 5.655s2.554 5.655 5.655 5.655 5.655-2.554 5.655-5.655-2.554-5.655-5.655-5.655zm-9.433 5.655c0-5.187 4.246-9.433 9.433-9.433s9.433 4.246 9.433 9.433a9.36 9.36 0 0 1-1.569 5.192l2.397 2.397a1.89 1.89 0 0 1 0 2.671 1.89 1.89 0 0 1-2.671 0l-2.397-2.397a9.36 9.36 0 0 1-5.192 1.569c-5.187 0-9.433-4.246-9.433-9.433z&quot; fill=&quot;#000&quot; fill-opacity=&quot;.05&quot;/&gt;&lt;g fill=&quot;#fff&quot;&gt;&lt;path d=&quot;M17.394 10.153c-3.723 0-6.741 3.018-6.741 6.741s3.018 6.741 6.741 6.741 6.741-3.018 6.741-6.741-3.018-6.741-6.741-6.741zM7.347 16.894A10.05 10.05 0 0 1 17.394 6.847 10.05 10.05 0 0 1 27.44 16.894 10.05 10.05 0 0 1 17.394 26.94 10.05 10.05 0 0 1 7.347 16.894z&quot;/&gt;&lt;path d=&quot;M23.025 22.525c.645-.645 1.692-.645 2.337 0l3.188 3.188c.645.645.645 1.692 0 2.337s-1.692.645-2.337 0l-3.187-3.187c-.645-.646-.645-1.692 0-2.337z&quot;/&gt;&lt;/g&gt;&lt;/g&gt;&lt;path d=&quot;M23.662 14.663c2.112 0 3.825-1.713 3.825-3.825s-1.713-3.825-3.825-3.825-3.825 1.713-3.825 3.825 1.713 3.825 3.825 3.825z&quot; fill=&quot;#fff&quot;/&gt;&lt;path fill-rule=&quot;evenodd&quot; d=&quot;M23.663 8.429a2.41 2.41 0 0 0-2.408 2.408 2.41 2.41 0 0 0 2.408 2.408 2.41 2.41 0 0 0 2.408-2.408 2.41 2.41 0 0 0-2.408-2.408zm-5.242 2.408c0-2.895 2.347-5.242 5.242-5.242s5.242 2.347 5.242 5.242-2.347 5.242-5.242 5.242-5.242-2.347-5.242-5.242z&quot; fill=&quot;currentColor&quot;/&gt;&lt;/svg&gt;
              &lt;/span&gt;
              &lt;span class=&quot;d-none d-sm-inline&quot;&gt;Finder&lt;/span&gt;
              &lt;span class=&quot;d-sm-none&quot;&gt;Fn&lt;/span&gt;
            &lt;/a&gt;
            &lt;div class=&quot;d-flex align-items-center order-lg-2&quot;&gt;
              &lt;button type=&quot;button&quot; class=&quot;navbar-toggler collapsed me-3&quot; data-bs-toggle=&quot;collapse&quot; data-bs-target=&quot;#navbarPrimaryCollapse&quot; aria-controls=&quot;navbarPrimaryCollapse&quot; aria-expanded=&quot;false&quot; aria-label=&quot;Toggle navigation&quot;&gt;
                &lt;span class=&quot;navbar-toggler-icon&quot;&gt;&lt;/span&gt;
              &lt;/button&gt;
              &lt;a class=&quot;btn btn-outline-primary animate-shake&quot; href=&quot;#!&quot;&gt;
                &lt;i class=&quot;fi-user animate-target ms-n1 me-2&quot;&gt;&lt;/i&gt;
                Sign up
              &lt;/a&gt;
            &lt;/div&gt;
            &lt;nav class=&quot;collapse navbar-collapse&quot; id=&quot;navbarPrimaryCollapse&quot;&gt;
              &lt;ul class=&quot;navbar-nav pt-2 pt-lg-0 me-auto&quot;&gt;
                &lt;li class=&quot;nav-item&quot;&gt;
                  &lt;a class=&quot;nav-link active&quot; href=&quot;#&quot;&gt;Home&lt;/a&gt;
                &lt;/li&gt;
                &lt;li class=&quot;nav-item&quot;&gt;
                  &lt;a class=&quot;nav-link&quot; href=&quot;#&quot;&gt;Link&lt;/a&gt;
                &lt;/li&gt;
                &lt;li class=&quot;nav-item dropdown&quot;&gt;
                  &lt;a class=&quot;nav-link dropdown-toggle&quot; href=&quot;#&quot; data-bs-toggle=&quot;dropdown&quot; data-bs-trigger=&quot;hover&quot; aria-expanded=&quot;false&quot;&gt;Dropdown&lt;/a&gt;
                  &lt;ul class=&quot;dropdown-menu&quot;&gt;
                    &lt;li&gt;&lt;a class=&quot;dropdown-item&quot; href=&quot;#&quot;&gt;Action link&lt;/a&gt;&lt;/li&gt;
                    &lt;li&gt;&lt;a class=&quot;dropdown-item&quot; href=&quot;#&quot;&gt;Yet another link&lt;/a&gt;&lt;/li&gt;
                    &lt;li&gt;&lt;a class=&quot;dropdown-item&quot; href=&quot;#&quot;&gt;Another action&lt;/a&gt;&lt;/li&gt;
                    &lt;li class=&quot;dropdown-divider&quot;&gt;&lt;/li&gt;
                    &lt;li&gt;&lt;a class=&quot;dropdown-item&quot; href=&quot;#&quot;&gt;Something else here&lt;/a&gt;&lt;/li&gt;
                  &lt;/ul&gt;
                &lt;/li&gt;
                &lt;li class=&quot;nav-item&quot;&gt;
                  &lt;a class=&quot;nav-link disabled&quot; tabindex=&quot;-1&quot; aria-disabled=&quot;true&quot;&gt;Disabled&lt;/a&gt;
                &lt;/li&gt;
              &lt;/ul&gt;
            &lt;/nav&gt;
          &lt;/div&gt;
        &lt;/header&gt;</code></pre>
              </div>
            </div>
          </div>
        </section>


        <!-- Responsive offcanvas menu -->
        <section id="navbar-offcanvas" class="docs-section">
          <h4 class="mb-4">Responsive offcanvas menu</h4>
          <ul class="nav nav-tabs" role="tablist" style="max-width: 240px">
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
            <div id="preview-3" class="tab-pane pt-4 pb-2 fade show active" role="tabpanel">
              <div class="bg-dotted rounded p-3 p-sm-4">
                <iframe class="w-100 shadow rounded" src="navbar-offcanvas" height="522" title="Navbar with offcanvas menu" style="max-width: 375px"></iframe>
              </div>
            </div>
            <div id="html-3" class="tab-pane pt-4 fade" role="tabpanel">
              <div class="position-relative" data-bs-theme="dark">
                <button type="button" class="btn btn-sm btn-outline-secondary bg-dark position-absolute top-0 end-0 mt-2 me-2 px-2 z-3" data-copy-code="#navbar-offcanvas-code">
                  <i class="fi-copy fs-sm me-1"></i>
                  Copy
                </button>
                <pre id="navbar-offcanvas-code" class="code-highlight"><code class="language-html">&lt;!-- Navbar with offcanvas menu on screens smaller than 500px (xs) --&gt;
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