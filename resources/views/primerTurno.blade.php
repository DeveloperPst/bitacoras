@extends('adminlte::page')


@section('title','Dashboard')


@section('content_header')

<!-- Styles -->
<link rel="stylesheet" href="{{ asset('css/home.css') }}">


@stop


@section('content')

<div class="container2">
<h3><strong>Informe Primer Turno</strong></h3>
    <br>
       <table class="table table table-striped table-hover">

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
            <td>""</td>
            <td>""</td>
            <td>""</td>
            <td>""</td>
            </tr>
            <tr>
            <th scope="row">Oeste</th>
            <td>""</td>
            <td>""</td>
            <td>""</td>
            <td>""</td>
            </tr>
            <tr>
            <th scope="row">Norte</th>
            <td>""</td>
            <td>""</td>
            <td>""</td>
            <td>""</td>
            </tr>

            <tr>
            <th scope="row">Oriente</th>
            <td>""</td>
            <td>""</td>
            <td>""</td>
            <td>""</td>
            </tr>

            <tr>
            <th scope="row">Sur</th>
            <td>""</td>
            <td>""</td>
            <td>""</td>
            <td>""</td>
            </tr>

            <tr>
            <th scope="row">Operativo</th>
            <td>""</td>
            <td>""</td>
            <td>""</td>
            <td>""</td>
            </tr>

            <tr>
            <th scope="row">Disponibles</th>
            <td>""</td>
            <td>""</td>
            <td>""</td>
            <td>""</td>
            </tr>

            <tr>
            <th scope="row">Comisaria</th>
            <td>""</td>
            <td>""</td>
            <td>""</td>
            <td>""</td>
            </tr>

            </tbody>
        </table>

        <br>
        <br>

            </div>
    </div>      

</div>



@stop