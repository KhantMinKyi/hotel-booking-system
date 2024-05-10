<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $primaryKey = 'room_id';
    use HasFactory;
    protected $fillable = [
        'room_number',
        'room_size',
        'amenity_id',
        'location',
        'accessibility',
        'bed_type',
        'bathroom_type',
        'can_extra_bad',
        'living_room_available',
        'kitchen_available',
        'corridor_available',
        'can_smoke',
        'is_smart_tv',
    ];
}
