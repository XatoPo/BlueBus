<?php
// Incluye los archivos necesarios
include_once './Agencia.php';
include_once './Conexion.php';
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nosotros - Empresa de Transporte Terrestre Blue Bus</title>
    <link rel="shortcut icon" href="images/BlueBus_logo.png" type="image/x-icon">
    <!-- Enlace a la hoja de estilos de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Enlace a los iconos de Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="css/nosotros_style.css" rel="stylesheet" type="text/css" />
    <link href="css/navbar.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <!-- Barra de Navegación -->
    <?php require_once "components/navbar.php"; ?>

    <!-- Sección "Nosotros" -->
    <div class="container py-5">
        <h1 class="display-4 text-center mb-4">Sobre Nosotros</h1>
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card bg-light">
                    <div class="card-body">
                        <h2 class="card-title">Bienvenidos a Blue Bus</h2>
                        <p class="card-text">Fundada en 2021, Blue Bus es una empresa peruana de transporte terrestre comprometida con brindar el mejor servicio de transporte a lo largo de todo el país. Nos enorgullece ofrecer viajes seguros, cómodos y asequibles a nuestros clientes, conectando las principales ciudades y destinos turísticos del Perú.</p>
                        <p class="card-text">Nuestro equipo está dedicado a garantizar la satisfacción de nuestros pasajeros, proporcionándoles un servicio de alta calidad, puntual y con una atención personalizada. En Blue Bus, creemos que cada viaje es una oportunidad para crear experiencias memorables, y nos esforzamos por hacer de cada trayecto un momento especial.</p>
                        <p class="card-text">Con un enfoque en la innovación y el compromiso con el medio ambiente, nuestros buses están equipados con tecnología de última generación y cumplen con los más altos estándares de seguridad y confort. Además, implementamos prácticas sostenibles para minimizar nuestro impacto ambiental.</p>
                        <p class="card-text">Gracias por elegir Blue Bus. Esperamos poder llevarte a tu próximo destino con la misma dedicación y entusiasmo que nos caracteriza.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Sección "Conoce nuestros buses" -->
    <div class="container py-5">
        <h1 class="display-4 text-center mb-4">Conoce nuestros buses</h1>
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card bg-light">
                    <div class="card-body">
                        <div class="sketchfab-embed-wrapper"> 
                            <iframe title="Marcopolo bus Paradiso 1800 DD G7 CikTur" frameborder="0" allowfullscreen mozallowfullscreen="true" webkitallowfullscreen="true" allow="autoplay; fullscreen; xr-spatial-tracking" xr-spatial-tracking execution-while-out-of-viewport execution-while-not-rendered web-share src="https://sketchfab.com/models/628e326714de4da2ad0553efd0d8153a/embed?&autostart=1&ui_theme=dark&dnt=1"> </iframe>
                        </div>
                        <br>
                        <div class="sketchfab-embed-wrapper"> 
                            <iframe title="Travel Bus Blue" frameborder="0" allowfullscreen mozallowfullscreen="true" webkitallowfullscreen="true" allow="autoplay; fullscreen; xr-spatial-tracking" xr-spatial-tracking execution-while-out-of-viewport execution-while-not-rendered web-share src="https://sketchfab.com/models/067910f7097e4ce89414f49fd31ffc26/embed?&autostart=1&ui_theme=dark&dnt=1"> </iframe>
                        </div>
                        <br>
                        <div class="sketchfab-embed-wrapper"> 
                            <iframe title="Bus Nefaz 5299" frameborder="0" allowfullscreen mozallowfullscreen="true" webkitallowfullscreen="true" allow="autoplay; fullscreen; xr-spatial-tracking" xr-spatial-tracking execution-while-out-of-viewport execution-while-not-rendered web-share src="https://sketchfab.com/models/eb61dac0a9984dcba0f06bacbccfd787/embed?&autostart=1&ui_hint=2&ui_theme=dark&dnt=1"> </iframe>
                        </div>
                        <br>
                        <div class="sketchfab-embed-wrapper"> 
                            <iframe title="Stylized Bus and Bus Stop" frameborder="0" allowfullscreen mozallowfullscreen="true" webkitallowfullscreen="true" allow="autoplay; fullscreen; xr-spatial-tracking" xr-spatial-tracking execution-while-out-of-viewport execution-while-not-rendered web-share src="https://sketchfab.com/models/df66d4be793c4d3ab9a423149c2e237d/embed?autostart=1&preload=1&ui_hint=2"> </iframe> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pie de Página -->
    <footer id="contacto" class="bg-info text-white text-center py-4">
        <div class="container">
            <p class="mb-0"><i class="bi bi-telephone"></i> Teléfono: +51 992 568 742 | <i class="bi bi-geo-alt"></i> Dirección: Av. Javier Prado Este 123, San Isidro, Lima, Perú</p>
            <p class="mb-0"><i class="bi bi-envelope"></i> Email: info@bluebus.com</p>
        </div>
    </footer>

    <!-- Script de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>