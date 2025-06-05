<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{

    protected $fillable = [
        'name',	
        'date_event',
        'time_event',
        'cep',
        'neighborhood',
        'city',
        'number',
        'street',
        'capacidade_pessoas',
        'logo',
    ];

    public function sectors()
    {
        return $this->hasMany(Sector::class);
    }

}
