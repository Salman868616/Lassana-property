<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('property_status_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('property_id')->constrained()->cascadeOnDelete();
            $table->string('from_status', 30)->nullable();
            $table->string('to_status', 30);
            $table->foreignId('actor_id')->nullable()->constrained('users')->nullOnDelete();
            $table->string('actor_name')->nullable();
            $table->string('event', 30)->default('transition');
            $table->text('remarks')->nullable();
            $table->timestamp('created_at');
            $table->index(['property_id', 'id']);
        });
        // Record only the known current state, never invented past transitions.
        $recordedAt = now();
        DB::table('properties')->select('id', 'status')->orderBy('id')->chunkById(500, function ($properties) use ($recordedAt) {
            DB::table('property_status_histories')->insert($properties->map(fn ($p) => [
                'property_id'=>$p->id, 'from_status'=>null, 'to_status'=>$p->status,
                'actor_id'=>null, 'actor_name'=>null, 'event'=>'baseline',
                'remarks'=>'Status when tracking was enabled. Earlier transitions are unavailable.',
                'created_at'=>$recordedAt,
            ])->all());
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('property_status_histories');
    }
};
