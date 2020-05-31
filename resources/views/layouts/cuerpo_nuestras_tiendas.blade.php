 <div class="container "  >
    @foreach($tiendas as $tienda)
    <div class="row" >
        <div class=" col-lg-10 ">   
             <div class="row" style="display:flex;" >
                 
<div class="card col-lg-3 col-md-3 col-sm-6 col-10 margentotal "  >
    <img src="{{ asset ('images/{{$tienda->imagen}}') }}" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">{{ $tienda->nombre_tienda }}</h5>
    <p class="card-text">{{ $tienda->comentarios }}</p> 
  </div>
   
  <div class="card-body">
    <a href="#" class="card-link">Visitanos</a>
     
  </div>
</div>
    @endforeach
</div>
</div>
    </div>
 </div>