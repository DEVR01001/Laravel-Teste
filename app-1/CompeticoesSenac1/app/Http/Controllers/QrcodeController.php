<?php

namespace App\Http\Controllers;

use App\Mail\SendIngresso;
use App\Models\Chair;
use App\Models\Event;
use App\Models\Qrcode;
use App\Models\Sector;
use App\Models\Ticket;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class QrcodeController extends Controller
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
   public function store(Request $request, $ticketId)
    {
        $qrcode = Qrcode::create([
            'ticket_id' => $ticketId,
            'qr_code' => $ticketId,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Qrcode salvo com sucesso',
            'ingresso_id' => $ticketId,
        ]);
    }


    public function EmailIngresso(Request $request, $IngressoId)
    {

        $ingresso = Ticket::findOrFail($IngressoId);
        $user = User::findOrFail($ingresso->user_id );
        $chair = Chair::findOrFail($ingresso->chair_id );
        $setor = Sector::findOrFail($chair->sector_id);
        $evento = Event::findOrFail($setor->event_id);

        $qrcodeBase64 = $request->srcEmail; 


        $pdf = Pdf::loadView('pdf.ingresso', [
            'user' => $user,
            'ingresso' => $ingresso,
            'chair' => $chair,
            'setor' => $setor,
            'evento' => $evento,
            'qrcodeBase64' => $qrcodeBase64,
        ]);

          $pdfContent = $pdf->output();
        

        Mail::to($user->email)->send(new SendIngresso(
            $user,
            $ingresso,
            $chair,
            $evento,
            $qrcodeBase64,
            $pdfContent
        ));

        return response()->json([
            'success' => true,
            'message' => 'Email enviado com sucesso!',
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
