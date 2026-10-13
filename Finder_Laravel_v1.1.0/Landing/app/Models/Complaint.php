<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Complaint extends Model {
    protected $guarded = ['id','user_id','status'];
    public const STATUSES = ['open'=>'Open','in_progress'=>'In progress','resolved'=>'Resolved'];
    public function user() { return $this->belongsTo(User::class); }
    public function updates() { return $this->hasMany(ComplaintUpdate::class); }
}
