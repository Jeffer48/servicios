<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Helpers\dataTableHelper;

class catalogos_controller extends Controller
{
    public function catalogo(Request $request){
        $catalogo = '';
        $opt = 0;

        if($request->id_grupo == null||$request->id_grupo == 0){
            $catalogo = DB::table('catalogos as c')
                ->select('c.id','g.grupo','c.descripcion','c.deleted_at')
                ->join('grupos as g', 'c.id_grupo', '=', 'g.id')
                ->orderBy('grupo', 'ASC')->orderBy('descripcion', 'ASC')
                ->get();
        }else{
            $opt = $request->id_grupo;
            $catalogo = DB::table('catalogos as c')
                ->select('c.id','g.grupo','c.descripcion','c.deleted_at')
                ->join('grupos as g', 'c.id_grupo', '=', 'g.id')
                ->where('c.id_grupo', '=', $opt)
                ->orderBy('grupo', 'ASC')->orderBy('descripcion', 'ASC')
                ->get();
        }

        $grupos = DB::table('grupos')
            ->select('id','grupo')
            ->where('deleted_at')
            ->orderBy('grupo')
            ->get();

        return view('catalogos.catalogos',[
            'catalogos' => $catalogo,
            'grupos' => $grupos,
            'opt' => $opt
        ]);
    }

    public function personal(Request $request){
        $puesto = DB::table('catalogos')
            ->select('id','descripcion')
            ->where('id_grupo', 13)
            ->get();

        $turno = DB::table('catalogos')
            ->select('id','descripcion')
            ->where('id_grupo', 4)
            ->get();

        return view('catalogos.personal', [
            'puesto' => $puesto,
            'turno' => $turno,
            'opt' => 0
        ]);
    }

    public function getPersonal(Request $request){
        $personal = DB::table('vw_personal')
            ->select('id','nombre','apellido_p','apellido_m','id_tipo','puesto','id_turno','turno','deleted_at')
            ->orderBy('nombre')
            ->get();

        if($request->id_puesto != "" && $request->id_puesto != "0") $personal = $personal->where('id_tipo',$request->id_puesto);
        if($request->id_turno != "" && $request->id_turno != "0") $personal = $personal->where('id_turno',$request->id_turno);
        if($request->id_estado == "1") $personal = $personal->where('deleted_at',null);
        if($request->id_estado == "2") $personal = $personal->where('deleted_at','!=',null);

        $dataSet = array();
        foreach($personal as $d){
            $btnEditar = dataTableHelper::btnOptEdit("btnEditPersonal(".$d->id.",'".$d->nombre."','".$d->apellido_m."','".$d->apellido_p."',".$d->id_tipo.",".$d->id_turno.")");
            $btnModEstatus = dataTableHelper::btnChangeStatus($d->deleted_at == null ? true : false,"btnActivarBorrar(".$d->id.",'personal',0)");
            $opciones = $btnEditar.$btnModEstatus;

            $ds = array(
                $d->nombre." ".$d->apellido_p." ".$d->apellido_m,
                $d->puesto,
                $d->turno,
                $d->deleted_at == null ? 'Activo' : 'Inactivo',
                $opciones
            );
            $dataSet[] = $ds;
        }

        return $dataSet;
    }

    public function grupos(){
        $gruposAll = DB::table('grupos')
            ->select('id','grupo','deleted_at')
            ->orderBy('grupo')
            ->get();

        return view('catalogos.grupos', [
            'gruposAll' => $gruposAll,
            'opt' => 0
        ]);
    }

    public function editar(Request $request){
        try{
            if($request->tabla == 'catalogos'){
                DB::table('catalogos')
                    ->where('id', $request->id)
                    ->update(['descripcion' => $request->nuevo]);
            }
            if($request->tabla == 'grupos'){
                DB::table('grupos')
                    ->where('id', $request->id)
                    ->update(['grupo' => $request->nuevo]);
            }
            if($request->tabla == 'personal'){
                DB::table('personal')
                    ->where('id', $request->id)
                    ->update([
                        'nombre' => $request->nombre,
                        'apellido_p' => $request->apellido_p,
                        'apellido_m' => $request->apellido_m,
                        'id_tipo' => $request->id_tipo,
                        'id_turno' => $request->id_turno,
                    ]);
            }

            return 1;
        }catch(QueryException $e){
            return 0;
        }
    }

    public function eliminar(Request $request){
        try{
            if($request->tabla == 'catalogos'){
                DB::table('catalogos')
                    ->where('id', $request->id)
                    ->update(['deleted_at' => now()]);

                return 1;
            }
            if($request->tabla == 'personal'){
                DB::table('personal')
                    ->where('id', $request->id)
                    ->update(['deleted_at' => now()]);

                return 1;
            }
            if($request->tabla == 'grupos'){
                $cantidad = DB::table('catalogos')
                    ->select('id')
                    ->where('id_grupo', $request->id)
                    ->get();

                if(count($cantidad) > 0) return 2; //REVISAR!!!!
                else {
                    DB::table('grupos')
                        ->where('id', $request->id)
                        ->update(['deleted_at' => now()]);

                    return 1;
                }
            }

        }catch(QueryException $e){
            return 0;
        }
    }

    public function activar(Request $request){
        try{
            if($request->tabla == 'catalogos'){
                DB::table('catalogos')
                    ->where('id', $request->id)
                    ->update(['deleted_at' => null]);
            }
            if($request->tabla == 'personal'){
                DB::table('personal')
                    ->where('id', $request->id)
                    ->update(['deleted_at' => null]);
            }
            if($request->tabla == 'grupos'){
                DB::table('grupos')
                    ->where('id', $request->id)
                    ->update(['deleted_at' => null]);
            }

            return 1;
        }catch(QueryException $e){
            return 0;
        }
    }

    public function guardar(Request $request){
        if($request->id_grupo == 0){
            try{
                DB::table('grupos')->insert([
                    'grupo' => $request->nuevo,
                    'created_user' => Auth::id()
                ]);

                return 1;
            }catch(QueryException $e){
                return 0;
            }
        }else{
            try{
                DB::table('catalogos')->insert([
                    'descripcion' => $request->nuevo,
                    'created_user' => Auth::id(),
                    'id_grupo' => $request->id_grupo
                ]);

                return 1;
            }catch(QueryException $e){
                return 0;
            }
        }
    }

    public function guardarPersonal(Request $request){
        $nombre = $request->nombre;
        $apellido_p = $request->apellido_p;
        $apellido_m = $request->apellido_m;
        $id_puesto = $request->id_puesto;
        $id_turno = $request->id_turno;

        try{
            if(DB::table('personal')->where('nombre', $nombre)->where('apellido_p', $apellido_p)->where('apellido_m', $apellido_m)->count() == 0){
                DB::table('personal')->insert([
                    'nombre' => $nombre,
                    'apellido_p' => $apellido_p,
                    'apellido_m' => $apellido_m,
                    'id_tipo' => $id_puesto,
                    'id_turno' => $id_turno,
                    'created_user' => Auth::id()
                ]);
                
                return array("El personal fue agregado!!","Haz click para cerrar","success");
            }else return array("El personal ya existe","Haz click para cerrar","warning");
        }catch(QueryException $e){
            return array("Ha ocurrido un error","Haz click para cerrar","error");
        }
    }
}
