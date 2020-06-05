@extends('layouts.app')

@section('content')
<div class="container">
    <div class="container margenes" style=" display: flex; justify-content:center; flex-wrap: wrap; " >
        <img  src="{{asset('images/logoletras.jpg') }}"  alt="logoMola" class="img-fluid"/>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Continuemos con el registro</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif


                    @if(Route::has('administrador'))
                    <a href="{{ route('direccion.create' , Auth::user()) }} "><button type="button" class="btn btn-success">Añadir dirección</button></a></div>
                <a href="{{ route('administrador.index' , Auth::user()) }} "><button type="button" class="btn btn-success">Ir a gestion</button></a></div>

            @elseif(Route::has('register'))
           
        @include('mensajes')
        {!! Form::open(['route' => ['elegir', Auth::user()->id]])!!}
        <div class='row justify-content-center'><h4>También necesitamos una opción</h4></div>
        <div class="form-group row justify-content-center">
            <div class='col-lg-6 col-md-6 col-6'>


                {{ Form::radio( 'eleccion' ,' vendedor' , true, ['class' => 'grid__offset-bp1-2']) }}Quiero vender en Mola<br>
                {{ Form::radio( 'eleccion' ,'cliente', false, ['class' => 'grid__offset-bp1-2']) }}Quiero comprar en Mola<br>
            </div>
            <div class='col-lg-4 col-md-4 col-4'>

                {{ Form::submit('Continuar!',['class'=>['btn btn-success']])}}

            </div>
        </div>

        {!! Form::close() !!}

        @endif

    </div>
</div>
 

@endsection
