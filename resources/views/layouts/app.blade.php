<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Bazar Nilda') }}</title>

    <!-- Scripts -->
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

    <!-- Styles -->
    <link type="text/css" rel="stylesheet" href="{{ asset('css/materialize.min.css') }}"  media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="http://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"  media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="http://cdn.datatables.net/responsive/2.2.3/css/dataTables.responsive.css"  media="screen,projection"/>

    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script type="text/javascript" charset="utf8" src="http://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/jsbarcode@3.8.0/dist/JsBarcode.all.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery.print/1.5.1/jQuery.print.js"></script>
    <script src="https://unpkg.com/jspdf@latest/dist/jspdf.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datejs/1.0/date.min.js"></script>

</head>
<body class="grey lighten-4">

@include('layouts.navbar')

<div id="container">
    <main class="py-4">
        @yield('content')
    </main>

    <script type="text/javascript" src="{{ asset('js/materialize.min.js') }}"></script>

</div>
<div class="container footer-copyright center-align">Bazar Nilda &copy; 2018</div>

<script>
    $(document).ready(function(){
        $('.sidenav').sidenav();
        $('select').formSelect();
    });
</script>


</body>
</html>
