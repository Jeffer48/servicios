<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class datos_controller extends Controller
{
    public function reportes()
    {
        $reportes = DB::table('vw_radio_x_etapas')
            ->where('status', 0)
            ->where('deleted_at', null)
            ->get();

        return $reportes;
    }

    public function desplazamiento(){
        $desplazamientos = DB::table('reporte_radio as rr')
            ->select('rr.id','c1.descripcion as area','c2.descripcion as unidad','rr.fecha')
            ->leftJoin('catalogos as c1', 'rr.id_area', 'c1.id')
            ->leftJoin('catalogos as c2', 'rr.id_unidad', 'c2.id')
            ->where('rr.status', 0)
            ->where('rr.id_incidente', 35)
            ->where('rr.deleted_at', null)
            ->get();

        return $desplazamientos;
    }

    public function terminarDesplazamiento(Request $request){
        try{
            date_default_timezone_set('America/Mexico_City');
            $date = date('Y-m-d H:i:s', time());

            DB::table('reporte_radio')
                ->where('id',$request->id)
                ->update([
                    'status' => 1,
                    'fecha_terminado' => $date
                ]);

            return array("Desplazamiento Terminado!","Haz click para cerrar","success",0,"");
        }catch(QueryException $e){
            return array("Ha ocurrido un error","Haz click para cerrar","error",1,"");
        }
    }
}
