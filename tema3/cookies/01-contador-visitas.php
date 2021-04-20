<?php

if (isset($_COOKIE['contador'])) {
  $valor = $_COOKIE['contador'] + 1;
  echo "Es la visita $valor";
  setcookie("contador", $valor, time() + 3600);
} else {
  echo "Es la 1° visita";
  setcookie("contador", 1, time() + 3600);
}
