@props(['district' => '', 'city' => '', 'required' => false, 'legacy' => false])
@php
    $locations = \App\Services\LocationCatalog::options();
    $selectedDistrict = old('district', $district);
    $selectedCity = old('city', $city);
    if ($legacy && $district) {
        $locations[$district] ??= [];
        if ($city && !in_array($city, $locations[$district], true)) $locations[$district][] = $city;
    }
@endphp
<div class="row g-3 mb-3" data-location-fields data-city-placeholder="{{ __('Select city (optional)') }}" data-city-empty-placeholder="{{ __('Select city (optional)') }}">
    <div class="col-md-6">
        <label class="form-label" for="district">{{ __('District') }}</label>
        <select id="district" name="district" class="form-select" @required($required)>
            <option value="">{{ __('Select district') }}</option>
            @foreach($locations as $name => $cities)
                <option value="{{ $name }}" @selected($name === $selectedDistrict)>{{ $name }}</option>
            @endforeach
        </select>
        @error('district')<div class="text-danger small">{{ $message }}</div>@enderror
    </div>
    <div class="col-md-6">
        <label class="form-label" for="city">{{ __('City / locality') }}</label>
        <select id="city" name="city" class="form-select">
            <option value="">{{ __('Select city (optional)') }}</option>
            @foreach($locations as $name => $cities)
                @foreach($cities as $nameOfCity)
                    <option data-district="{{ $name }}" value="{{ $nameOfCity }}" @selected($name === $selectedDistrict && $nameOfCity === $selectedCity)>{{ $nameOfCity }}</option>
                @endforeach
            @endforeach
        </select>
        @error('city')<div class="text-danger small">{{ $message }}</div>@enderror
    </div>
</div>
@once
<script src="{{ asset('assets/js/location-fields.js') }}" defer></script>
@endonce
