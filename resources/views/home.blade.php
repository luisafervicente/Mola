@extends('layouts.app')

@section('content')
<div class="container">
    <div class="container margenes" style=" display: flex; justify-content:center; flex-wrap: wrap; " >
        <img  src="{{asset('images/logoletras.jpg') }}"  alt="logoMola" class="img-fluid"/>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif


                    <h3>Te has registrado correctamente,añade una direccion</h3>

                    <a href="{{ route('direccion.create' , Auth::user()) }} "><button type="button" class="btn btn-info">Añadir dirección</button></a></div>
                @include('mensajes')

                <h3>y ahora, elige una opcion</h3>


                {!! Form::open(['route' => ['elegir', Auth::user()->id]])!!}

                {{ Form::radio( 'eleccion' ,' vendedor' , false, ['class' => 'grid__offset-bp1-2']) }}Quiero vender en Mola<br>
                {{ Form::radio( 'eleccion' ,'cliente', false, ['class' => 'grid__offset-bp1-2']) }}Quiero comprar en Mola<br>
                <!--si el radio no esta marcado no se permite enviar los dtos !-->
                @if('vendedor'== false && 'cliente'==false)
                {{ Form::submit('Click Me!'), array('disabled'}}
                @else

                {{ Form::submit('Click Me!'), array('disabled'}}
                @endif







            </div>
        </div>
    </div>
</div>
@endsection
