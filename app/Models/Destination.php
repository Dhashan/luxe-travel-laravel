<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Destination extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'base_price',
        'image_url',
    ];

    // A destination has many experiences

    public function experiences()
    {
        return $this->hasMany(Experience::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
