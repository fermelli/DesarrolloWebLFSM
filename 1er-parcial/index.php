<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="./css/style.css" />
  <title>Ejercicio 2</title>
</head>

<body>
  <div class="container container--full">

    <section class="page">

      <header class="page__header">

        <div class="container-image">
          <img class="page__image" src="./images/usfx.png" alt="USFX">
        </div>

        <div class="page__head">
          <h1 class="page__title">UNIVERSIDAD DE SAN FRANCISCO XAVIER</h1>
          <div class="page__subtitle">
            <h2 class="page__subtitle-left">Facultad de Tecnología</h2>
            <h2 class="page__subtitle-right"><span>Suc</span><span>re-Bol</span><span>ivia</span></h2>
          </div>
          <h3 class="page__subtitle2">
            Carrera: Ing. en Ciencias de la Computación
          </h3>
          <h3 class="page__subtitle2">Semestre: 1 -2021</h3>
          <h3 class="page__subtitle2">
            Alumno: <span>Salgado Miguez Luis Fernando</span> C.U.: <span>111-192</span>
          </h3>
        </div>

        <div class="container-image">
          <img class="page__image" src="./images/tecnologia.png" alt="Facultad de Tecnología">
        </div>

      </header>

      <div class="page__content">

        <main class="page__main">

          <?php
          session_start();

          if ($_SESSION['user'] != NULL) :

            $user = $_SESSION['user'];

          ?>
            <p>Estos son los datos de autenticación:</p>

            <ul>
              <li>Email: <span class="blue"><?= $user['correo'] ?></span></li>
              <li>Nombres: <span class="blue"><?= $user['nombres'] ?></span></li>
              <li>Apellidos: <span class="blue"><?= $user['apellidos'] ?></span></li>
              <li>Nivel: <span class="blue"><?= $user['nivel'] == 1 ? 'Administrador' : 'Usuario' ?></span></li>
            </ul>
          <?php

          else :

          ?>
            <p class="page_main__message-error">
              Datos de Autenticación Equivocados
            </p>
          <?php

          endif;

          ?>

        </main>


        <aside class="page__aside">

          <nav class="page__nav">

            <ul class="page__nav-list">

              <li class="page__nav-item">
                <a href="./index.php" class="page__nav-link">Inicio</a>
              </li>
              <li class="page__nav-item">
                <a href="./pregunta3.php" class="page__nav-link">Pregunta 3</a>
              </li>
              <li class="page__nav-item">
                <a href="./formcalendario.html" class="page__nav-link">Pregunta 4</a>
              </li>
              <li class="page__nav-item">
                <a href="./pregunta5.php" class="page__nav-link">Pregunta 5</a>
              </li>

            </ul>

          </nav>

        </aside>

      </div>

      <footer class="page__footer">
        <p>Todos los Derechos Reservados</p>
        <?php
        if (isset($_COOKIE['wrong']) && isset($_COOKIE['correct'])) :

          $correct = $_COOKIE['correct'];
          $wrong = $_COOKIE['wrong'];

        ?>
          <p>
            Nro intentos: <?= $correct + $wrong ?>
            nro erroneos: <?= $wrong ?>
            nro ingresos: <?= $correct ?>
          </p>
        <?php
        endif;
        ?>
      </footer>
    </section>
  </div>
</body>

</html>