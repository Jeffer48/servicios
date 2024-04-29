<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Helpers\dataTableHelper;

class usuarios_controller extends Controller
{
    public function index(){
        $tipo = DB::table('adm_catalogos')
            ->select('id','descripcion')
            ->where('id_grupo',1)
            ->get();

        return view('usuarios',[
            'tipo' => $tipo
        ]);
    }

    public function getUsuarios(Request $request){
        $usuarios = DB::table('adm_user as au')
            ->select(DB::raw('case 
                    when au.id_personal is null 
                    then concat(au.nombre," ",au.apellido_p," ",au.apellido_m)
                    else concat(p.nombre," ",p.apellido_p," ",p.apellido_m)
                end as nombre'),'ac.descripcion','au.email','au.deleted_at','au.id_tipo')
            ->leftjoin('personal as p', 'au.id_personal', 'p.id')
            ->leftjoin('adm_catalogos as ac', 'au.id_tipo', 'ac.id')
            ->get();
        
        if($request->id_tipo != "" && $request->id_tipo != "0") $usuarios = $usuarios->where('id_tipo',$request->id_tipo);
        if($request->id_estado == "1") $usuarios = $usuarios->where('deleted_at',null);
        if($request->id_estado == "2") $usuarios = $usuarios->where('deleted_at','!=',null);

        $dataSet = array();
        foreach($usuarios as $d){
            $btnEditar = dataTableHelper::btnOptEdit("");
            $num = $d->deleted_at == null ? "0" : "1";
            $btnModEstatus = dataTableHelper::btnChangeStatus($d->deleted_at,"");
            $opciones = $btnEditar.$btnModEstatus;

            $ds = array(
                $d->nombre,
                $d->descripcion,
                $d->deleted_at == null ? 'Activo' : 'Inactivo',
                $opciones
            );
            $dataSet[] = $ds;
        }

        return $dataSet;
    }
}
