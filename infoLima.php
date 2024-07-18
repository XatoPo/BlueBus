<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Información de destino | Lima</title>
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
        <h2 class="display-1">Lima</h2>
    </header>

    <!-- Main content -->
    <main class="container mb-5">
        <section class="mb-4">
            <h3 class="mb-3">Información General</h3>
            <p>Lima, la capital de Perú, es una ciudad vibrante y bulliciosa situada en la costa central del país, a orillas del océano Pacífico. Conocida como la "Ciudad de los Reyes", Lima es una mezcla fascinante de modernidad y tradición, donde los rascacielos se erigen junto a edificios coloniales y sitios arqueológicos precolombinos.</p>
            <p>La ciudad es el centro político, económico y cultural de Perú, y alberga importantes instituciones gubernamentales, financieras y educativas. Lima también es famosa por su exquisita gastronomía, considerada una de las mejores del mundo, y por ser la sede de prestigiosos restaurantes galardonados internacionalmente.</p>
            <p>El clima de Lima es peculiar debido a su ubicación costera y al fenómeno de la corriente de Humboldt. La ciudad tiene una temporada de invierno fría y húmeda, y un verano cálido y soleado. A lo largo del año, la temperatura varía entre los 15 y 28 grados Celsius.</p>
        </section>

        <section class="mb-4">
            <h3 class="mb-3">Lugares Destacados</h3>
            <div class="row text-center">
                <div class="col-md-6 mb-3">
                    <div class="fixed-size-container">
                        <img src="images/plaza_mayor.jpg" class="img-fluid fixed-size" alt="Plaza Mayor de Lima">
                    </div>
                    <p class="mt-2">Plaza Mayor de Lima</p>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="fixed-size-container">
                        <img src="images/miraflores.jpg" class="img-fluid fixed-size" alt="Distrito de Miraflores">
                    </div>
                    <p class="mt-2">Distrito de Miraflores</p>
                </div>
            </div>
            <p>La Plaza Mayor de Lima, también conocida como la Plaza de Armas, es el corazón histórico de la ciudad. Rodeada de importantes edificios coloniales como el Palacio de Gobierno, la Catedral de Lima y el Palacio Municipal, esta plaza es un lugar de gran valor histórico y arquitectónico.</p>
            <p>Miraflores es uno de los distritos más modernos y turísticos de Lima. Famoso por sus hermosos parques, centros comerciales y una vibrante vida nocturna, Miraflores ofrece impresionantes vistas del océano Pacífico y es un lugar ideal para disfrutar de actividades al aire libre, como el parapente y el surf.</p>
        </section>

        <section class="mb-4">
            <h3 class="mb-3">Gastronomía</h3>
            <p>La gastronomía de Lima es uno de sus mayores orgullos. La ciudad es famosa por su variada y deliciosa oferta culinaria, que incluye platos emblemáticos como el ceviche, la causa, el lomo saltado y el ají de gallina. Lima es también el hogar de numerosos restaurantes reconocidos mundialmente, donde se puede disfrutar de una fusión de sabores tradicionales e innovadores.</p>
            <p>En Lima, se celebran importantes eventos gastronómicos como Mistura, una feria que reúne a los mejores exponentes de la cocina peruana e internacional. Además, la ciudad cuenta con mercados y bodegas donde se pueden encontrar productos frescos y de alta calidad.</p>
        </section>

        <section class="mb-4">
            <h3 class="mb-3">Ubicación en el Mapa</h3>
            <div class="ratio ratio-16x9">
            <iframe src="https://www.google.com/maps/embed?pb=!4v1720900293106!6m8!1m7!1syli-_LklvVLaLiPvrqEsRg!2m2!1d-12.04584242650317!2d-77.03049024615578!3f176.49367498782797!4f14.86742128405534!5f0.7820865974627469" width="800" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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
