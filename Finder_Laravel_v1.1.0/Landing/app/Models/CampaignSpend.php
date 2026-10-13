<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class CampaignSpend extends Model {
    protected $fillable=['reference','spent_on','amount'];
    protected function casts(): array {return ['amount'=>'decimal:2','spent_on'=>'date','voided_at'=>'datetime'];}
    public function recorder(){return $this->belongsTo(User::class,'recorded_by');}
}
