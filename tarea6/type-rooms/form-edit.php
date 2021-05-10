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

        if ($typeRoom = $db->getTypeRoomById($id)) :

    ?>

          <h1 class="title">Formulario Editar de Tipo Habitación</h1>

          <a class="link link--secondary mb-4" href="./index.php">Volver a Tipo de Habitaciones</a>

          <form class="form" action="./edit.php" method="post">

            <h2 class="subtitle">Datos</h2>

            <div class="field-large">
              <textarea class="field-large__textarea" name="description" id="description" cols="30" rows="10" placeholder="Descripción del tipo de habitación" required><?= $typeRoom['description'] ?></textarea>
              <label class="field-large__label" for="description">Descripción</label>
            </div>

            <div class="field field--number">
              <div class="field__container-icon">
                <svg class="icon field__icon">
                  <use xlink:href="./../assets/feather-sprite.svg#bed" />
                </svg>
              </div>
              <div class="field__container-input">
                <input class="field__input" type="number" name="number_beds" id="number_beds" placeholder="Número de camas" required value="<?= $typeRoom['number_beds'] ?>">
                <label for="number_beds" class="field__label">Número de camas</label>
              </div>
            </div>

            <input type="hidden" name="id" value="<?= $id ?>">

            <input class="btn btn--primary" type="submit" value="Editar">

          </form>

        <?php

        else :

        ?>
          <div class="message message--danger">
            <h3 class="message__title">Tipo de habitación</h3>
            <p class="message__content">¡No hay registro con ese ID para editar!</p>
          </div>

          <meta http-equiv="refresh" content="2; url=./index.php">
        <?php

        endif;

        $db->close();

      else :

        ?>
        <div class="message message--warning">
          <h3 class="message__title">Tipo de habitación</h3>
          <p class="message__content">¡El parámetro ID esta vacío!</p>
        </div>

        <meta http-equiv="refresh" content="2; url=./index.php">
      <?php

      endif;

    else :
      ?>
      <div class="message message--danger">
        <h3 class="message__title">Tipo de habitación</h3>
        <p class="message__content">¡No se envió el ID para editar!</p>
      </div>

      <meta http-equiv="refresh" content="2; url=./index.php">
    <?php
    endif;
    ?>
  </div>
</body>

</html>