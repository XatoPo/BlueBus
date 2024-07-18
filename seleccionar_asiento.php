<?php
require_once './Conexion.php';

if (isset($_GET['COD_VIA'])) {
  $cod_via = $_GET['COD_VIA'];
}

$cn = new Conexion();

// Obtener los datos del viaje
$sql = "SELECT b.NUM_ASIENTOS AS Asientos, v.HORA_VIA, v.FECHA_VIA, v.DURACION, d.NOM_DESTINO AS Destino, dd.NOM_DESTINO AS Origen, v.PRECIO_BASE AS PRECIO FROM viaje AS v JOIN destino AS d ON d.COD_DESTINO = v.DESTINO JOIN destino AS dd ON dd.COD_DESTINO = v.ORIGEN JOIN bus AS b ON b.PLACA = v.BUS WHERE COD_VIA = '$cod_via'";
$res = mysqli_query($cn->conecta(), $sql) or die(mysqli_error($cn->conecta()));
$row = mysqli_fetch_assoc($res);

function fechaCastellano($fecha)
{
  $fecha = substr($fecha, 0, 10);
  $numeroDia = date('d', strtotime($fecha));
  $dia = date('l', strtotime($fecha));
  $mes = date('F', strtotime($fecha));
  $anio = date('Y', strtotime($fecha));
  $dias_ES = array("Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo");
  $dias_EN = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
  $nombredia = str_replace($dias_EN, $dias_ES, $dia);
  $meses_ES = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
  $meses_EN = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
  $nombreMes = str_replace($meses_EN, $meses_ES, $mes);
  return $nombredia . " " . $numeroDia . " de " . $nombreMes . " de " . $anio;
}

// Obtener los asientos vendidos
$sql_asientos_vendidos = "CALL MostrarAsientosOcupados('$cod_via')";
$res_asientos_vendidos = mysqli_query($cn->conecta(), $sql_asientos_vendidos) or die(mysqli_error($cn->conecta()));
$asientos_vendidos = [];
while ($row_asiento = mysqli_fetch_assoc($res_asientos_vendidos)) {
  $asientos_vendidos[] = $row_asiento['NUM_ASIENTO'];
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Asientos | <?= $row["Origen"] ?> - <?= $row["Destino"] ?> | BlueBus</title>
  <link rel="shortcut icon" href="images/BlueBus_logo.png" type="image/x-icon">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="./css/global.css">
  <link rel="stylesheet" href="./css/seleccionar_asiento.css">
  <link href="css/navbar.css" rel="stylesheet" type="text/css" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
</head>

<body>
  <!-- Navbar -->
  <?php require_once "components/navbar.php"; ?>
  <main class="py-4 d-flex flex-column align-items-start mx-auto" style="max-width: 64rem;">
    <div class="w-100 text-center mb-4">
      <p class="fs-2 fw-bolder">Elección de asientos</p>
      <div class="d-flex flex-column justify-content-center align-items-center fs-5">
        <p class="fs-4 fw-semibold"><?= $row["Origen"] ?> - <?= $row["Destino"] ?></p>
        <p><?= date_format(date_create($row["FECHA_VIA"]), "d/m/Y") ?> - <?= $row["HORA_VIA"] ?></p>
      </div>
    </div>
    <div class="d-flex w-100" style="gap: 2rem;">
      <div class="card w-100">
        <div class="card-header px-4 py-3">
          <p class="mb-0 fw-semibold">Elige tus asientos</p>
        </div>
        <div class="card-body py-4 d-flex flex-column justify-content-center align-items-center" style="gap:2rem">
          <div class="border border-primary p-3 rounded-4 text-center">
            <p class="fs-5 fw-semibold mb-4">Primer piso</p>
            <ul id="cardAsientos" class="d-flex flex-wrap asientos-container m-0">
              <?php
              $nrAsientos = $row['Asientos'];
              $i = 1;
              $j = 2;
              while ($i <= $nrAsientos) {
                if ($j == 4) { ?>
                  <li class="asiento-item"> </li>
                <?php
                  $j = 0;
                } else {
                  $disabled = in_array($i, $asientos_vendidos) ? 'disabled' : '';
                ?>
                  <li id="asiento" class="asiento-item">
                    <input onclick="handleClick('<?php echo $row['PRECIO'] ?>', <?php echo $i; ?>)" type="checkbox" class="btn-check" id="asiento-<?php echo $i; ?>" autocomplete="off" <?php echo $disabled; ?>>
                    <label class="btn btn-outline-primary asiento-btn" for="asiento-<?php echo $i; ?>"><?php echo $i; ?></label><br>
                  </li>
              <?php
                  $i = $i + 1;
                  $j = $j + 1;
                }
              } ?>

            </ul>
          </div>

        </div>
      </div>
      <div class="d-flex flex-column" style="flex: none; width: 400px; gap: 2rem;">
        <div class="card">
          <div class="card-header px-4 py-3">
            <p class="mb-0 fw-semibold">Embarque y Desembarque</p>
          </div>
          <div class="card-body px-4 py-4">
            <div class="mb-2 d-flex justify-content-end">
              <span class="badge text-bg-light border">Salida: <?php echo fechaCastellano(date_format(date_create($row["FECHA_VIA"]), "d-m-Y")); ?></span>
            </div>
            <div id="content">
              <ul class="timeline" style="padding-left: 1rem;">
                <li class="event" data-date="<?php echo date_format(date_create($row["HORA_VIA"]), "g:i A"); ?>">
                  <h3><?= $row["Origen"] ?></h3>
                </li>
                <?php
                $time = strtotime(date_format(date_create($row["HORA_VIA"]), "H:i"));
                $endTime = date("H:i A", strtotime('+' . ((int)explode("h", $row["DURACION"])[0]) * 60 + (int)explode("min", explode("h ", $row["DURACION"])[1])[0] . ' minutes', $time));
                ?>
                <li class="event" data-date="<?php echo $endTime ?>">
                  <h3><?= $row["Destino"] ?></h3>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <form id="datos-compra" action="checkout_medium.php" method="post">
          <div class="card">
            <div class="card-header px-4 py-3">
              <p class="mb-0 fw-semibold">Asientos elegidos</p>
            </div>
            <div class="card-body px-4 py-4">
              <ul id="asientosElegidos" class="list-group mb-3">

              </ul>
              <ul class="list-group">
                <li id="totalAsientos" class="list-group-item d-flex justify-content-between fw-medium">
                  <span>Total</span>
                  <span id="precioTotal">S/. 0.00</span>
                </li>
              </ul>
            </div>
            <input type="hidden" name="total_price" id="total_price_input">
            <input type="hidden" name="selected_seats" id="selected_seats_input">
            <input type="hidden" name="COD_VIA" value="<?php echo $cod_via; ?>">
          </div>
        </form>
        <div>
          <button form="datos-compra" type="checkout_medium" class="btn btn-primary w-100" style="background: #052659 !important; border-color: #052659 !important;">Confirmar pasajeros</button>
        </div>
      </div>
    </div>
  </main>


  <!-- Pie de Página -->
  <footer id="contacto" class="bg-info text-white text-center py-4">
    <div class="container">
      <p class="mb-0"><i class="bi bi-telephone"></i> Teléfono: +51 992 568 742 | <i class="bi bi-geo-alt"></i> Dirección: Av. Javier Prado Este 123, San Isidro, Lima, Perú</p>
      <p class="mb-0"><i class="bi bi-envelope"></i> Email: info@bluebus.com</p>
    </div>
  </footer>


  <!-- Script de Bootstrap -->

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    document.getElementById('datos-compra').addEventListener('submit', function() {
      var precioTotalSpan = document.getElementById('precioTotal');
      var precioTotal = precioTotalSpan.innerText.trim();

      document.getElementById('total_price_input').value = precioTotal;

      var asientosSeleccionados = [];
      var asientosElegidosList = document.getElementById('asientosElegidos').querySelectorAll('li');
      asientosElegidosList.forEach(function(asiento) {
        var numeroAsiento = asiento.querySelector('span:first-child').innerText.trim();
        asientosSeleccionados.push(numeroAsiento);
      });

      document.getElementById('selected_seats_input').value = JSON.stringify(asientosSeleccionados);
    });

    function handleClick(precio_const, asiento) {
      if (document.getElementById("asiento-" + asiento).checked) {
        addTask(precio_const, asiento);
      } else {
        deleteTask(precio_const, asiento);
      }
    }

    let asientosElegidos = document.getElementById('asientosElegidos');
    let totalAsientos = document.getElementById('totalAsientos');

    let addTask = (precio_const, asiento) => {
      asientosElegidos.innerHTML += `<li id="asiento-${asiento}-elegido" class="list-group-item d-flex justify-content-between">
        <span>${asiento}</span>
        <span>S/. ${precio_const}</span>
    </li>`;
      updateTask(precio_const);
    };

    let deleteTask = (precio_const, id) => {
      let taskToDelete = document.getElementById("asiento-" + id + "-elegido");
      asientosElegidos.removeChild(taskToDelete);
      updateTask(precio_const);
    };

    let updateTask = (precio_base = 1) => {
      let elementos = asientosElegidos.querySelectorAll('li').length;
      total = elementos * precio_base;
      totalAsientos.innerHTML = `<span>Total</span> <span id="precioTotal">S/. ${total.toFixed(2)}</span>`;
    };
  </script>
</body>

</html>