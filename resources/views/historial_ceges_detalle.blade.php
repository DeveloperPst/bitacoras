@extends('adminlte::page')

@section('title','Historial')

@section('content_header')

<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

<!-- Styles -->
<link rel="stylesheet" href="{{ asset('css/home.css') }}">
@stop


@section('content')

<br> 

<div class="container-historialCeges" style="width:28%;">

<h4><strong>HISTORIAL INFORMES CEGES</strong></h4><br><br>



<div class="seccion-historialCeges">    

<table class="table-p2 table-sm table-striped table-hover;" >


    <thead class = "thead p-2">
        <tr>
        <th>ID INFORME CEGES</th>
        <th>NRO. IPAT</th>
        <th>FECHA REGISTRO</th>
        <th>ACCIONES</th>
        <th></th>
        </tr>
    </thead>
    <tbody class="bg-color:white">
        <tr>

        @if(isset($result))
        @foreach($result as $r)
        <tr>
            <td>{{ $r['id_maestropdf'] }}</td>
            <td>{{ $r['nombre_pdf'] }}</td>
            <td>{{ $r['fecha_registro'] }}</td>
            <td><a href="{{ url('/storage/').'/'.$r['nombre_pdf'].'.pdf' }}"
                                class="btn btn-edit btn-primary bg-green" title="Descargar" target="_blank">
                                    <span class="fa fa-download"></span>
                                </a></td>
            <td>
            <form method="post" class="delete_form" action="{{ url('eliminar_pdf',$r['id_maestropdf']) }}" id="studentForm_{{$r['id_maestropdf']}}">
             {{ method_field('post') }}
             {{  csrf_field() }}
            <button type="submit" class="btn btn-danger" title="Eliminar"><span class="fa fa-trash"></span></button>
            </form>
            
            </td>

            
        </tr>    

              

            @endforeach    
        @else
            <td>No existen registros para este turno</td>  
        @endif

       </tr>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
       <script>
        $(document).ready(function(){
            $('.delete_form').on('submit', function(){
                if(confirm("¿Está seguro que desea eliminar este Informe Ceges?"))
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
        </tbody>
    </table>
    
    </form>      
   </div>    
  </div> 
 
@stop




@section('css')
<link rel="stylesheet" href="{{ asset('css/home.css') }}">
@stop

 


