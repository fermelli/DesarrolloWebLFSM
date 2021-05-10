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
  <div class="container container--large">
    <?php

    if (isset($_GET['id'])) :

      $id = $_GET['id'];

      if (!empty($id)) :

        include('./../database_init.php');

        if ($room = $db->getRoomAllInfoById($id)) :

    ?>
          <h1 class="title">Habitación</h1>

          <div class="row">

            <div class="col-4">

              <a class="link link--primary" href="./index.php">Volver a Habitaciones</a>

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
            <div class="col-8">

              <form class="form form--files" action="./upload-images.php" method="post" enctype="multipart/form-data">

                <div class="field">
                  <div class="field__container-icon">
                    <svg class="icon field__icon">
                      <use xlink:href="./../assets/feather-sprite.svg#images" />
                    </svg>
                  </div>
                  <div class="field__container-input">
                    <input class="field__input field__input--file" type="file" name="images[]" id="images" placeholder="Imágenes de la habitación" accept="image/png, image/jpeg" multiple required>
                    <label for="images" class="field__label">Imágenes</label>
                  </div>
                </div>

                <input type="hidden" name="id" value="<?= $id ?>">

                <input class="btn btn--primary" type="submit" value="Subir">

              </form>

              <?php

              $images = $db->getImagesByRoomId($id);

              $count = count($images);

              if (count($images) > 0) :

              ?>
                <div class="row">

                  <?php

                  $i = 1;

                  foreach ($images as $image) :

                  ?>
                    <div class="col-4">

                      <div class="picture">

                        <img class="picture__image" src="<?= "./../public/images/$id/" . $image['name'] ?>" title="Imagen habitación <?= "$i - $count" ?>" alt="Imagen habitación <?= "$i - $count" ?>">

                        <a class="link link--icon picture__link" title="Eliminar" href="./delete-image.php?id=<?= $image['id'] ?>&room_id=<?= $id ?>">
                          <svg class="icon icon--red link__icon">
                            <use xlink:href="./../assets/feather-sprite.svg#delete" />
                          </svg>
                        </a>

                      </div>


                    </div>
                  <?php

                    $i++;

                  endforeach;

                  ?>

                </div>

              <?php

              endif;

              $db->close();

              ?>


              <?php

              ?>

            </div>

          </div>
        <?php

        else :

        ?>
          <div class="message message--warning">
            <h3 class="message__title">Habitación</h3>
            <p class="message__content">¡No hay registro de la habitación!</p>
          </div>
        <?php

        endif;

      else :

        ?>
        <div class="message message--warning">
          <h3 class="message__title">Habitación</h3>
          <p class="message__content">¡Los campos estan vacíos!</p>
        </div>
      <?php

      endif;

    else :

      ?>
      <div class="message message--warning">
        <h3 class="message__title">Habitación</h3>
        <p class="message__content">¡No se enviaron los parámetros necesarios!</p>
      </div>
    <?php

    endif;

    ?>
  </div>
</body>

</html>