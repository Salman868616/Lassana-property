@extends('layouts.app')

@section('title', 'Finder Docs | Input group')

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
                  <div class="dropdown">
                    <span class="list-group-item list-group-item-action justify-content-between dropdown-toggle pe-3 pe-none active">
                      Input group
                      <span class="visually-hidden">form control select textarea addon</span>
                    </span>
                    <ul id="anchorNav" class="nav nav-underline flex-column border-start ms-2 my-2" style="gap: .25rem;">
                      <li class="nav-item"><a class="nav-link fw-normal" href="#input-group-addon-position">Addon position</a></li>
                      <li class="nav-item"><a class="nav-link fw-normal" href="#input-group-icon">Icon inside input</a></li>
                      <li class="nav-item"><a class="nav-link fw-normal" href="#input-group-addon-multiple">Multiple addons</a></li>
                      <li class="nav-item"><a class="nav-link fw-normal" href="#input-group-types">Different addon / input types</a></li>
                      <li class="nav-item"><a class="nav-link fw-normal" href="#input-group-multiple-inputs">Multiple inputs</a></li>
                      <li class="nav-item"><a class="nav-link fw-normal" href="#input-group-addon-button">Button addons</a></li>
                      <li class="nav-item"><a class="nav-link fw-normal" href="#input-group-shapes">Shapes</a></li>
                      <li class="nav-item"><a class="nav-link fw-normal" href="#input-group-sizes">Sizes</a></li>
                    </ul>
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
          <a class="badge d-inline-flex align-items-center text-info bg-info-subtle fw-semibold text-decoration-none py-2 px-3 mb-2 rounded-pill" href="https://getbootstrap.com/docs/5.3/forms/input-group/" target="_blank" rel="noreferrer">
            Bootstrap docs
            <i class="fi-external-link fs-sm ms-1"></i>
          </a>
          <h1 class="pt-1">Input group</h1>
          <p class="text-body-secondary mb-4">Extend form controls by adding text, buttons, etc. on either side.</p>
        </section>


        <!-- Addon position -->
        <section id="input-group-addon-position" class="docs-section pb-sm-2 mb-5">
          <h4>Addon position</h4>
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
                  <div style="max-width: 400px">
                    <div class="input-group mb-3">
                      <span class="input-group-text" id="addon-left">
                        <i class="fi-user"></i>
                      </span>
                      <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="addon-left">
                    </div>
                    <div class="input-group mb-3">
                      <input type="email" class="form-control" placeholder="Recipient's e-mail" aria-label="Recipient's e-mail" aria-describedby="addon-right">
                      <span class="input-group-text" id="addon-right">@example.com</span>
                    </div>
                    <div class="input-group">
                      <span class="input-group-text">
                        <i class="fi-dollar-sign"></i>
                      </span>
                      <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
                      <span class="input-group-text">.00</span>
                    </div>
                  </div>
                </div>
                <div id="html-1" class="tab-pane pt-4 fade" role="tabpanel">
                  <div class="position-relative" data-bs-theme="dark">
                    <button type="button" class="btn btn-sm btn-outline-secondary bg-dark position-absolute top-0 end-0 mt-2 px-2 z-3" data-copy-code="#input-group-addon-position-code">
                      <i class="fi-copy fs-sm me-1"></i>
                      Copy
                    </button>
                    <pre id="input-group-addon-position-code" class="code-highlight mx-n2 mb-n2"><code class="language-html">&lt;!-- Addon on the left --&gt;
    &lt;div class=&quot;input-group mb-3&quot;&gt;
      &lt;span class=&quot;input-group-text&quot; id=&quot;addon-left&quot;&gt;
        &lt;i class=&quot;fi-user&quot;&gt;&lt;/i&gt;
      &lt;/span&gt;
      &lt;input type=&quot;text&quot; class=&quot;form-control&quot; placeholder=&quot;Username&quot; aria-label=&quot;Username&quot; aria-describedby=&quot;addon-left&quot;&gt;
    &lt;/div&gt;

    &lt;!-- Addon on the right --&gt;
    &lt;div class=&quot;input-group mb-3&quot;&gt;
      &lt;input type=&quot;email&quot; class=&quot;form-control&quot; placeholder=&quot;Recipient's e-mail&quot; aria-label=&quot;Recipient's e-mail&quot; aria-describedby=&quot;addon-right&quot;&gt;
      &lt;span class=&quot;input-group-text&quot; id=&quot;addon-right&quot;&gt;@example.com&lt;/span&gt;
    &lt;/div&gt;

    &lt;!-- Addons on both sides --&gt;
    &lt;div class=&quot;input-group mb-3&quot;&gt;
      &lt;span class=&quot;input-group-text&quot;&gt;
        &lt;i class=&quot;fi-dollar-sign&quot;&gt;&lt;/i&gt;
      &lt;/span&gt;
      &lt;input type=&quot;text&quot; class=&quot;form-control&quot; aria-label=&quot;Amount (to the nearest dollar)&quot;&gt;
      &lt;span class=&quot;input-group-text&quot;&gt;.00&lt;/span&gt;
    &lt;/div&gt;</code></pre>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>


        <!-- Icon inside input -->
        <section id="input-group-icon" class="docs-section pb-sm-2 mb-5">
          <h4>Icon inside input</h4>
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
                <div id="preview-2" class="tab-pane pt-3 pb-1 mt-3 fade show active" role="tabpanel">
                  <div style="max-width: 400px">
                    <div class="position-relative mb-3">
                      <i class="fi-lock position-absolute top-50 start-0 translate-middle-y ms-3"></i>
                      <input type="password" class="form-control form-icon-start" placeholder="Password" aria-label="Password">
                    </div>
                    <div class="position-relative mb-3">
                      <input type="search" class="form-control form-icon-end" placeholder="Search" aria-label="Search">
                      <i class="fi-search position-absolute top-50 end-0 translate-middle-y me-3"></i>
                    </div>
                    <div class="position-relative">
                      <i class="fi-globe position-absolute top-50 start-0 translate-middle-y ms-3"></i>
                      <input type="url" class="form-control form-icon-start form-icon-end" placeholder="URL" aria-label="URL">
                      <i class="fi-external-link position-absolute top-50 end-0 translate-middle-y me-3"></i>
                    </div>
                  </div>
                </div>
                <div id="html-2" class="tab-pane pt-4 fade" role="tabpanel">
                  <div class="position-relative" data-bs-theme="dark">
                    <button type="button" class="btn btn-sm btn-outline-secondary bg-dark position-absolute top-0 end-0 mt-2 px-2 z-3" data-copy-code="#input-group-icon-code">
                      <i class="fi-copy fs-sm me-1"></i>
                      Copy
                    </button>
                    <pre id="input-group-icon-code" class="code-highlight mx-n2 mb-n2"><code class="language-html">&lt;!-- Absolutely positioned icons on top of the input fields --&gt;

    &lt;!-- Icon on the left --&gt;
    &lt;div class=&quot;position-relative mb-3&quot;&gt;
      &lt;i class=&quot;fi-lock position-absolute top-50 start-0 translate-middle-y ms-3&quot;&gt;&lt;/i&gt;
      &lt;input type=&quot;password&quot; class=&quot;form-control form-icon-start&quot; placeholder=&quot;Password&quot; aria-label=&quot;Password&quot;&gt;
    &lt;/div&gt;

    &lt;!-- Icon on the right --&gt;
    &lt;div class=&quot;position-relative mb-3&quot;&gt;
      &lt;input type=&quot;search&quot; class=&quot;form-control form-icon-end&quot; placeholder=&quot;Search&quot; aria-label=&quot;Search&quot;&gt;
      &lt;i class=&quot;fi-search position-absolute top-50 end-0 translate-middle-y me-3&quot;&gt;&lt;/i&gt;
    &lt;/div&gt;

    &lt;!-- Icons on both sides --&gt;
    &lt;div class=&quot;position-relative mb-3&quot;&gt;
      &lt;i class=&quot;fi-globe position-absolute top-50 start-0 translate-middle-y ms-3&quot;&gt;&lt;/i&gt;
      &lt;input type=&quot;url&quot; class=&quot;form-control form-icon-start form-icon-end&quot; placeholder=&quot;URL&quot; aria-label=&quot;URL&quot;&gt;
      &lt;i class=&quot;fi-external-link position-absolute top-50 end-0 translate-middle-y me-3&quot;&gt;&lt;/i&gt;
    &lt;/div&gt;</code></pre>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>


        <!-- Multiple addons -->
        <section id="input-group-addon-multiple" class="docs-section pb-sm-2 mb-5">
          <h4>Multiple addons</h4>
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
                <div id="preview-3" class="tab-pane pt-4 mt-3 fade show active" role="tabpanel">
                  <div style="max-width: 400px">
                    <div class="input-group mb-3">
                      <span class="input-group-text">
                        <i class="fi-dollar-sign"></i>
                      </span>
                      <span class="input-group-text">0.00</span>
                      <input type="text" class="form-control" placeholder="Amount" aria-label="Dollar amount (with dot and two decimal places)">
                    </div>
                    <div class="input-group mb-3">
                      <input type="text" class="form-control" placeholder="Amount" aria-label="Dollar amount (with dot and two decimal places)">
                      <span class="input-group-text">
                        <i class="fi-dollar-sign"></i>
                      </span>
                      <span class="input-group-text">0.00</span>
                    </div>
                    <div class="input-group">
                      <span class="input-group-text">
                        <i class="fi-user"></i>
                      </span>
                      <span class="input-group-text">
                        <i class="fi-credit-card"></i>
                      </span>
                      <input type="text" class="form-control" placeholder="Amount" aria-label="Dollar amount (with dot and two decimal places)">
                      <span class="input-group-text">
                        <i class="fi-dollar-sign"></i>
                      </span>
                      <span class="input-group-text">0.00</span>
                    </div>
                  </div>
                </div>
                <div id="html-3" class="tab-pane pt-4 fade" role="tabpanel">
                  <div class="position-relative" data-bs-theme="dark">
                    <button type="button" class="btn btn-sm btn-outline-secondary bg-dark position-absolute top-0 end-0 mt-2 px-2 z-3" data-copy-code="#input-group-addon-multiple-code">
                      <i class="fi-copy fs-sm me-1"></i>
                      Copy
                    </button>
                    <pre id="input-group-addon-multiple-code" class="code-highlight mx-n2 mb-n2"><code class="language-html">&lt;!-- Multiple addons on the left --&gt;
    &lt;div class=&quot;input-group mb-3&quot;&gt;
      &lt;span class=&quot;input-group-text&quot;&gt;
        &lt;i class=&quot;fi-dollar-sign&quot;&gt;&lt;/i&gt;
      &lt;/span&gt;
      &lt;span class=&quot;input-group-text&quot;&gt;0.00&lt;/span&gt;
      &lt;input type=&quot;text&quot; class=&quot;form-control&quot; placeholder=&quot;Amount&quot; aria-label=&quot;Dollar amount (with dot and two decimal places)&quot;&gt;
    &lt;/div&gt;

    &lt;!-- Multiple addons on the right --&gt;
    &lt;div class=&quot;input-group mb-3&quot;&gt;
      &lt;input type=&quot;text&quot; class=&quot;form-control&quot; placeholder=&quot;Amount&quot; aria-label=&quot;Dollar amount (with dot and two decimal places)&quot;&gt;
      &lt;span class=&quot;input-group-text&quot;&gt;
        &lt;i class=&quot;fi-dollar-sign&quot;&gt;&lt;/i&gt;
      &lt;/span&gt;
      &lt;span class=&quot;input-group-text&quot;&gt;0.00&lt;/span&gt;
    &lt;/div&gt;

    &lt;!-- Multiple addons on both sides --&gt;
    &lt;div class=&quot;input-group mb-3&quot;&gt;
      &lt;span class=&quot;input-group-text&quot;&gt;
        &lt;i class=&quot;fi-user&quot;&gt;&lt;/i&gt;
      &lt;/span&gt;
      &lt;span class=&quot;input-group-text&quot;&gt;
        &lt;i class=&quot;fi-credit-card&quot;&gt;&lt;/i&gt;
      &lt;/span&gt;
      &lt;input type=&quot;text&quot; class=&quot;form-control&quot; placeholder=&quot;Amount&quot; aria-label=&quot;Dollar amount (with dot and two decimal places)&quot;&gt;
      &lt;span class=&quot;input-group-text&quot;&gt;
        &lt;i class=&quot;fi-dollar-sign&quot;&gt;&lt;/i&gt;
      &lt;/span&gt;
      &lt;span class=&quot;input-group-text&quot;&gt;0.00&lt;/span&gt;
    &lt;/div&gt;</code></pre>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>


        <!-- Different addon / input types -->
        <section id="input-group-types" class="docs-section pb-sm-2 mb-5">
          <h4>Different addon / input types</h4>
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
                <div id="preview-4" class="tab-pane pt-3 mt-3 fade show active" role="tabpanel">
                  <div style="max-width: 400px">
                    <div class="input-group mb-3">
                      <span class="input-group-text" id="addon-icon">
                        <i class="fi-edit fs-base"></i>
                      </span>
                      <textarea class="form-control" placeholder="Type your message here..." rows="5" aria-label="Message" aria-describedby="addon-icon"></textarea>
                    </div>
                    <div class="input-group mb-3">
                      <label class="input-group-text text-body-emphasis fw-medium" for="addon-text">Options</label>
                      <select class="form-select" id="addon-text">
                        <option selected disabled>Choose one...</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                      </select>
                    </div>
                    <div class="input-group mb-3">
                      <div class="input-group-text">
                        <input type="checkbox" class="form-check-input mt-0" aria-label="Checkbox for following text input">
                      </div>
                      <input type="text" class="form-control" placeholder="Text input" aria-label="Text input with checkbox">
                    </div>
                    <div class="input-group">
                      <div class="input-group-text">
                        <input type="radio" class="form-check-input mt-0" aria-label="Radio button for following text input">
                      </div>
                      <input type="text" class="form-control" placeholder="Text input" aria-label="Text input with radio button">
                    </div>
                  </div>
                </div>
                <div id="html-4" class="tab-pane pt-4 fade" role="tabpanel">
                  <div class="position-relative" data-bs-theme="dark">
                    <button type="button" class="btn btn-sm btn-outline-secondary bg-dark position-absolute top-0 end-0 mt-2 px-2 z-3" data-copy-code="#input-group-types-code">
                      <i class="fi-copy fs-sm me-1"></i>
                      Copy
                    </button>
                    <pre id="input-group-types-code" class="code-highlight mx-n2 mb-n2"><code class="language-html">&lt;!-- Icon addon + textarea --&gt;
    &lt;div class=&quot;input-group mb-3&quot;&gt;
      &lt;span class=&quot;input-group-text&quot; id=&quot;addon-icon&quot;&gt;
        &lt;i class=&quot;fi-edit fs-base&quot;&gt;&lt;/i&gt;
      &lt;/span&gt;
      &lt;textarea class=&quot;form-control&quot; placeholder=&quot;Type your message here...&quot; rows=&quot;5&quot; aria-label=&quot;Message&quot; aria-describedby=&quot;addon-icon&quot;&gt;&lt;/textarea&gt;
    &lt;/div&gt;

    &lt;!-- Textual addon + select --&gt;
    &lt;div class=&quot;input-group mb-3&quot;&gt;
      &lt;label class=&quot;input-group-text text-body-emphasis fw-medium&quot; for=&quot;addon-text&quot;&gt;Options&lt;/label&gt;
      &lt;select class=&quot;form-select&quot; id=&quot;addon-text&quot;&gt;
        &lt;option selected disabled&gt;Choose one...&lt;/option&gt;
        &lt;option value=&quot;1&quot;&gt;One&lt;/option&gt;
        &lt;option value=&quot;2&quot;&gt;Two&lt;/option&gt;
        &lt;option value=&quot;3&quot;&gt;Three&lt;/option&gt;
      &lt;/select&gt;
    &lt;/div&gt;

    &lt;!-- Checkbox addon + text input --&gt;
    &lt;div class=&quot;input-group mb-3&quot;&gt;
      &lt;div class=&quot;input-group-text&quot;&gt;
        &lt;input type=&quot;checkbox&quot; class=&quot;form-check-input mt-0&quot; aria-label=&quot;Checkbox for following text input&quot;&gt;
      &lt;/div&gt;
      &lt;input type=&quot;text&quot; class=&quot;form-control&quot; placeholder=&quot;Text input&quot; aria-label=&quot;Text input with checkbox&quot;&gt;
    &lt;/div&gt;

    &lt;!-- Radio button addon + text input --&gt;
    &lt;div class=&quot;input-group mb-3&quot;&gt;
      &lt;div class=&quot;input-group-text&quot;&gt;
        &lt;input type=&quot;radio&quot; class=&quot;form-check-input mt-0&quot; aria-label=&quot;Radio button for following text input&quot;&gt;
      &lt;/div&gt;
      &lt;input type=&quot;text&quot; class=&quot;form-control&quot; placeholder=&quot;Text input&quot; aria-label=&quot;Text input with radio button&quot;&gt;
    &lt;/div&gt;</code></pre>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>


        <!-- Multiple inputs -->
        <section id="input-group-multiple-inputs" class="docs-section pb-sm-2 mb-5">
          <h4>Multiple inputs</h4>
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
                <div id="preview-5" class="tab-pane pt-4 mt-3 fade show active" role="tabpanel">
                  <div style="max-width: 400px">
                    <div class="input-group mb-3">
                      <span class="input-group-text">
                        <i class="fi-id-card fs-base"></i>
                      </span>
                      <input type="text" class="form-control" placeholder="First name" aria-label="First name">
                      <input type="text" class="form-control" placeholder="Last name" aria-label="Last name">
                    </div>
                    <div class="input-group">
                      <input type="text" class="form-control" placeholder="From" aria-label="From time">
                      <input type="text" class="form-control" placeholder="To" aria-label="To time">
                      <span class="input-group-text">
                        <i class="fi-clock fs-base"></i>
                      </span>
                    </div>
                  </div>
                </div>
                <div id="html-5" class="tab-pane pt-4 fade" role="tabpanel">
                  <div class="position-relative" data-bs-theme="dark">
                    <button type="button" class="btn btn-sm btn-outline-secondary bg-dark position-absolute top-0 end-0 mt-2 px-2 z-3" data-copy-code="#input-group-multiple-inputs-code">
                      <i class="fi-copy fs-sm me-1"></i>
                      Copy
                    </button>
                    <pre id="input-group-multiple-inputs-code" class="code-highlight mx-n2 mb-n2"><code class="language-html">&lt;!-- Multiple inputs with addon on the left --&gt;
    &lt;div class=&quot;input-group mb-3&quot;&gt;
      &lt;span class=&quot;input-group-text&quot;&gt;
        &lt;i class=&quot;fi-id-card fs-base&quot;&gt;&lt;/i&gt;
      &lt;/span&gt;
      &lt;input type=&quot;text&quot; class=&quot;form-control&quot; placeholder=&quot;First name&quot; aria-label=&quot;First name&quot;&gt;
      &lt;input type=&quot;text&quot; class=&quot;form-control&quot; placeholder=&quot;Last name&quot; aria-label=&quot;Last name&quot;&gt;
    &lt;/div&gt;

    &lt;!-- Multiple inputs with addon on the right --&gt;
    &lt;div class=&quot;input-group mb-3&quot;&gt;
      &lt;input type=&quot;text&quot; class=&quot;form-control&quot; placeholder=&quot;From&quot; aria-label=&quot;From time&quot;&gt;
      &lt;input type=&quot;text&quot; class=&quot;form-control&quot; placeholder=&quot;To&quot; aria-label=&quot;To time&quot;&gt;
      &lt;span class=&quot;input-group-text&quot;&gt;
        &lt;i class=&quot;fi-clock fs-base&quot;&gt;&lt;/i&gt;
      &lt;/span&gt;
    &lt;/div&gt;</code></pre>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>


        <!-- Button addons -->
        <section id="input-group-addon-button" class="docs-section pb-sm-2 mb-5">
          <h4>Button addons</h4>
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
                  <div style="max-width: 400px">
                    <div class="input-group mb-3">
                      <button type="button" class="btn btn-primary" id="button-addon-left">Button</button>
                      <input type="text" class="form-control" placeholder="Button on the left" aria-label="Example text with button addon" aria-describedby="button-addon-left">
                    </div>
                    <div class="input-group mb-3">
                      <input type="text" class="form-control" placeholder="Button on the right" aria-label="Example text with button addon" aria-describedby="button-addon-right">
                      <button type="button" class="btn btn-dark" id="button-addon-right">Button</button>
                    </div>
                    <div class="input-group mb-3">
                      <button type="button" class="btn btn-outline-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Dropdown</button>
                      <div class="dropdown-menu my-1">
                        <a class="dropdown-item" href="#!">Action</a>
                        <a class="dropdown-item" href="#!">Another action</a>
                        <a class="dropdown-item" href="#!">Something else here</a>
                      </div>
                      <input type="text" class="form-control" placeholder="Dropdown on the right" aria-label="Text input with dropdown button">
                    </div>
                    <div class="input-group mb-3">
                      <input type="text" class="form-control" placeholder="Dropdown on the right" aria-label="Text input with dropdown button">
                      <button type="button" class="btn btn-outline-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Dropdown</button>
                      <div class="dropdown-menu dropdown-menu-end my-1">
                        <a class="dropdown-item" href="#!">Action</a>
                        <a class="dropdown-item" href="#!">Another action</a>
                        <a class="dropdown-item" href="#!">Something else here</a>
                      </div>
                    </div>
                    <div class="input-group">
                      <input type="text" class="form-control" placeholder="Buttons on the right" aria-label="Text input with multiple button addons">
                      <button type="button" class="btn btn-icon btn-outline-success" aria-label="Confirm">
                        <i class="fi-check"></i>
                      </button>
                      <button type="button" class="btn btn-icon btn-outline-danger" aria-label="Delete">
                        <i class="fi-trash"></i>
                      </button>
                    </div>
                  </div>
                </div>
                <div id="html-6" class="tab-pane pt-4 fade" role="tabpanel">
                  <div class="position-relative" data-bs-theme="dark">
                    <button type="button" class="btn btn-sm btn-outline-secondary bg-dark position-absolute top-0 end-0 mt-2 px-2 z-3" data-copy-code="#input-group-addon-button-code">
                      <i class="fi-copy fs-sm me-1"></i>
                      Copy
                    </button>
                    <pre id="input-group-addon-button-code" class="code-highlight mx-n2 mb-n2"><code class="language-html">&lt;!-- Button addon on the left --&gt;
    &lt;div class=&quot;input-group mb-3&quot;&gt;
      &lt;button type=&quot;button&quot; class=&quot;btn btn-primary&quot; id=&quot;button-addon-left&quot;&gt;Button&lt;/button&gt;
      &lt;input type=&quot;text&quot; class=&quot;form-control&quot; placeholder=&quot;Button on the left&quot; aria-label=&quot;Example text with button addon&quot; aria-describedby=&quot;button-addon-left&quot;&gt;
    &lt;/div&gt;

    &lt;!-- Button addon on the right --&gt;
    &lt;div class=&quot;input-group mb-3&quot;&gt;
      &lt;input type=&quot;text&quot; class=&quot;form-control&quot; placeholder=&quot;Button on the right&quot; aria-label=&quot;Example text with button addon&quot; aria-describedby=&quot;button-addon-right&quot;&gt;
      &lt;button type=&quot;button&quot; class=&quot;btn btn-dark&quot; id=&quot;button-addon-right&quot;&gt;Button&lt;/button&gt;
    &lt;/div&gt;

    &lt;!-- Dropdown addon on the left --&gt;
    &lt;div class=&quot;input-group mb-3&quot;&gt;
      &lt;button type=&quot;button&quot; class=&quot;btn btn-outline-primary dropdown-toggle&quot; data-bs-toggle=&quot;dropdown&quot; aria-expanded=&quot;false&quot;&gt;Dropdown&lt;/button&gt;
      &lt;div class=&quot;dropdown-menu my-1&quot;&gt;
        &lt;a class=&quot;dropdown-item&quot; href=&quot;#&quot;&gt;Action&lt;/a&gt;
        &lt;a class=&quot;dropdown-item&quot; href=&quot;#&quot;&gt;Another action&lt;/a&gt;
        &lt;a class=&quot;dropdown-item&quot; href=&quot;#&quot;&gt;Something else here&lt;/a&gt;
      &lt;/div&gt;
      &lt;input type=&quot;text&quot; class=&quot;form-control&quot; placeholder=&quot;Dropdown on the right&quot; aria-label=&quot;Text input with dropdown button&quot;&gt;
    &lt;/div&gt;

    &lt;!-- Dropdown addon on the right --&gt;
    &lt;div class=&quot;input-group mb-3&quot;&gt;
      &lt;input type=&quot;text&quot; class=&quot;form-control&quot; placeholder=&quot;Dropdown on the right&quot; aria-label=&quot;Text input with dropdown button&quot;&gt;
      &lt;button type=&quot;button&quot; class=&quot;btn btn-outline-dark dropdown-toggle&quot; data-bs-toggle=&quot;dropdown&quot; aria-expanded=&quot;false&quot;&gt;Dropdown&lt;/button&gt;
      &lt;div class=&quot;dropdown-menu dropdown-menu-end my-1&quot;&gt;
        &lt;a class=&quot;dropdown-item&quot; href=&quot;#&quot;&gt;Action&lt;/a&gt;
        &lt;a class=&quot;dropdown-item&quot; href=&quot;#&quot;&gt;Another action&lt;/a&gt;
        &lt;a class=&quot;dropdown-item&quot; href=&quot;#&quot;&gt;Something else here&lt;/a&gt;
      &lt;/div&gt;
    &lt;/div&gt;

    &lt;!-- Multiple button addons --&gt;
    &lt;div class=&quot;input-group mb-3&quot;&gt;
      &lt;input type=&quot;text&quot; class=&quot;form-control&quot; placeholder=&quot;Buttons on the right&quot; aria-label=&quot;Text input with multiple button addons&quot;&gt;
      &lt;button type=&quot;button&quot; class=&quot;btn btn-icon btn-outline-success&quot; aria-label=&quot;Confirm&quot;&gt;
        &lt;i class=&quot;fi-check&quot;&gt;&lt;/i&gt;
      &lt;/button&gt;
      &lt;button type=&quot;button&quot; class=&quot;btn btn-icon btn-outline-danger&quot; aria-label=&quot;Delete&quot;&gt;
        &lt;i class=&quot;fi-trash&quot;&gt;&lt;/i&gt;
      &lt;/button&gt;
    &lt;/div&gt;</code></pre>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>


        <!-- Shapes -->
        <section id="input-group-shapes" class="docs-section pb-sm-2 mb-5">
          <h4>Shapes</h4>
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
                  <div class="d-flex flex-wrap flex-sm-nowrap gap-4">
                    <div class="w-100" style="max-width: 400px">
                      <div class="input-group mb-3">
                        <span class="input-group-text" id="addon-icon-rounded">
                          <i class="fi-user"></i>
                        </span>
                        <input type="text" class="form-control" placeholder="Rounded (default)" aria-label="Rounded input group with icon addon" aria-describedby="addon-icon-rounded">
                      </div>
                      <div class="input-group mb-3">
                        <span class="input-group-text rounded-pill rounded-end-0" id="addon-icon-pill">
                          <i class="fi-user"></i>
                        </span>
                        <input type="text" class="form-control rounded-pill rounded-start-0" placeholder="Pill shape" aria-label="Pill input group with icon addon" aria-describedby="addon-icon-pill">
                      </div>
                      <div class="input-group">
                        <span class="input-group-text rounded-0" id="addon-icon-square">
                          <i class="fi-user"></i>
                        </span>
                        <input type="text" class="form-control rounded-0" placeholder="Square shape" aria-label="Square input group with icon addon" aria-describedby="addon-icon-square">
                      </div>
                    </div>
                    <div class="w-100" style="max-width: 400px">
                      <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Rounded (default)" aria-label="Rounded input group with button addon" aria-describedby="addon-button-rounded">
                        <button type="button" class="btn btn-outline-dark" id="addon-button-rounded">Button</button>
                      </div>
                      <div class="input-group mb-3">
                        <input type="text" class="form-control rounded-pill rounded-end-0" placeholder="Pill shape" aria-label="Pill input group with button addon" aria-describedby="addon-button-pill">
                        <button type="button" class="btn btn-outline-dark rounded-pill rounded-start-0" id="addon-button-pill">Button</button>
                      </div>
                      <div class="input-group">
                        <input type="text" class="form-control rounded-0" placeholder="Square shape" aria-label="Square input group with button addon" aria-describedby="addon-button-square">
                        <button type="button" class="btn btn-outline-dark rounded-0" id="addon-button-square">Button</button>
                      </div>
                    </div>
                  </div>
                </div>
                <div id="html-7" class="tab-pane pt-4 fade" role="tabpanel">
                  <div class="position-relative" data-bs-theme="dark">
                    <button type="button" class="btn btn-sm btn-outline-secondary bg-dark position-absolute top-0 end-0 mt-2 px-2 z-3" data-copy-code="#input-group-shapes-code">
                      <i class="fi-copy fs-sm me-1"></i>
                      Copy
                    </button>
                    <pre id="input-group-shapes-code" class="code-highlight mx-n2 mb-n2"><code class="language-html">&lt;!-- Rounded (default) input group with icon addon on the left --&gt;
    &lt;div class=&quot;input-group mb-3&quot;&gt;
      &lt;span class=&quot;input-group-text&quot; id=&quot;addon-icon-rounded&quot;&gt;
        &lt;i class=&quot;fi-user&quot;&gt;&lt;/i&gt;
      &lt;/span&gt;
      &lt;input type=&quot;text&quot; class=&quot;form-control&quot; placeholder=&quot;Rounded (default)&quot; aria-label=&quot;Rounded input group with icon addon&quot; aria-describedby=&quot;addon-icon-rounded&quot;&gt;
    &lt;/div&gt;


    &lt;!-- Pill input group with icon addon on the left --&gt;
    &lt;div class=&quot;input-group mb-3&quot;&gt;
      &lt;span class=&quot;input-group-text rounded-pill rounded-end-0&quot; id=&quot;addon-icon-pill&quot;&gt;
        &lt;i class=&quot;fi-user&quot;&gt;&lt;/i&gt;
      &lt;/span&gt;
      &lt;input type=&quot;text&quot; class=&quot;form-control rounded-pill rounded-start-0&quot; placeholder=&quot;Pill shape&quot; aria-label=&quot;Pill input group with icon addon&quot; aria-describedby=&quot;addon-icon-pill&quot;&gt;
    &lt;/div&gt;

    &lt;!-- Square input group with icon addon on the left --&gt;
    &lt;div class=&quot;input-group mb-3&quot;&gt;
      &lt;span class=&quot;input-group-text rounded-0&quot; id=&quot;addon-icon-square&quot;&gt;
        &lt;i class=&quot;fi-user&quot;&gt;&lt;/i&gt;
      &lt;/span&gt;
      &lt;input type=&quot;text&quot; class=&quot;form-control rounded-0&quot; placeholder=&quot;Square shape&quot; aria-label=&quot;Square input group with icon addon&quot; aria-describedby=&quot;addon-icon-square&quot;&gt;
    &lt;/div&gt;

    &lt;!-- Rounded (default) input group with button addon on the right --&gt;
    &lt;div class=&quot;input-group mb-3&quot;&gt;
      &lt;input type=&quot;text&quot; class=&quot;form-control&quot; placeholder=&quot;Rounded (default)&quot; aria-label=&quot;Rounded input group with button addon&quot; aria-describedby=&quot;addon-button-rounded&quot;&gt;
      &lt;button type=&quot;button&quot; class=&quot;btn btn-outline-dark&quot; id=&quot;addon-button-rounded&quot;&gt;Button&lt;/button&gt;
    &lt;/div&gt;

    &lt;!-- Pill input group with button addon on the right --&gt;
    &lt;div class=&quot;input-group mb-3&quot;&gt;
      &lt;input type=&quot;text&quot; class=&quot;form-control rounded-pill rounded-end-0&quot; placeholder=&quot;Pill shape&quot; aria-label=&quot;Pill input group with button addon&quot; aria-describedby=&quot;addon-button-pill&quot;&gt;
      &lt;button type=&quot;button&quot; class=&quot;btn btn-outline-dark rounded-pill rounded-start-0&quot; id=&quot;addon-button-pill&quot;&gt;Button&lt;/button&gt;
    &lt;/div&gt;

    &lt;!-- Square input group with button addon on the right --&gt;
    &lt;div class=&quot;input-group mb-3&quot;&gt;
      &lt;input type=&quot;text&quot; class=&quot;form-control rounded-0&quot; placeholder=&quot;Square shape&quot; aria-label=&quot;Square input group with button addon&quot; aria-describedby=&quot;addon-button-square&quot;&gt;
      &lt;button type=&quot;button&quot; class=&quot;btn btn-outline-dark rounded-0&quot; id=&quot;addon-button-square&quot;&gt;Button&lt;/button&gt;
    &lt;/div&gt;</code></pre>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>


        <!-- Sizes -->
        <section id="input-group-sizes" class="docs-section">
          <h4>Sizes</h4>
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
                  <div class="d-flex flex-wrap flex-sm-nowrap gap-4">
                    <div class="w-100" style="max-width: 400px">
                      <div class="input-group input-group-lg mb-3">
                        <span class="input-group-text" id="addon-icon-large">
                          <i class="fi-user"></i>
                        </span>
                        <input type="text" class="form-control" placeholder="Large input group" aria-label="Large input group with icon addon" aria-describedby="addon-icon-large">
                      </div>
                      <div class="input-group mb-3">
                        <span class="input-group-text" id="addon-icon-normal">
                          <i class="fi-user"></i>
                        </span>
                        <input type="text" class="form-control" placeholder="Normal input group" aria-label="Normal input group with icon addon" aria-describedby="addon-icon-normal">
                      </div>
                      <div class="input-group input-group-sm">
                        <span class="input-group-text" id="addon-icon-small">
                          <i class="fi-user"></i>
                        </span>
                        <input type="text" class="form-control" placeholder="Small input group" aria-label="Square input group with icon addon" aria-describedby="addon-icon-small">
                      </div>
                    </div>
                    <div class="w-100" style="max-width: 400px">
                      <div class="input-group input-group-lg mb-3">
                        <input type="text" class="form-control" placeholder="Large input group" aria-label="Large input group with button addon" aria-describedby="addon-button-large">
                        <button type="button" class="btn btn-outline-dark" id="addon-button-large">Button</button>
                      </div>
                      <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Normal input group" aria-label="Normal input group with button addon" aria-describedby="addon-button-normal">
                        <button type="button" class="btn btn-outline-dark" id="addon-button-normal">Button</button>
                      </div>
                      <div class="input-group input-group-sm">
                        <input type="text" class="form-control" placeholder="Small input group" aria-label="Small input group with button addon" aria-describedby="addon-button-small">
                        <button type="button" class="btn btn-outline-dark" id="addon-button-small">Button</button>
                      </div>
                    </div>
                  </div>
                </div>
                <div id="html-8" class="tab-pane pt-4 fade" role="tabpanel">
                  <div class="position-relative" data-bs-theme="dark">
                    <button type="button" class="btn btn-sm btn-outline-secondary bg-dark position-absolute top-0 end-0 mt-2 px-2 z-3" data-copy-code="#input-group-sizes-code">
                      <i class="fi-copy fs-sm me-1"></i>
                      Copy
                    </button>
                    <pre id="input-group-sizes-code" class="code-highlight mx-n2 mb-n2"><code class="language-html">&lt;!-- Large input group with icon addon on the left --&gt;
    &lt;div class=&quot;input-group input-group-lg mb-3&quot;&gt;
      &lt;span class=&quot;input-group-text&quot; id=&quot;addon-icon-large&quot;&gt;
        &lt;i class=&quot;fi-user&quot;&gt;&lt;/i&gt;
      &lt;/span&gt;
      &lt;input type=&quot;text&quot; class=&quot;form-control&quot; placeholder=&quot;Large input group&quot; aria-label=&quot;Large input group with icon addon&quot; aria-describedby=&quot;addon-icon-large&quot;&gt;
    &lt;/div&gt;

    &lt;!-- Normal input group with icon addon on the left --&gt;
    &lt;div class=&quot;input-group mb-3&quot;&gt;
      &lt;span class=&quot;input-group-text&quot; id=&quot;addon-icon-normal&quot;&gt;
        &lt;i class=&quot;fi-user&quot;&gt;&lt;/i&gt;
      &lt;/span&gt;
      &lt;input type=&quot;text&quot; class=&quot;form-control&quot; placeholder=&quot;Normal input group&quot; aria-label=&quot;Normal input group with icon addon&quot; aria-describedby=&quot;addon-icon-normal&quot;&gt;
    &lt;/div&gt;

    &lt;!-- Small input group with icon addon on the left --&gt;
    &lt;div class=&quot;input-group input-group-sm mb-3&quot;&gt;
      &lt;span class=&quot;input-group-text&quot; id=&quot;addon-icon-small&quot;&gt;
        &lt;i class=&quot;fi-user&quot;&gt;&lt;/i&gt;
      &lt;/span&gt;
      &lt;input type=&quot;text&quot; class=&quot;form-control&quot; placeholder=&quot;Small input group&quot; aria-label=&quot;Square input group with icon addon&quot; aria-describedby=&quot;addon-icon-small&quot;&gt;
    &lt;/div&gt;

    &lt;!-- Large input group with button addon on the right --&gt;
    &lt;div class=&quot;input-group input-group-lg mb-3&quot;&gt;
      &lt;input type=&quot;text&quot; class=&quot;form-control&quot; placeholder=&quot;Large input group&quot; aria-label=&quot;Large input group with button addon&quot; aria-describedby=&quot;addon-button-large&quot;&gt;
      &lt;button type=&quot;button&quot; class=&quot;btn btn-outline-dark&quot; id=&quot;addon-button-large&quot;&gt;Button&lt;/button&gt;
    &lt;/div&gt;

    &lt;!-- Normal input group with button addon on the right --&gt;
    &lt;div class=&quot;input-group mb-3&quot;&gt;
      &lt;input type=&quot;text&quot; class=&quot;form-control&quot; placeholder=&quot;Normal input group&quot; aria-label=&quot;Normal input group with button addon&quot; aria-describedby=&quot;addon-button-normal&quot;&gt;
      &lt;button type=&quot;button&quot; class=&quot;btn btn-outline-dark&quot; id=&quot;addon-button-normal&quot;&gt;Button&lt;/button&gt;
    &lt;/div&gt;

    &lt;!-- Small input group with button addon on the right --&gt;
    &lt;div class=&quot;input-group input-group-sm&quot;&gt;
      &lt;input type=&quot;text&quot; class=&quot;form-control&quot; placeholder=&quot;Small input group&quot; aria-label=&quot;Small input group with button addon&quot; aria-describedby=&quot;addon-button-small&quot;&gt;
      &lt;button type=&quot;button&quot; class=&quot;btn btn-outline-dark&quot; id=&quot;addon-button-small&quot;&gt;Button&lt;/button&gt;
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