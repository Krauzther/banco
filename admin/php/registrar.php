<?php
    require "../../php/BaseDatos.php";
    //header('Content-type: application/json; charset=utf-8');
    $ncliente = $_POST["ncliente"];
    $apaterno = $_POST['apaterno'];
    $amaterno = $_POST['amaterno']; 
    $nombre = $_POST['nombre'];
    $fnacimiento = $_POST['fnacimiento'];
    $email = $_POST['email'];
    $pass = $_POST['pwd'];  
    $repw = $_POST['re-pwd'];

    $bd = new BaseDatos();   
    $bd->realizarConexion(); 

    $query = "INSERT INTO cliente (ncliente, apaterno, amaterno, nombre, fnacimiento, email, pass, estado) VALUES($ncliente, '$apaterno', '$amaterno', '$nombre', '$fnacimiento', '$email', AES_ENCRYPT( '$pass', '$ncliente'), 0)";

    $resultado = $bd->realizarAccion($query);
    $bd->cerrarConexion();
    return $resultado;
?>


