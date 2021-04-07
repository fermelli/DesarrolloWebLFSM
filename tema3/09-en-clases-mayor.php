<?php
$numberA = $_GET['numberA'];
$numberB = $_GET['numberB'];
$numberC = $_GET['numberC'];

if ($numberA > $numberB) {
  if ($numberA > $numberC) {
    echo "El número mayor es: $numberA";
  } else {
    echo "El número mayor es: $numberC";
  }
} else {
  if ($numberB > $numberC) {
    echo "El número mayor es: $numberB";
  } else {
    echo "El número mayor es: $numberC";
  }
}
