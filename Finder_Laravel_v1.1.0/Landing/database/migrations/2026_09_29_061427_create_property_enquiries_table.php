<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
       Schema::create('property_enquiries', function (Blueprint $table) {
    $table->id();

    $table->foreignId('property_id')
        ->constrained('properties')
        ->restrictOnDelete();

    $table->string('name', 150);
    $table->string('email', 254);
    $table->string('phone', 30)->nullable();
    $table->text('message');

    $table->string('status', 30)->default('new')->index();

    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('property_enquiries');
    }
};
