@extends('layouts.app')
@section('title', 'Our agents | Lassana Property')
@section('content')
@include('layouts.partials.header.real-estate-header')
<main class="container py-4 py-lg-5">
    <h1>{{ __('Our agents') }}</h1>
    <p class="text-body-secondary mb-4">{{ __('Find an agent and explore their available properties.') }}</p>
    @include('agents.directory-tabs', ['directoryTab'=>'agents'])
    @include('agents.cards')
    <div class="mt-4">{{ $agents->links() }}</div>
</main>
@include('layouts.partials.footer.real-estate-footer')
@endsection
@push('scripts')
@vite(['resources/js/app.js'])
@endpush
