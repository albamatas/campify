@extends('layouts.landing')

@section('seo')
    <title>Campify: Reserva online y gratis de estancias en áreas camper.r</title>
    <meta name="description" content="Campify es una plataforma gratuita de gestión de reservas adaptada al mundo camper. Podrás reservar en áreas camper gratis y online">

@endsection

@section('content')

<div class="cabecera">
   
    <img class="cabecera" src="{{ asset('images/landing_user.png')}}" alt="Una camper-autocaravana aparcada en el monte con unas vistas espectaculares">   

</div>

<div class="content landing">

        <div class="heading">
            <h1 class="">Con <span class="campify">campify</span> reserva y acampa a tu aire en los lugares más camperfriendly</h1>
            <x-spacing alto="2rem"></x-spacing>
            <a href="{{route('lista.homecamper')}}"><button type="button" class="primary">Explorar lugares campify</button></a>
           
        </div>
        <x-spacing alto="4rem"></x-spacing>


        <h2 class="h2-l">Fluye en tu viaje pero sin sorpresas</h2>
        <x-spacing alto="0.8rem"></x-spacing>
        <p style="text-align: center">Consulta la disponibilidad de manera online, fácil y rápida, y asegura tu plaza antes no se llene al completo.
        </p>   
        
        <x-spacing alto="4rem"></x-spacing>

        <h2 class="h2-l">Money, money, money... de eso nada, el money te lo quedas tú</h2>
        <x-spacing alto="0.8rem"></x-spacing>
        <p style="text-align: center">Reservar con campify no solo es totalmente gratuïto sinó que nos aseguramos que los precios por plaza y noche estén regulados. El precio no se cuenta por personas sinó por vehículo + plaza de acampada.
        </p>    
        
        <x-spacing alto="4rem"></x-spacing>

        <h2 class="h2-l">Acampada sí o sí</h2>
        <x-spacing alto="0.8rem"></x-spacing>
        <p style="text-align: center">Lo has leído bien, así de sencillo y como debería ser, podrás acampar.
        </p>            

<x-spacing alto="3rem"></x-spacing>
<a href="{{route('lista.homecamper')}}"><button class="primary">Explorar lugares campify</button></a>
<x-spacing alto="8rem"></x-spacing>



<div class="heading">
    <h2 class="h2-l">¿Ya tienes cuenta? <br> Accede a tu área para consultar todas tus reservas y gestionarlas</h2>
   
    <x-spacing alto="2rem"></x-spacing>

    <button class="btn-secondary"  data-toggle="modal" data-target="#login"><img src="{{asset('/images/user.svg')}}" style="width: 20px; height:20px; float:sight; margin-top:-5px; margin-right:10px;" alt="">Acceder</button>

</div>

<x-spacing alto="4rem"></x-spacing>


<div style="">
    <h2 class="h2-l">¿Quieres publicar tu casa o área en campify?</h2>
    <x-spacing alto="0.8rem"></x-spacing>
    <p style="text-align: center">¿Tines un terreno, una área camper, un jardín, un restaurante, un hostal o hotel o un camping? Tengas lo que tengas, no dudes que campify es para ti. </p>
    <p tyle="text-align: center">Conuslta las ventajas de publicar tu área en campify</p>
    <x-spacing alto="2rem"></x-spacing>

    <a href="{{route('landing.homecamper')}}"><button class="btn-secondary">Ir a ventajas de campify</button></a>

</div>


</div>


@endsection
