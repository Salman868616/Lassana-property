<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
    public function up(): void {
        Schema::create('marketing_campaigns',function(Blueprint $t){
            $t->id(); $t->string('name',150); $t->string('code',60)->unique();
            $t->boolean('is_active')->default(true); $t->foreignId('created_by')->constrained('users')->restrictOnDelete(); $t->timestamps();
        });
        Schema::create('campaign_spends',function(Blueprint $t){
            $t->id(); $t->foreignId('campaign_id')->constrained('marketing_campaigns')->restrictOnDelete();
            $t->string('reference',100); $t->date('spent_on'); $t->decimal('amount',14,2);
            $t->foreignId('recorded_by')->constrained('users')->restrictOnDelete();
            $t->dateTime('voided_at')->nullable(); $t->foreignId('voided_by')->nullable()->constrained('users')->restrictOnDelete();
            $t->string('void_reason',500)->nullable(); $t->timestamps(); $t->unique(['campaign_id','reference']);
        });
        Schema::table('crm_leads',function(Blueprint $t){$t->foreignId('marketing_campaign_id')->nullable()->constrained('marketing_campaigns')->restrictOnDelete();});
        Schema::create('website_visitors',function(Blueprint $t){
            $t->id(); $t->date('visited_on'); $t->string('visitor_hash',64); $t->unsignedInteger('page_views')->default(0);
            $t->unique(['visited_on','visitor_hash']);
        });
    }
    public function down(): void {
        Schema::dropIfExists('website_visitors');
        Schema::table('crm_leads',fn(Blueprint $t)=>$t->dropConstrainedForeignId('marketing_campaign_id'));
        Schema::dropIfExists('campaign_spends'); Schema::dropIfExists('marketing_campaigns');
    }
};
