<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./../css/style.css">
  <title>Editar Tipo de Habitación</title>
</head>

<body>
  <header class="header">
    <nav class="nav">
      <ul class="nav__list">
        <li class="nav__item">
          <a href="./../index.php" class="nav__link">Inicio</a>
        </li>
        <li class="nav__item">
          <a href="./../reservations/index.php" class="nav__link">Reservas</a>
        </li>
        <li class="nav__item">
          <a href="./../rooms/index.php" class="nav__link">Habitaciones</a>
        </li>
        <li class="nav__item">
          <a href="./../type-rooms/index.php" class="nav__link">
            Tipos de Habitaciones
          </a>
        </li>
      </ul>
    </nav>
  </header>
  <div class="container">
    <?php
    if (isset($_GET['id'])) :

      $id = $_GET['id'];

      if (!empty($id)) :

        include('./../database_init.php');

        if ($room = $db->getRoomById($id)) :

    ?>

          <h1 class="title">Formulario Editar Habitación</h1>

          <a class="link link--secondary mb-4" href="./index.php">Volver a Habitaciones</a>

          <form class="form" action="./edit.php" method="post">

            <h2 class="subtitle">Datos</h2>

            <div class="field field--number">
              <div class="field__container-icon">
                <svg class="icon field__icon">
                  <use xlink:href="./../assets/feather-sprite.svg#number" />
                </svg>
              </div>
              <div class="field__container-input">
                <input class="field__input" type="number" name="number" id="number" placeholder="Número de habitación" required value="<?= $room['number'] ?>">
                <label for="number" class="field__label">Número</label>
              </div>
            </div>

            <div class="field field--number">
              <div class="field__container-icon">
                <svg class="icon field__icon">
                  <use xlink:href="./../assets/feather-sprite.svg#space" />
                </svg>
              </div>
              <div class="field__container-input">
                <input class="field__input" type="number" name="space" id="space" placeholder="Área disponible" step="0.01" required value="<?= $room['space'] ?>">
                <label for="space" class="field__label">Espacio</label>
              </div>
            </div>

            <div class="field field--number">
              <div class="field__container-icon">
                <svg class="icon field__icon">
                  <use xlink:href="./../assets/feather-sprite.svg#price" />
                </svg>
              </div>
              <div class="field__container-input">
                <input class="field__input" type="number" name="price" id="price" placeholder="Precio de la habitación" step="0.01" required value="<?= $room['price'] ?>">
                <label for="price" class="field__label">Precio</label>
              </div>
            </div>


            <div class="checkbox">
              <input class="checkbox__input" type="checkbox" name="has_private_bathroom" id="has_private_bathroom" <?= $room['has_private_bathroom'] ? 'checked' : '' ?>>
              <label class="checkbox__label" for="has_private_bathroom">Baño privado</label>
            </div>


            <div class="combobox">
              <select class="combobox__select" name="type_room_id" id="type_room_id" required>
                <option class="combobox__option" value="" disabled selected>--- Seleccione una tipo ---</option>
                <?php

                $typeRooms = $db->getTypeRooms();

                if (count($typeRooms) > 0) :

                  foreach ($typeRooms as $type) :

                ?>
                    <option class="combobox__option" value="<?= $type['id'] ?>" <?= $room['type_room_id'] ==  $type['id'] ? 'selected' : '' ?>>
                      <?= $type['description'] ?>
                    </option>
                <?php

                  endforeach;

                endif;

                ?>
              </select>
              <div class="combobox__container-icon">
                <svg class="icon combobox__icon">
                  <use xlink:href="./../assets/feather-sprite.svg#expand" />
                </svg>
              </div>
            </div>

            <input type="hidden" name="id" value="<?= $id ?>">

            <input class="btn btn--primary" type="submit" value="Editar">

          </form>

        <?php

        else :

        ?>
          <div class="message message--danger">
            <h3 class="message__title">Habitación</h3>
            <p class="message__content">¡No hay registro con ese ID para editar!</p>
          </div>

          <meta http-equiv="refresh" content="2; url=./index.php">
        <?php

        endif;

        $db->close();

      else :

        ?>
        <div class="message message--warning">
          <h3 class="message__title">Habitación</h3>
          <p class="message__content">¡El parámetro ID esta vacío!</p>
        </div>

        <meta http-equiv="refresh" content="2; url=./index.php">
      <?php

      endif;

    else :

      ?>
      <div class="message message--danger">
        <h3 class="message__title">Habitación</h3>
        <p class="message__content">¡No se envió el ID para editar!</p>
      </div>

      <meta http-equiv="refresh" content="2; url=./index.php">
    <?php

    endif;

    ?>
  </div>
</body>

</html>