<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class datos_controller extends Controller
{
    public function reportes()
    {
        $reportes = DB::table('vw_reporte_radio')
            ->select('id','unidad','folio','area','incidente','fecha','status','deleted_at')
            ->where('status', 0)
            ->where('deleted_at', null)
            ->get();

        return $reportes;
    }

    public function desplazamiento(){
        $desplazamientos = DB::table('reporte_radio as rr')
            ->select('rr.id','c1.descripcion as area','c2.descripcion as unidad','rr.fecha')
            ->leftJoin('catalogos as c1', 'rr.id_area', 'c1.id')
            ->leftJoin('catalogos as c2', 'rr.id_unidad', 'c2.id')
            ->where('rr.status', 0)
            ->where('rr.id_incidente', 35)
            ->where('rr.deleted_at', null)
            ->get();

        return $desplazamientos;
    }

    public function terminarDesplazamiento(Request $request){
        try{
            date_default_timezone_set('America/Mexico_City');
            $date = date('Y-m-d H:i:s', time());

            DB::table('reporte_radio')
                ->where('id',$request->id)
                ->update([
                    'status' => 1,
                    'fecha_terminado' => $date
                ]);

            return array("Desplazamiento Terminado!","Haz click para cerrar","success",0,"");
        }catch(QueryException $e){
            return array("Ha ocurrido un error","Haz click para cerrar","error",1,"");
        }
    }

    public function datosUsuario(){
        $rol = DB::table('adm_catalogos')
            ->select('descripcion')
            ->where('id', auth()->user()->id_tipo)
            ->first();

        $user = DB::table('adm_user')
            ->select('username','email')
            ->where('id', auth()->user()->id)
            ->first();

        $dataSet = array(
            $rol->descripcion,
            $user->username,
            $user->email
        );

        return $dataSet;
    }

    public function actualizarUsuario(Request $request){
        try{
            $usuario = DB::table('adm_user')
                ->where('id', $request->id);

            $correo = DB::table('adm_user')
                ->where('id', '!=', $request->id)
                ->where('email', $request->email);

            $user = DB::table('adm_user')
                ->where('id', '!=', $request->id)
                ->where('username', $request->usuario);

            if($correo->count() > 0) return array("Correo en uso","Haz click para cerrar","warning",0,"");
            else if($user->count() > 0) return array("Nombre de usuario en uso","Haz click para cerrar","warning",0,"");
            else{
                if($usuario->count() > 0){
                    if($request->password == null){
                        $usuario->update([
                            'username' => $request->usuario,
                            'email' => $request->email
                        ]);
                    }
                    else{
                        $usuario->update([
                            'username' => $request->usuario,
                            'email' => $request->email,
                            'password' => bcrypt($request->password)
                        ]);
                    }

                    return array("Usuario actualizado","Haz click para cerrar","success",1," ");
                }else return array("Usuario no encontrado","Haz click para cerrar","warning",0,"");
            }
        }catch(QueryException $e){
            return array("Ha ocurrido un error","Haz click para cerrar","error",1,"");
        }
    }
}
