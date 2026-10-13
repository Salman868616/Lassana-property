<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
    public function up(): void {
        Schema::create('complaints', function(Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->restrictOnDelete();
            $table->string('category',20);
            $table->string('property_reference',100)->nullable();
            $table->string('subject',200);
            $table->text('message');
            $table->string('status',20)->default('open')->index();
            $table->timestamps();
        });
        Schema::create('complaint_updates', function(Blueprint $table) {
            $table->id();
            $table->foreignId('complaint_id')->constrained()->cascadeOnDelete();
            $table->foreignId('reviewer_id')->nullable()->constrained('users')->nullOnDelete();
            $table->string('status',20);
            $table->text('response');
            $table->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('complaint_updates');
        Schema::dropIfExists('complaints');
    }
};
