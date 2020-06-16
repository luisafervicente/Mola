@extends('layouts.plantilla')
@section('cabecera')
@include('layouts.cabeceraGeneral')
@stop


<div class="container margenes" style=" display: flex; justify-content:center; flex-wrap: wrap; " >


    <img  src="{{asset('images/logoletras.jpg') }}"  alt="logoMola" class="img-fluid"/> 


</div>
<div  class="container " style=" width: 75%;">
    <div class="alert alert-success" role="alert">
        <div class="container">
            <div class="row justify-content-center">

                <div class="card">
                    @include('mensajes')
                    <div class="card-header">Lista de Direcciones</div>



                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Nombre de usuario</th>
                                <th scope="col">Calle</th>
                                <th scope="col">Población</th>
                                <th scope="col">Provincia</th>
                                <th scope="col">País</th>
                                <th scope="col">CP</th>



                                <th colspan="3"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <!--muestro las direccines con el nombre del usuario que la tiene,en caso de que no tenga usuario
                            asignado también lo mostrará-->
                            @foreach($direcciones as $direccion)
                            @foreach($direccion->users as $user) 
                            <tr>
                                @if(!isset($user))
                                <th scope="row"> Sin datos </th>
                                @else 

                                <th scope="row"> {{$user->name}} </th>
                                @endif
                                <td>{{$direccion->calle}}</td>
                                <td>{{$direccion->poblacion}}</td>
                                <td>{{$direccion->provincia}}</td>
                                <td>{{$direccion->pais}}</td>
                                <td>{{$direccion->codigo_postal}}</td>

                                <!--no le doy estilo a estos enlaces, en principio pueden ser botones, pero se deja al gusto de la aplicación en la que se ponga -->
                                <td><a href="{{route('direccion.show', $direccion) }}">Mostrar</a></td>
                                <td>  <form method="POST" action="{{ route('direccion.destroy', $direccion )}}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Eliminar</button>


                                    </form><td>
                                <td><a href="{{route('direccion.edit',$user ?? '')}}">Editar</a></td> 



                            </tr>              
                            @endforeach
                            @endforeach
                            <tr>
                                <td><a href="{{route('direccion.create')}}">Crear</a></td>
                            </tr>
                        </tbody>
                    </table>


                </div>

            </div>
            <a class="btn btn-primary"   href="{{ url('welcome') }}">Volver</a>
        </div>

