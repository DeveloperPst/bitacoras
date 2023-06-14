<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Bit_Tipo_Accidente;
use Illuminate\Http\Request;

class Bit_select extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     public function listar_desplegables()
     {
         $data = DB::table('dxpst.Bit_Tipo_Accidente')->get();
         $result_select_acc = json_decode($data, TRUE);

         $data1 = DB::table('dxpst.Bit_Tipo_Control')->get();
         $result_select_cont = json_decode($data1, TRUE);

         $data2 = DB::table('dxpst.Bit_Tipo_Procedimiento')->get();
         $result_select_proc = json_decode($data2, TRUE);

         $data3 = DB::table('dxpst.Bit_Tipo_Prueba')->get();
         $result_select_prue = json_decode($data3, TRUE);
         
         $data4 = DB::table('dxpst.Bit_Tipo_Servicio')->get();
         $result_select_serv = json_decode($data4, TRUE);

         $data5 = DB::table('dxpst.Bit_Agente')->get();
         $result_select_age = json_decode($data5, TRUE);

         return view('turnoactivo', ['result_select_acc' => $result_select_acc,
         'result_select_cont' => $result_select_cont,
         'result_select_proc' => $result_select_proc,
         'result_select_prue' => $result_select_prue,
         'result_select_serv' => $result_select_serv,
         'result_select_age' => $result_select_age
        ]);
     }

    // FUNCIÓN PARA CONSULTAR LOS REGISTROS DE LA TABLA Bit_Rol_Usuario LACALDERON 24/02/2023
    public function Bit_select_rol(Request $request)
    {
        $data = DB::table('dxpst.Bit_Rol_Usuario')->get();
        $result_select_rol = json_decode($data, TRUE);
        return view('turnoactivo', ['result_select_rol' => $result_select_rol]);
    }

    // FUNCIÓN PARA CONSULTAR LOS REGISTROS DE LA TABLA bit_turnos LACALDERON 24/02/2023
    public function Bit_select_turn(Request $request)
    {
        $data = DB::table('dxpst.bit_turnos')->get();
        $result_select_tur = json_decode($data, TRUE);
        return view('turnoactivo', ['result_select_tur' => $result_select_tur]);
    }
}
