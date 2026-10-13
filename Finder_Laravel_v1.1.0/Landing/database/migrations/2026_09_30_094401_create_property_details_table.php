<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('property_details', function (Blueprint $table) {
            $table->id();

            $table->foreignId('property_id')
                ->unique()
                ->constrained('properties')
                ->cascadeOnDelete();

            // Common property details
            $table->string('property_type', 50)->nullable();
            $table->unsignedTinyInteger('bedrooms')->nullable();
            $table->unsignedTinyInteger('bathrooms')->nullable();
            $table->decimal('floor_area', 14, 2)->nullable();
            $table->decimal('land_size', 14, 2)->nullable();
            $table->unsignedSmallInteger('property_age')->nullable();
            $table->string('condition', 50)->nullable();
            $table->unsignedTinyInteger('parking_spaces')->nullable();

            // House-specific details
            $table->unsignedTinyInteger('total_floors')->nullable();
            $table->unsignedTinyInteger('floor_number')->nullable();
            $table->decimal('living_area', 14, 2)->nullable();
            $table->decimal('kitchen_area', 14, 2)->nullable();

            // Apartment-specific details
            $table->string('developer', 150)->nullable();
            $table->string('unit_type', 100)->nullable();

            // Additional facilities / amenities
            $table->json('amenities')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('property_details');
    }
};