<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ingressos extends Model
{
    

    protected $fillable = [
        'qcode',
        'cadeira_id',
        'usuario_id',
        'venda_id',
        'status_ingresso',

    ];

    /**
 * Get the message content definition.
 */


}
