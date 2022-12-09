@extends('adminlte::page')


@section('title','Dashboard')


@section('content_header')

<!-- Styles -->
<link rel="stylesheet" href="{{ asset('css/home.css') }}">

@stop

@section('content')

<div class="container">

<form class="form-horizontal">
  <fieldset>
    <legend>Actualizar mi Perfíl</legend>
    <br>
    <div class="form-group">
      <label for="inputText" class="col-lg-4 control-label">Nombres y Apellidos</label>
      <div class="col-lg-10">
        <input class="form-control" rows="4" id="inputText" placeholder="Nombres y Apellidos"></input>
        </div>
    </div>
    <div class="form-group">
      <label for="inputEmail" class="col-lg-3 control-label">Correo Electrónico</label>
      <div class="col-lg-10">
        <input type="text" class="form-control" id="inputEmail" placeholder="Email">
      </div>
    </div>
      <div class="form-group">
      <label for="inputEmail" class="col-lg-3 control-label">Teléfono</label>
      <div class="col-lg-10">
        <input type="text" class="form-control" id="inputEmail" placeholder="Teléfono">
      </div>
    </div>
    <div class="form-group">
      <label for="inputText" class="col-lg-4 control-label">Dirección Residencia</label>
      <div class="col-lg-10">
        <input class="form-control" rows="4" id="inputText" placeholder="Dirección"></input>
        </div>
    </div>
    
     <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
        <br>
        <button type="reset" class="btn btn-danger">Cancel</button>
        <button type="submit" class="btn btn-primary">Enviar</button>
      </div>
    </div>
  </fieldset>
</form>
</div>

@stop





