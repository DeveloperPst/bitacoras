@extends('adminlte::page')

@section('title','Dashboard')

@section('content_header')

<!-- Styles -->

<link rel="stylesheet" href="{{ asset('css/home.css') }}">
@stop


@section('content')



<div class="card6" style="width: 18rem;">

<h5 class="card-header p-1">Seleccionar Turno</h5>
 
  <div class="card-body6">

  <form action="#" method="Post"><br>
      <label for="turnos">Turnos</label><br>
      <select name="turnos" id="turnos">
        <option value="1">Primer Turno</option>
        <option value="2">Segundo Turno</option>
        <option value="3">Tercer Turno</option>
        
      </select><br><br>

      <button type="submit" class="btn btn-primary">Iniciar</button>
        
</form><br>

      </div>   
 </div>  
 

@stop



@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop




