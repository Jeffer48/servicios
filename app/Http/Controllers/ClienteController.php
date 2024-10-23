<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index(){
        return view('clientes');
    }

    public function registrar(Request $request){
        $nombre = $request->nombre;

        $cumple = true;
        if(length($nombre) < 3) $cumple = false;

        if($cumple){
            DB::table('clientes')->insert([
                'nombre' => $request->nombre,
                'email' => $request->email,
                'telefono' => $request->telefono
            ]);

            return 1;
        }else 0;
    }
}
