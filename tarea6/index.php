<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="./css/style.css" />
  <title>Inicio</title>
</head>

<body>
  <header class="header">
    <nav class="nav">
      <ul class="nav__list">
        <li class="nav__item">
          <a href="./index.php" class="nav__link nav__link--active">Inicio</a>
        </li>
        <li class="nav__item">
          <a href="./reservations/index.php" class="nav__link">Reservas</a>
        </li>
        <li class="nav__item">
          <a href="./rooms/index.php" class="nav__link">Habitaciones</a>
        </li>
        <li class="nav__item">
          <a href="./type-rooms/index.php" class="nav__link">
            Tipos de Habitaciones
          </a>
        </li>
      </ul>
    </nav>
  </header>
  <div class="container container--large">

    <h1 class="title">Reservaciones</h1>
    <?php

    include('./database_init.php');

    $reservations = $db->getReservations();

    if (count($reservations) > 0) :

    ?>
      <div class="row">
        <?php
        foreach ($reservations as $reservation) :

          $days = (strtotime($reservation['departure_date']) - strtotime($reservation['admission_date'])) / 86400 + 1;

        ?>
          <div class="col-3">

            <div class="card">

              <div class="card__head">

                <h2 class="card__title">Habitación # <?= $reservation['number'] ?></h2>

              </div>

              <div class="card__content">

                <h3 class="card__subtitle">Fechas</h3>

                <ul class="card__list">
                  <li class="card__item">
                    <svg class="icon card__item-icon">
                      <use xlink:href="./assets/feather-sprite.svg#start-date" />
                    </svg>
                    <span class="card__item-datum">
                      <?= $reservation['admission_date'] ?>
                    </span>
                  </li>

                  <li class="card__item">
                    <svg class="icon card__item-icon">
                      <use xlink:href="./assets/feather-sprite.svg#end-date" />
                    </svg>
                    <span class="card__item-datum">
                      <?= $reservation['departure_date'] ?>
                    </span>
                  </li>

                  <li class="card__item">
                    <svg class="icon card__item-icon">
                      <use xlink:href="./assets/feather-sprite.svg#days" />
                    </svg>
                    <span class="card__item-datum">
                      <?= $days ?> días
                    </span>
                  </li>

                </ul>

                <h3 class="card__subtitle">Habitación</h3>

                <ul class="card__list">

                  <li class="card__item">
                    <svg class="icon card__item-icon">
                      <use xlink:href="./assets/feather-sprite.svg#price" />
                    </svg>
                    <span class="card__item-datum">
                      <?= $reservation['price'] ?> Bs. / noche
                    </span>
                  </li>

                  <li class="card__item">
                    <svg class="icon card__item-icon">
                      <use xlink:href="./assets/feather-sprite.svg#total-price" />
                    </svg>
                    <span class="card__item-datum">
                      <?= $days * $reservation['price'] ?> Bs. en total
                    </span>
                  </li>

                  <li class="card__item">
                    <svg class="icon card__item-icon">
                      <use xlink:href="./assets/feather-sprite.svg#is-pad" />
                    </svg>
                    <span class="card__item-datum">
                      <?= $reservation['is_pad'] ? 'Pagado' : 'Adeudado' ?>
                    </span>
                  </li>

                </ul>

                <h3 class="card__subtitle">Tipo</h3>

                <ul class="card__list">

                  <li class="card__item">
                    <svg class="icon card__item-icon">
                      <use xlink:href="./assets/feather-sprite.svg#description" />
                    </svg>
                    <span class="card__item-datum">
                      <?= $reservation['description'] != NULL ? $reservation['description'] : 'No definida' ?>
                    </span>
                  </li>

                </ul>

                <h3 class="card__subtitle">Datos</h3>

                <ul class="card__list">

                  <li class="card__item">
                    <svg class="icon card__item-icon">
                      <use xlink:href="./assets/feather-sprite.svg#person" />
                    </svg>
                    <span class="card__item-datum">
                      <?= $reservation['names'] ?> <?= $reservation['surnames'] ?>
                    </span>
                  </li>

                  <li class="card__item">
                    <svg class="icon card__item-icon">
                      <use xlink:href="./assets/feather-sprite.svg#email" />
                    </svg>
                    <span class="card__item-datum">
                      <?= $reservation['email'] ?>
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
        <h3 class="message__title">Reservaciones</h3>
        <p class="message__content">¡No hay registros en la base de datos!</p>
      </div>
    <?php
    endif;

    ?>
  </div>
</body>

</html>