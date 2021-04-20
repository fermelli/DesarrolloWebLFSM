<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./css/estilos.css" />
  <title>Sumar de vectores</title>
</head>

<body>
  <div class="container">
    <div class="content content--large">
      <h1 class="title">Suma de vectores</h1>
      <?php
      if (isset($_POST['vector1']) && isset($_POST['vector2']) && isset($_POST['numberOfElements'])) :
        $numberOfElements = $_POST['numberOfElements'];
      ?>
        <h2>Vector resultado</h2>
        <div class="container-vector">
          <?php
          $vector1 = $_POST['vector1'];
          $vector2 = $_POST['vector2'];
          setcookie("vector1", implode(",", $vector1), time() + 3600);
          setcookie("vector2", implode(",", $vector2), time() + 3600);
          for ($i = 0; $i < $numberOfElements; $i++) :
            $suma = $vector1[$i] + $vector2[$i];
          ?>
            <input class="field field--element" type="number" name="vectorResultado[]" id="vectorResultado<?= $i ?>" value="<?= $suma ?>" readonly>
          <?php
          endfor;
          ?>
        </div>
      <?php
      else :
      ?>
        <div class="container-message container-message--danger">
          <span class="message">Error: No hay vectores que sumar</span>
        </div>
      <?php endif; ?>
      <div class="container-links">
        <a class="link" href="./formulario-vectores.php?numberOfElements=<?= isset($numberOfElements) ? $numberOfElements : 1 ?>">Cambiar datos</a>
        <a class="link" href="./index.php">Otra suma</a>
      </div>
    </div>
  </div>
</body>

</html>