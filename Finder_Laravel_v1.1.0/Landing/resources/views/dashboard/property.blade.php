@extends('layouts.dashboard')
@section('content')
<a href="{{ route('dashboard.role', $role) }}" class="d-inline-block mb-3">Back to dashboard</a>
@if(in_array($role, ['seller','agent'], true) && $property->status === 'draft')
    <div class="d-flex flex-wrap gap-2 mb-4">
        <a class="btn btn-lp" href="{{ route($role.'.properties.edit', $property) }}">Edit draft / add photos</a>
        <form method="POST" action="{{ route($role.'.properties.submit', $property) }}">
            @csrf
            <button type="submit" class="btn btn-outline-secondary">Submit for review</button>
        </form>
    </div>
    <p class="text-secondary">Complete the description, location, category details and price, and add at least one photo before submitting. Editing is locked after submission.</p>
@endif
<div class="card p-4 mb-4">
    <p class="text-secondary">{{ $property->property_code }}</p>
    @if(in_array($role, ['admin', 'seller', 'verification', 'agent'], true))
        <p><strong>Seller / owner:</strong> {{ $property->owner?->name ?? 'Unavailable' }}</p>
        <p><strong>Assigned agent:</strong> {{ $property->agent?->name ?? 'Not assigned' }}</p>
    @endif
    <p><strong>Status:</strong> <span class="lp-status {{ $property->status }}">{{ ucfirst(str_replace('_', ' ', $property->status)) }}</span></p>
    <p><strong>Verification:</strong> {{ $property->verification_level }}</p>
    <p><strong>Category:</strong> {{ $property->propertyCategory?->name ?? $property->category }}</p>
    <p><strong>Location:</strong> {{ $property->location }}, {{ $property->city }}, {{ $property->district }}</p>
    <p><strong>Listing type:</strong> {{ $property->isForRent() ? 'For rent' : 'For sale' }}</p>
    <p><strong>Price:</strong> {{ $property->priceLabel() }}</p>
    <p>{{ $property->description }}</p>
    @if($role === 'admin' && $property->status === 'draft')<a href="{{ route('admin.properties.edit', $property) }}">Edit property</a>@endif
</div>
@include('dashboard.featured-property')
<div class="row g-3 mb-4">
@foreach($property->images as $image)
    <div class="col-md-4"><img class="img-fluid rounded" src="{{ asset('storage/'.$image->path) }}" alt="Photo of {{ $property->title }}"></div>
@endforeach
</div>
@include('properties.videos')
@include('properties.category-summary')
@include('dashboard.documents')
@include('dashboard.review')
@include('dashboard.status-history')
@if($role === 'admin')
<section class="card p-4 mt-4">
    @if($property->status === 'archived')
        <h2 class="h5">Archived property</h2>
        <p class="mb-0">This listing is no longer public. Its property ID, photos, documents and enquiries are retained for reference.</p>
    @else
        <h2 class="h5">Archive property</h2>
        <p>Remove this listing from the public website and close its review process. Its property ID, photos, documents and enquiries will be retained for reference.</p>
        <form method="POST" action="{{ route('admin.properties.archive', $property) }}">
            @csrf
            <button class="btn btn-outline-secondary" type="submit">Archive property</button>
        </form>
    @endif
</section>
@endif
@endsection
