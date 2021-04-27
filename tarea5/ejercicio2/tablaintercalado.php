<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./../css/estilos.css">
  <title>Tabla Banderas</title>
</head>

<body>
  <?php
  if (isset($_POST['numberRows']) && isset($_POST['numberCols'])) :
    $numberRows = $_POST['numberRows'];
    $numberCols = $_POST['numberCols'];
  ?>
    <h1 class="subtitle">Banderas</h1>
    <div class="responsive">
      <table class="table">
        <?php for ($row = 0; $row < $numberRows; $row++) : ?>
          <tr>
            <?php
            for ($col = 0; $col < $numberCols; $col++) :
            ?>
              <td></td>
            <?php
            endfor;
            ?>
          </tr>
        <?php
        endfor;
        ?>
      </table>
    </div>
  <?php endif; ?>
</body>

</html>