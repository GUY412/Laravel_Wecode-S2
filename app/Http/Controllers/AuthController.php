<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showSignup(){
        if(Auth::check()){
            return redirect()->route('dashbord');
        }
        return view('auth.register');
    }

   public function showFormLogin(){
        if(Auth::check()){
            return redirect()->route('dashboard');
        }
        return view('auth.login');
    }

    public function login(Request $request){
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|string',
        ]);

        if(Auth::attempt($request->only("email","password"))){
            return redirect()->intended('dashboard');
        }

        return back()->withErrors(["email"=> "Les informations fournies ne correspondent pas !"]);
    }

    public function signUp(Request $request){

        $request->validate([
            'name'=> 'required|string|max:255',
            'email'=> 'required|email|unique:users,email',
            'password'=> 'required|string|min:6|confirmed',
        ]);

        $users = User::create([
            'name'=> $request->name,
            'email'=> $request->email,
            'password'=> Hash::make($request->password),
        ]);
        return redirect('dashboard')->with('success', "Inscription reussie ! Un email de Bienvenue a été envoyé");
    }

    public function logout(){
        Auth::logout();
        return redirect('/login');
    }
}
