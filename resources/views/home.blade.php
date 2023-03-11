@extends('adminlte::page')

@section('title','Dashboard')

@section('content_header')

<!-- Styles -->

<link rel="stylesheet" href="{{ asset('css/home.css') }}">

@stop


@section('content')

<div class="container-home">

<h3><strong>ESTADÍSTICA CENTRO DE GESTIÓN DEL TRÁNSITO</strong></h3>
<br>
<h5><strong>TURNO ACTIVO:
    <?php 
    
    session_start();
    if (!isset($_SESSION['turno_activo'])) {
        echo "Ningún turno activo";
    } else {
        echo $_SESSION['turno_activo'];
    }
    
    ?></strong></h5>
                                    

</div>


<div class="container-seccion">

  <section class="seccion">

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
    </section>

    <section class="seccion1">

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
      
      


    </div>

      

   

         <div class="container-seccion2">

            

    </div><br>  

    <div class="container-seccion3">

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

    </div>
    
</div> 

@stop



@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop



