@extends('layouts.app')
@section('title', __($article['title']).' | Lassana Property')
@section('meta-description', __($article['summary']))
@section('content')
@include('layouts.partials.header.real-estate-header')
<main class="container py-4 py-lg-5" style="max-width:860px"><a href="{{ route('guides.index') }}">{{ __('All property guides') }}</a><article>
<h1 class="mt-4">{{ __($article['title']) }}</h1><p class="fs-lg text-body-secondary">{{ __($article['summary']) }}</p>
@foreach($article['steps'] as [$heading,$body])<section class="my-4"><h2 class="h4">{{ __($heading) }}</h2><p>{{ __($body) }}</p></section>@endforeach
<p class="small text-body-secondary">{{ __('Prepared by Lassana Property') }}</p></article>
<a class="btn btn-primary" href="{{ $article['action'] === 'properties' ? route('properties.all') : route('services.show',['page'=>$article['action'] === 'inspection' ? 'property-inspection' : 'build-your-home']) }}">{{ __($article['action'] === 'properties' ? 'Browse all properties' : 'Explore this service') }}</a>
</main>
@include('layouts.partials.footer.real-estate-footer')
@endsection
@push('scripts') @vite(['resources/js/app.js']) @endpush
