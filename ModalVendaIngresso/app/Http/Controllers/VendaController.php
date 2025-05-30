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

        $ingresoIdArray = [];
    
        foreach ($cart as $cartItem) {

            $chair = Chair::find($cartItem['chair']);
    
            if (!$chair) {
                return response()->json([
                    'fail' => true,
                    'message' => 'Cadeira não encontrada.',
                    'cadeira_id' => $chair->id,
                ]);
            }
            
    
            if ($chair->status !== 'D') {
                return response()->json([
                    'fail' => true,
                    'message' => 'Cadeira não disponível.',
                    'cadeira_id' => $chair->id,
                ]);
            }


           
            $ingresso = Ingresso::create([
                'cadeira_id' =>  $cartItem['chair'],
                'usuario_id' => intval($cartItem['user']),
                'venda_id' => $id_venda,
                'status_ingresso' => 'DP',
            ]);
            
           array_push($ingresoIdArray, $ingresso->id);
            
            $chair->status = 'ND';
            $chair->save();


        }
    
    
        
        return response()->json([
            'success' => true,
            'message' => 'Venda realizada com sucesso.',
            'ingresso_id' => $ingresoIdArray,
        ]);
    }
    
 
    

}

