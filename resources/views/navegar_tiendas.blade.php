@extends('layouts.plantilla')

@section('cabecera')

@include('layouts.cabeceraGeneral')
@stop

@section('lateral')
@include('layouts.barra_lateral')
@stop

@section('cuerpo_lateral')


<div class="container "  >

    <div class="card-group">
        @foreach($tiendas as $tienda)

        <div class="card" style="border: green solid medium; margin:1%;" >
            <a href='{{route("tienda.show",$tienda )}}'>  <img src="{{ asset('images/'.$tienda->image) }}" class="card-img-top" alt="..."></a>
            <div class="card-body">
                <h5 class="card-title">{{$tienda->nombre_tienda}}</h5>
                <p class="card-text">{{$tienda->comentarios}}</p>
            </div>

            <div class="card-body">
                <a href='{{route("tienda.show",$tienda )}}' class="card-link">Visitanos</a>

            </div>


        </div>   
        @endforeach
    </div>
</div>

@endsection
@section('pie')
@section('layouts.pieGeneral')
@estop






















@stop

@section("pie")
@include('layouts.pieGeneral')
@stop 