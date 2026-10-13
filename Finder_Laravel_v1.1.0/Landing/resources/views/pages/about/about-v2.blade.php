@extends('layouts.app')

@section('title', 'Finder | About v.2')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}">
@endpush

@section('content')

    @include('layouts.partials.header.real-estate-header')

    <!-- Page content -->
    <main class="content-wrapper">

        <!-- Hero -->
        <section class="container pt-4 pt-sm-5 pb-5 mt-md-2 mt-lg-3 mt-xl-4 mb-xxl-3">
            <div class="row align-items-center justify-content-center pb-2 pb-sm-3 pb-md-4 pb-lg-5">

                <!-- Image -->
                <div class="col-9 col-sm-7 col-md-5 pb-2 pb-sm-0 mt-2 mt-sm-0 mb-4 mb-sm-5 mb-md-0">
                    <div class="position-relative rtl-flip">
                        <svg class="position-absolute z-1" style="top: 33.3%; right: 29%" xmlns="http://www.w3.org/2000/svg" width="14.25%" height="13.32%" viewBox="0 0 75 74" fill="none">
                            <path class="text-primary" d="M35.758 71.497l.059.003h.059.004.004.004.004.004.003.004.003.004.004.004.003.004.004.003.004.004.003.004.004.003.004.003.004.003.003.004.003.004.003.003.004.003.003.004.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003H37h.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.003.004.003.003.004.003.003.004.003.004.003.003.004.003.004.003.004.004.003.004.004.003.004.004.003.004.004.004.003.004.003.004.004.004.004.004 20.313C65.86 71.5 72.5 65.017 72.5 57V36.8c0-19.037-15.802-34.3-35-34.3-19.219 0-35 15.483-35 34.5 0 18.576 14.903 33.637 33.258 34.497z" fill="currentColor" stroke-width="5" style="stroke: var(--fn-body-bg)" />
                            <path d="M37.5 29.956c-5.928 0-10.811 4.808-10.811 10.644S31.572 51.244 37.5 51.244 48.311 46.436 48.311 40.6 43.427 29.956 37.5 29.956zM19.467 40.6c0-9.764 8.117-17.756 18.033-17.756S55.533 30.836 55.533 40.6c0 3.604-1.106 6.966-2.999 9.774l4.582 4.512c1.41 1.389 1.41 3.64 0 5.028s-3.697 1.389-5.107 0l-4.582-4.512c-2.852 1.865-6.267 2.953-9.927 2.953-9.916 0-18.033-7.992-18.033-17.756z" fill="#000" fill-opacity=".05" />
                            <g fill="#fff">
                                <path d="M37.296 24.111c-7.117 0-12.887 5.681-12.887 12.689s5.77 12.689 12.887 12.689S50.184 43.808 50.184 36.8s-5.77-12.689-12.887-12.689zM18.09 36.8c0-10.444 8.599-18.911 19.207-18.911S56.503 26.356 56.503 36.8s-8.599 18.911-19.207 18.911S18.09 47.244 18.09 36.8z" />
                                <path d="M48.062 47.4c1.234-1.215 3.235-1.215 4.469 0l6.094 6c1.234 1.215 1.234 3.185 0 4.4s-3.235 1.215-4.468 0l-6.094-6c-1.234-1.215-1.234-3.185 0-4.4z" />
                            </g>
                            <path d="M49.281 32.6c4.038 0 7.313-3.224 7.313-7.2s-3.274-7.2-7.312-7.2-7.312 3.224-7.312 7.2 3.274 7.2 7.313 7.2z" fill="#fff" />
                            <path class="text-primary" d="M49.281 20.867c-2.543 0-4.604 2.03-4.604 4.533s2.061 4.533 4.604 4.533 4.604-2.03 4.604-4.533-2.061-4.533-4.604-4.533zM39.26 25.4c0-5.449 4.486-9.867 10.021-9.867s10.021 4.418 10.021 9.867-4.486 9.867-10.021 9.867S39.26 30.849 39.26 25.4z" fill="currentColor" />
                        </svg>
                        <div class="ratio" style="--fn-aspect-ratio: calc(556 / 526 * 100%)">
                            <img src="{{ asset('assets/img/about/v2/hero.png') }}" alt="Image">
                        </div>
                    </div>
                </div>

                <!-- Text -->
                <div class="col-md-7 col-xl-6 offset-xl-1 text-center text-md-start">
                    <div class="ps-md-3 ps-lg-4 ps-xl-0">
                        <h1 class="display-3 pb-1 pb-md-2 pb-lg-3 pb-xl-4">We are new and growing fast</h1>
                        <p class="fs-lg pb-2 pb-lg-3 pb-xl-4">Welcome to Finder, your go-to platform for discovering reliable and skilled contractors for all your project needs. Whether you're planning a home renovation, commercial construction, or any specialized work.</p>
                        <div class="d-flex align-items-center justify-content-center justify-content-md-start">
                            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="none">
                                <path d="M25.176 14.273c0-.79-.064-1.585-.201-2.362h-10.97v4.479h6.281c-.129.715-.401 1.397-.8 2.005a5.38 5.38 0 0 1-1.524 1.529v2.905h3.747c2.202-2.024 3.465-5.017 3.465-8.555h.001z" fill="#2a84fc" />
                                <path d="M14.008 25.636c3.136 0 5.782-1.029 7.709-2.807l-3.748-2.906c-1.043.709-2.388 1.111-3.957 1.111-3.033 0-5.607-2.046-6.53-4.799H3.614v2.996a11.63 11.63 0 0 0 10.394 6.405z" fill="#00ac47" />
                                <path d="M7.476 16.235c-.487-1.444-.487-3.009 0-4.453V8.785H3.612a11.64 11.64 0 0 0 0 10.445l3.864-2.996v.001z" fill="#ffba00" />
                                <path d="M14.008 6.979a6.32 6.32 0 0 1 4.461 1.743l3.32-3.32a11.18 11.18 0 0 0-7.782-3.025A11.63 11.63 0 0 0 3.614 8.785l3.864 2.998c.918-2.757 3.495-4.804 6.53-4.804z" fill="#fc2c25" />
                            </svg>
                            <div class="fs-sm fw-semibold text-dark-emphasis ms-1 me-3">Google</div>
                            <i class="fi-star-filled fs-xl text-warning me-1"></i>
                            <div class="fs-sm fw-semibold text-dark-emphasis">4.9</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <!-- Key features -->
        <section class="bg-info py-5">
            <div class="container py-2 py-sm-3 py-md-4 py-lg-5 mb-xxl-3">
                <h2 class="h1 text-white pb-1 pb-sm-2 pb-md-3 pb-lg-0 mb-4 mb-lg-5">Key features</h2>

                <!-- Row of cards that turns into carousel on screens < 992px wide (lg breakpoint) -->
                <div class="swiper" data-swiper='{
                            "slidesPerView": 1,
                            "spaceBetween": 24,
                            "pagination": {
                              "el": ".swiper-pagination",
                              "clickable": true
                            },
                            "breakpoints": {
                              "680": {
                                "slidesPerView": 2
                              },
                              "992": {
                                "slidesPerView": 3
                              }
                            }
                          }'>
                    <div class="swiper-wrapper">

                        <!-- Card -->
                        <div class="swiper-slide h-auto">
                            <div class="card h-100 border-0 rounded-4 p-sm-2">
                                <div class="card-body">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64">
                                        <path class="text-info" d="M59.68 61.071v1.704c0 .676-.549 1.225-1.225 1.225H5.545c-.676 0-1.225-.549-1.225-1.225v-1.704c0-3.929 2.786-7.306 6.645-8.054l2.869-.633 6.392-1.407 6.113-1.346h11.203l3.476.76 2.704.591 6.391 1.396 2.922.639c3.859.748 6.645 4.125 6.645 8.054z" fill="currentColor" />
                                        <path class="text-info-emphasis" d="M13.834 59.126h36.279V64H13.834v-4.874z" fill="currentColor" />
                                        <path d="M18.722 30.49c-1.82 0-3.301-1.79-3.323-4.015-.023-2.264 1.472-4.115 3.323-4.115l1.25 4.065-1.25 4.065zm26.563 0c1.82 0 3.301-1.79 3.323-4.015.023-2.264-1.472-4.115-3.323-4.115l-1.25 4.065 1.25 4.065z" fill="#ffab8a" />
                                        <path d="M37.441 49.431l.1.2v.223a5.61 5.61 0 0 1-5.601 5.6 5.57 5.57 0 0 1-3.906-1.586 5.56 5.56 0 0 1-1.695-4.014v-.223l.101-.2c.271-.537.45-1.112.532-1.709l.046-.525c.027-.712-.085-1.429-.331-2.099l-.756-2.049h12.018l-.755 2.049a5.45 5.45 0 0 0-.329 2.144l.044.479a5.41 5.41 0 0 0 .532 1.71z" fill="#ffd9c0" />
                                        <path d="M37.194 45.099a5.45 5.45 0 0 0-.329 2.144 8.66 8.66 0 0 1-4.869 1.505h-.039c-1.766 0-3.496-.546-4.939-1.55.027-.712-.085-1.429-.331-2.099l-.756-2.049h12.018l-.755 2.049z" fill="#ffbca1" />
                                        <path d="M45.559 32.329c0 3.198-2.621 6.97-7.791 11.219l-.326.266a8.66 8.66 0 0 1-5.445 1.934h-.039c-1.982 0-3.919-.687-5.456-1.939-5.382-4.354-8.113-8.218-8.113-11.48 0-.362.014-.706.043-1.022.13-1.326.169-5.545.091-9.815-.003-.085.03-.165.089-.225a.31.31 0 0 1 .223-.094h.001l24.047.005h2.265c.084 0 .164.034.223.093s.091.141.09.225c-.065 3.609-.089 8.34.056 9.799a13 13 0 0 1 .043 1.035z" fill="#ffd9c0" />
                                        <path class="text-info-emphasis" d="M20.226 50.978V64h-6.392V52.385l6.392-1.407zm29.886 1.401V64h-6.391V50.983l3.688.805 2.704.591z" fill="currentColor" />
                                        <path d="M35.534 34.51a.94.94 0 0 0-1.148.663c-.295 1.103-1.301 1.873-2.446 1.873s-2.149-.77-2.444-1.873a.94.94 0 0 0-1.148-.663.94.94 0 0 0-.663 1.148 4.41 4.41 0 0 0 8.512 0 .94.94 0 0 0-.663-1.148z" fill="#ffab8a" />
                                        <path class="text-info-emphasis" d="M50.112 52.379V64h-2.704V51.788l2.704.591z" fill="currentColor" />
                                        <path d="M13.834 59.126h6.392V64h-6.392v-4.874zm29.887 0h6.391V64h-6.391v-4.874z" fill="currentColor" style="color: var(--fn-info-border-subtle)" />
                                        <path class="text-warning" d="M47.692 14.671v4.882c0 .519-.419.938-.937.938H17.189c-.518 0-.937-.419-.937-.937v-4.882A12.61 12.61 0 0 1 28.846 2.079h6.251a12.61 12.61 0 0 1 12.595 12.592z" fill="currentColor" />
                                        <g class="text-warning-emphasis" fill="currentColor" data-bs-theme="light">
                                            <path d="M47.692 14.671v4.882c0 .519-.419.938-.937.938h-2.389c.412 0 .746-.419.746-.937v-4.882c0-6.944-4.492-12.592-10.015-12.592a12.61 12.61 0 0 1 12.595 12.592z" />
                                            <path d="M47.692 14.671v4.882c0 .519-.419.938-.937.938H17.189c-.518 0-.937-.419-.937-.937v-4.882h31.441z" />
                                            <path d="M35.064.938v18.616c0 .519-.419.938-.937.938h-4.115c-.517 0-.937-.419-.937-.937V.938A.94.94 0 0 1 30.011 0h4.115c.519 0 .938.42.938.938z" />
                                        </g>
                                        <path class="text-warning" d="M51.435 19.554v1.664a3.45 3.45 0 0 1-3.445 3.444H16.01a3.45 3.45 0 0 1-3.445-3.444v-1.664a.94.94 0 0 1 .938-.937h36.995a.94.94 0 0 1 .938.938z" fill="currentColor" />
                                        <path class="text-warning-emphasis" data-bs-theme="light" d="M51.435 19.554v1.664a3.45 3.45 0 0 1-3.445 3.444h-2.826c1.902 0 3.445-1.543 3.445-3.444v-1.664a.94.94 0 0 0-.937-.937h2.826a.94.94 0 0 1 .938.938z" fill="currentColor" />
                                    </svg>
                                    <h3 class="h4 pt-4 pb-1 mb-2">Verified contractors</h3>
                                    <p class="mb-0">Our platform boasts a meticulously vetted network of contractors across various specialties. Each contractor undergoes a rigorous verification process, including background checks, license verification.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Card -->
                        <div class="swiper-slide h-auto">
                            <div class="card h-100 border-0 rounded-4 p-sm-2">
                                <div class="card-body">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64">
                                        <path class="text-primary" d="M23.031 47.264c10.147 7.161 24.273 6.202 33.354-2.879 10.167-10.167 10.154-26.659-.04-36.809C46.204-2.523 29.403-2.403 19.4 7.832c-8.881 9.088-9.769 23.072-2.663 33.139.376.532.29 1.263-.196 1.697l-3.762 3.366 5.185 5.185 3.366-3.762c.435-.486 1.166-.57 1.699-.194z" fill="currentColor" />
                                        <path d="M38 45.062c-6.179 0-11.703-1.864-15.372-6.266A19.92 19.92 0 0 1 18 26c0-11.046 8.954-20 20-20a19.92 19.92 0 0 1 12.722 4.567c4.445 3.668 6.473 9.259 6.473 15.472 0 11.046-8.149 19.023-19.195 19.023z" fill="currentColor" style="color: var(--fn-body-bg)" />
                                        <path d="M50.796 10.629a19.92 19.92 0 0 1 4.629 12.796c0 11.046-8.954 20-20 20a19.92 19.92 0 0 1-12.796-4.629C26.297 43.198 31.821 46 38 46c11.046 0 20-8.954 20-20 0-6.179-2.802-11.703-7.204-15.371z" fill="currentColor" style="color: var(--fn-primary-border-subtle)" />
                                        <path d="M6.723 63.786L17.965 51.22l-5.185-5.185L.215 57.277c-.136.122-.214.297-.214.48v5.599c0 .356.288.644.644.644h5.599c.183 0 .358-.078.48-.215z" fill="#333d4c" />
                                        <path class="text-info" d="M55 18a9 9 0 1 0 0-18 9 9 0 1 0 0 18z" fill="currentColor" />
                                        <path class="text-info-emphasis" d="M60.325 1.744a8.96 8.96 0 0 1 1.743 5.325 9 9 0 0 1-9 9 8.96 8.96 0 0 1-5.325-1.744C49.382 16.554 52.022 18 55 18a9 9 0 0 0 9-9c0-2.978-1.447-5.618-3.675-7.256z" fill="currentColor" />
                                        <path d="M59.356 7h-1.712C57.288 7 57 6.712 57 6.356V4.644c0-.356-.288-.644-.644-.644h-2.712c-.356 0-.644.288-.644.644v1.712c0 .356-.288.644-.644.644h-1.712c-.356 0-.644.288-.644.644v2.712c0 .356.288.644.644.644h1.712c.356 0 .644.288.644.644v1.712c0 .356.288.644.644.644h2.712c.356 0 .644-.288.644-.644v-1.712c0-.356.288-.644.644-.644h1.712c.356 0 .644-.288.644-.644V7.644c0-.356-.288-.644-.644-.644z" fill="#fff" />
                                        <path d="M18.908 53.129c-.247 0-.494-.094-.683-.283l-7.071-7.071c-.377-.377-.377-.989 0-1.366s.989-.377 1.366 0l7.071 7.071c.377.377.377.989 0 1.366-.189.189-.436.283-.683.283z" fill="#333d4c" />
                                    </svg>
                                    <h3 class="h4 pt-4 pb-1 mb-2">Advanced search</h3>
                                    <p class="mb-0">Finder Contractor offers sophisticated search tools that allow you to filter contractors based on criteria such as location, project type, budget, and specific skills.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Card -->
                        <div class="swiper-slide h-auto">
                            <div class="card h-100 border-0 rounded-4 p-sm-2">
                                <div class="card-body">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64">
                                        <path class="text-primary" d="M37.257 28.884L20.404 50.43h16.853V28.884zM45 56.486c0 .836-.694 1.514-1.549 1.514H7.241c-1.026 0-1.607-1.15-.984-1.947L43.611 8.299c.45-.575 1.389-.264 1.389.46v47.727z" fill="currentColor" />
                                        <path class="text-warning" d="M52.763 11.765l1.779-4.449c.169-.422.766-.422.935 0l1.779 4.449c.178.446.27.922.27 1.402v40.8h-5.033V13.167a3.77 3.77 0 0 1 .27-1.402z" fill="currentColor" />
                                        <path d="M55.476 7.316c-.169-.422-.766-.422-.935 0l-1.78 4.449c-.178.446-.27.922-.27 1.402v.531h5.033v-.531a3.77 3.77 0 0 0-.27-1.402l-1.779-4.448z" fill="#e0e5eb" />
                                        <path d="M55.009 7c-.191 0-.383.105-.467.316l-1.78 4.448c-.178.446-.27.922-.27 1.402v.531h2.517V7z" fill="#cad0d9" />
                                        <g class="text-warning-emphasis" data-bs-theme="light" fill="currentColor">
                                            <path d="M55.009 13.698h-2.517v40.268h2.517V13.698z" />
                                            <path d="M57.525 52.708h-5.033v2.517h5.033v-2.517z" />
                                        </g>
                                        <path class="text-warning" d="M57.526 52.708h-2.517v2.517h2.517v-2.517z" fill="currentColor" />
                                        <path class="text-primary" d="M53.75 59h2.517a1.26 1.26 0 0 0 1.258-1.258v-2.517h-5.033v2.517A1.26 1.26 0 0 0 53.75 59z" fill="currentColor" />
                                        <path class="text-primary-emphasis" data-bs-theme="light" d="M55.008 57.742v-2.517h-2.517v2.517A1.26 1.26 0 0 0 53.75 59h2.517a1.26 1.26 0 0 1-1.258-1.258zM54.54 7.316l-1.043 2.607h3.02l-1.043-2.607c-.169-.422-.766-.422-.935 0z" fill="currentColor" />
                                    </svg>
                                    <h3 class="h4 pt-4 pb-1 mb-2">Project management</h3>
                                    <p class="mb-0">Manage your projects effortlessly with our integrated project management tools. Features include real-time chat, scheduling, progress tracking, and document sharing, enabling smooth communication.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Pagination (Bullets) -->
                    <div class="swiper-pagination position-static mt-3" data-bs-theme="light"></div>
                </div>
            </div>
        </section>


        <!-- Principles -->
        <section class="container pt-2 pt-sm-3 pt-md-4 pt-lg-5 pb-5 my-xxl-3">
            <h2 class="h1 pt-5 pb-1 pb-sm-2 pb-md-3 pb-lg-0 mb-4 mb-lg-5">Our principles</h2>
            <div class="row row-cols-1 row-cols-md-2">
                <div class="col d-flex flex-column gap-4 mb-4 mb-md-0">

                    <!-- Card -->
                    <div class="position-relative bg-body-tertiary rounded-4 overflow-hidden">
                        <div class="position-absolute top-0 start-0 w-100 h-100 z-2 p-4">
                            <div class="p-lg-2 p-xl-3">
                                <h3 class="text-white pb-1 pb-lg-0 mb-2 mb-lg-3">Commitment to quality</h3>
                                <p class="fs-lg text-white mb-0 d-none d-lg-block">We feature only the top contractors who excel in craftsmanship and professionalism, ensuring every project meets the highest standards of quality.</p>
                                <p class="fs-sm text-white mb-0 d-lg-none">We feature only the top contractors who excel in craftsmanship and professionalism, ensuring every project meets the highest standards of quality.</p>
                            </div>
                        </div>
                        <div class="ratio d-sm-none" style="--fn-aspect-ratio: calc(300 / 467 * 100%)"></div>
                        <div class="ratio d-none d-sm-block d-md-none" style="--fn-aspect-ratio: calc(350 / 697 * 100%)"></div>
                        <div class="ratio d-none d-md-block" style="--fn-aspect-ratio: calc(664 / 636 * 100%)"></div>
                        <img src="{{ asset('assets/img/about/v2/principles/01.jpg') }}" class="position-absolute top-0 start-0 w-100 h-100 object-fit-cover" alt="Image">
                        <span class="position-absolute top-0 start-0 w-100 h-100 z-1 bg-black bg-opacity-50 d-sm-none"></span>
                        <span class="position-absolute top-0 start-0 w-100 h-100 z-1 d-none d-sm-block" style="background: linear-gradient(0deg, rgba(0,0,0, 0) 0%, rgba(0,0,0, .6) 100%)"></span>
                    </div>

                    <!-- Card -->
                    <div class="position-relative bg-body-tertiary rounded-4 overflow-hidden">
                        <div class="position-absolute top-0 start-0 w-100 h-100 z-2 p-4">
                            <div class="p-lg-2 p-xl-3">
                                <h3 class="text-white pb-1 pb-lg-0 mb-2 mb-lg-3">Dependability and trust</h3>
                                <p class="fs-lg text-white mb-0 d-none d-lg-block">We connect you with reliable contractors who are punctual, responsive, and consistent, guaranteeing your project remains on schedule and within scope.</p>
                                <p class="fs-sm text-white mb-0 d-lg-none">We connect you with reliable contractors who are punctual, responsive, and consistent, guaranteeing your project remains on schedule and within scope.</p>
                            </div>
                        </div>
                        <div class="ratio d-sm-none" style="--fn-aspect-ratio: calc(300 / 467 * 100%)"></div>
                        <div class="ratio d-none d-sm-block d-md-none" style="--fn-aspect-ratio: calc(350 / 697 * 100%)"></div>
                        <div class="ratio d-none d-md-block" style="--fn-aspect-ratio: calc(617 / 636 * 100%)"></div>
                        <img src="{{ asset('assets/img/about/v2/principles/02.jpg') }}" class="position-absolute top-0 start-0 w-100 h-100 object-fit-cover" alt="Image">
                        <span class="position-absolute top-0 start-0 w-100 h-100 z-1 bg-black bg-opacity-50 d-sm-none"></span>
                        <span class="position-absolute top-0 start-0 w-100 h-100 z-1 d-none d-sm-block" style="background: linear-gradient(0deg, rgba(0,0,0, 0) 0%, rgba(0,0,0, .6) 100%)"></span>
                    </div>
                </div>
                <div class="col d-flex flex-column gap-4">

                    <!-- Card -->
                    <div class="position-relative bg-body-tertiary rounded-4 overflow-hidden">
                        <div class="position-absolute top-0 start-0 w-100 h-100 z-2 p-4">
                            <div class="p-lg-2 p-xl-3">
                                <h3 class="text-white pb-1 pb-lg-0 mb-2 mb-lg-3">Full transparency</h3>
                                <p class="fs-lg text-white mb-0 d-none d-lg-block">We emphasize clarity and openness, offering detailed contractor profiles with credentials, past projects.</p>
                                <p class="fs-sm text-white mb-0 d-lg-none">We emphasize clarity and openness, offering detailed contractor profiles with credentials, past projects.</p>
                            </div>
                        </div>
                        <div class="ratio d-sm-none" style="--fn-aspect-ratio: calc(300 / 467 * 100%)"></div>
                        <div class="ratio d-none d-sm-block d-md-none" style="--fn-aspect-ratio: calc(350 / 697 * 100%)"></div>
                        <div class="ratio d-none d-md-block" style="--fn-aspect-ratio: calc(452 / 636 * 100%)"></div>
                        <img src="{{ asset('assets/img/about/v2/principles/03.jpg') }}" class="position-absolute top-0 start-0 w-100 h-100 object-fit-cover" alt="Image">
                        <span class="position-absolute top-0 start-0 w-100 h-100 z-1 bg-black bg-opacity-50 d-sm-none"></span>
                        <span class="position-absolute top-0 start-0 w-100 h-100 z-1 d-none d-sm-block" style="background: linear-gradient(0deg, rgba(0,0,0, 0) 0%, rgba(0,0,0, .6) 100%)"></span>
                    </div>

                    <!-- Card -->
                    <div class="position-relative bg-body-tertiary rounded-4 overflow-hidden">
                        <div class="position-absolute top-0 start-0 w-100 h-100 z-2 p-4">
                            <div class="p-lg-2 p-xl-3">
                                <h3 class="text-white pb-1 pb-lg-0 mb-2 mb-lg-3">Client-centric approach</h3>
                                <p class="fs-lg text-white mb-0 d-none d-lg-block">Share experiences and helping us continually enhance our platform's service quality.</p>
                                <p class="fs-sm text-white mb-0 d-lg-none">Share experiences and helping us continually enhance our platform's service quality.</p>
                            </div>
                        </div>
                        <div class="ratio d-sm-none" style="--fn-aspect-ratio: calc(300 / 467 * 100%)"></div>
                        <div class="ratio d-none d-sm-block d-md-none" style="--fn-aspect-ratio: calc(350 / 697 * 100%)"></div>
                        <div class="ratio d-none d-md-block" style="--fn-aspect-ratio: calc(353 / 636 * 100%)"></div>
                        <img src="{{ asset('assets/img/about/v2/principles/04.jpg') }}" class="position-absolute top-0 start-0 w-100 h-100 object-fit-cover" alt="Image">
                        <span class="position-absolute top-0 start-0 w-100 h-100 z-1 bg-black bg-opacity-50 d-sm-none"></span>
                        <span class="position-absolute top-0 start-0 w-100 h-100 z-1 d-none d-sm-block" style="background: linear-gradient(0deg, rgba(0,0,0, 0) 0%, rgba(0,0,0, .6) 100%)"></span>
                    </div>

                    <!-- Card -->
                    <div class="position-relative bg-body-tertiary rounded-4 overflow-hidden">
                        <div class="position-absolute top-0 start-0 w-100 h-100 z-2 p-4">
                            <div class="p-lg-2 p-xl-3">
                                <h3 class="text-white pb-1 pb-lg-0 mb-2 mb-lg-3">Integrity in every interaction</h3>
                                <p class="fs-lg text-white mb-0 d-none d-lg-block">We maintain the highest ethical standards, ensuring our contractors follow fair practices and professional conduct throughout their engagements.</p>
                                <p class="fs-sm text-white mb-0 d-lg-none">We maintain the highest ethical standards, ensuring our contractors follow fair practices and professional conduct throughout their engagements.</p>
                            </div>
                        </div>
                        <div class="ratio d-sm-none" style="--fn-aspect-ratio: calc(300 / 467 * 100%)"></div>
                        <div class="ratio d-none d-sm-block d-md-none" style="--fn-aspect-ratio: calc(350 / 697 * 100%)"></div>
                        <div class="ratio d-none d-md-block" style="--fn-aspect-ratio: calc(452 / 636 * 100%)"></div>
                        <img src="{{ asset('assets/img/about/v2/principles/05.jpg') }}" class="position-absolute top-0 start-0 w-100 h-100 object-fit-cover" alt="Image">
                        <span class="position-absolute top-0 start-0 w-100 h-100 z-1 bg-black bg-opacity-50 d-sm-none"></span>
                        <span class="position-absolute top-0 start-0 w-100 h-100 z-1 d-none d-sm-block" style="background: linear-gradient(0deg, rgba(0,0,0, 0) 0%, rgba(0,0,0, .6) 100%)"></span>
                    </div>
                </div>
            </div>
        </section>


        <!-- Our story (Timeline) -->
        <section class="container py-2 py-sm-3 py-md-4 py-lg-5 my-xxl-3">
            <h2 class="h1 pb-1 pb-sm-2 pb-md-3 pb-lg-0 mb-4 mb-lg-5">Finder story</h2>
            <div class="overflow-y-auto pb-4 mb-4">
                <div class="d-flex gap-4" style="min-width: 860px">
                    <div class="w-100">
                        <div class="d-flex align-items-center gap-3">
                            <div class="btn btn-lg btn-outline-info rounded-pill pe-none">2022</div>
                            <div class="w-100 border-top border-info-subtle me-n2"></div>
                        </div>
                        <h3 class="h5 pt-3 pb-1 mt-3 mb-2">The vision takes shape</h3>
                        <p class="mb-0">In early 2022, a team with backgrounds in construction, technology, and customer service saw a pressing need in the market.</p>
                    </div>
                    <div class="w-100">
                        <div class="d-flex align-items-center gap-3">
                            <div class="btn btn-lg btn-outline-info rounded-pill pe-none">2023</div>
                            <div class="w-100 border-top border-info-subtle me-n2"></div>
                        </div>
                        <h3 class="h5 pt-3 pb-1 mt-3 mb-2">Building trust</h3>
                        <p class="mb-0">After a successful beta launch in late 2022, the platform officially went live, quickly gaining traction among homeowners and business owners.</p>
                    </div>
                    <div class="w-100">
                        <div class="d-flex align-items-center gap-3">
                            <div class="btn btn-lg btn-outline-info rounded-pill pe-none">2024</div>
                            <div class="w-100 border-top border-info-subtle me-n2"></div>
                        </div>
                        <h3 class="h5 pt-3 pb-1 mt-3 mb-2">Leading the market</h3>
                        <p class="mb-0">The platform's reputation for reliability and client satisfaction attracted a growing user base, leading to exponential growth.</p>
                    </div>
                    <div class="w-100">
                        <div class="d-flex align-items-center gap-3">
                            <div class="btn btn-lg btn-outline-info rounded-pill pe-none">2025</div>
                        </div>
                        <h3 class="h5 pt-3 pb-1 mt-3 mb-2">The future ahead</h3>
                        <p class="mb-0">As Finder Contractor looks to the future, the team remains dedicated to refining the platform and expanding its reach.</p>
                    </div>
                </div>
            </div>
        </section>


        <!-- Testimonials -->
        <section class="bg-info py-5">
            <div class="container py-2 py-sm-3 py-md-4 py-lg-5 mb-xxl-3">
                <div class="d-flex justify-content-between gap-4 pt-1 pt-sm-2 pt-lg-0 pb-2 pb-md-3 pb-lg-0 mb-4 mb-lg-5">
                    <h2 class="h1 text-white mb-0">Users about Finder</h2>

                    <!-- Carousel controls (Prev/next buttons) -->
                    <div class="d-flex gap-2">
                        <button type="button" class="btn btn-icon btn-lg btn-outline-light bg-transparent text-white border-light animate-slide-start rounded-circle me-1" id="prevTestimonial" aria-label="Prev">
                            <i class="fi-chevron-left fs-xl animate-target"></i>
                        </button>
                        <button type="button" class="btn btn-icon btn-lg btn-outline-light bg-transparent text-white border-light animate-slide-end rounded-circle" id="nextTestimonial" aria-label="Next">
                            <i class="fi-chevron-right fs-xl animate-target"></i>
                        </button>
                    </div>
                </div>

                <!-- Carousel of testimonials (cards) -->
                <div class="swiper" data-swiper='{
                            "slidesPerView": 1,
                            "spaceBetween": 24,
                            "loop": true,
                            "navigation": {
                              "prevEl": "#prevTestimonial",
                              "nextEl": "#nextTestimonial"
                            },
                            "breakpoints": {
                              "680": {
                                "slidesPerView": 2
                              },
                              "992": {
                                "slidesPerView": 3
                              }
                            }
                          }'>
                    <div class="swiper-wrapper">

                        <!-- Testimonial -->
                        <div class="swiper-slide h-auto">
                            <div class="card h-100 border-0 rounded-4 p-sm-2">
                                <div class="card-body">
                                    <div class="position-relative rtl-flip" style="width: 96px">
                                        <svg class="position-absolute top-0 z-1" style="right: 0; margin-right: -13px" xmlns="http://www.w3.org/2000/svg" width="36" height="36">
                                            <circle cx="18" cy="18" r="18" fill="#d85151" />
                                            <path d="M13.946 10.5l3.797 2.247c-1.403 2.772-2.131 5.365-2.181 7.781V25.5H9.25v-4.635c.017-1.703.48-3.535 1.386-5.492s2.009-3.581 3.31-4.873zm9.006 0l3.797 2.247c-1.402 2.772-2.13 5.365-2.181 7.781V25.5h-6.312v-4.635c.016-1.703.479-3.535 1.385-5.492s2.011-3.581 3.31-4.873z" fill="#fff" />
                                        </svg>
                                        <div class="ratio ratio-1x1 bg-body-secondary rounded-circle overflow-hidden">
                                            <img src="{{ asset('assets/img/about/v2/avatars/01.jpg') }}" alt="Avatar">
                                        </div>
                                    </div>
                                    <p class="fs-lg text-dark-emphasis pt-4 mb-0">I had a <span class="fw-semibold">fantastic experience using Finder for my office remodel.</span> The platform is very user-friendly, with an intuitive interface that makes searching and comparing contractors a breeze. I particularly appreciated the seamless project management tools.</p>
                                </div>
                                <div class="card-footer bg-transparent border-0 pt-0 pb-4">
                                    <div class="h6 mb-1">Liza Rogers</div>
                                    <div class="fs-sm text-body-secondary">One-time cleaning service</div>
                                </div>
                            </div>
                        </div>

                        <!-- Testimonial -->
                        <div class="swiper-slide h-auto">
                            <div class="card h-100 border-0 rounded-4 p-sm-2">
                                <div class="card-body">
                                    <div class="position-relative rtl-flip" style="width: 96px">
                                        <svg class="position-absolute top-0 z-1" style="right: 0; margin-right: -13px" xmlns="http://www.w3.org/2000/svg" width="36" height="36">
                                            <circle cx="18" cy="18" r="18" fill="#d85151" />
                                            <path d="M13.946 10.5l3.797 2.247c-1.403 2.772-2.131 5.365-2.181 7.781V25.5H9.25v-4.635c.017-1.703.48-3.535 1.386-5.492s2.009-3.581 3.31-4.873zm9.006 0l3.797 2.247c-1.402 2.772-2.13 5.365-2.181 7.781V25.5h-6.312v-4.635c.016-1.703.479-3.535 1.385-5.492s2.011-3.581 3.31-4.873z" fill="#fff" />
                                        </svg>
                                        <div class="ratio ratio-1x1 bg-body-secondary rounded-circle overflow-hidden">
                                            <img src="{{ asset('assets/img/about/v2/avatars/02.jpg') }}" alt="Avatar">
                                        </div>
                                    </div>
                                    <p class="fs-lg text-dark-emphasis pt-4 mb-0">Finder has become my go-to platform for all my contracting needs. As a property manager, I often need reliable contractors for various maintenance and renovation projects. <span class="fw-semibold">Finder Contractor provides a comprehensive list of professionals.</span></p>
                                </div>
                                <div class="card-footer bg-transparent border-0 pt-0 pb-4">
                                    <div class="h6 mb-1">Michael Howard</div>
                                    <div class="fs-sm text-body-secondary">Fence installation &amp; repair</div>
                                </div>
                            </div>
                        </div>

                        <!-- Testimonial -->
                        <div class="swiper-slide h-auto">
                            <div class="card h-100 border-0 rounded-4 p-sm-2">
                                <div class="card-body">
                                    <div class="position-relative rtl-flip" style="width: 96px">
                                        <svg class="position-absolute top-0 z-1" style="right: 0; margin-right: -13px" xmlns="http://www.w3.org/2000/svg" width="36" height="36">
                                            <circle cx="18" cy="18" r="18" fill="#d85151" />
                                            <path d="M13.946 10.5l3.797 2.247c-1.403 2.772-2.131 5.365-2.181 7.781V25.5H9.25v-4.635c.017-1.703.48-3.535 1.386-5.492s2.009-3.581 3.31-4.873zm9.006 0l3.797 2.247c-1.402 2.772-2.13 5.365-2.181 7.781V25.5h-6.312v-4.635c.016-1.703.479-3.535 1.385-5.492s2.011-3.581 3.31-4.873z" fill="#fff" />
                                        </svg>
                                        <div class="ratio ratio-1x1 bg-body-secondary rounded-circle overflow-hidden">
                                            <img src="{{ asset('assets/img/about/v2/avatars/03.jpg') }}" alt="Avatar">
                                        </div>
                                    </div>
                                    <p class="fs-lg text-dark-emphasis pt-4 mb-0"><span class="fw-semibold">The detailed profiles and client reviews</span> made it easy to choose the right professional for the job. The advanced search filters allowed me to narrow down my options based on my specific needs and budget.</p>
                                </div>
                                <div class="card-footer bg-transparent border-0 pt-0 pb-4">
                                    <div class="h6 mb-1">Kristin Watson</div>
                                    <div class="fs-sm text-body-secondary">Gutter service</div>
                                </div>
                            </div>
                        </div>

                        <!-- Testimonial -->
                        <div class="swiper-slide h-auto">
                            <div class="card h-100 border-0 rounded-4 p-sm-2">
                                <div class="card-body">
                                    <div class="position-relative rtl-flip" style="width: 96px">
                                        <svg class="position-absolute top-0 z-1" style="right: 0; margin-right: -13px" xmlns="http://www.w3.org/2000/svg" width="36" height="36">
                                            <circle cx="18" cy="18" r="18" fill="#d85151" />
                                            <path d="M13.946 10.5l3.797 2.247c-1.403 2.772-2.131 5.365-2.181 7.781V25.5H9.25v-4.635c.017-1.703.48-3.535 1.386-5.492s2.009-3.581 3.31-4.873zm9.006 0l3.797 2.247c-1.402 2.772-2.13 5.365-2.181 7.781V25.5h-6.312v-4.635c.016-1.703.479-3.535 1.385-5.492s2.011-3.581 3.31-4.873z" fill="#fff" />
                                        </svg>
                                        <div class="ratio ratio-1x1 bg-body-secondary rounded-circle overflow-hidden">
                                            <img src="{{ asset('assets/img/about/v2/avatars/04.jpg') }}" alt="Avatar">
                                        </div>
                                    </div>
                                    <p class="fs-lg text-dark-emphasis pt-4 mb-0">Using this site to find a local contractor <span class="fw-semibold">was a game-changer for my home renovation.</span> The listings were clear and detailed, making it easy to compare services and read reviews. I found a reliable contractor quickly, and the entire process was smooth and hassle-free.</p>
                                </div>
                                <div class="card-footer bg-transparent border-0 pt-0 pb-4">
                                    <div class="h6 mb-1">Kristin Watson</div>
                                    <div class="fs-sm text-body-secondary">Website user</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <!-- Info columns -->
        <section class="container py-5 my-xxl-3">
            <div class="row pt-2 pt-sm-3 pt-md-4 pt-lg-5">

                <!-- Team -->
                <div class="col-md-4 col-xl-3 mb-5 mb-md-0">
                    <h3 class="fs-sm fw-normal text-body-secondary text-uppercase pb-2 pb-md-3 pb-lg-4">Finder core team</h3>
                    <div class="d-flex flex-wrap gap-3">
                        <a href="#!" data-bs-toggle="tooltip" title="Kristin Watson" style="width: 64px">
                            <div class="ratio ratio-1x1 bg-body-secondary rounded-circle overflow-hidden">
                                <img src="{{ asset('assets/img/about/v2/avatars/05.jpg') }}" alt="Avatar">
                            </div>
                        </a>
                        <a href="#!" data-bs-toggle="tooltip" title="Liza Rogers" style="width: 64px">
                            <div class="ratio ratio-1x1 bg-body-secondary rounded-circle overflow-hidden">
                                <img src="{{ asset('assets/img/about/v2/avatars/06.jpg') }}" alt="Avatar">
                            </div>
                        </a>
                        <a href="#!" data-bs-toggle="tooltip" title="Cody Fisher" style="width: 64px">
                            <div class="ratio ratio-1x1 bg-body-secondary rounded-circle overflow-hidden">
                                <img src="{{ asset('assets/img/about/v2/avatars/07.jpg') }}" alt="Avatar">
                            </div>
                        </a>
                        <a href="#!" data-bs-toggle="tooltip" title="Michael Howard" style="width: 64px">
                            <div class="ratio ratio-1x1 bg-body-secondary rounded-circle overflow-hidden">
                                <img src="{{ asset('assets/img/about/v2/avatars/08.jpg') }}" alt="Avatar">
                            </div>
                        </a>
                        <a href="#!" data-bs-toggle="tooltip" title="Jacob Jones" style="width: 64px">
                            <div class="ratio ratio-1x1 bg-body-secondary rounded-circle overflow-hidden">
                                <img src="{{ asset('assets/img/about/v2/avatars/09.jpg') }}" alt="Avatar">
                            </div>
                        </a>
                        <a href="#!" data-bs-toggle="tooltip" title="Darrell Steward" style="width: 64px">
                            <div class="ratio ratio-1x1 bg-body-secondary rounded-circle overflow-hidden">
                                <img src="{{ asset('assets/img/about/v2/avatars/10.jpg') }}" alt="Avatar">
                            </div>
                        </a>
                    </div>
                </div>

                <!-- Market ratings -->
                <div class="col-md-4 col-xxl-3 offset-xl-1 mb-5 mb-md-0">
                    <h3 class="fs-sm fw-normal text-body-secondary text-uppercase pb-2 pb-md-3 pb-lg-4">Best in the market</h3>
                    <ul class="list-unstyled gap-3 mb-0">
                        <li>
                            <a class="d-inline-flex align-items-center gap-3 text-dark-emphasis hover-effect-underline text-decoration-none" href="#!">
                                <svg class="flex-shrink-0" xmlns="http://www.w3.org/2000/svg" width="48" height="48">
                                    <path d="M38.299.003H9.695C4.337.003 0 4.34 0 9.698v28.61a9.69 9.69 0 0 0 9.695 9.689h28.61c5.351 0 9.695-4.337 9.695-9.695V9.698A9.7 9.7 0 0 0 38.299.003z" fill="url(#G)" />
                                    <path d="M23.793 11.03l.972-1.68c.6-1.05 1.938-1.404 2.988-.804s1.404 1.938.804 2.988l-9.365 16.21h6.773c2.196 0 3.425 2.58 2.472 4.367H8.579c-1.212 0-2.184-.972-2.184-2.184s.972-2.184 2.184-2.184h5.567l7.127-12.353-2.226-3.863a2.19 2.19 0 0 1 .804-2.988 2.19 2.19 0 0 1 2.988.804l.954 1.686zM15.37 34.361l-2.1 3.642c-.6 1.05-1.938 1.404-2.988.804s-1.404-1.938-.804-2.988l1.56-2.7c1.764-.546 3.198-.126 4.331 1.242zm18.082-6.605h5.681c1.212 0 2.184.972 2.184 2.184s-.972 2.184-2.184 2.184h-3.156l2.13 3.696a2.19 2.19 0 0 1-.804 2.988 2.19 2.19 0 0 1-2.988-.804l-8.069-13.978c-1.83-3.156-.522-6.323.768-7.397l6.437 11.129z" fill="#fff" />
                                    <defs>
                                        <linearGradient id="G" x1="24" y1=".003" x2="24" y2="47.997" gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stop-color="#00bffc" />
                                            <stop offset="1" stop-color="#0073f6" />
                                        </linearGradient>
                                    </defs>
                                </svg>
                                <div class="fw-medium">5/5 rating on the App Store</div>
                            </a>
                        </li>
                        <li>
                            <a class="d-inline-flex align-items-center gap-3 text-dark-emphasis hover-effect-underline text-decoration-none mt-2 mt-lg-3" href="#!">
                                <svg class="flex-shrink-0" xmlns="http://www.w3.org/2000/svg" width="48" height="48">
                                    <path d="M3.318.742c-.543.574-.864 1.466-.864 2.622v41.273c0 1.157.321 2.047.864 2.622l.138.135 23.12-23.12V24v-.273L3.456.606l-.138.135z" fill="url(#A)" />
                                    <path d="M34.283 31.983l-7.706-7.71V24v-.273l7.708-7.708.174.099 9.131 5.188c2.608 1.482 2.608 3.906 0 5.389l-9.131 5.188-.175.099z" fill="url(#B)" />
                                    <path d="M34.459 31.883L26.577 24 3.318 47.258c.86.91 2.279 1.023 3.878.114l27.262-15.49z" fill="url(#C)" />
                                    <path d="M34.459 16.117L7.197.627C5.597-.281 4.178-.168 3.318.742L26.577 24l7.882-7.883z" fill="url(#D)" />
                                    <defs>
                                        <linearGradient id="A" x1="24.526" y1="2.929" x2="-6.793" y2="34.248" href="#E">
                                            <stop offset="0" stop-color="#00a0ff" />
                                            <stop offset=".007" stop-color="#00a2ff" />
                                            <stop offset=".26" stop-color="#00beff" />
                                            <stop offset=".512" stop-color="#00d2ff" />
                                            <stop offset=".76" stop-color="#00dfff" />
                                            <stop offset="1" stop-color="#00e3ff" />
                                        </linearGradient>
                                        <linearGradient id="B" x1="46.985" y1="24.001" x2="1.829" y2="24.001" href="#E">
                                            <stop offset="0" stop-color="#ffe000" />
                                            <stop offset=".409" stop-color="#ffbd00" />
                                            <stop offset=".775" stop-color="#ffa600" />
                                            <stop offset="1" stop-color="#ff9c00" />
                                        </linearGradient>
                                        <linearGradient id="C" x1="30.176" y1="28.283" x2="-12.295" y2="70.754" href="#E">
                                            <stop offset="0" stop-color="#ff3743" />
                                            <stop offset="1" stop-color="#e30864" />
                                        </linearGradient>
                                        <linearGradient id="D" x1="-2.538" y1="-12.997" x2="16.427" y2="5.968" href="#E">
                                            <stop offset="0" stop-color="#00a06f" />
                                            <stop offset=".069" stop-color="#00a86e" />
                                            <stop offset=".476" stop-color="#00cf6e" />
                                            <stop offset=".801" stop-color="#00e76d" />
                                            <stop offset="1" stop-color="#00ef6d" />
                                        </linearGradient>
                                        <linearGradient id="E" gradientUnits="userSpaceOnUse" />
                                    </defs>
                                </svg>
                                <div class="fw-medium">4.9/5 rating on the Google Play</div>
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Useful links -->
                <div class="col-md-4 offset-xxl-1">
                    <h3 class="fs-sm fw-normal text-body-secondary text-uppercase pb-2 pb-md-3 pb-lg-4">Useful links</h3>
                    <ul class="nav flex-column gap-3">
                        <li>
                            <a class="nav-link position-relative fs-base fw-normal p-0" href="#!">
                                <i class="fi-chevron-right fs-lg ms-n1 me-2"></i>
                                <span class="hover-effect-underline stretched-link">How can I leave a review for a contractor?</span>
                            </a>
                        </li>
                        <li>
                            <a class="nav-link position-relative fs-base fw-normal p-0" href="#!">
                                <i class="fi-chevron-right fs-lg ms-n1 me-2"></i>
                                <span class="hover-effect-underline stretched-link">What support does Finder Contractor offer?</span>
                            </a>
                        </li>
                        <li>
                            <a class="nav-link position-relative fs-base fw-normal p-0" href="#!">
                                <i class="fi-chevron-right fs-lg ms-n1 me-2"></i>
                                <span class="hover-effect-underline stretched-link">Community: Connect with other contractors</span>
                            </a>
                        </li>
                        <li>
                            <a class="nav-link position-relative fs-base fw-normal p-0" href="#!">
                                <i class="fi-chevron-right fs-lg ms-n1 me-2"></i>
                                <span class="hover-effect-underline stretched-link">Press and announcements about Finder</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </section>


        <!-- Mobile app download CTA -->
        <section class="container pt-2 pt-sm-3 pt-md-4 pt-lg-5 pb-5 my-xxl-3">
            <div class="bg-primary-subtle rounded">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-5 col-lg-4 offset-lg-1 text-center text-md-start">
                        <div class="p-4 ps-lg-0 pe-md-0">
                            <h2 class="h1 pt-3 pt-md-0 mb-2">Get Finder App</h2>
                            <p class="mb-4">Explore top-rated certified pros</p>
                            <div class="d-flex flex-column flex-sm-row justify-content-center justify-content-md-start gap-3">
                                <a class="btn btn-market btn-lg" href="#!" aria-label="Download on App Store">
                                    <i class="fi-apple lead ms-n1 me-2"></i>
                                    <svg class="flex-shrink-0" xmlns="http://www.w3.org/2000/svg" width="77" height="24" viewBox="0 0 77 24" fill="currentColor">
                                        <path d="M40.713 15.797c.701-.624 1.055-1.431 1.055-2.427 0-.806-.242-1.486-.733-2.032-.483-.546-1.232-1.02-2.255-1.423-.838-.324-1.418-.625-1.732-.901a1.41 1.41 0 0 1-.548-1.138 1.39 1.39 0 0 1 .475-1.059c.379-.316.91-.482 1.579-.482.854 0 1.611.182 2.288.538l.483-1.518c-.717-.372-1.619-.553-2.699-.553-1.216 0-2.191.308-2.924.917a2.94 2.94 0 0 0-1.103 2.356c0 1.463 1.039 2.577 3.142 3.344.765.277 1.313.577 1.643.901a1.63 1.63 0 0 1 .491 1.194c0 .53-.201.957-.604 1.273-.395.316-.959.474-1.675.474-.999 0-1.917-.245-2.755-.727l-.443 1.557c.773.482 1.796.727 3.077.727 1.386 0 2.465-.34 3.238-1.02zm-31.706.846h2.03L7.195 4.966H4.826L1 16.644h1.974l1.055-3.431h3.867l1.112 3.431zM6.558 8.729l1.007 3.044H4.367l.991-3.044.564-2.198h.04l.596 2.198zm13.122 6.997c.797-.83 1.192-1.961 1.192-3.392 0-1.289-.338-2.316-1.031-3.107-.677-.783-1.514-1.178-2.529-1.178-1.289 0-2.255.506-2.892 1.51h-.032l-.105-1.336h-1.675l.072 2.767v9.068h1.909v-4.42c.499.798 1.313 1.194 2.449 1.194 1.047 0 1.933-.364 2.642-1.107zm-1.313-5.353c.379.53.564 1.202.564 2.024 0 .893-.201 1.605-.604 2.15-.403.538-.959.814-1.675.814-.612 0-1.112-.213-1.49-.633s-.572-.941-.572-1.55v-1.407c0-.15.032-.34.089-.569a2.11 2.11 0 0 1 .749-1.202c.387-.3.814-.459 1.281-.459a1.96 1.96 0 0 1 1.659.83zm12.366 1.961c0 1.431-.395 2.562-1.192 3.392-.709.743-1.595 1.107-2.642 1.107-1.136 0-1.949-.395-2.449-1.194v4.42H22.54v-9.068l-.072-2.767h1.675l.105 1.336h.032c.636-1.004 1.603-1.51 2.892-1.51 1.015 0 1.853.395 2.529 1.178.693.791 1.031 1.818 1.031 3.107zm-1.941.063c0-.822-.185-1.494-.564-2.024a1.96 1.96 0 0 0-1.659-.83c-.467 0-.894.158-1.281.459-.379.308-.628.704-.749 1.202-.056.229-.089.419-.089.569v1.407c0 .609.193 1.131.572 1.55s.878.633 1.49.633c.717 0 1.281-.277 1.676-.814.411-.546.604-1.257.604-2.15zM48.083 9.63h-2.102v4.087c0 1.036.37 1.557 1.112 1.557.338 0 .62-.032.846-.087l.056 1.423c-.379.134-.87.206-1.482.206-.757 0-1.337-.229-1.764-.68s-.636-1.21-.636-2.269V9.623h-1.248V8.223h1.249V6.681l1.869-.553v2.095h2.102V9.63zm8.329 5.922c.749-.83 1.128-1.89 1.128-3.186 0-1.257-.362-2.285-1.096-3.075-.765-.822-1.78-1.233-3.037-1.233-1.305 0-2.344.419-3.117 1.249-.765.83-1.152 1.897-1.152 3.202 0 1.249.37 2.285 1.12 3.099s1.756 1.225 3.013 1.225c1.305 0 2.352-.427 3.142-1.281zm-1.353-5.131c.338.553.508 1.21.508 1.984s-.177 1.439-.524 2.008c-.419.68-.991 1.02-1.716 1.02-.741 0-1.321-.332-1.732-1.004-.338-.546-.508-1.21-.508-1.984 0-.799.161-1.471.508-2.024.395-.672.983-1.004 1.748-1.004.741 0 1.313.332 1.716 1.004zm8.683-.553c-.185-.032-.387-.047-.604-.047-.669 0-1.192.245-1.555.743-.314.435-.475.996-.475 1.66v4.419h-1.909v-5.771l-.056-2.649h1.659l.072 1.613h.056c.201-.553.516-1.004.951-1.336.427-.3.886-.451 1.377-.451a4.09 4.09 0 0 1 .475.032l.008 1.787zm8.451 3.012c.048-.229.072-.514.072-.846 0-1.051-.258-1.929-.765-2.656-.628-.901-1.571-1.352-2.803-1.352-1.257 0-2.255.451-2.997 1.352-.709.846-1.063 1.905-1.063 3.17 0 1.289.379 2.324 1.136 3.091s1.804 1.154 3.133 1.154c1.104 0 2.062-.174 2.876-.522l-.298-1.297c-.693.261-1.466.395-2.312.395-.765 0-1.386-.198-1.869-.585-.532-.435-.806-1.075-.83-1.905h5.719zm-2.119-2.767c.258.403.387.886.371 1.439l-3.963-.008c.056-.561.25-1.051.564-1.455a1.82 1.82 0 0 1 1.514-.759c.677 0 1.184.261 1.514.783z" />
                                    </svg>
                                </a>
                                <a class="btn btn-market btn-lg" href="#!" aria-label="Download on Google Play">
                                    <svg class="flex-shrink-0 ms-n1 me-2" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <path d="M19.665 10.561l-3.251-1.878-3.329 3.329 3.328 3.329 3.263-1.884c.509-.309.812-.849.812-1.444s-.304-1.135-.823-1.451z" fill="#ffce00" />
                                        <path d="M13.085 12.011L4.018 2.879a1.71 1.71 0 0 0-.507 1.216v15.804a1.71 1.71 0 0 0 .507 1.217l9.067-9.105z" fill="#01daff" />
                                        <path d="M13.086 12.011l3.329-3.329.005-.005-4.46-2.568L6.08 2.654c-.529-.327-1.171-.338-1.712-.034a2.54 2.54 0 0 0-.349.259l9.067 9.132z" fill="#00f076" />
                                        <path d="M4.019 21.116c.113.101.225.18.349.259.27.146.552.225.834.225.304 0 .597-.09.867-.248l5.891-3.439 4.46-2.568-.005-.005-3.329-3.329-9.067 9.104z" fill="#f63448" />
                                    </svg>
                                    <svg class="flex-shrink-0" xmlns="http://www.w3.org/2000/svg" width="77" height="24" viewBox="0 0 77 24" fill="currentColor">
                                        <path d="M24.575 9.45c-2.184 0-3.914 1.704-3.914 4.071 0 2.272 1.729 4.071 3.914 4.071s3.914-1.704 3.914-4.071c0-2.461-1.729-4.071-3.914-4.071zm0 6.438c-1.183 0-2.184-1.041-2.184-2.462s1.001-2.462 2.184-2.462 2.184.947 2.184 2.462c0 1.42-1.001 2.462-2.184 2.462zM16.11 9.45c-2.184 0-3.914 1.704-3.914 4.071 0 2.272 1.729 4.071 3.914 4.071s3.914-1.704 3.914-4.071c0-2.461-1.729-4.071-3.914-4.071zm0 6.438c-1.183 0-2.184-1.041-2.184-2.462s1.001-2.462 2.184-2.462 2.184.947 2.184 2.462c0 1.42-1.001 2.462-2.184 2.462zM6.007 10.681v1.704h3.914c-.091.947-.455 1.704-.91 2.177-.546.568-1.456 1.231-3.004 1.231-2.457 0-4.278-1.988-4.278-4.544s1.911-4.544 4.278-4.544c1.274 0 2.275.568 3.004 1.231l1.183-1.231C9.193 5.757 7.918 5 6.098 5 2.822 5 0 7.84 0 11.249s2.822 6.249 6.098 6.249c1.82 0 3.095-.568 4.187-1.799 1.092-1.136 1.456-2.745 1.456-3.976 0-.379 0-.757-.091-1.041H6.007zm41.322 1.325c-.364-.947-1.274-2.556-3.277-2.556s-3.641 1.61-3.641 4.071c0 2.272 1.638 4.071 3.823 4.071 1.729 0 2.822-1.136 3.186-1.799l-1.274-.947c-.455.663-1.001 1.136-1.911 1.136s-1.456-.379-1.911-1.231l5.188-2.272-.182-.473zm-5.279 1.326c0-1.515 1.183-2.367 2.002-2.367.637 0 1.274.379 1.456.852l-3.459 1.515zm-4.278 3.882h1.729V5.379h-1.729v11.834zm-2.73-6.911c-.455-.473-1.183-.947-2.093-.947-1.911 0-3.732 1.799-3.732 4.071s1.729 3.976 3.732 3.976c.91 0 1.638-.473 2.002-.947h.091v.568c0 1.515-.819 2.367-2.093 2.367-1.001 0-1.729-.757-1.911-1.42l-1.456.663C30.036 19.675 31.128 21 33.039 21c2.002 0 3.641-1.231 3.641-4.166V9.639h-1.638v.663zm-2.002 5.586c-1.183 0-2.184-1.041-2.184-2.462s1.001-2.462 2.184-2.462 2.093 1.041 2.093 2.462-.91 2.462-2.093 2.462zM55.247 5.379h-4.096v11.834h1.729v-4.45h2.367c1.911 0 3.732-1.42 3.732-3.692s-1.82-3.692-3.732-3.692zm.091 5.681h-2.457V6.988h2.457c1.274 0 2.002 1.136 2.002 1.988-.091 1.041-.819 2.083-2.002 2.083zm10.467-1.704c-1.274 0-2.549.568-3.004 1.799l1.547.663c.364-.663.91-.852 1.547-.852.91 0 1.729.568 1.82 1.515v.095c-.273-.189-1.001-.473-1.729-.473-1.638 0-3.277.947-3.277 2.651 0 1.609 1.365 2.651 2.821 2.651 1.183 0 1.729-.568 2.184-1.136h.091v.947h1.638v-4.544c-.182-2.083-1.729-3.314-3.641-3.314zm-.182 6.533c-.546 0-1.365-.284-1.365-1.041 0-.947 1.001-1.231 1.82-1.231.728 0 1.092.189 1.547.379-.182 1.136-1.092 1.894-2.002 1.894zm9.557-6.249l-1.911 5.112h-.091l-2.002-5.112h-1.82l3.004 7.195-1.729 3.976h1.729L77 9.639h-1.82zm-15.291 7.574h1.729V5.379h-1.729v11.834z" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-9 col-md-7">
                        <div class="ratio" style="max-width: 749px; --fn-aspect-ratio: calc(310 / 714 * 100%)">
                            <img src="{{ asset('assets/img/home/contractors/app-cta.png') }}" alt="App screens">
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <!-- Partners -->
        <section class="container py-2 py-sm-3 py-md-4 py-lg-5 my-xxl-3">
            <h2 class="h1 pb-1 pb-sm-2 pb-md-3 pb-lg-0 mb-4 mb-lg-5">Top partners</h2>

            <!-- Row of cards that turns into carousel on screens < 992px wide (lg breakpoint) -->
            <div class="swiper pb-5" data-swiper='{
                          "slidesPerView": 1,
                          "spaceBetween": 24,
                          "pagination": {
                            "el": ".swiper-pagination",
                            "clickable": true
                          },
                          "breakpoints": {
                            "460": {
                              "slidesPerView": 2
                            },
                            "768": {
                              "slidesPerView": 3
                            },
                            "992": {
                              "slidesPerView": 4
                            }
                          }
                        }'>
                <div class="swiper-wrapper">

                    <!-- Partner card -->
                    <div class="swiper-slide h-auto">
                        <a class="card h-100 text-decoration-none rounded-4 p-xl-2" href="#!">
                            <div class="card-body text-center">
                                <svg class="d-inline-block text-secondary-emphasis" xmlns="http://www.w3.org/2000/svg" width="220" viewBox="0 0 220 93" fill="currentColor">
                                    <path d="M61.207 38.004h4.712v13.741h7.754v2.29H61.207V38.004zm21.37 16.26c-2.313 0-4.084-.351-5.312-1.053s-1.842-1.695-1.842-2.977v-8.428c0-1.282.614-2.275 1.842-2.977s2.999-1.053 5.312-1.053 4.084.351 5.312 1.053 1.842 1.695 1.842 2.977v8.428c0 1.282-.614 2.275-1.842 2.977s-2.999 1.053-5.312 1.053zm0-2.29c1.628 0 2.442-.527 2.442-1.58v-8.748c0-1.053-.814-1.58-2.442-1.58s-2.442.527-2.442 1.58v8.749c0 1.053.814 1.58 2.442 1.58zm17.028 2.29c-2.285 0-4.027-.343-5.227-1.031-1.2-.702-1.799-1.702-1.799-3v-8.428c0-1.298.6-2.29 1.799-2.977 1.2-.702 2.942-1.053 5.227-1.053s4.027.351 5.226 1.053c1.2.687 1.799 1.679 1.799 2.977v1.374h-4.455v-1.534c0-1.053-.814-1.58-2.442-1.58s-2.442.527-2.442 1.58v8.771c0 1.038.814 1.557 2.442 1.557s2.442-.519 2.442-1.557v-3.138h-2.356v-2.29h6.811v5.245c0 1.298-.599 2.298-1.799 3-1.199.687-2.941 1.031-5.226 1.031zm16.857 0c-2.314 0-4.084-.351-5.312-1.053s-1.842-1.695-1.842-2.977v-8.428c0-1.282.614-2.275 1.842-2.977s2.998-1.053 5.312-1.053 4.084.351 5.312 1.053 1.842 1.695 1.842 2.977v8.428c0 1.282-.614 2.275-1.842 2.977s-2.999 1.053-5.312 1.053zm0-2.29c1.628 0 2.442-.527 2.442-1.58v-8.748c0-1.053-.814-1.58-2.442-1.58s-2.442.527-2.442 1.58v8.749c0 1.053.814 1.58 2.442 1.58zm10.348-13.97h4.712v16.032h-4.712V38.004zm8.244 0h6.94c2.341 0 4.098.336 5.269 1.008s1.757 1.657 1.757 2.954v1.58c0 1.298-.585 2.283-1.757 2.954s-2.928 1.008-5.269 1.008h-2.228v6.527h-4.712V38.004zm6.94 7.214c.771 0 1.342-.115 1.714-.344.4-.229.599-.618.599-1.168v-1.901c0-.55-.199-.939-.599-1.168-.372-.229-.943-.343-1.714-.343h-2.228v4.924h2.228zm15.88 9.046c-2.283 0-4.012-.343-5.183-1.031-1.17-.702-1.756-1.702-1.756-3v-.916h4.455v1.099c0 1.038.814 1.557 2.442 1.557.8 0 1.399-.122 1.799-.366.428-.26.643-.672.643-1.237 0-.672-.286-1.26-.857-1.763-.57-.519-1.627-1.137-3.17-1.855-1.942-.916-3.299-1.74-4.07-2.473-.771-.748-1.156-1.588-1.156-2.519 0-1.267.599-2.244 1.799-2.931 1.199-.702 2.942-1.053 5.227-1.053 2.255 0 3.955.351 5.097 1.053 1.171.687 1.757 1.679 1.757 2.977v.664h-4.456v-.824c0-.55-.199-.947-.599-1.191-.4-.26-.985-.389-1.757-.389-1.571 0-2.356.511-2.356 1.534 0 .58.286 1.122.857 1.626.599.504 1.67 1.114 3.213 1.832 1.97.916 3.327 1.748 4.07 2.496s1.114 1.626 1.114 2.634c0 1.313-.615 2.321-1.843 3.023-1.2.702-2.956 1.053-5.27 1.053zm16.667 0c-2.285 0-4.027-.343-5.227-1.031-1.2-.702-1.799-1.702-1.799-3v-12.23h4.713v12.413c0 .55.199.947.599 1.191.428.244 1.029.366 1.799.366s1.357-.122 1.757-.366c.428-.244.643-.641.643-1.191V38.004h4.54v12.23c0 1.298-.599 2.298-1.799 3-1.2.687-2.942 1.031-5.226 1.031zm10.383-16.26h6.727l2.998 11.474h.085l3-11.474h6.725v16.032h-4.455V41.897h-.085l-3.428 12.138h-3.941l-3.427-12.138h-.085v12.138h-4.114V38.004zM15.713 54.036c5.797 0 10.497-2.513 10.497-5.612s-4.7-5.612-10.497-5.612v3.928c1.739 0 3.149.754 3.149 1.684s-1.41 1.684-3.149 1.684v3.928zm34.99-9.353a34.14 34.14 0 0 0-5.686-.468c-10.387 0-18.807 4.502-18.807 10.055a5.57 5.57 0 0 0 .248 1.637h11.685c-.417-.5-.649-1.054-.649-1.637 0-2.221 3.368-4.022 7.523-4.022 2.271 0 4.307.538 5.686 1.388v-6.953zM17.558 37.2c.87 4.209 7.545 7.482 15.65 7.482s14.779-3.274 15.649-7.482h-11.26c-.695.932-2.398 1.59-4.389 1.59s-3.694-.658-4.389-1.59h-11.26z" />
                                </svg>
                                <p class="fs-sm pt-2 mb-0">Our collaboration with innovative technology providers enhances the user experience.</p>
                            </div>
                        </a>
                    </div>

                    <!-- Partner card -->
                    <div class="swiper-slide h-auto">
                        <a class="card h-100 text-decoration-none rounded-4 p-xl-2" href="#!">
                            <div class="card-body text-center">
                                <svg class="d-inline-block text-secondary-emphasis" xmlns="http://www.w3.org/2000/svg" width="220" viewBox="0 0 220 93" fill="currentColor">
                                    <path d="M39.829 39.673a9.15 9.15 0 0 0-5.004-1.485v-8.812c3.563 0 7.045 1.034 10.008 2.97s5.271 4.689 6.634 7.91 1.72 6.764 1.025 10.183a17.51 17.51 0 0 1-4.93 9.024c-2.519 2.465-5.729 4.144-9.223 4.824s-7.116.331-10.408-1.003-6.105-3.593-8.084-6.492-3.036-6.306-3.036-9.792h9.007a8.68 8.68 0 0 0 1.518 4.896c.99 1.449 2.396 2.579 4.042 3.246a9.19 9.19 0 0 0 5.204.501 9.07 9.07 0 0 0 4.611-2.412c1.26-1.233 2.117-2.803 2.465-4.512s.169-3.481-.513-5.092-1.836-2.987-3.317-3.955z" />
                                    <path d="M25.819 29.375a8.65 8.65 0 0 1-.686 3.372c-.453 1.069-1.116 2.041-1.952 2.859s-1.829 1.467-2.922 1.91a9.18 9.18 0 0 1-3.447.671V47a18.36 18.36 0 0 0 6.893-1.342c2.185-.886 4.171-2.184 5.844-3.821s2.999-3.579 3.905-5.718 1.371-4.43 1.371-6.745h-9.006z" />
                                    <path d="M133.573 42.111h-4.51v13.582h4.51V42.111zm-4.012-2.543c.472.447 1.061.671 1.768.671s1.287-.224 1.739-.671a2.32 2.32 0 0 0 .679-1.677c0-.671-.226-1.23-.679-1.677s-1.032-.671-1.739-.671-1.296.224-1.768.671c-.452.447-.678 1.006-.678 1.677a2.32 2.32 0 0 0 .678 1.677zM64.357 55.693v-19.73h4.628v15.874h9.226v3.857H64.357z" />
                                    <path d="M86.549 56.001c-1.474 0-2.81-.307-4.009-.922-1.179-.633-2.112-1.49-2.8-2.571s-1.032-2.292-1.032-3.633.344-2.543 1.032-3.605 1.621-1.9 2.8-2.515c1.179-.634 2.515-.95 4.009-.95s2.83.307 4.009.922a7.19 7.19 0 0 1 2.8 2.543c.688 1.062 1.032 2.264 1.032 3.605s-.344 2.552-1.032 3.633-1.621 1.938-2.8 2.571c-1.179.615-2.515.922-4.009.922zm0-3.885c.648 0 1.218-.13 1.71-.391a2.8 2.8 0 0 0 1.12-1.146c.275-.503.413-1.071.413-1.705s-.138-1.183-.413-1.649c-.275-.484-.658-.857-1.15-1.118-.472-.28-1.032-.419-1.68-.419-.629 0-1.189.14-1.68.419a2.81 2.81 0 0 0-1.149 1.118c-.275.485-.413 1.043-.413 1.677 0 .615.137 1.174.413 1.677a3.01 3.01 0 0 0 1.149 1.146c.491.261 1.051.391 1.68.391zm11.409 8.888c1.199.522 2.584.782 4.156.782 1.532 0 2.898-.289 4.097-.866s2.142-1.379 2.829-2.403 1.032-2.236 1.032-3.633V42.112h-4.421v.912a4.83 4.83 0 0 0-1.12-.661c-.767-.354-1.641-.531-2.624-.531-1.316 0-2.485.298-3.507.894a6.34 6.34 0 0 0-2.417 2.404c-.59 1.006-.884 2.142-.884 3.409 0 1.248.295 2.385.884 3.41A6.55 6.55 0 0 0 98.4 54.38c1.022.596 2.191.894 3.507.894.963 0 1.838-.177 2.624-.531.38-.171.724-.374 1.031-.606v.858c0 .95-.324 1.686-.972 2.208-.629.522-1.504.782-2.624.782-.904 0-1.68-.149-2.328-.447-.629-.298-1.199-.736-1.71-1.313l-2.771 2.627c.688.932 1.621 1.649 2.8 2.152zm6.425-9.921c-.452.261-.992.391-1.621.391s-1.179-.13-1.65-.391a2.83 2.83 0 0 1-1.062-1.062 3.04 3.04 0 0 1-.383-1.481 2.99 2.99 0 0 1 .383-1.509 2.77 2.77 0 0 1 1.091-1.062c.472-.261 1.012-.391 1.621-.391.629 0 1.169.13 1.621.391.472.261.826.615 1.061 1.062.256.447.384.95.384 1.509s-.128 1.062-.384 1.509c-.235.428-.589.773-1.061 1.034zm15.181 4.918c-1.474 0-2.811-.307-4.009-.922-1.179-.633-2.112-1.49-2.8-2.571s-1.032-2.292-1.032-3.633.344-2.543 1.032-3.605 1.621-1.9 2.8-2.515c1.179-.634 2.515-.95 4.009-.95s2.829.307 4.008.922 2.112 1.463 2.8 2.543c.688 1.062 1.032 2.264 1.032 3.605s-.344 2.552-1.032 3.633-1.621 1.938-2.8 2.571c-1.179.615-2.515.922-4.008.922zm0-3.885c.648 0 1.218-.13 1.709-.391a2.8 2.8 0 0 0 1.12-1.146c.275-.503.413-1.071.413-1.705s-.138-1.183-.413-1.649c-.275-.484-.658-.857-1.149-1.118-.472-.28-1.032-.419-1.68-.419-.629 0-1.19.14-1.68.419a2.81 2.81 0 0 0-1.15 1.118c-.275.484-.413 1.043-.413 1.677 0 .615.138 1.174.413 1.677a3 3 0 0 0 1.15 1.146c.49.261 1.051.391 1.68.391zm24.849 3.857c-.962 0-1.847-.177-2.652-.531-.424-.186-.807-.409-1.149-.667v6.648h-4.451V42.112h4.509v.937c.328-.254.691-.473 1.091-.658.805-.373 1.69-.559 2.652-.559 1.356 0 2.555.307 3.596.922a6.5 6.5 0 0 1 2.476 2.515c.61 1.062.914 2.273.914 3.633s-.304 2.571-.914 3.633a6.5 6.5 0 0 1-2.476 2.515c-1.041.615-2.24.922-3.596.922zm-.824-3.857c.648 0 1.208-.14 1.679-.419a3 3 0 0 0 1.15-1.146c.275-.484.413-1.034.413-1.649 0-.633-.138-1.192-.413-1.677a2.81 2.81 0 0 0-1.15-1.118c-.471-.279-1.021-.419-1.65-.419s-1.189.14-1.68.419a2.86 2.86 0 0 0-1.12 1.118c-.275.485-.413 1.043-.413 1.677 0 .615.128 1.164.383 1.649a3 3 0 0 0 1.15 1.146c.491.279 1.041.419 1.651.419z" />
                                    <path d="M155.815 55.722a10.35 10.35 0 0 0 2.505.307c1.788 0 3.203-.391 4.244-1.174a3.72 3.72 0 0 0 1.592-3.158c0-.857-.167-1.546-.501-2.068a3.8 3.8 0 0 0-1.297-1.286 7.95 7.95 0 0 0-1.68-.755l-1.68-.475c-.531-.13-.963-.279-1.297-.447s-.501-.391-.501-.671c0-.261.128-.456.383-.587.255-.149.638-.224 1.149-.224a4.62 4.62 0 0 1 1.621.307c.57.205 1.081.559 1.533 1.062l2.564-2.459c-.647-.782-1.492-1.37-2.534-1.761-1.022-.41-2.142-.615-3.36-.615-1.159 0-2.171.186-3.036.559s-1.533.885-2.005 1.537c-.471.633-.707 1.388-.707 2.264 0 .82.167 1.5.501 2.04a3.64 3.64 0 0 0 1.297 1.23 7.73 7.73 0 0 0 1.68.699l1.68.475c.53.13.963.289 1.297.475.354.168.531.419.531.755 0 .261-.148.466-.443.615-.275.149-.677.224-1.208.224-.767 0-1.474-.13-2.122-.391a5.16 5.16 0 0 1-1.68-1.146l-2.565 2.459a7.95 7.95 0 0 0 1.769 1.342 10.29 10.29 0 0 0 2.27.866zm16.557.279c-1.316 0-2.485-.252-3.507-.755-1.002-.522-1.788-1.23-2.358-2.124-.57-.913-.855-1.956-.855-3.13v-7.881h4.51v7.825c0 .466.078.866.236 1.202.177.335.432.596.766.782s.737.279 1.208.279c.669 0 1.199-.196 1.592-.587.394-.41.59-.969.59-1.677V42.11h4.509v7.853c0 1.192-.284 2.245-.855 3.158-.569.894-1.355 1.602-2.358 2.124-1.002.503-2.161.755-3.478.755zm13.443-13.889h-4.509v13.582h4.509v-7.937c0-.466.099-.857.295-1.174a2.12 2.12 0 0 1 .855-.727c.354-.186.757-.279 1.208-.279.649 0 1.189.196 1.621.587.453.373.679.904.679 1.593v7.937h4.51v-7.937c0-.466.098-.857.294-1.174.217-.317.501-.559.855-.727.353-.186.757-.279 1.209-.279.648 0 1.188.196 1.62.587.452.373.678.904.678 1.593v7.937h4.511v-8.412c0-1.136-.256-2.105-.767-2.907a4.81 4.81 0 0 0-2.034-1.872c-.845-.447-1.818-.671-2.918-.671-1.12 0-2.132.233-3.036.699-.587.297-1.1.68-1.54 1.149a4.96 4.96 0 0 0-1.496-1.205c-.786-.428-1.68-.643-2.682-.643-1.061 0-2.014.214-2.859.643a4.96 4.96 0 0 0-1.003.641v-1.004z" />
                                </svg>
                                <p class="fs-sm pt-2 mb-0">Integrating cutting-edge tools and software, we offer advanced features like AI-powered search.</p>
                            </div>
                        </a>
                    </div>

                    <!-- Partner card -->
                    <div class="swiper-slide h-auto">
                        <a class="card h-100 text-decoration-none rounded-4 p-xl-2" href="#!">
                            <div class="card-body text-center">
                                <svg class="d-inline-block text-secondary-emphasis" xmlns="http://www.w3.org/2000/svg" width="220" viewBox="0 0 220 93" fill="currentColor">
                                    <path d="M73.036 53.688c0 .872-.177 1.542-.532 2.01-.346.468-.924.702-1.734.702-.765 0-1.306-.234-1.625-.702-.309-.468-.464-1.138-.464-2.01V39.133c0-.872.155-1.542.464-2.01.319-.468.86-.702 1.625-.702.81 0 1.388.234 1.734.702.355.468.532 1.138.532 2.01v14.554zm1.325-4.228c0-.973.155-1.891.464-2.754.319-.872.792-1.634 1.42-2.286.637-.652 1.429-1.17 2.376-1.556.956-.386 2.075-.578 3.358-.578 1.229 0 2.316.179 3.263.537s1.743.858 2.389 1.501a6.27 6.27 0 0 1 1.475 2.272c.337.872.505 1.827.505 2.864a7.85 7.85 0 0 1-.478 2.74c-.319.854-.796 1.606-1.434 2.258-.637.642-1.433 1.157-2.389 1.542-.956.376-2.066.564-3.331.564-1.247 0-2.348-.179-3.304-.537-.947-.367-1.743-.867-2.389-1.501a6.39 6.39 0 0 1-1.447-2.258c-.319-.872-.478-1.808-.478-2.809zm4.546 0c0 .606.054 1.184.164 1.735.109.542.282 1.019.519 1.432a2.92 2.92 0 0 0 .956.991c.391.239.869.358 1.433.358.519 0 .969-.11 1.352-.331.391-.22.71-.528.956-.922.255-.395.446-.867.573-1.418.127-.56.191-1.175.191-1.845 0-.606-.059-1.18-.177-1.721a4.54 4.54 0 0 0-.532-1.446c-.246-.422-.564-.753-.956-.991-.382-.248-.851-.372-1.406-.372s-1.028.119-1.42.358a2.8 2.8 0 0 0-.956.978c-.246.413-.423.895-.532 1.446a8.97 8.97 0 0 0-.164 1.749zm21.908 4.283c-.246.459-.546.849-.901 1.17a4.85 4.85 0 0 1-1.16.799 5.87 5.87 0 0 1-1.352.454c-.473.092-.96.138-1.461.138-.837 0-1.602-.151-2.294-.455a5.06 5.06 0 0 1-1.788-1.308c-.492-.578-.874-1.285-1.147-2.121s-.41-1.79-.41-2.864c0-1.01.127-1.955.382-2.837s.623-1.648 1.106-2.299a5.39 5.39 0 0 1 1.802-1.542c.71-.376 1.52-.565 2.43-.565 1.037 0 1.957.202 2.758.606.81.404 1.507 1.065 2.088 1.983v-.358c0-.661.178-1.157.533-1.487.364-.34.864-.509 1.502-.509.382 0 .705.064.969.193a1.41 1.41 0 0 1 .628.551 2.39 2.39 0 0 1 .327.895c.073.349.11.748.11 1.198v9.226c0 1.12-.141 2.12-.423 3.002-.274.881-.701 1.625-1.284 2.231s-1.329 1.065-2.239 1.377c-.91.321-1.993.482-3.249.482-.883 0-1.666-.041-2.348-.124a9.07 9.07 0 0 1-1.748-.344c-.491-.175-.865-.367-1.119-.578-.246-.211-.369-.486-.369-.826 0-.193.027-.376.082-.551a1.44 1.44 0 0 1 .246-.468 1.38 1.38 0 0 1 .451-.317c.191-.073.423-.11.696-.11a6.94 6.94 0 0 1 .874.055l.928.11 1.024.124a11.64 11.64 0 0 0 1.174.055c.501 0 .947-.05 1.338-.151s.723-.28.996-.537.483-.601.628-1.033c.146-.422.219-.964.219-1.625v-1.639zm0-4.282c0-.67-.05-1.281-.15-1.831-.091-.551-.251-1.019-.478-1.405-.228-.395-.533-.698-.915-.909-.382-.22-.86-.331-1.434-.331-.564 0-1.033.115-1.406.344-.364.229-.655.546-.874.95s-.373.877-.464 1.418a11.61 11.61 0 0 0-.123 1.735c0 1.405.246 2.46.737 3.167s1.206 1.06 2.143 1.06c.437-.009.833-.092 1.188-.248a2.49 2.49 0 0 0 .942-.757c.264-.339.469-.771.614-1.294s.219-1.157.219-1.9zm5.378-.001c0-.973.155-1.891.464-2.754.319-.872.792-1.634 1.42-2.286.638-.652 1.429-1.17 2.376-1.556.956-.386 2.075-.578 3.358-.578 1.229 0 2.317.179 3.263.537s1.743.858 2.389 1.501c.647.633 1.138 1.391 1.475 2.272.337.872.505 1.827.505 2.864 0 .964-.159 1.877-.478 2.74-.318.854-.796 1.606-1.433 2.258-.637.642-1.434 1.157-2.389 1.542-.956.376-2.066.564-3.332.564-1.247 0-2.348-.179-3.304-.537-.946-.367-1.742-.867-2.389-1.501a6.39 6.39 0 0 1-1.447-2.258c-.318-.872-.478-1.808-.478-2.809zm4.547 0a8.92 8.92 0 0 0 .163 1.735c.11.542.283 1.019.519 1.432a2.92 2.92 0 0 0 .956.991c.391.239.869.358 1.433.358.519 0 .97-.11 1.352-.331.391-.22.71-.528.956-.922.255-.395.446-.867.573-1.418.128-.56.191-1.175.191-1.845a8.07 8.07 0 0 0-.177-1.721c-.109-.551-.287-1.033-.533-1.446a2.76 2.76 0 0 0-.955-.991c-.383-.248-.851-.372-1.407-.372s-1.028.119-1.419.358a2.81 2.81 0 0 0-.956.978c-.246.413-.423.895-.533 1.446s-.163 1.134-.163 1.749zm16.555-11.814c0 .303-.068.574-.204.812-.137.23-.314.422-.533.578a2.45 2.45 0 0 1-.764.358 3.46 3.46 0 0 1-.874.11 3.32 3.32 0 0 1-.915-.124c-.282-.083-.532-.202-.751-.358a1.89 1.89 0 0 1-.519-.592c-.128-.23-.191-.491-.191-.785a1.52 1.52 0 0 1 .178-.73 1.96 1.96 0 0 1 .505-.592c.209-.165.46-.294.751-.386a3.16 3.16 0 0 1 .956-.138 3.09 3.09 0 0 1 .873.124c.292.083.546.202.765.358a1.75 1.75 0 0 1 .519.578 1.51 1.51 0 0 1 .204.785zm-.204 16.042c0 .872-.178 1.542-.533 2.01-.346.468-.924.702-1.734.702-.764 0-1.306-.234-1.624-.702-.31-.468-.465-1.138-.465-2.01v-8.427c0-.872.155-1.542.465-2.01.318-.468.86-.702 1.624-.702.81 0 1.388.234 1.734.702.355.468.533 1.138.533 2.01v8.427zm6.282-4.255a10.22 10.22 0 0 0 .137 1.721 4.57 4.57 0 0 0 .491 1.404 2.67 2.67 0 0 0 .929.936c.391.23.873.344 1.447.344.528 0 .969-.11 1.324-.331a2.54 2.54 0 0 0 .874-.936c.218-.404.373-.877.464-1.418a9.72 9.72 0 0 0 .15-1.763 11 11 0 0 0-.11-1.542 5.02 5.02 0 0 0-.408-1.446c-.2-.432-.478-.785-.833-1.06s-.819-.413-1.393-.413-1.06.092-1.461.276c-.391.184-.71.463-.956.84-.236.376-.405.849-.505 1.418-.1.56-.15 1.216-.15 1.969zm-.013-4.172a4.66 4.66 0 0 1 .873-1.281 5.4 5.4 0 0 1 1.174-.923 5.31 5.31 0 0 1 1.338-.551 5.35 5.35 0 0 1 1.406-.193c.838 0 1.594.188 2.267.565a5.32 5.32 0 0 1 1.72 1.542c.482.643.851 1.404 1.106 2.286.254.872.383 1.809.383 2.809 0 1.037-.138 1.987-.411 2.85-.263.863-.641 1.606-1.133 2.231a5.21 5.21 0 0 1-1.748 1.446c-.673.349-1.423.523-2.252.523-1.019 0-1.929-.239-2.73-.716s-1.466-1.147-1.993-2.01v4.957c0 .872-.178 1.542-.533 2.01-.346.468-.924.702-1.734.702-.764 0-1.306-.234-1.624-.702-.31-.468-.465-1.138-.465-2.01V45.261c0-.872.155-1.542.465-2.01.318-.468.86-.702 1.624-.702.81 0 1.388.234 1.734.702.355.468.533 1.138.533 2.01zm15.067.977a.95.95 0 0 0 .464.84c.31.193.738.353 1.284.482l1.597.344 1.597.386a10.93 10.93 0 0 1 1.461.496 4.66 4.66 0 0 1 1.202.73 3.08 3.08 0 0 1 .819 1.047c.2.404.3.891.3 1.46 0 .716-.146 1.354-.437 1.914-.291.551-.705 1.019-1.242 1.405-.527.386-1.16.684-1.897.895s-1.552.321-2.445.33a17.54 17.54 0 0 1-2.444-.165c-.782-.101-1.478-.262-2.089-.482-.6-.22-1.082-.491-1.447-.812-.363-.33-.545-.716-.545-1.157 0-.386.122-.684.368-.895s.559-.317.943-.317c.145 0 .318.027.518.083l.655.207.751.275.846.248a11.08 11.08 0 0 0 1.12.248c.391.055.792.083 1.202.083a4.09 4.09 0 0 0 .75-.069 2.63 2.63 0 0 0 .656-.234 1.56 1.56 0 0 0 .492-.413c.128-.165.204-.367.232-.606a1.27 1.27 0 0 0 .067-.165.59.59 0 0 0 .028-.193c0-.257-.119-.487-.355-.689-.227-.202-.551-.363-.969-.482l-2.008-.454-1.774-.441c-.537-.156-1.029-.335-1.475-.537-.437-.202-.81-.45-1.12-.744-.299-.294-.537-.647-.709-1.06-.164-.413-.246-.913-.246-1.501 0-.633.141-1.198.423-1.694.291-.505.706-.927 1.243-1.267s1.187-.597 1.953-.771c.764-.184 1.628-.276 2.593-.276 1.729 0 3.044.211 3.946.633.91.413 1.365.955 1.365 1.625 0 .376-.123.665-.369.867-.246.193-.542.289-.887.289a1.88 1.88 0 0 1-.574-.096l-.695-.234c-.274-.092-.602-.17-.984-.234-.373-.073-.837-.11-1.392-.11l-1.147.055a3.64 3.64 0 0 0-.874.193c-.237.092-.423.216-.559.372-.129.156-.192.353-.192.592zm14.266 5.054c0 .431.055.808.164 1.129a2.45 2.45 0 0 0 .478.812 2.02 2.02 0 0 0 .696.482 2.5 2.5 0 0 0 .873.152 3.36 3.36 0 0 0 1.052-.165c.336-.11.633-.28.888-.51.263-.23.473-.519.628-.867s.232-.757.232-1.225v-5.838c0-.872.155-1.542.464-2.01.319-.468.86-.702 1.625-.702.809 0 1.387.234 1.733.702.356.468.533 1.138.533 2.01v8.427c0 .872-.177 1.542-.533 2.01-.346.468-.924.702-1.733.702-.765 0-1.306-.234-1.625-.702-.309-.468-.464-1.138-.464-2.01-.191.422-.442.808-.752 1.157-.3.349-.654.652-1.064.909-.401.248-.846.441-1.338.578a5.7 5.7 0 0 1-1.57.207c-.61 0-1.197-.106-1.762-.317-.554-.22-1.046-.542-1.473-.964-.428-.431-.769-.964-1.025-1.597s-.382-1.372-.382-2.217v-6.182c0-.872.155-1.542.464-2.01.319-.468.86-.702 1.625-.702.81 0 1.388.234 1.734.702.355.468.532 1.138.532 2.01v6.031zm11.339-6.031c0-.872.155-1.542.465-2.01.318-.468.859-.702 1.624-.702.81 0 1.388.234 1.734.702.354.468.533 1.138.533 2.01a4.33 4.33 0 0 1 .737-1.198 4.99 4.99 0 0 1 1.078-.936c.41-.257.851-.454 1.324-.592.473-.147.965-.22 1.475-.22a5.08 5.08 0 0 1 1.392.193 3.9 3.9 0 0 1 1.284.592 4.11 4.11 0 0 1 1.051 1.019c.301.413.533.909.697 1.487.282-.615.614-1.134.996-1.556s.797-.762 1.242-1.019a5.02 5.02 0 0 1 1.393-.551 6.73 6.73 0 0 1 1.474-.165 4.45 4.45 0 0 1 1.666.317c.537.211 1.005.532 1.406.964.41.422.733.959.969 1.611.246.642.368 1.395.368 2.258v6.224c0 .872-.177 1.542-.532 2.01-.345.468-.924.702-1.733.702-.765 0-1.306-.234-1.624-.702-.31-.468-.465-1.138-.465-2.01v-6.031a3.45 3.45 0 0 0-.163-1.102c-.11-.331-.265-.606-.465-.826-.191-.23-.419-.399-.683-.51a2.03 2.03 0 0 0-.846-.179 3.16 3.16 0 0 0-1.065.179 2.42 2.42 0 0 0-.887.551c-.246.248-.447.565-.601.95-.146.386-.218.849-.218 1.391v5.577c0 .872-.179 1.542-.533 2.01-.346.468-.924.702-1.734.702-.765 0-1.306-.234-1.624-.702-.31-.468-.465-1.138-.465-2.01v-5.77c0-.945-.196-1.661-.586-2.148-.384-.486-.907-.73-1.571-.73-.391 0-.756.064-1.093.193a2.44 2.44 0 0 0-.873.565c-.246.248-.442.555-.587.922-.137.367-.204.79-.204 1.267v5.701c0 .872-.179 1.542-.533 2.01-.346.468-.924.702-1.734.702-.765 0-1.306-.234-1.624-.702-.31-.468-.465-1.138-.465-2.01v-8.427zM40.829 54.05c-3.979 0-7.205-3.156-7.205-7.05s3.226-7.05 7.205-7.05 7.205 3.156 7.205 7.05-3.226 7.05-7.205 7.05zm-13.9-4.201c-2.065.35-3.481 2.266-2.688 4.131 1.107 2.604 2.873 4.923 5.162 6.736 3.273 2.592 7.402 3.977 11.644 3.906s8.318-1.594 11.495-4.294a17.11 17.11 0 0 0 4.914-6.905c.725-1.89-.76-3.758-2.837-4.039s-3.941 1.172-4.967 2.929a9.92 9.92 0 0 1-2.142 2.551c-1.823 1.549-4.162 2.423-6.595 2.464a10.49 10.49 0 0 1-6.681-2.241A9.95 9.95 0 0 1 32 52.609c-1.089-1.722-3.005-3.11-5.07-2.76zm31.774-1.095c.092-.705.139-1.424.139-2.153 0-9.514-8.065-17.226-18.013-17.226s-18.013 7.712-18.013 17.226a16.61 16.61 0 0 0 .228 2.749c.827-1.083 2.119-1.856 3.514-2.092 1.509-.255 2.881.096 4.04.75a9.54 9.54 0 0 1-.104-1.407c0-5.459 4.627-9.884 10.335-9.884s10.335 4.425 10.335 9.884a9.59 9.59 0 0 1-.059 1.065c1.135-.693 2.493-1.089 4.011-.885 1.402.188 2.721.918 3.587 1.972z" />
                                </svg>
                                <p class="fs-sm pt-2 mb-0">Flexible loan solutions and payment plans, making it easier to fund renovation.</p>
                            </div>
                        </a>
                    </div>

                    <!-- Partner card -->
                    <div class="swiper-slide h-auto">
                        <a class="card h-100 text-decoration-none rounded-4 p-xl-2" href="#!">
                            <div class="card-body text-center">
                                <svg class="d-inline-block text-secondary-emphasis" xmlns="http://www.w3.org/2000/svg" width="220" viewBox="0 0 220 93" fill="currentColor">
                                    <path d="M45.633 62.275h29.478v-28.2H45.633v28.2zm23.804-16.813h-6.229v-5.959h6.229v5.959zm-18.132-5.959h6.232v11.386h11.899v5.959H51.306V39.503zm43.002-5.428c-2.915 0-5.765.827-8.189 2.376s-4.313 3.751-5.429 6.328-1.407 5.411-.839 8.146 1.972 5.248 4.034 7.219 4.688 3.315 7.547 3.859a15.36 15.36 0 0 0 8.516-.802c2.694-1.067 4.995-2.874 6.614-5.193s2.484-5.045 2.484-7.834c-.004-3.738-1.559-7.322-4.322-9.965s-6.509-4.13-10.417-4.135zm0 22.772a9.36 9.36 0 0 1-5.037-1.462c-1.491-.953-2.653-2.307-3.339-3.892s-.866-3.328-.516-5.011 1.213-3.227 2.481-4.44a9.2 9.2 0 0 1 4.642-2.373 9.45 9.45 0 0 1 5.238.493c1.656.656 3.073 1.768 4.069 3.194s1.527 3.103 1.527 4.818c-.003 2.299-.96 4.503-2.659 6.128s-4.003 2.54-6.406 2.544zm67.483-22.772c-2.916 0-5.765.826-8.189 2.376s-4.313 3.751-5.429 6.328-1.408 5.412-.839 8.147 1.972 5.248 4.033 7.22 4.688 3.315 7.547 3.859a15.36 15.36 0 0 0 8.516-.802c2.693-1.067 4.995-2.874 6.614-5.193s2.485-5.045 2.485-7.834c-.005-3.738-1.558-7.322-4.321-9.965s-6.51-4.13-10.417-4.135zm0 22.772c-1.793 0-3.545-.508-5.037-1.461s-2.653-2.307-3.339-3.892-.866-3.328-.516-5.011 1.213-3.228 2.48-4.441 2.884-2.039 4.642-2.374 3.581-.163 5.237.493 3.073 1.768 4.07 3.194 1.527 3.103 1.527 4.818c-.003 2.299-.959 4.502-2.659 6.128s-4.002 2.541-6.405 2.544zm-33.742-22.772c-2.915 0-5.765.827-8.189 2.376s-4.313 3.751-5.428 6.328-1.408 5.411-.839 8.146 1.972 5.248 4.034 7.219 4.687 3.315 7.546 3.859a15.36 15.36 0 0 0 8.516-.802c2.694-1.067 4.996-2.874 6.615-5.193s2.484-5.045 2.484-7.834c-.004-3.738-1.559-7.322-4.322-9.965s-6.509-4.13-10.417-4.135zm0 22.772c-1.671.001-3.309-.44-4.734-1.274s-2.582-2.028-3.342-3.451-1.095-3.019-.967-4.612a8.44 8.44 0 0 1 1.692-4.417c.979-1.295 2.313-2.306 3.854-2.922s3.231-.812 4.882-.567 3.199.922 4.473 1.955 2.225 2.384 2.748 3.901h-8.606v5.427h8.606a8.72 8.72 0 0 1-3.297 4.309 9.36 9.36 0 0 1-5.309 1.65z" />
                                </svg>
                                <p class="fs-sm pt-2 mb-0">Provide our users with access to a broad range of high-quality materials and resources.</p>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- Pagination (Bullets) -->
                <div class="swiper-pagination position-static mt-3"></div>
            </div>
        </section>
    </main>

    @include('layouts.partials.footer.real-estate-footer')

@endsection

@push('scripts')
    <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>

    @vite(['resources/js/app.js'])
@endpush