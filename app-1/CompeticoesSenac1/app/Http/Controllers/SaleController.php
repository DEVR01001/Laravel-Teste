<?php

namespace App\Http\Controllers;

use App\Models\Chair;
use App\Models\Sale;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    $cart = $request->input('cart');

 
    $sale = Sale::create([
        'user_id' => 2, 
        'status_sale' => 'approved',
    ]);

    foreach ($cart as $itemCart) {
        $chair = Chair::find($itemCart['id_chair']);

        if (!$chair) {
            return response()->json([
                'msgError' => "Cadeira não encontrada: ID {$itemCart['id_chair']}"
            ], 404);
        }

        if ($chair->status_chair === 'occupied') {
            return response()->json([
                'msgError' => "A cadeira {$chair->number_chair} já está ocupada."
            ], 409);
        }

        if ($chair->status_chair === 'maintenance') {
            return response()->json([
                'msgError' => "A cadeira {$chair->number_chair} está em manutenção."
            ], 409);
        }

       
        $chair->update([
            'status_chair' => 'occupied',
        ]);


    }

    return response()->json([
        'success' => true,
        'msg' => 'Venda registrada com sucesso.',
        'id_sale' => $sale->id
    ]);
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
