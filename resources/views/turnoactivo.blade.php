@extends('adminlte::page')


@section('title','Primer Turno')


@section('content_header')

<!-- Styles -->
<link rel="stylesheet" href="{{ asset('css/home.css') }}">
<script src="https://code.highcharts.com/highcharts.js"></script>

@stop

@section('content')


<div class="container-turno">


<h3><strong>INFORME PRIMER TURNO</strong></h3>
<hr><br>

<form method="get" action="{{ url('registrar_proc') }}">
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
                   <!--<td><br><input type="number" id="3" name="Compacentro" class="form-number"></td>-->
                  <td><br><input type="number" id="Inmovicentro" name="Inmovicentro" class="form-number"></td>
                  <td><br><input type="number" id="Pypcentro" name="Pypcentro" class="form-number"></td>
                  <td><br><input type="number" id="Bicicentro" name="Bicicentro" class="form-number"></td>
                
              </tr> 
              
              <!--<tr>
                  <td><br>Oeste</td>
                  <td><br><input type="number" id="Compaoeste" class="form-number"></td>
                  <td><br><input type="number" id="Inmovioeste" class="form-number"></td>
                  <td><br><input type="number" id="Pypoeste" class="form-number"></td>
                  <td><br><input type="number" id="Bicioeste" class="form-number"></td>
                  
              </tr>

              <tr>
                  <td><br>Norte</td>
                  <td><br><input type="number" id="Companorte" class="form-number"></td>
                  <td><br><input type="number" id="Inmovinorte" class="form-number"></td>
                  <td><br><input type="number" id="Pypnorte" class="form-number"></td>
                  <td><br><input type="number" id="Bicinorte" class="form-number"></td>
                  
              </tr>

              <tr>
                  <td><br>Oriente</td>
                  <td><br><input type="number" id="Compaoriente" class="form-number"></td>
                  <td><br><input type="number" id="Inmovioriente"class="form-number"></td>
                  <td><br><input type="number" id="Pyporiente" class="form-number"></td>
                  <td><br><input type="number" id="Bicioriente" class="form-number"></td>
                  
              </tr>
              <tr>
                  <td><br>Sur</td>
                  <td><br><input type="number" id="Compasur" class="form-number"></td>
                  <td><br><input type="number" id="Inmovisur" class="form-number"></td>
                  <td><br><input type="number" id="Pypsur" class="form-number"></td>
                  <td><br><input type="number" id="Bicisur" class="form-number"></td>
                  
              </tr>
              <tr>
                  <td><br>Operativo</td>
                  <td><br><input type="number" id="Compaoperativo" class="form-number"></td>
                  <td><br><input type="number" id="Inmovioperativo" class="form-number"></td>
                  <td><br><input type="number" id="Pypoperativo" class="form-number"></td>
                  <td><br><input type="number" id="Bicioperativo" class="form-number"></td>
                    
              </tr>

              <tr>
                  <td><br>Disponibles</td>
                  <td><br><input type="number" id="Compadisponibles" class="form-number"></td>
                  <td><br><input type="number" id="Inmovidisponibles" class="form-number"></td>
                  <td><br><input type="number" id="Pypdisponibles" class="form-number"></td>
                  <td><br><input type="number" id="Bicidisponibles" class="form-number"></td>
                  
              </tr>

              <tr>
                  <td><br>Comisaria</td>
                  <td><br><input type="number" id="Compacomisaria" class="form-number"></td>
                  <td><br><input type="number" id="Inmovicomisaria" class="form-number"></td>
                  <td><br><input type="number" id="Pypcomisaria" class="form-number"></td>
                  <td><br><input type="number" id="Bicicomisaria" class="form-number"></td>
                  
              </tr>-->


              <tr>
                  <td><br>Total</td>
                  <td><br><label></label></td>
                  <td><br><label></label></td>
                  <td><br><label></label></td>
                  <td><br><label></label></td>
                  
              </tr>

          <th></th>

                    
          <th><br>

               <button type="submit" class="btn btn-primary">Guardar</button>
          </th>

          <th>
          </th>

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
    
<div class="seccion-P">
 
    
       <table class="table-t1 table-sm table-striped table-hover border:2px;"><br><br>

       
        <thead class = "thead">
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
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            </tr>
            <tr>
            <th scope="row">Oeste </th>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            </tr>
            <tr>
            <th scope="row">Norte</th>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            </tr>

            <tr>
            <th scope="row">Oriente</th>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            </tr>

            <tr>
            <th scope="row">Sur</th>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            </tr>

            <tr>
            <th scope="row">Operativo</th>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            </tr>

            <tr>
            <th scope="row">Disponibles</th>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            </tr>

            <tr>
            <th scope="row">Comisaria</th>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            </tr>

            <tr>
            <th scope="row">Cantidad Total</th>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            </tr>

            </tbody>
        </table>

       
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
    <th>Positivas</th>
    <th>Negativas</th>
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
            <td>No existen registros para este turno</td>  
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
    <div class='card18'>    
      <div class='card-header p-1'>{{ __('Gráfico Incidencias') }}</div>
      <div id="grafico_incidencias">
        
          </div>
    </div>

</div>

<script>
  
  Highcharts.chart('grafico_alcoholemia', {
    chart: {
        type: 'bar'
    },
    title: {
        text: '',
    },
    xAxis: {
        categories: ['Por accidente', 'Por operativo']
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Cantidad(Unidades)'
        },
    },
    plotOptions: {
        bar: {
            dataLabels: {
                enabled: true
            }
        }
    },
    credits: {
        enabled: false
    },
    series: [{
        name: id_tipo_prueba,
        data: [<?php 
                    if(isset($r['cantidad_positivo'])){
                        echo $r['cantidad_positivo'].",".$r['cantidad_negativo'];
                    } else {
                        echo 0;
                    }
                ?>]
    }, {
        name: id_tipo_prueba,
        data: [<?php
                if(isset($r['cantidad_positivo'])){
                    echo $r['cantidad_positivo'].",".$r['cantidad_negativo'];
                } else {
                    echo 0;
                }
            ?>]
    }]
});

Highcharts.chart('grafico_incidencias', {
    chart: {
        type: 'bar'
    },
    title: {
        text: 'Historic World Population by Region',
        align: 'left'
    },
    subtitle: {
        text: 'Source: <a ' +
            'href="https://en.wikipedia.org/wiki/List_of_continents_and_continental_subregions_by_population"' +
            'target="_blank">Wikipedia.org</a>',
        align: 'left'
    },
    xAxis: {
        categories: ['Africa', 'America', 'Asia', 'Europe', 'Oceania'],
        title: {
            text: null
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Population (millions)',
            align: 'high'
        },
        labels: {
            overflow: 'justify'
        }
    },
    tooltip: {
        valueSuffix: ' millions'
    },
    plotOptions: {
        bar: {
            dataLabels: {
                enabled: true
            }
        }
    },
    legend: {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'top',
        x: -40,
        y: 80,
        floating: true,
        borderWidth: 1,
        backgroundColor:
            Highcharts.defaultOptions.legend.backgroundColor || '#FFFFFF',
        shadow: true
    },
    credits: {
        enabled: false
    },
    series: [{
        name: 'Year 1990',
        data: [631, 727, 3202, 721, 26]
    }, {
        name: 'Year 2000',
        data: [814, 841, 3714, 726, 31]
    }, {
        name: 'Year 2010',
        data: [1044, 944, 4170, 735, 40]
    }, {
        name: 'Year 2018',
        data: [1276, 1007, 4561, 746, 42]
    }]
});


Highcharts.chart('grafico_accidentalidad', {
    chart: {
        type: 'bar'
    },
    title: {
        text: '',
    },
    xAxis: {
        categories: ['1']
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Cantidad(Unidades)'
        },
    },
    plotOptions: {
        bar: {
            dataLabels: {
                enabled: true
            }
        }
    },
    credits: {
        enabled: false
    },
    series: [{
        data: [<?php
                if(isset($r1['cantidad_acc'] )){
                    echo $r1['cantidad_acc'];
                } else {
                    echo 0;
                }
            
            ?>]
    }]
});

Highcharts.chart('grafico_procedimiento', {
    chart: {
        type: 'bar'
    },
    title: {
        text: '',
    },
    xAxis: {
        categories: ['1', '2']
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Cantidad(Unidades)'
        },
    },
    plotOptions: {
        bar: {
            dataLabels: {
                enabled: true
            }
        }
    },
    credits: {
        enabled: false
    },
    series: [{
        data: [<?php
                if(isset($r1['cantidad_acc'] )){
                    echo $r1['cantidad_acc'];
                } else {
                    echo 0;
                }
            
            ?>]
    }, {
        data: [<?php
                if(isset($r1['cantidad_acc'] )){
                    echo $r1['cantidad_acc'];
                } else {
                    echo 0;
                }
            
            ?>]
    }]
});


</script>

@stop