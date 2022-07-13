@extends('layouts.dashboard')

@section('title', 'Resumen de actividad')

@section('css')
@endsection

@section('dashboard')

<div class="dash_container">
   
   
        @livewire('resumen-actividad', ['user' => $user, 'guardarfecha' => $guardarfecha])   
    
    

    <x-spacing alto="6rem"></x-spacing>
    
</div>

<div class="bottom_wrapper">
        
  <div id="btn-reservas" class="btn-bottom btn-selected" onclick="window.location.href='{{route('dashboard-homecamper', $user)}}'">
              <img src="{{asset('/images/reservas.svg')}}" class="svg-selected" style="width: 20px; height:20px" alt="">
              <p>Reservas</p>
       </div>  

       
   
       <div id="btn-gris" class="btn-bottom" onclick="window.location.href='{{route('editar-homecamper', $user)}}'">
          <img src="{{asset('/images/user.svg')}}" style="width: 20px; height:20px; filter: opacity(50%);" alt="">
          <p>Editar perfil</p>
  </div>
  
@endsection

@section('js')
    <script>
        $('#tab1').click(function(){
            $('#tab2').removeClass('tab-selected');
            $('#tab1').addClass('tab-selected');
            $('div#resultado-salidas').css({'display':'none'});
            $('div#resultado-entradas').css({'display':'block'});

        });
        $('#tab2').click(function(){
            $('#tab1').removeClass('tab-selected');
            $('#tab2').addClass('tab-selected');
            $('div#resultado-entradas').css({'display':'none'});
            $('div#resultado-salidas').css({'display':'block'});

        })

       
        
        $(window).scroll(function() {
              var top = $(window).scrollTop();

            if(top > 180) {
                $('.topday').css({'display': 'block'});
            }else{
                $('.topday').css({'display': 'none'});
            }           
        });

        $('.topday').click(function(){
              
                $('html, body').animate({
                            scrollTop: $("#h1-scroll").offset().top
                            }, 100); 
                          
            }
        );

        $('#entradas').click(function(){
            $('#tab2').removeClass('tab-selected');
            $('#tab1').addClass('tab-selected');
            $('div#resultado-salidas').css({'display':'none'});
            $('div#resultado-entradas').css({'display':'block'});

              
              $('html, body').animate({
                          scrollTop: $("#movimientos").offset().top -50
                          }, 100); 

                        
          }
      );
      $('#salidas').click(function(){
        $('#tab1').removeClass('tab-selected');
            $('#tab2').addClass('tab-selected');
            $('div#resultado-entradas').css({'display':'none'});
            $('div#resultado-salidas').css({'display':'block'});
              $('html, body').animate({
                          scrollTop: $("#movimientos").offset().top -50
                          }, 100); 
                        
          }
      );
      $('#pernoctas').click(function(){
              
              $('html, body').animate({
                          scrollTop: $("#scroll_pernoctas").offset().top -50
                          }, 100); 
                        
          }
      );
        
    </script>
@endsection