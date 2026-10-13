@extends('layouts.app')

@section('title', 'Finder Docs | List group')

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
                  <div class="dropdown">
                    <span class="list-group-item list-group-item-action justify-content-between dropdown-toggle pe-3 pe-none active">
                      List group
                      <span class="visually-hidden">navigation links menu ordered unordered</span>
                    </span>
                    <ul id="anchorNav" class="nav nav-underline flex-column border-start ms-2 my-2" style="gap: .25rem;">
                      <li class="nav-item"><a class="nav-link fw-normal" href="#list-group-basic">Basic example</a></li>
                      <li class="nav-item"><a class="nav-link fw-normal" href="#list-group-borderless">Borderless</a></li>
                      <li class="nav-item"><a class="nav-link fw-normal" href="#list-group-links">Links or buttons</a></li>
                      <li class="nav-item"><a class="nav-link fw-normal" href="#list-group-flush">Flush</a></li>
                      <li class="nav-item"><a class="nav-link fw-normal" href="#list-group-icons">With icons and badges</a></li>
                      <li class="nav-item"><a class="nav-link fw-normal" href="#list-group-checkboxes">Checkboxes and radios</a></li>
                      <li class="nav-item"><a class="nav-link fw-normal" href="#list-group-numbered">Numbered list group</a></li>
                      <li class="nav-item"><a class="nav-link fw-normal" href="#list-group-horizontal">Horizontal list group</a></li>
                      <li class="nav-item"><a class="nav-link fw-normal" href="#list-group-custom">Custom content</a></li>
                      <li class="nav-item"><a class="nav-link fw-normal" href="#list-group-colors">Color variations</a></li>
                      <li class="nav-item"><a class="nav-link fw-normal" href="#list-group-js">JavaScript behavior</a></li>
                    </ul>
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
          <a class="badge d-inline-flex align-items-center text-info bg-info-subtle fw-semibold text-decoration-none py-2 px-3 mb-2 rounded-pill" href="https://getbootstrap.com/docs/5.3/components/list-group/" target="_blank" rel="noreferrer">
            Bootstrap docs
            <i class="fi-external-link fs-sm ms-1"></i>
          </a>
          <h1 class="pt-1">List group</h1>
          <p class="text-body-secondary mb-4">Flexible component for displaying a series of content.</p>
        </section>


        <!-- Basic example -->
        <section id="list-group-basic" class="docs-section pb-sm-2 mb-5">
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
                  <ul class="list-group" style="max-width: 300px;">
                    <li class="list-group-item">A first item</li>
                    <li class="list-group-item active" aria-current="true">An active item</li>
                    <li class="list-group-item">A third item</li>
                    <li class="list-group-item disabled" aria-disabled="true">A disabled item</li>
                    <li class="list-group-item">And a fifth one</li>
                  </ul>
                </div>
                <div id="html-1" class="tab-pane pt-4 fade" role="tabpanel">
                  <div class="position-relative" data-bs-theme="dark">
                    <button type="button" class="btn btn-sm btn-outline-secondary bg-dark position-absolute top-0 end-0 mt-2 px-2 z-3" data-copy-code="#list-group-basic-code">
                      <i class="fi-copy fs-sm me-1"></i>
                      Copy
                    </button>
                    <pre id="list-group-basic-code" class="code-highlight mx-n2 mb-n2"><code class="language-html">&lt;!-- Basic list group --&gt;
    &lt;ul class=&quot;list-group&quot;&gt;
      &lt;li class=&quot;list-group-item&quot;&gt;A first item&lt;/li&gt;
      &lt;li class=&quot;list-group-item active&quot; aria-current=&quot;true&quot;&gt;An active item&lt;/li&gt;
      &lt;li class=&quot;list-group-item&quot;&gt;A third item&lt;/li&gt;
      &lt;li class=&quot;list-group-item disabled&quot; aria-disabled=&quot;true&quot;&gt;A disabled item&lt;/li&gt;
      &lt;li class=&quot;list-group-item&quot;&gt;And a fifth one&lt;/li&gt;
    &lt;/ul&gt;</code></pre>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>


        <!-- Borderless -->
        <section id="list-group-borderless" class="docs-section pb-sm-2 mb-5">
          <h4>Borderless</h4>
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
                  <ul class="list-group list-group-borderless" style="max-width: 300px;">
                    <li class="list-group-item">A first item</li>
                    <li class="list-group-item active" aria-current="true">An active item</li>
                    <li class="list-group-item">A third item</li>
                    <li class="list-group-item disabled" aria-disabled="true">A disabled item</li>
                    <li class="list-group-item">And a fifth one</li>
                  </ul>
                </div>
                <div id="html-2" class="tab-pane pt-4 fade" role="tabpanel">
                  <div class="position-relative" data-bs-theme="dark">
                    <button type="button" class="btn btn-sm btn-outline-secondary bg-dark position-absolute top-0 end-0 mt-2 px-2 z-3" data-copy-code="#list-group-borderless-code">
                      <i class="fi-copy fs-sm me-1"></i>
                      Copy
                    </button>
                    <pre id="list-group-borderless-code" class="code-highlight mx-n2 mb-n2"><code class="language-html">&lt;!-- Borderless list group --&gt;
    &lt;ul class=&quot;list-group list-group-borderless&quot;&gt;
      &lt;li class=&quot;list-group-item&quot;&gt;A first item&lt;/li&gt;
      &lt;li class=&quot;list-group-item active&quot; aria-current=&quot;true&quot;&gt;An active item&lt;/li&gt;
      &lt;li class=&quot;list-group-item&quot;&gt;A third item&lt;/li&gt;
      &lt;li class=&quot;list-group-item disabled&quot; aria-disabled=&quot;true&quot;&gt;A disabled item&lt;/li&gt;
      &lt;li class=&quot;list-group-item&quot;&gt;And a fifth one&lt;/li&gt;
    &lt;/ul&gt;</code></pre>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>


        <!-- Links or buttons -->
        <section id="list-group-links" class="docs-section pb-sm-2 mb-5">
          <h4>Links or buttons</h4>
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
                  <div class="list-group d-inline-flex w-100 mb-3 me-4" style="max-width: 300px;">
                    <a class="list-group-item list-group-item-action" href="#!">A first link item</a>
                    <a class="list-group-item list-group-item-action active" href="#!" aria-current="true">The current link item</a>
                    <a class="list-group-item list-group-item-action" href="#!">A third link item</a>
                    <a class="list-group-item list-group-item-action disabled" aria-disabled="true">A disabled link item</a>
                    <a class="list-group-item list-group-item-action" href="#!">And a fifth link item</a>
                  </div>
                  <div class="list-group list-group-borderless d-inline-flex w-100 mb-1" style="max-width: 300px;">
                    <button type="button" class="list-group-item list-group-item-action">A first button item</button>
                    <button type="button" class="list-group-item list-group-item-action active" aria-current="true">The current button item</button>
                    <button type="button" class="list-group-item list-group-item-action">A third button item</button>
                    <button type="button" class="list-group-item list-group-item-action disabled" aria-disabled="true">A disabled button item</button>
                    <button type="button" class="list-group-item list-group-item-action">And a fifth button item</button>
                  </div>
                </div>
                <div id="html-3" class="tab-pane pt-4 fade" role="tabpanel">
                  <div class="position-relative" data-bs-theme="dark">
                    <button type="button" class="btn btn-sm btn-outline-secondary bg-dark position-absolute top-0 end-0 mt-2 px-2 z-3" data-copy-code="#list-group-links-code">
                      <i class="fi-copy fs-sm me-1"></i>
                      Copy
                    </button>
                    <pre id="list-group-links-code" class="code-highlight mx-n2 mb-n2"><code class="language-html">&lt;!-- Actionable list group made of links --&gt;
    &lt;div class=&quot;list-group&quot;&gt;
      &lt;a class=&quot;list-group-item list-group-item-action&quot; href=&quot;#&quot;&gt;A first link item&lt;/a&gt;
      &lt;a class=&quot;list-group-item list-group-item-action active&quot; href=&quot;#&quot; aria-current=&quot;true&quot;&gt;The current link item&lt;/a&gt;
      &lt;a class=&quot;list-group-item list-group-item-action&quot; href=&quot;#&quot;&gt;A third link item&lt;/a&gt;
      &lt;a class=&quot;list-group-item list-group-item-action disabled&quot; aria-disabled=&quot;true&quot;&gt;A disabled link item&lt;/a&gt;
      &lt;a class=&quot;list-group-item list-group-item-action&quot; href=&quot;#&quot;&gt;And a fifth link item&lt;/a&gt;
    &lt;/div&gt;

    &lt;!-- Actionable borderless list group made of buttons --&gt;
    &lt;div class=&quot;list-group list-group-borderless&quot;&gt;
      &lt;button type=&quot;button&quot; class=&quot;list-group-item list-group-item-action&quot;&gt;A first button item&lt;/button&gt;
      &lt;button type=&quot;button&quot; class=&quot;list-group-item list-group-item-action active&quot; aria-current=&quot;true&quot;&gt;The current button item&lt;/button&gt;
      &lt;button type=&quot;button&quot; class=&quot;list-group-item list-group-item-action&quot;&gt;A third button item&lt;/button&gt;
      &lt;button type=&quot;button&quot; class=&quot;list-group-item list-group-item-action disabled&quot; aria-disabled=&quot;true&quot;&gt;A disabled button item&lt;/button&gt;
      &lt;button type=&quot;button&quot; class=&quot;list-group-item list-group-item-action&quot;&gt;And a fifth button item&lt;/button&gt;
    &lt;/div&gt;</code></pre>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>


        <!-- Flush -->
        <section id="list-group-flush" class="docs-section pb-sm-2 mb-5">
          <h4>Flush</h4>
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
                  <ul class="list-group list-group-flush" style="max-width: 300px;">
                    <li class="list-group-item">A first item</li>
                    <li class="list-group-item">An second item</li>
                    <li class="list-group-item">A third item</li>
                    <li class="list-group-item">A fourth item</li>
                    <li class="list-group-item">And a fifth one</li>
                  </ul>
                </div>
                <div id="html-4" class="tab-pane pt-4 fade" role="tabpanel">
                  <div class="position-relative" data-bs-theme="dark">
                    <button type="button" class="btn btn-sm btn-outline-secondary bg-dark position-absolute top-0 end-0 mt-2 px-2 z-3" data-copy-code="#list-group-flush-code">
                      <i class="fi-copy fs-sm me-1"></i>
                      Copy
                    </button>
                    <pre id="list-group-flush-code" class="code-highlight mx-n2 mb-n2"><code class="language-html">&lt;!-- Flush list group to render items edge-to-edge in a parent container (e.g., cards) --&gt;
    &lt;ul class=&quot;list-group list-group-flush&quot;&gt;
      &lt;li class=&quot;list-group-item&quot;&gt;A first item&lt;/li&gt;
      &lt;li class=&quot;list-group-item&quot;&gt;An second item&lt;/li&gt;
      &lt;li class=&quot;list-group-item&quot;&gt;A third item&lt;/li&gt;
      &lt;li class=&quot;list-group-item&quot;&gt;A fourth item&lt;/li&gt;
      &lt;li class=&quot;list-group-item&quot;&gt;And a fifth one&lt;/li&gt;
    &lt;/ul&gt;</code></pre>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>


        <!-- With icons and badges -->
        <section id="list-group-icons" class="docs-section pb-sm-2 mb-5">
          <h4>With icons and badges</h4>
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
                  <div class="list-group" style="max-width: 300px;">
                    <a class="list-group-item list-group-item-action d-flex align-items-center" href="#!">
                      <i class="fi-message-circle fs-base opacity-75 me-2"></i>
                      Messages
                      <span class="badge bg-info rounded-pill ms-auto">5</span>
                    </a>
                    <a class="list-group-item list-group-item-action d-flex align-items-center" href="#!">
                      <i class="fi-shopping-bag fs-base opacity-75 me-2"></i>
                      Orders
                      <span class="badge bg-warning rounded-pill ms-auto">3</span>
                    </a>
                    <a class="list-group-item list-group-item-action d-flex align-items-center" href="#!">
                      <i class="fi-bell fs-base opacity-75 me-2"></i>
                      Notifications
                      <span class="badge bg-success rounded-pill ms-auto">7</span>
                    </a>
                    <a class="list-group-item list-group-item-action d-flex align-items-center" href="#!">
                      <i class="fi-heart fs-base opacity-75 me-2"></i>
                      Favorites
                      <span class="badge bg-danger rounded-pill ms-auto">2</span>
                    </a>
                  </div>
                </div>
                <div id="html-5" class="tab-pane pt-4 fade" role="tabpanel">
                  <div class="position-relative" data-bs-theme="dark">
                    <button type="button" class="btn btn-sm btn-outline-secondary bg-dark position-absolute top-0 end-0 mt-2 px-2 z-3" data-copy-code="#list-group-icons-code">
                      <i class="fi-copy fs-sm me-1"></i>
                      Copy
                    </button>
                    <pre id="list-group-icons-code" class="code-highlight mx-n2 mb-n2"><code class="language-html">&lt;!-- List group with icons and badges --&gt;
    &lt;div class=&quot;list-group&quot;&gt;
      &lt;a class=&quot;list-group-item list-group-item-action d-flex align-items-center&quot; href=&quot;#&quot;&gt;
        &lt;i class=&quot;fi-message-circle fs-base opacity-75 me-2&quot;&gt;&lt;/i&gt;
        Messages
        &lt;span class=&quot;badge bg-info rounded-pill ms-auto&quot;&gt;5&lt;/span&gt;
      &lt;/a&gt;
      &lt;a class=&quot;list-group-item list-group-item-action d-flex align-items-center&quot; href=&quot;#&quot;&gt;
        &lt;i class=&quot;fi-shopping-bag fs-base opacity-75 me-2&quot;&gt;&lt;/i&gt;
        Orders
        &lt;span class=&quot;badge bg-warning rounded-pill ms-auto&quot;&gt;3&lt;/span&gt;
      &lt;/a&gt;
      &lt;a class=&quot;list-group-item list-group-item-action d-flex align-items-center&quot; href=&quot;#&quot;&gt;
        &lt;i class=&quot;fi-bell fs-base opacity-75 me-2&quot;&gt;&lt;/i&gt;
        Notifications
        &lt;span class=&quot;badge bg-success rounded-pill ms-auto&quot;&gt;7&lt;/span&gt;
      &lt;/a&gt;
      &lt;a class=&quot;list-group-item list-group-item-action d-flex align-items-center&quot; href=&quot;#&quot;&gt;
        &lt;i class=&quot;fi-heart fs-base opacity-75 me-2&quot;&gt;&lt;/i&gt;
        Favorites
        &lt;span class=&quot;badge bg-danger rounded-pill ms-auto&quot;&gt;2&lt;/span&gt;
      &lt;/a&gt;
    &lt;/div&gt;</code></pre>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>


        <!-- Checkboxes and radios -->
        <section id="list-group-checkboxes" class="docs-section pb-sm-2 mb-5">
          <h4>Checkboxes and radios</h4>
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
                  <div class="row">
                    <div class="col-xl-5 col-sm-6 mb-4 mb-sm-0">
                      <div class="list-group">
                        <label class="list-group-item">
                          <input class="form-check-input me-2" type="checkbox" value="first" checked>
                          First checkbox
                        </label>
                        <label class="list-group-item">
                          <input class="form-check-input me-2" type="checkbox" value="second">
                          Second checkbox
                        </label>
                        <label class="list-group-item">
                          <input class="form-check-input me-2" type="checkbox" value="third">
                          Third checkbox
                        </label>
                        <label class="list-group-item">
                          <input class="form-check-input me-2" type="checkbox" value="fourth">
                          Fourth checkbox
                        </label>
                      </div>
                    </div>
                    <div class="col-xl-5 col-sm-6">
                      <div class="list-group">
                        <label class="list-group-item">
                          <input class="form-check-input me-2" type="radio" name="lg-radio" value="first" checked>
                          First radio
                        </label>
                        <label class="list-group-item">
                          <input class="form-check-input me-2" type="radio" name="lg-radio" value="second">
                          Second radio
                        </label>
                        <label class="list-group-item">
                          <input class="form-check-input me-2" type="radio" name="lg-radio" value="third">
                          Third radio
                        </label>
                        <label class="list-group-item">
                          <input class="form-check-input me-2" type="radio" name="lg-radio" value="fourth">
                          Fourth radio
                        </label>
                      </div>
                    </div>
                  </div>
                </div>
                <div id="html-6" class="tab-pane pt-4 fade" role="tabpanel">
                  <div class="position-relative" data-bs-theme="dark">
                    <button type="button" class="btn btn-sm btn-outline-secondary bg-dark position-absolute top-0 end-0 mt-2 px-2 z-3" data-copy-code="#list-group-checkboxes-code">
                      <i class="fi-copy fs-sm me-1"></i>
                      Copy
                    </button>
                    <pre id="list-group-checkboxes-code" class="code-highlight mx-n2 mb-n2"><code class="language-html">&lt;!-- List group with checkboxes --&gt;
    &lt;div class=&quot;list-group&quot;&gt;
      &lt;label class=&quot;list-group-item&quot;&gt;
        &lt;input class=&quot;form-check-input me-2&quot; type=&quot;checkbox&quot; value=&quot;first&quot; checked&gt;
        First checkbox
      &lt;/label&gt;
      &lt;label class=&quot;list-group-item&quot;&gt;
        &lt;input class=&quot;form-check-input me-2&quot; type=&quot;checkbox&quot; value=&quot;second&quot;&gt;
        Second checkbox
      &lt;/label&gt;
      &lt;label class=&quot;list-group-item&quot;&gt;
        &lt;input class=&quot;form-check-input me-2&quot; type=&quot;checkbox&quot; value=&quot;third&quot;&gt;
        Third checkbox
      &lt;/label&gt;
      &lt;label class=&quot;list-group-item&quot;&gt;
        &lt;input class=&quot;form-check-input me-2&quot; type=&quot;checkbox&quot; value=&quot;fourth&quot;&gt;
        Fourth checkbox
      &lt;/label&gt;
    &lt;/div&gt;

    &lt;!-- List group with radio buttons --&gt;
    &lt;div class=&quot;list-group&quot;&gt;
      &lt;label class=&quot;list-group-item&quot;&gt;
        &lt;input class=&quot;form-check-input me-2&quot; type=&quot;radio&quot; name=&quot;lg-radio&quot; value=&quot;first&quot; checked&gt;
        First radio
      &lt;/label&gt;
      &lt;label class=&quot;list-group-item&quot;&gt;
        &lt;input class=&quot;form-check-input me-2&quot; type=&quot;radio&quot; name=&quot;lg-radio&quot; value=&quot;second&quot;&gt;
        Second radio
      &lt;/label&gt;
      &lt;label class=&quot;list-group-item&quot;&gt;
        &lt;input class=&quot;form-check-input me-2&quot; type=&quot;radio&quot; name=&quot;lg-radio&quot; value=&quot;third&quot;&gt;
        Third radio
      &lt;/label&gt;
      &lt;label class=&quot;list-group-item&quot;&gt;
        &lt;input class=&quot;form-check-input me-2&quot; type=&quot;radio&quot; name=&quot;lg-radio&quot; value=&quot;fourth&quot;&gt;
        Fourth radio
      &lt;/label&gt;
    &lt;/div&gt;</code></pre>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>


        <!-- Numbered list group -->
        <section id="list-group-numbered" class="docs-section pb-sm-2 mb-5">
          <h4>Numbered list group</h4>
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
                  <ol class="list-group list-group-numbered" style="max-width: 300px;">
                    <li class="list-group-item">A list item</li>
                    <li class="list-group-item">A list item</li>
                    <li class="list-group-item">A list item</li>
                    <li class="list-group-item">A list item</li>
                  </ol>
                </div>
                <div id="html-7" class="tab-pane pt-4 fade" role="tabpanel">
                  <div class="position-relative" data-bs-theme="dark">
                    <button type="button" class="btn btn-sm btn-outline-secondary bg-dark position-absolute top-0 end-0 mt-2 px-2 z-3" data-copy-code="#list-group-numbered-code">
                      <i class="fi-copy fs-sm me-1"></i>
                      Copy
                    </button>
                    <pre id="list-group-numbered-code" class="code-highlight mx-n2 mb-n2"><code class="language-html">&lt;!-- Numbered list group --&gt;
    &lt;ol class=&quot;list-group list-group-numbered&quot;&gt;
      &lt;li class=&quot;list-group-item&quot;&gt;A list item&lt;/li&gt;
      &lt;li class=&quot;list-group-item&quot;&gt;A list item&lt;/li&gt;
      &lt;li class=&quot;list-group-item&quot;&gt;A list item&lt;/li&gt;
      &lt;li class=&quot;list-group-item&quot;&gt;A list item&lt;/li&gt;
    &lt;/ol&gt;</code></pre>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>


        <!-- Horizontal list group -->
        <section id="list-group-horizontal" class="docs-section pb-sm-2 mb-5">
          <h4>Horizontal list group</h4>
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
                  <ul class="list-group list-group-horizontal mb-3">
                    <li class="list-group-item">A first item</li>
                    <li class="list-group-item">A second item</li>
                    <li class="list-group-item">A third item</li>
                  </ul>
                  <ul class="list-group list-group-horizontal mb-3">
                    <li class="list-group-item flex-fill text-center">A first item</li>
                    <li class="list-group-item flex-fill text-center">A second item</li>
                    <li class="list-group-item flex-fill text-center">A third item</li>
                  </ul>
                  <div class="list-group list-group-horizontal mb-3">
                    <a class="list-group-item list-group-item-action text-center active" href="#!" aria-current="true">An active link</a>
                    <a class="list-group-item list-group-item-action text-center" href="#!">A second link</a>
                    <a class="list-group-item list-group-item-action text-center" href="#!">A third link</a>
                  </div>
                  <div class="list-group list-group-borderless list-group-horizontal">
                    <a class="list-group-item list-group-item-action text-center" href="#!">A first link</a>
                    <a class="list-group-item list-group-item-action text-center active" href="#!" aria-current="true">An active link</a>
                    <a class="list-group-item list-group-item-action text-center" href="#!">A third link</a>
                  </div>
                </div>
                <div id="html-8" class="tab-pane pt-4 fade" role="tabpanel">
                  <div class="position-relative" data-bs-theme="dark">
                    <button type="button" class="btn btn-sm btn-outline-secondary bg-dark position-absolute top-0 end-0 mt-2 px-2 z-3" data-copy-code="#list-group-horizontal-code">
                      <i class="fi-copy fs-sm me-1"></i>
                      Copy
                    </button>
                    <pre id="list-group-horizontal-code" class="code-highlight mx-n2 mb-n2"><code class="language-html">&lt;!-- Basic horizontal list group. Alternatively, choose a responsive variant .list-group-horizontal-{sm|md|lg|xl|xxl} to make a list group horizontal starting at that breakpoint's min-width --&gt;
    &lt;ul class=&quot;list-group list-group-horizontal&quot;&gt;
      &lt;li class=&quot;list-group-item&quot;&gt;A first item&lt;/li&gt;
      &lt;li class=&quot;list-group-item&quot;&gt;A second item&lt;/li&gt;
      &lt;li class=&quot;list-group-item&quot;&gt;A third item&lt;/li&gt;
    &lt;/ul&gt;

    &lt;!-- Justified horizontal list group --&gt;
    &lt;ul class=&quot;list-group list-group-horizontal&quot;&gt;
      &lt;li class=&quot;list-group-item flex-fill text-center&quot;&gt;A first item&lt;/li&gt;
      &lt;li class=&quot;list-group-item flex-fill text-center&quot;&gt;A second item&lt;/li&gt;
      &lt;li class=&quot;list-group-item flex-fill text-center&quot;&gt;A third item&lt;/li&gt;
    &lt;/ul&gt;

    &lt;!-- Actionable (links) horizontal list group --&gt;
    &lt;div class=&quot;list-group list-group-horizontal&quot;&gt;
      &lt;a class=&quot;list-group-item list-group-item-action text-center active&quot; href=&quot;#&quot; aria-current=&quot;true&quot;&gt;An active link&lt;/a&gt;
      &lt;a class=&quot;list-group-item list-group-item-action text-center&quot; href=&quot;#&quot;&gt;A second link&lt;/a&gt;
      &lt;a class=&quot;list-group-item list-group-item-action text-center&quot; href=&quot;#&quot;&gt;A third link&lt;/a&gt;
    &lt;/div&gt;

    &lt;!-- Actionable (links) borderless horizontal list group --&gt;
    &lt;div class=&quot;list-group list-group-borderless list-group-horizontal&quot;&gt;
      &lt;a class=&quot;list-group-item list-group-item-action text-center active&quot; href=&quot;#&quot; aria-current=&quot;true&quot;&gt;An active link&lt;/a&gt;
      &lt;a class=&quot;list-group-item list-group-item-action text-center&quot; href=&quot;#&quot;&gt;A second link&lt;/a&gt;
      &lt;a class=&quot;list-group-item list-group-item-action text-center&quot; href=&quot;#&quot;&gt;A third link&lt;/a&gt;
    &lt;/div&gt;</code></pre>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>


        <!-- Custom content -->
        <section id="list-group-custom" class="docs-section pb-sm-2 mb-5">
          <h4>Custom content</h4>
          <div class="card border-0 shadow">
            <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
            <div class="card-body position-relative z-2">
              <ul class="nav nav-tabs m-n2" role="tablist" style="max-width: 240px">
                <li class="nav-item" role="presentation">
                  <button type="button" class="nav-link active" data-bs-toggle="tab" data-bs-target="#preview-9" role="tab" aria-controls="preview-9" aria-selected="true">
                    <i class="fi-eye opacity-75 ms-n1 me-2"></i>
                    Preview
                  </button>
                </li>
                <li class="nav-item" role="presentation">
                  <button type="button" class="nav-link" data-bs-toggle="tab" data-bs-target="#html-9" role="tab" aria-controls="html-9" aria-selected="false">
                    <i class="fi-code opacity-75 ms-n1 me-2"></i>
                    HTML
                  </button>
                </li>
              </ul>
              <div class="tab-content">
                <div id="preview-9" class="tab-pane pt-4 pb-2 mt-3 fade show active" role="tabpanel">
                  <div class="list-group" style="max-width: 400px;">
                    <a class="list-group-item list-group-item-action p-3 fw-normal active" href="#!" aria-current="true">
                      <div class="d-flex w-100 justify-content-between">
                        <h6 class="mb-1">List group item heading</h6>
                        <small>3 days ago</small>
                      </div>
                      <p class="mb-1">Some placeholder content in a paragraph.</p>
                      <small>And some small print.</small>
                    </a>
                    <a class="list-group-item list-group-item-action p-3 fw-normal" href="#!">
                      <div class="d-flex w-100 justify-content-between">
                        <h6 class="mb-1">List group item heading</h6>
                        <small class="text-body-secondary">3 days ago</small>
                      </div>
                      <p class="mb-1">Some placeholder content in a paragraph.</p>
                      <small class="text-body-tertiary">And some muted small print.</small>
                    </a>
                    <a class="list-group-item list-group-item-action p-3 fw-normal" href="#!">
                      <div class="d-flex w-100 justify-content-between">
                        <h6 class="mb-1">List group item heading</h6>
                        <small class="text-body-secondary">3 days ago</small>
                      </div>
                      <p class="mb-1">Some placeholder content in a paragraph.</p>
                      <small class="text-body-tertiary">And some muted small print.</small>
                    </a>
                  </div>
                </div>
                <div id="html-9" class="tab-pane pt-4 fade" role="tabpanel">
                  <div class="position-relative" data-bs-theme="dark">
                    <button type="button" class="btn btn-sm btn-outline-secondary bg-dark position-absolute top-0 end-0 mt-2 px-2 z-3" data-copy-code="#list-group-custom-code">
                      <i class="fi-copy fs-sm me-1"></i>
                      Copy
                    </button>
                    <pre id="list-group-custom-code" class="code-highlight mx-n2 mb-n2"><code class="language-html">&lt;!-- List group with custom content --&gt;
    &lt;div class=&quot;list-group&quot;&gt;
      &lt;a class=&quot;list-group-item list-group-item-action p-3 fw-normal active&quot; href=&quot;#&quot; aria-current=&quot;true&quot;&gt;
        &lt;div class=&quot;d-flex w-100 justify-content-between&quot;&gt;
          &lt;h6 class=&quot;mb-1&quot;&gt;List group item heading&lt;/h6&gt;
          &lt;small&gt;3 days ago&lt;/small&gt;
        &lt;/div&gt;
        &lt;p class=&quot;mb-1&quot;&gt;Some placeholder content in a paragraph.&lt;/p&gt;
        &lt;small&gt;And some small print.&lt;/small&gt;
      &lt;/a&gt;
      &lt;a class=&quot;list-group-item list-group-item-action p-3 fw-normal&quot; href=&quot;#&quot;&gt;
        &lt;div class=&quot;d-flex w-100 justify-content-between&quot;&gt;
          &lt;h6 class=&quot;mb-1&quot;&gt;List group item heading&lt;/h6&gt;
          &lt;small class=&quot;text-body-secondary&quot;&gt;3 days ago&lt;/small&gt;
        &lt;/div&gt;
        &lt;p class=&quot;mb-1&quot;&gt;Some placeholder content in a paragraph.&lt;/p&gt;
        &lt;small class=&quot;text-body-tertiary&quot;&gt;And some muted small print.&lt;/small&gt;
      &lt;/a&gt;
      &lt;a class=&quot;list-group-item list-group-item-action p-3 fw-normal&quot; href=&quot;#&quot;&gt;
        &lt;div class=&quot;d-flex w-100 justify-content-between&quot;&gt;
          &lt;h6 class=&quot;mb-1&quot;&gt;List group item heading&lt;/h6&gt;
          &lt;small class=&quot;text-body-secondary&quot;&gt;3 days ago&lt;/small&gt;
        &lt;/div&gt;
        &lt;p class=&quot;mb-1&quot;&gt;Some placeholder content in a paragraph.&lt;/p&gt;
        &lt;small class=&quot;text-body-tertiary&quot;&gt;And some muted small print.&lt;/small&gt;
      &lt;/a&gt;
    &lt;/div&gt;</code></pre>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>


        <!-- Color variations -->
        <section id="list-group-colors" class="docs-section pb-sm-2 mb-5">
          <h4>Color variations</h4>
          <div class="card border-0 shadow">
            <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
            <div class="card-body position-relative z-2">
              <ul class="nav nav-tabs m-n2" role="tablist" style="max-width: 240px">
                <li class="nav-item" role="presentation">
                  <button type="button" class="nav-link active" data-bs-toggle="tab" data-bs-target="#preview-10" role="tab" aria-controls="preview-10" aria-selected="true">
                    <i class="fi-eye opacity-75 ms-n1 me-2"></i>
                    Preview
                  </button>
                </li>
                <li class="nav-item" role="presentation">
                  <button type="button" class="nav-link" data-bs-toggle="tab" data-bs-target="#html-10" role="tab" aria-controls="html-10" aria-selected="false">
                    <i class="fi-code opacity-75 ms-n1 me-2"></i>
                    HTML
                  </button>
                </li>
              </ul>
              <div class="tab-content">
                <div id="preview-10" class="tab-pane pt-4 pb-2 mt-3 fade show active" role="tabpanel">
                  <ul class="list-group" style="max-width: 350px;">
                    <li class="list-group-item">A simple default list group item</li>
                    <li class="list-group-item list-group-item-primary">A simple primary list group item</li>
                    <li class="list-group-item list-group-item-secondary">A simple secondary list group item</li>
                    <li class="list-group-item list-group-item-success">A simple success list group item</li>
                    <li class="list-group-item list-group-item-danger">A simple danger list group item</li>
                    <li class="list-group-item list-group-item-warning">A simple warning list group item</li>
                    <li class="list-group-item list-group-item-info">A simple info list group item</li>
                    <li class="list-group-item list-group-item-light">A simple light list group item</li>
                    <li class="list-group-item list-group-item-dark">A simple dark list group item</li>
                  </ul>
                </div>
                <div id="html-10" class="tab-pane pt-4 fade" role="tabpanel">
                  <div class="position-relative" data-bs-theme="dark">
                    <button type="button" class="btn btn-sm btn-outline-secondary bg-dark position-absolute top-0 end-0 mt-2 px-2 z-3" data-copy-code="#list-group-colors-code">
                      <i class="fi-copy fs-sm me-1"></i>
                      Copy
                    </button>
                    <pre id="list-group-colors-code" class="code-highlight mx-n2 mb-n2"><code class="language-html">&lt;!-- Use contextual classes to style list items with a stateful background and color. --&gt;
    &lt;ul class=&quot;list-group&quot;&gt;
      &lt;li class=&quot;list-group-item&quot;&gt;A simple default list group item&lt;/li&gt;
      &lt;li class=&quot;list-group-item list-group-item-primary&quot;&gt;A simple primary list group item&lt;/li&gt;
      &lt;li class=&quot;list-group-item list-group-item-secondary&quot;&gt;A simple secondary list group item&lt;/li&gt;
      &lt;li class=&quot;list-group-item list-group-item-success&quot;&gt;A simple success list group item&lt;/li&gt;
      &lt;li class=&quot;list-group-item list-group-item-danger&quot;&gt;A simple danger list group item&lt;/li&gt;
      &lt;li class=&quot;list-group-item list-group-item-warning&quot;&gt;A simple warning list group item&lt;/li&gt;
      &lt;li class=&quot;list-group-item list-group-item-info&quot;&gt;A simple info list group item&lt;/li&gt;
      &lt;li class=&quot;list-group-item list-group-item-light&quot;&gt;A simple light list group item&lt;/li&gt;
      &lt;li class=&quot;list-group-item list-group-item-dark&quot;&gt;A simple dark list group item&lt;/li&gt;
    &lt;/ul&gt;</code></pre>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>


        <!-- JavaScript behavior -->
        <section id="list-group-js" class="docs-section">
          <h4>JavaScript behavior</h4>
          <div class="card border-0 shadow">
            <span class="d-none d-block-dark position-absolute top-0 start-0 w-100 h-100 bg-dark rounded opacity-50"></span>
            <div class="card-body position-relative z-2">
              <ul class="nav nav-tabs m-n2" role="tablist" style="max-width: 240px">
                <li class="nav-item" role="presentation">
                  <button type="button" class="nav-link active" data-bs-toggle="tab" data-bs-target="#preview-11" role="tab" aria-controls="preview-11" aria-selected="true">
                    <i class="fi-eye opacity-75 ms-n1 me-2"></i>
                    Preview
                  </button>
                </li>
                <li class="nav-item" role="presentation">
                  <button type="button" class="nav-link" data-bs-toggle="tab" data-bs-target="#html-11" role="tab" aria-controls="html-11" aria-selected="false">
                    <i class="fi-code opacity-75 ms-n1 me-2"></i>
                    HTML
                  </button>
                </li>
              </ul>
              <div class="tab-content">
                <div id="preview-11" class="tab-pane pt-4 pb-2 mt-3 fade show active" role="tabpanel">
                  <div class="row">
                    <div class="col-md-4">
                      <div class="list-group" role="tablist">
                        <a class="list-group-item list-group-item-action active" href="#list-home" data-bs-toggle="list" role="tab" aria-controls="list-home" id="list-home-list" aria-selected="true">Home</a>
                        <a class="list-group-item list-group-item-action" href="#list-profile" data-bs-toggle="list" role="tab" aria-controls="list-profile" id="list-profile-list" aria-selected="false" tabindex="-1">Profile</a>
                        <a class="list-group-item list-group-item-action" href="#list-messages" data-bs-toggle="list" role="tab" aria-controls="list-messages" id="list-messages-list" aria-selected="false" tabindex="-1">Messages</a>
                        <a class="list-group-item list-group-item-action" href="#list-settings" data-bs-toggle="list" role="tab" aria-controls="list-settings" id="list-settings-list" aria-selected="false" tabindex="-1">Settings</a>
                      </div>
                    </div>
                    <div class="col-md-8 pt-4 pt-md-0">
                      <div class="tab-content">
                        <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">Velit aute mollit ipsum ad dolor consectetur nulla officia culpa adipisicing exercitation fugiat tempor. Voluptate deserunt sit sunt nisi aliqua fugiat proident ea ut. Mollit voluptate reprehenderit occaecat nisi ad non minim tempor sunt voluptate consectetur exercitation id ut nulla. Ea et fugiat aliquip nostrud sunt incididunt consectetur culpa aliquip eiusmod dolor. Anim ad Lorem aliqua in cupidatat nisi enim voluptatum iure autem atque quaerat.</div>
                        <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">Cupidatat quis ad sint excepteur laborum in esse qui. Et excepteur consectetur ex nisi eu do cillum ad laborum. Mollit et eu officia dolore sunt Lorem culpa qui commodo velit ex amet id ex. Officia anim incididunt laboris deserunt anim aute dolor incididunt veniam aute dolore do exercitation. Dolor nisi culpa ex ad irure in elit eu dolore. Ad laboris ipsum reprehenderit irure non commodo enim culpa commodo itaque dolores dolorum similique architecto.</div>
                        <div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">Ut ut do pariatur aliquip aliqua aliquip exercitation do nostrud commodo reprehenderit aute ipsum voluptate. Irure Lorem et laboris nostrud amet cupidatat cupidatat anim do ut velit mollit consequat enim tempor. Consectetur est minim nostrud nostrud consectetur irure labore voluptate irure. Ipsum id Lorem sit sint voluptate est pariatur eu ad cupidatat et deserunt culpa sit eiusmod deserunt. Consectetur et fugiat anim do eiusmod aliquip.</div>
                        <div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">Irure enim occaecat labore sit qui aliquip reprehenderit amet velit. Deserunt ullamco ex elit nostrud ut dolore nisi officia magna sit occaecat laboris sunt dolor. Nisi eu minim cillum occaecat aute est cupidatat aliqua labore aute occaecat ea aliquip sunt amet. Aute mollit dolor ut exercitation irure commodo non amet consectetur quis amet culpa. Quis ullamco nisi amet qui aute irure eu. Magna labore dolor quis ex labore id nostrud deserunt dolor eiusmod.</div>
                      </div>
                    </div>
                  </div>
                </div>
                <div id="html-11" class="tab-pane pt-4 fade" role="tabpanel">
                  <div class="position-relative" data-bs-theme="dark">
                    <button type="button" class="btn btn-sm btn-outline-secondary bg-dark position-absolute top-0 end-0 mt-2 px-2 z-3" data-copy-code="#list-group-js-code">
                      <i class="fi-copy fs-sm me-1"></i>
                      Copy
                    </button>
                    <pre id="list-group-js-code" class="code-highlight mx-n2 mb-n2"><code class="language-html">&lt;div class=&quot;row&quot;&gt;
      &lt;div class=&quot;col-md-4&quot;&gt;

        &lt;!-- Nav tabs in format of list group --&gt;
        &lt;div class=&quot;list-group&quot; role=&quot;tablist&quot;&gt;
          &lt;a class=&quot;list-group-item list-group-item-action active&quot; href=&quot;#list-home&quot; data-bs-toggle=&quot;list&quot; role=&quot;tab&quot; aria-controls=&quot;list-home&quot; id=&quot;list-home-list&quot; aria-selected=&quot;true&quot;&gt;Home&lt;/a&gt;
          &lt;a class=&quot;list-group-item list-group-item-action&quot; href=&quot;#list-profile&quot; data-bs-toggle=&quot;list&quot; role=&quot;tab&quot; aria-controls=&quot;list-profile&quot; id=&quot;list-profile-list&quot; aria-selected=&quot;false&quot; tabindex=&quot;-1&quot;&gt;Profile&lt;/a&gt;
          &lt;a class=&quot;list-group-item list-group-item-action&quot; href=&quot;#list-messages&quot; data-bs-toggle=&quot;list&quot; role=&quot;tab&quot; aria-controls=&quot;list-messages&quot; id=&quot;list-messages-list&quot; aria-selected=&quot;false&quot; tabindex=&quot;-1&quot;&gt;Messages&lt;/a&gt;
          &lt;a class=&quot;list-group-item list-group-item-action&quot; href=&quot;#list-settings&quot; data-bs-toggle=&quot;list&quot; role=&quot;tab&quot; aria-controls=&quot;list-settings&quot; id=&quot;list-settings-list&quot; aria-selected=&quot;false&quot; tabindex=&quot;-1&quot;&gt;Settings&lt;/a&gt;
        &lt;/div&gt;
      &lt;/div&gt;
      &lt;div class=&quot;col-md-8 pt-4 pt-md-0&quot;&gt;

        &lt;!-- Tab content --&gt;
        &lt;div class=&quot;tab-content&quot;&gt;
          &lt;div class=&quot;tab-pane fade show active&quot; id=&quot;list-home&quot; role=&quot;tabpanel&quot; aria-labelledby=&quot;list-home-list&quot;&gt;...&lt;/div&gt;
          &lt;div class=&quot;tab-pane fade&quot; id=&quot;list-profile&quot; role=&quot;tabpanel&quot; aria-labelledby=&quot;list-profile-list&quot;&gt;...&lt;/div&gt;
          &lt;div class=&quot;tab-pane fade&quot; id=&quot;list-messages&quot; role=&quot;tabpanel&quot; aria-labelledby=&quot;list-messages-list&quot;&gt;...&lt;/div&gt;
          &lt;div class=&quot;tab-pane fade&quot; id=&quot;list-settings&quot; role=&quot;tabpanel&quot; aria-labelledby=&quot;list-settings-list&quot;&gt;...&lt;/div&gt;
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