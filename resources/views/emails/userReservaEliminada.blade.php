<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Correo</title>

    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet'>
       
    <!-- Styles -->
   
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,700italic,300,400,700' rel='stylesheet'>
  
           
    <style>
             
        h1, h2, h3, h4, h5, h6{
         font-family: 'Lato', Helvetica, sans-serif;
         font-weight: 600;
        }
        P{
        font-family: 'Open Sans', sans-serif;
        }
        .header{
  font-size: 1.6rem;
  background-color: #C8FFEF;
    text-align: center;
    padding: 20px;
    border-radius: 10px 10px 0px 0px;
    font-family: 'Lato', Helvetica, sans-serif;
}
        
    </style>
</head>
<body>
    <div class="header"><strong><span translate="no"> Campify </span></strong>,<br> <i>fluye pero sin preocupaciones</i></div>
    <br>

    <h1>Tu reserva ha sido cancelada</h1>
    <br>
    
<h2>Esta era la reserva que tenías en {{$homecamper->nombre}} y que se ha cancelado</h2>

<p><strong>Número de reserva</strong><br>
    {{$reserva->id}}</p>

<p><strong>Día de entrada</strong><br>
{{date("d/m/Y", strtotime($reserva->entrada))}}</p>

<p><strong>Día de salida</strong><br>
{{date("d/m/Y", strtotime($reserva->salida))}}</p>

<p><strong>Nº total de noches</strong><br>
    {{$reserva->dias}}</p>
    
<p><strong>Precio total</strong><br>
 {{$reserva->precio}}€</p>
 <p class="hint">*Este precio incluye la estada según los días seleccionados. Los servicios del establecimiento, por ejemplo la electricidad, puede que se calculen a parte.</p>

 <x-spacing alto="0.7rem"></x-spacing>
 <br>
<hr>
<x-spacing alto="1.2rem"></x-spacing>
<br>
 <h2>Datos de contacto de {{$homecamper->nombre}}</h2>
 
 
 <p><strong>Teléfono</strong><br>
{{$homecamper->user->telefono}}</p>

<p><strong>Email</strong><br>
    {{$homecamper->user->email}}</p>

<x-spacing alto="0.7rem"></x-spacing>
<br>
<hr>
<x-spacing alto="1.2rem"></x-spacing>
<br>

 <h2>Ubicación de {{$homecamper->nombre}} </h2>

<p><strong>Dirección</strong><br>
{{$homecamper->direccion->calle . ' Nº ' . $homecamper->direccion->numero . ', ' . $homecamper->direccion->poblacion->poblacion . ', ' .  $homecamper->direccion->provincia->provincia}}</p>

<x-spacing alto="0.7rem"></x-spacing>
<br>
<hr>
<x-spacing alto="1.2rem"></x-spacing>
<br>
<h2>Accede a tu cuenta</h2>
<p>Recuerda que puedes acceder a tu cuenta <span translate="no"> campify </span> para consultar todas tus reservas.</p>
<a href="{{route('dashboard-homecamper')}}">Acceder</a>
<x-spacing alto="0.7rem"></x-spacing>
<br>
</body>
</html>