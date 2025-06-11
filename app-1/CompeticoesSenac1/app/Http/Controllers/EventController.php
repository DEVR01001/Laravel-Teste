<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $events = Event::all();

        return view('adm.listar_eventos', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validado = $request->validate([
            'name' => 'required',
            'date_event' => 'required',
            'time_event' => 'required',
            'street' => 'required',
            'cep' => 'required',
            'city' => 'required',
            'logo' => 'required|mimes:jpeg,png,gif,svg|max:2028',
            'capacidade_pessoas' => 'required',
            'neighborhood' => 'required',
            'number' => 'required',
        ]);
    
        $imageName = time() . '.' . $request->logo->extension();
    
    
        $request->logo->move(public_path('images'), $imageName);
    
        
        $validado['logo'] = $imageName;
    
      
        Event::create($validado);
    
        return redirect()->route('event.index')->with('success', 'Evento cadastrado com sucesso!');
    }
    
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
        $eventEdit = Event::find($id);

        return view('adm.listar_eventos', compact('eventEdit'));

    }

    /**
     * Show the form for editing the specified resource.
     */
        public function edit($id)
    {
        $eventEdit = Event::findOrFail($id);
        return view('nome-da-sua-view', compact('eventEdit'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
        $validado = $request->validate([
            'name' => 'required',
            'date_event' => 'required',
            'time_event' => 'required',
            'street' => 'required',
            'cep' => 'required',
            'city' => 'required',
            'logo' => 'required',
            'capacidade_pessoas' => 'required',
            'neighborhood' => 'required',
            'number' => 'required',
        ]);

        $imageName = time() . '.' . $request->logo->extension();
    
        $request->logo->move(public_path('images'), $imageName);
        
        $validado['logo'] = $imageName;


        $event = Event::find($id);

     
        $event->update($validado);



        return redirect()->route('event.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        

        $event = Event::find($id);

  

        $event->delete();

        return redirect()->route('event.index');


    }





    
    public function GetSearchEvent(Request $request)
    {
        $search = $request->query('search'); 
    
        $event = Event::query();
    
        if ($search) {
            $event->where(function ($query) use ($search) {
                $query->where('name', 'like', "%{$search}%")
                      ->orWhere('date_event', 'like', "%{$search}%")
                      ->orWhere('cep', 'like', "%{$search}%")
                      ->orWhere('capacidade_pessoas', 'like', "%{$search}%");
            });
        }
    
        return response()->json(['events' => $event->get()]);
    }



    public function VerifyEventQuant(Request $request){

        $event = Event::find($request->eventId);
        $quantEvento = $request->quantEvent;
        
        if($event->capacidade_pessoas >  $quantEvento){

            return response()->json([
                'msg' => "Limite ultrapassado de pessoas do evento '$event->name' ",
                'sucess' => false
            ]);

        }


        return response()->json([
            'sucess' => true
        ]);
    }
    
}
