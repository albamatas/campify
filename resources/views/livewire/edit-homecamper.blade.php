<div>

    {{-------------------- EDITAR NOMBRE ----------------------}}
    <div wire:ignore.self class="modal fade" id="nombre" tabindex="-1" role="dialog" styles="z-index: 100000000000" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
                
              <h5 class="modal-title" id="exampleModalLabel">Editar nombre</h5>
              
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
   
                        
            </div>
            <div class="modal-body">
                <form wire:submit.prevent method="POST">
                    @csrf
  
                    <div  class="row mb-3">
                       
                        <label for="nombre" class="">Nombre de tu área camper</label>
                       
  
                        <div class="">
                            <textarea wire:model="nombre" name="nombre" id="" cols="30" rows="8"></textarea>
                            
                            @error('nombre')
                            <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                                
                </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="innerform" data-dismiss="modal">Cerrar</button>
             
            <button type="button"  wire:loading.attr="disabled" wire:click="actualizarNombre()" class="btn btn-primary">
                <span wire:loading wire:target="actualizarNombre()" style="height:30px; width: 30px"> <img style="height:30px; width: 30px" src="{{ asset('images/loading.gif') }}" alt=""></span>
                Guardar</button>            
          </div>
          </div>
        </div>
    </div>

    {{-------------------- EDITAR DESCRIPCION ----------------------}}

    <div wire:ignore.self class="modal fade" id="descripcion" tabindex="-1" role="dialog" styles="z-index: 100000000000" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
                @if ($user->homecamper->descripcion == null)
              <h5 class="modal-title" id="exampleModalLabel">Añadir descripción</h5>
              @else
              <h5 class="modal-title" id="exampleModalLabel">Editar descripción</h5>
              @endif
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
   
                        
            </div>
            <div class="modal-body">
                <form wire:submit.prevent method="POST">
                    @csrf
  
                    <div  class="row mb-3">
                       
                        <label for="descripcion" class="">Descripción</label>
                       
  
                        <div class="">
                            @if ($user->homecamper->descripcion == null)
                            <textarea wire:model.defer="descripcion" name="description" id="" cols="30" rows="8"></textarea>
                            
                            @else 
                            <textarea wire:model="descripcion" name="description" id="" cols="30" rows="8"></textarea>
                            @endif
                            @error('descripcion')
                            <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                                
                </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="innerform" data-dismiss="modal">Cerrar</button>
             
            <button type="submit"  wire:loading.attr="disabled" wire:click="actualizarDescripcion()" class="btn btn-primary">
                <span wire:loading wire:target="actualizarDescripcion()" style="height:30px; width: 30px;"> <img style="height:30px; width: 30px;" src="{{ asset('images/loading.gif') }}" alt=""></span>
                Guardar</button>
           
            
          </div>
          </div>
        </div>
    </div>

     {{-------------------- EDITAR TIPO ----------------------}}

     <div wire:ignore.self class="modal fade" id="tipo" tabindex="-1" role="dialog" styles="z-index: 100000000000" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
                
              <h5 class="modal-title" id="exampleModalLabel">Editar tipo de establecimiento</h5>
              
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
   
                        
            </div>
            <div class="modal-body">
                <form wire:submit.prevent method="POST">
                    @csrf
  
                    <div  class="row mb-3">
                                       
  
                       
                            <div >  
                                <select id="tipo" class="form-select-me predictivo" data-live-search="true" wire:model="tipo" name="" id="" >
                                    <option value="">Selecciona una opción</option>
                                    @foreach ($tipos as $tipo)
                                        <option value="{{$tipo->id}}">{{$tipo->tipo}}</option>
                                    @endforeach
                                 </select>
                            </div>
                                @error('tipo')
                                <span class="error">{{ $message }}</span>
                                @enderror
                       
                    </div>
                                
                </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="innerform" data-dismiss="modal">Cerrar</button>
             
            <button type="button"  wire:loading.attr="disabled" wire:click="actualizarTipo()" class="btn btn-primary">
                <span wire:loading wire:target="actualizarTipo()" style="height:30px; width: 30px;"> <img style="height:30px; width: 30px;" src="{{ asset('images/loading.gif') }}" alt=""></span>
                Guardar</button>
           
            
          </div>
          </div>
        </div>
    </div>


     
   

    {{-------------------- EDITAR PRECIO ----------------------}}

    <div wire:ignore.self class="modal fade" id="precio" tabindex="-1" role="dialog" styles="z-index: 100000000000" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
                
              <h5 class="modal-title" id="exampleModalLabel">Editar precio</h5>
              
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
   
                        
            </div>
            <div class="modal-body">
                <form wire:submit.prevent method="POST">
                    @csrf
  
                    <div  class="row mb-3">
                                       
  
                        <div class="">
                            <label id="scroll_precio">¿Cuánto vas a cobrar por cada plaza?</label>
                            <span style=" display: block; width: 100%"> <input wire:model.lazy="precio" style="width: 80px; display: inline-block !important" type="text" name="" id="precio">   €</span>
                            @error('precio')
                                 <span class="error">{{ $message }}</span>
                             @enderror
                                  
                            <p class="hint">
                             Para que te hagas una idea: los precios de las áreas sin servicios como electricidad, agua o vaciado, 
                             suelen rondar los 5-8€, y entre 10-18€ los que más servicios tienen y según temporada.
                             </p>
                            
                        </div>
                    </div>
                                
                </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="innerform" data-dismiss="modal">Cerrar</button>
             
            <button type="button"  wire:loading.attr="disabled" wire:click="actualizarPrecio()" class="btn btn-primary">
                <span wire:loading wire:target="actualizarPrecio()" style="height:30px; width: 30px;"> <img style="height:30px; width: 30px;" src="{{ asset('images/loading.gif') }}" alt=""></span>
                Guardar</button>
          </div>
          </div>
        </div>
    </div>

    {{-------------------- EDITAR PLAZA ----------------------}}
    <div wire:ignore.self class="modal fade" id="plazas" tabindex="-1" role="dialog" styles="z-index: 100000000000" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
                
              <h5 class="modal-title" id="exampleModalLabel">Editar plazas</h5>
              
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
   
                        
            </div>
            <div class="modal-body">
                <form wire:submit.prevent method="POST">
                    @csrf
  
                    <div  class="row mb-3">
                                       
  
                        <div class="">
                            <label id="scroll_precio">¿Cuantas plazas tienes?</label>
                            <span style=" display: block; width: 100%"> <input wire:model="plazas" style="" type="number" name="" id="lazas">  </span>
                            @error('plazas')
                                 <span class="error">{{ $message }}</span>
                             @enderror
                                                              
                        </div>
                    </div>
                                
                </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="innerform" data-dismiss="modal">Cerrar</button>
             
            <button type="button"  wire:loading.attr="disabled" wire:click="actualizarPlazas()" class="btn btn-primary">
                <span wire:loading wire:target="actualizarPlazas()" style="height:30px; width: 30px;"> <img style="height:30px; width: 30px;" src="{{ asset('images/loading.gif') }}" alt=""></span>
                Guardar</button>
           
            
          </div>
          </div>
        </div>
    </div>
      
    {{-------------------- EDITAR SERVICIOS ----------------------}}

      <div wire:ignore.self class="modal fade" id="servicios" tabindex="-1" role="dialog" styles="z-index: 100000000000" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
                @if (blank($user->homecamper->servicios))
              <h5 class="modal-title" id="exampleModalLabel">Añadir servicios</h5>
              @else
              <h5 class="modal-title" id="exampleModalLabel">Editar servicios</h5>
              @endif
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
   
                        
            </div>
            <div class="modal-body">
                <form method="POST">
                    @csrf
  
                    <div  class="">
                         
                        <div class="">
                            <div class="check-wrapper">
                            
                                @foreach ($staticservicio as $static)    
                                       
                                        @foreach ($user->homecamper->servicios as $servicio)   
                                       
                                                
                                            @if ($static->id == $servicio->id)

                                                @php
                                                 $checked = true;
                                                @endphp
                                                <div class="check-item">
                                                    <input type="checkbox" wire:model="serviciosSelected" class="form-check-input" value="{{$static->id}}" id="{{$static->id}}" checked> 
                                                    <label for="{{$static->id}}">{{$static->servicio}}</label> 
                                                </div>
                                            @endif
        
                                        @endforeach
                                        
                                        @if($checked==false) 
                                        <div class="check-item">
                                            <input type="checkbox" wire:model="serviciosSelected" class="form-check-input" value="{{$static->id}}" id="{{$static->id}}">    
                                            <label for="{{$static->id}}">{{$static->servicio}}</label>    
                                        </div>
                                        @endif
        
                                        @if($checked==true)  
                                            @php
                                                $checked = false;
                                            @endphp      
                                        @endif 
                                               
                                     @endforeach
                                    
                                 </div>
                            
                        </div>
                    </div>
                                
                </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="innerform" data-dismiss="modal">Cerrar</button>
             
            <button type="submit"  data-dismiss="modal"  wire:click="actualizarServicios()" wire:loading.attr="disabled" wire:target="actualizarServicios()" class="btn btn-primary">
                <span wire:loading wire:target="actualizarServicios()" style="height:30px; width: 30px;"> <img style="height:30px; width: 30px;" src="{{ asset('images/loading.gif') }}" alt=""></span>Guardar</button>
           
            
          </div>
          </div>
        </div>
      </div>
     
      {{-------------------- EDITAR FOTOS ----------------------}}

      <div class="modal fade"  id="fotos" tabindex="-1" role="dialog" styles="z-index: 100000000000" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
               
              <h5 class="modal-title" id="exampleModalLabel">Añadir fotos</h5>
              
              <button type="button" class="close cerrarfotos" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
                           
            </div>
            <div wire:ignore
             class="modal-body">
                <form method="POST">
                    @csrf
  
                    <div class="mb-3">
                                             
                         <div wire:loading wire:target="imageAll" class="alert alert-secondary" wire:change="set" role="alert">
                            <span style="height:20px; width: 20px;"> <img style="height:20px; width: 20px;" src="{{ asset('images/loading.gif') }}" alt=""></span>
                            Procesando las imagenes. Tiempo estimado de carga: 1 minuto. 
                          </div>
                         
                          <div id="fileList" class="fotos-grid" style="max-height: 400px; overflow-y: scroll">
                            
                            </div>

                            {{-- 
                                                     
                          co@if ($imageAll)
                            <div class="alert alert-success" role="alert">
                                Estas son las fotos que has seleccionado. Ahora, ¡Súbelas! 
                            </div>
                            <div class="fotos-grid" style="max-height: 400px; overflow-y: scroll">
                               
                                @foreach ($imageAll as $image)
                                <img style="width:100%" src="{{$image->temporaryUrl()}}">
                                @endforeach
                                                                
                            </div>
                         co@endif
                        comment --}}
  
                    </div>
                                
                </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="innerform cerrarfotos" click="" data-dismiss="modal">Cerrar</button>
              
              @if($imageAll)
              
             <button type="submit" id="cerrar" class="cerrarfotos btn btn-primary" data-dismiss="modal" wire:click="subirImagen" wire:target="imageAll" onclick="hide_modal()">Subir fotos</button>
              @endif 
                   <div wire:loading wire:target="imageAll">
                       <span  style="height:20px; width: 20px;"> <img style="height:20px; width: 20px;" src="{{ asset('images/loading_black.gif') }}" alt=""></span>
                        Cargando...
                    </div>
                    
                    
            
                    </div>
                </div>
            </div>
        </div>

        {{-------------------- CONTENT ----------------------}}
  
    <h1>Gestiona tu cuenta </h1>
               <x-spacing alto="1.7rem"></x-spacing>
               <h2>Cerra sesión</h2>
               <x-spacing alto="0.7rem"></x-spacing>
               <button wire:click="logout" class="btn-secondary" >Cerrar sesión</button>
              <x-spacing alto="1.7rem"></x-spacing>
              <hr class="solid">
              <x-spacing alto="1.7rem"></x-spacing>
         {{-------------------- AVISO ----------------------}}
         <h1>Editar información </h1>
         <x-spacing alto="1.7rem"></x-spacing>
        @if (blank($user->homecamper->fotos) || $user->homecamper->descripcion == null || blank($servicios))
            <div id="avisocompletarinfo" class="alert alert-warning" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <strong>Faltan datos para que tu establecimiento esté completo</strong><br>
                <p>Revisa los siguientes bloques y añade la información que falta:</p>
                <ul>
                   
                    @empty($user->homecamper->descripcion)
                    <li>Descripción de tu establecimiento</li>
                    @endempty 

                    @if(blank($servicios))
                    <li>Servicios</li>
                    @endif   

                    @if(blank($user->homecamper->fotos))
                    <li>Fotos</li>
                    @endif    
                </ul>
                
            </div>  
            <x-spacing alto="2rem"></x-spacing>     
                   
        @endif
               
        <div class="wrapper">
    
             <div class="wrapper_actividad">
                <h2>Nombre de tu establecimiento</h2>
                <x-spacing alto="0.7rem"></x-spacing>

                    <div class="actividad">       
                            <div class="content_actividad">
                                <p>{{$user->homecamper->nombre}}</p>
                                <x-spacing alto="0.7rem"></x-spacing>
                                <button data-toggle="modal" data-target="#nombre" wire:click="" class="btn-secondary btn-ic" > <img src="{{ asset('images/ic_edit.svg')}}" alt="">  Editar nombre</button>
                                <x-spacing alto="0.7rem"></x-spacing>
                                <p style="font-style:italic; font-size:80%">Próximamente podrás editar este dato</p>
                            </div>
                    </div>

                <x-spacing alto="2rem"></x-spacing>
                <h2>Descripción</h2>
                <x-spacing alto="0.7rem"></x-spacing>

                <div class="actividad">
                    <div class="content_actividad">                   
                        @empty($user->homecamper->descripcion)

                        <style>
                            #avisofaltadescripcion{
                                display:block !important;
                            }
                        </style>
                            <div id="avisofaltadescripcion" class="alert alert-warning"> 
                                <p><strong>Aún no has añadido ningúna despcripción. </strong><br>
                                Es el momento de diferenciarte de la competencia y explicar porqué tu establecimiento es mejor que los otros. Puedes hablar de ti, el personal o el trato que ofreces, del entorno y las actividades por hacer, de los idiomas que habláis y de otras condiciones favorables.</p>
                                <button type="button" data-toggle="modal" data-target="#descripcion" class="btn-secondary">Añadir descripción</button>
                                
                            </div>
                    
                        @endempty  
                        
                        @isset($user->homecamper->descripcion)
                        <style>
                            #avisofaltadescripcion{
                                display:none !important;
                            }
                        </style>
                                
                                    <p>{{$user->homecamper->descripcion}}</p>
                                    <x-spacing alto="0.7rem"></x-spacing>
                                     <button data-toggle="modal" data-target="#descripcion" wire:click="" class="btn-secondary btn-ic" > <img src="{{ asset('images/ic_edit.svg')}}" alt="">  Editar descripción</button>
                                    <x-spacing alto="0.7rem"></x-spacing>
                                 {{--   <p style="font-style:italic; font-size:80%">Próximamente podrás editar este dato</p> comment --}} 
                
                        @endisset
                     </div>
                 </div>

                <x-spacing alto="2rem"></x-spacing>
                <h2>Tipo de establecimiento</h2>
                <x-spacing alto="0.7rem"></x-spacing>
                <div class="actividad">
                        <div class="content_actividad">
                          <p>{{$user->homecamper->tipo->tipo}}</p>
                          <x-spacing alto="0.7rem"></x-spacing>
                                <button data-toggle="modal" data-target="#tipo" wire:click="" class="btn-secondary btn-ic" > <img src="{{ asset('images/ic_edit.svg')}}" alt="">  Editar tipo</button>
                                <x-spacing alto="0.7rem"></x-spacing>
                        </div>
                </div>
                
                <x-spacing alto="2rem"></x-spacing>
                <h2>Precio por 24 horas</h2>
                <x-spacing alto="0.7rem"></x-spacing>
                <div class="actividad">
                        <div class="content_actividad">
                            <p>{{$user->homecamper->precio}} €</p>
                            <p>{{$user->homecamper->precio_descripcion}}</p>
                            <x-spacing alto="0.7rem"></x-spacing>
                                     <button data-toggle="modal" data-target="#precio" wire:click="" class="btn-secondary btn-ic" > <img src="{{ asset('images/ic_edit.svg')}}" alt="">  Editar precio</button>
                                    <x-spacing alto="0.7rem"></x-spacing>
                        </div>
                </div>

                <x-spacing alto="2rem"></x-spacing>
                <h2>Número de plazas</h2>
                <x-spacing alto="0.7rem"></x-spacing>
                <div class="actividad">
                        <div class="content_actividad">
                            <p>{{$user->homecamper->plazas}}</p>
                            <x-spacing alto="0.7rem"></x-spacing>
                            <button data-toggle="modal" data-target="#plazas" wire:click="" class="btn-secondary btn-ic" > <img src="{{ asset('images/ic_edit.svg')}}" alt="">  Editar plazas</button>
                            <x-spacing alto="0.7rem"></x-spacing>
                        </div>
                </div>

                <x-spacing alto="2rem"></x-spacing>
                <h2>Servicios</h2>
                <x-spacing alto="0.7rem"></x-spacing>
                <div class="actividad">
                    <div class="content_actividad">
                            
                     @if(blank($servicios))
                     <style>
                        #avisocompletarservicios{
                            display:block !important;
                        }
                    </style>

                            <div id="avisocompletarservicios" class="alert alert-warning" role="alert">
                                 <p><strong>Aún no has añadido ningún servicio. </strong><br>
                                ¿Seguro que no ofreces ningún servicio? Hay servicios básicos como que el terreno esté vallado o que admita mascotas. <br> 
                                ¡Revisa los servicios que puedas tener y añádelos!</p>
                                
                                <button type="button" data-toggle="modal" data-target="#servicios" class="btn-secondary">Añadir servicios</button>
                           
                            </div>
                    @else
                    <style>
                        #avisocompletarservicios{
                            display:none !important;
                        }
                    </style>
                           
                             <ul>
                                @foreach ($user->homecamper->servicios as $servicio)
                                        
                                <li>{{$servicio->servicio->servicio}}</li>                           
                                
                                @endforeach
                            
                             </ul>
                             <x-spacing alto="0.7rem"></x-spacing>
                             <button data-toggle="modal" data-target="#servicios" wire:click="" class="btn-secondary btn-ic" > <img src="{{ asset('images/ic_edit.svg')}}" alt="">  Editar Servicios</button>
                             <x-spacing alto="0.7rem"></x-spacing>
                         
                    @endif
                </div>
                </div>
                         
                
                <x-spacing alto="2rem"></x-spacing>
                <h2>Fotos</h2>
                <x-spacing alto="0.7rem"></x-spacing>
                <div class="actividad">
                    
                        <div class="content_actividad">
                            <div wire:loading wire:target="subirImagen" class="alert alert-secondary" role="alert">
                                <span  style="height:20px; width: 20px;"> <img style="height:20px; width: 20px;" src="{{ asset('images/loading.gif') }}" alt=""></span>
                                Subiendo imágenes...</div> 
                                <br>  
                           
                            @if(blank($user->homecamper->fotos))
                            
                            <style>
                                #avisocompletarfotos{
                                    display:block !important;
                                }
                            </style>
                            
                                    
                                    <div wire:target="subirImagen" wire:loading.remove id="avisocompletarfotos" class="alert alert-warning" role="alert">
                                    <p><strong>Aún no has subido ninguna foto de tu estabecimiento.</strong> <br>
                                            ¿Tú irías a un sitio que no tiene fotos? ¿A qué esperas?<br>
                                            ¡Súbelas ahora!</p>

                                            
                                                <input
                                                    type="file"
                                                    id="fileElem"
                                                    multiple
                                                    accept="image/*"
                                                    style="display:none !important" wire:model.defer="imageAll"/>
                                                    <div class="custom-input-file col-md-6 col-sm-6 col-xl-6" data-toggle="modal" id="fileSelect" wire:change="set" data-target="#fotos" >
                                                    Añadir fotos
                                                    
                                            {{-- comment  <input class="input-file" type="file" accept="image/*" multiple wire:model="imageAll">
                                                Añadir fotos
                                                --}}
                                            </div>

                                            

                                    </div>
                                    
                            @else
                            <style>
                                #avisocompletarfotos{
                                    display:none !important;
                                }
                            </style>
                                <div class="fotos-grid" style="max-width:100%">
                                    @foreach ($fotos as $foto)
                                        <img src="{{ asset($foto->url) }}" alt="">
                                    @endforeach
                                    
                                    @if($imgtempAll)
                                        @foreach ($imgtempAll as $imgtemp)
                                            <img src="{{$imgtemp->temporaryUrl()}}" alt="">
                                        @endforeach
                                    
                                    @endif
                                </div>
                                    
                                      
                                <x-spacing alto="0.7rem"></x-spacing>
                               
                                    <p style="font-style:italic; font-size:80%">Próximamente podrás editar este dato</p>
                                      
                                
                            @endif
                        </div>
                
                     
                </div>
               
            </div>
    
      </div>  

      <div class="bottom_wrapper">
        <div id="btn-actividad" class="btn-bottom" onclick="window.location.href='{{route('dashboard-homecamper', ['user' => $user, $guardarfecha])}}'">
            <img src="{{asset('/images/actividad.svg')}}" class="svg-selected" style="width: 20px; height:20px; filter: opacity(50%)" alt="">
            <p>Actividad</p>
     </div>  

        <div id="btn-reservas" class="btn-bottom " onclick="window.location.href='{{route('reservas', ['user' => $user])}}'">
                    <img src="{{asset('/images/reservas.svg')}}"  style="width: 20px; height:20px; filter: opacity(50%)" alt="">
                    <p>Reservas</p>
             </div>  
      
             
         
             <div id="btn-gris" class="btn-bottom btn-selected" onclick="window.location.href='{{route('editar-homecamper', ['user' => $user, $guardarfecha])}}'">
                <img src="{{asset('/images/user.svg')}}" class="svg-selected" style="width: 20px; height:20px" alt="">
                <p>Cuenta</p>
        </div>
    </div>

     
       
</div>
