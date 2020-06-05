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
    @include('mensajes')
    <div class="col-md-8">
        <div class="card">
            <div class="card-header"> Vamos a comenzar a crear tu tienda

                <div class="card-body">
                    {!! Form::open(['route' =>['tienda.create'],'files'=>'true']) !!}
                    @csrf


                    <div class="form-row" >


                        {{ Form::component('bsText', 'components.form.text', ['name', 'value', 'attributes'])}}
                        <div class='form-group col-lg-5 col-md-6 col-sm-12 col-12'>
                            {{ Form:: label('name', 'Nombre: ') }}
                            {{Form::text("nombre_tienda",$tienda->nombre_tienda,['class'=>'form-control'])}}
                        </div>
                        <div class='form-group col-lg-5 col-md-6 col-sm-12 col-12'>
                            {{ Form::select('clasificacion', 
                            ['Alimentación' => 'alimentacion','Textil'=>'textil','Calzado'=>'calzado','Papelería'=>'papeleria', 'Electrónica'=>'electrónica',
                            'Bazar'=>'bazar', 'Otros'=>'otros'],['class'=>'form-control'])}}


                        </div>

                        <div class='form-group col-lg-5 col-md-6 col-sm-12 col-12'>
                            {{ Form:: label('image', 'Añade la imagen de tu tienda: '  ) }}
                            {{  Form::file('image'),$tienda->image,['class'=>'form-control']  }}
                        </div>


                        {{ Form::hidden('user_id', Auth::user()->id )}}

                        <div class="form-group form-check  col-12" style="display: flex; justify-content: center;">
                            {!! Form:: submit('Enviar', ['class'=> 'btn btn-success']) !!}


                        </div>


                        {!! Form::close() !!}




                    </div></div></div></div>


 @endsection
  @else
                        

@section('cabecera')

@include('layouts.cabeceraGeneral')
@stop

@section('lateral')
@include('layouts.barra_lateral')
@stop

@section('cuerpo_lateral')


<div class="row justify-center·">
     
<div class="card col-lg-4 col-md-6 col-sd-10 col-10" style="width: 18rem; margin-top: 5%;">
    
    <div style="background:  #218838; color:white;" >{{$tienda->nombre_tienda}}</div> 
    <div class="card-body">
         <img src="{{ asset('images/'.$tienda->image) }}" class="card-img-top" > 
  
    <p class="card-text">{{$tienda->comentarios}}</p>
  </div>
</div>
    
</div>
@endsection
@section('pie')
@include('layouts.pieGeneral')
@stop
@endif

