<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="./css/style.css" />
  <title>Formulario Calendario</title>
</head>

<body>
  <header class="header"></header>

  <div class="container">
    <?php
    if (isset($_GET['month']) && isset($_GET['year'])) :

      $month = $_GET['month'];
      $year = $_GET['year'];

      $time = mktime(null, null, null, $month, 1, $year);

      $firstDay = date('N', $time);

      $daysInMonth = date('t', $time);

    ?>
      <table class="table table--oranged">

        <thead>
          <tr>
            <th>Lunes</th>
            <th>Martes</th>
            <th>Miércoles</th>
            <th>Jueves</th>
            <th>Viernes</th>
            <th>Sábado</th>
            <th>Domingo</th>
          </tr>
        </thead>

        <tbody>
          <?php
          $count = 0;
          $row = 0;
          while (true) :
            $row++;
          ?>
            <tr>
              <?php
              for ($i = 1; $i <= 7; $i++) :

                if ($i * $row < $firstDay && $row == 1) :
              ?>
                  <td>&nbsp;</td>
                <?php
                elseif ($count < $daysInMonth) :
                  $count++;
                ?>
                  <td><?= $count ?></td>
                <?php
                else :
                ?>
                  <td>&nbsp;</td>
              <?php
                endif;

              endfor;
              if ($row * 7 - $firstDay >= $daysInMonth) {
                break;
              }
              ?>
            </tr>
          <?php
          endwhile;

          ?>
        </tbody>

      </table>
    <?php

    endif;
    ?>
  </div>
</body>

</html>