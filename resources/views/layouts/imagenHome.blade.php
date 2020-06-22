 
        
        
      
        <div class="container margenes">
            <div class="row">
                <div class="col-lg-8">
                    <img  src="{{ asset('images/logobici.png') }}"  alt="logoMola" class="img-fluid borde rounded"  /> 
                </div>
                <div class="col-lg-4 col-md-4 col-sm-10 margenes" >
                    <div class=" col-lg-10 col-md-10 col-sm-10 ">
                    <form class="form-inline">
                        <button class="btn btn-outline-success margenes" type="submit">Cambio el boton</button>
                        <input class="form-control margenes margenes" type="search" placeholder="Search" aria-label="Search">
                       
                    </form>  
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-10 ">
                    <button type="button" class="btn btn-success dropdown-toggle margenes " data-toggle="dropdown">
                        Seleccionar tienda
                    </button>
                    <div class="dropdown-menu">
                        @foreach($tiendas ?? '' as $tienda)
                        <a class="dropdown-item" href="{{route('tienda.show',$tienda )}}">{{ $tienda->nombre_tienda }}</a>
                         @endforeach
                         
                     
                    </div>
                </div>
            </div>
     

        </div>
        </div>
      
         
        
 




























</html>