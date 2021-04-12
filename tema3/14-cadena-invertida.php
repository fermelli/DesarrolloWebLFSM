<?php

$string = $_GET['string'];

$inverted = "";

for ($i = strlen($string) - 1; $i >= 0; $i--) {
  $inverted .= "$string[$i]";
}

echo $inverted;
