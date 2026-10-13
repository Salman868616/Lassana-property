@extends('layouts.dashboard')
@section('content')
<a class="d-inline-block mb-3" href="{{ route('dashboard.role','buyer') }}">Back to dashboard</a>
<section class="card p-4">
<h2 class="h5">Your requirements</h2>
<p>Status: <strong>{{ \App\Services\LeadStages::label($item->crmLead?->status ?? 'new') }}</strong></p>
@include('dashboard.requests.details')
<p class="mt-3">Contact phone: {{ $item->phone ?? 'Not provided' }}</p>
@if($item->crmLead?->property?->status === 'published')
<p>Selected property: <a href="{{ route('properties.show',$item->crmLead->property->property_code) }}">{{ $item->crmLead->property->title }}</a></p>
@else <p class="text-secondary mt-3">The sales team will review your requirements and contact you about suitable properties.</p> @endif
</section>
@endsection
