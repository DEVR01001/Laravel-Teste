<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Setores extends Model
{


    protected $fillable = [
        'name',
        'quantidade_cadeiras',
        'quantidade_fileras',
        'nivel_setor',
        'status_setor',
        'eventos_id'
    ];

    

    public function cadeiras(): HasOne{

        return $this->hasOne(Cadeiras::class);

    }
    
    
}
