<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class flightprice extends Model
{
    use HasFactory;

    protected $fillable=['flight_id','class', 'trip_type','airfare',];

    public function flight ()
    {
        return $this->belongsTo(flight::class);
    }
}
