@extends('adminlte::page')

@section('title','Historial')

@section('content_header')

<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

<!-- Styles -->
<link rel="stylesheet" href="{{ asset('css/home.css') }}">
@stop


@section('content')
<div class="card6" style="width: 18rem;">

<h6 class="card-header p-1">Seleccionar turno a consultar</h6>
 
  <div class="card-body6">

      <form method="POST" action="">
        @csrf

        <br>
          <div class="row1 mb-4">
            <label for="turno" class="col-md-4 col-form-select " ><strong>{{ __('Turno') }}</strong></label><br><br>

            <select name="turno" style="width: 8rem; height:2rem;" id="turno">
              <option selected disabled value="">Opciones...</option>
              <option value="1">Primer Turno</option>
              <option value="2">Segundo Turno</option>
              <option value="3">Tercer Turno</option>
              
            </select>
          </div>

          <div class="row mb-4">
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
 </div> 
@stop



@section('css')
<link rel="stylesheet" href="{{ asset('css/home.css') }}">
@stop

 


