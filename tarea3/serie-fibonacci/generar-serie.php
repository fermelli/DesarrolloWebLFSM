<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./../css/comun.css">
  <title>Generar Serie Fibonnacci</title>
  <style>
    .serie {
      display: flex;
      flex-wrap: wrap;
      max-width: 1000px;
    }

    .fibo {
      display: block;
      font-size: 1.25rem;
      padding: 1rem 0.75rem;
    }

    .label {
      display: block;
      font-size: 0.625rem;
      text-align: center;
      color: #ee2233;
    }
  </style>
</head>

<body>
  <?php
  $numberOfElements = $_GET['number-of-elements'];

  $fibo1 = 0;
  $fibo2 = 1;

  $serie = "";

  for ($i = 1; $i <= $numberOfElements; $i++) {
    $serie .= "<span class='fibo'>";
    if ($i == 1) {
      $serie .= "$fibo1";
    }

    if ($i == 2) {
      $serie .= "$fibo2";
    }

    if ($i >= 3) {
      $fibo3 = $fibo2 + $fibo1;
      $serie .= "$fibo3";

      $fibo1 = $fibo2;
      $fibo2 = $fibo3;
    }

    $serie .= "<small class='label'>$i</small></span>";
  }
  ?>
  <div class="container">
    <div class="card serie">
      <h1 class="full">Serie Fibonacci</h1>
      <p class="full">La serie fibonacci de <?= $numberOfElements ?> elementos es:</p>
      <?= $serie ?>
      <span class="link full"><a href="./../index.html">Inicio</a></span>
    </div>
  </div>
</body>

</html>