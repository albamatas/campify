@extends('layouts.base')
    
       
        @section('h1','¿Olvidaste tu contraseña?' )
            

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        @section('content')
        <p> Informa tu email y te haremos llegar el enlace para que definas una nueva.</p>
           
        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password-email') }}">
            @csrf

            <div class="block">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="flex items-center justify-end mt-4">
                <button class="primary">
                        {{ __('Recibir email') }}
                </button>
            </div>
        </form>
    
    @endsection

