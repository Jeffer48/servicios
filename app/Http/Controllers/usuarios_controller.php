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

        $personal = DB::table('personal')
            ->select('id',DB::raw('concat(nombre," ",apellido_p," ",apellido_m) as nombre'))
            ->where('deleted_at', null)->orderBy('nombre')->get();

        return view('usuarios',[
            'tipo' => $tipo,
            'personal' => $personal
        ]);
    }

    public function getUsuarios(Request $request){
        $usuarios = DB::table('adm_user as au')
            ->select('au.id',DB::raw('case 
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
            $btnEditar = dataTableHelper::btnOptEdit("updateUser(".$d->id.")");
            $num = $d->deleted_at == null ? "0" : "1";
            $btnModEstatus = dataTableHelper::btnChangeStatus($d->deleted_at,"changeEstate(".$d->id.")");
            $opciones = $btnEditar.$btnModEstatus;

            $ds = array(
                $d->nombre,
                $d->descripcion,
                $d->email,
                $d->deleted_at == null ? 'Activo' : 'Inactivo',
                $opciones
            );
            $dataSet[] = $ds;
        }

        return $dataSet;
    }

    public function saveUser(Request $request){
        try{
            $userExists = DB::table('adm_user')->where('username',$request->usuario)->where('deleted_at',null)->count();
            $emailExists = DB::table('adm_user')->where('email',$request->email)->where('deleted_at',null)->count();

            if($userExists > 0) return array("El nombre de usuario ya esta en uso","Haz click para cerrar","error",0,"");
            else if($emailExists > 0) return array("El correo ya esta en uso","Haz click para cerrar","error",0,"");
            else{
                if($request->id_personal == ""){
                    DB::table('adm_user')->insert([
                        'id_tipo' => $request->id_rol,
                        'id_personal' => null,
                        'nombre' => $request->nombre,
                        'apellido_p' => $request->apellido_p,
                        'apellido_m' => $request->apellido_m,
                        'username' => $request->usuario,
                        'email' => $request->email == "" ? null : $request->email,
                        'password' => $request->password,
                        'created_user' => Auth::id()
                    ]);
                }else{
                    DB::table('adm_user')->insert([
                        'id_tipo' => $request->id_rol,
                        'id_personal' => $request->id_personal,
                        'nombre' => null,
                        'apellido_p' => null,
                        'apellido_m' => null,
                        'username' => $request->usuario,
                        'email' => $request->email == "" ? null : $request->email,
                        'password' => bcrypt($request->password),
                        'created_user' => Auth::id()
                    ]);
                }

                return array("Usuario creado correctamente","Haz click para cerrar","success",1,"");
            }
        }catch(QueryException $e){
            return array("Ha ocurrido un error","Haz click para cerrar","error",1,"");
        }
    }

    public function changeEstate(Request $request){
        try{
            $id = $request->id;
            $fecha = null;
            $usuario = null;
            if(DB::table('adm_user')->where('id',$id)->where('deleted_at', null)->count() > 0){
                $fecha = now();
                $usuario = Auth::id();
            }

            DB::table('adm_user')
                ->where('id',$id)
                ->update([
                    'deleted_at' => $fecha,
                    'deleted_user' => $usuario
                ]);

            return array("Usuario actualizado correctamente","Haz click para cerrar","success",1,"");
        }catch(QueryException $e){
            return array("Ha ocurrido un error","Haz click para cerrar","error",1,"");
        }
    }

    public function userToUpdate(Request $request){
        $usuarios = DB::table('adm_user')
            ->select('id_personal','id_tipo','username','nombre','apellido_p','apellido_m','email')
            ->where('id', $request->id)
            ->first();

        $dataSet = array(
            $usuarios->id_personal,
            $usuarios->id_tipo,
            $usuarios->username,
            $usuarios->nombre == null ? "" : $usuarios->nombre,
            $usuarios->apellido_p == null ? "" : $usuarios->apellido_p,
            $usuarios->apellido_m == null ? "" : $usuarios->apellido_m,
            $usuarios->email
        );
    
        return $dataSet;
    }

    public function updateUser(Request $request){
        try{
            $query = 'call existent_user_conflict('.$request->id.','.$request->id_personal.',"'.$request->email.'","'.$request->username.'")';
            $result = DB::select($query);

            if(count($result) > 0) return array($result[0]->error,"Haga click para cerrar","warning",0,"");
            else{
                if($request->id_personal > 0){
                    DB::table('adm_user')
                        ->where('id', $request->id)
                        ->update([
                            'id_personal' => $request->id_personal,
                            'username' => $request->username,
                            'email' => $request->email,
                            'id_tipo' => $request->id_tipo
                        ]);
                }
                else{
                    DB::table('adm_user')
                        ->where('id', $request->id)
                        ->update([
                            'nombre' => $request->nombre == null ? '' : $request->nombre,
                            'apellido_p' => $request->apellido_p == null ? '' : $request->apellido_p,
                            'apellido_m' => $request->apellido_m == null ? '' : $request->apellido_m,
                            'username' => $request->username,
                            'email' => $request->email,
                            'id_tipo' => $request->id_tipo
                        ]);
                }

                return array("Usuario actualizado!","Haz click para cerrar","success",1,"");
            }
        }catch(QueryException $e){
            return array("Ha ocurrido un error","Haz click para cerrar","error",1,"");
        }
    }
}
