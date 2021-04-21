<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Menú Operaciones</title>
</head>

<body>
  <?php
  if (isset($_GET['number1']) && isset($_GET['number2'])) {
    session_start();
    $_SESSION['number1'] = $_GET['number1'];
    $_SESSION['number2'] = $_GET['number2'];
  }
  ?>
  <ul>
    <li><a href="./04-resultado-operaciones.php?operacion=suma">Suma</a></li>
    <li><a href="./04-resultado-operaciones.php?operacion=resta">Resta</a></li>
    <li><a href="./04-resultado-operaciones.php?operacion=multiplicacion">Multiplicación</a></li>
    <li><a href="./04-resultado-operaciones.php?operacion=division">División</a></li>
  </ul>
</body>

</html>