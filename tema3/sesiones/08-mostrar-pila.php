<?php

include('./../objetos/04-pila.php');
session_start();

if (isset($_SESSION['pila'])) {
  $pila = $_SESSION['pila'];
  $pila->show();
}

?>

<a href="./04-menu-pila.html">Menú</a>