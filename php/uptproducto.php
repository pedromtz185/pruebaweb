<?php
require_once "conexion.php";
$conexion=conexion();
 $id_producto = $_POST["actualizarid"];
 $id_categoria = $_POST["id_categoria"];
 $actualizarnombre = $_POST["actualizarnombre"];
 $actualizardescripcion = $_POST["actualizardescripcion"];
$sql = "UPDATE productos SET id_categoria = '$id_categoria', nombreproducto = '$actualizarnombre', descripcionproducto ='$actualizardescripcion' WHERE id_producto=$id_producto";
if ($conexion->query($sql) === TRUE)
{
  echo "se actualizo correctamente";
  header('Location: ../index.php');
}else
    {
    echo "error";
    }
 ?>
