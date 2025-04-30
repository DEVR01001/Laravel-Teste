<?php

namespace App\Models;

use App\ENUMS\SuporteStatus;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suporte extends Model
{
    use HasFactory;


    protected $fillable = [
        'subject',
        'body',
        'status'
    ];


    // protected $casts = [
    //     'status' => SuporteStatus::class,
    // ];


    public function status(): Attribute{
        return Attribute::make(
            set: fn (SuporteStatus $status) => $status->name,
        );
    }
}
