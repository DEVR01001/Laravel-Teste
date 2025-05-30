<?php

namespace App\Http\Controllers;

use App\Models\Chair;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public function __construct() {

        //   session(['cart' => '']);

        // $add = [
        //     [
        //         'usuario' => 1,
        //         'chair' => 1
        //     ],
        //     [
        //         'usuario' => 1,
        //         'chair' => 2
        //     ],
        //     [
        //         'usuario' => 1,
        //         'chair' => 3
        //     ],
        //     [
        //         'usuario' => 1,
        //         'chair' => 500
        //     ]
        // ];

        // session(['cart' => $add]);


    }
    


   public function index(){

    $carts = session()->get('cart');


    return view('cart', compact('carts'));

}





   public function checkChairs(int $id_chair){

    $chair = Chair::findOrFail($id_chair);

    return $chair;


   }




   public function ClearChair(){


    session()->forget('cart');

    return response()->json([
        'sucess' => true,
        'cart'=> session()->get('cart')
    ]);


   }


   public function deleteUniChair($id_chair){

    $cart = collect(session()->get('cart'));

    $Newcart = $cart->reject(function ($itemCart) use ($id_chair) {
        return $itemCart['chair'] == $id_chair;
    });

    session()->put('cart', $Newcart->values()->all());


    return response()->json([
        'success' => true,
        
    ]);


   }


   public function getCartAll(){

    $cart = collect(session()->get('cart'));

    return $cart;

   }



   

   public function addCartUser($user,$chair){

    $carts = collect(session()->get('cart'));

    $carts = $carts->map(function ($item) use ($user, $chair) {
        if ($item['chair'] == $chair) {
            $item['user'] = $user;
        }
        
        return $item;
    });


    session()->put('cart', $carts->toArray());

    return response()->json([
        'sucess' => true,
        'cart'=> session()->get('cart')
    ]);

   }







   public function addCartChair(int $id_chair){

    $cart = collect(session()->get('cart'));

    



    foreach ($cart as $chair){
        if($chair['chair'] == $id_chair){
            return 'Cadeira já adicionada';
            break;
        }

    }
    
    $cart->push([
        'chair' => $id_chair,
        'user' => '',
    ]);


    session(['cart' => $cart]);


    return response()->json([
        'sucess' => true,
        'cart'=> session()->get('cart')
    ]);


   }



  






}
