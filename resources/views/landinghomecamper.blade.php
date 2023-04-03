@extends('layouts.landing')

@section('seo')
    <title>Campify: Reservas Online para Áreas de Autocaravanas - Gestiona tu Espacio con Nuestra Plataforma</title>
    <meta name="description" content="Gestiona las reservas online de tu área de autocaravana de manera eficiente con nuestra plataforma online. Ahorra tiempo y dinero al permitir la reserva y gestión en línea. ¡Empieza ahora y disfruta de la comodidad de gestionar tus reservas desde cualquier lugar y cualquier dispositivo!">
    <meta name="keywords" content="Reservas online, Áreas de autocaravanas, Gestión de espacios, Plataforma de reservas, Autocaravanas, Gestión de reservas, Reserva de aparcamiento, Camping en autocaravana, terreno">

@endsection

@section('content')

<div class="heading_homecamper">
    <h1 class="">Ahorra tiempo y aumenta tus ingresos con la gestión de reservas online de tu área de autocaravanas</h1>
    <x-spacing alto="2rem"></x-spacing>
    <a href="{{route('publicar')}}"><button type="button" class="primary">Empezar ahora gratis</button></a>
   
</div>

<div class="content_home_landing">
    
    <x-spacing alto="4rem"></x-spacing>
    
    
    <div style="display:flex; flex-direction:column; align-items:center">
        <h2 class="h2-l">Mejora el servicio</h2>
        <x-spacing alto="0.8rem"></x-spacing>
        <p style="text-align: center">Tus clientes podrán reservar online mientras tu dejas de preocuparte por responder llamadas o emails.</p>  
        <img src="{{ asset('images/land_reserva.png')}}" style="max-width:250px" alt="">
        <x-spacing alto="0.4rem"></x-spacing>
    </div>
    <x-spacing alto="4rem"></x-spacing>

    <div style="display:flex; flex-direction:column; align-items:center">

        <h2 class="h2-l">Al día de todas las llegadas y salidas</h2>
        <x-spacing alto="0.8rem"></x-spacing>
        <p style="text-align: center">Información en tiempo real de toda la actividad en tu pantalla de inicio..</p>  
        <img src="{{ asset('images/Resumen.png')}}" style="max-width:250px" alt="">
        <x-spacing alto="0.4rem"></x-spacing>
    </div>
    <x-spacing alto="4rem"></x-spacing>
    <div style="display:flex; flex-direction:column; align-items:center">
        <h2 class="h2-l">Gestiona las reservas</h2>
        <x-spacing alto="0.8rem"></x-spacing>
        <p style="text-align: center">Olvídate del papel o de los excels para gestionar tus reservas, ahora las tendrás en la palma de tu mano.</p>  
        <img src="{{ asset('images/Movimientos.png')}}" style="max-width:250px" alt="">
        <x-spacing alto="0.4rem"></x-spacing>
    </div>
    

<x-spacing alto="3rem"></x-spacing>
<a href="{{route('publicar')}}"><button class="primary">Empezar ahora gratis</button></a>
<x-spacing alto="6rem"></x-spacing>

        
        <div class="card-landing">
            <div class="green-header">
                <h2>Con campify todo son ventajas</h2>
               <!-- <div><span id="price">0</span><span id="euro"> €</span>
                </div> -->
            </div>
            <div class="card-ventajas">
                <ul>
                    <li><img src="{{ asset('images/Check.png')}}" alt="Ventaja">Gratis para tí y para tus clientes</li> 
                    <li><img src="{{ asset('images/Check.png')}}" alt="Ventaja">Recibe reservas online</li> 
                    <li><img src="{{ asset('images/Check.png')}}" alt="Ventaja">Emails de confirmación automática al crear o modificar una reserva</li> 
                    <li><img src="{{ asset('images/Check.png')}}" alt="Ventaja">Resumen de las llegadas, salidas y la ocupación diaria</li> 
                    <li><img src="{{ asset('images/Check.png')}}" alt="Ventaja">Buscador de reservas eficiente</li> 
                    <li><img src="{{ asset('images/Check.png')}}" alt="Ventaja">Gestión de reservas: crea, modifica o cancela reservas</li>  
                    <li><img src="{{ asset('images/Check.png')}}" alt="Ventaja">Con el dispositivo que mejor te convenga: móvil, tablet o ordenador</li>  
                </ul>
            </div>

        </div>
       

        <x-spacing alto="6rem"></x-spacing>
                    

<h2 class="h2-l">Tengas lo que tengas, <span translate=no class="campify">campify</span> es para tí</h2> 
<x-spacing alto="0.8rem"></x-spacing>
<div style="display: flex; flex-wrap: wrap; flex-direction: row; justify-content: center; align-items: center;">
    <div style="display:flex; flex-direction:column; align-items:center; margin-bottom:20px; width:300px">
        <img src="{{ asset('images/caravan.png')}}" style="max-width:150px" alt="">
        <x-spacing alto="0.4rem"></x-spacing>
        <p style="text-align: center"> Áreas de autocaravanas</p>
    </div>
    <x-spacing alto="1rem"></x-spacing>
    <div style="display:flex; flex-direction:column; align-items:center; margin-bottom:20px; width:300px">
        <img src="{{ asset('images/paisaje.png')}}" style="max-width:150px" alt="">
        <x-spacing alto="0.4rem"></x-spacing>
        <p style="text-align: center">Un terreno en plena naturaleza</p>
    </div>
    <x-spacing alto="1rem"></x-spacing>
    <div style="display:flex; flex-direction:column; align-items:center; margin-bottom:20px; width:300px">
        <img src="{{ asset('images/barn.png')}}" style="max-width:150px" alt="">
        <x-spacing alto="0.4rem"></x-spacing>
        <p style="text-align: center">Una granja</p>
    </div>
    <x-spacing alto="1rem"></x-spacing>
    <div style="display:flex; flex-direction:column; align-items:center; margin-bottom:20px; width:300px">
        <img src="{{ asset('images/camping-tent (1).png')}}" style="max-width:150px" alt="">
        <x-spacing alto="0.4rem"></x-spacing>
        <p style="text-align: center">Un camping</p>
    </div>
    <x-spacing alto="1rem"></x-spacing>
    <div style="display:flex; flex-direction:column; align-items:center; margin-bottom:20px; width:300px">
        <img src="{{ asset('images/casa.png')}}" style="max-width:150px" alt="">
        <x-spacing alto="0.4rem"></x-spacing>
        <p style="text-align: center"> Una casa particular con jardín</p>
    </div>
    <x-spacing alto="1rem"></x-spacing>
    <div style="display:flex; flex-direction:column; align-items:center;  width:300px">
        <img src="{{ asset('images/hotel.png')}}" style="max-width:150px" alt="">
        <x-spacing alto="0.4rem"></x-spacing>
        <p style="text-align: center">Un hotel, hostal o restaurante con parking al aire libre o jardín</p>
    </div>
</div>

    <x-spacing alto="3rem"></x-spacing>
    <a href="{{route('publicar')}}"><button class="primary">Empezar ahora gratis</button></a>
    <x-spacing alto="8rem"></x-spacing>




<div class="heading">
    <h2 class="h2-l">¿Ya publicaste tu área de autocaravanas en <span translate=no class="campify">campify</span>?</h2>
    <x-spacing alto="0.8rem"></x-spacing>
    <p style="text-align: center">Accede ahora a tu cuenta y gestiona tus reservas.</p>
    <x-spacing alto="0.8rem"></x-spacing>

    <button class="btn-secondary"  data-toggle="modal" data-target="#login"><img src="{{asset('/images/user.svg')}}" style="width: 20px; height:20px; float:sight; margin-top:-5px; margin-right:10px;" alt="">Acceder</button>

</div>
<x-spacing alto="4rem"></x-spacing>
<h2 class="h2-l">Quieres reservar tu plaza en una área de autocaravanas con <span translate=no class="campify">campify</span>?</h2>
<x-spacing alto="0.8rem"></x-spacing>

<a href="{{route('home')}}"><button class="btn-secondary">Ir a reservar plaza</button></a>

  
</div>

</div>
@endsection
