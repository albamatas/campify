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
}
    </style>
</head>
<body>

    <div class="header"><strong>Campify</strong>,<br> <i>fluye pero sin preocupaciones</i></div>
    <br>

    <h1>Has publicado tu establecimiento</h1>

    <br>
<h2>Esto es todo lo que puedes hacer con tu cuenta campify</h2>
<x-spacing alto="1rem"></x-spacing>

<ul>
    <li>Empieza a recibir visitas y reservas hoy mismo</li>
    <li>Si tienes suerte y estás al completo, no tendrás que preocuparte, ya no te llegará nuevas reservas para ese día</li>
    <li>Consulta los movimientos: Tendrás el detalle de los vehículos que entran y salen por día</li>
    <li>Gestiona tus reservas: Podrás consultar y gestionar tus reservas</li>
    <li>Información actualizada al instante</li>
    <li>Mobilidad total: Accede a tu cuenta y administración de reservas desde un móbil o un ordenador</li>
</ul>
<br>
<x-spacing alto="0.7rem"></x-spacing>
<hr>
<x-spacing alto="1.2rem"></x-spacing>
<br>
<h2>Accede a tu cuenta</h2>
<p>Recuerda que puedes acceder a tu cuenta campify para consultar y todas tus reservas.</p>
<a href="{{route('dashboard-homecamper')}}">Acceder</a>
<x-spacing alto="0.7rem"></x-spacing>
<br>
</body>
</html>