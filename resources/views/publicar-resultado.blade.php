@extends('layouts.resultado')

@section('title', 'Anuncio publicado')


@section('h1', 'Has pulicado tu establecimiento')



@section('resumen')


<h1>¿Y ahora qué?</h1>
<x-spacing alto="3rem"></x-spacing>

<h2>Comparte este enlace con tus clientes para que reserven online</h2>
<x-spacing alto="1rem"></x-spacing>
<p>Incluye este enlace en tu web o en las aplicaciones camper como Park4night o Caramaps para dirigir directamente a la reserva.</p>
<a translate="no" href="{{route('vista.homecamper', [$homecamper->slug])}}">www.campify.es/public/reservar_en/{{$homecamper->slug}}</a> 
<x-spacing alto="3rem"></x-spacing>

<h2>Gestiona tus reservas</h2>
 <x-spacing alto="1rem"></x-spacing>
 <p>Accede a tu cuenta con tu email y la contraseña que acabas de crear para gestionar todas tus reservas.</p>
 <p>Tambien te recomendamos ampliar tu información: añade una descripción, los servicios que tiene y unas fotos para que reluzca.</p>

 <x-spacing alto="1.2rem"></x-spacing>


 

<a href="{{route('login')}}"> <button class="btn-secondary"  ><img src="{{asset('/images/user.svg')}}" style="width: 20px; height:20px; float:sight; margin-top:-5px; margin-right:10px;" alt="">Acceder </button></a>


@endsection

@section('modal')
@livewire('modal-login', [ 'acceso' => 'login', 'homecamper' => '', 'entrada' => '', 'salida' => '', 'dias' => '', 'precio' => '' ])

@endsection

 