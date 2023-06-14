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
    height: auto;
    margin-left: 6%;
 
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
    height: auto;
    background-color:#fff;
    font-family: Arial, Helvetica, sans-serif;
    box-shadow: 0 1em 1em -.5em rgba(0,0,0,.5);
    margin-bottom: 5%;
    }

    .form-text{

     
    background-color:#fff;
    font-family: Arial, Helvetica, sans-serif;
    

    }

    .card-title{
   
     background-color: dimgray;
     color:#fff;
     width: 56rem; 
     margin-left: 7%; 
     margin-top: 3;
     text-align: center;
     padding: 1%;

    }

    .content-wrapper{

    background-color: #e8effc;
    width: 100%;
   height:auto; 
    

    }

    .content{

    background-color: #e8effc;
    width: 100%;
    height:auto; 
   
    }


    
    </style>

<?php
  session_start();
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
            icon: 'warning',
            title: 'El informe Ceges para el Nro. Ipat, ya se encuentra registrado, Por favor verificar!'
          })
        </script>";

        $_SESSION['mensaje'] = 0;
       
    } else {
    }

   ?>
 
   
 
      <h6 class="card-title">Registrar Informe CEGES</h6>            
      <div class="container-reportes"> 

      
      
                <form method="post" action="{{URL::to('/pdf')}}" enctype="multipart/form-data" class="form-control"><br><br> 
               
                     
                    
                    @csrf

                    <div class="seccion-form">

                    <label for="subsecretario" class="col-sm-3 col-form-text"style="width:8rem;">Subsecretario de SDM: </label>
                          <input type="text" name="subsecretario" style="width:12rem;" value="ALFREDO CANDELO CORTES">
                    

                    <label for="aginforme" class="col-sm-3 col-form-label" style="margin-left:5%;">Informe realizado por: </label>
                          <input type="text" name="aginforme" style="width:12rem;margin-left:1%;">

                    </div><br>

                    
                      <div class="seccion-form">
                        
                      
                          <label for="asunto" class="col-sm-1 col-form-label">  Asunto: </label>
                          <input type="text" name="asunto"> 

                          <label for="lugar" class="col-sm-1 col-form-label" style="margin-left: 7%;"> Lugar: </label>
                          <input type="text" name="lugar">  

                          <label for="comuna" class="col-sm-1 col-form-label" style="margin-left: 7%;">  Comuna: </label>
                          <input type="number" name="comuna"  class="form-number" style="margin-left: 1%;">  


                    </div><br>

                    <div class="seccion-form">
                                
                        
                          <label for="fecha" class="col-sm-1 col-form-label">Fecha: </label>
                          <input type="date" name="fecha"></label>
                        
                          
                          <label for="horario" class="col-sm-1 col-form-label"style="margin-left: 11%;">Horario: </label>
                          <input type="time" name="horario" style="margin-left: 1%;">
                        
                    </div><hr> 

                      <div class="seccion-form">
                      
                    <label for="conductor1" class="col-sm-3 col-form-label">Conductor Vehículo No.1:</label>
                          <input type="text" name="conductor1" style="width:15%;">
                          
                                              
                          <label for="cedula1" class="col-sm-2 col-form-label" style="margin-left: 2%;"> Cedula Ciudadanía:	</label>
                          <input type="text" name="cedula1" style="margin-left: 2%;width:15%;">

                          <label for="lesionado" class="col-sm-1 col-form-label" style="margin-left: 2%;">Lesionado(a):</label>
                          <input type="text" name="lesionado" style="margin-left: 5%; width: 10%;">

                                                
                      </div><br> 

                      <div class="seccion-form">

                                                            
                          <label for="clinica" class="col-sm-0 col-form-label" style="width: 10%;margin-left: 1%;">Clínica: </label>
                          <input type="text" name="clinica">   

                          <label for="edad" class="col-sm-0 col-form-label" style="margin-left: 8%;">Edad:</label>
                          <input type="number" name="edad" class="form-number" style="margin-left: 2%;width: 10%;"> 

                          <label for="licencia1" class="col-sm-0 col-form-label" style="margin-left: 10%;width:18%;" >Licencia conducción:</label>
                          <input type="text" name="licencia1" style="width: 18%;">
                      
                      
                      </div><br>  
                                
                        
                      <div class="seccion-form">

                         
                          <label for="to" class="col-sm-1 col-form-label">T.O:</label>
                          <input type="number" name="to" style="width: 10%;">

                          <label for="placav1" class="col-sm-0 col-form-label" style="margin-left: 7%;">Placa Vehículo No.1 :</label>
                          <input type="text" name="placav1" style="margin-left: 5%;width: 18%;"> 

                          <label for="tipo" class="col-sm-1 col-form-label" style="margin-left: 6%;">Tipo: </label>
                          <input type="text" name="tipo" style="margin-left: 1%;">
                                               
                        
                      </div><br>  

                     
                              
                      <div class="seccion-form">

                        <label for="soat" class="col-sm-1 col-form-label">SOAT: </label>
                        <input type="text" name="soat" style="width: 10%;">

                        <label for="rtm" class="col-sm-1 col-form-label" style="margin-left: 5%;">RTM: </label>
                        <input type="text" name="rtm" style="width: 10%;">

                            
                      </div><hr>  

                      
                      <div class="seccion-form">

                        <label for="conductor2" class="col-sm-3 col-form-label">Conductor Vehículo No. 2: </label>
                        <input type="text" name="conductor2" style="width: 18%;"> 
                          
                          
                        <label for="cedula2" class="col-sm-2 col-form-label" style="margin-left: 2%;">Cedula Ciudadanía:	</label>
                        <input type="text" name="cedula2" style="width: 18%;">

                        <label for="lesionado2" class="col-sm-0 col-form-label" style="margin-left: 5%;" >Lesionado(a): </label>
                        <input type="text" name="lesionado2" style="margin-left: 2%; width: 10%;">


                      </div><br>  

                      <div class="seccion-form">

                        

                        <label for="clinica2" class="col-sm-1 col-form-label">Clínica: </label>
                        <input type="text" name="clinica2" style="width: 15%;"> 
                                
                        <label for="edad2" class="col-sm-1 col-form-label" style="margin-left: 10%;">Edad:</label>
                        <input type="number" name="edad2" class="form-number">

                        <label for="licencia2" class="col-sm-0 col-form-label" style="margin-left: 7%;">Licencia conducción: </label>
                        <input type="text" name="licencia2" style="margin-left: 3%;">

                                
                      </div><br> 
                                
                      <div class="seccion-form">
                                 

                        <label for="to2" class="col-sm-1 col-form-label">T.O: </label>
                        <input type="text" name="to2" style="width: 12%;">

                        <label for="placav2" class="col-sm-0 col-form-label" style="margin-left: 5%;width: 20%;">Placa Vehículo No. 2:</label>
                        <input type="text" name="placav2"> <br><br>
                                  
                        <label for="tipo2" class="col-sm-1 col-form-label" style="margin-left: 7%;">Tipo: </label>
                        <input type="text" name="tipo2"> 



                      </div><br>  

                      
                      <div class="seccion-form">
                      
                        <label for="soat2" class="col-sm-1 col-form-label">SOAT: </label>
                        <input type="text" name="soat2" style="width:10%;">
                        
                        <label for="rtm2" class="col-sm-1 col-form-label" style="margin-left: 5%;">RTM: </label>
                        <input type="text" name="rtm2" style="width:10%;">
                                      
                      </div><hr>

                      <div class="seccion-form">
                    
                        <label for="lesionado3" class="col-sm-1 col-form-label">Lesionado(a)</label>
                      
                        <label for="nombre" class="col-sm-1 col-form-label" style="margin-left: 15%;">Nombre: </label>
                        <input type="text" name="nombre" style="width:30%;margin-left: 3%;"> 
                        
                        <label for="condicion" class="col-sm-1 col-form-label" style="margin-left: 8%;">Condición: </label>
                        <input type="text" name="condicion"  style="margin-left: 2%;">
                                                
                      </div><br>

                      <div class="seccion-form">
                                      
                        <label for="clinica3" class="col-sm-1 col-form-label">Clínica: </label>
                        <input type="text" name="clinica3">

                        <label for="prueba1" class="col-sm-4 col-form-label" style="margin-left: 6%;">Prueba indirecta de alcoholemia No. 1: </label>
                        <input type="float" name="prueba1" class="form-number">

                      </div><br>

                      <div class="seccion-form">

                        <label for="operador" class="col-sm-3 col-form-label">Operador del Alcoholímetro: </label>
                        <input type="text" name="operador">

                        <label for="placa3" class="col-sm-1 col-form-label" style="margin-left: 14%;">Placa: </label>
                        <input type="number" name="placa3" class="form-number">
                    
                      </div><br>

                    <div class="seccion-form">

                        <label for="resultado1" style="margin-left:1%;">Resultado Prueba Conductor veh No.1: </label>
                        <input type="float" name="resultado1" class="form-number"  style="margin-left:2%;">

                        <label for="comparendo1"style="margin-left:5%;">Orden Comparendo: </label>
                        <input type="text" name="comparendo1"style="width:25%;margin-left:2%;" class="form-number">

                      </div><br>    
                              
                    
                    <div class="seccion-form"> 
                    
                          <label for="resultado2" style="margin-left:1%;">Resultado Prueba Conductor veh No.2: </label>
                          <input type="float" name="resultado2" class="form-number" style="margin-left:2%;"> 

                          
                          <label for="comparendo2" style="margin-left:5%;">Orden Comparendo:</label>
                          <input type="text" name="comparendo2" style="width:25%;margin-left:2%;" class="form-number">

                    </div><br>

                    <div class="seccion-form">


                    </div><hr>

                                
                    <div class="seccion-form">

                          <label for="agentes" class="col-sm-3 col-form-label">Agente que conoce del hecho:</label>
                          <input type="text" name="agentes" class="form-number" style="width:18%;"> 

                          <label for="incidente" class="col-sm-1 col-form-label"style="margin-left: 6%;width: 3%;">Incidente:</label>
                          <input type="text" name="incidente" class="form-number" style="margin-left: 2%;" >

                          <label for="ipat" class="col-sm-0 col-form-label"style="margin-left: 6%;width: 8%;">Ipat Nro.</label>
                          <input type="text" name="ipat"  class="form-number"style="margin-left: 2%;"required> 

                          @if (isset($error))
                          <div class="alert alert-danger">
                              {{ $error }}
                          </div>
                          @endif

                    </div><br>


                    <div class="seccion-form">
                          
                       

                          <label for="spoa" class="col-sm-0 col-form-label" style="margin-left: 1%;width: 10%;">SPOA Nro.</label> 
                          <input type="text" name="spoa" class="form-number" style="width: 10%;" >    
                        
                                               
                          
                    </div><hr><br>

                            
                    <div class="seccion-form" id="multi-selector-uniq">    

                          <label for="imagenes" class="col-sm-1 col-form-label">Imágenes: </label>
                          <input type="file" multiple= 'true' id= "archivo" onclick="miAlerta()" accept=".png,.jpg,.jpeg" name="archivo[]"  value="{{ old('archivo') }}" style="margin-left: 4%;color:red;" required> 
                          <ul id="preview"></ul>

                          <script>
                            let filesList = [];
                          const classDragOver = "drag-over";
                          const fileInputMulti = document.querySelector("#multi-selector-uniq #archivo");
                          // DEMO Preview
                          const multiSelectorUniqPreview = document.querySelector("#multi-selector-uniq #preview");

                          /*
                          * Functions
                          */

                          /**
                           * Returns the index of an Array of Files from its name. If there are multiple files with the same name, the last one will be returned.
                           * @param {string} name - Name file.
                           * @param {Array<File>} list - List of files.
                           * @return number
                           */
                          function getIndexOfFileList(name, list) {
                              return list.reduce(
                                  (position, file, index) => (file.name === name ? index : position),
                                  -1
                              );
                          }

                          /**
                           * Returns a File in text.
                           * @param {File} file
                           * @return {Promise<string>}
                           */
                          async function encodeFileToText(file) {
                              return file.text().then((text) => {
                                  return text;
                              });
                          }

                          /**
                           * Returns an Array from the union of 2 Arrays of Files avoiding repetitions.
                           * @param {Array<File>} newFiles
                           * @param {Array<File>} currentListFiles
                           * @return Promise<File[]>
                           */
                          async function getUniqFiles(newFiles, currentListFiles) {
                              return new Promise((resolve) => {
                                  Promise.all(newFiles.map((inputFile) => encodeFileToText(inputFile))).then(
                                      (inputFilesText) => {
                                          // Check all the files to save
                                          Promise.all(
                                              currentListFiles.map((savedFile) => encodeFileToText(savedFile))
                                          ).then((savedFilesText) => {
                                              let newFileList = currentListFiles;
                                              inputFilesText.forEach((inputFileText, index) => {
                                                  if (!savedFilesText.includes(inputFileText)) {
                                                      newFileList = newFileList.concat(newFiles[index]);
                                                  }
                                              });
                                              resolve(newFileList);
                                          });
                                      }
                                  );
                              });
                          }

                          /**
                           * Only DEMO. Render preview.
                           * @param currentFileList
                           * @Only .EMO> param target.
                           * @
                           */
                          function renderPreviews(currentFileList, target, inputFile) {
                              //
                              target.textContent = "";
                              currentFileList.forEach((file, index) => {
                                  const myLi = document.createElement("li");
                                  myLi.textContent = file.name;
                                  myLi.setAttribute("draggable", 'true');
                                  myLi.dataset.key = file.name;
                                  myLi.addEventListener("drop", eventDrop);
                                  myLi.addEventListener("dragover", eventDragOver);
                                  const myButtonRemove = document.createElement("button");
                                  myButtonRemove.textContent = " x ";
                                  myButtonRemove.addEventListener("click", () => {
                                      filesList = deleteArrayElementByIndex(currentFileList, index);
                                      inputFile.files = arrayFilesToFileList(filesList);
                                      return renderPreviews(filesList, multiSelectorUniqPreview, inputFile);
                                  });
                                  myLi.appendChild(myButtonRemove);
                                  target.appendChild(myLi);
                              });
                          }

                          /**
                           * Returns a copy of the array by removing one position by index.
                           * @param {Array<any>} list
                           * @param {number} index
                           * @return {Array<any>} list
                           */
                          function deleteArrayElementByIndex(list, index) {
                              return list.filter((item, itemIndex) => itemIndex !== index);
                          }

                          /**
                           * Returns a FileLists from an array containing Files.
                           * @param {Array<File>} filesList
                           * @return {FileList}
                           */
                          function arrayFilesToFileList(filesList) {
                              return filesList.reduce(function (dataTransfer, file) {
                                  dataTransfer.items.add(file);
                                  return dataTransfer;
                              }, new DataTransfer()).files;
                          }


                          /**
                           * Returns a copy of the Array by swapping 2 indices.
                           * @param {number} firstIndex
                           * @param {number} secondIndex
                           * @param {Array<any>} list
                           */
                          function arraySwapIndex(firstIndex, secondIndex, list) {
                              const tempList = list.slice();
                              const tmpFirstPos = tempList[firstIndex];
                              tempList[firstIndex] = tempList[secondIndex];
                              tempList[secondIndex] = tmpFirstPos;
                              return tempList;
                          }

                          /*
                          * Events
                          */

                          // Input file
                          fileInputMulti.addEventListener("input", async () => {
                              // Get files list from <input>
                              const newFilesList = Array.from(fileInputMulti.files);
                              // Update list files
                              filesList = await getUniqFiles(newFilesList, filesList);
                              // Only DEMO. Redraw
                              renderPreviews(filesList, multiSelectorUniqPreview, fileInputMulti);
                              // Set data to input
                              fileInputMulti.files = arrayFilesToFileList(filesList);
                          });

                          // Drag and drop

                          // Drag Start - Moving element.
                          let myDragElement = undefined;
                          document.addEventListener("dragstart", (event) => {
                              // Saves which element is moving.
                              myDragElement = event.target;
                          });

                          // Drag over - Element that is below the element that is moving.
                          function eventDragOver(event) {
                              // Remove from all elements the class that will show that it is a drop zone.
                              event.preventDefault();
                              multiSelectorUniqPreview
                                  .querySelectorAll("li")
                                  .forEach((item) => item.classList.remove(classDragOver));

                              // On the element above it, the class is added to show that it is a drop zone.
                              event.target.classList.add(classDragOver);
                          }

                          // Drop - Element on which it is dropped.
                          function eventDrop(event) {
                              // The element that is underneath the element that is moving when it is released is captured.
                              const myDropElement = event.target;
                              // The positions of the elements in the array are swapped. The dataset key is used as an index.
                              filesList = arraySwapIndex(
                                  getIndexOfFileList(myDragElement.dataset.key, filesList),
                                  getIndexOfFileList(myDropElement.dataset.key, filesList),
                                  filesList
                              );
                              // The content of the input file is updated.
                              fileInputMulti.files = arrayFilesToFileList(filesList);
                              // Only DEMO. Changes are redrawn.
                              renderPreviews(filesList, multiSelectorUniqPreview, fileInputMulti);
                          }


                          </script>

                         <script>
                             function miAlerta(evento) {
                             alert("¡ Asegurese de seleccionar una imagen con extensión .png| .jpg| .jpeg !");
                             }
                        </script>
                   
                    </div><br><br>

            
                    <div class="seccion-form"> 

                          <label for="relato" class="col-sm-3 col-form-label">Relato de los hechos: </label>
                          <textarea name="relato" cols="80" rows="7"></textarea>        

                    </div><br><br>


                  
              
                <button type="submit" class="btn btn-primary" style="margin-left:24rem;">Generar PDF</button>

                              

                   

              </form>
                  
                  <script>
                  document.querySelector('form').addEventListener('submit', function (event) {
                  event.preventDefault(); // prevenir envío normal del formulario
                  window.open('', 'nueva-ventana'); // abrir nueva ventana
                  this.target = 'nueva-ventana'; // establecer el destino del formulario en la nueva ventana
                  this.submit(); // enviar el formulario
                 });
                </script>

                              
        </div>  

     </div>      
  
  </html>
 
 @stop 


 


 

 
