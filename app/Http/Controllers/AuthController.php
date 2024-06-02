<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    public function SinIn(){
        return view('Auth.login');
    }
    public function login(Request $request){
        $request->validate([
            'username'=>'required|string',
            'password'=>'required|string'
        ]);
        if(Auth::attempt(['username'=>$request['username'],'password'=>$request['password']])){
           return redirect('/');
        }
        else{
            return back()->with('error','username or password not correct');
        }
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('sinIn');
    }
}

