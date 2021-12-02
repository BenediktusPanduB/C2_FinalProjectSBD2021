<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class authController extends Controller
{
    public function login(){
        return view('Login.login');
    }
    public function postlogin(Request $request){
        if(Auth::attempt($request->only('username','password'))){
            return redirect()->intended('/dashboard');
        }
        return back()->with('loginError','Masukan Username / Password dengan benar') ;
    }

    public function logout(){
        Auth::logout();
        return redirect('/login');
    }
}
