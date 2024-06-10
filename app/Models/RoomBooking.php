<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomBooking extends Model
{
    protected $primaryKey = 'room_booking_id';
    use HasFactory;
    protected $fillable = [
        'user_room_booking_id',
        'room_id',
        'user_id',
        'booking_user_name',
        'booking_user_phone',
        'from_date',
        'to_date',
        'created_user_id',
        'status',
        'deposit_type',
        'deposit_amount',
        'payment_type',
        'reciver_account',
    ];
    public function room()
    {
        return $this->belongsTo(Room::class, 'room_id')->with('room_type');
    }
}
