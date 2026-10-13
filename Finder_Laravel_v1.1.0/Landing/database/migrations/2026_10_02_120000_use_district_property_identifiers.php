<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('property_code_aliases', function (Blueprint $table) {
            $table->id();
            $table->foreignId('property_id')->constrained('properties')->cascadeOnDelete();
            $table->string('code', 40)->unique();
        });

        DB::transaction(function () {
            // Query builder includes soft-deleted properties and avoids model events.
            DB::table('properties')->orderBy('id')->chunkById(200, function ($properties) {
                foreach ($properties as $property) {
                    $letters = preg_replace('/[^A-Z]/', '', strtoupper(trim($property->district ?? '')));
                    $prefix = $letters === '' ? 'UND' : substr($letters, 0, 3);
                    $code = 'LP-'.$prefix.'-'.str_pad((string) $property->id, 5, '0', STR_PAD_LEFT);
                    if ($property->property_code === $code) continue;
                    DB::table('property_code_aliases')->insert(['property_id'=>$property->id, 'code'=>$property->property_code]);
                    DB::table('properties')->where('id', $property->id)->update(['property_code'=>$code]);
                }
            });
        });
    }

    public function down(): void
    {
        DB::transaction(function () {
            // Restore the earliest saved code for each property when rolling back.
            $aliases = DB::table('property_code_aliases')->select('property_id')->selectRaw('MIN(id) AS first_id')->groupBy('property_id')->get();
            foreach ($aliases as $alias) {
                $code = DB::table('property_code_aliases')->where('id', $alias->first_id)->value('code');
                DB::table('properties')->where('id', $alias->property_id)->update(['property_code'=>$code]);
            }
        });
        Schema::dropIfExists('property_code_aliases');
    }
};
