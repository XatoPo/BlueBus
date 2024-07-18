<?php
include_once './Admin.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cod_via = $_POST['cod_via'];
    $cod_user = $_POST['cod_user'];
    $id_asiento = $_POST['id_asiento'];

    // Instanciar la clase Admin y llamar al método para insertar reserva
    $objAdmin = new Admin();
    $objAdmin->insertarReservaAdmin($cod_via, $cod_user, $id_asiento);

    // Respondemos con un mensaje de éxito
    echo "Reserva agregada correctamente"; // Asegúrate de que este mensaje esté devolviéndose correctamente
}
?>

<!-- Campo de selección de Código de Viaje -->
<div class="mb-3">
    <label for="cod_via" class="form-label">Código de Viaje</label>
    <select class="form-select" id="cod_via" name="cod_via" required>
        <option value="">Selecciona un código de viaje</option>
        <?php foreach ($codigos_viaje as $codigo) : ?>
            <option value="<?= $codigo['COD_VIA'] ?>"><?= $codigo['COD_VIA'] ?></option>
        <?php endforeach; ?>
    </select>
</div>

<!-- Campo de selección de Código de Usuario -->
<div class="mb-3">
    <label for="cod_user" class="form-label">Código de Usuario</label>
    <select class="form-select" id="cod_user" name="cod_user" required>
        <option value="">Selecciona un código de usuario</option>
        <?php foreach ($codigos_usuario as $codigo) : ?>
            <option value="<?= $codigo['COD_USER'] ?>"><?= $codigo['COD_USER'] ?></option>
        <?php endforeach; ?>
    </select>
</div>
