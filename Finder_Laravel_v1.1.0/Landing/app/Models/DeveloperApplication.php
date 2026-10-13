<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class DeveloperApplication extends Model {
    protected $fillable = ['company_name','city','phone','website','description'];
    protected function casts(): array { return ['reviewed_at'=>'datetime']; }
    public function user() { return $this->belongsTo(User::class); }
    public function developer() { return $this->belongsTo(Developer::class); }
    public function reviewer() { return $this->belongsTo(User::class,'reviewed_by'); }
}
