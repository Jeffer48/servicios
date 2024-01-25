<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class radio_controller extends Controller
{
    public function index(){
        return view('reporte_radio');
    }
}
