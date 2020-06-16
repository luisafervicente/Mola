@extends('layouts.plantilla')

@section('cabecera')

@include('layouts.cabeceraGeneral')
@stop

@section('lateral')
@include('layouts.barra_lateral')
@stop

@section('cuerpo_lateral')
<div class="container margenes">
    <div class="row">
        <div class="col-lg-8">
            <ul style=" list-style: none;" >
                <li>   <h3>Cómo pagar</h3>
                    En MipuebloMola hemos trabajado para crear un entorno 100% seguro en el que realizar tus pagos. Admitimos la mayoría de tarjetas de crédito y débito en función de las condiciones y limitaciones de la pasarela de pago, a través de nuestro TPV virtual.
                    Dicha pasarela procesa los datos en entorno seguro, mediante el cifrado de las comunicaciones, de modo que ni el establecimiento en el que has realizado tu compra, ni Mi pueblo Mola ,ni terceros ajenos tienen acceso a los datos de la tarjeta o transacción efectuada.
                    ¿Tienes dudas o necesitas ayuda? Contacta con nosotros.</li>
                <li>  <h3>Crear una cuenta</h3>
                    Para realizar una compra rápida y poder gestionar tus pedidos anteriores, tu libreta de direcciones y la configuración de tu cuenta, debes registrarte como cliente. Para ello sólo te pediremos tu nombre y apellido, una cuenta de correo electrónico válida y una contraseña que tú generarás. ¡No olvides confirmar los cuadros informativos que encontrarás en el formulario!
                    Puedes registrarte sin necesidad de realizar ninguna compra, o hacerlo en el momento de formalizar tu primera compra.  
                    Desde “Mi cuenta” podrás configurar tus datos personales, agenda de direcciones de entrega, contraseña o dirección de correo electrónico, y consultar tu historial de pedidos, datos de facturación y de pago.
                    ¿Tienes dudas o necesitas ayuda? Contacta con nosotros.</li>
                <li><h3>Métodos de envío</h3>
                    Al realizar tu compra tú eliges: recoger el producto en tienda, sin coste, o que te lo enviemos a casa con un medio de reparto sostenible y amable con el medio ambiente.  
                    En determinados productos que requieren un servicio logístico más complejo, es el propio establecimiento el que se ocupará de hacerte llegar el artículo a tu domicilio. Y para producto fresco (alimentación), contamos con un servicio logístico específico que garantiza la entrega de tu compra en óptimas condiciones.
                    Toda la información referente a las opciones de métodos de envío y posibles costes asociados aparecerán en tu carrito de la compra.
                    ¿Tienes dudas o necesitas ayuda? Contacta con nosotros.
                <li><h3>Devoluciones</h3>
                    Errare humanum est… ¿tu compra no te convence?  dispones de 14 días naturales a partir de su recepción para devolverla.  En MipuebloMola En periodo de estado de alarma dicho plazo comenzará a computarse a partir de la finalización de dicho periodo.
                    Ten en cuenta que determinados productos no admiten devolución, por ejemplo:
                    <ul> 
                        <li>Artículos confeccionados o personalizados conforme a las especificaciones del cliente</li>
                        <li>   Productos que, después de su entrega y por su naturaleza, se hayan mezclado con otros,</li>
                        <li>  El suministro de prensa diaria, publicaciones periódicas o revistas, con la excepción de los contratos de suscripción para el suministro de tales publicaciones.</li>
                        <li>  Productos desprecintados, en particular determinadas prendas de ropa, películas de cine, música, videojuegos o programas informáticos en soporte físico como CD, DVD o BlueRay.</li>
                        <li>  Ropa interior.</li>
                        <li>  Productos de alimentación.</li>
                    </ul>
                    Para devolver tu pedido debes acceder a tu cuenta y localizar el pedido en el apartado “Historial de pedidos”. Cuando lo encuentres, elige la opción “devolver pedido”; el sistema te mostrará las opciones disponibles para la devolución (entrega en tienda, entrega en oficina postal, recogida a domicilio…) y sus posibles costes asociados. Una vez se haya completado el proceso devolución, el importe del pedido será reintegrado en tu tarjeta de crédito, y el saldo de fidelización generado con dicho pedido también se anulará.
                    ¿Tienes dudas o necesitas ayuda? Contacta con nosotros.

            </ul>


        </div>
    </div>

    @stop

    @section("pie")
    @include('layouts.pieGeneral')
    @stop 