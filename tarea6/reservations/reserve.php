<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="./../css/style.css" />
  <title>Reservar</title>
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

    if (isset($_POST['admission_date']) && isset($_POST['departure_date']) && isset($_POST['names']) && isset($_POST['surnames']) && isset($_POST['email']) && isset($_POST['room_id'])) :

      $admissionDate = $_POST['admission_date'];
      $departureDate = $_POST['departure_date'];
      $isPad = isset($_POST['is_pad']) ? TRUE : FALSE;
      $names = $_POST['names'];
      $surnames = $_POST['surnames'];
      $email = $_POST['email'];
      $roomId = $_POST['room_id'];

      if (!empty($admissionDate) && !empty($departureDate) && !empty($names) && !empty($surnames) && !empty($email) && !empty($roomId)) :

        include('./../database_init.php');

        if ($db->storeReservations($admissionDate, $departureDate, $isPad, $names, $surnames, $email, $roomId)) :

    ?>
          <div class="message message--success">
            <h3 class="message__title">Reservar</h3>
            <p class="message__content">¡Registro guardado con éxito!</p>
          </div>
        <?php

          $db->close();

        else :

        ?>
          <div class="message message--danger">
            <h3 class="message__title">Reservar</h3>
            <p class="message__content">¡No se pudo guardar el registro!</p>
          </div>
        <?php

        endif;

      else :

        ?>
        <div class="message message--warning">
          <h3 class="message__title">Reservar</h3>
          <p class="message__content">¡Los campos estan vacíos!</p>
        </div>
      <?php

      endif;

    else :

      ?>
      <div class="message message--danger">
        <h3 class="message__title">Reservar</h3>
        <p class="message__content">¡No se enviaron los parámetros necesarios!</p>
      </div>
    <?php

    endif;
    ?>

    <meta http-equiv="refresh" content="2; url=./../index.php">
  </div>
</body>

</html>