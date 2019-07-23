<?php

namespace SAI\Http\Controllers\Tramites;

use Illuminate\Http\Request;
use SAI\Http\Controllers\Controller;
use DB;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;

class TramitesController extends Controller
{
    public function index($idtramites)
    {
        $infoTramites = DB::table('tlv_1821_tr')->where('idtramites',$idtramites)->get();
        return view('verMasTramites')->with('infoTramites',$infoTramites);
    }

    public function guardarCambios(Request $request, $idtramites)
    {
        if(isset($_POST['cancelar'])){
            return Redirect::to('/consultaTramite');
        }else{
            $data = array();
            $data['destinatario'] = $request->destinatario;
            $data['tiempoRespuesta'] = $request->tiempoRespuesta;
            $data['vigencia'] = $request->vigencia;
            $data['requisitos'] = $request->requisitos;
            $data['costo'] = $request->costo;
            $data['fundamentosJuridicos'] = $request->fundamentosJuridicos;
            $data['status'] = $request->estatus;
            $data['descripcion'] = $request->descripcion;
            $data['formato'] = $request->adjunto;

            DB::table('tlv_1821_tr')->where('idtramites',$idtramites)->update($data);
            Alert::success('Tramite Actualizado', 'Tramite Actualizado Correctamente');
            return Redirect::to('/consultaTramite');
        }
    }
}
