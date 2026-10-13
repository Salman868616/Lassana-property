@extends('layouts.app')

@section('title', 'Finder | Contact v.1')

@section('content')

    @include('layouts.partials.header.real-estate-header')

    <!-- Page content -->
    <main class="content-wrapper">

        <!-- Hero with contact details -->
        <section class="position-relative overflow-hidden mt-n3 mt-sm-0 mx-auto" style="max-width: 1808px">
            <div class="container position-relative z-1 py-5 my-lg-2 my-xl-4">
                <h1 class="display-4 pt-xxl-2 pb-2 mb-1">Need help?</h1>
                <p class="pb-sm-2 pb-lg-3 pb-xxl-0 mb-4 mb-xxl-5">Our team is here to help</p>
                <div class="row g-3 g-md-4 pb-xxl-2">

                    <!-- Email -->
                    <div class="col-sm-6 col-lg-5 col-xl-4">
                        <div class="card h-100 shadow-sm p-md-2">
                            <div class="card-body">
                                <svg class="d-block mb-3 mb-md-4" xmlns="http://www.w3.org/2000/svg" width="64" viewBox="0 0 64 64" data-bs-theme="light">
                                    <path d="M54.771 29.826L39.912 41.216 35.247 44.8s-1.627 1.411-3.254 1.411-3.254-1.411-3.254-1.411l-4.767-3.584L9.215 29.826V14.649 4.887c0-2.275 1.957-4.334 4.334-4.334h36.875c2.275 0 4.334 1.958 4.334 4.334v9.762 15.177h.013z" fill="currentColor" style="color: var(--fn-warning-bg-subtle)" />
                                    <path class="text-warning" d="M60.199 17.903l-5.428-3.254v15.19L40.014 41.114l-4.665 3.585s-1.627 1.411-3.254 1.411-3.254-1.411-3.254-1.411l-3.763-2.822-1.119-.864L9.215 29.826V14.649l-5.313 3.254C1.957 18.984.877 21.132.648 23.395l-.216-.076v.979 34.714c0 .432.114.864.216 1.297.547 1.843 2.275 3.14 4.233 3.14h54.238c2.059 0 3.801-1.411 4.233-3.254.114-.331.114-.763.114-1.08V24.412v-.864c-.229-2.39-1.322-4.449-3.267-5.644z" fill="currentColor" />
                                    <path class="text-warning-emphasis" d="M9.216 14.649v15.19L.75 23.433H.648c.216-2.275 1.297-4.449 3.254-5.529l5.313-3.254zm54.238 8.885h-.331l-8.351 6.292V14.649l5.428 3.254c1.945 1.195 3.038 3.254 3.254 5.631z" fill="currentColor" />
                                    <path d="M59.106 63.994H4.881C2.174 63.994 0 61.82 0 59.113V24.412c0-2.924 1.411-5.745 3.47-6.94l1.08-.763c.216-.216.547-.114.763.114s.114.547-.114.763l-1.08.763c-2.059 1.195-3.038 3.902-3.038 6.076v34.714c0 2.174 1.627 3.801 3.801 3.801h54.238c2.174 0 3.801-1.627 3.801-3.801V24.412c0-2.707-1.081-4.881-3.038-6.076l-1.08-.763c-.216-.216-.331-.547-.114-.763s.547-.331.763-.114l1.08.763c2.174 1.411 3.47 3.902 3.47 6.94v34.714c-.013 2.72-2.174 4.881-4.894 4.881zm0-6.508c-.114 0-.216 0-.331-.114l-15.19-11.936c-.216-.216-.331-.546-.114-.763s.547-.331.763-.114l15.19 11.936c.216.216.331.547.114.763-.102.127-.318.229-.432.229zm-54.225 0c-.114 0-.33-.114-.432-.216-.216-.216-.114-.547.114-.763L19.74 44.584c.216-.216.547-.114.763.114.216.216.114.547-.114.763L5.199 57.384c-.102.102-.216.102-.318.102zm27.113-10.843c-1.741 0-3.585-1.513-3.585-1.513L4.665 27.005c-.216-.216-.33-.547-.114-.763s.547-.331.763-.114l3.47 2.606V4.887c0-2.606 2.275-4.881 4.881-4.881h36.875c2.606 0 4.881 2.275 4.881 4.881v23.859l3.47-2.606c.216-.216.547-.114.763.114s.114.547-.114.763L35.68 45.131c-.216.102-1.945 1.513-3.686 1.513zM9.762 29.61L29.07 44.253s1.513 1.297 2.924 1.297 2.924-1.195 2.924-1.195l19.308-14.757V4.887c0-2.059-1.741-3.801-3.801-3.801H13.55c-2.059 0-3.801 1.741-3.801 3.801V29.61h.013zm27.659 8.351H26.579a.51.51 0 0 1-.547-.547.51.51 0 0 1 .547-.547h10.842a.51.51 0 0 1 .547.547c-.013.33-.229.547-.547.547zm6.508-6.508h-4.334a.51.51 0 0 1-.547-.547.51.51 0 0 1 .547-.547h4.334a.51.51 0 0 1 .547.547.52.52 0 0 1-.547.547zm-8.682 0h-15.19a.51.51 0 0 1-.547-.547.51.51 0 0 1 .547-.547h15.19a.51.51 0 0 1 .546.547.51.51 0 0 1-.546.547zm8.682-6.508H30.913a.51.51 0 0 1-.547-.547.51.51 0 0 1 .547-.547h13.016a.51.51 0 0 1 .547.547c-.013.33-.229.547-.547.547zm-17.363 0h-6.508a.51.51 0 0 1-.547-.547.51.51 0 0 1 .547-.547h6.508a.51.51 0 0 1 .547.547.51.51 0 0 1-.547.547zm6.508-8.669H20.058a.51.51 0 0 1-.547-.547.51.51 0 0 1 .547-.547h13.016a.51.51 0 0 1 .547.547.51.51 0 0 1-.547.547z" fill="#333d4c" />
                                </svg>
                                <h3 class="h4 pb-2 mb-1">Drop us a line</h3>
                                <p class="mb-0">Write to us if you have any difficulties in working with the service.</p>
                            </div>
                            <div class="card-footer bg-transparent border-0 pt-1 pt-md-2 pt-lg-3 pb-4">
                                <a class="btn btn-lg btn-dark w-100 px-3" href="mailto:support@example.com">support@example.com</a>
                            </div>
                        </div>
                    </div>

                    <!-- Phone -->
                    <div class="col-sm-6 col-lg-5 col-xl-4">
                        <div class="card h-100 shadow-sm p-md-2">
                            <div class="card-body">
                                <svg class="d-block mb-3 mb-md-4" xmlns="http://www.w3.org/2000/svg" width="64" viewBox="0 0 64 64">
                                    <path class="text-primary" d="M5.945 13.271l6.173-6.173 12.345 12.345-6.173 6.173-9.313-9.205 9.205 9.205c-3.032 3.032-3.032 9.205 3.898 16.135s13.103 6.931 16.244 3.898L50.67 57.996c-5.415 5.415-10.829 6.173-16.244 3.898 0 0-7.689-3.032-18.518-13.861S2.047 29.515 2.047 29.515C-.985 23.342.531 18.686 5.945 13.271zM38.325 45.65L50.67 57.996l6.173-6.173-12.345-12.345-6.173 6.173z" fill="currentColor" />
                                    <path d="M40.0566 63.9515C38.2156 63.9515 36.2664 63.5184 34.3171 62.652C33.9923 62.5437 26.4119 59.4033 15.5827 48.6824C4.86194 37.9615 1.72144 30.2729 1.61319 29.9481C-1.41893 23.8837 -0.227806 19.0106 5.61993 13.1628L11.7925 6.99023C12.0092 6.7736 12.334 6.7736 12.5505 6.99023L24.8958 19.3355C25.1124 19.5521 25.1124 19.877 24.8958 20.0935L21.8637 23.1256C21.647 23.3422 21.3222 23.3422 21.1057 23.1256C20.8892 22.9089 20.889 22.5841 21.1057 22.3676L23.8129 19.6603L12.2258 8.0731L6.48631 13.8126C0.963443 19.3355 -0.11943 23.6671 2.69606 29.4066C2.69606 29.5148 5.94481 37.2035 16.449 47.8162C27.0616 58.4288 34.7503 61.5691 34.7503 61.5691C40.1649 63.9515 45.1462 62.7604 50.0193 58.2121L41.1395 49.3323C40.9229 49.1156 40.9229 48.7908 41.1395 48.5743C41.3561 48.3577 41.681 48.3577 41.8975 48.5743L51.1022 57.779C51.3188 57.9956 51.3188 58.3205 51.1022 58.537C47.6371 62.2189 43.9551 63.9515 40.0566 63.9515ZM53.8097 55.7214C53.7015 55.7214 53.4848 55.7214 53.3766 55.6131C53.16 55.3965 53.16 55.0716 53.3766 54.8551L55.9756 52.1479L44.3884 40.5607L38.6489 46.3002C35.4001 49.5489 28.9026 49.6571 21.6472 42.4017C14.7165 35.471 14.4999 29.1901 17.4238 25.8331L8.54393 16.9532C8.3273 16.7366 8.3273 16.4117 8.54393 16.1952C8.76055 15.9787 9.08543 15.9786 9.30193 16.1952L18.5067 25.3999C18.7233 25.6166 18.7233 25.9414 18.5067 26.1579C15.5828 29.0818 15.691 34.9295 22.4052 41.5353C29.0109 48.2494 34.967 48.2494 37.7825 45.4338L43.9551 39.2612C44.1717 39.0445 44.4966 39.0445 44.7131 39.2612L57.0583 51.6064C57.275 51.823 57.275 52.1479 57.0583 52.3644L54.0262 55.3965C54.1346 55.7214 53.918 55.7214 53.8097 55.7214Z" fill="#333d4c" />
                                    <path class="text-secondary-emphasis" d="M63.3399 29.2983C63.015 29.2983 62.7984 29.0817 62.7984 28.7568C63.015 21.2847 60.1994 14.0292 55.0014 8.9395C49.8034 3.84976 42.6562 0.925886 35.1841 1.14251C34.8592 1.14251 34.6426 0.925886 34.6426 0.601012C34.6426 0.276138 34.8592 0.0595124 35.1841 0.0595124C42.9811 -0.157113 50.4532 2.76676 55.8678 8.18137C61.174 13.4876 64.2063 21.0681 63.9897 28.8651C63.8814 29.0817 63.6648 29.2983 63.3399 29.2983ZM56.8424 29.2983C56.5175 29.2983 56.3009 29.0817 56.3009 28.7568C56.5175 23.0173 54.3517 17.3862 50.4532 13.4877C46.6629 9.69749 41.0318 7.53175 35.1841 7.64C34.8592 7.64 34.6426 7.42337 34.6426 7.0985C34.6426 6.77363 34.8592 6.557 35.1841 6.557C41.3567 6.44875 47.2044 8.72287 51.2112 12.7296C55.3263 16.8447 57.6004 22.6925 57.3838 28.7567C57.3839 29.0817 57.1673 29.2983 56.8424 29.2983ZM50.3449 29.2983C50.0201 29.2983 49.8034 29.0817 49.8034 28.7568C49.8034 26.2661 49.2619 21.5013 45.7967 18.1442C42.3313 14.6789 37.6748 14.1375 35.1841 14.1375C34.8592 14.1375 34.6426 13.9209 34.6426 13.596C34.6426 13.2711 34.8592 13.0545 35.1841 13.0545C37.8913 13.0545 42.8728 13.596 46.6629 17.2779C50.3448 20.9597 50.8863 26.0495 50.8863 28.7567C50.8864 29.0817 50.6698 29.2983 50.3449 29.2983Z" fill="currentColor" />
                                </svg>
                                <h3 class="h4 pb-2 mb-1">Call us</h3>
                                <p class="mb-0">We're here to help with all your needs and questions about the Finder services.</p>
                            </div>
                            <div class="card-footer bg-transparent border-0 pt-1 pt-md-2 pt-lg-3 pb-4">
                                <a class="btn btn-lg btn-dark w-100 px-3" href="tel:4065550120">(406)&nbsp;555&#8209;0120</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="position-absolute top-0 end-0 h-100 bg-body-tertiary rounded overflow-hidden d-none d-lg-block me-4" style="width: 49%">
                <img src="{{ asset('assets/img/contact/v1/hero.jpg') }}" class="position-absolute top-0 start-0 w-100 h-100 object-fit-cover" alt="Image">
            </div>
        </section>


        <!-- Office locations -->
        <section class="container py-2 py-sm-3 py-md-4 py-lg-5 mt-lg-5 mb-5">
            <h2 class="h1 pb-2 pb-sm-3 pb-md-0 mb-4 mb-md-5">Our offices</h2>
            <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 g-4 gy-md-5 gx-xl-5 mb-n2 mb-md-0">

                <!-- Canada -->
                <div class="col pb-2 pb-md-0">
                    <svg xmlns="http://www.w3.org/2000/svg" width="58" height="58" fill="none">
                        <path d="M29 57c15.464 0 28-12.536 28-28S44.464 1 29 1 1 13.536 1 29s12.536 28 28 28z" fill="#f0f0f0" />
                        <g fill="#d80027">
                            <path d="M57 29c0-11.101-6.46-20.693-15.826-25.222v50.443C50.54 49.693 57 40.101 57 29h0zM1 29c0 11.101 6.46 20.693 15.826 25.222V3.778C7.46 8.307 1 17.899 1 29zm32.87 3.652l4.87-2.435L36.305 29v-2.435L31.436 29l2.435-4.87h-2.435l-2.435-3.652-2.435 3.652h-2.435L26.566 29l-4.87-2.435V29l-2.435 1.217 4.869 2.435-1.217 2.435h4.87v3.652h2.435v-3.652h4.87l-1.217-2.435z" />
                        </g>
                        <rect x=".5" y=".5" width="57" height="57" rx="28.5" stroke="currentColor" style="color: var(--fn-border-color)" />
                    </svg>
                    <h3 class="h5 py-2 my-1">Canada</h3>
                    <p class="pb-2 mb-1">127 John Street, 10th Floor<br>Toronto, ON M5V 2E4</p>
                    <div class="nav">
                        <a class="nav-link position-relative px-0" href="#!">
                            <span class="hover-effect-underline stretched-link me-1">Show on map</span>
                            <i class="fi-chevron-right fs-base mt-1"></i>
                        </a>
                    </div>
                </div>

                <!-- United Kingdom -->
                <div class="col pb-2 pb-md-0">
                    <svg xmlns="http://www.w3.org/2000/svg" width="58" height="58" fill="none">
                        <path d="M29 57c15.464 0 28-12.536 28-28S44.464 1 29 1 1 13.536 1 29s12.536 28 28 28z" fill="#f0f0f0" />
                        <g fill="#0052b4">
                            <path d="M6.788 11.953a27.9 27.9 0 0 0-4.824 9.743H16.53l-9.743-9.743zm49.247 9.743a27.9 27.9 0 0 0-4.824-9.743l-9.742 9.743h14.566zM1.965 36.305a27.9 27.9 0 0 0 4.824 9.743l9.743-9.743H1.965zM46.047 6.788a27.9 27.9 0 0 0-9.743-4.824V16.53l9.743-9.743zM11.953 51.212a27.9 27.9 0 0 0 9.743 4.824V41.469l-9.743 9.743z" />
                            <path d="M21.696 1.965a27.9 27.9 0 0 0-9.743 4.824l9.743 9.743V1.965zm14.609 54.07a27.9 27.9 0 0 0 9.743-4.824l-9.743-9.743v14.566zm5.164-19.73l9.743 9.743a27.9 27.9 0 0 0 4.824-9.743H41.469z" />
                        </g>
                        <g fill="#d80027">
                            <path d="M56.763 25.348H32.652h0V1.237A28.28 28.28 0 0 0 29 1c-1.238 0-2.457.081-3.652.237v24.111h0H1.237A28.28 28.28 0 0 0 1 29c0 1.238.081 2.457.237 3.652h24.111 0v24.111c1.195.156 2.414.237 3.652.237s2.457-.081 3.652-.237V32.652h0 24.111C56.919 31.457 57 30.238 57 29a28.28 28.28 0 0 0-.237-3.652h0zM36.305 36.305L48.8 48.8l1.646-1.798-10.697-10.697h-3.443 0zm-14.609 0h0L9.201 48.799l1.798 1.646 10.697-10.697v-3.443zm-.001-14.609h0L9.201 9.201l-1.646 1.798 10.697 10.697h3.443 0zm14.61 0L48.799 9.201l-1.798-1.646-10.697 10.697v3.443z" />
                        </g>
                        <rect x=".5" y=".5" width="57" height="57" rx="28.5" stroke="currentColor" style="color: var(--fn-border-color)" />
                    </svg>
                    <h3 class="h5 py-2 my-1">United Kingdom</h3>
                    <p class="pb-2 mb-1">Level 2, 191 Botany Road<br>Waterloo, NSW 2017</p>
                    <div class="nav">
                        <a class="nav-link position-relative px-0" href="#!">
                            <span class="hover-effect-underline stretched-link me-1">Show on map</span>
                            <i class="fi-chevron-right fs-base mt-1"></i>
                        </a>
                    </div>
                </div>

                <!-- USA -->
                <div class="col pb-2 pb-md-0">
                    <svg xmlns="http://www.w3.org/2000/svg" width="58" height="58" fill="none">
                        <path d="M29 57c15.464 0 28-12.536 28-28S44.464 1 29 1 1 13.536 1 29s12.536 28 28 28z" fill="#f0f0f0" />
                        <g fill="#d80027">
                            <path d="M27.783 29H57a28.03 28.03 0 0 0-.965-7.304H27.783V29zm0-14.609h25.108a28.15 28.15 0 0 0-6.461-7.304H27.783v7.304zM29 57a27.88 27.88 0 0 0 17.43-6.087H11.57A27.88 27.88 0 0 0 29 57zM5.11 43.609h47.781a27.84 27.84 0 0 0 3.145-7.304H1.965c.702 2.605 1.769 5.059 3.145 7.304h0z" />
                        </g>
                        <path d="M13.97 5.373h2.552l-2.373 1.724.907 2.79-2.373-1.724-2.373 1.724.783-2.41c-2.09 1.741-3.921 3.78-5.431 6.052h.818l-1.511 1.098-.677 1.196.721 2.221-1.346-.978-.916 2.174.795 2.447h2.934L4.105 23.41l.907 2.79-2.373-1.724-1.422 1.033A28.27 28.27 0 0 0 1 29h28V1c-5.531 0-10.688 1.605-15.03 4.373h0zM15.055 26.2l-2.373-1.724-2.373 1.724.907-2.79-2.373-1.724h2.934l.906-2.79.907 2.79h2.934l-2.373 1.724.907 2.79zm-.907-10.947l.907 2.79-2.373-1.724-2.373 1.724.907-2.79-2.373-1.724h2.934l.906-2.79.907 2.79h2.934l-2.373 1.724zM25.098 26.2l-2.373-1.724-2.373 1.724.907-2.79-2.373-1.724h2.934l.907-2.79.906 2.79h2.934l-2.373 1.724.907 2.79zm-.907-10.947l.907 2.79-2.373-1.724-2.373 1.724.907-2.79-2.373-1.724h2.934l.907-2.79.906 2.79h2.934l-2.373 1.724zm0-8.157l.907 2.79-2.373-1.724-2.373 1.724.907-2.79-2.373-1.724h2.934l.907-2.79.906 2.79h2.934l-2.373 1.724z" fill="#0052b4" />
                        <rect x=".5" y=".5" width="57" height="57" rx="28.5" stroke="currentColor" style="color: var(--fn-border-color)" />
                    </svg>
                    <h3 class="h5 py-2 my-1">USA</h3>
                    <p class="pb-2 mb-1">245 Park Avenue, 39th Floor<br>New York, NY 10167</p>
                    <div class="nav">
                        <a class="nav-link position-relative px-0" href="#!">
                            <span class="hover-effect-underline stretched-link me-1">Show on map</span>
                            <i class="fi-chevron-right fs-base mt-1"></i>
                        </a>
                    </div>
                </div>

                <!-- New Zealand -->
                <div class="col pb-2 pb-md-0">
                    <svg xmlns="http://www.w3.org/2000/svg" width="58" height="58" fill="none">
                        <path d="M57 29c0 15.464-12.536 28-28 28S1 44.464 1 29c0 .007 28-27.997 28-28 15.464 0 28 12.536 28 28z" fill="#0052b4" />
                        <g fill="#f0f0f0">
                            <path d="M28.926 29h.075v-.075l-.075.075z" />
                            <path d="M29 15.609V1h-.005C13.534 1.003 1 13.538 1 29h14.609v-8.226L23.835 29h5.09l.075-.075v-5.09l-8.226-8.226H29z" />
                        </g>
                        <g fill="#d80027">
                            <path d="M15.166 4.652A28.14 28.14 0 0 0 4.652 15.166V29h7.304V11.957h0H29V4.652H15.166zm13.835 20.905l-9.948-9.948H15.61h0L29.001 29h0v-3.443zm20.489-3.78l.604 1.86h1.956l-1.582 1.149.605 1.86-1.582-1.149-1.582 1.149.604-1.86-1.582-1.149h1.956l.605-1.86zm-6.992 13.391l.907 2.79h2.934l-2.373 1.724.907 2.79-2.373-1.724-2.373 1.724.907-2.79-2.373-1.724h2.934l.907-2.79zm.265-21.913l.755 2.325h2.445l-1.978 1.437.756 2.325-1.978-1.437-1.978 1.437.755-2.325-1.978-1.437h2.444l.756-2.325zm-6.727 8.441l.907 2.79h2.934l-2.373 1.724.907 2.79-2.373-1.724L33.662 29l.907-2.79-2.373-1.724h2.934l.907-2.79z" />
                        </g>
                        <rect x=".5" y=".5" width="57" height="57" rx="28.5" stroke="currentColor" style="color: var(--fn-border-color)" />
                    </svg>
                    <h3 class="h5 py-2 my-1">New Zealand</h3>
                    <p class="pb-2 mb-1">1/63 Apollo Drive<br>Rosedale, Auckland 0632</p>
                    <div class="nav">
                        <a class="nav-link position-relative px-0" href="#!">
                            <span class="hover-effect-underline stretched-link me-1">Show on map</span>
                            <i class="fi-chevron-right fs-base mt-1"></i>
                        </a>
                    </div>
                </div>

                <!-- Germany -->
                <div class="col pb-2 pb-md-0">
                    <svg xmlns="http://www.w3.org/2000/svg" width="58" height="58" fill="none">
                        <path d="M2.742 38.739C6.698 49.401 16.962 57 29.001 57s22.302-7.599 26.258-18.261l-26.258-2.435-26.258 2.435z" fill="#ffda44" />
                        <path d="M29.001 1C16.962 1 6.698 8.599 2.742 19.261l26.258 2.435 26.258-2.435C51.303 8.599 41.04 1 29.001 1z" fill="#000" />
                        <path d="M2.742 19.261A27.94 27.94 0 0 0 1 29a27.94 27.94 0 0 0 1.742 9.739h52.517A27.94 27.94 0 0 0 57 29c0-3.425-.616-6.706-1.742-9.739H2.742z" fill="#d80027" />
                        <rect x=".5" y=".5" width="57" height="57" rx="28.5" stroke="currentColor" style="color: var(--fn-border-color)" />
                    </svg>
                    <h3 class="h5 py-2 my-1">Germany</h3>
                    <p class="pb-2 mb-1">Maximilianstraße 34<br>80539 Munich</p>
                    <div class="nav">
                        <a class="nav-link position-relative px-0" href="#!">
                            <span class="hover-effect-underline stretched-link me-1">Show on map</span>
                            <i class="fi-chevron-right fs-base mt-1"></i>
                        </a>
                    </div>
                </div>

                <!-- Argentina -->
                <div class="col pb-2 pb-md-0">
                    <svg xmlns="http://www.w3.org/2000/svg" width="58" height="58" fill="none">
                        <path d="M29 57c15.464 0 28-12.536 28-28S44.464 1 29 1 1 13.536 1 29s12.536 28 28 28z" fill="#f0f0f0" />
                        <g fill="#338af3">
                            <path d="M29.001 1C17.9 1 8.308 7.46 3.779 16.826h50.443C49.694 7.46 40.102 1 29.001 1h0zm0 56c11.101 0 20.693-6.46 25.222-15.826H3.779C8.308 50.54 17.9 57 29.001 57z" />
                        </g>
                        <path d="M37.369 29l-3.42 1.609 1.821 3.312-3.713-.71-.471 3.751L29 34.202l-2.587 2.759-.47-3.751-3.713.71 1.821-3.312L20.631 29l3.42-1.609-1.821-3.312 3.713.71.471-3.751L29 23.798l2.587-2.759.47 3.751 3.713-.71-1.821 3.312L37.369 29z" fill="#ffda44" />
                        <rect x=".5" y=".5" width="57" height="57" rx="28.5" stroke="currentColor" style="color: var(--fn-border-color)" />
                    </svg>
                    <h3 class="h5 py-2 my-1">Argentina</h3>
                    <p class="pb-2 mb-1">Avenida del Libertador 6680, Piso 1<br>C1428ARW Buenos Aires</p>
                    <div class="nav">
                        <a class="nav-link position-relative px-0" href="#!">
                            <span class="hover-effect-underline stretched-link me-1">Show on map</span>
                            <i class="fi-chevron-right fs-base mt-1"></i>
                        </a>
                    </div>
                </div>
            </div>
        </section>


        <!-- FAQ (Accordion) -->
        <section class="bg-body-tertiary py-5">
            <div class="container py-2 py-sm-3 py-md-4 py-lg-5">
                <div class="row">
                    <div class="col-md-4 col-xl-3 mb-2 mb-sm-3 mb-md-0" style="margin-top: -120px">
                        <div class="sticky-md-top pe-md-4 pe-lg-5 pe-xl-0" style="padding-top: 120px;">
                            <h2>Popular FAQs</h2>
                            <p>Check out Finder helpful articles for answers and tips.</p>
                            <div class="nav">
                                <a class="nav-link position-relative px-0" href="help-topics-v1">
                                    <span class="hover-effect-underline stretched-link me-1">Help center</span>
                                    <i class="fi-chevron-right fs-base mt-1"></i>
                                </a>
                            </div>
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
            </div>
        </section>
    </main>

    @include('layouts.partials.footer.real-estate-footer')

@endsection

@push('scripts')
    @vite(['resources/js/app.js'])
@endpush