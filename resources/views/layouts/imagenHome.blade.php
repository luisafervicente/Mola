 
        
        
        
        <div class="container margenes">
            <div class="row">
                <div class="col-lg-8">
                    <img  src="{{ asset('imagenes/logobici.png') }}"  alt="logoMola" class="img-fluid borde rounded"  /> 
                </div>
                <div class="col-lg-4 margenes" >
                    <form class="form-inline">
                         <button class="btn btn-outline-success" type="submit">Buscar por producto</button>
                        <input class="form-control margenes" type="search" placeholder="Search" aria-label="Search">
                       
                    </form>  

                    <button type="button" class="btn btn-success dropdown-toggle margenes" data-toggle="dropdown">
                        Seleccionar tienda
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">Link 1</a>
                        <a class="dropdown-item" href="#">Link 2</a>
                        <a class="dropdown-item" href="#">Link 3</a>

                    </div>
                </div>
            </div>
            @yield('cuerpo')

        </div>
      
         
        
 




























</html>