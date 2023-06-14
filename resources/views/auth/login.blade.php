@extends('layouts.app')

<script src="./public/css/sweetalert2.all.min.js"></script>
<link href="./public/css/sweetalert2.min.css" rel="stylesheet">

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="border-radius: 1em 1em 0 0;text-align:center;font-size:large;">{{ __('Módulo de acceso') }}</div>

                <div class="card-body">
                    <form method="GET" action="{{ url('bit_usuario') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="documento_usuario" class="col-md-4 text-center">{{ __('Documento') }}</label>

                            <div class="col-md-6">
                                <input id="documento_usuario" type="text" class="form-control @error('documento_usuario') is-invalid @enderror" name="documento_usuario" value="{{ old('documento_usuario') }}" required autocomplete="documento_usuario" autofocus>

                                <!-- @error('Documento')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $error }}</strong>
                                    </span>
                                @enderror -->

                                @if (session('error'))
                                    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                                    <script>
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
                                        icon: 'error',
                                        title: '¡Credenciales Incorrectas!, Por favor validar'
                                    })
                                    
                                    </script>
                                @endif
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="contrasena_usuario" class="col-md-4 text-center">{{ __('Contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="contrasena_usuario" type="password" class="form-control @error('password') is-invalid @enderror" name="contrasena_usuario" required autocomplete="contrasena_usuario">

                                <!-- @error('Contraseña')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $error }}</strong>
                                    </span>
                                @enderror -->

                                @if (session('error'))
                                    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                                    <script>
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
                                        icon: 'error',
                                        title: '¡Credenciales Incorrectas!, Por favor validar'
                                    })
                                    
                                    </script>
                                @endif
                            </div>
                        </div>

                        <!-- <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Recuérdame') }}
                                    </label>
                                </div>
                            </div>
                        </div> -->

                        <div class="row mb-6">
                            <div class="col-md-10 offset-md-5">
                                <button type="submit" class="btn btn-primary" id="ingresar">
                                    {{ __('Ingresar') }}
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
