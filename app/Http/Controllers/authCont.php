<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class authCont extends Controller
{
    public function viewLogin(){
        return view('auth.login');
    }

    public function login(Request $req){
        if(Auth::attempt($req->only('username', 'password'))){
            return redirect('/');
        }else{
            return Redirect()->back()->with('loginFailed', 'LOGIN GAGAL, USERNAME ATAU PASSWORD SALAH');
        }
        
    }

    public function logout(){
        Auth::logout();
        return Redirect('/login')->with('logoutSuccess', 'LOGOUT BERHASIL');;
    }
}
