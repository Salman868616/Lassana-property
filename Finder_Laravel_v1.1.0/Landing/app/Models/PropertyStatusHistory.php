<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PropertyStatusHistory extends Model
{
    public $timestamps = false;
    protected $fillable = ['property_id', 'from_status', 'to_status', 'actor_id', 'actor_name', 'event', 'remarks', 'created_at'];

    protected function casts(): array
    {
        return ['created_at'=>'datetime'];
    }

    // Called only within the transaction that saves the property change.
    public static function record(Property $property, ?string $from, User $actor, ?string $remarks = null): void
    {
        static::create([
            'property_id'=>$property->id, 'from_status'=>$from, 'to_status'=>$property->status,
            'actor_id'=>$actor->id, 'actor_name'=>$actor->name,
            'event'=>$from === null ? 'created' : 'transition',
            'remarks'=>$remarks, 'created_at'=>now(),
        ]);
    }
}
