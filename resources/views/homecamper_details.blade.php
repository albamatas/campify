@extends('layouts.landing')

@section('content')

<div class="">
    <div id="imagenes" class="carousel slide" data-bs-ride="false" data-bs-touch="true" data-bs-interval="false">
        
        <div class="carousel-inner">
            @if ($homecamper->fotos->count() == 0)
            <img src="{{asset('images/sinfoto.png')}}" class="d-block w-100" alt="">
            @else
                @foreach ($homecamper->fotos as $foto)
                @if ($foto->id == $homecamper->fotos->first()->id)
                    <div class="carousel-item active">
                        <img src="{{ asset($foto->url) }}" class="d-block w-100" alt="">
                    </div>
                @else
                    <div class="carousel-item">
                        <img src="{{ asset($foto->url) }}" class="d-block w-100" alt="">
                    </div>
                @endif
                    
                @endforeach
            @endif
           
        
        </div>
        <div class="contar-img"></div>
        <button class="carousel-control-prev" type="button" data-bs-target="#imagenes" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#imagenes"  data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
   
      

</div>

<div class="content-view">

    <h1 class="cabecera">{{$homecamper->nombre}}</h1>
    <div id="direccion">
        <img  style="display: inline-block !important;" src="{{ asset('images/ubicacion.svg')}}" alt="">
        <p class="hint" style="display:inline; margin-left: 5px;" >{{$homecamper->direccion->calle . ' nº ' . $homecamper->direccion->numero . ', ' . $homecamper->direccion->poblacion->poblacion . ', ' . $homecamper->direccion->provincia->provincia}}</p>
    </div>

    <x-spacing alto="1rem"></x-spacing>

    <hr>
  
    <x-spacing alto="1rem"></x-spacing>

    <!-- <p>Idioma: </p> <div id="google_translate_element" class="google"></div>
    -->
    <script type="text/javascript">
    function googleTranslateElementInit() {
        new google.translate.TranslateElement({pageLanguage: 'es', includedLanguages: 'ca,en,fr,it,pt,de', layout: google.translate.TranslateElement.InlineLayout.SIMPLE, gaTrack: true}, 'google_translate_element');
            }
    </script>
    
    <script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

    <x-spacing alto="1rem"></x-spacing>



@if(!$homecamper->descripcion)

@else
    <p>{{$homecamper->descripcion}}</p>
    <x-spacing alto="2rem"></x-spacing>
@endif



<h2>Tipo</h2>
<p>{{$homecamper->tipo->tipo}}</p>


<x-spacing alto="2rem"></x-spacing>

<h2>Servicios</h2>

@if(blank($homecamper->servicios))
    <p>Sin servicios</p>
@else
<x-spacing alto="0.8rem"></x-spacing>
    <ul>
        @foreach ($homecamper->servicios as $servicio )
        <li>{{$servicio->servicio->servicio}}</li>
        @endforeach
    </ul>
@endif

<x-spacing alto="2rem"></x-spacing>

<h2>Plazas</h2>
<p>{{$homecamper->plazas}}</p>

<x-spacing alto="2rem"></x-spacing>

<h2>Precio por 24/h y por acampar</h2>
<p class="hint">*Este precio incluye únicamente la plaza. Los servicios como la electricidad, puede que estén incluidos o se cobren a parte.</p>
<p class="hint">*La reserva es totalmente gratuïta y durante la reserva tampoco se te pedirá ningún método de pago. El pago lo gestionará el área camper en el momento de tu llegada o una vez hayas disfrutado de tu estancia. </p>
<p>{{$homecamper->precio}} €</p>

<x-spacing alto="3rem"></x-spacing>
<a class="link-back" href="{{route('lista.homecamper')}}" style="padding-left:0"> < Volver al listado</a>
<x-spacing alto="3rem"></x-spacing>


</div>

<div class="botonera" style="z-index:1000; left:0;">
   
        <a class="btn primary" href="{{route('reservar', [$homecamper->id])}}">
            Reservar gratis
        </a>
        
</div>

@endsection
