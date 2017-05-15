<?php

    function iniciarSesion() {
        session_start();
    }

    function crearSesion($nombre, $valor) {
        $_SESSION[$nombre] = $valor;
    }

    function obtenerValorSesion($nombre) {
        return $_SESSION[$nombre];
    }

    function validarExistenciaSesion($nombre) {
        if (isset($_SESSION[$nombre])) {
            return true;
        } else {
            return false;
        }
    }

    function cerrarSesion($nombre) {
        unset($_SESSION[$nombre]);
        session_destroy();
    }

?>