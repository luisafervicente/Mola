 
<div class="container margenes" style=" display: flex; justify-content:center; flex-wrap: wrap; " >
    <img  src="{{asset('images/logoletras.jpg') }}"  alt="logoMola" class="img-fluid"/> 
</div>
<div class="row justify-content-center" style='margin-top: 10%;'>

    <div class="col-md-8">
        <div class="card alert alert-success">
            <div class="card-header">{{ __('Comenzemos a crear tu tienda') }}</div>

            <div class="card-body">
                {!! Form::open(['route' =>['tienda.store'],'files'=>'true']) !!}
                @csrf



                <div class="form-row" >


                    {{ Form::component('bsText', 'components.form.text', ['name', 'value', 'attributes'])}}
                    <div class='form-group col-lg-5 col-md-6 col-sm-12 col-12'>
                        {{ Form:: label('nombre_tienda', 'Nombre: ') }}
                        {{Form::text("nombre_tienda")}}
                    </div>
                    <div class='form-group col-lg-5 col-md-6 col-sm-12 col-12'>
                         
                        {{ Form::select('clasificacion', 
                        ['alimentación' => 'Alimentacion','textil'=>'Textil','calzado'=>'Calzado','papelería'=>'Papelería', 'electronica'=>'Electrónica',
                        'bazar'=>'Bazar', 'otros'=>'Otros'],['class'=>'form-control','class'=>'custom-select'])}}

 
                    </div>
                     
                    

                    <div class='form-group col-lg-5 col-md-6 col-sm-12 col-12'>
                        {{ Form:: label('imagen', 'Añade la imagen de tu tienda: '  ) }}
                        {{  Form::file('imagen'), ['class'=>'form-control']  }}
                    </div>
                    <div class='form-group col-lg-5 col-md-6 col-sm-12 col-12'>
                        {{ Form:: label('omentarios', 'Indica que comentarios quieres que aparezcan en la descripción: ') }}
                        {{Form::textarea("comentarios")}}
                    </div>

                    {{ Form::hidden('user_id', Auth::user()->id )}}

                    <div class="form-group form-check  col-12" style="display: flex; justify-content: center;">
                        {!! Form:: submit('Enviar', ['class'=> 'btn btn-success']) !!}


                    </div>


                    {!! Form::close() !!}
                    <a href="{{ route('direccion.create', Auth::user()->id)  }} "><button type="button" class="btn btn-success">Añadir una dirección</button></a></div>

                </div>
            </div>

        </div>

    </div>








