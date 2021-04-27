<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tabla Banderas</title>
</head>

<body>
  <?php
  if (isset($_POST['numberRows']) && isset($_POST['numberCols'])) :
    $numberRows = $_POST['numberRows'];
    $numberCols = $_POST['numberCols'];
  ?>
    <table border="1">
      <?php for ($row = 0; $row < $numberRows; $row++) : ?>
        <tr>
          <?php
          for ($col = 0; $col < $numberCols; $col++) :
          ?>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
          <?php
          endfor;
          ?>
        </tr>
      <?php
      endfor;
      ?>
    </table>
  <?php endif; ?>
</body>

</html>