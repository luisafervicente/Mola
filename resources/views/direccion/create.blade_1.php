@extends('layouts.plantilla')
@section('cabecera')
@include('layouts.cabeceraGeneral')
@stop


<div class="container margenes" style=" display: flex; justify-content:center; flex-wrap: wrap; " >


    <img  src="{{asset('images/logoletras.jpg') }}"  alt="logoMola" class="img-fluid"/> 


</div>
<div  class="container " style=" width: 75%;">
    <div class="alert alert-success" role="alert">
        @if (session('status'))
        {{ session('status') }}
    </div>
    @endif
    {!! Form::open(['route' =>['direccion.store']] ) !!}



    <div class="form-group col-lg-6 col-md-6 col-sm-12 col-12" >
        <h3>Sigamos, necesitamos algún dato más</h3>
        <h4>Lo primero la dirección </h4>
        {{ Form:: label('calle', 'Calle, nùmero, piso: ') }}
        {{ Form:: text('calle') }} 

        {{ Form:: label('poblacion', 'Población: ') }}
        {{ Form:: text('poblacion') }} 
 
        {{ Form:: label('provincia', 'Provincia: ') }}
        {{ Form:: text('provincia') }} 
        
        {{ Form:: label('pais', 'País: ') }}
        {{ Form:: text('pais') }} 
        
        {{ Form:: label('codigo_postal', 'Código postal: ') }}
        {{ Form:: text('codigo_postal') }}
        
        {!! Form::hidden('user_id', Auth::user()->id )!!}
        
        
        <a href="{{ route('direccion.create')  }} "><button type="button" class="btn btn-info">Añadir otra direcion</button></a></div>
         



    </div>






    <div class="form-group form-check  col-12" style="display: flex; justify-content: center;">
        {!! Form:: submit('Enviar', ['class'=> 'btn btn-success']) !!}


    </div>

    {!! Form::close() !!}
    @yield('cuerpo')
</div>
