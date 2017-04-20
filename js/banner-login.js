$(document).ready(function(){
    $(".contenedor-carrucel__opciones").click(function() {
        alert("si");
        if ($(this).hasClass('.contenedor-carrucel__opcion-1')) {
            alert("1");
        } else if ($(this).hasClass('.contenedor-carrucel__opcion-2')) {
            alert("2");
        } else if ($(this).hasClass('.contenedor-carrucel__opcion-3')) {
            alert("3");
        } else if ($(this).hasClass('.contenedor-carrucel__opcion-4')) {
            alert("4");
        }
    })
})