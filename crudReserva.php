<?php
include_once './Admin.php';

$objAdmin = new Admin();
$reservas = $objAdmin->listarReservasAdmin();

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador | Reservas</title>
    <link rel="shortcut icon" href="images/BlueBus_logo.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="css/crud_styles.css" rel="stylesheet" type="text/css" />
    <link href="css/reserva-style.css" rel="stylesheet" type="text/css" />
    <link href="css/navbar.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
</head>

<body>
    <!-- Navbar -->
    <?php require_once "components/navbar.php"; ?>

    <!-- Header -->
    <header class="container mt-5 mb-4 text-center">
        <h1 class="display-4">Mantenimiento de Reservas</h1>
    </header>

    <!-- Main content -->
    <!-- Botón de Añadir -->
    <div class="d-flex justify-content-end">
        <button type="button" class="btn btn-primary custom-btn mb-3" data-bs-toggle="modal" data-bs-target="#agregarModal">Añadir</button>
    </div>

    <!-- Modal de Editar Estado -->
    <div class="modal fade" id="editarEstadoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar Estado de Reserva</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="editar_estado_form">
                    <div class="modal-body">
                        <input type="hidden" id="codigo_reserva_edit" name="codigo_reserva">
                        <div class="mb-3">
                            <label for="estado_reserva" class="form-label">Estado</label>
                            <select class="form-select" id="estado_reserva" name="estado_reserva">
                                <option value="Reservado">Reservado</option>
                                <option value="Pagado">Pagado</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Modal de Agregar -->
    <div class="modal fade" id="agregarModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar Reserva</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="agregar_form" action="agregar_reserva.php" method="POST">
                    <div class="modal-body">
                        <!-- Aquí van los campos del formulario para agregar una nueva reserva -->
                        <div class="mb-3">
                            <label for="cod_via" class="form-label">Código de Viaje</label>
                            <input type="text" class="form-control" id="cod_via" name="cod_via" required>
                        </div>
                        <div class="mb-3">
                            <label for="cod_user" class="form-label">Código de Usuario</label>
                            <input type="text" class="form-control" id="cod_user" name="cod_user" required>
                        </div>
                        <div class="mb-3">
                            <label for="id_asiento" class="form-label">ID de Asiento</label>
                            <input type="text" class="form-control" id="id_asiento" name="id_asiento" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Guardar Reserva</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Tabla de Reservas -->
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>COD_RESERVA</th>
                    <th>COD_VIA</th>
                    <th>COD_USER</th>
                    <th>ID_ASIENTO</th>
                    <th>ESTADO</th>
                    <th>HERRAMIENTAS CRUD</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($reservas as $reserva) : ?>
                    <tr>
                        <td><?= $reserva['COD_RESERVA'] ?></td>
                        <td><?= $reserva['COD_VIA'] ?></td>
                        <td><?= $reserva['COD_USER'] ?></td>
                        <td><?= $reserva['ID_ASIENTO'] ?></td>
                        <td><?= $reserva['ESTADO'] ?></td>
                        <td>
                            <a href="#" class="btn btn-sm btn-warning btn-crud" title="Editar Estado" onclick="editarEstado(<?= $reserva['COD_RESERVA'] ?>)"><i class="bi bi-pencil"></i></a>
                            <a href="#" class="btn btn-sm btn-danger btn-crud" title="Eliminar" onclick="eliminarReserva(<?= $reserva['COD_RESERVA'] ?>)"><i class="bi bi-trash"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Scripts de JavaScript y Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- Librería SweetAlert2 para alertas bonitas -->

    <script>
        $(document).ready(function() {
            // Envío del formulario para agregar reserva
            $("#agregar_form").on("submit", function(e) {
                e.preventDefault();

                $.ajax({
                    url: 'agregar_reserva.php',
                    type: 'POST',
                    data: {
                        cod_via: $("#cod_via").val(),
                        cod_user: $("#cod_user").val(),
                        id_asiento: $("#id_asiento").val()
                    },
                    success: function(response) {
                        $("#agregarModal").modal('hide');
                        Swal.fire({
                            icon: 'success',
                            title: 'Reserva agregada',
                            text: 'La reserva se agregó correctamente.',
                            showConfirmButton: true
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = 'admin_reservas.php';
                            }
                        });
                    },
                    error: function(xhr, textStatus, errorThrown) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'No se pudo agregar la reserva. Error: ' + errorThrown,
                            showConfirmButton: true
                        });
                    }
                });
            });

            // Envío del formulario para editar estado de reserva
            $("#editar_estado_form").on("submit", function(e) {
                e.preventDefault();

                var codigo_reserva = $("#codigo_reserva_edit").val();
                var estado_reserva = $("#estado_reserva").val();

                $.ajax({
                    url: 'editar_estado_reserva.php',
                    type: 'POST',
                    data: {
                        codigo_reserva: codigo_reserva,
                        estado_reserva: estado_reserva
                    },
                    success: function(response) {
                        $("#editarEstadoModal").modal('hide');
                        Swal.fire({
                            icon: 'success',
                            title: 'Estado actualizado',
                            text: 'El estado de la reserva se actualizó correctamente.',
                            showConfirmButton: true
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.reload(); // Recargar la página o actualizar la lista de reservas
                            }
                        });
                    },
                    error: function(xhr, textStatus, errorThrown) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'No se pudo actualizar el estado. Error: ' + errorThrown,
                            showConfirmButton: true
                        });
                    }
                });
            });
        });

        // Función para eliminar reserva
        function eliminarReserva(codigo_reserva) {
            if (confirm("¿Estás seguro de eliminar esta reserva?")) {
                $.ajax({
                    url: `eliminar_reserva.php?codigo_reserva=${codigo_reserva}`,
                    type: 'GET',
                    success: function(response) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Reserva eliminada',
                            text: 'La reserva se eliminó correctamente.',
                            showConfirmButton: true
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.reload(); // Recargar la página o actualizar la lista de reservas
                            }
                        });
                    },
                    error: function(xhr, textStatus, errorThrown) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'No se pudo eliminar la reserva. Error: ' + errorThrown,
                            showConfirmButton: true
                        });
                    }
                });
            }
        }

        // Función para editar estado de reserva
        function editarEstado(codigo_reserva) {
            if (confirm("¿Estás seguro de cambiar el estado de esta reserva?")) {
                // Aquí podrías cargar el estado actual de la reserva y mostrarlo en el modal
                // Por simplicidad, aquí simplemente abrimos el modal para editar
                $("#editarEstadoModal").modal('show');
                $("#codigo_reserva_edit").val(codigo_reserva);
            }
        }
    </script>

</body>

</html>