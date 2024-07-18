<?php
include_once './Admin.php';

$objAdmin = new Admin();

$cod_destino = $_POST["cod_destino"];
$nom_destino = $_POST["nom_destino"];
$estado = $_POST["estado"];
$descripcion = $_POST["descripcion"];

$objAdmin->registrarDestinoAdmin($cod_destino, $nom_destino, $estado, $descripcion);
