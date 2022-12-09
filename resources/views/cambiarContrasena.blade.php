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
    <legend>Cambiar mi Contraseña</legend>
    <br>
    <div class="form-group">
      <label for="inputPassword" class="col-lg-3 control-label">Contraseña</label>
      <div class="col-lg-10">
        <input type="password" class="form-control" id="inputPassword" placeholder="Contraseña">
       </div>
    </div>
    <div class="form-group">
      <label for="inputPassword" class="col-lg-3 control-label">Nueva Contraseña</label>
      <div class="col-lg-10">
        <input type="password" class="form-control" id="inputPassword" placeholder="Nueva Contraseña">
       </div>
    </div>
    <div class="form-group">
      <label for="inputPassword" class="col-lg-4 control-label">Confirmar Contraseña</label>
      <div class="col-lg-10">
        <input type="password" class="form-control" id="inputPassword" placeholder="Confirmar Contraseña">
       </div>
    </div>

    <br>
       <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
        <button type="reset" class="btn btn-danger">Cancel</button>
        <button type="submit" class="btn btn-primary">Enviar</button>
      </div>
    </div>
  </fieldset>
</form>
<br>
<br>
<br>
</div>

@stop
