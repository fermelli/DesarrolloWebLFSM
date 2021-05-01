<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./../css/styles.css">
  <title>Resultados</title>
</head>

<body>
  <div class="container">
    <?php
    include('./Operations.php');

    session_start();

    if (isset($_SESSION['operations'])) :


      $operations = $_SESSION['operations'];

      $table = $operations->showCalculations()
    ?>
      <div class="container-table">
        <h1 class="title">Resultados</h1>

        <?= $table ?>
        <a href="./index.html" class="link">Volver al menú</a>
      </div>
    <?php else : ?>
      <div class="form">
        <h2 class="subtitle">¡No hay datos persistidos!</h2>
        <meta http-equiv="refresh" content="1; url=./index.html">
      </div>
    <?php endif; ?>
  </div>
</body>

</html>