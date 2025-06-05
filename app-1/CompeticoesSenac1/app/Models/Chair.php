<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chair extends Model
{
    
    protected $fillable = [
        'number_chair',	
        'status_chair',
        'level_chair',
        'sector_id',
    ];


    public function sector()
    {
        return $this->belongsTo(Sector::class);
    }

  
    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }

    
}
