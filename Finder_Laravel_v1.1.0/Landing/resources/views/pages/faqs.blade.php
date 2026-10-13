@extends('layouts.app')
@section('title', __('Frequently asked questions').' | Lassana Property')
@section('content')
@include('layouts.partials.header.real-estate-header')
<main class="container py-4 py-lg-5" style="max-width:960px">
    <h1>{{ __('Frequently asked questions') }}</h1><p class="text-body-secondary mb-4">{{ __('Help with property searches, accounts and service requests.') }}</p>
    @foreach(config('public_faqs') as [$question,$answer])
        <details class="border rounded-3 p-3 p-md-4 mb-3"><summary class="fw-semibold">{{ __($question) }}</summary><p class="mt-3 mb-0">{{ __($answer) }}</p></details>
    @endforeach
    <p class="mt-4"><a href="{{ route('contact-us') }}">{{ __('Contact our team') }}</a></p>
</main>
@include('layouts.partials.footer.real-estate-footer')
@endsection
@push('scripts') @vite(['resources/js/app.js']) @endpush
