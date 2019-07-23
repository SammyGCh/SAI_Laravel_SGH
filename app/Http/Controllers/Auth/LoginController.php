<?php

namespace SAI\Http\Controllers\Auth;

use Auth;
use Session;
use SAI\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use Crypt;

class LoginController extends Controller
{
    public function __construc(){
        $this->middleware('guest', ['only'=>'showLogin']);
    }

    public function showLogin(){
        return view('layouts.loginSai');
    }


    public function login(Request $request)
    {
        $email = $request->correoInstitucional;
        $password = $request->password;
        $consulta = DB::table('tlv_1821_u')->where('correoInstitucional', $email)->where('status', 'AC')->first();
        $psAux = Crypt::decryptString($consulta->password);

        if($password == $psAux){
            $users=DB::table('tlv_1821_u')
            -> where('correoInstitucional',$email)
            ->first();

            if($users){
                Session::put('correoInstitucional',$users->correoInstitucional);
                Session::put('nombre',$users->nombre);
                Session::put('idRol',$users->idRol);
                Session::put('idarea',$users->idarea);
    
                if($users->idRol!=1){
                    return view('single_home') -> with('users',$users);
                }else{
                    return view('home') -> with('users',$users);
                }
    
            }            
        }else{
            return back()
            ->withErrors(['correoInstitucional'=>'Correo y/o Contraseña Son Incorrectos'])
            ->withInput(request(['correoInstitucional']));
        }
        
        /*$users = DB::select('SELECT * FROM tlv_1821_u WHERE correoInstitucional = \''.$email.'\'
        AND password = \''.$password.'\'');*/

        
        

 /*       if($users==null){
            return back()
            ->withErrors(['correoInstitucional'=>'Correo y/o Contraseña Son Incorrectos'])
            ->withInput(request(['correoInstitucional']));
   } */


        //return $users;
        return view('home') -> with('users',$users);
    }
    public function logout(){
        Session::flush();
        return Redirect::to('/');
    }
    /*public function login(){

    if(Auth::attempt($credentials))
        {
            return 'Sesion iniciada';
        }
        return back()
        ->withErrors(['correoInstitucional'=>'Correo y/o Contraseña Son Incorrectos'])
        ->withInput(request(['correoInstitucional']));
    }*/
}
