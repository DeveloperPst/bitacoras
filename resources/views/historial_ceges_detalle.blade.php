@extends('adminlte::page')

@section('title','Historial')

@section('content_header')

<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

<!-- Styles -->
<link rel="stylesheet" href="{{ asset('css/home.css') }}">
@stop


@section('content')
<div class="card6" style="width: 18rem;">

<div class="seccion-2">    

<table class="table-p2 table-sm table-striped table-hover border:2px;" >


    <thead class = "thead p-2">
        <tr>
        <th>ID INFORME CEGES</th>
        <th>NOMBRE</th>
        <th>FECHA REGISTRO</th>
        <th>ACCIONES</th>
        </tr>
    </thead>
    <tbody class="bg-color:white">
        <tr>

        @if(isset($result))
        @foreach($result as $r)
        <tr>
            <td>{{ $r['id_maestropdf'] }}</td>
            <td>{{ $r['nombre_pdf'] }}</td>
            <td>{{ $r['fecha_registro'] }}</td></a></td>
            <td><a href="{{ url('descargar_pdf') }}"
                                class="btn btn-edit btn-primary bg-green" title="Descargar">
                                    <span class="fa fa-download"></span>
                                </a></td>
        </tr>    
            @endforeach    
        @else
            <td>No existen registros para este turno</td>  
        @endif


        </tr>
        </tbody>
    </table>

 </form>      
</div>    

 </div> 
@stop



@section('css')
<link rel="stylesheet" href="{{ asset('css/home.css') }}">
@stop

 


