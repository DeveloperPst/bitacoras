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
                <div class="card-header">{{ __('Actualización de datos de usuario') }}</div>

                <div class="card-body">
                    <form method="post" action="{{ url('editar_usuario') }}">
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
                            <label for="DOCUMENTO_USUARIO" class="col-md-12 col-form-label text-center">{{ __('Documento') }}</label>
    
                            <div class="col-md-12">
                                <input id="DOCUMENTO_USUARIO" type="text" class="form-control @error('DOCUMENTO_USUARIO') is-invalid @enderror" name="DOCUMENTO_USUARIO" required autocomplete="DOCUMENTO_USUARIO" autofocus
                                value="{{ $d->documento_usuario }}">

                                @error('DOCUMENTO')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-12">
                            <label for="NOMBRES_USUARIO" class="col-md-12 col-form-label text-center">{{ __('Nombres') }}</label>

                            <div class="col-md-12">
                                <input id="NOMBRES_USUARIO" type="text" class="form-control @error('NOMBRES_USUARIO') is-invalid @enderror" name="NOMBRES_USUARIO" required autocomplete="NOMBRES_USUARIO"
                                value="{{ $d->nombres_usuario }}">

                                @error('NOMBRES_USUARIO')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-12">
                            <label for="APELLIDOS_USUARIO" class="col-md-12 col-form-label text-center">{{ __('Apellidos') }}</label>

                            <div class="col-md-12">
                                <input id="APELLIDOS_USUARIO" type="text" class="form-control @error('APELLIDOS_USUARIO') is-invalid @enderror" name="APELLIDOS_USUARIO" required autocomplete="APELLIDOS_USUARIO"
                                value="{{ $d->apellidos_usuario }}">

                                @error('APELLIDOS_USUARIO')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-12">
                            <label for="CORREO_USUARIO" class="col-md-12 col-form-label text-center">{{ __('Correo') }}</label>

                            <div class="col-md-12">
                                <input id="CORREO_USUARIO" type="text" class="form-control @error('CORREO_USUARIO') is-invalid @enderror" name="CORREO_USUARIO" required autocomplete="CORREO_USUARIO"
                                value="{{ $d->correo_usuario }}">

                                @error('CORREO_USUARIO')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        @endforeach
                        
                        <br>
                    
                        <div class="row mb-2" style="margin-left: 19%;">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary" id="actualizar">
                                    {{ __('Actualizar') }}
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
