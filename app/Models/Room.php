<?php

namespace App\Models;

use Carbon\Carbon;
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
        'room_type_id',
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
    public function amenity()
    {
        return $this->belongsTo(Amenity::class, 'amenity_id');
    }
    public function room_type()
    {
        return $this->belongsTo(RoomType::class, 'room_type_id');
    }
    public static function availableRoom()
    {
        $from_date = Carbon::now()->format('Y-m-d');
        $to_date = Carbon::now()->addDay()->format('Y-m-d');
        $data = [];
        $rooms = RoomType::with('rooms')
            ->get();

        $booked_rooms = RoomBooking::with('room')
            ->where(function ($query) use ($from_date, $to_date) {
                $query->whereBetween('from_date', [$from_date, $to_date])
                    ->orWhere(function ($query) use ($from_date, $to_date) {
                        $query->where('from_date', '=', $from_date)
                            ->where('to_date', '!=', $to_date);
                    });
            })
            ->where('from_date', '!=', $to_date)
            ->where('status', 'approved')
            ->get()->groupBy('room_id');

        $room_data_array = [];
        foreach ($rooms as $room) {
            foreach ($room['rooms'] as $converted_room_data) {
                $room_data_array[] = $converted_room_data;
            }
        }

        foreach ($booked_rooms as $room_id => $booked_room) {
            foreach ($room_data_array as $key => $room_data) {
                if ($room_data->room_id == $room_id) {
                    unset($room_data_array[$key]);
                }
            }
        }
        $room_data = [];
        $room_data['rooms'] = array_values($room_data_array);
        $room_data['type']['from_date'] = $from_date;
        $room_data['type']['to_date'] = $to_date;
        return $room_data;
    }
}
