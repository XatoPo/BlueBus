<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Información de destino | Chiclayo</title>
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
        <h2 class="display-1">Chiclayo</h2>
    </header>

    <!-- Main content -->
    <main class="container mb-5">
        <section class="mb-4">
            <h3 class="mb-3">Información General</h3>
            <p>Chiclayo es una ciudad ubicada en la costa norte de Perú, conocida por su historia, cultura y gastronomía. Es la capital de la región Lambayeque y uno de los principales centros económicos del norte del país. Chiclayo es famosa por su rica herencia cultural, destacándose por sus museos, sitios arqueológicos y tradiciones vivas.</p>
            <p>La ciudad de Chiclayo es conocida como la "Ciudad de la Amistad" debido a la calidez y hospitalidad de su gente. Es un destino popular para los viajeros que buscan explorar la historia precolombina del Perú y disfrutar de la deliciosa gastronomía norteña, que incluye platos como el ceviche, el arroz con pato y el juane.</p>
        </section>

        <section class="mb-4">
            <h3 class="mb-3">Lugares Destacados</h3>
            <div class="row text-center">
                <div class="col-md-6 mb-3">
                    <div class="fixed-size-container">
                        <img src="images/museo_tumbas_reales.jpg" class="img-fluid fixed-size" alt="Museo de las Tumbas Reales de Sipán">
                    </div>
                    <p class="mt-2">Museo de las Tumbas Reales de Sipán</p>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="fixed-size-container">
                        <img src="images/plaza_principal.jpg" class="img-fluid fixed-size" alt="Plaza de Armas de Chiclayo">
                    </div>
                    <p class="mt-2">Plaza de Armas de Chiclayo</p>
                </div>
            </div>
            <p>El Museo de las Tumbas Reales de Sipán es uno de los museos más importantes de Perú, conocido por albergar los restos y tesoros del Señor de Sipán, un gobernante mochica de hace más de mil años. La Plaza de Armas de Chiclayo es el corazón de la ciudad, donde se pueden encontrar hermosos jardines, fuentes y la Catedral de Chiclayo.</p>
        </section>

        <section class="mb-4">
            <h3 class="mb-3">Ubicación en el Mapa</h3>
            <div class="ratio ratio-16x9">
            <iframe src="https://www.google.com/maps/embed?pb=!4v1720903571563!6m8!1m7!1sCAoSLEFGMVFpcE5PYkpPTjJ5WFZsWnozUlBoTU9rOWFDRUFOVGxWNkJZUDhfdXYx!2m2!1d-6.7716167!2d-79.83887179999999!3f342.4601125431386!4f21.8113872215081!5f0.4000000000000002" width="800" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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
