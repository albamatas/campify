@extends('layouts.dashboard')

@section('title', 'Edita tu perfil')

@section('css')

@endsection

@section('dashboard')

<div class="dash_container">
  
    @livewire('edit-homecamper', ['user' => $user])

    <x-spacing alto="6rem"></x-spacing>
    

</div>   

<div class="bottom_wrapper">
        
    <div id="btn-reservas" class="btn-bottom " onclick="window.location.href='{{route('dashboard-homecamper', $user)}}'">
                <img src="{{asset('/images/reservas.svg')}}"  style="width: 20px; height:20px; filter: opacity(50%);" alt="">
                <p>Reservas</p>
         </div>  
  
         
     
         <div id="btn-gris" class="btn-bottom btn-selected" onclick="window.location.href='{{route('editar-homecamper', $user)}}'">
            <img src="{{asset('/images/user.svg')}}" class="svg-selected" style="width: 20px; height:20px" alt="">
            <p>Editar perfil</p>
    </div>
@endsection

@section('js')
<script>
    var modal = 0;
    $(document).ready(function(){
        
        console.log('1rts');
        
    });
    document.addEventListener("DOMContentLoaded", () => {
        console.log('Loaded');
        Livewire.hook('message.received', (message, component) => {         
            
            console.log('changed1');
       if(modal==1){
            
            $('#fotos').css({ "display": "block", "opacity": "1"});
            
           
       } 
       
        });
    });
    $('#fotos').on('DOMSubtreeModified', function(){
  console.log('NEW CHANGE');
  if(modal==1){
            
            $('#fotos').css({ "display": "block", "opacity": "1"});
             
       } 
});
    window.addEventListener('contentChanged', event => {
        console.log('changed');
       if(modal==1){
            
            $('#fotos').css({ "display": "block", "opacity": "1"});
            
       } 
       
    });
    
    $("#subirfotos").click(function(){
        console.log('click');
        $('#fotos').css({ "display": "block", "opacity": "1"});
        modal = 1;
        
    });
    $(".cerrarfotos").click(function(){
        console.log('cerrar');
        $('#fotos').css({ "display": "none", "opacity": "0"});
        modal = 0; 
        console.log('setmodal to 0');

    });
    </script>
    {{-- 
      $('div#fotos').css("display", block);
                              'display:block',
                              'opacity:100'
                        );
    $('div#fotos').addClass( "show");
    });
    $("#1").click(function(){
      $('#fotos').css(
                              'display:none';
                              'opacity:0';
                        );
    });
  </script>
  comment --}}
@endsection