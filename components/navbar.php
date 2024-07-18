<?php
session_start();
require_once "session_share.php";
?>

<!-- Barra de Navegación -->
<nav class="navbar navbar-expand-lg navbar-dark sticky-top bg-dark">
  <div class="container d-flex align-items-center justify-content-between">
    <a class="navbar-brand d-flex align-items-center" href="index.php">
      <img src="images/BlueBus_logo.png" alt="BlueBus Logo" class="logo" height="35" width="auto">
    </a>
    <!-- Botón de hamburguesa para dispositivos móviles -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <!-- Elementos de navegación -->
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link" href="index.php"><i class="bi bi-house-door"></i> Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="visualizer.php"><i class="bi bi-info-circle"></i> Nosotros</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"><i class="bi bi-people"></i> Servicios</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#contacto"><i class="bi bi-envelope"></i> Contacto</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-person"></i> Hola, <?php echo isset($_SESSION['user_data']['NOMBRES']) ? htmlspecialchars($_SESSION['user_data']['NOMBRES']) : 'Invitado'; ?>
          </a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
            <?php if (isset($_SESSION['user_data']['NOMBRES'])) : ?>
              <?php if ($_SESSION['user_data']['ROL'] == 'ADMIN') : ?>
                <li>
                  <a class="dropdown-item" href="herramientasAdmin.php"><i class="bi bi-backpack4 me-1"></i> Herramientas de administrador</a>
                </li>
              <?php endif; ?>
              <li>
                <a class="dropdown-item" href="logout.php"><i class="bi bi-box-arrow-left me-1"></i> Cerrar Sesión</a>
              </li>
            <?php else : ?>
              <li>
                <a class="dropdown-item" href="login.php"><i class="bi bi-box-arrow-right me-1"></i> Iniciar Sesión</a>
              </li>
            <?php endif; ?>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>