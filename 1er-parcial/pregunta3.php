<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="./css/style.css" />
  <title>Ejercicio 2</title>
</head>

<body>
  <div class="container">
    <?php

    include('database-init.php');

    $users = $db->getUsers();

    if (count($users) > 0) :

    ?>
      <table class="table">

        <thead>
          <tr>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Correo</th>
          </tr>
        </thead>

        <tbody>
          <?php

          foreach ($users as $user) :

          ?>
            <tr class="<?= $user['estado'] != 'V' && $user['estado'] != 'v' ? 'red' : '' ?>">
              <td><?= $user['nombres'] ?></td>
              <td><?= $user['apellidos'] ?></td>
              <td><?= $user['correo'] ?></td>
            </tr>
          <?php

          endforeach;

          ?>
        </tbody>
      </table>
    <?php

    else :

    endif;

    ?>
  </div>
</body>

</html>