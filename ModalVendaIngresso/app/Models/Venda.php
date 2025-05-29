<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
    

    protected $fillable = [
        'usuario_id',
        'status_venda',
    ];

    protected $table = 'vendas';
}
