<?php

namespace App\Http\Controllers;

use App\Mail\MailableName;
use App\Models\Chair;
use App\Models\Ingresso;
use App\Models\Qrcode;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class QrcodeController extends Controller
{
    


    public function qrcodeSave($ingressoId){

        $qrcode =  "http://127.0.0.1:8000/qrcode/access/$ingressoId";

        $qrcode_id = Qrcode::create([
            'ingresso_id' => $ingressoId,
            'qrcode' => $qrcode
        ]);



        return response()->json([
            'sucess' => true,
            'message' => 'Qrcode salvo com sucesso',
            'ingresso_id' => $ingressoId,
            'qrcode' => $qrcode
        ]);

    }





    public function EmailIngresso(Request $request,  $IngressoId){

   
        $ingresso = Ingresso::find($IngressoId);
        $user = User::find($ingresso->usuario_id);
        $chair = Chair::find($ingresso->cadeira_id);
        $evento = 'Senac Music';

        $qrcode = $request->srcEmail; 

        $pdfContent = PDF::loadView('mail.email', ['evento' =>$evento, 'chair' => $chair, 'user' => $user, 'ingresso'=>$ingresso, 'qrcode' => $qrcode]);

        Mail::to($user->email)->send(new MailableName($user,$ingresso, $chair, $evento, $pdfContent->output(), $qrcode));



    }


    public function VerifiyStatus($ingressoId){

        $ingresso = Ingresso::find($ingressoId);


        $ingresso->update([
            'status_ingresso' => 'US'
        ]);


        return view('check_qrcode');

    }





}
