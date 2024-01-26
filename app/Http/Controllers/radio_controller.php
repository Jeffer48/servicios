<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class radio_controller extends Controller
{
    public function index(){
        $c_area = DB::table('catalogo')
            ->select('id as id_area','descripcion as areas')
            ->where('id_grupo',1)
            ->get();
        $c_unidad = DB::table('catalogo')
            ->select('id as id_unidad','descripcion as unidades')
            ->where('id_grupo',2)
            ->get();
        $c_incidente = DB::table('catalogo')
            ->select('id as id_incidente','descripcion as incidentes')
            ->where('id_grupo',3)
            ->get();

        return view('reporte_radio',
            [
                'areas' => $c_area,
                'unidades' => $c_unidad,
                'incidentes' => $c_incidente
            ]
        );
    }
}
