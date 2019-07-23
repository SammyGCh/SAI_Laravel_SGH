<?php

namespace SAI\Http\Controllers\AltaTramite;

use Illuminate\Http\Request;
use SAI\Http\Controllers\Controller;
use DB;
use Session;
use RealRashid\SweetAlert\Facades\Alert;

class AltaTramiteController extends Controller
{
    protected $data_idtramite = 0;

    public function index()
	{
        $all_tipoTramite_info=DB::table('tipotramite')->get();
		return view('altatramite')->with('all_tipoTramite_info',$all_tipoTramite_info);
    }

    public function generatorIdTramite(){
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

        $data_idtramite =$user_area.$numIdArea_ramdon;

        $info_idTramite=DB::table('tlv_1821_lr')
        ->where('idListaReportes',$data_idtramite)->first();

        if($info_idTramite!=null){
        $numero_ramdon = rand(3,999);
        $data_idtramite =$user_area.$$numero_ramdon;
        } else{
            $data_idtramite =$user_area.$numero_ramdon;
        }

        return $data_idtramite;

    }



    public function AltaTramite(Request $request){

        $email= Session::get('correoInstitucional');
        $data_idtramite = $this->generatorIdTramite();
        $idarea = DB::table('tlv_1821_u')
        -> where('correoInstitucional',$email)->first();
        $user_area = $idarea->idarea;

        $data_tramite = array();
        $data_tramite['correoInstitucional']=$email;
        $data_tramite['idarea']=$user_area;
        $data_tramite['idtramites']=$data_idtramite;
        $data_tramite['idtipoTramite']=$request->tipoTramite;
        $data_tramite['nombre']=$request->nombre;
        $data_tramite['destinatario']=$request->destinatario;
        $data_tramite['tiempoRespuesta']=$request->tiempoRespuesta;
        $data_tramite['vigencia']=$request->vigencia;
        $data_tramite['costo']=$request->costo;
        $data_tramite['fundamentosJuridicos']=$request->fundamentosJuridicos;
        $data_tramite['status']=$request->estatus;
        $data_tramite['requisitos']=$request->requisitos;
        $data_tramite['descripcion']=$request->descripcion;
        $data_tramite['formato']=$request->adjunto;
        DB::table('tlv_1821_tr')->insert($data_tramite);
        Alert::success('Tramite Agregado', 'Tramite Agregado Correctamente');
        $all_tipoTramite_info=DB::table('tipotramite')->get();
        return view('altatramite')->with('all_tipoTramite_info',$all_tipoTramite_info);

    }
}
