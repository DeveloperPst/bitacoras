<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Informe Eventos Ceges</title>

   
 
</head>

        
<style>

.container-reportes{

background-color: #fff;
min-height: 120%;

}

.VAR{

background-color: #fff;
height: 170px;
margin-left: 10%;


  
  }

  #h6{

    margin-left: 12%;
    font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
    font-size: medium;


  }


  .contenido{

  font-family: Arial, Helvetica, sans-serif;
  font-size: 12pt;  
  justify-content: center;

  }


  .btn{

    margin-left: 41%;
   
  }

    
.registro{

  width: 55rem;
  background-color: dimgray;
  margin-left:12%;
  padding: 3px;
  color:#fff;
  padding-top: 1%;
  font-family: Arial, Helvetica, sans-serif;
  font-size: small;
}

.form-control{

width: 56rem;
height: 103rem;
background-color:#fff;
font-family: Arial, Helvetica, sans-serif;



}

.card-title{

 background-color: dimgray;
 color:#fff;
 width: 56rem; 
 margin-left: 9%; 
 margin-top: 3;
 text-align: center;
padding: 1%;

}

</style>



<div class="container-reportes"> 




<body>
       
<img src="./img/Alcaldia.png"  alt="Alcaldia de Santiago de Cali" class="VAR" style="margin-left: 0%;">  
       
        <h4><strong>ALFREDO CANDELO CORTES</strong></h4>
        <b>Subsecretario de Servicios de Movilidad.</b><br> 
        <b>Cali</b>


      
      <p class= "contenido">
 
        
      <div class="seccion-form">
           
            <b>Asunto:  {{ $asunto}} </b><br><br>

      </div><br>
             
      <div class="seccion-form">
            <b>Lugar:  {{ $lugar }}</b><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Comuna: {{ $comuna }}</b> 
            
       </div>          
     
       <div class="seccion-form">
            <b>Fecha:  {{ $fecha }} </b><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Horario: {{ $horario }}</b><br><br>
                
      </div>     
            
      <div class="seccion-form">                 
            <b>Conductor Vehículo No. 1:	{{$conductor1}}</b> <b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Cedula de Ciudadanía:{{$cedula1}}</b>

      </div>  
      
      <div class="seccion-form">   
            <b>Edad: {{$edad}}</b> <b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Lesionado(a): {{$lesionado}}</b>
            
      </div>        
             
      <div class="seccion-form">    
            <b>Clínica: {{$clinica}}</b> <b>&nbsp;&nbsp;&nbsp;&nbsp;Licencia conducción: {{$licencia1}}</b>

      </div>         
            

      <div class="seccion-form">    
            <b>T.O:  {{$to}}</b> <b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Placa Vehículo No. 1: {{$placav1}}</b> <b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tipo:{{$tipo}}</b>
            
      </div>   

      <div class="seccion-form">  

            <b>SOAT: {{$soat}}</b><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;RTM: {{$rtm}}</b>

      </div><br><br>        

      <div class="seccion-form">  
            
            <b>Conductor Vehículo No. 2: {{$conductor2}}</b> <b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Cedula de Ciudadanía: {{$cedula2}}</b>

      </div>       
            <b>Edad: {{$edad2}}</b> <b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Lesionado(a): {{$lesionado2}}</b>
            
       <div class="seccion-form">        
            <b>Clínica: {{$clinica2}}</b> <b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Licencia conducción: {{$licencia2}}</b>

      </div>   

      <div class="seccion-form">    
            <b>T.O: {{$to2}}</b><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Placa Vehículo No. 1: {{$placav2}}</b>
           
      </div>
      
      <div class="seccion-form">   
           <b>Tipo: {{$tipo2}}</b> <b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SOAT:{{$soat2}}</b><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;RTM: {{$rtm2}}</b>
                        
      </div><br><br>      
             
      <div class="seccion-form">   
            <b>Lesionado(a): {{$lesionado3}}</b><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nombre: {{$nombre}}</b> <b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Condición: {{$condicion}}</b><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Clínica: {{$clinica3}}</b>

      </div><br>  

      <div class="seccion-form">         

            <b>Prueba indirecta de alcoholemia No. 1: {{$prueba1}}</b>
      </div>
      
      <div class="seccion-form">  
            <b>Operador del Alcoholímetro: {{$operador}}</b><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Placa: {{$placa3}}</b>

       </div><br>

       <div class="seccion-form">  
            <b>Resultado Prueba Conductor vehículo No. 1: {{$resultado1}}</b><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Orden Comparendo: {{$comparendo1}} </b>

        </div>

        <div class="seccion-form"> 

            <b>Resultado Prueba Conductor vehículo No. 2: {{$resultado2}}</b> <b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Orden Comparendo: {{$comparendo2}}</b>

        </div><br><br>

            
        <div class="seccion-form"> 
            <b>Agente que conoce del hecho: {{$agentes}}</b>

        </div><br> 
        
        <div class="seccion-form"> 
            
            <b>Incidente: {{$incidente}}</b>    <b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ipat Nro. {{$ipat}}</b> <b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SPOA Nro. {{$spoa}}</b>   <br><br><br><br><br>
             
        </div><br><br><br><br><br> 
                             
                               
            <b>Relato de los hechos: {{$relato}}</b><br><br><br><br><br><br><br><br><br><br>       
 
          <div class="seccion-form"> 
            <h4><strong>JHON FREDDY GUEVARA 263</strong></h4>
            <b>Agente de Transito</b><br> 
            <b>Centro de Gestión Secretaria de Movilidad</b>
          </div>   
          
    
            

    </body>

</div>   

</html>

 


 
