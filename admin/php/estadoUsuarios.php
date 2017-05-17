<?php 
    require "../../php/BaseDatos.php";
    header('Content-type: application/json; charset=utf-8');

    $usuario = $_POST['usuario'];

    $array = Array();
    $array["bloqueado"] = false;

    $bd = new BaseDatos();
    $bd->realizarConexion();
    $query = "SELECT usuario FROM admin WHERE usuario = $usuario";
    $resultado = $bd->realizarConsulta($query);
    if ($resultado->num_rows >= 1) {        
        $sentencia = "UPDATE admin SET estado = 1 WHERE usuario = $usuario";
        $bd->realizarAccion($sentencia); 
        $array["bloqueado"] = true;
    }       
    $bd->cerrarConexion();
    echo json_encode($array);
?>