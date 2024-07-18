<?php
include_once './Admin.php';

$objAdmin = new Admin();
$destinos = $objAdmin->listarDestinosAdmin();

?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Administrador | Destinos</title>
  <link rel="shortcut icon" href="images/BlueBus_logo.png" type="image/x-icon">
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link href="css/crud_styles.css" rel="stylesheet" type="text/css" />
  <link href="css/navbar.css" rel="stylesheet" type="text/css" />
  <link href="css/destino-style.css" rel="stylesheet" type="text/css" />
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
  <!-- SweetAlert2 CSS and JS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.9/dist/sweetalert2.min.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.9/dist/sweetalert2.min.js"></script>
</head>

<body>
  <!-- Navbar -->
  <?php require_once "components/navbar.php"; ?>

  <!-- Header -->
  <header class="container mt-5 mb-4 text-center">
    <h1 class="display-4">Mantenimiento de Destinos</h1>
  </header>

  <!-- Main content -->
  <main class="container mb-5">
    <div class="d-flex justify-content-end">
      <button type="button" class="btn btn-primary custom-btn mb-3" data-bs-toggle="modal" data-bs-target="#agregarModal">Agregar</button>
      <div class="modal fade" id="agregarModal" tabindex="-1" aria-labelledby="agregarModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
          <form id="agregar_form" class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="agregarModalLabel">Agregar Destino</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="grid grid-cols-3 gap-3">
                <div class="form-floating">
                  <input type="text" required class="form-control" name="cod_destino" id="cod_destino" placeholder="">
                  <label for="cod_destino">COD_DESTINO</label>
                </div>
                <div class="form-floating">
                  <input type="text" required class="form-control" name="nom_destino" id="nom_destino" placeholder="">
                  <label for="nom_destino">NOM_DESTINO</label>
                </div>
                <div class="form-floating">
                  <select required class="form-select" name="estado" id="estado" aria-label="ESTADO">
                    <option value="activo">Activo</option>
                    <option value="inactivo">Inactivo</option>
                  </select>
                  <label for="estado">ESTADO</label>
                </div>
                <div class="form-floating col-span-3">
                  <textarea required class="form-control" placeholder="" name="descripcion" id="descripcion" style="height: 100px"></textarea>
                  <label for="descripcion">DESCRIPCIÓN</label>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary custom-btn">Agregar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="table-responsive">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>COD_DESTINO</th>
            <th>NOM_DESTINO</th>
            <th>ESTADO</th>
            <th>DESCRIPCIÓN</th>
            <th>HERRAMIENTAS CRUD</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($destinos as $destino) : ?>
            <tr>
              <td><?= $destino['COD_DESTINO'] ?></td>
              <td><?= $destino['NOM_DESTINO'] ?></td>
              <td><?= $destino['ESTADO'] ?></td>
              <td><?= $destino['DESCRIPCION'] ?></td>
              <td>
                <a href="#" class="btn btn-sm btn-warning btn-crud" title="Editar"><i class="bi bi-pencil"></i></a>
                <a href="#" class="btn btn-sm btn-danger btn-crud" title="Eliminar"><i class="bi bi-trash"></i></a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </main>

  <!-- Footer -->
  <footer id="contacto" class="text-white text-center py-4 mt-auto">
    <div class="container">
      <p class="mb-0"><i class="bi bi-telephone"></i> Teléfono: +51 992 568 742 | <i class="bi bi-geo-alt"></i> Dirección: Av. Javier Prado Este 123, San Isidro, Lima, Perú</p>
      <p class="mb-0"><i class="bi bi-envelope"></i> Email: info@bluebus.com</p>
    </div>
  </footer>

  <!-- Scripts de JavaScript y Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    $("#agregar_form").on("submit", function(e) {
      e.preventDefault();

      $.ajax({
        url: 'agregarDestino.php',
        type: 'POST',
        data: {
          cod_destino: $("#cod_destino").val(),
          nom_destino: $("#nom_destino").val(),
          estado: $("#estado").val(),
          descripcion: $("#descripcion").val(),
        }
      }).done(function(resp) {
        $("#agregarModal").hide()
        Swal.fire({
          icon: 'success',
          title: 'Destino agregado',
          text: 'Agregado con éxito',
          showConfirmButton: true,
          confirmButtonText: 'Aceptar'
        }).then((result) => {
          if (result.isConfirmed) {
            window.location.href = 'crudDestino.php';
          }
        });
      }).fail(function(jqXHR, textStatus, errorThrown) {
        Swal.fire({
          icon: 'error',
          title: 'Error en la acción',
          text: 'Error en la acción: ' + errorThrown,
          showConfirmButton: true,
          confirmButtonText: 'Aceptar'
        }).then((result) => {
          if (result.isConfirmed) {
            window.location.href = 'crudDestino.php';
          }
        });
      });
    })
  </script>
</body>

</html>