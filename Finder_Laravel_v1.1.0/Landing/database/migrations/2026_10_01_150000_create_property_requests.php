<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('property_requests',function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->constrained('users')->restrictOnDelete();
            $table->string('category',40);
            $table->string('district',100);
            $table->string('city',100)->nullable();
            $table->decimal('budget_min',14,2)->nullable();
            $table->decimal('budget_max',14,2);
            $table->unsignedTinyInteger('bedrooms')->nullable();
            $table->string('phone',30)->nullable();
            $table->text('requirements');
            $table->timestamps();
            $table->index('created_at');
        });
        Schema::table('crm_leads',function (Blueprint $table) {
            $table->foreignId('property_request_id')->nullable()->unique()->constrained('property_requests')->restrictOnDelete();
        });
    }
    public function down(): void
    {
        Schema::table('crm_leads',function (Blueprint $table) {
            $table->dropForeign(['property_request_id']);
            $table->dropUnique(['property_request_id']);
            $table->dropColumn('property_request_id');
        });
        Schema::dropIfExists('property_requests');
    }
};
