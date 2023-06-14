<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Bit_Tipo_Accidente;
use Illuminate\Http\Request;

class BitTipos extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     // FUNCIÓN PARA CONSULTAR LOS REGISTROS DE LA TABLA BIT_TIPO_ACCIDENTE LACALDERON 16/02/2023
    public function consulta_tipo_accidente(Request $request)
    {
        $data = DB::table('dxpst.bit_tipo_accidente')
        ->orderBy('id_tipo_accidente', 'asc')
        ->get();
        $result = json_decode($data, true);
        return view('tipoaccidente', ['result' => $result]);
    }

    // FUNCIÓN PARA REGISTRO DE NUEVO TIPO EN LA TABLA BIT_TIPO_ACCIDENTE LACALDERON 17/02/2023
    public function registro_tipo_acc(Request $request)
    {
        $datosTipo = request()->except('_token');
        DB::table('dxpst.bit_tipo_accidente')->insert([
            'DESCRIPCION_TIPO_ACCIDENTE' => $datosTipo['descripcion'],
            'ESTADO' => 1
        ]);

        session_start();
        $_SESSION['mensaje'] = 6;
        return redirect('/tipo_accidente');
    }

    //FUNCIÓN PARA ELIMINAR TIPO_ACCIDENTE LACALDERON 20/02/2023
    public function eliminar_tipo_accidente(Request $request)
    {
        $datosTipo = request();
        $query = DB::table('dxpst.Bit_Tipo_Accidente')
        ->where('ID_TIPO_ACCIDENTE', '=', $datosTipo['id'])
        ->delete();

        session_start();

        if($query == false){ 
            $_SESSION['mensaje'] = 5;
            return redirect('/tipo_accidente');
        } else {
            $_SESSION['mensaje'] = 7;
            return redirect('/tipo_accidente');
        }
    }

    //FUNCIÓN PARA REDIRECCIONAMIENTO AL MÓDULO EDICIÓN DE TIPO ACCIDENTE LACALDERON 02/05/2023
    public function editar_tipo_accidente(){

        $datosTipo = request();
        $data = DB::table('dxpst.Bit_Tipo_Accidente')
        ->where('id_tipo_accidente', '=', $datosTipo['id'])
        ->get();

    return view('editar_tipoaccidente', ['data' => $data]);
    }

        //FUNCIONALIDAD PARA EDITAR TIPO ACCIDENTE LACALDERON 02/05/2023
    public function fun_editar_tipo_accidente(Request $request)
    {
        $datosTipo = request()->except('_token');
        DB::table('dxpst.Bit_Tipo_Accidente')
        ->where('id_tipo_accidente', '=', $datosTipo['id_tipo_accidente'])
        ->update([
            'descripcion_tipo_accidente' => $datosTipo['descripcion'],
        ]);

        session_start();
        $_SESSION['mensaje'] = 6;
        return redirect('tipo_accidente');
    }

    public function habilitar_tipo_accidente(Request $request, $id)
    {
        $datoTurno = request();
        DB::table('dxpst.Bit_Tipo_Accidente')
            ->where('id_tipo_accidente', '=', $datoTurno['id'])
            ->update(['ESTADO' => 1]);

        session_start();
        $_SESSION['mensaje'] = 7;
        return redirect('tipo_accidente');
    }

    public function inhabilitar_tipo_accidente(Request $request, $id)
    {
        $datoTurno = request();
        DB::table('dxpst.Bit_Tipo_Accidente')
            ->where('id_tipo_accidente', '=', $datoTurno['id'])
            ->update(['ESTADO' => 0]);

        session_start();
        $_SESSION['mensaje'] = 7;
        return redirect('tipo_accidente');
    }

///////////////////////////////////////////////////////////////////////////////////////////////////////

    // FUNCIÓN PARA CONSULTAR LOS REGISTROS DE LA TABLA Bit_Tipo_Control LACALDERON 16/02/2023
    public function consulta_tipo_control(Request $request)
    {
        $data = DB::table('dxpst.bit_tipo_control')
        ->orderBy('id_tipo_control', 'asc')
        ->get();
        
        $result = json_decode($data, true);
        return view('tipocontrol', ['result' => $result]);
    }

    // FUNCIÓN PARA REGISTRO DE NUEVO TIPO EN LA TABLA Bit_Tipo_Control LACALDERON 17/02/2023
    public function registro_tipo_cont(Request $request)
    {
        $datosTipo = request()->except('_token');
        DB::table('dxpst.bit_tipo_control')->insert([
            'DESCRIPCION_TIPO_CONT' => $datosTipo['descripcion'],
            'ESTADO' => 1
        ]);

        session_start();
        $_SESSION['mensaje'] = 6;
        return redirect('/tipo_control');
    }

    //FUNCIÓN PARA ELIMINAR TIPO_CONTROL LACALDERON 20/02/2023
    public function eliminar_tipo_control(Request $request)
    {
        $datosTipo = request();
        DB::table('dxpst.Bit_Tipo_Control')
        ->where('ID_TIPO_CONTROL', '=', $datosTipo['id'])
        ->delete();

        session_start();
        $_SESSION['mensaje'] = 7;
        return redirect('/tipo_control');
    }

    //FUNCIÓN PARA REDIRECCIONAMIENTO AL MÓDULO EDICIÓN DE TIPO CONTROL LACALDERON 02/05/2023
    public function editar_tipo_control(){

        $datosTipo = request();
        $data = DB::table('dxpst.Bit_Tipo_Control')
        ->where('id_tipo_control', '=', $datosTipo['id'])
        ->get();

    return view('editar_tipocontrol', ['data' => $data]);
    }

    public function fun_editar_tipo_control(Request $request)
    {
        $datosTipo = request()->except('_token');
        DB::table('dxpst.Bit_Tipo_Control')
        ->where('id_tipo_control', '=', $datosTipo['id_tipo_control'])
        ->update([
            'descripcion_tipo_cont' => $datosTipo['descripcion'],
        ]);

        session_start();
        $_SESSION['mensaje'] = 5;
        return redirect('tipo_control');
    }

    public function habilitar_tipo_control(Request $request, $id)
    {
        $datoTurno = request();
        DB::table('dxpst.Bit_Tipo_Control')
            ->where('id_tipo_control', '=', $datoTurno['id'])
            ->update(['ESTADO' => 1]);

        session_start();
        $_SESSION['mensaje'] = 7;
        return redirect('tipo_control');
    }

    public function inhabilitar_tipo_control(Request $request, $id)
    {
        $datoTurno = request();
        DB::table('dxpst.Bit_Tipo_Control')
            ->where('id_tipo_control', '=', $datoTurno['id'])
            ->update(['ESTADO' => 0]);

        session_start();
        $_SESSION['mensaje'] = 7;
        return redirect('tipo_control');
    }


///////////////////////////////////////////////////////////////////////////////////////////////////////

    // FUNCIÓN PARA CONSULTAR LOS REGISTROS DE LA TABLA Bit_Tipo_Procedimiento LACALDERON 16/02/2023
    public function consulta_tipo_procedimiento(Request $request)
    {
        $data = DB::table('dxpst.bit_tipo_procedimiento')
        ->orderBy('id_tipo_proc', 'asc')
        ->get();
        $result = json_decode($data, true);
        return view('tipoprocedimiento', ['result' => $result]);
    }

    // FUNCIÓN PARA REGISTRO DE NUEVO TIPO Bit_Tipo_Procedimiento LACALDERON 16/02/2023
    public function registro_tipo_proc(Request $request)
    {
        $datosTipo = request()->except('_token');
        DB::table('dxpst.Bit_Tipo_Procedimiento')->insert([
            'DESCRIPCION_TIPO_PROC' => $datosTipo['descripcion'],
            'ESTADO' => 1
        ]);

        session_start();
        $_SESSION['mensaje'] = 6;
        return redirect('tipo_procedimiento');
    }

    //FUNCIÓN PARA ELIMINAR TIPO_PROCEDIMIENTO LACALDERON 20/02/2023
    public function eliminar_tipo_proc(Request $request)
    {
        $datosTipo = request();
        DB::table('dxpst.Bit_Tipo_Procedimiento')
        ->where('ID_TIPO_PROC', '=', $datosTipo['id'])
        ->delete();

        session_start();
        $_SESSION['mensaje'] = 7;
        return redirect('tipo_procedimiento');
    }

    
    //FUNCIÓN PARA REDIRECCIONAMIENTO AL MÓDULO EDICIÓN DE TIPO PROCEDIMIENTO LACALDERON 02/05/2023
    public function editar_tipo_procedimiento(){

        $datosTipo = request();
        $data = DB::table('dxpst.Bit_Tipo_Procedimiento')
        ->where('id_Tipo_Proc', '=', $datosTipo['id'])
        ->get();

        return view('editar_tipoprocedimiento', ['data' => $data]);
    }
    
    public function habilitar_tipo_procedimiento(Request $request, $id)
    {
        $datoTurno = request();
        DB::table('dxpst.Bit_Tipo_Procedimiento')
            ->where('id_Tipo_Proc', '=', $datoTurno['id'])
            ->update(['ESTADO' => 1]);

        session_start();
        $_SESSION['mensaje'] = 7;
        return redirect('tipo_procedimiento');
    }

    public function inhabilitar_tipo_procedimiento(Request $request, $id)
    {
        $datoTurno = request();
        DB::table('dxpst.Bit_Tipo_Procedimiento')
            ->where('id_Tipo_Proc', '=', $datoTurno['id'])
            ->update(['ESTADO' => 0]);

        session_start();
        $_SESSION['mensaje'] = 7;
        return redirect('tipo_procedimiento');
    }

///////////////////////////////////////////////////////////////////////////////////////////////////////

    // FUNCIÓN PARA CONSULTAR LOS REGISTROS DE LA TABLA Bit_Tipo_prueba LACALDERON 16/02/2023
    public function consulta_tipo_prueba(Request $request)
    {
        $data = DB::table('dxpst.bit_tipo_prueba')
        ->orderBy('id_tipo_prueba', 'asc')
        ->get();
        $result = json_decode($data, true);
        return view('tipoprueba', ['result' => $result]);
    }

    // FUNCIÓN PARA REGISTRO DE NUEVO TIPO Bit_Tipo_prueba LACALDERON 16/02/2023
    public function registro_tipo_prueba(Request $request)
    {
        $datosTipo = request()->except('_token');
        DB::table('dxpst.Bit_Tipo_prueba')->insert([
            'DESCRIPCION_TIPO_prueba' => $datosTipo['descripcion'],
            'ESTADO' => 1
        ]);

        session_start();
        $_SESSION['mensaje'] = 6;
        return redirect('tipo_prueba');
    }

    //FUNCIÓN PARA ELIMINAR TIPO_PRUEBA LACALDERON 20/02/2023
    public function eliminar_tipo_prueba(Request $request)
    {
        $datosTipo = request();
        DB::table('dxpst.bit_tipo_prueba')
        ->where('ID_TIPO_PRUEBA', '=', $datosTipo['id'])
        ->delete();

        session_start();
        $_SESSION['mensaje'] = 7;
        return redirect('tipo_prueba');
    }
    
    //FUNCIÓN PARA REDIRECCIONAMIENTO AL MÓDULO EDICIÓN DE TIPO PRUEBA LACALDERON 02/05/2023
    public function editar_tipo_prueba(){

        $datosTipo = request();
        $data = DB::table('dxpst.Bit_Tipo_Prueba')
        ->where('id_Tipo_Prueba', '=', $datosTipo['id'])
        ->get();

    return view('editar_tipoprueba', ['data' => $data]);
    }

    public function habilitar_tipo_prueba(Request $request, $id)
    {
        $datoTurno = request();
        DB::table('dxpst.Bit_Tipo_Prueba')
            ->where('id_Tipo_Prueba', '=', $datoTurno['id'])
            ->update(['ESTADO' => 1]);

        session_start();
        $_SESSION['mensaje'] = 7;
        return redirect('tipo_prueba');
    }

    public function inhabilitar_tipo_prueba(Request $request, $id)
    {
        $datoTurno = request();
        DB::table('dxpst.Bit_Tipo_Prueba')
            ->where('id_Tipo_Prueba', '=', $datoTurno['id'])
            ->update(['ESTADO' => 0]);

        session_start();
        $_SESSION['mensaje'] = 7;
        return redirect('tipo_prueba');
    }

///////////////////////////////////////////////////////////////////////////////////////////////////////

    // FUNCIÓN PARA CONSULTAR LOS REGISTROS DE LA TABLA Bit_Tipo_Servicio LACALDERON 16/02/2023
    public function consulta_tipo_servicio(Request $request)
    {
        $data = DB::table('dxpst.bit_tipo_servicio')
        ->orderBy('id_tipo_servicio', 'asc')
        ->get();
        $result = json_decode($data, true);
        return view('tiposervicio', ['result' => $result]);
    }

    // FUNCIÓN PARA REGISTRO DE NUEVO TIPO Bit_Tipo_Servicio LACALDERON 16/02/2023
    public function registro_tipo_servicio(Request $request)
    {
        $datosTipo = request()->except('_token');
        DB::table('dxpst.Bit_Tipo_servicio')->insert([
            'DESCRIPCION_TIPO_SERV' => $datosTipo['descripcion'],
            'ESTADO' => 1
        ]);

        session_start();
        $_SESSION['mensaje'] = 6;
        return redirect('tipo_servicio');
    }

    //FUNCIÓN PARA ELIMINAR TIPO_SERVICIO LACALDERON 20/02/2023
    public function eliminar_tipo_servicio(Request $request)
    {
        $datosTipo = request();
        DB::table('dxpst.bit_tipo_servicio')
        ->where('ID_TIPO_SERVICIO', '=', $datosTipo['id'])
        ->delete();

        session_start();
        $_SESSION['mensaje'] = 7;
        return redirect('tipo_servicio');
    }

    //FUNCIÓN PARA REDIRECCIONAMIENTO AL MÓDULO EDICIÓN DE TIPO SERVICIO LACALDERON 02/05/2023
    public function editar_tipo_servicio(){

        $datosTipo = request();
        $data = DB::table('dxpst.Bit_Tipo_Servicio')
        ->where('id_Tipo_Servicio', '=', $datosTipo['id'])
        ->get();

    return view('editar_tiposervicio', ['data' => $data]);
    }

    public function habilitar_tipo_servicio(Request $request, $id)
    {
        $datoTurno = request();
        DB::table('dxpst.Bit_Tipo_Servicio')
            ->where('id_Tipo_Servicio', '=', $datoTurno['id'])
            ->update(['ESTADO' => 1]);

        session_start();
        $_SESSION['mensaje'] = 7;
        return redirect('tipo_servicio');
    }

    public function inhabilitar_tipo_servicio(Request $request, $id)
    {
        $datoTurno = request();
        DB::table('dxpst.Bit_Tipo_Servicio')
            ->where('id_Tipo_Servicio', '=', $datoTurno['id'])
            ->update(['ESTADO' => 0]);

        session_start();
        $_SESSION['mensaje'] = 7;
        return redirect('tipo_servicio');
    }

///////////////////////////////////////////////////////////////////////////////////////////////////////

    // FUNCIÓN PARA CONSULTAR LOS REGISTROS DE LA TABLA BIT_ZONA LACALDERON 17/02/2023
    public function consulta_zona(Request $request)
    {
        $data = DB::table('dxpst.BIT_ZONA')
        ->orderBy('id_zona', 'asc')
        ->get();
        $result = json_decode($data, true);
        return view('zonas', ['result' => $result]);
    }

    // FUNCIÓN PARA REGISTRO DE NUEVA ZONA BIT_ZONA LACALDERON 17/02/2023
    public function registro_zona(Request $request)
    {
        $datosTipo = request()->except('_token');
        DB::table('dxpst.BIT_ZONA')->insert([
            'DESCRIPCION_ZONA' => $datosTipo['descripcion']
        ]);

        session_start();
        $_SESSION['mensaje'] = 6;
        return redirect('zonas');
    }

    //FUNCIÓN PARA ELIMINAR ZONA LACALDERON CALONDONO 20/02/2023
    public function eliminar_zona(Request $request)
    {
        $datosTipo = request();
        DB::table('dxpst.Bit_zona')
        ->where('id_zona', '=', $datosTipo['id'])
        ->delete();

        session_start();
        $_SESSION['mensaje'] = 7;
        return redirect('zonas');
    }

    //FUNCIÓN PARA REDIRECCIONAMIENTO AL MÓDULO EDICIÓN DE TIPO SERVICIO LACALDERON 02/05/2023
    public function editar_zona(){

        $datosTipo = request();
        $data = DB::table('dxpst.Bit_Zona')
        ->where('id_Zona', '=', $datosTipo['id'])
        ->get();

    return view('editar_zona', ['data' => $data]);
    }

    public function habilitar_tipo_zona(Request $request, $id)
    {
        $datoTurno = request();
        DB::table('dxpst.Bit_Zona')
            ->where('id_Zona', '=', $datoTurno['id'])
            ->update(['ESTADO' => 1]);

        session_start();
        $_SESSION['mensaje'] = 7;
        return redirect('zonas');
    }

    public function inhabilitar_tipo_zona(Request $request, $id)
    {
        $datoTurno = request();
        DB::table('dxpst.Bit_Zona')
            ->where('id_Zona', '=', $datoTurno['id'])
            ->update(['ESTADO' => 0]);

        session_start();
        $_SESSION['mensaje'] = 7;
        return redirect('zonas');
    }


///////////////////////////////////////////////////////////////////////////////////////////////////////

    //FUNCIÓN PARA ELIMINAR PDF CALONDONO  LACALDERON 27/04/2023
    public function eliminar_pdf(Request $request)
    {
        $datosTipo = request();
        DB::table('dxpst.Bit_maestropdf')
        ->where('id_maestropdf', '=', $datosTipo['id'])
        ->delete();

        session_start();
        $_SESSION['mensaje'] = 7;
        return redirect('/historial_ceges');

    }
}

?>