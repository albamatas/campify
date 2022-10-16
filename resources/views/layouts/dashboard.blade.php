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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

      
        <link rel="stylesheet" href="{{ asset('css/app.css')}}">
        <link rel="stylesheet" href="{{ asset('css/components.css?v=').time() }}">

       @yield('css')
        @livewireStyles

        
    </head>

<body>
    <x-top-bar></x-top-bar>
    <x-spacing alto="4rem"></x-spacing>
    
@yield('dashboard') 


 
     <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>    
     <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
     <!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

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
      
    });
    //Para que cuando se modifiquen la fechas de una reserva, el pop up se cierre
    window.addEventListener('hide-form', event => {
                   
                   $('#fechas').modal('hide');  
              
           });

  //Si se muestra un aviso de fecha ocupada, se hace scroll hacia este para que esté visible
  
  if ($('#avisofechas').is(':visible')) {
              
              $('html, body').animate({
                          scrollTop: $("#avisofechas").offset(100).top
                          }, 100);       
          }
      
        $('#btn-reservas').click(function(){
            $('#btn-reservas').addClass('btn-selected');
            $('#btn-gris').removeClass('btn-selected'); 
           
            $('#btn-reservas img').css({'filter': 'opacity(100%)'});
            $('#btn-gris img').css({'filter': 'opacity(50%)'});        
        });
        $('#btn-gris').click(function(){
            $('#btn-gris').addClass('btn-selected');
            $('#btn-reservas').removeClass('btn-selected'); 
            
            $('#btn-gris img').css({'filter': 'opacity(100%)'});
            $('#btn-reservas img').css({'filter': 'opacity(50%)'});       
        });

        
           
        
        
        
          
             $('.make-blinking').click(function(){
                 
                $("div#arrow-next").removeClass("make-blinking");
                $("#arrow-back").removeClass("make-blinking");
                $(".blink").fadeOut(200);
                $(".blink").fadeIn(500);
                
                $("#arrow-next").delay(1000).addClass('make-blinking');
                $("#arrow-back").delay(1000).addClass('make-blinking');
                
                
            });
       
       
    </script>

     @livewireScripts  
    @yield('js')

    
</body>