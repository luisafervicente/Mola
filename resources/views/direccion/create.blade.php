@extends('layouts.plantilla')
@section('cabecera')
@include('layouts.cabeceraGeneral')
@stop

@section('cuerpo')
<div class="container margenes" style=" display: flex; justify-content:center; flex-wrap: wrap; " >
    <img  src="{{asset('images/logoletras.jpg') }}"  alt="logoMola" class="img-fluid"/> 
</div>
<div  class="container ">
    <div class="row justify-content-center">
    <div class="alert alert-success col-md-8  " role="alert">
        
   
   
    {!! Form::open(['route' =>['direccion.store']] ) !!}


{{ Form::component('bsText', 'components.form.text', ['name', 'value', 'attributes'])}}
    <div class="form-group col-lg-10 col-md-6 col-sm-12 col-12 justify-content-end " >
        <h3>Sigamos, necesitamos algún dato más</h3>
        <h4>Lo primero la dirección </h4>
         <div class='form-group col-lg-12 col-md-6 col-sm-12 col-12'>
             
        {{ Form:: label('calle', 'Calle, número, piso: ') }}
        {{ Form:: text('calle','Calle,número,piso',['class'=>'form-control']) }} 
         </div>
         <div class='form-group col-lg-12 col-md-6 col-sm-12 col-12'>
        {{ Form:: label('poblacion', 'Población: ') }}
        {{ Form:: text('poblacion','Población',['class'=>'form-control']) }} 
         </div>
         <div class='form-group col-lg-12 col-md-6 col-sm-12 col-12'>
        {{ Form:: label('provincia', 'Provincia: ') }}
        {{ Form:: text('provincia','Provincia', ['class'=>'form-control']) }} 
         </div>
         <div class='form-group col-lg-12 col-md-6 col-sm-12 col-12'>
        {{ Form:: label('pais', 'País: ') }}
        {{ Form:: text('pais','País',['class'=>'form-control'])}} 
         </div>
         <div class='form-group col-lg-12 col-md-6 col-sm-12 col-12'>
        {{ Form:: label('codigo_postal', 'Código postal: ') }}
        {{ Form:: text('codigo_postal','Código postal',['class'=>'form-control']) }}
         </div>
         {{ Form::hidden('user_id', Auth::user()->id )}}
         
      
        
        <div class="form-group form-check  col-12" style="display: flex; justify-content: center;">
        
          {!! Form:: submit('Enviar', ['class'=> 'btn btn-success']) !!}

 </div>
 
    </div>
    {!! Form::close() !!}
    </div>
</div>
@endsection
 






    
       
   
    
 
