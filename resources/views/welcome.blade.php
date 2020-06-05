@extends('layouts.plantilla')
 
@section('cabecera')      
@include('layouts.cabeceraGeneral')
@stop
@if( (Auth::user()==null))
@section('cuerpo')
@include('layouts.imagenHome')
@stop
 
@elseif(Auth::user()->rol=='administrador')  

@section("cuerpo")
 
@include('layouts.cuerpo_administrador')
@stop

@elseif(Auth::user()->rol=='cliente')
@section('cuerpo')
@include('layouts.imagenHome')
@stop
@elseif(Auth::user()->rol=='vendedor')
@section('lateral')
@include('layouts.barra_lateral')
@stop
@section('cuerpo_lateral')
@include('layouts.cuerpo_vendedor')

@stop
@else
 @section('cuerpo')
@include('layouts.imagenHome')
@stop
@endif
 

@section("pie")
@include('layouts.pieGeneral')
@stop 
