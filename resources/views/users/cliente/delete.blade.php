@extends('layouts.plantilla')
@section('cabecera')
@include('layouts.cabeceraGeneral')
@stop
 
<div class="container margenes" style=" display: flex; justify-content:center; flex-wrap: wrap; " >


    <img  src="{{asset('images/logoletras.jpg') }}"  alt="logoMola" class="img-fluid"/> 


</div>
@include('mensajes')


