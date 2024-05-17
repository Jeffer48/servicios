<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class etapas_controller extends Controller
{
    public function index(Request $request){
        $status = DB::table('etapas')
            ->select('status')
            ->where('id', $request->etapa)
            ->first();

        date_default_timezone_set('America/Mexico_City');
        $date = date('Y-m-d H:i:s', time());

        if($status->status > 0){
            return redirect('/')->with(['error' => 'El servicio ya esta terminado'])->withInput();
        }else{
            $radio = DB::table('reporte_radio as rr')
                ->select('rr.id as id_reporte_radio', 'e.id_folio','rr.fecha','rr.id_area','rr.id_unidad','rr.id_incidente','rr.ubicacion')
                ->join('etapas as e', 'e.id_reporte_radio', 'rr.id')
                ->where('e.id', $request->etapa)->first();
            
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

            $avance = DB::table('etapas')
                ->select(DB::raw('case when created_at = updated_at then 0 else 1 end avance'))
                ->where('id', $request->etapa)
                ->first();
            
            return view('etapas',[
                'id' => $request->etapa,
                'personal' => $personal,
                'fecha' => $radio->fecha,
                'reportante' => $reportante,
                'id_area' => $area[0]->id,
                'area' => $area[0]->descripcion,
                'folio_num' => $folio->actual_num,
                'folio' => $folio->folio,
                'turno' => $turno,
                'unidad' => $unidad[0]->descripcion,
                'servicio' => $servicio,
                'localidad' => $localidad,
                'lugares' => $lugares,
                'prioridad' => $prioridad,
                'sexo' => $sexo,
                'apoyo' => $apoyo,
                'destino' => $destino,
                'hospital' => $hospital,
                'id_reporte_radio' => $radio->id_reporte_radio,
                'avance' => $avance->avance,
                'date' => $date
            ]);
        }
    }

    public function obtenerAvance(Request $request){
        $etapa = DB::table('etapas')
            ->where('id',$request->id)
            ->first();

        return $etapa;
    }

    public function guardar(Request $request){
        date_default_timezone_set('America/Mexico_City');
        $date = date('Y-m-d H:i:s', time());

        try{
            $etapas = DB::table('etapas')
                ->where('id',$request->id)
                ->where('status',0)
                ->count();

            if($etapas > 0){
                DB::table('etapas')
                    ->where('id',$request->id)
                    ->update([
                    'id_reportante' => $request->id_reportante,
                    'id_turno' => $request->id_turno,
                    'fecha' => $request->fecha,
                    'fecha_finalizado' => $request->status == 1 ? $date : null,
                    'id_radio_operador' => $request->id_radio_operador,
                    'id_operador' => $request->id_operador,
                    'id_jefe' => $request->id_jefe,
                    'id_personal_1' => $request->id_personal_1,
                    'id_personal_2' => $request->id_personal_2,
                    'id_personal_3' => $request->id_personal_3,
                    'id_personal_4' => $request->id_personal_4,
                    'id_tipo_servicio' => $request->id_tipo_servicio,
                    'id_localidad' => $request->id_localidad,
                    'id_lugar' => $request->id_lugar,
                    'ubicacion' => $request->ubicacion,
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
                    'status' => $request->status,
                    'updated_user' => Auth::id(),
                    'updated_at' => $date
                ]);
                
                if($request->status == 0) return array("Datos actualizados correctamente!","Haz click para cerrar","success",0,"");
                else return array("Datos guardados correctamente!","Haz click para cerrar","success",1," ");
            }
            else{
                return array("El servicio ya fue terminado","Haz click para cerrar","error",1,"");
            }
        }catch(QueryException $e){
            return array("Ha ocurrido un error","Haz click para cerrar","error",1,"");
        }
    }
}
