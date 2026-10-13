@extends('layouts.app')

@section('title', 'Finder Docs | Modal')

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

    .example-modal .modal {
      display: block;
      position: relative;
      top: auto;
      right: auto;
      bottom: auto;
      left: auto;
      z-index: 1;
    }
  </style>
@endpush

@section('content')

  <!-- Small modal -->
  <div class="modal fade" id="modalSmall" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-sm" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Modal title</h5>
          <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p>...</p>
        </div>
      </div>
    </div>
  </div>

  <!-- Default modal -->
  <div class="modal fade" id="modalDefault" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Modal title</h5>
          <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p>Modal body text goes here.</p>
        </div>
        <div class="modal-footer flex-column flex-sm-row align-items-stretch">
          <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
          <button class="btn btn-primary" type="button">Save changes</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Large modal -->
  <div class="modal fade" id="modalLarge" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Modal title</h5>
          <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p>Modal body text goes here.</p>
        </div>
        <div class="modal-footer flex-column flex-sm-row align-items-stretch">
          <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
          <button class="btn btn-primary" type="button">Save changes</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Extra large modal -->
  <div class="modal fade" id="modalXL" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Modal title</h5>
          <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p>Modal body text goes here.</p>
        </div>
        <div class="modal-footer flex-column flex-sm-row align-items-stretch">
          <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
          <button class="btn btn-primary" type="button">Save changes</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Long modal -->
  <div class="modal fade" id="modalLong" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Modal title</h5>
          <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body fs-sm">
          <p>Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
          <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.</p>
          <p>Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla.</p>
          <p>Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
          <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.</p>
          <p>Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla.</p>
          <p>Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
          <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.</p>
          <p>Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla.</p>
          <p>Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
          <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.</p>
          <p>Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla.</p>
          <p>Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
          <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.</p>
          <p>Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla.</p>
          <p>Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
          <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.</p>
          <p>Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla.</p>
        </div>
        <div class="modal-footer flex-column flex-sm-row align-items-stretch">
          <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
          <button class="btn btn-primary" type="button">Save changes</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Scrolling content -->
  <div class="modal fade" id="modalScroll" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Modal title</h5>
          <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body fs-sm">
          <p>Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
          <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.</p>
          <p>Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla.</p>
          <p>Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
          <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.</p>
          <p>Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla.</p>
          <p>Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
          <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.</p>
          <p>Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla.</p>
          <p>Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
          <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.</p>
          <p>Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla.</p>
          <p>Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
          <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.</p>
          <p>Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla.</p>
          <p>Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
          <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.</p>
          <p>Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla.</p>
        </div>
        <div class="modal-footer flex-column flex-sm-row align-items-stretch">
          <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
          <button class="btn btn-primary" type="button">Save changes</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Vertically centered modal -->
  <div class="modal fade" id="modalCentered" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Modal title</h5>
          <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p>Modal body text goes here.</p>
        </div>
        <div class="modal-footer flex-column flex-sm-row align-items-stretch">
          <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
          <button class="btn btn-primary" type="button">Save changes</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Full screen modal -->
  <div class="modal fade" id="modalFullscreen" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-fullscreen" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Modal title</h5>
          <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p>Modal body text goes here.</p>
        </div>
        <div class="modal-footer flex-column flex-sm-row align-items-stretch">
          <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
          <button class="btn btn-primary" type="button">Save changes</button>
        </div>
      </div>
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
                  <div class="dropdown">
                    <span class="list-group-item list-group-item-action justify-content-between dropdown-toggle pe-3 pe-none active">
                      Modal
                      <span class="visually-hidden">dialog popup overlay lightbox</span>
                    </span>
                    <ul id="anchorNav" class="nav nav-underline flex-column border-start ms-2 my-2" style="gap: .25rem;">
                      <li class="nav-item"><a class="nav-link fw-normal" href="#modal-markup">Modal markup</a></li>
                      <li class="nav-item"><a class="nav-link fw-normal" href="#modal-tabs-forms">Tabs and forms</a></li>
                      <li class="nav-item"><a class="nav-link fw-normal" href="#modal-demo">Live demo (variants)</a></li>
                    </ul>
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
          <a class="badge d-inline-flex align-items-center text-info bg-info-subtle fw-semibold text-decoration-none py-2 px-3 mb-2 rounded-pill" href="https://getbootstrap.com/docs/5.3/components/modal/" target="_blank" rel="noreferrer">
            Bootstrap docs
            <i class="fi-external-link fs-sm ms-1"></i>
          </a>
          <h1 class="pt-1">Modal</h1>
          <p class="text-body-secondary mb-4">Dialogs for lightboxes, user notifications, or completely custom content.</p>
        </section>


        <!-- Modal markup -->
        <section id="modal-markup" class="docs-section pb-sm-2 mb-5">
          <h4>Modal markup</h4>
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
                <div id="preview-1" class="tab-pane pt-4 pb-2 mt-2 fade show active" role="tabpanel">
                  <div class="example-modal bg-dotted rounded p-4 m-n2">
                    <div class="modal" tabindex="-1" role="dialog">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title">Modal title</h5>
                            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <p>Modal body content goes here.</p>
                          </div>
                          <div class="modal-footer flex-column flex-sm-row align-items-stretch">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div id="html-1" class="tab-pane pt-4 fade" role="tabpanel">
                  <div class="position-relative" data-bs-theme="dark">
                    <button type="button" class="btn btn-sm btn-outline-secondary bg-dark position-absolute top-0 end-0 mt-2 px-2 z-3" data-copy-code="#modal-markup-code">
                      <i class="fi-copy fs-sm me-1"></i>
                      Copy
                    </button>
                    <pre id="modal-markup-code" class="code-highlight mx-n2 mb-n2"><code class="language-html">&lt;!-- Basic modal markup --&gt;
        &lt;div class=&quot;modal fade&quot; tabindex=&quot;-1&quot; role=&quot;dialog&quot;&gt;
          &lt;div class=&quot;modal-dialog&quot; role=&quot;document&quot;&gt;
            &lt;div class=&quot;modal-content&quot;&gt;
              &lt;div class=&quot;modal-header&quot;&gt;
                &lt;h5 class=&quot;modal-title&quot;&gt;Modal title&lt;/h5&gt;
                &lt;button class=&quot;btn-close&quot; type=&quot;button&quot; data-bs-dismiss=&quot;modal&quot; aria-label=&quot;Close&quot;&gt;&lt;/button&gt;
              &lt;/div&gt;
              &lt;div class=&quot;modal-body&quot;&gt;
                &lt;p&gt;Modal body content goes here.&lt;/p&gt;
              &lt;/div&gt;
              &lt;div class=&quot;modal-footer flex-column flex-sm-row align-items-stretch&quot;&gt;
                &lt;button type=&quot;button&quot; class=&quot;btn btn-secondary&quot; data-bs-dismiss=&quot;modal&quot;&gt;Close&lt;/button&gt;
                &lt;button type=&quot;button&quot; class=&quot;btn btn-primary&quot;&gt;Save changes&lt;/button&gt;
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


        <!-- Tabs and forms -->
        <section id="modal-tabs-forms" class="docs-section pb-sm-2 mb-5">
          <h4>Tabs and forms</h4>
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
                <div id="preview-2" class="tab-pane pt-4 pb-2 mt-2 fade show active" role="tabpanel">
                  <div class="example-modal bg-dotted rounded py-4 px-3 px-md-4 m-n2">
                    <div class="modal" tabindex="-1" role="dialog">
                      <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content row row-cols-1 row-cols-lg-2 flex-row g-0 overflow-hidden">
                          <div class="col order-lg-2">
                            <div class="position-relative d-flex align-items-end h-100 bg-info-subtle pt-4 px-4 px-sm-5 px-lg-0">
                              <button type="button" class="btn-close position-absolute top-0 end-0 mt-3 me-3" data-bs-dismiss="modal" aria-label="Close"></button>
                              <div class="ratio" style="--fn-aspect-ratio: calc(1030 / 1032 * 100%)">
                                <img src="{{ asset('assets/img/account/account-cover.png') }}" alt="Girl">
                              </div>
                            </div>
                          </div>
                          <div class="col d-flex flex-column order-lg-1">
                            <div class="modal-header d-block border-0 pt-sm-5 pt-lg-4 pt-xl-5 px-sm-5 px-lg-4 px-xl-5 pb-2">
                              <ul class="nav nav-tabs mt-sm-n2 mt-lg-0 mt-xl-n2" role="tablist">
                                <li class="nav-item" role="presentation">
                                  <button type="button" class="nav-link text-nowrap active" data-bs-toggle="tab" data-bs-target="#signin" role="tab" aria-controls="signin" aria-selected="true">
                                    <i class="fi-log-in fs-base opacity-75 d-none d-sm-inline-flex ms-n1 me-2"></i>
                                    Sign in
                                  </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                  <button type="button" class="nav-link text-nowrap" data-bs-toggle="tab" data-bs-target="#signup" role="tab" aria-controls="signup" aria-selected="false">
                                    <i class="fi-user fs-base opacity-75 d-none d-sm-inline-flex ms-n1 me-2"></i>
                                    Sign up
                                  </button>
                                </li>
                              </ul>
                            </div>
                            <div class="modal-body tab-content px-sm-5 px-lg-4 px-xl-5 pb-sm-5 pb-lg-4 pb-xl-5">
                              <div class="tab-pane fade show active" id="signin" role="tabpanel">
                                <h2 class="h5 mb-4">Welcome back</h2>
                                <form>
                                  <div class="position-relative mb-4">
                                    <input type="email" class="form-control" placeholder="Email" required>
                                  </div>
                                  <div class="mb-4">
                                    <div class="password-toggle">
                                      <input type="password" class="form-control" placeholder="Password" required>
                                      <label class="password-toggle-button fs-lg" aria-label="Show/hide password">
                                        <input type="checkbox" class="btn-check">
                                      </label>
                                    </div>
                                  </div>
                                  <div class="form-check mb-4">
                                    <input type="checkbox" class="form-check-input" id="remember-30">
                                    <label for="remember-30" class="form-check-label">Remember for 30 days</label>
                                  </div>
                                  <button type="submit" class="btn btn-primary w-100">Sign In</button>
                                </form>
                              </div>
                              <div class="tab-pane fade" id="signup" role="tabpanel">
                                <h2 class="h5">Create an account</h2>
                                <form>
                                  <div class="position-relative mb-3">
                                    <label for="register-email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="register-email" required>
                                  </div>
                                  <div class="mb-4">
                                    <label for="register-password" class="form-label">Password</label>
                                    <div class="password-toggle">
                                      <input type="password" class="form-control" id="register-password" minlength="8" placeholder="Minimum 8 characters" required>
                                      <label class="password-toggle-button fs-lg" aria-label="Show/hide password">
                                        <input type="checkbox" class="btn-check">
                                      </label>
                                    </div>
                                  </div>
                                  <div class="d-flex flex-column gap-2 mb-4">
                                    <div class="form-check">
                                      <input type="checkbox" class="form-check-input" id="save-pass">
                                      <label for="save-pass" class="form-check-label">Save the password</label>
                                    </div>
                                  </div>
                                  <button type="submit" class="btn btn-primary w-100">Create an account</button>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div id="html-2" class="tab-pane pt-4 fade" role="tabpanel">
                  <div class="position-relative" data-bs-theme="dark">
                    <button type="button" class="btn btn-sm btn-outline-secondary bg-dark position-absolute top-0 end-0 mt-2 px-2 z-3" data-copy-code="#modal-tabs-forms-code">
                      <i class="fi-copy fs-sm me-1"></i>
                      Copy
                    </button>
                    <pre id="modal-tabs-forms-code" class="code-highlight mx-n2 mb-n2"><code class="language-html">&lt;!-- Custom modal markup with tabs, forms and cover image --&gt;
        &lt;div class=&quot;modal fade&quot; tabindex=&quot;-1&quot; role=&quot;dialog&quot;&gt;
          &lt;div class=&quot;modal-dialog modal-lg&quot; role=&quot;document&quot;&gt;
            &lt;div class=&quot;modal-content row row-cols-1 row-cols-lg-2 flex-row g-0 overflow-hidden&quot;&gt;

              &lt;!-- Cover image --&gt;
              &lt;div class=&quot;col order-lg-2&quot;&gt;
                &lt;div class=&quot;position-relative d-flex align-items-end h-100 bg-info-subtle pt-4 px-4 px-sm-5 px-lg-0&quot;&gt;
                  &lt;button type=&quot;button&quot; class=&quot;btn-close position-absolute top-0 end-0 mt-3 me-3&quot; data-bs-dismiss=&quot;modal&quot; aria-label=&quot;Close&quot;&gt;&lt;/button&gt;
                  &lt;div class=&quot;ratio&quot; style=&quot;--fn-aspect-ratio: calc(1030 / 1032 * 100%)&quot;&gt;
                    &lt;img src=&quot;assets/img/account/account-cover.png&quot; alt=&quot;Girl&quot;&gt;
                  &lt;/div&gt;
                &lt;/div&gt;
              &lt;/div&gt;

              &lt;div class=&quot;col d-flex flex-column order-lg-1&quot;&gt;

                &lt;!-- Modal header: Nav tabs --&gt;
                &lt;div class=&quot;modal-header d-block border-0 pt-sm-5 px-sm-5 pb-2&quot;&gt;
                  &lt;ul class=&quot;nav nav-tabs mt-sm-n2&quot; role=&quot;tablist&quot;&gt;
                    &lt;li class=&quot;nav-item&quot; role=&quot;presentation&quot;&gt;
                      &lt;button type=&quot;button&quot; class=&quot;nav-link text-nowrap active&quot; data-bs-toggle=&quot;tab&quot; data-bs-target=&quot;#signin&quot; role=&quot;tab&quot; aria-controls=&quot;signin&quot; aria-selected=&quot;true&quot;&gt;
                        &lt;i class=&quot;fi-log-in fs-base opacity-75 ms-n1 me-2&quot;&gt;&lt;/i&gt;
                        Sign in
                      &lt;/button&gt;
                    &lt;/li&gt;
                    &lt;li class=&quot;nav-item&quot; role=&quot;presentation&quot;&gt;
                      &lt;button type=&quot;button&quot; class=&quot;nav-link text-nowrap&quot; data-bs-toggle=&quot;tab&quot; data-bs-target=&quot;#signup&quot; role=&quot;tab&quot; aria-controls=&quot;signup&quot; aria-selected=&quot;false&quot;&gt;
                        &lt;i class=&quot;fi-user fs-base opacity-75 ms-n1 me-2&quot;&gt;&lt;/i&gt;
                        Sign up
                      &lt;/button&gt;
                    &lt;/li&gt;
                  &lt;/ul&gt;
                &lt;/div&gt;

                &lt;!-- Modal body --&gt;
                &lt;div class=&quot;modal-body tab-content px-sm-5 pb-sm-5&quot;&gt;

                  &lt;!-- Tab with sign in form --&gt;
                  &lt;div class=&quot;tab-pane fade show active&quot; id=&quot;signin&quot; role=&quot;tabpanel&quot;&gt;
                    &lt;h2 class=&quot;h5 mb-4&quot;&gt;Welcome back&lt;/h2&gt;
                    &lt;form&gt;
                      &lt;div class=&quot;position-relative mb-4&quot;&gt;
                        &lt;input type=&quot;email&quot; class=&quot;form-control&quot; placeholder=&quot;Email&quot; required&gt;
                      &lt;/div&gt;
                      &lt;div class=&quot;mb-4&quot;&gt;
                        &lt;div class=&quot;password-toggle&quot;&gt;
                          &lt;input type=&quot;password&quot; class=&quot;form-control&quot; placeholder=&quot;Password&quot; required&gt;
                          &lt;label class=&quot;password-toggle-button fs-lg&quot; aria-label=&quot;Show/hide password&quot;&gt;
                            &lt;input type=&quot;checkbox&quot; class=&quot;btn-check&quot;&gt;
                          &lt;/label&gt;
                        &lt;/div&gt;
                      &lt;/div&gt;
                      &lt;div class=&quot;form-check mb-4&quot;&gt;
                        &lt;input type=&quot;checkbox&quot; class=&quot;form-check-input&quot; id=&quot;remember-30&quot;&gt;
                        &lt;label for=&quot;remember-30&quot; class=&quot;form-check-label&quot;&gt;Remember for 30 days&lt;/label&gt;
                      &lt;/div&gt;
                      &lt;button type=&quot;submit&quot; class=&quot;btn btn-primary w-100&quot;&gt;Sign In&lt;/button&gt;
                    &lt;/form&gt;
                  &lt;/div&gt;

                  &lt;!-- Tab with sign up form --&gt;
                  &lt;div class=&quot;tab-pane fade&quot; id=&quot;signup&quot; role=&quot;tabpanel&quot;&gt;
                    &lt;h2 class=&quot;h5&quot;&gt;Create an account&lt;/h2&gt;
                    &lt;form&gt;
                      &lt;div class=&quot;position-relative mb-3&quot;&gt;
                        &lt;label for=&quot;register-email&quot; class=&quot;form-label&quot;&gt;Email&lt;/label&gt;
                        &lt;input type=&quot;email&quot; class=&quot;form-control&quot; id=&quot;register-email&quot; required&gt;
                      &lt;/div&gt;
                      &lt;div class=&quot;mb-4&quot;&gt;
                        &lt;label for=&quot;register-password&quot; class=&quot;form-label&quot;&gt;Password&lt;/label&gt;
                        &lt;div class=&quot;password-toggle&quot;&gt;
                          &lt;input type=&quot;password&quot; class=&quot;form-control&quot; id=&quot;register-password&quot; minlength=&quot;8&quot; placeholder=&quot;Minimum 8 characters&quot; required&gt;
                          &lt;label class=&quot;password-toggle-button fs-lg&quot; aria-label=&quot;Show/hide password&quot;&gt;
                            &lt;input type=&quot;checkbox&quot; class=&quot;btn-check&quot;&gt;
                          &lt;/label&gt;
                        &lt;/div&gt;
                      &lt;/div&gt;
                      &lt;div class=&quot;d-flex flex-column gap-2 mb-4&quot;&gt;
                        &lt;div class=&quot;form-check&quot;&gt;
                          &lt;input type=&quot;checkbox&quot; class=&quot;form-check-input&quot; id=&quot;save-pass&quot;&gt;
                          &lt;label for=&quot;save-pass&quot; class=&quot;form-check-label&quot;&gt;Save the password&lt;/label&gt;
                        &lt;/div&gt;
                      &lt;/div&gt;
                      &lt;button type=&quot;submit&quot; class=&quot;btn btn-primary w-100&quot;&gt;Create an account&lt;/button&gt;
                    &lt;/form&gt;
                  &lt;/div&gt;
                &lt;/div&gt;
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


        <!-- Live demo -->
        <section id="modal-demo" class="docs-section">
          <h4>Live demo</h4>
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
                  <button type="button" class="btn btn-outline-secondary me-2 mb-3" data-bs-toggle="modal" data-bs-target="#modalSmall">Small modal</button>
                  <button type="button" class="btn btn-outline-secondary me-2 mb-3" data-bs-toggle="modal" data-bs-target="#modalDefault">Default modal</button>
                  <button type="button" class="btn btn-outline-secondary me-2 mb-3" data-bs-toggle="modal" data-bs-target="#modalLarge">Large modal</button>
                  <button type="button" class="btn btn-outline-secondary me-2 mb-3" data-bs-toggle="modal" data-bs-target="#modalXL">Extra large modal</button>
                  <button type="button" class="btn btn-outline-secondary me-2 mb-3" data-bs-toggle="modal" data-bs-target="#modalLong">Long modal</button>
                  <button type="button" class="btn btn-outline-secondary me-2 mb-3" data-bs-toggle="modal" data-bs-target="#modalScroll">Srolling content</button>
                  <button type="button" class="btn btn-outline-secondary me-2 mb-3" data-bs-toggle="modal" data-bs-target="#modalCentered">Vertically centered modal</button>
                  <button type="button" class="btn btn-outline-secondary mb-3" data-bs-toggle="modal" data-bs-target="#modalFullscreen">Full screen modal</button>
                </div>
                <div id="html-3" class="tab-pane pt-4 fade" role="tabpanel">
                  <div class="position-relative" data-bs-theme="dark">
                    <button type="button" class="btn btn-sm btn-outline-secondary bg-dark position-absolute top-0 end-0 mt-2 px-2 z-3" data-copy-code="#modal-demo-code">
                      <i class="fi-copy fs-sm me-1"></i>
                      Copy
                    </button>
                    <pre id="modal-demo-code" class="code-highlight mx-n2 mb-n2"><code class="language-html">&lt;!-- Launch modal button --&gt;
        &lt;button type=&quot;button&quot; class=&quot;btn btn-outline-secondary&quot; data-bs-toggle=&quot;modal&quot; data-bs-target=&quot;#modalId&quot;&gt;
        Launch modal
        &lt;/button&gt;

        &lt;!-- Small modal --&gt;
        &lt;div class=&quot;modal fade&quot; id=&quot;modalId&quot; tabindex=&quot;-1&quot; role=&quot;dialog&quot;&gt;
          &lt;div class=&quot;modal-dialog modal-sm&quot; role=&quot;document&quot;&gt;
            &lt;div class=&quot;modal-content&quot;&gt;
            ...
            &lt;/div&gt;
          &lt;/div&gt;
        &lt;/div&gt;

        &lt;!-- Default modal --&gt;
        &lt;div class=&quot;modal fade&quot; id=&quot;modalId&quot; tabindex=&quot;-1&quot; role=&quot;dialog&quot;&gt;
          &lt;div class=&quot;modal-dialog&quot; role=&quot;document&quot;&gt;
            &lt;div class=&quot;modal-content&quot;&gt;
            ...
            &lt;/div&gt;
          &lt;/div&gt;
        &lt;/div&gt;

        &lt;!-- Large modal --&gt;
        &lt;div class=&quot;modal fade&quot; id=&quot;modalId&quot; tabindex=&quot;-1&quot; role=&quot;dialog&quot;&gt;
          &lt;div class=&quot;modal-dialog modal-lg&quot; role=&quot;document&quot;&gt;
            &lt;div class=&quot;modal-content&quot;&gt;
            ...
            &lt;/div&gt;
          &lt;/div&gt;
        &lt;/div&gt;

        &lt;!-- Extra large modal --&gt;
        &lt;div class=&quot;modal fade&quot; id=&quot;modalId&quot; tabindex=&quot;-1&quot; role=&quot;dialog&quot;&gt;
          &lt;div class=&quot;modal-dialog modal-xl&quot; role=&quot;document&quot;&gt;
            &lt;div class=&quot;modal-content&quot;&gt;
            ...
            &lt;/div&gt;
          &lt;/div&gt;
        &lt;/div&gt;

        &lt;!-- Modal with srolling content --&gt;
        &lt;div class=&quot;modal fade&quot; id=&quot;modalId&quot; tabindex=&quot;-1&quot; role=&quot;dialog&quot;&gt;
          &lt;div class=&quot;modal-dialog modal-dialog-scrollable&quot; role=&quot;document&quot;&gt;
            &lt;div class=&quot;modal-content&quot;&gt;
            ...
            &lt;/div&gt;
          &lt;/div&gt;
        &lt;/div&gt;

        &lt;!-- Vertically centered modal --&gt;
        &lt;div class=&quot;modal fade&quot; id=&quot;modalId&quot; tabindex=&quot;-1&quot; role=&quot;dialog&quot;&gt;
          &lt;div class=&quot;modal-dialog modal-dialog-centered&quot; role=&quot;document&quot;&gt;
            &lt;div class=&quot;modal-content&quot;&gt;
            ...
            &lt;/div&gt;
          &lt;/div&gt;
        &lt;/div&gt;

        &lt;!-- Full screen modal --&gt;
        &lt;div class=&quot;modal fade&quot; id=&quot;modalId&quot; tabindex=&quot;-1&quot; role=&quot;dialog&quot;&gt;
          &lt;div class=&quot;modal-dialog modal-fullscreen&quot; role=&quot;document&quot;&gt;
            &lt;div class=&quot;modal-content&quot;&gt;
            ...
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
  <script>
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