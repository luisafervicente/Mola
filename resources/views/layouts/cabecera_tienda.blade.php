<div class="container-fluid  " style="margin-top: 10px" id="cabecera">
   
    <nav class="navbar navbar-expand-lg navbar-light bg-light rounded borde">
        <a class="navbar-brand" href="{{ url('/home') }}">{{$tienda->nombre_tienda }}</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href='{{ route("quienes_somos")}}'>Quienes somos <span class="sr-only">(current)</span></a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link " href="{{ route('navegar_tiendas') }}" id="navbarSupportedContent"    aria-haspopup="true" aria-expanded="true">
                       Donde estamos
                    </a>
                   
                </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link " href="{{ route('navegar_tiendas') }}" id="navbarSupportedContent"    aria-haspopup="true" aria-expanded="true">
                       Nuestros productos
                    </a>
                   
                </li>
                @if (Route::has('login'))
                @auth
                @if(Auth::user()->rol=='administrador')   
                
                <li class="nav-item active">
                    <a class="nav-link"> Bienvenido {{ Auth::user()->name }},has entrado como administrador <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/') }}">Inicio</a>
                </li>
                
                 <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                               {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            
                @else
              
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/home') }}">Home</a>
                </li>
                 <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            @endif
                @else
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">Identificarse</a>
                </li>

                            @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{asset('register')}}">Quiero registrarme</a>
                </li>
                             @else
                <li class="nav-item">
                    <a class="nav-link" href="{{asset('register')}}">Quiero registrarme</a>
                </li>
                           @endif
                @endauth
                @endif

            </ul>

            <a href="#"><i class="fas fa-shopping-cart"></i></a> 
        </div>
    </nav>
   
</div>
