<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;

class radio_controller extends Controller
{
    private $date = '';

    public function index(){
        date_default_timezone_set('America/Mexico_City');
        $date = date('Y-m-d h:i', time());

        $area = DB::table('catalogos')
            ->select('id','descripcion')
            ->where('id_grupo',1)
            ->where('deleted_at', null)
            ->get();

        $unidad = DB::table('catalogos')
            ->select('id','descripcion')
            ->where('id_grupo',2)
            ->where('deleted_at', null)
            ->get();

        $incidente = DB::table('catalogos')
            ->select('id','descripcion')
            ->where('id_grupo',3)
            ->where('deleted_at', null)
            ->orderBy('descripcion')
            ->get();

        return view('reporte_radio',[
            'areas' => $area,
            'unidades' => $unidad,
            'incidentes' => $incidente,
            'fecha' => $date
        ]);
    }

    public function registrar(Request $request){
        try{
            $id_rr = DB::table('reporte_radio')->insertGetId([
                'fecha' => $request->fecha,
                'id_area' => $request->area,
                'id_unidad' => $request->unidad,
                'id_incidente' => $request->incidente,
                'ubicacion' => $request->ubicacion,
                'created_user' => Auth::id()
            ]);

            if($request->incidente == 35){
                return redirect('/')->with(['success' => 'Los datos se guardaron exitosamente'])->withInput();
            }else{
                $folio_num = DB::table('folios')
                    ->select(DB::raw('max(actual_num) as actual_num'))
                    ->where('id_area',$request->area)->get();

                $area = DB::table('catalogos')
                    ->select('id','descripcion')
                    ->where('id',$request->area)
                    ->first();
                
                if($folio_num == null) $folio_num = 1;
                else $folio_num = $folio_num[0]->actual_num + 1;

                $folio = substr($area->descripcion,0,1);
                if($folio_num > 0 && $folio_num < 10) $folio = $folio.'000'.$folio_num;
                else if($folio_num > 9 && $folio_num < 100) $folio = $folio.'00'.$folio_num;
                else if($folio_num > 99 && $folio_num < 1000) $folio = $folio.'0'.$folio_num;
                else $folio = $folio.$folio_num;

                $id_folio = DB::table('folios')->insertGetId([
                    'id_area' => $request->area,
                    'actual_num' => $folio_num,
                    'folio' => $folio
                ]);

                $id = DB::table('etapas')->insertGetId([
                    'id_reporte_radio' => $id_rr,
                    'id_folio' => $id_folio,
                    'status' => 0,
                    'created_user' => Auth::id()
                ]);

                return redirect()->route('etapas', ['id_etapa' => $id])->with(['success' => 'Los datos se guardaron exitosamente'])->withInput();
            }
        }catch(QueryException $e){
            return redirect('/')->with(['error' => 'Ocurrio un error al guardar'])->withInput();
        }
    }
}
