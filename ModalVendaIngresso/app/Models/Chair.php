<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chair extends Model
{
    protected $table = 'cadeiras';

    protected $fillable = [
        'status'
    ];

}
