<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./../css/styles.css">
  <title>Tabla</title>
</head>

<body>
  <div class="container">
    <?php


    if (isset($_POST['numberRows']) && isset($_POST['numberCols'])) :

      $numberRows = $_POST['numberRows'];
      $numberCols = $_POST['numberCols'];
    ?>
      <div class="container-table">
        <h1 class="title">Resultado</h1>
        <a href="./index.html" class="link">Volver a Datos</a>
        <table class="table">
          <?php for ($row = 0; $row < $numberRows + 1; $row++) : ?>
            <tr>
              <?php for ($col = 0; $col < $numberCols + 1; $col++) : ?>
                <?php if ($row == 0 && $col == 0) : ?>
                  <td>&nbsp;</td>
                <?php else : ?>
                  <td><?= $row + $col ?></td>
                <?php endif; ?>
              <?php endfor; ?>
            </tr>
          <?php endfor; ?>
        </table>
      </div>
    <?php else : ?>
      <div class="form">
        <h2 class="subtitle">¡No hay datos!</h2>
        <meta http-equiv="refresh" content="1; url=./index.html">
      </div>
    <?php endif; ?>
  </div>
</body>

</html>