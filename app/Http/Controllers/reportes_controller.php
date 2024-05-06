<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class reportes_controller extends Controller
{
    public function index(){
        return view('reportes');
    }

    public function getReportes(){
        $radio = DB::table('vw_reporte_radio')
            ->select('id','area','unidad','incidente','ubicacion','fecha','usuario')
            ->where('deleted_at', null)
            ->orderBy('fecha', 'ASC')
            ->get();

        $dataSet = array();
        foreach($radio as $d){
            $ds = array(
                $d->area,
                $d->unidad,
                $d->incidente,
                $d->ubicacion,
                $d->fecha,
                $d->usuario
            );
            $dataSet[] = $ds;
        }
    
        return $dataSet;
    }
}
