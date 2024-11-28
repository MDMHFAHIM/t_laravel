<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class package_booking extends Model
{
    use HasFactory;
     protected $fillable=['customer_id','package_id', 'person', 'number_of_guest_adult','number_of_guest_child','check_in_date','check_out_date','fare'];

    public function customer()
    {
        return $this->belongsTo(customer::class);
    }
    public function package()
    {
        return $this->belongsTo(package::class);
    }

}
