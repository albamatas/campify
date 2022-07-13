<div class="modal fade" id="descripcion" tabindex="-1" role="dialog" styles="z-index: 100000000000" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Añadir descripción</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              <form method="POST">
                  @csrf

                  <div  class="row mb-3">
                      <label for="descripcion" class="col-md-4 col-form-label text-md-end">Descripción {{$user}}</label>

                      <div class="col-md-6">
                          <input wire:model.defer="descripcion" type="text" class="form-control @error('descripcion') is-invalid @enderror" name="descripcion" value="{{ old() }}" autofocus>

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
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
           
          <button type="submit"  wire:click="actualizarDescripcion($user->homecamper->descripcion)" class="btn btn-primary">Guardar</button>
         
          
        </div>
        </div>
      </div>
    </div>
  
