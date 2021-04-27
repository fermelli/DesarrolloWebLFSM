<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./../css/estilos.css">
  <title>Remover Libro</title>
</head>

<body>
  <?php

  if (isset($_GET['rowNumber'])) {

    $rowNumber = $_GET['rowNumber'];

    include('./Estante.php');

    session_start();

    if (isset($_SESSION['shelf'])) {

      $shelf = $_SESSION['shelf'];

      $removedBook = $shelf->removeBook($rowNumber);
    }
  }

  ?>
  <h2 class="subtitle">Libro <?= $removedBook ?> removido existosamente</h2>
  <meta http-equiv="refresh" content="1; url=./guardar-libro.php">
</body>

</html>