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
                        
                    
                        <div class="col-md-6">
                            <label for="">¿Qué fecha quieres modificar?</label>
                            <x-spacing alto="0.7rem"></x-spacing>
                            
                            @if($fechaocupada != null)
                            
                            
                            @endif
                            <div class="tabs">
                                <div id="tab-entrada"  class="tab" wire:ignore.self>Entrada</div>
                                <div id="tab-salida" class="tab " wire:ignore.self >Salida</div>
                                <div id="tab-ambas"  class="tab" wire:ignore.self>Ambas</div>
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
                                <input  type="date" wire:model.lazy="salida"  name="" id="">
                                @error('salida')
                            <span class="error">{{ $message }}</span>
                        @enderror
                                
                            </div>
                            <div id="modificar-ambas" wire:ignore.self>
                                <label for="">Nueva fecha de entrada</label>
                                <input  type="date" wire:model.lazy="entrada">
                                @error('entrada')
                                <span class="error">{{ $message }}</span>
                            @enderror
                                <x-spacing alto="1.7rem"></x-spacing>
                                <label for="">Nueva fecha de salida</label>
                                <input  type="date" wire:model.lazy="salida">
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

    <br>
   
    <a class="link-back" href="{{route('dashboard-homecamper', [ 'guardarfecha' => $guardarfecha ]) }}"> < Volver al resumen de actividad</a>
    <x-spacing alto="1.4rem"></x-spacing>
    
    <h1>{{$reserva->user->name}}</h1>
    <p style="margin-left:20px">{{$reserva->user->matricula}}<p>
    <x-spacing alto="1.7rem"></x-spacing>

    <div class="wrapper">

         <div class="wrapper_actividad">
            <h2>Reserva</h2>
            <x-spacing alto="0.7rem"></x-spacing>
            @if(blank($fechaocupada))
                @else
                
                <div id="avisofechas" class="alert alert-warning" role="alert">
                                        
                    <strong>No se ha podido modificar la reserva </strong><br>
                    <p>Vaya, has seleccionado alguna fecha en la que ya estás al completo:</p>
                    <ul>
                    @foreach ($fechaocupada as $nodisponible)
                        <li>  {{ $nodisponible }} (no disponible)</li>
                    @endforeach
                    </ul>
            </div>
            <x-spacing alto="0.7rem"></x-spacing>

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
                    <button data-toggle="modal" data-target="#fechas" wire:click="setActualizado" class="btn-secondary" >Modificar fechas</button>
                    </div>
            </div>
            <x-spacing alto="2rem"></x-spacing>
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


