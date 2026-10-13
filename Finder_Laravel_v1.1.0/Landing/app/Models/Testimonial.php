<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Testimonial extends Model {
    protected $fillable = ['customer_name','context','quote','consent_confirmed','consent_notes','is_published','display_order'];
    protected function casts(): array { return ['consent_confirmed'=>'boolean','is_published'=>'boolean']; }
    public function scopePublished($query) { return $query->where('is_published',true)->where('consent_confirmed',true); }
}
