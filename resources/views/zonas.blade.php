@extends('adminlte::page')

@section('title','Zonas')

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
        icon: 'info',
        title: 'Información eliminada correctamente!'
    })
    </script>";

    $_SESSION['mensaje'] = 0;

} else {

}

?>

<div class="container">
    <div class="row2 justify-content-center">

    <div class="col-md-12">
            <div class="card15">
                <div class="card-header-tp p-1">{{ __('Registro de zonas') }}</div><br>

                <div class="card-body-l">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
        
                    <form method="POST" action="{{ url('registro_zona') }}">
                        @csrf

                        <div class="row-tp mb-3 text-center">
                            <label for="descripcion" class="col-md col-form-label">{{ __('Descripción') }}</label>
    
                            <div class="col-md-6">
                                <input id="descripcion" type="text" class="form-control @error('descripcion') is-invalid @enderror" style="width: 9rem;"  name="descripcion" value="{{ old('descripcion') }}" required autocomplete="descripcion">

                                @error('descripcion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    
                        <div class="row mb-0" style="margin-left: 3%;">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary"  id="guardar">
                                    {{ __('Guardar') }}
                                </button><br><br>
                            </div>
                        </div>
                    </form>
                   
                    </div>
                </div>
            </div>


        <div class="col-md-12">
        
            <div class="card16">
                <div class="card-header p-1">{{ __('Listado de zonas') }}</div>

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
                            <td style='text-align: center;'><strong>Acciones</strong></td>
                            <td><strong>Fecha Registro</strong></td>
                        </tr>

                        @foreach($result as $d)
                        <tr>
                            <td>{{ $d['id_zona'] }}</td>
                            <td>{{ $d['descripcion_zona'] }}</td>

                            <td>
                                <form method="post" class="delete_form" action="{{ url('eliminar_zona',$d['id_zona']) }}" id="studentForm_{{$d['id_zona']}}">
                                {{ method_field('GET') }}
                                {{  csrf_field() }}
                                <button type="submit" class="btn btn-danger" title="Eliminar"><span class="fa fa-trash"></span></button>
                                </form>
                            </td>
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