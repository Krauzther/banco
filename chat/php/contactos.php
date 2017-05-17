<?php
    require "../../php/BaseDatos.php";
    require "../../php/sesion.php";
    header('Content-type: application/json; charset=utf-8');

    $tipoContacto = $_POST['tipo'];
    $array;

    if (strcmp($tipoContacto, "cliente") == 0) {
        $array = obtenerContactos("SELECT ncliente, apaterno, amaterno, nombre FROM cliente");
    } else {
        iniciarSesion();
        $usuario = obtenerValorSesion("usuario");
        $array = obtenerContactos("SELECT usuario, nombre FROM admin WHERE usuario != $usuario");
    }

    echo json_encode($array);

    function obtenerContactos($query) {
        $bd = new BaseDatos();
        $bd->realizarConexion();
        $resultado = $bd->realizarConsulta($query);  
        $arrayTmp = $resultado->fetch_all(MYSQLI_BOTH);
        $bd->cerrarConexion();
        return $arrayTmp;
    }
?>