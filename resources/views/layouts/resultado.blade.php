<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

            <!-- Fonts -->
        
       <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet'>
       
         <!-- Styles -->
        <style>
        @import url(http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,700italic,300,400,700);
        </style>
               
                <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
        
       
      
        <link rel="stylesheet" href="{{ asset('/css/app.css')}}">
        <link rel="stylesheet" href="{{ asset('/css/components.css') }}">

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>    
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
       
        @livewireStyles
        
    </head>

<body>
    <div class="grey">
    <img src="{{ asset('/images/check_verde.svg')}}" alt="">
    <x-spacing alto="1rem"></x-spacing>
    <h1 style="text-align: center">@yield('h1')</h1>
    </div>  

    <div class="resultado">
        @yield('resumen')
    </div>

    @yield('modal')   

    <script>
        $(document).ready(
            function() {
                $('#btn-acceso').click(
                    function(){
                    $('#login').modal('show')
                    }
                 )
            }
         );
    </script>
     @livewireScripts
</body>