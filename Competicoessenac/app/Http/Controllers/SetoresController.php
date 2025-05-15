<?php

namespace App\Http\Controllers;

use App\Models\Eventos;
use App\Models\Setores;
use Illuminate\Http\Request;
use Ramsey\Uuid\Type\Integer;

class SetoresController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $id_evento = $request->id_evento;

        $setores = Setores::where('eventos_id', $id_evento)->paginate(10);

        $name_evento = $request->name;
        
        return view('setores-listar', compact('setores', 'id_evento', 'name_evento'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        
        $validada = $request->validate([
            'name' => 'required',
            'quantidade_cadeiras' => 'required',
            'quantidade_fileras' => 'required',
            'nivel_setor' => 'required',
            'status_setor' => 'required',
            'eventos_id' => 'required',
        ]);



        $result = Setores::create($validada);

        $id_setor = $result->id;

        return redirect()->route('cadeiras.create', compact('id_setor', 'validada') );

        // return redirect()->route('setores.index', ['id_evento' => $validada['eventos_id']]);


    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $id_evento = $id;
        return view('setores-cadastrar', compact('id_evento'));
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($setor)
    {
        $setor = Setores::find($setor);


  
        return view('setores-edit', compact('setor'));

      
    }

    /**
     * Update the specified resource in storage.
     */


    public function update(Request $request, $setor)
    {
        $setor = Setores::find($setor);
      
        $validada = $request->validate([
            'name' => 'required',
            'quantidade_cadeiras' => 'required',
            'quantidade_fileras' => 'required',
            'nivel_setor' => 'required',
            'status_setor' => 'required',
        ]);


        $setor->update($validada);
        $id_evento = $setor->eventos_id;

        return redirect()->route('setores.index', compact('id_evento'));


    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $setor)
    {
        $setor = Setores::find($setor);
        
        $setor->delete();

        $id_evento = $setor->eventos_id;
        
        return redirect()->route('setores.index', compact('id_evento'));

        


    }


 

}
