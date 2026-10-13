<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\{MarketingCampaign,CampaignSpend};
use App\Services\{DashboardAccess,MarketingOverview};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
class MarketingController extends Controller {
    private function context(Request $r,string $title): array {return ['role'=>'admin','roles'=>app(DashboardAccess::class)->roles($r->user()),'title'=>$title];}
    public function index(Request $r,MarketingOverview $report) {
        return view('dashboard.marketing.index',$this->context($r,'Marketing reports')+['metrics'=>$report->build(),'campaigns'=>$report->campaigns()->latest('id')->paginate(15)]);
    }
    public function store(Request $r) {
        $data=$r->validate(['name'=>['required','string','max:150']]);
        $c=new MarketingCampaign($data);$c->code='lp-'.Str::lower(Str::random(16));$c->created_by=$r->user()->id;$c->save();
        return redirect()->route('admin.marketing.show',$c)->with('success','Campaign created.');
    }
    public function show(Request $r,MarketingCampaign $campaign,MarketingOverview $report) {
        $campaign=$report->campaigns()->findOrFail($campaign->id);
        return view('dashboard.marketing.show',$this->context($r,$campaign->name)+['campaign'=>$campaign,'spends'=>$campaign->spends()->with('recorder')->latest('id')->paginate(15)]);
    }
    public function update(Request $r,MarketingCampaign $campaign) {
        $data=$r->validate(['is_active'=>['required','boolean']]);$campaign->is_active=$data['is_active'];$campaign->save();
        return back()->with('success','Campaign updated.');
    }
    public function spend(Request $r,MarketingCampaign $campaign) {
        $data=$r->validate(['reference'=>['required','string','max:100',Rule::unique('campaign_spends')->where('campaign_id',$campaign->id)],
            'spent_on'=>['required','date_format:Y-m-d','before_or_equal:'.now('Asia/Colombo')->toDateString()],
            'amount'=>['required','numeric','decimal:0,2','min:0','max:999999999.99']]);
        DB::transaction(function()use($campaign,$r,$data){
            MarketingCampaign::whereKey($campaign->id)->lockForUpdate()->firstOrFail();
            if ($campaign->spends()->where('reference',$data['reference'])->exists()) throw \Illuminate\Validation\ValidationException::withMessages(['reference'=>'This reference has already been recorded.']);
            $entry=$campaign->spends()->make($data);$entry->recorded_by=$r->user()->id;$entry->save();
        });
        return back()->with('success','Campaign spending recorded.');
    }
    public function void(Request $r,MarketingCampaign $campaign,int $spend) {
        $data=$r->validate(['void_reason'=>['required','string','max:500']]);
        DB::transaction(function()use($campaign,$spend,$r,$data){
            $entry=$campaign->spends()->lockForUpdate()->findOrFail($spend);abort_if($entry->voided_at,409);
            $entry->voided_at=now();$entry->voided_by=$r->user()->id;$entry->void_reason=$data['void_reason'];$entry->save();
        });
        return back()->with('success','Spending entry voided.');
    }
}
