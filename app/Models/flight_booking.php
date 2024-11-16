<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class flight_booking extends Model
{
    use HasFactory;
     protected $fillable=['customer_id', 'flight_id','flightprice_id', 'departure_zone', 'arrival_zone','number_of_seat','check_in_date','check_out_date','total_amount'];

    public function customer()
    {
        return $this->belongsTo(customer::class);
    }

    public function flight ()
    {
        return $this->belongsTo(flight::class);
    }

}
