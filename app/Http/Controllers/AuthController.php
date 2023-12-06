<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login (){
        return view('auth.login');
    }
    public function handleLogin(AuthRequest $request){
        $credentials=$request->only(['email','password']);

        if(Auth::attempt($credentials)){
            return redirect()->route('dashboard');
        } else {
            return redirect()->back()->with('error_msg','Parametre de connexion non reconnu');
        }
        
    }
   
        
}
