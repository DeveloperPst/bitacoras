@extends('adminlte::page')

@section('title','Dashboard')

@section('content_header')

<!-- Styles -->

<link rel="stylesheet" href="{{ asset('css/home.css') }}">
@stop


@section('content')
<div class="container-seccion">


<section class="seccion">



        <form action="#" method="POST" id= "form1">
          <h5 class="text-center"><strong>CONSOLIDADO PROCEDIMIENTOS</strong></h5><br>
              
          <table id="table1" class="table table-sm">
          <thead class="thead">
              
              <tr>
                  <th>Zona/Grupo</th>
                  <th>Comparendos</th>
                  <th>Inmovilizados</th>
                  <th>Pico y Placa</th>
                  <th>Bicicarril</th>
                  
              </tr>
          
            </thead>

          <tbody>
              <tr >
                  <td>Centro</td>
                  <td><input type="number" id="Compacentro" class="form-number" required = "Campo requerido"></td>
                  <td><input type="number" id="Inmovicentro" class="form-number" required = "Campo requerido"></td>
                  <td><input type="number" id="Pypcentro" class="form-number" required = "Campo requerido"></td>
                  <td><input type="number" id="Bicicentro" class="form-number" required = "Campo requerido"></td>
                
              </tr>

              <tr>
                  <td>Oeste</td>
                  <td><input type="number" id="Compaoeste" class="form-number" required = "Campo requerido"> </td>
                  <td><input type="number" id="Inmovioeste" class="form-number" required = "Campo requerido"> </td>
                  <td><input type="number" id="Pypoeste" class="form-number" required = "Campo requerido"></td>
                  <td><input type="number" id="Bicioeste" class="form-number" required = "Campo requerido"></td>
                  
              </tr>

              <tr>
                  <td>Norte</td>
                  <td><input type="number" id="Companorte" class="form-number" required = "Campo requerido"></td>
                  <td><input type="number" id="Inmovinorte" class="form-number" required = "Campo requerido"> </td>
                  <td><input type="number" id="Pypnorte" class="form-number" required = "Campo requerido"></td>
                  <td><input type="number" id="Bicinorte" class="form-number" required = "Campo requerido"></td>
                  
              </tr>

              <tr>
                  <td>Oriente</td>
                  <td><input type="number" id="Compaoriente" class="form-number" required = "Campo requerido"> </td>
                  <td><input type="number" id="Inmovioriente"class="form-number" required = "Campo requerido"> </td>
                  <td><input type="number" id="Pyporiente" class="form-number" required = "Campo requerido"></td>
                  <td><input type="number" id="Bicioriente" class="form-number"required = "Campo requerido"></td>
                  
              </tr>
              <tr>
                  <td>Sur</td>
                  <td><input type="number" id="Compasur" class="form-number" required = "Campo requerido"> </td>
                  <td><input type="number" id="Inmovisur" class="form-number" required = "Campo requerido"> </td>
                  <td><input type="number" id="Pypsur" class="form-number" required = "Campo requerido"></td>
                  <td><input type="number" id="Bicisur" class="form-number" required = "Campo requerido"></td>
                  
              </tr>
              <tr>
                  <td>Operativo</td>
                  <td><input type="number" id="Compaoperativo" class="form-number" required = "Campo requerido"> </td>
                  <td><input type="number" id="Inmovioperativo" class="form-number" required = "Campo requerido"> </td>
                  <td><input type="number" id="Pypoperativo" class="form-number"required = "Campo requerido"></td>
                  <td><input type="number" id="Bicioperativo" class="form-number" required = "Campo requerido"></td>
                    
              </tr>

              <tr>
                  <td>Disponibles</td>
                  <td><input type="number" id="Compadisponibles" class="form-number" required = "Campo requerido"></td>
                  <td><input type="number" id="Inmovidisponibles" class="form-number" required = "Campo requerido"> </td>
                  <td><input type="number" id="Pypdisponibles" class="form-number" required = "Campo requerido"></td>
                  <td><input type="number" id="Bicidisponibles" class="form-number" required = "Campo requerido"></td>
                  
              </tr>

              <tr>
                  <td>Comisaria</td>
                  <td><input type="number" id="Compacomisaria" class="form-number" required = "Campo requerido"> </td>
                  <td><input type="number" id="Inmovicomisaria" class="form-number" required = "Campo requerido"> </td>
                  <td><input type="number" id="Pypcomisaria" class="form-number" required = "Campo requerido"></td>
                  <td><input type="number" id="Bicicomisaria" class="form-number" required = "Campo requerido"></td>
                  
              </tr>

          <th></th>

          
          <th>

               <button type="submit" id = "form1" value ="Send" class="btn btn-primary">Guardar</button>
          </th>

          <th>
        
          <button type="reset" id = "form1" value ="Reset" class="btn btn-danger">Cancelar</button>
              
              
          </th>

          <th>

              
          </th>

          <th></th>
          
          </th>


          

          </tbody>

          </table>

</section>


<section class="seccion1">


<form action="#" method="POST">
<h5 class="text-center"><strong>REPORTE DE ACCIDENTALIDAD</strong></h5><br>
  
      
  <table id="table2" class="table2">
  <thead class="thead">
      
      <tr>
          <th>Codigo</th>
          <th>Tipo Accidente</th>
          <th>Cantidad</th>
      
                    
      </tr>
  
    </thead>

  <tbody>
    
      <tr>
          <td><br>

          <select class="form-select" id="agentes" required = "Campo requerido">
            <option selected disabled value="">Seleccionar..</option>
            <option>561</option>
            <option>942-910</option>
            <option>910</option>
            <option>901</option>
            <option>901 Clinica</option>
           </select>

          </td>
          <td><br>

          <select class="form-select" id="accidentalidad" required = "Campo requerido">
            <option selected disabled value="">Seleccionar..</option>
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

          </td>
          <td><br><input type="number" id="cantidad" class="form-number" required = "Campo requerido"></td>
                
      </tr>

      <tr>
          <td>

          <select class="form-select" id="agentes" required = "Campo requerido">
            <option selected disabled value="">Seleccionar..</option>
            <option>561</option>
            <option>942-910</option>
            <option>910</option>
            <option>901</option>
            <option>901 Clinica</option>
           </select>

          </td>
          <td>

          <select class="form-select" id="accidentalidad" required = "Campo requerido">
            <option selected disabled value="">Seleccionar..</option>
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
          </td>
          <td>
          
          <input type="number" id="cantidad" class="form-number" required = "Campo requerido"></td>
                  
      </tr>

      <tr>
          <td>

          <select class="form-select" id="agentes" required = "Campo requerido">
            <option selected disabled value="">Seleccionar..</option>
            <option>561</option>
            <option>942-910</option>
            <option>910</option>
            <option>901</option>
            <option>901 Clinica</option>
           </select>   

          </td>

          <td>

          <select class="form-select" id="accidentalidad" required = "Campo requerido">
            <option selected disabled value="">Seleccionar..</option>
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
          </td>
          <td>
          
          <input type="number" id="cantidad" class="form-number" required = "Campo requerido"></td>
                    
      </tr>

      <tr>
          <td>

          <select class="form-select" id="agentes" required = "Campo requerido">
            <option selected disabled value="">Seleccionar..</option>
            <option>561</option>
            <option>942-910</option>
            <option>910</option>
            <option>901</option>
            <option>901 Clinica</option>
           </select>

          </td>
          <td>

          <select class="form-select" id="accidentalidad" required = "Campo requerido">
            <option selected disabled value="">Seleccionar..</option>
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
          </td>
          <td><input type="number" id="cantidad"class="form-number" required = "Campo requerido"> </td>
                  
      </tr>
      <tr>
          <td>

          <select class="form-select" id="agentes" required = "Campo requerido">
            <option selected disabled value="">Seleccionar..</option>
            <option>561</option>
            <option>942-910</option>
            <option>910</option>
            <option>901</option>
            <option>901 Clinica</option>
           </select>

          </td>
          <td>

          <select class="form-select" id="accidentalidad" required = "Campo requerido">
            <option selected disabled value="">Seleccionar..</option>
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
          </td>
          <td><input type="number" id="cantidad" class="form-number" required = "Campo requerido"> </td>
          
          
      </tr>
      
       <tr>
          <td>

          <select class="form-select" id="agentes" required = "Campo requerido">
            <option selected disabled value="">Seleccionar..</option>
            <option>561</option>
            <option>942-910</option>
            <option>910</option>
            <option>901</option>
            <option>901 Clinica</option>
           </select>
          </td>

          <td>

          <select class="form-select" id="accidentalidad" required = "Campo requerido">
            <option selected disabled value="">Seleccionar..</option>
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
          </td>
          <td><input type="number" id="cantidad" class="form-number" required = "Campo requerido"> </td>

                   
      </tr>

      <tr>

  <td>

          <select class="form-select" id="agentes" required = "Campo requerido">
            <option selected disabled value="">Seleccionar..</option>
            <option>561</option>
            <option>942-910</option>
            <option>910</option>
            <option>901</option>
            <option>901 Clinica</option>
           </select>

          </td>
          <td>

          <select class="form-select" id="accidentalidad" required = "Campo requerido">
            <option selected disabled value="">Seleccionar..</option>
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
          </td>
          <td><input type="number" id="cantidad" class="form-number" required = "Campo requerido"> </td>
          
    </tr>  

    <tr>

<td>

        <select class="form-select" id="agentes" required = "Campo requerido">
          <option selected disabled value="">Seleccionar..</option>
          <option>561</option>
          <option>942-910</option>
          <option>910</option>
          <option>901</option>
          <option>901 Clinica</option>
         </select>

        </td>
        <td>

        <select class="form-select" id="accidentalidad" required = "Campo requerido"">
          <option selected disabled value="">Seleccionar..</option>
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
        </td>
        <td><input type="number" id="cantidad" class="form-number" required = "Campo requerido"> </td>
        
  </tr>  

  <tr>

<td>

        <select class="form-select" id="agentes" required = "Campo requerido">
          <option selected disabled value="">Seleccionar..</option>
          <option>561</option>
          <option>942-910</option>
          <option>910</option>
          <option>901</option>
          <option>901 Clinica</option>
         </select>

        </td>
        <td>

        <select class="form-select" id="accidentalidad" required = "Campo requerido">
          <option selected disabled value="">Seleccionar..</option>
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
        </td>
        <td><input type="number" id="cantidad" class="form-number" required = "Campo requerido"> </td>
        
  </tr>  

   
  <th><br><br>

        <button type="submit" name = "button3" class="btn btn-primary">Guardar</button>
  
   
  </th>

  <th><br><br>

       <button type="reset" name = "button4" class="btn btn-danger">Cancelar</button>  

  </th>

 
  

  </tbody>

  </table>

</section>    


  </div>

  

</div>  

<div class="container-seccion2">

            <section class="seccion2"><br>

            <form action="#" method="POST">  
                      <h5 class="title"><strong>PRUEBAS DE ALCOHOLEMIA POR:</strong></h5><br>
                          
                      <table id="table3" class="table3 table-small">
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
                              <td>Positivas</td>
                              <td><br><input type="number" id="positivast" class="form-number" required = "Campo requerido"></td>
                              
                            
                          </tr>

                          <tr>
                              <td>Negativas</td>
                              <td><input type="number" id="negativast" class="form-number" required = "Campo requerido"> </td>
                              
                              
                          </tr>

                          
                                           
                      <th><br>

                          <button type="submit" name = "button5" class="btn btn-primary">Guardar</button>
                      </th>

                      <th><br>
                    
                      <button type="reset" name = "button6" class="btn btn-danger">Cancelar</button>
                          
                          
                      </th>

                      <th>

                          
                      </th>

                      <th></th>
                      
                      </th>


                      

                      </tbody>

                      </table>

            </section> 


      <section class="seccion3"><br>

      
            <form action="#" method="POST">  
                      <h5 class="title"><strong>PRUEBAS DE ALCOHOLEMIA POR:</strong></h5><br>
                          
                      <table id="table4" class="table4 table-small">
                      <thead class="thead">
                          
                          <tr>
                              <th>Operativo Accidente</th>
                              <th>Cantidad</th>
                              <th></th>
                              <th></th>
                              
                          </tr>
                      
                        </thead>

                      <tbody>
                          <tr>
                              <td>Positivas</td>
                              <td><br><input type="number" id="positivasa" class="form-number" required = "Campo requerido"></td>
                              
                            
                          </tr>

                          <tr>
                              <td>Negativas</td>
                              <td><input type="number" id="negativasa" class="form-number" required = "Campo requerido"> </td>
                              
                              
                          </tr>

                          
                                          
                      <th><br>

                          <button type="submit" name = "button5" class="btn btn-primary">Guardar</button>
                      </th>

                      <th><br>
                    
                      <button type="reset" name = "button6" class="btn btn-danger">Cancelar</button>
                          
                          
                      </th>

                      <th>

                          
                      </th>

                      <th></th>
                      
                      </th>


                      

                      </tbody>

                      </table>

            

      </section>      


    </div>

    <div class="container-seccion3">

            <section class="seccion5"><br>

            <form action="#" method="POST">  
                      <h5 class="title"><strong>INCIDENCIAS PRESENTADAS</strong></h5><br>
                          
                      <table id="table5" class="table5 table-sm">
                      <thead class="thead">
                          
                          <tr>
                            
                              <th>Placa Agente</th>
                              <th>Tipo de Control</th>
                              <th>Novedad Presentada</th>
                              
                              <th></th>
                              
                          </tr>
                      
                        </thead>

                      <tbody>
                          <tr>
                              <td><br>

                              <select class="form-select" id="agentes" required="required">
                                <option selected disabled value="">Seleccionar..</option>
                                <option>376</option>
                                <option>361</option>
                                <option>562</option>
                                <option>321</option>
                                <option>604</option>
                                <option>588</option>
                                <option>622</option>
                                <option>652</option>
                                <option>299</option>
                                <option>230</option>
                                <option>368</option>
                                <option>105</option>
                                <option>358</option>
                                <option>617</option>
                                <option>367</option>
                            
                            </select>

                              </td>
                              <td><br>

                              <select class="form-select" id="tipo" required="required">
                              <option selected disabled value="">Seleccionar..</option>
                              <option>Regulación</option>
     
        
                              </select>
                            
                            </td>

                            <td><br>

                            <textarea class = "textarea" name="" id="incidencia" cols="30" rows="8"></textarea>

                            
                            </td>
                              
                            
                          </tr>

                          <tr>
                              <td><br>

                          <select class="form-select" id="agentes" required="required">
                          <option selected disabled value="">Seleccionar..</option>
                          <option>376</option>
                          <option>361</option>
                          <option>562</option>
                          <option>321</option>
                          <option>604</option>
                          <option>588</option>
                          <option>622</option>
                          <option>652</option>
                          <option>299</option>
                          <option>230</option>
                          <option>368</option>
                          <option>105</option>
                          <option>358</option>
                          <option>617</option>
                          <option>367</option>

                          </select>




                              </td>
                              <td><br>
                            
                              <select class="form-select" id="tipo" required="required">
                              <option selected disabled value="">Seleccionar..</option>
                              <option>Regulación</option>
     
        
                              </select>
                            
                            </td>

                            <td><br>

                            <textarea class = "textarea" name="" id="incidencias" cols="30" rows="8"></textarea>

                            
                            </td>
                              
                              
                          </tr>
                            
                          <tr>
                              <td><br>

                          <select class="form-select" id="agentes" required="required">
                          <option selected disabled value="">Seleccionar..</option>
                          <option>376</option>
                          <option>361</option>
                          <option>562</option>
                          <option>321</option>
                          <option>604</option>
                          <option>588</option>
                          <option>622</option>
                          <option>652</option>
                          <option>299</option>
                          <option>230</option>
                          <option>368</option>
                          <option>105</option>
                          <option>358</option>
                          <option>617</option>
                          <option>367</option>

                          </select>




                              </td>
                              <td><br>
                            
                              <select class="form-select" id="tipo" required="required">
                              <option selected disabled value="">Seleccionar..</option>
                              <option>Regulación</option>
     
        
                              </select>
                            
                            </td>

                            <td><br>

                            <textarea class = "textarea" name="" id="incidencias" cols="30" rows="8"></textarea>

                            
                            </td>                      
                              
                          </tr>

                                                  
                                           
                      <th><br>

                          <button type="submit" name = "button5" class="btn btn-primary">Guardar</button>
                      </th>

                      <th><br>
                    
                      <button type="reset" name = "button6" class="btn btn-danger">Cancelar</button>
                          
                          
                      </th>

                      <th>

                          
                      </th>

                      <th></th>
                      
                      </th>


                      

                      </tbody>

                      </table>

            </section> 

    </div>
    
    @stop



@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Bienvenidos!'); </script>

@stop



