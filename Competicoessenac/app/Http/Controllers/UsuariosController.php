<?php

namespace App\Http\Controllers;

use App\Models\Perfil;
use App\Models\Perfils;
use App\Models\Usuarios;
use Faker\Provider\ar_EG\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $usuarios = Usuarios::with(['perfil'])->paginate(10);

        return view('usuarios_listar', compact('usuarios'));
        
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {

        $validada = $request->validate([
            'name' =>'required',
            'lastname' => 'required',
            'email' =>'required',
            'senha' => 'required',
            'CPF' => 'required',
            'type' => 'required',
            
        ]);


    
        $usuario = Usuarios::create($validada);
        $id = $usuario->id;

   
        return redirect()->route('perfils.create')->with('data', [
            $validada['type'],
            $id
        ]);
        
    
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Usuarios $usuario)
    {
        
        return view('usuario-edit', compact('usuario'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Usuarios $usuario, Perfils $perfil)
    {


        $validada = $request->validate([
            'name' =>'required',
            'lastname' => 'required',
            'email' =>'required',
            'senha' => 'required',
            'CPF' => 'required',
            'type' => 'required',
        ]);

        $usuario->update($validada);


        $teste = Usuarios::find($usuario->id);
        $perfil = Perfils::find($usuario->id);



        $perfil->update([
            'type' => $validada['type']
        ]);


        return redirect()->route('usuarios.index');
        
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Usuarios $usuario)
    {   
        $usuario->delete();

        return redirect()->route('usuarios.index');
        
    }
}
