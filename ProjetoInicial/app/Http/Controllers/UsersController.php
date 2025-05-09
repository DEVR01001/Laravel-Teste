<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    
    public function Visualizar()
    {

        $usuarios = User::all();

        // return view('usuarios', ['usuarios' => $usuarios]);

        // return view('usuarios', compact('usuarios'));

        return view('usuarios')->with('usuarios', $usuarios);


        
    }

    public function Cadastrar(Request $request){

        $validada = $request->validate([
            'password' => 'required|max:20|alpha_num',
            'email' => 'required|email',
            'name' => 'nullable'
        ]);


        $result = User::create($validada);
        

        return redirect('/usuarios');
   

    }


    public function Atualizar(User $usuario){

        // $usuario = User::where('id', $id)->firstOrFail();

        return view('usuarios-edit', compact('usuario'));


    }

    public function Store(Request $request, $id){

        $validada = $request->validate([
            'password' => 'required|max:20|alpha_num',
            'email' => 'required|email',
            'name' => 'required'
        ]);

        // $usuario->name = 'Braiani';
        // $usuario->email = 'Braiani@gmail.com';

        // $usuario->update([
        //     'name' => 'Braiani3',
        // ]);




        $usuario = User::where('id', $id)->first();

        $usuario->update($validada);

        return redirect()->route('Usuario.Index');

    }


    public function Delete(User $usuario){

        $usuario->delete();

        return redirect()->route('Usuario.Index');

        



    }


}
