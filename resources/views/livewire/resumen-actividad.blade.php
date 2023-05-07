<div wire:poll.visible.10s>

    <div class="topday">
        @if ($diaconsulta != null)
            @if (date("d/m/Y", strtotime($hoy)) == date("d/m/Y", strtotime($diaconsulta)))
                <p><strong> Hoy, {{date("d/m/Y", strtotime($hoy))}}</strong></p>
            @else
                <p><strong> {{date("d/m/Y", strtotime($diaconsulta))}}</strong></p>
            @endif
        @else
            <p><strong> Hoy, {{date("d/m/Y", strtotime($hoy))}}</strong></p>
        @endif
    </div>
   
    <x-spacing alto="1rem"></x-spacing>
    <h1 id="h1-scroll"><strong style="font-weight: 900">{{ $user->homecamper->nombre}}</strong><br>
        Tu actividad prevista</h1>
        <x-spacing alto="2rem"></x-spacing>
                     
            
        <div class="wrapper">
    
             <div class="wrapper_actividad">
                <div class="actividad">
                        
                        <div class="content_actividad">
                            <x-spacing alto="1rem"></x-spacing>
                            <div class="tabs" id="header-fecha" style="justify-content: space-between">
                                <div id="arrow-back" class="back make-blinking" wire:click="diaAnterior" style="border: 0px; border-radius: 4px" alt="Ir a resumen del día anterior"></div>
                                @if ($diaconsulta != null)
                                
                                    @if (date("d/m/Y", strtotime($hoy)) == date("d/m/Y", strtotime($diaconsulta)))
                                     <h2 class="blink"><small>Hoy,</small> {{date("d/m/Y", strtotime($hoy))}}</h2>
                                     @php ($guardarfecha = date("Y-m-d", strtotime($hoy)))
                                    
                                    
                                    @else
                                    <h2 class="blink">{{date("d/m/Y", strtotime($diaconsulta))}}</h2>
                                    @php ($guardarfecha = date("Y-m-d", strtotime($diaconsulta)))
                                    
                                    
                                    @endif
                                @else
                                <h2 class="blink"><small>Hoy,</small> {{date("d/m/Y", strtotime($hoy))}}</h2>
                                @php ($guardarfecha = date("Y-m-d", strtotime($hoy)))
                                
                                
                                @endif
                                <div id="arrow-next" class="next make-blinking" wire:click="diaSiguiente" style="border: 0px; border-radius: 4px" alt="Ir a resumen del día siguiente"></div>
                            </div>
                            
                            <x-spacing alto="2em"></x-spacing>
                            

                            <div class="item_actividad" id="entradas">
                                <img src="{{ asset('images/img_entrada.svg') }}" alt="">
                                <p class="categoria_actividad">Llegadas</p>
                                <p class="number_actividad c_entrada blink">{{$entradas->count()}}</p>
                            </div>
                            <div class="item_actividad" id="salidas">
                                <img src="{{ asset('images/img_salida.svg') }}" alt="">
                                <p class="categoria_actividad">Salidas</p>
                                <p class="number_actividad c_salida blink" id="n_salidas">{{$salidas->count()}}</p>
                            </div>
                            <div class="item_actividad" id="pernoctas">
                                <img src="{{ asset('images/img_noche.svg') }}" alt="">
                                <p class="categoria_actividad">Pernoctas</p>
                                <p class="number_actividad c_pernocta blink">{{$noches->count()}}</p>
                            </div>
                        </div>
                </div>
                <x-spacing alto="2rem"></x-spacing>
                <h2 id="movimientos">Movimientos</h2>
                <x-spacing alto="0.7rem"></x-spacing>
                <div class="actividad">
                        <div class="content_actividad">
                           <div class="tabs">
                             <div id="tab1" class="tab tab1 tab-selected">Llegadas</div>
                             <div id="tab2" class="tab tab2">Salidas</div>
                            </div>
    
                            <div class="resultado-din">
                                                
                                <div id="resultado-entradas">

                                 @if (blank($entradas)) 
    
                                <p>Ninguna entrada prevista esta fecha.</p>
                                                                                      
                                @else
                                                                  
                                    @foreach ($entradas as $entrada)
                                    <div class="selector"  onclick="window.location.href='{{route('ver-reserva', [$entrada->id, $guardarfecha])}}'">
                                        <div class="select-right">
                                            @if ($entrada->user->id == $entrada->homecamper->user->id)
                                            <p class="name">{{$nombre_generico . $entrada->id}}</p>
                                            <p class="matricula">Sin datos del cliente</p>
                                            @else
                                            <p translate="no"  class="name">{{$entrada->user->name}}</p>
                                            <p translate="no" class="matricula">{{$entrada->user->matricula}}</p>
                                            @endif
                                       
                                    </div>
                                        <div class="arrow"></div>
                                    </div>
                                    <x-spacing alto="0.2rem"></x-spacing>
                                    @endforeach

                                 @endif
                                </div>
                                
                                <div id="resultado-salidas" style="display:none">

                                    @if (blank($salidas)) 
       
                                   <p>Ninguna salida prevista para esta fecha.</p>
                                                                                         
                                   @else
                                                                     
                                       @foreach ($salidas as $salida)
                                       <div class="selector"  onclick="window.location.href='{{route('ver-reserva', [$salida->id, $guardarfecha])}}'">
                                           <div class="select-right">
                                            @if ($salida->user->id == $salida->homecamper->user->id)
                                            <p class="name">{{$nombre_generico . $salida->id}}</p>
                                            <p class="matricula">Sin datos del cliente</p>
                                            @else
                                           <p translate="no" class="name">{{$salida->user->name}}</p>
                                           <p translate="no" class="matricula">{{$salida->user->matricula}}</p>
                                           @endif
                                       </div>
                                           <div class="arrow"></div>
                                       </div>
                                       <x-spacing alto="0.2rem"></x-spacing>
                                       @endforeach
   
                                    @endif
                                   </div>
                                   
    
                                
                            </div>
                        </div>
                </div>
    
                <x-spacing alto="2rem"></x-spacing>
                <h2 id="scroll_pernoctas">Pernoctas</h2>
                <x-spacing alto="0.7rem"></x-spacing>

                <div class="actividad">
                    <div class="content_actividad">
                           
                            <div class="resultado-din">
                                @if (blank($noches))
    
                                <p>Ninguna pernocta prevista para esta fecha.</p>
                                                                                      
                                @else
                                   
                                @foreach ($noches as $noche)
                                <div class="selector" onclick="window.location.href='{{route('ver-reserva', [$noche->reserva_id, $guardarfecha])}}'">
                                    
                                        <div class="select-right">
                                            @if ($noche->user->id == $noche->user->homecamper->user->id)
                                            <p class="name">{{$nombre_generico . $noche->reserva_id}}</p>
                                            <p class="matricula">Sin datos del cliente</p>
                                            @else
                                              <p translate="no" class="name">{{$noche->user->name}}</p>
                                              <p translate="no" class="matricula">{{$noche->user->matricula}}</p>
                                           @endif                                       
                                    
                                         </div>
                                         <div class="arrow"></div>
                                </div>
                                <x-spacing alto="0.2rem"></x-spacing>
                                @endforeach 

                                @endif
                                
    
                            </div>
                        </div>
                </div>

                <x-spacing alto="2rem"></x-spacing>
                <h2>Comparte tu enlace de reserva</h2>
                <x-spacing alto="0.7rem"></x-spacing>

                <div class="actividad">
                    <div class="content_actividad">
                        <p>Incluye este enlace en las aplicaciones camper como Park4night o Caramaps para dirigir directamente a la reserva.</p>
                           <a translate="no" href="{{route('vista.homecamper', [$user->homecamper->slug])}}">www.campify.es/public/reservar_en/{{$user->homecamper->slug}}</a> 
                    </div>
                </div>
                <x-spacing alto="5rem"></x-spacing>
            </div>  
        

        </div>

        
<div class="bottom_wrapper">
        
    <div id="btn-actividad" class="btn-bottom btn-selected" onclick="window.location.href='{{route('dashboard-homecamper', ['user' => $user, $guardarfecha])}}'">
        <img src="{{asset('/images/actividad.svg')}}" class="svg-selected" style="width: 20px; height:20px" alt="">
        <p>Actividad</p>
 </div>  
    
    <div id="btn-reservas" class="btn-bottom" onclick="window.location.href='{{route('reservas', ['user' => $user, $guardarfecha])}}'">
                <img src="{{asset('/images/reservas.svg')}}" style="width: 20px; height:20px; filter: opacity(50%)" alt="">
                <p>Reservas</p>
         </div>  
   
     
         <div id="btn-gris" class="btn-bottom" onclick="window.location.href='{{route('editar-homecamper', [ 'user' => $user, $guardarfecha ])}}'">
            <img src="{{asset('/images/user.svg')}}" style="width: 20px; height:20px; filter: opacity(50%);" alt="">
            <p>Cuenta</p>
    </div>
    
</div>
