<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./../css/styles.css">
  <title>Datos</title>
</head>

<body>
  <div class="container">
    <form action="./procesar.php" class="form" method="POST">
      <h1 class="title">Datos</h1>
      <div class="field">
        <div class="icon-container">
          <svg class="icon">
            <use xlink:href="./../feather-sprite.svg#hastag" />
          </svg>
        </div>
        <div class="input-container">
          <input class="input" name="a" id="a" type="number" placeholder="Introduzca un número" required />
          <label class="label" for="a">Propiedad A</label>
        </div>
      </div>
      <div class="field">
        <div class="icon-container">
          <svg class="icon">
            <use xlink:href="./../feather-sprite.svg#hastag" />
          </svg>
        </div>
        <div class="input-container">
          <input class="input" name="b" id="b" type="number" placeholder="Introduzca un número" required />
          <label class="label" for="b">Propiedad B</label>
        </div>
      </div>
      <div class="field">
        <div class="icon-container">
          <svg class="icon">
            <use xlink:href="./../feather-sprite.svg#hastag" />
          </svg>
        </div>
        <div class="input-container">
          <input class="input" name="c" id="c" type="number" placeholder="Introduzca un número" required />
          <label class="label" for="c">Propiedad C</label>
        </div>
      </div>
      <input class="btn" type="submit" value="Enviar" />
    </form>
  </div>
</body>

</html>