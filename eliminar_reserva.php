<?php
include_once './Admin.php';

if (isset($_GET['codigo_reserva'])) {
    $codigo_reserva = $_GET['codigo_reserva'];

    $objAdmin = new Admin();
    $objAdmin->eliminarReservaAdmin($codigo_reserva);

    echo "Reserva eliminada correctamente";
}
?>