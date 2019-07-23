<?php

namespace SAI\Http\Controllers\ConsultaPersonal;

use Illuminate\Http\Request;
use SAI\Http\Controllers\Controller;
use DB;

class ConsultaPersonalController extends Controller
{
    public function index()
    {
        $all_personal_info = DB::table('tlv_1821_u')->get();
        $all_area_info = DB::table('tlv_1821_ar')->get();
        return view('consultaPersonal')
        ->with('all_personal_info',$all_personal_info)
        ->with('all_area_info', $all_area_info);
    }
}
