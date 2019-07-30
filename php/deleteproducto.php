<?php
require_once "conexion.php";
$conexion=conexion();
$id_productos = $_GET["id_producto"];
$sql = "DELETE FROM productos where id_producto=$id_productos";
if ($conexion->query($sql) === TRUE)
{
  echo "se elimino correctamente";
  header('Location: ../index.php');
}else
    {
    echo "error";
    }
 ?>
