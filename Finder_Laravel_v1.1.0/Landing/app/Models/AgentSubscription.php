<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AgentSubscription extends Model
{
    protected $guarded = ['*'];
    protected $attributes = ['status'=>'draft', 'currency'=>'LKR'];

    protected function casts(): array
    {
        return ['agreed_price'=>'decimal:2', 'starts_at'=>'datetime',
            'ends_at'=>'datetime', 'cancelled_at'=>'datetime'];
    }

    protected static function booted(): void
    {
        static::saving(function (self $subscription) {
            if ($subscription->status !== 'draft') {
                throw new \LogicException('Subscription lifecycle changes are reserved for Phase 2.');
            }
            if (!User::whereKey($subscription->agent_id)->whereHas('roles', fn ($q)=>$q->where('name', 'agent'))->exists()) {
                throw new \LogicException('Subscription records require an approved agent.');
            }
        });
    }

    public function agent(): BelongsTo
    {
        return $this->belongsTo(User::class, 'agent_id');
    }

    public function plan(): BelongsTo
    {
        return $this->belongsTo(SubscriptionPlan::class, 'subscription_plan_id');
    }
}
