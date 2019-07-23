<?php

namespace SAI\Http\Controllers\ConsultaTramite;

use Illuminate\Http\Request;
use SAI\Http\Controllers\Controller;
use DB;
class ConsultaTramiteController extends Controller
{
    public function index()
    {
        $tramites_info=DB::table('tlv_1821_tr')->where('status','AC')->get();
        $tipo_de_tramite_info=DB::table('tipotramite')->get();
        $all_area_info = DB::table('tlv_1821_ar')->get();
        return view('consultaTramite')
        ->with('tramites_info',$tramites_info)
        ->with('tipo_de_tramite_info', $tipo_de_tramite_info)
        ->with('all_area_info', $all_area_info);
    }
}
