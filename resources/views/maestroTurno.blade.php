@extends('adminlte::page')

@section('title','Dashboard')

@section('content_header')

<!-- Styles -->

<link rel="stylesheet" href="{{ asset('css/home.css') }}">
@stop


@section('content')

<?php
  session_start();
  if($_SESSION['mensaje'] == 2){
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
            title: 'Turno iniciado correctamente!'
          })
        </script>";

        $_SESSION['mensaje'] = 0;
        
    } else if($_SESSION['mensaje'] == 3){
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
          title: 'Turno pausado correctamente!'
        })
      </script>";

      $_SESSION['mensaje'] = 0;
      
  } else if($_SESSION['mensaje'] == 4){
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
        icon: 'info',
        title: 'Turno reanudado correctamente!'
      })
    </script>";

    $_SESSION['mensaje'] = 0;
    
} else if($_SESSION['mensaje'] == 5){
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
      title: 'Turno finalizado correctamente!'
    })
  </script>";

  $_SESSION['mensaje'] = 0;
  
} else if($_SESSION['mensaje'] == 6){
  echo "<script>
  const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 5000,
      timerProgressBar: true,
      didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
      }
    })
    
    Toast.fire({
      icon: 'warning',
      title: 'No se puede iniciar el turno, ya que se encuentra uno activo!'
    })
  </script>";

  $_SESSION['mensaje'] = 0;
  
} else if($_SESSION['mensaje'] == 7){
  echo "<script>
  const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 5000,
      timerProgressBar: true,
      didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
      }
    })
    
    Toast.fire({
      icon: 'warning',
      title: 'Debe seleccionar alguno de los turnos de la lista desplegable!'
    })
  </script>";

  $_SESSION['mensaje'] = 0;
  
} else if($_SESSION['mensaje'] == 1){
        
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

} else {

    }
?>

<div class="container-maestroturno">

<div class="card6" style="width: 16rem;">

<h6 class="card-header p-1">Seleccionar turno</h6>
 
  <div class="card-body6" style="display:grid;">

      <form method="POST" action="{{ url('validacion_turno') }}">
        @csrf

        <br>
          <div class="row1 mb-4">
            <label for="turno" class="col-md-4 col-form-label" style="font-size:large;"><strong>{{ __('Turnos') }}</strong></label><br><br>

            <select name="turno" style="width:68%;height:2rem;text-align:center;" id="turno" >
              <option selected value="0">Seleccione un turno</option>
              <option value="4">Primer Turno</option>
              <option value="5">Segundo Turno</option>
              <option value="6">Tercer Turno</option>
              
            </select>
          </div><br>

          <div class="row mb-4">
            <div class="col-md-6 offset-md-4">
              <button type="submit" class="btn btn-primary" id="iniciar">
                {{ __('Iniciar') }}
              </button>
            </div><br>
          </div>
  
  </form>

  </div>   
 </div>  

 <div class="col-md-8">
        <br>
            <div class="card6-2">
                <div class="card-header-mt p-1">{{ __('Turno actualmente activo') }}</div>

                <div class="card-body6">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
        @csrf
                    <table class="table-turno1 table-hover p-1">

                     
                        <tr>
                            <td><strong>Nro Registro</strong></td>
                            <td><strong>Turno</strong></td>
                            <td><strong>Inició</strong></td>
                            <td><strong>Estado</strong></td>
                            <td colspan='2' style='text-align: center;'><strong>Acciones</strong></td>
                            <td><strong>Fecha Registro</strong></td>
                        </tr>

                        @foreach($result as $d)

                        <tr>
                            <td>{{ $d['nro_registro'] }}</td>
                            <td>{{ $d['descripcion_turno'] }}</td>
                            <td>{{ $d['nombres_usuario'].' '.$d['apellidos_usuario'] }}</td>
                           
                            @if($d['id_estado'] == 1)         
                              <td class="bg-success"> Activo</td> 
                              <td>
                            <a href="{{ url('pausar_turno/'.$d['nro_registro'].'') }}"
                                class="btn btn-edit btn-primary bg-danger" title="Pausar">
                                    <span class="fa fa-pause"></span>
                                </a>
                            </td>       
                            @else
                              <td class="bg-warning">Pausado</td> 
                              <td>
                            <a href="{{ url('reanudar_turno/'.$d['nro_registro'].'') }}"
                            class="btn btn-edit btn-primary bg-green" title="Pausar">
                                    <span class="fa fa-play"></span>
                                </a>
                            </td>    
                            @endif

                            <td>
                            <form class="delete_form" action="{{ url('finalizar_turno/'.$d['nro_registro'].'') }}">
                                <button name='finalizar' class="btn btn-edit btn-primary" title = "Finalizar">
                                    <span class="fa fa-check"></span>
                                </button><br>
                            </form>
                            </td>
                            <td>{{ $d['fecha_registro'] }}</td>
                        </tr>
                        @endforeach
                    </table>
                    </div>
              </div>
            </div>
        </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
  $(document).ready(function(){
      $('.delete_form').on('submit', function(){
         if(confirm("¿Está seguro que desea finalizar este turno?"))
         {
             return true;
         }
         else
         {
             return false;
         }
      });
  });
</script>
@stop




