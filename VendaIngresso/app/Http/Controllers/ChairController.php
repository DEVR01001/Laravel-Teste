<?php

namespace App\Http\Controllers;

use App\Models\Chair;
use Illuminate\Http\Request;

class ChairController extends Controller
{
    
    public function index(int $id_setor){
        
    $cadeiras = Chair::all()->where('setores_id', '=', $id_setor);

    return $cadeiras;

    }



}
