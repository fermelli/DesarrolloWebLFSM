 <?php
  $num = 5;
  $factorial = 1;
  for ($i = 1; $i <= $num; $i++) {
    $factorial *= $i;
  }
  echo "El factorial de $num es: $factorial";
