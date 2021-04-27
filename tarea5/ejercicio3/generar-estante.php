<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./../css/estilos.css">
  <title>Generar Estante</title>
</head>

<body>
  <?php
  if (!isset($_SESSION['shelf']) && isset($_POST['top1']) && isset($_POST['top1']) && isset($_POST['top1'])) :

    include('./Estante.php');

    $top1 = (int) $_POST['top1'];
    $top2 = (int) $_POST['top2'];
    $top3 = (int) $_POST['top3'];

    $shelf = new Shelf($top1, $top2, $top3);

    session_start();

    $_SESSION['shelf'] = $shelf;
  endif;
  ?>
  <div class="container">
    <form class="form" action="./guardar-libro.php" class="form" method="post">
      <h1 class="title">Formulario Libro</h1>
      <label class="label" for="bookName">Libro</label>
      <input class="input" type="text" name="bookName" id="bookName" required>
      <label class="label" for="rowNumber">Número de estante</label>
      <select class="select" name="rowNumber" id="rowNumber" required>
        <option value="" disabled selected>Seleccione un estante</option>
        <option value="1">1° estante</option>
        <option value="2">2° estante</option>
        <option value="3">3° estante</option>
      </select>
      <input class="btn" type="submit" value="Guardar libro">
    </form>
  </div>
</body>

</html>