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
  <header class="header"></header>
  <div class="container">
    <?php
    if (isset($_POST['id']) && isset($_POST['description']) && isset($_POST['number_beds'])) :

      $id = $_POST['id'];
      $description = $_POST['description'];
      $numberBeds = $_POST['number_beds'];

      if (!empty($id) && !empty($description) && !empty($numberBeds)) :

        include('./../database_init.php');

        if ($db->editTypeRoom($id, $description, $numberBeds)) :

    ?>
          <div class="message message--success">
            <h3 class="message__title">Tipo de habitación</h3>
            <p class="message__content">¡Registro editado con éxito!</p>
          </div>
        <?php

          $db->close();

        else :

        ?>
          <div class="message message--danger">
            <h3 class="message__title">Tipo de habitación</h3>
            <p class="message__content">¡No se pudo editar el registro!</p>
          </div>
        <?php

        endif;

      else :
        ?>
        <div class="message message--warning">
          <h3 class="message__title">Tipo de habitación</h3>
          <p class="message__content">¡Los campos estan vacíos!</p>
        </div>
      <?php
      endif;
    else :
      ?>
      <div class="message message--warning">
        <h3 class="message__title">Tipo de habitación</h3>
        <p class="message__content">¡No se enviaron los parámetros necesarios!</p>
      </div>
    <?php
    endif;
    ?>
    <meta http-equiv="refresh" content="2; url=./index.php">
  </div>
</body>

</html>