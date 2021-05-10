<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="./../css/style.css" />
  <title>Realizar Reserva</title>
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
  <div class="container">
    <?php

    if (isset($_GET['id']) && isset($_GET['admission_date']) && isset($_GET['departure_date'])) :

      $id = $_GET['id'];
      $admissionDate = $_GET['admission_date'];
      $departureDate = $_GET['departure_date'];

      if (!empty($id) && !empty($admissionDate) && !empty($departureDate)) :

        if (strtotime($departureDate) >= strtotime($admissionDate)) :

          include('./../database_init.php');

          if ($room = $db->getRoomAllInfoById($id)) :

            $days = (strtotime($departureDate) - strtotime($admissionDate)) / 86400 + 1;

    ?>
            <h1 class="title">Reservar habitación</h1>

            <div class="row">

              <div class="col">

                <form class="form" action="./reserve.php" method="post">

                  <h2 class="subtitle">Datos</h2>

                  <div class="field field--readonly">
                    <div class="field__container-icon">
                      <svg class="icon field__icon">
                        <use xlink:href="./../assets/feather-sprite.svg#start-date" />
                      </svg>
                    </div>
                    <div class="field__container-input">
                      <input class="field__input" type="date" name="admission_date" id="admission_date" placeholder="Fecha de admisión" readonly value="<?= $admissionDate ?>">
                      <label for="admission_date" class="field__label">Fecha de admisión</label>
                    </div>
                  </div>

                  <div class="field field--readonly">
                    <div class="field__container-icon">
                      <svg class="icon field__icon">
                        <use xlink:href="./../assets/feather-sprite.svg#end-date" />
                      </svg>
                    </div>
                    <div class="field__container-input">
                      <input class="field__input" type="date" name="departure_date" id="departure_date" placeholder="Fecha de salida" readonly value="<?= $departureDate ?>">
                      <label for="departure_date" class="field__label">Fecha de salida</label>
                    </div>
                  </div>

                  <div class="field field--number field--readonly">
                    <div class="field__container-icon">
                      <svg class="icon field__icon">
                        <use xlink:href="./../assets/feather-sprite.svg#days" />
                      </svg>
                    </div>
                    <div class="field__container-input">
                      <input class="field__input" type="number" name="days" id="days" placeholder="Días de reservación" readonly value="<?= $days ?>">
                      <label for="days" class="field__label">Días</label>
                    </div>
                  </div>

                  <div class="field field--number field--readonly">
                    <div class="field__container-icon">
                      <svg class="icon field__icon">
                        <use xlink:href="./../assets/feather-sprite.svg#total-price" />
                      </svg>
                    </div>
                    <div class="field__container-input">
                      <input class="field__input" type="number" name="total_price" id="total_price" placeholder="Precio total" readonly value="<?= $days * $room['price'] ?>">
                      <label for="total_price" class="field__label">Precio total</label>
                    </div>
                  </div>

                  <div class="checkbox">
                    <input class="checkbox__input" type="checkbox" name="is_pad" id="is_pad">
                    <label class="checkbox__label" for="is_pad">Contado</label>
                  </div>

                  <div class="field">
                    <div class="field__container-icon">
                      <svg class="icon field__icon">
                        <use xlink:href="./../assets/feather-sprite.svg#person" />
                      </svg>
                    </div>
                    <div class="field__container-input">
                      <input class="field__input" type="text" name="names" id="names" placeholder="Nombres reservante" required>
                      <label for="names" class="field__label">Nombres</label>
                    </div>
                  </div>

                  <div class="field">
                    <div class="field__container-icon">
                      <svg class="icon field__icon">
                        <use xlink:href="./../assets/feather-sprite.svg#person" />
                      </svg>
                    </div>
                    <div class="field__container-input">
                      <input class="field__input" type="text" name="surnames" id="surnames" placeholder="Apellidos reservante" required>
                      <label for="surnames" class="field__label">Apellidos</label>
                    </div>
                  </div>

                  <div class="field">
                    <div class="field__container-icon">
                      <svg class="icon field__icon">
                        <use xlink:href="./../assets/feather-sprite.svg#email" />
                      </svg>
                    </div>
                    <div class="field__container-input">
                      <input class="field__input" type="email" name="email" id="email" placeholder="Correo electrónico" required>
                      <label for="email" class="field__label">Correo electrónico</label>
                    </div>
                  </div>

                  <input type="hidden" name="room_id" value="<?= $id ?>">

                  <input class="btn btn--primary" type="submit" value="Reservar">

                </form>

              </div>
              <div class="col">

                <div class="card">

                  <div class="card__head">

                    <h2 class="card__title">Habitación # <?= $room['number'] ?></h2>

                    <div class="card__actions">

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

            </div>
          <?php

            $db->close();

          else :

          ?>
            <div class="message message--danger">
              <h3 class="message__title">Reservar habitación</h3>
              <p class="message__content">¡No hay registro de la habitación!</p>
            </div>
          <?php

          endif;

        else :

          ?>
          <div class="message message--warning">
            <h3 class="message__title">Habitaciones disponibles</h3>
            <p class="message__content">¡La fecha de salida es menor a la fecha de ingreso!</p>
          </div>
        <?php

        endif;

        ?>

      <?php

      else :

      ?>
        <div class="message message--warning">
          <h3 class="message__title">Reservar habitación</h3>
          <p class="message__content">¡Los campos estan vacíos!</p>
        </div>
      <?php

      endif;

      ?>
    <?php

    else :

    ?>
      <div class="message message--warning">
        <h3 class="message__title">Reservar habitación</h3>
        <p class="message__content">¡No se enviaron los parámetros necesarios!</p>
      </div>
    <?php

    endif;
    ?>

  </div>
</body>

</html>