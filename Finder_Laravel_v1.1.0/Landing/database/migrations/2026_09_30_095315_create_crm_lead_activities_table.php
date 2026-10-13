<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('crm_lead_activities', function (Blueprint $table) {
            $table->id();

            $table->foreignId('lead_id')
                ->constrained('crm_leads')
                ->cascadeOnDelete();

            $table->foreignId('performed_by')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            $table->string('activity_type', 50);
            $table->string('status', 40)->nullable();
            $table->timestamp('activity_at')->nullable();
            $table->text('notes')->nullable();
            $table->string('outcome', 100)->nullable();

            $table->timestamps();

            $table->index(['lead_id', 'activity_at']);
            $table->index(['activity_type', 'activity_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('crm_lead_activities');
    }
};