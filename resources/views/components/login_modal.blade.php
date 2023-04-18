 @props(['acceso'])
    <div class="modal fade" id="login" tabindex="-1" role="dialog" styles="z-index: 100000000000" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
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

                  <a class="btn btn-link" href="{{ route('password.email') }}">No recuerdo mis datos de acceso</a>
                              
              </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
           @if ($acceso == 'login')
           <button type="submit"  wire:loadig.attr="disabled"href="{{ route('login') }}" class="btn btn-primary">
            <span wire:loading wire:target="" style="height:30px; width: 30px;"> <img style="height:30px; width: 30px;" src="{{ asset('images/loading.gif') }}" alt=""></span>
            Acceder</button>
          @else
          <button type="submit"  wire:click="authenticate()" wire:loadig.attr="disabled" wire:target="authenticate()" class="btn btn-primary">
            <span wire:loading wire:target="authenticate()" style="height:30px; width: 30px;"> <img style="height:30px; width: 30px;" src="{{ asset('images/loading.gif') }}" alt=""></span>Acceder</button>
          @endif
          
        </div>
        </div>
      </div>
    </div>
  
