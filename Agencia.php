<?php

include_once './Conexion.php';

class Agencia
{
    // LOGIN DE USUARIO
    function validarLogin($usuario_correo, $contraseña)
    {
        $cn = new Conexion();
        $sql = "SELECT VerificarCredenciales('$usuario_correo', '$contraseña') AS resultado";
        $res = mysqli_query($cn->conecta(), $sql) or die(mysqli_error($cn->conecta()));
        $row = mysqli_fetch_assoc($res);
        $resultado = $row['resultado'];
        return $resultado === '1';
    }

    // REGISTRO DE USUARIO
    function registrarUsuario($nombres, $apellidos, $correo, $contraseña, $rol)
    {
        $cn = new Conexion();
        $sql = "CALL RegistrarUsuario('$nombres', '$apellidos', '$correo', '$contraseña', '$rol')";
        mysqli_query($cn->conecta(), $sql) or die(mysqli_error($cn->conecta()));
    }

    // OBTENER DATOS DE USUARIO POR CORREO
    function obtenerUsuarioPorCorreo($usuario_correo)
    {
        $cn = new Conexion();
        $sql = "CALL ObtenerUsuarioPorCorreo('$usuario_correo')";
        $res = mysqli_query($cn->conecta(), $sql) or die(mysqli_error($cn->conecta()));
        $row = mysqli_fetch_assoc($res);
        $codigo_usuario = $row['COD_USER'];
        return $codigo_usuario;
    }

    // COMPRA DE BOLETOS
    function comprarBoleto($usuario_cod, $viaje_cod, $asiento_id)
    {
        $cn = new Conexion();
        $sql = "CALL ComprarBoleto('$usuario_cod', '$viaje_cod', $asiento_id)";
        $res = mysqli_query($cn->conecta(), $sql) or die(mysqli_error($cn->conecta()));
        $row = mysqli_fetch_assoc($res);
        $codigo_venta = $row['nuevo_codigo_venta'];
        return $codigo_venta;
    }

    // ASIENTOS OCUPADOS POR VIAJE
    function mostrarAsientosOcupados($viaje_cod)
    {
        $cn = new Conexion();
        $sql = "CALL MostrarAsientosOcupados('$viaje_cod')";
        $res = mysqli_query($cn->conecta(), $sql) or die(mysqli_error($cn->conecta()));
        $vec = array();
        while ($f = mysqli_fetch_array($res)) {
            $vec[] = $f;
        }
        return $vec;
    }

    // ASIENTOS DISPONIBLES POR VIAJE
    function mostrarAsientosDisponibles($viaje_cod)
    {
        $cn = new Conexion();
        $sql = "CALL MostrarAsientosDisponibles('$viaje_cod')";
        $res = mysqli_query($cn->conecta(), $sql) or die(mysqli_error($cn->conecta()));
        $vec = array();
        while ($f = mysqli_fetch_array($res)) {
            $vec[] = $f;
        }
        return $vec;
    }

    // ACTUALIZAR DATOS DE USUARIO
    function actualizarUsuario($codigo, $nombres, $apellidos, $correo, $contraseña)
    {
        $cn = new Conexion();
        $sql = "CALL ActualizarUsuario('$codigo', '$nombres', '$apellidos', '$correo', '$contraseña')";
        mysqli_query($cn->conecta(), $sql) or die(mysqli_error($cn->conecta()));
    }

    // CANCELAR RESERVA O COMPRA
    function cancelarReserva($reserva_id)
    {
        $cn = new Conexion();
        $sql = "CALL CancelarReserva($reserva_id)";
        mysqli_query($cn->conecta(), $sql) or die(mysqli_error($cn->conecta()));
    }

    // REALIZAR COMPRA
    function comprar($cod_user, $cod_via, $total_price, $selected_seats_json)
    {
        $cn = new Conexion();
        $conn = $cn->conecta();
        // Preparar la consulta para evitar problemas de inyección SQL
        $sql = "CALL registrarCompra(?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ssds', $cod_user, $cod_via, $total_price, $selected_seats_json);
        if (!$stmt->execute()) {
            die("Error en la ejecución del procedimiento: " . $stmt->error);
        }
        $stmt->close();
        $conn->close();
    }

    // FUNCIÓN PARA OBTENER VENTAS REALIZADAS CON ASIENTOS COMPRADOS
    function obtenerVentas()
    {
        $cn = new Conexion();
        $sql = "
        SELECT 
            v.COD_VENTA, 
            CONCAT(u.NOMBRES, ' ', u.APELLIDOS) AS COMPRADOR, 
            v.FECHA_VENTA, 
            v.MONTO_TOTAL, 
            v.ESTADO_PAGO, 
            GROUP_CONCAT(a.NUM_ASIENTO ORDER BY a.NUM_ASIENTO ASC) AS ASIENTOS_COMPRADOS
        FROM 
            VENTA v 
        JOIN 
            RESERVA r ON v.COD_RESERVA = r.COD_RESERVA 
        JOIN 
            USUARIO u ON r.COD_USER = u.COD_USER 
        JOIN 
            ASIENTO a ON r.ID_ASIENTO = a.ID
        GROUP BY 
            v.COD_VENTA, u.NOMBRES, u.APELLIDOS, v.FECHA_VENTA, v.MONTO_TOTAL, v.ESTADO_PAGO";
        $res = mysqli_query($cn->conecta(), $sql) or die(mysqli_error($cn->conecta()));
        $vec = array();
        while ($f = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
            $vec[] = $f;
        }
        return $vec;
    }

    // BÚSQUEDA DE VIAJES POR ORIGEN, DESTINO Y FECHA
    function buscarViajes($origen_cod, $destino_cod, $fecha_via)
    {
        $cn = new Conexion();
        $sql = "SELECT * FROM VIAJE WHERE ORIGEN = '$origen_cod' AND DESTINO = '$destino_cod' AND FECHA_VIA = '$fecha_via'";
        $res = mysqli_query($cn->conecta(), $sql) or die(mysqli_error($cn->conecta()));
        $vec = array();
        while ($f = mysqli_fetch_array($res)) {
            $vec[] = $f;
        }
        mysqli_close($cn->conecta());
        return $vec;
    }

    // NOMBRE DESTINO
    function nombreDestino($codDestino)
    {
        $cn = new Conexion();
        $sql = "SELECT NOM_DESTINO FROM DESTINO WHERE COD_DESTINO = '$codDestino'";
        $res = mysqli_query($cn->conecta(), $sql) or die(mysqli_error($cn->conecta()));
        $row = mysqli_fetch_assoc($res); // Obtener la fila de resultados como un array asociativo
        mysqli_close($cn->conecta());

        // Verificar si se encontró un resultado
        if ($row) {
            // Devolver el nombre del destino encontrado
            return $row['NOM_DESTINO'];
        } else {
            // En caso de no encontrar el destino, devolver un valor por defecto o lanzar una excepción según tu lógica de aplicación
            return "Destino no encontrado";
        }
    }

    // BUSCAR TODOS LOS DATOS DE UN USUARIO POR CORREO
    public function BuscarUsuarioPorCorreo($usuario_correo)
    {
        $cn = new Conexion();
        $sql = "CALL BuscarUsuarioPorCorreo('$usuario_correo')";
        $res = mysqli_query($cn->conecta(), $sql) or die(mysqli_error($cn->conecta()));

        // Obtener una sola fila de resultado
        $usuario = mysqli_fetch_assoc($res);

        mysqli_close($cn->conecta());
        return $usuario;
    }

    // LISTADO DE DESTINOS
    public function ListarDestinos()
    {
        $cn = new Conexion();
        $sql = "CALL ListarDestinos()";
        $res = mysqli_query($cn->conecta(), $sql) or die(mysqli_error($cn->conecta()));

        // Obtener todas las filas de resultado
        $destinos = array();
        while ($fila = mysqli_fetch_assoc($res)) {
            $destinos[] = $fila;
        }

        mysqli_close($cn->conecta());
        return $destinos;
    }
}
