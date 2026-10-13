<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        // MySQL DDL can commit each statement separately; allow a safe retry after a partial migration.
        if (!Schema::hasColumn('users', 'verified_phone')) {
            Schema::table('users', fn (Blueprint $table) => $table->string('verified_phone', 20)->nullable());
        }
        if (!Schema::hasColumn('users', 'phone_verified_at')) {
            Schema::table('users', fn (Blueprint $table) => $table->dateTime('phone_verified_at')->nullable());
        }
        Schema::create('sms_verification_codes', function (Blueprint $table) {
            $table->foreignId('user_id')->primary()->constrained()->cascadeOnDelete();
            $table->string('phone', 20);
            $table->string('code_hash');
            $table->dateTime('expires_at');
            $table->unsignedTinyInteger('attempts')->default(0);
            $table->dateTime('sent_at');
            $table->dateTime('window_started_at');
            $table->unsignedSmallInteger('send_count');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sms_verification_codes');
        Schema::table('users', fn (Blueprint $table) => $table->dropColumn(['verified_phone', 'phone_verified_at']));
    }
};
