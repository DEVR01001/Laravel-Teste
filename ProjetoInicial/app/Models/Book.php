<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Book extends Model
{
    
    protected $fillable = [
        'title',
        'description',
        'author',
    ];


    protected $primaryKey = 'id';


    // public function author(): BelongsTo
    // {
    //     return $this->belongsTo(Author::class);
    // }

    public function category(): BelongsToMany{

        return $this->belongsToMany(Category::class, 'books_category', 'id', 'id_category');
        // return $this->belongsToMany(Category::class, 'books_category', 'id', 'id_category')->using(BookCategory::class);
    }



    public function author(): HasOne{

        return $this->hasOne(Author::class, 'id_author');
    }



}
