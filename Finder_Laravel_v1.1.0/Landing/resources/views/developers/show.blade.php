@extends('layouts.app')
@section('title', $developer->name.' | Lassana Property')
@section('content')
@include('layouts.partials.header.real-estate-header')
<main class="container py-4 py-lg-5">
<a href="{{ route('developers.index') }}">{{ __('Back to developers') }}</a>
<section class="card p-4 my-4"><h1 class="text-break">{{ $developer->name }}</h1>@if($developer->city)<p>{{ $developer->city }}</p>@endif
@if($developer->description)<p style="white-space:pre-line;overflow-wrap:anywhere">{{ $developer->description }}</p>@endif
<div class="d-flex flex-wrap gap-3">@if($developer->phone)<a href="tel:{{ preg_replace('/[^+0-9]/','',$developer->phone) }}">{{ $developer->phone }}</a>@endif
@if($developer->email)<a class="text-break" href="mailto:{{ $developer->email }}">{{ $developer->email }}</a>@endif
@if($developer->website)<a href="{{ $developer->website }}" target="_blank" rel="noopener noreferrer">{{ __('Company website') }}</a>@endif</div></section>
<h2>{{ __('Available properties') }}</h2>
<div class="row g-4 mt-1">@forelse($properties as $property)<div class="col-md-6 col-xl-4">@include('home.property-card',['featured'=>false, 'cardContext'=>'directory','savedPropertyIds'=>[]])</div>
@empty<div class="col-12"><p class="border rounded-3 p-4">{{ __('No published properties are available for this developer right now.') }}</p></div>@endforelse</div>
<div class="mt-4">{{ $properties->links() }}</div>
</main>
@include('layouts.partials.footer.real-estate-footer')
@endsection
@push('scripts') @vite(['resources/js/app.js']) @endpush
