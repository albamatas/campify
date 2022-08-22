@extends('layouts.landing')

@section('seo')
    <title>Campify, el gestor de reservas gratis para tu área camper</title>
    <meta name="description" content="Campify es una plataforma gratuita de gestión de reservas adaptada al mundo camper. Podrás gestionar las reservas de tu área camper de manera online.">

@endsection

@section('content')

<div class="cabecera">
   
    <img class="cabecera" src="{{ asset('images/homecamper_landing.png')}}" alt="Una camper en un jardín con sillas y una mesa a su alrededo">   

</div>


<div class="content landing">
    <div class="heading">
        <h1 class="">Publica tu área en <span class="campify">campify</span> y empieza a recibir reservas hoy mismo</h1>
        <x-spacing alto="2rem"></x-spacing>
        <a href="{{route('publicar')}}"><button type="button" class="primary">Publicar ahora</button></a>
       
    </div>
    <x-spacing alto="4rem"></x-spacing>
    
    
    
    <div style="display:flex; flex-direction:column; align-items:center">
        <h2 class="h2-l">Estarás al día de todas las entradas y salidas</h2>
        <x-spacing alto="0.8rem"></x-spacing>
        <p style="text-align: center">Información en tiempo real y actualizada cada instante. No te perderás nada.</p>  
        <img src="{{ asset('images/Resumen.png')}}" style="max-width:250px" alt="">
        <x-spacing alto="0.4rem"></x-spacing>
    </div>
    <x-spacing alto="4rem"></x-spacing>
    <div style="display:flex; flex-direction:column; align-items:center">
        <h2 class="h2-l">Consulta tus reservas y gestionalas al momento</h2>
        <x-spacing alto="0.8rem"></x-spacing>
        <p style="text-align: center">Tendrás disponible el detalle de la reserva y podrás gestionarlas y modificarlas siempre que quieras.</p>  
        <img src="{{ asset('images/Movimientos.png')}}" style="max-width:250px" alt="">
        <x-spacing alto="0.4rem"></x-spacing>
    </div>
    

<x-spacing alto="3rem"></x-spacing>
<a href="{{route('publicar')}}"><button class="primary">Publicar ahora</button></a>
<x-spacing alto="5rem"></x-spacing>

<h2 class="h2-l">Campify, totalmente gratis y sin letra pequeña</h2>
        <x-spacing alto="0.8rem"></x-spacing>
        <p style="text-align: center">Lo has leído bien, campify no tiene ni tendrá costes. Campify es una plataforma gratuita que te permitirá gestionar las reservas de tu área camper: publicar tu espacio, consultar y gestionar tus reservas. 
            A futuro, se pueden añadir funcionalidades nuevas consideradas premium que, si te interesan, podrás adquirir para ampliar tus posibilidades.
        </p>            

        <x-spacing alto="3rem"></x-spacing>
        <a href="{{route('publicar')}}"><button class="primary">Publicar ahora</button></a>
        <x-spacing alto="5rem"></x-spacing>

<h2 class="h2-l">Tengas lo que tengas, <span class="campify">campify</span> es para ti</h2> 
<x-spacing alto="0.8rem"></x-spacing>
<div style="display: flex; flex-wrap: wrap; flex-direction: row; justify-content: center; align-items: center;">
    <div style="display:flex; flex-direction:column; align-items:center; margin-bottom:20px; width:300px">
        <img src="{{ asset('images/caravan.png')}}" style="max-width:150px" alt="">
        <x-spacing alto="0.4rem"></x-spacing>
        <p style="text-align: center"> Áreas camper</p>
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
    <a href="{{route('publicar')}}"><button class="primary">Publicar ahora</button></a>
    <x-spacing alto="8rem"></x-spacing>


<div class="heading">
    <h2 class="h2-l">¿Ya publicaste tu zona camper en <span class="campify">campify</span>?</h2>
    <x-spacing alto="0.8rem"></x-spacing>
    <p>Accede ahora a tu cuenta y gestiona tus reservas.</p>
    <x-spacing alto="0.8rem"></x-spacing>

    <button class="btn-secondary"  data-toggle="modal" data-target="#login"><img src="{{asset('/images/user.svg')}}" style="width: 20px; height:20px; float:sight; margin-top:-5px; margin-right:10px;" alt="">Acceder</button>

</div>
    
</div>
@endsection
