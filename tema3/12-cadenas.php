<?php
$string = $_GET['string'];

echo "$string</br>";

echo "Longitud: " . strlen($string) . "</br>";

$words = explode(" ", $string);

foreach ($words as $word) {
  echo "$word</br>";
}

$separate = implode("-", $words);
echo "$separate</br>";

$result = sprintf("8 x 5 = %d", 8 * 5);
echo "$result</br>";

echo substr($string, 6, 3) . "</br>";

if (chop("Cadena\n\n ") == "Cadena") {
  echo "Iguales</br>";
}

echo strpos($string, "esta") . "</br>";

echo str_replace("a", "u", $string) . "</br>";
