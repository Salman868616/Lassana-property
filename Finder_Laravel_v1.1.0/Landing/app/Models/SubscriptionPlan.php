<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SubscriptionPlan extends Model
{
    protected $guarded = ['*'];
    protected $attributes = ['is_active'=>false, 'currency'=>'LKR'];

    protected function casts(): array
    {
        return ['price'=>'decimal:2', 'is_active'=>'boolean'];
    }

    protected static function booted(): void
    {
        static::saving(function (self $plan) {
            if ($plan->is_active) {
                throw new \LogicException('Subscription activation is reserved for Phase 2.');
            }
        });
    }

    public function subscriptions(): HasMany
    {
        return $this->hasMany(AgentSubscription::class);
    }
}
