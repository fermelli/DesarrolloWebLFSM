<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./css/estilos.css" />
  <title>Formulario - Llenar vectores</title>
</head>

<body>
  <div class="container">
    <div class="content content--large">
      <h1 class="title">Llenar vectores</h1>
      <?php if (isset($_GET['numberOfElements'])) : ?>
        <form action="./sumar-vectores.php" method="post">
          <h2>Vector 1</h2>
          <div class="container-vector">
            <?php
            $numberOfElements = $_GET['numberOfElements'];
            for ($i = 0; $i < $numberOfElements; $i++) :
            ?>
              <input class="field field--element" type="number" name="vector1[]" id="vector1<?= $i ?>" placeholder="<?= "[$i]" ?>" value="<?= isset($_COOKIE['vector1']) ? explode(",", $_COOKIE['vector1'])[$i] : "" ?>" required />
            <?php endfor; ?>
          </div>
          <h2>Vector 2</h2>
          <div class="container-vector">
            <?php
            for ($j = 0; $j < $numberOfElements; $j++) :
            ?>
              <input class="field field--element" type="number" name="vector2[]" id="vector2<?= $j ?>" placeholder="<?= "[$j]" ?>" value="<?= isset($_COOKIE['vector2']) ? explode(",", $_COOKIE['vector2'])[$j] : "" ?>" required />
            <?php endfor; ?>
          </div>
          <input type="hidden" name="numberOfElements" value="<?= $numberOfElements ?>">
          <input type="submit" value="Sumar vectores">
        </form>
      <?php else : ?>
        <div class="container-message container-message--danger">
          <span class="message">Error: Introduzca el número de elementos</span>
        </div>
      <?php endif; ?>
      <div class="container-links">
        <a class="link" href="./index.php">Volver a inicio</a>
      </div>
    </div>
  </div>
</body>

</html>