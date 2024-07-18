<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Información de destino | Chimbote</title>
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
        <h2 class="display-1">Chimbote</h2>
    </header>

    <!-- Main content -->
    <main class="container mb-5">
        <section class="mb-4">
            <h3 class="mb-3">Información General</h3>
            <p>Chimbote es una ciudad portuaria ubicada en la costa norte de Perú. Es la ciudad más grande del departamento de Áncash y un importante centro económico e industrial de la región. Conocida por su puerto pesquero, Chimbote es un destino ideal para los amantes del mar y la cultura marinera.</p>
            <p>La ciudad de Chimbote tiene una rica historia que se remonta a la época precolombina, y hoy en día es conocida por su gente amable y su deliciosa gastronomía marina. Además, Chimbote es el punto de partida para visitar algunos de los lugares naturales más impresionantes de la región, como la Playa Tortugas y las Cataratas de Hornillos.</p>
        </section>

        <section class="mb-4">
            <h3 class="mb-3">Lugares Destacados</h3>
            <div class="row text-center">
                <div class="col-md-6 mb-3">
                    <div class="fixed-size-container">
                        <img src="images/playa_tortugas.jpg" class="img-fluid fixed-size" alt="Playa Tortugas">
                    </div>
                    <p class="mt-2">Playa Tortugas</p>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="fixed-size-container">
                        <img src="images/hornillos.jpg" class="img-fluid fixed-size" alt="Cataratas de Hornillos">
                    </div>
                    <p class="mt-2">Cataratas de Hornillos</p>
                </div>
            </div>
            <p>La Playa Tortugas es una de las playas más hermosas y tranquilas de Chimbote, ideal para relajarse y disfrutar del sol y el mar. Con aguas cristalinas y arenas blancas, es perfecta para practicar deportes acuáticos y disfrutar de deliciosos platos marinos en los restaurantes cercanos.</p>
            <p>Las Cataratas de Hornillos, ubicadas en las montañas cercanas a Chimbote, son un espectáculo natural impresionante. Con una caída de agua cristalina rodeada de exuberante vegetación, las cataratas ofrecen un lugar perfecto para realizar caminatas y disfrutar de la naturaleza virgen de la región.</p>
        </section>

        <section class="mb-4">
            <h3 class="mb-3">Ubicación en el Mapa</h3>
            <div class="ratio ratio-16x9">
            <iframe src="https://www.google.com/maps/embed?pb=!4v1720903357083!6m8!1m7!1sCAoSLEFGMVFpcFBqNXZ4MDNXUDB1UmNBQjc2OUJ3MlJNeEJXQWtzcXJMcXQ0S1Ji!2m2!1d-9.074618899999999!2d-78.59360629999999!3f336.6795909670473!4f17.543337916418423!5f0.7820865974627469" width="800" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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
