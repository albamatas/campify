<div style="overflow-x:hidden;">
    <div class="titulo" id="titulo">
            <x-spacing alto="1.7rem"></x-spacing>
            <h1>Empezar en <span translate="no">campify</span></h1>
            <x-spacing alto="1.2rem"></x-spacing>
            <x-progres_bar progres="{{ $pages[$currentPage] ['progres'] }}"></x-progres_bar>
    </div>
    
    
<form wire:submit.prevent="store" method="GET" action="">
    @csrf

    <div class="content-form">
                  
         
        <x-spacing alto="3rem"></x-spacing>
            <h2 class="form">{{ $pages[$currentPage] ['h2'] }}</h2>
        <x-spacing alto="1.7rem"></x-spacing>
     
             
        @if ($currentPage === 1)
            <label for="">Ponle un nombre a tu alojamiento</label>
                <input wire:model.lazy="nombre" type="text" value="{{ $nombre }}" name="" id="nombre">
                @error('nombre')
                <span class="error">{{ $message }}</span>
            @enderror

            <script>
                document.addEventListener("DOMContentLoaded", () => {
                    console.log('selectpicker 1');
                    $iteration = 1;
                    if (iteration = 1){
                    $('select').selectpicker();
                    }else{}
        });
            </script>
                <p class="hint"><span translate="no">Ejemplo: Área de Vilanova, Camping La Vall, Casa de los Olivos.</span></p>
                                   <x-spacing alto="1.7rem"></x-spacing>

            <label for="">¿Qué tipo de alojamiento es?</label>
            <div wire:ignore>  
                <select id="tipo" class="form-select-me predictivo" data-live-search="true" wire:model.lazy="tipohomecamper" name="" id="" >
                    <option value="">Selecciona una opción</option>
                    @foreach ($tipos as $tipo)
                        <option value="{{$tipo->id}}">{{$tipo->tipo}}</option>
                    @endforeach
                 </select>
            </div>
                @error('tipohomecamper')
                <span class="error">{{ $message }}</span>
                @enderror
                                    
                              
        <x-spacing alto="7rem"></x-spacing>

        @elseif ($currentPage === 2)
            
               
            <div class="alert alert-info" role="alert">
            Para estar en <span translate="no"> campify </span> debes cumplir lo siguiente:
                <ul>
                    <li>Precio por vehículo y no por personas</li>
                    <li>Permitir la acampada: con suficiente espacio para sacar mesa, sillas, toldos, etc</li>
                    <li>Plazas niveladas</li>
                </ul>
            </div>  

            <x-spacing alto="1.7rem"></x-spacing>  

        <label id="plazaslabel">¿Cuántas plazas de acampada tienes?</label>
            <span style=" display: block; width: 100%"> <input wire:model.lazy="plazas" style="width: 80px; display: inline-block !important" type="number" step="1" name="" id="plazas">   plazas</span>
            
            @error('plazas')
                <script>
                     $('html, body').animate({
                            scrollTop: $("#plazaslabel").offset().top
                            }, 100);   
                </script>
                <span class="error">{{ $message }}</span>
            @enderror  

            <p class="hint">Cuenta espacio del vehículo + margen para sacar mesa y sillas, etc.</p>
                

                <x-spacing alto="1.7rem"></x-spacing>

            <label id="scroll_precio">¿Cuánto vas a cobrar por cada plaza?</label>
               <span style=" display: block; width: 100%"> <input wire:model.lazy="precio" style="width: 80px; display: inline-block !important" type="text" name="" id="precio">   €</span>
               @error('precio')
                    <span class="error">{{ $message }}</span>
                @enderror
                     
               <p class="hint">
                Para que te hagas una idea: los precios de las áreas sin servicios como electricidad, agua o vaciado, 
                suelen rondar los 5-8€, y entre 10-20€ los que más servicios tienen y según temporada.
                </p>
                    
                <x-spacing alto="7rem"></x-spacing>
               
        @elseif ($currentPage === 3)
            <script>
                $('#plazaslabel').hide();   
        </script>
       
        <div class="alert alert-info" role="alert">
            ¡Asegúrate de escribirla bien para que te puedan encontrar a la primera!
            </div>  
            <label for="">En qué calle, carretera, etc</label>
                <input wire:model.lazy="calle" type="text" name="" id="calle">
                @error('calle')
                <span class="error">{{ $message }}</span>
            @enderror

                <x-spacing alto="1.7rem"></x-spacing>

            <label id="scroll_numero">Número</label>
                <input wire:model.lazy="dir_numero" type="number" name="" id="">
                @error('dir_numero')
                <span class="error">{{ $message }}</span>
            @enderror

                <x-spacing alto="1.7rem"></x-spacing>
                
                <label id="scroll_provincia">Provincia</label>      
              <div wire:ignore>    
                                       <select wire:model.lazy="provincia" id="provincia" data-live-search="true" class=".form-select-me .predictivo">
                                <option value="">Escribe o selecciona una opción</option>
                                    @foreach ($provincias as $provincia)
                                        <option value="{{$provincia->id}}">{{$provincia->provincia}}</option>
                                   @endforeach
                            </select> 
                             
                    </div> 
                        @error('provincia')
                        <span class="error">{{ $message }}</span>
                    @enderror
            
                    @if ($poblaciones === null)
            
                                
                    @else
                    
                    <x-spacing alto="1.7rem"></x-spacing>
                  <label for="" id="poblacion_scroll">Población</label>                                            
                            <select wire:model.lazy='poblacion' data-live-search="true" class='.form-select-me .predictivo'>
                                <option value="">Escribe o selecciona una opción</option>
                                            @foreach ($poblaciones as $poblacion)
                                        <option value="{{$poblacion->id}}">{{$poblacion->poblacion}}</option>
                                @endforeach
                            </select>
                        
                        @error('poblacion')
                        <span class="error">{{ $message }}</span>
                    @enderror
                    <script>
                        $('html, body').animate({
                            scrollTop: $("#poblacion_scroll").offset().top
                            }, 100);   
                             
                 </script>
                     @endif
                     
            
            <x-spacing alto="7rem"></x-spacing>

        @elseif ($currentPage === 4)
        
        
            <div class="alert alert-info" role="alert">
                Solo compartiremos estos datos a los usuarios con reserva.
            </div>      

             <x-spacing alto="1.2rem"></x-spacing>
        
             <label for="">Tu nombre</label>
                    <input wire:model.lazy="name" type="text" value="{{ $nombre }}" name="" id="nombre">
                    @error('name')
                    <span class="error">{{ $message }}</span>
                @enderror

                <x-spacing alto="1.7rem"></x-spacing>

               <label id="scroll_email">Email</label>
                   <input wire:model.lazy="email" type="email" name="" id="email">
                   @error('email')
                   <span class="error">{{ $message }}</span>
               @enderror
                
                <x-spacing alto="1.7rem"></x-spacing>
        
               <label id="scroll_telf">Teléfono</label>
                  <input wire:model.lazy="telf" type="tel" name="" id="telf">
                  @error('telf')
                  <span class="error">{{ $message }}</span>
              @enderror
  
            
                  <x-spacing alto="7rem"></x-spacing>

        @elseif ($currentPage === 5)
        

             <label for="">Contraseña</label>
                <input wire:model.lazy="password" type="password" name="password" id="password">
                @error('password')
                <span class="error">{{ $message }}</span>
            @enderror
            <x-spacing alto="2rem"></x-spacing>
            <p class="hint">
                <strong>Tratamiento de datos</strong><br>
                En <span translate="no"> campify </span> guardaremos tus datos según la normativa (RGPD) para publicar tu anuncio e informarte del estado de las reservas.
                Los clientes con reserva tendrán acceso a tus datos de contacto.
            </p> 
                
                <x-spacing alto="7rem"></x-spacing>
             @endif   

            </div>
                 
             <div class="botonera">
                @if ($currentPage === count($pages))
                     <button wire:click="goToPreviousPage"  wire:loadig.attr="disabled" alt="Volver" type="button" class="back"></button>
                    <button type="submit" wire:target="store" wire:loadig.attr="disabled" class="primary_double"><span wire:loading wire:target="store" style="height:30px; width: 30px;"> <img style="height:30px; width: 30px;" src="{{ asset('images/loading.gif') }}" alt=""></span>
                        Aceptar</button>
                    
                @else
                    @if ($currentPage === 1 )
                     <button wire:click="goToNextPage" type="button" class="primary">Continuar</button>
                    @else
                        <button wire:click="goToPreviousPage" wire:loadig.attr="disabled" alt="Volver" type="button" class="back"></button>
                        <button wire:click="goToNextPage" wire:loadig.attr="disabled" type="button" id="continuar" class="primary_double">Continuar</button>
                    @endif
                @endif
             </div>
     </form>

<script>
     
   window.addEventListener("contentChanged", event => {
    $('#plazas').focusout(
            function(){
                $('#precio').focus();  
                $('html, body').animate({
                            scrollTop: $("#scroll_precio").offset().top
                            }, 100); 
                          
            }
        );
    $('#calle').focusout(
            function(){
                $('#numero').focus();  
                $('html, body').animate({
                            scrollTop: $("#scroll_numero").offset().top
                            }, 100); 
                          
            }
        );
        $('#nombre').focusout(
            function(){
                $('#email').focus();  
                $('html, body').animate({
                            scrollTop: $("#scroll_email").offset().top
                            }, 100); 
                          
            }
        );
        $('#email').focusout(
            function(){
                $('#telf').focus();  
                $('html, body').animate({
                            scrollTop: $("#scroll_telf").offset().top
                            }, 100); 
                          
            }
        );
        
}); 
   
  
</script>



</div>


