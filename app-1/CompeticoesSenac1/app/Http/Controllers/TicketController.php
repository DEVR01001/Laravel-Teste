<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('adm.listar_ingressos');
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

        $ingresoIdArray = [];

        foreach ($request->cart as $cartItem) {
            
            $ticket = Ticket::create([
                'sale_id' => $request->id_sale,
                'user_id' => $cartItem['id_user'],
                'chair_id' => $cartItem['id_chair'],
                'status_ticket' => 'available'
            ]);

            array_push($ingresoIdArray, $ticket->id);


        }

        return response()->json([
            'id_ticket' => $ingresoIdArray,
            'sucess' => true

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
