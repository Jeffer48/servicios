<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Helpers\dataTableHelper;

class catalogos_controller extends Controller
{
    public function catalogo(Request $request){
        $grupos = DB::table('grupos')
            ->select('id','grupo')
            ->where('deleted_at')
            ->orderBy('grupo')
            ->get();

        return view('catalogos.catalogos',[
            'grupos' => $grupos
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
            'turno' => $turno
        ]);
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

    public function getCatalogo(Request $request){
        $catalogo = DB::table('catalogos as c')
            ->select('c.id','c.id_grupo','g.grupo','c.descripcion','c.deleted_at')
            ->join('grupos as g', 'c.id_grupo', '=', 'g.id')
            ->orderBy('grupo', 'ASC')->orderBy('descripcion', 'ASC')
            ->get();

        if($request->id_grupo != "" && $request->id_grupo != "0") $catalogo = $catalogo->where('id_grupo',$request->id_grupo);
        if($request->id_estado == "1") $catalogo = $catalogo->where('deleted_at',null);
        if($request->id_estado == "2") $catalogo = $catalogo->where('deleted_at','!=',null);

        $dataSet = array();
        foreach($catalogo as $d){
            $btnEditar = dataTableHelper::btnOptEdit("btnEditar(".$d->id.",'catalogos')");
            $num = $d->deleted_at == null ? "0" : "1";
            $btnModEstatus = dataTableHelper::btnChangeStatus($d->deleted_at,"btnActivarBorrar(".$d->id.",'catalogos',".$num.")");
            $opciones = $btnEditar.$btnModEstatus;

            $ds = array(
                $d->grupo,
                $d->descripcion,
                $d->deleted_at == null ? 'Activo' : 'Inactivo',
                $opciones
            );
            $dataSet[] = $ds;
        }

        return $dataSet;
    }

    public function getGrupos(){
        $grupos = DB::table('grupos')
            ->select('id','grupo','deleted_at')
            ->orderBy('grupo')
            ->get();

        foreach($grupos as $d){
            $btnEditar = dataTableHelper::btnOptEdit("btnEditar(".$d->id.",'grupos')");
            $num = $d->deleted_at == null ? "0" : "1";
            $btnModEstatus = dataTableHelper::btnChangeStatus($d->deleted_at,"btnActivarBorrar(".$d->id.",'grupos',".$num.")");
            $opciones = $btnEditar.$btnModEstatus;

            $ds = array(
                $d->grupo,
                $d->deleted_at == null ? 'Activo' : 'Inactivo',
                $opciones
            );
            $dataSet[] = $ds;
        }

        return $dataSet;
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
            $num = $d->deleted_at == null ? "0" : "1";
            $btnModEstatus = dataTableHelper::btnChangeStatus($d->deleted_at,"btnActivarBorrar(".$d->id.",'personal',".$num.")");
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

            return array("El elemento fue actualizado!!","Haz click para cerrar","success",1,"");
        }catch(QueryException $e){
            return array("Ha ocurrido un error","Haz click para cerrar","error",1,"");
        }
    }

    public function eliminar(Request $request){
        try{
            $permitir = true;

            if($request->tabla == 'personal'){
                $cantidad = DB::table('adm_user')
                    ->where('id_personal', $request->id)
                    ->where('deleted_at', null)->count();

                if($cantidad > 0) $permitir = false;
            }
            if($request->tabla == 'grupos'){
                $cantidad = DB::table('catalogos')
                    ->where('id_grupo', $request->id)
                    ->where('deleted_at', null)->count();

                if($cantidad > 0) $permitir = false;
            }

            if($permitir){
                DB::table($request->tabla)
                    ->where('id', $request->id)
                    ->update(['deleted_at' => now()]);

                return array("El elemento fue eliminado!!","Haz click para cerrar","success",1,"");
            }else return array("El elemento no puede ser eliminado","Hay elementos dependientes","warning",0,"");

        }catch(QueryException $e){
            return array("Ha ocurrido un error","Haz click para cerrar","error",1,"");
        }
    }

    public function activar(Request $request){
        try{
            $permitir = true;
            $tabla = $request->tabla;
            if($request->tabla == 'catalogos'){
                $tabla = "catalogos";
                $cantidad = DB::table('catalogos as c')
                    ->join('grupos as g', 'c.id_grupo', '=', 'g.id')
                    ->where('c.id', $request->id)
                    ->where('g.deleted_at', '!=', null)->count();

                if($cantidad > 0) $permitir = false;
            }
            if($request->tabla == 'grupos') $tabla = "grupos";

            if($permitir){
                DB::table($request->tabla)
                ->where('id', $request->id)
                ->update(['deleted_at' => null]);

                return array("El ".$tabla." fue reactivado!!","Haz click para cerrar","success",1,"");
            }else return array("El grupo de este catalogo esta desactivado","Haz click para cerrar","warning",0,"");
        }catch(QueryException $e){
            return array("Ha ocurrido un error","Haz click para cerrar","error",1,"");
        }
    }

    public function guardar(Request $request){
        try{
            if($request->id_grupo == 0){
                DB::table('grupos')->insert([
                    'grupo' => $request->nuevo,
                    'created_user' => Auth::id()
                ]);
            }else{
                DB::table('catalogos')->insert([
                    'descripcion' => $request->nuevo,
                    'created_user' => Auth::id(),
                    'id_grupo' => $request->id_grupo
                ]);
            }

            return array("Guardado correctamente!!","Haz click para cerrar","success",1,"");
        }catch(QueryException $e){
            return array("Ha ocurrido un error","Haz click para cerrar","error",1,"");
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
                
                return array("El personal fue agregado!!","Haz click para cerrar","success",0,"");
            }else return array("El personal ya existe","Haz click para cerrar","warning",0,"");
        }catch(QueryException $e){
            return array("Ha ocurrido un error","Haz click para cerrar","error",0,"");
        }
    }
}
