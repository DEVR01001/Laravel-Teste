<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Usuarios extends Model
{



    protected $fillable = [
        'name',
        'lastname',
        'email',
        'senha',
        'CPF',
    ];
    

    
    public function perfil(): HasOne{

        return $this->hasOne(Perfils::class);
    }

 
}
