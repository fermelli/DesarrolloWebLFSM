<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./../css/style.css">
  <title>Subir Imágenes</title>
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

    if (isset($_FILES['images']) && isset($_POST['id'])) :

      $images = $_FILES['images'];
      $id = $_POST['id'];

      if (!empty($images) && !empty($id)) :

        include('./../database_init.php');

        for ($i = 0; $i < count($images['name']); $i++) :

          $name = $images['name'][$i];
          $extension = explode(".", $name)[1];
          $tmpName = $images['tmp_name'][$i];
          $newName = uniqid() . ".$extension";
          $path = "./../public/images/$id";

          if ($db->storeImage($newName, $id)) :

            if (!file_exists($path)) {
              mkdir($path, 0777, true);
            }

            copy($tmpName, "$path/$newName");

    ?>
            <div class="message message--success">
              <h3 class="message__title">Subir imágenes</h3>
              <p class="message__content">Imagen <?= $name ?> guardada con éxito!</p>
            </div>
          <?php

          else :

          ?>
            <div class="message message--danger">
              <h3 class="message__title">Subir imágenes</h3>
              <p class="message__content">¡No se pudo guardar la Imagen <?= $name ?>!</p>
            </div>
        <?php

          endif;

        endfor;

        $db->close();

      else :

        ?>
        <div class="message message--warning">
          <h3 class="message__title">Subir imágenes</h3>
          <p class="message__content">¡Los campos estan vacíos!</p>
        </div>
      <?php

      endif;


    else :

      ?>
      <div class="message message--warning">
        <h3 class="message__title">Subir imágenes</h3>
        <p class="message__content">¡No se enviaron los parámetros necesarios!</p>
      </div>
    <?php

    endif;

    ?>

    <meta http-equiv="refresh" content="2; url=./show.php?id=<?= $id ?>">
  </div>
</body>

</html>