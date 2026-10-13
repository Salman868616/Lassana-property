
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('properties', function (Blueprint $table) {
            $table->foreignId('property_category_id')
                ->after('category')
                ->constrained('property_categories')
                ->restrictOnDelete();

            $table->index('property_category_id');
        });
    }

    public function down(): void
    {
        Schema::table('properties', function (Blueprint $table) {
            $table->dropForeign(['property_category_id']);
            $table->dropIndex(['property_category_id']);
            $table->dropColumn('property_category_id');
        });
    }
};
