<?php
// Autoload de clases
require_once './Conexion.php';
require_once './Agencia.php';

$obj = new Agencia();

// Cargar el autoloader de Composer
require 'vendor/autoload.php';

use WpOrg\Requests\Requests; // Actualizado para PSR-4
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Configurar tu API Key y autenticación
$PUBLIC_KEY = "pk_test_6f2f52eb25c0c934";
$SECRET_KEY = "sk_test_d3d937df704f4082";
$culqi = new Culqi\Culqi(array('api_key' => $SECRET_KEY));

date_default_timezone_set('America/Lima');

try {
    $charge = $culqi->Charges->create(
        array(
            "amount" => $_POST['total_price'],
            "capture" => true,
            "currency_code" => "PEN",
            "description" => "Venta de prueba",
            "email" => $_POST['email'], // Aquí usamos el email enviado desde el formulario
            "source_id" => $_POST['token'],
        )
    );

    if ($charge->outcome->type == 'venta_exitosa') {
        // Si el pago es exitoso, guardar la compra en la base de datos
        $total_price = $_POST['total_price'] / 100;
        $email = $_POST['email']; // Aquí usamos el email enviado desde el formulario
        $cod_via = $_POST['COD_VIA'];
        $selected_seats_json = $_POST['selected_seats'];
        $destination = $_POST['destination']; // Agregar datos enviados desde el formulario
        $origin = $_POST['origin']; // Agregar datos enviados desde el formulario
        $date = $_POST['date']; // Agregar datos enviados desde el formulario
        $time = $_POST['time']; // Agregar datos enviados desde el formulario
        $names = $_POST['names']; // Agregar datos enviados desde el formulario
        $surnames = $_POST['surnames']; // Agregar datos enviados desde el formulario
        $quantity_of_seats = count(json_decode($selected_seats_json));
        $selected_seats = implode(', ', json_decode($selected_seats_json)); // Convertir el array JSON a una lista separada por comas
        $charge_id = $charge->id; // Obtener el ID de la venta de Culqi

        // Determinar el tipo de pago. Aquí se asume que el método de pago YAPE tiene un valor específico en la respuesta.
        $payment_type = isset($charge->source->metadata->payment_method) ? $charge->source->metadata->payment_method : 'Desconocido';
        if ($payment_type === 'card' && isset($charge->source->metadata->payment_type)) {
            $payment_type = $charge->source->metadata->payment_type;
        } elseif ($payment_type === 'Desconocido') {
            $payment_type = 'YAPE'; // Ajusta este valor según tu necesidad.
        }

        $reference_code = $charge->reference_code; // Obtener el código de referencia

        // Convertir la fecha de Culqi de milisegundos a segundos y formatearla
        $transaction_date = date('d/m/Y - H:i:s', $charge->creation_date / 1000);

        session_start(); // Asegurarse de que la sesión está iniciada
        $cod_user = $_SESSION['user_data']['COD_USER'];

        // Llamar al procedimiento almacenado
        $obj->comprar($cod_user, $cod_via, $total_price, $selected_seats_json);

        // Configurar PHPMailer
        $mail = new PHPMailer(true);

        try {
            // Configuración del servidor de correo
            $mail->isSMTP();
            $mail->Host = 'smtp.office365.com'; // Servidor SMTP de Outlook
            $mail->SMTPAuth = true;
            $mail->Username = 'blue.bus@outlook.com'; // Tu dirección de correo electrónico
            $mail->Password = 'agenciadeviajes123'; // Tu contraseña de correo electrónico
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            // Destinatario
            $mail->setFrom('blue.bus@outlook.com', 'BLUEBUS');
            $mail->addAddress($email); // Dirección de correo del destinatario

            // Asunto y cuerpo del correo
            $mail->isHTML(true);
            $mail->Subject = 'Confirmación de Compra';

            ob_start();
            include('correo.php'); // Incluye el archivo PHP del correo
            $mail->Body = ob_get_clean();
            $mail->AltBody = "Confirmación de Compra\n\n"
                . "Gracias por tu compra. A continuación, encontrarás los detalles de tu compra:\n\n"
                . "Detalle del Viaje\n"
                . "Origen: $origin\n"
                . "Destino: $destination\n"
                . "Fecha: $date\n"
                . "Hora: $time\n\n"
                . "Asientos Seleccionados\n"
                . "Número de Asientos: $quantity_of_seats\n"
                . "Asientos: $selected_seats\n\n"
                . "Datos del Comprador\n"
                . "Nombres: $names\n"
                . "Apellidos: $surnames\n"
                . "Correo: $email\n\n"
                . "Resumen del Pedido\n"
                . "Cantidad de Asientos: $quantity_of_seats\n"
                . "Total a Pagar: S/ $total_price\n\n"
                . "Detalle de Transacción\n"
                . "ID de Venta de Culqi: $charge_id\n"
                . "Tipo de Pago: $payment_type\n"
                . "Código de Referencia: $reference_code\n"
                . "Fecha y Hora de la Transacción: $transaction_date\n\n"
                . "¡Gracias por tu preferencia!";

            $mail->send();
            echo 'El mensaje ha sido enviado correctamente';
        } catch (Exception $e) {
            echo "El mensaje no pudo ser enviado. Error de Mailer: {$mail->ErrorInfo}";
        }
    } else {
        echo 'Hubo un problema con tu pago: ' . $charge->outcome->user_message;
    }
} catch (Exception $e) {
    echo 'Excepción capturada: ',  $e->getMessage(), "\n";
}
?>
