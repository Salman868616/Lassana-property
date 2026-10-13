<?php

namespace App\Services;

use App\Models\CrmLead;
use App\Models\PropertyEnquiry;
use App\Models\User;
use Carbon\CarbonImmutable;

class SalesOverview
{
    public function build(User $user, string $role): array
    {
        app(DashboardAccess::class)->authorize($user,$role);
        abort_unless(in_array($role,['admin','sales','agent'],true),403);
        $base=CrmLead::query()->when($role==='agent',fn ($q)=>$q->where('assigned_to',$user->id));
        $day=CarbonImmutable::now('Asia/Colombo')->startOfDay();
        $start=$day->utc(); $end=$day->addDay()->utc();
        $open=(clone $base)->whereIn('status',LeadStages::OPEN);
        $enquiries=PropertyEnquiry::where('created_at','>=',$start)->where('created_at','<',$end)
            ->when($role==='agent',fn ($q)=>$q->whereHas('crmLead',fn ($q)=>$q->where('assigned_to',$user->id)));
        $total=(clone $base)->count();
        $converted=(clone $base)->where(fn ($q)=>$q->where('status','converted')->orWhere(fn ($q)=>$q->where('status','closed')->where('outcome','converted')))->count();
        $responseSum=0; $responseCount=0;
        foreach ((clone $base)->whereNotNull('created_at')->whereNotNull('first_contacted_at')->cursor() as $lead) {
            $seconds=$lead->first_contacted_at->getTimestamp()-$lead->created_at->getTimestamp();
            if ($seconds>=0) { $responseSum+=$seconds; $responseCount++; }
        }
        $employees=collect();
        if ($role!=='agent') {
            $employees=(clone $base)->select('assigned_to')->selectRaw('COUNT(*) as total')
                ->selectRaw("SUM(CASE WHEN status = 'converted' OR (status = 'closed' AND outcome = 'converted') THEN 1 ELSE 0 END) as converted")
                ->groupBy('assigned_to')->with('assignee:id,name')->get();
        }
        return [
            'date'=>$day->format('d M Y'),'newEnquiries'=>$enquiries->count(),
            'newRequests'=>\App\Models\PropertyRequest::where('created_at','>=',$start)->where('created_at','<',$end)
                ->when($role==='agent',fn ($q)=>$q->whereHas('crmLead',fn ($q)=>$q->where('assigned_to',$user->id)))->count(),
            'due'=>(clone $open)->whereNotNull('follow_up_at')->where('follow_up_at','<=',now())->count(),
            'today'=>(clone $open)->where('follow_up_at','>=',$start)->where('follow_up_at','<',$end)->count(),
            'hot'=>(clone $open)->whereIn('status',['interested','negotiation'])->count(),
            'unassigned'=>(clone $open)->whereNull('assigned_to')->count(),
            'total'=>$total,'converted'=>$converted,'conversionRate'=>$total ? round(100*$converted/$total,1) : null,
            'responseMinutes'=>$responseCount ? round($responseSum/$responseCount/60,1) : null,
            'responseCount'=>$responseCount,'employees'=>$employees,
            'stages'=>(clone $base)->select('status')->selectRaw('COUNT(*) as total')->groupBy('status')->pluck('total','status'),
        ];
    }
}
