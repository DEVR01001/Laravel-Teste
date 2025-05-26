<?php

namespace App\Http\Controllers;

use App\Models\Chair;
use App\Models\Users;
use Illuminate\Http\Request;

class CartController extends Controller
{
    
    public function __construct() {

        // session(['cart' => '']);


        // $add = [
        //     [
        //     'usuario' => 1,
        //     'cadeira' => 1
        //     ],
        //     [
        //     'usuario' => 2,
        //     'cadeira' => 2
        //     ],
        //     [
        //     'usuario' => 3,
        //     'cadeira' => 3
        //     ],
        // ];

        // session(['cart' => $add]);

        
    }





    




    
    public function index(){

        $carts = session()->get('cart');



        return view('cart', compact('carts'));

    }

    public function checkChairs(int $id){


        $chair = Chair::findOrFail($id);

        return $chair;

    

    }

    public function addCart( int $id_chair, int $id_user){

        $session = collect(session()->get('cart'));

        $users = Users::all();



        foreach ($session as $chair) {
            if($chair['cadeira'] == $id_chair){
                return 'Cadeira já adicionada';
                break;
            }
        }
        
        $session->push([
            'cadeira' => $id_chair,
            'user' => $id_user,
        ]);
    
        session(['cart' => $session]);
    

        return response()->json([
            'success' => true,
            'carts' => session()->get('cart'),
            'users' => $users,
        ]);


    }


 
    public function removeSession(int $chair){
        

    
        $session = collect(session()->get('cart'));

        $newSession = collect();

        foreach($session as $cart){
            if($cart['cadeira'] == $chair){
                continue;
            }
            $newSession->push($cart);
        }

        session(['cart' => $newSession]);


        return true;

    }



    public function clearCart()
    {
        $users = Users::all();

        session()->forget('cart');
    
        return response()->json([
            'success' => true,
            'carts' => session()->get('cart'),
            'users' => $users,
        ]);
    }


    public function deleteChair($id){

        $session = session()->get('cart');

        $newSession = $session->reject(function ($item) use ($id) {
            return $item['cadeira'] == $id;
        });


        $users = Users::all();

        session(['cart' => $newSession->values()]);

        return response()->json([
            'success' => true,
            'carts' => session()->get('cart'),
            'users' => $users,
        ]);

    }





    


}
