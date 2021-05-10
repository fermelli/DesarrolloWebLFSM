<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./../css/style.css">
  <title>Registrar Alumnos</title>
</head>

<body>
  <header class="header"></header>

  <div class="container">

    <?php

    if (isset($_POST['names']) && isset($_POST['surnames']) && isset($_POST['college_id']) && isset($_POST['genre']) && isset($_POST['career_id'])) :

      $namesArray = $_POST['names'];
      $surnamesArray = $_POST['surnames'];
      $collegeIdArray = $_POST['college_id'];
      $genreArray = $_POST['genre'];
      $careerIdArray = $_POST['career_id'];

      $count = count($namesArray);

      include('./../database-init.php');

      for ($i = 0; $i < $count; $i++) :

        $names = $namesArray[$i];
        $surnames = $surnamesArray[$i];
        $collegeId = $collegeIdArray[$i];
        $genre = $genreArray[$i];
        $careerId = (int) $careerIdArray[$i];
        $fullname = "$names $surnames";

        if ($db->storeStudent($names, $surnames, $collegeId, $genre, $careerId)) :

    ?>
          <div class="message message--success">
            <h3 class="message__title">Registrar alumnos</h3>
            <p class="message__content">¡Registro alumno <?= $fullname ?> guardado con éxito!</p>
          </div>
        <?php

        else :

        ?>
          <div class="message message--danger">
            <h3 class="message__title">Registrar alumnos</h3>
            <p class="message__content">¡No se pudo guardar el registro del alumno <?= $fullname ?> !</p>
          </div>
      <?php

        endif;

      endfor;

    else :

      ?>
      <div class="message message--warning">
        <h3 class="message__title">Registrar alumnos</h3>
        <p class="message__content">¡No se enviaron los parámetros necesarios!</p>
      </div>
    <?php

    endif;

    ?>
    <meta http-equiv="refresh" content="2; url=./../index.php">

  </div>
</body>

</html>