<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./../css/style.css">
  <title>Agregar Tipo de Habitaciones</title>
</head>

<body>
  <header class="header">
    <nav class="nav">
      <ul class="nav__list">
        <li class="nav__item">
          <a href="./../index.html" class="nav__link">Inicio</a>
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

    <h1 class="title">Formulario Agregar de Tipo Habitación</h1>

    <form class="form" action="./create.php" method="post">

      <h2 class="subtitle">Datos</h2>

      <div class="field-large">
        <textarea class="field-large__textarea" name="description" id="description" cols="30" rows="10" placeholder="Descripción del tipo de habitación" required></textarea>
        <label class="field-large__label" for="description">Descripción</label>
      </div>

      <div class="field field--number">
        <div class="field__container-icon">
          <svg class="icon field__icon">
            <use xlink:href="./../assets/feather-sprite.svg#bed" />
          </svg>
        </div>
        <div class="field__container-input">
          <input class="field__input" type="number" name="number_beds" id="number_beds" placeholder="Número de camas" required>
          <label for="number_beds" class="field__label">Número de camas</label>
        </div>
      </div>

      <input class="btn btn--primary" type="submit" value="Registrar">

    </form>

  </div>
</body>

</html>