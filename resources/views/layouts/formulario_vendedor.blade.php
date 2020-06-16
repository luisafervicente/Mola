



<div class="form-group col-lg-10 col-md-10 col-sm-12 col-12   " >
    <div class='form-group col-lg-10 col-md-10 col-sm-12 col-12'>
        {{ Form:: label('denominacion_fiscal', 'Denominación Fiscal: ') }}
        {{ Form:: text('denominacion_fiscal', 'Denominación fiscal',['class'=>'form-control']) }} 
    </div>

    <div class='form-group col-lg-10 col-md-10 col-sm-12 col-12'>
        {{ Form:: label('n_cuenta_bancaria', 'Número de cuenta bancaria: ') }}
        {{ Form:: text('n_cuenta_bancaria', '00 00 0000 000000 00',['class'=>'form-control'] ) }} 
    </div>

    <div class='form-group col-lg-10 col-md-10 col-sm-12 col-12'>
        {{ Form:: label('fecha_facturacion', 'Fecha elegida para recibir facturas: ') }}
        {{ Form:: text('fecha_facturacion', 'D de cada mes'  ,['class'=>'form-control']) }}
    </div>


    <div class='form-group col-lg-10 col-md-10 col-sm-12 col-12'>
        {{ Form:: label('tipo_iva', 'Tipo de Iva: ') }}
        {{ Form:: text('tipo_iva'), 21,['class'=>'form-control']  }}    
    </div>
    <div class='form-group col-lg-10 col-md-10 col-sm-12 col-12'>
        {{ Form:: label('recargo_equivalencia', 'Tenemos que aplicarte recargo de equivalencia' ) }}

        {{   Form::checkbox('recargo_equivalencia', true, ['class' => 'grid__offset-bp1-2'])  }} 
        {{ Form::hidden('user_id', Auth::user()->id) }}
           <div class="form-group form-check  col-12"  >
               
               
        {!! Form:: submit('Enviar', ['class'=> 'btn btn-success']) !!}

    </div>
</div>
     </div>
    {!! Form::close() !!}

    