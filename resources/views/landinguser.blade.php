@extends('layouts.landing')

@section('content')

<div class="cabecera">
   
    <img class="cabecera" src="{{ asset('images/landing_user.png')}}" alt="">   

</div>

<div class="content landing">

    <h1 class="cabecera">Acampa a tu aire en los lugares más camperfriendly</h1>
    <x-spacing alto="2rem"></x-spacing>
    <a href="{{route('lista.homecamper')}}"><button type="button" class="primary">Explorar lugares campify</button></a>
    <x-spacing alto="4rem"></x-spacing>
<h2>¿Qué es campify?</h2>
<x-spacing alto="0.8rem"></x-spacing>
<p>Viaja sin preocupaciones: Somos una plataforma de reservas online adaptada al mundo camper. Con campify de lo último que te preocuparás es dónde dormirás hoy o mañana, si podrás acampar, si habrá sitio, porqué en un plis plas, este asunto estará resuelto.</p>
<p>Si tienes una camper, autocaravana, caravana o camión, ya tienes casi todo lo que necesitas. Solo te falta reservar un sitio bonito y económico donde acampar.</p>

<x-spacing alto="4rem"></x-spacing>
<a href="{{route('lista.homecamper')}}"><button class="primary">Explorar lugares campify</button></a>
<x-spacing alto="4rem"></x-spacing>

<h2>¿Qué me ofrece campify?</h2>
<x-spacing alto="0.8rem"></x-spacing>
<p>Campify es totalmente gratuito y tendrás todo lo que necesitas:</p>

<ul>
    <li>Precio regulado: Aseguramos un tope de precio por plaza</li>
    <li>El precio no se cuenta por personas, sinó por vehículo + zona de acampada</li>
    <li>Has leído bien, podrás acampar</li>
    <li>Plaza asegurada. Cuando reserves online podrás saber si hay hueco para tí</li>
    <li>Cuando hayas reservado, verás los datos de contacto del establecimiento</li>
    <li>Accede a tu área privada para consultar y gestionar tus reservas</li>
    <li>Mobilidad total: Accede a tu cuenta desde un móbil o un ordenador</li>
    <li>¿Hay algo más que te gutaría poder hacer con campify? ¡Cuéntanoslo!</li> 
</ul>

<x-spacing alto="4rem"></x-spacing>
<a href="{{route('lista.homecamper')}}"><button class="primary">Explorar lugares campify</button></a>

<x-spacing alto="4rem"></x-spacing>


<h2>¿Ya creaste una cuenta?</h2>
<x-spacing alto="0.8rem"></x-spacing>
<p>Accede a tu cuenta para consultar o gestionar tus tus reservas</p>
<x-spacing alto="0.8rem"></x-spacing>

<button class="btn-secondary"  data-toggle="modal" data-target="#login"><img src="{{asset('/images/user.svg')}}" style="width: 20px; height:20px; float:sight; margin-top:-5px; margin-right:10px;" alt="">Acceder</button>

</div>

@endsection
