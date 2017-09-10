<!DOCTYPE html>
<html lang="es-es">
<head>
    <title>{!! $title_page !!} :: Hezecase</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href="{!! URL::to('/').'/' !!}"/>
    <link href="CSS/normalize.css" rel="stylesheet"/>
    <link href="CSS/layout_session.css" rel="stylesheet"/>
    <link href="CSS/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
    @yield('headers')
</head>
<body style="text-align: center">
    <div class="contenedor">
        @yield('content')
    </div>

</body>
<script src="JS/modernizr.js"></script>
<script src="JS/jquery.js"></script>
<script src="JS/jqueryui/jquery-ui.js"></script>
@yield('scripts')
</html>
