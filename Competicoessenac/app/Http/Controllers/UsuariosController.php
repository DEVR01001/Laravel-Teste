<?php

namespace App\Http\Controllers;

use App\Models\Perfil;
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

        Perfil::create([
            'type' => $validada['type'],
            'usuarios_id' => $usuario->id,
        ]);

        
   
        return redirect()->route('usuarios.index');

    
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
    public function update(Request $request, Usuarios $usuario, Perfil $perfil)
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

        
        return redirect()->route('usuarios.index');

        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
