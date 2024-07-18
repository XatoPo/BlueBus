<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Información de destino | Arequipa</title>
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
        <h2 class="display-1">Arequipa</h2>
    </header>

    <!-- Main content -->
    <main class="container mb-5">
        <section class="mb-4">
            <h3 class="mb-3">Información General</h3>
            <p>Arequipa, conocida como "La Ciudad Blanca" por el color de sus edificios construidos con sillar, una piedra volcánica blanca, es una de las ciudades más importantes y hermosas de Perú. Está ubicada en el sur del país y es la capital de la región de Arequipa. La ciudad se encuentra a los pies del majestuoso volcán Misti, lo que le da un paisaje impresionante y un clima templado durante todo el año.</p>
            <p>Arequipa es el centro económico, cultural y político del sur del Perú. Su centro histórico, declarado Patrimonio de la Humanidad por la UNESCO, alberga impresionantes construcciones coloniales, iglesias y monasterios que reflejan la riqueza arquitectónica e histórica de la ciudad.</p>
            <p>La región de Arequipa es también conocida por su variada gastronomía, destacándose platos como el rocoto relleno, el adobo, y la ocopa arequipeña. Además, Arequipa es un punto de partida ideal para explorar el Cañón del Colca, uno de los cañones más profundos del mundo.</p>
        </section>

        <section class="mb-4">
            <h3 class="mb-3">Lugares Destacados</h3>
            <div class="row text-center">
                <div class="col-md-6 mb-3">
                    <div class="fixed-size-container">
                        <img src="images/monasterio_santa_catalina.jpg" class="img-fluid fixed-size" alt="Monasterio de Santa Catalina">
                    </div>
                    <p class="mt-2">Monasterio de Santa Catalina</p>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="fixed-size-container">
                        <img src="images/cañon_colca.jpg" class="img-fluid fixed-size" alt="Cañón del Colca">
                    </div>
                    <p class="mt-2">Cañón del Colca</p>
                </div>
            </div>
            <p>El Monasterio de Santa Catalina es uno de los principales atractivos turísticos de Arequipa. Fundado en 1579, este convento de clausura ocupa una gran manzana en el centro de la ciudad y es conocido por sus coloridas calles, patios y celdas. Es un lugar que ofrece una visión fascinante de la vida religiosa en la época colonial.</p>
            <p>El Cañón del Colca, ubicado a pocas horas de Arequipa, es uno de los cañones más profundos del mundo y un destino popular para el trekking y la observación de cóndores andinos. Este impresionante cañón ofrece paisajes espectaculares, con terrazas agrícolas antiguas, pueblos tradicionales y una rica biodiversidad.</p>
        </section>

        <section class="mb-4">
            <h3 class="mb-3">Gastronomía</h3>
            <p>La gastronomía de Arequipa es reconocida como una de las más ricas y variadas de Perú. Entre los platos más destacados se encuentran el rocoto relleno, un pimiento picante relleno de carne y especias; el adobo, un guiso de carne de cerdo marinado en chicha de jora y especias; y la ocopa, una salsa hecha a base de huacatay, maní y ají amarillo, que se sirve sobre papas sancochadas.</p>
            <p>Además, Arequipa es famosa por sus picanterías, restaurantes tradicionales donde se pueden degustar estos y otros deliciosos platos acompañados de chicha de jora, una bebida fermentada a base de maíz. La cocina arequipeña es una mezcla de sabores indígenas, españoles y africanos, lo que la hace única y deliciosa.</p>
        </section>

        <section class="mb-4">
            <h3 class="mb-3">Ubicación en el Mapa</h3>
            <div class="ratio ratio-16x9">
            <iframe src="https://www.google.com/maps/embed?pb=!4v1720901010963!6m8!1m7!1sz5kG6WxCubYYKXPebLOaeA!2m2!1d-16.39888757903345!2d-71.53684232741536!3f354.1493059649269!4f13.467065127438943!5f0.4000000000000002" width="800" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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
