@extends('layouts.plantilla')
@section('cabecera')
@include('layouts.cabeceraGeneral')
@stop

<!--esta es la pagina de visualizar una direccion, si vengo del formulario inicial volvere al formulario inicial, si vengo de crear direccion desde la pagina de control
del admiistrador, tengo que ir a la pagnia de mostrar el ususario que este modificando la direccion y casso de que sea el propio ususario el que este 
modificando o añadiendo una direccion una vez identificado, se ira a la pagina de inicio diciendo que la modificcion se ha realizado correctamente.-->
<div class="container margenes" style=" display: flex; justify-content:center; flex-wrap: wrap; " >

    <img  src="{{asset('images/logoletras.jpg') }}"  alt="logoMola" class="img-fluid"/> 

</div>
<div  class="container " style=" width: 75%;">
    <div class="alert alert-success" role="alert">
        @if (session('status'))
        {{ session('status') }}
    </div>
    @endif
    {!! Form::open(['route' =>['direccion.update',$direccion]] ) !!}

    <div class="form-group col-lg-6 col-md-6 col-sm-12 col-12" >
        <h3>Esta dirección esta asociada a los siguientes usuarios: 
        @foreach($direccion->users as $user)
        {{ $user->name }} <br /> </h3>
       @endforeach
        <h4>Lo primero la dirección </h4>
        {{ Form:: label('calle', 'Calle, nùmero, piso: ') }}
        {{ Form:: text('calle',$direccion->calle, array('readonly') )}} 

        {{ Form:: label('poblacion', 'Población: ') }}
        {{ Form:: text('poblacion',$direccion->poblacion, array('readonly')) }} 
 
        {{ Form:: label('provincia', 'Provincia: ') }}
        {{ Form:: text('provincia',$direccion->provincia,array('readonly') )}} 
        
        {{ Form:: label('pais', 'País: ') }}
        {{ Form:: text('pais',$direccion->pais,array('readonly')) }} 
        
        {{ Form:: label('codigo_postal', 'Código postal: ') }}
        {{ Form:: text('codigo_postal',$direccion->codigo_postal,array('readonly') )}}
        
         {{ Form::hidden('user_id', Auth::user()->id )}}
         
        
        
         <a href="{{ route('direccion.edit', $direccion)  }} "><button type="button" class="btn btn-info">Editar la dirección</button></a></div>
         <a href="{{ route('direccion.index', Auth::user()->id)  }} "><button type="button" class="btn btn-info">Volver</button></a></div>



 






    <div class="form-group form-check  col-12" style="display: flex; justify-content: center;">
        {!! Form:: submit('Enviar', ['class'=> 'btn btn-success']) !!}


    

    {!! Form::close() !!}
    @yield('cuerpo')
</div>

  