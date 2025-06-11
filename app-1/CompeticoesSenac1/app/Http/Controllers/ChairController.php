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
        $chairs = Chair::orderByRaw("CASE WHEN level_chair = 'vip' THEN 0 ELSE 1 END")->where('sector_id', '=', $id)->get();

        $sector = Sector::find($id);

        return view('adm.listar_cadeiras', compact('chairs', 'sector'));
    }


    
    // public function chairsSector(string $id)
    // {
    //     $event = Event::with(['sectors' => function ($query) {
    //                         $query->orderByRaw("CASE WHEN level = 'vip' THEN 0 ELSE 1 END");
    //                     }, 'sectors.chairs'])
    //                 ->findOrFail($id);

    //     return view('saller.setores_saller', compact('event'));
    // }

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



    public function GetSearchChair(Request $request)
    {
        $search = $request->query('search'); 
    
        $chair = Chair::query();
    
        if ($search) {
            $chair->where(function ($query) use ($search) {
                $query->where('number_chair', 'like', "%{$search}%")
                      ->orWhere('status_chair', 'like', "%{$search}%")
                      ->orWhere('level_chair', 'like', "%{$search}%");
            });
        }
    
        return response()->json(['chairs' => $chair->get()]);
    }
    


}
