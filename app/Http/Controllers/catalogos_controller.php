<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class catalogos_controller extends Controller
{
    public function index(Request $request){
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

    public function getPersonal(){
        $personal = DB::table('vw_personal')
            ->select('id','nombre','apellido_p','apellido_m','id_tipo','puesto','id_turno','turno','deleted_at')
            ->orderBy('nombre')
            ->get();

            $dataSet = array();
            foreach($personal as $d){
                $callFunction = "btnEditPersonal(".$d->id.",'".$d->nombre."','".$d->apellido_m."','".$d->apellido_p."',".$d->id_tipo.",".$d->id_turno.")";
                $btnEditar = '<button class="btn-no-style" onclick="'.$callFunction.'" data-bs-toggle="modal" data-bs-target="#editarPersonal">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                </svg>
            </button>';
                $btnModEstatus = "";
                if($d->deleted_at == null){
                    $btnModEstatus = '<button class="btn-no-style" onclick="btnActivarBorrar('.$d->id.',\'personal\',0)">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                        <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0"/>
                    </svg>
                </button>';
                }else{
                    $btnModEstatus = '<button class="btn-no-style" onclick="btnActivarBorrar('.$d->id.',\'personal\',1)">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-check-square" viewBox="0 0 16 16">
                        <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z"/>
                        <path d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425z"/>
                    </svg>
                </button>';
                }

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

    public function personal(){
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
