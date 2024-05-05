<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function dologin(Request $request): \Illuminate\Http\RedirectResponse
    {
        /*
        $request->validate([
            'email'=> 'required|email',
            'password'=> 'required|min:4'
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('accueil');
        }



        return redirect()->route('welcome')->withErrors([
            'email'=> "L'email ou le mot de passe est incorrect"
        ]);
        */
        return redirect()->route('home');
    }
    public function deconnexion()
    {
        Auth::logout();
        return redirect()->route('signin');
    }
    public function demande()
    {

        return redirect()->route('demande');
    }
}
