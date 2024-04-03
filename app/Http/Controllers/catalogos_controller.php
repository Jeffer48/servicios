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

        $gruposAll = DB::table('grupos')
            ->select('id','grupo','deleted_at')
            ->orderBy('grupo')
            ->get();

        return view('catalogos',[
            'catalogos' => $catalogo,
            'grupos' => $grupos,
            'gruposAll' => $gruposAll,
            'opt' => $opt
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
}
