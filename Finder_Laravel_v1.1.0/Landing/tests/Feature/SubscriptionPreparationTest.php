<?php

namespace Tests\Feature;

use App\Models\{User, SubscriptionPlan, AgentSubscription, RevenuePayment};
use App\Services\RevenueSummary;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class SubscriptionPreparationTest extends TestCase
{
    use RefreshDatabase;

    public function test_fresh_database_has_only_inactive_unpriced_plans(): void
    {
        $this->assertSame(['free', 'premium', 'professional'], SubscriptionPlan::orderBy('code')->pluck('code')->all());
        foreach (SubscriptionPlan::all() as $plan) {
            $this->assertFalse($plan->is_active);
            $this->assertNull($plan->price);
            $this->assertNull($plan->billing_interval);
            $this->assertSame('LKR', $plan->currency);
        }
        $this->assertDatabaseCount('agent_subscriptions', 0);
        $this->assertDatabaseCount('revenue_payments', 0);
        $this->assertSame(['listing', 'verification'], array_keys(RevenuePayment::TYPES));
    }

    public function test_draft_relationships_preserve_history_without_granting_access_or_revenue(): void
    {
        $this->seed(\Database\Seeders\RoleSeeder::class);
        $agent=User::factory()->create();
        $agent->roles()->attach(DB::table('roles')->where('name', 'agent')->value('id'));
        $plan=SubscriptionPlan::where('code', 'professional')->firstOrFail();
        $before=RevenueSummary::totals();
        $subscription=new AgentSubscription;
        $subscription->agent()->associate($agent);
        $subscription->plan()->associate($plan);
        $subscription->save();
        $subscription->refresh();
        $this->assertSame('draft', $subscription->status);
        $this->assertNull($subscription->agreed_price);
        $this->assertNull($subscription->starts_at);
        $this->assertNull($subscription->ends_at);
        $this->assertTrue($subscription->agent->is($agent));
        $this->assertTrue($plan->subscriptions()->sole()->is($subscription));
        $this->assertTrue($agent->subscriptions()->sole()->is($subscription));
        $this->assertSame(['agent'], $agent->roles()->pluck('name')->all());
        $this->assertEquals($before, RevenueSummary::totals());
        $this->assertDatabaseCount('revenue_payments', 0);
    }

    public function test_plan_activation_is_blocked(): void
    {
        $plan=SubscriptionPlan::firstOrFail();
        $plan->is_active=true;
        try {$plan->save();$this->fail('Activation must remain disabled.');}
        catch (\LogicException $e) {$this->assertStringContainsString('Phase 2', $e->getMessage());}
        $this->assertFalse($plan->fresh()->is_active);
    }

    public function test_subscription_activation_is_blocked(): void
    {
        $subscription=new AgentSubscription;
        $subscription->status='active';
        $this->expectException(\LogicException::class);
        $this->expectExceptionMessage('Phase 2');
        $subscription->save();
    }

    public function test_buyer_cannot_be_used_as_a_subscription_agent(): void
    {
        $this->seed(\Database\Seeders\RoleSeeder::class);
        $buyer=User::factory()->create();
        $buyer->roles()->attach(DB::table('roles')->where('name', 'buyer')->value('id'));
        $subscription=new AgentSubscription;
        $subscription->agent()->associate($buyer);
        $subscription->plan()->associate(SubscriptionPlan::firstOrFail());
        $this->expectException(\LogicException::class);
        $this->expectExceptionMessage('approved agent');
        $subscription->save();
    }
}
