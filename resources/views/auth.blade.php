<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
       
       <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet'>
       <link rel="stylesheet" href="css/app.css">
         <!-- Styles -->
        <style>
        @import url(http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,700italic,300,400,700);
        </style>

    </head>

<body>

    <x-spacing alto="1.7rem"></x-spacing>
        <h1>Publicar anuncio</h1>
    <x-spacing alto="1.2rem"></x-spacing>

    <x-progres_bar progres="40%"></x-progres_bar>
        <x-spacing alto="1.7rem"></x-spacing>
    <h2 class="form">Empecemos con las presentaciones</h2>
        <x-spacing alto="1.2rem"></x-spacing>

    <label for="">Ponle un nombre a tu alojamiento</label>
        <input type="text" name="" id="">
        <p class="hint">Ejemplo: Área de Vilanova de Sau</p>
        <x-spacing alto="1.7rem"></x-spacing>

    <label for="">¿Qué tipo de alojamiento es?</label>
        <select name="" id="" >
            <option value="volvo">A</option>
            <option value="saab">B</option>
            <option value="mercedes">C</option>
            <option value="audi">D</option>
        </select>


    <x-spacing alto="1.7rem"></x-spacing>
        <h1>Publicar anuncio</h1>
    <x-spacing alto="1.2rem"></x-spacing>

    <x-progres_bar progres="60%"></x-progres_bar>
        <x-spacing alto="1.7rem"></x-spacing>
    
    <h2 class="form">Hablemos de números... <br> ¿Qué capacidad tiene y cuánto vas a cobrar?</h2>
        <x-spacing alto="1.7rem"></x-spacing>
    
         <label for="">¿Cuántas plazas de acampada tienes?</label>
            <input type="number" name="" id="">
            <p class="hint">Con acampada nos referimos a que sobre espacio para abrir ventanas, sacar sillas, etc.</p>
            <x-spacing alto="1.7rem"></x-spacing>

        <label for="">¿Cuánto vas a cobrar para que un vehículo acampe 24h?</label>
            <input type="text" step="0.10" name="" id="">
            <p class="hint">Es importante que valores si el terreno está anivelado, si ofreces servicios básicos como electricidad, llenado y vaciado de aguas, etc. Para que te orientes un poco, si no tienes ningún servicio el precio suele estar entre los 3€ y los 8€, en caso que tengas todos o alguno de ellos entre los 10€ y 18€.</p>



            <x-spacing alto="1.7rem"></x-spacing>
            <h1>Publicar anuncio</h1>
        <x-spacing alto="1.2rem"></x-spacing>
    
        <x-progres_bar progres="80%"></x-progres_bar>
            <x-spacing alto="1.7rem"></x-spacing>
        
                
                <h2 class="form">¿Dónde está ubicado?</h2>
                <x-spacing alto="1.7rem"></x-spacing>
               
                <label for="">En qué calle, carretera, etc</label>
                  <input type="text" name="" id="">
                <x-spacing alto="1.7rem"></x-spacing>

                <label for="">Número</label>
                    <input type="number" name="" id="">
                <x-spacing alto="1.7rem"></x-spacing>

                <label for="">Población</label>
                    <select name="" id="" >
                        <option value="volvo">A</option>
                        <option value="saab">B</option>
                        <option value="mercedes">C</option>
                        <option value="audi">D</option>
                    </select>

        
          <x-spacing alto="1.7rem"></x-spacing>
                    <h1>Publicar anuncio</h1>
                <x-spacing alto="1.2rem"></x-spacing>
            
                <x-progres_bar progres="90%"></x-progres_bar>
                    <x-spacing alto="1.7rem"></x-spacing>
         
    <h2 class="form">¿Cómo te pueden contactar los huéspedes?</h2>
    <x-spacing alto="0.2rem"></x-spacing>
    <h3>Solo compartiremos estos datos a los usuarios con reserva. <h3>
    <x-spacing alto="1.7rem"></x-spacing>

                <label for="">Email</label>
                <input type="email" name="" id="">
                <x-spacing alto="1.7rem"></x-spacing>

                <label for="">Teléfono</label>
                <input type="tel" name="" id="">

                <x-spacing alto="1.7rem"></x-spacing>
                    <h1>Publicar anuncio</h1>
                <x-spacing alto="1.2rem"></x-spacing>
            
                <x-progres_bar progres="97%"></x-progres_bar>
                    <x-spacing alto="1.7rem"></x-spacing>
         
    <h2 class="form">Por último, tu contreseña de acceso para crear tu cuenta y que puedas gestionar las reservas</h2>
    <x-spacing alto="1.7rem"></x-spacing>


<label for="">Contraseña</label>
<input type="password" name="" id="">

<input type="radio" name="" id="">


{{-- per saber si un usuari està autenticat amb blede --}}
@auth
{{-- El que ha de passar o mostrarse si l'usuari está autenticat --}}

@else
{{-- El que ha de passar si no ha fet login --}}

@endauth

</body>
