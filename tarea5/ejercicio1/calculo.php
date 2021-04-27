<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./../css/estilos.css">
  <title>Es Múltiplo</title>
</head>

<body>
  <div class="container">
    <?php
    if (isset($_POST['number1']) && isset($_POST['number2'])) :
      $number1 = $_POST['number1'];
      $number2 = $_POST['number2'];
    ?>
      <h2 class="subtitle">El número <span class="span"><?= $number1 ?></span></h2>
      <?php
      if ($number1 % $number2 == 0) :
      ?>
        <img class="image" src="./imagenes/es-multiplo.jpg" alt="Es múltiplo">
      <?php else : ?>
        <img class="image" src="./imagenes/no-es-multiplo.jpg" alt="No es múltiplo">
      <?php endif; ?>
    <?php endif; ?>
    <h2 class="subtitle">de <span class="span"><?= $number2 ?></span></h2>
  </div>
</body>

</html>