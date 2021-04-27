<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./../css/estilos.css">
  <title>Mostrar Libros</title>
</head>

<body>
  <?php

  if (isset($_GET['rowNumber'])) :

    $rowNumber = $_GET['rowNumber'];

    include('./Estante.php');

    session_start();

    if (isset($_SESSION['shelf'])) :
  ?>
      <div class="container">
        <div class="form">
          <h1 class="title">Lista de la <?= $rowNumber ?>° fila</h1>
      <?php
      $shelf = $_SESSION['shelf'];

      $shelf->showRow($rowNumber);
    endif;
  endif;

      ?>
      <a class="btn btn--small" href="./guardar-libro.php">Volver</a>
        </div>
      </div>
</body>

</html>