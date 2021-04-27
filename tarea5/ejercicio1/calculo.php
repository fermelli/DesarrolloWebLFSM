<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Es Múltiplo</title>
</head>

<body>
  <?php
  if (isset($_POST['number1']) && isset($_POST['number2'])) :
    $number1 = $_POST['number1'];
    $number2 = $_POST['number2'];
    if ($number1 % $number2 == 0) :
  ?>
      <img src="./images/isMultiple.jpg" alt="Es múltiplo">
    <?php else : ?>
      <img src="./images/isnotMultiple.jpg" alt="No es múltiplo">
    <?php endif; ?>
  <?php endif; ?>
</body>

</html>