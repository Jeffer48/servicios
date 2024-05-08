<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class combustible_controller extends Controller
{
    public function index(){
        date_default_timezone_set('America/Mexico_City');
        $fecha = date('Y-m-d H:i:s', time());

        $personal = DB::table('personal')
            ->select(DB::raw('id, concat(nombre," ",apellido_p," ",apellido_m) as descripcion'))
            ->where('deleted_at', null)
            ->get();

        $unidades = DB::table('catalogos')
            ->select('id','descripcion')
            ->where('id_grupo',2)
            ->where('deleted_at', null)
            ->get();

        return view('carga_combustible',[
            'personal' => $personal,
            'unidades' => $unidades,
            'fecha' => $fecha
        ]);
    }

    public function guardar(Request $request){
        try{
            $id_rr = DB::table('carga_gasolina')->insertGetId([
                'fecha' => $request->fecha,
                'id_jefe' => $request->jefe,
                'id_operador' => $request->operador,
                'id_unidad' => $request->unidad,
                'kilometraje' => $request->kilometraje,
                'importe' => $request->importe,
                'litros' => $request->litros,
                'folio' => $request->folio,
                'observaciones' => $request->observaciones,
                'created_user' => Auth::id()
            ]);

            return array("Carga de combustible registrada","Haz click para cerrar","success",1,"");
        }catch(QueryException $e){
            return array("Ha ocurrido un error","Haz click para cerrar","error",1,"");
        }
    }
}
