<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="./css/style.css" />
  <title>Editar Usuarios</title>
</head>

<body>
  <header class="header"></header>
  <div class="container">
    <?php
    if (isset($_POST['ids_array']) && isset($_POST['names_array']) && isset($_POST['surnames_array']) && isset($_POST['emails_array'])) :

      $idsArray = $_POST['ids_array'];
      $namesArray = $_POST['names_array'];
      $surnamesArray = $_POST['surnames_array'];
      $emailsArray = $_POST['emails_array'];

      $count = count($idsArray);

      include('database-init.php');

      for ($i = 0; $i < $count; $i++) :

        $id = $idsArray[$i];
        $names = $namesArray[$i];
        $surnames = $surnamesArray[$i];
        $email = $emailsArray[$i];

        if ($db->editUser($id, $names, $surnames, $email)) :

    ?>
          <div class="message message--success">
            <h3 class="message__title">Usuarios</h3>
            <p class="message__content">¡Registro editado con éxito!</p>
          </div>
        <?php

        else :

        ?>
          <div class="message message--danger">
            <h3 class="message__title">Usuarios</h3>
            <p class="message__content">¡No se pudo editar el registro!</p>
          </div>
      <?php

        endif;

      endfor;

    else :

      ?>
      <div class="message message--warning">
        <h3 class="message__title">Usuarios</h3>
        <p class="message__content">¡No se enviaron los parámetros necesarios!</p>
      </div>
    <?php

    endif;
    ?>
    <meta http-equiv="refresh" content="2; url=./pregunta5.php">
  </div>
</body>

</html>