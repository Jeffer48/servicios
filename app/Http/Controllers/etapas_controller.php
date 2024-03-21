<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class etapas_controller extends Controller
{
    public function index(Request $request){
        $personal = DB::table('personal')
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

        $jefe = DB::table('personal')
            ->select(DB::raw('id, concat(nombre," ",apellido_p," ",apellido_m) as descripcion'))
            ->where('id_tipo',75)
            ->get();

        $servicio = DB::table('catalogos')
            ->select('id','descripcion')
            ->where('id_grupo',5)
            ->get();

        $localidad = DB::table('catalogos')
            ->select('id','descripcion')
            ->where('id_grupo',6)
            ->get();

        $lugares = DB::table('catalogos')
            ->select('id','descripcion')
            ->where('id_grupo',7)
            ->get();

        return view('etapas',[
            'personal' => $personal,
            'fecha' => $request->fecha,
            'reportante' => $reportante,
            'area' => $area[0]->descripcion,
            'folio_interno' => 'B0001',
            'turno' => $turno,
            'unidad' => $unidad[0]->descripcion,
            'jefe' => $jefe,
            'servicio' => $servicio,
            'localidad' => $localidad,
            'lugares' => $lugares
        ]);
    }
}
