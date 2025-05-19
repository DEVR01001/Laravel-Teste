<?php

namespace App\Http\Controllers;

use App\Models\Ingressos;
use App\Models\Usuarios;
use Illuminate\Http\Request;
use App\Mail\EmailTeste;
use Illuminate\Support\Facades\Mail;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class IngressosController extends Controller
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
    public function create(Request $request)
    {
        $id_venda = $request->id_venda;
        $usuarios = $request->usuarios;

     
        foreach ($usuarios as $item) {
         
            $ingresso = Ingressos::create([
                'qcode' =>  QrCode::size(300)->generate($item['usuario_id']),
                'cadeira_id' => $item['cadeira_id'],
                'usuario_id' => $item['usuario_id'],
                'venda_id' => $id_venda,
                'status_ingresso' => 'DP',
            ]);


        
            $usuario = Usuarios::find($item['usuario_id']);
            
            Mail::mailer('postmark')
                ->to($usuario->email)
                ->send(new EmailTeste($usuario));
        

        }


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
