 @extends('layouts.dashboard')

@section('title', 'Detalle reserva')

@section('css')
@endsection

@section('dashboard')

    @livewire('ver-reserva', [ 'reserva' => $reserva, 'guardarfecha' => $guardarfecha]) 

@endsection

@section('js')



<script>
     
    $('#tab-entrada').click(function(){
        
        $('#tab-salida').removeClass('tab-selected');
        $('#tab-ambas').removeClass('tab-selected');
        $('#tab-entrada').addClass('tab-selected');
        $('#modificar-salida').css({'display':'none'});
        $('#modificar-ambas').css({'display':'none'});
        $('#modificar-entrada').css({'display':'block'});

});

$('#tab-salida').click(function(){
    $('#tab-salida').addClass('tab-selected');
    $('#tab-entrada').removeClass('tab-selected');
    $('#tab-ambas').removeClass('tab-selected');
    $('#modificar-entrada').css({'display':'none'});
    $('#modificar-ambas').css({'display':'none'});
    $('#modificar-salida').css({'display':'block'});

});

$('#tab-ambas').click(function(){
    $('#tab-ambas').addClass('tab-selected');
    $('#tab-salida').removeClass('tab-selected');
    $('#tab-entrada').removeClass('tab-selected');
    $('#modificar-salida').css({'display':'none'});
    $('#modificar-entrada').css({'display':'none'});
    $('#modificar-ambas').css({'display':'block'});

});


</script>

@endsection