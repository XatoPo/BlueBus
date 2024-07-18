<?php
include_once './Agencia.php';
include_once './Conexion.php';

session_start();

$obj = new Agencia();
$mensaje_error = '';
$mensaje_exito = '';

// Verifica si se han enviado datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtén los valores del formulario y sanitízalos
    $nombres = filter_input(INPUT_POST, 'nombres', FILTER_SANITIZE_STRING);
    $apellidos = filter_input(INPUT_POST, 'apellidos', FILTER_SANITIZE_STRING);
    $correo = filter_input(INPUT_POST, 'correo', FILTER_SANITIZE_EMAIL);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

    // Validar los inputs
    if (empty($nombres) || empty($apellidos)) {
        $mensaje_error = "Los nombres y apellidos son obligatorios.";
    } elseif (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        $mensaje_error = "Correo electrónico no válido.";
    } elseif (strlen($password) < 8 || !preg_match('/[A-Za-z]/', $password) || !preg_match('/[0-9]/', $password)) {
        $mensaje_error = "La contraseña debe tener al menos 8 caracteres, e incluir letras y números.";
    } else {
        // Llama a la función registrarUsuario

        try {
            $obj->registrarUsuario($nombres, $apellidos, $correo, $password, 'cliente');
            $mensaje_exito = "Registro exitoso. Puede iniciar sesión.";
        } catch (Exception $e) {
            $mensaje_error = "Error al registrar el usuario. Intente de nuevo.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>BlueBus - Registro</title>
    <link rel="shortcut icon" href="images/BlueBus_logo.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="css/estilo-registro.css" rel="stylesheet" type="text/css" />
</head>

<body class="d-flex justify-content-center align-items-center vh-100 bg-color-blue-oscuro">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-12 col-md-10 col-lg-8">
                <div class="card">
                    <div class="row g-0">
                        <div class="col-12 col-md-6">
                            <img src="images/ica_laguna.png" alt="Image" class="img-fluid rounded-start">
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="card-body">
                                <h1 class="text-center fs-1 fw-bold">Registro</h1>
                                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                                    <div class="input-group mt-4">
                                        <div class="input-group-text bg-color-blue-oscuro">
                                            <i class="bi bi-person"></i>
                                        </div>
                                        <input name="nombres" class="form-control bg-light" type="text" placeholder="Nombres" required />
                                    </div>
                                    <div class="input-group mt-3">
                                        <div class="input-group-text bg-color-blue-oscuro">
                                            <i class="bi bi-person"></i>
                                        </div>
                                        <input name="apellidos" class="form-control bg-light" type="text" placeholder="Apellidos" required />
                                    </div>
                                    <div class="input-group mt-3">
                                        <div class="input-group-text bg-color-blue-oscuro">
                                            <i class="bi bi-envelope-at"></i>
                                        </div>
                                        <input name="correo" class="form-control bg-light" type="email" placeholder="Correo electrónico" required />
                                    </div>
                                    <div class="input-group mt-3">
                                        <div class="input-group-text bg-color-blue-oscuro">
                                            <i class="bi bi-lock"></i>
                                        </div>
                                        <input name="password" class="form-control bg-light" type="password" placeholder="Contraseña" required pattern="(?=.*\d)(?=.*[a-zA-Z]).{8,}" title="La contraseña debe tener al menos 8 caracteres, e incluir letras y números." />
                                    </div>
                                    <button type="submit" class="btn btn-blue-oscuro text-white w-100 mt-4 fw-semibold shadow-sm">Registrarse</button>
                                </form>
                                <?php if (!empty($mensaje_error)) { ?>
                                    <div class="alert alert-danger mt-3" role="alert">
                                        <?php echo $mensaje_error; ?>
                                    </div>
                                <?php } elseif (!empty($mensaje_exito)) { ?>
                                    <div class="alert alert-success mt-3" role="alert">
                                        <?php echo $mensaje_exito; ?>
                                    </div>
                                <?php } ?>
                                <div class="d-flex gap-1 justify-content-center mt-3">
                                    <div>¿Ya tienes una cuenta?</div>
                                    <a href="login.php" class="text-decoration-none text-blue-oscuro fw-semibold">Iniciar sesión</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>