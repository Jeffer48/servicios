<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

        return view('catalogos',[
            'catalogos' => $catalogo,
            'grupos' => $grupos,
            'opt' => $opt
        ]);
    }
}
