<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./../css/styles.css">
  <title>Procesando</title>
</head>

<body>
  <div class="container">
    <?php

    if (isset($_POST['a']) && isset($_POST['b']) && isset($_POST['c'])) :

      include('./Operations.php');

      $a = (int) $_POST['a'];
      $b = (int) $_POST['b'];
      $c = (int) $_POST['c'];

      $operations = new Operations($a, $b, $c);

      session_start();

      $_SESSION['operations'] = $operations;
    ?>
      <div class="form">
        <h2 class="subtitle">¡Operaciones inicializado!</h2>
        <meta http-equiv="refresh" content="1; url=./index.html">
      </div>
    <?php endif; ?>
  </div>
</body>

</html>