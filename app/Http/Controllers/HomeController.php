<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(){


        return view('/home');
    }
    
    public function turno1()
    {
        return view('/primerTurno');
    }

    public function turno2()
    {
        return view('/segundoTurno');
    }

    public function turno3()
    {
        return view('/tercerTurno');
    }
    
    public function graficas()
    {
        return view('/graficas');
    }

    public function perfiles()
    {
        return view('/perfiles');
    }

    public function cambiarContrasena()
    {
        return view('/cambiarContrasena');
    }

    public function reportes()
    {
        return view('/reportes');
    }

    public function maestroTurno()
    {
        return view('/maestroTurno');
    }
    
    public function parametrizacion()
    {
        return view('/parametrizacion');
    }

}
