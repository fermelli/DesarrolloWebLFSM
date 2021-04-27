<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Estante</title>
</head>

<body>
  <?php
  if (isset($_POST['bookName']) && isset($_POST['rowNumber'])) :

    include('./Estante.php');
    session_start();

    $shelf = $_SESSION['shelf'];

    $bookName = $_POST['bookName'];
    $rowNumber = (int) $_POST['rowNumber'];

    if ($shelf->insertBook(1, "dasdas")) :
      echo "libro insertado";
    else :
      echo "error";
    endif;

    var_dump($_SESSION['shelf']);
  ?>
    <div class="shelf">
      <div class="row">
        <div class="actions">

        </div>
        <?php for ($i = 0; $i < $shelf->getTop1(); $i++) : ?>
          <div><?= $i ?></div>
        <?php endfor; ?>
      </div>
    </div>
  <?php endif; ?>
</body>

</html>