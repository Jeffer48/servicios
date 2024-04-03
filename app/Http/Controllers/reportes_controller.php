<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class reportes_controller extends Controller
{
    public function index(){
        $radio = DB::table('vw_reporte_radio')
            ->select('id','area','unidad','incidente','ubicacion','fecha','usuario')
            ->where('deleted_at', null)
            ->orderBy('fecha', 'ASC')
            ->get();

        return view('reportes',[
            'radio' => $radio
        ]);
    }
}
