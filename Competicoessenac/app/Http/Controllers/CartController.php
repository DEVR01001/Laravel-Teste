<?php

namespace App\Http\Controllers;

use App\Models\Cadeiras;
use App\Models\Eventos;
use App\Models\Setores;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cart = session()->get('cart');
        return $cart;
    }

    

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {

    

        $id_cadeira = $request->id;

        $cadeira = Cadeiras::findOrFail($id_cadeira);


        $cart = session()->get('cart', []);

        if(isset($cart[$id_cadeira])){

        }else{
            $cart[$id_cadeira] = [
                'id_cadeira' => $cadeira->id,
                'numero_cadeira' => $cadeira->number_cadeira,
                'quantidade' => 1
            ];

            $total = session()->increment('totalCart');
            session()->put('totalCart', $total);
    
        }
        session()->put('cart', $cart);
        
     
  
       return redirect()->back();
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
    public function destroy()
    {
   

    }



    public function delete($id)
    {
        $cart = session()->get('cart', []);
    
        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
    
            $total = session()->get('totalCart', 0);
            if ($total > 0) {
                $total--;
                session()->put('totalCart', $total);
            }
        }
    
        return redirect()->back()->with('success', 'Item removido do carrinho.');
    }
    


    
}
