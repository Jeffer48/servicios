<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class radio_controller extends Controller
{
    public function index(){
        $area = DB::table('catalogos')
            ->select('id','descripcion')
            ->where('id_grupo',1)
            ->get();

        $unidad = DB::table('catalogos')
            ->select('id','descripcion')
            ->where('id_grupo',2)
            ->get();

        $incidente = DB::table('catalogos')
            ->select('id','descripcion')
            ->where('id_grupo',3)
            ->orderBy('descripcion')
            ->get();

        return view('reporte_radio',[
            'areas' => $area,
            'unidades' => $unidad,
            'incidentes' => $incidente
        ]);
    }

    public function etapa_uno(){
        return view('etapa_uno');
    }
}
