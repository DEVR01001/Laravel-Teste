<?php

namespace App\Http\Controllers;

use App\Mail\MailableName;
use App\Models\Chair;
use App\Models\Ingresso;
use App\Models\User;
use App\Models\Venda;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Mail;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Barryvdh\DomPDF\Facade\Pdf;

class VendaController extends Controller
{
    
   
    public function insert()
    {
        $cart = collect(session()->get('cart'));
    
        if ($cart->isEmpty()) {
            return response()->json([
                'fail' => true,
                'message' => 'Carrinho vazio.',
            ], 400);
        }
    
        $venda = Venda::create([
            'usuario_id' => 1, 
            'status_venda' => 'AP',
        ]);
    
        $id_venda = $venda->id;
    
        foreach ($cart as $cartItem) {
            $chair = Chair::find($cartItem['chair']);
    
            if (!$chair) {
                return response()->json([
                    'fail' => true,
                    'message' => 'Cadeira não encontrada.',
                    'cadeira_id' => $cartItem['chair'],
                ], 404);
            }
    
            if ($chair->status !== 'D') {
                return response()->json([
                    'fail' => true,
                    'message' => 'Cadeira não disponível.',
                    'cadeira_id' => $chair->id,
                ], 400);
            }



            $codigoqQrcode = uniqid('qrcode');
    
            $ingresso = Ingresso::create([
                'qcode' => $codigoqQrcode,
                'cadeira_id' =>  $cartItem['chair'],
                'usuario_id' => intval($cartItem['user']),
                'venda_id' => $id_venda,
                'status_ingresso' => 'DP',
            ]);


            $data = QrCode::format('png')->size(200)->generate($chair->id);
            $qrcode = 'data:image/png;base64,' . base64_encode($data);

            $usuario = User::find(intval($cartItem['user']));
            $cadeira = $cartItem['chair'];
            $evento = 'Senac Rush Tec';

            $pdf = PDF::loadView('mail.email', ['evento' =>$evento, 'usuario'=>$usuario, 'cadeira'=>$cadeira, 'qrcode' => $qrcode]);

            Mail::to($usuario->email)->send(
                new MailableName($usuario, $cadeira, $evento, $qrcode, $pdf->output())
            );
    
    
            $chair->status = 'ND';
            $chair->save();
        }
    
    
        session()->forget('cart');
    
        return response()->json([
            'success' => true,
            'message' => 'Venda realizada com sucesso.',
            'venda_id' => $id_venda,
        ]);
    }
    
 
    

}

