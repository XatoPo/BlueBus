// Script personalizado para agregar animaciones o funcionalidades adicionales

// Ejemplo: animación al cargar la página
$(document).ready(function() {
    $('.table').hide().fadeIn(1000); // Animación de fade-in para la tabla al cargar la página
});

// Ejemplo: desplazamiento suave al hacer clic en enlaces internos
$(document).ready(function() {
    $('a[href^="#"]').on('click', function(event) {
        var target = $(this.getAttribute('href'));
        if (target.length) {
            event.preventDefault();
            $('html, body').animate({
                scrollTop: target.offset().top
            }, 1000);
        }
    });
});
