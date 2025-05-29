<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ingresso extends Model
{
    protected $fillable = [
        'cadeira_id',
        'usuario_id',
        'venda_id',
        'status_ingresso',
        'qcode',
    ];
}
