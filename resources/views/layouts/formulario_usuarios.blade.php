 
    <div class="container">
    <div class="container margenes" style=" display: flex; justify-content:center; flex-wrap: wrap; " >
        <img  src="{{asset('images/logoletras.jpg') }}"  alt="logoMola" class="img-fluid"/>
    </div>
    <div class="row justify-content-center" style='margin-top: 10%;'>
        @include('mensajes')
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Registrarse') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('users.store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="apellidos" class="col-md-4 col-form-label text-md-right">{{ __('Apellidos') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="apellidos" value="{{ old('apellidos') }}" required autocomplete="apellidos" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="DNI" class="col-md-4 col-form-label text-md-right">{{ __('DNI') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('DNI') is-invalid @enderror" name="DNI" value="{{ old('DNI') }}" required autocomplete="DNI" autofocus>

                                @error('DNI')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                         <div class="form-group row">
                            <label for="DNI" class="col-md-4 col-form-label text-md-right">{{ __('Tlf') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="telefono" value="{{ old('telefono') }}" required autocomplete="telefono" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                
                                 
                               
                            </div>
                        </div>
                        
                        
                        

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        <!--Si venimos de la ruta de intrannet, como administradores para dar a alguien de alta, podremos elegir aquí quq rol darle, si
                        se accede desde el home a un registro normal, no aparecera la opción de elegir.-->
                       
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="rol" id="elegir_usuario" value="administrador" <?php if( 'rol' == 'administrador')  ?> 
                                    checked 
                                    > 
                            <label class="form-check-label" for="rol">
                                Administrador
                            </label> 
                       
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="rol" id="elegir_usuario" value='vendedor'   <?php if(old('rol') == 'vendedor')  ?> 
                                    checked 
                                    >
                            <label class="form-check-label" for="rol">
                                Vendedor
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="rol" id="elegir_usuario" value= 'cliente'  <?php if(old('rol') == 'cliente')  ?> 
                                    checked 
                                    > 
                            <label class="form-check-label" for="rol">
                                Cliente
                            </label>
                        </div>
                             
                     
                        
                        
                        
                        
                        

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-success">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
 

