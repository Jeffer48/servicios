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
        $date = date('Y-m-d H:i:s', time());

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
            $estatus = $request->incidente == 35 ? 0 : 1;
            $id_rr = DB::table('reporte_radio')->insertGetId([
                'fecha' => $request->fecha,
                'id_area' => $request->area,
                'id_unidad' => $request->unidad,
                'id_incidente' => $request->incidente,
                'ubicacion' => $request->ubicacion,
                'status' => $estatus,
                'created_user' => Auth::id()
            ]);

            if($request->incidente == 35){
                return redirect('/')->with(['success' => 'Los datos se guardaron exitosamente'])->withInput();
            }else{
                $folio = DB::select('call crearfolio(?)', [$request->area]);
                
                $id = DB::table('etapas')->insertGetId([
                    'id_reporte_radio' => $id_rr,
                    'id_folio' => $folio[0]->id,
                    'status' => 0,
                    'created_user' => Auth::id(),
                    'updated_user' => Auth::id()
                ]);
                
                return redirect()->route('etapas', ['etapa' => $id])->with(['success' => 'Los datos se guardaron exitosamente'])->withInput();
            }
        }catch(QueryException $e){
            return redirect('/')->with(['error' => 'Ocurrio un error al guardar'])->withInput();
        }
    }
}
