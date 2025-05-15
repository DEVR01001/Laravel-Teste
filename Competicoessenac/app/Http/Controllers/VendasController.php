<?php

namespace App\Http\Controllers;

use App\Models\Cadeiras;
use App\Models\Eventos;
use App\Models\Setores;
use Illuminate\Http\Request;
use Ramsey\Uuid\Type\Integer;

class VendasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($eventoId)
    {
        $eventoId = 1;
        
        $evento = Eventos::with('setores.cadeiras')->find($eventoId);
        return view('vendas-listar', compact('evento'));


    }

    public function ingresso( $eventoId)
    {


        $evento = Eventos::with('setores.cadeiras')->find($eventoId);
        return view('vendas-listar', compact('evento'));


    }

    
    // }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function edit(string $id)
    {
        //
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
