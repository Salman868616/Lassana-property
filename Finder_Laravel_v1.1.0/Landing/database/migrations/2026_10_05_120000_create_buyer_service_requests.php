<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('buyer_service_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->constrained('users')->restrictOnDelete();
            $table->foreignId('property_id')->nullable()->constrained('properties')->restrictOnDelete();
            $table->string('type', 30);
            $table->string('phone', 30);
            $table->string('location', 255)->nullable();
            $table->date('preferred_date')->nullable();
            $table->text('message');
            $table->timestamps();
            $table->index(['customer_id', 'id']);
        });
        Schema::table('crm_leads', function (Blueprint $table) {
            $table->foreignId('buyer_service_request_id')->nullable()->unique()
                ->constrained('buyer_service_requests')->restrictOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('crm_leads', function (Blueprint $table) {
            $table->dropForeign(['buyer_service_request_id']);
            $table->dropUnique(['buyer_service_request_id']);
            $table->dropColumn('buyer_service_request_id');
        });
        Schema::dropIfExists('buyer_service_requests');
    }
};
