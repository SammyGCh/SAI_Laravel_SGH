<?php

namespace SAI\Http\Controllers\ConsultadeReportes;

use Illuminate\Http\Request;
use SAI\Http\Controllers\Controller;
use DB;

class ConsultadeReportesController extends Controller
{
    public function index()
    {
        $listado_reportes=DB::table('tlv_1821_lr')->where('status','AC')->get();
        return view('consultadeReportes')
        ->with('listado_reportes',$listado_reportes);
    }
}
