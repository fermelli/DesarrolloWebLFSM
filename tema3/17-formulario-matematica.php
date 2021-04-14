<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulario Matemática</title>
</head>

<body>
  <?php include('./18-matematica.php'); ?>
  <form action="./17-formulario-matematica.php" method="get">
    <label for="number">Introduzca un número</label><br>
    <input type="text" name="number" value="<?= isset($_GET['number']) ? $_GET['number'] : '' ?>">
    <br>

    <label for="factorial">
      <input type="radio" name="operation" id="factorial" value="factorial" <?= isset($_GET['operation']) ? ($_GET['operation'] == "factorial" ? "checked" : "") : "checked" ?>>
      Factorial
    </label>
    <label for="fibonacci">
      <input type="radio" name="operation" id="fibonacci" value="fibonacci" <?= isset($_GET['operation']) ? ($_GET['operation'] == "fibonacci" ? "checked" : "") : "" ?>>
      Fibonacci
    </label>
    <br>
    <input type="submit" value="Calcular">
  </form>
  <?php
  if (isset($_GET['number']) && $_GET['operation']) {

    $number = $_GET['number'];
    $operation = $_GET['operation'];

    if ($operation == "factorial") {
      $factorial = factorial($number);
      echo "El factorial de $number es: $factorial";
    }

    if ($operation == "fibonacci") {
      $fibonacci = fibonacci($number);
      echo "El $number ° elemento de la serie fibonacci es: $fibonacci";
    }
  }
  ?>
</body>

</html>