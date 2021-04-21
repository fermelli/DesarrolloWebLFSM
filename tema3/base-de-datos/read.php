<?php
include("./conexion.php");

$query = "SELECT id, name, description, price FROM products";

$result = mysqli_query($conexion, $query);
?>

<a href="./form-create.html">Registrar producto</a>
<table border="1">
  <thead>
    <tr>
      <th>Producto</th>
      <th>Descripción</th>
      <th>Precio</th>
    </tr>
  </thead>
  <tbody>
    <?php while ($row = mysqli_fetch_array($result)) : ?>
      <tr>
        <td><?= $row['name'] ?></td>
        <td><?= $row['description'] ?></td>
        <td><?= $row['price'] ?></td>
      </tr>
    <?php endwhile; ?>
  </tbody>
</table>

<?php
mysqli_free_result($result);
mysqli_close($conexion);
?>