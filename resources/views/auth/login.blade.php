@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Módulo de acceso') }}</div>

                <div class="card-body">
                    <form method="GET" action="{{ url('bit_usuario') }}">
                        @csrf

                        <div class="row mb-4">
                            <label for="documento_usuario" class="col-md-4 text-center">{{ __('Documento') }}</label>

                            <div class="col-md-6">
                                <input id="documento_usuario" type="text" class="form-control @error('documento_usuario') is-invalid @enderror" name="documento_usuario" value="{{ old('documento_usuario') }}" required autocomplete="documento_usuario" autofocus>

                                @error('Documento')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="contrasena_usuario" class="col-md-4 text-center">{{ __('Contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="contrasena_usuario" type="password" class="form-control @error('password') is-invalid @enderror" name="contrasena_usuario" required autocomplete="contrasena_usuario">

                                @error('Contraseña')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Recuérdame') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-6">
                            <div class="col-md-10 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Ingresar') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Olvidaste tu contraseña?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    </div>
@endsection
