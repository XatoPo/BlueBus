<?php
include_once './Agencia.php';

$obj = new Agencia();

if (isset($_SESSION['user_email'])) {
  $usuario_correo = $_SESSION['user_email'];

  $datos_usuario = $obj->BuscarUsuarioPorCorreo($usuario_correo);

  // Guardar los datos del usuario en la sesión
  $_SESSION['user_data'] = $datos_usuario;
}
