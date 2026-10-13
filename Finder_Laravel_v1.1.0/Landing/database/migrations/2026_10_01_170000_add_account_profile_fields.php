<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
    public function up(): void
    {
        Schema::table('users',function(Blueprint $table){
            $table->string('phone',30)->nullable();
            $table->string('city',100)->nullable();
            $table->text('bio')->nullable();
            $table->string('agency_name',150)->nullable();
            $table->string('service_areas',500)->nullable();
        });
    }
    public function down(): void
    {
        Schema::table('users',fn(Blueprint $table)=>$table->dropColumn(['phone','city','bio','agency_name','service_areas']));
    }
};
