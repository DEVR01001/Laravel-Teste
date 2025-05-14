<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Cadeiras extends Model
{
    

    protected $fillable =[
        'number_cadeira',
        'status',
        'nivel_cadeira',
        'setor_id'
    ];


  
}
