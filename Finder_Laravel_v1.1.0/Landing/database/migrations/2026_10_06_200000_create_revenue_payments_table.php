<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
    public function up(): void {
        Schema::create('revenue_payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('property_id')->nullable()->constrained()->nullOnDelete();
            $table->string('property_reference');
            $table->string('type', 30);
            $table->decimal('amount', 14, 2);
            $table->string('currency', 3)->default('LKR');
            $table->date('paid_on')->index();
            $table->string('reference', 100)->unique();
            $table->string('method', 30);
            $table->text('notes')->nullable();
            $table->foreignId('recorded_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamp('voided_at')->nullable();
            $table->foreignId('voided_by')->nullable()->constrained('users')->nullOnDelete();
            $table->text('void_reason')->nullable();
            $table->timestamps();
            $table->index(['type', 'voided_at']);
        });
    }
    public function down(): void { Schema::dropIfExists('revenue_payments'); }
};
