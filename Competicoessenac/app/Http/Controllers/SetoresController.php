<?php

namespace App\Http\Controllers;

use App\Models\Eventos;
use App\Models\Setores;
use Illuminate\Http\Request;

class SetoresController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $id_evento = $request->id_evento;

        $setores = Setores::where('eventos_id', $id_evento)->paginate(10);

        return view('setores-listar', compact('setores', 'id_evento'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        
        $validada = $request->validate([
            'name' => 'required',
            'quantidade_cadeiras' => 'required',
            'comprimento' => 'required',
            'largura' => 'required',
        ]);



        $result = Setores::create($validada);

        return redirect()->route('setores.index');


    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
    
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        
      
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
