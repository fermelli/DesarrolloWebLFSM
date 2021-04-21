<?php
include('./../objetos/04-pila.php');
session_start();

if (isset($_SESSION['pila'])) {
  $pila = $_SESSION['pila'];
  echo "Elemento " . $pila->pop() . " eliminado";
}

?>

<meta http-equiv="refresh" content="1;URL=./04-menu-pila.html">