<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CrmLead extends Model
{
    protected $fillable = [
        'property_id',
        'enquiry_id',
        'property_request_id',
        'buyer_service_request_id',
        'assigned_to',
        'status',
        'follow_up_at',
        'notes',
        'outcome',
        'source',
        'first_contacted_at',
    ];

    protected function casts(): array
    {
        return [
            'follow_up_at' => 'datetime',
            'first_contacted_at' => 'datetime',
        ];
    }

    public function property(): BelongsTo
    {
        return $this->belongsTo(Property::class);
    }

    public function propertyRequest(): BelongsTo
    {
        return $this->belongsTo(PropertyRequest::class);
    }

    public function buyerServiceRequest(): BelongsTo
    {
        return $this->belongsTo(BuyerServiceRequest::class);
    }

    public function enquiry(): BelongsTo
    {
        return $this->belongsTo(PropertyEnquiry::class, 'enquiry_id');
    }

    public function assignee(): BelongsTo
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }

    public function activities(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(CrmLeadActivity::class, 'lead_id');
    }

    public function viewings(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(PropertyViewing::class, 'lead_id');
    }

    public function sales(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(PropertySale::class, 'lead_id');
    }
}
