<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./../css/style.css">
  <title>Registrar Habitación</title>
</head>

<body>
  <div class="container">
    <?php

    if (isset($_POST['number']) && isset($_POST['space']) && isset($_POST['price']) && isset($_POST['type_room_id'])) :

      $number = (int) $_POST['number'];
      $hasPrivateBathroom = isset($_POST['has_private_bathroom']) ? TRUE : FALSE;
      $space = (float) $_POST['space'];
      $price = (float) $_POST['price'];
      $typeRoomId = $_POST['type_room_id'];

      if (!empty($number) && !empty($space) && !empty($price) && !empty($typeRoomId)) :

        include('./../database_init.php');

        if ($db->storeRoom($number, $hasPrivateBathroom, $space, $price, $typeRoomId)) :

    ?>
          <div class="message message--success">
            <h3 class="message__title">Habitación</h3>
            <p class="message__content">¡Registro guardado con éxito!</p>
          </div>
        <?php

        else :

        ?>
          <div class="message message--danger">
            <h3 class="message__title">Habitación</h3>
            <p class="message__content">¡No se pudo guardar el registro!</p>
          </div>
        <?php

        endif;

        $db->close();

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
    <meta http-equiv="refresh" content="2; url=./index.php">
  </div>
</body>

</html>