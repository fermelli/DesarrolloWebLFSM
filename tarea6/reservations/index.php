<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="./../css/style.css" />
  <title>Reservas</title>
</head>

<body>
  <header class="header">
    <nav class="nav">
      <ul class="nav__list">
        <li class="nav__item">
          <a href="./../index.php" class="nav__link">Inicio</a>
        </li>
        <li class="nav__item">
          <a href="./index.php" class="nav__link nav__link--active">Reservas</a>
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

    <h1 class="title">Reservas</h1>

    <form class="form" action="./available_rooms.php" method="get">

      <h2 class="subtitle">Buscar habitaciones</h2>

      <div class="field">
        <div class="field__container-icon">
          <svg class="icon field__icon">
            <use xlink:href="./../assets/feather-sprite.svg#start-date" />
          </svg>
        </div>
        <div class="field__container-input">
          <input class="field__input" type="date" name="admission_date" id="admission_date" placeholder="Fecha de admisión" min="<?= date('Y-m-d') ?>" required>
          <label for="admission_date" class="field__label">Fecha de admisión</label>
        </div>
      </div>

      <div class="field">
        <div class="field__container-icon">
          <svg class="icon field__icon">
            <use xlink:href="./../assets/feather-sprite.svg#end-date" />
          </svg>
        </div>
        <div class="field__container-input">
          <input class="field__input" type="date" name="departure_date" id="departure_date" placeholder="Fecha de salida" min="<?= date('Y-m-d') ?>" required>
          <label for="departure_date" class="field__label">Fecha de salida</label>
        </div>
      </div>

      <div class="combobox">
        <select class="combobox__select" name="type_room_id" id="type_room_id" required>
          <option class="combobox__option" value="" disabled selected>--- Seleccione una tipo ---</option>
          <?php

          include('./../database_init.php');

          $typeRooms = $db->getTypeRooms();

          if (count($typeRooms) > 0) :

            foreach ($typeRooms as $type) :

          ?>
              <option class="combobox__option" value="<?= $type['id'] ?>">
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

      <input class="btn btn--primary" type="submit" value="Consultar">

    </form>
  </div>
</body>

</html>