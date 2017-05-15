
<?php
    require "php/BaseDatos.php";
    require "php/sesion.php";

    iniciarSesion();
    $ncliente = "";
    if (validarExistenciaSesion("ncliente")) {
        $ncliente = obtenerValorSesion("ncliente");
    } else {
        header("location: index.html");
    }

    $bd = new BaseDatos();
    $bd->realizarConexion();
    $query = "SELECT apaterno, amaterno, nombre FROM cliente WHERE ncliente = $ncliente";
    $resultado = $bd->realizarConsulta($query);
    $fila = $resultado->fetch_array(MYSQLI_BOTH);
    $nombreCliente = ocultarNombre($fila[2]) . " " . ocultarNombre($fila[0]) . " " . ocultarNombre($fila[1]);
    $bd->cerrarConexion();

    function ocultarNombre($nombre) {
        $numeroPalabras = explode(" ", $nombre);
        $nombreTmp = "";
        for ($i = 0; $i < count($numeroPalabras); $i++) {
            $nombreTmp .= substr($numeroPalabras[$i], 0, 1);
            for($j = 1; $j < strlen($numeroPalabras[$i]); $j++) {
                $nombreTmp .= "*";
            }
            $nombreTmp .= " ";
        }
        return trim($nombreTmp);         
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BancaNet | Banamex.com</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/estilos-login.css">
</head>
<body>
    <div class="container">        
        <div class="contenedor-nav">
            <div class="barra-superior">
                <div class="fecha-hora">Miercoles 29 de Marzo de 2017, 12:08:03</div>
                <ul class="menu">                
                    <li class="menu__item"><a href="" class="menu__link">ENGLISH</a></li>
                    <li class="menu__item"><a href="" class="menu__link">SUCURSALES</a></li>
                    <li class="menu__item"><a href="" class="menu__link">CONTÁCTANOS</a></li>
                    <li class="menu__item"><a href="" class="menu__link">AYUDA</a></li>
                </ul>
            </div>           
            <nav class="barra-menu">
                <img src="img/imgMenu.png" class="nav-bar__img">
                <a href="" class="nav-bar__link"></a>
            </nav>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <div class="contenedor-form-login">
                    <form action="" class="form-login" method="POST" id = "form-login-clave">
                        <section class="eres-nuevo">
                            <label for="" class="eres-nuevo__label">Bienvenido</label>
                            <label for="" class="eres-nuevo__label" id="nombre-usuario"><?php echo $nombreCliente ?></label>
                        </section>
                        <label for="" class="form-login__item">
                            BancaNet
                        </label>
                        <label for="numero-cliente" class="form-login__item">
                            Clave de acceso
                        </label>
                        <input type="password" class="form-login__item" id="clave-cliente" required name="password">
                        <div class="form-login__item contenedor-submit">
                            <input type="submit" value="ENTRAR" class="btn-submit">
                        </div>
                        <a href="" class="form-login__item" id="link-recuperar-clave">
                            ¿Olvidastes o no te sabes tu clave de acceso?
                        </a>
                        <a href="" class="form-login__item">
                            Conoce el demo
                        </a>
                    </form>
                    <section class="bancanet2-0">
                        <img src="img/flecha.png" class="bancanet2-0__img">
                        <label for="" class="bancanet2-0__item1">
                            BancaNet 2.0
                        </label>
                        <label for="" class="bancanet2-0__item2">
                            Si prefieres usar la versión anterior da clic aquí.
                        </label>
                    </section>
                    <section class="descarga-herramienta container-fluid">
                        <div class="icono-descarga">
                            <img src="img/descarga.png" class="icono-descarga__icono"></span>
                            <label for="">Descarga<br>la herramienta</label>
                        </div>
                        <p class="descarga-herramienta__item">Protégete de un fraude aún cuando no estés en BancaNet</p>
                        <div class="row">
                            <a href="" class="col-sm-6" id="ver-mas">Ver más</a>
                            <button class="col-sm-6" id="btn-instalar">INSTALAR</button>
                        </div>
                    </section>                    
                </div>
            </div>
            <div class="col-sm-8">
                <div class="contenedor-carrucel">
                    <div class="contenedor-carrucel__contenedor-img">
                        <img src="img/imgBanner1.png" class="contenedor-carrucel__img">
                    </div>
                    <div class="contenedor-carrucel__contenedor-opciones">
                        <div class="contenedor-carrucel__opciones contenedor-carrucel__opcion-1">
                            <p>TIPS DE SEGURIDAD</p>
                            <p>Cuida tu información</p>
                        </div>
                        <div class="contenedor-carrucel__opciones contenedor-carrucel__opcion-2">
                            <p>CLAVE ALFA NUMÉRICA</p>
                            <p>Tu entrada a BancNet</p>
                        </div>
                        <div class="contenedor-carrucel__opciones contenedor-carrucel__opcion-3">
                            <p>ESTADO DE CUENTA</p>
                            <p>Descárgalo</p>
                        </div>
                        <div class="contenedor-carrucel__opciones contenedor-carrucel__opcion-4">
                            <p>CONOCE BANCANET</p>
                            <p>Tutoriales de ayuda</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row contenedor-seccion-estamos">
            <div class="col-sm-4">
                <p class="parrafo-estamos"><strong>Estamos donde tú estás.</strong></p>
                <div class="barra-azul">

                </div>
            </div>
            <div class="col-sm-8">
                <div class="contenedor-iconos">
                    <a href="" class="link-iconos-azules">
                        <img src="img/icon1.png" alt="" class="img-1 iconos-azules">
                    </a>
                    <a href="" class="link-iconos-azules">
                        <img src="img/icon2.png" alt="" class="img-2 iconos-azules">
                    </a>
                    <a href="" class="link-iconos-azules">
                        <img src="img/icon3.png" alt="" class="img-3 iconos-azules">
                    </a>
                    <a href="" class="link-iconos-azules">
                        <img src="img/icon4.png" alt="" class="img-4 iconos-azules">
                    </a>
                    <a href="" class="link-iconos-azules">
                        <img src="img/icon5.png" alt="" class="img-5 iconos-azules">
                    </a>
                    <a href="" class="link-iconos-azules">
                        <img src="img/icon6.png" alt="" class="img-6 iconos-azules">
                    </a>
                    <a href="" class="link-iconos-azules">
                        <img src="img/icon7.png" alt="" class="img-7 iconos-azules">
                    </a>
                </div>
            </div>
        </div>
        <div class="footer">
            <div class="row">
                <div class="terminos-condiciones">
                    <div class="col-sm-6">
                        <a href="" class="link-citiban">CITIBANAMEX.COM</a>
                    </div>
                    <div class="col-sm-6">
                        <a href="" class="link-terminos">TERMINOS, CONDICIONES DE USO Y PRIVACIDAD</a>
                    </div>
                </div>
            </div>
            <div class="row"></div>
        </div>
    </div>

    <!--Modal-->
    
    <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" id="modal-mensajes">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modal-title"></h4>
            </div>
            <div class="modal-body">
                <p id="modal-mensaje-p"></p>
            </div>
        </div>
    </div>
    </div>

    <script src="js/jquery-3.2.0.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="js/banner-login.js"></script>
    <script src="js/login.js"></script>
</body>
</html>