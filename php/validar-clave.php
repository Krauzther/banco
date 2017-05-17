<?php 
    require "BaseDatos.php";
    require "sesion.php";
    header('Content-type: application/json; charset=utf-8');
    $clave = $_POST["clave"];
    
    $array = Array();
    $array["existe"] = false;
    $array["bloqueado"] = false;
    $bd = new BaseDatos();

    iniciarSesion();
    $ncliente = obtenerValorSesion("ncliente");

    $bd->realizarConexion();
    $query = "SELECT AES_DECRYPT( pass, $ncliente), estado FROM cliente WHERE ncliente = $ncliente";
    $resultado = $bd->realizarConsulta($query); 
    $fila = $resultado->fetch_array(MYSQLI_BOTH); 
    if ($fila[1] == 1) {
        $array["bloqueado"] = true;
    } elseif (strcmp($clave, $fila[0]) == 0) {
        $array["existe"] = true;
    } else {
        $array["existe"] = false;
    }    
    $bd->cerrarConexion();
    echo json_encode($array);
?>