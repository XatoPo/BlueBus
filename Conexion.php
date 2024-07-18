<?php

class Conexion
{
    private $cn = null;

    function conecta()
    {
        // Verifica si la conexión ya está establecida
        if ($this->cn == null) {
            // Establece la conexión utilizando mysqli_connect
            // Cambia "localhost" por la dirección IP de la máquina si deseas una conexión remota
            $this->cn = mysqli_connect("localhost", "root", "", "bdviajesbus");
        }

        // Devuelve la conexión establecida
        return $this->cn;
    }

    function desconecta()
    {
        // Verifica si la conexión existe antes de cerrarla
        if ($this->cn != null) {
            // Cierra la conexión utilizando mysqli_close
            mysqli_close($this->cn);
        }
    }
}
