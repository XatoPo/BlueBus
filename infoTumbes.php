<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Información de destino | Tumbes</title>
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
        <h2 class="display-1">Tumbes</h2>
    </header>

    <!-- Main content -->
    <main class="container mb-5">
        <section class="mb-4">
            <h3 class="mb-3">Información General</h3>
            <p>Tumbes es una ciudad ubicada en el extremo noroeste de Perú, conocida por sus hermosas playas, manglares y rica biodiversidad. Esta región fronteriza con Ecuador es famosa por su clima cálido y su ambiente tropical, lo que la convierte en un destino ideal para los amantes de la naturaleza y el ecoturismo.</p>
            <p>La ciudad de Tumbes es la capital del departamento del mismo nombre y es un importante centro comercial y turístico de la región. La economía de Tumbes se basa en la pesca, la agricultura y el turismo, siendo este último uno de los sectores más dinámicos gracias a la belleza natural y la hospitalidad de sus habitantes.</p>
            <p>El clima de Tumbes es cálido durante todo el año, con temperaturas que oscilan entre los 24 y 30 grados Celsius. La región cuenta con una gran variedad de ecosistemas, desde playas y manglares hasta bosques secos tropicales y humedales.</p>
        </section>

        <section class="mb-4">
            <h3 class="mb-3">Lugares Destacados</h3>
            <div class="row text-center">
                <div class="col-md-6 mb-3">
                    <div class="fixed-size-container">
                        <img src="images/zorritos.jpg" class="img-fluid fixed-size" alt="Playa Zorritos">
                    </div>
                    <p class="mt-2">Playa Zorritos</p>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="fixed-size-container">
                        <img src="images/manglares.jpg" class="img-fluid fixed-size" alt="Manglares de Tumbes">
                    </div>
                    <p class="mt-2">Manglares de Tumbes</p>
                </div>
            </div>
            <p>La Playa Zorritos es una de las playas más hermosas de Tumbes, conocida por su arena blanca y aguas cristalinas. Es el lugar perfecto para relajarse, nadar y disfrutar del sol. Zorritos también ofrece una variedad de actividades acuáticas como el surf y la pesca.</p>
            <p>Los Manglares de Tumbes son un ecosistema único en Perú, donde se puede observar una gran diversidad de flora y fauna. Este humedal alberga muchas especies de aves, peces y crustáceos, y es un lugar ideal para realizar paseos en bote y caminatas ecológicas.</p>
        </section>

        <section class="mb-4">
            <h3 class="mb-3">Gastronomía</h3>
            <p>La gastronomía de Tumbes es una de las más variadas y deliciosas del norte de Perú. Destacan platos como el ceviche de conchas negras, el majarisco (una mezcla de mariscos cocidos), y el chinguirito (pescado seco desmenuzado y aderezado). Los tumbesinos también son conocidos por sus deliciosos platos de cangrejo y sus refrescantes bebidas como el jugo de tamarindo.</p>
            <p>En Tumbes, se pueden encontrar restaurantes y mercados donde se ofrecen productos frescos del mar y de la tierra, lo que permite a los visitantes disfrutar de una experiencia culinaria auténtica y memorable.</p>
        </section>

        <section class="mb-4">
            <h3 class="mb-3">Ubicación en el Mapa</h3>
            <div class="ratio ratio-16x9">
                <iframe src="https://www.google.com/maps/embed?pb=!4v1720900741447!6m8!1m7!1sCAoSLEFGMVFpcE03TlNmOWhnN2EwaWM0MU1JY1BxY01NdEUzLURnSjktdkFJQ1k1!2m2!1d-3.5709017!2d-80.45960880000001!3f54.08159939783993!4f14.553571589335604!5f0.7820865974627469" width="800" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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