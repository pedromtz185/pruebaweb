<?php
require_once "conexion.php";
$conexion=conexion();
$id_categoria = $_GET["id_catergoria"];
$sql = "DELETE FROM categorias  where id_categoria=$id_categoria";
if ($conexion->query($sql) === TRUE)
{
  echo "se elimino correctamente";
  header('Location: ../categorias.php');
}else
    {
    echo "error";
    }
 ?>
