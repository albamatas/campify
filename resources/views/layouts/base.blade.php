<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

            <!-- Fonts -->
        
       <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet'>
       
         <!-- Styles -->
        <style>
        @import url(http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,700italic,300,400,700);
        </style>
                
        <link rel="stylesheet" href="{{ asset('/css/app.css')}}">
        <link rel="stylesheet" href="{{ asset('/css/components.css') }}">

        
    </head>

<body>
    <div class="grey">
    <h1>@yield('h1')</h1>
    </div>  

    <div class="content">
        @yield('content')
    </div>
   

</body>