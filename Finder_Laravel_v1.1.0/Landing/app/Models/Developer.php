<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Developer extends Model {
    protected $fillable = ['name','description','city','phone','email','website','is_published'];
    protected function casts(): array { return ['is_published'=>'boolean']; }
    public function properties(): \Illuminate\Database\Eloquent\Relations\HasMany { return $this->hasMany(Property::class); }
}
