<?php
    require "BaseDatos.php";

    header('Content-type: application/json; charset=utf-8');

    $opcion = $_POST['opcion'];
    $array = Array();
    $array["resultado"] = false;

    if ($opcion == 0) { // recuperar número de cliente
        $array["resultado"] = enviarNumeroDeCliente($_POST['correo']);
    } elseif ($opcion == 1) { // recuperar clave de acceso

    } elseif ($opcion == 2) {

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
            mail( $correo, 'Banamex - Contraseña provisional' , "Su número de cliente es :" . $fila[0]);
            $resul = true;
        }
        $bd->cerrarConexion();
        return $resul;
    }
    
?>