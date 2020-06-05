@extends('layouts.plantilla')
@section('cabecera')      
@include('layouts.cabeceraGeneral')
@stop
 
@section('lateral')
@include('layouts.barra_lateral')
@stop
@section('cuerpo_lateral')
 <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-8 col-8">
                    <ul style=" list-style: none;" >
                     <li>   <h3>¿Cómo surge el  proyecto M.O.L.A?</h3>
                    El proyecto Mola, Mercado Online Local Amigable, surge de la observación de   nuevos hábitos de compra
                        por una parte, y de la queja constante del comercio de proximidad, sobe todo en 
                        localidades en las que nos damos cuenta de que aunque  tienen población como  para sostener cierto número de comercios,estos nuevos habitos  
                        se transforman en una perdida  ventas, provocando la instostenibilidad de los mismos.</li>
                   <li>  <h3>¿Por qué es necesario el proyecto M.O.L.A?</h3>
                   El proyecto M.O.L.A es necesario porque aporta al pequeño comercio un espacio online donde mostrar y vender sus productos,
                        ofreciendo un complemento inovador a su actividad de una forma sencilla e intuitiva, y por otra parte
                    ofrece a los vecinos de la localidad información y acceso al comercio local de una manera diferente.</li>
                   <li><h3>¿Quién hay detras del proyecto M.O.L.A?</h3>
                       El proyecto M.O.L.A. esta gestionado por una empresa de nueva creación, "Tu pueblo MOLA SL",  que trabaja con ilusión  
                       y esfuerzo preocupandose al máximo por todos los posibles usuarios de nuestra plataforma. 
                        <li><h3>¿Cómo puedes ponerte en contacto con nosotros?</h3>
                     Para ponerte en contacto con nosotro puedes rellenar el formulario de contacto  o puedes llamarnos al telf. 55555555,
                     nuestra dirección fisica es: C/ Lanzarote, 7 local, Utebo, 50180, Zaragoza.
                    </ul>
              
                  
                </div>
            </div>
 </div>

 @endsection

@section("pie")
@include('layouts.pieGeneral')
@stop 