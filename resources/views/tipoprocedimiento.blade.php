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

} else {

}

?>

<div class="container-tipoP">
    <div class="row2 justify-content-center">
        <div class="col-md-12">


        <div class="col-md-12">
            <div class="card15">
                <div class="card-header-tp p-1">{{ __('Registro tipo de procedimiento') }}</div><br>

                <div class="card-body-l">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ url('registro_tipo_proc') }}">
                        @csrf

                        <div class="row-tp mb-4 text-center">
                            <label for="descripcion" class="col-md col-form-label" style="margin-left: 3%;">{{ __('Descripción') }}</label>
    
                            <div class="col-md-6">
                                <input id="descripcion" type="text" class="form-control @error('descripcion') is-invalid @enderror" style="width: 9rem;" name="descripcion" value="{{ old('descripcion') }}" required autocomplete="descripcion">

                                @error('descripcion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-5" style="margin-right: 1%;">
                                <button type="submit" class="btn btn-primary" id="guardar">
                                    {{ __('Guardar') }}
                                </button>
                            </div>
                        </div><br>
                    </form>
                   
                    </div>
                </div>
            </div>
        
            <div class="card16">
                <div class="card-header p-1">{{ __('Listado de tipos de procedimientos') }}</div>

                <div class="card-body-tp">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
        @csrf
                    <table class="table-tp table-hover">
                        <tr>
                            <td><strong>Id</strong></td>
                            <td><strong>Descripción</strong></td>
                            <td><strong>Estado</strong></td>
                            <td style='text-align: center;' colspan='2'><strong>Acciones</strong></td>
                            <td><strong>Fecha Registro</strong></td>
                        </tr>


                        @foreach($result as $d)
                        <tr>
                            <td>{{ $d['id_tipo_proc'] }}</td>
                            <td>{{ $d['descripcion_tipo_proc'] }}</td>

                            @if($d['estado'] == 1)   
                              <td class="bg-success"> Activo</td>    
                            @else
                              <td class="bg-danger">Inactivo</td> 
                            @endif

                            <td>
                                <form method="post" action="{{ url('editar_tipo_procedimiento',$d['id_tipo_proc']) }}" id="studentForm_{{$d['id_tipo_proc']}}">
                                {{ method_field('GET') }}
                                {{  csrf_field() }}
                                <button type="submit" class="btn btn-edit btn-primary" title="Editar"><span class="fa fa-pen"></span></button>
                                </form>
                            </td>

                            @if($d['estado'] == 1)   
                              <td>
                            <a href="{{ url('inhabilitar_tipo_procedimiento/'.$d['id_tipo_proc'].'') }}"
                                class="btn btn-edit btn-primary bg-danger" title="Inhabilitar">
                                    <span class="fa fa-pause"></span>
                                </a>
                            </td>       
                            @else
                              <td>
                            <a href="{{ url('habilitar_tipo_procedimiento/'.$d['id_tipo_proc'].'') }}"
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