<div>
    <x-spacing alto="5rem"></x-spacing>
    <h1 style="margin-left:20px">Encuentra los lugares más campify</h1>
    <x-spacing alto="2rem"></x-spacing>
        

    @while ($i <= $j)
        @isset($homecamper[$i])
           
        <div class="card" onclick="window.localStorage.setItem('scroll', JSON.stringify(window.scrollY));">

            <a href="{{route('vista.homecamper', $homecamper[$i])}}" style="text-decoration:none; color:#111111"> 
                @if (blank($homecamper[$i]->fotos))

                    <img src="{{ asset('images/sinfoto.png') }}" alt="">
                @else
                    <img src="{{ asset($homecamper[$i]->fotos[0]->url) }}" alt=""> 
                @endif
             
                <div class="card-inner">
                    <p style="margin-bottom:2px"><strong>{{$homecamper[$i]->nombre}}</strong></p>
                    <div id="direccion">
                        <img  style="display: inline-block !important; width:auto" src="{{ asset('images/ubicacion.svg')}}" alt="">
                        <p class="hint" style="display:inline; margin-left: 5px;" >{{$homecamper[$i]->direccion->calle . ' nº ' . $homecamper[$i]->direccion->numero . ', ' . $homecamper[$i]->direccion->poblacion->poblacion . ', ' . $homecamper[$i]->direccion->provincia->provincia}}</p>
                    </div>
                </div>
            </a>
        </div>
            <x-spacing alto="0.7rem"></x-spacing>

        @endisset

            @php
            $i++;          
            @endphp

        
    @endwhile

    
    @empty($homecamper[$i])
    <x-spacing alto="2rem"></x-spacing>
     <p style="margin: 20px auto; text-align: center;">No hay más resultados</p>
    @endempty
    @isset($homecamper[$i])
    <x-spacing alto="2rem"></x-spacing>
     <button class="btn-secondary" wire:click="mostrarMas()">Ver más resultados</button>
    @endisset

    <script>
        $( document ).ready(function() {
           var storageScroll = window.localStorage.getItem('scroll');
           console.log('storage' . storageScroll );
           var scroll = parseInt(storageScroll)
           console.log('storage' . scroll );

            $('html, body').scrollTop(scroll);
          
        console.log( scroll );
     });
        
        
    </script>

   
    

</div>


