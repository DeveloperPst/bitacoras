@extends('adminlte::page')

@section('title','Historial')

@section('content_header')

<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

<!-- Styles -->
<link rel="stylesheet" href="{{ asset('css/home.css') }}">
@stop


@section('content')

<div class="container-historial">

<div class="card6" style="width: 18rem;">

<h6 class="card-header p-1">Seleccionar fecha de turno a consultar</h6>
 
  <div class="card-body6">

      <form method="GET" action="{{ url('consultar_turno') }}">
        @csrf
          <div class="row mb-4"><br>
                            <label for="fecha_consulta" class="col-md-4 col-form-label" style="margin-left:15%;">{{ __('Fecha') }}</label><br><br>

                            <div class="col-md-12">
                                <input id="fecha_consulta" type="date" class="form-select @error('fecha_consulta') is-invalid @enderror" style="width:8rem;margin-left:15%; height:2rem;" name="fecha_consulta" value="{{ old('fecha_consulta') }}" required autocomplete="fecha_consulta">

                                @error('fecha_consulta')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div><br>

          <div class="row mb-4">
            <div class="col-md-6 offset-md-4">
              <button type="submit" class="btn btn-primary" id="consultar">
                {{ __('Consultar') }}
              </button>
            </div><br>
          </div>
  
  </form>

  </div>   
 </div><br><br>
 
<div class="card-tc-2">
 
  <div class="card-body6">
        @csrf

        <table id="table1" class="table-tc2 table-sm">
		        <tbody>
                    
                    @if(isset($result1))

                      <thead class="thead">
                        <tr>
                        <th colspan='4'><h4><strong>TURNOS RELACIONADOS CON LA FECHA DE BÚSQUEDA</strong></h4></th>
                        </tr>
                      <tr>  
                          <th>NRO REGISTRO</th><th>TURNO</th><th>FECHA REGISTRO</th><th>ACCIONES</th>
                      </tr>
                      </thead>
                    
                    @foreach($result1 as $r1)
                    <tr>
                        <td>{{ $r1['nro_registro'] }}</td>
                        <td>{{ $r1['descripcion_turno'] }}</td>
                        <td>{{ $r1['fecha_registro'] }}</td>
                        <td>
                              <a href="{{ url('detalle_turno/'.$r1['nro_registro'].'') }}"
                              class="btn btn-edit btn-primary" title="Detallado">
                                  <span class="fa fa-eye"></span>
                              </a>
                        </td>
                    </tr>
                    @endforeach   
                    
                    @else
                        <td>No existen registros para este turno</td>  
                    @endif

		        </tbody>

		        </table>

   </div>   
  </div> 
</div> 
@stop



@section('css')
<link rel="stylesheet" href="{{ asset('css/home.css') }}">
@stop

 


