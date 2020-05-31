@extends('layouts.plantilla')
@section('cabecera')
@include('layouts.barra_administrador')
@stop
@section('cuerpo')
<div class="container margenes" style=" display: flex; justify-content:center; flex-wrap: wrap; " >


    <img  src="{{asset('images/logoletras.jpg') }}"  alt="logoMola" class="img-fluid"/> 


</div>

{!! Form::open(['route' =>['cliente.update',$cliente  ]]) !!}
@csrf


<div class="form-group col-lg-6 col-md-6 col-sm-12 col-12" >
    <h3>Datos del cliente</h3>


    {{ Form:: label('name', 'Nombre: '  ) }}
    {{Form::text("name",   Auth::user()->name ,array('readonly'),['class' =>'form-control'] )}}



    {{ Form:: label('apellidos', 'Apellidos: '  ) }}
    {{ Form:: text('apellidos', Auth::user()->apellidos ,array('readonly')) }}

    {{ Form:: label('DNI', 'DNI: '  ) }}
    {{ Form:: text('DNI',  Auth::user()->DNI   ,array('readonly')) }} 

    {{ Form:: label('email', 'Email: '  ) }}
    {{ Form:: text('email',  Auth::user()->email ,array('readonly')) }} 

    {{ Form:: label('telefono', 'Teléfono: '  ) }}
    {{ Form:: text('telefono',  Auth::user()->telefono ,array('readonly')) }} 

     @foreach($lista_direcciones as $direccion)

    {{ Form:: label('calle', 'Calle, número y piso: '  ) }}
    {{ Form:: text('calle',  $direccion ,array('readonly')) }} 

    {{ Form:: label('CP', 'Nombre: '  ) }}
    {{ Form:: text('nombre',  Auth::user()->telefono ,array('readonly')) }} 

    {{ Form:: label('poblacion', 'Nombre: '  ) }}
    {{ Form:: text('nombre',   $direccion ,array('readonly')) }} 

    {{ Form:: label('provincia', 'Nombre: '  ) }}
    {{ Form:: text('nombre',  $direccion ,array('readonly')) }} 




    {!! Form::close() !!}

    <a class="btn btn-primary"   href="{{ route('user.edit',$user->id) }}">editarer</a>
    <a class="btn btn-primary"   href="{{ route('cliente.index') }}">Volver</a>

    @endsection







