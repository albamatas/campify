@extends('layouts.dashboard')

@section('title', 'Edita tu perfil')

@section('css')

@endsection

@section('dashboard')

<div class="dash_container">
    <x-lean::console-log />
  
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
             
       } else {
        $('#fotos').css({ "display": "none", "opacity": "0"});
       }
});
    window.addEventListener('contentChanged', event => {
        console.log('changed');
       if(modal==1){
            
            $('#fotos').css({ "display": "block", "opacity": "1"});
            
       } else {
        $('#fotos').css({ "display": "none", "opacity": "0"});
       }
       
    });
    
    $("#fileSelect").click(function(){
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

    function hide_modal(){
      console.log('cerrar');
        $('#fotos').css({ "display": "none", "opacity": "0"});
        modal = 0; 
        console.log('setmodal to 0');
    }

    
    

    const fileSelect = document.getElementById("fileSelect"),
    fileElem = document.getElementById("fileElem"),
    fileList = document.getElementById("fileList");

fileSelect.addEventListener("click", (e) => {
  if (fileElem) {
    fileElem.click();
  }
  e.preventDefault(); // prevent navigation to "#"
}, false);

fileElem.addEventListener("change", handleFiles, false);

function handleFiles() {
  if (!this.files.length) {
    fileList.innerHTML = "<p>No files selected!</p>";
  } else {
    fileList.innerHTML = "";
   // const list = document.createElement("ul");
    //fileList.appendChild(list);
    for (let i = 0; i < this.files.length; i++) {
      //const li = document.createElement("li");
      //list.appendChild(li);

      const img = document.createElement("img");
      img.src = URL.createObjectURL(this.files[i]);
      img.height = 100;
      img.onload = () => {
        URL.revokeObjectURL(img.src);
      }
      fileList.appendChild(img);
      //li.appendChild(img);
      //const info = document.createElement("span");
      //info.innerHTML = `${this.files[i].name}: ${this.files[i].size} bytes`;
      //li.appendChild(info);
    }
  }
}
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