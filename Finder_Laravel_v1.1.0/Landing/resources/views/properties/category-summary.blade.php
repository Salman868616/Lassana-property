@php($categoryDetails = $property->details)
<div class="{{ ($compact ?? false) ? 'small mb-2' : 'card p-3 mb-4' }}">
    <strong>{{ ucfirst($property->category) }}</strong>
    @if(!($compact ?? false) && $property->category === 'land')
        <dl class="row mb-0 mt-3">
            <dt class="col-sm-4">Land size</dt><dd class="col-sm-8">{{ $property->land_size_perches === null ? 'Not entered' : $property->land_size_perches.' perches' }}</dd>
            <dt class="col-sm-4">Price per perch</dt><dd class="col-sm-8">{{ $property->price_per_perch === null ? 'Not entered' : $property->currency.' '.number_format((float)$property->price_per_perch, 2) }}</dd>
            @foreach(['road_access'=>'Road access','land_shape'=>'Land shape','facing_direction'=>'Facing direction'] as $field=>$label)
                <dt class="col-sm-4">{{ $label }}</dt><dd class="col-sm-8">{{ $property->{$field} ? ucfirst($property->{$field}) : 'Not entered' }}</dd>
            @endforeach
            @foreach(['electricity_available'=>'Electricity available','water_available'=>'Water available','survey_available'=>'Survey available'] as $field=>$label)
                <dt class="col-sm-4">{{ $label }}</dt><dd class="col-sm-8">{{ $property->{$field} === null ? 'Unknown' : ($property->{$field} ? 'Yes' : 'No') }}</dd>
            @endforeach
            <dt class="col-sm-4">Map location</dt>
            <dd class="col-sm-8">
                @if($property->latitude !== null && $property->longitude !== null)
                    <a href="https://www.google.com/maps?q={{ $property->latitude }},{{ $property->longitude }}" target="_blank" rel="noopener noreferrer">View on Google Maps</a>
                @else
                    Not entered
                @endif
            </dd>
        </dl>
    @endif
    @if($categoryDetails && $property->category !== 'land')
        @foreach(\App\Services\PropertyCategoryFields::FIELDS[$property->category] ?? [] as $field)
            @if($categoryDetails->{$field} !== null && $categoryDetails->{$field} !== [])
                <span class="d-inline-block me-3">{{ $field === 'amenities' ? 'Facilities' : ($field === 'property_age' ? 'Property age (years)' : ucfirst(str_replace('_',' ',$field))) }}: {{ $field === 'amenities' ? implode(', ', $categoryDetails->{$field} ?? []) : $categoryDetails->{$field} }}{{ $field === 'floor_area' ? ' sq ft' : '' }}</span>
            @endif
        @endforeach
    @endif
    @if(!($compact ?? false) && in_array($property->category, ['house', 'villa'], true) && $property->land_size_perches !== null)
        <span>Land size: {{ $property->land_size_perches }} perches</span>
    @endif
    @if(!($compact ?? false) && filled($property->site_concerns))
        <div class="mt-3">
            <strong>{{ __('Restrictions / site concerns') }}</strong>
            <p class="mb-0 mt-2" style="white-space:pre-line;overflow-wrap:anywhere">{{ $property->site_concerns }}</p>
        </div>
    @endif
</div>
