<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('property_sales', function (Blueprint $table) {
            $table->id();

            $table->foreignId('property_id')
                ->constrained('properties')
                ->restrictOnDelete();

            $table->foreignId('lead_id')
                ->nullable()
                ->constrained('crm_leads')
                ->nullOnDelete();

            $table->foreignId('buyer_id')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            $table->foreignId('seller_id')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            $table->foreignId('agent_id')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            $table->decimal('sale_price', 18, 2);
            $table->char('currency', 3)->default('LKR');

            $table->date('sale_date');

            $table->string('status', 30)
                ->default('pending')
                ->index();

            $table->decimal('commission_amount', 18, 2)->nullable();
            $table->decimal('company_revenue', 18, 2)->nullable();

            $table->text('notes')->nullable();

            $table->timestamps();

            $table->index(['property_id', 'sale_date']);
            $table->index(['status', 'sale_date']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('property_sales');
    }
};