<?php 
    require "BaseDatos.php";
    require "sesion.php";
    header('Content-type: application/json; charset=utf-8');
    $ncliente = $_POST["cliente"];
    
    $array = Array();
    $array["existe"] = false;
    $bd = new BaseDatos();

    $bd->realizarConexion();
    $query = "SELECT * FROM cliente WHERE ncliente = $ncliente";
    $resultado = $bd->realizarConsulta($query);
    iniciarSesion();
    if ($resultado->num_rows >= 1) {
        $array["existe"] = true;
        $fila = $resultado->fetch_array(MYSQLI_BOTH);
        crearSesion("ncliente", $fila[0]);
    } else {
        $array["existe"] = false;
    }
    $bd->cerrarConexion();
    echo json_encode($array);
?>