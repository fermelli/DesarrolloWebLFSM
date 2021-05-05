<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./../css/style.css">
  <title>Habitaciones</title>
</head>

<body>
  <header class="header">
    <nav class="nav">
      <ul class="nav__list">
        <li class="nav__item">
          <a href="./../index.html" class="nav__link">Inicio</a>
        </li>
        <li class="nav__item">
          <a href="./../rooms/index.php" class="nav__link nav__link--active">Habitaciones</a>
        </li>
        <li class="nav__item">
          <a href="./../type-rooms/index.php" class="nav__link">
            Tipos de Habitaciones
          </a>
        </li>
      </ul>
    </nav>
  </header>
  <div class="container container--large">

    <h1 class="title">Habitaciones</h1>

    <a class="link link--primary" href="./form-create.php">Agregar Habitación</a>
    <?php
    include('./../database_init.php');

    $rooms = $db->getRooms();

    if (count($rooms) > 0) :

    ?>
      <div class="row">
        <?php

        foreach ($rooms as $room) :

        ?>
          <div class="col-3">

            <div class="card">

              <div class="card__head">

                <h2 class="card__title">Habitación # <?= $room['number'] ?></h2>

                <div class="card__actions">

                  <a class="link link--icon" title="Editar" href="./form-edit.php?id=<?= $room['id'] ?>">
                    <svg class="icon icon--blue link__icon">
                      <use xlink:href="./../assets/feather-sprite.svg#edit" />
                    </svg>
                  </a>

                  <a class="link link--icon" title="Eliminar" href="./delete.php?id=<?= $room['id'] ?>">
                    <svg class="icon icon--red link__icon">
                      <use xlink:href="./../assets/feather-sprite.svg#delete" />
                    </svg>
                  </a>

                </div>


              </div>

              <div class="card__content">

                <h3 class="card__subtitle">Habitación</h3>

                <ul class="card__list">

                  <li class="card__item">
                    <svg class="icon card__item-icon">
                      <use xlink:href="./../assets/feather-sprite.svg#space" />
                    </svg>
                    <span class="card__item-datum">
                      <?= $room['space'] ?> m<sup>2</sup>
                    </span>
                  </li>

                  <li class="card__item">
                    <svg class="icon card__item-icon">
                      <use xlink:href="./../assets/feather-sprite.svg#price" />
                    </svg>
                    <span class="card__item-datum">
                      <?= $room['price'] ?> Bs.
                    </span>
                  </li>

                  <li class="card__item">
                    <svg class="icon card__item-icon">
                      <use xlink:href="./../assets/feather-sprite.svg#bath" />
                    </svg>
                    <span class="card__item-datum">
                      <?= $room['has_private_bathroom'] ? 'Cuenta con baño privado' : 'No cuenta baño privado' ?>
                    </span>
                  </li>

                </ul>

                <h3 class="card__subtitle">Tipo</h3>

                <ul class="card__list">

                  <li class="card__item">
                    <svg class="icon card__item-icon">
                      <use xlink:href="./../assets/feather-sprite.svg#description" />
                    </svg>
                    <span class="card__item-datum">
                      <?= $room['description'] ?>
                    </span>
                  </li>

                  <li class="card__item">
                    <svg class="icon card__item-icon">
                      <use xlink:href="./../assets/feather-sprite.svg#bed" />
                    </svg>
                    <span class="card__item-datum">
                      <?= $room['number_beds'] ?> camas
                    </span>
                  </li>

                </ul>

              </div>

            </div>

          </div>
        <?php

        endforeach;

        ?>
      </div>
    <?php

    endif;

    ?>

  </div>
</body>

</html>