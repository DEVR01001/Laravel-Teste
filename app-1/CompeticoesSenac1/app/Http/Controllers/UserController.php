<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

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
        $validado = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'profile' => 'required',
            'cpf' => 'required',
        ]);

     

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










}
