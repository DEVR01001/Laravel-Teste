<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Eventos extends Model
{
    



    protected $fillable = [
        'name',
        'capacidade_pessoas',
        'cep',
        'bairro',
        'rua',
        'numero',
        'logo',
    ];



    public function setor(): HasOne{


        return $this->hasOne(Setores::class);
        
    }
}
