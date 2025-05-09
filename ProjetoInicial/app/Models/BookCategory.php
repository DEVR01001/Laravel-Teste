<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;



class BookCategory extends Pivot
{
    

    protected $primaryKey = 'id_cat_books';

    protected $table = 'books_category';


}
