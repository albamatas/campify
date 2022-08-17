@extends('layouts.dashboard')

@section('title', 'Edita tu perfil')

@section('css')

@endsection

@section('dashboard')

<div class="dash_container">
  
    @livewire('edit-homecamper', ['user' => $user, 'guardarfecha' => $guardarfecha])

    <x-spacing alto="6rem"></x-spacing>
    

</div>   

@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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