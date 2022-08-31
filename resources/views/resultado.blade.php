@extends('layouts.resultado')

@section('title', 'Anuncio publicado')


@section('h1', 'Has completado la reserva')



@section('resumen')


<h2>{{$homecamper->nombre}}, espera tu llegada para el día {{ date("d/m/Y", strtotime($reserva->entrada)) }}</h2>
<x-spacing alto="1rem"></x-spacing>

<p><strong>Día de entrada</strong><br>
{{date("d/m/Y", strtotime($reserva->entrada))}}</p>

<p><strong>Día de salida</strong><br>
{{date("d/m/Y", strtotime($reserva->salida))}}</p>

<p><strong>Nº total de noches</strong><br>
    {{$reserva->dias}}</p>
    
<p><strong>Precio total</strong><br>
 {{$reserva->precio}}€</p>
 <p class="hint">*Este precio incluye la estada según los días seleccionados. Los servicios del establecimiento, por ejemplo la electricidad, puede que se calculen a parte.</p>

 <x-spacing alto="0.7rem"></x-spacing>
<hr>
<x-spacing alto="1.2rem"></x-spacing>
 <h2>Datos de contacto de {{$homecamper->nombre}}</h2>
 <x-spacing alto="1rem"></x-spacing>
 <p><strong>Teléfono</strong><br>
{{$homecamper->user->telefono}}</p>

<p><strong>Email</strong><br>
    {{$homecamper->user->email}}</p>

<x-spacing alto="0.7rem"></x-spacing>
<hr>
<x-spacing alto="1.2rem"></x-spacing>
 <h2>Ubicación de {{$homecamper->nombre}} </h2>

<p><strong>Dirección</strong><br>
{{$homecamper->direccion->calle . ' Nº ' . $homecamper->direccion->numero . ', ' . $homecamper->direccion->poblacion->poblacion . ', ' .  $homecamper->direccion->provincia->provincia}}</p>

<x-spacing alto="0.7rem"></x-spacing>
<hr>
<x-spacing alto="1.2rem"></x-spacing>
 <h2>Acceso a tu cuenta</h2>

<p>Accede a tu cuenta para consultar y gestionar tus reservas</p>
<x-spacing alto="0.4rem"></x-spacing>
<button data-toggle="modal" data-target="#fechas" wire:click="" class="btn-secondary" >  <a href="{{route('dashboard-homecamper')}}" style="text-decoration:none; color:#111111">Acceder</a></button>
<x-spacing alto="1rem"></x-spacing>

@endsection

