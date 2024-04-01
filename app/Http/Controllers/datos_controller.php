<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class datos_controller extends Controller
{
    public function index()
    {
        $reportes =DB::table('vw_reporte_radio_st')
            ->select('id','unidad','incidente','area')
            ->get();

        return $reportes;
    }
}
