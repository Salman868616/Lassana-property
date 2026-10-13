<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('subscription_plans', function (Blueprint $table) {
            $table->id();
            $table->string('code', 40)->unique();
            $table->string('name', 100);
            $table->decimal('price', 14, 2)->nullable();
            $table->string('currency', 3)->default('LKR');
            $table->enum('billing_interval', ['monthly', 'annual'])->nullable();
            $table->boolean('is_active')->default(false);
            $table->timestamps();
        });
        Schema::create('agent_subscriptions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('agent_id')->constrained('users')->restrictOnDelete();
            $table->foreignId('subscription_plan_id')->constrained('subscription_plans')->restrictOnDelete();
            $table->enum('status', ['draft', 'active', 'cancelled', 'expired'])->default('draft');
            $table->decimal('agreed_price', 14, 2)->nullable();
            $table->string('currency', 3)->default('LKR');
            $table->dateTime('starts_at')->nullable();
            $table->dateTime('ends_at')->nullable();
            $table->dateTime('cancelled_at')->nullable();
            $table->timestamps();
            $table->index(['agent_id', 'status']);
        });
        foreach (['free'=>'Free', 'professional'=>'Professional', 'premium'=>'Premium'] as $code=>$name) {
            DB::table('subscription_plans')->insert([
                'code'=>$code, 'name'=>$name, 'is_active'=>false,
                'created_at'=>now(), 'updated_at'=>now(),
            ]);
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('agent_subscriptions');
        Schema::dropIfExists('subscription_plans');
    }
};
