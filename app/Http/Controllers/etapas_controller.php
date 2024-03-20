<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class etapas_controller extends Controller
{
    public function index(Request $request){
        
        return view('etapas');
    }
}
