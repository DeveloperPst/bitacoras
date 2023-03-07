@extends('adminlte::page')

@section('title','Tipo Control')

@section('content_header')

<!-- Styles -->

<link rel="stylesheet" href="{{ asset('css/home.css') }}">
@stop
@section('content')
<div class="container">
    <div class="row2 justify-content-center">

    <div class="col-md-12">
            <div class="card15">
                <div class="card-header-tp p-1">{{ __('Registro tipo de prueba') }}</div><br>

                <div class="card-body-l">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
        
                    <form method="POST" action="{{ url('registro_tipo_prueba') }}">
                        @csrf

                        <div class="row-tp mb-3">
                            <label for="descripcion" class="col-md-4 col-form-label text-center">{{ __('Descripción') }}</label>
    
                            <div class="col-md-6">
                                <input id="descripcion" type="text" class="form-control @error('descripcion') is-invalid @enderror" style="width: 9rem;" name="descripcion" value="{{ old('descripcion') }}" required autocomplete="descripcion">

                                @error('descripcion')
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
                        </div><br>
                    </form>
                   
                    </div>
                </div>
            </div>


        <div class="col-md-12">
        
            <div class="card16">
                <div class="card-header p-1">{{ __('Listado de tipos de pruebas') }}</div>

                <div class="card-body-tp">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
        @csrf
                    <table class="table-tp table-hover">
                        <tr>
                            <td><strong>Id</strong></td>
                            <td><strong>Descripción</strong></td>
                            <td colspan='2' style='text-align: center;'><strong>Acciones</strong></td>
                            <td><strong>Fecha Registro</strong></td>
                        </tr>

                        @foreach($result as $d)
                        <tr>
                            <td>{{ $d['id_tipo_prueba'] }}</td>
                            <td>{{ $d['descripcion_tipo_prueba'] }}</td>
 
                            <td>
                                <a href="{{ url('tipo_prueba/'.$d['id_tipo_prueba'].'') }}"
                                class="btn btn-edit btn-primary" title="Eliminar">
                                    <span class="fa fa-edit"></span>
                                </a>
                            </td>
                            <td>
                                <form method="post" class="delete_form" action="{{ url('eliminar_tipo_prueba',$d['id_tipo_prueba']) }}" id="studentForm_{{$d['id_tipo_prueba']}}">
                                {{ method_field('GET') }}
                                {{  csrf_field() }}
                                <button type="submit" class="btn btn-danger" title="Eliminar"><span class="fa fa-trash"></span></button>
                                </form>
                            </td>
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
  $(document).ready(function(){
      $('.delete_form').on('submit', function(){
         if(confirm("¿Está seguro que desea eliminar este registro?"))
         {
             return true;
         }
         else
         {
             return false;
         }
      });
  });
</script>

@endsection