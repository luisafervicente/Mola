@extends('layouts.plantilla')

@section('cabecera')

@include('layouts.cabeceraGeneral')
@stop

@section('lateral')
@include('layouts.barra_lateral')
@stop

@section('cuerpo_lateral')

 
    <div class="container "  >
    
    <div class="row" >
        @foreach($tiendas as $tienda)
        <div class=" col-lg-10 ">   
             <div class="row" style="display:flex;" >
<div class="card col-lg-3 col-md-3 col-sm-6 col-10 margentotal "  >
    <a href='{{route("tienda.show",$tienda )}}'>  <img src="{{ asset('images/'.$tienda->image) }}" class="card-img-top" alt="..."></a>
  <div class="card-body">
    <h5 class="card-title">{{$tienda->nombre_tienda}}</h5>
    <p class="card-text">{{$tienda->comentarios}}</p>
  </div>
   
  <div class="card-body">
    <a href='{{route("tienda.show",$tienda )}}' class="card-link">Visitanos</a>
     
  </div>
    
    
</div>
             </div>
        </div>
    
    
    
    
    @endforeach
</div>
 
 
               
@endsection
@section('pie')
@section('layouts.pieGeneral')
@estop






















 @stop

    @section("pie")
    @include('layouts.pieGeneral')
    @stop 