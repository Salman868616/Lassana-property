<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('crm_leads',function (Blueprint $table) {
            $table->string('source',40)->default('unknown')->index();
            $table->timestamp('first_contacted_at')->nullable();
            // Snapshot used only for restoring old rows if this migration is rolled back.
            $table->string('legacy_status',40)->nullable();
            $table->string('legacy_outcome',100)->nullable();
        });
        DB::table('crm_leads')->orderBy('id')->chunkById(100,function ($leads) {
            foreach ($leads as $lead) {
                $values=['legacy_status'=>$lead->status,'legacy_outcome'=>$lead->outcome];
                if ($lead->enquiry_id) $values['source']='website';
                if ($lead->status === 'viewing') $values['status']='viewing_scheduled';
                if ($lead->status === 'won') { $values['status']='converted'; $values['outcome']='converted'; }
                if ($lead->status === 'lost') { $values['status']='closed'; $values['outcome']='not_proceeding'; }
                $contact=DB::table('crm_lead_activities')->where('lead_id',$lead->id)
                    ->whereIn('activity_type',['call','email','meeting'])->min('activity_at');
                if ($contact) $values['first_contacted_at']=$contact;
                DB::table('crm_leads')->where('id',$lead->id)->update($values);
                if (isset($values['status'])) {
                    DB::table('crm_lead_activities')->insert(['lead_id'=>$lead->id,'activity_type'=>'stage_migration',
                        'status'=>$values['status'],'activity_at'=>now(),'notes'=>'Guideline alignment: '.$lead->status.' → '.$values['status'].'. Previous outcome: '.($lead->outcome ?? 'none'),
                        'created_at'=>now(),'updated_at'=>now()]);
                }
            }
        });
    }

    public function down(): void
    {
        // Preserve changes made after migration; restore untouched legacy mappings only.
        foreach (['viewing'=>'viewing_scheduled','won'=>'converted','lost'=>'closed'] as $old=>$new) {
            DB::table('crm_leads')->where('legacy_status',$old)->where('status',$new)
                ->update(['status'=>$old,'outcome'=>DB::raw('legacy_outcome')]);
        }
        Schema::table('crm_leads',fn (Blueprint $table) => $table->dropIndex('crm_leads_source_index'));
        Schema::table('crm_leads',fn (Blueprint $table) => $table->dropColumn(['source','first_contacted_at','legacy_status','legacy_outcome']));
    }
};
