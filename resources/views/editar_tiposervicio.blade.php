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

<div class="container">
    <div class="row2 justify-content-center">


    <div class="col-md-12">
            <div class="card15">
                <div class="card-header-tp p-1">{{ __('Editar tipo de servicio') }}</div><br>

                <div class="card-body-l">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
        
                    <form method="POST" action="{{ url('actualizar_tipo_servicio') }}">
                        @csrf

                        @foreach($data as $d)
                        <div class="row-tp mb- text-center">
                            <label for="descripcion" class="col-md col-form-label">{{ __('Descripción') }}</label>
    
                            <div class="col-md-6">
                                <input id="descripcion" type="text" class="form-control @error('descripcion') is-invalid @enderror" style="width: 9rem;" name="descripcion" required
                                value="{{ $d->descripcion_tipo_serv }}">

                                @error('descripcion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div><br>
                        @endforeach
                    
                        <div class="row mb-0" style="margin-left: 3%;">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary" id="actualizar">
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

@endsection