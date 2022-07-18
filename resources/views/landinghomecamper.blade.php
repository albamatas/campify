@extends('layouts.landing')

@section('content')

<div class="cabecera">
   
    <img class="cabecera" src="{{ asset('images/homecamper_landing.png')}}" alt="">   

</div>

<div class="content landing">

    <h1 class="cabecera">Publica tu área o zona camper y empieza a recibir reservas hoy mismo</h1>
    <x-spacing alto="2rem"></x-spacing>
    <a href="{{route('publicar')}}"><button type="button" class="primary">Publicar anuncio gratis</button></a>
    <x-spacing alto="4rem"></x-spacing>
    <h2>¿Qué es campify?</h2>
<x-spacing alto="0.8rem"></x-spacing>
<p>Somos una plataforma gratuita de gestión de reservas adaptada al mundo camper que incluye todo lo que necesitas:

    <div style="display:flex; flex-direction:column; align-items:center">
        <img src="{{ asset('images/publicar.png')}}" style="max-width:250px" alt="">
        <x-spacing alto="0.4rem"></x-spacing>
        <p style="text-align: center"> Publica tu anuncio y empieza a recibir visitas y reservas hoy mismo</p>
    </div>
    <x-spacing alto="1rem"></x-spacing>
    <div style="display:flex; flex-direction:column; align-items:center">
        <img src="{{ asset('images/Resumen.png')}}" style="max-width:250px" alt="">
        <x-spacing alto="0.4rem"></x-spacing>
        <p style="text-align: center"> Consulta la ocupación, las entradas y las salidas de cada día</p>
    </div>
    <x-spacing alto="1rem"></x-spacing>
     <div style="display:flex; flex-direction:column; align-items:center">
        <img src="{{ asset('images/Movimientos.png')}}" style="max-width:250px" alt="">
        <x-spacing alto="0.4rem"></x-spacing>
        <p style="text-align: center"> Gestiona tus reservas: Podrás consultar y gestionar tus reservas</p>
    </div>


<x-spacing alto="4rem"></x-spacing>
<a href="{{route('publicar')}}"><button class="primary">Publicar anuncio gratis</button></a>
<x-spacing alto="4rem"></x-spacing>

<h2>Tengas lo que tengas, campify es para ti</h2> 
<div style="display: flex; flex-wrap: wrap; flex-direction: row; justify-content: center; align-items: center;">
    <div style="display:flex; flex-direction:column; align-items:center; width:300px">
        <img src="{{ asset('images/caravan.png')}}" style="max-width:150px" alt="">
        <x-spacing alto="0.4rem"></x-spacing>
        <p style="text-align: center"> Áreas camper</p>
    </div>
    <x-spacing alto="1rem"></x-spacing>
    <div style="display:flex; flex-direction:column; align-items:center; width:300px">
        <img src="{{ asset('images/paisaje.png')}}" style="max-width:150px" alt="">
        <x-spacing alto="0.4rem"></x-spacing>
        <p style="text-align: center">Un terreno en plena naturaleza</p>
    </div>
    <x-spacing alto="1rem"></x-spacing>
    <div style="display:flex; flex-direction:column; align-items:center; width:300px">
        <img src="{{ asset('images/barn.png')}}" style="max-width:150px" alt="">
        <x-spacing alto="0.4rem"></x-spacing>
        <p style="text-align: center">Una granja</p>
    </div>
    <x-spacing alto="1rem"></x-spacing>
    <div style="display:flex; flex-direction:column; align-items:center; width:300px">
        <img src="{{ asset('images/camping-tent (1).png')}}" style="max-width:150px" alt="">
        <x-spacing alto="0.4rem"></x-spacing>
        <p style="text-align: center">Un camping</p>
    </div>
    <x-spacing alto="1rem"></x-spacing>
    <div style="display:flex; flex-direction:column; align-items:center; width:300px">
        <img src="{{ asset('images/casa.png')}}" style="max-width:150px" alt="">
        <x-spacing alto="0.4rem"></x-spacing>
        <p style="text-align: center"> Una casa particular con jardín</p>
    </div>
    <x-spacing alto="1rem"></x-spacing>
    <div style="display:flex; flex-direction:column; align-items:center; width:300px">
        <img src="{{ asset('images/hotel.png')}}" style="max-width:150px" alt="">
        <x-spacing alto="0.4rem"></x-spacing>
        <p style="text-align: center">Un hotel, hostal o restaurante con parking al aire libre o jardín</p>
    </div>
</div>

    <x-spacing alto="4rem"></x-spacing>
    <a href="{{route('publicar')}}"><button class="primary">Publicar anuncio gratis</button></a>
    <x-spacing alto="4rem"></x-spacing>

    
<h2>¿Qué condiciones tiene campify?</h2>
<x-spacing alto="0.8rem"></x-spacing>
<p>Para ser un campify de verdad, necesitarás cumplir las siguientes condiciones: </p>
    <ul>
        <li>Permitir la acampada</li>
        <li>Contar como plaza el espacio que ocupa el vehículo + espacio para la acampada (sillas, mesas, toldo, etc)</li>
        <li>Plazas niveladas</li>
        <li>Precio razonable</li> 
    </ul>
  

<x-spacing alto="4rem"></x-spacing>
<a href="{{route('publicar')}}"><button class="primary">Publicar anuncio gratis</button></a>
<x-spacing alto="4rem"></x-spacing>

    <h2>¿Ya publicaste tu establecimiento?</h2>
    <x-spacing alto="0.8rem"></x-spacing>
    <p>Accede a tu cuenta y gestiona tus reservas</p>
    <x-spacing alto="0.8rem"></x-spacing>

    <button class="btn-secondary"  data-toggle="modal" data-target="#login"><img src="{{asset('/images/user.svg')}}" style="width: 20px; height:20px; float:sight; margin-top:-5px; margin-right:10px;" alt="">Acceder</button>

</div>
@endsection
