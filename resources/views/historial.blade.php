@extends('adminlte::page')

@section('title','Historial')

@section('content_header')

<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

<!-- Styles -->
<link rel="stylesheet" href="{{ asset('css/home.css') }}">
@stop


@section('content')

<?php
  session_start();
  if($_SESSION['mensaje'] == 1){
        echo "<script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 4000,
            timerProgressBar: true,
            didOpen: (toast) => {
              toast.addEventListener('mouseenter', Swal.stopTimer)
              toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
          })
          
          Toast.fire({
            icon: 'info',
            title: 'No existen registros de turnos para la fecha consultada!!'
          })
        </script>";

        $_SESSION['mensaje'] = 0;
  }
  ?>

<div class="container-historial">
    <div class="card6" style="width: 18rem;">

    <h6 class="card-header p-1">Seleccionar fecha de turno a consultar</h6>
    
      <div class="card-body6">

          <form method="GET" action="{{ url('consultar_turno') }}"><br>
            @csrf
              <div class="row mb-6">
                                <label for="fecha_consulta" class="col-md-4 col-form-label" style="margin-left:11%;font-size:large;">{{ __('Fecha') }}</label><br><br>

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
</div> 
@stop



@section('css')
<link rel="stylesheet" href="{{ asset('css/home.css') }}">
@stop

 


