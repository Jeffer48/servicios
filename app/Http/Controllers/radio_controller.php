<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

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

    public function registrar(Request $request){
        
        $result = DB::table('reporte_radio')->insert([
            'fecha' => $request->fecha,
            'id_area' => $request->area,
            'id_unidad' => $request->unidad,
            'id_incidente' => $request->incidente,
            'ubicacion' => $request->ubicacion,
            'created_user' => Auth::id()
        ]);

        if($request->incidente == 35){
            if($result) return redirect('/')->with(['message' => 'Los datos se guardaron exitosamente'])->withInput();
            else return redirect('/')->withErrors(['message' => 'Ocurrio un error al guardar'])->withInput();
        }else{
            if($result) return redirect()->route('etapas', [
                    'fecha' => $request->fecha,
                    'id_area' => $request->area,
                    'id_unidad' => $request->unidad,
                    'id_incidente' => $request->incidente,
                    'ubicacion' => $request->ubicacion
                ])
                ->with(['message' => 'Los datos se guardaron exitosamente'])->withInput();
            else return redirect('/')->withErrors(['message' => 'Ocurrio un error al guardar'])->withInput();
        }
    }
}
