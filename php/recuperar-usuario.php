<?php
    require "BaseDatos.php";
    require "sesion.php";

    header('Content-type: application/json; charset=utf-8');

    $opcion = $_POST['opcion'];
    $array = Array();
    $array["resultado"] = false;

    if ($opcion == 0) { // recuperar número de cliente
        $array["resultado"] = enviarNumeroDeCliente($_POST['correo']);
    } elseif ($opcion == 1) { // recuperar clave de acceso
        $array["resultado"] = enviarClaveDeAcceso();
    } elseif ($opcion == 2) { // Recuperar contraseña del administrador
        $array["resultado"] = enviarPassword($_POST['correo']);
    }

    echo json_encode($array); // Se envia el resultado en formtao JSON

    function enviarNumeroDeCliente($correo) {      
        $bd = new BaseDatos();   
        $bd->realizarConexion();     
        $query = "SELECT ncliente FROM cliente WHERE email = '$correo'";        
        $resultado = $bd->realizarConsulta($query);
        $resul = false;
        if ($resultado->num_rows >= 1) {
            $fila = $resultado->fetch_array(MYSQLI_BOTH);
            mail( $correo, 'Banamex - Recuperar número de cliente' , "Su número de cliente es :" . $fila[0]);
            $resul = true;
        }
        $bd->cerrarConexion();
        return $resul;
    }

    function enviarClaveDeAcceso() {      
        $bd = new BaseDatos();   
        $bd->realizarConexion(); 

        iniciarSesion();
        $ncliente = obtenerValorSesion("ncliente");

        $query = "SELECT AES_DECRYPT( pass, $ncliente), email FROM cliente WHERE ncliente = $ncliente";

        $resultado = $bd->realizarConsulta($query);
        $resul = false;
        if ($resultado->num_rows >= 1) {
            $fila = $resultado->fetch_array(MYSQLI_BOTH);
            mail( $fila[1], 'Banamex - Recuperar clave de acceso' , "Su clave de acceso es :" . $fila[0]);
            $resul = true;
        }
        $bd->cerrarConexion();
        return $resul;
    }

    function enviarPassword($correo) {      
        $bd = new BaseDatos();   
        $bd->realizarConexion();     
        $query = "SELECT usuario FROM admin WHERE email = '$correo'";        
        $resultado = $bd->realizarConsulta($query);
        $resul = false;
        if ($resultado->num_rows >= 1) {
            $fila = $resultado->fetch_array(MYSQLI_BOTH);
            $usuario = $fila[0];
            $query = "SELECT AES_DECRYPT( pass, $usuario) FROM admin WHERE usuario = $usuario";
            $resultado = $bd->realizarConsulta($query);
            $fila = $resultado->fetch_array(MYSQLI_BOTH);
            mail( $correo, 'Banamex - Recuperar número de cliente' , "Su contraseña es :" . $fila[0]);
            $resul = true;
        }
        $bd->cerrarConexion();
        return $resul;
    }
    
?>