<div>
    <div class="modal fade" id="descripcion" tabindex="-1" role="dialog" styles="z-index: 100000000000" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                <form method="POST">
                    @csrf
  
                    <div  class="row mb-3">
                       
                        <label for="descripcion" class="col-md-4 col-form-label text-md-end">Descripción</label>
                       
  
                        <div class="col-md-6">
                            @if ($user->homecamper->descripcion == null)
                            <textarea wire:model.defer="descripcion" name="description" id="" cols="30" rows="8"></textarea>
                            
                            @else 
                            <textarea wire:model.defer="descripcion" name="description" id="" cols="30" rows="8" value="{{old($user->homecamper->descripcion)}}"></textarea>
                            @endif
                            @error('descripcion')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                                
                </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="innerform" data-dismiss="modal">Cerrar</button>
             
            <button type="submit"  data-dismiss="modal"  wire:click="actualizarDescripcion()" class="btn btn-primary">Guardar</button>
           
            
          </div>
          </div>
        </div>
    </div>
      

      <div wire:ignore class="modal fade" id="servicios" tabindex="-1" role="dialog" styles="z-index: 100000000000" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
             
            <button type="submit"  data-dismiss="modal"  wire:click="actualizarServicios()" class="btn btn-primary">Guardar</button>
           
            
          </div>
          </div>
        </div>
      </div>
     

      <div class="modal fade"  id="fotos" tabindex="-1" role="dialog" styles="z-index: 100000000000" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
               
              <h5 class="modal-title" id="exampleModalLabel">Añadir fotos</h5>
              
              <button type="button" class="close cerrarfotos" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
                           
            </div>
            <div wire:ignore class="modal-body">
                <form method="POST">
                    @csrf
  
                    <div class="mb-3">
                                             
                        {{-- comment<div wire:loading wire:target="imageAll" class="alert alert-secondary" wire:change="set" role="alert">
                            <span style="height:20px; width: 20px;"> <img style="height:20px; width: 20px;" src="{{ asset('images/loading.gif') }}" alt=""></span>
                            Cargando la/s imagen/es seleccionadas... Puede tardar unos segundos...
                          </div>
                         --}}
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
              
             {{--  @if($imageAll)comment 
              
             <button type="submit" id="cerrar" class="cerrarfotos btn btn-primary" data-dismiss="modal" wire:click="subirImagen" wire:target="imageAll" onclick="hide_modal()">Subir fotos</button>
             {{-- @endif 
                   <div wire:loading wire:target="imageAll">
                       <span  style="height:20px; width: 20px;"> <img style="height:20px; width: 20px;" src="{{ asset('images/loading.gif') }}" alt=""></span>
                        Cargando...
                    </div>
                    --}}
                    
            
                    </div>
                </div>
            </div>
        </div>
  
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
                                    <p style="font-style:italic; font-size:80%">Próximamente podrás editar este dato</p>
                
                        @endisset
                     </div>
                 </div>

                <x-spacing alto="2rem"></x-spacing>
                <h2>Tipo de establecimiento</h2>
                <x-spacing alto="0.7rem"></x-spacing>
                <div class="actividad">
                        <div class="content_actividad">
                          <p>{{$user->homecamper->tipo->tipo}}</p>
                          <p style="font-style:italic; font-size:80%">Próximamente podrás editar este dato</p>
                        </div>
                </div>
                
                <x-spacing alto="2rem"></x-spacing>
                <h2>Precio por 24h</h2>
                <x-spacing alto="0.7rem"></x-spacing>
                <div class="actividad">
                        <div class="content_actividad">
                            <p>{{$user->homecamper->precio}} €</p>
                            <p>{{$user->homecamper->precio_descripcion}}</p>
                            <p style="font-style:italic; font-size:80%">Próximamente podrás editar este dato</p>
                        </div>
                </div>

                <x-spacing alto="2rem"></x-spacing>
                <h2>Número de plazas</h2>
                <x-spacing alto="0.7rem"></x-spacing>
                <div class="actividad">
                        <div class="content_actividad">
                            <p>{{$user->homecamper->plazas}}</p>
                            <p style="font-style:italic; font-size:80%">Próximamente podrás editar este dato</p>
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
                           
                            @if(blank($user->homecamper->fotos))
                            @if($imageAll)
                             @else
                            <style>
                                #avisocompletarfotos{
                                    display:block !important;
                                }
                            </style>
                            
                                    
                                    <div wire:target="subirImagen" wire:loading.delay.remove id="avisocompletarfotos" class="alert alert-warning" role="alert">
                                    <p><strong>Aún no has subido ninguna foto de tu estabecimiento.</strong> <br>
                                            ¿Tú irías a un sitio que no tiene fotos? ¿A qué esperas?<br>
                                            ¡Súbelas ahora!</p>

                                            
                                                <input
                                                    type="file"
                                                    id="fileElem"
                                                    multiple
                                                    accept="image/*"
                                                    style="display:none !important" wire:model="imageAll"/>
                                                    <div class="custom-input-file col-md-6 col-sm-6 col-xl-6" data-toggle="modal" id="fileSelect" data-target="#fotos" >
                                                    Añadir fotos
                                                    
                                            <!-- <input class="input-file" type="file" accept="image/*" multiple wire:model="imageAll">
                                                Añadir fotos -->
                                            </div>

                                            

                                    </div>
                                     @endif
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
        
        <div id="btn-reservas" class="btn-bottom " onclick="window.location.href='{{route('dashboard-homecamper', ['user' => $user, $guardarfecha])}}'">
                    <img src="{{asset('/images/reservas.svg')}}"  style="width: 20px; height:20px; filter: opacity(50%);" alt="">
                    <p>Reservas</p>
             </div>  
      
             
         
             <div id="btn-gris" class="btn-bottom btn-selected" onclick="window.location.href='{{route('editar-homecamper', ['user' => $user, $guardarfecha])}}'">
                <img src="{{asset('/images/user.svg')}}" class="svg-selected" style="width: 20px; height:20px" alt="">
                <p>Editar perfil</p>
        </div>
    </div>
     
       
</div>
