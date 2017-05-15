<?php 
    require "BaseDatos.php";
    require "sesion.php";
    
    $bd = new BaseDatos();

    iniciarSesion();
    $ncliente = obtenerValorSesion("ncliente");
    $bd->realizarConexion();
    $sentencia = "UPDATE cliente SET estado = 1 WHERE ncliente = $ncliente";
    $bd->realizarAccion($sentencia);    
    $bd->cerrarConexion();
?>