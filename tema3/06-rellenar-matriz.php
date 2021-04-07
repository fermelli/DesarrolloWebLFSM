<?php
$filas = $_GET['filas'];
$columnas = $_GET['columnas'];

for ($f = 0; $f < $filas; $f++) {
  for ($c = 0; $c < $columnas; $c++) {
    $matriz[$f][$c] = "$f$c";
  }
}

for ($f = 0; $f < $filas; $f++) {
  for ($c = 0; $c < $columnas; $c++) {
    echo $matriz[$f][$c] . " ";
  }
  echo "<br />";
}
