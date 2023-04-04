<div style="overflow-x:hidden;">
    @if($currentPage == 2)
        @livewire('modal-login', [ 'acceso' => 'reservar', 'homecamper' => $homecamper, 'entrada' => $entrada, 'salida' => $salida, 'dias' => $dias, 'precio' => $precio ])
    @endif
    <div class="titulo">
            <x-spacing alto="1.7rem"></x-spacing>
     
       
    
            <h1>Reservar en {{$homecamper->nombre}}</h1>
            <x-spacing alto="1.2rem"></x-spacing>
            <x-progres_bar progres="{{ $pages[$currentPage] ['progres'] }}"></x-progres_bar>
    </div>
    


<form wire:submit.prevent="store" method="POST">
    @csrf

    @method('PUT')
    <div class="content-form">
                  
         
        <x-spacing alto="3rem"></x-spacing>
            <h2 class="form">{{ $pages[$currentPage] ['h2'] }}</h2>
        <x-spacing alto="1.7rem"></x-spacing>
     
             
        @if ($currentPage === 1)
        <x-lean::console-log />

                       
@if($dias != null)

@if($fechaocupada != null)

<x-spacing alto="1.7rem"></x-spacing>
<div id="avisofechas" class="alert alert-warning" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <strong>Algunos días no están disponibles</strong><br>
    <p>Vaya, has seleccionado unas fechas en las que "{{$homecamper->nombre}}" está al completo:</p>
    <ul>
      @foreach ($fechaocupada as $nodisponible)
        <li>  {{ $nodisponible }} (no disponible)</li>
      @endforeach
      </ul>
      <hr>
      <p>Hay cosas que a veces no se consiguen a la primera, siempre puedes buscar otras fechas o otro establecimiento igual de ideal que este en <span translate="no"> campify </span> ¡ánimo! </p>
</div>       
@endif
@endif

            <label for="">Entrarás el día...</label>
                <input wire:model.lazy="entrada" type="date" data-date-format="mm/dd/yy" class="datepicker" value="" name="" id="">
                @error('entrada')
                <span class="error">{{ $message }}</span>
            @enderror

            <x-spacing alto="1.7rem"></x-spacing>

            <label for="">Y saldrás el día...</label>
            <input wire:model.lazy="salida" type="date" class="datepicker" data-date-format="mm/dd/yy" value="" name="" id="">
            @error('salida')
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
                                    
                              
        <x-spacing alto="7rem"></x-spacing>

        @elseif ($currentPage === 2)

        <div class="alert alert-info" role="alert">
            Si ya has hecho una reserva anteriormente ya generaste tu cuenta. 
        </div>  
        <x-spacing alto="1.2rem"></x-spacing>
        <div class="formbuttons">
        <button data-toggle="modal" data-target="#login" type="button" class="btn-secondary">Ya tengo una cuenta en <span translate="no"> campify </span></button>
        <x-spacing alto="1rem"></x-spacing>
        <button wire:click="sinCuenta"  type="button" class="btn-secondary">Es mi primera vez en <span translate="no"> campify </span></button>
        </div>
        <x-spacing alto="5rem"></x-spacing>
       
       
        
        @elseif ($currentPage === 3)
        
        <div class="alert alert-info" role="alert">
            Si suciediera cualquier imprevisto, el establecimiento debe poder contactar contigo.
        </div>      

         <x-spacing alto="1.2rem"></x-spacing>
    
         <label for="">Tu nombre</label>
         <input wire:model.lazy="name" type="text" value="" name="" id="nombre">
         @error('name')
         <span class="error">{{ $message }}</span>
     @enderror

     <x-spacing alto="1.7rem"></x-spacing>

           <label id="scroll_email">Email</label>
               <input wire:model.lazy="email" type="email" name="" id="email">
               @error('email')
               <span class="error">{{ $message }}</span>
           @enderror
           
           @isset($email)
           
         @endisset
            
            <x-spacing alto="1.7rem"></x-spacing>
    
           <label id="scroll_telf">Teléfono</label>
              <input wire:model.lazy="telf" type="tel" name="" id="telf">
              @error('telf')
              <span class="error">{{ $message }}</span>
          @enderror

                            
                <x-spacing alto="7rem"></x-spacing>

        @elseif ($currentPage === 4)
              
        
        <x-spacing alto="1.7rem"></x-spacing>
        <label for="">La matrícula de tu vehículo es</label>
        <input wire:model.lazy="matricula" type="text" value="" name="" id="">
        @error('matricula')
        <span class="error">{{ $message }}</span>
    @enderror
        
           
            <x-spacing alto="9rem"></x-spacing>

        @elseif ($currentPage === 5)
        
        <div class="alert alert-info" role="alert">
            Así podrás consultar las reservas de tu escapada y modificarlas según tu rumbo.
        </div>   
       
        <label for="">Contraseña</label>
        <input wire:model.lazy="password" type="password" name="password" id="password">
        @error('password')
        <span class="error">{{ $message }}</span>
        @enderror
        <x-spacing alto="2rem"></x-spacing>
        <p class="hint">
            <strong>Tratamiento de datos</strong><br>
            En <span translate="no"> campify </span> guardaremos tus datos según la normativa (RGPD) para generar la reserva e informarte de su estado.
            El anfitrión con el que reserves tendrá acceso a tus datos para gestionar tu estancia. 
        </p> 
            
                  <x-spacing alto="7rem"></x-spacing>

         @endif

         

            </div>
            @if($currentPage === 2)  
            @else
             <div class="botonera">
                @if ($currentPage === count($pages))
                    <button type="submit" wire:target="store" wire:loadig.attr="disabled" class="primary_double">
                        <span wire:loading wire:target="store" style="height:30px; width: 30px;"> <img style="height:30px; width: 30px;" src="{{ asset('images/loading.gif') }}" alt=""></span>
                        Aceptar</button>
                    <button wire:click="goToPreviousPage" alt="Volver" type="button" class="back"></button>
                @else
                    @if ($currentPage === 1)
                     <button wire:click="goToNextPage" type="button" class="primary">Continuar</button>
                    
                    @else
                        <button wire:click="goToPreviousPage" wire:loadig.attr="disabled" alt="Volver" type="button" class="back"></button>
                        <button wire:click="goToNextPage" wire:loadig.attr="disabled" type="button" class="primary_double">Continuar</button>
                    @endif
                @endif
             </div>
             @endif  
     </form>
<script>
     
     window.addEventListener("contentChanged", event => {
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


