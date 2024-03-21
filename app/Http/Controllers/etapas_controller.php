<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class etapas_controller extends Controller
{
    public function index(Request $request){
        $operador = DB::table('personal')
            ->select(DB::raw('id, concat(nombre," ",apellido_p," ",apellido_m) as descripcion'))
            ->get();

        $reportante = DB::table('catalogos')
            ->select('id','descripcion')
            ->where('id_grupo',14)
            ->get();

        $turno = DB::table('catalogos')
            ->select('id','descripcion')
            ->where('id_grupo',4)
            ->get();

        $area = DB::table('catalogos')
            ->select('id','descripcion')
            ->where('id',$request->id_area)
            ->get();

        $unidad = DB::table('catalogos')
            ->select('id','descripcion')
            ->where('id',$request->id_unidad)
            ->get();

        return view('etapas',[
            'operador' => $operador,
            'fecha' => $request->fecha,
            'reportante' => $reportante,
            'area' => $area[0]->descripcion,
            'folio_interno' => 'B0001',
            'turno' => $turno,
            'unidad' => $unidad[0]->descripcion
        ]);
    }
}
