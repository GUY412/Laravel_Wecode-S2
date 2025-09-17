<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeMail;
use App\Models\User;
use Illuminate\Container\Attributes\Auth as AttributesAuth;
use Illuminate\Support\Facades\Auth;

// use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

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
            return redirect()->route('dashbord');
        }
        return view('auth.login');
    }

    public function login(Request $request){
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|string',
        ]);

        if(Auth::attempt($request->only("email","password"))){
            return redirect()->intended('dashbord');
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
        Mail::to($users-> email)->send(new WelcomeMail($users));
        return back()->with('success', "Inscription reussie ! Un email de Bienvenue a été envoyé");
    }

    public function logout(){
        Auth::logout();
        return redirect('/login');
    }
}
