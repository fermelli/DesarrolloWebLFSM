<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./../css/estilos.css">
  <title>Estante</title>
</head>

<body>
  <?php
  function randomColor()
  {
    $r = dechex(rand(1, 255));
    $b = dechex(rand(1, 255));
    $g = dechex(rand(1, 255));

    return "#$r$b$g";
  }

  include('./Estante.php');
  session_start();

  if (isset($_SESSION['shelf'])) :

    $shelf = $_SESSION['shelf'];
    if (isset($_POST['bookName']) && isset($_POST['rowNumber'])) :
      $bookName = $_POST['bookName'];
      $rowNumber = (int) $_POST['rowNumber'];

      $shelf->insertBook($rowNumber, $bookName);
    endif;

    $_SESSION['shelf'] = $shelf;
  ?>
    <div class="container">
      <div class="head">
        <h1 class="title">Estante</h1>
        <a class="btn" href="./generar-estante.php">Agregar Libro</a>
      </div>
      <div class="shelf">
        <div class="row">
          <div class="actions">
            <a class="btn btn--small" href="./mostrar-libros.php?rowNumber=1">Mostrar</a>
            <a class="btn btn--small" href="./eliminar-libro.php?rowNumber=1">Eliminar</a>
          </div>
          <div class="container-books">
            <?php for ($i = 0; $i < $shelf->getRow1Length(); $i++) : ?>
              <div class="book" style="background-color: <?= randomColor() ?>;"><?= $shelf->getRow1BookByIndex($i) ?></div>
            <?php endfor; ?>
          </div>
        </div>
        <div class="row">
          <div class="actions">
            <a class="btn btn--small" href="./mostrar-libros.php?rowNumber=2">Mostrar</a>
            <a class="btn btn--small" href="./eliminar-libro.php?rowNumber=2">Eliminar</a>
          </div>
          <div class="container-books">
            <?php for ($i = 0; $i < $shelf->getRow2Length(); $i++) : ?>
              <div class="book"><?= $shelf->getRow2BookByIndex($i) ?></div>
            <?php endfor; ?>
          </div>
        </div>
        <div class="row">
          <div class="actions">
            <a class="btn btn--small" href="./mostrar-libros.php?rowNumber=3">Mostrar</a>
            <a class="btn btn--small" href="./eliminar-libro.php?rowNumber=3">Eliminar</a>
          </div>
          <div class="container-books">
            <?php for ($i = 0; $i < $shelf->getRow3Length(); $i++) : ?>
              <div class="book"><?= $shelf->getRow3BookByIndex($i) ?></div>
            <?php endfor; ?>
          </div>
        </div>
      </div>
    </div>
  <?php endif; ?>
</body>

</html>