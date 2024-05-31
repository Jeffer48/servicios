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
        $credentials = null;
        if($request->email != null){
            $credentials = $request->validate([
                'email' => ['required', 'email'],
                'password' => ['required'],
            ]);
        }else{
            $credentials = $request->validate([
                'username' => ['required', 'string'],
                'password' => ['required'],
            ]);
        }
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return 1;
        }
 
        return 0;
    }

    public function logout() {
        Auth::logout();
        return redirect('login');
    }
}
