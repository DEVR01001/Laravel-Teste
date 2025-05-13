<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Setores extends Model
{


    public function cadeiras(): HasOne{

        return $this->hasOne(Cadeiras::class);

    }
    
    
}
