<div style="overflow-x:hidden;">
   
    <div class="titulo">
            <x-spacing alto="1.7rem"></x-spacing>
           
    
            <h1>Nueva reserva</h1>
            <x-spacing alto="1.2rem"></x-spacing>
            <x-progres_bar progres="{{ $pages[$currentPage] ['progres'] }}"></x-progres_bar>
    </div>
    


<form wire:submit.prevent="" method="POST" >
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
    <p>Vaya, has seleccionado unas fechas en las que estás al completo:</p>
    <ul>
      @foreach ($fechaocupada as $nodisponible)
        <li>  {{ $nodisponible }} (no disponible)</li>
      @endforeach
      </ul>
</div>       
@endif
@endif

            <label for="">Fecha de entrada</label>
                <input wire:model.lazy="entrada" type="date" data-date-format="mm/dd/yy" class="datepicker" value="" name="" id="">
                @error('entrada')
                <span class="error">{{ $message }}</span>
            @enderror

            <x-spacing alto="1.7rem"></x-spacing>

            <label for="">Fecha de salida</label>
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


       
        </div>

            @endif

            
             <div class="botonera">
                                  
                     <button wire:click="goToNextPage" type="submit" wire:loadig.attr="disabled" class="primary">
                        <span wire:loading wire:target="goToNextPage" style="height:30px; width: 30px;"> <img style="height:30px; width: 30px;" src="{{ asset('images/loading.gif') }}" alt=""></span>
                        Confirmar</button>
                   
             </div>
              
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
@isset($reserva)
    

<script>
      window.addEventListener('swal:ocupacionConfirmada', event => {
        swal.fire({
        title: 'Nueva reserva generada',
            text: 'Has ocupado una plaza para las fechas seleccionadas. Esta reserva, al no tener una cuenta campify asociada no contiene datos del cliente.',
            icon: 'success',
            showCancelButton: false,
            confirmButtonColor: '#555555',
            confirmButtonText: 'Enendido',
    }).then((result) => {  
        window.location.href ="{{route('ver-reserva', ['id' => $reserva->id, 'guardarfecha' => null])}}";
    }
    )
    });
</script>
@endisset
</div>


