<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PropertyDetail extends Model
{
    protected $fillable = [
        'property_id',
        'property_type',
        'bedrooms',
        'bathrooms',
        'floor_area',
        'land_size',
        'property_age',
        'condition',
        'parking_spaces',
        'total_floors',
        'floor_number',
        'living_area',
        'kitchen_area',
        'developer',
        'unit_type',
        'amenities',
    ];

    protected function casts(): array
    {
        return [
            'amenities' => 'array',
            'floor_area' => 'decimal:2',
            'land_size' => 'decimal:2',
            'living_area' => 'decimal:2',
            'kitchen_area' => 'decimal:2',
        ];
    }

    public function property(): BelongsTo
    {
        return $this->belongsTo(Property::class, 'property_id');
    }
}
