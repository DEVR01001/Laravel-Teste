<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
  
    protected $fillable = [
        'sale_id',	
        'user_id',
        'chair_id',
        'status_ticket',

    ];

    public function sale()
    {
        return $this->belongsTo(Sale::class);
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }




    public function chair()
    {
        return $this->belongsTo(Chair::class);
    }


    public function qrcode()
    {
        return $this->hasOne(Qrcode::class);
    }






}
