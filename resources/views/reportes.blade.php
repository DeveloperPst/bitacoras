@extends('adminlte::page')

@section('title','Dashboard')

@section('content_header')


 
<!-- Styles -->
<link rel="stylesheet" href="{{ asset('css/home.css') }}">

 


@stop


@section('content')



 
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

    background-color: #e8effc;
    min-height: 120%;
    margin-left: 14%;

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
     margin-left: 15%; 
     margin-top: 3;
     text-align: center;
    padding: 1%;

    }
    
    </style>
 
   
 
      <h6 class="card-title">Registrar Informe CEGES</h6>            
      <div class="container-reportes"> 

      
      
                <form method="post" action="{{URL::to('/pdf')}}" class="form-control"><br><br> 
               
                     
                    
                    @csrf
                    
                      <div class="seccion-form">
                        
                      
                          <label for="asunto" class="col-sm-1 col-form-label">  Asunto: </label>
                          <input type="text" name="asunto" class="form-text"> 

                          <label for="lugar" class="col-sm-1 col-form-label" style="margin-left: 6%;"> Lugar: </label>
                          <input type="text" name="lugar" class="form-text" >  

                          <label for="comuna" class="col-sm-1 col-form-label" style="margin-left: 6%;">  Comuna: </label>
                          <input type="text" name="comuna">  

                    </div><br>

                    <div class="seccion-form">
                                
                        
                          <label for="fecha" class="col-sm-1 col-form-label">Fecha: </label>
                          <input type="date" name="fecha"></label>
                        
                          
                          <label for="horario" class="col-sm-1 col-form-label"style="margin-left: 6%;">Horario: </label>
                          <input type="time" name="horario" >
                        
                    </div><hr> 

                      <div class="seccion-form">
                      
                          <label for="conductor1" class="col-sm-3 col-form-label">Conductor Vehículo No.1:</label>
                          <input type="text" name="conductor1">
                          
                                              
                          <label for="cedula1" class="col-sm-2 col-form-label" style="margin-left: 2%;"> Cedula Ciudadanía:	</label>
                          <input type="text" name="cedula1" style="margin-left: 2%;">


                                                
                      </div><br> 

                      <div class="seccion-form">

                          

                          <label for="lesionado" class="col-sm-1 col-form-label">Lesionado(a):</label>
                          <input type="text" name="lesionado" style="margin-left: 5%;">

                                  
                          <label for="clinica" class="col-sm-1 col-form-label" style="margin-left: 5%;">Clínica: </label>
                          <input type="text" name="clinica">   

                          <label for="edad" class="col-sm-0 col-form-label" style="margin-left: 5%;">Edad:</label>
                          <input type="number" name="edad" class="form-number" style="margin-left: 2%;"> 
                      
                      
                      </div><br>  
                                
                        
                      <div class="seccion-form">

                          <label for="licencia1" class="col-sm-3 col-form-label">Licencia conducción:</label>
                          <input type="text" name="licencia1" class="form-text">

                          <label for="to" class="col-sm-1 col-form-label" style="margin-left: 5%;">T.O:</label>
                          <input type="number" name="to" class="form-text">
                          
                        
                      </div><br>  

                      <div class="seccion-form">

                        <label for="placav1" class="col-sm-3 col-form-label">Placa Vehículo No.1 :</label>
                        <input type="text" name="placav1" class="form-text"> 
                          

                        <label for="tipo" class="col-sm-1 col-form-label" style="margin-left: 5%;">Tipo: </label>
                        <input type="text" name="tipo">
                          
                      
                      </div><br>  

                              
                      <div class="seccion-form">

                        <label for="soat" class="col-sm-1 col-form-label">SOAT: </label>
                        <input type="text" name="soat">

                        <label for="rtm" class="col-sm-1 col-form-label" style="margin-left: 5%;">RTM: </label>
                        <input type="text" name="rtm">

                            
                      </div><hr>  

                      
                      <div class="seccion-form">

                        <label for="conductor2" class="col-sm-3 col-form-label">Conductor Vehículo No. 2: </label>
                        <input type="text" name="conductor2"> 
                          
                          
                        <label for="cedula2" class="col-sm-2 col-form-label" style="margin-left: 2%;">Cedula Ciudadanía:	</label>
                        <input type="text" name="cedula2">

                      </div><br>  

                      <div class="seccion-form">

                        <label for="lesionado2" class="col-sm-1 col-form-label " >Lesionado(a): </label>
                        <input type="text" name="lesionado2" style="margin-left: 5%;">

                        <label for="clinica2" class="col-sm-1 col-form-label" style="margin-left: 5%;">Clínica: </label>
                        <input type="text" name="clinica2"> 
                                
                        <label for="edad2" class="col-sm-1 col-form-label" style="margin-left: 5%;">Edad:</label>
                        <input type="text" name="edad2" class="form-number">

                                
                      </div><br> 
                                
                      <div class="seccion-form">

                      
                        <label for="licencia2" class="col-sm-3 col-form-label">Licencia conducción: </label>
                        <input type="text" name="licencia2">

                        <label for="to2" class="col-sm-1 col-form-label" style="margin-left: 5%;">T.O: </label>
                        <input type="text" name="to2">

                      </div><br>  

                      <div class="seccion-form">
                      
                        <label for="placav2" class="col-sm-3 col-form-label">Placa Vehículo No. 2:</label>
                        <input type="text" name="placav2"> <br><br>
                                  
                        <label for="tipo2" class="col-sm-1 col-form-label" style="margin-left: 5%;">Tipo: </label>
                        <input type="text" name="tipo2"> 

                      </div><br>  

                      <div class="seccion-form">
                      
                        <label for="soat2" class="col-sm-1 col-form-label">SOAT: </label>
                        <input type="text" name="soat2">
                        
                        <label for="rtm2" class="col-sm-1 col-form-label" style="margin-left: 5%";>RTM: </label>
                        <input type="text" name="rtm2">
                                      
                      </div><hr>

                      <div class="seccion-form">
                    
                        <label for="lesionado3" class="col-sm-1 col-form-label">Lesionado(a): </label>
                        <input type="text" name="lesionado3" style="margin-left: 5%;">


                        <label for="nombre" class="col-sm-1 col-form-label" style="margin-left: 2%;">Nombre: </label>
                        <input type="text" name="nombre"> 
                        
                        <label for="condicion" class="col-sm-1 col-form-label" style="margin-left: 2%;">Condición: </label>
                        <input type="text" name="condicion"  style="margin-left: 2%;"> 

                      </div><br>

                      <div class="seccion-form">
                    
                        <label for="clinica3" class="col-sm-1 col-form-label">Clínica: </label>
                        <input type="text" name="clinica3"><br><br>


                        <label for="prueba1" class="col-sm-4 col-form-label" style="margin-left: 2%;">Prueba indirecta de alcoholemia No. 1: </label>
                        <input type="number" name="prueba1" class="form-number">

                      </div><br>

                      <div class="seccion-form">

                        <label for="operador" class="col-sm-3 col-form-label">Operador del Alcoholímetro: </label>
                        <input type="text" name="operador">

                        <label for="placa3" class="col-sm-1 col-form-label" style="margin-left: 2%;">Placa: </label>
                        <input type="number" name="placa3" class="form-number">
                    
                      </div><br>

                    <div class="seccion-form">

                        <label for="resultado1" class="col-sm-5 col-form-label">Resultado Prueba Conductor vehículo No. 1: </label>
                        <input type="number" name="resultado1" class="form-number">

                        <label for="comparendo1" class="col-sm-3 col-form-label" style="margin-left: 2%;">Orden Comparendo: </label>
                        <input type="text" name="comparendo1">

                      </div><br>    
                              
                    
                    <div class="seccion-form"> 
                    
                          <label for="resultado2" class="col-sm-5 col-form-label">Resultado Prueba Conductor vehículo No. 2: </label>
                          <input type="number" name="resultado2" class="form-number"> 

                          
                          <label for="comparendo2" class="col-sm-3 col-form-label" style="margin-left: 2%;">Orden Comparendo:</label>
                          <input type="text" name="comparendo2">

                    </div><br>

                    <div class="seccion-form">


                    </div><hr>

                                
                    <div class="seccion-form">

                          <label for="agentes" class="col-sm-3 col-form-label">Agente que conoce del hecho:</label>
                          <input type="text" name="agentes" class="form-number"> 

                          <label for="incidente" class="col-sm-1 col-form-label"style="margin-left: 2%;">Incidente:</label>
                          <input type="text" name="incidente" class="form-number" style="margin-left: 2%;" >

                          <label for="ipat" class="col-sm-2 col-form-label"style="margin-left: 3%;">Ipat Nro.</label>
                          <input type="text" name="ipat"  class="form-number"> 

                    </div><br>


                    <div class="seccion-form">
                          
                          
                          
                          <label for="spoa" class="col-sm-2 col-form-label">SPOA Nro.</label> 
                          <input type="text" name="spoa" class="form-number" > 
                                               
                          
                    </div><hr>

                            
                    <div class="seccion-form">    

                          <label for="imagenes" class="col-sm-1 col-form-label">Imágenes: </label>
                          <input type="file" multiple= 'true' name="archivo" style="margin-left: 2%;"> 

                    </div><br><br>


                    <div class="seccion-form"> 

                          <label for="relato" class="col-sm-3 col-form-label">Relato de los hechos: </label>
                          <textarea name="relato" cols="80" rows="5"></textarea>        

                    </div><br>
      
        
                <button type="submit" class="btn btn-primary" style="margin-left:24rem;">Generar PDF</button>
                  

              </form>
                  
            </body>

                  
        </div>  

        @stop 
   
  </html>

 
 

            
        <!--Generar PDF--> 

        <!-- <div><br><br> -->

        <!-- <a href="{{URL::to('/pdf')}}" class="btn btn-primary" style="margin-left: 10rem;">{{__('Generar PDF')}}</a> -->


         <!-- </div> -->
       


 


 

 
