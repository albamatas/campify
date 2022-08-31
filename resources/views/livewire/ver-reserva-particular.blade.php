<div class="dash_container">
    <x-lean::console-log /> 

    <x-spacing alto="0.7rem"></x-spacing>
    <a class="link-back"style="position: relative; float: right; margin-top: 10px; "  href="{{route('dashboard-homecamper') }}"><img style="width: 30px" src="{{ asset('images/close.svg') }}" alt="Cerrar"> </a>
    <x-spacing alto="1.4rem"></x-spacing>
    
    <h4 style="margin-left:20px">Tu reserva en:</h4>
    <h1 style="max-width: 90vw">{{$reserva->homecamper->nombre}}</h1>
    <x-spacing alto="1.7rem"></x-spacing>

    <div class="wrapper">

         <div class="wrapper_actividad">
            
            <div class="actividad">
                    <div class="content_actividad">
                        <div class="item_actividad">
                            <img src="{{ asset('images/img_entrada.svg') }}" alt="">
                            <p class="categoria_actividad">Entrada</p>
                            <p class="number_actividad c_entrada blink" style="font-size:120%">{{date("d/m/Y", strtotime($reserva->entrada))}}</p>
                        </div>
                        <div class="item_actividad">
                            <img src="{{ asset('images/img_salida.svg') }}" alt="">
                            <p class="categoria_actividad">Salida</p>
                            <p class="number_actividad c_salida blink" style="font-size:120%" id="n_salidas">{{date("d/m/Y", strtotime($reserva->salida))}}</p>
                        </div>
                        <div class="item_actividad">
                            <img src="{{ asset('images/img_noche.svg') }}" alt="">
                            <p class="categoria_actividad">Pernoctas</p>
                            <p class="number_actividad c_pernocta blink" style="font-size:120%">{{$reserva->dias}}</p>
                        </div>
                        <hr>
                        <div class="item_actividad">
                            <div style="width:48px; margin-right:20px"></div>
                            <p class="categoria_actividad">Total</p>
                            <p class="number_actividad blink" style="font-size:120%">{{$reserva->precio}} €</p>
                        </div>
                        <p>Si quieres modificar la reserva, contacta con el establecimiento.</p>
                    
                    </div>
            </div>
            <x-spacing alto="2rem"></x-spacing>
            <h2>Datos de contacto de {{$reserva->homecamper->nombre}}</h2>
            <x-spacing alto="0.7rem"></x-spacing>
            <div class="actividad">
                <div class="content_actividad">
                     <p><strong>Teléfono</strong><br>
                         {{$reserva->homecamper->user->telefono}}</p>
                    
                    <p><strong>Email</strong><br>
                        {{$reserva->homecamper->user->email}}</p>
                    
                    
                    <p><strong>Dirección</strong><br>
                    {{$reserva->homecamper->direccion->calle . ' Nº ' . $reserva->homecamper->direccion->numero . ', ' . $reserva->homecamper->direccion->poblacion->poblacion . ', ' .  $reserva->homecamper->direccion->provincia->provincia}}</p>
                    
                    
                </div>
                       
            </div>

            <x-spacing alto="2rem"></x-spacing>
            <h2>Detalle ficha de: {{$reserva->homecamper->nombre}}</h2>
            <x-spacing alto="0.7rem"></x-spacing>
            <div class="actividad">
                <div class="content_actividad">
                    <p>Accede a la ficha del establecimiento si quieres ver sus fotos, los servicios disponibles y ampliar información</p>
                    <button data-toggle="modal" data-target="#fechas" wire:click="" class="btn-secondary" >  <a href="{{route('vista.homecamper', $reserva->homecamper)}}" style="text-decoration:none; color:#111111">Acceder a su ficha</a></button>
                </div>
            </div>
        </div>  
    </div>
    <x-spacing alto="1rem"></x-spacing>
     <a class="link-back" href="{{route('dashboard-homecamper') }}"> < Volver a mis reservas</a>
    <x-spacing alto="1.4rem"></x-spacing>
   

   
</div>


