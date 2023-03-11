@extends('adminlte::page')

@section('title','Dashboard')

@section('content_header')

<!-- Styles -->

<link rel="stylesheet" href="{{ asset('css/home.css') }}">
@stop
@section('content')
<div class="container">
    
    <div class="row3 justify-content-center">


    <div class="col-md-12">
            <div class="card21">
                <div class="card-header">{{ __('Registro de usuario') }}</div>

                <div class="card-body-usuarios">
                    <form method="post" action="{{ url('bit_usuario_1') }}">
                        @csrf
                    <table>
                        <tr>
                            <td>
                            <label for="DOCUMENTO_USUARIO">{{ __('Documento') }}</label>
    
                                <input id="DOCUMENTO_USUARIO" type="text" class="form-control @error('DOCUMENTO_USUARIO') is-invalid @enderror" name="DOCUMENTO_USUARIO" value="{{ old('DOCUMENTO_USUARIO') }}" required autocomplete="DOCUMENTO_USUARIO" autofocus>
                            </td>
                        
                            <td>
                            <label for="CORREO_USUARIO" class="col-md-4 col-form-label text-center">{{ __('Correo') }}</label>

                                <input id="CORREO_USUARIO" type="text" class="form-control @error('CORREO_USUARIO') is-invalid @enderror" name="CORREO_USUARIO" value="{{ old('CORREO_USUARIO') }}" required autocomplete="CORREO_USUARIO">

                            </td></tr>

                       <tr><td>
                            <label for="NOMBRES_USUARIO">{{ __('Nombres') }}</label><br>

                                <input id="NOMBRES_USUARIO" type="text" class="form-control @error('NOMBRES_USUARIO') is-invalid @enderror" name="NOMBRES_USUARIO" value="{{ old('NOMBRES_USUARIO') }}" required autocomplete="NOMBRES_USUARIO" autofocus>
                            </td>

                            <td>
                            <label for="APELLIDOS_USUARIO">{{ __('Apellidos') }}</label>

                            
                                <input id="APELLIDOS_USUARIO" type="text" class="form-control @error('APELLIDOS_USUARIO') is-invalid @enderror" name="APELLIDOS_USUARIO" value="{{ old('APELLIDOS_USUARIO') }}" required autocomplete="APELLIDOS_USUARIO" autofocus>
                            </td></tr>

                            <tr><td>
                            
                            <label for="CONTRASENA_USUARIO">{{ __('Contraseña') }}</label>

                                <input id="CONTRASENA_USUARIO" type="password" class="form-control @error('CONTRASENA_USUARIO') is-invalid @enderror" name="CONTRASENA_USUARIO" required autocomplete="CONTRASENA_USUARIO">

                               
                            <td><label for="password-confirm">{{ __('Confirmar Contraseña') }}</label>

                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </td></tr>
                    
                        <tr><td>
                                <button type="submit" class="btn btn-primary" style="margin-right: 2rem;" id="guardar">
                                    {{ __('Guardar') }}
                                </button>
                            </td></tr>
                    </table>
                    </form>
                   
                    </div>
                </div>
            </div>



        <div class="col-md-12">
        <br>
            <div class="card20">
                <div class="card-header p-1">{{ __('Listado de Usuarios') }}</div>

                <div class="card-body-us">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table-t1-usuarios table-hover">
                        <tr>
                            <td><strong>Id</strong></td>
                            <td><strong>Nombres</strong></td>
                            <td><strong>Apellidos</strong></td>
                            <td><strong>Correo</strong></td>
                            <td colspan='3' style='text-align: center;'><strong>Acciones</strong></td>
                            <td><strong>Fecha Registro</strong></td>
                        </tr>

                        @foreach($data as $d)
                        <tr>
                            <td>{{ $d['id_usuario'] }}</td>
                            <td>{{ $d['nombres_usuario'] }}</td>
                            <td>{{ $d['apellidos_usuario'] }}</td>
                            <td>{{ $d['correo_usuario'] }}</td>
                            
                            <td>
                                <a href="{{ url('usuario_especifico_2/'.$d['id_usuario'].'') }}"
                                class="btn btn-edit btn-primary bg-warning" title="Restablecer">
                                    <span class="fa fa-key"></span>
                                </a>
                            </td>  

                            <td>
                            <form method="post" class="delete_form" action="{{ url('usuario_especifico',$d['id_usuario']) }}" id="studentForm_{{$d['id_usuario']}}">
                                {{ method_field('GET') }}
                                {{  csrf_field() }}
                                <button name='editar' class="btn btn-edit btn-primary" title='Editar'>
                                    <span class="fa fa-edit"></span>
                                </button>
                            </form>
                            </td>

                            @if($d['estado_usuario'] == '1')
                            <td>
                                <a href="{{ url('inactivar_usuario/'.$d['id_usuario'].'') }}"
                                class="btn btn-edit btn-primary bg-danger" title="Inactivar">
                                    <span class="fa fa-pause"></span>
                                </a>
                            </td>       
                            @else
                            <td>
                                <a href="{{ url('activar_usuario/'.$d['id_usuario'].'') }}"
                                class="btn btn-edit btn-primary bg-green" title="Activar">
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
@endsection
