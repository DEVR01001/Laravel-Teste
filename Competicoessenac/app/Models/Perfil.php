<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Perfil extends Model
{

    protected $fillable = [
        'type',
        'usuarios_id',
    ];


}
