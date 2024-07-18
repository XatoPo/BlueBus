<?php
include_once 'Conexion.php';
include_once 'Agencia.php';

if (isset($_GET['origen']) && isset($_GET['destino']) && isset($_GET['fecha'])) {
    $origen = $_GET['origen'];
    $destino = $_GET['destino'];
    $fecha = $_GET['fecha'];

    // Validar formato de fecha
    if (DateTime::createFromFormat('Y-m-d', $fecha) !== false) {
        $agencia = new Agencia();
        $viajes = $agencia->buscarViajes($origen, $destino, $fecha);

        if (!empty($viajes)) {
            echo 'results-found';
        } else {
            echo 'no-results';
        }
    } else {
        echo 'invalid-date';
    }
} else {
    echo 'missing-parameters';
}
