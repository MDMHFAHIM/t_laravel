<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class flight extends Model
{
    use HasFactory;
     protected $fillable=['airline_id', 'image','class','flightprice_id', 'zone_id','departure_time','arrival_time','transit_time','is_complementary_food','baggage_allowance'];

    public function airline()
    {
        return $this->belongsTo(airline::class);
    }

    public function flightprice()
    {
        return $this->belongsTo(flightprice::class);
    }

    public function zone()
    {
        return $this->belongsTo(zone::class);
    }

}
