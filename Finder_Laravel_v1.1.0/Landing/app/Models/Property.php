<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

#[Fillable([
    'property_code',
    'title',
    'description',
    'site_concerns',
    'category',
    'listing_type',
    'property_category_id',
    'status',
    'verification_level',
    'district',
    'city',
    'location',
    'latitude',
    'longitude',
    'land_size_perches',
    'price_per_perch',
    'total_price',
    'is_price_negotiable',
    'currency',
    'road_access',
    'land_shape',
    'facing_direction',
    'electricity_available',
    'water_available',
    'survey_available',
])]
class Property extends Model
{
    use SoftDeletes;

    protected $attributes = ['listing_type' => 'sale', 'is_featured' => false, 'is_price_negotiable' => false];

    public function isForRent(): bool
    {
        return $this->listing_type === 'rent';
    }

    public function priceLabel(): string
    {
        if ($this->total_price === null) return __($this->isForRent() ? 'Rent on request' : 'Price on request');

        return ($this->currency ?: 'LKR').' '.number_format($this->total_price, 2)
            .($this->isForRent() ? __(' / month') : '');
    }

    protected static function booted(): void
    {
        static::creating(function (Property $property) {
            // The database assigns the shared sequence number on insert.
            $property->property_code = 'LP-'.\Illuminate\Support\Str::ulid();
        });
        static::created(function (Property $property) {
            $property->updateQuietly(['property_code' => \App\Services\PropertyIdentifier::format($property->id, $property->district)]);
        });
        static::updating(function (Property $property) {
            // A listing must be selected again after it leaves publication.
            if ($property->isDirty('status') && $property->status !== 'published') {
                $property->is_featured = false;
                $property->featured_at = null;
            }
            $code = \App\Services\PropertyIdentifier::format($property->id, $property->district);
            $previous = $property->getOriginal('property_code');
            if ($previous !== $code) {
                \Illuminate\Support\Facades\DB::table('property_code_aliases')->insertOrIgnore([
                    'property_id' => $property->id, 'code' => $previous,
                ]);
            }
            $property->property_code = $code;
        });
    }
    protected function casts(): array
    {
        return [
            'land_size_perches' => 'decimal:4',
            'price_per_perch' => 'decimal:2',
            'total_price' => 'decimal:2',
            'is_price_negotiable' => 'boolean',
            'latitude' => 'decimal:7',
            'longitude' => 'decimal:7',
            'electricity_available' => 'boolean',
            'water_available' => 'boolean',
            'survey_available' => 'boolean',
            'published_at' => 'datetime',
            'is_featured' => 'boolean',
            'featured_at' => 'datetime',
            'developer_id' => 'integer',
        ];
    }

    public function developer(): BelongsTo
    {
        return $this->belongsTo(Developer::class);
    }

    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function agent(): BelongsTo
    {
        return $this->belongsTo(User::class, 'agent_id');
    }

    public function propertyCategory(): BelongsTo
    {
        return $this->belongsTo(PropertyCategory::class, 'property_category_id');
    }

    public function images(): HasMany
    {
        return $this->hasMany(PropertyImage::class)
            ->orderBy('sort_order')
            ->orderBy('id');
    }

    public function enquiries(): HasMany
    {
        return $this->hasMany(PropertyEnquiry::class);
    }

    public function documents(): HasMany
    {
        return $this->hasMany(PropertyDocument::class);
    }

    public function verifications(): HasMany
    {
        return $this->hasMany(PropertyVerification::class);
    }

    public function crmLeads(): HasMany
    {
        return $this->hasMany(CrmLead::class);
    }

    public function details(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(PropertyDetail::class, 'property_id');
    }

    public function viewings(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(PropertyViewing::class, 'property_id');
    }

    public function sales(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(PropertySale::class, 'property_id');
    }
}
