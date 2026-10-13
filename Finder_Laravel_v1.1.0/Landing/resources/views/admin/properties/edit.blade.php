@extends('layouts.admin')

@section('title', 'Lassana Property | Edit property')
@section('heading', 'Edit property')

@section('content')
@if (session('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
@endif
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Edit property</h3>
        </div>

        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger" role="alert">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

           <form method="POST"
      action="{{ route('admin.properties.update', $property) }}"
      enctype="multipart/form-data">
    @csrf
@include('properties.category-fields')
    @method('PUT')

                <div class="mb-3">
                    <label for="owner_id" class="form-label">
                        Property owner
                    </label>

                    @if(!$owners->contains('id', $property->owner_id))
                        <p class="text-danger">The currently assigned owner is not an active seller. Select the correct seller before saving.</p>
                    @endif
                    <select id="owner_id" name="owner_id"
                            class="form-select" required>
                        <option value="">Select an active seller</option>

                        @foreach ($owners as $owner)
                        <option value="{{ $owner->id }}"
                         @selected(old('owner_id', $property->owner_id) == $owner->id)>
                           {{ $owner->name }} — {{ $owner->email }}
                           </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="title" class="form-label">Listing title</label>
                    <input id="title" name="title" type="text"
                           class="form-control"
                           value="{{ old('title', $property->title) }}"
                           maxlength="255" required>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">
                        Description
                    </label>
                    <textarea id="description" name="description"
                              class="form-control" rows="4"
                              maxlength="10000">{{ old('description', $property->description) }}</textarea>
                </div>

                @include('properties.site-concerns-field')

                <x-location-fields :district="$property->district" :city="$property->city" :legacy="true" />

                <div class="mb-3">
                    <label for="location" class="form-label">
                        Address or location description
                    </label>
                    <input id="location" name="location" type="text"
                           class="form-control"
                           value="{{ old('location', $property->location) }}" maxlength="255">
                </div>
                <div class="row">
    <div class="col-md-6 mb-3">
        <label for="latitude" class="form-label">Latitude</label>
        <input id="latitude"
               name="latitude"
               type="number"
               class="form-control"
               value="{{ old('latitude', $property->latitude ?? '') }}"
               min="-90"
               max="90"
               step="0.0000001">
    </div>

    <div class="col-md-6 mb-3">
        <label for="longitude" class="form-label">Longitude</label>
        <input id="longitude"
               name="longitude"
               type="number"
               class="form-control"
               value="{{ old('longitude', $property->longitude ?? '') }}"
               min="-180"
               max="180"
               step="0.0000001">
    </div>
</div>

<p class="text-body-secondary">
    Enter both coordinates, or leave both blank.
    Latitude comes first; longitude comes second.
</p>
@if ($property->latitude !== null && $property->longitude !== null)
    <div class="mb-3">
        <a href="https://www.google.com/maps?q={{ $property->latitude }},{{ $property->longitude }}"
           target="_blank"
           rel="noopener noreferrer"
           class="btn btn-outline-primary">
            View saved location on Google Maps
        </a>
    </div>
@endif

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="land_size_perches" class="form-label">
                            Land size (perches)
                        </label>
                        <input id="land_size_perches" name="land_size_perches"
                               type="number" class="form-control"
                               value="{{ old('land_size_perches', $property->land_size_perches) }}"
                               min="0.0001" max="9999999999.9999"
                               step="0.0001">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="total_price" class="form-label">
                            {{ old('listing_type', $property->listing_type ?? 'sale') === 'rent' ? 'Monthly rent (LKR)' : 'Total price (LKR)' }}
                        </label>
                        <input id="total_price" name="total_price"
                               type="number" class="form-control"
                               value="{{ old('total_price', $property->total_price) }}"
                               min="0.01" max="999999999999.99"
                               step="0.01">
                        @include('properties.price-negotiable-field')
                    </div>
                </div>
 
                <div class="row">
    <div class="col-md-6 mb-3">
        <label for="price_per_perch" class="form-label">
            Price per perch (LKR)
        </label>
        <input id="price_per_perch"
               name="price_per_perch"
               type="number"
               class="form-control"
               value="{{ old('price_per_perch', $property->price_per_perch ?? '') }}"
               min="0.01"
               max="999999999999.99"
               step="0.01">
    </div>

    <div class="col-md-6 mb-3">
        <label for="road_access" class="form-label">
            Road access
        </label>
        <input id="road_access"
               name="road_access"
               type="text"
               class="form-control"
               value="{{ old('road_access', $property->road_access ?? '') }}"
               maxlength="255"
               placeholder="Example: 20-foot access road">
    </div>

    <div class="col-md-6 mb-3">
        <label for="land_shape" class="form-label">
            Land shape
        </label>
        <input id="land_shape"
               name="land_shape"
               type="text"
               class="form-control"
               value="{{ old('land_shape', $property->land_shape ?? '') }}"
               maxlength="100"
               placeholder="Example: Rectangular">
    </div>

    <div class="col-md-6 mb-3">
        <label for="facing_direction" class="form-label">
            Facing direction
        </label>

        <select id="facing_direction"
                name="facing_direction"
                class="form-select">
            <option value="">Unknown</option>

            @foreach ([
                'north' => 'North',
                'northeast' => 'Northeast',
                'east' => 'East',
                'southeast' => 'Southeast',
                'south' => 'South',
                'southwest' => 'Southwest',
                'west' => 'West',
                'northwest' => 'Northwest',
            ] as $value => $label)
                <option value="{{ $value }}"
                    @selected(old('facing_direction', $property->facing_direction ?? '') === $value)>
                    {{ $label }}
                </option>
            @endforeach
        </select>
    </div>
</div>

<div class="row">
    @foreach ([
        'electricity_available' => 'Electricity available',
        'water_available' => 'Water available',
        'survey_available' => 'Survey available',
    ] as $field => $label)
        @php
            $savedValue = isset($property) ? $property->{$field} : null;
            $selectedValue = old(
                $field,
                is_null($savedValue) ? '' : (int) $savedValue
            );
        @endphp

        <div class="col-md-4 mb-3">
            <label for="{{ $field }}" class="form-label">
                {{ $label }}
            </label>

            <select id="{{ $field }}"
                    name="{{ $field }}"
                    class="form-select">
                <option value=""
                    @selected($selectedValue === '' || $selectedValue === null)>
                    Unknown
                </option>
                <option value="1"
                    @selected((string) $selectedValue === '1')>
                    Yes
                </option>
                <option value="0"
                    @selected((string) $selectedValue === '0')>
                    No
                </option>
            </select>
        </div>
    @endforeach
</div>

     <p class="text-body-secondary">
    Leave unknown optional details blank.
    Saving changes keeps the listing's current status.
</p>

@if ($property->images->isNotEmpty())
    <div class="mb-3">
        <h3 class="h6">Saved photos</h3>

        <div class="row g-3">
            @foreach ($property->images as $photo)
                <div class="col-6 col-md-3">
                    <img src="{{ asset('storage/'.$photo->path) }}"
                         alt="Photo {{ $loop->iteration }} of {{ $property->title }}"
                         class="img-fluid rounded border"
                         style="width: 100%; height: 160px; object-fit: cover;"
                         loading="lazy">
         

                <button type="submit"
        form="delete-photo-{{ $photo->id }}"
        class="btn btn-sm btn-outline-danger mt-2">
    Remove photo
</button>
                </div>
            @endforeach
        </div>
    </div>
@endif

                <div class="mb-3">
    <h2 class="h5">Media</h2>
    <label for="images" class="form-label">Property photos</label>

    <input id="images"
           name="images[]"
           type="file"
           class="form-control"
           accept="image/jpeg,image/png,image/webp"
           aria-describedby="images-help"
           multiple>

    <div id="images-help" class="form-text">
        Up to 10 photos in total per listing. JPG, PNG or WebP,
        maximum 2 MB each. New photos are added to existing photos.
        If validation fails, select the files again.
    </div>
</div>

                @include('properties.video-fields')
                <button type="submit" class="btn btn-primary">
                    Save changes
                </button>

                <a href="{{ route('admin.properties.index') }}"
                   class="btn btn-outline-secondary ms-2">
                    Cancel
                </a>
            </form>
            @foreach ($property->images as $photo)
    <form id="delete-photo-{{ $photo->id }}"
          method="POST"
          action="{{ route('admin.properties.images.destroy', [
              'property' => $property->id,
              'image' => $photo->id,
          ]) }}"
          onsubmit="return confirm('Permanently remove this photo? Unsaved changes to the listing will be lost.');">
        @csrf

        @method('DELETE')
    </form>
@endforeach
        </div>
    </div>
@endsection