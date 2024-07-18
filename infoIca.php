<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Información de destino | Ica</title>
    <link rel="shortcut icon" href="images/BlueBus_logo.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="css/herramientas_style.css" rel="stylesheet" type="text/css" />
    <link href="css/navbar.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
</head>
<style>
    body {
        min-height: 100vh;
        display: flex;
        flex-direction: column;
        background-color: #f8f9fa;
        color: #021024;
    }

    header h1,
    header h2 {
        color: #052659;
    }

    .fixed-size-container {
        height: 300px;
        /* Establece la altura fija */
        width: 100%;
        /* Establece el ancho fijo */
        overflow: hidden;
    }

    .fixed-size {
        height: 100%;
        width: 100%;
        object-fit: cover;
        /* Recorta si es necesario */
        object-position: center;
        /* Centra la imagen */
    }

    footer {
        background-color: #052659;
    }

    .text-center {
        text-align: center;
    }
</style>

<body>
    <!-- Navbar -->
    <?php require_once "components/navbar.php"; ?>

    <!-- Header -->
    <header class="container mt-5 mb-4 text-center">
        <h1 class="display-6">Conoce</h1>
        <h2 class="display-1">Ica</h2>
    </header>

    <!-- Main content -->
    <main class="container mb-5">
        <section class="mb-4">
            <h3 class="mb-3">Información General</h3>
            <p>Ica es una ciudad situada en el centro-sur de Perú, conocida por sus desiertos, valles fértiles y la Huacachina, un oasis en medio de las dunas. Ica es famosa por sus bodegas vitivinícolas, donde se producen algunos de los mejores vinos y piscos del país. La región de Ica es un importante centro agroindustrial de Perú, destacándose por la producción de algodón, espárragos, uvas y pisco.</p>
            <p>La región de Ica es también un punto de partida para visitar las Islas Ballestas y la Reserva Nacional de Paracas, donde se puede observar una increíble variedad de fauna marina y aves. Además, Ica cuenta con importantes sitios arqueológicos como las Líneas de Nazca y el complejo arqueológico de Tambo Colorado.</p>
            <p>En Ica, el clima es cálido durante todo el año, con temperaturas que oscilan entre los 20 y 30 grados Celsius, lo que la convierte en un destino ideal para aquellos que buscan escapar del frío y disfrutar del sol y la arena.</p>
        </section>

        <section class="mb-4">
            <h3 class="mb-3">Lugares Destacados</h3>
            <div class="row text-center">
                <div class="col-md-6 mb-3">
                    <div class="fixed-size-container">
                        <img src="images/huacachina.jpg" class="img-fluid fixed-size" alt="Oasis de Huacachina">
                    </div>
                    <p class="mt-2">Oasis de Huacachina</p>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="fixed-size-container">
                        <img src="images/paracas.jpg" class="img-fluid fixed-size" alt="Reserva Nacional de Paracas">
                    </div>
                    <p class="mt-2">Reserva Nacional de Paracas</p>
                </div>
            </div>
            <p>El oasis de Huacachina, ubicado a pocos kilómetros de la ciudad de Ica, es uno de los lugares más visitados por los turistas. Este hermoso oasis rodeado de palmeras y dunas de arena es el lugar perfecto para disfrutar de actividades como el sandboarding y los paseos en buggy.</p>
            <p>La Reserva Nacional de Paracas, situada en la costa de Ica, es un paraíso para los amantes de la naturaleza. Aquí se pueden observar lobos marinos, pingüinos de Humboldt y una gran variedad de aves marinas. La reserva también cuenta con hermosas playas y acantilados que ofrecen vistas espectaculares del océano Pacífico.</p>
        </section>

        <section class="mb-4">
            <h3 class="mb-3">Gastronomía</h3>
            <p>La gastronomía de Ica es otro de sus grandes atractivos. La región es famosa por su pisco, una bebida alcohólica destilada de uvas, que es la base del famoso cóctel peruano, el Pisco Sour. Además, en Ica se pueden degustar deliciosos platos como la sopa seca, la carapulcra, el arroz con pato y una gran variedad de pescados y mariscos frescos.</p>
            <p>Las bodegas vitivinícolas de Ica ofrecen visitas guiadas y degustaciones, donde los visitantes pueden aprender sobre el proceso de producción del vino y el pisco, y probar algunos de los mejores productos de la región.</p>
        </section>

        <section class="mb-4">
            <h3 class="mb-3">Ubicación en el Mapa</h3>
            <div class="ratio ratio-16x9">
                <iframe src="https://www.google.com/maps/embed?pb=!4v1720897930976!6m8!1m7!1sCAoSLEFGMVFpcE1iTUxoSkVnaU5RX2VKRXlkNWQ4WmpDb0ZkdkY3dHQ1WEV5RG5q!2m2!1d-14.0639298!2d-75.7290925!3f171.94024123410276!4f18.562549110239914!5f0.7820865974627469" width="800" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer id="contacto" class="bg-info text-white text-center py-4 mt-auto">
        <div class="container">
            <p class="mb-0"><i class="bi bi-telephone"></i> Teléfono: +51 992 568 742 | <i class="bi bi-geo-alt"></i> Dirección: Av. Javier Prado Este 123, San Isidro, Lima, Perú</p>
            <p class="mb-0"><i class="bi bi-envelope"></i> Email: info@bluebus.com</p>
        </div>
    </footer>

    <!-- Scripts de JavaScript y Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>