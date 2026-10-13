@extends('layouts.app')

@section('title', 'Finder | 404 Error - Split Screen (Contractors)')

@section('content')

  <!-- Page content -->
  <main class="content-wrapper position-relative d-flex">
    <div class="container position-relative z-2 flex-grow-1">
      <div class="row row-cols-1 row-cols-md-2 g-0 h-100">
        <div class="col d-flex flex-column pt-3 pb-4 pe-md-5">

          <!-- Logo -->
          <header class="navbar p-0">
            <a class="navbar-brand pt-0 pt-sm-1" href="home-contractors">
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
            </a>
          </header>


          <!-- 404 error page content -->
          <div class="pt-5 mt-auto">
            <h1 class="display-4 mb-sm-4">Page not found</h1>
            <p class="fs-lg mb-sm-4" style="max-width: 432px">The page you are looking for was moved, removed or might never existed.</p>
            <div class="position-relative d-flex align-items-center border-bottom py-3 py-sm-4">
              <i class="fi-grid fs-lg text-body-secondary me-2"></i>
              <a class="hover-effect-underline stretched-link fw-medium text-dark-emphasis text-decoration-none me-2" href="listings-contractors">Catalog</a>
              <i class="fi-chevron-right fs-xl text-secondary-emphasis ms-auto"></i>
            </div>
            <div class="position-relative d-flex align-items-center border-bottom py-3 py-sm-4">
              <i class="fi-tool fs-lg text-body-secondary me-2"></i>
              <a class="hover-effect-underline stretched-link fw-medium text-dark-emphasis text-decoration-none me-2" href="listings-contractors">Popular projects</a>
              <i class="fi-chevron-right fs-xl text-secondary-emphasis ms-auto"></i>
            </div>
            <div class="position-relative d-flex align-items-center border-bottom py-3 py-sm-4">
              <i class="fi-help-circle fs-lg text-body-secondary me-2"></i>
              <a class="hover-effect-underline stretched-link fw-medium text-dark-emphasis text-decoration-none me-2" href="#!">Help center</a>
              <i class="fi-chevron-right fs-xl text-secondary-emphasis ms-auto"></i>
            </div>
            <a class="btn btn-lg btn-primary mt-5" href="home-contractors">Go to homepage</a>
          </div>


          <!-- Footer -->
          <footer class="pt-5 pb-sm-2 pb-md-3 mt-auto">
            <p class="fs-sm mb-0">
              &copy; All rights reserved. Made by <a class="hover-effect-underline text-dark-emphasis fw-medium text-decoration-none" href="https://srbthemes.kcubeinfotech.com/portfolio" target="_blank" rel="noreferrer">SRBThemes</a>
            </p>
          </footer>
        </div>
      </div>
    </div>

    <!-- Cover image -->
    <div class="position-absolute top-0 end-0 w-50 h-100 bg-info d-none d-md-flex align-items-center justify-content-end overflow-hidden ps-4">
      <img src="{{ asset('assets/img/404/worker.jpg') }}" class="rounded-pill rounded-end-0 me-n1" width="777" alt="Image">
    </div>
  </main>

@endsection

@push('scripts')
  @vite(['resources/js/app.js'])
@endpush