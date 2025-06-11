<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('layout.login');
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
            'email' => 'required',
            'password' => 'required',
        ]); 

     
   
        if(Auth::attempt($validado)){

            $request->session()->regenerate();
    
            $user = Auth::user();

            switch ($user->profile) {
                case 'admin':
                    return redirect()->route('event.index');
                case 'totem':
                    return  redirect()->route('totem.index');
                case 'saller':
                    return view('saller.eventos_saller'); 
            }

        }

        $msg = 'Email ou senha estão incorretos';
        return view('layout.login', compact('msg'));

    }


    public function logout(Request $request){

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login.index');
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
