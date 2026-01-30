<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Experience extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'destination_id',
        'name',
        'category',
        'description',
        'price',
        'image_url',
    ];

    // Get the destination that owns the experience

    public function destination()
    {
        return $this->belongsTo(Destination::class);
    }

    // An experience can be part of many bookings

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
