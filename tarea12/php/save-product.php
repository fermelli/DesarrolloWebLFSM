<?php

if (
  isset($_POST["producto"]) &&
  isset($_POST["idcategoria"]) &&
  isset($_POST["descripcion"]) &&
  isset($_POST["precio"]) &&
  isset($_POST["idmarca"])
) {
  $producto = $_POST["producto"];
  $idcategoria = $_POST["idcategoria"];
  $descripcion = $_POST["descripcion"];
  $precio = $_POST["precio"];
  $idmarca = $_POST["idmarca"];

  if (
    $producto != "" &&
    $idcategoria != "" &&
    $descripcion != "" &&
    $precio != "" &&
    $idmarca != ""
  ) {
    include("database-init.php");
    if ($db->saveProduct($producto, $idcategoria, $descripcion, $precio, $idmarca)) {
      echo json_encode([
        "data" => [
          "producto" => $producto,
          "idcategoria" => $idcategoria,
          "descripcion" => $descripcion,
          "precio" => $precio,
          "idmarca" => $idmarca,
        ],
        "mensaje" => "Producto guardado con exito",
        "success" => TRUE,
      ]);
    } else {
      echo json_encode([
        "mensaje" => "No se pudo guardar el producto",
        "success" => FALSE,
      ]);
    }
  } else {
    echo json_encode([
      "mensaje" => "Los campos no deben estar vacios",
      "success" => FALSE,
    ]);
  }
} else {
  echo json_encode([
    "mensaje" => "Envie todos los parámetros necesarios",
    "success" => FALSE,
  ]);
}
