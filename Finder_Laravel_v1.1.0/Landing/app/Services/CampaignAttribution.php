<?php
namespace App\Services;
use App\Models\{CrmLead,MarketingCampaign};
use Illuminate\Http\Request;
class CampaignAttribution {
    public function attach(CrmLead $lead, Request $request): void {
        if (!config('marketing.enabled') || $lead->marketing_campaign_id || $request->user()?->roles()->whereIn('name',['admin','sales','verification','seller','agent'])->exists()) return;
        $touch=$request->session()->get('marketing_touch');
        if (!is_array($touch) || !isset($touch['id'],$touch['at']) || !is_numeric($touch['at'])
            || $touch['at']<now()->subDays(30)->timestamp || $touch['at']>now()->timestamp) return;
        if (MarketingCampaign::whereKey($touch['id'])->exists()) {
            $lead->marketing_campaign_id=$touch['id']; $lead->save();
        }
    }
}
