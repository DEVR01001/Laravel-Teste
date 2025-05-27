<?php

namespace App\Http\Controllers;

use App\Models\Chair;
use Illuminate\Http\Request;

class ChairController extends Controller
{
    


    public function index(int $id_setor){


        $chairs = Chair::all()->where('setores_id', '=', $id_setor);


        return $chairs;

    }
}
