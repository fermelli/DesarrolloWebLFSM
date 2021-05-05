<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./../css/style.css">
  <title>Tipos de Habitaciones</title>
</head>

<body>
  <header class="header">
    <nav class="nav">
      <ul class="nav__list">
        <li class="nav__item">
          <a href="./../index.html" class="nav__link">Inicio</a>
        </li>
        <li class="nav__item">
          <a href="./../rooms/index.php" class="nav__link">Habitaciones</a>
        </li>
        <li class="nav__item">
          <a href="./../type-rooms/index.php" class="nav__link nav__link--active ">
            Tipos de Habitaciones
          </a>
        </li>
      </ul>
    </nav>
  </header>
  <div class="container">

    <h1 class="title">Tipos de Habitaciones</h1>

    <a class="link link--primary" href="./form-create.php">Agregar Tipo de Habitación</a>
    <?php
    include('./../database_init.php');

    $typeRooms = $db->getTypeRooms();

    if (count($typeRooms) > 0) :

    ?>
      <table class="table">

        <thead>

          <tr>
            <th>Descripción</th>
            <th>Número de Camas</th>
            <th colspan="2">Acciones</th>
          </tr>

        </thead>

        <tbody>
          <?php

          foreach ($typeRooms as $type) :

          ?>
            <tr>
              <td><?= $type['description'] ?></td>
              <td class="text-align-right"><?= $type['number_beds'] ?></td>
              <td>
                <a class="link link--icon" title="Editar" href="./form-edit.php?id=<?= $type['id'] ?>">
                  <svg class="icon icon--blue link__icon">
                    <use xlink:href="./../assets/feather-sprite.svg#edit" />
                  </svg>
                </a>
              </td>
              <td>
                <a class="link link--icon" title="Eliminar" href="./delete.php?id=<?= $type['id'] ?>">
                  <svg class="icon icon--red link__icon">
                    <use xlink:href="./../assets/feather-sprite.svg#delete" />
                  </svg>
                </a>
              </td>
            </tr>
          <?php

          endforeach;

          ?>
        </tbody>

      </table>
    <?php

      $db->close();

    else :

    ?>
      <div class="message message--warning">
        <h3 class="message__title">Tipos de habitaciones</h3>
        <p class="message__content">¡No hay registros en la base de datos!</p>
      </div>
    <?php

    endif;

    ?>
  </div>
</body>

</html>