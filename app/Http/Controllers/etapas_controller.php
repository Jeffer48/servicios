<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class etapas_controller extends Controller
{
    public function index(Request $request){
        $radio = DB::table('reporte_radio as rr')
            ->select('rr.id as id_reporte_radio', 'e.id_folio','rr.fecha','rr.id_area','rr.id_unidad','rr.id_incidente','rr.ubicacion')
            ->join('etapas as e', 'e.id_reporte_radio', 'rr.id')
            ->where('e.id', $request->id_etapa)->first();
        
        $personal = DB::table('personal')
            ->select(DB::raw('id, concat(nombre," ",apellido_p," ",apellido_m) as descripcion'))
            ->where('deleted_at', null)
            ->get();

        $reportante = DB::table('catalogos')
            ->select('id','descripcion')
            ->where('id_grupo',14)
            ->where('deleted_at', null)
            ->get();

        $turno = DB::table('catalogos')
            ->select('id','descripcion')
            ->where('id_grupo',4)
            ->where('deleted_at', null)
            ->get();

        $area = DB::table('catalogos')
            ->select('id','descripcion')
            ->where('id',$radio->id_area)
            ->where('deleted_at', null)
            ->get();

        $unidad = DB::table('catalogos')
            ->select('id','descripcion')
            ->where('id',$radio->id_unidad)
            ->where('deleted_at', null)
            ->get();

        $jefe = DB::table('personal')
            ->select(DB::raw('id, concat(nombre," ",apellido_p," ",apellido_m) as descripcion'))
            ->where('id_tipo',75)
            ->where('deleted_at', null)
            ->get();

        $servicio = DB::table('catalogos')
            ->select('id','descripcion')
            ->where('id_grupo',5)
            ->where('deleted_at', null)
            ->get();

        $localidad = DB::table('catalogos')
            ->select('id','descripcion')
            ->where('id_grupo',6)
            ->where('deleted_at', null)
            ->get();

        $lugares = DB::table('catalogos')
            ->select('id','descripcion')
            ->where('id_grupo',7)
            ->where('deleted_at', null)
            ->get();

        $prioridad = DB::table('catalogos')
            ->select('id','descripcion')
            ->where('id_grupo',8)
            ->where('deleted_at', null)
            ->get();

        $sexo = DB::table('catalogos')
            ->select('id','descripcion')
            ->where('id_grupo',9)
            ->where('deleted_at', null)
            ->get();

        $apoyo = DB::table('catalogos')
            ->select('id','descripcion')
            ->where('id_grupo',10)
            ->where('deleted_at', null)
            ->get();

        $destino = DB::table('catalogos')
            ->select('id','descripcion')
            ->where('id_grupo',11)
            ->where('deleted_at', null)
            ->get();

        $hospital = DB::table('catalogos')
            ->select('id','descripcion')
            ->where('id_grupo',12)
            ->where('deleted_at', null)
            ->get();

        $folio = DB::table('folios')
            ->select('folio','actual_num')
            ->where('id',$radio->id_folio)
            ->first();
        
        return view('etapas',[
            'personal' => $personal,
            'fecha' => $radio->fecha,
            'reportante' => $reportante,
            'id_area' => $area[0]->id,
            'area' => $area[0]->descripcion,
            'folio_num' => $folio->actual_num,
            'folio' => $folio->folio,
            'turno' => $turno,
            'unidad' => $unidad[0]->descripcion,
            'jefe' => $jefe,
            'servicio' => $servicio,
            'localidad' => $localidad,
            'lugares' => $lugares,
            'prioridad' => $prioridad,
            'sexo' => $sexo,
            'apoyo' => $apoyo,
            'destino' => $destino,
            'hospital' => $hospital,
            'id_reporte_radio' => $radio->id_reporte_radio
        ]);
    }

    public function guardar(Request $request){
        $id_folio = DB::table('folios')->insertGetId([
            'id_area' => $request->id_tipo,
            'actual_num' => $request->folio_num,
            'folio' => $request->folio
        ]);

        DB::table('etapas')->insert([
            'id_reporte_radio' => $request->id_reporte_radio,
            'id_radio_operador' => $request->id_radio_operador,
            'id_reportante' => $request->id_reportante,
            'id_turno' => $request->id_turno,
            'fecha' => $request->fecha,
            'id_operador' => $request->id_operador,
            'id_jefe' => $request->id_jefe,
            'id_personal_1' => $request->id_personal_1,
            'id_personal_2' => $request->id_personal_2,
            'id_personal_3' => $request->id_personal_3,
            'id_tipo_servicio' => $request->id_tipo_servicio,
            'id_localidad' => $request->id_localidad,
            'id_lugar' => $request->id_lugar,
            'ubicacion' => $request->ubicacion,
            'id_folio' => $id_folio,
            'id_prioridad' => $request->id_prioridad,
            'nombre' => $request->nombre,
            'id_sexo' => $request->id_sexo,
            'edad' => $request->edad,
            'id_apoyo' => $request->id_apoyo,
            'id_destino' => $request->id_destino,
            'id_hospital' => $request->id_hospital,
            'desc_evento' => $request->desc_evento,
            'incorporacion' => $request->incorporacion,
            'folio_crum' => $request->folio_crum,
            'folio_c5i' => $request->folio_c5i,
            'created_user' => Auth::id()
        ]);
    }
}
