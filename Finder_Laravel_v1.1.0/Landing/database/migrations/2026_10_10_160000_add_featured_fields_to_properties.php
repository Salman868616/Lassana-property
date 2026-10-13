<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('properties', function (Blueprint $table) {
            $table->boolean('is_featured')->default(false);
            $table->timestamp('featured_at')->nullable();
            $table->index(['is_featured', 'status', 'featured_at'], 'properties_featured_homepage_index');
        });
    }

    public function down(): void
    {
        Schema::table('properties', function (Blueprint $table) {
            $table->dropIndex('properties_featured_homepage_index');
            $table->dropColumn(['is_featured', 'featured_at']);
        });
    }
};
