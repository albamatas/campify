@extends('layouts.landing')

@section('seo')
    <title>Reserva tu plaza online en áreas de autocaravanas y terrenos de particulares con Campify</title>
    <meta name="description" content="Reserva tu plaza online y acampa en áreas de autocaravana o terrenos de particulares. Fluye en tu viaje pero sin sorpresas. Gestionar tus reservas es gratis y podrás acampar sin problemas.">
    <meta name="keywords" content="reserva online area de autocaravanas, reserva area de autocaravanas, reservar, reserva, parcela, plaza, autocaravana, autocaravanas, camper, furgo, camping, terreno, gestionar reservas, gratis, gestionar reservas gratis, park4night, caramaps, camplify, campify, publicar area, ventajas publicar area">

@endsection

@section('content')

<div class="cabecera">
    <img class="cabecera"
  src="{{ asset('images/landing_user.jpg')}}" 
  alt="Una autocaravana con vistas a la montaña y a un río en el atardecer" 
  srcset="{{ asset('images/landing_user-480.jpg')}} 480w,
  {{ asset('images/landing_user-800.jpg')}} 800w,
  {{ asset('images/landing_user-1150.jpg')}} 1150w"
/>
   
</div>

<div class="content landing">

        <div class="heading destacado">
            <h1 class="">Fluye en tu viaje pero sin preocupaciones</h1>
            <p>Reserva tu plaza online en áreas de autocaravana antes de que se llenen al completo.</p>
            <x-spacing alto="2rem"></x-spacing>
            <a href="{{route('lista.homecamper')}}"><button type="button" class="primary">Explorar lugares</button></a>
           
        </div>
        <x-spacing alto="4rem"></x-spacing>


        <h2 class="h2-l">¿Te suena la incertidumbre de conducir hasta una área y no saber si tendrás hueco para dormir?</h2>
        <x-spacing alto="0.8rem"></x-spacing>
        <p style="text-align: center">Queremos que disfrutes al máximo de tus vacaciones y te olvides de todas tus preoucpaciones. Reserva online de manera fácil y rápida, y asegura tu plaza antes no se llene al completo.
        </p>   
        
        <x-spacing alto="4rem"></x-spacing>

        <h2 class="h2-l">Sin pagos extras, reservar con campify es gratis</h2>
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
    <h2 class="h2-l">¿Ya tienes cuenta?</h2>
     <p style="text-align: center"> Accede a tu área para consultar todas tus reservas y gestionarlas</p>
   
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
