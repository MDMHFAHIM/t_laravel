<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;
    protected $fillable=['image','customer_id', 'email','address', 'contact', 'alt_contact'];

    public function customer()
    {
        return $this->belongsTo(customer::class);
    }

}
