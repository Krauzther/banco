<?php
    require "../php/sesion.php";
    if (validarExistenciaSesion("usuario")) {
        //header("location: index.html");
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login-Admin | Banamex.com</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/estilos-login.css">
</head>
<body>
    <div class="container">
        <div class="contenedor-form-login">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Login</h3>
                </div>
                <div class="panel-body">
                    <form action="" id="form-login-admin">
                        <div class="form-group">
                            <label class="control-label" for="inputGroupSuccess1">Usuario</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-user"></span>
                                </span>
                                <input type="text" class="form-control" id="usuario" aria-describedby="inputGroupSuccess1Status" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="inputGroupSuccess1">Contraseña</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-lock"></span>
                                </span>
                                <input type="password" class="form-control" id="password" aria-describedby="inputGroupSuccess1Status" required>
                            </div>
                        </div>
                        <div style="margin-bottom: 10px;">
                            <a href="" id = "link-recuperar-password" >¿Olvidastes tu contraseña?</a>
                        </div>
                        <button type="submit" class="btn btn-primary pull-right" style="margin-left:10px;">Entrar</button>
                        <button type="reset" class="btn btn-danger pull-right">Borrar</button>                        
                    </form>
                </div>
            </div>            
        </div>
    </div> 
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
    <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" id="modal-recuperar-usuario">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="gridSystemModalLabel">Ingrese su correo</h4>
            </div>
            <div class="modal-body">
                <form action="" id="form-recuperar-usuario">
                    <div class="form-group">
                        <label class="control-label" for="inputGroupSuccess1">Correo</label>
                        <div class="input-group">
                            <span class="input-group-addon">@</span>
                            <input type="email" id="correo-recuperar-ncliente" class="form-control" id="inputGroupSuccess1" aria-describedby="inputGroupSuccess1Status" required>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary" form="form-recuperar-usuario">Enviar</button>
            </div>
        </div>
    </div>
    </div>
    <script src="../js/jquery-3.2.0.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>  
    <script src="js/login.js"></script> 
</body>
</html>