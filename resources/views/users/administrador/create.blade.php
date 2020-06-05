@extends('layouts.plantilla')
@section('cabecera')
@include('layouts.cabeceraGeneral')
@stop
@if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
</div>
@endif
<div class="container margenes" style=" display: flex; justify-content:center; flex-wrap: wrap; " >


    <img  src="{{asset('images/logoletras.jpg') }}"  alt="logoMola" class="img-fluid"/> 


</div>
<div  class="container " style=" width: 75%;">

    {!! Form::open(['route' =>'administrador.store'] ) !!}



    <div class="form-group col-lg-6 col-md-6 col-sm-12 col-12" >
        <h3>Casi hemos terminado, dale a crear dirección y ya estará-</h3>
         
        

   
        {!! Form::hidden('user_id', Auth::user()->id )!!}
        
       
    <div class="form-group form-check  col-12" style="display: flex; justify-content: center;">
        {!! Form:: submit('Enviar', ['class'=> 'btn btn-success']) !!}


    </div>

    {!! Form::close() !!}
    @yield('cuerpo')
</div>

