<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        @yield('seo')

            <!-- Fonts -->
        
       <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet'>
       
         <!-- Styles -->
        <style>
        @import url(http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,700italic,300,400,700);
        </style>
        
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">


        <!-- Latest compiled and minified CSS -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>   

        <link rel="stylesheet" href="{{ asset('css/app.css')}}">
        <link rel="stylesheet" href="{{ asset('css/components.css?v=').time() }}">

       
        @livewireStyles

        
    </head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <x-top-bar_acces></x-top-bar_acces>
    @livewire('modal-login', [ 'acceso' => 'login', 'homecamper' => null, 'entrada' => null, 'salida' => null, 'dias' => null, 'precio' => null ])

   @yield('content')

        
     
   <!-- Latest compiled and minified CSS 
      <script>  
        $(document).ready(
            function() {
                $('#btn-acceso').click(
                    function(){
                    $('#login').modal('show')
                    }
                 );
                }
         );
    </script>
        
        -->

     @livewireScripts

     <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>