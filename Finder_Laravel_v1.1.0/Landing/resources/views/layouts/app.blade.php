<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" data-bs-theme="light" data-pwa="true">

<head>
    <meta charset="utf-8">

    <!-- Viewport -->
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">

    <!-- SEO Meta Tags -->
    <title>{!! e(trim($__env->yieldContent('title', 'Lassana Property | Properties in Sri Lanka')), false) !!}</title>
    @hasSection('social-meta')
        @yield('social-meta')
    @else
        @include('layouts.partials.page-seo')
    @endif

    <!-- Webmanifest + Favicon / App icons -->
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <link rel="manifest" href="{{ asset('manifest.json') }}">
    <link rel="icon" type="image/webp" href="{{ asset('assets/img/lassana-property-logo-lossless.webp') }}">
    <link rel="apple-touch-icon" href="{{ asset('assets/img/lassana-property-logo.png') }}">

    <!-- Lassana Property uses a consistent light theme. -->

    <!-- Preloaded local web font (Inter) -->
    <link rel="preload" href="{{ Vite::asset('resources/fonts/inter-variable-latin.woff2') }}" as="font" type="font/woff2" crossorigin>

    <!-- Font icons -->
    <link rel="preload" href="{{ asset('assets/icons/finder-icons.woff2') }}" as="font" type="font/woff2" crossorigin>
    <link rel="stylesheet" href="{{ asset('assets/icons/finder-icons.min.css') }}">

    <!-- Vendor styles -->
    @stack('styles')

    <!-- Bootstrap + Theme styles -->
    @vite([trim($__env->yieldContent('theme-styles', 'resources/scss/app.scss'))])
</head>

<!-- Body -->

<body>

    @yield('content')

    <!-- Back to top button -->
    <div class="floating-buttons position-fixed top-50 end-0 z-sticky me-3 me-xl-4 pb-4">
        <a class="btn-scroll-top btn btn-sm bg-body border-0 rounded-pill shadow animate-slide-end" href="#top">
            {{ __('Top') }}
            <i class="fi-arrow-right fs-base ms-1 me-n1 animate-target"></i>
            <span class="position-absolute top-0 start-0 w-100 h-100 border rounded-pill z-0"></span>
            <svg class="position-absolute top-0 start-0 w-100 h-100 z-1" viewBox="0 0 62 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect x=".75" y=".75" width="60.5" height="30.5" rx="15.25" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" />
            </svg>
        </a>
    </div>

    <!-- Vendor scripts -->
    @stack('scripts')

@include('layouts.partials.whatsapp-button')
</body>

</html>
