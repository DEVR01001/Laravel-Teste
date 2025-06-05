<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
     
    protected $fillable = [
        'name',
        'quantity_chairs',
        'quantity_rows',
        'status',  
        'level', 
        'event_id', 
    ];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function chairs()
    {
        return $this->hasMany(Chair::class);
    }


}
