<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class reset_password extends Controller
{
    public function forgotPass(){
        return view('forgot-password');
    }

    public function resetPass(Request $request){
        $request->validate(['email' => 'required|email']);
 
        $status = Password::sendResetLink(
            $request->only('email')
        );
     
        return $status === Password::RESET_LINK_SENT
            ? back()->with(['status' => __($status)])
            : back()->withErrors(['email' => __($status)]);
    }
}
