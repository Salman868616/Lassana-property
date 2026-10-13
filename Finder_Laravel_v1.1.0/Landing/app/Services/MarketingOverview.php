<?php
namespace App\Services;
use App\Models\MarketingCampaign;
use Illuminate\Support\Facades\DB;
class MarketingOverview {
    public function campaigns() {
        return MarketingCampaign::query()->withCount('leads')
            ->withCount(['spends as spend_entries'=>fn($q)=>$q->whereNull('voided_at')])
            ->withSum(['spends as total_spend'=>fn($q)=>$q->whereNull('voided_at')],'amount');
    }
    public function build(): array {
        $today=now('Asia/Colombo')->toDateString(); $start=now('Asia/Colombo')->subDays(29)->toDateString();
        $visits=DB::table('website_visitors')->whereBetween('visited_on',[$start,$today]);
        $paid=$this->campaigns()->get()->filter(fn($c)=>$c->spend_entries>0);
        $spend=(float)$paid->sum('total_spend'); $leads=(int)$paid->sum('leads_count');
        return ['visitorsToday'=>DB::table('website_visitors')->where('visited_on',$today)->count(),
            'visitors30'=>(clone $visits)->distinct()->count('visitor_hash'),'pageViews30'=>(int)(clone $visits)->sum('page_views'),
            'spend'=>$spend,'paidLeads'=>$leads,'cpl'=>$leads>0 ? round($spend/$leads,2) : null,
            'hasSpend'=>$paid->isNotEmpty(),'tracking'=>config('marketing.enabled')];
    }
}
