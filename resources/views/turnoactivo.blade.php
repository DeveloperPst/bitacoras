@extends('adminlte::page')


@section('title','Primer Turno')


@section('content_header')

<!-- Styles -->
<link rel="stylesheet" href="{{ asset('css/home.css') }}">
<script src="./Highcharts/code/highcharts.js"></script>

@stop

@section('content')

                                

<?php

   if($_SESSION['mensaje'] == 6){
        
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

    } else if($_SESSION['mensaje'] == 7){
        
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
            icon: 'warning',
            title: 'El turno iniciado se encuentra en un estado diferente a activo, por favor validar!'
          })
        </script>";

        $_SESSION['mensaje'] = 0;

    } else {

    }


    if($_SESSION['turno_activo'] == 0){
        
        echo "<div class='container-maestroturno'>
        
            <div class='card text-center' style='box-shadow: 0 .4em .5em -.3em rgba(0,0,0,.8);width:34rem;'>
                <div class='card-header'>
                    <h4><strong>INFORME TURNO ACTIVO</strong></h4>
                </div>
                <div class='card-body' style=margin-right:16%;'font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;aling-text:center;'>
                <h5><strong>¡ No se encuentran turnos activos !</strong></h5>
                </div>
                <div class='card-footer text-muted'>
                    Bienvenidos a Bitácoras 
                </div>
            </div>
        </div>";
    
    } else {
    ?>

<div class="container-turno">

            <div style="margin-right:3%;">
                <h3><strong>INFORME TURNO ACTIVO</strong></h3>
                <h5><strong>TURNO ACTIVO:</strong>
                    <?php 

                    echo $_SESSION['nombre_turno_actual']." - <strong>USUARIO: </strong>".$_SESSION['nombre_usuario']." - <strong>FECHA: </strong>".$_SESSION['fecha_registro'];

                ?></h5>
            </div>

        <hr><br>

        <h5 class="text-center" style="margin-right: 8%;"><strong>CONSOLIDADO PROCEDIMIENTOS</strong></h5><br>

	       <div class="container-turno1"> 

                <form method="get" action="{{ url('registrar_proc') }}">

                    <table id="table1" class="table table-sm tipo-p">

                    <tbody>
                        
                        @if(isset($result14))

                        <?php
                            $zona = "";
                            $contador = 0;
                        ?>
                        <thead class="thead">
                        <tr>  
                            <th>ZONA</th><th>TIPO PROCEDIMIENTO</th><th>CANTIDAD</td></th>
                        </tr>
                        </thead>
                        @foreach($result14 as $r14)
                        <tr>
                            <?php
                                if($zona == "" || $zona != $r14['id_zona']){
                                    echo "<td rowspan='4' style='vertical-align: middle;font-weight: bold;border-color:black;background-color:#F8F9F9;border:10%;'>".$r14['descripcion_zona']."</td>";
                                                                      
                                } else if($zona == $r14['id_zona']) {
                                }
                                
                                
                                $zona = $r14['id_zona'];
                                $id_concat = $r14['id_concat'];
                                $cantidad = $r14['cantidad_proc'];
                                
                                
                            ?>
                                <td>{{ $r14['descripcion_tipo_proc'] }} </td>

                                <td><input type="number" min="0" name="{{ $id_concat }}" class="form-number" 
                                value="{{ $cantidad }}"/></td>
                                </tr>
                                
                                <?php
                                    $contador++;
                                ?>
                        @endforeach   
                        <tr>
                            <td colspan='3' style="border-color:black;font-weight: bold;border-color:black;background-color:#F8F9F9;"><br><br><button type="submit" name="button3" id="button3" class="btn btn-primary">Registrar</button>

                            <button type="reset" id = "form1" value ="Reset" class="btn btn-danger">Cancelar</button></td>
                        </tr>
                        @else
                            <td>No existen registros para este turno</td>  
                        @endif


                    </tbody>

                    </table>
                </form>      
           </div><br><br> 


            <div class="container-turno2">

                    
                    <div class='card18a'>
                        <div class='card-header p-1'>{{ __('Gráfico Procedimientos') }}</div>
                        <div id="grafico_procedimiento">
                            
                        </div>
                    </div>

                <br>
            </div><br>     
 		    
		<hr><br>

		<h5 class="text-center" style="margin-right: 8%;"><strong>REPORTE DE ACCIDENTALIDAD</strong></h5><br>


		<div class="container-turno3">
		    <div class="seccion-3">

				<form method="get" action="{{ url('registrar_accidente') }}">
				    
			      
			          
			      <table id="table2" class="table2 table-sm">
			      <thead class="thead">
			          
		          <tr>
		              <th>Tipo Accidente</th>
			              <th>Cantidad</th>
                          <th></th>                        
			          </tr>
			      
			        </thead>

			      <tbody>
			        
			         <tr>
		              <td><br><br>
                    
	                <select class="form-select" id="tipo_accidente" name="tipo_accidente">
	                <option selected disabled value="">Seleccionar..</option>
	                @if(isset($result_select_acc))
                        @foreach($result_select_acc as $a)
	                        <option value="{{ $a['id_tipo_accidente'] }}">{{ $a['descripcion_tipo_accidente'] }}</option>
	                    @endforeach  

                    @else
                        <td>No existen registros para este turno</td>
                    @endif         
	               </select>
	              
		              </td>
		              <td><br><br><input type="number" min="0" id="cantidad" name="cantidad" class="form-number" required></td>   </tr>

                    <?php
                   
                        echo "<tr>
                        <td><br><br><button type='submit' name = 'button3' class='btn btn-primary'>Guardar</button></td>
                        <td><br><br><button type'reset' name = 'button4' class='btn btn-danger'>Cancelar</button></td>
                        </tr>";

                    ?>
	                   
	            </tbody>

	       </table>

        </div>

        <div class="seccion-4">
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

        </div> 
	        <div class="seccion-5">

			       
			    <div class='card18'>
			      <div class='card-header p-1'>{{ __('Gráfico Accidentaidad') }}</div>
			        <div id="grafico_accidentalidad">

			        </div>
			    </div>
		   </div>
	    </div><br>
        <hr><br>

        <h5 class="text-center" style="margin-right: 8%;"><strong>PRUEBAS DE ALCOHOLEMIA</strong></h5><br>

        <div class="container-turno4">

        	<div class="seccion-6">
        
                   <form method="get" action="{{ url('registrar_1') }}">
	                     
                          
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
                                  @if(isset($result_select_prue))
                                    @foreach($result_select_prue as $b)
                                        <option value="{{ $b['id_tipo_prueba'] }}">{{ $b['descripcion_tipo_prueba'] }}</option>
                                    @endforeach
                                @else
                                    <td>No existen registros para este turno</td>  
                                @endif
                                </select>
                           </td>

                           <?php
                           
                          echo "<tr>
                              <td><br>Positivas</td>
                              <td><br><input type='number' min='0' id='positivast' name='positivast' class='form-number'></td>
                         </tr>
                          <tr>                          
                              <td><br>Negativas</td>
                              <td><br><input type='number' min'0' id='negativast' name='negativast' class='form-number'> </td>
                         </tr>                                               
                      <th><br>

                      <div class='row2 mb-0'>
                            <div class='col-md-1'>
                                <button type='submit' class='btn btn-primary' style ='margin-left:0%;' id='guardar'>
                                    Guardar
                                </button>   
                            </div>
                        </div>
                      </th>

                      <th><br>
                    
                        <button type='reset' name = 'button6' class='btn btn-danger'>Cancelar</button>
                                                
                       </th>";
                    ?>
                      <th></th>
                        <th></th>
                      
                      </tbody>
	                      </table>
	              </form>
	          </div>

             <div class="seccion-7">   

		        <table class="table-t1b2 table-sm table-striped table-hover">

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
		            <td>No existen registros para este turno</td>   
		            
				        @endif

							</tr>
							    </tbody>

		         </div>				  
			  		<div class="seccion-8">		    
							</table>
							 
							<div class='card18b'>
							      <div class='card-header p-1 '>{{ __('Gráfico Alcoholemia') }}</div>
							        <div id="grafico_alcoholemia">
							          
							        </div>
							  </div>
				    	  </div>
				</div><br>
                   
				<hr><br><br>

                    
			 <h5 class="text-center" style="margin-right: 8%;"><strong>INCIDENCIAS PRESENTADAS</strong></h5><br>
		 

		 <div class="container-turno5">	
			<div class="seccion-9"><br>
			 

                <form method="get" action="{{ url('registrar_incidencia') }}">
                        
                          
                      <table id="table5" class="table5 table-sm">
                      <thead class="thead-inc">
                          
                                                   
                              <th >Placa Agente</th>
                              <th>Tipo de Control</th>
                              <th>Novedad Presentada</th>
                              <th></th>
                              
                               
                           
                      
                        </thead>

                      <tbody class="tbody-inc">
                          <tr class="tbody-tr">
                              <td><br>
                              
                              @if(isset($result_select_age))
                             
                              <select class="form-select" id="agentes" name="agentes" style="margin-left: 8%;">
                                <option selected disabled value="">Seleccionar..</option>
                                @foreach($result_select_age as $c)
                                <option value="{{ $c['id_agente'] }}">{{ $c['placa_agente'] }}</option>
                                @endforeach

                              </select>
                                @else
                                    <td>No existen registros para este turno</td>  
                                @endif

                               
                              </td>
                              <td><br>

                              @if(isset($result_select_cont))  
                              
                              <select class="form-select" id="tipo" name='tipo' style="margin-left:53%;">
                              <option selected disabled value="">Seleccionar..</option>
                                
                                @foreach($result_select_cont as $d)
                                    <option value="{{ $d['id_tipo_control'] }}">{{ $d['descripcion_tipo_cont'] }}</option>
                                @endforeach
                                @else
                                    <td>No existen registros para este turno</td>  
                                  
                                @endif
                                                                                           
                              </select>
                            
                            </td>

                            <td><br>

                            <textarea class="textarea" name="incidencia" id="incidencia" cols="30" rows="8" required></textarea>

                   
                            </td>
                         </tr>                                                
                                        
                      <th>
                        
                    <?php

                      echo "<div class='row2 mb-0'>
                            <div class='col-md-0' style= 'margin-right:42%;'>
                                <button type='submit' class='btn btn-primary' id='guardar'style= 'margin-left:13%;'>
                                    Guardar
                                </button>   
                            </div>
                        </div>
                      </th>
                     
                      <th>
                           <button type='reset' name = 'button6' class='btn btn-danger' style= 'margin-left:53%;'>Cancelar</button>
                       </th>";
                                ?>        
                         </tbody>
                      </table>
		            </form>
			     </div>
            
                
            <div class="container-turno5">	 
			<div class="seccion-10">

                 <table class="cardIn table-sm table-striped table-hover">
                    <thead class = "theadInr">
				    
				    <tr>
				    <th>Placa</th>
				    <th>Tipo de Control</th>
				    <th>Novedad Presentada</th> 
				  
				    </tr>
				    </thead> 
                    <tbody class = "tbody-incr">
				  
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
        type: 'column',
        width: 1090
    },
    title: {
        text: null
    },
    subtitle: {
        text: null
    },
    xAxis: {
        max: 0,
        categories: [
            'Procedimientos registrados'
        ],
        crosshair: true
    },
    yAxis: {
        title: {
            text: 'Cantidad (Unidades)'
        }
    },
    series: [
        <?php
            if(isset($result12)){
                foreach($result12 as $r12){
                    echo "{
                        name: '".$r12['descripcion_zona']." - ".$r12['descripcion_tipo_proc']."',
                        data: [".$r12['cantidad_proc']."]},";
                }
            } else {
                echo "<td>No existen registros para este turno</td>";
            }
            ?> 
    ]
});

</script>
 
<?php
}
     ?> 
@stop