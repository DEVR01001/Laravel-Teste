<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Qrcode extends Model
{
    

    protected $table = 'qrcode';

    protected $fillable = [
        'ingresso_id',
        'qrcode'
    ];
}
