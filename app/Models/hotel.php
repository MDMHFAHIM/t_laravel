<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hotel extends Model
{
    use HasFactory;
     protected $fillable=['zone_id','catagory_id','roomtype_id','image','hotel_name','rating','is_complementary_breakfast','latitude','longitude','hotel_details','facilities','checkin','checkout'];

    public function zone()
    {
        return $this->belongsTo(zone::class);
    }
    public function catagory()
    {
        return $this->belongsTo(catagory::class);
    }
    public function roomtype()
    {
        return $this->belongsTo(roomtype::class);
    }

}
