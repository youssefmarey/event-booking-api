<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Booking;

class Event extends Model
{
    protected $fillable = [
        'category_id',
        'title',
        'description',
        'start_time',
        'end_time',
        'location',
        'price',
        'available_seats',
        'image',
        'is_active',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
