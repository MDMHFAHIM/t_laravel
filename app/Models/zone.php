<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zone extends Model
{
    use HasFactory;
    protected $fillable=['country_id', 'state_id', 'name'];

    public function country()
    {
        return $this->belongsTo(country::class);
    }

    public function state()
    {
        return $this->belongsTo(state::class);
    }


}
