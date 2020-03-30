<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Registros;
use Illuminate\Support\Facades\DB;

use App\Http\Requests\Registros_validaciones;
class Registro extends Controller
{
    //

    public function index()
    {
        return view('Registros_usuarios/registros');
    }

    public function Registrar_usuario(Registros_validaciones $request)
    {

        if($request->id_usuario != null){
            $usuario = DB::table('registros')
                ->where('ID_REGI',$request->id_usuario )
                ->update(['NOMBRE_REGI' => $request->nombre,
                            'RFC_REGI'    => $request->rfc,
                            'CORREO_REGI' => $request->correo,
                            'DIRECCION_REGI' => $request->direccion,
                            'COMENTARIOS_REGI' =>$request->comentario,
                            'LATIDTUD_REGI'   =>  $request->latitud,
                            'LONGITUD_REGI'   =>   $request->longitud
                        ]);
            return redirect('/lista');
        }else{
                $email=DB::table('registros')->where('CORREO_REGI',$request->correo)->first();
                $rfc=DB::table('registros')->where('RFC_REGI',$request->rfc)->first();

                if(($email == null) && ($rfc   == null)){
                    $registro = new Registros;
                    $registro->NOMBRE_REGI      =   $request->nombre;
                    $registro->RFC_REGI         =   $request->rfc;
                    $registro->CORREO_REGI      =   $request->correo;
                    $registro->DIRECCION_REGI   =   $request->direccion;
                    $registro->COMENTARIOS_REGI =   $request->comentario;
                    $registro->LATIDTUD_REGI    =   $request->latitud;
                    $registro->LONGITUD_REGI    =   $request->longitud;
                    $registro->save();
                    $mensaje = "usuario agregado correctamente";
                    $tipo = "1";
                    return redirect('/lista');
                }else{
                    $mensaje = "usuario ya fue agregado";
                    $tipo = "0";
                    return redirect('/')->with("mensaje", $mensaje)
                    ->with("tipo", $tipo);
                }
        }
    }

    public function lista_de_usuarios()
    {
        $lista=DB::table('registros')->get();
        return view('Registros_usuarios.lista_usuarios',['lista'=>$lista]);
    }

    public function eliminar_usuario($id_usuario){
        DB::table('registros')->where('ID_REGI', '=', $id_usuario)->delete();
        return redirect('/lista');
    }

    public function Actulizar_usuario(Request $request)
    {
        $id_usuario=$request->id_usuario;
        $usuario=DB::table('registros')->where('ID_REGI',$id_usuario)->first();
        return view('Registros_usuarios.registros',["usuario"=>$usuario]);
    }

    public function login_user()
    {
        return view('login.login');
    }
}
