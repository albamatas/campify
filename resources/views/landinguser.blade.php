@extends('layouts.landing')

@section('seo')
    <title>Campify, reserva tu parcela online en áreas de autocaravanas y terrenos de particulares</title>
    <meta name="description" content="Reserva tu parcela online y acampa en áreas de autocaravana o terrenos de particulares. Fluye en tu viaje pero sin sorpresas.">
    <meta name="keywords" content="reserva online area de autocaravanas, reserva area de autocaravanas, reservar, reserva, parcela, plaza, autocaravana, autocaravanas, camper, furgo, camping, terreno, gestionar reservas, gratis, gestionar reservas gratis, park4night, caramaps, airb&b, camplify, campify">

@endsection

@section('content')

<div class="cabecera">
   
    <img class="cabecera" src="{{ asset('images/landing_user_large.png')}}" 
                         sizes="(max-width: 400px) 320px, (max-width: 760px) 42px, 800px"
                                srcSet="{{ asset('images/landing_user_small.png')}} 320w,
                                    {{ asset('images/landing_user_medium.png')}} 480w,
                                    {{ asset('images/landing_user_large.png')}} 800w"
                                 alt="Lugares campify. Una camper autocaravana aparcada en el monte con unas vistas espectaculares">   

</div>

<div class="content landing">

        <div class="heading">
            <h1 class="">Con <span translate=no class="campify">campify</span> reserva tu plaza y acampa a tu aire en los lugares más camperfriendly</h1>
            <x-spacing alto="2rem"></x-spacing>
            <a href="{{route('lista.homecamper')}}"><button type="button" class="primary">Explorar lugares campify</button></a>
           
        </div>
        <x-spacing alto="4rem"></x-spacing>


        <h2 class="h2-l">Fluye en tu viaje pero sin sorpresas</h2>
        <x-spacing alto="0.8rem"></x-spacing>
        <p style="text-align: center">No te quedes sin plaza. Consulta las parcelas disponibles y reserva online, en un plis plas.
        </p>   
        
        <x-spacing alto="4rem"></x-spacing>

        <h2 class="h2-l">Money, money, money... de eso nada, el money te lo quedas tú</h2>
        <x-spacing alto="0.8rem"></x-spacing>
        <p style="text-align: center">Reservar con nosotros es totalmente gratuïto sin ningún coste añadido. Pagarás directamente allí. El precio no se cuenta por personas sinó por parcela y punto.
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
    <h2 class="h2-l">¿Quieres publicar tu área o terreno particular en campify?</h2>
    <x-spacing alto="0.8rem"></x-spacing>
    <p style="text-align: center">¿Tines un terreno, una área camper, un jardín, un restaurante, un hostal o hotel o un camping? Tengas lo que tengas, no dudes que campify es para ti. </p>
    <p style="text-align: center">Conuslta las ventajas de publicar tu área en campify.</p>
    <x-spacing alto="2rem"></x-spacing>

    <a href="{{route('landing.homecamper')}}"><button class="btn-secondary">Ir a ventajas de publicar en campify</button></a>

</div>


</div>


@endsection
