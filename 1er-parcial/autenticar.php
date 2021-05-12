<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="./css/style.css" />
  <title>Login</title>
</head>

<body>
  <header class="header">
    <nav class="nav">
      <ul class="nav__list">
        <li class="nav__item">
          <a href="./login.html" class="nav__link">Login</a>
        </li>
      </ul>
    </nav>
  </header>

  <div class="container">
    <?php

    if (isset($_POST['email']) && isset($_POST['password'])) :

      $email = $_POST['email'];
      $password = $_POST['password'];

      if (!empty($email) && !empty($password)) :

        include('database-init.php');

        $user = $db->getUser($email, $password);

        session_start();

        if ($user != NULL) :

          $_SESSION['user'] = $user;

          if (isset($_COOKIE['correct'])) :

            $correctAttemps = $_COOKIE['correct'] + 1;
            setcookie("correct", $correctAttemps, time() + 3600);

          else :

            setcookie("correct", 1, time() + 3600);

          endif;

        else :

          $_SESSION['user'] = NULL;

          if (isset($_COOKIE['wrong'])) :

            $wrongAttemps = $_COOKIE['wrong'] + 1;
            setcookie('wrong', $wrongAttemps, time() + 3600);

          else :

            setcookie('wrong', 1, time() + 3600);

          endif;

        endif;

    ?>
        <meta http-equiv="refresh" content="0; url=./index.php">
      <?php

      else :

      ?>
        <div class="message message--warning">
          <h3 class="message__title">Autenticación</h3>
          <p class="message__content">¡Los parametros estan vácios!</p>
        </div>
      <?php

      endif;

    else :

      ?>
      <div class="message message--warning">
        <h3 class="message__title">Autenticación</h3>
        <p class="message__content">¡No se enviaron los parámetros necesarios!</p>
      </div>
    <?php

    endif;

    ?>
  </div>
</body>

</html>