<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class Bit_procedimientos extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    
    public function editar_proc($id)
    {     
        $procedimiento = Bit_procedimientos::findOrFail($id);
        return view('editar_proc',compact('procedimiento'));   
    }

}
