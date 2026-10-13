<?php

namespace App\Services;

use App\Models\Property;
use App\Models\PropertyCategory;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class PropertyCategoryFields
{
    public const FIELDS = [
        'house'=>['bedrooms','bathrooms','floor_area','property_age','condition','parking_spaces','total_floors'],
        'apartment'=>['developer','unit_type','amenities','bedrooms','bathrooms','floor_area','parking_spaces','floor_number'],
        'commercial'=>['unit_type','floor_area','parking_spaces','total_floors'],
        'villa'=>['developer','amenities','bedrooms','bathrooms','floor_area','property_age','condition','parking_spaces','total_floors'],
        'land'=>[],
    ];

    public function prepare(Request $request, Property $property): array
    {
        $rules = [
            'category'=>['sometimes','required','in:land,house,apartment,villa,commercial'],
            'listing_type'=>['sometimes','required','in:sale,rent'],
            'is_price_negotiable'=>['sometimes','required','boolean'],
        ];
        foreach (['bedrooms','bathrooms','parking_spaces','total_floors','floor_number'] as $field) {
            $rules['details.'.$field] = ['nullable','integer','min:0','max:255'];
        }
        $rules['details'] = ['sometimes','array'];
        $rules['details.property_age'] = ['nullable','integer','min:0','max:65535'];
        $rules['details.condition'] = ['nullable','string','max:50'];
        $rules['details.floor_area'] = ['nullable','numeric','gt:0','max:999999999999.99','decimal:0,2'];
        $rules['details.unit_type'] = ['nullable','string','max:100'];
        $rules['details.developer'] = ['nullable','string','max:150'];
        $rules['details.amenities'] = ['nullable','string','max:3000'];
        $data = $request->validate($rules);
        if (array_key_exists('amenities', $data['details'] ?? [])) {
            $data['details']['amenities'] = array_values(array_unique(array_filter(
                array_map('trim', preg_split('/\r\n|\r|\n/', $data['details']['amenities'] ?? '')),
                fn ($facility) => $facility !== ''
            )));
        }
        $property->listing_type = $data['listing_type'] ?? $property->listing_type ?? 'sale';
        $property->is_price_negotiable = (bool) ($data['is_price_negotiable'] ?? $property->is_price_negotiable ?? false);
        if ($property->isForRent()) $property->price_per_perch = null;
        $slug = $data['category'] ?? $property->category ?? 'land';
        $category = PropertyCategory::where('slug', $slug)->where('is_active', true)->first();
        if (! $category) throw ValidationException::withMessages(['category'=>'This category is unavailable.']);
        $changed = $property->exists && $property->getOriginal('category') !== $slug;
        $property->category = $slug;
        $property->propertyCategory()->associate($category);
        if ($slug !== 'land') {
            $property->price_per_perch = null;
            $property->land_shape = null;
            $property->survey_available = null;
        }
        if (! in_array($slug, ['land','house','villa'], true)) $property->land_size_perches = null;
        $details = ['property_type'=>$slug];
        foreach (array_unique(array_merge(...array_values(self::FIELDS))) as $field) {
            $details[$field] = in_array($field, self::FIELDS[$slug], true)
                ? ($data['details'][$field] ?? ($changed ? null : $property->details?->{$field})) : null;
            if (array_key_exists($field, $data['details'] ?? [])) {
                $details[$field] = in_array($field, self::FIELDS[$slug], true) ? $data['details'][$field] : null;
            }
        }
        return $details;
    }

    public function save(Property $property, array $details): void
    {
        if ($property->category === 'land') $property->details()->delete();
        else $property->details()->updateOrCreate([], $details);
    }

    public function validateComplete(Property $property): void
    {
        if ($property->category === 'land') return;
        $rules = ['floor_area'=>['required','numeric','gt:0']];
        if (in_array($property->category, ['house','apartment','villa'], true)) {
            $rules['bedrooms'] = ['required','integer','min:0'];
            $rules['bathrooms'] = ['required','integer','min:1'];
        }
        if ($property->category === 'commercial') $rules['unit_type'] = ['required','string'];
        \Illuminate\Support\Facades\Validator::make($property->details?->toArray() ?? [], $rules)->validate();
    }
}
