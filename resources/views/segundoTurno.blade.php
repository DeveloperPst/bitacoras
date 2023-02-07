@extends('adminlte::page')

@section('title','Dashboard')

@section('content_header')

<!-- Styles -->
<link rel="stylesheet" href="{{ asset('css/home.css') }}">


@stop

@section('content')

<div class="container-turno">
<h3><strong>INFORME SEGUNDO TURNO</strong></h3>
<hr><br>

       <table class="table-t1 table-sm table-striped table-hover border:2px;">

       <h5 class="h5">Consolidado de Procedimientos</h5><br>
        <thead class = "thead">
            <tr >
            <th>Zona/Grupo</th>
            <th>Comparendos</th>
            <th>Inmovilizados</th>
            <th>Pico y Placa</th>
            <th>Bicicarril</th>
            </tr>
        </thead>
        <tbody class="bg-color:white">
            <tr>
            <th scope="row">Centro</th>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            </tr>
            <tr>
            <th scope="row">Oeste</th>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            </tr>
            <tr>
            <th scope="row">Norte</th>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            </tr>

            <tr>
            <th scope="row">Oriente</th>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            </tr>

            <tr>
            <th scope="row">Sur</th>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            </tr>

            <tr>
            <th scope="row">Operativo</th>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            </tr>

            <tr>
            <th scope="row">Disponibles</th>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            </tr>

            <tr>
            <th scope="row">Comisaria</th>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            </tr>

            </tbody>
        </table>

        <br>
        <hr>

       
    <br>
       <table class="table-t1 table-sm table-striped table-hover">

       <h5 class="h5">Reporte Accidentalidad</h5><br>
        <thead class = "thead font-sm">
            <tr >
            <th>Tipo Accidente</th>
            <th>Cantidad Total</th>
             </tr>
        </thead>
        <tbody class="bg-color:white">
            <tr>
            <th scope="row">Incidentes</th>
            <td></td>
            
            </tr>
            <tr>
            <th scope="row">Daños</th>
            <td></td>
           
            </tr>
            <tr>
            <th scope="row">Lesiones</th>
            <td></td>
            
            </tr>

            <tr>
            <th scope="row">Homicidios</th>
            <td></td>
           
            </tr>

            <tr>
            <th scope="row">Inspecciones</th>
            <td></td>
            
            </tr>

            <tr>
            <th scope="row">Negativos</th>
            <td></td>
            
            </tr>

            <tr>
            <th scope="row">Positivos</th>
            <td></td>
            
            </tr>

           
            </tbody>
        </table>

        <br><hr><br>

        <table class="table-t1 table-sm table-striped table-hover">

<thead class = "thead">
    <h5 class="h5">Pruebas de Alcoholemia</h5><br>
    <tr >
    <th>Operativo Turno</th>
    <th>Cantidad Total</th>
     
     </tr>
</thead>
<tbody class="bg-color:white">
    <tr>
    <th scope="row">Positivas</th>
    <td></td>
    
    </tr>
    <tr>
    <th scope="row">Negativas</th>
    <td></td>
   
    </tr>
    
   
    </tbody>
</table>

       
        <br><hr><br>

        <table class="table-t1 table-sm table-striped table-hover">

<thead class = "thead">
    <h5 class="h5">Pruebas de Alcoholemia</h5><br>
    <tr >
    <th>Operativo Accidente</th>
    <th>Cantidad Total</th>
     
     </tr>
</thead>
<tbody class="bg-color:white">
    <tr>
    <th scope="row">Positivas</th>
    <td></td>
    
    </tr>
    <tr>
    <th scope="row">Negativas</th>
    <td></td>
   
    </tr>
    
   
    </tbody>
</table>

<br><hr><br>

<table class="table-t1 table-sm table-striped table-hover">

<thead class = "thead">
    <h5 class="h5">Incidencias Reportadas</h5><br>
    <tr >
    <th>Placa</th>
    <th>Tipo de Control</th>
    <th>Novedad Presentada</th> 
  
     </tr>
</thead>
<tbody>
    <tr>
    <th scope="row"></th>
    <td></td>
    <td></td>
    
    </tr>
    <tr>
    <th scope="row"></th>
    <td></td>
    <td></td>
    </tr>
    
   
    </tbody>
</table><br><br>

 

</div>


@stop