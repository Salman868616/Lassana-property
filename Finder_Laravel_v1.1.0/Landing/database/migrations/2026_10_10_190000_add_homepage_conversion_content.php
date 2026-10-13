<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
    public function up(): void {
        Schema::create('testimonials', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name',150);
            $table->string('context',150)->nullable();
            $table->text('quote');
            $table->boolean('consent_confirmed')->default(false);
            $table->text('consent_notes')->nullable();
            $table->boolean('is_published')->default(false)->index();
            $table->unsignedInteger('display_order')->default(0);
            $table->foreignId('updated_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();
        });
        Schema::create('developer_applications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->unique()->constrained()->cascadeOnDelete();
            $table->string('company_name',150);
            $table->string('city',100);
            $table->string('phone',30);
            $table->string('website',500)->nullable();
            $table->text('description');
            $table->string('status',20)->default('pending')->index();
            $table->text('review_notes')->nullable();
            $table->foreignId('reviewed_by')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('developer_id')->nullable()->constrained()->nullOnDelete();
            $table->timestamp('reviewed_at')->nullable();
            $table->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('developer_applications');
        Schema::dropIfExists('testimonials');
    }
};
