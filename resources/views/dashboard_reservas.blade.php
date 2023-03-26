@extends('layouts.dashboard')

@section('title', 'Reservas')

@section('css')
@endsection

@section('dashboard')

<div class="dash_container">
   
   
        @livewire('reservas-gestion', ['user' => $user])   
    
    

    <x-spacing alto="6rem"></x-spacing>
    
</div>

@endsection

@section('js')

<script>
$('#tab-cliente').click(function(){      
    $('#tab-reserva').removeClass('tab-selected'); 
    $('#tab-cliente').addClass('tab-selected');
    $('div#cliente').css({'display':'block'});
    $('div#reserva').css({'display':'none'});

});
$('#tab-reserva').click(function(){      
    $('#tab-cliente').removeClass('tab-selected'); 
    $('#tab-reserva').addClass('tab-selected');
    $('div#cliente').css({'display':'none'});
    $('div#reserva').css({'display':'block'});
});

$('#tab-entrada').click(function(){      
    $('#tab-salida').removeClass('tab-selected'); 
    $('#tab-numero').removeClass('tab-selected'); 
    $('#tab-entrada').addClass('tab-selected');
    $('#in_entrada').css({'display':'block'});
    $('#in_salida').css({'display':'none'});
    $('#in_numero').css({'display':'none'});

});

$('#tab-salida').click(function(){
$('#tab-salida').addClass('tab-selected');
$('#tab-numero').removeClass('tab-selected'); 
$('#tab-entrada').removeClass('tab-selected');
$('#in_entrada').css({'display':'none'});
    $('#in_salida').css({'display':'block'});
    $('#in_numero').css({'display':'none'});

});

$('#tab-numero').click(function(){
$('#tab-numero').addClass('tab-selected');
$('#tab-entrada').removeClass('tab-selected'); 
$('#tab-salida').removeClass('tab-selected');
$('#in_entrada').css({'display':'none'});
    $('#in_salida').css({'display':'none'});
    $('#in_numero').css({'display':'block'});

});

</script>
    
@endsection