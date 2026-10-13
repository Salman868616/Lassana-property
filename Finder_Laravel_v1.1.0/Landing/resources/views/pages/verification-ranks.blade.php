@php
    $type = 'real-estate';
    $ranks = [
        ['name' => 'Basic', 'key' => 'basic', 'level' => '01', 'planned' => false,
            'summary' => 'The first level of listing verification.',
            'checks' => ['Seller identity checked', 'Property information reviewed', 'Property photos reviewed']],
        ['name' => 'Silver', 'key' => 'silver', 'level' => '02', 'planned' => false,
            'summary' => 'Additional review of property documents.',
            'checks' => ['Basic verification completed', 'Survey document reviewed', 'Ownership documents reviewed']],
        ['name' => 'Gold', 'key' => 'gold', 'level' => '03', 'planned' => true,
            'summary' => 'A planned level involving an on-site review.',
            'checks' => ['Physical property inspection', 'Relevant cross-checks of property details']],
        ['name' => 'Platinum', 'key' => 'platinum', 'level' => '04', 'planned' => true,
            'summary' => 'A planned level with a broader professional review.',
            'checks' => ['Expanded legal review', 'Expanded technical review', 'Reviews by appropriately qualified professionals']],
    ];
@endphp
@extends('layouts.app')
@section('title', 'Verification rankings | Lassana Property')
@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/company-pages.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/verification-ranks.css') }}">
@endpush
@section('content')
    @include('layouts.partials.header.real-estate-header')
    <main class="content-wrapper lp-company lp-rankings">
        <section class="container pt-4 pt-lg-5 pb-5" aria-labelledby="rankings-title">
            <nav aria-label="{{ __('Breadcrumb') }}">
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="{{ route('index') }}">{{ __('Home') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('Rankings') }}</li>
                </ol>
            </nav>
            <div class="lp-rankings-intro">
                <span class="lp-eyebrow">{{ __('LASSANA VERIFIED') }}</span>
                <h1 id="rankings-title" class="display-5 mt-3 mb-3">{{ __('Understand the checks') }}<br class="d-none d-md-inline"> {{ __('behind each property.') }}</h1>
                <p class="fs-lg text-body-secondary mb-0">{{ __('Our verification rankings explain the level of review behind a listing. Explore Basic, Silver, Gold and Platinum to see what each level covers.') }}</p>
            </div>
            <div class="lp-rankings-availability mt-4 mb-4">
                <strong>{{ __('Basic and Silver are our current verification levels.') }}</strong>
                <span>{{ __('Gold and Platinum are planned for a future release.') }}</span>
            </div>
            <div class="row g-4">
                @foreach($ranks as $rank)
                    <div class="col-md-6 col-xl-3">
                        <article class="lp-rank-card lp-rank-{{ $rank['key'] }} h-100" aria-labelledby="rank-{{ $rank['key'] }}">
                            <div class="lp-rank-card-top">
                                <span class="lp-rank-emblem" aria-hidden="true">
                                    <svg viewBox="0 0 32 36" width="32" height="36" fill="none"><path d="M16 2 29 7v10c0 8-6 13-13 17C9 30 3 25 3 17V7L16 2Z" stroke="currentColor" stroke-width="1.8"/><path d="m10 17 4 4 8-9" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                                </span>
                                <span class="lp-rank-status">{{ __($rank['planned'] ? 'Planned' : 'Current level') }}</span>
                            </div>
                            <p class="lp-rank-level mt-4 mb-2">{{ __('Level :level', ['level'=>$rank['level']]) }}</p>
                            <h2 id="rank-{{ $rank['key'] }}" class="h3 mb-3">{{ $rank['name'] }}</h2>
                            <p class="lp-rank-summary">{{ __($rank['summary']) }}</p>
                            <h3 class="lp-rank-checks-title">{{ __($rank['planned'] ? 'Planned scope' : 'Checks included') }}</h3>
                            <ul class="lp-rank-checks">
                                @foreach($rank['checks'] as $check)
                                    <li>{{ __($check) }}</li>
                                @endforeach
                            </ul>
                            <p class="lp-rank-note">{{ __($rank['planned'] ? 'Not yet available. Full requirements will be published before launch.' : 'Awarded after the required checks are reviewed and approved.') }}</p>
                        </article>
                    </div>
                @endforeach
            </div>
        </section>
        <section class="lp-soft-section py-5" aria-labelledby="badges-title">
            <div class="container">
                <div class="row g-4 g-lg-5 align-items-start">
                    <div class="col-lg-5">
                        <span class="lp-eyebrow">{{ __('READ THE BADGE') }}</span>
                        <h2 id="badges-title" class="h2 mt-3">{{ __('Know what has been reviewed.') }}</h2>
                    </div>
                    <div class="col-lg-7">
                        <p>{{ __('A verification badge applies to the checks completed for that particular listing. A published property does not automatically receive a verification badge.') }}</p>
                        <p class="mb-0">{{ __('If you need more detail about a property\'s verification, contact our team with its property reference. A badge describes the review scope; it does not guarantee legal title or the property\'s condition.') }}</p>
                    </div>
                </div>
            </div>
        </section>
        <section class="container py-5" aria-labelledby="rankings-next-step">
            <div class="lp-company-cta rounded-4 p-4 p-lg-5 d-flex flex-column flex-lg-row align-items-lg-center justify-content-between gap-4">
                <div>
                    <h2 id="rankings-next-step" class="h3 text-white">{{ __('Find your next property.') }}</h2>
                    <p class="mb-0">{{ __('Browse listings or speak with our team about verification.') }}</p>
                </div>
                <div class="d-flex flex-wrap gap-3 flex-shrink-0">
                    <a class="btn btn-light" href="{{ route('properties.index') }}">{{ __('Browse properties') }}</a>
                    <a class="btn btn-outline-light" href="{{ route('contact-us') }}">{{ __('Contact us') }}</a>
                </div>
            </div>
        </section>
    </main>
    @include('layouts.partials.footer.real-estate-footer')
@endsection
@push('scripts')
    @vite(['resources/js/app.js'])
@endpush
