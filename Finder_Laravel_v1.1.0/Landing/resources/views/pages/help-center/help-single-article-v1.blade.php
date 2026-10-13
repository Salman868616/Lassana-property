@extends('layouts.app')

@section('title', 'Finder | Help Single Article v.1')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}">
@endpush

@section('content')

    @include('layouts.partials.header.real-estate-header')

    <!-- Page content -->
    <main class="content-wrapper">

        <!-- Hero with search input -->
        <section class="container pb-5 mb-lg-3">
            <div class="bg-info rounded" data-bs-theme="light">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-7 col-lg-6 offset-lg-1">
                        <div class="pt-5 pb-3 pb-md-5 px-4 px-sm-5 ps-lg-0 pe-md-0">
                            <h1 class="display-6 text-white text-center text-md-start mb-4">How can we help you?</h1>
                            <div class="bg-body border rounded p-2">
                                <form class="d-flex flex-column flex-sm-row gap-2 p-1">
                                    <div class="position-relative w-100">
                                        <i class="fi-search position-absolute top-50 start-0 translate-middle-y fs-xl text-secondary-emphasis ms-2"></i>
                                        <input type="search" class="form-control form-control-lg form-icon-start border-0 rounded-0" placeholder="What do you need help with?">
                                    </div>
                                    <button type="submit" class="btn btn-lg btn-primary">Search</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-8 col-sm-6 col-md-5 col-xl-4 offset-xl-1 align-self-end">
                        <div class="ps-md-5 ms-lg-2 ms-xl-0 ps-xl-0">
                            <div class="ratio" style="--fn-aspect-ratio: calc(356 / 416 * 100%)">
                                <img src="{{ asset('assets/img/help/v1/hero.png') }}" alt="Image">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <!-- Help topics -->
        <section class="container pb-5 mb-2 mb-sm-3 mb-md-4 mb-xl-5">

            <!-- Nav pills -->
            <ul class="nav nav-pills gap-2 pb-1 pb-sm-2 pb-md-3 pb-lg-0 mb-4 mb-lg-5">
                <li class="nav-item me-1">
                    <a class="nav-link active" aria-current="page" href="#!">For tenants</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#!">For hosts</a>
                </li>
            </ul>

            <div class="row g-0">
                <div class="col-md-4 col-lg-3 pb-2 pb-sm-3 pb-md-0 mb-4 mb-md-0">
                    <h2 class="h5 border-bottom pb-3 pb-sm-4 mb-0">Help topics</h2>

                    <!-- Nav in format of list group -->
                    <div class="list-group list-group-borderless pt-4 pe-md-4" role="tablist">
                        <a class="list-group-item list-group-item-action d-flex align-items-center fs-base active" href="help-topics-v1">Accommodation</a>
                        <a class="list-group-item list-group-item-action d-flex align-items-center fs-base" href="help-topics-v1">Booking</a>
                        <a class="list-group-item list-group-item-action d-flex align-items-center fs-base" href="help-topics-v1">Payment</a>
                        <a class="list-group-item list-group-item-action d-flex align-items-center fs-base" href="help-topics-v1">After a booking</a>
                        <a class="list-group-item list-group-item-action d-flex align-items-center fs-base" href="help-topics-v1">Cancellation, notice, extension</a>
                        <a class="list-group-item list-group-item-action d-flex align-items-center fs-base" href="help-topics-v1">Regulations</a>
                        <a class="list-group-item list-group-item-action d-flex align-items-center fs-base" href="help-topics-v1">Insurances</a>
                    </div>

                </div>
                <!-- Article content -->
                <div class="col-md-8 col-lg-9">
                    <div class="d-flex align-items-start border-bottom ps-md-4 pb-3 pb-sm-4">
                        <a class="btn btn-sm btn-outline-secondary border-0 p-0 pe-2" href="help-topics-v1" aria-label="Back to main topic">
                            <i class="fi-chevron-left fs-4"></i>
                        </a>
                        <h2 class="h5 d-flex min-w-0 mb-0">
                            <span class="d-md-none">What is included in my rental accommodation?</span>
                            <span class="text-truncate d-none d-md-inline">What is included in my rental accommodation?</span>
                        </h2>
                    </div>
                    <div class="position-relative">
                        <div class="position-absolute top-0 start-0 h-100 border-start d-none d-md-block"></div>
                        <div class="row g-0">
                            <div class="col-xl-11 col-xxl-10 pt-4 ps-md-4">
                                <p>When you rent a property, it's important to understand exactly what is included in your rental accommodation to ensure that it meets your needs and expectations. Here's a breakdown of the typical inclusions and what you should consider:</p>
                                <h3 class="h6 pt-2 pt-lg-3">1. Furnishings</h3>
                                <p>The level of furnishing can vary significantly between rental properties. Typically, rental accommodations are categorized as:</p>
                                <ul>
                                    <li><span class="text-body-emphasis fw-medium">Fully furnished:</span> Includes essential furniture such as beds, sofas, dining tables, chairs, and sometimes even decor items like lamps, artwork, and rugs. Kitchens are usually equipped with basic appliances and utensils.</li>
                                    <li><span class="text-body-emphasis fw-medium">Partially furnished:</span> Includes some essential furniture but may not have everything you need. For example, the property might include a bed and sofa, but you'll need to provide your own kitchenware and additional furnishings.</li>
                                    <li><span class="text-body-emphasis fw-medium">Unfurnished:</span> Contains no furniture or only basic appliances like a stove and refrigerator. This option gives you the freedom to furnish the space according to your taste but requires an initial investment in furniture.</li>
                                </ul>
                                <h3 class="h6 pt-2 pt-lg-3">2. Appliances</h3>
                                <p>Most rental accommodations include essential appliances, but the specific items can vary:</p>
                                <ul>
                                    <li><span class="text-body-emphasis fw-medium">Kitchen appliances:</span> Standard inclusions often cover a refrigerator, stove/oven, and microwave. Some rentals may also include a dishwasher, toaster, and coffee maker.</li>
                                    <li><span class="text-body-emphasis fw-medium">Laundry:</span> Depending on the property, you might have an in-unit washer and dryer, access to shared laundry facilities, or no laundry facilities at all.</li>
                                    <li><span class="text-body-emphasis fw-medium">Heating and cooling:</span> Central heating and air conditioning are common, but some properties may only have portable heaters or window A/C units. It's important to check what's available to ensure comfort throughout the year.</li>
                                </ul>
                                <h3 class="h6 pt-2 pt-lg-3">3. Utilities</h3>
                                <p>Utilities are sometimes included in the rent, but this varies by property:</p>
                                <ul>
                                    <li><span class="text-body-emphasis fw-medium">Included utilities:</span> Some rentals include the cost of water, electricity, gas, heating, and even internet or cable in the rent. This can simplify budgeting, as you won't have separate utility bills to pay.</li>
                                    <li><span class="text-body-emphasis fw-medium">Excluded utilities:</span> If utilities are not included, you'll be responsible for setting up and paying for these services separately. Be sure to ask for an estimate of monthly utility costs so you can budget accordingly.</li>
                                </ul>
                                <h3 class="h6 pt-2 pt-lg-3">4. Internet and cable</h3>
                                <p>Some rental accommodations come with pre-installed internet and cable services, either included in the rent or available as an add-on. If these services are not provided, you'll need to arrange for installation and pay for them separately.</p>
                                <h3 class="h6 pt-2 pt-lg-3">5. Maintenance and repairs</h3>
                                <p>Most rental agreements specify that the landlord is responsible for the maintenance and repair of essential services like plumbing, heating, and electrical systems. However, tenants are usually responsible for minor maintenance, such as changing light bulbs or keeping the property clean.</p>
                                <ul>
                                    <li><span class="text-body-emphasis fw-medium">Emergency repairs:</span> It's important to know how to report urgent issues, such as leaks or heating failures, and what the expected response time is.</li>
                                </ul>
                                <h3 class="h6 pt-2 pt-lg-3">6. Parking</h3>
                                <p>If you have a vehicle, parking is an essential consideration:</p>
                                <ul>
                                    <li><span class="text-body-emphasis fw-medium">Included parking:</span> Some properties offer dedicated parking spaces, either in a garage or an outdoor lot, as part of the rental agreement.</li>
                                    <li><span class="text-body-emphasis fw-medium">Additional parking:</span> In some cases, parking is available but at an additional cost, or you may need to apply for a permit for street parking.</li>
                                </ul>
                                <h3 class="h6 pt-2 pt-lg-3">7. Outdoor space</h3>
                                <p>Depending on the property type, you may have access to outdoor areas:</p>
                                <ul>
                                    <li><span class="text-body-emphasis fw-medium">Private outdoor space:</span> Some rentals include a private balcony, patio, or yard, which is typically your responsibility to maintain.</li>
                                    <li><span class="text-body-emphasis fw-medium">Shared outdoor areas:</span> In multi-unit buildings, you might have access to shared spaces like gardens, courtyards, or rooftop terraces.</li>
                                </ul>
                                <h3 class="h6 pt-2 pt-lg-3">8. Lease terms</h3>
                                <p>The inclusions and responsibilities associated with your rental accommodation should be clearly outlined in your lease agreement. This document will specify what is covered by your rent and what additional costs or responsibilities you may incur.</p>
                                <h3 class="h6 pt-2 pt-lg-3">9. Tenant's responsibilities</h3>
                                <p>While the landlord typically covers major maintenance and repairs, you may be responsible for maintaining cleanliness, minor repairs, and following specific rules regarding the use of shared facilities.</p>
                                <h3 class="h6 pt-2 pt-lg-3">Conclusion</h3>
                                <p>Understanding what is included in your rental accommodation is essential for avoiding surprises and ensuring that the property meets your needs. Always clarify with the landlord or property manager exactly what is provided and what you're responsible for before signing the lease.</p>

                                <div class="pt-4">
                                    <h4 class="h6 pb-1">Was this information helpful?</h4>
                                    <div class="d-flex gap-3">
                                        <button type="button" class="btn btn-outline-secondary">
                                            <i class="fi-thumbs-up fs-base me-1 ms-n1"></i>
                                            Yes
                                        </button>
                                        <button type="button" class="btn btn-outline-secondary">
                                            <i class="fi-thumbs-down fs-base me-1 ms-n1"></i>
                                            No
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contact CTA -->
            <div class="pt-4 mt-2 mt-sm-3">
                <h3 class="fs-base pb-sm-1">Can't find an answer to your question?</h3>
                <a class="btn btn-lg btn-primary" href="contact-v1">Contact us</a>
            </div>
        </section>


        <!-- Popular articles -->
        <section class="bg-body-tertiary py-5">
            <div class="container py-1 py-sm-3 py-md-4 py-xl-5">
                <h2 class="pb-2 pb-md-3">Popular articles</h2>

                <!-- Filter nav pills -->
                <div class="d-flex align-items-center justify-content-between gap-3">
                    <div class="overflow-x-auto pb-3 mb-3 mb-lg-4">
                        <ul class="nav nav-pills flex-nowrap gap-2">
                            <li class="nav-item me-1">
                                <a class="nav-link text-nowrap active" aria-current="page" href="#!">All</a>
                            </li>
                            <li class="nav-item me-1">
                                <a class="nav-link text-nowrap" href="#!">Accommodation</a>
                            </li>
                            <li class="nav-item me-1">
                                <a class="nav-link text-nowrap" href="#!">Booking</a>
                            </li>
                            <li class="nav-item me-1">
                                <a class="nav-link text-nowrap" href="#!">Payment</a>
                            </li>
                            <li class="nav-item me-1">
                                <a class="nav-link text-nowrap" href="#!">Cancellation</a>
                            </li>
                            <li class="nav-item me-1">
                                <a class="nav-link text-nowrap" href="#!">Insurances</a>
                            </li>
                        </ul>
                    </div>
                    <div class="nav pb-3 mb-3 mb-lg-4">
                        <a class="nav-link position-relative text-nowrap p-0" href="#!">
                            <span class="hover-effect-underline stretched-link">Browse all<span class="d-none d-sm-inline"> topics</span></span>
                            <i class="fi-chevron-right fs-base mt-1 ms-1 me-n1"></i>
                        </a>
                    </div>
                </div>

                <!-- Grid of articles that turns into carousel on screens <992px wide (lg breakpoint) -->
                <div class="swiper" data-swiper='{
                        "slidesPerView": 1,
                        "spaceBetween": 24,
                        "autoHeight": true,
                        "pagination": {
                          "el": ".swiper-pagination",
                          "clickable": true
                        },
                        "breakpoints": {
                          "500": {
                            "slidesPerView": 2
                          },
                          "992": {
                            "slidesPerView": 3
                          }
                        }
                      }'>
                    <div class="swiper-wrapper">

                        <!-- Article -->
                        <article class="swiper-slide">
                            <a class="ratio d-flex hover-effect-scale bg-body-secondary rounded overflow-hidden" href="#!" style="--fn-aspect-ratio: calc(300 / 416 * 100%)">
                                <img src="{{ asset('assets/img/help/v1/01.jpg') }}" class="hover-effect-target" alt="Image">
                            </a>
                            <div class="pt-4">
                                <div class="text-body-secondary fs-xs text-uppercase pb-2 mt-n1 mb-1">Accommodation</div>
                                <h3 class="h5 mb-2">
                                    <a class="hover-effect-underline" href="#!">Renting out a condo</a>
                                </h3>
                                <p class="fs-sm mb-0">Maximize your investment by renting out your condo - unlock a steady income stream and build wealth over time...</p>
                            </div>
                        </article>

                        <!-- Article -->
                        <article class="swiper-slide">
                            <a class="ratio d-flex hover-effect-scale bg-body-secondary rounded overflow-hidden" href="#!" style="--fn-aspect-ratio: calc(300 / 416 * 100%)">
                                <img src="{{ asset('assets/img/help/v1/02.jpg') }}" class="hover-effect-target" alt="Image">
                            </a>
                            <div class="pt-4">
                                <div class="text-body-secondary fs-xs text-uppercase pb-2 mt-n1 mb-1">Insurances</div>
                                <h3 class="h5 mb-2">
                                    <a class="hover-effect-underline" href="#!">What is renters' insurance?</a>
                                </h3>
                                <p class="fs-sm mb-0">Renters' insurance is a type of insurance policy that provides coverage for tenants renting a home or apartment...</p>
                            </div>
                        </article>

                        <!-- Article -->
                        <article class="swiper-slide">
                            <a class="ratio d-flex hover-effect-scale bg-body-secondary rounded overflow-hidden" href="#!" style="--fn-aspect-ratio: calc(300 / 416 * 100%)">
                                <img src="{{ asset('assets/img/help/v1/03.jpg') }}" class="hover-effect-target" alt="Image">
                            </a>
                            <div class="pt-4">
                                <div class="text-body-secondary fs-xs text-uppercase pb-2 mt-n1 mb-1">Booking</div>
                                <h3 class="h5 mb-2">
                                    <a class="hover-effect-underline" href="#!">Tips and tricks for renters</a>
                                </h3>
                                <p class="fs-sm mb-0">Unlock your best renting experience with our essential tips and tricks, designed to help you save money and find the...</p>
                            </div>
                        </article>
                    </div>

                    <!-- Pagination (Bullets) -->
                    <div class="swiper-pagination position-static mt-3 mt-md-4"></div>
                </div>
            </div>
        </section>


        <!-- FAQ (Accordion) -->
        <section class="container py-5 mb-xxl-3">
            <div class="row py-1 py-sm-2 py-md-3 py-lg-4 py-xl-5">
                <div class="col-md-4 col-xl-3 mb-4 mb-md-0" style="margin-top: -120px">
                    <div class="sticky-md-top text-center text-md-start pe-md-4 pe-lg-5 pe-xl-0" style="padding-top: 120px;">
                        <h2>Popular FAQs</h2>
                        <p class="pb-2 pb-md-3">Still have unanswered questions and need to get in touch?</p>
                        <a class="btn btn-lg btn-primary" href="contact-v1">Contact us</a>
                    </div>
                </div>
                <div class="col-md-8 offset-xl-1">

                    <!-- Accordion of questions -->
                    <div class="accordion" id="faq">

                        <!-- Question -->
                        <div class="accordion-item">
                            <h3 class="accordion-header" id="faqHeading-1">
                                <button type="button" class="accordion-button hover-effect-underline collapsed" data-bs-toggle="collapse" data-bs-target="#faqCollapse-1" aria-expanded="false" aria-controls="faqCollapse-1">
                                    <span class="me-2">How do I start the process of buying a home?</span>
                                </button>
                            </h3>
                            <div class="accordion-collapse collapse" id="faqCollapse-1" aria-labelledby="faqHeading-1" data-bs-parent="#faq">
                                <div class="accordion-body">The first step is to assess your financial situation and get pre-approved for a mortgage. This will give you a clear understanding of your budget. After that, you can start searching for properties that match your criteria and work with a real estate agent to guide you through the process.</div>
                            </div>
                        </div>

                        <!-- Question -->
                        <div class="accordion-item">
                            <h3 class="accordion-header" id="faqHeading-2">
                                <button type="button" class="accordion-button hover-effect-underline collapsed" data-bs-toggle="collapse" data-bs-target="#faqCollapse-2" aria-expanded="false" aria-controls="faqCollapse-2">
                                    <span class="me-2">What should I consider when choosing a neighborhood?</span>
                                </button>
                            </h3>
                            <div class="accordion-collapse collapse" id="faqCollapse-2" aria-labelledby="faqHeading-2" data-bs-parent="#faq">
                                <div class="accordion-body">Consider factors such as the proximity to schools, work, public transportation, safety, and local amenities like shops and parks. It’s also important to research the neighborhood's future development plans and property value trends.</div>
                            </div>
                        </div>

                        <!-- Question -->
                        <div class="accordion-item">
                            <h3 class="accordion-header" id="faqHeading-3">
                                <button type="button" class="accordion-button hover-effect-underline collapsed" data-bs-toggle="collapse" data-bs-target="#faqCollapse-3" aria-expanded="false" aria-controls="faqCollapse-3">
                                    <span class="me-2">How much should I budget for closing costs?</span>
                                </button>
                            </h3>
                            <div class="accordion-collapse collapse" id="faqCollapse-3" aria-labelledby="faqHeading-3" data-bs-parent="#faq">
                                <div class="accordion-body">Closing costs typically range from 2% to 5% of the home's purchase price. These costs can include loan origination fees, title insurance, attorney fees, and other related expenses. It's advisable to set aside additional funds for these costs.</div>
                            </div>
                        </div>

                        <!-- Question -->
                        <div class="accordion-item">
                            <h3 class="accordion-header" id="faqHeading-4">
                                <button type="button" class="accordion-button hover-effect-underline collapsed" data-bs-toggle="collapse" data-bs-target="#faqCollapse-4" aria-expanded="false" aria-controls="faqCollapse-4">
                                    <span class="me-2">Is it better to rent or buy a home?</span>
                                </button>
                            </h3>
                            <div class="accordion-collapse collapse" id="faqCollapse-4" aria-labelledby="faqHeading-4" data-bs-parent="#faq">
                                <div class="accordion-body">This depends on your personal financial situation, lifestyle, and long-term goals. Buying is often considered a good investment, but it requires a significant upfront cost and ongoing maintenance. Renting offers more flexibility and fewer responsibilities, but you won't build equity.</div>
                            </div>
                        </div>

                        <!-- Question -->
                        <div class="accordion-item">
                            <h3 class="accordion-header" id="faqHeading-5">
                                <button type="button" class="accordion-button hover-effect-underline collapsed" data-bs-toggle="collapse" data-bs-target="#faqCollapse-5" aria-expanded="false" aria-controls="faqCollapse-5">
                                    <span class="me-2">How do I determine the right price to offer on a home?</span>
                                </button>
                            </h3>
                            <div class="accordion-collapse collapse" id="faqCollapse-5" aria-labelledby="faqHeading-5" data-bs-parent="#faq">
                                <div class="accordion-body">Research comparable properties in the area that have recently sold to get a sense of the market value. Your real estate agent can also provide a comparative market analysis (CMA) to help determine a fair offer based on the property's condition, location, and market demand.</div>
                            </div>
                        </div>

                        <!-- Question -->
                        <div class="accordion-item">
                            <h3 class="accordion-header" id="faqHeading-6">
                                <button type="button" class="accordion-button hover-effect-underline collapsed" data-bs-toggle="collapse" data-bs-target="#faqCollapse-6" aria-expanded="false" aria-controls="faqCollapse-6">
                                    <span class="me-2">What should I look for during a home inspection?</span>
                                </button>
                            </h3>
                            <div class="accordion-collapse collapse" id="faqCollapse-6" aria-labelledby="faqHeading-6" data-bs-parent="#faq">
                                <div class="accordion-body">During a home inspection, focus on the structural integrity of the property, including the roof, foundation, plumbing, electrical systems, and HVAC. Look for signs of water damage, mold, and pests. The inspector will provide a detailed report, which can be used to negotiate repairs or price adjustments.</div>
                            </div>
                        </div>

                        <!-- Question -->
                        <div class="accordion-item">
                            <h3 class="accordion-header" id="faqHeading-7">
                                <button type="button" class="accordion-button hover-effect-underline collapsed" data-bs-toggle="collapse" data-bs-target="#faqCollapse-7" aria-expanded="false" aria-controls="faqCollapse-7">
                                    <span class="me-2">What are the benefits of getting a pre-approved mortgage?</span>
                                </button>
                            </h3>
                            <div class="accordion-collapse collapse" id="faqCollapse-7" aria-labelledby="faqHeading-7" data-bs-parent="#faq">
                                <div class="accordion-body">Getting pre-approved for a mortgage shows sellers that you are a serious buyer and can afford the property. It also helps you set a realistic budget and speeds up the home-buying process since your financial documents are already in order.</div>
                            </div>
                        </div>

                        <!-- Question -->
                        <div class="accordion-item">
                            <h3 class="accordion-header" id="faqHeading-8">
                                <button type="button" class="accordion-button hover-effect-underline collapsed" data-bs-toggle="collapse" data-bs-target="#faqCollapse-8" aria-expanded="false" aria-controls="faqCollapse-8">
                                    <span class="me-2">How can I make my home more appealing to buyers?</span>
                                </button>
                            </h3>
                            <div class="accordion-collapse collapse" id="faqCollapse-8" aria-labelledby="faqHeading-8" data-bs-parent="#faq">
                                <div class="accordion-body">To make your home more appealing, focus on curb appeal by maintaining the exterior, landscaping, and entryway. Inside, declutter, clean thoroughly, and consider staging the home with neutral décor to allow buyers to envision themselves living there. Address any necessary repairs and updates.</div>
                            </div>
                        </div>

                        <!-- Question -->
                        <div class="accordion-item">
                            <h3 class="accordion-header" id="faqHeading-9">
                                <button type="button" class="accordion-button hover-effect-underline collapsed" data-bs-toggle="collapse" data-bs-target="#faqCollapse-9" aria-expanded="false" aria-controls="faqCollapse-9">
                                    <span class="me-2">What is a seller's market vs. a buyer's market?</span>
                                </button>
                            </h3>
                            <div class="accordion-collapse collapse" id="faqCollapse-9" aria-labelledby="faqHeading-9" data-bs-parent="#faq">
                                <div class="accordion-body">A seller's market occurs when there are more buyers than available properties, leading to higher prices and quicker sales. A buyer's market happens when there are more properties than buyers, giving buyers more negotiating power and typically leading to lower prices.</div>
                            </div>
                        </div>

                        <!-- Question -->
                        <div class="accordion-item">
                            <h3 class="accordion-header" id="faqHeading-10">
                                <button type="button" class="accordion-button hover-effect-underline collapsed" data-bs-toggle="collapse" data-bs-target="#faqCollapse-10" aria-expanded="false" aria-controls="faqCollapse-10">
                                    <span class="me-2">How long does it take to close on a home?</span>
                                </button>
                            </h3>
                            <div class="accordion-collapse collapse" id="faqCollapse-10" aria-labelledby="faqHeading-10" data-bs-parent="#faq">
                                <div class="accordion-body">The closing process typically takes 30 to 45 days, depending on various factors such as the type of loan, the efficiency of the involved parties, and any unforeseen issues that may arise. Staying organized and responsive can help ensure a smoother, faster closing process.</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    @include('layouts.partials.footer.real-estate-footer')

@endsection

@push('scripts')
    <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    @vite(['resources/js/app.js'])
@endpush