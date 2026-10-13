<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class AgentApplication extends Model
{
    protected $guarded = ['id','status','reviewed_by','reviewed_at','review_notes'];
    protected function casts(): array { return ['reviewed_at'=>'datetime']; }
    public function user() { return $this->belongsTo(User::class); }
    public function reviewer() { return $this->belongsTo(User::class,'reviewed_by'); }
}
