<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Resultado Operaciones</title>
</head>

<body>
  <?php

  if (isset($_COOKIE["number1"]) && isset($_COOKIE["number2"])) {
    $number1 = $_COOKIE["number1"];
    $number2 = $_COOKIE["number2"];

    if (isset($_GET["operacion"])) {
      $operacion = $_GET["operacion"];
      switch ($operacion) {
        case 'suma':
          $resultado = $number1 + $number2;
          break;
        case 'resta':
          $resultado = $number1 - $number2;
          break;
        case 'multiplicacion':
          $resultado = $number1 * $number2;
          break;
        case 'division':
          if ($number2 == 0) {
            $resultado = "Error: división entre cero";
          } else {
            $resultado = $number1 / $number2;
          }
          break;
        default:
          $resultado = "Operación no válida";
      }
      echo "<h1>Resultado: $resultado</h1>";
    }
  }
  ?>
  <meta http-equiv="refresh" content="3;URL=./03-menu-operaciones.php?number1=<?= "$number1&number2=$number2"  ?>">

</body>

</html>