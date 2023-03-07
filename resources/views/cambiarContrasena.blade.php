@extends('adminlte::page')


@section('title','Dashboard')


@section('content_header')

<!-- Styles -->
<link rel="stylesheet" href="{{ asset('css/home.css') }}">

@stop

@section('content')


<div class="card4" style="width: 21em;">

<h5 class="card-header p-1">Cambiar Contraseña</h5><br>
 
  <div class="card-body">


          <form id="needs-validation" >
      <div class="form-group">
      <label>Contraseña actual</label>
      <input class="form-control input-lg" placeholder="Contraseña actual" type="password"  id = "oldpw" required>
      </div>
      <div class="form-group">
      <label>Nueva contraseña</label>
      <input class="form-control input-lg" placeholder="Nueva contraseña" type="password" id = "newpw" required>
      </div>

      <div class="form-group">
      <label>Confirmar contraseña</label>
      <input class="form-control input-lg" placeholder="Confirmar contraseña" type="password"  id = "confirmpw" required>
      </div><br>

        <button type="submit" class="btn btn-primary">Guardar</button>
        <button type="reset" class="btn btn-danger">Cancelar</button>

      <small class="text-muted mt-3 mb-1 d-block">Volver al <a href="/home">Inicio</a></small>
      </form>
          
        </div>
</div>



 
@stop


