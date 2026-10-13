@extends('layouts.dashboard')
@section('content')
<a class="d-inline-block mb-3" href="{{ route('buyer.services.index') }}">My service requests</a>
<section class="card p-4">
<p>Status: <strong>{{ \App\Services\LeadStages::label($item->crmLead?->status) }}</strong></p>
@if($item->property)<p>Property: <a href="{{ route('properties.show', $item->property->property_code) }}">{{ $item->property->title }} ({{ $item->property->property_code }})</a></p>
@elseif($item->property_id)<p>Property unavailable. Your request is still recorded.</p>@endif
<p>Contact phone: {{ $item->phone }}</p>
@if($item->location)<p>Area / address: {{ $item->location }}</p>@endif
<p>Preferred date: {{ $item->preferred_date?->format('d M Y') ?? 'Not specified' }}</p>
<h2 class="h6">Your request</h2><p style="white-space:pre-wrap;overflow-wrap:anywhere">{{ $item->message }}</p>
<p class="text-secondary mb-0">Our team will contact you to agree the details. Submitting a request does not confirm an appointment.</p>
</section>
@endsection
