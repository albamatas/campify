<div>
    <x-spacing alto="1rem"></x-spacing>
    <h1>Hola, <br>
        <strong style="weight: 900">{{ $user->name}}</strong></h1>
        <x-spacing alto="1rem"></x-spacing>
    
        <div class="wrapper">
    
             <div class="wrapper_actividad">
               
                <x-spacing alto="2rem"></x-spacing>
                <h2 id="movimientos">Estas son tus reseras</h2>
                <x-spacing alto="0.7rem"></x-spacing>
                <div class="actividad">
                        <div class="content_actividad">
                           <div class="tabs">
                             <div id="tab1" class="tab tab1 tab-selected">Activas</div>
                             <div id="tab2" class="tab tab2">Historial</div>
                            </div>
    
                            <div class="resultado-din">
                                                
                                <div id="resultado-entradas">

                                 @if (blank($reservas)) 
    
                                <p>Ninguna reserva prevista.</p>
                                                                                      
                                @else
                                                                  
                                    @foreach ($reservas as $reserva)
                                    <div class="selector"  onclick="window.location.href='{{route('ver-reserva', [$reserva->id, $hoy])}}'">
                                        <div class="select-right">
                                        <p class="name">{{$reserva->homecamper->nombre}}</p>
                                        <p class="matricula">Del {{date("d/m/Y", strtotime($reserva->entrada))}} al {{date("d/m/Y", strtotime($reserva->salida))}}</p>
                                    </div>
                                        <div class="arrow"></div>
                                    </div>
                                    <x-spacing alto="0.2rem"></x-spacing>
                                    @endforeach

                                 @endif
                                </div>
                                
                                <div id="resultado-salidas" style="display:none">

                                    @if (blank($historico)) 
       
                                   <p>Ninguna reserva anterior.</p>
                                                                                         
                                   @else
                                                                     
                                       @foreach ($historico as $historico)
                                       <div class="selector"  onclick="window.location.href='{{route('ver-reserva', [$historico->id, $hoy])}}'">
                                           <div class="select-right">
                                           <p class="name">{{$historico->homecamper->nombre}}</p>
                                           <p class="matricula">Del {{date("d/m/Y", strtotime($historico->entrada))}} al {{date("d/m/Y", strtotime($historico->salida))}}</p>
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
    
    
            </div>  
        

        </div>
</div>

