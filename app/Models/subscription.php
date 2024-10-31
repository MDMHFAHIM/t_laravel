<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;
    protected $fillable=['name', 'email', 'zone_id', 'address', 'contact', 'alt_contact'];

    public function zone()
    {
        return $this->belongsTo(zone::class);
    }

}
