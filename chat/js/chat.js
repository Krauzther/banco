var tipoContacto = "cliente";
var idContacto;
$(function() {
    mostrarContactos("cliente");

    $('#btn-clientes').click(function() {
        mostrarContactos("cliente");
        tipoContacto = "cliente";
    })

    $('#btn-administradores').click(function() {
        mostrarContactos("administradores");
        tipoContacto = "administradores";
    })

    $("#btnEnviarMensaje").click(function() {
        if ($("#texto-mensaje").val() == "") {
            return;
        }
        hora = new Date();
        enviarMensaje(idContacto, $("#texto-mensaje").val(),  hora.getHours() + ":" + hora.getMinutes());
    })
})

function  enviarMensaje(id , mensaje, hora) {
    $.ajax({
        method: "POST",
        url: "php/mensajes.php",
        data: { id : id, mensaje : mensaje, hora : hora}
    })
    .done(function( msg ) {
        
    });
}

function mostrarContactos(tipoContacto) {
    $.ajax({
        method: "POST",
        url: "php/contactos.php",
        data: { tipo : tipoContacto}
    })
    .done(function( msg ) {
        $('.lista').empty();
        msg.forEach(function(element) {
            if (tipoContacto == "cliente") {
                $('.lista').append("<div class='list-group-item item' id='" + element.ncliente + "'>" + element.nombre + " " + element.apaterno + "</div>");
            } else {
                $('.lista').append("<div class='list-group-item item' id='" + element.usuario + "'>" + element.nombre + "</div>");
            }            
        });

        $('.item').click(function() {
            idContacto = $(this).attr('id');
            $("#tituloChat").text($(this).text());
            $("#modalChat").modal("show");
        })        
    });
}