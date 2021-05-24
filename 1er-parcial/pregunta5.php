<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="./css/style.css" />
  <title>Editar Usuarios</title>
</head>

<body>
  <header class="header"></header>
  <div class="container container--large">
    <?php
    include('database-init.php');

    $users = $db->getUsers();

    if (count($users) > 0) :
    ?>
      <form class="form form--100w" action="./edit-users.php" method="post">
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
              <tr>

                <td>
                  <div class="field">
                    <div class="field__container-icon">
                      <svg class="icon field__icon">
                        <use xlink:href="./assets/feather-sprite.svg#person" />
                      </svg>
                    </div>
                    <div class="field__container-input">
                      <input class="field__input" type="text" name="names_array[]" id="names" placeholder="Nombres" maxlength="30" value="<?= $user['nombres'] ?>" required />
                      <label for="names" class="field__label">Nombres</label>
                    </div>
                  </div>
                </td>

                <td>
                  <div class="field">
                    <div class="field__container-icon">
                      <svg class="icon field__icon">
                        <use xlink:href="./assets/feather-sprite.svg#person" />
                      </svg>
                    </div>
                    <div class="field__container-input">
                      <input class="field__input" type="text" name="surnames_array[]" id="surnanes" placeholder="Apellidos" maxlength="100" value="<?= $user['apellidos'] ?>" required />
                      <label for="surnanes" class="field__label">Apellidos</label>
                    </div>
                  </div>
                </td>

                <td>
                  <div class="field">
                    <div class="field__container-icon">
                      <svg class="icon field__icon">
                        <use xlink:href="./assets/feather-sprite.svg#email" />
                      </svg>
                    </div>
                    <div class="field__container-input">
                      <input class="field__input" type="email" name="emails_array[]" id="email" placeholder="Correo" maxlength="35" value="<?= $user['correo'] ?>" required />
                      <label for="email" class="field__label">Correo</label>
                    </div>
                  </div>
                </td>

              </tr>

              <input type="hidden" name="ids_array[]" value="<?= $user['id'] ?>">
            <?php

            endforeach;

            ?>
          </tbody>
        </table>

        <input class="btn btn--contained" type="submit" value="Editar" />
      </form>
    <?php

    endif;

    ?>
  </div>
</body>

</html>