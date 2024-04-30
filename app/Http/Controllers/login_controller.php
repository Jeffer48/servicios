<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class login_controller extends Controller
{
    public function index(){
        return view('login');
    }

    public function getData(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->intended('radio');
        }
 
        return redirect('login')->withErrors(['email' => 'Datos de sesión invalidos!'])->withInput();
    }

    public function logout() {
        Auth::logout();
        return redirect('login');
    }
}
