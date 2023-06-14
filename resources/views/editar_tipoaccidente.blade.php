@extends('adminlte::page')

@section('title','Tipo Accidente')

@section('content_header')

<!-- Styles -->

<link rel="stylesheet" href="{{ asset('css/home.css') }}">
@stop
@section('content')

<div class="container-historial">
    <div class="row justify-content-center">


    <div class="col-md-12">
            <div class="card11">
                <div class="card-header p-1">{{ __('Editar tipo de accidente') }}</div>

                <div class="card-body-ta">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ url('fun_editar_tipo_accidente') }}">
                        @csrf

                        @foreach($data as $d)
                        <div class="col-md-12">
                                <input id="id_tipo_accidente" type="text" hidden class="form-control @error('id_tipo_accidente') is-invalid @enderror" name="id_tipo_accidente" required autocomplete="id_tipo_accidente"
                                value="{{ $d->id_tipo_accidente }}">

                                @error('id_agente')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        <div class="row2 mb-6 text-center"><br>
                            <label for="descripcion" class="col-md-6 col-form-label">{{ __('Descripción') }}</label>
    
                            <div class="col-md-6">
                                <input id="descripcion" type="text" class="form-control @error('descripcion') is-invalid @enderror"  style="width: 10rem;" name="descripcion" required
                                value="{{ $d->descripcion_tipo_accidente }}">

                                @error('descripcion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div><br>
                        @endforeach
                        
                        <div class="row2 mb-0">
                            <div class="col-md-6 offset-md-4">
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
</div>

@endsection