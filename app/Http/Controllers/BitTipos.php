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
        $data = DB::table('dxpst.bit_tipo_accidente')->get();
        $result = json_decode($data, true);
        return view('tipoaccidente', ['result' => $result]);
    }

    // FUNCIÓN PARA REGISTRO DE NUEVO TIPO EN LA TABLA BIT_TIPO_ACCIDENTE LACALDERON 17/02/2023
    public function registro_tipo_acc(Request $request)
    {
        $datosTipo = request()->except('_token');
        DB::table('dxpst.bit_tipo_accidente')->insert([
            'DESCRIPCION_TIPO_ACCIDENTE' => $datosTipo['descripcion'],
        ]);

        session_start();
        $_SESSION['mensaje'] = 6;
        return redirect('/tipo_accidente');
    }


    // FUNCIÓN PARA CONSULTAR LOS REGISTROS DE LA TABLA Bit_Tipo_Control LACALDERON 16/02/2023
    public function consulta_tipo_control(Request $request)
    {
        $data = DB::table('dxpst.bit_tipo_control')
        ->orderBy('id_tipo_control')
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
        ]);

        session_start();
        $_SESSION['mensaje'] = 6;
        return redirect('/tipo_control');
    }


    // FUNCIÓN PARA CONSULTAR LOS REGISTROS DE LA TABLA Bit_Tipo_Procedimiento LACALDERON 16/02/2023
    public function consulta_tipo_procedimiento(Request $request)
    {
        $data = DB::table('dxpst.bit_tipo_procedimiento')->get();
        $result = json_decode($data, true);
        return view('tipoprocedimiento', ['result' => $result]);
    }

    // FUNCIÓN PARA REGISTRO DE NUEVO TIPO Bit_Tipo_Procedimiento LACALDERON 16/02/2023
    public function registro_tipo_proc(Request $request)
    {
        $datosTipo = request()->except('_token');
        DB::table('dxpst.Bit_Tipo_Procedimiento')->insert([
            'DESCRIPCION_TIPO_PROC' => $datosTipo['descripcion'],
        ]);

        session_start();
        $_SESSION['mensaje'] = 6;
        return redirect('/tipo_procedimiento');
    }


    // FUNCIÓN PARA CONSULTAR LOS REGISTROS DE LA TABLA Bit_Tipo_prueba LACALDERON 16/02/2023
    public function consulta_tipo_prueba(Request $request)
    {
        $data = DB::table('dxpst.bit_tipo_prueba')->get();
        $result = json_decode($data, true);
        return view('tipoprueba', ['result' => $result]);
    }

    // FUNCIÓN PARA REGISTRO DE NUEVO TIPO Bit_Tipo_prueba LACALDERON 16/02/2023
    public function registro_tipo_prueba(Request $request)
    {
        $datosTipo = request()->except('_token');
        DB::table('dxpst.Bit_Tipo_prueba')->insert([
            'DESCRIPCION_TIPO_prueba' => $datosTipo['descripcion'],
        ]);

        session_start();
        $_SESSION['mensaje'] = 6;
        return redirect('tipo_prueba');
    }


    // FUNCIÓN PARA CONSULTAR LOS REGISTROS DE LA TABLA Bit_Tipo_Servicio LACALDERON 16/02/2023
    public function consulta_tipo_servicio(Request $request)
    {
        $data = DB::table('dxpst.bit_tipo_servicio')->get();
        $result = json_decode($data, true);
        return view('tiposervicio', ['result' => $result]);
    }

    // FUNCIÓN PARA REGISTRO DE NUEVO TIPO Bit_Tipo_Servicio LACALDERON 16/02/2023
    public function registro_tipo_servicio(Request $request)
    {
        $datosTipo = request()->except('_token');
        DB::table('dxpst.Bit_Tipo_servicio')->insert([
            'DESCRIPCION_TIPO_SERV' => $datosTipo['descripcion'],
        ]);

        session_start();
        $_SESSION['mensaje'] = 6;
        return redirect('tipo_servicio');
    }

    // FUNCIÓN PARA CONSULTAR LOS REGISTROS DE LA TABLA BIT_ZONA LACALDERON 17/02/2023
    public function consulta_zona(Request $request)
    {
        $data = DB::table('dxpst.BIT_ZONA')->get();
        $result = json_decode($data, true);
        return view('zonas', ['result' => $result]);
    }

    // FUNCIÓN PARA REGISTRO DE NUEVA ZONA BIT_ZONA LACALDERON 17/02/2023
    public function registro_zona(Request $request)
    {
        $datosTipo = request()->except('_token');
        DB::table('dxpst.BIT_ZONA')->insert([
            'DESCRIPCION_ZONA' => $datosTipo['descripcion'],
        ]);

        session_start();
        $_SESSION['mensaje'] = 6;
        return redirect('/zonas');
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
        return redirect('/zonas');
    }

    //FUNCIÓN PARA ELIMINAR TIPO_ACCIDENTE LACALDERON 20/02/2023
    public function eliminar_tipo_accidente(Request $request)
    {
        $datosTipo = request();
        DB::table('dxpst.Bit_Tipo_Accidente')
        ->where('ID_TIPO_ACCIDENTE', '=', $datosTipo['id'])
        ->delete();

        session_start();
        $_SESSION['mensaje'] = 7;
        return redirect('/tipo_accidente');
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

    //FUNCIÓN PARA ELIMINAR TIPO_PROCEDIMIENTO LACALDERON 20/02/2023
    public function eliminar_tipo_proc(Request $request)
    {
        $datosTipo = request();
        DB::table('dxpst.Bit_Tipo_Procedimiento')
        ->where('ID_TIPO_PROC', '=', $datosTipo['id'])
        ->delete();

        session_start();
        $_SESSION['mensaje'] = 7;
        return redirect('/tipo_procedimiento');
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
        return redirect('/tipo_servicio');
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
        return redirect('/tipo_prueba');
    }
}

?>