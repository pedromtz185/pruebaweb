<?php
require_once "conexion.php";
$conexion=conexion();
$id_categoria = $_POST["id_categoriax"];
$nombrecategoria = $_POST["nombrecategoriax"];
$actualizardescripcion = $_POST["actualizardescripcionx"];
$sql = "UPDATE categorias SET nombrecategoria = '$nombrecategoria',	descripcioncategoria ='$actualizardescripcion' where id_categoria=$id_categoria";
if ($conexion->query($sql) === TRUE)
{
  echo "se actualizo correctamente";
  header('Location: ../categorias.php');
}else
    {
    echo "error";
    }
 ?>
