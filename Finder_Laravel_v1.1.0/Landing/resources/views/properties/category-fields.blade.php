@php
    $selectedCategory = old('category', $property->category ?? 'land');
    $selectedListingType = old('listing_type', $property->listing_type ?? 'sale');
    $savedDetails = isset($property) ? $property->details : null;
@endphp
<div class="mb-3">
    <label class="form-label" for="listing-type">Listing type</label>
    <select id="listing-type" name="listing_type" class="form-select" required aria-describedby="listing-type-help">
        <option value="sale" @selected($selectedListingType === 'sale')>For sale</option>
        <option value="rent" @selected($selectedListingType === 'rent')>For rent</option>
    </select>
    <div class="form-text" id="listing-type-help">For rentals, enter the monthly rent as the price.</div>
</div>
<div class="mb-3">
    <label class="form-label" for="property-category">Property category</label>
    <select id="property-category" name="category" class="form-select" required>
        @foreach(['land'=>'Land','house'=>'House','apartment'=>'Apartment','villa'=>'Villa','commercial'=>'Commercial'] as $value=>$label)
            <option value="{{ $value }}" @selected($selectedCategory === $value)>{{ $label }}</option>
        @endforeach
    </select>
</div>
<div class="row">
    @foreach([
        'developer'=>['Developer','apartment villa','text'],
        'property_age'=>['Property age (years; 0 for new)','house villa','number'],
        'condition'=>['Condition (e.g. new, good, needs renovation)','house villa','text'],
        'bedrooms'=>['Bedrooms (0 for studio)','house apartment villa','number'],
        'bathrooms'=>['Bathrooms','house apartment villa','number'],
        'floor_area'=>['Floor area (sq ft)','house apartment villa commercial','number'],
        'parking_spaces'=>['Parking spaces','house apartment villa commercial','number'],
        'total_floors'=>['Total floors','house villa commercial','number'],
        'floor_number'=>['Floor number (0 for ground floor)','apartment','number'],
        'unit_type'=>['Unit type (studio, penthouse, office...)','apartment commercial','text'],
    ] as $field=>[$label,$categories,$type])
        <div class="col-md-6 mb-3" data-property-categories="{{ $categories }}">
            <label class="form-label" for="detail-{{ $field }}">{{ $label }}</label>
            <input class="form-control" id="detail-{{ $field }}" name="details[{{ $field }}]" type="{{ $type }}"
                value="{{ old('details.'.$field, $savedDetails?->{$field}) }}"
                @if($type === 'number') min="{{ $field === 'floor_area' ? '0.01' : '0' }}" max="{{ $field === 'floor_area' ? '999999999999.99' : ($field === 'property_age' ? '65535' : '255') }}" step="{{ $field === 'floor_area' ? '0.01' : '1' }}" @else maxlength="{{ $field === 'developer' ? 150 : ($field === 'condition' ? 50 : 100) }}" @endif>
        </div>
    @endforeach
    <div class="col-12 mb-3" data-property-categories="apartment villa">
        <label class="form-label" for="detail-amenities">Facilities</label>
        <textarea class="form-control" id="detail-amenities" name="details[amenities]" rows="4" maxlength="3000" aria-describedby="facilities-help">{{ old('details.amenities', implode("\n", $savedDetails?->amenities ?? [])) }}</textarea>
        <div class="form-text" id="facilities-help">Enter one facility per line (e.g. pool, gym, lift).</div>
    </div>
</div>
<script>
document.addEventListener('DOMContentLoaded', () => {
    const selector = document.getElementById('property-category');
    const form = selector.closest('form');
    const listingType = form.querySelector('#listing-type');
    for (const [id, categories] of Object.entries({land_size_perches:'land house villa',price_per_perch:'land',land_shape:'land',survey_available:'land'})) {
        const input = form.querySelector('#' + id);
        if (input) input.closest('[class*="col-md-"]').dataset.propertyCategories = categories;
    }
    const update = () => {
        const rental = listingType.value === 'rent';
        const priceLabel = form.querySelector('label[for="total_price"]');
        if (priceLabel) priceLabel.textContent = rental ? 'Monthly rent (LKR)' : 'Total price (LKR)';
        form.querySelectorAll('[data-property-categories]').forEach(group => {
            const visible = group.dataset.propertyCategories.split(' ').includes(selector.value)
                && !(rental && group.querySelector('#price_per_perch'));
            group.hidden = !visible;
            group.querySelectorAll('input,select,textarea').forEach(input => input.disabled = !visible);
        });
    };
    selector.addEventListener('change', update);
    listingType.addEventListener('change', update);
    update();
});
</script>
