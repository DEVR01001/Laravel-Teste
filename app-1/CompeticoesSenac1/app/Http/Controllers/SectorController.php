<?php

namespace App\Http\Controllers;

use App\Models\Chair;
use App\Models\Event;
use App\Models\Sector;
use Illuminate\Http\Request;

class SectorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

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
        'name' => 'required',
        'quantity_chairs' => 'required|integer',
        'quantity_rows' => 'required|integer',
        'status' => 'required',
        'level' => 'required',
        'event_id' => 'required',
    ]);

    $sectorNew = Sector::create($validado);

    $totalCadeiras = $request->quantity_chairs * $request->quantity_rows;



    for ($i = 1; $i <= $totalCadeiras; $i++) {
        if($sectorNew->level == 'vip'){
            Chair::create([
                'number_chair' => $i,
                'status_chair' => 'available',
                'level_chair' => 'vip',
                'sector_id' => $sectorNew->id
            ]);

        }else{
             Chair::create([
            'number_chair' => $i,
            'status_chair' => 'available',
            'level_chair' => $request->level,
            'sector_id' => $sectorNew->id
        ]);
        }
    }

    return redirect()->route('sector.show', $request->event_id);
}


    /**
     * Display the specified resource.
     */



    public function show(string $id)
    {
        $sectors = Sector::where('event_id', '=', $id)->get();

        $event = Event::find($id);

        $qtdSetores = Sector::where('event_id', $event->id)->count();


        $sectorIds = Sector::where('event_id', $event->id)->pluck('id');

        
        $qtdAssentosDisponiveis = Chair::whereIn('sector_id', $sectorIds)
            ->where('status_chair', 'available')
            ->count();
    
    
        $qtdAssentosIndisponiveis = Chair::whereIn('sector_id', $sectorIds)
            ->where('status_chair', '!=', 'available')
            ->count();

        

        return view('adm.listar_setores', compact('sectors', 'event', 'qtdSetores', 'qtdAssentosIndisponiveis', 'qtdAssentosDisponiveis'));
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
            'name' => 'required',
            'quantity_chairs' => 'required',
            'quantity_rows' => 'required',
            'status' => 'required',
            'level' => 'required',
            'event_id' => 'required',
        ]);

        $sector = Sector::find($id);


        $sector->update($validado);


       
        return redirect()->route('sector.show', $request->event_id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $sector = Sector::find($id);


        $sector->delete();

        return redirect()->route('sector.show', $sector->event_id);
    }
}
