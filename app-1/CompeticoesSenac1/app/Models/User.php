<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'profile',
        'cpf',
    ];

    public function sales()
    {
        return $this->hasMany(Sale::class);
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}
