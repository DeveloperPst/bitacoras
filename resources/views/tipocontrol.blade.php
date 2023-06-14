@extends('adminlte::page')

@section('title','Tipo Control')

@section('content_header')

<!-- Styles -->

<link rel="stylesheet" href="{{ asset('css/home.css') }}">
@stop
@section('content')

<?php

session_start();
if($_SESSION['mensaje'] == 6){
        
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
        icon: 'success',
        title: 'Información registrada correctamente!'
    })
    </script>";

    $_SESSION['mensaje'] = 0;

} else if($_SESSION['mensaje'] == 7){
        
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
        icon: 'success',
        title: 'Información actualizada correctamente!'
    })
    </script>";

    $_SESSION['mensaje'] = 0;

} else if($_SESSION['mensaje'] == 5){
        
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
        icon: 'success',
        title: 'Información actualizada correctamente!'
    })
    </script>";

    $_SESSION['mensaje'] = 0;

}

?>

<div class="container-tc">
    <div class="row-tc justify-content-center">

    <div class="col-md-12">
            <div class="card13">
                <div class="card-header p-1">{{ __('Registro tipo de control') }}</div><br>

                <div class="card-body-tc">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
        
                    <form method="POST" action="{{ url('registro_tipo_cont') }}">
                        @csrf

                        <div class="row-tc mb-2 text-center">
                            <label for="descripcion" class="col-md col-form-label">{{ __('Descripción') }}</label>
    
                            <div class="col-md-6">
                                <input id="descripcion" type="text" class="form-control @error('descripcion') is-invalid @enderror" style="width: 10rem;"  name="descripcion" value="{{ old('descripcion') }}" required autocomplete="descripcion">

                                @error('descripcion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div><br>
                    
                        <div>
                            <div>
                                <button type="submit" class="btn btn-primary" id="guardar">
                                    {{ __('Guardar') }}
                                </button>   
                            </div>
                        </div><br>
                    </form>
                   
                    </div>
                </div>
            </div>


        <div class="col-md-6">
        <br>
            <div class="card14">
                <div class="card-header-tc2 p-1">{{ __('Listado de tipos de control') }}</div>

                <div class="card-body-tc2">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
        @csrf
                    <table class="table-tc2 table-hover">
                        <tr>
                            <td><strong>Id</strong></td>
                            <td><strong>Descripción</strong></td>
                            <td><strong>Estado</strong></td>
                            <td style='text-align: center;' colspan='2'><strong>Acciones</strong></td>
                            <td><strong>Fecha Registro</strong></td>
                        </tr>

                        @foreach($result as $d)
                        <tr>
                            <td>{{ $d['id_tipo_control'] }}</td>
                            <td>{{ $d['descripcion_tipo_cont'] }}</td>

                            @if($d['estado'] == 1)   
                              <td class="bg-success"> Activo</td>    
                            @else
                              <td class="bg-danger">Inactivo</td> 
                            @endif

                            <td>
                                <form method="post" action="{{ url('editar_tipo_control',$d['id_tipo_control']) }}" id="studentForm_{{$d['id_tipo_control']}}">
                                {{ method_field('GET') }}
                                {{  csrf_field() }}
                                <button type="submit" class="btn btn-edit btn-primary" title="Editar"><span class="fa fa-pen"></span></button>
                                </form>
                            </td>
                            
                            @if($d['estado'] == 1)   
                              <td>
                            <a href="{{ url('inhabilitar_tipo_control/'.$d['id_tipo_control'].'') }}"
                                class="btn btn-edit btn-primary bg-danger" title="Inhabilitar">
                                    <span class="fa fa-pause"></span>
                                </a>
                            </td>       
                            @else
                              <td>
                            <a href="{{ url('habilitar_tipo_control/'.$d['id_tipo_control'].'') }}"
                            class="btn btn-edit btn-primary bg-green" title="Habilitar">
                                    <span class="fa fa-play"></span>
                                </a>
                            </td>    
                            @endif

                            <td>{{ $d['fecha_registro'] }}</td>
                        </tr>
                        @endforeach
                    </table>
                    </div>
    </div>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
  $(document).ready(function(){
      $('.delete_form').on('submit', function(){
         if(confirm("¿Está seguro que desea eliminar este registro?"))
         {
             return true;
         }
         else
         {
             return false;
         }
      });
  });
</script>

@endsection