<?php

function factorial($number)
{
  $factorial = 1;
  for ($i = 2; $i <= $number; $i++) {
    $factorial *= $i;
  }
  return $factorial;
}

function fibonacci($numberElement)
{
  if ($numberElement == 1) {
    return 0;
  }

  if ($numberElement == 2) {
    return 1;
  }

  return fibonacci($numberElement - 1) + fibonacci($numberElement - 2);
}
