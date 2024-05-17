<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Helpers\dataTableHelper;

class reportes_controller extends Controller
{
    public function index(){
        return view('reportes');
    }

    public function getReportes(){
        $radio = DB::table('vw_reporte_radio')
            ->select('id','folio','unidad','incidente','fecha','usuario','estado')
            ->where('deleted_at', null)
            ->orderBy('fecha', 'ASC')
            ->get();

        $dataSet = array();
        foreach($radio as $d){
            $btnView = dataTableHelper::btnViewServicio($d->id);
            $btnEdit = dataTableHelper::btnEditServicio($d->id);
            $opciones = $btnView.$btnEdit;

            $ds = array(
                $d->folio,
                $d->unidad,
                $d->incidente,
                $d->fecha,
                $d->usuario,
                $d->estado,
                $opciones
            );
            $dataSet[] = $ds;
        }
    
        return $dataSet;
    }

    public function getViewServices(Request $request){
        $servicio = DB::table('vw_etapas')
            ->where('id', $request->id)
            ->first();

        return $servicio;
    }
}
