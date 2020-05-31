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

    {!! Form::open(['route' =>'vendedor.store'] ) !!}



    <div class="form-group col-lg-6 col-md-6 col-sm-12 col-12" >
        <h3>Sigamos, necesitamos algún dato más</h3>
         
        {!! Form:: label('denominacion_fiscal', 'Denominación Fiscal: ') !!}
        {!! Form:: text('denominacion_fiscal') !!} 

        {!! Form:: label('n_cuenta_bancaria', 'Número de cuenta bancaria: ') !!}
        {!! Form:: text('n_cuenta_bancaria') !!} 

        {!! Form:: label('fecha_facturacion', 'Fecha elegida para recibir facturas: ') !!}
        {!! Form:: text('fecha_facturacion' ) !!}


        {!! Form:: label('tipo_iva', 'Tipo de Iva: ') !!}
        {!! Form:: text('tipo_iva') !!}    

        {!! Form:: label('recargo_equivalencia', 'Tenemos que aplicarte recargo de equivalencia' ) !!}

        {{   Form::checkbox('recargo_equivalencia',0 ,['class' => 'grid__offset-bp1-2'])  }}  

        {!! Form::hidden('user_id', Auth::user()->id )!!}
        
       





    <div class="form-group form-check  col-12" style="display: flex; justify-content: center;">
        {!! Form:: submit('Enviar', ['class'=> 'btn btn-success']) !!}


    </div>

    {!! Form::close() !!}
    @yield('cuerpo')
</div>

