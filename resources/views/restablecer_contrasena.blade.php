@extends('adminlte::page')

@section('title','Edición usuario')

@section('content_header')

<!-- Styles -->

<link rel="stylesheet" href="{{ asset('css/home.css') }}">
@stop
@section('content')
<div class="container">
    <div class="row justify-content-center">

    <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Restablecimiento de credenciales de usuario') }}</div>

                <div class="card-body">
                    <form method="post" action="{{ url('restablecer_contrasena') }}">
                        @csrf

                        @foreach($data as $d)
                        <div class="row mb-12">
                            <div class="col-md-12">
                                <input id="ID_USUARIO" type="text" hidden class="form-control @error('ID_USUARIO') is-invalid @enderror" name="ID_USUARIO" required autocomplete="ID_USUARIO"
                                value="{{ $d->id_usuario }}">

                                @error('ID_USUARIO')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-12">
                            <label for="CONTRASENA_USUARIO" class="col-md-12 col-form-label text-center" style="margin-left: 12%;">{{ __('Nueva contraseña') }}</label>
    
                            <div class="col-md-12">
                                <input id="CONTRASENA_USUARIO" type="password" class="form-control @error('CONTRASENA_USUARIO') is-invalid @enderror" name="CONTRASENA_USUARIO" required autocomplete="CONTRASENA_USUARIO" autofocus style="margin-left: 15%;">

                                @error('CONTRASENA_USUARIO')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-12">
                            <label for="CONFIRMAR_CONTRASENA" class="col-md-12 col-form-label text-center"  style="margin-left: 12%;">{{ __('Confirmar contraseña') }}</label>
    
                            <div class="col-md-12">
                                <input id="CONFIRMAR_CONTRASENA" type="password" class="form-control @error('CONFIRMAR_CONTRASENA') is-invalid @enderror" name="CONFIRMAR_CONTRASENA" required autocomplete="CONFIRMAR_CONTRASENA" style="margin-left: 15%;">

                                @error('CONFIRMAR_CONTRASENA')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        @endforeach
                        
                        <br>
                    
                        <div class="row2 mb-0">
                            <div class="col-md-5" style="margin-left: 1%;">
                                <button type="submit" class="btn btn-primary" id="restablecer">
                                    {{ __('Restablecer') }}
                                </button><br><br>
                            </div>
                        </div>
                    </form>
                   
                    </div>
                </div>
            </div>


    </div>
</div>
@endsection
