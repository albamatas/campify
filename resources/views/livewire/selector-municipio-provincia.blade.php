<div>
    <label for="">Provincia</label>      
    <div wire:ignore>         
                           <select wire:model.lazy="provincia" id="select_provincia" class="predictivo">
                    <option value="">Escribe o selecciona una opción</option>
                        @foreach ($provincias as $provincia)
                            <option translate="no" value="{{$provincia->id}}">{{$provincia->provincia}}</option>
                       @endforeach
                </select> 
                 
            </div>
            @error('provincia')
            <span class="error">{{ $message }}</span>
        @enderror
            @if ($provincia_id_get === null)

                    
            @else
            <x-spacing alto="1.7rem"></x-spacing>
          <label for="">Población</label>
               
                <div wire:ignore>                    
                    <select wire:model.lazy='poblacion' class='predictivo'>
                        <option translate="no" value="">Escribe o selecciona una opción</option>
                                    @foreach ($poblacionSelected as $poblacion)
                                <option value="{{$poblacion->id}}">{{$poblacion->poblacion}}</option>
                        @endforeach
                    </select>
                </div>
                @error('provincia')
                <span class="error">{{ $message }}</span>
            @enderror
     
                
            
             @endif
             <script>
                // In your Javascript (external .js resource or <script> tag)
            
            
                  $(document).ready(function() {
              $('#select_provincia').select2();
              $('#select_poblacion').select2();
              });
              
              
                $('#select_provincia').on('change', function(){
                   @this.set('provincia_id_get', this.value);
                  });
                
        
                        /*
                    * Hacky fix for a bug in select2 with jQuery 3.6.0's new nested-focus "protection"
                    * see: https://github.com/select2/select2/issues/5993
                    * see: https://github.com/jquery/jquery/issues/4382
                    *
                    * TODO: Recheck with the select2 GH issue and remove once this is fixed on their side
                    */
        
                    $(document).on('select2:open', () => {
                     document.querySelector('.select2-search__field').focus();
                    });
                     
                                
                            
            </script>
        
</div>  