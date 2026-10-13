<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();

            // Public reference, generated when a property is created.
            $table->string('property_code', 40)->unique();

            // Ownership and the person who entered the listing.
            $table->foreignId('owner_id')
                ->constrained('users')
                ->restrictOnDelete();

            $table->foreignId('created_by')
                ->constrained('users')
                ->restrictOnDelete();

            $table->foreignId('agent_id')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            // Basic information.
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('category', 30)->default('land')->index();
            $table->string('status', 30)->default('draft')->index();
            $table->string('verification_level', 30)
                ->default('unverified');

            // Location.
            $table->string('district', 100)->nullable()->index();
            $table->string('city', 100)->nullable()->index();
            $table->string('location')->nullable();
            $table->decimal('latitude', 10, 7)->nullable();
            $table->decimal('longitude', 10, 7)->nullable();

            // Land size and pricing.
            $table->decimal('land_size_perches', 14, 4)->nullable();
            $table->decimal('price_per_perch', 18, 2)->nullable();
            $table->decimal('total_price', 18, 2)->nullable()->index();
            $table->char('currency', 3)->default('LKR');

            // Land features.
            $table->string('road_access')->nullable();
            $table->string('land_shape', 100)->nullable();
            $table->string('facing_direction', 30)->nullable();
            $table->boolean('electricity_available')->nullable();
            $table->boolean('water_available')->nullable();
            $table->boolean('survey_available')->nullable();

            $table->timestamp('published_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};