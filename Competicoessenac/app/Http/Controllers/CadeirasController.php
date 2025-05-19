<?php

namespace App\Http\Controllers;

use App\Models\Cadeiras;
use Illuminate\Http\Request;
use Ramsey\Uuid\Type\Integer;

class CadeirasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        
        $cadeiras = Cadeiras::where('setores_id', $request->id_setor)->paginate(10);
        $setores_id = $request->id_setores;


        return view('cadeiras-listar', compact('cadeiras', 'setores_id'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        

    
        $totalCadeiras = $request->validada['quantidade_cadeiras'] * $request->validada['quantidade_fileras'];

        $i=1;

        switch ($request->validada['nivel_setor']) {
            case 'VP':
                while ($i < ($totalCadeiras+1)){

                    $cadeiras = Cadeiras::create([
                        'number_cadeira' => $i,
                        'status' => 'D',
                        'nivel_cadeira' => 'VP',
                        'setores_id' => $request->id_setor
                    ]);
        
                    $i+=1;
                }        
                break;
            
            default:
                while ($i < ($totalCadeiras+1)){

                    $cadeiras = Cadeiras::create([
                        'number_cadeira' => $i,
                        'status' => 'D',
                        'nivel_cadeira' => 'CM',
                        'setores_id' => $request->id_setores
                    ]);
        
                    $i+=1;
                }
    
                break;
        }


        return redirect()->route('setores.index', ['id_evento' => $request->validada['eventos_id']]);


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
    

    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cadeiras $cadeira)
    {

  
  
         return view('cadeiras-edit', compact('cadeira'));




    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cadeiras $cadeira)
    {
        // dd($request, $cadeira);


        $validada = $request->validate([
            'number_cadeira' => 'required',
            'status' => 'required',
            'nivel_cadeira' => 'required',
            'setores_id' => 'required',
        ]);
        

 
        $cadeira->update($validada);

        return redirect()->route('cadeiras.index', ['id_setor' => $validada['setores_id']]);


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cadeiras $cadeira)
    {
        
        $cadeira->delete();
        
        return redirect()->route('cadeiras.index', ['id_setor' => $cadeira->setores_id]);

        
    }




  
}
