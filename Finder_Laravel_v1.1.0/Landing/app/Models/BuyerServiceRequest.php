<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\{BelongsTo, HasOne};

class BuyerServiceRequest extends Model
{
    public const TYPES = ['inspection' => 'Inspection request', 'lgc_service' => 'LGC service request'];

    public const SERVICES = ['general'=>'General building enquiry','house_plans'=>'House plans','architectural_design'=>'Architectural design','boq'=>'BOQ services'];

    protected $fillable = ['type', 'phone', 'location', 'preferred_date', 'message'];

    protected function casts(): array
    {
        return ['preferred_date' => 'date'];
    }

    public function customer(): BelongsTo { return $this->belongsTo(User::class, 'customer_id'); }
    public function property(): BelongsTo { return $this->belongsTo(Property::class); }
    public function crmLead(): HasOne { return $this->hasOne(CrmLead::class); }
}
