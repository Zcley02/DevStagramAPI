<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(){
        return view('auth.login');
    }

    public function store(Request $request) {
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if(!auth()->attempt($credentials, $request->remember)) {
            return back()->withErrors([
                'email' => 'Credenciales Incorrectas',
            ])->onlyInput('email');
        }

        return redirect()->route('posts.index');
    }
}
