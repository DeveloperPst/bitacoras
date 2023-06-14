<?php

namespace App\Http\Controllers;

use App\Models\Bit_maestropdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\QueryException;



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

    
    public function registrar_ceges($ipat)
    {        
        
        $data = DB::table('dxpst.Bit_Maestropdf')
        ->select('nombre_pdf')
        ->where('nombre_pdf','=',$ipat)
        ->get();

        $result = json_decode($data, true);
      
        if(count($data) > 0){
            return 0;
        } else {
            DB::table('dxpst.Bit_Maestropdf')->insert([
                'nombre_pdf' => $ipat,
                'ruta_pdf' => "/var/www/html/bitacora/storage/app/public/ceges/$ipat.pdf"
            ]);
            return 1;
        }
    }

     public function crearPDF(Request $request){
      
        $data = $request->all();
        $ipat = $data['ipat'];    
       
       // Obtener el archivo enviado desde el formulario

       $validacion= $this->registrar_ceges($ipat); 

       if($validacion == 0){
        
        session_start();
        $_SESSION['mensaje'] = 1;
        return redirect('/reportes');
         
    } else {
      
       $archivos = $request->file('archivo');
               
        date_default_timezone_set('america/bogota');

        $imageUrls = [];
   
        foreach ($archivos as $archivo){
        $file = uniqid().'_'.$archivo->getClientOriginalName();
        // Guardar el archivo en el servidor
        $archivo->storeAs('images', $file);          
        $url= Storage::url('app/images/').$file;
        array_push($imageUrls, $url);  
        
        }
        
        // Generar un nombre único para el archivo  
                                   
        $pdf = PDF::loadView('pdf',$data,['imageUrls'=>$imageUrls]);
        // $pdf_content= $pdf->download()->getOriginalContent(); 
        $pdf_content= $pdf->output();
               
        $nombre_archivo = $ipat.'.pdf';
        
        Storage::disk('public')->put($nombre_archivo,$pdf_content);
 
        
        return $pdf->stream();  
          
          }
      }

      
    public function inicio_turno($datosTipo)
    {
        session_start();

        if($datosTipo['turno'] == 0){
            $_SESSION['mensaje'] = 7;
            return redirect('turnoactivo');
        } else {

        DB::table('dxpst.bit_maestro_turno')->insert([
            'ID_TURNO' =>  $datosTipo['turno'],
            'ID_USUARIO' => $_SESSION['usuario_inicia_sesion'],
            'ID_ESTADO' => 1,
        ]);

        $data = DB::table('dxpst.bit_maestro_turno')
        ->select('nro_registro')
        ->where('id_estado', '=', 1)
        ->orderBy('nro_registro', 'desc')
        ->limit(1)
        ->get();

        $result = json_decode($data, TRUE);
        $turno = implode(" ", $result[0]);
        $_SESSION['turno_activo'] = $turno;

        $turno_activo = intval($turno);
        $this->registrar_accidente($turno_activo);
        $this->registrar_alcoholemia($turno_activo);
        $this->registrar_procedimiento($turno_activo);
        $this->registrar_turno_activo($turno_activo);

        $_SESSION['mensaje'] = 2;

        // SI HAY TURNO ACTIVO OBTIENE descripcion_turno DE LA TABLA bit_maestro_turno ACALDERON
        $data8 = DB::table('dxpst.bit_maestro_turno')
        ->select('id_turno')
        ->where('nro_registro', '=', $_SESSION['turno_activo'])
        ->get();
        $result8 = json_decode($data8, TRUE);
        $id_turno = implode(" ", $result8[0]);

        $data7 = DB::table('dxpst.Bit_turno')
        ->select('descripcion_turno')
        ->where('id_turno', '=', $id_turno)
        ->get();
        $result7 = json_decode($data7, TRUE);
        $nombre_turno_actual = implode(" ", $result7[0]);
        
        $_SESSION['nombre_turno_actual'] = $nombre_turno_actual;
        
        return redirect('turnoactivo');
        }
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

        $contador = 0;
        
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
                    'nro_registro'=> $turno_activo,
                    'id_concat' => $contador
                ]);

                $contador++;
            }
        }
    }

    public function registrar_turno_activo($turno_activo)
    {

        DB::table('dxpst.bit_turno_activo')->update([
                    'id_turno_activo' => $turno_activo,
                    'usuario_inicia' => $_SESSION['usuario_inicia_sesion']
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
        ->join('dxpst.Bit_Turno', 'dxpst.BIT_MAESTRO_TURNO.id_turno', '=', 'dxpst.Bit_Turno.id_turno')
        ->join('dxpst.Bit_Usuario', 'dxpst.BIT_MAESTRO_TURNO.id_usuario', '=', 'dxpst.Bit_Usuario.id_usuario')
        ->select('dxpst.BIT_MAESTRO_TURNO.*', 'dxpst.Bit_Usuario.nombres_usuario', 'dxpst.Bit_Usuario.apellidos_usuario', 'dxpst.Bit_Turno.descripcion_turno')
        ->where('dxpst.BIT_MAESTRO_TURNO.ID_ESTADO', 1)
        ->orwhere('dxpst.BIT_MAESTRO_TURNO.ID_ESTADO', 3)
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
        ->update(['id_turno_activo' => 0]);

        session_start();
        $_SESSION['mensaje'] = 5;
        $_SESSION['turno_activo'] = 0;
        return redirect('maestroTurno');
    }

     //FUNCIÓN GENERADA PARA LISTAR LOS INFORMES CEGES EN EL BLADE HISTORIAL CEGES DETALLADO LACALDERON 16/03/2023
     public function ceges_detalle(Request $request){
        session_start();
        $datoTurno = request()->except('_token');

        $data = DB::table('dxpst.Bit_Maestropdf')
        ->select('*')
        ->where('fecha_registro', 'LIKE', '%'.$datoTurno['fecha_consulta'].'%')
        ->orderBy('id_maestropdf', 'asc')
        ->get();
        $result = json_decode($data, TRUE);

        if($result){
            return view('historial_ceges_detalle', ['result' => $result]);
        } else {
            $_SESSION['mensaje'] = 1;
            return redirect('historial_ceges');
        }

        
    }

    	

}
