<?php

namespace SAI\Http\Controllers\Personal;

use Illuminate\Http\Request;
use SAI\Http\Controllers\Controller;
use DB;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Hash;
use Crypt;

class PersonalController extends Controller
{
    public function index($correoInstitucional)
    {
        $infoPersonal = DB::table('tlv_1821_u')->where('correoInstitucional', $correoInstitucional)->get();
        return view('actualizarPersonal')->with('infoPersonal', $infoPersonal);
    }

    public function guardarCambios(Request $request, $correoInstitucional)
    {
        if(isset($_POST['cancelar'])){
            return Redirect::to('/consultaPersonal');
        }else{
            $data = array();
            if($request->password != null){
                $data['password'] = Crypt::encryptString($request->input('password'));
            }else if($request->rol != null){
                $data['idRol'] = $request->rol;
            }else if($request->area != null){
                $data['idarea'] = $request->area;
            }else if($request->estatus != null){
                $data['status'] = $request->estatus;
            }else if($request->telefono != null){
                $data['telefono'] = $request->telefono;
            }

            DB::table('tlv_1821_u')->where('correoInstitucional',$correoInstitucional)->update($data);
            Alert::success('Usuario Actualizado', 'Usuario actualizado correctamente');
            return Redirect::to('/consultaPersonal');
        }
    }
}
