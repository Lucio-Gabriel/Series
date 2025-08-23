<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController
{
    public function index()
    {
        return view('login.index');
    }

    public function store(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (!Auth::attempt($credentials)) {
            return redirect()->back()->withErrors(['Usuário ou senha inválidos.']);
        }

        return redirect()->route('series.index');
    }

    public function destroy()
    {
        Auth::logout();

        return redirect()->route('login');
    }
}
