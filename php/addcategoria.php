<?php
require_once "conexion.php";
$conexion=conexion();
$nombrecategoria = $_POST["nombrecategoria"];
$descripcioncategoria = $_POST["descripcioncategoria"];
$sql = "INSERT INTO categorias(id_categoria,nombrecategoria,descripcioncategoria) VALUES (NULL,'$nombrecategoria','$descripcioncategoria')";
if ($conexion->query($sql) === TRUE)
{
  echo "La Categoria se agrego correctamente";
  header('Location: ../categorias.php');

}else
{
echo "error";
}
 ?>
