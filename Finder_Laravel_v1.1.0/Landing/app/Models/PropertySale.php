<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PropertySale extends Model
{
    protected $fillable = [
        'property_id',
        'lead_id',
        'buyer_id',
        'seller_id',
        'agent_id',
        'sale_price',
        'currency',
        'sale_date',
        'status',
        'commission_amount',
        'company_revenue',
        'notes',
    ];

    protected function casts(): array
    {
        return [
            'sale_date' => 'date',
            'sale_price' => 'decimal:2',
            'commission_amount' => 'decimal:2',
            'company_revenue' => 'decimal:2',
        ];
    }

    public function property(): BelongsTo
    {
        return $this->belongsTo(Property::class, 'property_id');
    }

    public function lead(): BelongsTo
    {
        return $this->belongsTo(CrmLead::class, 'lead_id');
    }

    public function buyer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'buyer_id');
    }

    public function seller(): BelongsTo
    {
        return $this->belongsTo(User::class, 'seller_id');
    }

    public function agent(): BelongsTo
    {
        return $this->belongsTo(User::class, 'agent_id');
    }
}
