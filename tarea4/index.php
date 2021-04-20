<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="./css/estilos.css" />
  <title>Formulario - Número de elementos</title>
</head>

<body>
  <?php
  if (isset($_COOKIE['vector1']) && isset($_COOKIE['vector2'])) {
    setcookie("vector1", '', time() + 1);
    setcookie("vector2", '', time() + 1);
  }
  ?>
  <div class="container">
    <div class="content">
      <h1 class="title">Número de elementos</h1>
      <form action="./formulario-vectores.php" method="get">
        <label class="label" for="numberOfElements">Número de elementos</label>
        <input class="field" type="number" name="numberOfElements" id="numberOfElements" placeholder="Introduzca el número de elementos" required />
        <input type="submit" value="Generar vectores" />
      </form>
    </div>
  </div>
</body>

</html>