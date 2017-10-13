<!DOCTYPE html>
<html lang="es-es">
<head>
    <title>{!! $title_page !!} :: Hezecase</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href="{!! URL::to('/').'/' !!}"/>
    <link href="CSS/normalize.css" rel="stylesheet"/>
    <link href="CSS/styleCotizadorFrontEnd.css" rel="stylesheet" />
    <link href="CSS/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
    <link href="CSS/loading.css" rel="stylesheet"/>
    <link href="CSS/theme-default.min.css" rel="stylesheet"/>
    @yield('headers')
</head>
<body>
<header class="headerFrontEnd">
    <div class="ContentLeftlogo">
        <img class="ContentlogoImg" src="Img/Logo_Header_arcia.png">
    </div>
    <div class="ContentRightInfoMenuHeader">
        <div class="ContentMenuheader">
            <nav class="nav">
                <li>
                    <div class="IconoMenuBar">
                        <a href="" id="iconoMenuTop">
                            <i class="fa fa-th-large" aria-hidden="true"></i>
                        </a>
                    </div>
                    <ul>
                        <li class="ContentNavheader">
                            <div class="Flecha"></div>
                            <ul class="Navheader">
                                {{--<li>
                                    <a style="color: #f7f7f7 !important" href="front/cotizador">
                                        <i class="fa fa-pencil fa-fw" aria-hidden="true"></i>
                                        <h4>Cotizador</h4>
                                    </a>
                                </li>
                                <li>
                                    <a style="color: #f7f7f7 !important" href="{!! URL::to('/').'/' !!}">
                                        <i class="fa fa-pencil fa-fw" aria-hidden="true"></i>
                                        <h4>Dashboard</h4>
                                    </a>
                                </li>--}}
                                @foreach(session('menu') as $menu)
                                    <li>
                                        <a style="color: #f7f7f7 !important" href="{!! $menu->url_menu !!}">
                                            <i class="fa fa-pencil fa-fw" aria-hidden="true"></i>
                                            <h4>{!! $menu->nom_menu !!}</h4>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    </ul>
                </li>
            </nav>
        </div>
        <div class="Avatar">
            <h1>
                <?php
                $ini= mb_substr((explode('/',Auth::user()->empleados->nombre_Empleado))[2],0,1).mb_substr((explode('/',Auth::user()->empleados->nombre_Empleado))[0],0,1);
                echo $ini;
                ?>
            </h1>
        </div>
        <div class="Nombre">
            <h5>
                <?php
                $nombre= (explode('/',Auth::user()->empleados->nombre_Empleado))[2].' '.(explode('/',Auth::user()->empleados->nombre_Empleado))[0];
                echo $nombre;
                ?>
            </h5>
        </div>
    </div>
</header>
<div style="width: 100%;position: relative;	top:3.8em">
    <div class="ContenedorMenuLateral">
        <div class="ContentMenuLat">
            <div class="ContentLatNav">
                <nav class="LatNav">
                    <li><a style="color: #f7f7f7 !important" href="#"><i class="fa fa-pencil fa-fw" aria-hidden="true"></i><h4>CRM</h4></a>
                        <ul class="LatNavpadre">
                            <li><p  class="fa fa-circle fa-fw LatNavAletasPadres"></p><a style="color: #f7f7f7 !important" href="#"><h4>Cotizador</h4></a>
                                <ul class="LatNavHijo"><li><a style="color: #f7f7f7 !important" href="dashboard/crm/empresas"><h4>Empresa</h4></a></li></ul>
                                <ul class="LatNavAletashijos"><li><a style="color: #f7f7f7 !important" href="dashboard/crm/clientes"><h4>Clientes</h4></a></li></ul>
                                <ul class="LatNavHijo"><li><a style="color: #f7f7f7 !important" href="dashboard/crm/colaboradores"><h4>Colaboradores</h4></a></li></ul>
                            </li>
                        </ul>
                    </li>
                </nav>
            </div>
        </div>
    </div>
    <div class="ContenedorAreaTrabajo">
        @yield('content')
    </div>

</div>

<footer style="position: absolute!important" class="FooterFrontEnd">
    <div class="ContenedorTextDerechosFooter">
        <p class="TextDerechosFooter">&copy {!! date('Y') !!} Creado por Grupo Arcia S.A.S- Prohibida su reproducción total o parcial | <a href="https://arciait.com" class="red">Arciait</a></p>
    </div>
    <div class="ContenedorImgFooter">
        <img class="imgFooterLogo" src="Img/Logo_Lateral_hezecase.png">
    </div>
</footer>
</body>
<script src="/JS/modernizr.js"></script>
<script src="/JS/jquery.js"></script>
<script src="/JS/Util.js"></script>
<script src="/JS/jqueryui/jquery-ui.js"></script>
<script src="JS/jquery-validator.js"></script>
<script>
    $(document).ready(function () {
        $('#iconoMenuTop').mouseover(function () {
            $('#menuTop').attr('class','');
            $('#menuTop').attr('class','ContentNavheaderActivo');
//            $('#menuTop').show( 'slide',{direction:'up',distance: 40});
        });
        $('#menuTop').mouseleave(function () {
            $('#menuTop').attr('class','');
            $('#menuTop').attr('class','ContentNavheader');
        });
    })
</script>
<script src="JS/loading.js"></script>
@yield('scripts')
</html>