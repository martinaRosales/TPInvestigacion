<?php
include_once("/xampp/htdocs/TPInvestigacion/configuracion.php"); ?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap-5.2.0-dist/css/bootstrap.min.css" crossorigin="anonymous">
    <script src="bootstrap-5.2.0-dist/js/bootstrap.min.js" crossorigin="anonymous"></script>
    <title>Besto 3d homepage</title>
    <script src="../assets/js/jquery/jquery-1.12.0.js"></script>
    <link href="https://www.flaticon.es/iconos-gratis/menu" title="menú iconos">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.2/css/bootstrapValidator.min.css" />

    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.2/js/bootstrapValidator.min.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/TPInvestigacion/Vista/Assets/css/Estilos.css">

    <link rel="icon" href="../Assets/Img/logoBesto.svg">

    <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/locales/de_DE.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/geodata/germanyLow.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/fonts/notosans-sc.js"></script>

</head>

<body background="../Assets/Img/fondo.png">

    <header id="navbar ">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid" id="cabecera">
                <a class="navbar-brand text-light fs-5" href="/TPInvestigacion/Vista/Index.php"><img src="/TPInvestigacion/Vista/Assets/Img/logo simple.png" width="70px" class="mb-1"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarHeader">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active text-light fs-5" aria-current="page" href="/TPInvestigacion/Vista/Index.php">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light fs-5" href="#">Carrito</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-light fs-5" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Productos
                            </a>
                            <ul class="dropdown-menu" id="dropdown">
                                <li><a class="dropdown-item text-light" href="/TPInvestigacion/Vista/Productos2D.php">Impresiones 2D</a></li>
                                <li><a class="dropdown-item text-light" href="/TPInvestigacion/Vista/Productos3D.php">Impresiones 3D</a></li>
                                <li><a class="dropdown-item text-light" href="/TPInvestigacion/Vista/Accesorios.php">Accesorios</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>