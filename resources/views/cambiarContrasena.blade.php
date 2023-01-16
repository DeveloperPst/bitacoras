@extends('adminlte::page')


@section('title','Dashboard')


@section('content_header')

<!-- Styles -->
<link rel="stylesheet" href="{{ asset('css/home.css') }}">

@stop

@section('content')

<div class="container">

<div class="card4">

<div class="card-header p-2">
    <h5><strong>Cambiar Contraseña</strong></h5>
    </div>
  
  <div class="card-body ">
    
 <form class="form-horizontal">
  <fieldset>
   
    <div class="form-group">
      <label for="inputPassword" class="col-lg-4 control-label">Contraseña</label>
      <div class="col-lg-10">
        <input type="password" class="form-control" id="inputPassword" placeholder="Contraseña">
       </div>
    </div>
    <div class="form-group">
      <label for="inputPassword" class="col-lg-4 control-label">Nueva</label>
      <div class="col-lg-10">
        <input type="password" class="form-control" id="inputPassword" placeholder="Nueva Contraseña">
       </div>
    </div>
    <div class="form-group">
      <label for="inputPassword" class="col-lg-4 control-label">Confirmar</label>
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


</div>

</div>


</div>

<br>
<br>


@stop


