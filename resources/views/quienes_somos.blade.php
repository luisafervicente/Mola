@extends('layouts.plantilla')

@section('cabecera')
@extends('layouts.plantilla')

@section('cabecera')      


@include('layouts.cabeceraGeneral')
@stop
 




@section('lateral')
@include('layouts.barra_lateral')
@stop
@section('cuerpo_lateral')
@include('layouts.quienes')

 @stop
 
 
 

@section("pie")
@include('layouts.pieGeneral')
@stop 