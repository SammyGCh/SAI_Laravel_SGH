<?php

namespace SAI\Http\Controllers\ListaReporte;

use Illuminate\Http\Request;
use SAI\Http\Controllers\Controller;
use DB;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;

class ListaReporteController extends Controller
{
    public function index($idlistaReporte)
    {
        $listasReportes = DB::table('tlv_1821_lr')->where('idlistaReportes',$idlistaReporte)->get();
        return view('editarListaReporte')->with('listasReportes',$listasReportes);
    }

    public function guardarCambios(Request $request, $idlistaReporte)
    {
        if(isset($_POST['cancelar'])){
            return Redirect::to('/consultadeReportes');
        }else{
            $data=array();
            $data['status']=$request->estatus;
            $data['observaciones']=$request->observaciones;
            $data['periodoAtencion']=$request->periodoAtencion;
     
            DB::table('tlv_1821_lr')->where('idlistaReportes',$idlistaReporte)->update($data);
            Alert::success('Reporte Actualizado', 'Reporte Actualizado Correctamente');
            return Redirect::to('/consultadeReportes');
        }
       
    }


    
}
