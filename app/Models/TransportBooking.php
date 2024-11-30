<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransportBooking extends Model
{
   use HasFactory;
     protected $fillable=['customer_id','transport_id', 'person', 'check_in_date','check_out_date','total_amount'];

    public function customer()
    {
        return $this->belongsTo(customer::class);
    }
    public function transport()
    {
        return $this->belongsTo(transport::class);
    }

}
