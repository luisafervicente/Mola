 @extends('layouts.plantilla')

@section('cabecera')
@include('layouts.barra_administrador')
@stop  
@section('cuerpo')
<div class="container margenes" style=" display: flex; justify-content:center; flex-wrap: wrap; " >
  <img  src="{{asset('images/logoletras.jpg') }}"  alt="logoMola" class="img-fluid"/> 
</div>
<div  class="container " style=" width: 75%;">

    {!! Form::open(['route' =>'eliminarUsuario'] ) !!}



    <div class="form-group col-lg-6 col-md-6 col-sm-12 col-12" >
        <h3>Confirma que quieres eliminar el vendedor</h3>
        
        {!! Form::hidden('users_id', $user->id  )!!}
        {!! Form::hidden('rol', $user->rol  )!!}
       
    <div class="form-group form-check  col-12" style="display: flex; justify-content: center;">
        {!! Form:: submit('Eliminar', ['class'=> 'btn btn-success']) !!}


    </div>

    {!! Form::close() !!}
    @yield('cuerpo')
</div>

