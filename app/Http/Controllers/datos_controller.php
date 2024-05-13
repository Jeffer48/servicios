<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class datos_controller extends Controller
{
    public function index()
    {
        $reportes =DB::table('vw_radio_x_etapas')
            ->where('status', 0)
            ->where('deleted_at', null)
            ->get();

        return $reportes;
    }
}
