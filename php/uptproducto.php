<?php
require_once "conexion.php";
$conexion=conexion();
 $id_producto = $_POST["id_productox"];
 $id_categoria = $_POST["id_categoriax"];
 $actualizarnombre = $_POST["nombreproductox"];
 $actualizardescripcion = $_POST["descripcionproductox"];
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
