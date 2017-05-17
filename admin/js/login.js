var numeroIntentos = 0;
var bloqueado = false;

$(function() {
    $("#form-login-admin").submit(function(e) {
        e.preventDefault();
        entrarSistema($('#usuario').val(), $('#password').val());
        if (bloqueado) {
            return;
        }
        numeroIntentos++;
        if (numeroIntentos >= 3) {
            bloquearUsuario($('#usuario').val());
            bloqueado = true;
            numeroIntentos = 0;
        }
    })

    $("#link-recuperar-password").click(function(e) {
        e.preventDefault();
        mostrarModalRecuperarPassword();
    })

    $("#form-recuperar-usuario").submit(function(e){
        e.preventDefault();
        $('#modal-recuperar-usuario').modal('hide'); 
        recuperarPassword($("#correo-recuperar-ncliente").val());      
    });
})

function recuperarPassword(correo) {
     $.ajax({
        method: "POST",
        url: "../php/recuperar-usuario.php",
        data: { opcion : 2 , correo : correo}
    })
    .done(function( msg ) {
        if (msg.resultado) {
            mostrarMensaje("Recuperar contraseña", "Su contraseña se envió a su correo.");
        } else {
           mostrarMensaje("Recuperar contraseña", "El correo proporcionado no es un correo registrado.");
        }       
    });
}

function mostrarModalRecuperarPassword() {
     $("#modal-recuperar-usuario").modal("show");
}

function bloquearUsuario(usuario) {
    $.ajax({
        method: "POST",
        url: "php/estadoUsuarios.php",
        data: { usuario : usuario}
    })
    .done(function( msg ) {
        if (msg.bloqueado) {
            mostrarMensaje("3 intentos fallados", "Su usuario se ha bloqueado.");
        }             
    });
}

function entrarSistema(usuario, password) {
    if (!/^([0-9])+$/.test(usuario)) {
        mostrarMensaje("Login", "Usuario o contraseña incorrectos.");
        return;
    }
    $.ajax({
        method: "POST",
        url: "php/login.php",
        data: { usuario : usuario, password: password}
    })
    .done(function( msg ) {
        if (msg.bloqueado) {
            mostrarMensaje("3 intentos fallados", "Su usuario está bloqueado.");
            bloqueado = true;
            numeroIntentos = 0;
        } else if (msg.entrarSistema) {
            mostrarMensaje("Login", "Ir al panel administrador.");
            numeroIntentos = 0;
            bloqueado = false;
        } else {
            mostrarMensaje("Login", "Usuario o contraseña incorrectos.");
            bloqueado = false;
        }   
    });
}

function mostrarMensaje(titulo, mensaje) {
    $("#modal-title").text(titulo);
    $("#modal-mensaje-p").text(mensaje);
     $("#modal-mensajes").modal("show");
}