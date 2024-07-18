<?php
// Incluye el archivo Agencia.php que contiene tu función validarLogin
include_once './Agencia.php';
include_once './Conexion.php';

$obj = new Agencia();
// Define una variable para almacenar el mensaje de error
$mensaje_error = '';

// Lista de destino:
$listaDestinos = $obj->ListarDestinos();
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inicio - Empresa de Transporte Terrestre</title>
  <link rel="shortcut icon" href="images/BlueBus_logo.png" type="image/x-icon">
  <!-- Enlace a la hoja de estilos de Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Enlace a los iconos de Bootstrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link href="css/incio_style.css" rel="stylesheet" type="text/css" />
  <link href="css/navbar.css" rel="stylesheet" type="text/css" />
  <!-- Enlace a jQuery (necesario para AJAX) -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
  <!-- Barra de Navegación -->
  <?php require_once "components/navbar.php"; ?>

  <!-- Slider de Viajes -->
  <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="images/carrusel_foto_1.jpg" class="d-block w-100 custom-slider-img" alt="Cuzco">
        <div class="carousel-caption d-none d-md-block">
          <h5>Cuzco</h5>
          <p>Disfruta de excursiones en construcciones milenarias.</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="images/carrusel_foto_2.jpg" class="d-block w-100 custom-slider-img" alt="Cuzco">
        <div class="carousel-caption d-none d-md-block">
          <h5>Cuzco</h5>
          <p>No te pierdas de la montaña de colores.</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="images/carrusel_foto_3.jpg" class="d-block w-100 custom-slider-img" alt="Cuzco">
        <div class="carousel-caption d-none d-md-block">
          <h5>Cuzco</h5>
          <p>Descubre la belleza natural de nuestro país con nuestros tours ecológicos.</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="images/carrusel_foto_4.jpg" class="d-block w-100 custom-slider-img" alt="Cordillera">
        <div class="carousel-caption d-none d-md-block">
          <h5>Cordillera</h5>
          <p>Descubre la belleza natural de nuestro país con nuestros tours ecológicos.</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="images/carrusel_foto_5.jpg" class="d-block w-100 custom-slider-img" alt="Lima">
        <div class="carousel-caption d-none d-md-block">
          <h5>Lima</h5>
          <p>Descubre la belleza natural de nuestro país en la Lima costera.</p>
        </div>
      </div>
    </div>
    <!-- Flechas de control -->
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

  <!-- Contenido Principal -->
  <!-- Formulario búsqueda rápida -->
  <div class="container py-5">
    <h1 class="display-3 mb-5 text-center">Encuentra tu destino ideal</h1>
    <form id="search-form" class="search-form">
      <div class="row g-3 justify-content-center">
        <div class="col-md-3">
          <div class="form-floating">
            <select class="form-select" id="floatingSelectOrigen" name="origen" required>
              <option selected disabled>Elije...</option>
              <?php
              foreach ($listaDestinos as $destino) {
                echo '<option value="' . htmlspecialchars($destino['COD_DESTINO']) . '">' . htmlspecialchars($destino['NOM_DESTINO']) . '</option>';
              }
              ?>
            </select>
            <label for="floatingSelectOrigen">Origen</label>
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-floating">
            <select class="form-select" id="floatingSelectDestino" name="destino" required disabled>
              <option selected disabled>Elije...</option>
            </select>
            <label for="floatingSelectDestino">Destino</label>
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-floating">
            <input type="date" class="form-control" id="floatingInputFecha" name="fecha_salida" required>
            <label for="floatingInputFecha">Fecha de Salida</label>
          </div>
        </div>
        <div class="col-md-2 d-grid">
          <button type="submit" class="btn btn-primary" id="search-button" disabled>Buscar</button>
        </div>
      </div>
    </form>
    <div id="alerta">
      <!-- Aquí se mostrarán las alertas -->
    </div>
  </div>

  <!-- Contenedores de Viajes -->
  <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <div class="container">
          <div class="row">
            <div class="col-lg-4 mb-4">
              <div class="card h-100">
                <img src="images/ballenas-tumbes-turismo.jpg" class="card-img-top" alt="Lima - Tumbes">
                <div class="card-body d-flex flex-column">
                  <h5 class="card-title">Lima - Tumbes</h5>
                  <p class="card-text">Explora los mejores destinos costeros con nosotros.</p>
                  <a href="infoTumbes.php" class="btn btn-primary mt-auto"><i class="bi bi-eye"></i> Ver Detalles</a>
                </div>
              </div>
            </div>
            <div class="col-lg-4 mb-4">
              <div class="card h-100">
                <img src="images/pexels-sbenavides-17043614.jpg" class="card-img-top" alt="Lima - Arequipa">
                <div class="card-body d-flex flex-column">
                  <h5 class="card-title">Lima - Arequipa</h5>
                  <p class="card-text">Descripción corta del destino.</p>
                  <a href="infoArequipa.php" class="btn btn-primary mt-auto"><i class="bi bi-eye"></i> Ver Detalles</a>
                </div>
              </div>
            </div>
            <div class="col-lg-4 mb-4">
              <div class="card h-100">
                <img src="images/pexels-mauricio-espinoza-gavilano-582278929-17029844.jpg" class="card-img-top" alt="Arequipa - Lima">
                <div class="card-body d-flex flex-column">
                  <h5 class="card-title">Arequipa - Lima</h5>
                  <p class="card-text">Descripción corta del destino.</p>
                  <a href="infoLima.php" class="btn btn-primary mt-auto"><i class="bi bi-eye"></i> Ver Detalles</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <div class="container">
          <div class="row">
            <div class="col-lg-4 mb-4">
              <div class="card h-100">
                <img src="images/chimbote_catedral.png" class="card-img-top" alt="Destino 4">
                <div class="card-body d-flex flex-column">
                  <h5 class="card-title">Lima - Chimbote</h5>
                  <p class="card-text">Descripción corta del destino.</p>
                  <a href="infoChimbote.php" class="btn btn-primary mt-auto"><i class="bi bi-eye"></i> Ver Detalles</a>
                </div>
              </div>
            </div>
            <div class="col-lg-4 mb-4">
              <div class="card h-100">
                <img src="images/chiclayo_catedral.png" class="card-img-top" alt="Destino 5">
                <div class="card-body d-flex flex-column">
                  <h5 class="card-title">Lima - Chiclayo</h5>
                  <p class="card-text">Descripción corta del destino.</p>
                  <a href="infoChiclayo.php" class="btn btn-primary mt-auto"><i class="bi bi-eye"></i> Ver Detalles</a>
                </div>
              </div>
            </div>
            <div class="col-lg-4 mb-4">
              <div class="card h-100">
                <img src="images/ica_laguna.png" class="card-img-top" alt="Destino 6">
                <div class="card-body d-flex flex-column">
                  <h5 class="card-title">Ica - Lima</h5>
                  <p class="card-text">Descripción corta del destino.</p>
                  <a href="infoIca.php" class="btn btn-primary mt-auto"><i class="bi bi-eye"></i> Ver Detalles</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </a>
  </div>

  <!-- Pie de Página -->
  <footer id="contacto" class="bg-info text-white text-center py-4">
    <div class="container">
      <p class="mb-0"><i class="bi bi-telephone"></i> Teléfono: +51 992 568 742 | <i class="bi bi-geo-alt"></i> Dirección: Av. Javier Prado Este 123, San Isidro, Lima, Perú</p>
      <p class="mb-0"><i class="bi bi-envelope"></i> Email: info@bluebus.com</p>
    </div>
  </footer>

  <!-- Script de Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Script para formulario -->
  <script>
    $(document).ready(function() {
      var origenField = $('#floatingSelectOrigen');
      var destinoField = $('#floatingSelectDestino');
      var fechaField = $('#floatingInputFecha');
      var searchButton = $('#search-button');

      function toggleSearchButton() {
        if (origenField.val() && destinoField.val() && fechaField.val()) {
          searchButton.prop('disabled', false);
        } else {
          searchButton.prop('disabled', true);
        }
      }

      origenField.change(function() {
        var origen = $(this).val();
        destinoField.prop('disabled', false);
        destinoField.html('<option selected disabled>Elije...</option>');

        <?php
        $destinos = [];
        foreach ($listaDestinos as $destino) {
          $destinos[$destino['COD_DESTINO']] = $destino['NOM_DESTINO'];
        }
        ?>

        var destinos = <?php echo json_encode($destinos); ?>;

        for (var cod in destinos) {
          if (cod !== origen) {
            destinoField.append('<option value="' + cod + '">' + destinos[cod] + '</option>');
          }
        }

        toggleSearchButton();
      });

      destinoField.change(toggleSearchButton);
      fechaField.change(toggleSearchButton);

      $('#search-form').submit(function(event) {
        event.preventDefault();

        var origen = origenField.val();
        var destino = destinoField.val();
        var fecha = fechaField.val();

        $.ajax({
          url: 'buscar_viajes_ajax.php',
          method: 'GET',
          data: {
            origen: origen,
            destino: destino,
            fecha: fecha
          },
          success: function(response) {
            if (response.trim() === 'no-results') {
              $('#alerta').html('<div class="alert alert-warning" role="alert">No se encontraron viajes para los criterios seleccionados.</div>');
            } else if (response.trim() === 'invalid-date') {
              $('#alerta').html('<div class="alert alert-danger" role="alert">La fecha ingresada es inválida.</div>');
            } else if (response.trim() === 'missing-parameters') {
              $('#alerta').html('<div class="alert alert-danger" role="alert">Faltan parámetros para realizar la búsqueda.</div>');
            } else {
              window.location.href = 'viajes.php?origen=' + origen + '&destino=' + destino + '&fecha=' + fecha;
            }
          },
          error: function(jqXHR, textStatus, errorThrown) {
            console.error('Error: ' + textStatus + ' - ' + errorThrown);
          }
        });
      });
    });
  </script>
</body>

</html>