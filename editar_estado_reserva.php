<?php
include_once './Admin.php';

if (isset($_POST['codigo_reserva']) && isset($_POST['estado_reserva'])) {
    $codigo_reserva = $_POST['codigo_reserva'];
    $nuevo_estado = $_POST['estado_reserva'];

    $objAdmin = new Admin();
    $objAdmin->actualizarReservaAdmin($codigo_reserva, $nuevo_estado);

    echo "Estado de reserva actualizado correctamente";
}
?>
