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
            $id = DB::table('reporte_radio')->insertGetId([
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
                return redirect()->route('etapas', ['id_reporte_radio' => $id])->with(['success' => 'Los datos se guardaron exitosamente'])->withInput();
            }
        }catch(QueryException $e){
            return redirect('/')->with(['error' => 'Ocurrio un error al guardar'])->withInput();
        }
    }
}
