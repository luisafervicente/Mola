@extends('layouts.plantilla')
 
@if(Auth::user()->rol=='vendedor')
@section('cabecera')
@include('layouts.cabeceraGeneral')
@stop
@section('lateral')
@include('layouts.barra_lateral')
@stop
@section('cuerpo_lateral')
@include('layouts.cuerpo_vendedor')
@stop
@section('pie')
@include('layouts.pieGeneral')
@stop

@else
@section('cabecera')
@include('layouts.barra_administrador')
@stop  
@section('cuerpo')


<div class="container margenes" style=" display: flex; justify-content:center; flex-wrap: wrap; " >


    <img  src="{{asset('images/logoletras.jpg') }}"  alt="logoMola" class="img-fluid"/> 


</div>
<div  class="container " style=" width: 75%;">
    <div class="alert alert-success" role="alert">
        <div class="container">
            <div class="row justify-content-center">

                <div class="card">
                    @include('mensajes')
                    <div class="card-header">Lista de Tiendas</div>



                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Código</th>
                                <th scope="col">Nombre vendedor</th>
                                <th scope="col">Nombre de la tienda</th>
                                <th scope="col">Familia</th>



                                <th colspan="3"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <!--muestro las direccines con el nombre del usuario que la tiene,en caso de que no tenga usuario
                            asignado también lo mostrará-->
                            @foreach($tiendas as $tienda)
                               @foreach($tienda->user as $use ) 
                            <tr>
                                @if(!isset($use))
                                <th scope="row"> Sin datos </th>
                                @else 

                                <th scope="row"> {{$use ->id}}/{{ $tienda->id }} </th>
                                @endif
                                <td>{{$use->nombre}} {{$use->apellidos}}</td>
                                <td>{{$tienda->nombre_tienda}}</td>
                                <td>{{$tienda->clasificacion}}</td>
                                 

                                <!--no le doy estilo a estos enlaces, en principio pueden ser botones, pero se deja al gusto de la aplicación en la que se ponga -->
                                <td><a href="{{route('tienda.show', $direccion ?? '') }}">Mostrar</a></td>
                                <td>  <form method="POST" action="{{ route('tienda.destroy', $direccion ?? '' )}}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Eliminar</button>


                                    </form><td>
                                <td><a href="{{route('tienda.edit',$user ?? '')}}">Editar</a></td> 



                            </tr>              
                                @endforeach
                            @endforeach
                            <tr>
                                <td><a href="{{route('tienda.create')}}">Crear</a></td>
                            </tr>
                        </tbody>
                    </table>


                </div>

            </div>

        </div>
@endsection
@endif

