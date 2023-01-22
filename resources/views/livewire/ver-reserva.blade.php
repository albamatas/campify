<div class="dash_container">
    <x-lean::console-log /> 

    <div class="modal fade" id="fechas" tabindex="-1" role="dialog" styles="z-index: 100000000000" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
                
              <h5 class="modal-title" id="exampleModalLabel">Modificar fechas</h5>
              
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
   
                        
            </div>
            <div class="modal-body" >
                <form method="POST" wire:submit.prevent = "actualizarFechas">
                    @csrf
  
                    <div  class="row mb-3">     
                        
                    
                        <div class="">
                            <label for="">¿Qué fecha quieres modificar?</label>
                            <x-spacing alto="0.7rem"></x-spacing>
                            
                            @if($fechaocupada != null)
                            
                            
                            @endif
                            <div class="tabs">
                                <div id="tab-entrada"  wire:click.defer="tipoModificacion(1)" class="tab" wire:ignore.self>Entrada</div>
                                <div id="tab-salida" wire:click.defer="tipoModificacion(2)" class="tab" wire:ignore.self >Salida</div>
                                <div id="tab-ambas"  wire:click.defer="tipoModificacion(3)" class="tab" wire:ignore.self>Ambas</div>
                            </div>
                            <x-spacing alto="1.7rem"></x-spacing>
                            <div id="modificar-entrada" wire:ignore.self>
                                <label for="">Nueva fecha de entrada</label>
                                <input  type="date" wire:model="entrada" value="" placeholder="{{date("d/m/Y", strtotime($reserva->entrada))}}" name="" id="">
                                    @error('entrada')
                                    <span class="error">{{ $message }}</span>
                                  @enderror
                                <x-spacing alto="1.7rem" ></x-spacing>
                                <p><strong>Fecha de salida </strong><br>{{date("d/m/Y", strtotime($reserva->salida))}}</p>
                               
                            </div>
                            <div id="modificar-salida" wire:ignore.self>
                                <p><strong>Fecha de entrada </strong><br>{{date("d/m/Y", strtotime($reserva->entrada))}}</p>
                                <x-spacing alto="0.4rem"></x-spacing>
                                <label for="">Nueva fecha de salida:</label>
                                <input  type="date" wire:model="salida"  name="" id="">
                                @error('salida')
                                <span class="error">{{ $message }}</span>
                            @enderror
                                
                            </div>
                            <div id="modificar-ambas" wire:ignore.self>
                                <label for="">Nueva fecha de entrada</label>
                                <input  type="date" wire:model="entrada">
                                @error('entrada')
                                <span class="error">{{ $message }}</span>
                                @enderror
                                <x-spacing alto="1.7rem"></x-spacing>
                                <label for="">Nueva fecha de salida</label>
                                <input  type="date" wire:model="salida">
                                @error('salida')
                            <span class="error">{{ $message }}</span>
                            @enderror
                            </div> 
                    
                        </div>
                    </div>
                                
                </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="innerform" data-dismiss="modal">Cerrar</button>

             
            <button type="submit" wire:click.defer="actualizarFechas()" class="btn btn-primary">Guardar</button>
           
            
          </div>
          </div>
        </div>
    </div>

   {{--  <div class="modal fade" id="borrarReserva" tabindex="-1" role="dialog" styles="z-index: 100000000000" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
                
              <h5 class="modal-title" id="exampleModalLabel">Borrar reserva</h5>
              
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
   
                        
            </div>
            <div class="modal-body" >
                <form method="POST" wire:submit.prevent = "borrarReserva">
                    @csrf
  
                    <div  class="row mb-3">     
                        
                    
                        <div class="col-md-6">
                            <label for="">¿Seguro que quieres borrar esta reserva?</label>
                            <x-spacing alto="0.7rem"></x-spacing>
                                                        
                            </div>
                                                
                    </div>
                    
                                
                </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="innerform" data-dismiss="modal">Cerrar</button>

             
            <button type="submit" wire:click.defer="borrarReserva()" class="btn btn-primary red">Borrar Reserva</button>
           
            
          </div>
          </div>
        </div>
    </div>
    comment --}}
   
    <a class="link-back" style="position: absolute; top: 0px; right: 0px; padding: 15px;" href="{{route('dashboard-homecamper', [ 'guardarfecha' => $guardarfecha ]) }}"><img style="width: 30px;" src="{{ asset('images/close.svg') }}" alt="Cerrar"> </a>
    <x-spacing alto="1.4rem"></x-spacing>
    
        @if(isset($nombre_generico))
        <h1 style="max-width: 90vw">
            {{$nombre_generico}}</h1>
            <p style="margin-left:20px">Esta reserva no tiene datos del cliente porque la generaste desde tu cuenta.</p>
        @else
        <h4 style="margin-left:20px">Reserva de:</h4>
    
        <h1 style="max-width: 90vw">
            {{$reserva->user->name}}</h1>
        <p style="margin-left:20px">{{$reserva->user->matricula}}<p>
        @endif
    
    <x-spacing alto="0.7rem"></x-spacing>

    <div class="wrapper">

         <div class="wrapper_actividad">
            
            @if(blank($fechaocupada))
                @else
                <script>
               
window.addEventListener('swal:reservaNoModificada', event => {
            var fechaocupada = @this.fechaocupada
            console.log(fechaocupada)
            swal.fire({
            title: 'La reserva no se ha podido modificar',
            html: 'Vaya, has seleccionado alguna fecha en la que ya estás al completo. <br><br> <strong>Estas son las fechas no disonibles:</strong> <br>' + fechaocupada.join(" <br> "),
            icon: 'error',
            showCancelButton: false,
            confirmButtonColor: '#555555',
            confirmButtonText: 'Enendido',
    })
});

                </script>

                @endif

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
                    <x-spacing alto="0.7rem"></x-spacing>
                    <button data-toggle="modal" data-target="#fechas" wire:click="setActualizado" class="btn-secondary btn-ic" > <img src="{{ asset('images/ic_modificar_fechas.svg')}}" alt="">  Modificar fechas</button>
                    <x-spacing alto="0.7rem"></x-spacing>
                    <button type="submit" data-target="" wire:click.defer="borrarConfirmar()" class="btn-secondary btn-ic borrarReserva" > <img src="{{ asset('images/ic_cancelar.svg')}}" alt="">  Cancelar reserva</button>
                    </div>
            </div>
            <x-spacing alto="2rem"></x-spacing>

            @if(isset($nombre_generico))
            @else
            <h2>Datos</h2>
            <x-spacing alto="0.7rem"></x-spacing>
            <div class="actividad">
                    <div class="content_actividad">
                        <p><strong>Nombre</strong><br>
                            {{ $reserva->user->name }}</p>
                        <p><strong>Teléfono</strong><br>
                            {{ $reserva->user->telefono }}</p>
                        <p><strong>Email</strong><br>
                            {{ $reserva->user->email }}</p>
                        <p><strong>Matrícula</strong><br>
                            {{ $reserva->user->matricula }}</p>
                    </div>
                       
            </div>
            @endif
        </div>  
    </div>
    <x-spacing alto="1rem"></x-spacing>
     <a class="link-back" href="{{route('dashboard-homecamper', [ 'guardarfecha' => $guardarfecha ]) }}"> < Volver al resumen de actividad</a>
    <x-spacing alto="1.4rem"></x-spacing>
   
    @if($actualizado == 1)
        <script>
            $(".blink").delay(500).fadeOut(200);
            $(".blink").fadeIn(500);
        </script>
@endif

    
</div>


