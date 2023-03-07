@extends('adminlte::page')

@section('title','Dashboard')

@section('content_header')

<!-- Styles -->

<link rel="stylesheet" href="{{ asset('css/home.css') }}">
@stop


@section('content')

<div class="card6" style="width: 16rem;">

<h6 class="card-header p-1">Seleccionar turno</h6>
 
  <div class="card-body6">

      <form method="POST" action="{{ url('validacion_turno') }}">
        @csrf

        <br>
          <div class="row1 mb-4">
            <label for="turno" class="col-md-4 col-form-label"><strong>{{ __('Turnos') }}</strong></label><br><br>

            <select name="turno" style="width: 39%;height:2rem;" id="turno" >
              <option selected disabled value="">Opciones...</option>
              <option value="4">Primer Turno</option>
              <option value="5">Segundo Turno</option>
              <option value="6">Tercer Turno</option>
              
            </select>
          </div><br>

          <div class="row mb-4">
            <div class="col-md-6 offset-md-4">
              <button type="submit" class="btn btn-primary" id="iniciar">
                {{ __('Iniciar') }}
              </button>
            </div><br>
          </div>
  
  </form>

  </div>   
 </div>  

 <div class="col-md-8">
        <br>
            <div class="card6-2">
                <div class="card-header-mt p-1">{{ __('Turno actualmente activo') }}</div>

                <div class="card-body6">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
        @csrf
                    <table class="table-turno1 table-hover">

                     
                        <tr>
                            <td><strong>Nro Registro</strong></td>
                            <td><strong>Id Turno</strong></td>
                            <td><strong>Inició</strong></td>
                            <td><strong>Estado</strong></td>
                            <td colspan='2' style='text-align: center;'><strong>Acciones</strong></td>
                            <td><strong>Fecha Registro</strong></td>
                        </tr>

                        @foreach($result as $d)

                        <tr>
                            <td>{{ $d['nro_registro'] }}</td>
                            <td>{{ $d['id_turno'] }}</td>
                            <td>{{ $d['id_usuario'] }}</td>
                           
                            @if($d['id_estado'] == 1)         
                              <td class="bg-success"> Activo</td> 
                              <td>
                            <a href="{{ url('pausar_turno/'.$d['nro_registro'].'') }}"
                                class="btn btn-edit btn-primary bg-danger" title="Pausar">
                                    <span class="fa fa-pause"></span>
                                </a>
                            </td>       
                            @else
                              <td class="bg-warning">Pausado</td> 
                              <td>
                            <a href="{{ url('reanudar_turno/'.$d['nro_registro'].'') }}"
                                class="btn btn-edit btn-primary bg-success" title="Reanudar">
                                    <span class="fa fa-play"></span>
                                </a>
                            </td>    
                            @endif

                            <td>
                            <form action="{{ url('finalizar_turno/'.$d['nro_registro'].'') }}">
                                <button name='finalizar' class="btn btn-edit btn-primary" title = "Finalizar">
                                    <span class="fa fa-check"></span>
                                </button><br>
                            </form>
                            </td>
                            <td>{{ $d['fecha_registro'] }}</td>
                        </tr>
                        @endforeach
                    </table>
                    </div>
              </div>
            </div>

@stop




