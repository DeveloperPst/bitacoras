@extends('adminlte::page')

@section('title','Dashboard')

@section('content_header')

<!-- Styles -->
<link rel="stylesheet" href="{{ asset('css/home.css') }}">
@stop


@section('content')

<div class="text-center">
<h4><strong>Consolidado de Procedimientos</strong></h4>
</div>

<br>

<div class="row">
 <div class="container1">

    <div class="card">
      <div class="card-header bg-primary">


      <strong class="text">Registrar información</strong>
      </div>
      <div class="card-body border border:dark">

        <form class="text-center">

      <!-- 4 column grid layout with text inputs for the first and last names -->
      <div class="row mb-2">
        <div class="col-sm">
          <div class="form-outline">

          <label for="validationDefault04" class="form-select "> Zona/Grupo </label><br>
        <select class="form-select" id="validationDefault04" required="required">
          <option selected disabled value="">Seleccionar...</option>
          <option>Centro</option>
          <option>Oeste</option>
          <option>Norte</option>
          <option>Oriente</option>
          <option>Sur</option>
          <option>Operativo</option>
          <option>Disponibles</option>
          <option>Comisaria</option>
        </select>

          </div>
        </div>
        <div class="col-sm">
          <div class="form-outline">
          <label class="form-label" for="form6Example2">Comparendos</label><br>
            <input type="number" id="form6Example2" class="form-number" required="required"/>
            </div>
        </div>


        <div class="col-sm">
          <div class="form-outline">
          <label class="form-label" for="form6Example3">Inmovilizados</label><br>
            <input type="number" id="form6Example3" class="form-number" required="required"/>
          </div>
        </div>

        <div class="col-sm">
          <div class="form-outline">
          <label class="form-label" for="form6Example4">Pico y Placa</label><br>
            <input type="number" id="form6Example4" class="form-number" required="required"/>
            </div>
        </div>


        <div class="col-sm">
          <div class="form-outline">
          <label class="form-label" for="form6Example5">Bicicarril</label><br>
            <input type="number" id="form6Example5" class="form-number" required="required"/>
          </div>
        </div>
        </div>

          <!-- Submit button -->
      <button type="submit" class="btn btn-primary"><strong>Enviar</strong></button>
     </form>

     </div>

      </div>

     <div class="container2">

       <table class="table table-striped table-bordered">

        <thead class = "bg-primary">
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
            <td>""</td>
            <td>""</td>
            <td>""</td>
            <td>""</td>
            </tr>
            <tr>
            <th scope="row">Oeste</th>
            <td>""</td>
            <td>""</td>
            <td>""</td>
            <td>""</td>
            </tr>
            <tr>
            <th scope="row">Norte</th>
            <td>""</td>
            <td>""</td>
            <td>""</td>
            <td>""</td>
            </tr>

            <tr>
            <th scope="row">Oriente</th>
            <td>""</td>
            <td>""</td>
            <td>""</td>
            <td>""</td>
            </tr>

            <tr>
            <th scope="row">Sur</th>
            <td>""</td>
            <td>""</td>
            <td>""</td>
            <td>""</td>
            </tr>

            <tr>
            <th scope="row">Operativo</th>
            <td>""</td>
            <td>""</td>
            <td>""</td>
            <td>""</td>
            </tr>

            <tr>
            <th scope="row">Disponibles</th>
            <td>""</td>
            <td>""</td>
            <td>""</td>
            <td>""</td>
            </tr>

            <tr>
            <th scope="row">Comisaria</th>
            <td>""</td>
            <td>""</td>
            <td>""</td>
            <td>""</td>
            </tr>

            </tbody>
        </table>

            </div>
    </div>      

</div>

<br>

<div class="text-center">
  
<h4><strong>Reporte de Accidentalidad</strong></h4>


</div>

<br>

<div class="container1">

     <div class="card">
     <div class="card-header bg-primary">
    <strong>Registrar información</strong>
    </div>
    <div class="card-body border border:dark">

        <form class="text-center">

        <div class="row mb-2">
        <div class="col">
        <div class="form-outline">

        <label for="validationDefault04" class="form-select "> Código </label><br>
        <select class="form-select" id="validationDefault04" required="required">
        <option selected disabled value="">Opciones...</option>
        <option>Centro</option>
        <option>Oeste</option>
        <option>Norte</option>
        <option>Oriente</option>
        <option>Sur</option>
        <option>Operativo</option>
        <option>Disponibles</option>
        <option>Comisaria</option>
        </select>

        </div>
        </div>  
        <div class="col">
        <div class="form-outline">
        <label class="form-label" for="form6Example2">Tipo Accidente</label><br>
        <select class="form-select" id="validationDefault04" required="required">
        <option selected disabled value="" t>Seleccionar...</option>
        <option>Negativo</option>
        <option>Daños</option>
        <option>Choque y Lesiones</option>
        <option>Atropello</option>
        <option>Volcamiento</option>
        <option>Caida Ocupante</option>
        <option>Homicidio en la via</option>
        <option>Inspección a Cadáver</option>
        <option>Inspección Foránea</option>

        </select>

        
            </div>
        </div>


        <div class="col">
        <div class="form-outline">
        <label class="form-label" for="form6Example3">Cantidad</label><br>
            <input type="number" id="form6Example3" class="form-number" required="required"/>
        </div>
        </div>

         </div>

    <!-- Submit button -->
    <button type="submit" class="btn btn-primary"><strong>Enviar</strong></button>
    </form>


    </div>
    </div>
    </div>

</div>


@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Bienvenidos!'); </script>

@stop



