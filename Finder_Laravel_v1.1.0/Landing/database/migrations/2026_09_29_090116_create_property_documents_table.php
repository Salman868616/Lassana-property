<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('property_documents', function (Blueprint $table) {
            $table->id();

            $table->foreignId('property_id')
                ->constrained('properties')
                ->cascadeOnDelete();

            $table->foreignId('uploaded_by')
                ->constrained('users')
                ->restrictOnDelete();

            $table->string('document_type', 50);
            $table->string('path');
            $table->string('status', 30)->default('pending')->index();
            $table->timestamp('verified_at')->nullable();

            $table->timestamps();

            $table->index(['property_id', 'document_type']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('property_documents');
    }
};