<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('property_enquiries', function (Blueprint $table) {
            $table->foreignId('customer_id')->nullable()->constrained('users')->nullOnDelete();
        });
    }
    public function down(): void
    {
        Schema::table('property_enquiries', fn (Blueprint $table) => $table->dropConstrainedForeignId('customer_id'));
    }
};
