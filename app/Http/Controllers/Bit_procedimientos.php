<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class Bit_procedimientos extends Controller
{
    
    public function editar_proc($id)
    {     
        $procedimiento = Bit_procedimientos::findOrFail($id);
        return view('editar_proc',compact('procedimiento'));   
    }
    

	public function actualizar_proc(Request $request)
    {
       
        $data = request()->except(['_token','_method', 'button3']);
        session_start();
        $turno_activo = $_SESSION['turno_activo'];

        //PARA CADA UNO DE LOS REGISTROS DEL FORMUALRIO ACTUALIZA SU VALOR SUMANDOLE EL PREVIO DE LA CONSULTA DATA1
        foreach($data as $d){

        //CONSULTA DE CANTIDADES PREVIA AL UPDATE
        $data1 = DB::table('dxpst.Bit_Procedimiento')
        ->where('nro_registro', '=', $turno_activo)
        ->where('id_zona', '=', 1)
        ->where('id_tipo_proc', '=', 1)
        ->get('cantidad_proc');

        //PARSEA EL RESULTADO A ENTERO
        $result = json_decode($data1, TRUE);
        $cantidad = implode(" ", $result[0]);
        $cantidad_p = intval($cantidad);

        DB::table('dxpst.Bit_Procedimiento')
        ->where('nro_registro', '=', $turno_activo)
        ->where('id_zona', '=', 1)
        ->where('id_tipo_proc', '=', 1)
        ->update([
            'cantidad_proc' => $d + $cantidad_p
        ]);

        
        }
        return redirect('turnoactivo');
    }	
}
