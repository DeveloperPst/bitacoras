@extends('adminlte::page')


@section('title','Historial')


@section('content_header')

<!-- Styles -->
<link rel="stylesheet" href="{{ asset('css/home.css') }}">
<script src="../Highcharts/code/highcharts.js"></script>

@stop

@section('content')

<div class="container-turno" style="margin-left: 10%;">

<div style="margin-right:3%;">
<h3><strong>INFORME TURNO</strong></h3>
<h5><strong>TURNO:</strong>
    <?php
             echo $_SESSION['turno_consultado']." - <strong>USUARIO: </strong>".$_SESSION['nombre_usuario']." - <strong>FECHA: </strong>".$_SESSION['fecha_registro'];

    ?></h5>
</div>

<hr><br>

  	<h5 class="text-center" style="margin-right: 8%;"><strong>CONSOLIDADO PROCEDIMIENTOS</strong></h5><br>

	<div class="container-turno1" style="margin-right:8%;"> 

			<form method="get" action="{{ url('registrar_proc') }}">

		        <table id="table1" class="table table-sm" style="width:56rem;">

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
                                echo "<td rowspan='".$_SESSION['cantidad_tipo_proc']."' style='vertical-align: middle;'>".$r14['descripcion_zona']."</td>";
                            } else if($zona == $r14['id_zona']) {
                            }
                            
                            $zona = $r14['id_zona'];
                            $id_concat = $r14['id_concat'];
                            $cantidad = $r14['cantidad_proc'];
                        ?>
                            <td>{{ $r14['descripcion_tipo_proc'] }}</td>

                            <td><input type="number" name="{{ $id_concat }}" class="form-number"
                            value="{{ $cantidad }}" /></td>
                            </tr>
                            
                            <?php
                                $contador++;
                            ?>
                    @endforeach   

                    @else
                        <td>No existen registros para este turno</td>  
                    @endif

		        </tbody>

		        </table>
            </form>      
		 </div><br><br><br><br> 


		 <div class="container-turno2" style="width: 75%;margin-left:9%;">

		           
			    <div class='card18a'>
			      <div class='card-header p-1'>{{ __('Gráfico Procedimientos') }}</div>
			      <div id="grafico_procedimiento">
			            
			        </div>
			    </div>

	         <br>
		 </div><br>     
 		    
		<hr><br>

		<h5 class="text-center" style="margin-right: 8%;"><strong>REPORTE DE ACCIDENTALIDAD</strong></h5><br>


		<div class="container-turno3" style="margin-right: 8%; with:30rem;">

        <div class="seccion-4">
	        </form>
	   
	       <table class="table-tp2 table-sm table-striped table-hover">

	       
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

        <div class="container-turno4" style="margin-left:5%;">

        <div class="seccion-7" style="margin-left:1%;with:100rem;">   

		        <table class="table4 table-sm table-striped table-hover" style="with:100rem; background-color:white;heigth:60%;margin-right:2%;">

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

				<hr><br>

			 <h5 class="text-center" style="margin-right: 8%;"><strong>INCIDENCIAS PRESENTADAS</strong></h5><br>
		 


             <div class="container-turno5" style="margin-left: 10%;">			 	
			     <div class="seccion-9">
				 <table id="table5" class="table table-sm" style="width: 56rem;height:30%">

				<thead class = "thead-incD">
				    <br>
				    <tr >
				    <th>Placa</th>
				    <th>Tipo de Control</th>
				    <th>Novedad Presentada</th> 
				  
				     </tr>
				</thead>
				<tbody class="tbody-incD">
				  
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


@stop