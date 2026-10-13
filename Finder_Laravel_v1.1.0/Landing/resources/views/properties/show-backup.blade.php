@extends('layouts.app')

@section('title', $property->title . ' | Lassana Property')

@section('content')
    @include('layouts.partials.header.real-estate-header')

    <main id="top" class="content-wrapper">
        <div class="container py-5">
            <a href="{{ route('properties.index') }}"
               class="btn btn-outline-primary mb-4">
                Back to properties
            </a>

            <h1>{{ $property->title }}</h1>

            <p class="text-body-secondary">
                {{ $property->city }}, {{ $property->district }}
            </p>

            <p class="small">
                Reference: {{ $property->property_code }}
            </p>

            <div class="row g-3 mb-4">
                @forelse ($property->images as $photo)
                    <div class="col-md-6">
                        <img src="{{ asset('storage/'.$photo->path) }}"
                             alt="Photo {{ $loop->iteration }} of {{ $property->title }}"
                             class="img-fluid rounded w-100"
                             style="height: 320px; object-fit: contain;"
                             loading="lazy">
                    </div>
                @empty
                    <div class="col-12">
                        <p>No photos available.</p>
                    </div>
                @endforelse
            </div>

            <div class="row g-4">
                <div class="col-lg-8">
                    <h2 class="h4">Description</h2>

                    <p style="white-space: pre-line;">{{ $property->description }}</p>

                    <h2 class="h4 mt-4">Land details</h2>

                    <dl class="row">
                        <dt class="col-sm-5">Land size</dt>
                        <dd class="col-sm-7">
                            {{ $property->land_size_perches !== null
                                ? number_format($property->land_size_perches, 4) . ' perches'
                                : 'Not provided' }}
                        </dd>

                        <dt class="col-sm-5">Price per perch</dt>
                        <dd class="col-sm-7">
                            {{ $property->price_per_perch !== null
                                ? $property->currency . ' ' . number_format($property->price_per_perch, 2)
                                : 'Not provided' }}
                        </dd>

                        <dt class="col-sm-5">Road access</dt>
                        <dd class="col-sm-7">
                            {{ $property->road_access ?: 'Not provided' }}
                        </dd>

                        <dt class="col-sm-5">Land shape</dt>
                        <dd class="col-sm-7">
                            {{ $property->land_shape ?: 'Not provided' }}
                        </dd>

                        <dt class="col-sm-5">Facing direction</dt>
                        <dd class="col-sm-7">
                            {{ $property->facing_direction
                                ? ucfirst($property->facing_direction)
                                : 'Not provided' }}
                        </dd>

                        @foreach ([
                            'electricity_available' => 'Electricity available',
                            'water_available' => 'Water available',
                            'survey_available' => 'Survey available',
                        ] as $field => $label)
                            <dt class="col-sm-5">{{ $label }}</dt>
                            <dd class="col-sm-7">
                                {{ $property->{$field} === null
                                    ? 'Unknown'
                                    : ($property->{$field} ? 'Yes' : 'No') }}
                            </dd>
                        @endforeach
                    </dl>
                </div>

                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h2 class="h5">Total price</h2>

                            <p class="fs-4 fw-semibold">
                                {{ $property->total_price !== null
                                    ? $property->currency . ' ' . number_format($property->total_price, 2)
                                    : 'Not provided' }}
                            </p>

                            <h2 class="h5 mt-4">Location</h2>
                            <p>{{ $property->location }}</p>
                            <p>
                                {{ $property->city }},
                                {{ $property->district }}
                            </p>

                            @if ($property->latitude !== null && $property->longitude !== null)
                                <a href="https://www.google.com/maps?q={{ $property->latitude }},{{ $property->longitude }}"
                                   target="_blank"
                                   rel="noopener noreferrer"
                                   class="btn btn-outline-primary">
                                    View on Google Maps
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@push('scripts')
    @vite(['resources/js/app.js'])
@endpush