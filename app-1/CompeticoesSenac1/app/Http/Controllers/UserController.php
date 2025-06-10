<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $users = User::all();
        return view('adm.listar_usuarios', compact('users'));
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

        Hash::make($request->password);

        if($request->profile =='client'){

            $validado = $request->validate([
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required|email',
                'profile' => 'required',
                'cpf' => 'required',
            ]);
    
        }else{

            $validado = $request->validate([
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required|email',
                'password' => 'required|min:6',
                'profile' => 'required',
                'cpf' => 'required',
            ]);


        }

        $validado['password'] = Hash::make($request->password);
   
        User::create($validado);

        return redirect()->route('user.index');
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
        $validado = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'profile' => 'required',
            'cpf' => 'required',
        ]);

   
        $validado['password'] = Hash::make($request->password);

        $user = User::find($id);

        $user->update($validado);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        
        $user = User::find($id);

  

        $user->delete();

        return redirect()->route('user.index');

    }



  public function getUser(Request $request) {

        $searchValue = $request->get('q') ?? null;

        if(is_Null($searchValue)){

            $users = User::limit(10)->get();
            
        }else{

            $users = User::where('first_name', 'like', "%{$searchValue}%")->orWhere('email', 'like', "%{$searchValue}%")->orWhere('last_name', 'like', "%{$searchValue}%")->get();
        }


        $response = $users->map(function($user){

            return [
                'id' => $user->id,
                'text' => "Nome: {$user->first_name} {$user->last_name} / Email: {$user->email}"
            ];
        });



        return[
            'results' => $response
        ];

    }



    public function CreateUserSaller(Request $request){

          $validado = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'profile' => 'required',
            'cpf' => 'required',
        ]);




        User::create($validado);

        return response()->json([
            'msg' => 'Cadastro Concluido'
        ]);
    }



    public function GetUserType($type)
    {
        if ($type == 'todos') {
            $users = User::all();
        } else {
            $users = User::where('profile', $type)->get();
        }
    
        return response()->json(['users' => $users]);
    }


    public function GetSearchUser($search){

        if($search == ''){

            $users = User::all();
            
        }else{

            $users = User::where('first_name', 'like', "%{$search}%")->orWhere('email', 'like', "%{$search}%")->orWhere('last_name', 'like', "%{$search}%")->get();
        }

        return response()->json(['users' => $users]);


    }
    









}
