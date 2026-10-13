@extends('layouts.app')

@section('title', 'Finder | Blog Layout v.1')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/vendor/choices.js/public/assets/styles/choices.min.css') }}">
@endpush

@section('content')

    @include('layouts.partials.header.real-estate-header')

    <!-- Categories modal -->
    <div class="modal fade" id="categoriesModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Categories</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <ul class="nav nav-pills gap-2">
                        <li class="nav-item d-md-none me-1">
                            <a class="nav-link active" aria-current="page" href="#!">All</a>
                        </li>
                        <li class="nav-item d-md-none me-1">
                            <a class="nav-link" href="#!">Real estate news</a>
                        </li>
                        <li class="nav-item d-md-none me-1">
                            <a class="nav-link" href="#!">Buying tips</a>
                        </li>
                        <li class="nav-item d-lg-none me-1">
                            <a class="nav-link" href="#!">Selling strategies</a>
                        </li>
                        <li class="nav-item d-xl-none me-1">
                            <a class="nav-link" href="#!">Market trends</a>
                        </li>
                        <li class="nav-item me-1">
                            <a class="nav-link" href="#!">Home improvement</a>
                        </li>
                        <li class="nav-item me-1">
                            <a class="nav-link" href="#!">Interior design</a>
                        </li>
                        <li class="nav-item me-1">
                            <a class="nav-link" href="#!">Renting advice</a>
                        </li>
                        <li class="nav-item me-1">
                            <a class="nav-link" href="#!">Neighborhood guides</a>
                        </li>
                        <li class="nav-item me-1">
                            <a class="nav-link" href="#!">Property management</a>
                        </li>
                        <li class="nav-item me-1">
                            <a class="nav-link" href="#!">Legal and tax issues</a>
                        </li>
                        <li class="nav-item me-1">
                            <a class="nav-link" href="#!">Investment advice</a>
                        </li>
                        <li class="nav-item me-1">
                            <a class="nav-link" href="#!">Mortgage and financing</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Page content -->
    <main class="content-wrapper">

        <!-- Featured post -->
        <section class="container pb-5 mb-1 mb-md-2 mb-md-3 mb-lg-4">
            <div class="bg-body-tertiary rounded overflow-hidden">
                <div class="row row-cols-1 row-cols-sm-2 g-0">
                    <div class="col position-relative" style="min-height: 220px">
                        <a class="hover-effect-scale position-absolute top-0 start-0 w-100 h-100 overflow-hidden" href="blog-single-v1">
                            <img src="{{ asset('assets/img/blog/v1/featured.jpg') }}" class="hover-effect-target position-absolute top-0 start-0 w-100 h-100 object-fit-cover" alt="Image">
                        </a>
                    </div>
                    <div class="col p-4 p-md-5">
                        <div class="p-sm-2 p-md-0 p-lg-2 p-xl-4 p-xxl-5">
                            <div class="nav mb-3">
                                <a class="nav-link fs-xs text-uppercase p-0" href="#!">Real estate news</a>
                            </div>
                            <h1>Top trends shaping modern real estate design</h1>
                            <p class="pb-sm-1 pb-md-2 pb-lg-3 pb-xl-0 mb-4 mb-xl-5">Discover the latest trends in contemporary architecture that are transforming modern real estate design today.</p>
                            <a class="btn btn-lg btn-dark" href="blog-single-v1">Read more</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <!-- Blog posts grid -->
        <section class="container pb-5 mb-xxl-3">
            <div class="pb-2 pb-sm-3 pb-md-4 pb-lg-5">

                <!-- Categories + Sorting select -->
                <div class="d-flex align-items-center justify-content-between pb-3 mb-2 mb-md-3">
                    <ul class="nav nav-pills gap-2 d-none d-md-flex">
                        <li class="nav-item me-1">
                            <a class="nav-link active" aria-current="page" href="#!">All</a>
                        </li>
                        <li class="nav-item me-1">
                            <a class="nav-link" href="#!">Real estate news</a>
                        </li>
                        <li class="nav-item me-1">
                            <a class="nav-link" href="#!">Buying tips</a>
                        </li>
                        <li class="nav-item d-none d-lg-block me-1">
                            <a class="nav-link" href="#!">Selling strategies</a>
                        </li>
                        <li class="nav-item d-none d-xl-block me-1">
                            <a class="nav-link" href="#!">Market trends</a>
                        </li>
                        <li class="nav-item me-1">
                            <button type="button" class="nav-link position-relative border-0" data-bs-toggle="modal" data-bs-target="#categoriesModal">
                                <span class="hover-effect-underline stretched-link">More categories</span>
                                <i class="fi-plus fs-base ms-1"></i>
                            </button>
                        </li>
                    </ul>
                    <button type="button" class="btn btn-outline-secondary d-md-none" data-bs-toggle="modal" data-bs-target="#categoriesModal">
                        <i class="fi-list fs-base ms-n1 me-2"></i>
                        Categories
                    </button>
                    <div class="position-relative" style="width: 125px">
                        <i class="fi-sort position-absolute top-50 start-0 translate-middle-y z-2"></i>
                        <select class="form-select border-0 rounded-0 ps-4 pe-1" data-select='{
                        "removeItemButton": false,
                        "classNames": {
                          "containerInner": ["form-select", "border-0", "rounded-0", "ps-4", "pe-1"]
                        }
                      }'>
                            <option value="Newest">Newest</option>
                            <option value="Popular">Popular</option>
                        </select>
                    </div>
                </div>


                <!-- Posts grid -->
                <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 gy-5">

                    <!-- Article -->
                    <article class="col mb-xl-2">
                        <a class="ratio d-flex hover-effect-scale rounded overflow-hidden mb-3 mb-sm-4" href="blog-single-v1" style="--fn-aspect-ratio: calc(300 / 416 * 100%)">
                            <img src="{{ asset('assets/img/blog/v1/01.jpg') }}" class="hover-effect-target" alt="Image">
                        </a>
                        <div class="nav pb-1 mb-2">
                            <a class="nav-link text-body-secondary fs-xs text-uppercase p-0" href="#!">Renting advice</a>
                        </div>
                        <h3 class="h5 mb-2">
                            <a class="hover-effect-underline" href="blog-single-v1">What to know when renting an apartment</a>
                        </h3>
                        <p class="fs-sm">It is quite difficult to find a good apartment for long-term rent in large cities. In addition, potential tenants can face prob...</p>
                        <div class="nav fs-sm gap-3">
                            <a class="nav-link fw-semibold p-0" href="#!">by Cody Fisher</a>
                            <span class="text-body-secondary">July 09, 2024</span>
                        </div>
                    </article>

                    <!-- Article -->
                    <article class="col mb-xl-2">
                        <a class="ratio d-flex hover-effect-scale rounded overflow-hidden mb-3 mb-sm-4" href="blog-single-v1" style="--fn-aspect-ratio: calc(300 / 416 * 100%)">
                            <img src="{{ asset('assets/img/blog/v1/02.jpg') }}" class="hover-effect-target" alt="Image">
                        </a>
                        <div class="nav pb-1 mb-2">
                            <a class="nav-link text-body-secondary fs-xs text-uppercase p-0" href="#!">Investment advice</a>
                        </div>
                        <h3 class="h5 mb-2">
                            <a class="hover-effect-underline" href="blog-single-v1">Types of luxury housing</a>
                        </h3>
                        <p class="fs-sm">What luxury housing is clear to every person. Housing characterized by increased comfort, interior, quality and ma...</p>
                        <div class="nav fs-sm gap-3">
                            <a class="nav-link fw-semibold p-0" href="#!">by Kristin Watson</a>
                            <span class="text-body-secondary">June 26, 2024</span>
                        </div>
                    </article>

                    <!-- Article -->
                    <article class="col mb-xl-2">
                        <a class="ratio d-flex hover-effect-scale rounded overflow-hidden mb-3 mb-sm-4" href="blog-single-v1" style="--fn-aspect-ratio: calc(300 / 416 * 100%)">
                            <img src="{{ asset('assets/img/blog/v1/03.jpg') }}" class="hover-effect-target" alt="Image">
                        </a>
                        <div class="nav pb-1 mb-2">
                            <a class="nav-link text-body-secondary fs-xs text-uppercase p-0" href="#!">Home improvement</a>
                        </div>
                        <h3 class="h5 mb-2">
                            <a class="hover-effect-underline" href="blog-single-v1">How to modernize your home on a budget</a>
                        </h3>
                        <p class="fs-sm">Modernizing your home doesn't have to break the bank. Here are some budget-friendly tips to give your living space a mo...</p>
                        <div class="nav fs-sm gap-3">
                            <a class="nav-link fw-semibold p-0" href="#!">by Darrell Steward</a>
                            <span class="text-body-secondary">May 13, 2024</span>
                        </div>
                    </article>

                    <!-- Article -->
                    <article class="col mb-xl-2">
                        <a class="ratio d-flex hover-effect-scale rounded overflow-hidden mb-3 mb-sm-4" href="blog-single-v1" style="--fn-aspect-ratio: calc(300 / 416 * 100%)">
                            <img src="{{ asset('assets/img/blog/v1/04.jpg') }}" class="hover-effect-target" alt="Image">
                        </a>
                        <div class="nav pb-1 mb-2">
                            <a class="nav-link text-body-secondary fs-xs text-uppercase p-0" href="#!">Selling strategies</a>
                        </div>
                        <h3 class="h5 mb-2">
                            <a class="hover-effect-underline" href="blog-single-v1">How real estate drone photography can elevate your listing?</a>
                        </h3>
                        <p class="fs-sm">In the competitive world of real estate, first impressions matter, and drone photography has become a game-chang...</p>
                        <div class="nav fs-sm gap-3">
                            <a class="nav-link fw-semibold p-0" href="#!">by Jacob Jones</a>
                            <span class="text-body-secondary">May 05, 2024</span>
                        </div>
                    </article>

                    <!-- Article -->
                    <article class="col mb-xl-2">
                        <a class="ratio d-flex hover-effect-scale rounded overflow-hidden mb-3 mb-sm-4" href="blog-single-v1" style="--fn-aspect-ratio: calc(300 / 416 * 100%)">
                            <img src="{{ asset('assets/img/blog/v1/05.jpg') }}" class="hover-effect-target" alt="Image">
                        </a>
                        <div class="nav pb-1 mb-2">
                            <a class="nav-link text-body-secondary fs-xs text-uppercase p-0" href="#!">Interior design</a>
                        </div>
                        <h3 class="h5 mb-2">
                            <a class="hover-effect-underline" href="blog-single-v1">10 delightful dining room decor trends for spring season</a>
                        </h3>
                        <p class="fs-sm">As the seasons change, so do the trends in interior design, and the dining room is no exception. Spring brings with it a...</p>
                        <div class="nav fs-sm gap-3">
                            <a class="nav-link fw-semibold p-0" href="#!">by Cody Fisher</a>
                            <span class="text-body-secondary">April 17, 2024</span>
                        </div>
                    </article>

                    <!-- Post -->
                    <article class="col mb-xl-2">
                        <a class="ratio d-flex hover-effect-scale rounded overflow-hidden mb-3 mb-sm-4" href="blog-single-v1" style="--fn-aspect-ratio: calc(300 / 416 * 100%)">
                            <img src="{{ asset('assets/img/blog/v1/06.jpg') }}" class="hover-effect-target" alt="Image">
                        </a>
                        <div class="nav pb-1 mb-2">
                            <a class="nav-link text-body-secondary fs-xs text-uppercase p-0" href="#!">Home improvement</a>
                        </div>
                        <h3 class="h5 mb-2">
                            <a class="hover-effect-underline" href="blog-single-v1">5 easy-to-ambitious projects to improve your home</a>
                        </h3>
                        <p class="fs-sm">Embarking on home improvement projects not only enhances your living space but also provides a fulfilling sense of acc...</p>
                        <div class="nav fs-sm gap-3">
                            <a class="nav-link fw-semibold p-0" href="#!">by Kathryn Murphy</a>
                            <span class="text-body-secondary">April 12, 2024</span>
                        </div>
                    </article>

                    <!-- Article -->
                    <article class="col mb-xl-2">
                        <a class="ratio d-flex hover-effect-scale rounded overflow-hidden mb-3 mb-sm-4" href="blog-single-v1" style="--fn-aspect-ratio: calc(300 / 416 * 100%)">
                            <img src="{{ asset('assets/img/blog/v1/07.jpg') }}" class="hover-effect-target" alt="Image">
                        </a>
                        <div class="nav pb-1 mb-2">
                            <a class="nav-link text-body-secondary fs-xs text-uppercase p-0" href="#!">Home improvement</a>
                        </div>
                        <h3 class="h5 mb-2">
                            <a class="hover-effect-underline" href="blog-single-v1">When is the right time to downsize home?</a>
                        </h3>
                        <p class="fs-sm">Deciding when to downsize your home is a personal choice that depends on various factors. Here are some common...</p>
                        <div class="nav fs-sm gap-3">
                            <a class="nav-link fw-semibold p-0" href="#!">by Darrell Steward</a>
                            <span class="text-body-secondary">March 29, 2024</span>
                        </div>
                    </article>

                    <!-- Article -->
                    <article class="col mb-xl-2">
                        <a class="ratio d-flex hover-effect-scale rounded overflow-hidden mb-3 mb-sm-4" href="blog-single-v1" style="--fn-aspect-ratio: calc(300 / 416 * 100%)">
                            <img src="{{ asset('assets/img/blog/v1/08.jpg') }}" class="hover-effect-target" alt="Image">
                        </a>
                        <div class="nav pb-1 mb-2">
                            <a class="nav-link text-body-secondary fs-xs text-uppercase p-0" href="#!">Interior design</a>
                        </div>
                        <h3 class="h5 mb-2">
                            <a class="hover-effect-underline" href="blog-single-v1">7 tips for achieving maximum coziness</a>
                        </h3>
                        <p class="fs-sm">Creating a cozy atmosphere in your home is a delightful way to enhance comfort and relaxation. Here are seven tips to...</p>
                        <div class="nav fs-sm gap-3">
                            <a class="nav-link fw-semibold p-0" href="#!">by Bessie Cooper</a>
                            <span class="text-body-secondary">March 10, 2024</span>
                        </div>
                    </article>

                    <!-- Article -->
                    <article class="col mb-xl-2">
                        <a class="ratio d-flex hover-effect-scale rounded overflow-hidden mb-3 mb-sm-4" href="blog-single-v1" style="--fn-aspect-ratio: calc(300 / 416 * 100%)">
                            <img src="{{ asset('assets/img/blog/v1/09.jpg') }}" class="hover-effect-target" alt="Image">
                        </a>
                        <div class="nav pb-1 mb-2">
                            <a class="nav-link text-body-secondary fs-xs text-uppercase p-0" href="#!">Investment advice</a>
                        </div>
                        <h3 class="h5 mb-2">
                            <a class="hover-effect-underline" href="blog-single-v1">Strategies for real estate investments</a>
                        </h3>
                        <p class="fs-sm">Discover key strategies for successful real estate investments in this guide. From identifying profitable properties to und...</p>
                        <div class="nav fs-sm gap-3">
                            <a class="nav-link fw-semibold p-0" href="#!">by Andrew Richards</a>
                            <span class="text-body-secondary">February 19, 2024</span>
                        </div>
                    </article>
                </div>

                <!-- Pagination -->
                <nav class="pt-5" aria-label="Pagination">
                    <ul class="pagination pagination-lg justify-content-center">
                        <li class="page-item active" aria-current="page">
                            <span class="page-link">
                                1
                                <span class="visually-hidden">(current)</span>
                            </span>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#!">2</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#!">3</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#!">4</a>
                        </li>
                        <li class="page-item">
                            <span class="page-link pe-none">...</span>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#!">8</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </section>
    </main>

    @include('layouts.partials.footer.real-estate-footer')

@endsection

@push('scripts')
    <script src="{{ asset('assets/vendor/choices.js/public/assets/scripts/choices.min.js') }}"></script>

    @vite(['resources/js/app.js'])
@endpush