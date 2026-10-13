@extends('layouts.app')
@section('title', __($title).' | Lassana Property')
@section('content')
@include('layouts.partials.header.real-estate-header')
<main class="container py-5" style="max-width:900px">
    <h1>{{ __($title) }}</h1>
    <p>{{ __('The company-approved version of this page is being prepared.') }}</p>
    <p>{{ __('Please contact our team if you need this information before using a service.') }}</p>
    <a class="btn btn-primary" href="{{ route('contact-us') }}">{{ __('Contact our team') }}</a>
</main>
@include('layouts.partials.footer.real-estate-footer')
@endsection
@push('scripts') @vite(['resources/js/app.js']) @endpush
