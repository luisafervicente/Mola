@extends('layouts.plantilla')
@section('cabecera')
@include('layouts.barra_administrador')
@stop
@section('cuerpo')
<div class="container margenes" style=" display: flex; justify-content:center; flex-wrap: wrap; " >


    <img  src="{{asset('images/logoletras.jpg') }}"  alt="logoMola" class="img-fluid"/> 


</div>

{!! Form::open(['route' =>['users.update', $user]]) !!}
@csrf


<div class="form-group col-lg-6 col-md-6 col-sm-12 col-12" >
    <h3>Datos del cliente</h3>


    {{ Form:: label('name', 'Nombre: '  ) }}
    {{Form::text("name",   $user->name ,array('readonly') )}}



    {{ Form:: label('apellidos', 'Apellidos: '  ) }}
    {{ Form:: text('apellidos', $user->apellidos ,array('readonly')) }}

    {{ Form:: label('DNI', 'DNI: '  ) }}
    {{ Form:: text('DNI', $user->DNI   ,array('readonly')) }} 

    {{ Form:: label('email', 'Email: '  ) }}
    {{ Form:: text('email',  $user->email ,array('readonly')) }} 

    {{ Form:: label('telefono', 'Teléfono: '  ) }}
    {{ Form:: text('telefono',  $user->telefono ,array('readonly')) }} 

    @if(isset($cliente))


    {{ Form:: label('id', 'Id Cliente:   '  ) }}
    {{ Form:: text('id',  $cliente->id ??'' ,array('readonly')) }} 

    {{ Form:: label('n_tarjeta', 'N_tarjeta: '  ) }}
    {{ Form:: text('n_tarjeta',  $cliente->n_tarjeta ??'' ,array('readonly')) }} 

    {{ Form:: label('user_id', 'Número usuario: '  ) }}
    {{ Form:: text('user_id',  $cliente->user_id ??'' ,array('readonly')) }} 





    @elseif(isset($vendedor))
    


    {{ Form:: label('id', 'IdVendedor:   '  ) }}
    {{ Form:: text('id',  $vendedor->id ,array('readonly')) }} 

    {{ Form:: label('user_id', 'Número usuario: '  ) }}
    {{ Form:: text('user_id',  $vendedor->user_id ,array('readonly')) }} 



    {{ Form:: label('denominacion_fiscal', 'Denominación Fiscal: ') }}
    {{ Form:: text('denominacion_fiscal', $vendedor->denominacion_fiscal, array('readonly')) }} 

    {{ Form:: label('n_cuenta_bancaria', 'Número de cuenta bancaria: ') }}
    {{ Form:: text('n_cuenta_bancaria', $vendedor->n_cuenta_bancaria, array('readonly')) }} 

    {{ Form:: label('fecha_facturacion', 'Fecha elegida para recibir facturas: ') }}
    {{ Form:: text('fecha_facturacion', $vendedor->fecha_facturacion, array('readonly') ) }}


    {{ Form:: label('tipo_iva', 'Tipo de Iva: ') }}
    {{ Form:: text('tipo_iva'), $vendedor->tipo_iva, array('readonly') }}    

    {{ Form:: label('recargo_equivalencia', 'Tenemos que aplicarte recargo de equivalencia' ) }}

    {{   Form::checkbox('recargo_equivalencia',$vendedor->recargo_equivalencia ,array('readonly'),['class' => 'grid__offset-bp1-2'])  }}  

 @endif

  {!! Form:: submit('Enviar', ['class'=> 'btn btn-success']) !!}






    {!! Form::close() !!}

  
    <a class="btn btn-primary"   href="{{ route('cliente.index') }}">Volver sin Cambiar</a>

    @endsection







