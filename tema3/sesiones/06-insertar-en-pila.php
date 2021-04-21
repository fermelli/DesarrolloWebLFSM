<?php

include('./../objetos/04-pila.php');
session_start();

if (isset($_GET['element'])) :
  $element = $_GET['element'];
  if (!isset($_SESSION['pila'])) :
    $pila = new Pile(10);
    $pila->push($element);
  else :
    $_SESSION['pila']->push($element);
  endif;
  echo "Elemento $element insertado con éxito";
?>
  <meta http-equiv="refresh" content="1;URL=./04-menu-pila.html">
<?php endif; ?>