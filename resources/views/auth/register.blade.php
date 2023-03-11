@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Módulo de registro') }}</div>

                <div class="card-body">
                    <form method="post" action="{{ url('bit_usuario_1') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="DOCUMENTO_USUARIO" class="col-md-4 col-form-label text-center">{{ __('Documento') }}</label>
    
                            <div class="col-md-6">
                                <input id="DOCUMENTO_USUARIO" type="text" class="form-control @error('DOCUMENTO_USUARIO') is-invalid @enderror" name="DOCUMENTO_USUARIO" value="{{ old('DOCUMENTO_USUARIO') }}" required autocomplete="DOCUMENTO_USUARIO" autofocus>

                                @error('DOCUMENTO')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="NOMBRES_USUARIO" class="col-md-4 col-form-label text-center">{{ __('Nombres') }}</label>

                            <div class="col-md-6">
                                <input id="NOMBRES_USUARIO" type="text" class="form-control @error('NOMBRES_USUARIO') is-invalid @enderror" name="NOMBRES_USUARIO" value="{{ old('NOMBRES_USUARIO') }}" required autocomplete="NOMBRES_USUARIO" autofocus>

                                @error('NOMBRES_USUARIO')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="APELLIDOS_USUARIO" class="col-md-4 col-form-label text-center">{{ __('Apellidos') }}</label>

                            <div class="col-md-6">
                                <input id="APELLIDOS_USUARIO" type="text" class="form-control @error('APELLIDOS_USUARIO') is-invalid @enderror" name="APELLIDOS_USUARIO" value="{{ old('APELLIDOS_USUARIO') }}" required autocomplete="APELLIDOS_USUARIO" autofocus>

                                @error('APELLIDOS_USUARIO')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="CORREO_USUARIO" class="col-md-4 col-form-label text-center">{{ __('Correo') }}</label>

                            <div class="col-md-6">
                                <input id="CORREO_USUARIO" type="text" class="form-control @error('CORREO_USUARIO') is-invalid @enderror" name="CORREO_USUARIO" value="{{ old('CORREO_USUARIO') }}" required autocomplete="CORREO_USUARIO">

                                @error('CORREO_USUARIO')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="CONTRASENA_USUARIO" class="col-md-4 col-form-label text-center">{{ __('Contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="CONTRASENA_USUARIO" type="password" class="form-control @error('CONTRASENA_USUARIO') is-invalid @enderror" name="CONTRASENA_USUARIO" required autocomplete="CONTRASENA_USUARIO">

                                @error('CONTRASEÑA')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-center">{{ __('Confirmar contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="ID_PERFIL" class="col-md-4 col-form-label text-center">{{ __('Perfil') }}</label>

                        <div class="col-md-6">
                            <select id="ID_PERFIL" class="form-control @error('ID_PERFIL') is-invalid @enderror" name="ID_PERFIL" value="{{ old('ID_PERFIL') }}" required autocomplete="ID_PERFIL" autofocus>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <select>

                            @error('ID_PERFIL')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        </div>

                        <div class="row mb-3">
                            <label for="ID_ROL_USUARIO" class="col-md-4 col-form-label text-center">{{ __('Rol') }}</label>

                        <div class="col-md-6">
                            <select id="ID_ROL_USUARIO" class="form-control @error('ID_ROL_USUARIO') is-invalid @enderror" name="ID_ROL_USUARIO" value="{{ old('ID_ROL_USUARIO') }}" required autocomplete="ID_ROL_USUARIO" autofocus>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <select>

                            @error('ROL')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        </div>
                        
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary" id="guardar">
                                    {{ __('Guardar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

