<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomType extends Model
{
    protected $primaryKey = 'room_type_id';
    use HasFactory;
    protected $fillable = [
        'room_type',
        'room_type_price',
        'room_type_score',
    ];
    public function rooms()
    {
        return $this->hasMany(Room::class, 'room_id');
    }
}
