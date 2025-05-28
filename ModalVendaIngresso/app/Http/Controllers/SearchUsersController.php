<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class SearchUsersController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        
        $searchValue = $request->get('q') ?? null;

        if(is_Null($searchValue)){

            $users = User::limit(10)->get();
            
        }else{

            $users = User::where('name', 'like', "%{$searchValue}%")->orWhere('email', 'like', "%{$searchValue}%")->orWhere('lastname', 'like', "%{$searchValue}%")->get();
        }


        $response = $users->map(function($user){

            return [
                'id' => $user->id,
                'text' => "{$user->name} {$user->lastname} {$user->email}"
            ];
        });



        return[
            'results' => $response
        ];


    }
}
