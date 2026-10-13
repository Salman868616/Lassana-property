@extends('layouts.admin')

@section('title', 'Lassana Property | Properties')
@section('heading', $reviewQueue ? 'Property review queue' : 'Properties')

@section('content')
<div class="d-flex flex-wrap gap-2 mb-3">
    <a class="btn {{ $reviewQueue ? 'btn-outline-secondary' : 'btn-lp' }}" href="{{ route('admin.properties.index') }}">All properties</a>
    <a class="btn {{ $reviewQueue ? 'btn-lp' : 'btn-outline-secondary' }}" href="{{ route('admin.properties.index', ['queue'=>'review']) }}">Review queue</a>
</div>
@if($reviewQueue)<p>Submitted, under-review and approved listings, ordered by oldest update first.</p>@endif
<form method="GET" action="{{ route('admin.properties.index') }}" class="d-flex flex-wrap align-items-end gap-2 mb-4">
    @if($reviewQueue)<input type="hidden" name="queue" value="review">@endif
    <div><label class="form-label" for="property-status">Status</label>
        <select class="form-select" id="property-status" name="status">
            <option value="">All {{ $reviewQueue ? 'review' : 'property' }} statuses</option>
            @foreach($statuses as $option)<option value="{{ $option }}" @selected($status === $option)>{{ ucfirst(str_replace('_', ' ', $option)) }}</option>@endforeach
        </select>
    </div>
    <button class="btn btn-lp" type="submit">Apply filter</button>
    <a class="btn btn-outline-secondary" href="{{ route('admin.properties.index', $reviewQueue ? ['queue'=>'review'] : []) }}">Clear</a>
</form>
<p class="text-secondary">{{ $properties->total() }} matching properties</p>
@if ($errors->any())
    <div class="alert alert-danger" role="alert">
        {{ $errors->first() }}
    </div>
@endif
    <div class="card">
        <div class="card-header">
            <h2 class="card-title">Property listings</h2>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped align-middle">
                    <thead>
                        <tr>
                            <th scope="col">Reference</th>
                            <th scope="col">Title</th>
                            <th scope="col">Owner</th>
                            <th scope="col">District</th>
                            <th scope="col">Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($properties as $property)
                            <tr>
                                <td>{{ $property->property_code }}</td>
                                <td>{{ $property->title }}
                                    @if($property->is_featured && $property->status === 'published')<span class="badge bg-secondary ms-1">Featured</span>@endif
                                </td>
                                <td>{{ $property->owner?->name ?? 'Unavailable' }}</td>
                                <td>{{ $property->district ?? 'Not entered' }}</td>
                                <td><span class="lp-status {{ $property->status }}">{{ ucfirst(str_replace('_', ' ', $property->status)) }}</span></td>
                                <td>
    <a href="{{ route('dashboard.property', ['role'=>'admin','property'=>$property->id]) }}" class="btn btn-sm btn-outline-primary">Review / manage</a>
    @if($property->status === 'draft')
        <a href="{{ route('admin.properties.edit', $property) }}" class="btn btn-sm btn-outline-secondary">Edit draft</a>
        <form method="POST" action="{{ route('admin.properties.submit', $property) }}" class="d-inline">
            @csrf<button type="submit" class="btn btn-sm btn-outline-success">Submit for review</button>
        </form>
    @endif</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-4">
                                    No properties match this selection.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{ $properties->links('pagination::bootstrap-5') }}
        </div>
    </div>

    <div class="mb-3">
    <a href="{{ route('admin.properties.create') }}"
       class="btn btn-primary">
        Add property
    </a>
</div>

@if (session('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
@endif


@endsection