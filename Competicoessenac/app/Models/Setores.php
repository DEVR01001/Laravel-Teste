<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
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

    

    public function cadeiras(): HasMany{

        return $this->hasMany(Cadeiras::class);

    }
    

    public function eventos(): BelongsToMany
    {
        return $this->belongsToMany(Eventos::class);
    }
    

    

    
}
