<?php

namespace App\Http\Controllers;

use App\Models\Bit_maestropdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;


class Bit_maestropdfController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * 
     */

     public function reportes(){
        return view('/reportes');  
     }

     public function registrar_ceges()
    {
        DB::table('dxpst.Bit_Maestropdf')->insert([
            'nombre_pdf' => 1,
            'ruta_pdf' => "/var/www/html/bitacora/public/ceges/"
        ]);
    }

   
     public function crearPDF(Request $request){

        $this->registrar_ceges();

        $data = $request->all();
        $pdf = PDF::loadView('pdf',$data);
       // Storage::disk('public')->put("archivo.pdf",$pdf);  
        return $pdf->stream();
      }

    public function imprimirPDF(){  
        $maestropdf = compact('pdf','fecha_reporte');
        $pdf= PDF::loadView('/reportes',$maestropdf);

        return $pdf->stream();
        /*return $pdf->download('archivo.pdf');*/  
    }
    
    public function descargarPDF()
    {
        $maestropdf = compact('id_maestropdf','pdf','fecha_reporte');
        $pdf= PDF::loadView('reportes',$maestropdf);
        return $pdf->download('archivo.pdf');  
    }

    public function inicio_turno($datosTipo)
    {
        DB::table('dxpst.bit_maestro_turno')->insert([
            'ID_TURNO' =>  $datosTipo['turno'],
            'ID_USUARIO' => 1,
            'ID_ESTADO' => 1,
        ]);

        $data = DB::table('dxpst.bit_maestro_turno')
        ->select('nro_registro')
        ->where('id_estado', '=', 1)
        ->orderBy('nro_registro', 'desc')
        ->limit(1)
        ->get();

        session_start();
        $result = json_decode($data, TRUE);
        $turno = implode(" ", $result[0]);
        $_SESSION['turno_activo'] = $turno;
        $turno_activo = intval($turno);
        $this->registrar_accidente($turno_activo);
        $this->registrar_alcoholemia($turno_activo);
        $this->registrar_procedimiento($turno_activo);
        $this->registrar_turno_activo($turno_activo);

        $_SESSION['mensaje'] = 2;
        
        return redirect('turnoactivo');
    }

    //TRIGGER DE INICIALIZACIÓN DE TABLA ACCIDENTALIDAD 
    public function registrar_accidente($turno_activo)
    {
        $data = DB::table('dxpst.bit_tipo_accidente')
        ->select('id_tipo_accidente')
        ->get();
        $result = json_decode($data, true);

        foreach($result as $r){
            DB::table('dxpst.Bit_Accidentalidad')->insert([
                'cantidad_acc' => 0,
                'id_tipo_accidente' => $r['id_tipo_accidente'],
                'nro_registro'=> $turno_activo
            ]);
        }
    }
    
    //TRIGGER DE INICIALIZACIÓN DE TABLA ALCOHOLEMIA 
    public function registrar_alcoholemia($turno_activo)
    {
        $data = DB::table('dxpst.bit_tipo_prueba')
        ->select('id_tipo_prueba')
        ->get();
        $result = json_decode($data, true);

        foreach($result as $r){
            DB::table('dxpst.Bit_Prueba_Alcoholemia')->insert([
                'cantidad_positivo' => 0,
                'cantidad_negativo' => 0,
                'id_tipo_prueba' => $r['id_tipo_prueba'],
                'nro_registro'=> $turno_activo
            ]);
        }
    }

    //TRIGGER DE INICIALIZACIÓN DE TABLA PROCEDIMIENTOS 
    public function registrar_procedimiento($turno_activo)
    {
        $data = DB::table('dxpst.bit_zona')
        ->select('id_zona')
        ->get();
        $result = json_decode($data, true);

        foreach($result as $r){

            $data1 = DB::table('dxpst.Bit_Tipo_Procedimiento')
            ->select('id_tipo_proc')
            ->get();
            $result1 = json_decode($data1, true);

            foreach($result1 as $r1){
                DB::table('dxpst.Bit_Procedimiento')->insert([
                    'id_zona' => $r['id_zona'],
                    'id_tipo_proc' => $r1['id_tipo_proc'],
                    'cantidad_proc' => 0,
                    'nro_registro'=> $turno_activo
                ]);
            }
        }
    }

    public function registrar_turno_activo($turno_activo)
    {

        DB::table('dxpst.bit_turno_activo')->update([
                    'id_turno_activo' => $turno_activo,
                    'usuario_inicia' => 1
                ]);
    }

    public function validacion_turno(Request $request)
     {
        $datosTipo = request()->except('_token');
        $conteo = DB::table('dxpst.bit_maestro_turno')
        ->select(DB::raw('count(ID_ESTADO) as count'))
        ->where('ID_ESTADO', '=', 1)
        ->orwhere('ID_ESTADO', '=', 3)
        ->get();

        if($conteo == '[{"count":"1"}]'){
            
            session_start();
            $_SESSION['mensaje'] = 6;
            return redirect('maestroTurno');

        } else if($conteo == '[{"count":"0"}]'){
            
            $this->inicio_turno($datosTipo);
            return redirect('maestroTurno');
        }

     }
    
    public function consulta_turno_activo(Request $request)
    {
        $data = DB::table('dxpst.BIT_MAESTRO_TURNO')
        ->where('ID_ESTADO', 1)
        ->orwhere('ID_ESTADO', 3)
        ->get();
        $result = json_decode($data, TRUE);
        return view('maestroTurno', ['result' => $result]);
    }

    public function pausar_turno(Request $request, $id)
    {
        $datoTurno = request();
        DB::table('dxpst.BIT_MAESTRO_TURNO')
            ->where('NRO_REGISTRO', '=', $datoTurno['id'])
            ->update(['ID_ESTADO' => 3]);

        session_start();
        $_SESSION['mensaje'] = 3;
        return redirect('maestroTurno');
    }

    public function reanudar_turno(Request $request, $id)
    {
        $datoTurno = request();
        DB::table('dxpst.BIT_MAESTRO_TURNO')
            ->where('NRO_REGISTRO', '=', $datoTurno['id'])
            ->update(['ID_ESTADO' => 1]);

        session_start();
        $_SESSION['mensaje'] = 4;
        return redirect('maestroTurno');
        
    }

    public function finalizar_turno(Request $request, $id)
    {
        $datoTurno = request();
        DB::table('dxpst.BIT_MAESTRO_TURNO')
            ->where('NRO_REGISTRO', '=', $datoTurno['id'])
            ->update(['ID_ESTADO' => 4]);
        
        DB::table('dxpst.bit_turno_activo')
        ->update(['id_turno_activo' => null]);

        session_start();
        $_SESSION['mensaje'] = 5;
        return redirect('maestroTurno');
    }

     //FUNCIÓN GENERADA PARA LISTAR LOS INFORMES CEGES EN EL BLADE HISTORIAL CEGES DETALLADO LACALDERON 16/03/2023
     public function consulta_ceges(){
        
        $datoTurno = request()->except('_token');

        session_start();
        $turno_activo = $_SESSION['turno_activo'];

        $data = DB::table('dxpst.Bit_Maestropdf')
        ->select('*')
        ->where('fecha_registro', 'LIKE', '%'.$datoTurno['fecha_consulta'].'%')
        ->orderBy('id_maestropdf', 'asc')
        ->get();
        $result = json_decode($data, TRUE);
        return view('historial_ceges_detalle', ['result' => $result]);

    }

}
