<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PropertyListingController extends Controller
{
    public function storeType(Request $request)
    {
        $data = $request->validate([
            'type' => ['required', 'in:land,house,apartment'],
        ]);

        $request->session()->put('property_listing.type', $data['type']);

        return redirect()->route('add-property-location');
    }

    public function storeLocation(Request $request)
    {
        $data = $request->validate([
            'city' => ['required', 'string', 'max:100'],
            'district' => ['required', 'string', 'max:100'],
            'location' => ['required', 'string', 'max:255'],
            'latitude' => ['nullable', 'numeric', 'between:-90,90'],
            'longitude' => ['nullable', 'numeric', 'between:-180,180'],
        ]);

        $request->session()->put('property_listing.location', $data);

        return redirect()->route('add-property-photos');
    }
}