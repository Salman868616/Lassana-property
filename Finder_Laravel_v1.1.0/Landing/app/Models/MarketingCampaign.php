<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class MarketingCampaign extends Model {
    protected $fillable=['name'];
    protected function casts(): array {return ['is_active'=>'boolean'];}
    public function leads(){return $this->hasMany(CrmLead::class,'marketing_campaign_id');}
    public function spends(){return $this->hasMany(CampaignSpend::class,'campaign_id');}
}
