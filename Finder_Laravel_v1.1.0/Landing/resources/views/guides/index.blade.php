@extends('layouts.app')
@section('title', __('Property guides').' | Lassana Property')
@section('content')
@include('layouts.partials.header.real-estate-header')
<main class="container py-4 py-lg-5"><h1>{{ __('Property guides') }}</h1><p class="text-body-secondary mb-4">{{ __('Practical help for your next property step.') }}</p>
<div class="row g-4">@foreach($guides as $slug=>$article)<div class="col-md-4"><article class="card h-100 p-4"><h2 class="h4">{{ __($article['title']) }}</h2><p>{{ __($article['summary']) }}</p><a class="mt-auto" href="{{ route('guides.show',$slug) }}">{{ __('Read guide') }} <span class="visually-hidden">{{ __($article['title']) }}</span></a></article></div>@endforeach</div></main>
@include('layouts.partials.footer.real-estate-footer')
@endsection
@push('scripts') @vite(['resources/js/app.js']) @endpush
