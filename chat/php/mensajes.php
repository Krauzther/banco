<?php 
    require "../../php/BaseDatos.php";
    require "../../php/sesion.php";
    header('Content-type: application/json; charset=utf-8');

    $id = $_POST["id"];
    $mensaje = $_POST["mensaje"];
    $hora = $_POST["hora"];

    iniciarSesion();
    $ncliente = obtenerValorSesion("usuario");

    $bd = new BaseDatos();
    $bd->realizarConexion();
    $query = "INSERT INTO chat VALUES($ncliente, $id, $hora, $mensaje)";
    $resultado = $bd->realizarAccion($query);
    $bd->cerrarConexion();
?>