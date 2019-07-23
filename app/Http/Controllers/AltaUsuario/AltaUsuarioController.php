<?php

namespace SAI\Http\Controllers\AltaUsuario;

use Illuminate\Http\Request;
use SAI\Http\Controllers\Controller;
use DB;
use Session;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Hash;
use Crypt;

class AltaUsuarioController extends Controller
{
    public function index()
	{
        $all_area_info=DB::table('tlv_1821_ar')->get();
        return view('altausuario')->with('all_area_info',$all_area_info);
    }

    public function AltaUsuario(Request $request){

        $data=array();
        $data['correoInstitucional']=$request->correo;
        $data['password']= Crypt::encryptString($request->input('contrasenia'));
        $data['idRol']=$request->rol;
        $data['idarea']=$request->area;
        $data['nombre']=$request->nombre;
        $data['paterno']=$request->paterno;
        $data['materno']=$request->materno;
        $data['curp']=$request->curp;
        $data['telefono']=$request->telefono;
        $data['status']=$request->estatus;
        DB::table('tlv_1821_u')->insert($data);
        Alert::success('Usuario Agregado', 'Usuario Agregado Correctamente');
        //Session::put('message','Usuario Agregado Correctamente');
        $all_area_info=DB::table('tlv_1821_ar')->get();
        return view('altausuario')->with('all_area_info',$all_area_info);
    }
}
