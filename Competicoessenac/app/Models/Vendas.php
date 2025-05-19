<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vendas extends Model
{
    


    protected $fillable  = [
        'usuario_id',
        'status_venda',
        'data_hora',
    ];
}
