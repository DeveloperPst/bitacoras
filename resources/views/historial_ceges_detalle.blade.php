@extends('adminlte::page')

@section('title','Historial')

@section('content_header')

<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

<!-- Styles -->
<link rel="stylesheet" href="{{ asset('css/home.css') }}">
@stop


@section('content')
<div class="card6" style="width: 18rem;">
 
  <div class="card-body6">

      <form method="POST" action="">
        @csrf

        @foreach($result as $r)
         
            {{ $r['id_maestropdf'] }}
          
        @endforeach
  </form>

  </div>   
 </div> 
@stop



@section('css')
<link rel="stylesheet" href="{{ asset('css/home.css') }}">
@stop

 


