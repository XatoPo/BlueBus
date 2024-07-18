<?php
require_once './Conexion.php';
require_once './Agencia.php';

$objAgencia = new Agencia();
$ventas = $objAgencia->obtenerVentas();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de Ventas | BlueBus</title>
    <link rel="shortcut icon" href="images/BlueBus_logo.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="./css/global.css">
    <link rel="stylesheet" href="./css/crud_styles.css">
    <link href="css/navbar.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/reporteVentas.css"> <!-- Archivo CSS personalizado para animaciones -->
</head>

<body>
    <!-- Navbar -->
    <?php require_once "components/navbar.php"; ?>

    <div class="container mt-5">
        <h2 class="text-center mb-4">Reporte de Ventas Realizadas</h2>
        <div class="table-responsive">
            <table class="table table-striped table-bordered text-center align-middle">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">Código de Venta</th>
                        <th scope="col">Comprador</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Monto Total</th>
                        <th scope="col">Estado de Venta</th>
                        <th scope="col">Asientos Comprados</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($ventas)) : ?>
                        <?php foreach ($ventas as $venta) : ?>
                            <tr>
                                <td><?= htmlspecialchars($venta['COD_VENTA']); ?></td>
                                <td><?= htmlspecialchars($venta['COMPRADOR']); ?></td>
                                <td><?= htmlspecialchars($venta['FECHA_VENTA']); ?></td>
                                <td><?= htmlspecialchars($venta['MONTO_TOTAL']); ?></td>
                                <td><?= htmlspecialchars($venta['ESTADO_PAGO']); ?></td>
                                <td><?= htmlspecialchars($venta['ASIENTOS_COMPRADOS']); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <tr>
                            <td colspan="6" class="text-center">No hay ventas registradas</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
    <br><br><br><br><br><br><br><br><br>
    <footer id="contacto" class="bg-info text-white text-center py-4">
        <div class="container">
            <p class="mb-0"><i class="bi bi-telephone"></i> Teléfono: +51 992 568 742 | <i class="bi bi-geo-alt"></i> Dirección: Av. Javier Prado Este 123, San Isidro, Lima, Perú</p>
            <p class="mb-0"><i class="bi bi-envelope"></i> Email: info@bluebus.com</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="./js/reporteVentas.js"></script> <!-- Archivo JS personalizado para animaciones -->
</body>

</html>