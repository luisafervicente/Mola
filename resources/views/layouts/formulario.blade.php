 <div class="container margenes" style=" display: flex; justify-content:center; flex-wrap: wrap; " >


            <img  src="{{asset('images/logoletras.jpg') }}"  alt="logoMola" class="img-fluid"/> 


        </div>
        <div  class="container " style=" width: 75%;">

            {!! Form::open(['method'=> 'post', 'action'=>'AdminUsersController@store']) !!}



            <div class="form-group col-lg-6 col-md-6 col-sm-12 col-12" >
                <h3>Establezcamos la seguridad</h3>


                {!! Form:: label('role_id', 'Rol: ') !!}
                {!! Form:: text('role_id') !!} 

                {!! Form:: label('nick', 'Nick: ') !!}
                {!! Form:: text('nick') !!} 

                {!! Form:: label('password', 'Password: ') !!}
                {!! Form:: password('password' ) !!}

            </div>

            <div class="form-group col-lg-6 col-md-6 col-sm-12 col-12" >
                <h3>A continuación datos personales</h3>

                {!! Form:: label('DNI', 'DNI: ') !!}
                {!! Form:: text('DNI'   ) !!}    

                {!! Form:: label('name', 'Nombre: ') !!}
                {!! Form:: text('name' ) !!}

                {!! Form:: label('apellidos', 'Apellidos: ') !!}
                {!! Form:: text('apellidos' ) !!}

            </div>

            <div class="form-group col-lg-6 col-md-6 col-sm-12 col-12" >
                <h3>Ahora tus datos de contacto</h3>

                {!! Form:: label('email', 'Email: ') !!}
                {!! Form:: email('email'   ) !!}

                {!! Form:: label('email_verified_at', 'Repite email: ') !!}
                {!! Form:: email('email_verified_at'   ) !!}

            </div>   





            <div class="form-group form-check  col-12" style="display: flex; justify-content: center;">
                {!! Form:: submit('Crear usuario', ['class'=> 'btn btn-success']) !!}


            </div>

            {!! Form::close() !!}
           @yield('cuerpo')
        </div>
  
 