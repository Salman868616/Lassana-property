@extends('layouts.app')
@section('title', __($page['title']).' | Lassana Property')
@section('meta-description', __($page['intro']))
@section('content')
@include('layouts.partials.header.real-estate-header')
<main class="container py-4 py-lg-5">
    <nav aria-label="{{ __('Breadcrumb') }}"><ol class="breadcrumb"><li class="breadcrumb-item"><a href="{{ route('index') }}">{{ __('Home') }}</a></li><li class="breadcrumb-item"><a href="{{ route('services.index') }}">{{ __('Services') }}</a></li><li class="breadcrumb-item active" aria-current="page">{{ __($page['title']) }}</li></ol></nav>
    <div class="mb-5" style="max-width:780px"><h1>{{ __($page['title']) }}</h1><p class="fs-lg text-body-secondary">{{ __($page['intro']) }}</p></div>
    <div class="row g-4 mb-5">@foreach($page['steps'] as [$heading,$body])
        <div class="col-md-4"><section class="card h-100 p-4"><h2 class="h4">{{ __($heading) }}</h2><p class="mb-0">{{ __($body) }}</p></section></div>
    @endforeach</div>
    @if(($page['action'] ?? '') === 'lgc' && !isset($page['service']))
    <nav class="d-flex flex-wrap gap-3 mb-4" aria-label="{{ __('Professional services') }}">@foreach(['house-plans'=>'House plans','architectural-design'=>'Architectural design','boq'=>'BOQ services'] as $slug=>$label)<a href="{{ route('services.show',['page'=>$slug]) }}">{{ __($label) }}</a>@endforeach</nav>
    @endif
    <div class="border rounded-3 p-4 d-flex flex-wrap align-items-center gap-3">
        @if(in_array($page['action'], ['inspection','lgc']))
            @if(!auth()->check() || auth()->user()->hasRole('buyer'))
                <a class="btn btn-primary" href="{{ route('buyer.services.create',array_filter(['type'=>$page['action'] === 'lgc' ? 'lgc_service' : 'inspection','service'=>$page['service'] ?? null])) }}">{{ __($page['action'] === 'inspection' ? 'Request inspection' : 'Request LGC service') }}</a>
            @else
                <a class="btn btn-primary" href="{{ route('contact-us') }}">{{ __('Contact our team') }}</a>
            @endif
        @elseif($page['action'] === 'seller')
            <a class="btn btn-primary" href="{{ !auth()->check() ? route('account-signin') : (auth()->user()->hasRole('admin') ? route('admin.properties.create') : (auth()->user()->hasRole('seller') ? route('seller.properties.create') : (auth()->user()->hasRole('agent') ? route('agent.properties.create') : route('account-profile')))) }}">{{ __('Start listing your property') }}</a>
        @elseif($page['action'] === 'rankings')
            <a class="btn btn-primary" href="{{ route('verification-ranks') }}">{{ __('View verification rankings') }}</a>
            <a class="btn btn-outline-primary" href="{{ route('properties.verified') }}">{{ __('Browse verified properties') }}</a>
        @else
            <a class="btn btn-primary" href="{{ route('contact-us') }}">{{ __('Contact our team') }}</a>
            <a class="btn btn-outline-primary" href="mailto:{{ config('company.email') }}">{{ __('Email us') }}</a>
        @endif
        <a href="{{ route('faqs') }}">{{ __('Frequently asked questions') }}</a>
    </div>
</main>
@include('layouts.partials.footer.real-estate-footer')
@endsection
@push('scripts') @vite(['resources/js/app.js']) @endpush
