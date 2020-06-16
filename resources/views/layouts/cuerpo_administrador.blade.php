<div class="container margenes"  >
    <div >  

        <a href="{{ route('administrador.index')}}"> <button type="button" class="btn btn-success   col-lg-3 col-md-3 col-sm-5 col-5 " >Gestionar administradores</button></a>
        <a href="{{ route('tienda.index') }}"><button type="button" class="btn btn-success col-lg-3 col-md-3 col-sm-5 col-5"  >Gestionar tiendas</button></a>
        <a href="{{ route('producto.index') }}"><button type="button" class="btn btn-success col-lg-3 col-md-3 col-sm-5 col-5"  >Gestionar productos</button></a>
    </div><br>
    <div >
        <a href="{{ route('cliente.index') }}"><button type="button" class="btn btn-warning col-lg-2 col-md-3 col-sm-5 col-5"  >Gestionar clientes</button></a>
        <a href="{{ route('vendedor.index') }}"><button type="button" class="btn btn-warning col-lg-3 col-md-3 col-sm-5 col-5"  >Gestionar vendedores</button></a>
        <a href="{{ route('direccion.index') }}"><button type="button" class="btn btn-warning col-lg-3 col-md-3 col-sm-5 col-5"  >Gestionar direcciones</button></a>
 
 
        <a href="{{ route('users.index') }}"><button type="button" class="btn btn-warning col-lg-2 col-md-3 col-sm-5 col-5">Ver usuarios</button></a>
    </div>
</div>
<div class="container margenes" style=" display: flex; justify-content:center; flex-wrap: ;   " >
    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-5 col-5" style="margin:2%;">
            <h6>Aviso de reparto</h6><a href="#"><img  src="{{ asset('images/sobre_cerrado.png') }}"  alt="sobre" class="img-fluid " /> </a>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-5 col-5" style="margin:2%;">
            <h6>Vendedores</h6><a href="#"><img  src="{{ asset('images/sobre_cerrado.png') }}"  alt="sobre" class="img-fluid "   /> </a>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-5 col-5" style="margin:2%;">
            <h6>Clientes</h6><a href="#"><img  src="{{ asset('images/sobre_cerrado.png') }}"  alt="sobre" class="img-fluid "    /> </a>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-5 col-5" style="margin:2%;">
            <h6>Otros</h6><a href="#"><img  src="{{ asset('images/sobre_cerrado.png') }}"  alt="sobre" class="img-fluid "   /> </a>
        </div>

    </div>
</div>
    
