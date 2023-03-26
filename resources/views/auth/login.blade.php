@extends('layouts.app')

@section('content')

<x-top-bar></x-top-bar>

<div class="container">
    <br>
    <br>
    <br>
    <div class="row justify-content-center">
        <div class="">
            <h1>Inicia sesión para acceder a tu cuenta de <span translate="no">campify</span></h1>
            <x-spacing alto="1rem"></x-spacing>        
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="">
                            <label for="email" class="">{{ __('Email') }}</label>
                            <x-spacing alto="0.4rem"></x-spacing> 
                            <div class="">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <x-spacing alto="1rem"></x-spacing> 
                        <div class="">
                            <label for="password" class="">{{ __('Contraseña') }}</label>
                            <x-spacing alto="0.4rem"></x-spacing> 
                            <div class="">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                               
                            </div>
                        </div>
                        <x-spacing alto="1rem"></x-spacing> 
                        <div class="">
                            <div class="">
                                <div class="form-check" style="display:flex">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label style="font-weight: 500" class="form-check-label" for="remember">
                                        {{ __('Recordar los datos de acceso en este dispositivo') }}
                                    </label>
                                </div>
                            </div>
                        </div>
                            
                        
                        <br>
                        <div class="row justify-content-center">
                            <div class="">
                                
                                <button type="submit" class="primary">
                                    {{ __('Acceder') }}
                                </button>
                            
                        </div>
                           
                        </div>
                    </form>
                </div>
                <br>
                <br>
                <br>
                <br>
                @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    {{ __('¿Has olvidado la contraseña?') }}
        </a>
        @endif
    </div>
</div>
@endsection
