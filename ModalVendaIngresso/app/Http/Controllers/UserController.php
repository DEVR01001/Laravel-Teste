<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{


    public function index(){

        return view('cadastro_user');
    }
    
    public function create(Request $request){

        $validado = $request->validate([
            'name' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'senha' => 'required',
            'CPF' => 'required',
        ]);


        User::create($validado);

        return redirect()->route('cart.index');

    }

}
