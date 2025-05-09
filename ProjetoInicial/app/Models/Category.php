<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Category extends Model
{
    

    protected $fillable = [
        'nome',
    ];

    protected $table = 'category';

    protected $primaryKey = 'id_category';



    public function books(): BelongsToMany{

        return $this->belongsToMany(Book::class)->using(BookCategory::class);

    }




    
}
