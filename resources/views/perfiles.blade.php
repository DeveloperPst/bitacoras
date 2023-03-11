@extends('adminlte::page')


@section('title','Dashboard')


@section('content_header')

<!-- Styles -->
<link rel="stylesheet" href="{{ asset('css/home.css') }}">

@stop

@section('content')




<div class="card3" style="width: 22rem;">

<h5 class="card-header p-1">Actualizar Perfil</h5><br>
 
  <div class="card-body">


          <form id="needs-validation" >
      <div class="form-group">
      <label>Nombres</label>
      <input class="form-control input-lg" placeholder="Nombres" type="text"  id = "nombres" required>
      </div>
      <div class="form-group">
      <label>Apellidos</label>
      <input class="form-control input-lg" placeholder="Apellidos" type="text" id = "apellidos" required>
      </div>

      <div class="form-group">
      <label>Email</label>
      <input class="form-control input-lg" placeholder="Email" type="email"  id = "email" required>
      </div>

      <div class="form-group">
      <label>Telefono</label>
      <input class="form-control input-lg" placeholder="Telefono" type="number"  id = "telefono" required>
      </div><br>

        <button type="submit" class="btn btn-primary">Guardar</button>
        <button type="reset" class="btn btn-danger">Cancelar</button>

      <small class="text-muted mt-3 mb-1 d-block">Volver al <a href="/home">Inicio</a></small>
      </form>

        </div>
</div>



 



@stop

<section></section>




