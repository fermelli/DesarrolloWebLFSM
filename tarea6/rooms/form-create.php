<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./../css/style.css">
  <title>Agregar Habitación</title>
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
          <a href="./../type-rooms/index.php" class="nav__link">
            Tipos de Habitaciones
          </a>
        </li>
      </ul>
    </nav>
  </header>
  <div class="container">
    <h1 class="title">Formulario Agregar Habitación</h1>

    <form class="form" action="./create.php" method="post">

      <h2 class="subtitle">Datos</h2>

      <div class="field field--number">
        <div class="field__container-icon">
          <svg class="icon field__icon">
            <use xlink:href="./../assets/feather-sprite.svg#number" />
          </svg>
        </div>
        <div class="field__container-input">
          <input class="field__input" type="number" name="number" id="number" placeholder="Número de habitación" required>
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
          <input class="field__input" type="number" name="space" id="space" placeholder="Área disponible" step="0.01" required>
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
          <input class="field__input" type="number" name="price" id="price" placeholder="Precio de la habitación" step="0.01" required>
          <label for="price" class="field__label">Precio</label>
        </div>
      </div>


      <div class="checkbox">
        <input class="checkbox__input" type="checkbox" name="has_private_bathroom" id="has_private_bathroom">
        <label class="checkbox__label" for="has_private_bathroom">Baño privado</label>
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

      <input class="btn btn--primary" type="submit" value="Registrar">

    </form>
  </div>
</body>

</html>