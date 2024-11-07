<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelBooking extends Model
{
    use HasFactory;
     protected $fillable=['customer_id','hotel_id','roomtype_id','number_of_room','number_of_guest_adult','number_of_guest_child','check_in_date','check_out_date','total_amount'];

    public function customer()
    {
        return $this->belongsTo(customer::class);
    }
    public function hotel()
    {
        return $this->belongsTo(hotel::class);
    }
    public function roomtype()
    {
        return $this->belongsTo(roomtype::class);
    }

}
