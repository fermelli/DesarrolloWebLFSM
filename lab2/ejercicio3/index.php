<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./../css/styles.css">
  <title>Inicio</title>
</head>

<body>
  <div class="container">
    <div class="form">
      <?php
      if (isset($_COOKIE['numberVisits']) && $_COOKIE['numberVisits'] > 0) :

        $numberVisits = $_COOKIE['numberVisits'] + 1;

        setcookie("numberVisits", $numberVisits, time() + 3600);
      ?>
        <p class="message">
          Gracias por ser un visitante frecuente usted visito este sitio <?= $numberVisits ?> veces.
        </p>
      <?php
      else :

        setcookie("numberVisits", 1, time() + 3600);
      ?>
        <p class="message">
          Bienvenido.
        </p>
      <?php endif; ?>
    </div>
  </div>
</body>

</html>