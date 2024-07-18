<?php
include_once 'Conexion.php';
include_once 'Agencia.php';

?>
<!DOCTYPE html>
        <html lang="es">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Administrador | Reportes</title>
            <link rel="shortcut icon" href="images/BlueBus_logo.png" type="image/x-icon">
            <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
            <link href="css/herramientas_style.css" rel="stylesheet" type="text/css" />
            <link href="css/navbar.css" rel="stylesheet" type="text/css" />
            <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
        </head>

        <body>
        <?php require_once "components/navbar.php"; ?>
    <header class="container mt-5 mb-4 text-center">
        <h1 class="display-4">Reportes Generales</h1>
    </header>
            <footer id="contacto" class="bg-info text-white text-center py-4">
                <div class="container">
                    <p class="mb-0"><i class="bi bi-telephone"></i> Teléfono: +51 992 568 742 | <i class="bi bi-geo-alt"></i> Dirección: Av. Javier Prado Este 123, San Isidro, Lima, Perú</p>
                    <p class="mb-0"><i class="bi bi-envelope"></i> Email: info@bluebus.com</p>
                </div>
            </footer>

            <!-- Scripts de JavaScript y Bootstrap -->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        </body>

        </html>
<?php
?>
