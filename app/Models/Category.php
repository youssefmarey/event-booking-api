<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Event;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'is_active',
    ];

    public function events()
    {
        return $this->hasMany(Event::class);
    }
}
