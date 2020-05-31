@extends('layouts.plantilla')

@section('cabecera')
@include('layouts.barra_administrador')
@stop  
@section('cuerpo')
<div class="container">
    <div class="row justify-content-center">

        <div class="card">
           @include('mensajes')
            <div class="card-header">Lista de Vendedores</div>



            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Número de usuario</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellidos</th>
                        <th scope="col">DNI</th>
                        <th scope="col">Email</th>
                         



                        <th colspan="3"></th>
                    </tr>
                </thead>
                <tbody>
                   @foreach($users as $user)
                      @if($user->rol=='vendedor')
                    
                    
                    <tr>
                        <th scope="row">{{$user->id}}</th>

                        <td>{{$user->name}}</td>
                        <td>{{$user->apellidos}}</td>
                        <td>{{$user->DNI}}</td>
                        <td>{{$user->email}}</td>
                        
                        <!--no le doy estilo a estos enlaces, en principio pueden ser botones, pero se deja al gusto de la aplicación en la que se ponga -->
                        <td><a href="{{route('users.show', $user)}}">Mostrar</a></td>
                        <td>  <form method="POST" action="{{ route('users.destroy', $user)}}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>


                            </form><td>
                        <td><a href="{{route('users.edit',$users->id)}}">Editar</a></td> 

                        @endif

                    </tr>              
                    @endforeach 
                 
                    <tr>
                        <td><a href="{{route('users.create')}}">Crear</a></td>
                    </tr>
                </tbody>
            </table>

            
        </div>

    </div>

</div>
@endsection