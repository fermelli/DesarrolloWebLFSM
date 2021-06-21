<?php

class Database extends mysqli
{
  public function __construct($host, $user, $password, $database)
  {
    parent::__construct($host, $user, $password, $database);

    if (mysqli_connect_error()) {
      die('Connection error (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());
    }
  }

  public function getCategories()
  {
    $query = "SELECT id, categoria FROM categorias";
    $result = $this->query($query);
    $categories = $result->fetch_all(MYSQLI_ASSOC);
    $result->free();
    return $categories;
  }

  public function getBrands()
  {
    $query = "SELECT id, marca FROM marcas";
    $result = $this->query($query);
    $brands = $result->fetch_all(MYSQLI_ASSOC);
    $result->free();
    return $brands;
  }

  public function getProducts()
  {
    $query = "SELECT productos.id, producto, descripcion, precio, categoria, marca FROM productos INNER JOIN categorias ON idcategoria = categorias.id INNER JOIN marcas ON idmarca = marcas.id ORDER BY productos.id";
    $result = $this->query($query);
    $products = $result->fetch_all(MYSQLI_ASSOC);
    $result->free();
    return $products;
  }

  public function saveProduct($producto, $idcategoria, $descripcion, $precio, $idmarca)
  {
    $query = "INSERT INTO productos (producto, idcategoria, descripcion, precio, idmarca) VALUES ('$producto', $idcategoria, '$descripcion', $precio, $idmarca)";
    return $this->query($query);
  }
}
