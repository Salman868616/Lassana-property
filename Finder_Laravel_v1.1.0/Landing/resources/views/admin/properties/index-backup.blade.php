@extends('layouts.admin')

@section('title', 'Lassana Property | Properties')
@section('heading', 'Properties')

@section('content')
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
                                <td>{{ $property->title }}</td>
                                <td>{{ $property->owner?->name ?? 'Unavailable' }}</td>
                                <td>{{ $property->district ?? 'Not entered' }}</td>
                                <td>{{ ucfirst(str_replace('_', ' ', $property->status)) }}</td>
                                <td>
    <a href="{{ route('admin.properties.edit', $property) }}"
       class="btn btn-sm btn-outline-primary">
        Edit
    </a>
    @if ($property->status === 'draft')
    <form method="POST"
          action="{{ route('admin.properties.submit', $property) }}"
          class="d-inline">
        @csrf

        <button type="submit"
                class="btn btn-sm btn-outline-success">
            Submit for review
        </button>
    </form>
@endif
@if ($property->status === 'submitted')
    <form method="POST"
          action="{{ route('admin.properties.start-review', $property) }}"
          class="d-inline">
        @csrf

        <button type="submit"
                class="btn btn-sm btn-outline-warning">
            Start review
        </button>
    </form>
@endif
@if ($property->status === 'under_review')
    <form method="POST"
          action="{{ route('admin.properties.approve', $property) }}"
          class="d-inline">
        @csrf

        <button type="submit"
                class="btn btn-sm btn-outline-success">
            Approve
        </button>
    </form>

    <form method="POST"
          action="{{ route('admin.properties.return-to-draft', $property) }}"
          class="d-inline">
        @csrf

        <button type="submit"
                class="btn btn-sm btn-outline-secondary">
            Return to draft
        </button>
    </form>
@endif
@if ($property->status === 'approved')
    <form method="POST"
          action="{{ route('admin.properties.publish', $property) }}"
          class="d-inline"
          onsubmit="return confirm('Mark this property as published?');">
        @csrf

        <button type="submit"
                class="btn btn-sm btn-primary">
            Publish
        </button>
    </form>
@endif
</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-4">
                                    No properties have been added yet.
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
        Add land listing
    </a>
</div>

@if (session('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
@endif


@endsection