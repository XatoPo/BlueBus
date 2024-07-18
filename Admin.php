<?php

include_once './Conexion.php';

class Admin
{
    // VERIFICARADMIN
    function verificarCredencialesAdmin($correo, $contrasenia)
    {
        $cn = new Conexion();
        $sql = "CALL VerificarCredencialesAdmin('$correo', '$contrasenia')";
        $res = mysqli_query($cn->conecta(), $sql) or die(mysqli_error($cn->conecta()));
        $row = mysqli_fetch_assoc($res);
        $resultado = $row['resultado'];
        return $resultado === '1';
    }
    // USUARIOS ADMIN
    // REGISTRO DE USUARIO ADMIN
    function registrarUsuarioAdmin($nombres, $apellidos, $correo, $contraseña, $rol)
    {
        $cn = new Conexion();
        $sql = "CALL RegistrarUsuario('$nombres', '$apellidos', '$correo', '$contraseña', '$rol')";
        mysqli_query($cn->conecta(), $sql) or die(mysqli_error($cn->conecta()));
    }
    // ACTUALIZAR USUARIO ADMIN
    function actualizarUsuarioAdmin($codigo, $nombres, $apellidos, $correo, $contraseña, $rol)
    {
        $cn = new Conexion();
        $sql = "CALL ActualizarUsuarioAdmin('$codigo', '$nombres', '$apellidos', '$correo', '$contraseña', '$rol')";
        mysqli_query($cn->conecta(), $sql) or die(mysqli_error($cn->conecta()));
    }


    //  CRUD USUARIOS
    // LISTADO DE USUARIOS
    function listarUsuariosAdmin()
    {
        $cn = new Conexion();
        $sql = "CALL ListarUsuariosAdmin()";
        $res = mysqli_query($cn->conecta(), $sql) or die(mysqli_error($cn->conecta()));

        // Obtener todas las filas de resultado
        $usuarios = array();
        while ($fila = mysqli_fetch_assoc($res)) {
            $usuarios[] = $fila;
        }

        mysqli_close($cn->conecta());
        return $usuarios;
    }


    // DESTINO
    // LISTADO DE DESTINOS
    function listarDestinosAdmin()
    {
        $cn = new Conexion();
        $sql = "CALL ListarDestinosAdmin()";
        $res = mysqli_query($cn->conecta(), $sql) or die(mysqli_error($cn->conecta()));

        // Obtener todas las filas de resultado
        $destinos = array();
        while ($fila = mysqli_fetch_assoc($res)) {
            $destinos[] = $fila;
        }

        mysqli_close($cn->conecta());
        return $destinos;
    }

    // REGISTRAR DESTINO ADMIN
    function registrarDestinoAdmin($codigo, $nombre, $estado, $descripcion)
    {
        $cn = new Conexion();
        $sql = "CALL RegistrarDestinoAdmin('$codigo', '$nombre', '$estado', '$descripcion')";
        mysqli_query($cn->conecta(), $sql) or die(mysqli_error($cn->conecta()));
    }

    // ACTUALIZAR DESTINO ADMIN
    function actualizarDestinoAdmin($codigo, $nombre, $estado, $descripcion)
    {
        $cn = new Conexion();
        $sql = "CALL ActualizarDestinoAdmin('$codigo', '$nombre', '$estado', '$descripcion')";
        mysqli_query($cn->conecta(), $sql) or die(mysqli_error($cn->conecta()));
    }


    //VIAJES
    // LISTADO DE USUARIOS
    function listarViajesAdmin()
    {
        $cn = new Conexion();
        $sql = "CALL ListarViajesAdmin()";
        $res = mysqli_query($cn->conecta(), $sql) or die(mysqli_error($cn->conecta()));

        // Obtener todas las filas de resultado
        $viajes = array();
        while ($fila = mysqli_fetch_assoc($res)) {
            $viajes[] = $fila;
        }

        mysqli_close($cn->conecta());
        return $viajes;
    }

    //REGISTRAR VIAJES ADMIN
    function insertarViajeAdmin($codigo, $fecha_via, $hora_via, $duracion, $cod_bus, $cod_destino, $cod_origen, $precio_base)
    {
        $cn = new Conexion();
        $sql = "CALL InsertarViajeAdmin('$codigo', '$fecha_via', '$hora_via', '$duracion', '$cod_bus', '$cod_destino', '$cod_origen', '$precio_base')";
        mysqli_query($cn->conecta(), $sql) or die(mysqli_error($cn->conecta()));
    }
    //ACTUALIZAR VIAJES ADMIN
    function actualizarViajeAdmin($codigo, $fecha_via, $hora_via, $duracion, $cod_bus, $cod_destino, $cod_origen, $precio_base)
    {
        $cn = new Conexion();
        $sql = "CALL ActualizarViajeAdmin('$codigo', '$fecha_via', '$hora_via', '$duracion', '$cod_bus', '$cod_destino', '$cod_origen', '$precio_base')";
        mysqli_query($cn->conecta(), $sql) or die(mysqli_error($cn->conecta()));
    }
    //ELIMINAR VIAJES ADMIN
    function eliminarViajeAdmin($codigo)
    {
        $cn = new Conexion();
        $sql = "CALL EliminarViajeAdmin('$codigo')";
        mysqli_query($cn->conecta(), $sql) or die(mysqli_error($cn->conecta()));
    }


    // RESERVAS
    // LISTADO DE RESERVAS
    function listarReservasAdmin()
    {
        $cn = new Conexion();
        $sql = "CALL ListarReservasAdmin()";
        $res = mysqli_query($cn->conecta(), $sql) or die(mysqli_error($cn->conecta()));

        // Obtener todas las filas de resultado
        $reservas = array();
        while ($fila = mysqli_fetch_assoc($res)) {
            $reservas[] = $fila;
        }

        mysqli_close($cn->conecta());
        return $reservas;
    }

    function insertarReservaAdmin($cod_via, $cod_user, $id_asiento) {
        $cn = new Conexion();
        $sql = "CALL InsertarReservaAdmin('$cod_via', '$cod_user', $id_asiento)";
        mysqli_query($cn->conecta(), $sql) or die(mysqli_error($cn->conecta()));
        mysqli_close($cn->conecta());
    }

    function actualizarReservaAdmin($codigo_reserva, $nuevo_estado) {
        $cn = new Conexion();
        $sql = "CALL ActualizarEstadoReservaAdmin($codigo_reserva, '$nuevo_estado')";
        mysqli_query($cn->conecta(), $sql) or die(mysqli_error($cn->conecta()));
        mysqli_close($cn->conecta());
    }

    function eliminarReservaAdmin($codigo_reserva) {
        $cn = new Conexion();
        $sql = "CALL EliminarReservaAdmin($codigo_reserva)";
        mysqli_query($cn->conecta(), $sql) or die(mysqli_error($cn->conecta()));
        mysqli_close($cn->conecta());
    }
}