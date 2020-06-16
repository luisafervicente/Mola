@extends('layouts.plantilla')
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
            <div class="card-header"> @if( $user->rol=='vendedor')
                <h3>Datos del vendedor</h3>
                @elseif($user->rol=='cliente')
                <h3>Datos del cliente</h3>
                @elseif($user->rol=='administrador')
                <h3>Datos del administrador</h3>
                @endif</div>

            <div class="card-body">
                {!! Form::open(['route' =>['users.update',$user->id]]) !!}
                @csrf
                @method('PUT')


                <div class="form-group " >


                    {{ Form::component('bsText', 'components.form.text', ['name', 'value', 'attributes'])}}
                    <div class='form-group col-lg-5 col-md-6 col-sm-12 col-12'>
                        {{ Form:: label('name', 'Nombre: ') }}
                        {{Form::text("name",$user->name,  ['class'=>'form-control'])}}
                    </div>
                    <div class='form-group col-lg-5 col-md-6 col-sm-12 col-12'>
                        {{ Form:: label('apellidos', 'Apellidos: '  ) }}
                        {{ Form:: text('apellidos', $user->apellidos ,['class'=>'form-control']) }}
                    </div>

                    <div class='form-group col-lg-5 col-md-6 col-sm-12 col-12'>
                        {{ Form:: label('DNI', 'DNI: '  ) }}
                        {{ Form:: text('DNI', $user->DNI  ,['class'=>'form-control']  ) }}
                    </div>

                    <div class='form-group col-lg-5 col-md-6 col-sm-12 col-12'>
                        {{ Form:: label('email', 'Email: '  ) }}
                        {{ Form:: text('email',  $user->email  ,['class'=>'form-control']) }}
                    </div>

                    <div class='form-group col-lg-5 col-md-6 col-sm-12 col-12'>
                        {{ Form:: label('telefono', 'Teléfono: '  ) }}
                        {{ Form:: text('telefono',  $user->telefono  ,['class'=>'form-control']) }} 
                    </div>

                    @foreach($lista_direcciones ?? '' as $direccion)
                    <div class='form-group col-lg-5 col-md-6 col-sm-12 col-12'>
                        {{ Form:: label('calle', 'Calle, número y piso: '  ) }}
                        {{ Form:: text('calle',  $direccion->calle , ['class'=>'form-control']) }} 
                    </div>

                    <div class='form-group col-lg-5 col-md-6 col-sm-12 col-12'>
                        {{ Form:: label('CP', 'CP: '  ) }}
                        {{ Form:: text('codigo_postal', $direccion->codigo_postal , ['class'=>'form-control']) }} 
                    </div>

                    <div class='form-group col-lg-5 col-md-6 col-sm-12 col-12'>
                        {{ Form:: label('poblacion', 'Población: '  ) }}
                        {{ Form:: text('poblacion',   $direccion->poblacion , ['class'=>'form-control']) }} 
                    </div>

                    <div class='form-group col-lg-5 col-md-6 col-sm-12 col-12'>
                        {{ Form:: label('provincia', 'Provincia: '  ) }}
                        {{ Form:: text('provincia',  $direccion->provincia , ['class'=>'form-control']) }} 
                    </div>

                    <div class='form-group col-lg-5 col-md-6 col-sm-12 col-12'>
                        {{ Form:: label('pais', 'Pais: '  ) }}
                        {{ Form:: text('pais',  $direccion->pais , ['class'=>'form-control']) }} 
                    </div>

                    @endforeach



                </div>


                <div class="form-group " >
                    @if(isset($cliente))
                    <div class='form-group col-lg-5 col-md-6 col-sm-12 col-12'>
                        {{ Form:: label('user_id', 'Número usuario: '  ) }}
                        {{ Form:: text('user_id',  $cliente->user_id ??'' ,array('readonly'),['class'=>'form-control']) }} 
                    </div>

                    <div class='form-group col-lg-5 col-md-6 col-sm-12 col-12'>
                        {{ Form:: label('id', 'Id Cliente:   '  ) }}
                        {{ Form:: text('id',  $cliente->id ??'' ,array('readonly'),['class'=>'form-control']) }} 
                    </div>

                    <div class='form-group col-lg-5 col-md-6 col-sm-12 col-12'>
                        {{ Form:: label('n_tarjeta', 'N_tarjeta: '  ) }}
                        {{ Form:: text('n_tarjeta',  $cliente->n_tarjeta ??'' , ['class'=>'form-control']) }} 
                    </div>






                    <a class="btn btn-primary"   href="{{ route('cliente.index') }}">Volver</a>

                </div>
                @elseif(isset($vendedor))
                <div class="form-group " >
                    <div class='form-group col-lg-5 col-md-6 col-sm-12 col-12'>

                        {{ Form:: label('id', 'IdVendedor:   '  ) }}
                        {{ Form:: text('id',  $vendedor->id ,array('readonly'),['class'=>'form-control']) }} 
                    </div>


                    <div class='form-group col-lg-5 col-md-6 col-sm-12 col-12'>
                        {{ Form:: label('user_id', 'Número usuario: '  ) }}
                        {{ Form:: text('user_id',  $vendedor->user_id ,array('readonly'),['class'=>'form-control']) }} 
                    </div>

                    <div class='form-group col-lg-5 col-md-6 col-sm-12 col-12'>
                        {{ Form:: label('denominacion_fiscal', 'Denominación Fiscal: ') }}
                        {{ Form:: text('denominacion_fiscal', $vendedor->denominacion_fiscal,['class'=>'form-control'] ) }} 
                    </div>

                    <div class='form-group col-lg-5 col-md-6 col-sm-12 col-12'>
                        {{ Form:: label('n_cuenta_bancaria', 'Número de cuenta bancaria: ') }}
                        {{ Form:: text('n_cuenta_bancaria', $vendedor->n_cuenta_bancaria,['class'=>'form-control']) }} 
                    </div>

                    <div class='form-group col-lg-5 col-md-6 col-sm-12 col-12'>
                        {{ Form:: label('fecha_facturacion', 'Fecha elegida para recibir facturas: ') }}
                        {{ Form:: text('fecha_facturacion', $vendedor->fecha_facturacion, ['class'=>'form-control'] ) }}
                    </div>


                    <div class='form-group col-lg-5 col-md-6 col-sm-12 col-12'>
                        {{ Form:: label('tipo_iva', 'Tipo de Iva: ') }}
                        {{ Form:: text('tipo_iva'), $vendedor->tipo_iva, ['class'=>'form-control'] }}    
                    </div>
                    <div class='form-group col-lg-5 col-md-6 col-sm-12 col-12'>
                        {{ Form:: label('recargo_equivalencia', 'Tenemos que aplicarte recargo de equivalencia' ) }}

                        {{   Form::checkbox('recargo_equivalencia',$vendedor->recargo_equivalencia ,array('readonly'),['class' => 'grid__offset-bp1-2'])  }} 

                    </div>

                    <a class="btn btn-primary"   href="{{ route('vendedor.index') }}">Volver</a>

                </div>
                @elseif(isset($administrador))


                <div class="form-group " >
                    <div class='form-group col-lg-5 col-md-6 col-sm-12 col-12'>
                        {{ Form:: label('id', 'IdAministrador:   '  ) }}
                        {{ Form:: text('id',  $administrador->id ,array('readonly'),['class'=>'form-control']) }} 
                    </div>

                    <div class='form-group col-lg-5 col-md-6 col-sm-12 col-12'>
                        {{ Form:: label('user_id', 'Número usuario: '  ) }}
                        {{ Form:: text('user_id',  $administrador->user_id ,array('readonly'),['class'=>'form-control']) }} 
                    </div>


                    <a class="btn btn-primary"   href="{{ route('administrador.index') }}">Volver</a>

                </div>


                @endif




                <div class="form-group form-check  col-12" style="display: flex; justify-content: center;">
                    {!! Form:: submit('Enviar', ['class'=> 'btn btn-success']) !!}


                </div>



                {!! Form::close() !!}



                @endsection


            </div></div></div></div>




