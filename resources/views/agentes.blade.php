@extends('adminlte::page')

@section('title','Agentes')

@section('content_header')

<!-- Styles -->

<link rel="stylesheet" href="{{ asset('css/home.css') }}">
@stop

@section('content')

<div class="container-agentes">
    <div class="row1 justify-content-center">

    <div class="col-md-12">
            <div class="card10">
                <div class="card-header-a p-1">{{ __('Registro agentes de tránsito') }}</div>

                <div class="card-body-agentes">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div> 
                    @endif

                    <form method="POST" action="{{ url('registro_agente') }}" class="form">
                        @csrf

                        <div class="row1 mb-2">
                            <label for="documento" class="col-md-6 col-form-label">{{ __('Documento') }}</label>
    
                            <div class="col-md-4">
                                <input id="documento" type="number" class="form-control @error('documento') is-invalid @enderror" style="width: 11rem;" name="documento" value="{{ old('documento') }}" required autocomplete="documento">

                                @error('documento')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row1 mb-3">
                            <label for="placa" class="col-md-6 col-form-label">{{ __('Placa') }}</label>
    
                            <div class="col-md-6">
                                <input id="placa" type="number" class="form-control @error('placa') is-invalid @enderror" style="width: 11rem;" name="placa" value="{{ old('placa') }}" required autocomplete="placa">

                                @error('placa')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row1 mb-2">
                            <label for="nombre" class="col-md-2 col-form-label" style="margin-right: 25%;">{{ __('Nombre') }}</label>
    
                            <div class="col-md-6">
                                <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" style="width: 11rem;" name="nombre" value="{{ old('nombre') }}" required autocomplete="nombre">

                                @error('nombre')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div><br>
                        </div>
                    
                        <div class="row1 mb-2">
                            <div class="col-md-2 offset-md-3">
                                <button type="submit" class="btn btn-primary" style="align-content: center;" id="registrar">
                                    {{ __('Registrar') }}
                                </button><br><br>
                            </div>
                        </div>
                    </form>
                   
                    </div>
                </div>
            </div>


        <div class="col-md-12">
             <div class="card6-3">
                <div class="card-header-ag p-1">{{ __('Listado de agentes de tránsito') }}</div>

                <div class="card-body6">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
        @csrf
                    <table class="table-ta1 table-sm table-hover">
                        <tr>
                            <td><strong>Id</strong></td>
                            <td><strong>Documento</strong></td>
                            <td><strong>Placa</strong></td>
                            <td><strong>Nombre</strong></td>
                            <td><strong>Estado</strong></td>
                            <td colspan='2' style='text-align: center;'><strong>Acciones</strong></td>
                            <td><strong>Fecha Registro</strong></td>
                        </tr>

                        @foreach($result as $d)
                        <tr>
                            <td>{{ $d['id_agente'] }}</td>
                            <td>{{ $d['nro_documento'] }}</td>
                            <td>{{ $d['placa_agente'] }}</td>
                            <td>{{ $d['nombre_agente'] }}</td>
                            <td>{{ $d['estado_agente'] }}</td>

                            <td>
                            <form method="post" class="delete_form" action="{{ url('agente_especifico',$d['id_agente']) }}" id="studentForm_{{$d['id_agente']}}">
                                {{ method_field('GET') }}
                                {{  csrf_field() }}
                                <button name='editar' class="btn btn-edit btn-primary" title='Editar'>
                                    <span class="fa fa-edit"></span>
                                </button>
                            </form>
                            </td>

                            @if($d['estado_agente'] == 1)         
                            <td>
                                <a href="{{ url('inactivar_agente/'.$d['id_agente'].'') }}"
                                class="btn btn-edit btn-primary bg-danger" title="Inactivar">
                                    <span class="fa fa-pause"></span>
                                </a>
                            </td>       
                            @else
                            <td>
                                <a href="{{ url('activar_agente/'.$d['id_agente'].'') }}"
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

</div>
@endsection