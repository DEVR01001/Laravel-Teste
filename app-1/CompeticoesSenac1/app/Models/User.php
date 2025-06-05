<?php

namespace App\Models;

use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
 

    protected $fillable = [
        'first_name' ,
        'last_name' ,
        'email' ,
        'password' ,
        'password' ,
        'profile' ,
        'cpf' ,
    ];

    public function sales()
    {
        return $this->hasMany(Sale::class);
    }


    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }


    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }



    

    
}
