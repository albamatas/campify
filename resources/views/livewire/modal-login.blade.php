<div wire:ignore.self>
    <div wire:ignore.self class="modal fade" id="login" tabindex="-1" role="dialog" styles="z-index: 100000000000" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div wire:ignore.self class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Accede a tu cuenta</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              <form method="POST">
                  @csrf

                  <div  class="row mb-3">
                      <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email') }}</label>

                      <div class="col-md-6">
                          <input wire:model.defer="email2" type="email" class="form-control @error('email2') is-invalid @enderror" name="email2" value="{{ old('email') }}" required autocomplete="email" autofocus>

                          @error('email2')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
                  </div>

                  <div  class="row mb-3">
                      <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Contraseña') }}</label>

                      <div class="col-md-6">
                          <input wire:model.defer="password2" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                          @error('password')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
                  </div>

                  <a class="btn btn-link" href="{{ route('password.request') }}">No recuerdo mis datos de acceso</a>
                              
              </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn innerform" data-dismiss="modal">Cerrar</button>
                   @if($acceso == 'login')
                      <button type="button" wire:click="authenticate" class="btn btn-primary">Acceder</button>
                    @elseif ($acceso == 'reservar')
                    <button type="button" wire:click="authenticate" class="btn btn-primary">Acceder</button>
                    @endif

          
        </div>
        </div>
      </div>
    </div>
</div>
