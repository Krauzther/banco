$(document).ready(function(){
    $(".contenedor-carrucel__opciones").click(function() {
        var rutaImagen = "";
        if ($(this).hasClass('contenedor-carrucel__opcion-1')) {
            rutaImagen = "img/imgBanner1.png";
        } else if ($(this).hasClass('contenedor-carrucel__opcion-2')) {
            rutaImagen = "img/imgBanner2.png";
        } else if ($(this).hasClass('contenedor-carrucel__opcion-3')) {
            rutaImagen = "img/imgBanner3.png";
        } else if ($(this).hasClass('contenedor-carrucel__opcion-4')) {
            rutaImagen = "img/imgBanner4.png";
        }
        $(".contenedor-carrucel__img").animate({opacity:'0'}, 300, function() {
            $(".contenedor-carrucel__img").attr("src", rutaImagen);
        });        
        $(".contenedor-carrucel__img").animate({opacity:'1'}, 300);
    })
})