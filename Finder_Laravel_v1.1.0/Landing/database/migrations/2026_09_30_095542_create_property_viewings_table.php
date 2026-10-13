<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('property_viewings', function (Blueprint $table) {
            $table->id();

            $table->foreignId('property_id')
                ->constrained('properties')
                ->restrictOnDelete();

            $table->foreignId('lead_id')
                ->nullable()
                ->constrained('crm_leads')
                ->nullOnDelete();

            $table->foreignId('customer_id')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            $table->foreignId('assigned_to')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            $table->dateTime('scheduled_at');

            $table->string('status', 30)
                ->default('scheduled')
                ->index();

            $table->text('notes')->nullable();
            $table->text('outcome')->nullable();

            $table->timestamps();

            $table->index(['property_id', 'scheduled_at']);
            $table->index(['assigned_to', 'scheduled_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('property_viewings');
    }
};