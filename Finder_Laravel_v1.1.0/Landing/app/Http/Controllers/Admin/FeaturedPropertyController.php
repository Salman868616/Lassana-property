<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class FeaturedPropertyController extends Controller
{
    public function update(Request $request, Property $property)
    {
        $data = $request->validate(['is_featured' => ['required', 'boolean']]);
        $featured = (bool) $data['is_featured'];

        DB::transaction(function () use ($property, $featured) {
            $listing = Property::lockForUpdate()->findOrFail($property->id);
            if ($featured && $listing->status !== 'published') {
                throw ValidationException::withMessages([
                    'is_featured' => 'Only published properties can be featured on the homepage.',
                ]);
            }

            // Repeated submissions keep the existing position in the selection.
            $listing->featured_at = $featured ? ($listing->featured_at ?? now()) : null;
            $listing->is_featured = $featured;
            $listing->save();
        });

        return redirect()->route('dashboard.property', ['role' => 'admin', 'property' => $property->id])
            ->with('success', $featured ? 'Property selected for Featured properties.' : 'Property removed from Featured properties.');
    }
}
