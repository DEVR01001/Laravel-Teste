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
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;

class QrcodeController extends Controller
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
   public function store(Request $request, $ticketId)
    {

        $codigo = '';
        $i = 0;
        
        while ($i < 10) {
            $number = rand(1, 9);
            $codigo .= $number;  
            $i++;                
        }


        $ingresso = Ticket::findOrFail($ticketId);
        $user = User::findOrFail($ingresso->user_id);
        $chair = Chair::findOrFail($ingresso->chair_id );
        $setor = Sector::findOrFail($chair->sector_id);
        $evento = Event::findOrFail($setor->event_id);
        

        $qrcode = Qrcode::create([
            'ticket_id' => $ticketId,
            'qr_code' => $codigo,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Qrcode salvo com sucesso',
            'ingresso_id' => $ticketId,
            'evento' => $evento,
            'user' => $user,
            'chair' => $chair,
            'setor' => $setor,
            'ingresso' => $ingresso,
            'codigo' => $codigo,

        ]);
    }


    public function EmailIngresso(Request $request, $IngressoId)
    {



     
        $qrcode = Qrcode::where('ticket_id', $request->IngressoId)->firstOrFail();

        $dataUrl = $request->data_url;

    
        [$type, $data] = explode(';', $dataUrl);
        [, $data] = explode(',', $data);

  
        $imageData = base64_decode($data);

    
        $extension = explode('/', mime_content_type($dataUrl))[1];

        $fileName = time() . '.' . $extension;

  
        $path = public_path('images/' . $fileName);

    
        File::put($path, $imageData);

        $qrcode->update([
            'img_qrcode' => $fileName
        ]);


        $ingresso = Ticket::findOrFail($IngressoId);
        $user = User::findOrFail($ingresso->user_id );
        $chair = Chair::findOrFail($ingresso->chair_id );
        $setor = Sector::findOrFail($chair->sector_id);
        $evento = Event::findOrFail($setor->event_id);
        $qrcode = Qrcode::where('ticket_id', $IngressoId)->firstOrFail();
        $qrcodeBase64 = $request->srcEmail; 


        $pdf = Pdf::loadView('pdf.ingresso', [
            'user' => $user,
            'ingresso' => $ingresso,
            'chair' => $chair,
            'setor' => $setor,
            'evento' => $evento,
            'qrcodeBase64' => $qrcodeBase64,
            'qrcode' => $qrcode,
            'CodsigoQrcode' => $qrcode,
        ]);

          $pdfContent = $pdf->output();
        
       




        Mail::to($user->email)->send(new SendIngresso(
            $user,
            $ingresso,
            $chair,
            $evento,
            $qrcodeBase64,
            $pdfContent,
            $qrcode
        ));

        return response()->json([
            'success' => true,
            'message' => 'Email enviado com sucesso!',
        ]);
    }


    public function getCodQrcode(Request $request){



        $searchValue = $request->get('q') ?? null;

        if(is_Null($searchValue)){

            $qrcodes = Qrcode::limit(10)->get();
            
        }else{

            $qrcodes = Qrcode::where('qr_code', 'like', "%{$searchValue}%")->get();
        }


        $response = $qrcodes->map(function($qrcode){

            return [
                'id' => $qrcode->id,
                'text' => "{$qrcode->qr_code}"
            ];
        });


        return response()->json([
            'results' => $response
        ]);
        
    }





    public function ValidQrcode(string $codigo){


        $qrcode = Qrcode::find($codigo);


    


        $ticket = Ticket::find($qrcode->ticket_id);

        if($ticket->status_ticket == 'used'){
            return response()->json([
                'sucess' => false,
                'msg' => "Ingresso N° $ticket->id já foi validado!",
            ]);
        }

        $ticket->status_ticket = 'used';


        if($ticket->update()){

            return response()->json([
                'sucess' => true,
                'msg' => "Ingresso N° $ticket->id Válido",
            ]);
        }

    }



    public function checkCam(Request $request)
    {
        $code = $request->input('qrcode');

        
        $ticket = Ticket::find($code);

        if($ticket->status_ticket == 'used'){
            return response()->json([
                'sucess' => false,
                'msg' => "Ingresso N° $ticket->id já foi validado!",
            ]);
        }


   
        $ticket->status_ticket = 'used';

        $ticket->update();

        return response()->json([
            'sucess' => true,
            'msg' =>  "Ingresso N° $ticket->id Válido",
            'conteudo' => $code
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
