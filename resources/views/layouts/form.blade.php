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

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
      
        <link rel="stylesheet" href="{{ asset('css/app.css')}}">
        <link rel="stylesheet" href="{{ asset('css/components.css?v=').time() }}">

       
        @livewireStyles

        
    </head>

<body>
    <x-top-bar></x-top-bar>
   
    <x-spacing alto="4rem"></x-spacing>
@yield('form')
   

 
     <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>    
     <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
     <!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

<script>
  /*document.addEventListener("DOMContentLoaded", () => {
        Livewire.hook('message.received', (message, component) => {         
            console.log('destroy');
            $('div.dropdown button.btn').hide();
            $('select').selectpicker('destroy');
        })
    });*/
    
    window.addEventListener('contentChanged', event => {
        console.log('changed');
        $('select').selectpicker('refresh');
        $('select').selectpicker();

        Livewire.on('scrollTop', function(){
        $(window).scrollTop(0);        
        });
      
    });

   
        $(document).ready(
            function() {
                
                $('#btn-acceso').click(
                    function(){
                    $('#login').modal('show')
                    }
                 );
                                  
        });

        
    

       
    
</script>
  

     @livewireScripts  
 
</body>