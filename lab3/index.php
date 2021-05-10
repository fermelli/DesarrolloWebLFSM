<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./css/style.css">
  <title>Lista de Alumnos</title>
</head>

<body>
  <header class="header">
    <nav class="nav">
      <ul class="nav__list">
        <li class="nav__item">
          <a href="./index.php" class="nav__link nav__link--active">Lista alumnos</a>
        </li>
        <li class="nav__item">
          <a href="./students/number-students.php" class="nav__link">Cantidad alumnos</a>
        </li>
      </ul>
    </nav>
  </header>

  <div class="container">
    <h1 class="title">Lista de alumnos</h1>

    <?php

    include('database-init.php');

    $students = $db->getStudents();

    if (count($students) > 0) :

    ?>

      <table class="table">

        <thead>

          <tr>
            <th>#</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>C.U.</th>
            <th>Sexo</th>
            <th>Carrera</th>
          </tr>

        </thead>

        <tbody>
          <?php

          $i = 1;

          foreach ($students as $student) :

          ?>
            <tr>
              <td><?= $i ?></td>
              <td><?= $student['names'] ?></td>
              <td><?= $student['surnames'] ?></td>
              <td><?= $student['college_id'] ?></td>
              <td><?= $student['genre'] == 'M' ? 'Masculino' : 'Femenino' ?></td>
              <td><?= $student['career'] ?></td>
            </tr>
          <?php

            $i++;

          endforeach;

          ?>
        </tbody>


      </table>

    <?php

      $db->close();

    else :

    ?>
      <div class="message message--warning">
        <h3 class="message__title">Lista de alumnos</h3>
        <p class="message__content">¡No hay registros en la base de datos!</p>
      </div>
    <?php

    endif;

    ?>
  </div>
</body>

</html>