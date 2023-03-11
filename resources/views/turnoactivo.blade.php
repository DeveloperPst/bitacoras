@extends('adminlte::page')


@section('title','Primer Turno')


@section('content_header')

<!-- Styles -->
<link rel="stylesheet" href="{{ asset('css/home.css') }}">
<script src="./Highcharts/code/highcharts.js"></script>

@stop

@section('content')

<?php
    if($_SESSION['mensaje'] == 1){
        
        echo "<script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 4000,
            timerProgressBar: true,
            didOpen: (toast) => {
              toast.addEventListener('mouseenter', Swal.stopTimer)
              toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
          })
          
          Toast.fire({
            icon: 'success',
            title: 'Sesión iniciada correctamente!'
          })
        </script>";

        $_SESSION['mensaje'] = 0;

    } else if($_SESSION['mensaje'] == 6){
        
        echo "<script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 4000,
            timerProgressBar: true,
            didOpen: (toast) => {
              toast.addEventListener('mouseenter', Swal.stopTimer)
              toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
          })
          
          Toast.fire({
            icon: 'success',
            title: 'Información registrada correctamente!'
          })
        </script>";

        $_SESSION['mensaje'] = 0;

    } else {

    }
?>

<div class="container-turno">


<h3><strong>INFORME TURNO ACTIVO</strong></h3>
<h5><strong>TURNO ACTIVO:</strong>
    <?php 
        if (!isset($_SESSION['turno_activo'])) {
            echo "Ningún turno activo";
        } else {
            echo $_SESSION['turno_activo']." - <strong>USUARIO: </strong>".$_SESSION['usuario']." - <strong>FECHA: </strong>".$_SESSION['fecha_registro'];
        }
    ?></h5>
<hr><br>

<form method="get" action="{{ url('actualizar_proc') }}">

        @csrf

          <h5 class="text-center"><strong>CONSOLIDADO PROCEDIMIENTOS</strong></h5><br>
              
          <table id="table1" class="table table-sm">
          <thead class="thead">
              
              <tr>
                  <th>Zona/Grupo</th>
                  <th>Comparendos</th>
                  <th>Inmovilizados</th>
                  <th>Pico y Placa</th>
                  <th>Bicicarril</th>
                  <th></th>

                  
              </tr>
          
            </thead>

          <tbody>

            
                
           
              <tr >
                  <td><br>Centro</td>
                  <td><br><input type="number" name="1" class="form-number"  required></td>
                  <td><br><input type="number" name="2" class="form-number" required></td>
                  <td><br><input type="number" name="3" class="form-number" required></td>
                  <td><br><input type="number" name="4" class="form-number" required></td>
                
              </tr> 
        
                <tr>
                  <td><br>Oeste</td>
                  <td><br><input type="number" id = "8" name="Compaoeste" class="form-number" required></td>
                  <td><br><input type="number" id = "8" name="Inmovioeste" class="form-number" required></td>
                  <td><br><input type="number" id = "8" name="Pypoeste" class="form-number" required></td>
                  <td><br><input type="number" id = "8" name="Bicioeste" class="form-number" required></td>
                  
              </tr>

           <tr>
                  <td><br>Norte</td>
                  <td><br><input type="number" id = "6" name="Companorte" class="form-number" required></td>
                  <td><br><input type="number" id = "6" name="Inmovinorte" class="form-number"required></td>
                  <td><br><input type="number" id = "6" name="Pypnorte" class="form-number" required></td>
                  <td><br><input type="number" id = "6" name="Bicinorte" class="form-number" required></td>
                  
              </tr>

              <tr>
                  <td><br>Oriente</td>
                  <td><br><input type="number" id = "9" name="Compaoriente" class="form-number" required></td>
                  <td><br><input type="number" id = "9" name="Inmovioriente"class="form-number" required></td>
                  <td><br><input type="number" id = "9" name="Pyporiente" class="form-number" required></td>
                  <td><br><input type="number" id = "9" name="Bicioriente" class="form-number" required></td>
                  
              </tr>
              <tr>
                  <td><br>Sur</td>
                  <td><br><input type="number" id = "5" name="Compasur" class="form-number" required></td>
                  <td><br><input type="number" id = "5" name="Inmovisur" class="form-number" required></td>
                  <td><br><input type="number" id = "5" name="Pypsur" class="form-number" required></td>
                  <td><br><input type="number" id = "5" name="Bicisur" class="form-number" required></td>
                  
              </tr>
              <tr>
                  <td><br>Operativo</td>
                  <td><br><input type="number"  id = "10" name="Compaoperativo" class="form-number" required></td>
                  <td><br><input type="number"  id = "10" name="Inmovioperativo" class="form-number" required></td>
                  <td><br><input type="number"  id = "10" name="Pypoperativo" class="form-number" required></td>
                  <td><br><input type="number"  id = "10" name="Bicioperativo" class="form-number" required></td>
                    
              </tr>

              <tr>
                  <td><br>Disponibles</td>
                  <td><br><input type="number"  id = "11" name="Compadisponibles" class="form-number" required></td>
                  <td><br><input type="number"  id = "11" name="Inmovidisponibles" class="form-number" required></td>
                  <td><br><input type="number"  id = "11" name="Pypdisponibles" class="form-number" required> </td>
                  <td><br><input type="number"  id = "11" name="Bicidisponibles" class="form-number" required></td>
                  
              </tr>

              <tr>
                  <td><br>Comisaria</td>
                  <td><br><input type="number" id = "12" name="Compacomisaria" class="form-number" required></td>
                  <td><br><input type="number" id = "12" name="Inmovicomisaria" class="form-number" required></td>
                  <td><br><input type="number" id = "12" name="Pypcomisaria" class="form-number" required></td>
                  <td><br><input type="number" id = "12" name="Bicicomisaria" class="form-number" required> </td>
                  
              </tr>

             
               
          <th></th>

          <th><br>
          <td><br><br><button type="submit" name = "button3" class="btn btn-primary">Guardar</button></td>

          <th><br>
        
          <button type="reset" id = "form1" value ="Reset" class="btn btn-danger">Cancelar</button>
              
          </th>
          <th> 
          </th>
          <th></th>
          </th>
          </tbody>

          </table>
    </form>
           
    <div class='card18'>
      <div class='card-header p-1'>{{ __('Gráfico Procedimientos') }}</div>
      <div id="grafico_procedimiento">
            
        </div>
    </div>

        <br>
         

</div>
    
<hr>
<h5 class="h5">Reporte Accidentalidad</h5><br>

<div class="seccion-P"> <br>

<form method="get" action="{{ url('registrar_accidente') }}">
    <h5 class="text-center"><strong>REPORTE DE ACCIDENTALIDAD</strong></h5><br>
      
          
      <table id="table2" class="table2 table-sm">
      <thead class="thead">
          
          <tr>
              <th>Tipo Accidente</th>
              <th>Cantidad</th>                        
          </tr>
      
        </thead>

      <tbody>
        
          <tr>
              <td><br><br>

              
                <select class="form-select" id="tipo_accidente" name="tipo_accidente">
                <option selected disabled value="">Seleccionar..</option>
                @foreach($result_select_acc as $a)
                    <option value="{{ $a['id_tipo_accidente'] }}">{{ $a['descripcion_tipo_accidente'] }}</option>
                @endforeach           
               </select>
              

              </td>

              <td><br><br><input type="number" id="cantidad" name="cantidad" class="form-number" required></td>
                    
          </tr>

            <tr>
              <td><br><br><button type="submit" name = "button3" class="btn btn-primary">Guardar</button></td>
    

              <td><br><br><button type="reset" name = "button4" class="btn btn-danger">Cancelar</button></td>
          </tr>

        </tbody>

        </table>
        </form>
   
       <table class="table-t1b table-sm table-striped table-hover">

       
        <thead class = "thead font-sm">
            <tr >
            <th>Tipo Accidente</th>
            <th>Cantidad Total</th>
             </tr>
        </thead>
        <tbody class="bg-color:white">

            @if(isset($result1))
                @foreach($result1 as $r1)
                <tr>
                    <td>{{ $r1['descripcion_tipo_accidente'] }}</td>
                    <td>{{ $r1['cantidad_acc'] }}</td>
                </tr>    
                @endforeach    
            @else
                <td>No existen registros para este turno</td>  
            @endif

            </tbody>
        </table>

        <br>
    <div class='card18'>
      <div class='card-header p-1'>{{ __('Gráfico Accidentaidad') }}</div>
        <div id="grafico_accidentalidad">

        </div>
    </div>

</div>
        <hr>
        
        <h5 class="h5">Pruebas de Alcoholemia</h5>
        
        <section class="seccion2"><br><br>

            <form method="get" action="{{ url('registrar_1') }}">
                      <h5 class="title2"><strong>PRUEBAS DE ALCOHOLEMIA</strong></h5><br>
                          
                      <table id="table3" class="table3 table-sm">
                      <thead class="thead">
                          
                          <tr>
                              <th>Operativo Turno</th>
                              <th>Cantidad</th>
                              <th></th>
                              <th></th>
                             
                          </tr> 
                      
                        </thead> 

                      <tbody>
                        <tr>
                        <td><br>Tipo de prueba</td>  
                        <td><br>
                                <select class="form-select" name="operativo" style="width: 6rem;" id="turno" >
                                  <option selected disabled value="">Opciones...</option>

                                    @foreach($result_select_prue as $b)
                                        <option value="{{ $b['id_tipo_prueba'] }}">{{ $b['descripcion_tipo_prueba'] }}</option>
                                    @endforeach
                                </select>
                           </td>
                          <tr>
                              <td><br>Positivas</td>
                              <td><br><input type="number" id="positivast" name="positivast" class="form-number"></td>
                              
                            
                          </tr>

                          <tr>
                              <td><br>Negativas</td>
                              <td><br><input type="number" id="negativast" name="negativast" class="form-number"> </td>
                              
                              
                          </tr>

                          
                                           
                      <th><br>

                      <div class="row2 mb-0">
                            <div class="col-md-1">
                                <button type="submit" class="btn btn-primary" style ="margin-left:0%;" id="guardar">
                                    {{ __('Guardar') }}
                                </button>   
                            </div>
                        </div>
                      </th>

                      <th><br><br>
                    
                      <button type="reset" name = "button6" class="btn btn-danger">Cancelar</button>
                          
                          
                      </th>

                      <th>

                          
                      </th>

                      <th></th>
                      
                      </th>


                      

                      </tbody>

                      </table>
              </form>
            </section> 
      </section>  

        <div class="seccion-P"> <br>    

        <table class="table-t1b table-sm table-striped table-hover">

<thead class = "thead">
    <br>
    <tr>
    <th>Tipo prueba</th>
    <th>Negativas</th>
    <th>Positivas</th>
    <th>Cantidad Total</th>
     
     </tr>
</thead>
<tbody class="bg-color:white">

<tr>
       
        @if(isset($result))
            @foreach($result as $r)
                <tr>
                <td>{{ $r['descripcion_tipo_prueba'] }}</td>
                <td>{{ $r['cantidad_negativo'] }}</td>
                <td>{{ $r['cantidad_positivo'] }}</td>
                <td>{{ $r['cantidad_positivo']+$r['cantidad_negativo'] }}</td>

                <script>
                var id_tipo_prueba = "<?php echo $r['id_tipo_prueba'] ?>";
                var cantidad_negativo = "<?php echo $r['cantidad_negativo'] ?>";
                var cantidad_positivo = "<?php echo $r['cantidad_positivo'] ?>";
                var cantidad_total = "<?php echo $r['cantidad_positivo']+$r['cantidad_negativo'] ?>";
                </script>
                </tr> 
            @endforeach
        @else
            <td>No existen registros para este turno</td>  -
            
        @endif

</tr>
    </tbody>
</table>
 
<div class='card18'>
      <div class='card-header p-1 '>{{ __('Gráfico Alcoholemia') }}</div>
        <div id="grafico_alcoholemia">
          
        </div>
    </div>

</div><hr>

<h5 class="h5">Incidencias Reportadas</h5>
<br>

<div class="seccion-P"> <br>
<section class="seccion4"><br>

            <form method="get" action="{{ url('registrar_incidencia') }}">
                      <h5 class="title"><strong>INCIDENCIAS PRESENTADAS</strong></h5><br>
                          
                      <table id="table5" class="table5 table-sm">
                      <thead class="thead">
                          
                          <tr>
                             
                              <th>Placa Agente</th>
                              <th>Tipo de Control</th>
                              <th>Novedad Presentada</th>
                              <th></th>
                              
                              <th></th>
                              
                          </tr>
                      
                        </thead>

                      <tbody class="text-center">
                          <tr>
                              <td><br>

                              <select class="form-select" id="agentes" name="agentes">
                                <option selected disabled value="">Seleccionar..</option>
                                @foreach($result_select_age as $c)
                                    <option value="{{ $c['id_agente'] }}">{{ $c['placa_agente'] }}</option>
                                @endforeach
                              </select>

                              </td>
                              <td><br>

                              <select class="form-select" id="tipo" name='tipo'>
                              <option selected disabled value="">Seleccionar..</option>
                                @foreach($result_select_cont as $d)
                                    <option value="{{ $d['id_tipo_control'] }}">{{ $d['descripcion_tipo_cont'] }}</option>
                                @endforeach
                              </select>
                            
                            </td>

                            <td><br><br>

                            <textarea class="textarea" name="incidencia" id="incidencia" cols="30" rows="8" required></textarea>
   
                            </td>
                                            
                        </tr>
                                                              
                                           
                      <th><br>

                      <div class="row2 mb-0">
                            <div class="col-md-0 offset-md-0">
                                <button type="submit" class="btn btn-primary" id="guardar">
                                    {{ __('Guardar') }}
                                </button>   
                            </div>
                        </div>
                      </th>

                      <th><br>
                    
                      <button type="reset" name = "button6" class="btn btn-danger">Cancelar</button>
                          
                          
                      </th>

                      </tbody>

                      </table>
            </form>
            </section> 

<table class="table-t1b table-sm table-striped table-hover">

<thead class = "thead">
    <br>
    <tr >
    <th>Placa</th>
    <th>Tipo de Control</th>
    <th>Novedad Presentada</th> 
  
     </tr>
</thead>
<tbody>
  
        @if(isset($result2))
            @foreach($result2 as $r2)
                <tr>
                <td>{{ $r2['placa_agente'] }}</td>
                <td>{{ $r2['descripcion_tipo_cont'] }}</td>
                <td>{{ $r2['descripcion_incidencia'] }}</td>
                </tr>
            @endforeach   
        @else
            <td>No existen registros para este turno</td> 
        @endif
    </tbody>
</table>
<br>

</div>

<script>

Highcharts.chart('grafico_alcoholemia', {
    chart: {
        type: 'bar'
    },
    title: {
        text: '',
        align: 'left'
    },
    xAxis: {
        categories: [
            <?php
            if(isset($result11)){
                foreach($result11 as $r11){
                    echo "'".$r11['descripcion_tipo_prueba']."',";
                }
            } else {
                echo "<td>No existen registros para este turno</td>";
            }
            ?>
        ],
        title: {
            text: null
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Cantidad (Unidades)',
            align: 'high'
        },
        labels: {
            overflow: 'justify'
        }
    },
    credits: {
        enabled: false
    },
    series: [{
        name: 'Positivo',
        data: [
            <?php
            if(isset($result11)){
                foreach($result11 as $r11){
                    echo $r11['cantidad_positivo'].",";
                }
            } else {
                echo "<td>No existen registros para este turno</td>";
            }
            ?>
        ]
    },
    {
        name: 'Negativo',
        data: [
        <?php
            if(isset($result11)){
                foreach($result11 as $r11){
                    echo $r11['cantidad_negativo'].",";
                }
            } else {
                echo "<td>No existen registros para este turno</td>";
            }
            ?>
    ]
    }]
});

Highcharts.chart('grafico_accidentalidad', {
    chart: {
        type: 'bar'
    },
    title: {
        text: '',
        align: 'left'
    },
    xAxis: {
        categories: [
            <?php
            if(isset($result10)){
                foreach($result10 as $r10){
                    echo "'".$r10['descripcion_tipo_accidente']."',";
                }
            } else {
                echo "<td>No existen registros para este turno</td>";
            }
            ?>
        ],
        title: {
            text: null
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Cantidad (Unidades)',
            align: 'high'
        },
        labels: {
            overflow: 'justify'
        }
    },
    credits: {
        enabled: false
    },
    series: [{
        name: 'Accidentalidad reportada',
        data: [
            <?php
            if(isset($result10)){
                foreach($result10 as $r10){
                    echo $r10['cantidad_acc'].",";
                }
            } else {
                echo "<td>No existen registros para este turno</td>";
            }
            ?>
        ]
    }]
});

Highcharts.chart('grafico_procedimiento', {
    chart: {
        type: 'column'
    },
    title: {
        text: '',
        align: 'left'
    },
    xAxis: {
        categories: [
            <?php
            if(isset($result12)){
                foreach($result12 as $r12){
                    echo "'".$r12['descripcion_zona']." - ".$r12['descripcion_tipo_proc']."',";
                }
            } else {
                echo "<td>No existen registros para este turno</td>";
            }
            ?>
        ],
        title: {
            text: null
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Cantidad (Unidades)',
            align: 'high'
        },
        labels: {
            overflow: 'justify'
        }
    },
    credits: {
        enabled: false
    },
    series: [{
        name: 'Procedimientos registrados',
        data: [
            <?php
            if(isset($result13)){
                foreach($result13 as $r13){
                    echo $r13['cantidad_proc'].",";
                }
            } else {
                echo "<td>No existen registros para este turno</td>";
            }
            ?>
        ]
    }]
});

</script>

@stop