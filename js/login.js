var numeroIntentos = 0;
var bloqueado = false;

$(function(){
    $("#form-login-cliente").submit(function(e){
        e.preventDefault();
        login($("#numero-cliente").val());        
    });

    $("#form-recuperar-usuario").submit(function(e){
        e.preventDefault();
        $('#modal-recuperar-usuario').modal('hide'); 
        recuperarNumeroDeUsuario($("#correo-recuperar-ncliente").val());      
    });
    
    $("#form-login-clave").submit(function(e){
        e.preventDefault();
        loginClave($("#clave-cliente").val());
        if (bloqueado) {
            return;
        }
        numeroIntentos++;
        if (numeroIntentos >= 3) {
            bloquearUsuario();
            bloqueado = true;
            numeroIntentos = 0;
        }
    });

    $("#link-recuperar-usuario").click(function(e) {
        e.preventDefault();
        mostrarModalRecuperarUsuairo();
    })

    $("#link-recuperar-clave").click(function(e) {
        e.preventDefault();
        recuperarClaveDeAcceso();
    })
})

function recuperarClaveDeAcceso() {
    $.ajax({
        method: "POST",
        url: "php/recuperar-usuario.php",
        data: { opcion : 1}
    })
    .done(function( msg ) {
        if (msg.resultado) {
            mostrarMensaje("Recuperar clave de acceso", "Su clave de acceso se envió a su correo.");
        } else {
            mostrarMensaje("Recuperar clave de acceso", "Ocurrió un error, no fue posible recuperar su clave de acceso.");
        }       
    });
}

function recuperarNumeroDeUsuario(correo) {
     $.ajax({
        method: "POST",
        url: "php/recuperar-usuario.php",
        data: { opcion : 0 , correo : correo}
    })
    .done(function( msg ) {
        if (msg.resultado) {
            mostrarMensaje("Recuperar número de cliente", "Su número de cliente se envió a su correo.");
        } else {
           mostrarMensaje("Recuperar número de cliente", "El correo proporcionado no es un correo registrado.");
        }       
    });
}

function bloquearUsuario() {
    $.ajax({
        url: "php/estadoUsuarios.php"
    })
    .done(function( msg ) {
        mostrarMensaje("3 intentos fallados", "Su usuario se ha bloqueado.");     
    });
}

function login(ncliente) {
    if (!/^([0-9])+$/.test(ncliente)) {
        mostrarMensaje("Login", "El número de cliente no existe.");
        return;
    }
    $.ajax({
        method: "POST",
        url: "php/validar-usuario.php",
        data: { cliente : ncliente}
    })
    .done(function( msg ) {
        if (msg.existe ) {
            document.location.href = "index2.php";
        } else {
           mostrarMensaje("Login", "El número de cliente no existe.");
        }       
    });
}

function loginClave(clave) {
    $.ajax({
        method: "POST",
        url: "php/validar-clave.php",
        data: { clave : clave}
    })
    .done(function( msg ) {
        if (msg.bloqueado) {
            mostrarMensaje("3 intentos fallados", "Su usuario está bloqueado.");
            bloqueado = true;
            numeroIntentos = 0;
        } else if (msg.existe ) {
            document.location.href = "perfil.html";
            //mostrarMensaje("Login", "Ir al Dash board.");
            
            numeroIntentos = 0;
            bloqueado = false;
        } else {
            mostrarMensaje("Login", "La clave es incorrecta.");
            bloqueado = false;
        }       
    });
}

function mostrarMensaje(titulo, mensaje) {
    $("#modal-title").text(titulo);
    $("#modal-mensaje-p").text(mensaje);
     $("#modal-mensajes").modal("show");
}

function mostrarModalRecuperarUsuairo() {
     $("#modal-recuperar-usuario").modal("show");
}