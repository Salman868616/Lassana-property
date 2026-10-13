<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PropertyRequest extends Model
{
    protected $fillable=['category','district','city','budget_min','budget_max','bedrooms','phone','requirements'];

    protected function casts(): array
    {
        return ['budget_min'=>'decimal:2','budget_max'=>'decimal:2','bedrooms'=>'integer'];
    }

    public function customer(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class,'customer_id');
    }

    public function crmLead(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(CrmLead::class,'property_request_id');
    }

    public function matches(): \Illuminate\Database\Eloquent\Builder
    {
        return Property::where('status','published')->where('listing_type','sale')->where('currency','LKR')->where('category',$this->category)
            ->whereRaw('LOWER(district) = ?', [strtolower($this->district)])
            ->when($this->city,fn ($q)=>$q->whereRaw('LOWER(city) = ?', [strtolower($this->city)]))
            ->where('total_price','<=',$this->budget_max)
            ->when($this->budget_min !== null,fn ($q)=>$q->where('total_price','>=',$this->budget_min))
            ->when($this->bedrooms !== null,fn ($q)=>$q->whereHas('details',fn ($q)=>$q->where('bedrooms','>=',$this->bedrooms)));
    }
}
