<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./../css/comun.css">
  <title>Generar Tabla</title>
  <style>
    .responsive {
      max-width: 1200px;
      overflow-x: scroll;
    }

    table {
      margin: 0 auto;
      border-collapse: collapse;
    }

    td {
      border: 1px solid #ee1133;
      padding: 1rem;
    }
  </style>
</head>

<body>
  <?php
  $filas = $_GET['filas'];
  $columnas = $_GET['columnas'];
  ?>
  <div class="container">
    <div class="card responsive">
      <h1 class="full">Generar Tabla</h1>
      <p class="full">La tabla de <?= $filas ?> filas por <?= $columnas ?> columnas es:</p>
      <table>
        <?php for ($i = 0; $i < $filas; $i++) : ?>
          <tr>
            <?php for ($j = 0; $j < $columnas; $j++) : ?>
              <td><?= " " ?></td>
            <?php endfor; ?>
          </tr>
        <?php endfor; ?>
      </table>
      <span class="link"><a href="./../index.html">Inicio</a></span>
    </div>
  </div>
</body>


</html>