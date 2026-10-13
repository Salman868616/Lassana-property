@extends('layouts.app')
@section('title', __('Property services').' | Lassana Property')
@section('content')
@include('layouts.partials.header.real-estate-header')
<main class="container py-4 py-lg-5">
    <h1>{{ __('Property services') }}</h1><p class="text-body-secondary mb-4">{{ __('Find the right next step for your property plans.') }}</p>
    <div class="row g-4">@foreach(config('public_pages') as $slug=>$page)
        <div class="col-md-6 col-xl-4"><article class="card h-100 p-4"><h2 class="h4">{{ __($page['title']) }}</h2><p>{{ __($page['intro']) }}</p><a class="mt-auto" href="{{ route('services.show',['page'=>$slug]) }}">{{ __('Learn more') }}</a></article></div>
    @endforeach</div>
</main>
@include('layouts.partials.footer.real-estate-footer')
@endsection
@push('scripts') @vite(['resources/js/app.js']) @endpush
