<?php

if (
  isset($_POST['name']) &&
  isset($_POST['description']) &&
  isset($_POST['price'])
) {
  include("./conexion.php");

  $name = $_POST['name'];
  $description = $_POST['description'];
  $price = $_POST['price'];

  $query = "INSERT INTO products (name, description, price) VALUES ('$name', '$description', $price)";

  $result = mysqli_query($conexion, $query);

  mysqli_close($conexion);
}

?>

<meta http-equiv="refresh" content="1; url=./read.php">