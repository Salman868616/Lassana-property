<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class ComplaintUpdate extends Model {
    protected $guarded = ['id'];
    public function reviewer() { return $this->belongsTo(User::class,'reviewer_id'); }
}
