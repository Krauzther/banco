<?php 
    require "../../php/BaseDatos.php";
    require "../../php/sesion.php";
    header('Content-type: application/json; charset=utf-8');

    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    $array = Array();
    $array["bloqueado"] = false;
    $array["entrarSistema"] = false;
    $bd = new BaseDatos();

    $bd->realizarConexion();

    $query = "SELECT AES_DECRYPT( pass, $usuario), estado FROM admin WHERE usuario = $usuario";
    $resultado = $bd->realizarConsulta($query);
    if ($resultado->num_rows >= 1) {
        $fila = $resultado->fetch_array(MYSQLI_BOTH); 
        if ($fila[1] == 1) {
            $array["bloqueado"] = true;
        } elseif (strcmp($password, $fila[0]) == 0) {
            iniciarSesion();
            crearSesion("usuario", $usuario);
            $array["entrarSistema"] = true;
        }
    }
        
    $bd->cerrarConexion();
    echo json_encode($array);
?>