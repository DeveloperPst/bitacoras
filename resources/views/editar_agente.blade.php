@extends('adminlte::page')

@section('title','Edición agente')

@section('content_header')

<!-- Styles -->

<link rel="stylesheet" href="{{ asset('css/home.css') }}">
@stop
@section('content')
<div class="container">
    <div class="row justify-content-center">

    <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Actualización de datos de agentes') }}</div>

                <div class="card-body">
                    <form method="post" action="{{ url('editar_agente') }}">
                        @csrf

                        @foreach($data as $d)
                        <div class="row mb-12">
                            <div class="col-md-12">
                                <input id="id_agente" type="text" hidden class="form-control @error('id_agente') is-invalid @enderror" name="id_agente" required autocomplete="id_agente"
                                value="{{ $d->id_agente }}">

                                @error('id_agente')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-12">
                            <label for="nro_documento" class="col-md-4 col-form-label text-center">{{ __('Documento') }}</label>
    
                            <div class="col-md-12">
                                <input id="nro_documento" type="number" class="form-control @error('nro_documento') is-invalid @enderror" name="nro_documento" required autocomplete="nro_documento" autofocus
                                value="{{ $d->nro_documento }}">

                                @error('DOCUMENTO')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-12">
                            <label for="placa_agente" class="col-md-4 col-form-label text-center">{{ __('Nombres') }}</label>

                            <div class="col-md-12">
                                <input id="placa_agente" type="text" class="form-control @error('placa_agente') is-invalid @enderror" name="placa_agente" required autocomplete="placa_agente"
                                value="{{ $d->placa_agente }}">

                                @error('placa_agente')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-12">
                            <label for="nombre_agente" class="col-md-4 col-form-label text-center">{{ __('Apellidos') }}</label>

                            <div class="col-md-12">
                                <input id="nombre_agente" type="text" class="form-control @error('nombre_agente') is-invalid @enderror" name="nombre_agente" required autocomplete="nombre_agente"
                                value="{{ $d->nombre_agente }}">

                                @error('nombre_agente')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        @endforeach
                        
                        <br>
                    
                        <div class="row2 mb-0">
                            <div class="col-md-12 offset-md-4">
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
