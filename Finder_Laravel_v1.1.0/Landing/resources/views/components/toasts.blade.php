@extends('layouts.app')

@section('title', 'Finder Docs | Toasts')

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
                      <div class="dropdown">
                        <span class="list-group-item list-group-item-action justify-content-between dropdown-toggle pe-3 pe-none active">
                          Toasts
                          <span class="visually-hidden">notification overlay popup alert feedback</span>
                        </span>
                        <ul id="anchorNav" class="nav nav-underline flex-column border-start ms-2 my-2" style="gap: .25rem;">
                          <li class="nav-item"><a class="nav-link fw-normal" href="#toasts-tiny">Tiny variant</a></li>
                          <li class="nav-item"><a class="nav-link fw-normal" href="#toasts-tiny-icon">Tiny with icon</a></li>
                          <li class="nav-item"><a class="nav-link fw-normal" href="#toasts-header-icon">With header and icon</a></li>
                          <li class="nav-item"><a class="nav-link fw-normal" href="#toasts-buttons">Action buttons</a></li>
                          <li class="nav-item"><a class="nav-link fw-normal" href="#toasts-placement">Placement</a></li>
                          <li class="nav-item"><a class="nav-link fw-normal" href="#toasts-live">Live demo</a></li>
                        </ul>
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
              <a class="badge d-inline-flex align-items-center text-info bg-info-subtle fw-semibold text-decoration-none py-2 px-3 mb-2 rounded-pill" href="https://getbootstrap.com/docs/5.3/components/toasts/" target="_blank" rel="noreferrer">
                Bootstrap docs
                <i class="fi-external-link fs-sm ms-1"></i>
              </a>
              <h1 class="pt-1">Toasts</h1>
              <p class="text-body-secondary mb-4">Push notifications to your visitors with a toast, a lightweight and easily customizable alert message.</p>
            </section>


            <!-- Tiny variant -->
            <section id="toasts-tiny" class="docs-section pb-sm-2 mb-5">
              <h4>Tiny variant</h4>
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
                    <div id="preview-1" class="tab-pane pt-4 mt-3 fade show active" role="tabpanel">
                      <div class="row g-md-5">
                        <div class="col-sm-6 col-xl-5">
                          <div class="toast fade show mb-3" role="alert" aria-live="assertive" aria-atomic="true">
                            <div class="d-flex">
                              <div class="toast-body me-2">
                                Hello, world! This is a toast message.
                              </div>
                              <button type="button" class="btn-close ms-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                            </div>
                          </div>
                          <div class="toast text-bg-primary border-0 fade show mb-3" role="alert" aria-live="assertive" aria-atomic="true" data-bs-theme="dark">
                            <div class="d-flex">
                              <div class="toast-body me-2">
                                Hello, world! This is a toast message.
                              </div>
                              <button type="button" class="btn-close  ms-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                            </div>
                          </div>
                          <div class="toast text-bg-secondary border-0 fade show mb-3" role="alert" aria-live="assertive" aria-atomic="true" data-bs-theme="dark">
                            <div class="d-flex">
                              <div class="toast-body me-2">
                                Hello, world! This is a toast message.
                              </div>
                              <button type="button" class="btn-close ms-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                            </div>
                          </div>
                          <div class="toast text-bg-success border-0 fade show mb-3" role="alert" aria-live="assertive" aria-atomic="true" data-bs-theme="dark">
                            <div class="d-flex">
                              <div class="toast-body me-2">
                                Hello, world! This is a toast message.
                              </div>
                              <button type="button" class="btn-close ms-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                            </div>
                          </div>
                          <div class="toast text-bg-danger border-0 fade show mb-3" role="alert" aria-live="assertive" aria-atomic="true" data-bs-theme="dark">
                            <div class="d-flex">
                              <div class="toast-body me-2">
                                Hello, world! This is a toast message.
                              </div>
                              <button type="button" class="btn-close ms-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                            </div>
                          </div>
                          <div class="toast text-bg-warning border-0 fade show mb-3" role="alert" aria-live="assertive" aria-atomic="true" data-bs-theme="dark">
                            <div class="d-flex">
                              <div class="toast-body me-2">
                                Hello, world! This is a toast message.
                              </div>
                              <button type="button" class="btn-close ms-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                            </div>
                          </div>
                          <div class="toast text-bg-info border-0 fade show mb-3" role="alert" aria-live="assertive" aria-atomic="true" data-bs-theme="dark">
                            <div class="d-flex">
                              <div class="toast-body me-2">
                                Hello, world! This is a toast message.
                              </div>
                              <button type="button" class="btn-close ms-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                            </div>
                          </div>
                          <div class="toast text-bg-light border-0 fade show mb-3" role="alert" aria-live="assertive" aria-atomic="true" data-bs-theme="light">
                            <div class="d-flex">
                              <div class="toast-body me-2">
                                Hello, world! This is a toast message.
                              </div>
                              <button type="button" class="btn btn-sm fs-base opacity-75 border-0 p-0 ms-auto" data-bs-dismiss="toast" aria-label="Close">
                                <i class="fi-close"></i>
                              </button>
                            </div>
                          </div>
                          <div class="toast text-bg-dark border-0 fade show mb-3" role="alert" aria-live="assertive" aria-atomic="true" data-bs-theme="dark">
                            <div class="d-flex">
                              <div class="toast-body me-2">
                                Hello, world! This is a toast message.
                              </div>
                              <button type="button" class="btn-close ms-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-6 col-xl-5">
                          <div class="toast border-primary fade show mb-3" role="alert" aria-live="assertive" aria-atomic="true">
                            <div class="d-flex">
                              <div class="toast-body me-2">
                                Hello, world! This is a toast message.
                              </div>
                              <button type="button" class="btn-close ms-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                            </div>
                          </div>
                          <div class="toast border-secondary fade show mb-3" role="alert" aria-live="assertive" aria-atomic="true">
                            <div class="d-flex">
                              <div class="toast-body me-2">
                                Hello, world! This is a toast message.
                              </div>
                              <button type="button" class="btn-close ms-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                            </div>
                          </div>
                          <div class="toast border-success fade show mb-3" role="alert" aria-live="assertive" aria-atomic="true">
                            <div class="d-flex">
                              <div class="toast-body me-2">
                                Hello, world! This is a toast message.
                              </div>
                              <button type="button" class="btn-close ms-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                            </div>
                          </div>
                          <div class="toast border-danger fade show mb-3" role="alert" aria-live="assertive" aria-atomic="true">
                            <div class="d-flex">
                              <div class="toast-body me-2">
                                Hello, world! This is a toast message.
                              </div>
                              <button type="button" class="btn-close ms-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                            </div>
                          </div>
                          <div class="toast border-warning fade show mb-3" role="alert" aria-live="assertive" aria-atomic="true">
                            <div class="d-flex">
                              <div class="toast-body me-2">
                                Hello, world! This is a toast message.
                              </div>
                              <button type="button" class="btn-close ms-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                            </div>
                          </div>
                          <div class="toast border-info fade show mb-3" role="alert" aria-live="assertive" aria-atomic="true">
                            <div class="d-flex">
                              <div class="toast-body me-2">
                                Hello, world! This is a toast message.
                              </div>
                              <button type="button" class="btn-close ms-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                            </div>
                          </div>
                          <div class="toast border-dark fade show mb-3" role="alert" aria-live="assertive" aria-atomic="true">
                            <div class="d-flex">
                              <div class="toast-body me-2">
                                Hello, world! This is a toast message.
                              </div>
                              <button type="button" class="btn-close ms-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div id="html-1" class="tab-pane pt-4 fade" role="tabpanel">
                      <div class="position-relative" data-bs-theme="dark">
                        <button type="button" class="btn btn-sm btn-outline-secondary bg-dark position-absolute top-0 end-0 mt-2 px-2 z-3" data-copy-code="#toasts-tiny-code">
                          <i class="fi-copy fs-sm me-1"></i>
                          Copy
                        </button>
                        <pre id="toasts-tiny-code" class="code-highlight mx-n2 mb-n2"><code class="language-html">&lt;!-- Default tiny toast. Remove .fade and .show classes to make it initially hidden. --&gt;
  &lt;div class=&quot;toast fade show&quot; role=&quot;alert&quot; aria-live=&quot;assertive&quot; aria-atomic=&quot;true&quot;&gt;
    &lt;div class=&quot;d-flex&quot;&gt;
      &lt;div class=&quot;toast-body me-2&quot;&gt;
        Hello, world! This is a toast message.
      &lt;/div&gt;
      &lt;button type=&quot;button&quot; class=&quot;btn-close ms-auto&quot; data-bs-dismiss=&quot;toast&quot; aria-label=&quot;Close&quot;&gt;&lt;/button&gt;
    &lt;/div&gt;
  &lt;/div&gt;

  &lt;!-- Color variations --&gt;

  &lt;!-- Primary background --&gt;
  &lt;div class=&quot;toast text-bg-primary border-0 fade show&quot; role=&quot;alert&quot; aria-live=&quot;assertive&quot; aria-atomic=&quot;true&quot;&gt;
    ...
  &lt;/div&gt;

  &lt;!-- Secondary background --&gt;
  &lt;div class=&quot;toast text-bg-secondary border-0 fade show&quot; role=&quot;alert&quot; aria-live=&quot;assertive&quot; aria-atomic=&quot;true&quot;&gt;
    ...
  &lt;/div&gt;

  &lt;!-- Success background --&gt;
  &lt;div class=&quot;toast text-bg-success border-0 fade show&quot; role=&quot;alert&quot; aria-live=&quot;assertive&quot; aria-atomic=&quot;true&quot;&gt;
    ...
  &lt;/div&gt;

  &lt;!-- Danger background --&gt;
  &lt;div class=&quot;toast text-bg-danger border-0 fade show&quot; role=&quot;alert&quot; aria-live=&quot;assertive&quot; aria-atomic=&quot;true&quot;&gt;
    ...
  &lt;/div&gt;

  &lt;!-- Warning background --&gt;
  &lt;div class=&quot;toast text-bg-warning border-0 fade show&quot; role=&quot;alert&quot; aria-live=&quot;assertive&quot; aria-atomic=&quot;true&quot;&gt;
    ...
  &lt;/div&gt;

  &lt;!-- Info background --&gt;
  &lt;div class=&quot;toast text-bg-info border-0 fade show&quot; role=&quot;alert&quot; aria-live=&quot;assertive&quot; aria-atomic=&quot;true&quot;&gt;
    ...
  &lt;/div&gt;

  &lt;!-- Light background --&gt;
  &lt;div class=&quot;toast text-bg-light border-0 fade show&quot; role=&quot;alert&quot; aria-live=&quot;assertive&quot; aria-atomic=&quot;true&quot;&gt;
    ...
  &lt;/div&gt;

  &lt;!-- Dark background --&gt;
  &lt;div class=&quot;toast text-bg-dark border-0 fade show&quot; role=&quot;alert&quot; aria-live=&quot;assertive&quot; aria-atomic=&quot;true&quot;&gt;
    ...
  &lt;/div&gt;

  &lt;!-- Primary border --&gt;
  &lt;div class=&quot;toast border-primary fade show&quot; role=&quot;alert&quot; aria-live=&quot;assertive&quot; aria-atomic=&quot;true&quot;&gt;
    ...
  &lt;/div&gt;

  &lt;!-- Secondary border --&gt;
  &lt;div class=&quot;toast border-secondary fade show&quot; role=&quot;alert&quot; aria-live=&quot;assertive&quot; aria-atomic=&quot;true&quot;&gt;
    ...
  &lt;/div&gt;

  &lt;!-- Success border --&gt;
  &lt;div class=&quot;toast border-success fade show&quot; role=&quot;alert&quot; aria-live=&quot;assertive&quot; aria-atomic=&quot;true&quot;&gt;
    ...
  &lt;/div&gt;

  &lt;!-- Danger border --&gt;
  &lt;div class=&quot;toast border-danger fade show&quot; role=&quot;alert&quot; aria-live=&quot;assertive&quot; aria-atomic=&quot;true&quot;&gt;
    ...
  &lt;/div&gt;

  &lt;!-- Warning border --&gt;
  &lt;div class=&quot;toast border-warning fade show&quot; role=&quot;alert&quot; aria-live=&quot;assertive&quot; aria-atomic=&quot;true&quot;&gt;
    ...
  &lt;/div&gt;

  &lt;!-- Info border --&gt;
  &lt;div class=&quot;toast border-info fade show&quot; role=&quot;alert&quot; aria-live=&quot;assertive&quot; aria-atomic=&quot;true&quot;&gt;
    ...
  &lt;/div&gt;

  &lt;!-- Dark border --&gt;
  &lt;div class=&quot;toast border-dark fade show&quot; role=&quot;alert&quot; aria-live=&quot;assertive&quot; aria-atomic=&quot;true&quot;&gt;
    ...
  &lt;/div&gt;</code></pre>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </section>


            <!-- Tiny with icon -->
            <section id="toasts-tiny-icon" class="docs-section pb-sm-2 mb-5">
              <h4>Tiny with icon</h4>
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
                      <div class="row g-md-5">
                        <div class="col-sm-6 col-xl-5">
                          <div class="toast fade show mb-3" role="alert" aria-live="assertive" aria-atomic="true">
                            <div class="d-flex">
                              <i class="fi-settings fs-base mt-1 me-2"></i>
                              <div class="toast-body me-2">
                                Hello, world! This is a toast message.
                              </div>
                              <button type="button" class="btn-close ms-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                            </div>
                          </div>
                          <div class="toast text-bg-primary border-0 fade show mb-3" role="alert" aria-live="assertive" aria-atomic="true" data-bs-theme="dark">
                            <div class="d-flex">
                              <i class="fi-bell fs-base mt-1 me-2"></i>
                              <div class="toast-body me-2">
                                Hello, world! This is a toast message.
                              </div>
                              <button type="button" class="btn-close ms-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                            </div>
                          </div>
                          <div class="toast text-bg-secondary border-0 fade show mb-3" role="alert" aria-live="assertive" aria-atomic="true" data-bs-theme="dark">
                            <div class="d-flex">
                              <i class="fi-clock fs-base mt-1 me-2"></i>
                              <div class="toast-body me-2">
                                Hello, world! This is a toast message.
                              </div>
                              <button type="button" class="btn-close ms-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                            </div>
                          </div>
                          <div class="toast text-bg-success border-0 fade show mb-3" role="alert" aria-live="assertive" aria-atomic="true" data-bs-theme="dark">
                            <div class="d-flex">
                              <i class="fi-check-circle fs-base mt-1 me-2"></i>
                              <div class="toast-body me-2">
                                Hello, world! This is a toast message.
                              </div>
                              <button type="button" class="btn-close ms-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                            </div>
                          </div>
                          <div class="toast text-bg-danger border-0 fade show mb-3" role="alert" aria-live="assertive" aria-atomic="true" data-bs-theme="dark">
                            <div class="d-flex">
                              <i class="fi-banned fs-base mt-1 me-2"></i>
                              <div class="toast-body me-2">
                                Hello, world! This is a toast message.
                              </div>
                              <button type="button" class="btn-close ms-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                            </div>
                          </div>
                          <div class="toast text-bg-warning border-0 fade show mb-3" role="alert" aria-live="assertive" aria-atomic="true" data-bs-theme="dark">
                            <div class="d-flex">
                              <i class="fi-alert-triangle fs-base mt-1 me-2"></i>
                              <div class="toast-body me-2">
                                Hello, world! This is a toast message.
                              </div>
                              <button type="button" class="btn-close ms-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                            </div>
                          </div>
                          <div class="toast text-bg-info border-0 fade show mb-3" role="alert" aria-live="assertive" aria-atomic="true" data-bs-theme="dark">
                            <div class="d-flex">
                              <i class="fi-info fs-base mt-1 me-2"></i>
                              <div class="toast-body me-2">
                                Hello, world! This is a toast message.
                              </div>
                              <button type="button" class="btn-close ms-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                            </div>
                          </div>
                          <div class="toast text-bg-light border-0 fade show mb-3" role="alert" aria-live="assertive" aria-atomic="true" data-bs-theme="light">
                            <div class="d-flex">
                              <i class="fi-unlock fs-base mt-1 me-2"></i>
                              <div class="toast-body me-2">
                                Hello, world! This is a toast message.
                              </div>
                              <button type="button" class="btn btn-sm fs-base opacity-75 border-0 p-0 ms-auto" data-bs-dismiss="toast" aria-label="Close">
                                <i class="fi-close"></i>
                              </button>
                            </div>
                          </div>
                          <div class="toast text-bg-dark border-0 fade show mb-3" role="alert" aria-live="assertive" aria-atomic="true" data-bs-theme="dark">
                            <div class="d-flex">
                              <i class="fi-map-pin fs-base mt-1 me-2"></i>
                              <div class="toast-body me-2">
                                Hello, world! This is a toast message.
                              </div>
                              <button type="button" class="btn-close ms-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-6 col-xl-5">
                          <div class="toast border-primary fade show mb-3" role="alert" aria-live="assertive" aria-atomic="true">
                            <div class="d-flex">
                              <i class="fi-bell text-primary fs-base mt-1 me-2"></i>
                              <div class="toast-body me-2">
                                Hello, world! This is a toast message.
                              </div>
                              <button type="button" class="btn-close ms-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                            </div>
                          </div>
                          <div class="toast border-secondary fade show mb-3" role="alert" aria-live="assertive" aria-atomic="true">
                            <div class="d-flex">
                              <i class="fi-clock text-secondary fs-base mt-1 me-2"></i>
                              <div class="toast-body me-2">
                                Hello, world! This is a toast message.
                              </div>
                              <button type="button" class="btn-close ms-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                            </div>
                          </div>
                          <div class="toast border-success fade show mb-3" role="alert" aria-live="assertive" aria-atomic="true">
                            <div class="d-flex">
                              <i class="fi-check-circle text-success fs-base mt-1 me-2"></i>
                              <div class="toast-body me-2">
                                Hello, world! This is a toast message.
                              </div>
                              <button type="button" class="btn-close ms-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                            </div>
                          </div>
                          <div class="toast border-danger fade show mb-3" role="alert" aria-live="assertive" aria-atomic="true">
                            <div class="d-flex">
                              <i class="fi-banned text-danger fs-base mt-1 me-2"></i>
                              <div class="toast-body me-2">
                                Hello, world! This is a toast message.
                              </div>
                              <button type="button" class="btn-close ms-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                            </div>
                          </div>
                          <div class="toast border-warning fade show mb-3" role="alert" aria-live="assertive" aria-atomic="true">
                            <div class="d-flex">
                              <i class="fi-alert-triangle text-warning fs-base mt-1 me-2"></i>
                              <div class="toast-body me-2">
                                Hello, world! This is a toast message.
                              </div>
                              <button type="button" class="btn-close ms-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                            </div>
                          </div>
                          <div class="toast border-info fade show mb-3" role="alert" aria-live="assertive" aria-atomic="true">
                            <div class="d-flex">
                              <i class="fi-info text-info fs-base mt-1 me-2"></i>
                              <div class="toast-body me-2">
                                Hello, world! This is a toast message.
                              </div>
                              <button type="button" class="btn-close ms-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                            </div>
                          </div>
                          <div class="toast border-dark fade show mb-3" role="alert" aria-live="assertive" aria-atomic="true">
                            <div class="d-flex">
                              <i class="fi-map-pin text-dark fs-base mt-1 me-2 d-none-dark"></i>
                              <i class="fi-map-pin text-light fs-base mt-1 me-2 d-none d-flex-dark"></i>
                              <div class="toast-body me-2">
                                Hello, world! This is a toast message.
                              </div>
                              <button type="button" class="btn-close ms-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div id="html-2" class="tab-pane pt-4 fade" role="tabpanel">
                      <div class="position-relative" data-bs-theme="dark">
                        <button type="button" class="btn btn-sm btn-outline-secondary bg-dark position-absolute top-0 end-0 mt-2 px-2 z-3" data-copy-code="#toasts-tiny-icon-code">
                          <i class="fi-copy fs-sm me-1"></i>
                          Copy
                        </button>
                        <pre id="toasts-tiny-icon-code" class="code-highlight mx-n2 mb-n2"><code class="language-html">&lt;!-- Default tiny toast with icon. Remove .fade and .show classes to make it initially hidden. --&gt;
  &lt;div class=&quot;toast fade show&quot; role=&quot;alert&quot; aria-live=&quot;assertive&quot; aria-atomic=&quot;true&quot;&gt;
    &lt;div class=&quot;d-flex&quot;&gt;
      &lt;i class=&quot;fi-settings fs-base mt-1 me-2&quot;&gt;&lt;/i&gt;
      &lt;div class=&quot;toast-body me-2&quot;&gt;
        Hello, world! This is a toast message.
      &lt;/div&gt;
      &lt;button type=&quot;button&quot; class=&quot;btn-close ms-auto&quot; data-bs-dismiss=&quot;toast&quot; aria-label=&quot;Close&quot;&gt;&lt;/button&gt;
    &lt;/div&gt;
  &lt;/div&gt;

  &lt;!-- Color variations and icons --&gt;

  &lt;!-- Primary background --&gt;
  &lt;div class=&quot;toast text-bg-primary border-0 fade show&quot; role=&quot;alert&quot; aria-live=&quot;assertive&quot; aria-atomic=&quot;true&quot; data-bs-theme=&quot;dark&quot;&gt;
    &lt;div class=&quot;d-flex&quot;&gt;
      &lt;i class=&quot;fi-bell fs-base mt-1 me-2&quot;&gt;&lt;/i&gt;
      &lt;div class=&quot;toast-body me-2&quot;&gt;
        Hello, world! This is a toast message.
      &lt;/div&gt;
      &lt;button type=&quot;button&quot; class=&quot;btn-close ms-auto&quot; data-bs-dismiss=&quot;toast&quot; aria-label=&quot;Close&quot;&gt;&lt;/button&gt;
    &lt;/div&gt;
  &lt;/div&gt;

  &lt;!-- Secondary background --&gt;
  &lt;div class=&quot;toast text-bg-secondary border-0 fade show&quot; role=&quot;alert&quot; aria-live=&quot;assertive&quot; aria-atomic=&quot;true&quot; data-bs-theme=&quot;dark&quot;&gt;
    &lt;div class=&quot;d-flex&quot;&gt;
      &lt;i class=&quot;fi-clock fs-base mt-1 me-2&quot;&gt;&lt;/i&gt;
      &lt;div class=&quot;toast-body me-2&quot;&gt;
        Hello, world! This is a toast message.
      &lt;/div&gt;
      &lt;button type=&quot;button&quot; class=&quot;btn-close ms-auto&quot; data-bs-dismiss=&quot;toast&quot; aria-label=&quot;Close&quot;&gt;&lt;/button&gt;
    &lt;/div&gt;
  &lt;/div&gt;

  &lt;!-- Success background --&gt;
  &lt;div class=&quot;toast text-bg-success border-0 fade show&quot; role=&quot;alert&quot; aria-live=&quot;assertive&quot; aria-atomic=&quot;true&quot; data-bs-theme=&quot;dark&quot;&gt;
    &lt;div class=&quot;d-flex&quot;&gt;
      &lt;i class=&quot;fi-check-circle fs-base mt-1 me-2&quot;&gt;&lt;/i&gt;
      &lt;div class=&quot;toast-body me-2&quot;&gt;
        Hello, world! This is a toast message.
      &lt;/div&gt;
      &lt;button type=&quot;button&quot; class=&quot;btn-close ms-auto&quot; data-bs-dismiss=&quot;toast&quot; aria-label=&quot;Close&quot;&gt;&lt;/button&gt;
    &lt;/div&gt;
  &lt;/div&gt;

  &lt;!-- Danger background --&gt;
  &lt;div class=&quot;toast text-bg-danger border-0 fade show&quot; role=&quot;alert&quot; aria-live=&quot;assertive&quot; aria-atomic=&quot;true&quot; data-bs-theme=&quot;dark&quot;&gt;
    &lt;div class=&quot;d-flex&quot;&gt;
      &lt;i class=&quot;fi-banned fs-base mt-1 me-2&quot;&gt;&lt;/i&gt;
      &lt;div class=&quot;toast-body me-2&quot;&gt;
        Hello, world! This is a toast message.
      &lt;/div&gt;
      &lt;button type=&quot;button&quot; class=&quot;btn-close ms-auto&quot; data-bs-dismiss=&quot;toast&quot; aria-label=&quot;Close&quot;&gt;&lt;/button&gt;
    &lt;/div&gt;
  &lt;/div&gt;

  &lt;!-- Warning background --&gt;
  &lt;div class=&quot;toast text-bg-warning border-0 fade show&quot; role=&quot;alert&quot; aria-live=&quot;assertive&quot; aria-atomic=&quot;true&quot; data-bs-theme=&quot;dark&quot;&gt;
    &lt;div class=&quot;d-flex&quot;&gt;
      &lt;i class=&quot;fi-alert-triangle fs-base mt-1 me-2&quot;&gt;&lt;/i&gt;
      &lt;div class=&quot;toast-body me-2&quot;&gt;
        Hello, world! This is a toast message.
      &lt;/div&gt;
      &lt;button type=&quot;button&quot; class=&quot;btn-close ms-auto&quot; data-bs-dismiss=&quot;toast&quot; aria-label=&quot;Close&quot;&gt;&lt;/button&gt;
    &lt;/div&gt;
  &lt;/div&gt;

  &lt;!-- Info background --&gt;
  &lt;div class=&quot;toast text-bg-info border-0 fade show&quot; role=&quot;alert&quot; aria-live=&quot;assertive&quot; aria-atomic=&quot;true&quot; data-bs-theme=&quot;dark&quot;&gt;
    &lt;div class=&quot;d-flex&quot;&gt;
      &lt;i class=&quot;fi-info fs-base mt-1 me-2&quot;&gt;&lt;/i&gt;
      &lt;div class=&quot;toast-body me-2&quot;&gt;
        Hello, world! This is a toast message.
      &lt;/div&gt;
      &lt;button type=&quot;button&quot; class=&quot;btn-close ms-auto&quot; data-bs-dismiss=&quot;toast&quot; aria-label=&quot;Close&quot;&gt;&lt;/button&gt;
    &lt;/div&gt;
  &lt;/div&gt;

  &lt;!-- Light background --&gt;
  &lt;div class=&quot;toast text-bg-light border-0 fade show&quot; role=&quot;alert&quot; aria-live=&quot;assertive&quot; aria-atomic=&quot;true&quot; data-bs-theme=&quot;light&quot;&gt;
    &lt;div class=&quot;d-flex&quot;&gt;
      &lt;i class=&quot;fi-unlock fs-base mt-1 me-2&quot;&gt;&lt;/i&gt;
      &lt;div class=&quot;toast-body me-2&quot;&gt;
        Hello, world! This is a toast message.
      &lt;/div&gt;
      &lt;button type=&quot;button&quot; class=&quot;btn btn-sm fs-base opacity-75 border-0 p-0 ms-auto&quot; data-bs-dismiss=&quot;toast&quot; aria-label=&quot;Close&quot;&gt;
        &lt;i class=&quot;fi-close&quot;&gt;&lt;/i&gt;
      &lt;/button&gt;
    &lt;/div&gt;
  &lt;/div&gt;

  &lt;!-- Dark background --&gt;
  &lt;div class=&quot;toast text-bg-dark border-0 fade show&quot; role=&quot;alert&quot; aria-live=&quot;assertive&quot; aria-atomic=&quot;true&quot; data-bs-theme=&quot;dark&quot;&gt;
    &lt;div class=&quot;d-flex&quot;&gt;
      &lt;i class=&quot;fi-map-pin fs-base mt-1 me-2&quot;&gt;&lt;/i&gt;
      &lt;div class=&quot;toast-body me-2&quot;&gt;
        Hello, world! This is a toast message.
      &lt;/div&gt;
      &lt;button type=&quot;button&quot; class=&quot;btn-close ms-auto&quot; data-bs-dismiss=&quot;toast&quot; aria-label=&quot;Close&quot;&gt;&lt;/button&gt;
    &lt;/div&gt;
  &lt;/div&gt;

  &lt;!-- Primary border --&gt;
  &lt;div class=&quot;toast border-primary fade show&quot; role=&quot;alert&quot; aria-live=&quot;assertive&quot; aria-atomic=&quot;true&quot;&gt;
    &lt;div class=&quot;d-flex&quot;&gt;
      &lt;i class=&quot;fi-bell text-primary fs-base mt-1 me-2&quot;&gt;&lt;/i&gt;
      &lt;div class=&quot;toast-body me-2&quot;&gt;
        Hello, world! This is a toast message.
      &lt;/div&gt;
      &lt;button type=&quot;button&quot; class=&quot;btn-close ms-auto&quot; data-bs-dismiss=&quot;toast&quot; aria-label=&quot;Close&quot;&gt;&lt;/button&gt;
    &lt;/div&gt;
  &lt;/div&gt;

  &lt;!-- Secondary border --&gt;
  &lt;div class=&quot;toast border-secondary fade show&quot; role=&quot;alert&quot; aria-live=&quot;assertive&quot; aria-atomic=&quot;true&quot;&gt;
    &lt;div class=&quot;d-flex&quot;&gt;
      &lt;i class=&quot;fi-clock text-secondary fs-base mt-1 me-2&quot;&gt;&lt;/i&gt;
      &lt;div class=&quot;toast-body me-2&quot;&gt;
        Hello, world! This is a toast message.
      &lt;/div&gt;
      &lt;button type=&quot;button&quot; class=&quot;btn-close ms-auto&quot; data-bs-dismiss=&quot;toast&quot; aria-label=&quot;Close&quot;&gt;&lt;/button&gt;
    &lt;/div&gt;
  &lt;/div&gt;

  &lt;!-- Success border --&gt;
  &lt;div class=&quot;toast border-success fade show&quot; role=&quot;alert&quot; aria-live=&quot;assertive&quot; aria-atomic=&quot;true&quot;&gt;
    &lt;div class=&quot;d-flex&quot;&gt;
      &lt;i class=&quot;fi-check-circle text-success fs-base mt-1 me-2&quot;&gt;&lt;/i&gt;
      &lt;div class=&quot;toast-body me-2&quot;&gt;
        Hello, world! This is a toast message.
      &lt;/div&gt;
      &lt;button type=&quot;button&quot; class=&quot;btn-close ms-auto&quot; data-bs-dismiss=&quot;toast&quot; aria-label=&quot;Close&quot;&gt;&lt;/button&gt;
    &lt;/div&gt;
  &lt;/div&gt;

  &lt;!-- Danger border --&gt;
  &lt;div class=&quot;toast border-danger fade show&quot; role=&quot;alert&quot; aria-live=&quot;assertive&quot; aria-atomic=&quot;true&quot;&gt;
    &lt;div class=&quot;d-flex&quot;&gt;
      &lt;i class=&quot;fi-banned text-danger fs-base mt-1 me-2&quot;&gt;&lt;/i&gt;
      &lt;div class=&quot;toast-body me-2&quot;&gt;
        Hello, world! This is a toast message.
      &lt;/div&gt;
      &lt;button type=&quot;button&quot; class=&quot;btn-close ms-auto&quot; data-bs-dismiss=&quot;toast&quot; aria-label=&quot;Close&quot;&gt;&lt;/button&gt;
    &lt;/div&gt;
  &lt;/div&gt;

  &lt;!-- Warning border --&gt;
  &lt;div class=&quot;toast border-warning fade show&quot; role=&quot;alert&quot; aria-live=&quot;assertive&quot; aria-atomic=&quot;true&quot;&gt;
    &lt;div class=&quot;d-flex&quot;&gt;
      &lt;i class=&quot;fi-alert-triangle text-warning fs-base mt-1 me-2&quot;&gt;&lt;/i&gt;
      &lt;div class=&quot;toast-body me-2&quot;&gt;
        Hello, world! This is a toast message.
      &lt;/div&gt;
      &lt;button type=&quot;button&quot; class=&quot;btn-close ms-auto&quot; data-bs-dismiss=&quot;toast&quot; aria-label=&quot;Close&quot;&gt;&lt;/button&gt;
    &lt;/div&gt;
  &lt;/div&gt;

  &lt;!-- Info border --&gt;
  &lt;div class=&quot;toast border-info fade show&quot; role=&quot;alert&quot; aria-live=&quot;assertive&quot; aria-atomic=&quot;true&quot;&gt;
    &lt;div class=&quot;d-flex&quot;&gt;
      &lt;i class=&quot;fi-info text-info fs-base mt-1 me-2&quot;&gt;&lt;/i&gt;
      &lt;div class=&quot;toast-body me-2&quot;&gt;
        Hello, world! This is a toast message.
      &lt;/div&gt;
      &lt;button type=&quot;button&quot; class=&quot;btn-close ms-auto&quot; data-bs-dismiss=&quot;toast&quot; aria-label=&quot;Close&quot;&gt;&lt;/button&gt;
    &lt;/div&gt;
  &lt;/div&gt;

  &lt;!-- Dark border --&gt;
  &lt;div class=&quot;toast border-dark fade show&quot; role=&quot;alert&quot; aria-live=&quot;assertive&quot; aria-atomic=&quot;true&quot;&gt;
    &lt;div class=&quot;d-flex&quot;&gt;
      &lt;i class=&quot;fi-map-pin text-dark fs-base mt-1 me-2 d-none-dark&quot;&gt;&lt;/i&gt;
      &lt;i class=&quot;fi-map-pin text-light fs-base mt-1 me-2 d-none d-flex-dark&quot;&gt;&lt;/i&gt;
      &lt;div class=&quot;toast-body me-2&quot;&gt;
        Hello, world! This is a toast message.
      &lt;/div&gt;
      &lt;button type=&quot;button&quot; class=&quot;btn-close ms-auto&quot; data-bs-dismiss=&quot;toast&quot; aria-label=&quot;Close&quot;&gt;&lt;/button&gt;
    &lt;/div&gt;
  &lt;/div&gt;</code></pre>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </section>


            <!-- With header and icon -->
            <section id="toasts-header-icon" class="docs-section pb-sm-2 mb-5">
              <h4>With header and icon</h4>
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
                      <div class="row g-md-5">
                        <div class="col-sm-6 col-xl-5">
                          <div class="toast fade show mb-3" role="alert" aria-live="assertive" aria-atomic="true">
                            <div class="toast-header">
                              <i class="fi-settings text-body-secondary fs-base me-2"></i>
                              <span class="fw-semibold">Default toast</span>
                              <button type="button" class="btn-close ms-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                            </div>
                            <div class="toast-body me-2">
                              Hello, world! This is a toast message.
                            </div>
                          </div>
                          <div class="toast border-primary fade show mb-3" role="alert" aria-live="assertive" aria-atomic="true">
                            <div class="toast-header">
                              <i class="fi-bell text-primary fs-base me-2"></i>
                              <span class="fw-semibold">Primary toast</span>
                              <button type="button" class="btn-close ms-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                            </div>
                            <div class="toast-body me-2">
                              Hello, world! This is a toast message.
                            </div>
                          </div>
                          <div class="toast border-secondary fade show mb-3" role="alert" aria-live="assertive" aria-atomic="true">
                            <div class="toast-header">
                              <i class="fi-clock text-secondary fs-base me-2"></i>
                              <span class="fw-semibold">Secondary toast</span>
                              <button type="button" class="btn-close ms-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                            </div>
                            <div class="toast-body me-2">
                              Hello, world! This is a toast message.
                            </div>
                          </div>
                          <div class="toast border-success fade show mb-3" role="alert" aria-live="assertive" aria-atomic="true">
                            <div class="toast-header">
                              <i class="fi-check-circle text-success fs-base me-2"></i>
                              <span class="fw-semibold">Success toast</span>
                              <button type="button" class="btn-close ms-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                            </div>
                            <div class="toast-body me-2">
                              Hello, world! This is a toast message.
                            </div>
                          </div>
                          <div class="toast border-danger fade show mb-3" role="alert" aria-live="assertive" aria-atomic="true">
                            <div class="toast-header">
                              <i class="fi-banned text-danger fs-base me-2"></i>
                              <span class="fw-semibold">Danger toast</span>
                              <button type="button" class="btn-close ms-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                            </div>
                            <div class="toast-body me-2">
                              Hello, world! This is a toast message.
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-6 col-xl-5">
                          <div class="toast border-warning fade show mb-3" role="alert" aria-live="assertive" aria-atomic="true">
                            <div class="toast-header">
                              <i class="fi-alert-triangle text-warning fs-base me-2"></i>
                              <span class="fw-semibold">Warning toast</span>
                              <button type="button" class="btn-close ms-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                            </div>
                            <div class="toast-body me-2">
                              Hello, world! This is a toast message.
                            </div>
                          </div>
                          <div class="toast border-info fade show mb-3" role="alert" aria-live="assertive" aria-atomic="true">
                            <div class="toast-header">
                              <i class="fi-info text-info fs-base me-2"></i>
                              <span class="fw-semibold">Info toast</span>
                              <button type="button" class="btn-close ms-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                            </div>
                            <div class="toast-body me-2">
                              Hello, world! This is a toast message.
                            </div>
                          </div>
                          <div class="toast text-bg-light border-0 fade show mb-3" role="alert" aria-live="assertive" aria-atomic="true" data-bs-theme="light">
                            <div class="toast-header text-dark">
                              <i class="fi-unlock fs-base me-2"></i>
                              <span class="fw-semibold">Light toast</span>
                              <button type="button" class="btn btn-sm fs-base opacity-75 border-0 p-0 ms-auto" data-bs-dismiss="toast" aria-label="Close">
                                <i class="fi-close"></i>
                              </button>
                            </div>
                            <div class="toast-body text-body me-2">
                              Hello, world! This is a toast message.
                            </div>
                          </div>
                          <div class="toast border-dark fade show mb-3" role="alert" aria-live="assertive" aria-atomic="true">
                            <div class="toast-header">
                              <i class="fi-map-pin text-dark fs-base me-2 d-none-dark"></i>
                              <i class="fi-map-pin text-light fs-base me-2 d-none d-flex-dark"></i>
                              <span class="fw-semibold">Dark toast</span>
                              <button type="button" class="btn-close ms-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                            </div>
                            <div class="toast-body me-2">
                              Hello, world! This is a toast message.
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div id="html-3" class="tab-pane pt-4 fade" role="tabpanel">
                      <div class="position-relative" data-bs-theme="dark">
                        <button type="button" class="btn btn-sm btn-outline-secondary bg-dark position-absolute top-0 end-0 mt-2 px-2 z-3" data-copy-code="#toasts-header-icon-code">
                          <i class="fi-copy fs-sm me-1"></i>
                          Copy
                        </button>
                        <pre id="toasts-header-icon-code" class="code-highlight mx-n2 mb-n2"><code class="language-html">&lt;!-- Default toast. Remove .fade and .show classes to make it initially hidden. --&gt;
  &lt;div class=&quot;toast fade show&quot; role=&quot;alert&quot; aria-live=&quot;assertive&quot; aria-atomic=&quot;true&quot;&gt;
    &lt;div class=&quot;toast-header&quot;&gt;
      &lt;i class=&quot;fi-settings text-body-secondary fs-base me-2&quot;&gt;&lt;/i&gt;
      &lt;span class=&quot;fw-semibold&quot;&gt;Default toast&lt;/span&gt;
      &lt;button type=&quot;button&quot; class=&quot;btn-close ms-auto&quot; data-bs-dismiss=&quot;toast&quot; aria-label=&quot;Close&quot;&gt;&lt;/button&gt;
    &lt;/div&gt;
    &lt;div class=&quot;toast-body me-2&quot;&gt;
      Hello, world! This is a toast message.
    &lt;/div&gt;
  &lt;/div&gt;

  &lt;!-- Primary toast --&gt;
  &lt;div class=&quot;toast border-primary fade show&quot; role=&quot;alert&quot; aria-live=&quot;assertive&quot; aria-atomic=&quot;true&quot;&gt;
    &lt;div class=&quot;toast-header&quot;&gt;
      &lt;i class=&quot;fi-bell text-primary fs-base me-2&quot;&gt;&lt;/i&gt;
      &lt;span class=&quot;fw-semibold&quot;&gt;Primary toast&lt;/span&gt;
      &lt;button type=&quot;button&quot; class=&quot;btn-close ms-auto&quot; data-bs-dismiss=&quot;toast&quot; aria-label=&quot;Close&quot;&gt;&lt;/button&gt;
    &lt;/div&gt;
    &lt;div class=&quot;toast-body me-2&quot;&gt;
      Hello, world! This is a toast message.
    &lt;/div&gt;
  &lt;/div&gt;

  &lt;!-- Secondary toast --&gt;
  &lt;div class=&quot;toast border-secondary fade show&quot; role=&quot;alert&quot; aria-live=&quot;assertive&quot; aria-atomic=&quot;true&quot;&gt;
    &lt;div class=&quot;toast-header&quot;&gt;
      &lt;i class=&quot;fi-clock text-secondary fs-base me-2&quot;&gt;&lt;/i&gt;
      &lt;span class=&quot;fw-semibold&quot;&gt;Secondary toast&lt;/span&gt;
      &lt;button type=&quot;button&quot; class=&quot;btn-close ms-auto&quot; data-bs-dismiss=&quot;toast&quot; aria-label=&quot;Close&quot;&gt;&lt;/button&gt;
    &lt;/div&gt;
    &lt;div class=&quot;toast-body me-2&quot;&gt;
      Hello, world! This is a toast message.
    &lt;/div&gt;
  &lt;/div&gt;

  &lt;!-- Success toast --&gt;
  &lt;div class=&quot;toast border-success fade show&quot; role=&quot;alert&quot; aria-live=&quot;assertive&quot; aria-atomic=&quot;true&quot;&gt;
    &lt;div class=&quot;toast-header&quot;&gt;
      &lt;i class=&quot;fi-check-circle text-success fs-base me-2&quot;&gt;&lt;/i&gt;
      &lt;span class=&quot;fw-semibold&quot;&gt;Success toast&lt;/span&gt;
      &lt;button type=&quot;button&quot; class=&quot;btn-close ms-auto&quot; data-bs-dismiss=&quot;toast&quot; aria-label=&quot;Close&quot;&gt;&lt;/button&gt;
    &lt;/div&gt;
    &lt;div class=&quot;toast-body me-2&quot;&gt;
      Hello, world! This is a toast message.
    &lt;/div&gt;
  &lt;/div&gt;

  &lt;!-- Danger toast --&gt;
  &lt;div class=&quot;toast border-danger fade show&quot; role=&quot;alert&quot; aria-live=&quot;assertive&quot; aria-atomic=&quot;true&quot;&gt;
    &lt;div class=&quot;toast-header&quot;&gt;
      &lt;i class=&quot;fi-banned text-danger fs-base me-2&quot;&gt;&lt;/i&gt;
      &lt;span class=&quot;fw-semibold&quot;&gt;Danger toast&lt;/span&gt;
      &lt;button type=&quot;button&quot; class=&quot;btn-close ms-auto&quot; data-bs-dismiss=&quot;toast&quot; aria-label=&quot;Close&quot;&gt;&lt;/button&gt;
    &lt;/div&gt;
    &lt;div class=&quot;toast-body me-2&quot;&gt;
      Hello, world! This is a toast message.
    &lt;/div&gt;
  &lt;/div&gt;

  &lt;!-- Warning toast --&gt;
  &lt;div class=&quot;toast border-warning fade show&quot; role=&quot;alert&quot; aria-live=&quot;assertive&quot; aria-atomic=&quot;true&quot;&gt;
    &lt;div class=&quot;toast-header&quot;&gt;
      &lt;i class=&quot;fi-alert-triangle text-warning fs-base me-2&quot;&gt;&lt;/i&gt;
      &lt;span class=&quot;fw-semibold&quot;&gt;Warning toast&lt;/span&gt;
      &lt;button type=&quot;button&quot; class=&quot;btn-close ms-auto&quot; data-bs-dismiss=&quot;toast&quot; aria-label=&quot;Close&quot;&gt;&lt;/button&gt;
    &lt;/div&gt;
    &lt;div class=&quot;toast-body me-2&quot;&gt;
      Hello, world! This is a toast message.
    &lt;/div&gt;
  &lt;/div&gt;

  &lt;!-- Info toast --&gt;
  &lt;div class=&quot;toast border-info fade show&quot; role=&quot;alert&quot; aria-live=&quot;assertive&quot; aria-atomic=&quot;true&quot;&gt;
    &lt;div class=&quot;toast-header&quot;&gt;
      &lt;i class=&quot;fi-info text-info fs-base me-2&quot;&gt;&lt;/i&gt;
      &lt;span class=&quot;fw-semibold&quot;&gt;Info toast&lt;/span&gt;
      &lt;button type=&quot;button&quot; class=&quot;btn-close ms-auto&quot; data-bs-dismiss=&quot;toast&quot; aria-label=&quot;Close&quot;&gt;&lt;/button&gt;
    &lt;/div&gt;
    &lt;div class=&quot;toast-body me-2&quot;&gt;
      Hello, world! This is a toast message.
    &lt;/div&gt;
  &lt;/div&gt;

  &lt;!-- Light toast --&gt;
  &lt;div class=&quot;toast text-bg-light border-0 fade show&quot; role=&quot;alert&quot; aria-live=&quot;assertive&quot; aria-atomic=&quot;true&quot; data-bs-theme=&quot;light&quot;&gt;
    &lt;div class=&quot;toast-header text-dark&quot;&gt;
      &lt;i class=&quot;fi-unlock fs-base me-2&quot;&gt;&lt;/i&gt;
      &lt;span class=&quot;fw-semibold&quot;&gt;Light toast&lt;/span&gt;
      &lt;button type=&quot;button&quot; class=&quot;btn btn-sm fs-base opacity-75 border-0 p-0 ms-auto&quot; data-bs-dismiss=&quot;toast&quot; aria-label=&quot;Close&quot;&gt;
        &lt;i class=&quot;fi-close&quot;&gt;&lt;/i&gt;
      &lt;/button&gt;
    &lt;/div&gt;
    &lt;div class=&quot;toast-body text-body me-2&quot;&gt;
      Hello, world! This is a toast message.
    &lt;/div&gt;
  &lt;/div&gt;

  &lt;!-- Dark toast --&gt;
  &lt;div class=&quot;toast border-dark fade show&quot; role=&quot;alert&quot; aria-live=&quot;assertive&quot; aria-atomic=&quot;true&quot;&gt;
    &lt;div class=&quot;toast-header&quot;&gt;
      &lt;i class=&quot;fi-map-pin text-dark fs-base me-2 d-none-dark&quot;&gt;&lt;/i&gt;
      &lt;i class=&quot;fi-map-pin text-light fs-base me-2 d-none d-flex-dark&quot;&gt;&lt;/i&gt;
      &lt;span class=&quot;fw-semibold&quot;&gt;Dark toast&lt;/span&gt;
      &lt;button type=&quot;button&quot; class=&quot;btn-close ms-auto&quot; data-bs-dismiss=&quot;toast&quot; aria-label=&quot;Close&quot;&gt;&lt;/button&gt;
    &lt;/div&gt;
    &lt;div class=&quot;toast-body me-2&quot;&gt;
      Hello, world! This is a toast message.
    &lt;/div&gt;
  &lt;/div&gt;</code></pre>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </section>


            <!-- Action buttons -->
            <section id="toasts-buttons" class="docs-section pb-sm-2 mb-5">
              <h4>Action buttons</h4>
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
                      <div class="toast fade show" role="alert" aria-live="assertive" aria-atomic="true">
                        <div class="toast-header">
                          <i class="fi-bell text-primary fs-base mt-1 me-2"></i>
                          <span class="fw-semibold">Notification center</span>
                          <small class="text-body-secondary ms-auto">2 seconds ago</small>
                        </div>
                        <div class="toast-body me-2">
                          You have 10 unread messages.
                        </div>
                        <div class="d-flex pt-3">
                          <button type="button" class="btn btn-sm btn-primary me-2">Read all</button>
                          <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="toast">Close</button>
                        </div>
                      </div>
                    </div>
                    <div id="html-4" class="tab-pane pt-4 fade" role="tabpanel">
                      <div class="position-relative" data-bs-theme="dark">
                        <button type="button" class="btn btn-sm btn-outline-secondary bg-dark position-absolute top-0 end-0 mt-2 px-2 z-3" data-copy-code="#toasts-buttons-code">
                          <i class="fi-copy fs-sm me-1"></i>
                          Copy
                        </button>
                        <pre id="toasts-buttons-code" class="code-highlight mx-n2 mb-n2"><code class="language-html">&lt;!-- Toast with action buttons --&gt;
  &lt;div class=&quot;toast fade show&quot; role=&quot;alert&quot; aria-live=&quot;assertive&quot; aria-atomic=&quot;true&quot;&gt;
    &lt;div class=&quot;toast-header&quot;&gt;
      &lt;i class=&quot;fi-bell text-primary fs-base mt-1 me-2&quot;&gt;&lt;/i&gt;
      &lt;span class=&quot;fw-semibold&quot;&gt;Notification center&lt;/span&gt;
      &lt;small class=&quot;text-body-secondary ms-auto&quot;&gt;2 seconds ago&lt;/small&gt;
    &lt;/div&gt;
    &lt;div class=&quot;toast-body me-2&quot;&gt;
      You have 10 unread messages.
    &lt;/div&gt;
    &lt;div class=&quot;d-flex pt-3&quot;&gt;
      &lt;button type=&quot;button&quot; class=&quot;btn btn-sm btn-primary me-2&quot;&gt;Read all&lt;/button&gt;
      &lt;button type=&quot;button&quot; class=&quot;btn btn-sm btn-secondary&quot; data-bs-dismiss=&quot;toast&quot;&gt;Close&lt;/button&gt;
    &lt;/div&gt;
  &lt;/div&gt;</code></pre>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </section>


            <!-- Placement -->
            <section id="toasts-placement" class="docs-section pb-sm-2 mb-5">
              <h4>Placement</h4>
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
                      <form>
                        <div class="mb-3">
                          <label class="form-label" for="selectToastPlacement">Toast placement</label>
                          <select class="form-select" id="selectToastPlacement" style="max-width: 300px">
                            <option value="" selected>Select a position...</option>
                            <option value="top-0 start-0">Top left</option>
                            <option value="top-0 start-50 translate-middle-x">Top center</option>
                            <option value="top-0 end-0">Top right</option>
                            <option value="top-50 start-0 translate-middle-y">Middle left</option>
                            <option value="top-50 start-50 translate-middle">Middle center</option>
                            <option value="top-50 end-0 translate-middle-y">Middle right</option>
                            <option value="bottom-0 start-0">Bottom left</option>
                            <option value="bottom-0 start-50 translate-middle-x">Bottom center</option>
                            <option value="bottom-0 end-0">Bottom right</option>
                          </select>
                        </div>
                      </form>
                      <div aria-live="polite" aria-atomic="true" class="position-relative bg-dotted rounded" style="height: 240px">
                        <div class="toast-container p-3" id="toastPlacement">
                          <div class="toast fade show">
                            <div class="toast-header">
                              <i class="fi-bell fs-base mt-1 me-2"></i>
                              <strong class="me-auto">Toast title</strong>
                              <small class="text-body-secondary">11 mins ago</small>
                            </div>
                            <div class="toast-body">
                              Hello, world! This is a toast message.
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div id="html-5" class="tab-pane pt-4 fade" role="tabpanel">
                      <div class="position-relative" data-bs-theme="dark">
                        <button type="button" class="btn btn-sm btn-outline-secondary bg-dark position-absolute top-0 end-0 mt-2 px-2 z-3" data-copy-code="#toasts-placement-code">
                          <i class="fi-copy fs-sm me-1"></i>
                          Copy
                        </button>
                        <pre id="toasts-placement-code" class="code-highlight mx-n2 mb-n2"><code class="language-html">&lt;!-- Top left --&gt;
  &lt;div class=&quot;toast-container p-3 top-0 start-0&quot;&gt;
    &lt;div class=&quot;toast&quot;&gt;...&lt;/div&gt;
  &lt;/div&gt;

  &lt;!-- Top center --&gt;
  &lt;div class=&quot;toast-container p-3 top-0 start-50 translate-middle-x&quot;&gt;
    &lt;div class=&quot;toast&quot;&gt;...&lt;/div&gt;
  &lt;/div&gt;

  &lt;!-- Top right --&gt;
  &lt;div class=&quot;toast-container p-3 top-0 end-0&quot;&gt;
    &lt;div class=&quot;toast&quot;&gt;...&lt;/div&gt;
  &lt;/div&gt;

  &lt;!-- Middle left --&gt;
  &lt;div class=&quot;toast-container p-3 top-50 start-0 translate-middle-y&quot;&gt;
    &lt;div class=&quot;toast&quot;&gt;...&lt;/div&gt;
  &lt;/div&gt;

  &lt;!-- Middle center --&gt;
  &lt;div class=&quot;toast-container p-3 top-50 start-50 translate-middle&quot;&gt;
    &lt;div class=&quot;toast&quot;&gt;...&lt;/div&gt;
  &lt;/div&gt;

  &lt;!-- Middle right --&gt;
  &lt;div class=&quot;toast-container p-3 top-50 end-0 translate-middle-y&quot;&gt;
    &lt;div class=&quot;toast&quot;&gt;...&lt;/div&gt;
  &lt;/div&gt;

  &lt;!-- Bottom left --&gt;
  &lt;div class=&quot;toast-container p-3 bottom-0 start-0&quot;&gt;
    &lt;div class=&quot;toast&quot;&gt;...&lt;/div&gt;
  &lt;/div&gt;

  &lt;!-- Bottom center --&gt;
  &lt;div class=&quot;toast-container p-3 bottom-0 start-50 translate-middle-x&quot;&gt;
    &lt;div class=&quot;toast&quot;&gt;...&lt;/div&gt;
  &lt;/div&gt;

  &lt;!-- Bottom right --&gt;
  &lt;div class=&quot;toast-container p-3 bottom-0 end-0&quot;&gt;
    &lt;div class=&quot;toast&quot;&gt;...&lt;/div&gt;
  &lt;/div&gt;</code></pre>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </section>


            <!-- Live demo -->
            <section id="toasts-live" class="docs-section">
              <h4>Live demo</h4>
              <div class="card border-0 shadow">
                <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
                <div class="card-body position-relative z-2">
                  <ul class="nav nav-tabs m-n2" role="tablist" style="max-width: 320px">
                    <li class="nav-item" role="presentation">
                      <button type="button" class="nav-link px-3 active" data-bs-toggle="tab" data-bs-target="#preview-6" role="tab" aria-controls="preview-6" aria-selected="true">
                        <i class="fi-eye opacity-75 ms-n1 me-2"></i>
                        Preview
                      </button>
                    </li>
                    <li class="nav-item" role="presentation">
                      <button type="button" class="nav-link px-3" data-bs-toggle="tab" data-bs-target="#html-6" role="tab" aria-controls="html-6" aria-selected="false">
                        <i class="fi-code opacity-75 ms-n1 me-2"></i>
                        HTML
                      </button>
                    </li>
                    <li class="nav-item" role="presentation">
                      <button type="button" class="nav-link px-3" data-bs-toggle="tab" data-bs-target="#js-6" role="tab" aria-controls="js-6" aria-selected="false">
                        <span class=" fs-xsfw-medium opacity-75 ms-n1 me-2">{..}</span>
                        JS
                      </button>
                    </li>
                  </ul>
                  <div class="tab-content">
                    <div id="preview-6" class="tab-pane pt-4 pb-2 mt-3 fade show active" role="tabpanel">
                      <button type="button" class="btn btn-primary" id="liveToastBtn">Show live toast</button>
                      <div class="toast-container position-fixed bottom-0 end-0 p-3">
                        <div class="toast border-primary" id="liveToast" role="alert" aria-live="assertive" aria-atomic="true">
                          <div class="toast-header">
                            <i class="fi-bell text-primary fs-base mt-1 me-2"></i>
                            <strong class="me-auto">Toast title</strong>
                            <small class="text-body-secondary">5 mins ago</small>
                            <button type="button" class="btn-close ms-2" data-bs-dismiss="toast" aria-label="Close"></button>
                          </div>
                          <div class="toast-body">
                            Hello, world! This is a toast message.
                          </div>
                        </div>
                      </div>
                    </div>
                    <div id="html-6" class="tab-pane pt-4 fade" role="tabpanel">
                      <div class="position-relative" data-bs-theme="dark">
                        <button type="button" class="btn btn-sm btn-outline-secondary bg-dark position-absolute top-0 end-0 mt-2 px-2 z-3" data-copy-code="#toasts-live-code">
                          <i class="fi-copy fs-sm me-1"></i>
                          Copy
                        </button>
                        <pre id="toasts-live-code" class="code-highlight mx-n2 mb-n2"><code class="language-html">&lt;!-- Trigger button --&gt;
  &lt;button type=&quot;button&quot; class=&quot;btn btn-primary&quot; id=&quot;liveToastBtn&quot;&gt;Show live toast&lt;/button&gt;

  &lt;!-- Toast inside fixed positioned container --&gt;
  &lt;div class=&quot;toast-container position-fixed bottom-0 end-0 p-3&quot;&gt;
    &lt;div class=&quot;toast border-primary&quot; id=&quot;liveToast&quot; role=&quot;alert&quot; aria-live=&quot;assertive&quot; aria-atomic=&quot;true&quot;&gt;
      &lt;div class=&quot;toast-header&quot;&gt;
        &lt;i class=&quot;fi-bell text-primary fs-base mt-1 me-2&quot;&gt;&lt;/i&gt;
        &lt;strong class=&quot;me-auto&quot;&gt;Toast title&lt;/strong&gt;
        &lt;small class=&quot;text-body-secondary&quot;&gt;5 mins ago&lt;/small&gt;
        &lt;button type=&quot;button&quot; class=&quot;btn-close ms-2&quot; data-bs-dismiss=&quot;toast&quot; aria-label=&quot;Close&quot;&gt;&lt;/button&gt;
      &lt;/div&gt;
      &lt;div class=&quot;toast-body&quot;&gt;
        Hello, world! This is a toast message.
      &lt;/div&gt;
    &lt;/div&gt;
  &lt;/div&gt;</code></pre>
                      </div>
                    </div>
                    <div id="js-6" class="tab-pane pt-4 fade" role="tabpanel">
                      <div class="position-relative" data-bs-theme="dark">
                        <button type="button" class="btn btn-sm btn-outline-secondary bg-dark position-absolute top-0 end-0 mt-2 px-2 z-3" data-copy-code="#toasts-live-js-code">
                          <i class="fi-copy fs-sm me-1"></i>
                          Copy
                        </button>
                        <pre id="toasts-live-js-code" class="code-highlight mx-n2 mb-n2"><code class="language-javascript">(() =&gt; {
    'use strict'

    const toastTrigger = document.getElementById('liveToastBtn')
    const toastLiveExample = document.getElementById('liveToast')

    if (toastTrigger) {
      const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLiveExample)
      toastTrigger.addEventListener('click', () =&gt; {
        toastBootstrap.show()
      })
    }
  })()</code></pre>
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
            <rect x=".75" y=".75" width="60.5" height="30.5" rx="15.25" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10"/>
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