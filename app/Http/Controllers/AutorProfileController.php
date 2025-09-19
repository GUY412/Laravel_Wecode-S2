<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
// use Illuminate\Container\Attributes\Auth;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AutorProfileController extends Controller
{
    public function autor(){
        return view('auth.profile');
    }

    public function modifier(Request $request)
    {
        $user = User::find(Auth::id());

        $checkpassword = Hash::check($request->input('old-password'), Auth::user()->password);
        if($checkpassword == FALSE){
            return redirect()->back()->with('error', 'Mot de passe incorrect');
        }else{
            if(($request->input('new-password')!= NULL) and ($request->input('confirm-new-password')!= NULL)){
                if($request->input('new-password')== $request->input('cofirm-new-password')){
                    $user->password = $request->input('new-password');
                }else{
                    return redirect()->back()->with('error', 'Les mots de passes ne coincident pas');
                }
            }
        }

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->update();

        return redirect()->route('dashboard')->with('succes', 'Profile Modifier avec succes');
    }
}
