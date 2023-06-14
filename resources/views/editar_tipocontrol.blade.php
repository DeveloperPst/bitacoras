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
        icon: 'info',
        title: 'Información eliminada correctamente!'
    })
    </script>";

    $_SESSION['mensaje'] = 0;

} else {

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
        
                    @foreach($data as $d)
                    <form method="POST" action="{{ url('fun_editar_tipo_control') }}">
                        @csrf

                        <div class="col-md-12">
                                <input id="id_tipo_control" type="text" hidden class="form-control @error('id_tipo_control') is-invalid @enderror" name="id_tipo_control" required autocomplete="id_tipo_control"
                                value="{{ $d->id_tipo_control }}">

                                @error('id_agente')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        <div class="row-tc mb-2 text-center">
                            <label for="descripcion" class="col-md col-form-label">{{ __('Descripción') }}</label>
    
                            <div class="col-md-6">
                                <input id="descripcion" type="text" class="form-control @error('descripcion') is-invalid @enderror" style="width: 10rem;"  name="descripcion" required
                                value="{{ $d->descripcion_tipo_cont }}">

                                @error('descripcion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div><br>
                    @endforeach

                        <div class="row mb-2">
                            <div class="col-md-0 offset-md-0">
                                <button type="submit" class="btn btn-primary" id="actualizar" style="margin-left:19%;">
                                    {{ __('Actualizar') }}
                                </button>   
                            </div>
                        </div><br>
                    </form>
                   
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