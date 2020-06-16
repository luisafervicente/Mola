 <div class="container margenes" >
            <div class="row justify-center·">
     
<div class="card col-lg-4 col-md-6 col-sd-10 col-10" style="width: 18rem; margin-top: 5%; border: green solid medium;  ">
    
    <div class="card-header" style="background:green; color:white; margin-top: 5%;" >{{$tienda->nombre_tienda}}</div> 
    <div class="card-body">
         <img src="{{ asset('images/'.$tienda->image) }}" class="card-img-top" > 
  
    <p class="card-text">{{$tienda->comentarios}}</p>
  </div>
</div>
    
 
                <div class="col-lg-3 margenes" > 
                
        <button type="button" class="btn btn-warning   " style="margin:3%;">Accede a todos nuestro productos</button>
        <button type="button" class="btn btn-warning  " style="margin:3%;">Promociones especiales</button>
        <button type="button" class="btn btn-warning  " style="margin:3%;">Más sobre nosotros</button>
                
                </div>
                
                <div class="col-lg-3 margenes" >
                    <form class="form-inline">
                         <button class="btn btn-outline-success" type="submit">Buscar por producto</button>
                        <input class="form-control margenes" type="search" placeholder="Search" aria-label="Search">
                       
                    </form>  

                    
                  
                </div>
            </div>
             
        </div>

