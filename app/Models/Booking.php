<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Booking extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'destination_id',
        'experience_id',
        'booking_date',
        'guests',
        'total_price',
        'status',
    ];

    protected $casts = [
        'booking_date' => 'datetime',
    ];

    //Relationship to Users

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relationship to destination

    public function destination()
    {
        return $this->belongsTo(Destination::class);
    }

    // Relationship to Experience

    public function experience()
    {
        return $this->belongsTo(Experience::class);
    }

    
}
