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
          <a href="./index.php" class="nav__link">Reservas</a>
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
  <div class="container  container--large">

    <h1 class="title">Habitaciones disponibles</h1>

    <?php
    if (isset($_GET['admission_date']) && isset($_GET['departure_date']) && isset($_GET['type_room_id'])) :

      $admissionDate = $_GET['admission_date'];
      $departureDate = $_GET['departure_date'];
      $typeRoomId = $_GET['type_room_id'];

      if (!empty($admissionDate) && !empty($departureDate) && !empty($typeRoomId)) :

        if (strtotime($departureDate) >= strtotime($admissionDate)) :

          include('./../database_init.php');
    ?>

          <h2 class="subtitle">Criterios de filtrado</h2>

          <table class="table">

            <thead>

              <tr>
                <th>Criterio</th>
                <th>Valor</th>
              </tr>

            </thead>

            <tbody>

              <tr>
                <td>Fecha de admisión</td>
                <td><?= $admissionDate ?></td>
              </tr>

              <tr>
                <td>Fecha de salida</td>
                <td><?= $departureDate ?></td>
              </tr>

              <tr>
                <td>Tipo de habitación</td>
                <td><?= $db->getTypeRoomById($typeRoomId)['description'] ?></td>
              </tr>

            </tbody>

          </table>

          <a class="link link--primary mb-4" href="./index.php">Otros Criterios</a>
          <?php

          $avalibleRooms = $db->getRoomsWithoutReservationByType($admissionDate, $departureDate, $typeRoomId);

          $numberResults = count($avalibleRooms);

          if ($numberResults > 0) :

          ?>

            <h2 class="subtitle">Resultados: <?= $numberResults ?> <?= $numberResults == 1 ? 'habitación' : 'habitaciones' ?> disponibles</h2>

            <div class="row">
              <?php

              foreach ($avalibleRooms as $room) :

              ?>
                <div class="col-3">

                  <div class="card">

                    <div class="card__head">

                      <h2 class="card__title">Habitación # <?= $room['number'] ?></h2>

                      <div class="card__actions">

                        <a class="link link--icon" title="Reservar" href="./form-reserve.php?id=<?= $room['id'] ?>&admission_date=<?= $admissionDate ?>&departure_date=<?= $departureDate ?>">
                          <svg class="icon icon--primary link__icon">
                            <use xlink:href="./../assets/feather-sprite.svg#reserve" />
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
                            <?= $room['number_beds'] ?> <?= $room['number_beds'] == 1 ? 'cama' : 'camas' ?>
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

          else :

          ?>
            <div class="message message--warning">
              <h3 class="message__title">Habitaciones disponibles</h3>
              <p class="message__content">¡No hay habitaciones disponibles con los criterios de búsqueda!</p>
            </div>
          <?php

          endif;

        else :

          ?>
          <div class="message message--warning">
            <h3 class="message__title">Habitaciones disponibles</h3>
            <p class="message__content">¡La fecha de salida es menor a la fecha de ingreso!</p>
          </div>

          <meta http-equiv="refresh" content="2; url=./index.php">
        <?php

        endif;

      else :
        ?>
        <div class="message message--danger">
          <h3 class="message__title">Habitaciones disponibles</h3>
          <p class="message__content">¡Los campos estan vacíos!</p>
        </div>

        <meta http-equiv="refresh" content="2; url=./index.php">
      <?php
      endif;
    else :
      ?>
      <div class="message message--danger">
        <h3 class="message__title">Habitaciones disponibles</h3>
        <p class="message__content">¡No se enviaron los parámetros necesarios!</p>
      </div>

      <meta http-equiv="refresh" content="2; url=./index.php">
    <?php
    endif;
    ?>
  </div>
</body>

</html>