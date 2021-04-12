<?php

$string = $_GET['string'];

$len = strlen($string);

$square = "<pre>$string";

for ($i = 1; $i < $len - 1; $i++) {
  $square .= "</br>" . $string[$i];
  // espacios en blanco
  for ($j = 0; $j < $len - 2; $j++) {
    $square .= "&nbsp;";
  }
  $square .= $string[$len - ($i + 1)];
}
$square .= "</br>";
for ($i = $len - 1; $i >= 0; $i--) {
  $square .= "$string[$i]";
}

echo "$square</pre>";
