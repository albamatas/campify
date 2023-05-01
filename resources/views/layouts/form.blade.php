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
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-Eq3KjfdL+riXSL7VvMV61Fk5UD2b5z5uRK7cAVvTT8Wcn7VDe5H67p9+UxSqr1d8m3DqXhffm43/j6+ZU6OIPg==" crossorigin="">


        <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha384-L9kRcC1ZzeQfzv+jfsnha1KXMpYuBb3q3HvK5D7aFdm6gjqn6U5jwYHb7Q8GdVyP" crossorigin=""></script>
        @livewireStyles

        <!-- Hotjar Tracking Code for https://campify.es/public/ -->
<script>
    (function(h,o,t,j,a,r){
        h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
        h._hjSettings={hjid:3299873,hjsv:6};
        a=o.getElementsByTagName('head')[0];
        r=o.createElement('script');r.async=1;
        r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
        a.appendChild(r);
    })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
</script>
        
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

     <script type="text/javascript">
        function googleTranslateElementInit() {
            new google.translate.TranslateElement({pageLanguage: 'es', includedLanguages: 'ca,en,fr,it,pt,de', layout: google.translate.TranslateElement.InlineLayout.SIMPLE, gaTrack: true}, 'google_translate_element');
                }

    
        </script>
        
        <script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
    
 
</body>