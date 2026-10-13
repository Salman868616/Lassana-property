<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\{Schema, DB};
return new class extends Migration {
    public function up(): void {
        DB::table('property_categories')->insertOrIgnore(['slug'=>'villa','name'=>'Villa','is_active'=>true,'sort_order'=>5,'created_at'=>now(),'updated_at'=>now()]);
        Schema::create('developers', function (Blueprint $table) {
            $table->id(); $table->string('name',150); $table->text('description')->nullable();
            $table->string('city',100)->nullable(); $table->string('phone',30)->nullable();
            $table->string('email')->nullable(); $table->string('website',500)->nullable();
            $table->boolean('is_published')->default(false)->index(); $table->timestamps();
        });
        Schema::table('properties', fn (Blueprint $table) => $table->foreignId('developer_id')->nullable()->constrained()->nullOnDelete());
    }
    public function down(): void {
        Schema::table('properties', fn (Blueprint $table) => $table->dropConstrainedForeignId('developer_id'));
        Schema::dropIfExists('developers');
        // Keep the Villa category: existing listings may reference it.
    }
};
