@extends('layouts.resultado')

@section('title', 'Anuncio publicado')


@section('h1', 'Has pulicado tu establecimiento')



@section('resumen')


<h1>¿Y ahora qué?</h1>
<x-spacing alto="1.7rem"></x-spacing>

<h2>Gestiona tus reservas</h2>
 <x-spacing alto="1rem"></x-spacing>
 <p>Accede a tu cuenta con tu email y la contraseña que acabas de crear para gestionar todas tus reservas.</p>

 <x-spacing alto="1.2rem"></x-spacing>

 
<h2>Destaca tu establecimiento</h2>
<x-spacing alto="1rem"></x-spacing>
<p>Tu establecimiento se ha creado con los datos mínimos: Accede a tu cuenta para ampliar la información de tu establecimiento en el apartado de "Mi perfil" donde podrás añadir una descripción, los servicios que tiene y unas fotos para que reluzca.</p>

<x-spacing alto="1.2rem"></x-spacing>
 

<button class="btn-secondary"  data-toggle="modal" data-target="#login"><img src="{{asset('/images/user.svg')}}" style="width: 20px; height:20px; float:sight; margin-top:-5px; margin-right:10px;" alt="">Acceder</button>


@endsection

@section('modal')
@livewire('modal-login', [ 'acceso' => 'login', 'homecamper' => '', 'entrada' => '', 'salida' => '', 'dias' => '', 'precio' => '' ])

@endsection

 