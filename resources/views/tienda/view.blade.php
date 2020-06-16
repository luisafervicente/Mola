@extends('layouts.plantilla')
@if (  (Auth::user()!=null))
@section('cabecera')
@include('layouts.barra_administrador')
@stop
@section('cuerpo')
<div class="container margenes" style=" display: flex; justify-content:center; flex-wrap: wrap; " >


    <img  src="{{asset('images/logoletras.jpg') }}"  alt="logoMola" class="img-fluid"/> 


</div>
<div class="row justify-content-center" style='margin-top: 10%;'>
     
    <div class="col-md-8">
        <div class="card">
            <div class="card-header"> Aquí tienes los detalles de tu tienda

                <div class="card-body">
                    {!! Form::open(['route' =>['tienda.create'],'files'=>'true']) !!}
                    @csrf
                    <div class="form-row" >

                        {{ Form::component('bsText', 'components.form.text', ['name', 'value', 'attributes'])}}
                        <div class='form-group col-lg-5 col-md-6 col-sm-12 col-12'>
                            {{ Form:: label('name', 'Nombre: ') }}
                            {{Form::text("nombre_tienda",$tienda->nombre_tienda,['class'=>'form-control'],array('readonly'))}}
                        </div>
                        <div class='form-group col-lg-5 col-md-6 col-sm-12 col-12'>
                            {{ Form::select('clasificacion', 
                            ['Alimentación' => 'alimentacion','Textil'=>'textil','Calzado'=>'calzado','Papelería'=>'papeleria', 'Electrónica'=>'electrónica',
                            'Bazar'=>'bazar', 'Otros'=>'otros'],['class'=>'form-control'],array('readonly'))}}

                        </div>

                        <div class='form-group col-lg-5 col-md-6 col-sm-12 col-12'>
                            {{ Form:: label('image', 'Añade la imagen de tu tienda: '  ) }}
                            {{  Form::file('image'),$tienda->image,['class'=>'form-control'],array('readonly')  }}
                        </div>


                        {{ Form::hidden('user_id', Auth::user()->id )}}

                        <div class="form-group form-check  col-12" style="display: flex; justify-content: center;">
                            <a href="{{route('tienda.index')}}"><button type='button' class='btn btn-outline-success'>Volver</button></a>


                        </div>


                        {!! Form::close() !!}




                    </div></div></div></div>


 @endsection
  @else
                        

@section('cabecera')

@include('layouts.cabecera_tienda')
@stop

@section('lateral')
@include('layouts.barra_lateral')
@stop

@section('cuerpo_lateral')
@include('layouts.cuerpos_tienda')

@endsection
@section('pie')
@include('layouts.pieGeneral')
@stop
@endif

