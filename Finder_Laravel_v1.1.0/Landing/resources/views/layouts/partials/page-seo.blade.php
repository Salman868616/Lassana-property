@php($pageSeo = \App\Services\PageSeo::forRequest(request()))
<meta name="description" content="{!! e(trim($__env->yieldContent('meta-description', $pageSeo['description'])), false) !!}">
<link rel="canonical" href="{{ $pageSeo['url'] }}">
<meta name="robots" content="{{ $pageSeo['robots'] }}">
<meta property="og:type" content="website">
<meta property="og:site_name" content="Lassana Property">
<meta property="og:title" content="{!! e(trim($__env->yieldContent('title', $pageSeo['title'])), false) !!}">
<meta property="og:description" content="{!! e(trim($__env->yieldContent('meta-description', $pageSeo['description'])), false) !!}">
<meta property="og:url" content="{{ $pageSeo['url'] }}">
<meta property="og:image" content="{{ asset('assets/img/lassana-property-logo.png') }}">
<meta name="twitter:card" content="summary">
<meta name="twitter:title" content="{!! e(trim($__env->yieldContent('title', $pageSeo['title'])), false) !!}">
<meta name="twitter:description" content="{!! e(trim($__env->yieldContent('meta-description', $pageSeo['description'])), false) !!}">
<meta name="twitter:image" content="{{ asset('assets/img/lassana-property-logo.png') }}">
