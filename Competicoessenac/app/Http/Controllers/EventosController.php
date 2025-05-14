<?php

namespace App\Http\Controllers;

use App\Models\Eventos;
use Illuminate\Http\Request;

class EventosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $eventos = Eventos::with(['setor'])->paginate(10);

        return view('eventos-listar', compact('eventos'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {

        // dd($request,   $request->name);

    

        $validada = $request->validate([
            'name' => 'required',
            'capacidade_pessoas' => 'required',
            'cep' => 'required',
            'bairro' => 'required',
            'rua' => 'required',
            'cep' => 'required',
            'numero' => 'required',
            'logo' => 'required',
        ]);

    


        $result = Eventos::create($validada);
        

        return redirect()->route('eventos.index');

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
    public function edit(Eventos $evento)
    {

        
        return view('eventos-edit', compact('evento'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Eventos $evento)
    {
        

        $validada = $request->validate([
            'name' => 'required',
            'capacidade_pessoas' => 'required',
            'cep' => 'required',
            'bairro' => 'required',
            'rua' => 'required',
            'cep' => 'required',
            'numero' => 'required',
            'logo' => 'required',
        ]);


        $evento->update($validada);



        return redirect()->route('eventos.index');

    

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Eventos $evento)
    {

        $evento->delete();

        return redirect()->route('eventos.index');

    }



}
