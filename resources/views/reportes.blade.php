@extends('adminlte::page')

@section('title','Dashboard')

@section('content_header')

<!-- Styles -->
<link rel="stylesheet" href="{{ asset('css/home.css') }}">
@stop


@section('content')

<div class="container-turno">

    <h3><strong>Reportes</strong></h3><br>

    <div class="card5">

        <h5 class="card-header">Informe Eventos CEGES</h5>

          <div class="card-body">

          <form action="" method="Post"></form>
              
        <div class="row">
          <div class="col">
            <input type="text" class="form-control" value="" placeholder="Asunto"><br>
            <input type="text" class="form-control" value="" placeholder="Lugar"><br>
            <input type="text" class="form-control" value="" placeholder="Conductor Veh-1"><br>
            <input type="number" class="form-control" value="" placeholder="Nro Documento"><br>
            <input type="text" class="form-control" value="" placeholder="Lesionado"><br>
            <input type="number" class="form-control" value="" placeholder="Licencia Conducción"><br>
            <input type="text" class="form-control" value="" placeholder="Placas Veh-1"><br>
            <input type="number" class="form-control" value="" placeholder="SOAT"><br>
            <input type="text" class="form-control" value="" placeholder="Nombre"><br>
            <input type="text" class="form-control" value="" placeholder="Clinica"><br>
            <input type="number" class="form-control" value="" placeholder="Prueba Alcoholemia"><br>
            <input type="number" class="form-control" value="" placeholder="Placa Agente"><br>
            <input type="number" class="form-control" value="" placeholder="Orden Comparendo"><br>
            <input type="number" class="form-control" value="" placeholder="Resultado Prueba"><br>
            <input type="text" class="form-control" value="" placeholder="Nombre Agente"><br>
            <input type="text" class="form-control" value="" placeholder="Incidente"><br>
            
            
          </div>
            </div>
        <div class="row">
          <div class="col">
            <input type="date" class="form-control" placeholder="Fecha" value=""><br>
            <input type="time" class="form-control" placeholder="Hora" value=""><br>
            <input type="number" class="form-control" placeholder="Tipo Documento" value=""><br>
            <input type="number" class="form-control" placeholder="Edad" value=""><br>
            <input type="text" class="form-control" placeholder="Clinica" value=""><br>
            <input type="number" class="form-control" placeholder="T.O" value=""><br>
            <input type="text" class="form-control" placeholder="Tipo de vehículo" value=""><br>
            <input type="number" class="form-control" placeholder="RTM" value=""><br>
            <input type="text" class="form-control" placeholder="Condición" value=""><br>
            <input type="text" class="form-control" placeholder="RTM" value=""><br>
            <input type="number" class="form-control" placeholder="Operador de alcoholimetro" value=""><br>
            <input type="number" class="form-control" placeholder="Resultado Prueba" value=""><br>
            <input type="number" class="form-control" placeholder="Orden Comparendo" value=""><br>
            <input type="number" class="form-control" placeholder="Placa" value=""><br>
            <input type="number" class="form-control" placeholder="Ipat" value=""><br>
            <input type="number" class="form-control" value="" placeholder="SPOA"><br>
      </div>
      </div>
  </div>

        <button type="submit" class="btn btn-primary">Generar</button>
        <button type="reset" class="btn btn-danger">Cancelar</button>
</div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Bienvenidos!'); </script>

@stop



