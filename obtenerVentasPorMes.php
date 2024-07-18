<?php
require_once 'Conexion.php';

class Ventas
{
    private $conexion;

    public function __construct()
    {
        $this->conexion = new Conexion();
    }

    public function obtenerVentasPorMes()
    {
        $cn = $this->conexion->conecta();
        $sql = "SELECT MONTH(FECHA_VENTA) AS Mes, SUM(MONTO_TOTAL) AS TotalVentas FROM VENTA WHERE ESTADO_PAGO = 'Pagado' GROUP BY MONTH(FECHA_VENTA)";
        $resultado = mysqli_query($cn, $sql);

        $ventasPorMes = array_fill(0, 12, 0);
        if ($resultado && mysqli_num_rows($resultado) > 0) {
            while ($fila = mysqli_fetch_assoc($resultado)) {
                $ventasPorMes[$fila['Mes'] - 1] = $fila['TotalVentas'];
            }
        }

        mysqli_free_result($resultado);
        $this->conexion->desconecta();

        header('Content-Type: application/json');
        echo json_encode($ventasPorMes);
    }
}

$ventas = new Ventas();
$ventas->obtenerVentasPorMes();
?>
