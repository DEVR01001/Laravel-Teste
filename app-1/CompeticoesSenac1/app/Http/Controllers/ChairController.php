<?php

namespace App\Http\Controllers;

use App\Models\Chair;
use App\Models\Sector;
use Illuminate\Http\Request;

class ChairController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('adm.listar_cadeiras');
    }

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

        $validado = $request->validate([

            'number_chair' => 'required',
            'status_chair' => 'required',
            'level_chair' => 'required',
            'sector_id' => 'required',

        ]);

       
        Chair::create($validado);

        return redirect()->route('chair.show', $request->sector_id);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $chairs = Chair::where('sector_id', '=', $id)->get();

        $sector = Sector::find($id);

        return view('adm.listar_cadeiras', compact('chairs', 'sector'));
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
        $validado = $request->validate([

            'number_chair' => 'required',
            'status_chair' => 'required',
            'level_chair' => 'required',
            'sector_id' => 'required',

        ]);

        $chair = Chair::find($id);

        $chair->update($validado);

        return redirect()->route('chair.show', $request->sector_id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $chair = Chair::find($id);

        $chair->delete();

        return redirect()->route('chair.show', $chair->sector_id);
    }
}
