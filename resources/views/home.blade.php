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
      <div class="card-body">

        <form class="text-center" action="" method="">

      <!-- 4 column grid layout with text inputs for the first and last names -->
      <div class="row mb-2">
        <div class="col-sm">
          <div class="form-outline">

          <label for="zona" class="form-select "> Zona/Grupo </label><br>
        <select class="form-select" id="validationDefault04" required="required">
          <option selected disabled value="">Seleccionar..</option>
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
          <label class="form-label" for="comparendos">Comparendos</label><br>
            <input type="number" id="form6Example2" class="form-number" value= "" required="required"/>
            </div>
        </div>


        <div class="col-sm">
          <div class="form-outline">
          <label class="form-label" for="inmovilizados">Inmovilizados</label><br>
            <input type="number" id="form6Example3" class="form-number" value="" required="required"/>
          </div>
        </div>

        <div class="col-sm">
          <div class="form-outline">
          <label class="form-label" for="pico_y_placa">Pico y Placa</label><br>
            <input type="number" id="form6Example4" class="form-number" value="" required="required"/>
            </div>
        </div>

        <div class="col-sm">
          <div class="form-outline">
          <label class="form-label" for="bicicarril">Bicicarril</label><br>
            <input type="number" id="form6Example5" class="form-number" value="" required="required"/>
          </div>
        </div>
        </div>

          <!-- Submit button -->
         <button type="submit" class="btn btn-primary"><strong>Enviar</strong></button>
     </form>

     </div>

      </div>

     <div class="container2">

       <table class="table">

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

     <div class="card5">
     <div class="card-header bg-primary">
    <strong>Registrar información</strong>
    </div>
    <div class="card-body">

        <form class="text-center" method="post">

        <div class="row mb-2">
        <div class="col">
        <div class="form-outline">

        <label for="validationDefault04" class="form-select "> Código </label><br>
        <select class="form-select" id="validationDefault04" required="required">
        <option selected disabled value="">...</option>
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
        <label class="form-label" for="tipoAccidente">Tipo Accidente</label><br>
        <select class="form-select" id="validationDefault04" value="{{ old('tipoAccidente')}}" required="required">
        <option selected disabled value="">...</option>
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
        <label class="form-label" for="cantidad">Cantidad</label><br>
            <input type="number" id="form6Example3" class="form-number" required="required"/>
        </div>
        </div>

         </div>

    <!-- Submit button -->
    <button type="submit" class="btn btn-primary"><strong>Enviar</strong></button>
    </form>

  </div>
    </div>

    
    <!--<div class="container2">

    <table class="table1 table-striped lg-3">

<thead class = "bg-primary">
    <tr >
    <th>Código</th>
    <th>Tipo Accidente</th>
    <th>Cantidad</th>
    
    </tr>
</thead>
<tbody class="bg-color:white">
    <tr>
    <th scope="row">Negativo</th>
    <td>""</td>
    
    </tr>
    <tr>
    <th scope="row">Daños</th>
    <td>""</td>
   
    </tr>
    <tr>
    <th scope="row">Choque y Lesiones</th>
    <td>""</td>
    
    </tr>

    <tr>
    <th scope="row">Atropello</th>
    <td>""</td>
    
    </tr>

    <tr>
    <th scope="row">Volcamiento</th>
    <td>""</td>
    
    </tr>

    <tr>
    <th scope="row">Caida Ocupante</th>
    <td>""</td>
    
    </tr>

    <tr>
    <th scope="row">Homicidio en la vía</th>
    <td>""</td>
    
    </tr>

    <tr>
    <th scope="row">Inspección a Cadáver</th>
    <td>""</td>

    </tr>

    <tr>
    <th scope="row">Inspección Foránea</th>
    <td>""</td>

    </tr>

    <tr>
    <th scope="row">Incidentes</th>
    <td>""</td>

    </tr>

    <tr>
    <th scope="row">Total Daños</th>
    <td>""</td>

    </tr>

    <tr>
    <th scope="row">Total Lesiones</th>
    <td>""</td>

    </tr>

    <tr>
    <th scope="row">Total Homicidios</th>
    <td>""</td>

    </tr>

    <tr>
    <th scope="row">Total Inspecciones</th>
    <td>""</td>

    </tr>

    <tr>
    <th scope="row">Total Negativos</th>
    <td>""</td>

    </tr>
    </tbody>
</table>

    </div>

    
</div>
</div>

-->

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Bienvenidos!'); </script>

@stop



