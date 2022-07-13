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
        
    </style>
</head>
<body>
    <h1>Reserva confirmada</h1>
    
<h2>{{$homecamper->nombre}}, espera tu llegada para el día {{ date("d/m/Y", strtotime($reserva->entrada)) }}</h2>
<x-spacing alto="1rem"></x-spacing>

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
<hr>
<x-spacing alto="1.2rem"></x-spacing>
 <h2>Datos de contacto de {{$homecamper->nombre}}</h2>
 <x-spacing alto="1rem"></x-spacing>
 <p><strong>Teléfono</strong><br>
{{$homecamper->user->telefono}}</p>

<p><strong>Email</strong><br>
    {{$homecamper->user->email}}</p>

<x-spacing alto="0.7rem"></x-spacing>
<hr>
<x-spacing alto="1.2rem"></x-spacing>
 <h2>Ubicación de {{$homecamper->nombre}} </h2>

<p><strong>Dirección</strong><br>
{{$homecamper->direccion->calle . ' Nº ' . $homecamper->direccion->numero . ', ' . $homecamper->direccion->poblacion->poblacion . ', ' .  $homecamper->direccion->provincia->provincia}}</p>

<p>Recuerda que puedes acceder a tu cuenta campify para consiltar todas tus reservas.</p>
<x-spacing alto="0.7rem"></x-spacing>
</body>
</html>