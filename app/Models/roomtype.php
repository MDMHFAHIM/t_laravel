<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class roomtype extends Model
{
    use HasFactory;
    protected $fillable=['hotel_id', 'qty', 'bedtype', 'facilities', 'is_ac', 'is_tv', 'roomfare', 'number_of_guest'
];

   public function hotel()
    {
        return $this->belongsTo(hotel::class);
    }
}
