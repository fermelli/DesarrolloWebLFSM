<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./../css/style.css">
  <title>Eliminar Tipo de Habitación</title>
</head>

<body>
  <div class="container">
    <?php

    if (isset($_GET['id'])) :

      $id = $_GET['id'];

      if (!empty($id)) :

        include('./../database_init.php');

        if ($db->deleteTypeRoomById($id)) :

    ?>
          <div class="message message--success">
            <h3 class="message__title">Tipo de habitación</h3>
            <p class="message__content">¡Registro eliminado con éxito!</p>
          </div>
        <?php

        else :

        ?>
          <div class="message message--danger">
            <h3 class="message__title">Tipo de habitación</h3>
            <p class="message__content">¡No se pudo eliminar el registro!</p>
          </div>
        <?php

        endif;

        $db->close();

      else :

        ?>
        <div class="message message--warning">
          <h3 class="message__title">Tipo de habitación</h3>
          <p class="message__content">¡El campo ID esta vacío!</p>
        </div>
      <?php

      endif;

    else :

      ?>
      <div class="message message--warning">
        <h3 class="message__title">Tipo de habitación</h3>
        <p class="message__content">¡No se envió el ID necesario!</p>
      </div>
    <?php

    endif;
    ?>
    <meta http-equiv="refresh" content="2; url=./index.php">
  </div>
</body>

</html>