@extends('layouts.app')
@section('title', __('Developers').' | Lassana Property')
@section('content')
@include('layouts.partials.header.real-estate-header')
<main class="container py-4 py-lg-5">
<h1>{{ __('Developers') }}</h1><p class="text-body-secondary">{{ __('Explore developer companies and their published properties.') }}</p>
@include('agents.directory-tabs', ['directoryTab'=>'developers'])
<div class="row g-4">@forelse($developers as $developer)
    <div class="col-md-6 col-xl-4"><article class="card h-100 p-4"><h2 class="h4 text-break"><a href="{{ route('developers.show',$developer) }}">{{ $developer->name }}</a></h2>@if($developer->city)<p>{{ $developer->city }}</p>@endif<p>{{ __(':count published properties',['count'=>$developer->properties_count]) }}</p><a class="mt-auto" href="{{ route('developers.show',$developer) }}">{{ __('View company profile') }}</a></article></div>
@empty
    <div class="col-12"><p class="border rounded-3 p-4">{{ __('No developer profiles are published yet.') }} <a href="{{ route('contact-us') }}">{{ __('Contact our team') }}</a></p></div>
@endforelse</div>
<div class="mt-4">{{ $developers->links() }}</div>
</main>
@include('layouts.partials.footer.real-estate-footer')
@endsection
@push('scripts') @vite(['resources/js/app.js']) @endpush
