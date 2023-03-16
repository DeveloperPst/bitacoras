<?php

namespace App\Http\Controllers;

use App\Models\Bit_Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class BitUsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     //FUNCIONALIDAD PARA REGISTRAR USUARIOS LACALDERON 14/02/2023
     public function registro_usuario(Request $request)
     {
         $datosTipo = request()->except('_token');
         DB::table('dxpst.bit_usuario')->insert([
             'DOCUMENTO_USUARIO' => $datosTipo['DOCUMENTO_USUARIO'],
             'NOMBRES_USUARIO' => $datosTipo['NOMBRES_USUARIO'],
             'APELLIDOS_USUARIO' => $datosTipo['APELLIDOS_USUARIO'],
             'CORREO_USUARIO' => $datosTipo['CORREO_USUARIO'],
             'CONTRASENA_USUARIO' => $datosTipo['CONTRASENA_USUARIO'],
             'ID_PERFIL' => 1,
             'ID_ROL_USUARIO' => 1,
             'ESTADO_USUARIO' => 1,
         ]);
         return redirect('listado_usuarios');
     }

     //FUNCIONALIDAD PARA VALIDAR LAS CREDENCIALES DE INICIO DE SESIÓN LACALDERON 14/02/2023
     public function logueo(Request $request)
     {
        $credenciales = [
            "DOCUMENTO_USUARIO" => $request->documento_usuario,
            "CONTRASENA_USUARIO" => $request->contrasena_usuario
        ];

        $data = Bit_Usuario::select('DOCUMENTO_USUARIO')
        ->where('DOCUMENTO_USUARIO', '=', $credenciales['DOCUMENTO_USUARIO'])
        ->where('CONTRASENA_USUARIO', '=', $credenciales['CONTRASENA_USUARIO'])
        ->where('ESTADO_USUARIO', '=', 1)
        ->get();

        $credenciales_conc = '[{"documento_usuario":"'.$credenciales["DOCUMENTO_USUARIO"].'"}]';

        if($credenciales_conc == $data){

            $data2 = DB::table('dxpst.bit_turno_activo')
            ->select('id_turno_activo')
            ->orderBy('id_turno_activo', 'desc')
            ->limit(1)
            ->get();

            $data3 = DB::table('dxpst.bit_turno_activo')
            ->select('fecha_registro')
            ->orderBy('id_turno_activo', 'desc')
            ->limit(1)
            ->get();
    
            session_start();
            $result2 = json_decode($data2, TRUE);
            $turno_actual = implode(" ", $result2[0]);
            $_SESSION['turno_activo'] = $turno_actual;
            $_SESSION['mensaje'] = 1;

            $result3 = json_decode($data3, TRUE);
            $fecha_registro = implode(" ", $result3[0]);
            $_SESSION['fecha_registro'] = $fecha_registro;

            $_SESSION["usuario"] = $credenciales['DOCUMENTO_USUARIO'];

            $this->registrar_movimiento(1);

            return redirect('turnoactivo');
        } else {
            return view('auth.login');
        }
     }
    
     //FUNCIONALIDAD PARA LISTAR USUARIOS LACALDERON 14/02/2023
     public function usuarios(Request $request){
         $data = Bit_Usuario::select('*')
         ->orderBy('id_usuario')
         ->get();
         return view('usuarios')->with('data', $data);
     }

    //FUNCIONALIDAD PARA CONSULTAR USUARIOS ESPECÍFICO LACALDERON 24/02/2023
     public function usuario_especifico(Request $request)
    {
        $datosTipo = request();
        $data = DB::table('dxpst.BIT_USUARIO')
        ->where('ID_USUARIO', '=', $datosTipo['id'])
        ->get();

        return view('editar_usuario', ['data' => $data]);
    }

    //FUNCIONALIDAD PARA CONSULTAR USUARIOS ESPECÍFICOS Y REDIRECCIONAR A RESTABLECER CONTRASENA LACALDERON 24/02/2023
    public function usuario_especifico_2(Request $request)
    {
        $datosTipo = request();
        $data = DB::table('dxpst.BIT_USUARIO')
        ->where('ID_USUARIO', '=', $datosTipo['id'])
        ->get();

        return view('restablecer_contrasena', ['data' => $data]);
    }

    //FUNCIONALIDAD PARA EDITAR USUARIOS LACALDERON 24/02/2023
    public function editar_usuario(Request $request)
    {
        $datosTipo = request()->except('_token');
        DB::table('dxpst.BIT_USUARIO')
        ->where('ID_USUARIO', '=', $datosTipo['ID_USUARIO'])
        ->update([
            'DOCUMENTO_USUARIO' => $datosTipo['DOCUMENTO_USUARIO'],
            'NOMBRES_USUARIO' => $datosTipo['NOMBRES_USUARIO'],
            'APELLIDOS_USUARIO' => $datosTipo['APELLIDOS_USUARIO'],
            'CORREO_USUARIO' => $datosTipo['CORREO_USUARIO']
        ]);

        return redirect('/listado_usuarios');
    }

    //FUNCIONALIDAD PARA INACTIVAR USUARIO ESPECÍFICO LACALDERON 24/02/2023
    public function inactivar_usuario(Request $request)
    {
        $datosTipo = request();
        $data = DB::table('dxpst.BIT_USUARIO')
        ->where('ID_USUARIO', '=', $datosTipo['id'])
        ->update([
            'ESTADO_USUARIO' => 2
        ]);

        return redirect('listado_usuarios');
    }

    //FUNCIONALIDAD PARA ACTIVAR USUARIO ESPECÍFICO LACALDERON 24/02/2023
    public function activar_usuario(Request $request)
    {
        $datosTipo = request();
        $data = DB::table('dxpst.BIT_USUARIO')
        ->where('ID_USUARIO', '=', $datosTipo['id'])
        ->update([
            'ESTADO_USUARIO' => 1 
        ]);

        return redirect('listado_usuarios');
    }

    //FUNCIONALIDAD PARA RESTABLECER CREDENCIALES DE ACCESO DE USUARIO LACALDERON 24/02/2023
    public function restablecer_contrasena(Request $request)
    {
        $datosTipo = request()->except('_token');
        if($datosTipo['CONTRASENA_USUARIO'] == $datosTipo['CONFIRMAR_CONTRASENA'])
        {
        $data = DB::table('dxpst.BIT_USUARIO')
        ->where('ID_USUARIO', '=', $datosTipo['ID_USUARIO'])
        ->update([
            'CONTRASENA_USUARIO' => $datosTipo['CONTRASENA_USUARIO'],
        ]);
        
        return redirect('listado_usuarios');
        } 
        else
        {
            return redirect('listado_usuarios');
        }
    }

    //FUNCIONALIDAD PARA INSERTAR USUARIOS LACALDERON 14/02/2023
    public function store(Request $request)
    {
        $datosUsuario = request()->except('_token', 'password_confirmation');
        Bit_Usuario::insert($datosUsuario);
        return view('auth.login');

    }

    //FUNCIÓN PARA LISTAR AGENTES LACALDERON 20/02/2023
     public function consulta_agentes(Request $request)
     {
         $data = DB::table('dxpst.bit_agente')->get();
         $result = json_decode($data, true);
         return view('agentes', ['result' => $result]);
     }
 
     //FUNCIÓN PARA REGISTRAR AGENTES LACALDERON 16/02/2023
     public function registro_agente(Request $request)
     {
         $datosTipo = request()->except('_token');
         DB::table('dxpst.bit_agente')->insert([
             'nro_documento' => $datosTipo['documento'],
             'placa_agente' => $datosTipo['placa'],
             'nombre_agente' => $datosTipo['nombre'],
             'estado_agente' => 1,
         ]);
         return redirect('agentes');
     }

     
    //FUNCIONALIDAD PARA INACTIVAR AGENTE ESPECÍFICO LACALDERON 24/02/2023
    public function inactivar_agente(Request $request)
    {
        $datosTipo = request();
        $data = DB::table('dxpst.BIT_AGENTE')
        ->where('ID_AGENTE', '=', $datosTipo['id'])
        ->update([
            'ESTADO_AGENTE' => 2
        ]);
        return redirect('agentes');
    }

    //FUNCIONALIDAD PARA ACTIVAR AGENTE ESPECÍFICO LACALDERON 24/02/2023
    public function activar_agente(Request $request)
    {
        $datosTipo = request();
        $data = DB::table('dxpst.BIT_AGENTE')
        ->where('ID_AGENTE', '=', $datosTipo['id'])
        ->update([
            'ESTADO_AGENTE' => 1 
        ]);
        return redirect('agentes');
    }

    //FUNCIONALIDAD PARA CONSULTAR AGENTE ESPECÍFICO LACALDERON 24/02/2023
    public function agente_especifico(Request $request)
    {
        $datosTipo = request();
        $data = DB::table('dxpst.BIT_AGENTE')
        ->where('ID_AGENTE', '=', $datosTipo['id'])
        ->get();

        return view('editar_agente', ['data' => $data]);
    }

    //FUNCIONALIDAD PARA EDITAR AGENTE ESPECÍFICO LACALDERON 24/02/2023
    public function editar_agente(Request $request)
    {
        $datosTipo = request()->except('_token');
        DB::table('dxpst.BIT_AGENTE')
        ->where('id_agente', '=', $datosTipo['id_agente'])
        ->update([
            'nro_documento' => $datosTipo['nro_documento'],
            'placa_agente' => $datosTipo['placa_agente'],
            'nombre_agente' => $datosTipo['nombre_agente']
        ]);

        return redirect('agentes');
    }

    // MÉTODO FUNCIONAL COMO TRIGGER PARA LLEVAR CONTROL DE INGRESOS A LA PLATAFORMA LACALDERON 13/03/2023
    public function registrar_movimiento($mov)
    {
        $movimiento = "";
        switch($mov){
            case 1:
                $movimiento = "Inicio_sesion";
            break;
            case 2:
                $movimiento = "Cierre_sesion";
            break;
        }

        $usuario = $_SESSION["usuario"];

        DB::table('dxpst.bit_movimientos')->insert([
            'id_usuario' => $usuario,
            'movimiento' => $movimiento
        ]);
    }
}
?>

