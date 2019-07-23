<?php

namespace SAI\Http\Controllers\AltaReporte;

use Illuminate\Http\Request;
use SAI\Http\Controllers\Controller;
use DB;
use Session;
use RealRashid\SweetAlert\Facades\Alert;

class AltaReporteController extends Controller
{
     protected $data_idarea = 0;

    public function index()
	{
		return view('altareporte');
    }

    public function generatorIdListaReporte(){
        $s_digito='';
        $email= Session::get('correoInstitucional');
        $idarea = DB::table('tlv_1821_u')
        -> where('correoInstitucional',$email)->first();
        $user_area = $idarea->idarea;
        $numero_ramdon = rand(3,999);
        if($numero_ramdon<=9){
            $s_digito="00";
            $numIdArea_ramdon= $s_digito.$numero_ramdon;
        } else if($numero_ramdon>=10 && $numero_ramdon<=99){
            $s_digito="0";
            $numIdArea_ramdon= $s_digito.$numero_ramdon;
        }else{
            $numIdArea_ramdon= $s_digito.$numero_ramdon;
        }

        $data_idarea =$user_area.$numIdArea_ramdon;

        $info_listaReporte=DB::table('tlv_1821_lr')
        ->where('idListaReportes',$data_idarea)->first();

        if($info_listaReporte!=null){
        $numero_ramdon = rand(3,999);
        $data_idarea =$user_area.$$numero_ramdon;
        } else{
            $data_idarea =$user_area.$numero_ramdon;
        }

        return $data_idarea;

    }

    public function AltaReporte(Request $request){
        $data_idarea = $this -> generatorIdListaReporte();
        $email= Session::get('correoInstitucional');
        $idarea = DB::table('tlv_1821_u')
        -> where('correoInstitucional',$email)->first();
        $user_area = $idarea->idarea;
        $data_reporte = array();
        $data_reporte['idlistaReportes']=$data_idarea;
        $data_reporte['idarea']=$user_area;
        $data_reporte['correoInstitucional']=$email;
        $data_reporte['nombre']=$request->nombre;
        $data_reporte['status']=$request->estatus;
        $data_reporte['observaciones']=$request->observaciones;
        $data_reporte['periodoAtencion']=$request->periodoAtencion;
        $data_reporte['formato']=$request->adjunto;
        DB::table('tlv_1821_lr')->insert($data_reporte);
        Alert::success('Reporte Agregado', 'Reporte Agregado Correctamente');
        return view('altareporte');

    }


}
