<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;

class AuthController extends Controller
{
    public function index(){
    	return view('/auth/login');
	}
	
	public function register(){
    	return view('auth/register');
    }

    public function postRegister(Request $request){
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role
        ]);

    	return redirect('/login');
	}
	
    public function postLogin(Request $request){
    	if(Auth::attempt($request->only('email','password'))){

			if( auth()->user()->role == 'admin'){
				return redirect('/dashboard');
				
			} elseif( auth()->user()->role == 'staff'){
				return redirect('/dashboard');
			}
    	}
    	// Message salah
    	return redirect('/login')->with('errors', 'Username atau Password anda Salah!');
    }

    public function logout(){
    	Auth::logout();
    	return redirect('/login');
    }
}
