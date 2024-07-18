<?php
$origin = htmlspecialchars($origin);
$destination = htmlspecialchars($destination);
$date = htmlspecialchars($date);
$time = htmlspecialchars($time);
$quantity_of_seats = htmlspecialchars($quantity_of_seats);
$selected_seats = htmlspecialchars($selected_seats);
$names = htmlspecialchars($names);
$surnames = htmlspecialchars($surnames);
$email = htmlspecialchars($email);
$total_price = htmlspecialchars($total_price);
$charge_id = htmlspecialchars($charge_id);
$payment_type = htmlspecialchars($payment_type);
$reference_code = htmlspecialchars($reference_code);
$transaction_date = htmlspecialchars($transaction_date);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmación de Compra</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            text-align: center;
        }
        .header {
            background-color: #052659;
            padding: 20px;
            text-align: center;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
        }
        .header img {
            max-width: 100px;
        }
        h2 {
            color: #052659;
            font-size: 24px;
            margin-bottom: 10px;
        }
        h3 {
            color: #052659;
            font-size: 20px;
            margin-top: 20px;
            margin-bottom: 10px;
        }
        p {
            font-size: 16px;
            line-height: 1.5;
            margin: 10px 0;
        }
        ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        li {
            padding: 10px 0;
        }
        .highlight {
            color: #052659;
            font-weight: bold;
        }
        hr {
            border: none;
            border-top: 1px solid #ddd;
            margin: 20px 0;
        }
        .footer {
            background-color: #052659;
            color: white;
            padding: 20px;
            text-align: center;
        }
        .footer img {
            vertical-align: middle;
            width: 24px;
            height: 24px;
            margin: 0 5px;
        }
    </style>
</head>
<body>
    <div class='container'>
        <div class='header'>
            <img src='https://i.ibb.co/wyRnpLy/Logo-correo-Bluebus.png' alt='Logo'>
        </div>
        <h2>Confirmación de Compra</h2>
        <p>Gracias por tu compra. A continuación, encontrarás los detalles de tu compra:</p>
        <hr>
        <h3>Detalle del Viaje</h3>
        <hr>
        <ul>
            <li><span class='highlight'>Origen:</span> <?php echo $origin; ?></li>
            <li><span class='highlight'>Destino:</span> <?php echo $destination; ?></li>
            <li><span class='highlight'>Fecha:</span> <?php echo $date; ?></li>
            <li><span class='highlight'>Hora:</span> <?php echo $time; ?></li>
        </ul>
        <hr>
        <h3>Asientos Seleccionados</h3>
        <hr>
        <ul>
            <li><span class='highlight'>Número de Asientos:</span> <?php echo $quantity_of_seats; ?></li>
            <li><span class='highlight'>Asientos:</span> <?php echo $selected_seats; ?></li>
        </ul>
        <hr>
        <h3>Datos del Comprador</h3>
        <hr>
        <ul>
            <li><span class='highlight'>Nombres:</span> <?php echo $names; ?></li>
            <li><span class='highlight'>Apellidos:</span> <?php echo $surnames; ?></li>
            <li><span class='highlight'>Correo:</span> <?php echo $email; ?></li>
        </ul>
        <hr>
        <h3>Resumen del Pedido</h3>
        <hr>
        <ul>
            <li><span class='highlight'>Cantidad de Asientos:</span> <?php echo $quantity_of_seats; ?></li>
            <li><span class='highlight'>Total a Pagar:</span> S/ <?php echo $total_price; ?></li>
        </ul>
        <hr>
        <h3>Detalle de Transacción</h3>
        <hr>
        <ul>
            <li><span class='highlight'>ID de Venta de Culqi:</span> <?php echo $charge_id; ?></li>
            <li><span class='highlight'>Tipo de Pago:</span> <?php echo $payment_type; ?></li>
            <li><span class='highlight'>Código de Referencia:</span> <?php echo $reference_code; ?></li>
            <li><span class='highlight'>Fecha y Hora de la Transacción:</span> <?php echo $transaction_date; ?></li>
        </ul>
        <hr>
        <p>¡Gracias por tu preferencia!</p>
        <div class='footer'>
            <p>
                <img src='https://i.ibb.co/cXcBqXv/telefon.png' alt='Teléfono'> Teléfono: +51 992 568 742
                | 
                <img src='https://i.ibb.co/GFf8JDv/ubi.png' alt='Dirección'> Dirección: Av. Javier Prado Este 123, San Isidro, Lima, Perú
            </p>
            <p>
                <img src='https://i.ibb.co/Wch1b1J/correoo.png' alt='Email'> Email: blue.bus@outlook.es
            </p>
        </div>
    </div>
</body>
</html>
