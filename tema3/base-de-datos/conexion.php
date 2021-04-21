<?php
$conexion = new mysqli('localhost', 'root', '', 'bd_store');

if ($conexion->connect_error) {
  die("Conexion fállida " . $conexion->connect_error);
}
