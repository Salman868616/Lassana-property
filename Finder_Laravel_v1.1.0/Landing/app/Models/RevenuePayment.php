<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class RevenuePayment extends Model {
    public const TYPES = ['listing'=>'Listing fee', 'verification'=>'Verification fee'];
    public const METHODS = ['cash'=>'Cash', 'bank_transfer'=>'Bank transfer', 'card'=>'Card', 'other'=>'Other'];
    protected $guarded = ['id'];
    protected function casts(): array { return ['amount'=>'decimal:2','paid_on'=>'date','voided_at'=>'datetime']; }
    public function recorder() { return $this->belongsTo(User::class, 'recorded_by'); }
    public function voider() { return $this->belongsTo(User::class, 'voided_by'); }
}
