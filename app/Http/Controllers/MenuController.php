<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class MenuController extends Controller
{

        /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    //FUNCIÓN PARA REDIRECCIONAMIENTO AL MÓDULO HISTORIAL TURNOS LACALDERON CALONDONO 23/02/2023
    public function historial(){
        return view('historial');
    }

    //FUNCIÓN PARA REDIRECCIONAMIENTO AL MÓDULO TURNOS CONSULTADOS LACALDERON CALONDONO 04/04/2023
    public function consultar_turno(){

        $datos = request()->except('_token');

        $data1 = DB::table('dxpst.Bit_Maestro_Turno')
        ->join('dxpst.Bit_Turno', 'dxpst.Bit_Maestro_Turno.id_turno', '=', 'dxpst.Bit_Turno.id_turno')
        ->select('dxpst.Bit_Maestro_Turno.*', 'dxpst.Bit_Turno.descripcion_turno')
        ->where('dxpst.Bit_Maestro_Turno.fecha_registro', 'like', '%'.$datos['fecha_consulta'].'%')
        ->get();

        $result1 = json_decode($data1, TRUE);

        if(count($data1) > 0){
            return view('turnos_consultados', ['result1' => $result1]);
        } else {

            session_start();
            $_SESSION['mensaje'] = 1;
            return redirect('historial');
        }       
    }
    
    //FUNCIÓN PARA REDIRECCIONAMIENTO AL MÓDULO HISTORIAL CEGES LACALDERON CALONDONO 23/02/2023
    public function historial_ceges(){
        return view('historial_ceges');
    }
    
     //FUNCIÓN PARA REDIRECCIONAMIENTO AL MÓDULO HISTORIAL CEGES LACALDERON CALONDONO 23/02/2023
     public function historial_ceges_detalle(){
        return view('historial_ceges_detalle');
    }

    //FUNCIÓN PARA REDIRECCIONAMIENTO AL MÓDULO MAESTRO DE TURNOS LACALDERON CALONDONO 23/02/2023
    public function maestroTurno(){
        return view('maestroTurno');
    }

    //FUNCIÓN PARA REDIRECCIONAMIENTO AL MÓDULO ZONAS LACALDERON CALONDONO 23/02/2023
    public function zonas(){
        return view('zonas');
    }

    //FUNCIÓN PARA REDIRECCIONAMIENTO AL MÓDULO AGENTES LACALDERON CALONDONO 23/02/2023
    public function agentes(){
        return view('agentes');
    }

    //FUNCIÓN GENERADA PARA REGISTRAR LAS PRUEBAS DE ALCOHOLEMIAS EN DB LACALDERON 23/02/2023
    public function registrar_1(Request $request){
        $datos = request();

        session_start();
        $turno_activo = $_SESSION['turno_activo'];

        $data1 = DB::table('dxpst.Bit_Prueba_Alcoholemia')
        ->select('cantidad_positivo', 'cantidad_negativo')
        ->where('id_tipo_prueba', '=', $datos['operativo'])
        ->where('nro_registro', '=', $turno_activo)
        ->get();

        $result = json_decode($data1, TRUE);
        
        $cantidad_positivo = implode(" ", $result[0]);
        $cantidad_negativo = implode(" ", $result[0]);
        $cantidad_p = intval($cantidad_positivo);
        $cantidad_n = intval($cantidad_negativo);

        $cantidad_f_p = $datos['positivast'] + $cantidad_p;
        $cantidad_f_n = $datos['negativast'] + $cantidad_n;

        DB::table('dxpst.Bit_Prueba_Alcoholemia')
        ->where('NRO_REGISTRO', '=', $turno_activo)
        ->where('ID_TIPO_PRUEBA', '=', $datos['operativo'])
        ->update([
            'cantidad_positivo' => $cantidad_f_p,
            'cantidad_negativo' => $cantidad_f_n
        ]);
        
        $_SESSION['mensaje'] = 6;
        return redirect('turnoactivo');
    }

    public function all(Request $request){

        session_start();
        if($_SESSION['turno_activo'] != null){

        $turno_activo = $_SESSION['turno_activo'];

        // CONSULTA PARA EL LISTADO DE PRUEBA ALCOHOLEMIA
        $data = DB::table('dxpst.Bit_Prueba_Alcoholemia')
        ->join('dxpst.Bit_Tipo_Prueba', 'dxpst.Bit_Prueba_Alcoholemia.id_tipo_prueba', '=', 'dxpst.Bit_Tipo_Prueba.id_tipo_prueba')
        ->select('dxpst.Bit_Prueba_Alcoholemia.id_tipo_prueba','dxpst.Bit_Prueba_Alcoholemia.cantidad_positivo', 'dxpst.Bit_Prueba_Alcoholemia.cantidad_negativo', 'dxpst.Bit_Tipo_Prueba.descripcion_tipo_prueba')
        ->where('dxpst.Bit_Prueba_Alcoholemia.nro_registro', '=', $turno_activo)
        ->get();
        $result = json_decode($data, TRUE);

        // CONSULTA PARA EL LISTADO DE ACCIDENTALIDAD
        $data1 = DB::table('dxpst.Bit_accidentalidad')
        ->join('dxpst.Bit_Tipo_Accidente', 'dxpst.Bit_Tipo_Accidente.id_tipo_accidente', '=', 'dxpst.Bit_accidentalidad.id_tipo_accidente')
        ->select('dxpst.Bit_accidentalidad.cantidad_acc','dxpst.Bit_accidentalidad.id_tipo_accidente', 'dxpst.Bit_Tipo_Accidente.descripcion_tipo_accidente')
        ->where('dxpst.Bit_accidentalidad.nro_registro', '=', $turno_activo)
        ->orderBy('dxpst.Bit_accidentalidad.id_accidentalidad')
        ->get();
        $result1 = json_decode($data1, TRUE);
        
        // CONSULTA PARA EL LISTADO DE INCIDENCIAS
        $data2 = DB::table('dxpst.Bit_Incidencia')
        ->join('dxpst.bit_agente', 'dxpst.Bit_Incidencia.id_agente', '=', 'dxpst.bit_agente.id_agente')
        ->join('dxpst.bit_tipo_control', 'dxpst.Bit_Incidencia.id_tipo_control', '=', 'dxpst.bit_tipo_control.id_tipo_control')
        ->select('dxpst.Bit_Incidencia.*', 'dxpst.bit_agente.placa_agente', 'dxpst.bit_tipo_control.descripcion_tipo_cont')
        ->where('dxpst.Bit_Incidencia.nro_registro', '=', $turno_activo)
        ->orderBy('dxpst.Bit_Incidencia.id_incidencia')
        ->get();
        $result2 = json_decode($data2, TRUE);

        // CONSULTA PARA EL LISTADO DE PROCEDIMIENTOS
    $data3 = DB::table('dxpst.Bit_Procedimiento')
        ->join('dxpst.bit_zona', 'dxpst.Bit_Procedimiento.id_zona', '=', 'dxpst.bit_zona.id_zona')
        ->join('dxpst.Bit_Tipo_Procedimiento', 'dxpst.Bit_Procedimiento.id_tipo_proc', '=', 'dxpst.Bit_Tipo_Procedimiento.id_tipo_proc')
        ->select('Bit_Procedimiento.*', 'bit_zona.descripcion_zona', 'Bit_Tipo_Procedimiento.descripcion_tipo_proc')
        ->where('Bit_Procedimiento.nro_registro', '=', $turno_activo)
        ->orderBy('Bit_Procedimiento.id_procedimiento')
        ->get();
        $result3 = json_decode($data3, TRUE);

         $data4 = DB::table('dxpst.Bit_Tipo_Accidente')
         ->where('dxpst.Bit_Tipo_Accidente.estado', '=', 1)
         ->get();
         $result_select_acc = json_decode($data4, TRUE);

         $data5 = DB::table('dxpst.Bit_Tipo_Control')
         ->where('dxpst.Bit_Tipo_Control.estado', '=', 1)
         ->get();
         $result_select_cont = json_decode($data5, TRUE);

         $data6 = DB::table('dxpst.Bit_Tipo_Procedimiento')
         ->where('dxpst.Bit_Tipo_Procedimiento.estado', '=', 1)
         ->get();
         $result_select_proc = json_decode($data6, TRUE);

         $data7 = DB::table('dxpst.Bit_Tipo_Prueba')
         ->where('dxpst.Bit_Tipo_Prueba.estado', '=', 1)
         ->get();
         $result_select_prue = json_decode($data7, TRUE);
         
         $data8 = DB::table('dxpst.Bit_Tipo_Servicio')
         ->where('dxpst.Bit_Tipo_Servicio.estado', '=', 1)
         ->get();
         $result_select_serv = json_decode($data8, TRUE);

         $data9 = DB::table('dxpst.Bit_Agente')
         ->where('estado_agente', '=', 1)
         ->get();
         $result_select_age = json_decode($data9, TRUE);

         // CONSULTA PARA EL LISTADO DE ACCIDENTALIDAD PARA LAS GRÁFICAS
         $data10 = DB::table('dxpst.bit_accidentalidad')
         ->join('dxpst.bit_tipo_accidente', 'dxpst.bit_accidentalidad.id_tipo_accidente', '=', 'dxpst.bit_tipo_accidente.id_tipo_accidente')
         ->select('dxpst.bit_accidentalidad.cantidad_acc','dxpst.bit_accidentalidad.id_tipo_accidente', 'dxpst.bit_tipo_accidente.descripcion_tipo_accidente')
         ->where('dxpst.bit_accidentalidad.nro_registro', '=', $turno_activo)
         ->get();
        $result10 = json_decode($data10, TRUE);

         // CONSULTA PARA EL LISTADO DE ALCOHOLEMIA PARA LAS GRÁFICAS
         $data11 = DB::table('dxpst.Bit_Prueba_Alcoholemia')
         ->join('dxpst.Bit_Tipo_Prueba', 'dxpst.Bit_Prueba_Alcoholemia.id_tipo_prueba', '=', 'dxpst.Bit_Tipo_Prueba.id_tipo_prueba')
         ->select('dxpst.Bit_Prueba_Alcoholemia.cantidad_positivo','dxpst.Bit_Prueba_Alcoholemia.cantidad_negativo', 'dxpst.Bit_Tipo_Prueba.descripcion_tipo_prueba')
         ->where('dxpst.Bit_Prueba_Alcoholemia.nro_registro', '=', $turno_activo)
         ->get();
         $result11 = json_decode($data11, TRUE);

          // CONSULTA PARA EL LISTADO DE PROCEDIMIENTOS PARA LAS GRÁFICAS DESCRIPCIONES
          $data12 = DB::table('dxpst.Bit_Procedimiento')
          ->join('dxpst.Bit_Zona', 'dxpst.Bit_Procedimiento.id_zona', '=', 'dxpst.Bit_Zona.id_zona')
          ->join('dxpst.Bit_Tipo_Procedimiento', 'dxpst.Bit_Procedimiento.id_tipo_proc', '=', 'dxpst.Bit_Tipo_Procedimiento.id_tipo_proc')
          ->select('dxpst.Bit_Procedimiento.cantidad_proc', 'dxpst.Bit_Zona.descripcion_zona', 'dxpst.Bit_Tipo_Procedimiento.descripcion_tipo_proc')
          ->where('dxpst.Bit_Procedimiento.nro_registro', '=', $turno_activo)
          ->orderBy('dxpst.Bit_Procedimiento.id_zona')
          ->orderBy('dxpst.Bit_Procedimiento.id_tipo_proc')
          ->get();
          $result12 = json_decode($data12, TRUE);

          // CONSULTA PARA EL LISTADO DE PROCEDIMIENTOS PARA LAS GRÁFICAS CANTIDADES
          $data13 = DB::table('dxpst.Bit_Procedimiento')
          ->join('dxpst.Bit_Zona', 'dxpst.Bit_Procedimiento.id_zona', '=', 'dxpst.Bit_Zona.id_zona')
          ->join('dxpst.Bit_Tipo_Procedimiento', 'dxpst.Bit_Procedimiento.id_tipo_proc', '=', 'dxpst.Bit_Tipo_Procedimiento.id_tipo_proc')
          ->select('dxpst.Bit_Procedimiento.cantidad_proc', 'dxpst.Bit_Zona.descripcion_zona', 'dxpst.Bit_Tipo_Procedimiento.descripcion_tipo_proc')
          ->where('dxpst.Bit_Procedimiento.nro_registro', '=', $turno_activo)
          ->orderBy('dxpst.Bit_Procedimiento.id_zona')
          ->orderBy('dxpst.Bit_Procedimiento.id_tipo_proc')
          ->get();
          $result13 = json_decode($data13, TRUE);

          $data14 = DB::table('dxpst.Bit_Procedimiento')
          ->join('dxpst.Bit_Zona', 'dxpst.Bit_Procedimiento.id_zona', '=', 'dxpst.Bit_Zona.id_zona')
          ->join('dxpst.Bit_Tipo_Procedimiento', 'dxpst.Bit_Procedimiento.id_tipo_proc', '=', 'dxpst.Bit_Tipo_Procedimiento.id_tipo_proc')
          ->select('dxpst.Bit_Procedimiento.id_concat','dxpst.Bit_Procedimiento.id_zona', 'dxpst.Bit_Procedimiento.id_tipo_proc', 'dxpst.Bit_Procedimiento.cantidad_proc', 'dxpst.Bit_Zona.descripcion_zona', 'dxpst.Bit_Tipo_Procedimiento.descripcion_tipo_proc')
          ->where('dxpst.Bit_Procedimiento.nro_registro', '=', $turno_activo)
          ->orderBy('dxpst.Bit_Procedimiento.id_procedimiento')
          ->get();
          $result14 = json_decode($data14, TRUE);


        return view('turnoactivo', [
        'result' => $result,
        'result1' => $result1,
        'result2' => $result2,
        'result3' => $result3,
        'result_select_acc' => $result_select_acc,
        'result_select_cont' => $result_select_cont,
        'result_select_proc' => $result_select_proc,
        'result_select_prue' => $result_select_prue,
        'result_select_serv' => $result_select_serv,
        'result_select_age' => $result_select_age,
        'result10' => $result10,
        'result11' => $result11,
        'result12' => $result12,
        'result13' => $result13,
        'result14' => $result14
        ]);
    }
    else {

       return view('turnoactivo');
    }

    }

    //CONSULTA PARA HISTORIAL DE TURNOS ACALDERON CLONDOÑO 04/04/2023
    public function detalle_turno(Request $request){

        $datosTipo = request();
        
        session_start();
        $_SESSION['turno_consultado'] = $datosTipo['id'];

        // CONSULTA PARA EL LISTADO DE PRUEBA ALCOHOLEMIA
        $data = DB::table('dxpst.Bit_Prueba_Alcoholemia')
        ->join('dxpst.Bit_Tipo_Prueba', 'dxpst.Bit_Prueba_Alcoholemia.id_tipo_prueba', '=', 'dxpst.Bit_Tipo_Prueba.id_tipo_prueba')
        ->select('dxpst.Bit_Prueba_Alcoholemia.id_tipo_prueba','dxpst.Bit_Prueba_Alcoholemia.cantidad_positivo', 'dxpst.Bit_Prueba_Alcoholemia.cantidad_negativo', 'dxpst.Bit_Tipo_Prueba.descripcion_tipo_prueba')
        ->where('dxpst.Bit_Prueba_Alcoholemia.nro_registro', '=', $datosTipo['id'])
        ->get();
        $result = json_decode($data, TRUE);

        // CONSULTA PARA EL LISTADO DE ACCIDENTALIDAD
        $data1 = DB::table('dxpst.Bit_accidentalidad')
        ->join('dxpst.Bit_Tipo_Accidente', 'dxpst.Bit_Tipo_Accidente.id_tipo_accidente', '=', 'dxpst.Bit_accidentalidad.id_tipo_accidente')
        ->select('dxpst.Bit_accidentalidad.cantidad_acc','dxpst.Bit_accidentalidad.id_tipo_accidente', 'dxpst.Bit_Tipo_Accidente.descripcion_tipo_accidente')
        ->where('dxpst.Bit_accidentalidad.nro_registro', '=', $datosTipo['id'])
        ->orderBy('dxpst.Bit_accidentalidad.id_accidentalidad')
        ->get();
        $result1 = json_decode($data1, TRUE);
        
        // CONSULTA PARA EL LISTADO DE INCIDENCIAS
        $data2 = DB::table('dxpst.Bit_Incidencia')
        ->join('dxpst.bit_agente', 'dxpst.Bit_Incidencia.id_agente', '=', 'dxpst.bit_agente.id_agente')
        ->join('dxpst.bit_tipo_control', 'dxpst.Bit_Incidencia.id_tipo_control', '=', 'dxpst.bit_tipo_control.id_tipo_control')
        ->select('dxpst.Bit_Incidencia.*', 'dxpst.bit_agente.placa_agente', 'dxpst.bit_tipo_control.descripcion_tipo_cont')
        ->where('dxpst.Bit_Incidencia.nro_registro', '=', $datosTipo['id'])
        ->orderBy('dxpst.Bit_Incidencia.id_incidencia')
        ->get();
        $result2 = json_decode($data2, TRUE);

        // CONSULTA PARA EL LISTADO DE PROCEDIMIENTOS
        $data3 = DB::table('dxpst.Bit_Procedimiento')
        ->join('dxpst.bit_zona', 'dxpst.Bit_Procedimiento.id_zona', '=', 'dxpst.bit_zona.id_zona')
        ->join('dxpst.Bit_Tipo_Procedimiento', 'dxpst.Bit_Procedimiento.id_tipo_proc', '=', 'dxpst.Bit_Tipo_Procedimiento.id_tipo_proc')
        ->select('dxpst.Bit_Procedimiento.*', 'dxpst.bit_zona.descripcion_zona', 'dxpst.Bit_Tipo_Procedimiento.descripcion_tipo_proc')
        ->where('dxpst.Bit_Procedimiento.nro_registro', '=', $datosTipo['id'])
        ->orderBy('dxpst.Bit_Procedimiento.id_procedimiento')
        ->get();
        $result3 = json_decode($data3, TRUE);

         // CONSULTA PARA EL LISTADO DE ACCIDENTALIDAD PARA LAS GRÁFICAS
         $data10 = DB::table('dxpst.bit_accidentalidad')
         ->join('dxpst.bit_tipo_accidente', 'dxpst.bit_accidentalidad.id_tipo_accidente', '=', 'dxpst.bit_tipo_accidente.id_tipo_accidente')
         ->select('dxpst.bit_accidentalidad.cantidad_acc','dxpst.bit_accidentalidad.id_tipo_accidente', 'dxpst.bit_tipo_accidente.descripcion_tipo_accidente')
         ->where('dxpst.bit_accidentalidad.nro_registro', '=', $datosTipo['id'])
         ->get();
        $result10 = json_decode($data10, TRUE);

         // CONSULTA PARA EL LISTADO DE ALCOHOLEMIA PARA LAS GRÁFICAS
         $data11 = DB::table('dxpst.Bit_Prueba_Alcoholemia')
         ->join('dxpst.Bit_Tipo_Prueba', 'dxpst.Bit_Prueba_Alcoholemia.id_tipo_prueba', '=', 'dxpst.Bit_Tipo_Prueba.id_tipo_prueba')
         ->select('dxpst.Bit_Prueba_Alcoholemia.cantidad_positivo','dxpst.Bit_Prueba_Alcoholemia.cantidad_negativo', 'dxpst.Bit_Tipo_Prueba.descripcion_tipo_prueba')
         ->where('dxpst.Bit_Prueba_Alcoholemia.nro_registro', '=', $datosTipo['id'])
         ->get();
         $result11 = json_decode($data11, TRUE);

          // CONSULTA PARA EL LISTADO DE PROCEDIMIENTOS PARA LAS GRÁFICAS DESCRIPCIONES
          $data12 = DB::table('dxpst.Bit_Procedimiento')
          ->join('dxpst.Bit_Zona', 'dxpst.Bit_Procedimiento.id_zona', '=', 'dxpst.Bit_Zona.id_zona')
          ->join('dxpst.Bit_Tipo_Procedimiento', 'dxpst.Bit_Procedimiento.id_tipo_proc', '=', 'dxpst.Bit_Tipo_Procedimiento.id_tipo_proc')
          ->select('dxpst.Bit_Procedimiento.cantidad_proc', 'dxpst.Bit_Zona.descripcion_zona', 'dxpst.Bit_Tipo_Procedimiento.descripcion_tipo_proc')
          ->where('dxpst.Bit_Procedimiento.nro_registro', '=', $datosTipo['id'])
          ->orderBy('dxpst.Bit_Procedimiento.id_zona', 'asc')
          ->get();
          $result12 = json_decode($data12, TRUE);

          // CONSULTA PARA EL LISTADO DE PROCEDIMIENTOS PARA LAS GRÁFICAS CANTIDADES
          $data13 = DB::table('dxpst.Bit_Procedimiento')
          ->join('dxpst.Bit_Zona', 'dxpst.Bit_Procedimiento.id_zona', '=', 'dxpst.Bit_Zona.id_zona')
          ->join('dxpst.Bit_Tipo_Procedimiento', 'dxpst.Bit_Procedimiento.id_tipo_proc', '=', 'dxpst.Bit_Tipo_Procedimiento.id_tipo_proc')
          ->select('dxpst.Bit_Procedimiento.cantidad_proc', 'dxpst.Bit_Zona.descripcion_zona', 'dxpst.Bit_Tipo_Procedimiento.descripcion_tipo_proc')
          ->where('dxpst.Bit_Procedimiento.nro_registro', '=', $datosTipo['id'])
          ->orderBy('dxpst.Bit_Procedimiento.id_zona', 'asc')
          ->get();
          $result13 = json_decode($data13, TRUE);

          $data14 = DB::table('dxpst.Bit_Procedimiento')
          ->join('dxpst.Bit_Zona', 'dxpst.Bit_Procedimiento.id_zona', '=', 'dxpst.Bit_Zona.id_zona')
          ->join('dxpst.Bit_Tipo_Procedimiento', 'dxpst.Bit_Procedimiento.id_tipo_proc', '=', 'dxpst.Bit_Tipo_Procedimiento.id_tipo_proc')
          ->select('dxpst.Bit_Procedimiento.id_concat','dxpst.Bit_Procedimiento.id_zona', 'dxpst.Bit_Procedimiento.id_tipo_proc', 'dxpst.Bit_Procedimiento.cantidad_proc', 'dxpst.Bit_Zona.descripcion_zona', 'dxpst.Bit_Tipo_Procedimiento.descripcion_tipo_proc')
          ->where('dxpst.Bit_Procedimiento.nro_registro', '=', $datosTipo['id'])
          ->orderBy('dxpst.Bit_Procedimiento.id_zona', 'asc')
          ->get();
          $result14 = json_decode($data14, TRUE);

          $data0 = DB::table('dxpst.bit_tipo_procedimiento')
            ->select('id_tipo_proc')
            ->count();
            $result0 = json_decode($data0, TRUE);
            $_SESSION['cantidad_tipo_proc'] = $result0;


        return view('detalle_turno', [
        'result' => $result,
        'result1' => $result1,
        'result2' => $result2,
        'result3' => $result3,
        'result10' => $result10,
        'result11' => $result11,
        'result12' => $result12,
        'result13' => $result13,
        'result14' => $result14
        ]);

    }

    //FUNCIÓN GENERADA PARA LISTAR LOS REPORTES DE PRUEBAS DE ALCOHOLEMIA EN EL BLADE TURNOACTIVO LACALDERON 23/02/2023
    public function consulta_1(Request $request){
        session_start();
        $turno_activo = $_SESSION['turno_activo'];

        $data = DB::table('dxpst.Bit_Prueba_Alcoholemia')
        ->select('cantidad_positivo', 'cantidad_negativo', 'id_tipo_prueba')
        ->where('nro_registro', '=', $turno_activo)
        ->get();
        $result = json_decode($data, TRUE);
        return view('turnoactivo', ['result' => $result]);
    }

    //FUNCIÓN GENERADA PARA REGISTRAR LOS REPORTES DE INCIDENTES EN DB LACALDERON 23/02/2023
    public function registrar_incidencia(Request $request){
        session_start();
        $turno_activo = $_SESSION['turno_activo'];

        $data5 = DB::table('dxpst.bit_maestro_turno')
        ->select('id_estado')
        ->where('nro_registro', '=', $turno_activo)
        ->get();
        $result5 = json_decode($data5, TRUE);
        $estado_turno_activo = implode(" ", $result5[0]);

        if($estado_turno_activo == 1){

        $datos = request();
        DB::table('dxpst.Bit_Incidencia')->insert([
            'NRO_INCIDENTE' => 1,
            'ID_AGENTE' => $datos['agentes'],
            'DESCRIPCION_INCIDENCIA' => $datos['incidencia'],
            'ID_TIPO_CONTROL' => $datos['tipo'],
            'NRO_REGISTRO'=> $turno_activo
        ]);
        
            $_SESSION['mensaje'] = 6;
            return redirect('turnoactivo');
        }   else {
            $_SESSION['mensaje'] = 7;
            return redirect('turnoactivo');
        }

    }

    //FUNCIÓN GENERADA PARA LISTAR LOS REPORTES DE INCIDENTES EN EL BLADE TURNOACTIVO LACALDERON 23/02/2023
    public function consulta_inci(Request $request){
        session_start();
        $turno_activo = $_SESSION['turno_activo'];

        $data = DB::table('dxpst.Bit_Incidencia')
        ->where('nro_registro', '=', $turno_activo)
        ->get();
        $result_inci = json_decode($data, TRUE);
        return view('turnoactivo', ['result_inci' => $result_inci]);
    }

    //FUNCIÓN GENERADA PARA REGISTRAR LOS REPORTES DE ACCIDENTALIDAD EN DB LACALDERON 23/02/2023
    public function registrar_accidente(Request $request){
        $datos = request();

        session_start();
        $turno_activo = $_SESSION['turno_activo'];

        $data5 = DB::table('dxpst.bit_maestro_turno')
        ->select('id_estado')
        ->where('nro_registro', '=', $turno_activo)
        ->get();
        $result5 = json_decode($data5, TRUE);
        $estado_turno_activo = implode(" ", $result5[0]);

        if($estado_turno_activo == 1){

        $data1 = DB::table('dxpst.Bit_Accidentalidad')
        ->select('cantidad_acc')
        ->where('id_tipo_accidente', '=', $datos['tipo_accidente'])
        ->where('nro_registro', '=', $turno_activo)
        ->get();
        
        $result = json_decode($data1, TRUE);
        $cantidad = implode(" ", $result[0]);
        $cantidad1 = intval($cantidad);

        $cantidad = $datos['cantidad'] + $cantidad1;
        
        DB::table('dxpst.Bit_Accidentalidad')
        ->where('NRO_REGISTRO', '=', $turno_activo)
        ->where('id_tipo_Accidente', '=', $datos['tipo_accidente'])
        ->update([
            'cantidad_acc' => $cantidad
        ]);
    
        $_SESSION['mensaje'] = 6;
        return redirect('turnoactivo');
        }   else {
            $_SESSION['mensaje'] = 7;
            return redirect('turnoactivo');
        }
    }
        //FUNCIÓN GENERADA PARA REGISTRAR LOS REPORTES DE ACCIDENTALIDAD EN DB LACALDERON 23/02/2023
        public function registrar_proc(Request $request){

        session_start();
        $turno_activo = $_SESSION['turno_activo'];

        $data5 = DB::table('dxpst.bit_maestro_turno')
        ->select('id_estado')
        ->where('nro_registro', '=', $turno_activo)
        ->get();
        $result5 = json_decode($data5, TRUE);
        $estado_turno_activo = implode(" ", $result5[0]);

        if($estado_turno_activo == 1){

        $datos = request()->except('_token', 'button3');

        $contador = 0;
        for ($i = 0; $i < count($datos); $i++) {

            DB::table('dxpst.Bit_Procedimiento')
            ->where('nro_registro', '=', $turno_activo)
            ->where('id_concat', '=', $contador)
            ->update([
                'cantidad_proc' => $datos[$i]
            ]);

            $contador++;
        }
        return redirect('turnoactivo');

        }   else {
            $_SESSION['mensaje'] = 7;
            return redirect('turnoactivo');
        }

    }

    //FUNCIÓN GENERADA PARA LISTAR LOS REPORTES DE ACCIDENTALIDAD EN EL BLADE TURNOACTIVO LACALDERON 23/02/2023
    public function consulta_acc(Request $request){
        session_start();
        $turno_activo = $_SESSION['turno_activo'];

        $data = DB::table('dxpst.Bit_Accidentalidad')
        ->where('nro_registro', '=', $turno_activo)
        ->get();
        $result_acc = json_decode($data, TRUE);
        return view('turnoactivo', ['result_acc' => $result_acc]);
    }

    //FUNCIÓN GENERADA PARA LISTAR LOS REPORTES DE PROCEDIMIENTOS EN EL BLADE TURNOACTIVO LACALDERON 23/02/2023
    public function consulta_proc(Request $request){
        session_start();
        $turno_activo = $_SESSION['turno_activo'];

        $data = DB::table('dxpst.Bit_Procedimiento')
        ->where('nro_registro', '=', $turno_activo)
        ->get();
        $result_proc = json_decode($data, TRUE);
        return view('turnoactivo', ['result_proc' => $result_proc]);
    }

}
?>