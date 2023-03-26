<div>

    <x-spacing alto="1rem"></x-spacing>
    <h1 id="h1-scroll">
        Gestiona tus reservas </h1>
       
        <x-spacing alto="2rem"></x-spacing>

        <div>    
        <h2 id="movimientos">Buscar una reserva</h2>
        <x-spacing alto="2rem"></x-spacing>

        <div class="tabs">
            <div id="tab-cliente"  class="tab tab-selected" wire:click="resetResultados" wire:ignore.self>Datos del cliente</div>
            <div id="tab-reserva"  class="tab" wire:click="resetResultados" wire:ignore.self >Datos de la reserva</div>
        </div>
        <x-spacing alto="2rem"></x-spacing>

        <div wire:ignore.self id="cliente" style="display: block">
        <p style="margin: 0px 20px">Encuentra reservas según el nombre, matrícula, teléfono o email del cliente</p>
        <x-spacing alto="1rem"></x-spacing>
        <input type="text" wire:model.defer="terminoBusqueda" wire:keyup="search()" placeholder="Buscar... " id="" class="search" style="width:80%; min-width:370px; margin: 0px 20px">

          

       
        <div class="wrapper">
    
            <div class="wrapper_actividad">
               <div class="actividad">
                <x-spacing alto="2rem"></x-spacing>
                <h3 id="movimientos"style="margin: auto 20px">Resultados de tu búsqueda</h3>
                <x-spacing alto="0.7rem"></x-spacing>
                       <div class="content_actividad">
                           <x-spacing alto="1rem"></x-spacing>
                           @if (blank($sinResultados))
                           <p>Realiza una búsqueda para encontrar reservas. </p>
                            
                           @elseif ($sinResultados == 0)
                           <p>No se ha encontrado ninguna reserva con estos valores de búsqueda "{{$terminoBusqueda}}". </p>
                           @endif
                           @if(!blank($resultados))
                            @foreach ($resultados as $reserva)
                            <div class="selector" onclick="window.location.href='{{route('ver-reserva', [$reserva->id, $guardarfecha])}}'">
                                    
                                <div class="select-right">
                                    @if ($reserva->user->id == $reserva->homecamper->user->id)
                                    <p class="name">{{$nombre_generico . $reserva->reserva_id}}</p>
                                    <p class="matricula">Sin datos del cliente</p>
                                    @else
                                      <p translate="no" class="name">{{$reserva->user->name}}</p>
                                      <p translate="no" class="matricula">{{$reserva->user->matricula}} <br> telf: {{$reserva->user->telefono}} <br> email: {{$reserva->user->email}}</p>
                                      <hr class="solid">
                                      <p class="matricula"> <img src="{{ asset('images/img_entrada.svg')}}" style="width: 20px; height:auto margin-right:5px" alt=""> {{date("d/m/Y", strtotime($reserva->entrada))}}      <img src="{{ asset('images/img_salida.svg')}}" alt="" style="width: 20px; height:auto; margin-left:20px; margin-right:5px;"> {{date("d/m/Y", strtotime($reserva->salida))}}</p>

                                   @endif                                       
                            
                                 </div>
                                 <div class="arrow"></div>
                        </div>
                        <x-spacing alto="1.5rem"></x-spacing>
                            @endforeach
                        
                            @endif
                          
                           

                          
                       </div>
               </div>
            </div>
        </div>


   

    </div>   
    
    <div wire:ignore.self id="reserva" style="display:none">
        <p style="margin: 0px 20px">Encuentra reservas por fecha de llegada, salida o número de reserva</p>

        <x-spacing alto="2rem"></x-spacing>
        <div class="tabs">
            <div id="tab-entrada"  class="tab" wire:ignore.self>Llegada</div>
            <div id="tab-salida"  class="tab" wire:ignore.self >Salida</div>
            <div id="tab-numero"  class="tab" wire:ignore.self >Número reserva</div>
        </div>
        <x-spacing alto="2rem"></x-spacing>
        
       
        <div id="in_entrada"  wire:ignore.self style="display: none">
            <input type="date" wire:model="entrada"  name="" style="width:80%; min-width:370px; margin: 0px 20px">
            <x-spacing alto="2rem"></x-spacing>
            <button wire:click="buscarEntrada" class="primary" style="margin: 0 20px; max-width:90%">Buscar</button>
        </div>
        <div id="in_salida"  wire:ignore.self style="display: none" >
            <input  type="date" wire:model="salida"  name="" style="width:80%; min-width:370px; margin: 0px 20px">                                  
            <x-spacing alto="2rem"></x-spacing>
            <button wire:click="buscarSalida"  class="primary" style="margin: 0 20px; max-width:90%">Buscar</button>
        </div>
        <div id="in_numero" wire:ignore.self style="display: none">
            <input  type="number" wire:model.defer="numeroBusqueda" wire:keyup="buscarNumero()" placeholder="Buscar... " id="" class="search" style="width:80%; min-width:370px; margin: 0px 20px">
        </div>
         

        @if(!blank($resultados))
        <div class="wrapper">
    
            <div class="wrapper_actividad">
               <div class="actividad">
                <x-spacing alto="2rem"></x-spacing>
                <h3 id="movimientos"style="margin: auto 20px">Resultados de tu búsqueda</h3>
                <x-spacing alto="0.7rem"></x-spacing>
                       <div class="content_actividad">
                           <x-spacing alto="1rem"></x-spacing>

                           @if (blank($resultados))
                           <p>No se ha encontrado ninguna reserva con estos valores de búsqueda "{{$terminoBusqueda}}". </p>
                           @else
                           
                            @foreach ($resultados as $reserva)
                            <div class="selector" onclick="window.location.href='{{route('ver-reserva', [$reserva->id, $guardarfecha])}}'">
                                    
                                <div class="select-right">
                                    @if ($reserva->user->id == $reserva->homecamper->user->id)
                                    <p class="name">{{$nombre_generico . $reserva->reserva_id}}</p>
                                    <p class="matricula">Sin datos del cliente</p>
                                    <hr class="solid">
                                      <p class="matricula"> <img src="{{ asset('images/img_entrada.svg')}}" style="width: 20px; height:auto; margin-right:5px" alt=""> {{date("d/m/Y", strtotime($reserva->entrada))}}      <img src="{{ asset('images/img_salida.svg')}}" alt="" style="width: 20px; height:auto; margin-left:20px; margin-right:5px"> {{date("d/m/Y", strtotime($reserva->salida))}}</p>

                                    @else
                                      <p translate="no" class="name">{{$reserva->user->name}}</p>
                                      <p translate="no" class="matricula">Número de reserva: {{$reserva->id}}</p>
                                      <hr class="solid">
                                      <p class="matricula"> <img src="{{ asset('images/img_entrada.svg')}}" style="width: 20px; height:auto; margin-right:5px" alt=""> {{date("d/m/Y", strtotime($reserva->entrada))}}      <img src="{{ asset('images/img_salida.svg')}}" alt="" style="width: 20px; height:auto; margin-left:20px; margin-right:5px"> {{date("d/m/Y", strtotime($reserva->salida))}}</p>

                                   @endif                                       
                            
                                 </div>
                                 <div class="arrow"></div>
                        </div>
                        <x-spacing alto="1.5rem"></x-spacing>
                            @endforeach
                        
                           @endif
                           

                          
                       </div>
               </div>
            </div>
        </div>


        @endif
    </div> 
    </div>     
    <x-spacing alto="20rem"></x-spacing>

    <div>
        <button onclick="window.location.href='{{route('ocupar', [$user->homecamper->id])}}'" class="btn-secondary btn-ic btn-flotante" > <img src="{{ asset('images/sumar.svg')}}" alt="">  Nueva reserva</button>         
    </div>
   
       
    <div class="bottom_wrapper">
        
        <div id="btn-actividad" class="btn-bottom " onclick="window.location.href='{{route('dashboard-homecamper', ['user' => $user])}}'">
            <img src="{{asset('/images/actividad.svg')}}"  style="width: 20px; height:20px; filter: opacity(50%);" alt="">
            <p>Actividad</p>
     </div>  
        
        <div id="btn-reservas" class="btn-bottom btn-selected" onclick="window.location.href='{{route('reservas', ['user' => $user])}}'">
                    <img src="{{asset('/images/reservas.svg')}}" class="svg-selected" style="width: 20px; height:20px" alt="">
                    <p>Reservas</p>
             </div>  
       
         
             <div id="btn-gris" class="btn-bottom" onclick="window.location.href='{{route('editar-homecamper', [ 'user' => $user])}}'">
                <img src="{{asset('/images/user.svg')}}" style="width: 20px; height:20px; filter: opacity(50%);" alt="">
                <p>Cuenta</p>
            </div>
        
    </div>
    

</div>
