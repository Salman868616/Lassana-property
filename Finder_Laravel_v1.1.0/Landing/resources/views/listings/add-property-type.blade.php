@extends('layouts.app')

@section('title', 'Finder | Add Property - Type')

@section('content')

    @include('layouts.partials.header.page-header')

    <!-- Page content -->
    <main class="content-wrapper">
        <div class="container pt-3 pt-sm-4 pt-md-5 pb-5">
            <div class="row pt-lg-2 pt-xl-3 pb-1 pb-sm-2 pb-md-3 pb-lg-4 pb-xl-5">

                <!-- Sidebar navigation -->
                <aside class="col-lg-3 col-xl-4 mb-3" style="margin-top: -100px">
                    <div class="sticky-top overflow-y-auto" style="padding-top: 100px">
                        <ul class="nav flex-lg-column flex-nowrap gap-4 gap-lg-0 text-nowrap pb-2 pb-lg-0">
                            <li class="nat-item">
                                <a class="nav-link d-inline-flex px-0 px-lg-3 pe-none" aria-current="page">
                                    <i class="fi-arrow-right-circle d-none d-lg-inline-flex fs-lg me-2"></i>
                                    <i class="fi-arrow-down-circle d-lg-none fs-lg me-2"></i>
                                    Property type
                                </a>
                            </li>
                            <li class="nat-item">
                                <a class="nav-link d-inline-flex px-0 px-lg-3 disabled">
                                    <i class="fi-circle fs-lg me-2"></i>
                                    Location
                                </a>
                            </li>
                            <li class="nat-item">
                                <a class="nav-link d-inline-flex px-0 px-lg-3 disabled">
                                    <i class="fi-circle fs-lg me-2"></i>
                                    Photos and videos
                                </a>
                            </li>
                            <li class="nat-item">
                                <a class="nav-link d-inline-flex px-0 px-lg-3 disabled">
                                    <i class="fi-circle fs-lg me-2"></i>
                                    Property details
                                </a>
                            </li>
                            <li class="nat-item">
                                <a class="nav-link d-inline-flex px-0 px-lg-3 disabled">
                                    <i class="fi-circle fs-lg me-2"></i>
                                    Price
                                </a>
                            </li>
                            <li class="nat-item">
                                <a class="nav-link d-inline-flex px-0 px-lg-3 disabled">
                                    <i class="fi-circle fs-lg me-2"></i>
                                    Contact info
                                </a>
                            </li>
                            <li class="nat-item">
                                <a class="nav-link d-inline-flex px-0 px-lg-3 disabled">
                                    <i class="fi-circle fs-lg me-2"></i>
                                    Ad promotion
                                </a>
                            </li>
                        </ul>
                    </div>
                </aside>


                <!-- Property type inputs -->
                <div class="col-lg-9 col-xl-8">
                    <h1 class="h2 mb-n2 mb-lg-3">Property type</h1>

                    <!-- Category -->
                    <div class="pt-3 mt-3">
                        <h2 class="h6 pb-1 mb-2">Category *</h2>
                        <div class="nav nav-pills flex-wrap gap-3">
                            <div>
                                <input type="radio" class="btn-check" id="sell" name="category" checked>
                                <label class="nav-link" for="sell">Sell property</label>
                            </div>
                            <div>
                                <input type="radio" class="btn-check" id="rent" name="category">
                                <label class="nav-link" for="rent">Rent property</label>
                            </div>
                        </div>
                    </div>

                   <div class="row g-3">
    <div class="col-sm-4">
        <div class="form-check card-radio">
            <input class="form-check-input" type="radio" name="type" id="land" value="land" checked>
            <label class="form-check-label" for="land">
                Land
            </label>
        </div>
    </div>

    <div class="col-sm-4">
        <div class="form-check card-radio">
            <input class="form-check-input" type="radio" name="type" id="house" value="house">
            <label class="form-check-label" for="house">
                House
            </label>
        </div>
    </div>

    <div class="col-sm-4">
        <div class="form-check card-radio">
            <input class="form-check-input" type="radio" name="type" id="apartment" value="apartment">
            <label class="form-check-label" for="apartment">
                Apartment
            </label>
        </div>
    </div>
</div>

                    <!-- Condition -->
                    <div class="pt-3 mt-3 mb-n2">
                        <h2 class="h6">Condition of the property *</h2>
                        <div class="vstack gap-2">
                            <div class="form-check mb-1">
                                <input type="radio" class="form-check-input" id="secondary" name="condition" checked>
                                <label for="secondary" class="form-check-label">Secondary market</label>
                            </div>
                            <div class="form-check mb-1">
                                <input type="radio" class="form-check-input" id="new" name="condition">
                                <label for="new" class="form-check-label">New building</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Prev / Next navigation (Footer) -->
    <footer class="sticky-bottom bg-body pb-3">
        <div class="progress rounded-0" role="progressbar" aria-label="Dark example" aria-valuenow="14.29" aria-valuemin="0" aria-valuemax="100" style="height: 4px">
            <div class="progress-bar bg-dark d-none-dark" style="width: 14.29%"></div>
            <div class="progress-bar bg-light d-none d-block-dark" style="width: 14.29%"></div>
        </div>
        <div class="container d-flex gap-3 pt-3">
    <form method="POST" action="{{ route('add-property-type.store') }}" class="ms-auto">
        @csrf

        <input type="hidden" name="type" id="selected-property-type" value="land">

        <button type="submit" class="btn btn-dark animate-slide-end">
            Next
            <i class="fi-arrow-right animate-target fs-base ms-2 me-n1"></i>
        </button>
    </form>
</div>
    </footer>

@endsection

@push('scripts')
   @vite(['resources/js/app.js'])
<script>
    document.querySelectorAll('input[name="type"]').forEach(function (radio) {
        radio.addEventListener('change', function () {
            document.getElementById('selected-property-type').value = this.value;
        });
    });
</script>
 
@endpush