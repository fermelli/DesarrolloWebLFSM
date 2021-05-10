<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./../css/style.css">
  <title>Cantidad de Alumnos</title>
</head>

<body>
  <header class="header">
    <nav class="nav">
      <ul class="nav__list">
        <li class="nav__item">
          <a href="./../index.php" class="nav__link">Lista alumnos</a>
        </li>
        <li class="nav__item">
          <a href="./../students/number-students.php" class="nav__link nav__link--active">Cantidad alumnos</a>
        </li>
      </ul>
    </nav>
  </header>

  <div class="container">


    <form class="form" action="./form-data.php" method="get">

      <h2 class="subtitle">Datos</h2>

      <div class="field field--number">
        <div class="field__container-icon">
          <svg class="icon field__icon">
            <use xlink:href="./../assets/feather-sprite.svg#number" />
          </svg>
        </div>
        <div class="field__container-input">
          <input class="field__input" type="number" name="number_students" id="number_students" placeholder="Número de alumnos" required>
          <label for="number_students" class="field__label">Introduzca número de alumnos</label>
        </div>
      </div>

      <div class="container-actions">

        <input class="btn btn--outlined" type="reset" value="Limpiar">
        <input class="btn btn--contained" type="submit" value="Enviar">

      </div>

    </form>

  </div>

</body>

</html>