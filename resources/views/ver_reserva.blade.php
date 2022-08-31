 @extends('layouts.dashboard')

@section('title', 'Detalle reserva')

@section('css')
@endsection

@section('dashboard')

    @livewire('ver-reserva', [ 'reserva' => $reserva, 'guardarfecha' => $guardarfecha]) 

@endsection

@section('js')

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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

//Alerta borrado reserva

window.addEventListener('swal:confirm', event => {
    swal.fire({
        title: 'Eliminar reserva',
            text: '¿Seguro que quieres eliminar esta reserva?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#555555',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Sí, eliminar ahora',
            confirmButtonText: 'No',
    }).then((result) => {
            if (result.isConfirmed){

            }else{
                window.livewire.emit('borrarReserva');
            }
   
        })
});
     

window.addEventListener('swal:reservaBorrada', event => {
    swal.fire({
        title: 'Reserva borrada',
            text: 'Se ha borrado la reserva',
            icon: 'success',
            showCancelButton: false,
            confirmButtonColor: '#555555',
            confirmButtonText: 'Enendido',
    }).then((result) => {
        window.location.href ="{{route('dashboard-homecamper', ['guadarfecha' => $guardarfecha])}}";
    }
    )
});

window.addEventListener('swal:reservaModificada', event => {
    swal.fire({
        title: 'Reserva modificada',
            text: 'Se ha modificado correctamente la reseva.',
            icon: 'success',
            showCancelButton: false,
            confirmButtonColor: '#555555',
            confirmButtonText: 'Enendido',
    })
});



    /* $(".borrarReserva").click(function(e){
         e.preventDefault();
         Swal.fire({
            title: 'Seguro que quieres borrar esta reserva?',
            text: "",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Sí, borrar ahora',
            confirmButtonText: 'No, cerrar'
            }).then((result) => {
            if (result.isConfirmed) {

            }else{
                
                Swal.fire(
                'Reserva borrada!',
                'Has borrado la reserva.',
                'success'
                );
                e.submit();
            }
            })
     });*/
   
</script>

@endsection