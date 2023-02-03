@extends('adminlte::page')


@section('title','Dashboard')


@section('content_header')

<!-- Styles -->
<link rel="stylesheet" href="{{ asset('css/home.css') }}">

@stop

@section('content')


<div class="container2 p-2">

<div class="card3">
     <div class="card-header p-1">
    <h5><strong>Actualizar Perfil</strong></h5>
    </div>
    <div class="card-body" >

  <form class="form-horizontal">
  
    
    <div class="form-group">
      <label for="inputText" class="col-lg-6 control-label">Nombres</label>
      <div class="col-lg-10">
        <input class="form-control" rows="3" id="inputText" placeholder="Nombres"></input>
        </div>
    </div>

    <div class="form-group">
      <label for="inputText" class="col-lg-6 control-label">Apellidos</label>
      <div class="col-lg-10">
        <input class="form-control" rows="3" id="inputText" placeholder="Apellidos"></input>
        </div>
    </div>
    <div class="form-group">
      <label for="inputEmail" class="col-lg-6 control-label">Correo Electrónico</label>
      <div class="col-lg-10">
        <input type="text" class="form-control" id="inputEmail" placeholder="Email">
      </div>
    </div>
      <div class="form-group">
      <label for="inputEmail" class="col-lg-4 control-label">Teléfono</label>
      <div class="col-lg-10">
        <input type="text" class="form-control" id="inputEmail" placeholder="Teléfono">
      </div>
    </div>
    <div class="form-group">
      <label for="inputText" class="col-lg-4 control-label">Dirección</label>
      <div class="col-lg-10">
        <input class="form-control" rows="3" id="inputText" placeholder="Dirección"></input>
        </div>
    </div>
    
     <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2"><br>
       
      <button type="submit" class="btn btn-primary">Guardar</button>
      <button type="reset" class="btn btn-danger">Cancelar</button>
        
      </div>
    </div>
  

 </form>

</div> 
@stop

<section></section>




