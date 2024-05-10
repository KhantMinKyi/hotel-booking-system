<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Amenity extends Model
{
    protected $primaryKey = 'amenity_id';
    use HasFactory;
    protected $fillable = [
        'amenity_name',
        'amenity_description',
        'amenity_score',
    ];
    public function rooms()
    {
        return $this->hasMany(Room::class);
    }
}
