<?php
// Autoload de clases
require_once './Conexion.php';
require_once './Agencia.php';

// Verificar si el método de solicitud es POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar los datos del formulario
    $selected_seats_json = $_POST['selected_seats'];
    $total_price = $_POST['total_price'];
    $cod_via = $_POST['COD_VIA'];
    $total_price_v2 = (float) str_replace(["S/. ", " "], "", $total_price);
    $price_culqi = $total_price_v2 * 100;
    // Convertir el JSON de asientos seleccionados a array PHP
    $selected_seats = json_decode($selected_seats_json);

    // Cantidad de asientos seleccionados
    $cantidad_asientos = count($selected_seats);

    // Conectar a la base de datos y obtener información adicional del viaje
    $cn = new Conexion();
    $conn = $cn->conecta();

    $sql = "SELECT v.HORA_VIA, v.FECHA_VIA, v.DURACION, d.NOM_DESTINO AS Destino, dd.NOM_DESTINO AS Origen 
            FROM viaje AS v 
            JOIN destino AS d ON d.COD_DESTINO = v.DESTINO 
            JOIN destino AS dd ON dd.COD_DESTINO = v.ORIGEN 
            WHERE COD_VIA = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $cod_via);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    // Cerrar conexión
    $stmt->close();
    $conn->close();
} else {
    die('Solicitud no válida.');
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout | BlueBus</title>
    <link rel="shortcut icon" href="images/BlueBus_logo.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="./css/global.css">
    <link rel="stylesheet" href="./css/checkout_medium.css">
    <link href="css/navbar.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <script src="https://checkout.culqi.com/js/v4"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- SweetAlert2 CSS and JS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.9/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.9/dist/sweetalert2.min.js"></script>
</head>

<body>
    <!-- Navbar -->
    <?php require_once "components/navbar.php"; ?>
    <div class="main-content">
        <div class="container">
            <div class="row mt-5">
                <!-- Detalle del viaje -->
                <div class="col-lg-8">
                    <div class="card mb-3">
                        <div class="card-header">Detalle del viaje</div>
                        <div class="card-body">
                            <h3><?= htmlspecialchars($row['Origen'] . ' - ' . $row['Destino']); ?></h3>
                            <p><?= htmlspecialchars($row['FECHA_VIA'] . ' ' . $row['HORA_VIA']); ?></p>
                        </div>
                    </div>
                    <!-- Asientos seleccionados -->
                    <div class="card mb-3">
                        <div class="card-header">Asientos seleccionados</div>
                        <div class="card-body">
                            <ul>
                                <?php foreach ($selected_seats as $asiento) : ?>
                                    <li>Asiento <?= htmlspecialchars($asiento); ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                    <!-- Datos del comprador -->
                    <div class="card">
                        <div class="card-header">Datos del comprador</div>
                        <div class="card-body">
                            <p>Nombres: <?= htmlspecialchars($_SESSION['user_data']['NOMBRES']); ?></p>
                            <p>Apellidos: <?= htmlspecialchars($_SESSION['user_data']['APELLIDOS']); ?></p>
                            <p>Correo electrónico: <?= htmlspecialchars($_SESSION['user_data']['CORREO']); ?></p>
                        </div>
                    </div>
                </div>
                <!-- Resumen del pedido -->
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header">Resumen del pedido</div>
                        <div class="card-body">
                            <p>Cantidad de asientos: <?= htmlspecialchars($cantidad_asientos); ?></p>
                            <p>Total: <?= htmlspecialchars($total_price); ?></p>
                            <button id="btn_pagar" class="btn btn-primary w-100" style="background: #052659 !important; border-color: #052659 !important;">Realizar pago</button>
                        </div>
                    </div>
                </div>
            </div>
            <div id="alert-placeholder"></div>
        </div>
    </div>
    <br><br><br><br><br><br>
    <!-- Pie de Página -->
    <footer id="contacto" class="bg-info text-white text-center py-4">
        <div class="container">
            <p class="mb-0"><i class="bi bi-telephone"></i> Teléfono: +51 992 568 742 | <i class="bi bi-geo-alt"></i> Dirección: Av. Javier Prado Este 123, San Isidro, Lima, Perú</p>
            <p class="mb-0"><i class="bi bi-envelope"></i> Email: info@bluebus.com</p>
        </div>
    </footer>

    <!-- Script de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Script de Culqi -->
    <script>
    Culqi.publicKey = 'pk_test_6f2f52eb25c0c934';

    const btn_pagar = document.getElementById('btn_pagar');

    btn_pagar.addEventListener('click', function(e) {
        e.preventDefault();

        // Abre el formulario con la configuración en Culqi.settings y CulqiOptions
        Culqi.settings({
            title: 'BlueBus',
            currency: 'PEN',
            amount: <?= $price_culqi; ?>,
            order: 'ord_live_0CjjdWhFpEAZlxlz',
        });

        Culqi.options({
            lang: "auto",
            installments: false,
            paymentMethods: {
                tarjeta: true,
                yape: true,
                bancaMovil: false,
                agente: false,
                billetera: false,
                cuotealo: false,
            },
            style: {
                logo: 'https://i.ibb.co/t8t1j8k/Blue-Bus-logo.png',
                bannerColor: '#052659',
                buttonBackground: '#052659',
                menuColor: '#052659',
                linksColor: '#052659',
                buttonText: '',
                buttonTextColor: '',
                priceColor: '#052659'
            }
        });
        Culqi.open();
    });

    function culqi() {
        if (Culqi.token) { // ¡Objeto Token creado exitosamente!
            const token = Culqi.token.id;
            const email = Culqi.token.email;
            console.log('Se ha creado un Token: ', token);
            // Enviar el "Culqi.token.id" al servidor con AJAX
            $.ajax({
                url: 'procesarPago.php',
                type: 'POST',
                data: {
                    token: token,
                    email: '<?= htmlspecialchars($_SESSION['user_data']['CORREO']); ?>', // Asegúrate de que se está enviando el correo electrónico correcto
                    total_price: <?= $price_culqi; ?>,
                    COD_VIA: '<?= $cod_via; ?>',
                    selected_seats: '<?= json_encode($selected_seats); ?>',
                    destination: '<?= $row['Destino']; ?>', // Agregar datos del viaje
                    origin: '<?= $row['Origen']; ?>', // Agregar datos del viaje
                    date: '<?= $row['FECHA_VIA']; ?>', // Agregar datos del viaje
                    time: '<?= $row['HORA_VIA']; ?>', // Agregar datos del viaje
                    names: '<?= htmlspecialchars($_SESSION['user_data']['NOMBRES']); ?>', // Agregar datos del comprador
                    surnames: '<?= htmlspecialchars($_SESSION['user_data']['APELLIDOS']); ?>' // Agregar datos del comprador
                }
            }).done(function(resp) {
                // Cierra el panel de Culqi antes de mostrar la alerta
                Culqi.close();
                Swal.fire({
                    icon: 'success',
                    title: 'Pago exitoso',
                    text: 'Pago y registro exitosos.',
                    showConfirmButton: true,
                    confirmButtonText: 'Aceptar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = 'index.php';
                    }
                });
            }).fail(function(jqXHR, textStatus, errorThrown) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error en la transacción',
                    text: 'Hubo un error en la transacción. Por favor, inténtelo de nuevo.',
                    showConfirmButton: true,
                    confirmButtonText: 'Aceptar'
                });
            });
        } else {
            console.log(Culqi.error);
        }
    }
</script>

</body>

</html>